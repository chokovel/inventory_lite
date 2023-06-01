<?php

namespace App\Jobs;

use App\Models\TransactionId;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GenerateTransactionId implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $transactionId;
    private $id_number;
    public function __construct($transactionId)
    {
        //
        $this->transactionId = $transactionId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $sql = "SELECT q.* FROM (SELECT id, transaction_id, @i:=@i+1 as row_number
            FROM transaction_ids t, (SELECT @i:=0) AS r
            WHERE DATE_FORMAT(t.created_at, '%Y')=DATE_FORMAT(CURRENT_DATE, '%Y')
            GROUP BY id, transaction_id) q WHERE q.id=" . $this->transactionId;

        $row = DB::select($sql);
        if (!count($row)) {
            $this->id_number = date('md') . str_pad(1, 2, '0', STR_PAD_LEFT);
        } else {
            $this->id_number = date('md') . str_pad($row[0]->row_number, 2, '0', STR_PAD_LEFT);
        }
        TransactionId::where('id', $this->transactionId)
            ->update([
                'transaction_id' => $this->id_number
            ]);
    }
}

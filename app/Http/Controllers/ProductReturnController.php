<?php

namespace App\Http\Controllers;

use App\Models\ProductReturn;
use App\Models\SaleCart;
use Illuminate\Http\Request;
use App\Jobs\GenerateTransactionId;
use App\Models\TransactionId;

class ProductReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $returns = ProductReturn::
        whereMonth('created_at', '=', date('m'))
        ->orderBy('created_at', 'DESC')
        ->with('saleCart')->get();
        return view('dashboard.returns')->with('returns', $returns)->with('month', date('M-Y'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function salesReturn($salesId)
    {
        $saleCart = SaleCart::with(
            'productColor.size',
            'productColor.color',
            'productColor.product',
            'productReturn'
        )
            ->where('id', $salesId)
            ->first();
        return view('dashboard.createreturn')->with('saleCart', $saleCart);
        return $saleCart;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $salesId)
    {
        //
        $validatedData = $request->validate([
            'quantity' => 'required',
        ]);

        $saleCart = SaleCart::with('productReturn')
            ->where('id', $salesId)->first();

        if (!$saleCart) {
            return back()
                ->with('message', 'Sales Order was not found');
        }
        if ($saleCart->quantity < $request->quantity) {
            return back()
                ->with('message', 'quantity to be returned can not be greater than quantity bought');
        }

        $saleCart->decrement('quantity', $request->quantity);
        if ($saleCart->productReturn) {
            $productReturn = $saleCart->productReturn;
            $productReturn->increment('quantity', $request->quantity);
        } else {
            ProductReturn::create([
                'quantity' => $request->quantity,
                'sale_cart_id' => $saleCart->id,
                'product_color_id' => $saleCart->product_color_id,
                // 'transaction_id' => $saleCart->transaction_ids ? $saleCart->transaction_ids->transaction->id : null

            ]);
        }

        return redirect()->route('returns.list')
            ->with('message', 'Product returned successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

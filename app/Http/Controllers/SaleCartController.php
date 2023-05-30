<?php

namespace App\Http\Controllers;

use App\Jobs\GenerateTransactionId;
use App\Models\ProductColor;
use App\Models\ProductReturn;
use App\Models\SaleCart;
use App\Models\TransactionId;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SaleCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function salesreport(){
    //     $monthly = SaleCart::select(
    //         DB::raw('(COUNT(*)) as count'),
    //         DB::raw('MONTHNAME(created_at) as month_name')
    //     )->whereYear('created_at', date('Y'))
    //      ->groupBY('month_name')
    //      ->get()->toArray();
    //      dd($monthly);

    // }


    public function index(Request $request)
    {
        $saleCart = SaleCart::with('productColor', 'customer')
            ->whereMonth('created_at', '=', date('m'))
            ->orderBy('created_at', 'DESC')->get();
        // return $saleCart;
        return view('dashboard.sales')->with('sales', $saleCart);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'customer_id' => 'required',
        ]);
        $customer_id = $request->customer_id;
        $items = session()->get('items');


        if (!$items) return back()->with('message', 'No item on hhe cart');
        $transactionId = new TransactionId();
        $transactionId->save();
        foreach ($items as $item) {
            // $saleCart = SaleCart::where('product_color_id', $item['product_color_id'])
            //     ->where('customer_id', $customer_id)->first();
            // if ($saleCart) {
            //     $saleCart->increment('quantity', $item['quantity']);
            // } else {
            if ($item != null) {
                $item['customer_id'] = $customer_id;
                $item['transaction_id'] = $transactionId->id;
                SaleCart::create($item);
                ProductColor::where('id', $item['product_color_id'])
                    ->decrement('quantity', $item['quantity']);
            }

            // }

        }
        GenerateTransactionId::dispatchAfterResponse($transactionId->id);
        session()->remove('items');
        return back()->with('message', 'Order completed successfully');
    }

    public function setSession(Request $request)
    {
        // if ($request->session()->has('items')) {
        //     $items = session()->get('items');
        //     Log::alert($items);
        //     $newArray = array_merge($items, $request->items);
        //     session()->put('items', $newArray);
        // } else {
        //     session()->put('items', $request->items);
        // }
        Log::alert($request->items);
        session()->put('items', $request->items);
        return response()->json(['statusCode' => 200, 'body' => 'Added successfully'], 200);
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

    public function returnSessionSet(Request $request)
    {
        Log::alert($request->items);
        session()->put('return_items', $request->items);
        return response()->json(['statusCode' => 200, 'body' => 'Added successfully'], 200);
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

    public function returnStore(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
        ]);
        $customer_id = $request->customer_id;
        $items = session()->get('return_items');


        if (!$items) return back()->with('message', 'No item in the cart');
        foreach ($items as $item) {
            if ($item != null) {
                $item['customer_id'] = $customer_id;
                $saleCart = SaleCart::where('product_color_id', $item['product_color_id'])
                    ->where('customer_id', $item['customer_id'])->first();
                if ($saleCart) {
                    if ($saleCart->quantity > $item['quantity']) {
                        $saleCart->decrement('quantity', $item['quantity']);
                    } else if ($saleCart->quantity == $item['quantity']) {
                        $saleCart->delete();
                    } else {
                        Log::alert("Item returns is higher");
                        continue;
                    }
                    ProductReturn::create($item);
                    ProductColor::where('id', $item['product_color_id'])
                        ->increment('quantity', $item['quantity']);
                }
            }
        }
        session()->remove('items');
        return back()->with('message', 'Order completed successfully');
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

<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Services\PurchaseService;
use App\Interfaces\PurchaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $purchaseService;

    public function __construct()
    {
        $this->purchaseService = (new PurchaseService);
    }


    public function index()
    {
        $purchases = $this->purchaseService->getAll();
        return view('purchases.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $payload = [
            'product_name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'image' => $request->image,
            'note' => $request->note,
        ];
        $this->purchaseService->create($payload);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $data = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'supplier_id' => 'required',
            'date' => 'required',
            'image' => 'nullable',
            'note' => 'nullable',
        ]);

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $size = app(sizeService::class)->create($data);

        return redirect()->route('sizes.index', $size);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $purchases = Purchase::get();
        return view('purchases.create', compact('purchases'));
        // return view('purchases.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $purchase = $this->purchaseService->getById($id);
        return view('purchases.edit', compact('purchase'));
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
            $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'address' => 'required',
            'note' => 'nullable',
        ]);

        // $purchase = $this->purchaseService->update($id, $validatedData);

        $updated = $this->purchaseService->update($id, $validatedData);

        if ($updated){
            return redirect()->route('purchases.index')->with('success', 'purchase updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update purchase.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        if ($this->purchaseService->delete($purchase)) {
            return redirect()->route('purchases.index')->with('success', 'purchase deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete purchase.');
        }
    }
}

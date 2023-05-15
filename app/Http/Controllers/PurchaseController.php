<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
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
    public function create()
    {
       $suppliers = Supplier::all();
    return view('purchases.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'size' => 'required',
            'color' => 'required',
            'date' => 'required',
            'supplier_id' => 'required',
            'name' => 'required',
            'note' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

            // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = Storage::url($imagePath);
        }

        $purchases = app(PurchaseService::class)->create($data);

        return redirect()->route('purchases.index', $purchases);
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
        $data = $request->validate([
            'product_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'size' => 'required',
            'color' => 'required',
            'date' => 'required',
            'supplier_id' => 'required',
            'name' => 'required',
            'note' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $purchase = $this->purchaseService->getById($id);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($purchase->image) {
                Storage::delete($purchase->image);
            }

            // Upload new image
            $imagePath = $request->file('image')->store('public/images');
            $data['image'] = Storage::url($imagePath);
        } else {
            // No image update, keep the previous image
            $data['image'] = $purchase->image;
        }

        $updated = $this->purchaseService->update($id, $data);

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
    public function destroy($id)
    {
        //
    }
}

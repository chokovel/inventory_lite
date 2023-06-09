<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Services\PurchaseService;
use App\Interfaces\PurchaseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
        $purchases = Purchase::orderBy('created_at', 'DESC')->get();
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
    // Validate the form data
    $validatedData = $request->validate([
        'product_name' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'size' => 'required',
        'color' => 'required',
        'date' => 'required|date',
        'supplier_id' => 'required|exists:suppliers,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg',
        'note' => 'nullable',
    ]);

    // Create a new purchase instance
    $purchase = new Purchase;
    $purchase->product_name = $validatedData['product_name'];
    $purchase->price = $validatedData['price'];
    $purchase->quantity = $validatedData['quantity'];
    $purchase->size = $validatedData['size'];
    $purchase->color = $validatedData['color'];
    $purchase->date = $validatedData['date'];
    $purchase->supplier_id = $validatedData['supplier_id'];
    $purchase->note = $validatedData['note'];

    // Check if an image is provided
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
        $purchase->image = $imagePath;
    }

    // Save the purchase
    $purchase->save();

    // Redirect to the desired page with a success message
    return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
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
        $suppliers = Supplier::all();
        return view('purchases.edit', compact('purchase', 'suppliers'));
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
    // Validate the form data
    $validatedData = $request->validate([
        'product_name' => 'required',
        'price' => 'required|numeric',
        'quantity' => 'required|numeric',
        'size' => 'required',
        'color' => 'required',
        'date' => 'required|date',
        'supplier_id' => 'required|exists:suppliers,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'note' => 'nullable',
    ]);

    // Find the purchase by ID
    $purchase = Purchase::findOrFail($id);

    // Update the purchase data
    $purchase->product_name = $validatedData['product_name'];
    $purchase->price = $validatedData['price'];
    $purchase->quantity = $validatedData['quantity'];
    $purchase->size = $validatedData['size'];
    $purchase->color = $validatedData['color'];
    $purchase->date = $validatedData['date'];
    $purchase->supplier_id = $validatedData['supplier_id'];
    $purchase->note = $validatedData['note'];

    // Check if a new image is provided
    if ($request->hasFile('image')) {
        // Delete the previous image if it exists
        if ($purchase->image && Storage::exists($purchase->image)) {
            Storage::delete($purchase->image);
        }

        // Store the new image
        $imagePath = $request->file('image')->store('public/images');
        $purchase->image = $imagePath;
    }

    // Save the updated purchase
    $purchase->save();

    // Redirect to the desired page with a success message
    return redirect()->route('purchases.index')->with('success', 'Purchase updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    $purchase = Purchase::findOrFail($id);

    // Delete the image if it exists
    if ($purchase->image && Storage::exists($purchase->image)) {
        Storage::delete($purchase->image);
    }

    // Delete the purchase
    $purchase->delete();

    return redirect()->route('purchases.index')->with('success', 'Purchase deleted successfully.');
}

}

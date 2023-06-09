<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Services\SupplierService;
use App\Interfaces\SupplierInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public $supplierService;

    public function __construct()
    {
        $this->supplierService = (new SupplierService);
    }


    public function index()
    {
        $suppliers = Supplier::orderBy('created_at', 'DESC')->get();
        return view('suppliers.index', compact('suppliers'));
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
            'name' => $request->name,
        ];
        $this->supplierService->create($payload);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'country' => 'required',
        'address' => 'required',
        'note' => 'nullable',
    ]);

    // Create a new supplier using the validated data
    $supplier = $this->supplierService->create($validatedData);

    // Check if the supplier was created successfully
    if ($supplier) {
        // Redirect to the suppliers index page with a success message
        return redirect()->route('suppliers.index')->with('success', 'Supplier created successfully.');
    } else {
        // Redirect back with an error message
        return back()->with('error', 'Failed to create supplier. Please try again.');
    }
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $suppliers = Supplier::get();
        return view('suppliers.create', compact('suppliers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = $this->supplierService->getById($id);
        return view('suppliers.edit', compact('supplier'));
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

        // $supplier = $this->supplierService->update($id, $validatedData);

        $updated = $this->supplierService->update($id, $validatedData);

        if ($updated){
            return redirect()->route('suppliers.index')->with('success', 'Supplier updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update supplier.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        if ($this->supplierService->delete($supplier)) {
            return redirect()->route('suppliers.index')->with('success', 'Supplier deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete supplier.');
        }
    }

     public function search(Request $request)
    {
        $searchTerm = $request->input('searchNamePhone');

        $results = Supplier::where('name', 'like', '%' . $searchTerm . '%')
            ->orWhere('phone', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('suppliers.search', compact('results'));
    }

}

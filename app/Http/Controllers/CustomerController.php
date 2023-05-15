<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Services\CustomerService;
use App\Interfaces\CustomerInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $customerService;

    public function __construct()
    {
        $this->customerService = (new CustomerService);
    }

    public function index()
    {
        $customers = $this->customerService->getAll();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'note' => 'nullable',
        ]);

        $customers = app(CustomerService::class)->create($data);

        return redirect()->route('customers.index', $customers);

        // return response()->json($customer, 201);
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
        $customer = $this->customerService->getById($id);
        return view('customers.edit', compact('customer'));
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
            'dob' => 'required',
            'address' => 'required',
            'note' => 'nullable',
        ]);

        $updated = $this->customerService->update($id, $validatedData);

        if ($updated){
            return redirect()->route('customers.index')->with('success', 'customer updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update customer.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if ($this->customerService->delete($customer)) {
            return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete customer.');
        }
    }
}

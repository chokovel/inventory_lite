<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Services\ExpenseCategoryService;
use App\Interfaces\ExpenseCategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $expensecategoryService;


    public function __construct()
    {
        $this->expensecategoryService = (new ExpenseCategoryService);
    }


    public function index()
    {
        $expensecategories = ExpenseCategory::orderBy('created_at', 'DESC')->get();
        return view('expensecategories.index', compact('expensecategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('expensecategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $expensecategory = app(ExpenseCategoryService::class)->create($data);

        return redirect()->route('expensecategories.index', $expensecategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expensecategory)
    {
        $categories = ExpenseCategory::get();
        return view('expensecategories.index', compact('expensecategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expensecategory = $this->expensecategoryService->getById($id);
        return view('expensecategories.edit', compact('expensecategory'));
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
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $updated = $this->expensecategoryService->update($id, $validatedData);

        if ($updated){
            return redirect()->route('expensecategories.index')->with('success', 'ExpenseCategory updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update expensecategory.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $expensecategory)
    {
        if ($this->expensecategoryService->delete($expensecategory)) {
            return redirect()->route('expensecategories.index')->with('success', 'ExpenseCategory deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete expensecategory.');
        }
    }
}

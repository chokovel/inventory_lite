<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Services\ExpenseService;
use Illuminate\Http\Request;


use function PHPUnit\Framework\returnSelf;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $expenseService;

    public function __construct()
    {
        $this->expenseService = (new ExpenseService);
    }

    public function index()
    {
        $expenses = $this->expenseService->getAll();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expensecategories = ExpenseCategory::all();
        return view('expenses.create', compact('expensecategories'));
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
            'date' => 'required',
            'orderNumber' => 'required',
            'expense_title' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'expense_category_id' => 'required',
        ]);

        $expenses = app(ExpenseService::class)->create($data);

        return redirect()->route('expenses.index', $expenses);

        // return response()->json($expense, 201);
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
    $expense = Expense::findOrFail($id);
    $expensecategories = ExpenseCategory::all();
    return view('expenses.edit', compact('expense', 'expensecategories'));
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
            'date' => 'required',
            'expense_title' => 'required',
            'amount' => 'required',
            'details' => 'required',
            'expense_category_id' => 'required',
        ]);

        $updated = $this->expenseService->update($id, $validatedData);

        if ($updated) {
            return redirect()->route('expenses.index')->with('success', 'expense updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update expense.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        if ($this->expenseService->delete($expense)) {
            return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete expense.');
        }
    }

    public function getByEmailOrPhone($input)
    {
        $expense = $this->expenseService->getByPhoneOrEmail($input);
        if ($expense) return response()->json(['statusCode' => 200, 'body' => $expense], 200);
        else return response()->json(['statusCode' => 400, 'body' => 'No Expense found'], 400);
    }

    public function search(Request $request)
    {
        $searchNamePhone = $request->input('searchNamePhone');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $query = Expense::query();

        if ($searchNamePhone) {
            $query->where(function ($q) use ($searchNamePhone) {
                $q->where('product_name', 'like', '%' . $searchNamePhone . '%')
                    ->orWhere('price', 'like', '%' . $searchNamePhone . '%');
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate])
                    ->orWhereBetween('created_at', [$startDate, $endDate]);
        }

        $results = $query->get();

        return view('products.search', compact('results'));
    }


}

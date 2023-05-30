<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\CategoryService;
use App\Interfaces\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $categoryService;


    public function __construct()
    {
        $this->categoryService = (new CategoryService);
    }


    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('categories.index', compact('categories'));
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
        $this->categoryService->create($payload);
        return view('categories.index');
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

        $category = app(CategoryService::class)->create($data);

        return redirect()->route('categories.index', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $categories = Category::get();
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryService->getById($id);
        return view('categories.edit', compact('category'));
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

        $updated = $this->categoryService->update($id, $validatedData);

        if ($updated){
            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to update category.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Category $category)
    // {
    //     if ($this->categoryService->delete($category) && ($category->products->count() > 0) ) {
    //         return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    //     } else {
    //         return back()->withInput()->with('error', 'Failed to delete category.');
    //     }
    // }
    public function destroy(Category $category)
    {
        if ($category->products->count() > 0) {
            return back()->withInput()->with('error', 'Cannot delete the category because it has associated products.');
        }

        if ($this->categoryService->delete($category)) {
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } else {
            return back()->withInput()->with('error', 'Failed to delete category.');
        }
    }

}

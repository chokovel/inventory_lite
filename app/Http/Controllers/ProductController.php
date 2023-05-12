<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Services\ProductService;
use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public $productService;


    public function __construct()
    {
        $this->productService = (new ProductService);
    }


    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('products.create', compact('categories', 'sizes', 'colors'));
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
            'product-name' => 'required|string',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'note' => 'nullable|string',
            'color.*' => 'required|exists:colors,id',
            'size.*' => 'required|exists:sizes,id',
            'quantity.*' => 'required|integer',
        ]);

        // Create a new product
        $product = new Product();
        $product->name = $validatedData['product-name'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->note = $validatedData['note'];

        // Save the product image
        $imagePath = $request->file('image')->store('product_images');
        $product->image = $imagePath;

        $product->save();

        // Save the color, size, and quantity data
        foreach ($validatedData['color'] as $key => $colorId) {
            $sizeId = $validatedData['size'][$key];
            $quantity = $validatedData['quantity'][$key];

            $productColor = new ProductColor();
            $productColor->product_id = $product->id;
            $productColor->color_id = $colorId;
            $productColor->size_id = $sizeId;
            $productColor->quantity = $quantity;
            $productColor->save();
        }

        // Redirect to a success page or perform any additional actions
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
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

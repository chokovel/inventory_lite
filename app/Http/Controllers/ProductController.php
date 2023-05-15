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
use Illuminate\Support\Facades\Storage;
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
        $products = Product::orderBy('created_at', 'DESC')->get();

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
            'category' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'note' => 'nullable|string',
            'size' => 'required|array',
            'size.*' => 'integer',
            'color' => 'required|array',
            'color.*' => 'integer',
            'quantity' => 'required|array',
            'quantity.*' => 'integer',
        ]);
        if ($request->hasFile('image')) {
            $imageWithExtension = $request->file('image')->getClientOriginalName(); //Filename with extension
            $myFileName = pathinfo($imageWithExtension, PATHINFO_FILENAME); //extract only the filename without extension
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = $myFileName . '_' . time() . '.' . $extension; //filename
            $uploadPath = 'public/products';
            $path = $request->file('image')->storeAs($uploadPath, $fileName);
        }
        //return $request;
        // Create a new product instance
        $product = new Product();
        $product->product_name = $validatedData['product-name'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];
        $product->image = $path;

        // Set other product attributes as needed

        // Save the product to the database
        $product->save();

        // Store the related size, color, and quantity data
        $sizes = $validatedData['size'];
        $colors = $validatedData['color'];
        $quantities = $validatedData['quantity'];



        for ($i = 0; $i < count($sizes); $i++) {
            $productColors = new ProductColor();
            $productColors->color_id = $colors[$i];
            $productColors->quantity = $quantities[$i];
            $productColors->size_id = $sizes[$i];
            // $productColors->product_id = $product->id;
            $productColors->product()->associate($product);
            $productColors->save();
        }

        // Redirect or return a response as needed


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
        return $id;
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

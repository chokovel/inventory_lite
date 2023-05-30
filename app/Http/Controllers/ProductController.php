<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductColor;
use App\Services\ProductService;
use App\Interfaces\ProductInterface;
use App\Models\Category;
use App\Models\Size;
use App\Models\Color;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

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
        $sizes = Size::all();
        $colors = Color::all();
        return view('products.index', compact('products', 'colors', 'sizes'));
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
        $validatedData = $request->validate([
            'product-name' => 'required|string',
            'category' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'file|mimes:jpeg,png,jpg,webp,gif|max:10000',
            'note' => 'nullable|string',
            'size' => 'required|array',
            'size.*' => 'integer',
            'color' => 'required|array',
            'color.*' => 'integer',
            'quantity' => 'required|array',
            'quantity.*' => 'integer',
        ]);

        // Create a new product instance
        $product = new Product();
        $product->product_name = $validatedData['product-name'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];

        // Save the product to the database
        $product->save();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $product->image = $imagePath;
            $product->save(); // Save the product with the image path
        }

        // Store the related size, color, and quantity data
        $sizes = $validatedData['size'];
        $colors = $validatedData['color'];
        $quantities = $validatedData['quantity'];
        $stockLog = new StockLog();
        $stockLog->product()->associate($product);
        $stockLog->price = $product->price;

        for ($i = 0; $i < count($sizes); $i++) {
            $productColors = new ProductColor();
            $productColors->color_id = $colors[$i];
            $productColors->quantity = $quantities[$i];
            $stockLog->new_stock += $quantities[$i];
            $productColors->size_id = $sizes[$i];
            $productColors->product()->associate($product);
            $productColors->save();
        }

        $stockLog->save();

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
    public function edit(Product $product)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('products.edit', compact('product', 'categories', 'sizes', 'colors'));
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
        // return $request;
        $validatedData = $request->validate([
            'product-name' => 'required|string',
            'category' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:10000',
            'note' => 'nullable|string',
            'size' => 'required|array',
            'size.*' => 'integer',
            'color' => 'required|array',
            'color.*' => 'integer',
            'quantity' => 'required|array',
            // 'quantity.*' => 'integer',
            'quantity.*' => 'numeric',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($id);
        $product->product_name = $validatedData['product-name'];
        $product->category_id = $validatedData['category'];
        $product->price = $validatedData['price'];

        // Handle image update if provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $product->image = $imagePath;
        }

        // Update other attributes
        $product->note = $validatedData['note'];

        // Save the product to the database
        $product->save();

        // Update or add product variations
        $sizes = $validatedData['size'];
        $colors = $validatedData['color'];
        $quantities = $validatedData['quantity'];
        $stockLog = new StockLog();
        $stockLog->product()->associate($product);
        $stockLog->price = $product->price;
        $stockLog->old_stock =
            ProductColor::where('product_id', $id)->sum('quantity');
        foreach ($sizes as $index => $size) {
            $color = $colors[$index];
            $quantity = $quantities[$index];

            // Find existing product variation or create a new one
            $variation = ProductColor::firstOrNew([
                'product_id' => $product->id,
                'color_id' => $color,
                'size_id' => $size,
            ]);

            // Add the new quantity to the existing quantity or set as a new quantity
            $variation->quantity = isset($variation->id) ? $variation->quantity + $quantity : $quantity;
            $stockLog->new_stock += $quantity;
            // Save the variation
            $variation->save();
        }

        $stockLog->save();

        // Redirect to the product index page with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
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

    // public function report()
    // {
    //     $products = Product::with('saleCarts', 'productReturns')->orderBy('created_at', 'DESC')->get();
    //     // return $products;


    //     return view('dashboard.salesreport')->with('products', $products);
    // }

    // public function report()
    // {
    //     $monthlyProducts = Product::with('saleCarts', 'productReturns')
    //         ->orderBy('created_at', 'DESC')
    //         ->get()
    //         ->groupBy(function ($product) {
    //             return $product->created_at->format('F Y');
    //         });
    //         // dd($monthlyProducts);

    //     return view('dashboard.salesreport')->with('monthlyProducts', $monthlyProducts);
    // }

    public function report()
    {
        $monthlyProducts = Product::with('saleCarts', 'productReturns')
            ->orderBy('created_at', 'DESC')
            ->get()
            ->groupBy(function ($product) {
                return $product->created_at->format('F Y');
            });

        return view('dashboard.salesreport')->with('monthlyProducts', $monthlyProducts);
    }

    // public function report(Request $request)
    // {
    //     $currentMonth = date('F Y');
    //     $selectedMonth = $request->input('month', date('m'));

    //     $monthlySales = SaleCart::with('product', 'product.productReturns')
    //         ->orderBy('created_at', 'DESC')
    //         ->whereMonth('created_at', $selectedMonth)
    //         ->get()
    //         ->groupBy(function ($saleCart) {
    //             return $saleCart->created_at->format('F Y');
    //         });

    //     $hasSalesForCurrentMonth = $monthlySales->has($currentMonth);

    //     return view('dashboard.salesreport', compact('monthlySales', 'hasSalesForCurrentMonth'));
    // }


    public function search(Request $request)
    {
        $searchNamePhone = $request->input('searchNamePhone');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $color = $request->input('color');
        $size = $request->input('size');

        $query = Product::query();

        if ($searchNamePhone) {
            $query->where(function ($q) use ($searchNamePhone) {
                $q->where('product_name', 'like', '%' . $searchNamePhone . '%')
                    ->orWhere('price', 'like', '%' . $searchNamePhone . '%');
            });
        }

        if ($color) {
            $query->whereHas('productColors.color', function ($subQuery) use ($color) {
                $subQuery->where('name', 'like', '%' . $color . '%');
            });
        }

        if ($size) {
            $query->whereHas('productColors.size', function ($subQuery) use ($size) {
                $subQuery->where('name', 'like', '%' . $size . '%');
            });
        }

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $results = $query->get();

        return view('products.search', compact('results'));
    }


}

<?php

namespace App\Http\Livewire\Sales;

use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Create extends Component
{

    public $products;
    public $totalProductsSum = 0;
    public function mount()
    {
        $this->products = Product::with('productColors.color', 'productColors.size')
            ->orderBy('created_at', 'desc')->get();
        $this->totalProductsSum = $this->products->sum('price');
        foreach ($this->products as $product) {
            foreach ($product->productColors as $productColor) {
                $productColor->qty = 0;
            }
        }
    }
    public function render()
    {

        // $this->preload();
        return view('livewire.sales.create');
    }

    public function booted()
    {
    }



    public function remove($k, $key)
    {
        $this->products[$k]->productColors[$key]->qty ? $this->products[$k]->productColors[$key]->qty = $this->products[$k]->productColors[$key]->qty - 1 : $this->products[$k]->productColors[$key]->qty = 1;
    }

    public function add($k, $key)
    {
        if ($this->products[$k]->productColors[$key]->quantity > 0) {
            if ($this->products[$k]->productColors[$key]->qty) {
                $this->products[$k]->productColors[$key]->qty += 1;
            } else {
                $this->products[$k]->productColors[$key]->qty = 1;
                Log::alert("set fo the first time");
            }
        }
    }
}

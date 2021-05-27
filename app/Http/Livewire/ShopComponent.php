<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        if($this->sorting=='date'){
            $products = Product::orderBy('created_at','DESC')->Paginate($this->pagesize); 
        }
        else if($this->sorting=='price'){
            $products = Product::orderBy('regular_price','ASC')->Paginate($this->pagesize); 
        }
        if($this->sorting=='price-desc'){
            $products = Product::orderBy('regular_price','DESC')->Paginate($this->pagesize); 
        }
        else{
            $products = Product::Paginate($this->pagesize);
        }    
        $Categories = Category::all();   
        return view('livewire.shop-component',['products'=>$products,'Categories'=>$Categories])->layout('layouts.base');
    }
}

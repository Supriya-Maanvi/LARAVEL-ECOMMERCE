<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use Cart;

class CategoryComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $category_slug;

    public function mount($category_slug){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->category_slug = $category_slug;
    }

    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added in cart');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render() 
    {
        $category = Category::where('slug',$this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;
        if($this->sorting=='date'){
            $products = Product::where('category_id',$category->id)->orderBy('created_at','DESC')->Paginate($this->pagesize); 
        }
        else if($this->sorting=='price'){
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','ASC')->Paginate($this->pagesize); 
        }
        if($this->sorting=='price-desc'){
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','DESC')->Paginate($this->pagesize); 
        }
        else{
            $products = Product::where('category_id',$category->id)->Paginate($this->pagesize);
        }    
        $Categories = Category::all();   
        return view('livewire.category-component',['products'=>$products,'Categories'=>$Categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}

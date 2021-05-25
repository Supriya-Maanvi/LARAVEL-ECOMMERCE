<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
//use Cart;
class ShopComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $products = product::Paginate(12);
        return view('livewire.shop-component',['products'=>$products])->layout('layouts.base');
    }
}

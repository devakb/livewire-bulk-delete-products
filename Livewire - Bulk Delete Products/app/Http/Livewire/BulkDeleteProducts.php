<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class BulkDeleteProducts extends Component
{
    public $selected_products;

    public function mount(){
        $this->selected_products = [];
    }

    public function render()
    {
        $products = Product::with('category')->get();
        return view('livewire.bulk-delete-products', compact('products'));
    }

    public function deleteSelected(){

        if(count($this->selected_products) > 0){

            Product::whereIn('id', $this->selected_products)->delete();

        }

        $this->selected_products = [];
    }
}

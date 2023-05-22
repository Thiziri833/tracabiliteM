<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Structure;
use App\Models\Line;
use Livewire\Component;

class StructureLineProduct extends Component
{
    public $structures;
    public $lines;
    public $products;

    public $selectedStructure =null;
    public $selectedLine = null;
    public $selectedProduct = null;

    public function mount($selectedProduct = null)
    {
        $this->structures = Structure::all();
        $this->lines = collect();
        $this->products = collect();
        $this->selectedProduct = $selectedProduct;

        if (!is_null($selectedProduct)) {
            $product = Product::with('line.structure')->find($selectedProduct);
            if ($product) {
                $this->products = Product::where('line_id', $product->line_id)->get();
                $this->lines = Line::where('structure_id', $product->line->structure_id)->get();
                $this->selectedStructure = $product->line->structure_id;
                $this->selectedLine = $product->line_id;
            }
        }
    }

    public function render()
    {
        return view('livewire.structure-line-product');
    }

    public function updatedSelectedStructure($structure)
    {
        $this->lines = Line::where('structure_id', $structure)->get();
        $this->selectedLine = NULL;
    }

    public function updatedSelectedLine($line)
    {
        if (!is_null($line)) {
            $this->products = Product::where('line_id', $line)->get();
        }
    }
}

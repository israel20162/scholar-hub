<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SearchableSelect extends Component
{
    public $search = '';
    public $results = [];

    public $category_id=null;

    #[Computed]
    public function categories()
    {
        return Category::get();
    }
    public function updatedSearch()
    {
        // Here, you'd typically search the database for items matching the search input.
        // For demonstration purposes, we're using a static list.
        $allItems = array($this->categories());
      //  dd($this->category);
// dd($allItems);
        $this->results = collect($allItems)->filter(function ($item) {
            return str_contains(strtolower($item), strtolower($this->search));
        })->values()->toArray();
        
    }
    public function render()
    {
        return view('livewire.searchable-select');
    }
}

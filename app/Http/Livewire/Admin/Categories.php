<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;
    
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Category::latest('id')->paginate(15);
        return view('livewire.admin.categories', compact('categories'));
    }
}

<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null)
{
    $this->categories = Category::query()
    ->join('category')
}


    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}

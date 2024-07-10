<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class AdvancedSearchPosts extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $perPage = 10;

    protected $updatesQueryString = ['searchTerm', 'page'];

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $posts = Post::where('title', 'like', $searchTerm)
            ->orWhere('content', 'like', $searchTerm)
            ->paginate($this->perPage);

        return view('livewire.advanced-search-posts', [
            'posts' => $posts,
        ]);
    }
}

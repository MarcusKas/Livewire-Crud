<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Showpost extends Component
{

    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;

        return view('livewire.showpost', compact('post'));
    }
    public function render()
    {
        // $post = Post::find($id);
        // dd($post->title);
        return view('livewire.showpost');
    }
}

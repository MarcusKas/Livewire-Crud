<?php

namespace App\Http\Livewire;

use App\Models\Post as ModelsPost;
use Livewire\Component;

class Post extends Component
{


    public function render()
    {
        $posts = ModelsPost::latest()->get();

        return view('livewire.post', compact('posts'));
    }
    public function remove($id)
    {
        $post = ModelsPost::find($id);
        $post->delete();
    }
    // create post

    public $title;
    public $body;
    public $post_id;

    protected $rules = [
        'title' => 'required|min:6',
        'body' => 'required|max:255|min:6',
    ];

    // real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createpost()
    {

        $validatedData = $this->validate();

        ModelsPost::create($validatedData);

        $this->title = '';
        $this->body = '';
    }

    // edit post
    public function editpost($id)
    {
        $post = ModelsPost::find($id);

        if ($post) {
            $this->title = $post->title;
            $this->body = $post->body;
            $this->post_id = $post->id;
        } else {
            return redirect()->back();
        }
    }

    public function Updatepost($post_id)
    {

        $validatedData = $this->validate();
        $post = ModelsPost::find($post_id);
        $post->update($validatedData);
    }
}

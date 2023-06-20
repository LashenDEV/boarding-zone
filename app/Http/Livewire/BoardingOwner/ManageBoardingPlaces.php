<?php

namespace App\Http\Livewire\BoardingOwner;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageBoardingPlaces extends Component
{
    use WithFileUploads;

    use WithPagination;

    public $postId, $categoryId, $title, $old_thumbnail, $thumbnail, $article, $category, $tags, $shortDescription, $status, $slug, $search = '';
    protected $rules = [
        'title' => 'required',
        'article' => 'required',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024',
        'category' => 'required',
        'tags' => 'required',
        'shortDescription' => 'required',
    ];

    public function render()
    {
        return view('livewire.boarding-owner.manage-boarding-places');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetFields()
    {
        $this->reset();
    }

    //Generate Slug
    public function generateSlug()
    {
        $this->slug = SlugService::createSlug(Post::class, 'slug', $this->title);
    }


    public function storePostData()
    {
        $this->validate();

        $post = new Post();
        $post->title = $this->title;
        $post->article = $this->article;
        $post->category_id = $this->category;
        $thumbnail_name = $this->thumbnail->store('thumbnails', 'public');
        $post->thumbnail = $thumbnail_name;
        $post->tags = $this->tags;
        $post->shortDescription = $this->shortDescription;
        $post->status = 'Drafted';
        $post->slug = $this->slug;
        $post->save();

        session()->flash('success', 'Post added successfully');

        $this->reset();

        $this->dispatchBrowserEvent('post-created', ['createModalShow' => false]);
        $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
    }

    public function editPost($id)
    {
        $this->reset();

        $post = Post::whereId($id)->first();
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->article = $post->article;
        $this->category = $post->category_id;
        $this->categoryId = $post->category_id;
        $this->old_thumbnail = $post->thumbnail;
        $this->tags = $post->tags;
        $this->shortDescription = $post->shortDescription;
        $this->status = 'Drafted';
        $this->slug = $post->slug;

        $this->dispatchBrowserEvent('post-data', ['postData' => $this->article]);
    }

    public function editPostData()
    {
        $post = Post::whereId($this->postId)->first();
        $post->title = $this->title;
        $post->article = $this->article;
        $post->category_id = $this->categoryId;

        if ($this->thumbnail) {
            if ($this->thumbnail->isFile()) {
                if (file_exists(public_path('storage/' . $this->old_thumbnail))) {
                    unlink(public_path('storage/' . $this->old_thumbnail));
                }
                $thumbnail_name = $this->thumbnail->store('thumbnails', 'public');
                $post->thumbnail = $thumbnail_name;
            }
        }

        $post->tags = $this->tags;
        $post->shortDescription = $this->shortDescription;
        $post->status = 'Drafted';
        $post->slug = $this->slug;
        $post->save();

        session()->flash('success', 'Post Updated Successfully');

        $this->reset();

        $this->dispatchBrowserEvent('post-updated', ['editModalShow' => false]);
        $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
    }

    public function deletePost($id)
    {
        $this->postId = Post::findOrFail($id)->id;
        $this->old_thumbnail = Post::findOrFail($id)->thumbnail;
    }

    public function deletePostData()
    {
        if (file_exists(public_path('storage/' . $this->old_thumbnail))) {
            unlink(public_path('storage/' . $this->old_thumbnail));
        }

        Post::findOrFail($this->postId)->delete();
        session()->flash('success', 'Post Deleted Successfully');

        $this->reset();
        $this->dispatchBrowserEvent('post-deleted', ['deletedModalShow' => false]);
        $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
    }
}

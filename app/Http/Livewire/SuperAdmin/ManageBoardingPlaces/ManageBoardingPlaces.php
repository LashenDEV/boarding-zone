<?php

namespace App\Http\Livewire\SuperAdmin\ManageBoardingPlaces;

use App\Models\BoardingPlace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageBoardingPlaces extends Component
{
    use WithFileUploads;

    use WithPagination;

    public $name, $old_thumbnail, $thumbnail, $price, $boardingId, $publish_status;
    protected $rules = [
        'name' => 'required',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024',
        'price' => 'required',
    ];

    public function render()
    {
        $boarding_places = BoardingPlace::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.super-admin.manage-boarding-places.manage-boarding-places', compact('boarding_places'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetFields()
    {
        $this->reset();
    }


    public function storePostData()
    {
        $this->validate();

        $post = new BoardingPlace();
        $post->name = $this->name;
        $thumbnail_name = $this->thumbnail->store('thumbnails', 'public');
        $post->thumbnail = $thumbnail_name;
        $post->publish_status = 'Drafted';
        $post->price = $this->price;
        $post->bowner_id = Auth::user()->id;
        $post->save();

        session()->flash('success', 'Boarding Place added successfully');

        $this->reset();

        $this->dispatchBrowserEvent('post-created', ['createModalShow' => false]);
        $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
    }

    public function editPost($id)
    {
        $this->reset();

        $boarding_place = BoardingPlace::whereId($id)->first();
        $this->boardingId = $boarding_place->id;
        $this->name = $boarding_place->name;
        $this->old_thumbnail = $boarding_place->thumbnail;
        $this->publish_status = $boarding_place->publish_status;
        $this->price = $boarding_place->price;

//        $this->dispatchBrowserEvent('post-data', ['postData' => $this->article]);
    }

    public function editPostData()
    {
        $boarding_place = BoardingPlace::whereId($this->boardingId)->first();
        $boarding_place->name = $this->name;
        if ($this->thumbnail) {
            if ($this->thumbnail->isFile()) {
                if (file_exists(public_path('storage/' . $this->old_thumbnail))) {
                    unlink(public_path('storage/' . $this->old_thumbnail));
                }
                $thumbnail_name = $this->thumbnail->store('thumbnails', 'public');
                $boarding_place->thumbnail = $thumbnail_name;
            }
        }
        $boarding_place->price = $this->price;
        $boarding_place->bowner_id = Auth::user()->id;
        $boarding_place->save();

        session()->flash('success', 'Boarding Updated Successfully');

        $this->reset();

        $this->dispatchBrowserEvent('post-updated', ['editModalShow' => false]);
        $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
    }

    public function deletePost($id)
    {
        $this->boardingId = BoardingPlace::findOrFail($id)->id;
        $this->old_thumbnail = BoardingPlace::findOrFail($id)->thumbnail;
    }

    public function deletePostData()
    {
        if (file_exists(public_path('storage/' . $this->old_thumbnail))) {
            unlink(public_path('storage/' . $this->old_thumbnail));
        }

        BoardingPlace::findOrFail($this->boardingId)->delete();
        session()->flash('success', 'Post Deleted Successfully');

        $this->reset();
        $this->dispatchBrowserEvent('post-deleted', ['deletedModalShow' => false]);
        $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
    }

    public function approveBoardingPlace($id)
    {
        $boarding_place = BoardingPlace::findOrFail($id);
        $boarding_place->publish_status = 'Approved';
        $boarding_place->save();
    }

    public function rejectBoardingPlace($id)
    {
        $boarding_place = BoardingPlace::findOrFail($id);
        $boarding_place->publish_status = 'Rejected';
        $boarding_place->save();
    }
}

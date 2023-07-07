<?php

namespace App\Http\Livewire\BoardingOwner\ManageBoardingPlaces;

use App\Models\BoardingPlace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageBoardingPlaces extends Component
{
    use WithFileUploads;

    use WithPagination;

    public $name, $old_thumbnail, $thumbnail, $price, $boardingId, $publish_status, $number_of_rooms, $target_audience, $availability = 1, $payment_method, $latitude, $longitude, $features;
    protected $rules = [
        'name' => 'required',
        'thumbnail' => 'required|image|mimes:jpeg,png,jpg,webp|max:1024',
        'price' => 'required',
        'number_of_rooms' => 'required',
        'target_audience' => 'required',
        'availability' => 'required',
        'payment_method' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'features' => 'required'
    ];

    public function render()
    {
        $boarding_places = BoardingPlace::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.boarding-owner.manage-boarding-places.manage-boarding-places', compact('boarding_places'));
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
        $post->publish_status = 'Pending';
        $post->price = $this->price;
        $post->number_of_rooms = $this->number_of_rooms;
        $post->target_audience = $this->target_audience;
        $post->availability = $this->availability;
        $post->payment_method = $this->payment_method;
        $post->latitude = $this->latitude;
        $post->longitude = $this->longitude;
        $post->features = $this->features;
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
        $this->number_of_rooms = $boarding_place->number_of_rooms;
        $this->target_audience = $boarding_place->target_audience;
        $this->availability = $boarding_place->availability;
        $this->payment_method = $boarding_place->payment_method;
        $this->latitude = $boarding_place->latitude;
        $this->longitude = $boarding_place->longitude;
        $this->features = $boarding_place->features;

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
        $boarding_place->number_of_rooms = $this->number_of_rooms;
        $boarding_place->target_audience = $this->target_audience;
        $boarding_place->availability = $this->availability;
        $boarding_place->payment_method = $this->payment_method;
        $boarding_place->latitude = $this->latitude;
        $boarding_place->longitude = $this->longitude;
        $boarding_place->features = $this->features;
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
}

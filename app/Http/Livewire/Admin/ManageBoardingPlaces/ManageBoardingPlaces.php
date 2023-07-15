<?php

namespace App\Http\Livewire\Admin\ManageBoardingPlaces;

use App\Models\BoardingPlace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ManageBoardingPlaces extends Component
{
    use WithFileUploads;

    use WithPagination;

    public $name, $old_thumbnail, $thumbnail, $price;


    public function render()
    {
        $boarding_places = BoardingPlace::orderBy('id', 'DESC')->paginate(4);
        return view('livewire.admin.manage-boarding-places.manage-boarding-places', compact('boarding_places'));
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetFields()
    {
        $this->reset();
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

<?php

namespace App\Http\Livewire;

use App\Models\BoardingPlace;
use App\Models\ReservedBoardingPlaces;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class BoardingPlaces extends Component
{
    use WithPagination;

    public function reserve($boarding_place_id)
    {
        if (Auth::user()) {
            $reserved_boarding_place = new ReservedBoardingPlaces();
            $reserved_boarding_place->boarding_place_id = $boarding_place_id;
            $reserved_boarding_place->boarder_id = Auth::user()->id;
            $reserved_boarding_place->save();

            $boarding_place = BoardingPlace::whereId($boarding_place_id)->first();
            $boarding_place->is_reserved = 'Yes';
            $boarding_place->save();

            session()->flash('success', 'Boarding place is reserved successfully');

            $this->reset();

            $this->dispatchBrowserEvent('flash-message', ['flashMessageShow' => true]);
        } else {
            $this->redirect('/login');
        }
    }

    public function render()
    {
        $boarding_places = BoardingPlace::where('publish_status', 'Approved')->where('is_reserved', 'No')->paginate(4);
        return view('livewire.boarding-places', compact('boarding_places'));
    }

}

<?php

namespace App\Http\Livewire;

use App\Models\BoardingPlace;
use App\Models\Notification;
use Livewire\Component;

class BoardingReviews extends Component
{
    public $boarding_id;
    public $username;
    public $email;
    public $ratings;
    public $comment;

    public $selectedRating = 0;

    public function render()
    {
        $reviews = \App\Models\BoardingReviews::get();
        return view('livewire.boarding-reviews', compact('reviews'));
    }

    public function setRating($rating)
    {
        $this->ratings = $rating;
        $this->selectedRating = $rating;
    }

    public function colorStars($index)
    {
        return $index - 1 < $this->selectedRating ? 'gold' : '';
    }

    public function submitReview()
    {
        $this->validate([
            'boarding_id' => 'required',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'ratings' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        \App\Models\BoardingReviews::create([
            'boarding_id' => $this->boarding_id,
            'username' => $this->username,
            'email' => $this->email,
            'rating' => $this->ratings,
            'comment' => $this->comment,
        ]);

        Notification::create([
            'username' => $this->username,
            'bowner_id' => BoardingPlace::whereId($this->boarding_id)->first()['bowner_id'],
            'boarding_id' => $this->boarding_id,
            'message' => 'Added a Review',
            'icon' => '<i class="fa fa-star" aria-hidden="true"></i>'
        ]);

        $this->reset(['username', 'email', 'ratings', 'comment', 'boarding_id']);

        session()->flash('message', 'Review submitted successfully!');
    }
}

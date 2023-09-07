<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BoardingReviews extends Component
{
    public $boarding_id;
    public $username;
    public $email;
    public $rating;
    public $comment;

    public function render()
    {
        $reviews = \App\Models\BoardingReviews::get();
        return view('livewire.boarding-reviews', compact('reviews'));
    }

    public function submitReview()
    {
        $this->validate([
            'boarding_id' => 'required',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        \App\Models\BoardingReviews::create([
            'boarding_id' => $this->boarding_id,
            'username' => $this->username,
            'email' => $this->email,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        $this->reset(['username', 'email', 'rating', 'comment', 'boarding_id']);

        session()->flash('message', 'Review submitted successfully!');
    }
}

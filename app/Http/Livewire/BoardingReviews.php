<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BoardingReviews extends Component
{
    public $name;
    public $email;
    public $rating;
    public $comment;

    public function render()
    {
        return view('livewire.boarding-reviews');
    }

    public function submitReview()
    {
        $this->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:500',
        ]);

        Review::create([
            'username' => $this->name,
            'email' => $this->email,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        $this->reset(['name', 'email', 'rating', 'comment']);

        session()->flash('message', 'Review submitted successfully!');
    }
}

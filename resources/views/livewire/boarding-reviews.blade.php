@push('Styles')
    <style>
        .stars {
            display: inline-block;
        }

        .star {
            font-size: 24px;
            cursor: pointer;
            color: gray;
        }

        .star.gold {
            color: gold;
        }
    </style>
@endpush

@if (session()->has('message'))
    <div class="bg-green-100 text-green-800 p-3 mb-4">{{ session('message') }}</div>
@endif
<div>
    <div class="p-4 flex w-full bg-white rounded shadow-md">
        <div class="w-1/2">
            <form wire:submit.prevent="submitReview">
                <h2 class="text-xl font-semibold mb-2">Write Your Review</h2>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
                    <div class="stars">
                        @foreach(range(1, 5) as $index)
                            <span class="star {{ $this->colorStars($index) }}"
                                  wire:click="setRating({{ $index }})">★</span>
                        @endforeach
                    </div>
                    <input type="hidden" wire:model="ratings" id="ratingInput" value="{{ $ratings }}"
                           class="mt-1 p-2 border rounded-md w-full">
                    @error('ratings') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Name:</label>
                    <input type="hidden" wire:model="boarding_id" value="{{$boarding_id}}">
                    <input type="text" wire:model="username" id="username"
                           class="mt-1 p-2 border rounded-md w-full @error('username') border-red-500 @enderror">
                    @error('username') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" wire:model="email" id="email"
                           class="mt-1 p-2 border rounded-md w-full @error('email') border-red-500 @enderror">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment:</label>
                    <textarea wire:model="comment" id="comment"
                              class="mt-1 p-2 border rounded-md w-full h-32 @error('comment') border-red-500 @enderror"></textarea>
                    @error('comment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Submit Review
                </button>
            </form>

        </div>

        <div class="px-4 w-1/2 bg-white">
            <div class="mb-6">
                <h2 class="text-xl font-semibold mb-2">Existing Reviews</h2>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($reviews as $review)
                        <div class="bg-gray-100 p-4 rounded-md mb-2">
                            <p><strong>Rating:</strong>
                            <div class="stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <span class="star gold">★</span>
                                    @else
                                        <span class="star">★</span>
                                    @endif
                                @endfor
                            </div>
                            </p>
                            <p><strong>Name:</strong> {{ $review->username }}</p>
                            <p><strong>Email:</strong> {{ $review->email }}</p>
                            <p><strong>Comment:</strong> {{ $review->comment }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@push('Scripts')
    <script>
        let selectedRating = 0;
        const stars = document.querySelectorAll('.star');

        function setRating(rating) {
            selectedRating = rating;
            ratingInput.value = rating;
        }

        function colorStars() {
            stars.forEach((star, index) => {
                if (index < selectedRating) {
                    star.classList.add('gold');
                } else {
                    star.classList.remove('gold');
                }
            });
        }
    </script>
@endpush

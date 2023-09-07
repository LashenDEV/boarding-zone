<div class="p-4 bg-white rounded shadow-md">
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-3 mb-4">{{ session('message') }}</div>
    @endif

    <div class="p-4 bg-white rounded shadow-md">

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Existing Reviews</h2>
            @foreach($reviews as $review)
                <div class="bg-gray-100 p-3 rounded-md mb-2">
                    <p><strong>Name:</strong> {{ $review->username }}</p>
                    <p><strong>Email:</strong> {{ $review->email }}</p>
                    <p><strong>Rating:</strong> {{ $review->rating }}</p>
                    <p><strong>Comment:</strong> {{ $review->comment }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <form wire:submit.prevent="submitReview">
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
            <label for="rating" class="block text-sm font-medium text-gray-700">Rating:</label>
            <select wire:model="rating" id="rating"
                    class="mt-1 p-2 border rounded-md w-full @error('rating') border-red-500 @enderror">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            @error('rating') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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

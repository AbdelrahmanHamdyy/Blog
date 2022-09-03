@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments" class="mt-5">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="40" height="60" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <label>
<textarea name="body" rows="5" class="w-full text-sm focus:outline-none focus:ring"
          placeholder="Quick, think of something to say!" required>
</textarea>
                </label>

                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                <x-submit-button>
                    Post
                </x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline text-blue-500">Register</a> or <a href="/login" class="hover:underline text-blue-500">Log in</a> to leave a comment.
    </p>
@endauth

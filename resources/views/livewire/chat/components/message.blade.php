<article>

    <div class="flex items-end my-6 {{$is_received ? 'justify-end  ':''}}">
        <div class="flex flex-col  space-y-2 text-xs max-w-xs mx-2 order-2 items-end">
            <div class="px-4 py-2 max-w-prose rounded-lg md:text-sm !whitespace-normal {{$is_received ? ' bg-indigo-600':'bg-green-500'}}  text-white">
                {{ $message }}
            </div>
        </div>
        <img src="{{ Auth::user()->profile_photo_url }}" alt="My Name" class="w-6 h-6 rounded-full order-1">
    </div>

</article>

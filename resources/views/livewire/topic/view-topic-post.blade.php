  <!-- Individual Topic View Page -->
<div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl capitalize font-bold text-white text-center">{{$topic->title}}</h1>
    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-12">

        <!-- Topic Details -->
        <article class="mb-12">
            <header class="flex justify-between items-center mb-6">
               <span class="text-gray-600 dark:text-gray-400  ">By: <span class="dark:text-indigo-600"> {{$topic->user->name}}</span> </span>
                <span class="text-sm text-gray-600 dark:text-gray-400">Category: <strong class="text-indigo-600 dark:text-indigo-400"> @foreach (json_decode($topic->categories) as $category)
                            <span class="text-sm dark:text-indigo-600">{{ $category }},</span>
                        @endforeach</strong></span>
            </header>
            <div class="text-gray-700 dark:text-gray-300 space-y-4">
                <!-- Topic Content -->
                <p>
                   {{$topic->body}}
                </p>
                <!-- ... more paragraphs, images, and other content ... -->
            </div>
        </article>


<div class="flex justify-end pb-12  items-baseline md:justify-center md:items-center md:p-4">
    @if($topic->likedByUsers->contains(auth()->id()))
        <button wire:click="unlikePost" class="bg-red-500 text-white px-4 py-2 rounded">Unlike</button>
    @else
        <button wire:click="likePost" class="bg-indigo-500 text-white px-4 py-2 rounded">Like</button>
    @endif
    <span class="text-sm dark:text-gray-500 mx-4">{{ $topic->likes_count }} {{ Str::plural('like', $topic->likes_count) }}</span>
</div>
        <!-- Replies/Comments Section -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-300 mb-6">Replies ({{$topic->replies->count()}})</h2>

            <!-- Individual Reply -->
             @forelse ($topic->replies as $reply)
<div class="mb-8 bg-gray-100 dark:bg-gray-800 p-4 rounded-lg">
                <header class="mb-4 flex justify-between">
                    <span class="text-gray-600 capitalize dark:text-gray-400">{{$reply->user?->name}}</span>
                    <span class="text-sm text-gray-600 dark:text-gray-400">{{$reply->created_at->diffForHumans()}}</span>
                </header>
                <div class="text-gray-700 dark:text-gray-300">
                    <p>{{$reply->body}}</p>
                </div>
            </div>
             @empty
<h1 class="text-2xl text-center w-full mx-auto">No Replies</h1>
             @endforelse



            <!-- Reply Form -->
            <div class="w-full flex  flex-col">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-300 mb-4">Leave a Reply:</h3>
                <textarea wire:model="reply" class="w-full p-4 mb-4 rounded-lg dark:bg-gray-800 dark:text-gray-300" rows="4" placeholder="Share your thoughts..."></textarea>
                <button wire:click="addReply" wire:loading.attr="disabled" class="px-6 py-2 w-fit justify-end ml-auto md:m-0 rounded-lg bg-indigo-600 text-white  hover:bg-indigo-700 transition">Submit Reply <span wire:loading wire:target="addReply">...</span></button>
            </div>
        </section>
    </div>


</div>

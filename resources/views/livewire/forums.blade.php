<div class="bg-white md:border-r border-s-0 dark:border-gray-700  ml-10 dark:bg-gray-900  transition-colors duration-500">

    <!-- Page Header -->
    <div class=" py-6">
        <h1 class="text-3xl md:text-4xl font-bold text-white text-center">Forums & Discussions</h1>
    </div>

    <div class="flex justify-between items-center p-4">
        <!-- Tab Menu -->
        <div class="mb-6">
            <button wire:click="switchTab('newest')"
                class="{{ $tab === 'newest' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500' }} mr-4">Newest</button>
            <button wire:click="switchTab('popular')"
                class="{{ $tab === 'popular' ? 'text-indigo-600 border-b-2 border-indigo-600' : 'text-gray-500' }}">Popular</button>
        </div>

        <!-- Create New Post Button -->
        <div class="mb-6">
            <a href="{{ route('forum.create') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Create New
                Post</a>
        </div>

    </div>

    <!-- Main Content Container -->
    <div class="container mx-auto px-4 py-">

        <!-- Search Bar -->
        <div>
           <x-search-box placeHolder='discussions'/>
        </div>

        <!-- Discussion Threads List -->
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($posts as $post)
                <li class="py-6">
                    <div class="flex justify-between">
                        <!-- Thread Title -->
                        <a href="{{ route('forum.single', ['id' => $post->id]) }}"
                            class="text-xl text-gray-900 dark:text-gray-100 hover:underline">{{ $post->title }}</a>
                        <span class="text-sm dark:text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                    </div>


                    <!-- Thread Details -->
                    <div class="mt-2 flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                        <span class="capitalize">By: {{ $post->user->name }}</span>
                        <p class="gap-2 flex"><span>{{ $post->likes_count }} likes
                            </span><span>{{ $post->replies->count() }} comments</span></p>

                    </div>
                    <div>
                        @foreach (json_decode($post->tags) as $tag)
                            <span class="text-sm dark:text-indigo-600">#{{ $tag }}</span>
                        @endforeach
                    </div>

                    <!-- Thread Snippet -->
                    <p class="mt-4 text-gray-700 dark:text-gray-300">
                       {{ Str::limit( $post->body,100)}}
                    </p>
                </li>
            @endforeach

            <!-- Single Discussion Thread (Repeat for each thread) -->


            <!-- Repeat the above <li> for additional threads -->

        </ul>

        <!-- Pagination (If necessary) -->
        <div class="mt-12 flex justify-center">
            <a href="#" class="mx-2 px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">1</a>
            <a href="#"
                class="mx-2 px-4 py-2 rounded-lg bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">2</a>
            <!-- ... Additional Page Numbers ... -->
            <a href="#"
                class="mx-2 px-4 py-2 rounded-lg bg-white dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700">Next</a>
        </div>
    </div>


</div>

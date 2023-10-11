  <div class="bg-white dark:bg-gray-900 md:ml-10 min-h-screen transition-colors duration-500">
      <!-- Flash message for post creation -->
      @if (session()->has('message'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ session('message') }}</span>
          </div>
      @endif
      <!-- Page Header -->
      <div class=" py-6">
          <h1 class="text-3xl md:text-4xl font-bold text-white text-center">Topics</h1>
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
              <a href="{{ route('topic.create') }}"
                  class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Create New
                  Topic</a>
          </div>

      </div>


      <!-- Main Content Container -->
      <div class="container mx-auto px-4 ">
          <!-- Search Bar -->
          <div>
              <x-search-box placeHolder='topics' />
          </div>

          <!-- Topics List -->
          <ul class="divide-y divide-gray-200 dark:divide-gray-700">
              @foreach ($topics as $topic)
                  <li class="py-6">
                      <div class="flex justify-between">
                          <!-- Thread Title -->
                          <a href="{{ route('topic.single', ['id' => $topic->id]) }}"
                              class="text-xl text-gray-900 dark:text-gray-100 hover:underline">{{ $topic->title }}</a>
                          <span class="text-sm dark:text-gray-500">{{ $topic->created_at->diffForHumans() }}</span>
                      </div>


                      <!-- Thread Details -->
                      <div class="mt-2 flex justify-between items-center text-sm text-gray-600 dark:text-gray-400">
                          <span class="capitalize">By: {{ $topic->user->name }}</span>
                          <p class="gap-2 flex"><span>{{ $topic->likes_count }} likes
                                  {{-- </span><span>{{ $topic->replies->count() }} comments</span></p> --}}

                      </div>
                      <div>
                          @foreach (json_decode($topic->categories) as $category)
                              <span class="text-sm dark:text-indigo-600">#{{ $category }}</span>
                          @endforeach
                      </div>
                      <!-- Thread Snippet -->
                      <article class=" !mt-4 child:dark:text-gray-300 child:first-letter:capitalize first-letter:capitalize  dark:!text-gray-300   ">
                          {!! Str::limit($topic->body, 100) !!}</article>


                  </li>
              @endforeach




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

      <!-- Page Footer (optional) -->
      <footer class="bg-gray-100 dark:bg-gray-800 py-6">
          <!-- Footer content, such as links, copyrights, etc. -->
      </footer>
  </div>

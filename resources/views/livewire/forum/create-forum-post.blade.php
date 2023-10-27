<div class="max-w-2xl mx-auto my-10 px-4 py-6 bg-white dark:bg-gray-800 rounded shadow-xl">



    <!-- Flash message for post creation -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    <!-- Title Input -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title:</label>
        <input wire:model="title" type="text"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>

    <!-- Body Textarea -->
    <div class="mb-4">
        <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
        <textarea wire:model="body" rows="5"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        @error('body')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>
    {{-- image --}}
    <div class="flex gap-2">
        <label
            class="w-80 flex justify-evenly items-center px-4 py-4 bg-white dark:bg-gray-900 dark:border-0 dark:text-indigo-600 text-blue rounded-lg  tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue e">
            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
            </svg>
            <span class="mt-2 text-base leading-normal">upload image</span>
            <input wire:model.live.debounce.300ms='image' class="hidden" aria-describedby="file_input_help"
                id="file_input" type="file" accept=".png,.jpg,.gif,.jpeg,.svg">
        </label>
        <div wire:loading.delay class='text-green-500 my-auto'>
            <img src="{{ asset('svg/spinner.svg') }}" class="h-8 w-8 " alt="loading..." srcset="">
        </div>
    </div>
    <div class="mb-4">

        @if ($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-64 rounded"> <!-- Image preview -->
            </div>
        @endif
    </div>

    {{-- tags --}}
    <div class="mb-4">
        <label for="tags" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Tags (comma
            separated):</label>
        <input wire:model="tags" type="text"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('tags')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="text-right">
        <button wire:click="createPost"
            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 dark:bg-indigo-800 dark:hover:bg-indigo-900">Create
            Post</button>
    </div>
</div>

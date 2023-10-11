<div class="max-w-4xl mx-auto my-10 px-4 py-6 bg-white dark:bg-gray-800 rounded shadow-xl">



    <!-- Flash message for post creation -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl dark:text-gray-300 font-bold mb-6">Create a New Topic</h1>

        <form>
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title"
                    class="block text-gray-700 dark:text-gray-300 text-base font-bold mb-2">Title:</label>
                <input wire:model="title" type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('title')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <style>
                .no-tailwind>h1 {
                    all: unset !important;
                }
            </style>
            <!-- Rich Text Editor - Example using Quill.js -->
            <div class="mb-4">
                <label for="body"
                    class="block dark:text-gray-300 text-lg font-medium mb-2">Explanation/Content:</label>
                @livewire('topic.quill-editor')
                @error('body')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror


            </div>
            <div x-data="{ open: false, search: '', showPreview: true }" @click.away="open = false" class="relative p-2 mb-4">
                <!-- ... -->

                <!-- Toggle Preview Button -->
                <button type="button" @click="showPreview = !showPreview"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Toggle Post Preview
                </button>

                <!-- Post Preview Section -->
                <div x-show="showPreview" class="mt-4 p-4 border rounded">
                    <h2 class="text-2xl dark:text-gray-300  mb-2">Post Preview:</h2>
                    <div class="child:dark:text-gray-300 no-tailwin ql-editor ">{!! $body !!}</div>
                </div>
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
                        id="file_input" type="file" accept=".png,.jpg,.gif,.jpeg,">
                </label>
                <div wire:loading.delay wire:target='image' class='text-green-500 my-auto'>
                    <img src="{{ asset('svg/spinner.svg') }}" class="h-8 w-8 " alt="loading..." srcset="">
                </div>
            </div>
            <div class="mb-4">

                @if ($image)
                    <div class="mt-2">
                        <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-64 rounded">
                        <!-- Image preview -->
                    </div>
                @endif
            </div>

            {{-- categories --}}
            <div class="mb-4">
                <label for="category"
                    class="block text-gray-700 dark:text-gray-300 text-base font-bold mb-2">Category:</label>
                <select wire:model='category_id'
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline""
                    name="" id="">
                    @forelse ($this->categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @empty
                        <p>No results found!</p>
                    @endforelse
                </select>

            </div>
            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-base dark:text-gray-300 font-medium mb-2">Tags (comma
                    separated):</label>
                <input type="text" id="tags" wire:model='tags' name="tags"
                    placeholder="e.g. Mathematics, Algebra"
                    class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline"">
            </div>

            <!-- Submit & Draft Buttons -->
            <div x-data="{ showModal: false }" class="flex space-x-4">
                <button @click="showModal = true" type="button"  name="submit_type"
                    value="publish"
                    class="px-5 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:bg-blue-700">Publish
                    Topic</button>
                {{-- <button type="submit" name="submit_type" value="draft"
                    class="px-5 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 focus:bg-gray-700">Save as
                    Draft</button> --}}
                <!-- Modal -->
                <template x-teleport="body">
                    <div x-show="showModal" class="fixed dark:text-white  z-10 inset-0 overflow-y-auto">
                        <div class="flex items-center justify-center min-h-screen px-4 py-12">
                            <div class="bg-white dark:bg-gray-700 rounded-lg p-8 z-50 shadow-xl">
                                <h2 class="text-xl font-bold mb-4">Confirm Publish</h2>
                                <p>Have you saved the draft you want to publish?</p>

                                <!-- Action buttons -->
                                <div class="mt-6 flex justify-end space-x-4">
                                    <!-- Proceed to Publish -->
                                    <button wire:click="createTopic" @click="showModal = false"
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                                        Yes, Publish
                                         <div wire:loading.delay wire:target='createTopic' class='text-green-500 my-auto'>
                    <img src="{{ asset('svg/spinner.svg') }}" class="h-8 w-8 " alt="loading..." srcset="">
                </div>
                                    </button>

                                    <!-- Close Modal -->
                                    <button @click="showModal = false"
                                        class="bg-gray-300 cursor-pointer text-black px-4 py-2 rounded hover:bg-gray-400">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- Overlay -->
                        <div @click="showModal = false" class="fixed inset-0 z-10  bg-black opacity-30"></div>
                    </div>
                </template>
            </div>
        </form>
    </div>
</div>

<div>
    <div class="max-w-4xl mx-auto mt-10 p-5 bg-white dark:bg-gray-800 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-700 dark:text-gray-200">Edit Topic</h2>

        <div>


            <!-- Topic Title -->
            <div class="mb-4">
                <label for="title"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Title:</label>
                <input type="text" id="title" name="title" value="{{ $topic->title }}" wire:model='title' required
                    class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <!-- Topic Category -->
            <div class="mb-4">
                <label for="category"
                    class="block text-sm font-semibold text-gray-700 dark:text-gray-200 mb-2">Category:</label>
                <select id="category" name="category" required
                wire:model='category_id'
                    class="w-full p-2 border rounded-md dark:bg-gray-700 dark:text-gray-200 focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $topic->category->id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Topic Content -->
            <div class="mb-4">
                <label for="body"
                    class="block dark:text-gray-300 text-lg font-medium mb-2">Explanation/Content:</label>
                @livewire('topic.quill-editor', ['body' => $topic->body])
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
                    <div class="child:dark:text-gray-300 no-tailwin ql-editor " wire:model='body'>{!! $body !!}</div>
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
                <div class="grid md:grid-cols-2 gap-4 items-center justify-between my-2">
                    <div class="mt-2">
                         <label for="current-image" class="text-xl text-center  dark:text-gray-300">Current Image</label>
                    <img src="{{ Storage::url($topic->image_path) }}" alt="Preview" id='current-image' class="w-full object-cover rounded">

                    </div>
                    @if ($image)
                        <div class="mt-2 flex flex-col">
                            <label for="new-image" class="text-xl text-center  dark:text-gray-300">New Image</label>

                            <img src="{{ $image->temporaryUrl() }}" alt="Preview" id="new-image" class="w-full object-cover rounded">
                            <!-- Image preview -->
                        </div>
                    @endif
                </div>


            </div>

            <!-- Tags -->
            <div class="mb-4">
                <label for="tags" class="block text-base dark:text-gray-300 font-medium mb-2">Tags (comma
                    separated):</label>
                {{-- @dd(json_decode($topic->categories)) --}}
                <input type="text" wire:model='tags' id="tags" name="tags" placeholder="e.g. Mathematics, Algebra"
                    value="{{ implode(',', json_decode($topic->categories)) }}"
                    class=" shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700  focus:outline-none focus:shadow-outline"">
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <button type="button" wire:click='updateTopic'
                    class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Update Topic
                </button>
            </div>
        </form>
    </div>

</div>

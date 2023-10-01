
   <div class="max-w-2xl mx-auto my-10 px-4 py-6 bg-white dark:bg-gray-800 rounded shadow-xl">
     <!-- Flash message for post creation -->
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    <form enctype="multipart/form-data">
        <div class="mb-4">
            <label for="title" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Title</label>
            <input type="text" wire:model="title" id="title" class="w-full px-3 py-2 border dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline rounded shadow-sm focus:ring focus:ring-opacity-50" required>
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Description</label>
            <textarea wire:model="description" id="description" class="w-full px-3 py-2 border dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline rounded shadow-sm focus:ring focus:ring-opacity-50"></textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col gap-2 mb-4">
        <label
            class="w-80 flex justify-evenly items-center px-4 py-4 bg-white dark:bg-gray-900 dark:border-0 dark:text-indigo-600 text-blue rounded-lg  tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue e">
            <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
            </svg>
            <span class="mt-2 text-base leading-normal">upload note</span>
            <input wire:model.live.debounce.300ms='note_pdf' class="hidden" aria-describedby="file_input_help"
                id="file_input" type="file" accept=".pdf">
        </label>

@error('note_pdf') <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
 


        <div>
            <button type="button" wire:click="uploadNote" wire:loading.attr="disabled" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:bg-blue-700">Upload</button>
        <img wire:loading.delay.long  class="h-8 w-8 my-auto" src="{{ asset('svg/spinner-2.svg') }}" /> </div>
    </form>
</div>



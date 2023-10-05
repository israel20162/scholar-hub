<div>
  <div class="container mx-auto px-4 py-6">

    <div class="mb-6">
        <h1 class="text-3xl font-bold dark:text-gray-300 text-center capitalize">{{ $note->title }}</h1>
    </div>

    @if($note->description)
    <div class="mb-4 p-4 bg-gray-100 dark:bg-gray-700 rounded shadow">
        <h2 class="text-xl dark:text-gray-300 font-semibold mb-2">Description</h2>
        <p class="text-gray-700 dark:text-gray-300 ">{{ $note->description }}</p>
    </div>
    @endif

    <div class="my-10">
        <h2 class="text-xl font-semibold dark:text-gray-300 mb-2">Note Preview</h2>
        @if($note->thumbnail_path)
        <div class="mb-4">
            <img src="{{ Storage::url($note->thumbnail_path) }}" alt="Note Thumbnail" class="shadow-md">
        </div>
        @endif
        <embed src="{{ Storage::url('app/'.$note->file_path) }}" type="application/pdf" class="w-full h-96">
    </div>

    <div class="mt-8">
        <a href="{{ route('note.download', $note->id) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:bg-blue-700">Download PDF</a>
    </div>

</div>
</div>

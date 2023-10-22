<div>
   <div class="container mx-auto px-4 py-6">

    <div class="mb-6">
        <h1 class="text-2xl dark:text-gray-300 text-center font-bold">Uploaded Notes</h1>
    </div>

    @if ($notes->count())
        <div class="grid grid-cols-1 md:grid-cols-2  gap-4">
            @foreach ($notes as $note)
            <div class="border dark:border-gray-800 rounded p-8 shadow hover:shadow-lg w-full transition duration-300">
                <h2 class="text-xl font-semibold mb-2 dark:text-gray-300 capitalize">{{ $note->title }}</h2>
                <p class="text-gray-700 truncate line-clamp-3 dark:text-gray-300 first-letter:capitalize">{{ $note->description }}</p>


                <!-- Displaying the uploader's name, if you wish -->
                <p class="text-sm text-gray-500 mt-2">Uploaded by: <span class="capitalize dark:text-indigo-500">{{ $note->user->name }}</span></p>

                <div class="mt-4">
                    <a href="{{ route('note.download', $note->id) }}" class="bg-green-500 hover:bg-green-600 text-white dark:text-gay-300 py-1 px-4 rounded">Download</a>
                      <a href="{{ route('note.single', $note->id) }}" class="bg-indigo-500 hover:bg-indigo-600 text-white py-1 px-4 rounded">View</a>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No notes have been uploaded yet.</p>
    @endif

</div>
</div>

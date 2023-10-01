<div>
   <div class="container mx-auto px-4 py-6">

    <div class="mb-6">
        <h1 class="text-2xl font-bold">Uploaded Notes</h1>
    </div>

    @if ($notes->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($notes as $note)
            <div class="border rounded p-4 shadow hover:shadow-lg transition duration-300">
                <h2 class="text-xl font-semibold mb-2">{{ $note->title }}</h2>
                <p class="text-gray-700 truncate">{{ $note->description }}</p>


                <!-- Displaying the uploader's name, if you wish -->
                <p class="text-sm text-gray-500 mt-2">Uploaded by: {{ $note->user->name }}</p>

                <div class="mt-4">
                    <a href="{{ route('note.download', $note->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded">Download</a>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No notes have been uploaded yet.</p>
    @endif

</div>
</div>

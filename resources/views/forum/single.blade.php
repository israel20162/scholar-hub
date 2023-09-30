<x-app-layout>
    <div class="grid md:grid-cols-4  overflow-x-clip">
        <div class="col-span-3 overflow-y-scroll border-r dark:border-gray-700 ">
            @livewire('view-forum-post', ['postId' => $postId])
        </div>

        <div class="col-span-1">
            {{-- side section --}}
            @livewire('forum-side-section')
        </div>
    </div>
</x-app-layout>

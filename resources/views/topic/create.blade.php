<x-app-layout>
    <div class="grid md:grid-cols-4  overflow-x-clip">
        <div class="col-span-3 overflow-y-scroll">

            @livewire('topic.create-topic-post')
        </div>

        <div class="col-span-1">
            {{-- side section --}}
            @livewire('side-section')
        </div>

    </div>

</x-app-layout>

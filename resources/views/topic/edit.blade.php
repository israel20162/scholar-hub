<x-app-layout>
    @livewire('topic.edit-topic-post',['topicId'=>$topicId], key(Auth::user()->id))
</x-app-layout>

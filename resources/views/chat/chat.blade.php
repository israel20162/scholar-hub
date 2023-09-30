<x-app-layout>




<div class="max-h-screen overflow-hidden">
    @livewire('chat.chat-messages')
    @livewire('chat.chat-form',['from_id'=>Auth::user()->id,'to_id'=>$to_id])
</div>




</x-app-layout>

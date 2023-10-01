<div>
    <div class='dark:text-white w-screen  '>
        <div class="flex h-screen bg-gray-100 dark:bg-gray-700">
            <!-- Chat Sidebar -->
            <div class="bg-white max-h-screen hidden md:block dark:bg-gray-700 dark:text-white w-64 p-0 md:p-4 shadow">
                <h2 class="text-xl mb-4">Users</h2>
                <ul>
                    <li class="mb-2">
                        <a href="#" class="flex items-center py-2 px-3 bg-gray-200 dark:bg-transparent rounded">
                            <img src="path_to_user_avatar.jpg" alt="User Name" class="w-10 h-10 rounded-full mr-3">
                            User Name
                        </a>
                    </li>
                    <!-- Repeat for each user -->
                </ul>
            </div>

            <!-- Chat Area -->
            <div class="flex-1 overflow-x-clip md:p-6">
                <div class="h-full border dark:border-gray-700 rounded-xl bg-white dark:bg-gray-700 shadow">

                    <!-- Chat Messages -->
                    <div class="overflow-y-auto overflow-x-clip md:overflow-x-auto p-0 md:h-96 md:p-4">
                        <!-- Single Message (repeat for each message) -->
                        @forelse ($messages as $message)
                            @include('livewire.chat.components.message', [
                                'message' => $message->message,
                                'is_received' => $message->from_id === Auth::user()->id ? 1 : 0,
                            ])
                        @empty
                        <div></div>
                        @endforelse

                        <!-- ... other messages ... -->
                    </div>

                    <!-- Message Input -->
                    <div class="border-t-2 mt-auto border-gray-200 px-4 pt-4  sm:mb-0">
                        <div class="relative flex ">
                            <span class="absolute inset-y-0 left-0 flex items-center">
                                <button type="button"
                                    class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-gray-500 hover:bg-gray-300 focus:outline-none">
                                    <svg class="h-6 w-6 transform rotate-45" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </span>
                            <input wire:model='message' placeholder="Write Something"
                                class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3"></textarea>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                <button type="button" wire:click='sendMessage'
                                    class="inline-flex items-center justify-center bg-blue-500 text-white rounded-full h-12 w-12 transition duration-500 ease-in-out hover:bg-blue-600 focus:outline-none">
                                    <svg class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            @push('scripts')
                <script>
                    // Enable pusher logging - don't include this in production
                    // Pusher.logToConsole = true;

                    // var pusher = new Pusher('0e463798bda02bd1e309', {
                    //     cluster: 'eu'
                    // });
                    // var channel = pusher.subscribe('chat.12');
                    // channel.bind('message.sent', function(data) {
                    //     alert(JSON.stringify(data));
                    // });
                    //             document.addEventListener('livewire:load', () => {
                    //  const userId =  @entangle('from_id');
                    //     var channel = pusher.subscribe(`chat.12`);
                    //     channel.bind('message.sent', function(data) {
                    //                   @this.dispatch('update');
                    //                 console.log('test')


                    //             });


                    // });

                    //     var channel = pusher.subscribe(`chat.${ @entangle('from_id')}`);
                </script>
            @endpush
        </div>
    </div>

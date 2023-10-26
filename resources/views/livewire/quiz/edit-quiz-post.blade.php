<div x-data='{showModal:false,formIndex:0}'
    class="max-w-2xl   overflow-auto mx-auto my-10 px-4 py-6 bg-white dark:bg-gray-800 rounded shadow-xl">
    <!-- Flash message for post creation -->
    <div wire:loading wire:target='updateQuiz' class="bg-green-100 w-full border border-green-400 text-center text-green-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Updating...</strong>

    </div>
    <div wire:loading wire:target='deleteForm' class="bg-red-100 w-full border border-red-400 text-center text-red-700 px-4 py-3 rounded mb-4">
        <strong class="font-bold">Deleting...</strong>

    </div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <h1 class="text-center text-2xl dark:text-gray-300 pb-4">Edit Quiz</h1>
    <!-- Title Input -->
    <div class="mb-4">
        <label for="title" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Title:</label>
        <input wire:model="title" type="text"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
            <span class="text-red-500 text-xs ">{{ $message }}</span>
        @enderror
    </div>





    @foreach ($forms as $formIndex => $form)
        <div wire:key="form-{{ $form['id'] }}">

            <div class="w-full col-span-1">
                <div class="mb-2">
                    <label for="question"
                        class="block text-sm font-medium dark:text-gray-300 text-gray-700">Question</label>
                    <input type="text" id="question" wire:model="forms.{{ $formIndex }}.question"
                        class="mt-1 p-2 w-full border rounded-md dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline ">
                </div>
                @error('forms.' . $formIndex . '.question')
                    <span
                        class="text-red-500 text-xs">{{ __('Question No.' . ($formIndex + 1) . ' question is required') }}</span>
                @enderror
                <div class="flex justify-between items-center"> <label for="question"
                        class="block text-base capitalize my-2 font-medium dark:text-gray-300 text-gray-700">select
                        check
                        box to
                        set correct option</label>
                    <button  @click="showModal = true , formIndex = {{$formIndex}}" @click=""
                        class=" p-2 bg-red-500 text-white rounded">Delete question
                    </button>

                </div>

                <div class="mb-4">
                    <form action="">

                        <label class="block text-sm font-medium dark:text-gray-300 text-gray-700">Answers</label>
                        @foreach ($form['answers'] as $index => $answer)
                            <div class="flex items-center mt-2" wire:key="">
                                <input type="radio" id="radio-{{ $index }}" checked='true'
                                    wire:model="forms.{{ $formIndex }}.correctAnswer" value="{{ $index }}"
                                    class="mr-2">
                                <div class="flex flex-col w-full">
                                    <input required type="text"
                                        wire:model="forms.{{ $formIndex }}.answers.{{ $index }}"
                                        class="mt-1 p-2 w-full border rounded-md dark:text-gray-300 dark:bg-gray-700 leading-tight focus:outline-none focus:shadow-outline ">
                                    @error('forms.' . $formIndex . '.answers.' . $index)
                                        <span
                                            class="text-red-500 text-xs w-full">{{ __('Question No.' . ($formIndex + 1) . ' option ' . ($index + 1) . '    question is required') }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </form>
                    @error('forms.' . $formIndex . '.correctAnswer')
                        <span
                            class="text-red-500 text-xs w-full mt-4">{{ __('Question No.' . ($formIndex + 1) . '    answer is required') }}</span>
                    @enderror
                </div>


                <button wire:click="addAnswer({{ $formIndex }})" class="mb-4 p-2 bg-blue-500 text-white rounded">Add
                    Answer</button>
                <button wire:click="deleteAnswer({{ $formIndex }})"
                    class="mb-4 p-2 bg-red-500 text-white rounded">Delete Answer</button>


            </div>
        </div>
    @endforeach


    <div class="flex gap-1 justify-end">
        <button wire:click="addForm" class='bg-indigo-600 dark:text-white p-2 rounded'>Add question</button>
    </div>
    <!-- Time Limit Input -->
    <div class="mt-4">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Time Limit (in minutes)</label>
        <input type="number" wire:model="time_limit"
            class="mt-1 p-2 w-full border rounded-md dark:bg-gray-700 dark:text-gray-300" min="1" step="1"
            placeholder="e.g., 30">
    </div>
    @error('time_limit')
        <span class="text-red-500 text-xs">{{ $message }}</span>
    @enderror
    <div class="flex gap-1 justify-end">
        <button x-data @click.window="window.scrollTo({top: 0, behavior: 'smooth'})" wire:click="updateQuiz"
            class="p-2 bg-green-500 dark:text-white rounded md:mt-6 md:text-lg md:w-1/2 mx-auto ">Update
            Quiz</button>
    </div>


  <template x-teleport="body">
        <div x-show="showModal" class="fixed dark:text-white  z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4 py-12">
                <div class="bg-white dark:bg-gray-700 rounded-lg p-8 z-50 shadow-xl">
                    <h2 class="text-xl font-bold mb-4 dark:text-red-600">Delete Question</h2>
                    <p>Are you sure you wan to delete this question?</p>

                    <!-- Action buttons -->
                    <div class="mt-6 flex justify-end space-x-2">
                        <!-- Close Modal -->
                        <button @click="showModal = false"
                            class="bg-gray-300 cursor-pointer text-black px-4 py-2 rounded hover:bg-gray-400">
                            Cancel
                        </button>
                         <button  @click="$wire.deleteForm(formIndex),showModal = false"
                            class="bg-red-500 text-white  px-4 py-2 rounded hover:bg-red-600">
                           Delete Question
                            <div wire:loading.delay wire:target='createTopic' class='text-green-500 my-auto'>
                                <img src="{{ asset('svg/spinner.svg') }}" class="h-8 w-8 " alt="loading..."
                                    srcset="">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Overlay -->
            <div @click="showModal = false" class="fixed inset-0 z-10  bg-black opacity-30"></div>
        </div>
    </template>

</div>

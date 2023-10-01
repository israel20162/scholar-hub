<main>

    @if (Auth::user())
        <div x-data="{ isShowing: {{ $quizInProgress }} }">
            <div class="bg-white dark:bg-gray-900 min-h-screen transition-colors duration-500">
                <div class=" py-6">
                    <h1 class="text-3xl md:text-4xl font-bold capitalize text-white text-center">{{ $quiz->title }}
                    </h1>
                </div>
                <div x-show='!isShowing' x-transition.delay.500ms x-transition.duration.500ms
                    class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center py-12 px-4">
                    <div
                        class="bg-white dark:bg-gray-800 max-w-xl w-full mx-auto p-8 shadow-lg rounded-md transition-colors">
                        <h2 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-200">Quiz Title: <span
                                class="text-indigo-600 whitespace-break-spaces text-ellipsis ">{{ $quiz->title }}</span>
                        </h2>

                        <div class="mb-4 text-gray-700 dark:text-gray-300">
                            <p class="flex items-center space-x-2  ">
                                {{-- <span class="material-icons">help_outline</span> --}}
                                <span><strong>Number of Questions:</strong> <span
                                        class="text-indigo-600 font-bold text-lg">{{ $questionSize }}</span></span>
                                <span><strong>Time Limit:</strong> <span
                                        class="text-indigo-600 font-bold text-lg">{{ $quiz->time_limit }}
                                        minutes</span></span>
                            </p>
                        </div>




                        <button x-data type="button" wire:click="$dispatch('start')" x-on:click="isShowing = ! isShowing"
                            class="block text-center mx-auto bg-indigo-600 dark:bg-indigo-500 text-white py-2 px-6 rounded hover:bg-indigo-700 dark:hover:bg-indigo-600">
                            Start Quiz
                        </button>
                    </div>
                </div>
                <div x-show="isShowing" class="container mx-auto px-4 py-12">
                    <div class="mb-12 bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-md">

                        @if (!$showResult)
                            <div>
                                <header class="mb-4 flex justify-between items-center">
                                    <span class="text-gray-600 dark:text-gray-400  ">By: <span
                                            class="dark:text-indigo-600 capitalize">
                                            {{ $quiz->user->name }}</span> </span>
                                    <div x-data="{ open: false }" class="flex gap-2 items-center">

                                        @livewire('timer', ['initialMinutes' => $quiz->time_limit], key($quiz->id))


                                    </div>

                                </header>
                                <div class="text-gray-700 text-lg dark:text-gray-300 space-y-4">

                                    <ul class="space-y-4">
                                        <li class="bg-gray-200 rounded-lg dark:bg-inherit dark:text-white p-4">
                                            <span class="w-full"> <span
                                                    class="text-lg font-bold ">{{ $currentQuestionIndex + 1 }}.</span>
                                                {{ $currentQuestion->question }} ?</span>
                                            <div class="md:ml-5 md:my-2  "
                                                style="list-style: upper-alpha">

                                                @foreach ($currentQuestion->options as $item)
                                                    <div class="flex items-center gap-1 ">
                                                        @csrf
                                                        <input required id='question-{{ $item->id }}'
                                                            value={{ $item->id . ',' . $item->is_correct }}
                                                            wire:model="userAnswered" type="radio"
                                                          {{ (isset($answeredQuestions[$currentQuestionIndex]) && $answeredQuestions[$currentQuestionIndex] == $item->id) ? 'checked' : '' }}
                                                            name='option'>
                                                        <p
                                                            class='p-1 m-1 capitalize font-extrabold min-w-full mx-auto '>
                                                            {{ $item->option }} </p>

                                                    </div>
                                                @endforeach
 <div class="w-full flex justify-between items-center mt-2">
                                                @if ($currentQuestionIndex > 0)
                                                    <button type="button" class="bg-indigo-600 py-2 px-4 rounded" wire:click="previousQuestion">Previous</button>
                                                @endif

                                                    @if ($currentQuestionIndex < $questionSize - 1)
                                                        <button
                                                        type='button'
                                                         wire:click="nextQuestion"
                                                            class="ml-auto bg-indigo-600 py-2 px-4 rounded">Next<button>
                                                            @else
                                                                <button    wire:click="getResult"  class="ml-4">Show
                                                                    Result<button>
                                                    @endif
                                                </div>

                                            </form>
                                        </li>



                                    </ul>
                                </div>


                        @endif

                        @if ($showResult)

 <div class="bg-white dark:bg-gray-700 dark:text-white rounded-lg shadow-lg p-5 md:p-20 mx-2">
                            <div class="text-center">
                                <h2
                                    class="text-2xl tracking-tight flex items-center justify-center w-full leading-10 font-extrabold text-gray-900 md:text-3xl sm:leading-none">
                                    <x-application-mark class="block h-9 w-auto capitalize" /><span
                                        class="text-indigo-600 ml-2">Quiz</span>
                                </h2>
                                <p class="text-md mt-10"> Welcome <span
                                        class="font-extrabold capitalize text-blue-600 mr-2">
                                        {{ Auth::user()->name . '!' }}
                                    </span> You have secured {{ $quizPecentage }}%</p>
                            </div>
                            <div class="md:grid grid-cols-3 mt-10 justify-center gap-5">
                                <div class="m-3  min-w-full mx-auto">
                                    <p
                                        class="bg-white dark:bg-slate-700 dark:text-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-500 hover:border-blue-500 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 items-center">
                                        <span
                                            class="mx-auto font-extrabold dark:text-indigo-600 pr-2">{{ $questionSize }}</span><span>
                                            Total Questions</span>
                                    </p>
                                </div>
                                <div class="m-3  min-w-full mx-auto">
                                    <p
                                        class="bg-white dark:bg-slate-700 dark:text-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-500 hover:border-blue-500 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 items-center">
                                        <span
                                            class="mx-auto font-extrabold text-indigo-600 pr-2">{{ $score }}</span><span>
                                            Correct Answers</span>
                                    </p>
                                </div>
                                <div class="m-3  min-w-full mx-auto justify-center">
                                    <p
                                        class="bg-white dark:bg-slate-700 dark:text-white tracking-wide text-gray-800 font-bold rounded border-2 border-blue-500 hover:border-blue-500 hover:bg-blue-500 hover:text-white shadow-md py-2 px-6 items-center">
                                        <span
                                            class="mx-auto font-extrabold text-indigo-600 pr-2">{{ $quizPecentage }}</span><span>
                                            Percentage</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif


                    </div>
                </div>





            </div>
        @else
    @endif
</main>

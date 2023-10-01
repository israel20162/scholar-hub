<x-app-layout>
    <div class="grid md:grid-cols-4  overflow-x-clip">
        <div class="md:col-span-3 w-full min-w-full overflow-y-scroll md:border-r dark:border-gray-700 ">
            @livewire('quiz.view-quiz-post', ['quizId' => $quizId])
        </div>

        <div class="col-span-1">

            @livewire('side-section')
        </div>
    </div>

</x-app-layout>

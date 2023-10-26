<x-app-layout>
    @livewire('quiz.edit-quiz-post',['quizId'=>$quizId], key(Auth::user()->id))
</x-app-layout>

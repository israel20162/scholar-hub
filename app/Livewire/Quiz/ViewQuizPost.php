<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use App\Models\QuizResult;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;

class ViewQuizPost extends Component
{
    public $quizId;
    public $quiz;
    public $questions;
    public $correctQuizAnswers = [];
    public $currentQuestion;
    public $currentQuestionIndex = 0;
    public $questionSize;
    public $userAnswered = [];
    public $answeredQuestions = [];


    public ?int $quizInProgress = 0;
    public $showResult = 0;
    public $score = 0;
    public $quizPecentage;
    protected $listeners = ['loadPost' => 'loadPost'];

    public function mount($quizId)
    {
        $this->quizId = $quizId;


        $this->currentQuestion = $this->getQuestions()[$this->currentQuestionIndex];
        $this->loadQuiz();

    }

    #[On('start')]
    public function startQuiz()
    {

        $this->quizInProgress = !$this->quizInProgress;
    }
    public function getQuestions(): array
    {
        $questions = Quiz::find($this->quizId);
        $questionArray = json_decode($questions->quiz);
        $this->questionSize = count($questionArray);
        // array_push($this->answeredQuestions, $questionArray[$this->currentQuestionIndex]->id);
        return $questionArray;
    }
    public function getResult()
    {
        $this->showResult = 1;
        array_push($this->answeredQuestions, $this->userAnswered);
        foreach ($this->answeredQuestions as $answer) {
            list($answerId, $isChoiceCorrect) = explode(',', $answer);
            array_push($this->correctQuizAnswers, ['id' => $answerId, 'is_correct' => $isChoiceCorrect]);
        }
        foreach ($this->correctQuizAnswers as $answer) {

            if ($answer['is_correct']) {
                $this->score++;
            }

        }
        $this->quizPecentage = round($this->score / $this->questionSize * 100, 2);

        $this->storeResult();

    }
    public function previousQuestion()
    {
        if ($this->currentQuestionIndex > 0) {
            $this->currentQuestionIndex--;
            $this->currentQuestion = $this->getQuestions()[$this->currentQuestionIndex];
            $this->userAnswered = $this->answeredQuestions[$this->currentQuestionIndex];
        }
    }


    public function nextQuestion()
    {
        // Save the answer of the current question to the array
        $this->answeredQuestions[$this->currentQuestionIndex] = $this->userAnswered;

        // If at the end of the questions, calculate results
        if ($this->currentQuestionIndex == $this->questionSize - 1) {
            $this->getResult();
            $this->showResult = true;
            return;
        }

        // Proceed to next question if not at the end
        if ($this->currentQuestionIndex < $this->questionSize - 1) {
            $this->currentQuestionIndex++;

            // Check if the next question has already been answered; if so, set the userAnswered value
            if (isset($this->answeredQuestions[$this->currentQuestionIndex])) {
                $this->userAnswered = $this->answeredQuestions[$this->currentQuestionIndex];
            } else {
                // Reset the userAnswered if the next question hasn't been answered yet
                $this->userAnswered = null;
            }
        }

        // Load the next question
        $this->currentQuestion = $this->getQuestions()[$this->currentQuestionIndex];
    }

    public function storeResult()
    {
        if (auth()->id() !== $this->quiz->user_id) {
            $this->quiz->user->increment('karma',1);
        }

        QuizResult::create([
            'quiz_id' => $this->quizId,
            'user_id' => auth()->id(),
            'score' => $this->quizPecentage
        ]);
    }



    public function loadQuiz()
    {
        $this->quiz = Quiz::find($this->quizId);
    }



    public function render()
    {
        return view('livewire.quiz.view-quiz-post');
    }
}

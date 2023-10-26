<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;


class EditQuizPost extends Component
{
    public $title;
    public $quiz;
    public $quizId;
    public $time_limit;
    public $forms = [


    ];

    public function mount($quizId)
    {
        $this->quiz = Quiz::find($quizId);
        $this->quizId = $quizId;
        $this->title = $this->quiz->title;
        $this->time_limit = $this->quiz->time_limit;
        $questions = json_decode($this->quiz->quiz);
        foreach ($questions as $key => $quiz) {

            $options = [];
            $correctAnswer =[];
            foreach ($quiz->options as $index => $option) {
                $option->is_correct === 1 ? $correctAnswer[] = $index : '';
                $options[] = $option->option;
            }
         //  dd($correctAnswer);
            $this->forms[] = ['id' => $quiz->id, 'question' => $quiz->question, 'answers' => $options, 'correctAnswer' =>$correctAnswer[0] ];
        }


// dd($this->forms);

    }



    public function addForm()
    {
        $newId = count($this->forms) + 1;
        $this->forms[] = ['id' => $newId, 'question' => '', 'answers' => ['', '', '', ''], 'correctAnswer' => ''];
    }
    public function deleteForm($index)
    {
       

        unset($this->forms[$index]);


    }

    public function addAnswer($formIndex)
    {
        array_push($this->forms[$formIndex]['answers'], '');

    }

    public function deleteAnswer($formIndex)
    {
        array_pop($this->forms[$formIndex]['answers']);
    }


    public function updateQuiz()
    {


        $this->validate([
            'title' => 'required|string',
            'time_limit' => 'required',
            'forms.*.question' => 'required|string',
            'forms.*.answers.*' => 'required',
            'forms.*.correctAnswer' => 'required|numeric|between:0,' . (count($this->forms[0]['answers']) - 1)
        ]);
        $quiz = [];
        foreach ($this->forms as $index => $form) {
            $options = [];
            foreach ($form['answers'] as $index => $answer) {
                $options[] = [
                    'id' => Str::uuid()->__toString(),
                    'option' => $answer,
                    'is_correct' => $form['correctAnswer'] == ($index) ? 1 : 0,

                ];
            }
            $quiz[] = [
                'id' => Str::uuid()->__toString(),
                'question' => $form['question'],
                'options' => $options

            ];
        }
       // dd($quiz);


        $this->quiz->update([
            'title' => $this->title,
            'quiz' => json_encode($quiz),
            'time_limit' => $this->time_limit
        ]);

        session()->flash('message', 'Quiz successfully updated.');




        // Reset the fields after saving
       // $this->resetExcept('title');
    }
    public function render()
    {
        return view('livewire.quiz.edit-quiz-post');
    }
}

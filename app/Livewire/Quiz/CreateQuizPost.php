<?php

namespace App\Livewire\Quiz;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateQuizPost extends Component
{
    public $title;
    public $time_limit;
    public $forms = [
        ['id' => 1, 'question' => '', 'answers' => ['','','',''], 'correctAnswer' => ''],

    ];



    public function addForm()
    {
        $newId = count($this->forms) + 1;
        $this->forms[] = ['id' => $newId, 'question' => '', 'answers' => ['', '', '', ''], 'correctAnswer' => ''];
    }

    public function addAnswer($formIndex)
    {
        array_push($this->forms[$formIndex]['answers'],'');

    }

    public function deleteAnswer($formIndex)
    {
        array_pop($this->forms[$formIndex]['answers']);
    }


    public function saveQuiz()
    {


        $this->validate([
            'title'=>'required|string',
            'time_limit'=>'required',
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


        Quiz::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'quiz'=> json_encode($quiz),
            'time_limit'=>$this->time_limit
        ]);

        session()->flash('message', 'Quiz successfully created.');




        // Reset the fields after saving
        $this->resetExcept('title');
    }
    public function render()
    {
        return view('livewire..quiz.create-quiz-post');
    }
}

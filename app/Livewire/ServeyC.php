<?php

namespace App\Livewire;

use App\Models\Survey;
use Livewire\Component;

class ServeyC extends Component
{    public $surveys;
    public $survey;
    public $isEditing = false;

    public function render()
    {
        $this->surveys = Survey::all();
        return view('livewire.survey');
    }

    public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Survey::create([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->reset(['title', 'description']);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);
        $this->title = $survey->title;
        $this->description = $survey->description;
        $this->editingSurveyId = $id;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Survey::find($this->editingSurveyId)->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->reset(['title', 'description', 'editingSurveyId']);
    }

    public function destroy($id)
    {
        Survey::find($id)->delete();
    }
}

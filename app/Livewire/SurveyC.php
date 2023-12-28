<?php

namespace App\Livewire;

use App\Models\Survey;
use Livewire\Component;

class SurveyC extends Component
{
    public $survey;
    public $isEditing = false;
    public $surveys;
    public $selectedSurvey;
    public $title;
    public $description;
    public $recompense_en_points;

    public function mount()
    {
        $this->surveys = Survey::all();
    }
   
    public function render()
    {
       
        $this->surveys = Survey::all();

        return view('livewire.survey-c');
    }
    
private function resetForm()
{
    $this->title = '';
    $this->description = '';
    $this->recompense_en_points = 0;
}
    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'recompense_en_points'=> 'required',
        ]);

        Survey::create([
            'title' => $this->title,
            'description' => $this->description,
            'recompense_en_points'=> $this->recompense_en_points,
        ]);
        $this->resetForm();
        $this->showCreateForm = false;

        $this->reset(['title', 'description']);
    }

    public function edit($id)
    {
        $survey = Survey::find($id);

        if ($survey) {
            $this->selectedSurvey = $survey;
            $this->title = $survey->title;
            $this->description = $survey->description;

            $this->recompense_en_points = $survey->recompense_en_points;
            $this->showEditForm = true;
$this->reset(['title','description']);
       $this->save();
        
    }
}

    public function update()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'recompense_en_points'=> 'required',
        ]);

        Survey::find($this->editingSurveyId)->update([
            'title' => $this->title,
            'description' => $this->description,
           ' recompense_en_points' => $this->recompense_en_points,
        ]);
        $this->resetForm();
        $this->showEditForm = false;

        $this->reset(['title', 'description', 'editingSurveyId']);
    }

    public function destroy($id)
    {
        Survey::find($id)->delete();
    }
}

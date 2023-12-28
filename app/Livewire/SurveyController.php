<?php
namespace App\Http\Livewire;

use App\Models\Survey;
use Livewire\Component;

class SurveyController extends Component
{
    public $surveys;
    public $survey;
    public $isEditing = false;

    public function render()
    {
        $this->surveys = Survey::all();
        return view('livewire.survey');
    }

    public function create()
    {
        $this->resetForm();
        $this->isEditing = false;
    }

    public function edit($id)
    {
        $this->survey = Survey::find($id);
        $this->isEditing = true;
    }

    public function save()
    {
        $this->validate([
            'survey.titre' => 'required',
            'survey.description' => 'required',
            'survey.recompense_en_points' => 'required|numeric',
        ]);

        $this->survey->save();
        $this->resetForm();
    }

    public function delete($id)
    {
        Survey::find($id)->delete();
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->survey = new Survey();
    }
}


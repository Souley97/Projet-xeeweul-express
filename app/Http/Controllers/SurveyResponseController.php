<?php

use App\Models\Survey;
use App\Models\SurveyResponse as ModelsSurveyResponse;
use Illuminate\Routing\Controller;
use Livewire\Component;

class SurveyResponseController extends Controller
{

    // app/Http/Livewire/SurveyResponse.php
    
 
        public $questions;
        public $currentQuestionIndex = 0;
        public $userResponses = [];
        public $surveyId; // Si vous avez besoin de l'ID du sondage
    
        public function render()
        {
            $this->questions = Survey::with('questions')->find($this->surveyId)->questions;
            return view('livewire.survey-response');
        }
    
        public function nextQuestion()
        {
            $this->currentQuestionIndex++;
        }
    
        public function previousQuestion()
        {
            $this->currentQuestionIndex--;
        }
    
        public function submitResponse()
        {
            // Validez et traitez la réponse ici
            $selectedOptionId = $this->userResponses[$this->currentQuestionIndex];
    
            // Vous pouvez maintenant stocker la réponse en base de données, par exemple
            $response = new ModelsSurveyResponse();
            $response->user_id = auth()->id(); // Vous pouvez ajuster ceci en fonction de votre système d'authentification
            $response->question_id = $this->questions[$this->currentQuestionIndex]->id;
            $response->option_id = $selectedOptionId;
            $response->save();
    
            // Passez à la question suivante
            $this->nextQuestion();
        }
    }
    
<?php

// app/Http/Controllers/SurveyController.php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\SurveyResponse;
use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class SurveyController extends Controller
{
    public function index()
    {
        if( Gate::denies('all-users')){ 
     
                return redirect()->route('dashboard');
    
            
        }
        $registrateur = Survey::find(1);
        // $createur = $registrateur->createdBy;
        // $modificateur = $registrateur->updatedBy;
        $surveys = Survey::all();
        $surveys = Survey::paginate(6);
        return view('admin.surveys.index', compact('surveys'));
    
}

    public function create()
    {
        
        
        return view('admin.surveys.create');
      
}
    public function store(Request $request)
    {

        // Validez et enregistrez le sondage
        // Survey::create($request->all());
        // Survey::create($request->all());
        $survey = new Survey();
        $survey ->titre = $request->input('titre');
        $survey ->description = $request->input('description');
        $survey ->recompense_en_points = $request->input('recompense_en_points');
        $survey ->montant_recompense = $request->input('montant');
        $survey ->date_limite = $request->input('date_limite');
       
        // create par qui dan l'administrative
        $survey->fill($request->all());
        $survey->created_by = auth()->user()->id;

        // update par qui dans l'administrative

        $survey->update($request->all());
        $survey->updated_by = auth()->user()->id;

        $survey->update($request->all());
        $survey->deleted_by = auth()->user()->id;
        $survey->save();

        return redirect()->route('surveys.index');
    }
    public function showSurvey(Survey $survey)
{
    Question::all();
    // Chargez les questions du sondage avec les options de réponse
    $survey->load('questions.options');

    return view('admin.surveys.repondre.show', compact('survey'));
}
public function respond($id)
{
    $survey = Survey::find($id);
    return view('admin.surveys.repondre.index', compact('survey'));
}

public function submitSurvey(Request $request, Survey $survey)
{
    // Validez et traitez les réponses ici
    $answers = $request->input('responses');
    $questions = $survey->questions;

    // Récupérer les réponses pour chaque question (vous devez avoir une relation dans votre modèle Survey)
    $responses = $survey->responses;

    foreach ($answers as $questionId => $options) {
        // Récupérer la question associée
        $question = Question::find($questionId);

        // Vérifier si la question existe
        if ($question) {
            // Récupérer la réponse correcte
            $reponseCorrecte = $question->is_correct; // Assurez-vous d'avoir une colonne 'is_correct' dans votre table de questions

            // Vérifiez si $options est défini et est un tableau
            if (is_array($options)) {
                foreach ($options as $optionId) {
                    // Assurez-vous que $optionId n'est pas nul
                    if ($optionId !== null) {
                        $answer = new SurveyResponse([
                            'question_id' => $questionId,
                            'option_id' => $optionId,
                            'user_id' => auth()->id(),
                        ]);

                        // Modifier le nombre de points en conséquence
                        $nombreDePoints = ($optionId == $reponseCorrecte) ? 10 : 0;

                        // Utilisez la méthode increment avec le deuxième paramètre pour incrémenter les points
                        auth()->user()->increment('points', $nombreDePoints);

                        $answer->save();
                    }
                }
            }
        }
    }

    // Rediriger l'utilisateur ou effectuer d'autres actions
    return view('admin.surveys.repondre.show', compact('survey', 'questions', 'responses'));
}

// public function submitSurvey(Request $request, Survey $survey)
// {
//     $answers = $request->input('responses');

//     foreach ($answers as $questionId => $options) {
//         $question = Question::find($questionId);

//         if ($question) {
//             // Récupérer la réponse correcte (assurez-vous que is_correct contient l'ID de l'option correcte)
//             $reponseCorrecte = $question->is_correct;

//             if (is_array($options)) {
//                 foreach ($options as $optionId) {
//                     if ($optionId !== null) {
//                         $answer = new SurveyResponse([
//                             'question_id' => $questionId,
//                             'option_id' => $optionId,
//                             'user_id' => auth()->id(),
//                         ]);

//                         // Modifier le nombre de points en conséquence
//                         $nombreDePoints = ($optionId == $reponseCorrecte) ? 10 : 0;
//                         auth()->user()->increment('points', $nombreDePoints);

//                         $answer->save();
//                     }
//                 }
//             }
//         }
//     }

//     // Rediriger l'utilisateur ou effectuer d'autres actions
// return view('admin.surveys.repondre.show', compact('survey'));
// }

public function showResults(Survey $survey)
{
    // Récupérer toutes les questions du sondage
    $qauestions = $survey->questions;

    // Récupérer les réponses de l'utilisateur pour chaque question
    $responses = SurveyResponse::where('survey_id', $survey->id)
        ->where('user_id', auth()->id())
        ->with('option')
        ->get()
        ->groupBy('question_id');

    // Calculer le total des points de l'utilisateur
    $totalPoints = DB::table('survey_responses')
        ->where('survey_id', $survey->id)
        ->where('user_id', auth()->id())
        ->sum('points');

   return view('admin.surveys.repondre.show', compact('survey', 'qauestions', 'responses','totalPoints'));
}
 

// public function showResults(Survey $survey)
// {
//     // Récupérer toutes les questions du sondage
//     $questions = $survey->questions;

//     // Récupérer les réponses de l'utilisateur pour chaque question
//     $responses = SurveyResponse::where('survey_id', $survey->id)
//         ->where('user_id', auth()->id())
//         ->with('option') // Charger les relations option pour éviter les requêtes supplémentaires
//         ->get()
//         ->groupBy('question_id');

//     return view('admin.surveys.repondre.show', compact('survey', 'questions', 'responses'));
// }

    
    public function userResponses(Survey $survey)
    {
        // Récupérez les réponses de l'utilisateur pour ce sondage
        $userResponses = SurveyResponse::where('survey_id', $survey->id)
            ->where('user_id', auth()->id())
            ->get();

        return view('admin.surveys.repondre.results', compact('userResponses', 'survey'));
    }







    public function show($id)
    {
        $survey = Survey::find($id);
        return view('admin.surveys.show', compact('survey'));
    }

    public function edit(Survey $survey)
    {
        return view('admin.surveys.update', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        // Validez et mettez à jour le sondage
        $survey->update($request->all());
        return redirect()->route('surveys.index');
    }

    public function destroy(Survey $survey)
    {
        $survey->delete();
        return redirect()->route('surveys.index');
    }

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');

    }
    public function updatedBy(){
        return $this->belongsTo(User::class, 'updated_by');
    }
}
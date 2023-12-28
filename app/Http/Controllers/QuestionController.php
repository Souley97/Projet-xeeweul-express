<?php


namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

  

    
    public function create()
    {
        // if (Gate::denies('manage-users')) {
        //     return redirect(route('dashboard'));
        // };
        $surveys = Survey::all();
        

        return view('admin.questions.create', compact('surveys'));
    }
 
    public function store(Request $request)
    {
        // if (Gate::denies('manage-users')) {
        //     return redirect(route('dashboard'));
        // };
        $request->validate([
            'texte' => 'required',
            'survey_id' => 'required|exists:surveys,id',
            'type' => 'required',
            'reponses' => 'required|array|min:4', // Assurez-vous d'avoir au moins 4 réponses
            'is_correct' => 'required|integer|between:0,3', // Assurez-vous que l'indice de réponse correcte est entre 0 et 3
        ]);

        $question = new Question;
        $question->texte = $request->input('texte');
        $question->survey_id = $request->input('survey_id');
        $question->type = $request->input('type');
        $question->fill($request->all());
        $question->created_by = auth()->user()->id;

        // update par qui dans l'administrative

        $question->update($request->all());
        $question->updated_by = auth()->user()->id;

        $question->update($request->all());
        $question->deleted_by = auth()->user()->id;
        $question->save();

        // Enregistrez les réponses associées et indiquez la réponse correcte
        foreach ($request->input('reponses') as $index => $reponseTexte) {
            $reponse = new Answer;
            $reponse->reponses = $reponseTexte;
            $reponse->is_correct = ($index == $request->input('is_correct'));
            $reponse->question_id = $question->id;
            $reponse->save();
        }


        // Redirigez l'utilisateur vers la liste des questions ou une autre page appropriée
        return redirect()->route('questions.index')->with('success', 'Question créée avec succès.');
    }

    public function show($id)
    {
        // Charger la question depuis la base de données en fonction de l'ID
        $question = Question::findOrFail($id);
        $surveys = Survey::all();

        if ($question) {
            return view('admin.questions.show', ['question' => $question]);
        } else {
            // Gérer le cas où la question n'existe pas
            return redirect()->route('admin.questions.index')->with('error', 'Question non trouvée.');
        }

        // Renvoyer la vue de détail avec la question chargée
    }

    public function edit(Question $question)
    {
        $surveys = Survey::all();
        return view('admin.questions.update', compact('question', 'surveys'));
    }

   public function update(Request $request , Question $question){
    $question->update($request ->all());
    return redirect()->route('questions.index');
   }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question supprimée avec succès.');
    }
}

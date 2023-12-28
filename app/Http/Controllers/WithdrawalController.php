<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Models\Withdrawal; // Assurez-vous d'importer le modèle "Withdrawal"
use Illuminate\Routing\Controller;

class WithdrawalController extends Controller
{
    // public function index()
    // {
    //     $withdrawals = Withdrawal::all(); // Récupérez toutes les demandes de retrait

    //     return view('withdrawal-admin', compact('withdrawals'));
    // }
    public function indexUser()
    {
        $user = auth()->user(); // Récupérez l'utilisateur connecté
        $withdrawals = Withdrawal::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
          // Récupérez la somme totale des montants des retraits effectués par l'utilisateur spécifié
        $totalWithdrawalAmount = Withdrawal::where(  'user_id', $user->id    )->where( 'status', 'Validée')->sum('amount');

    // Vous pouvez également récupérer les informations de l'utilisateur, par exemple :
        return view('withdrawals.user.index', compact('withdrawals', 'totalWithdrawalAmount'));
    }
    public function listUser()
    {
        $user = auth()->user(); // Récupérez l'utilisateur connecté
        $withdrawals = Withdrawal::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
          // Récupérez la somme totale des montants des retraits effectués par l'utilisateur spécifié
        $totalWithdrawalAmount = Withdrawal::where(  'user_id', $user->id    )->where( 'status', 'Validée')->sum('amount');

    // Vous pouvez également récupérer les informations de l'utilisateur, par exemple :
        return view('withdrawals.user.list', compact('withdrawals', 'totalWithdrawalAmount'));
    }

    public function index()
    {

        $user = auth()->user(); // Récupérez l'utilisateur connecté
        $withdrawals = Withdrawal::where('status', $user->id)->orderBy('created_at', 'desc')->get();
        $withdrawalsInProgress = Withdrawal::where('status', 'pending')->orderBy('created_at', 'desc')->get(); // Chargez les demandes de retrait en cours depuis la base de données
        $withdrawalsValide= Withdrawal::where('status', 'Validée')->paginate(10) ; // Chargez les demandes de retrait en cours depuis la base de données
        $withdrawalsRejete = Withdrawal::where('status', 'Rejetée')->orderBy('created_at', 'desc')->get(); // Chargez les demandes de retrait en cours depuis la base de données
        
          // Récupérez toutes les demandes de retrait en cours depuis la base de données
          $withdrawalsMntInProg = Withdrawal::where('status', 'pending')->get();
          $withdrawalsMntValid = Withdrawal::where('status', 'Validée')->get();

    // Calculez la somme totale des montants
    $totalAmountCour = $withdrawalsMntInProg->sum('amount');
    $totalAmount = $withdrawalsMntValid->sum('amount');

        return view('withdrawals.index',  ['withdrawalsInProgress' => $withdrawalsInProgress, 'withdrawalsValide'=> $withdrawalsValide, 'withdrawalsRejete'=> $withdrawalsRejete,'withdrawal'=>$withdrawals,'withdrawalsMntValid'=>$withdrawalsMntValid,'withdrawalsMntInProg'=>$withdrawalsMntInProg ,'totalAmountCour'=>$totalAmountCour,'totalAmount'=>$totalAmount] );
    }
    // app/Http/Controllers/WithdrawalsController.php

public function inProgress()
{
    // Vous pouvez charger des données ici si nécessaire
    $withdrawalsInProgress = Withdrawal::where('status', 'pending')->orderBy('created_at', 'desc')->get(); // Chargez les demandes de retrait en cours depuis la base de données
    // $withdrawalsInProgress = Withdrawal::all(); // Chargez les demandes de retrait en cours depuis la base de données

    return view('withdrawals.progress', ['withdrawalsInProgress' => $withdrawalsInProgress]);
    // return view('withdrawals.progress', compact('withdrawalsInProgress'));
}

    
    public function list()
    {
        $user = Withdrawal::all(); // Récupérez l'utilisateur connecté
        $withdrawals = Withdrawal::all();
        $withdrawals = Withdrawal::paginate(2);

        return view('withdrawals.liste', compact('withdrawals', 'user'));
    }


    // Méthode pour afficher le formulaire de demande de withdrawal
    public function create()
    {
        return view('withdrawals.user.create');
    }

    // Méthode pour traiter la soumission du formulaire de demande de withdrawal
    public function store(Request $request)
    {
        $user = auth()->user(); // Récupérez l'utilisateur connecté

        // Validez les données du formulaire ici
        // Assurez-vous que l'utilisateur a suffisamment de points, etc.

        // Créez une nouvelle withdrawal
        $withdrawal = new Withdrawal([
            'user_id' => $user->id,
            'amount' => $request->input('amount'),
            'payment_method' => $request->input('payment_method'),
            'type' => 'exchange', // Vous pouvez utiliser le type approprié
            'status' => 'pending', // En attente de validation
        ]);

        $withdrawal->save();

        // Redirigez l'utilisateur vers une page de confirmation
        return redirect()->route('withdrawals.indexUser')->with('success', 'La demande de withdrawal a été soumise.');
    }

    // Méthode pour afficher les détails d'une withdrawal
    public function show($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
    }
    // etat demande
    public function validateWithdrawal($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        // Mettez à jour l'état de la demande pour la valider
        $withdrawal->update(['status' => 'Validée']);

        // Redirigez l'administrateur vers la liste des demandes de retrait
        return redirect()->route('withdrawals.index');
    }

    public function rejectWithdrawal($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        // Mettez à jour l'état de la demande pour la rejeter
        $withdrawal->update(['status' => 'Rejetée']);

        // Redirigez l'administrateur vers la liste des demandes de retrait
        return redirect()->route('withdrawals.index');
    }


    // Active et desactive view
    
public function disable(Withdrawal $withdrawal)
{
    $withdrawal->update(['disabled' => true]);
    return redirect()->route('withdrawals.index');
}

public function enable(Withdrawal $withdrawal)
{
    $withdrawal->update(['disabled' => false]);
    return redirect()->route('withdrawals.index');
}
}

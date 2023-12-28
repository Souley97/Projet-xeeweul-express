<?php
namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
 /**
     * Show the user profile                        screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View */
class UserDashboardController extends Controller
{
   
    
    public function index()
    {
        $users = User::all();
        $surveys = Survey::all();

        return view('dashboard', compact('users','surveys'));
    }
    public function show($id)
{
    $user = User::find($id); // Récupérez l'utilisateur par son ID

    return view('users.show', compact('user'));
}
public function edit($id)
{
    $user = User::find($id); // Récupérez l'utilisateur par son ID

    return view('admin.users.edit', compact('user'));
}


public function update(Request $request, User $user)
{
    // Validez et mettez à jour le sondage
    $user->update($request->all());
    return redirect()->route('admin.user.index');
}
public function destroy($id)
{
    $user = User::find($id);

    if (!$user) {
        return redirect()->route('users.index')->with('error', 'L\'utilisateur n\'existe pas.');
    }

    $user->delete();

    return redirect()->route('users.index')->with('success', 'L\'utilisateur a été supprimé avec succès.');
}


// public function updatqe(Request $request, $id)
// {
//     $user = User::find($id); // Récupérez l'utilisateur par son ID

//     // Validez et mettez à jour les données de l'utilisateur
//     $request->validate([
//         'nom' => 'required',
//         'prenom' => 'required',
//         'email' => 'required|email',
//         // Ajoutez d'autres règles de validation au besoin
//     ]);

//     $user->update($request->all());

//     return redirect()->route('users.show', $user->id);
// }

}

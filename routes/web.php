<?php

use App\Http\Controllers\AnnoceController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\UserLevelController;
use App\Http\Controllers\VideoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/dashboard', [UserDashboardController::class, 'index']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('/dashbard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/admin', function () {
        return view('livewire/admin/dashboard');
    })->name('admin');
    Route::get('/quiz', function () {
        return view('livewire.quiz');
    })->name('quiz');
});


// Route::middleware(['auth'])->group(function () {
//     Route::get('/referral-code', [MyReferralCodeGenerator::class, 'generateReferralCode'])->name('referral.code');
// });

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware('auth:sanctum')->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{slug}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{slug}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{slug}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{slug}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::middleware(['can:admins'])->group(function () {

        Route::get('/payment/edit', [PaymentController::class, 'edit'])->name('payment.edit');
        Route::patch('/payment/update', [PaymentController::class, 'update'])->name('payment.update');
        Route::view('/payment/updated', 'payment.updated')->name('payment.updated');


    });

    // Active et desactiveve
    Route::put('/user/{id}/activate', [UserController::class, 'activate'])->name('user.activate');
    Route::put('/user/{id}/deactivate', [UserController::class, 'deactivate'])->name('user.deactivate');
    Route::put('/user/search', [UserController::class, 'search'])->name('videos.search');
});

    Route::middleware(['can:all-users'])->group(function () {



    Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');

    Route::post('/survey/{survey}', [SurveyController::class, 'submitSurvey'])->name('survey.submit');
    Route::get('/survey/reponse/{slug}', [SurveyController::class, 'showSurvey'])->name('survey.rshow');
    Route::get('/surveys/a/{slug}', [SurveyController::class, 'show'])->name('surveys.show');

    // resultat
    Route::get('/surveys/{survey}/resuls', [SurveyController::class, 'showResults'])->name('surveys.resuls');
    Route::get('/surveys/{survey}/results', [SurveyController::class, 'userResponses'])->name('surveys.results');


    Route::get('/survey/respond/{survey}', [SurveyController::class, 'respond'])->name('survey.respond');
});
// ADMIN ACCESS ROUTES
Route::middleware(['can:manage-users'])->group(function () {

    Route::get('/surve/create', [SurveyController::class, 'create'])->name('surveys.create');
    Route::post('/surveys', [SurveyController::class, 'store'])->name('surveys.store');
    Route::get('/surveys/{survey}/edit', [SurveyController::class, 'edit'])->name('surveys.edit');
    Route::put('/surveys/{survey}', [SurveyController::class, 'update'])->name('surveys.update');
    Route::delete('/surveys/{survey}', [SurveyController::class, 'destroy'])->name('surveys.destroy');
});
// ADMIN ACCESS ROUTES
Route::middleware(['can:manage-users'])->group(function () {
    // Afficher la liste des questions
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    Route::get('/questions/{slug}', [QuestionController::class, 'show'])->name('questions.show');
    // Afficher le formulaire de création d'une question
    Route::get('/question/create', [QuestionController::class, 'create'])->name('questions.create');

    // Enregistrer une nouvelle question dans la base de données
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');


    // Afficher le formulaire de mise à jour d'une question
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');

    // Mettre à jour une question spécifique dans la base de données
    Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');

    // Supprimer une question spécifique de la base de données
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    // });
});

Route::middleware(['can:all-users'])->group(function () {
    Route::get('/withdrawals/user', [WithdrawalController::class, 'indexUser'])->name('withdrawals.indexUser');
    Route::get('/withdrawals/listUser', [WithdrawalController::class, 'listUser'])->name('withdrawals.listUser');
    Route::get('/withdrawals/list', [WithdrawalController::class, 'list'])->name('withdrawals.list');
    // Route::post('/withdrawals', [WithdrawalController::class , 'store'])->name('withdrawals.store');
    Route::get('/withdrawals/create', [WithdrawalController::class, 'create'])->name('withdrawals.create');
});

// Admin Access routes
Route::middleware(['can:manage-users'])->group(function () {
    Route::post('/withdrawals', [WithdrawalController::class, 'store'])->name('withdrawals.store');
    Route::get('/withdrawals', [WithdrawalController::class, 'index'])->name('withdrawals.index');

    Route::get('/withdrawals/{withdrawal}', [WithdrawalController::class, 'show'])->name('withdrawals.show');
    Route::get('/withdrawals/{withdrawal}/edit', [WithdrawalController::class, 'edit'])->name('withdrawals.edit');

    Route::get('/withdrawals/{withdrawal}/disable', [WithdrawalController::class, 'delete'])->name('withdrawals.delete');
    Route::put('/withdrawals/{withdrawal}', [WithdrawalController::class, 'disable'])->name('withdrawals.disable');

    Route::get('/withdrawals/{id}/validate', [WithdrawalController::class, 'validateWithdrawal'])->name('withdrawals.validate');
    Route::get('/withdrawals/{id}/reject', [WithdrawalController::class, 'rejectWithdrawal'])->name('withdrawals.reject');
    Route::get('/withdrawal/progress', [WithdrawalController::class, 'inProgress'])->name('withdrawals.inProgress');
    // });

    Route::get('videoos', [VideoController::class, 'index'])->name('videos.indeex');
    // Route::get('/withdrawals/in', [WithdrawalController::class , 'inProgress'])->name('withdrawals.inProgress');



});

// Route::middleware(['can:manage-users'])->group(function () {


// Route pour afficher la liste des niveaux d'utilisateurs
Route::get('/user-levels', [UserLevelController::class, 'index'])->name('user_levels.index');

// Route pour afficher le formulaire de création d'un niveau d'utilisateur
Route::get('/user-levels/create', [UserLevelController::class, 'create'])->name('user_levels.create');

// Route pour enregistrer un nouveau niveau d'utilisateur
Route::post('/user-levels', [UserLevelController::class, 'store'])->name('user_levels.store');

// Route pour afficher les détails d'un niveau d'utilisateur
Route::get('/user-levels/{userLevel}', [UserLevelController::class, 'show'])->name('user_levels.show');

// Route pour afficher le formulaire de modification d'un niveau d'utilisateur
Route::get('/user-levels/{userLevel}/edit', [UserLevelController::class, 'edit'])->name('user_levels.edit');

// Route pour mettre à jour un niveau d'utilisateur
Route::put('/user-levels/{userLevel}', [UserLevelController::class, 'update'])->name('user_levels.update');

// Route pour supprimer un niveau d'utilisateur
Route::delete('/user-levels/{userLevel}', [UserLevelController::class, 'destroy'])->name('user_levels.destroy');
// });

// Route::middleware(['can:manage-users'])->group(function () {


Route::get('/setting/role', [UserController::class, 'roles'])->name('roles.index');
Route::get('/roles/create', [UserController::class, 'create_role'])->name('roles.create');
Route::post('/setting/role', [UserController::class, 'store_role'])->name('role.store');
Route::post('/roles', [UserController::class, 'store_role'])->name('roles.store');
Route::get('/roles/{role}', [UserController::class, 'show_role'])->name('roles.show');
Route::get('/roles/{role}/edit', [UserController::class, 'edit_role'])->name('roles.edit');
Route::put('/roles/{role}', [UserController::class, 'update_role'])->name('roles.update');
//
Route::put('/admin/users/{userId}/update-role', [UserController::class, 'updateRole'])->name('admin.updateRole');
Route::get('/admin/users/{userId}/edit-role', [UserController::class, 'editRole'])->name('admin.editRole');

// });

Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');
Route::get('/videos/list', [VideoController::class, 'list'])->name('videos.liste');
Route::get('/videos/create', [VideoController::class, 'create'])->name('videos.create');
Route::post('/videos', [VideoController::class, 'store'])->name('videos.store');
Route::get('/videos/{id}', [VideoController::class, 'show'])->name('videos.show');
// livk
Route::post('/videos/{video}/like', [VideoController::class, 'like'])->name('videos.like');


// Route::get('/videos/{id}', [VideoController::class, 'play'])->name('videos.play');

Route::get('/videos/{slug}/edit', [VideoController::class, 'edit'])->name('videos.edit');
Route::put('/videos/{id}', [VideoController::class, 'update'])->name('videos.update');
Route::delete('/videos/{id}', [VideoController::class, 'destroy'])->name('videos.destroy');
// Active et desactiveve
Route::put('/videos/{slug}/activate', [VideoController::class, 'activate'])->name('videos.activate');
Route::put('/videos/{slug}/deactivate', [VideoController::class, 'deactivate'])->name('videos.deactivate');
Route::put('/videos/search', [VideoController::class, 'search'])->name('videos.search');
// user_favorite_video
// Exemple de route dans le fichier de routes (web.php ou api.php)
Route::post('/videos/{vid}/favorite', [VideoController::class, 'addToFavorites'])->name('videos.favorite');
Route::delete('/videos/{vid}/favorite', [VideoController::class, 'removeFromFavorites'])->name('videos.unfavorite');





Route::get('/annoces', [AnnoceController::class, 'index'])->name('annoces.index');
Route::get('/annoces/create', [AnnoceController::class, 'create'])->name('annoces.create');
Route::post('/annoces', [AnnoceController::class, 'store'])->name('annoces.store');
Route::get('/annoces/{annoce}/{slug?}', [AnnoceController::class, 'show'])->name('annoces.show');
Route::get('/annoces/{annoce}/edit', [AnnoceController::class, 'edit'])->name('annoces.edit');
Route::put('/annoces/{annoce}', [AnnoceController::class, 'update'])->name('annoces.update');
Route::delete('/annoces/{annoce}', [AnnoceController::class, 'destroy'])->name('annoces.destroy');


// Route::middleware(['auth'])->group(function () {
//     // Route pour générer un code de parrainage
//     Route::post('/generate-referral', [ReferralCodeGenerator::class, 'generateReferralCode'])->name('referral.generate');

//     // Route pour afficher les parrainages de l'utilisateur
//     Route::get('/referrals', 'ReferralController@showReferral')->name('referral.show');
// });


require __DIR__ . '/livewire.php';
require __DIR__ . '/api.php';

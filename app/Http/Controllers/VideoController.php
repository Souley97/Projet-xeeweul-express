<?php

// app/Http/Controllers/VideoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Routing\Controller;
use Vinkla\Hashids\Facades\Hashids;
use App\Models\Like;
use App\Models\User;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        $querye = $request->input('search');
        $videoShearch = Video::when($querye, function ($query) use ($querye) {
            $query->where('titre', 'like', '%' . $querye . '%');
        })
            ->withCount('likes')
            ->orderByDesc('likes_count')
            ->get();
        //     $videosLikeOrView = Video::withCount(['likes', 'views'])
        // ->orderByDesc(request('order_by') === 'likes' ? 'likes_count' : 'views_count')->get();
        // $videosLikeOrView = Video::withCount(['likes_count', 'views_count'])
        // ->orderByDesc(request('order_by') === 'likes' ? 'likes_count' : 'views_count')->get();


        // Accéder au nombre de vues de toutes les vidéos
        $videos = Video::all();
        foreach ($videos as $video) {
            $viewsCount = $video->views_count;
        }
        $users = User::all();
        $videoeLikes = Video::with('likes')->get(); // Assurez-vous que votre modèle Video a une relation avec les likes
        $videos = Video::all()->sortDesc();
        return view('videos.admin.index', compact('videos', 'users', 'videoeLikes', 'querye', 'videoShearch'));
    }
    public function list(Request $request)
    {
        $querye = $request->input('s');

        $videoShearch = Video::when($querye, function ($query) use ($querye) {
            $query->where('titre', 'like', '%' . $querye . '%');
        })->withCount('likes')
            ->orderByDesc('likes_count')
            ->get();
        // $videoShearch = Video::all()->sortDesc();
        $videos = Video::all();
        return view('videos.list', compact('videos', 'querye', 'videoShearch'));
    }


    public function create()
    {
        return view('videos.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'chemin_vers_video' => 'required|file|mimes:mp4,avi,flv,mov,wmv|max:1048576 ',
            'realisateur' => 'nullable|string',
            'duree_minutes' => 'nullable|integer',


        ]);
        $videoPath = $request->file('chemin_vers_video')->store('public/videos');

        $video = new Video([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'chemin_vers_video' => basename($videoPath), // Stockez le nom du fichier seulement
            'realisateur' => $request->input('realisateur'),
            'duree_minutes' => $request->input('duree_minutes'),


        ]);
        $video->save();

        return redirect()->route('videos.index')->with('success', 'La vidéo a été ajoutée avec succès.');
    }

    public function show($slug, Request $request)
    {

        $querye = $request->input('search');
        $videoShearch = Video::when($querye, function ($query) use ($querye) {
            $query->where('titre', 'like', '%' . $querye . '%');
        })->withCount('likes')
            ->orderByDesc('likes_count')
            ->get();

        // Chargez la vidéo avec l'id donné
        $video = Video::where('slug', $slug)->first();
        $hashVideo = Video::where('slug', $slug)->first();

        // Vérifiez si l'utilisateur a déjà vu cette vidéo
        $userHasViewed = $request->session()->has('viewed_videos.' . $video->id);

        // Si l'utilisateur n'a pas encore vu la vidéo, incrémentez le nombre de vues
        if (!$userHasViewed) {
            $video->increment('views_count');

            // Enregistrez dans la session que l'utilisateur a vu cette vidéo
            $request->session()->put('viewed_videos.' . $video->id, true);
        }


        // Chargez les likes pour cette vidéo
        $video->load('likes');

        // Chargez toutes les vidéos actives (si vous avez besoin de les afficher dans la vue)
        $videos = Video::all()->where('is_active', true)->sortDesc();

        // Passez la vidéo et d'autres données à la vue
        return view('videos.index', compact('videos', 'video', 'querye', 'videoShearch', 'hashVideo'));
    }

    public function like(Video $video)
    {
        $like = auth()->user()->likes()->where('video_id', $video->id)->first();

        if ($like) {
            $like->toggleLike();
        } else {
            Like::create(['user_id' => auth()->id(), 'video_id' => $video->id, 'active' => true]);
        }

        return back();
    }

    public function showAllData()
    {

        $users = User::all();
        $videos = Video::with('likes')->get(); // Assurez-vous que votre modèle Video a une relation avec les likes

        return view('votre_vue', ['users' => $users, 'videos' => $videos]);
    }

    // public function show($id)
// {
//     $hashVideo = Video::find($id);
//         // Incrémentez le nombre de vues

    //     $view = Video::find($id);
//     $view->increment('views_count');
//     $view->load('like');
//     $videos=Video::all()->where('is_active',True)->sortDesc();
//     return view('videos.index', ['hashVideo' => $hashVideo], compact('videos','view'));
// }
// public function like(Video $video)
// {
//     $like = auth()->user()->likes()->where('video_id', $video->id)->first();

    //     if ($like) {
//         $like->toggleLike();
//     } else {
//         Like::create(['user_id' => auth()->id(), 'video_id' => $video->id, 'active' => true]);
//     }

    //     return back();
// }
// public function like(Video $video)
// {
//     $video->increment('likes_count');
//     return back();
// }


    public function search(Request $request)
    {
        $query = $request->input('q');

        $videos = Video::where('titre', 'like', '%' . $query . '%')->get();

        return view('videos/list.search', compact('videos', 'query'));
    }



    public function edit($slug)
    {
        $video = Video::where('slug', $slug)->first();
        return view('videos.admin.update', compact('video'));
    }


    public function update(Request $request, $id)
    {
        // Similar validation as in the store method

        $video = Video::find($id);

        $video->titre = $request->input('titre');
        $video->description = $request->input('description');
        $video->duree_minutes = $request->input('duree_minutes');
        $video->realisateur = $request->input('realisateur');
        // Update other fields accordingly

        $video->save();

        return redirect()->route('videos.index')->with('success', 'La vidéo a été mise à jour avec succès.');
    }

    public function activate($id)
    {
        $video = Video::findOrFail($id);
        $video->update(['is_active' => true]);

        return redirect()->route('videos.index')->with('success', 'La vidéo a été activée avec succès.');
    }

    public function deactivate($id)
    {
        $video = Video::findOrFail($id);
        $video->update(['is_active' => false]);

        return redirect()->route('videos.index')->with('success', 'La vidéo a été désactivée avec succès.');
    }

    public function destroy($id)
    {
        $video = Video::find($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'La vidéo a été supprimée avec succès.');
    }
}






?>

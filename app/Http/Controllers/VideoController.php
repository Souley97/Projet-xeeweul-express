<?php

// app/Http/Controllers/VideoController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Illuminate\Routing\Controller;
use Vinkla\Hashids\Facades\Hashids;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::all()->sortDesc();
        return view('videos.admin.index', compact('videos'));
    }
    public function list()
    {
        $videos = Video::all();
        return view('videos.list', compact('videos'));
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
            'hashid' => Hashids::encode(Video::max('id') + 1), // You can adjust this based on your logic


        ]);
        $video->save();

        return redirect()->route('videos.index')->with('success', 'La vidéo a été ajoutée avec succès.');
    }
public function show($id)
{
    $hashVideo = Video::find($id);
    $videos=Video::all()->where('is_active',True)->sortDesc();

    return view('videos.index', ['hashVideo' => $hashVideo], compact('videos'));
}


public function search(Request $request)
{
    $query = $request->input('q');

    $videos = Video::where('titre', 'like', '%' . $query . '%')->get();

    return view('videos.search', compact('videos', 'query'));
}



    public function edit($id)
    {
        $video = Video::find($id);
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

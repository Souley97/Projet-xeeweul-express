<?php

namespace App\Http\Controllers;

use App\Models\Annoce;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AnnoceController extends Controller
{
    
        public function index()
        {
            $videos = Annoce::all();
            return view('videos.annoces.index', compact('videos'));
        }
        public function list()
        {
            $videos = Annoce::all();
            return view('videos.annoces.index', compact('videos'));
        }
    
        public function create()
        {
            return view('videos.annoces.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'titre' => 'required|string|max:255',
                'description' => 'required|string',
                'chemin_vers_video' => 'required|file|mimes:mp4,avi,flv,mov,wmv',
                'realisateur' => 'nullable|string',
                'duree_minutes' => 'nullable|integer',
               
            ]);
            $videoPath = $request->file('chemin_vers_video')->store('public/annoces');
    
            $video = new Annoce([
                'titre' => $request->input('titre'),
                'description' => $request->input('description'),
                'chemin_vers_video' => basename($videoPath), // Stockez le nom du fichier seulement
                'realisateur' => $request->input('realisateur'),
                'duree_minutes' => $request->input('duree_minutes')
                
            ]);
            $video->save();
    
            return redirect()->route('annoces.index')->with('success', 'La vidéo a été ajoutée avec succès.');
        }
        public function show($id,  $slug = null)
    {
        $videos=Video::all();
        $video = Video::findOrFail($id);
    
        $annoces=Annoce::all();
        $annoce = Annoce::findOrFail($id);
    
        return view('videos.annoces.index', compact('video','videos'));
    }
   
    
    
    
    
        public function edit($id)
        {
            $video = Annoce::find($id);
            return view('videos.annoces.update', compact('video'));
        }
    
        public function update(Request $request, $id)
        {
            // Similar validation as in the store method
    
            $video = Annoce::find($id);
    
            $video->titre = $request->input('titre');
            $video->description = $request->input('description');
            $video->realisateur = $request->input('realisateur');
            // Update other fields accordingly
    
            $video->save();
    
            return redirect()->route('annoces.index')->with('success', 'La vidéo a été mise à jour avec succès.');
        }
    
        public function destroy($id)
        {
            $video = Annoce::find($id);
            $video->delete();
    
            return redirect()->route('annoces.index')->with('success', 'La vidéo a été supprimée avec succès.');
        }
    //
}

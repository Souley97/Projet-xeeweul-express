<?php

namespace App\Http\Controllers;

use App\Models\UserLevel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class UserLevelController extends Controller
{

    public function index()
    {
        $userLevels = UserLevel::all();
        return view('admin.levels.index', compact('userLevels'));
    }

    public function create()
    {
        return view('user_levels.create');
    }

    public function store(Request $request)
    {
        UserLevel::create($request->all());
        return redirect()->route('user_levels.index')->with('success','');
        // Logique de création d'un nouveau niveau
    }

    public function show(UserLevel $userLevel)
    {
        return view('admin.levels.show', compact('userLevel'));
    }

    public function edit(UserLevel $userLevel)
    {   
        
        return view('admin.levels.update', compact('userLevel'));
    }

    public function update(Request $request, UserLevel $userLevel)
    {
        // Logique de mise à jour d'un niveau
        $userLevels = UserLevel::all();
        return view('admin.levels.index', compact('userLevel'));
    }

    public function destroy(UserLevel $userLevel)
    {
        $userLevel->delete();
        return redirect()->route('user_levels.index')->with('success','');
        // Logique de suppression d'un niveau
    }
}

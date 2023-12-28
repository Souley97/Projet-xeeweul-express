<?php

namespace App\View\Components;

use App\Models\Question;
use App\Models\Roles;
use App\Models\User;
use App\Models\Video;
use App\Models\Withdrawal;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $video = Video::all();
        $demande = Withdrawal::where('status','pending');
        $question=Question::all();
        return view('layouts.app' ,compact('question', 'demande', 'video'));
    }
}

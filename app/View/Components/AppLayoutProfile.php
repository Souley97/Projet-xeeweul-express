<?php
use Illuminate\Console\View\Components\Component;
use Illuminate\View\View;

class AppLayoutProfile extends Component
{
    public function render():View
    {
        return view("layouts.app2");
    }
}
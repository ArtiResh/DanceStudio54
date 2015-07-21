<?php namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    /**
     * Show the index view.
     *
     * @return index
     */
    public function index()
    {
        $directions = App\Directions::all();
//        $events = App\Events::with('albums')->get();
        $events = App\Events::all();
        $teachers = App\Teachers::all();
        $groups = App\Groups::all();
        return view('index', compact('directions', 'events', 'teachers', 'groups'));
    }
}
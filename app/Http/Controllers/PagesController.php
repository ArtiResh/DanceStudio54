<?php namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;

class PagesController extends Controller {

    /**
     * Show the directions view.
     *
     * @return directions
     */
    public function directions()
    {
        $directions = App\Directions::all();
        return view('inner.directions.index', compact('directions'));
    }

    /**
     * Show the events view.
     *
     * @return events
     */
    public function events()
    {
        $events = App\Events::with('albums')->get();
        return view('inner.events.index', compact('events'));
    }

    /**
     * Show the teachers view.
     *
     * @return teachers
     */
    public function teachers()
    {
        $teachers = App\Teachers::all();
        return view('inner.teachers.index', compact('teachers'));
    }
}
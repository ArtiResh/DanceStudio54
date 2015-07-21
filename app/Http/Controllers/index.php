<?php namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;

class IndexController extends Controller {

    /**
     * Show the directions view.
     *
     * @return directions
     */
    public function directions()
    {
        $directions = App\Directions::all();
        return view('sections.s_directions', compact('directions'));
    }

    /**
     * Show the events view.
     *
     * @return events
     */
    public function events()
    {
        $events = App\Events::all();
        return view('sections.s_studio', compact('events'));
    }

    /**
     * Show the teachers view.
     *
     * @return teachers
     */
    public function teachers()
    {
        $teachers = App\Teachers::all();
        return view('sections.s_masters', compact('teachers'));
    }

    /**
     * Show the groups view.
     *
     * @return groups
     */
    public function groups()
    {
        $groups = App\Groups::all();
        return view('sections.s_application', compact('groups'));
    }

}
<?php
Admin::model('App\Directions')->title('Направления')->display(function ()
{
    $display = AdminDisplay::table();
    $display->with('directions');
    $display->columns([
        Column::string('name')->label('Name<br/><small>(string with accessor)</small>'),
    ]);
    return $display;
})->createAndEdit(null)->delete(null);
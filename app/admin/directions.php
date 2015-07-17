<?php

Admin::model('App\Directions')->title('Направления')->display(function () {
    $res = \App\Directions::get();
    $pic = $res->first();
    $src = 'http://www.54studio.localhost:8080' . $pic->images[0];
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('id')->label('id'),
        Column::datetime('created_at')->label('Дата создания'),
        Column::datetime('updated_at')->label('Дата изменения'),
        Column::string('name')->label('Название'),
        Column::string('description')->label('Описание'),
        Column::string('video_link')->label('Видео'),
        Column::image((string)$src)->label('Картинка'),
    ]);
    return $display;
})->createAndEdit(function () {
    $form = AdminForm::form();
    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('name', 'Название'),
                FormItem::text('description', 'Описание'),
                FormItem::text('video_link', 'Видео'),
            ],
            [
                FormItem::images('images', 'Картинки')
            ]
        ])
    ]);
    return $form;
});
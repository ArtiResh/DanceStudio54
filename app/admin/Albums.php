<?php
Admin::model('App\Albums')->title('Альбомы')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::image('images')->label('Фотография'),
        Column::string('desc')->label('Описание'),
        Column::datetime('created_at')->label('Дата создания'),
        Column::datetime('updated_at')->label('Дата изменения'),
    ]);
    return $display;
})->createAndEdit(function () {
    $form = AdminForm::form();
    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::select('events_id', 'Событие')->model('App\Events')->display('name'),
            ]
        ]),
        FormItem::columns()->columns([
            [
                FormItem::image('images', 'Фотография'),
            ],
            [
                FormItem::text('desc', 'Описание'),
            ]
        ]),
    ]);
    return $form;
});
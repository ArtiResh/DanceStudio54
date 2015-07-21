<?php
Admin::model('App\Albums')->title('Альбомы')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('events.name')->label('Название'),
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
                FormItem::images('images', 'Фотографии'),
            ]
        ]),
    ]);
    return $form;
});
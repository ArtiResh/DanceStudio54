<?php

Admin::model('App\Directions')->title('Направления')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name')->label('Название'),
        Column::datetime('created_at')->label('Дата создания'),
        Column::datetime('updated_at')->label('Дата изменения'),
//        Column::image((string)$src)->label('Картинка'),
    ]);
    return $display;
})->createAndEdit(function () {
    $form = AdminForm::form();
    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('name', 'Название'),
                FormItem::ckeditor('desc', 'Описание'),
                FormItem::ckeditor('desc_detail', 'Описание'),
                FormItem::text('video', 'Видео'),
            ],
            [
                FormItem::images('images', 'Картинки')
            ]
        ])
    ]);
    return $form;
});
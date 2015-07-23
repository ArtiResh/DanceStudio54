<?php

Admin::model('App\Teachers')->title('Наставники')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name')->label('ФИО'),
        Column::datetime('created_at')->label('Дата создания'),
        Column::datetime('updated_at')->label('Дата изменения'),
    ]);
    return $display;
})->createAndEdit(function () {
    $form = AdminForm::form();
    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('name', 'Название'),
                FormItem::textarea('desc', 'Описание'),
                FormItem::ckeditor('desc_detail', 'Подробное описание'),
            ],
            [
                FormItem::images('images', 'Фотографии')
            ]
        ])
    ]);
    return $form;
});
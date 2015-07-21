<?php
Admin::model('App\Events')->title('События')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name')->label('Название'),
        Column::datetime('event_date')->label('Дата события'),
        Column::string('desc')->label('Описание'),
        Column::string('desc_full')->label('Подробное описание'),
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
                FormItem::date('event_date', 'Дата события'),
            ]
        ]),
        FormItem::columns()->columns([
            [
                FormItem::textarea('desc', 'Описание'),
            ],
            [
                FormItem::textarea('desc_full', 'Подробное описание'),
            ]
        ]),
        FormItem::columns()->columns([
            [
                FormItem::textarea('images_desc', 'Описание фотографий'),
            ],
            [
                FormItem::images('images', 'Фотографии'),
            ]
        ])
    ]);
    return $form;
});
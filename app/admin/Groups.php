<?php

Admin::model('App\Groups')->title('Наборы')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name')->label('Название'),
        Column::string('desc')->label('Описание'),
    ]);
    return $display;
})->createAndEdit(function () {
    $form = AdminForm::form();
    $form->items([
        FormItem::columns()->columns([
            [
                FormItem::text('name', 'Название'),
                FormItem::textarea('desc', 'Описание'),
            ]
        ])
    ]);
    return $form;
});
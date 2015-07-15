<?php

Admin::model('App\Company')->title('Companies')->display(function () {
    $display = AdminDisplay::table();
    $display->columns([
        Column::int('id')->label('id'),
        Column::date('created_at')->format('{date format}', '{time format}'),
        Column::date('updated_at')->format('{date format}', '{time format}'),
        Column::string('title')->label('Title'),
        Column::string('address')->label('Address'),
        Column::string('title')->label('Title'),
        Column::string('address')->label('Address'),
    ]);
    return $display;
})->createAndEdit(function ($id) {
    $form = AdminForm::form();
    $form->items([
        FormItem::hidden('contact_id'),
        FormItem::text('title', 'Title')->required()->unique(),
        FormItem::text('address', 'Address'),
        FormItem::text('phone', 'Phone'),
    ]);
    return $form;
});
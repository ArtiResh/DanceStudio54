<?php
Admin::model('App\Directions')->title('Направления')
    ->columns(function ()
    {
        // Describing columns for table view
        Column::count('id', 'id');
        Column::date('created_at', 'Дата создания');
        Column::date('updated_at', 'Дата изменения');
        Column::string('name', 'Название');
        Column::string('description', 'Описание');
        Column::string('video_link', 'Видео');
        Column::string('bg_src', 'Картинка');
    })
    ->form(function ()
    {
        // Describing elements in create and editing forms
        FormItem::text('id', 'id');
        FormItem::timestamp('created_at', 'Дата создания');
        FormItem::timestamp('updated_at', 'Дата изменения');
        FormItem::text('name', 'Название');
        FormItem::text('description', 'Описание');
        FormItem::text('video_link', 'Видео');
        FormItem::text('bg_src', 'Картинка');
    });
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
        Column::image('bg_src', 'Картинка');
    })
    ->form(function ()
    {
        // Describing elements in create and editing forms
        FormItem::text('name', 'Название');
        FormItem::text('description', 'Описание');
        FormItem::text('video_link', 'Видео');
        FormItem::image('bg_src', 'Картинки');

        $photos = \App\Directions::find(9);

        /*$photo = new \App\Pictures();

        $photo->src = 'test.png';

        $photo->desc = 'test desc';

        $photos->photos()->save($photo);*/

        var_dump($photos->photos);
        foreach ($photos->photos as $photo)
        {
            var_dump($photo);
        }
    });
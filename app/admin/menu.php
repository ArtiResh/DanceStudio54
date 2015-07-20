<?php

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');
Admin::menu('App\Directions')->icon('fa-table');
Admin::menu('App\Teachers')->icon('fa-table');
Admin::menu('App\Events')->icon('fa-table');
Admin::menu('App\Groups')->icon('fa-table');

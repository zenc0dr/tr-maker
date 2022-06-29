<?php

use Zen\TrMaker\Controllers\Projects;

Route::get('/tr/{project_id}', [Projects::class, 'tr']);

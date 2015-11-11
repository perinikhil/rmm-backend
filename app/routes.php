<?php

Route::resource('projects', 'ProjectController', ['except' => ['create', 'edit']]);
Route::resource('projects.images', 'ImageController', ['except' => ['create', 'edit']]);

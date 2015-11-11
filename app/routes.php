<?php

// Route::get('/', function(){
//   phpinfo();
// });

Route::resource('projects', 'ProjectController', ['except' => ['create', 'edit']]);
Route::resource('projects.images', 'ImageController', ['except' => ['create', 'edit']]);

<?php

Route::post('/admin', function(){
  $password = Hash::make(Input::get('password'));
  if(strcmp($password,'$2y$10$6pCJ0thMn3LbxzjjnQ78y.UinZyEfCrFE4Gapj5Uk4LEuExkMjCOS'))
    return Response::json([
      'success' => true,
      'alert' => Messages::$loginSuccess
    ]);
});

Route::resource('projects', 'ProjectController', ['except' => ['create', 'edit']]);
Route::resource('projects.images', 'ImageController', ['except' => ['create', 'edit']]);

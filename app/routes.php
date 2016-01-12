<?php

header('Access-Control-Allow-Origin: *');

Route::group(['prefix' => 'v1'], function() {

  Route::post('/login', function(){
    $password = Input::get('password');
    if(Hash::check($password, '$2y$10$1yi4ULBQBgDoCEWT1.w4OOm4uCZab4r/dxs.pdMG5pknt3oUC.F3W'))
      return Response::json(['alert' => Messages::$loginSuccess]);
    else
      return Response::json(['alert' => Messages::$loginFailed], 400);
  });

  Route::resource('projects', 'ProjectController', ['except' => ['create', 'edit']]);
  Route::resource('projects.images', 'ImageController', ['except' => ['create', 'edit']]);

});

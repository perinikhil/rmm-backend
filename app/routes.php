<?php

header('Access-Control-Allow-Origin: *');

Route::group(['prefix' => 'api'], function() {

  Route::post('/login', function(){
    //$password = Hash::make(Input::get('password'));
    $password = Input::get('password');
    if(strcmp($password, 'changeme') == 0)
      return Response::json(['alert' => Messages::$loginSuccess]);
    else
      return Response::json(['alert' => $password], 400);
  });

  Route::resource('projects', 'ProjectController', ['except' => ['create', 'edit']]);
  Route::resource('projects.images', 'ImageController', ['except' => ['create', 'edit']]);

});

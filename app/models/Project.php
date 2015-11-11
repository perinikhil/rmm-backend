<?php

  class Project extends Eloquent {

    protected $table = 'projects';

    protected $fillable = [
      'name', 'description', 'sqft', 'locality', 'address',
      'contact_name', 'contact_number', 'bhk', 'price', 'type', 'gps_latitude',
      'gps_longitude'
    ];

    public static $rules = [];

    public function images()
  	{
  		return $this->hasMany('Image');
  	}

  }

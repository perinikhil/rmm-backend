<?php

  class Image extends Eloquent {

    protected $table = "images";

    protected $fillable = ['project_id', 'path', 'description'];

    public function project()
  	{
  		return $this->belongsTo('Project');
  	}
  }

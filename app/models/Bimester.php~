<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Bimester extends Eloquent implements UserInterface, RemindableInterface {

		use UserTrait, RemindableTrait;
	
		protected $table = 'bimesters';

	      protected $primaryKey = "id_bimesters"; 
		
		  
              protected $fillable = array('name_bimesters','endAt_bimesters','weight_bimesters','year_bimesters');
	  	
	      public static $rules = array(

		      'year_bimesters'=> 'required',
		      'name_bimesters'=> 'required',
		      'endAt_bimesters'=>'required|date|date_format:Y-m-d',
		      'weight_bimesters' => 'required|between:0,1'
	      );



         public function group()
	 {
		 return $this->belongsTo('Group','id_groups');
	 }
	 
}

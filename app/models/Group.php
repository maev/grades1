<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Group extends Eloquent implements UserInterface, RemindableInterface {

		use UserTrait, RemindableTrait;
	
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'groups';

		/**
		 * The attributes excluded from the model's JSON form.
		 *	 * @var array  are hidden
		 */
		 
	      protected $primaryKey = "id_groups"; 
		
		  
              protected $fillable = array('name_groups','year_groups','grados_id_grados');
		
		   
	      public static $rules = array(
		      'name_groups'=> 'required',
		      'year_groups'=> 'required',
		      'grados_id_grados' => 'required'
		    );

         public function grado()
	 {
		 // return $this->belongsTo('Grado','grados_id_grados'); 
		 return $this->belongsTo('Grado','grados_id_grados');
	 }
         public function subject()
	 {
		 return $this->belongsToMany('Subject');
	 }
	 public function students()
	 {
		 return $this->belongsToMany('Student','group_student','id_group','id_student');
	 }
	 
	}

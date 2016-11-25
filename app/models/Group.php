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

		
		/* The attributes excluded from the model's JSON form.
		 *	 * @var array  are hidden
		 */
		 
	      protected $primaryKey = "id_groups"; 
		
		  
              protected $fillable = array('name_groups','year_groups','grados_id_grados');
	      public static $rules = [];
            	      
	  	 /*  
	      public static $rules = array(

		      'year_groups'=> 'required',
		      'name_groups'=> 'required|unique:groups,name_groups,NULL, id_groups,year_groups,' . $this->year_groups,
		      'grados_id_grados' => 'required'

	      );*/
	      public static function getRules($year){
	         $rules = array(
		 
		      'year_groups'=> 'required',
		      'name_groups'=> 'required|unique:groups,name_groups,NULL, id_groups,year_groups,' . $year,
	              'grados_id_grados' => 'required'	 
	      );
		 return $rules;
	      
	      }



         public function grado()
	 {
		 // return $this->belongsTo('Grado','grados_id_grados'); 
		 return $this->belongsTo('Grado','grados_id_grados');
	 }
         //public function subjects()
	 //{
	//	 return $this->hasManyThrough('Subject','Grado',);
	 //}
	 public function students()
	 {
		 return $this->belongsToMany('Student','group_student','id_group','id_student')->withTimestamps();
	 }
	 public function teachers()
	 {
		 return $this->belongsToMany('Teacher','group_subject_teacher','id_group','id_teacher')->withPivot('id_subject','year_groups')->withTimestamps();
		 
	/*	 return $this->belongsToMany('Teacher','group_subject_teacher','id_group','id_teacher')
			 ->withPivot('id_subject','year_groups')
			 ->join('subject','id_subject', 'subjects_id_subjects')
			 ->withTimestamps();
	 */ 

	 }
          public function bimesters()
	  {
              return $this -> hasMany('Bimester', 'group_id');
	  }	  
}

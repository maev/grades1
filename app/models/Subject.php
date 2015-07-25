<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

	class Subject extends Eloquent implements UserInterface, RemindableInterface {
			use UserTrait, RemindableTrait;
			// public $timestamps = false;
			/**
			 * The database table used by the model.
			 *
			 * @var string
			 */
			protected $table = 'subjects';

			/**
			 * The attributes excluded from the model's JSON form.
			 *	 * @var array  are hidden
			 */
			 
		      protected $primaryKey = "id_subjects"; 
			
			  
			   protected $fillable = array('engSpanExtra_subjects', 'name_subjects','IntGrade_subjects');
			
			   
			public static $rules = array(
			   'name_subjects' => 'required',	
			   'engSpanExtra_subjects' => 'required',
			   'IntGrade_subjects'=> 'required'
			  
		   );
		public function grado()
		{
			return $this->belongsToMany('Grado','grado_subject','subjects_id_subjects','grados_id_grados');
		}

		 public function teacher()
		 {
			  return $this->belongsToMany('Teacher','subject_teacher','subjects_id_subjects','teachers_id_teachers');
			  //return $this->hasOne('User','teachers_id_teachers');
		 }
		 // public static $timestamps = false;	  
		}

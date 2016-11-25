<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Score extends Eloquent implements UserInterface, RemindableInterface {
	//class Teacher extends Eloquent{
		use UserTrait, RemindableTrait;
		 //public $timestamps = false;
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'scores';

		/**
		 * The attributes excluded from the model's JSON form.
		 *	 * @var array  are hidden
		 */
		 
	      protected $primaryKey = "id_score"; 
		
		   //protected $guarded = array('id_teachers');
		   protected $fillable = array('year_grades','bimester','gradeNumeric','gradeNonNum', 'absent','id_subjects','id_students','id_teachers');
		
		   
		   public static $rules = array(
		    );

                  public function student()
	          {
		          return $this->belongsTo('Student')->withTimestamps();
	          }
		   
		   public function teacher()
		   {
			   return $this->belongsTo('Teacher');
		   }
		   public function subject()
		   {
			   return $this->belongsTo('Subject');
		   }
	 // public static $timestamps = false;	  
	}

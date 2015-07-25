<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Teacher extends Eloquent implements UserInterface, RemindableInterface {
	//class Teacher extends Eloquent{
		use UserTrait, RemindableTrait;
	//	 public $timestamps = false;
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'teachers';

		/**
		 * The attributes excluded from the model's JSON form.
		 *	 * @var array  are hidden
		 */
		 
	      protected $primaryKey = "id_teachers"; 
		
		   //protected $guarded = array('id_teachers');
		   protected $fillable = array('firstName_teachers', 'Lastname_teachers','email_teachers','phone_teachers','active_teachers');
		
		   
		   public static $rules = array(
		   'Firstname_teachers' => 'required|min:2',
		   'Lastname_teachers'=> 'required|min:4',
		  
	   );

         public function user()
	 {
		  return $this->belongsTo('User');
		  //return $this->hasOne('User','teachers_id_teachers');
	 }
         public function subject()
	 {
		 return $this->hasMany('Subject','teachers_subjects','id_teachers','id_subjects');
	 }
	 // public static $timestamps = false;	  
	}

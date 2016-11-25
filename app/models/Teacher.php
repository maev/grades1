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

         public function getTeacherFullNameAttribute()
	 {
               return $this->attributes['firstName_teachers'].' '.$this->attributes['lastName_teachers'];
	 }//put in controller:  $teacher = Teacher::orderBy('lastName_teacher')->get();
  //$teachers = $teachers->all()->lists('TeacherFullName','id_teachers');		   

         public function user()
	 {
		  return $this->belongsTo('User');
		  //return $this->hasOne('User','teachers_id_teachers');
	 }
         public function subjects()
	 {
		 return $this->belongsToMany('Subject','group_subject_teacher','id_teacher','id_subject');
	 }
	 public function groups()
	 {
		 return $this->belongsToMany('Group','group_subject_teacher','id_teacher','id_group');
         }		 
}
 

<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Student extends Eloquent implements UserInterface, RemindableInterface {
	
		use UserTrait, RemindableTrait;
 
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'students';

		/**
		 * The attributes excluded from the model's JSON form.
		 *	 * @var array  are hidden
		 */
		 
	            protected $primaryKey = "id_students"; 
		
		   //protected $guarded = array('id_teachers');
		   protected $fillable = array('firstName_students', 'Lastname_students','active_students', 'curp_students');
		
		   
		public static $rules = array(
		   'firstName_students' => 'required|min:2',
		   'lastName_students'=> 'required|min:2',
		   'active_students'=> 'required',
		   'curp_students'=>'required|size:18|unique:students,curp_students'  		  
	          );

		  public static $messages = array(
			   'curp_students.unique' => 'El CURP ya existe',
		        );

         public function grades()
	 {
		  return $this->hasMany('Grades');
		  //return $this->hasOne('User','teachers_id_teachers');
	 }

         public function groups()
	 {
		 return $this->belongsToMany('Group','group_student','id_student','id_group');
	 }
         public function getStudentFullNameAttribute()
	 {
             return $this->attributes['firstName_students'].' '.$this->attributes['lastName_students'];
	 }
        
        /** public static function messages()
	 {
           return['curp_students.unique' => 'Ya existe'];
	 } **/

}

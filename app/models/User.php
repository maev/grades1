<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	//class User extends Eloquent{
		use UserTrait, RemindableTrait;
		// public $timestamps = false;
		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'users';

		/**
		 * The attributes excluded from the model's JSON form.
		 *	 * @var array  are hidden
		 */
		 
	       
		
		   protected $guarded = array('id');
		   protected $fillable = array('username');
		 //protected $fillable = array('name');
		 // protected $fillable = array('username');  
		  protected $hidden = array('password', 'remember_token','admin_users','active_users');
		   
		   public static $rules = array(
		   'username'=> 'required|min:4',
		   'password' => 'required|min:5', 'password' => 'required|confirmed'
		   //'password' => 'password' == 'password_confirmation'
	   );

		   public function teacher()
		   {
			   return $this->hasOne('Teacher','user_id');
		   }
		  
		  
}

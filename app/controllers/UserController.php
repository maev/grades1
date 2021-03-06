<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	        $teachers = Teacher::orderBy('lastName_teachers', 'asc')->get();
		//$teachers->toarray();
		//$users = User::teacher()->orderBy('lastName_teachers','asc')->orderBy('active_users','desc')->get();
		$users = User::whereHas('teacher', function($q) {
			$q->orderBy('Lastname_teachers','asc');
		})->orderBy('active_users','desc')->get();
		//$users = User::all();
		//$users->toarray();
		return View::make('users.index', compact('users','teachers'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	     return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{ 
          //return Input::get('admin_users');
	  //if(!$isAdmin){
	//	  $isAdmin 
	 // }

	  $input = Input::all();
          $validation = Validator::make($input, User::$rules);

          if ($validation->passes())
          {
           // User::create($input);

            $user = new User;
	    $user->username=Input::get('username');
	    $plainTextPassword = Input::get('password');
	    $user->password =Hash::make($plainTextPassword);
	    $user->admin_users = Input::get('admin_users');
	       if(!$user->admin_users){
                  $user->admin_users = 0;
	       }
	    //$user->password_confirmation = $user->password;
	    $user->save();
	    $teacher = new Teacher;
	    $teacher->firstName_teachers=Input::get('firstName');
	    $teacher->lastName_teachers=Input::get('lastName');
	    //$teacher->save();
	    //$user->teachers_id_teachers=$teacher->id_teachers;
	    
            $user->teacher()->save($teacher);
            //$teacher->user()->save($user);

              Session::flash('message', 'Usuario creado exitosamente');
            return Redirect::route('users.index');
          }

        return Redirect::route('users.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user = User::find($id);
        if (is_null($user))
        {
            return Redirect::route('users.index');
        
        Session::flash('message', 'User does not exist in database');
	}
	return View::make('users.edit', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
         

          $validation = Validator::make($input, User::$rules);
          if ($validation->passes())
        {
            $user = User::find($id);
	    $user->update($input);

	     //$user->teacher->firstName_teachers= Input::get('firstName_teachers');
	  
	    $teacher = $user->teacher;
	    $teacher->firstName_teachers = Input::get('firstName_teachers');
	   //$inputTeacher = Input::get('firstName_teachers');
	  // $user->teacher->update($input);
            $user->teacher()->save($teacher);
            Session::flash('message','Usuario actualizado exitosamente');
            return Redirect::route('users.index', $id);
        }
         return Redirect::route('users.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//User::find($id)->delete();
		$user = User::find($id);
		if($user -> active_users == 1){
			$user-> active_users = 0;
		}
		else{
			$user -> active_users = 1;
		}
		$user -> save();
                return Redirect::route('users.index');
	}


}

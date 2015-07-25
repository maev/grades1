<?php

class GroupController extends \BaseController {

	/**i
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$groups = Group::orderBy('year_groups','desc')->orderBy('grados_id_grados','asc')->get();
		$groups->toarray();
		return View::make('groups.index',compact('groups'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$id_grados = Grado::lists('id_grados','id_grados');
		//$id_students = Student::lists('Firstname_students','id_students');
		$id_students = Student::where('active_students','1')->lists('Firstname_students','id_students');
		return View::make('groups.create',compact('id_grados','id_students'));
	//	return View::make('groups.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Group::$rules);

		if($validation->passes()){
		
				
               	      $group = new Group;
		      $group->name_groups = Input::get('name_groups');
		      $group->year_groups = Input::get('year_groups');
		      $group->grados_id_grados = Input::get('grados_id_grados');
		      $group->save();
		     
		      //$students = Student::find(Input::get('id_students'));
		     
		      $group->students()->attach(Input::get('id_students'));                     
		      $group->save();
	              
		      
		     // return Input::get('id_students');
		      Session::flash('message', 'Exito, grupo creado');
		      return Redirect::route('groups.index');
		}

		return Redirect::route('groups.create')
			 ->withInput()
		         ->withErrors($validation);
			  
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$group = Group::find($id);
		return View::make('groups.show',compact('group'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$group = Group::find($id);
		$id_grados = Grado::lists('id_grados', 'id_grados');
		//return $id_grados;
		$id_students = Student::where('active_students','1')->lists('Firstname_students','id_students');
		return View::make('groups.edit', compact('group','id_grados','id_students'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "atUpdate";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}

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
	
		$id_teachers = Teacher::whereHas('user',function($q) {                             $q->where('active_users','1');                                                   })->lists('Firstname_teachers','id_teachers');
		
		return View::make('groups.create',compact('id_grados','id_students','id_teachers'));
	
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

		      //attach students to group (group_students)
		      if($group->students()->count()){ 
			      $group->students()->attach(Input::get('id_students'));
		      }		      
		      //get subjects and attach to subject to teacher
		     $subjects = Subject::whereHas('grado',function($q) {                             $q->where('grados_id_grados',Input::get('grados_id_grados'));                                                   })->get();
		    
		      //1=eng, 2=span, 3=extra
		      foreach($subjects as $subject){
			      if($subject->engSpanExtra_subjects == 2){
				      //assoc to english teacher
				      $englishTeacher = Teacher::find(Input::get('id_teacher_en'));
				$group->teachers()->save($englishTeacher, array('id_subject' => $subject -> id_subjects, 'year_groups' => $group -> year_groups));     

			      }
			      else if($subject->engSpanExtra_subjects == 1){
				      $spanishTeacher = Teacher::find(Input::get('id_teacher_sp'));
				 $group->teachers()->save($spanishTeacher, array('id_subject' => $subject ->id_subjects, 'year_groups' => $group -> year_groups));

			      }


		      }

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
		$teachers = $group->teachers;
		$teachers = $teachers->unique();
	//	return $teachers;
		//$teachers = $group->teachers()->distinct()->get();
		$students = $group->students()->orderBy('lastName_students','ASC')->get();
	
		return View::make('groups.show',compact('group','teachers','students'));
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
		$id_teachers = Teacher::whereHas('user', function($q){
		  $q -> where('active_users', '1');
		}) ->lists('firstName_teachers', 'id_teachers');
		
		$id_students = Student::where('active_students','1')->lists('Firstname_students','id_students');
		return View::make('groups.edit', compact('group','id_grados','id_students', 'id_teachers'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//add this line after validation
		//$group->students()->sync(Input::get('id_students'));
		$input = Input::all();
		$validation = Validator::make($input, Group::$rules);

		if($validation->passes()){
		
               	      $group = Group::find($id);
		      $group->name_groups = Input::get('name_groups');
		      $group->year_groups = Input::get('year_groups');
		      $group->grados_id_grados = Input::get('grados_id_grados');
		      $group->save();

	       	      $group->students()->sync(Input::get('id_students'));
		     //attach students to group (group_students) 
		     // $group->students()->updateExistingPivot(Input::get('id_students','id_student',false));                                          
		      //get subjects and attach to subject to teacher
		     $subjects = Subject::whereHas('grado',function($q) {                             $q->where('grados_id_grados',Input::get('grados_id_grados'));                                                   })->get();
		     
		      $group->teachers()->detach();
		      //1=eng, 2=span, 3=extra
		      foreach($subjects as $subject){
			      if($subject->engSpanExtra_subjects == 2){
				      //assoc to english teacher
                                $englishTeacher = Teacher::find(Input::get('id_teacher_en'));
				$group->teachers()->attach($englishTeacher, array('id_subject' => $subject -> id_subjects, 'year_groups' => $group -> year_groups));
			//	$group->teachers()->sync(array((Input::get('id_teacher_en')) => array('id_subject' => $subject -> id_subjects, 'year_groups' => $group -> year_groups)));     
			      
			      }
			      else if($subject->engSpanExtra_subjects == 1){
				      $spanishTeacher = Teacher::find(Input::get('id_teacher_sp'));
			$group->teachers()-> attach($spanishTeacher, array('id_subject' => $subject ->id_subjects, 'year_groups' => $group -> year_groups));

			      }
		      }
		      $group->save();
		      
		      Session::flash('message', 'Exito, grupo actualizado');
		      return Redirect::route('groups.index');
   }
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

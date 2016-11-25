<?php

class StudentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//	$students = Student::All();
		//$students = Student::orderBy('lastName_students','asc')->orderBy('active_students','DESC')->get();
	        //$students->toarray();	
		$students = Student::orderBy('active_students', 'desc')->orderBy('lastName_students','asc')->get();
	        $students->toarray();	
		return View::make('students.index', compact ('students'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	   return View::make('students.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//	return "must store";
		$input = Input::all();
		 
		$validation = Validator::make($input, Student::$rules, Student::$messages);

		if($validation->passes())
	        {
	           $student= new Student;
		   $student->firstName_students = Input::get('firstName_students');
		   $student->lastName_students = Input::get('lastName_students');
		   $student->active_students= Input::get('active_students');
		   $student->curp_students = Input::get('curp_students');
		   $student->save();  
		   Session::flash('message','Exito, Alumno Agregado');
		   return Redirect::route('students.index');
		}
		return Redirect::route('students.create')
			->withInput()
			->withErrors($validation)
		        ->with('message','Errors');
			//->with('message', serialize(Student::messages()));
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
	      // return "at edit";   
		$student = Student::find($id);

	       if(is_null($student)){
		       Session::flash('message', 'Student does not exist in database');
		       return Redirect::route('students.index');
	       }
	       return View::make('students.edit', compact('student'));
	}


	/*u*
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	       
		//$student = Student::find($id);  
	  $id_students = $id;	
          $input = Input::all();
	 Student::$rules['curp_students'] = 'required|min:18|max:18|unique:students,curp_students,'.$id_students. ',id_students';
	  $validation = Validator::make($input, Student::$rules);
	  if ($validation->passes())
	  {
	      $student = Student::find($id);
	     // $student->update($input); 
		   $student->firstName_students = Input::get('firstName_students');
		   $student->lastName_students = Input::get('lastName_students');
		   $student->active_students = Input::get('active_students');
		   $student->curp_students = Input::get('curp_students');
		   $student->save();
		   Session::flash('message','Alumno actualizado exitosamente');
	      return Redirect::route('students.index', $id);
	  }
	  return Redirect::route('students.edit', $id)
		   ->withInput()
	           ->withErrors($validation)
	           ->with('message', 'Errores de validacion');
		  
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$student = Student::find($id);
		if($student->active_students == 0){
			$student->active_students = 1;
		}
		else{
		   $student->active_students=0;
		 }
		$student->save();
		return Redirect::route('students.index');
	}


}

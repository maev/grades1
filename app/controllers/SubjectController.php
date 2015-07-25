<?php

class SubjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{     $subjects = Subject::all();
	      $subjects->toArray();
	      return View::make('subjects.index', compact('subjects'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	      return View::make('subjects.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Subject::$rules);

		if($validation->passes())
		{
			$subject = new Subject;
			$subject->name_subjects = Input::get('name_subjects');

			$type = Input::get('engSpanExtra_subjects');
			switch($type) {
			  case "spanish":
                             $subject->engSpanExtra_subjects = 1;
			     break;
		         case "english":
			     $subject->engSpanExtra_subjects = 2;
		             break;
                 	 case "extra":
			     $subject->engSpanExtra_subjects = 3;
			     break;
			}

		        $intGrade = Input::get('IntGrade_subjects');
			
			switch($intGrade) {
			  case "yes":
                             $subject->IntGrade_subjects = 1;
			     break;
		         case "no":
			     $subject->IntGrade_subjects = 0;
		             break;
		        }
		        $subject->save();
		        Session::flash('message','Exito, Materia agregada');
		        return Redirect::route('subjects.index');	
		}
		else
		{
	          return Redirect::route('subjects.create')
			    ->withInput()
			    ->withErrors($validation)
			    ->with('message','Hubo errores de validacion');
		}
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
           $subject = Subject::find($id);
	   if(is_null($subject))
	   {
              return Redirect::route('subjects.index');
	      Session::flash('message','Materia no existe');
	   }

	   return View::make('subjects.edit', compact('subject'));
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
	      $validation = Validator::make($input, Subject::$rules);

	      if($validation->passes())
	      {

	              $subject = Subject::find($id);	      
		      $subject->name_subjects = Input::get('name_subjects');

			$type = Input::get('engSpanExtra_subjects');
			switch($type) {
			  case "spanish":
                             $subject->engSpanExtra_subjects = 1;
			     break;
		         case "english":
			     $subject->engSpanExtra_subjects = 2;
		             break;
                 	 case "extra":
			     $subject->engSpanExtra_subjects = 3;
			     break;
			}

		        $intGrade = Input::get('IntGrade_subjects');
			
			switch($intGrade) {
			  case "yes":
                             $subject->IntGrade_subjects = 1;
			     break;
		         case "no":
			     $subject->IntGrade_subjects = 0;
		             break;
		        }
		        $subject->save();
		        Session::flash('message','Exito, Materia agregada');
		        return Redirect::route('subjects.index');	
	
		      //$subject = Subject::find($id);
		      //$subject->update($input);
		      //Session::flash('message','Exito, materia actualizada');
		      //return Redirect::route('subjects.index',$id);
	      }
	        return Redirect::route('subjects.edit', $id)
			   ->withInput()
			   ->withErrors($validation)
			   ->with('message', 'Errores validacion');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{        
		Subject::find($id)->delete();
		return Redirect::route('subjects.index');
	}


}

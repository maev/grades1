<?php

class GradoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *bear
	 * @return Response       
	 */    
	public function index()
	{
		$grados = Grado::all();
		$years = "";
		$yearSubjects = array();
	        $i = 0;
               foreach($grados as $grado){
		       foreach($grado->subject as $subject) {
			$y = $subject->pivot->year_grado_subject;
			$years[] = $y;
			$yearSubjects[$i] = array($grado, $subject, $y);
			$i++;
		}
	       } 
	 //	$years = $grados->name_grados;
		// $years = $grados->pivot->year_grado_subject

		 if($years == ""){
	          $years[] = date("Y");
		 }		
      		 $years = array_unique($years);
		 $year = sort($years);
		 $grados->toarray();


		
		return View::make('grados.index',compact('grados', 'years', 'yearSubjects'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


	       

	}


/*
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$grados = Grado::find($id);
		//$year = Input::get('year');
	
		
	//	$grado->toarray();
	       // return $grado;	
	        return View::make('grados.show',compact('grados'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	       $grado = Grado::find($id);
	       if(is_null($grado)){     
		       Session::flash('message','Grado no existe');
		       return Redirect::route('grados.index');
		  
	       }
	       return View::make('grados.edit',compact('grado'));
	}


	/* *
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{ 	$grado = Grado::find($id);
	        $subjectIds = Input::get('subj');
	       $year = Input::get('year');
	    if(is_null($subjectIds)){ 
	       Session::flash('message','No se seleccion ninguna materia');
               return View::make('grados.edit',compact('grado'));	       
	     }
	    
	    
	    foreach($subjectIds as $subjectId){
		    //if(!$grado->subject->contains($subjectId->subjects_id_subjects)){
		    $subject = Subject::find($subjectId);	 
		    if(!$grado->subject->contains($subject)){
		       $grado->subject()->attach($subject, array('year_grado_subject'=>$year));
		    }
		 } 
	       
                Session::flash('message','Exito, materias agregadas');	
		return Redirect::route('grados.index');
               		
        }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
public function destroy($gradoId, $subjectId)
{        
	       
		$grado = Grado::find($gradoId);
		$year = 2014;
             		
                $grado->subject()->detach($subjectId, array('year_grado_subject'=>$year));
	             
                Session::flash('message',$subjectId);	
		return Redirect::route('grados.index');
               	
	}




}

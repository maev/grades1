@extends('layouts.user')

@section('main')

<h1>Editar Materia</h1>
{{ Form::model($subject, array('method' => 'PATCH', 'route' =>
 array('subjects.update', $subject->id_subjects))) }}
    <ul>        

         <li> 
            {{Form::label('name_subjects', 'Nombre de Materia:')  }}
            {{Form::text('name_subjects') }}
	</li> 
         </br>
         </br>
         <b>Tipo de Materia:</b>
         <li>  
	   <input type="radio" name="engSpanExtra_subjects" value="spanish">Espanol
	  <input type="radio" name="engSpanExtra_subjects" value="english">Ingles
          <input type="radio" name="engSpanExtra_subjects" value="extra">Extracurricular
          
        
	 </li>
         </br></br>
        <b>Calificacion Numerica</b>
        <li>
           
	   <input type="radio" name="IntGrade_subjects" value="yes">Si
	  <input type="radio" name="IntGrade_subjects" value="no">No
       
        </li>
        </br></br></br>
       

        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('subjects.update', 'Cancel', $subject->
id_subjects, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

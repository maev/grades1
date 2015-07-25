@extends('layouts.user')

@section('main')

<h1>Editar Alumno</h1>
{{ Form::model($student, array('method' => 'PATCH', 'route' =>
 array('students.update', $student->id_students))) }}
    <ul>
         <li>
             {{ Form::label('firstName_students','Nombre') }}
	     {{ Form::text('firstName_students',$student->firstName_students) }}
         </li>
        <li>
             {{ Form::label('lastName_students','Apellido') }}
	     {{ Form::text('lastName_students', $student->lastName_students) }}
	 </li>
         <li>
             {{ Form::label('curp_students', 'CURP')  }}
             {{ Form::text('curp_students', $student->curp_students')  }}
          </li>  
        <li>
            {{ "Status" }} </br>
        <input type = "radio" name= "active_students" value="1"> {{"Activo"}}
        <input type = "radio" name="active_students" value="0"> {{"Inactivo"}}
        </li>   
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('students.show', 'Cancel', $student->
id_students, array('class' => 'btn')) }}
        </li>  
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

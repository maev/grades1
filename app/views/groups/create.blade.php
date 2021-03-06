@extends('layouts.user')

@section('main')

<h1>Crear Grupo</h1>
{{ Form::open(array('route' => 'groups.store')) }}
    <ul> 
        <li> 
            {{Form::label('name_groups', 'Nombre:')  }}
            {{Form::text('name_groups') }}
        </li>
	<li>
             Year:</br>	   
            <select name="year_groups" id="year_groups" class="form-control"> 
	    <option value = "{{$years[0]}}" > {{$years[0]}}-{{$years[0]+1}} </option>

	    <option value = "{{$years[1]}}" > {{$years[1]}}-{{$years[1]+1}} </option>
             </select>
       <!--   {{Form::select('years', array($years[0] => $years[0] - ($years[0]+1)))}} --!>      
	 </li>
	 <li>
	  
	  </br>
	    {{  Form::label('grados_id_grados', 'Grado:')  }}
             {{ Form::select('grados_id_grados', $id_grados, 'grados_id_grados', ['class'=>'form-control'])  }}
         </li>
	</br> 
      	     {{Form::label('id_teacher','Maestro de Espanol:')  }}
             {{Form::select('id_teacher_sp', $id_teachers, 'id_teachers', ['classes'=> 'form-control'])  }}
        </li>
        </br> 
         <li> 
      	     {{Form::label('id_teacher','Maestro de Ingles:')  }}
             {{Form::select('id_teacher_en', $id_teachers, 'id_teachers', ['classes'=> 'form-control'])  }}
        </li>


         <li>
	     {{Form::label('id_students', 'Alumnos:')  }}
	     {{Form::select('id_students[]', $id_students, 'id_students', ['class'=> 'form-control','multiple'])  }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
	</li>
        <li>
	    {{Form::label('date','fecha')}}
            {{Form::date('fech'); }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

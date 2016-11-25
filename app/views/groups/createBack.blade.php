@extends('layouts.user')

@section('main')

<h1>Create Group</h1>
    <!--
{{ Form::open(array('route' => 'groups.store')) }}
    <ul> 
        <li> 
            {{Form::label('name_groups', 'Nombre:')  }}
            {{Form::text('name_groups') }}
        </li>
        <li>
            {{Form::label('year_groups','Year:') }}
            {{Form::text('year_groups')  }}
	 </li>
	 <li>
	    {{ ' Grado:'   }}
	  </br>
            <select name = "grados_id_grados">
	  
            @foreach ($ids as $id) 
	    
	      <option value = {{$id}}>{{$id}}</option>
	    @endforeach
            </select>       
	</li>
	<li>
	    {{  Form::label('grados_id_grados', 'Grado:')  }}
             {{ Form::select('grados_id_grados', $id_grados, 'grados_id_grados', ['class'=>'form-control'])  }}
         </li>
	</br> 
         <li>
	     {{Form::label('id_teacher','Maestro de Espanol:')  }}
             {{Form::label('id_teachers[]', $id_teachers, 'id_teachers', ['classes'=> 'form-control'])  }}
        </li>
        </br> 
        <li>
	     {{Form::label('id_students', 'Alumnos:')  }}
	     {{Form::select('id_students[]', $id_students, 'id_students', ['class'=> 'form-control','multiple'])  }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

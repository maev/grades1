@extends('layouts.user')

@section('main')

<h1>Agregar Materias a {{ $grado->name_grados }} Grado</h1>

{{ Form::model($grado, array('method' => 'PATCH', 'route' =>
 array('grados.update', $grado->id_grados))) }}
    <ul>        

           <?php  $subjects = Subject::all();
                $subjects->toarray();  ?>
        
	      @foreach($subjects as $subject)
                 <table>
		   <tr><td>{{ $subject->name_subjects }} </td>
                        <td><input type="checkbox" name="subj[]" value = {{$subject->id_subjects }} ></td></tr>
	         </table>  
             @endforeach

        <li>
	    {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
	    
	     
            {{ link_to_route('grados.index', 'Cancel', array('class' => 'btn btn-info')) }}
            
      
    </ul>
<!--{{ Form::close() }} -->

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

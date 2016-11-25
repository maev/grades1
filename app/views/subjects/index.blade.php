@extends('layouts.user')
@section('main')

<h3 align="right"> <b>{{HTML::link('dashboard','Dashboard') }} </b></h3>
<h1>Lista Materias</h1>

<p>{{ link_to_route('subjects.create', 'Agregar Materia') }}</p>


@if ($subjects->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
		<th>Nombre</th>
                <th>Tipo</th>
                <th>Calificacion numerica</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($subjects as $subject)
                <tr>
		    <td>{{ $subject->name_subjects }}</td> 
                 <?php  $type = $subject->engSpanExtra_subjects;
                         if($type == 1){ ?><td>Espanol</td><?php }
			 else if($type == 2){ ?><td>Ingles</td> <?php } 
			 else if($type == 3){ ?><td>Extracurricular</td> <?php }                       $intGrade = $subject->IntGrade_subjects;
                         if($intGrade == 0){ ?><td>No</td> <?php }
                         else if($intGrade == 1){ ?><td>Si</td> <?php } ?>
                          
                
                  
               
		    <td>{{ link_to_route('subjects.edit', 'Editar',
 array($subject->id_subjects), array('class' => 'btn btn-info')) }}</td>
                    <td>
          {{ Form::open(array('method'=>'DELETE',                                         'route' => array('subjects.destroy', $subject->id_subjects))) }}                     
                            {{ Form::submit('Delete', array('class'
 => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    No hay materias registrados
@endif

@stop














         






















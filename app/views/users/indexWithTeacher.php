@extends('layouts.user')
@section('main')

<h1>Lista Maestros</h1>
<h3 align = right> <b> {{HTML::link('dashboard', 'Dashboard') }}</b>  </h3>
<p>{{ link_to_route('users.create', 'Agregar Maestro') }}</p>


@if ($teachers->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
		<th>Nombre</th>
                <th>Apellido</th>
                <th>Usuario</th>
       <!-- <th>Password</th> --> 
            </tr>
        </thead>

        <tbody>
            @foreach ($teachers as $teacher)
                <tr>
		    <td>{{ $teacher->firstName_teachers }}</td>
                    <td>{{ $teacher->lastName_teachers }}</td>
                    <td>{{ $teacher->user->username }}</td>
         
                    <td>{{ link_to_route('users.edit', 'Editar',
 array($teacher->user()->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
          {{ Form::open(array('method' 
=> 'DELETE', 'route' => array('users.destroy', $teacher->user()->id))) }}                       
                            {{ Form::submit('Activar/Inactivar', array('class'
 => 'btn btn-default')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    No hay maestros registrados
@endif

@stop














         






















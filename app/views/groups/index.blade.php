@extends('layouts.user')
@section('main')

<h3 align=right> <b>{{HTML::link('dashboard', 'Dashboard') }} </b></h3>

<h1>Lista Grupos</h1>

<p>{{ link_to_route('groups.create', 'Agregar Grupo') }}</p>


@if ($groups->count())
    <table class="table table-striped table-bordered">
        <thead>
	    <tr>
                
		<th>ID</th>
		<th>Nombre</th> 
		<th>Grado</th>
                <th>Year</th>
                <th>Editar</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($groups as $group)
                <tr>
		    <td>{{ $group->id_groups }}</td>
		    <!--<td>{{ $group->name_groups }}</td>-->
		    <td><a href="{{ route('groups.show', $group->id_groups) }}">{{   $group->name_groups }}</a></td>
  
                    <td>{{ $group->grado->name_grados }}</td>
                    <td>{{ $group->year_groups }}</td>     
                    <td>{{ link_to_route('groups.edit', 'Editar',
 array($group->id_groups), array('class' => 'btn btn-info')) }}</td>
                    <td>
          {{ Form::open(array('method'=> 'DELETE', 'route' => array('groups.destroy', $group->id_groups))) }}                       
                           
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
              
        </tbody>
      
    </table>
@else
    No hay grupos registrados
@endif

@stop














         





















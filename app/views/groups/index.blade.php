@extends('layouts.user')
@section('main')


<?php
$y = date("Y");
$m = date("m");
if($m < 9){
 $y = $y-1;
}
?>
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
                <th></th>
            </tr>
        </thead>

	<tbody>
	    <?php 
             $y = date("Y");
             $m = date("m");
             if($m < 8){
                $y = $y-1;
	     }
             ?>
            @foreach ($groups as $group)
	    <tr>
		    <td>{{ $group->id_groups }}</td>
		    <!--<td>{{ $group->name_groups }}</td>-->
		    <td><a href="{{ route('groups.show', $group->id_groups) }}">{{   $group->name_groups }}</a></td>
  
                    <td>{{ $group->grado->name_grados }}</td>
		    <td>{{ $group->year_groups }}</td>

             @if($group->year_groups >= $y)
                    <td>{{ link_to_route('groups.edit', 'Editar',
 array($group->id_groups),array('class' => 'btn btn-info')) }}</td>
                  </td>
          <td>
          {{ Form::open(array('method'=> 'DELETE', 'route' => array('groups.destroy', $group->id_groups))) }}                       
	   {{Form::submit('Suprimir', array('class' => 'btn btn-danger')) }}                            
           {{ Form::close() }}
                    </td>
                </tr>
            
             @else
                    <td>{{ Form::submit('Editar', array('class' => 'btn btn-info','disabled'=>'disabled')) }}</td>
<td>
{{Form::submit('Suprimir', array('class' => 'btn btn-danger','disabled'=>'disabled')) }}
</td></tr>
              @endif	     
               
            @endforeach
              
        </tbody>
      
    </table>
@else
    No hay grupos registrados
@endif

@stop














         






















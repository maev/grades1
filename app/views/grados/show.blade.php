@extends('layouts.user')

@section('main')

<h1>Materias associadas a {{ $grados->name_grados }} Grado</h1>

 @if($grados->subject->count()) 
          @foreach($grados->subject as $subject)
         <li>
            {{$subject->name_subjects}}
         </li>
	@endforeach
   @else
      No tiene materias asociadas
  @endif
@stop


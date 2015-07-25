@extends('layouts.user')

@section('main')

<h1>Editar Maestro</h1>
{{ Form::model($user, array('method' => 'PATCH', 'route' =>
 array('users.update', $user->id))) }}
    <ul>
         <li>
             {{ Form::label('firstName_teachers','Nombre') }}
	     {{ Form::text('firstName_teachers',$user->teacher->firstName_teachers) }}
         </li>
        <li>
             {{ Form::label('lastName_teachers','Apellido') }}
	     {{ Form::text('lastName_teachers', $user->teacher->lastName_teachers) }}
         </li>

         <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}        </li>
        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password','') }}
        </li>        
        <li>
            {{ Form::label('password', 'Confirm password') }}
            {{ Form::password('password_confirmation') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('users.show', 'Cancel', $user->
id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop

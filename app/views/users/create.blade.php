@extends('layouts.user')

@section('main')

<h1>Create User</h1>

{{ Form::open(array('route' => 'users.store')) }}
    <ul>
        <li> 
            {{Form::label('firstName', 'Nombre:')  }}
            {{Form::text('firstName') }}
        </li>
        <li>
            {{Form::label('lastName','Apellido:') }}
            {{Form::text('lastName')  }}
         </li>
        <li>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('username') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password') }}
        </li>        
        <li>
	   {{ Form::label('password', 'Confirm Password:')  }}
           {{ Form::password('password_confirmation') }}
          </li>
         <li>{{ 'Administrador' }} 
	    {{Form::checkbox('admin_users', '1')  }}
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

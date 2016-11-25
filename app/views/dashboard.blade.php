
<html>
  <head>
   <title> Dashboard </title>
    {{ HTML::style('assets/css/styles.css');  }}
  </head>


  <body>

   <h1>Bienvenido!</br>Dashboard</h1>
    


   <a href="{{ url('groups') }}"><span><i class = "http://localhost/laravel/assets/images/group.jpg"></span></a>
   
   <div id = "container">
    <div id = "left">
     <p> {{HTML::link('users', 'Maestros')  }} </p> </br>
     <p> {{HTML::link('subjects','Materias')  }} </p></br>
     <p> {{HTML::link('grados', 'Grados') }} <p>
<!--     {{HTML::script('assets/js/myjavascript.js'); }} -->

    </div>

   <div id="center">
     <img src = "{{ asset('assets/images/LogoPiaget2.jpg')  }}">
  <!-- </br><img src = "{{ asset('assets/images/group.jpg') }}"  />
    {{ HTML::image('assets/images/group.jpg', 'Groups'); }}-->
    </div>

    <div id="right">
   <p> {{HTML::link('students', 'Alumnos') }} </p></br>
   <p> {{HTML::link('groups', 'Grupos') }} </p></br>
   <p> {{HTML::link('scores', 'Calificaciones') }} </p>
   
   </div>

  </div>
 </body>
</html>
































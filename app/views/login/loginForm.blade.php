<!--
app/views/loginForm.php
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Login Calificaciones</title>
<meta charset="UTF-8" />
<?php 
    //echo HTML::style('css/reset.css'); 
    //echo HTML::style('css/structure.css');
?>
</head>
<body>
<?php //echo Form::open(['route' => 'sessions.store']); ?>
  {{ Form::open(['route' => 'sessions.store']); }}

<fieldset class="boxBody">
  <label>Username</label>
  <input type="text" tabindex="1" name="username" required>
  </br></br> 
<label>Password</label>
  <input type="password" name="password" tabindex="2" required>
 <label></br>
  <a href="#" class="rLink" tabindex="5">Forget your password?</a>
  </label>
  </br>
</fieldset>

<footer>
  <label><input type="checkbox" name="persist" tabindex="3">Remember me</label>
  <input type="submit" class="btnLogin" value="Login" tabindex="4">
</footer>
</form>
<footer id="main">
</footer>
</body>
</html>

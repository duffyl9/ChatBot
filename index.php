<?php

    session_start();
    //redirects the user to the home page if already logged in
    if ($_SESSION['uid']) {
        header("location:home.php");
    }
?>
<!DOCTYPE html>
<html>

  <head >
    <link href="static/css/main.css" type="text/css" rel="stylesheet">
    <link href="static/css/register.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <div class = "top-banner">
        <img src="static/img/trinity-pic.jpg" height = 65% >
        <h1 id = "title" >TCD Book a Room </h1>

     </div>
    <div class = "back">
        <div class = "About">
        <h3>About TCD Book a Room</h3>

          <div id = "welcome-text">
            <p> Welcome to TCD Book a Room.
            This site enables both
            Students and Staff of TCD to easily book a room on campus.
             Our chat bot provides an efficient and user frieendly service.
            If you are a Trinity College student
            please with your college login details
            </p>
        </div>

    </div>
      <div class="register">
      	<form action="sign-in.php" method="post">
      		<div>
      			<p><!--session message will go here --></p>
      		</div>
      		<div class="sign-up-elem">
      			<div class="label">
      				Email:
      			</div>
      			<input class="input" type="text" name="email" required autocomplete="off"> <br />
      		</div>
      		<div class="sign-up-elem">
      			<div class="label">
      				Password:
      			</div>
      			<input class="input" type="password" name="password" required autocomplete="off"> <br />
      		</div>

      		<div class="sign-up-elem">
      			<button class="btn" type="text" name="forgotpassword" >Login</button>
      		<div class = "sign-up-elem">
      			<p> Login with your college account </p>
		</div>
    </div>
  </div>
  </body>

</html>

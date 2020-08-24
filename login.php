<?php  include('./php/logindb.php'); 

// session_start();

?>

<head>
<link rel="stylesheet" type="text/css" href="./css/stylelog.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700,400italic' rel='stylesheet'>
<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<input type="radio" checked id="toggle--login" name="toggle" class="ghost" />
  <input type="radio" id="toggle--signup" name="toggle" class="ghost" />

  <div class="leftmenu">
				<img src="./images/giflogo.gif" style="width: 101px;">
				<h4> CLUSTAC </h4>
			</div>

  <form class="form form--login framed" method="post" action="login.php">
    <input type="email" placeholder="Email" class="input input--top" name="email"/>
    <input type="password" placeholder="Password" class="input" name="upassword"/>
    <input type="submit" value="Log in" class="input input--submit" name="submit_log"/>
    
    <label for="toggle--signup" class="text text--small text--centered">New? <b>Sign up</b></label>
  </form>
  
  <form class="form form--signup framed" method="post" action="login.php">

    <input type="text" placeholder="First Name" class="input input--top" name="firstname"/>
    <input type="text" placeholder="Last Name" class="input" name="lastname"/>
    <input type="email" placeholder="Email" class="input" name="email"/> 
    <input type="text" placeholder="Username" class="input" name="username"/>
    <input type="password" placeholder="Password" class="input" name="upassword"/>
    <input type="submit" value="Sign up" class="input input--submit" name="submit_reg"/>
    
    <label for="toggle--login" class="text text--small text--centered">Not new? <b>Log in</b></label>
  </form>

  <div class="legal">
    <a class="text text--small text--border-right" >Terms</a><span style="color:black;">|</span>
    <a class="text text--small text--border-right" >Privacy</a><span style="color:black;">|</span>
    <a class="text text--small">Password help</a>
  </div>


  <div class="fullscreen-bg"></div>
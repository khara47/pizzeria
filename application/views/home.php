<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">

    <!--jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <style type="text/css">
		.info-msg {
		    clear: both;
		    display: block;
		    padding: 10px;
		    text-align: center;
		}
    </style>
  </head>
  
  <body class="login">
    <div class="form-signin">
      <div class="text-center">
        <img src="assets/img/logo.jpg" alt="Metis Logo">
      </div>
      <hr>
      <div class="tab-content">
	  	<div class="info-msg"></div>

        <!--User Login  -->
        <div id="login" class="tab-pane active">
          <form id="user_login" action="home/login_user" method="post">
            <p class="text-muted text-center">
              Enter your username and password
            </p>
            <input type="text" placeholder="Username" class="form-control top" name="email">
            <input type="password" placeholder="Password" class="form-control bottom" name="password">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Remember Me
              </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>

        <div id="forgot" class="tab-pane">
          <form action="index.html">
            <p class="text-muted text-center">Enter your valid e-mail</p>
            <input type="email" placeholder="mail@domain.com" class="form-control">
            <br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
          </form>
        </div>

        <!-- Userr Registration -->
<!-- 
        <div id="signup" class="tab-pane">
          <form id="register_user" action="home/insert_user" method="post">
            <input type="text" placeholder="username" class="form-control top" name="username">
            <input type="email" placeholder="mail@domain.com" class="form-control middle" name="email">
            <input type="password" placeholder="password" class="form-control middle" name="password">
            <input type="password" placeholder="re-password" class="form-control bottom" name="confirm_password">
            <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
          </form>
        </div>
 -->
      </div>
      <hr>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Login</a>  </li>
          <li> <a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a>  </li>
          <!-- <li> <a class="text-muted" href="#signup" data-toggle="tab">Signup</a>  </li> -->
        </ul>
      </div>
    </div><!-- form- signin End -->

    <script type="text/javascript">
      // AJAX for login employee
      $('.btn-primary').on('click', function(e) {
        e.preventDefault();
        var form = $('#user_login');
        
        $.ajax({
          type:"POST",
          url : form.attr( 'action' ),
          data : form.serialize(),
          dataType:'json',
          success : function(response) {
            console.log(response);
            $('.info-msg').removeClass('bg-red');
            $('.info-msg').removeClass('bg-green');
            if(response.error) {
              $('.info-msg').addClass('bg-red');
            } else {
              $('.info-msg').addClass('bg-green');
              window.setTimeout(function(){
                 window.location.href = '<?php echo base_url(); ?>dashboard/';
              }, 1000);
            }
            $('.info-msg').html(response.message);
            //$('.ajax-loader-img').hide();
            unset_info_msg();

          }
        });
      });

	// Unset info messages after given seconds
	function unset_info_msg() {
		setTimeout(function(){
			$(".info-msg").removeClass("bg-green").html("");
			$(".info-msg").removeClass("bg-red").html("");
		}, 3000);
	}


    </script>

    <!--Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      (function($) {
        $(document).ready(function() {
          $('.list-inline li > a').click(function() {
            var activeForm = $(this).attr('href') + ' > form';
            //console.log(activeForm);
            $(activeForm).addClass('animated fadeIn');
            //set timer to 1 seconds, after that, unload the animate animation
            setTimeout(function() {
              $(activeForm).removeClass('animated fadeIn');
            }, 1000);
          });
        });
      })(jQuery);
    </script>

<?php 
	// Set success message if user logged out
	if(isset($_GET['loggedout'])) {
	  echo '<script type="text/javascript"> $(".info-msg").html("You are now logged out.").addClass("bg-green"); unset_info_msg(); </script>';
	} 
?>

  </body>
</html>

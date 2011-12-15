<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery Login</title>
<style>
body {
	background: #b6b6b6;
	margin: 0;
	padding: 0;
	font-family: arial;
}
#login_form {
	width: 300px;
	background: #f0f0f0 url(../img/login_bg.jpg) repeat-x 0 0;
	border: 1px solid white;
	margin: 250px auto 0;
	padding: 1em;
	-moz-border-radius: 3px;
}
h1,h2,h3,h4,h5 {
	margin-top: 0;
	font-family: arial black, arial;
	text-align: center;
}

input[type=text], input[type=password] {
	display: block;
	margin: 0 0 1em 0;
	width: 280px;
	border: 5px;
	-moz-border-radius: 1px;
	-webkit-border-radius: 1px;
	padding: 1em;
}

input[type=submit], form a {
	border: none;
	margin-right: 1em;
	padding: 6px;
	text-decoration: none;
	font-size: 12px;
	-moz-border-radius: 4px;
	background: #348075;
	color: white;
	box-shadow: 0 1px 0 white;
	-moz-box-shadow: 0 1px 0 white;
	-webkit-box-shadow: 0 1px 0 white;

}

input[type=submit]:hover, form a:hover {
	background: #287368;
	cursor: pointer;
}




/* Validation error messages */

.error {
	color: #393939;
	font-size: 15px;
}

fieldset {
	width: 300px;
	margin: auto;
	margin-bottom: 2em;
	display: block;
}

/* FOR FUN */

h1 {
	text-shadow: 0 1px 0 white;
}

</style>
</head>

<body>
<h1>Gallery</h1>
<div id="login_form">
<h2>Login</h2>
<?php

	echo form_open('login/validate_credentials');
	echo form_input('username', 'Username');
	echo form_password('password', 'Password');
	echo form_submit('submit', 'Login');
	echo form_close();
?>
</div>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>	

	<script type="text/javascript" charset="utf-8">
		$('input').click(function(){
			$(this).select();	
		});
	</script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Gallery</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/admin.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/pepper-grinder/jquery-ui-1.8.16.custom.css">
<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script>
$(document).ready(function(e) {
    $('#adminNav li a').button();
	
	$('#adminNav li a').each(function(index, element) {
        if($(this).attr('href')=="<?php echo current_url();?>")
		{
			$(this).addClass('here');
		}
    });
});
</script>
</head>
<body>
<h1><img src="<?php echo base_url();?>images/tl_logo.png" width="50" height="60" alt="TL"> Gallery Admin Panel</h1>

<ul id="adminNav">
<li><?php echo anchor("/","Home"); ?></li>
<li><?php echo anchor("admin","Album List"); ?></li>
<li><?php echo anchor("admin/menu","Menus"); ?></li>
<li><?php echo anchor("login/logout","Logout"); ?></li>
</ul>

<div class="clear"></div>
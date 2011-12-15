<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>kim e rooney</title>

<meta name="description" content="Kim E Rooney is a Landscape Architect in Seattle, WA specializing in residential design." />
<meta name="keywords" content="Kim E Rooney, Landscape Architect, Residential Landscape Architecture, Seattle Area, Seattle" />
<meta name="robots" content="noindex" />
<link type="text/css" rel="stylesheet" href="css/kimrooneyCSS.css"/>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	$("ul.gallery li").hover(function() { //On hover...

		var thumbOver = $(this).find("img").attr("src"); //Get image url and assign it to 'thumbOver'

		//Set a background image(thumbOver) on the <a> tag - Set position to bottom
		$(this).find("a.thumb").css({'background' : 'url(' + thumbOver + ') no-repeat center bottom'});

		//Animate the image to 0 opacity (fade it out)
		$(this).find("span").stop().fadeTo('normal', 0 , function() {
			$(this).hide() //Hide the image after fade
		});
	} , function() { //on hover out...
		//Fade the image to full opacity 
		$(this).find("span").stop().fadeTo('normal', 1).show();
	});

	
	$('.gallery li').hover(
		function () {
			//show its submenu
			$('ul', this).slideDown(100);

		}, 
		function () {
			//hide its submenu
			$('ul', this).slideUp(100);			
		}
	);
	
});

</script>

</head>

<body>

<div id="container">
    <h1>kim e rooney</h1>
    <h2>landscape architecture &amp; garden design</h2>
    
    <div id="home_nav">

    	<ul class="gallery">
        	<li class="one"><a href="#null" class="thumb"><span><img src="images/residentialbw.jpg" alt="" /></span></a><p><a href="#null">Residential Built Work</a>
            	<ul>
                	<li><a href="clyde_hill.html">Clyde Hill</a></li>
                    <li><a href="#null">Fall City</a></li>
                    <li><a href="#null">Queen Anne</a></li>
                    <li><a href="#null">Redmond</a></li>

                    <li><a href="#null">Monroe</a></li>
                 </ul></p></li>
            <li class="two"><a href="#null" class="thumb"><span><img src="images/commercialbw.jpg" alt="" /></span></a><p><a href="#null">Commercial/Public Portfolio</a>
            	<ul>
                	<li><a href="#null">Sundial Hotel, Whistler</a></li>
                    <li><a href="#null">2010 Olympic Bid Book</a></li>
                    <li><a href="#null">2008 Olympics, Teinjen China</a></li>

                    <li><a href="#null">Geneva 3rd Street</a></li>
                    <li><a href="#null">West Dundee Riverfront</a></li>
                  </ul></p></li>
            <li class="three"><a href="#null" class="thumb"><span><img src="images/productsbw.jpg" alt="" /></span></a><p><a href="#null">Products</a>
            	<ul>
                	<li><a href="#null">Water Features</a></li>
                    <li><a href="#null">Fire Places</a></li>

                  </ul></p></li>
            <li class="four"><a href="#null" class="thumb"><span><img src="images/philosophybw.jpg" alt="" /></span></a><p><a href="#null">Philosophy</a></p></li>
            <li class="five"><a href="#null" class="thumb"><span><img src="images/aboutbw.jpg" alt="" /></span></a><p><a href="#null">About Us</a></p></li>
            <li class="six"><a href="#null" class="thumb"><span><img src="images/howbw.jpg" alt="" /></span></a><p><a href="#null">How We Work</a></p></li>
        </ul>
    </div>
	<div id="contact">

    	<p><em>phone: 206.527.5043</em></p>
        <p><em>email Kim E. Rooney</em></p>
    </div>
</div>

</body>
</html>

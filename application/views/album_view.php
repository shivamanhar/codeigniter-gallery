

<div id="container">
	
    <h2><?php echo $name; ?></h2>
		
        
    
	


        <div id="gallery">
            
            	 <?php if (isset($images) && count($images)): 
	 	foreach($images as $image):?>
        
        <a href="<?php echo $image['imagePath'] ?>" />
        <img title="<?php echo $image['title']; ?>" alt="<?php echo $image['description']; ?>" src="<?php echo $image['thumbPath']; ?>" />
        </a>
		

		<?php endforeach; else: ?>
			<div id="blank_gallery">Please Upload an Image</div>
		<?php endif; ?>
                
           
           
           
           
        </div>

 </div><!--container-->
<script>
  

   	Galleria.loadTheme('../galleria/themes/classic/galleria.classic.min.js');
	$("#gallery").galleria({
		width: 800,
		height: 500
	});
	
	
</script>
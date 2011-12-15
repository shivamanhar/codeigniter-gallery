

<div id="container">
	<h1>Gallery</h1>

	
    <h2><?php echo $name; ?></h2>
		
         <?php foreach($records as $row) : ?>
       
			<h2><?php echo anchor("albums/$row->slug/", $row->name); ?></h2>
		<?php endforeach; ?>

       
 </div><!--container-->

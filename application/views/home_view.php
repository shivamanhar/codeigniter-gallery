

<div id="container">


	<div id="body">
		<p>Hello World hi</p>
        
        <?php foreach($records as $row) : ?>
        
			<h2><?php echo anchor("albums/album/$row->albumID/", $row->name); ?></h2>
		<?php endforeach; ?>
        
	</div>

	
</div>

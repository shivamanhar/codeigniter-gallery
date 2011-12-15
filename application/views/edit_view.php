

<div id="container">

    	<?php $slug = url_title($name);?>
    <h2><?php echo anchor("albums/$slug", $name); ?></h2>
    
    <h3>Change Album Name</h3>
    	<div id="changename">
		<?php
		echo form_open("admin/update");
		echo form_input("name");
		echo form_hidden("albumID","$qstring");
		echo form_submit('submit', 'Update Album Name');
		echo form_close();
		?>		
	</div>      
    
    <h3>Upload New Photo!</h3>
	<div id="upload">
		<?php
		echo form_open_multipart("admin/edit/$qstring");
		echo form_upload('userfile');
		echo form_submit('upload', 'Upload');
		echo form_close();
		?>		
	</div>
    
    <h3>Photos</h3>
     <?php if (isset($images) && count($images)): ?>
     <table cellpadding="10" border="1" id="photos">
     <th>Image</th><th>Delete</th><th>Title</th><th>Description</th><th>Submit</th>
	 <?php foreach($images as $image):?>
     	<tr>
        <td><img src="<?php echo $image['path']; ?>" /></td>
        
          <?php $imageID=$image['imageID']; 
		$albumID = $this->uri->segment(3); ?>
        
		<td><?php echo anchor("admin/deleteImage/$albumID/$imageID/","delete"); ?></td>
     	
			<td><?php echo form_open('admin/editImage');
			echo form_input('title', $image['title'], 'id="title'.$imageID.'"'); ?></td>
			
            <?php $data = array('name' => 'description', 'cols' => 35, 'rows' => 5); ?>
            
			<td><?php echo form_textarea($data, $image['description'], 'id="description'.$imageID.'"'); ?></td>
            
			<td><?php echo form_submit('submit', 'Submit', 'class="submit" id="'.$imageID.'"'); ?></td>
            
			<?php echo form_close(); ?>
	
        
       
        </tr>
        <?php endforeach;?> 
      </table>  
        
        <?php else: ?>
			<div id="blank_gallery">Please Upload an Image</div>
		<?php endif; ?>
        
        
        
    
  
</div><!--CONTAINER-->
<script type="text/javascript">
		//the following attaches code to window.onload, the jQuery way!
		$("document").ready(function(){

			//add AJAX call to all links with class of critter
			$('.submit').click(function(e){
                e.preventDefault(); //stop default action of the link
				var imageID = $(this).attr("id");  //grab critter name from href attribute
				//alert(imageID);
       			var title = $('#title'+imageID).val(); 
				var description = $('#description'+imageID).val();
				//alert(title + description);
				
				var image_data = {
					imageID: imageID,
					title: title,
					description: description 	
				};
				
				
			$.ajax({
				url: "<?php echo site_url('admin/editImage'); ?>",
				type: 'POST',
				data: image_data,
				success: function(msg) {
					alert(msg);
				}
			});
				
				
				
               
            });
		});
	</script>
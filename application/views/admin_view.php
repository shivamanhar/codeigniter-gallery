

<div id="container">


    <h2>Create New Album</h2>    
        <?php echo form_open('admin/create');?>
	
	<p>
		<input type="text" name="name" id="name" />
		<input type="submit" value="Create Album" />
	</p>
	<?php echo form_close(); ?>


		<h2>Album List</h2>
        <table cellpadding="10" border="1">
        <?php if($records): foreach($records as $row) : ?>
        
        <tr>
        	<td><?php echo $row->name;?></td>
			<td><?php echo anchor("albums/$row->slug/", 'view album'); ?></td>
			<td><?php echo anchor("admin/edit/$row->albumID/", "edit"); ?></td>            
            <td><?php echo anchor("admin/delete/$row->albumID/", "delete", 'class="deleteAlbum"'); ?></td>
        </tr>
		<?php endforeach; else:?> 
		<p>There are no albums!</p>
		<?php endif; ?>
    	</table>
    

        


</div><!--CONTAINER-->

<div id="dialog-confirm" title="Delete this album?" style="display:none;">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This album will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>

<script>

$(document).ready(function(e) {
    // a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	$('.deleteAlbum').click(function(e){
		e.preventDefault();
		var deleteURL = $(this).attr('href');
		//alert(deleteURL);
		$( "#dialog-confirm" ).dialog({
			resizable: false,
			height:140,
			modal: true,
			buttons: {
				"Delete": function() {
					window.location.href=deleteURL;
					$( this ).dialog( "close" );
				},
				Cancel: function() {
					$( this ).dialog( "close" );
				}
			}
		});
		
		
		});
		
		
		
		
		
	
});

</script>
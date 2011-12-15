<style type="text/css">
input[type=text] {width:200px;}
</style>
<div id="container">
  <div id="body">
    <h2>Menu</h2>
    	<p><?php
		echo form_open("admin/addMenu");
		echo form_input("title");
		echo form_submit('submit', 'Add Menu');
		echo form_close();
		?>		</p>
    
    <table border="1" cellspacing="0" cellpadding="5">
      <tr>
       <td><strong>ID</strong></td>
        <td><strong>Menu Title / URL</strong></td>
        <td><strong>Link Title / URL</strong></td>
        <td><strong>Update</strong></td>
        <td><strong>Add Link</strong></td>
        
        <td><strong>Delete Menu</strong></td>
      </tr>
      <?php foreach($menus as $menu):?>
      <?php foreach($menu as $item):?>
      <?php echo form_open('admin/updateMenu'); ?>
      <tr>
      <td><?php echo $item['id']; ?></td>
        <td>Title: <?php echo form_input('menu_'.$item['id'],$item['title']); ?><br />
			URL: <?php echo form_input('menuLink_'.$item['id'],$item['link']); ?></td>
        <td><ul><?php foreach($item['links'] as $link):?>
        <li>
          <?php echo form_input('linkTitle_'.$link['id'],$link['title']); ?>
          <?php echo form_input('link_'.$link['id'],$link['link']); ?>
          <?php echo anchor("admin/deleteLink/".$link['id'],"Delete Link"); ?>
         </li>
          <?php endforeach;?></ul></td>
          <td><?php echo form_submit('submit', 'Submit'); ?></td>
        <td><?php echo anchor("admin/addLink/".$item['id'],"Add Link"); ?></td>
        
        <td><?php echo anchor("admin/deleteMenu/".$item['id'],"Delete Menu", 'class="deleteMenu"'); ?></td>
        
      </tr>
      <?php echo form_close(); ?>
      <?php endforeach ; ?>
      <?php endforeach ; ?>
    </table>
  </div>
</div>


<div id="dialog-confirm" title="Delete this menu?" style="display:none;">
	<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>This menu will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>
<script>

$(document).ready(function(e) {
    // a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
	$( "#dialog:ui-dialog" ).dialog( "destroy" );
	$('.deleteMenu').click(function(e){
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
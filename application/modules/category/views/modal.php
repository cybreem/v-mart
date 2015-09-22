<script>
$("#formInsert").on('submit',function(x){
  x.preventDefault();
	$.post( "<?php echo base_url('category/insert') ?>", $("#formInsert").serialize() );
	//refresh
  location.reload(true);
});

$("#formUpdate").on('submit',function(x){
  x.preventDefault();
	$.post( "<?php echo base_url('category/update') ?>", $("#formUpdate").serialize() );
	//refresh
  location.reload(true);
});
</script>


<div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title?></h4>
      </div>

      <?php if($content['action']=="edit")
      { 
          echo form_open("category/edit","id='formUpdate'");
          ?>
            <div class="modal-body">
              <div class="form-group">
                <label>Category Name</label>
                <?php foreach ($model as $data) { ?>
                  <input class="form-control" name="category_name" value="<?php echo $data->category_name; ?>">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
                <?php } ?>
              </div>
          <?php
        }
        else
        {
         	echo form_open_multipart("category/insert","id='formInsert'");
          ?>

            <div class="modal-body">
              <div class="form-group">
                <label>Category Name</label>
                  <input class="form-control" name="category_name">
                  <?php
                  if($level=="3")
                  {
                    ?>
                    <label>Image Brands</label>                   
                    <input type="file" name="image">
                    <?php
                  }
                  ?>
                  <input type="hidden" name="level" value="<?php echo $level;?>">
                  <input type="hidden" name="ref_category" value="<?php echo $parent;?>">
              </div>
          <?php
        } 
        ?>
      </div>
      <div class="modal-footer">        
        <button type="submit" class="btn btn-primary">Save changes</button>
        <?php 
        if($content['action']=="edit")
        {
          ?>
          <button type="button" class="btn btn-sm btn-danger">Remove this category</button>  
          <?php
        }
        ?>
        
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>


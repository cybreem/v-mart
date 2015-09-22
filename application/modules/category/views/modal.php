<script>
var a = "";
$("#formInsert").on('submit',function(x){
  form = new FormData($(this)[0]);
  x.preventDefault();
  $.ajax({
      url:'<?php echo site_url('category/insert'); ?>', 
          type: 'POST',
          datatype:'json',
          mimetype: "multipart/form-data",
          data: form,
          processData: false,
          contentType: false,
          success: function(data) {
            gritter_alert('success');
            //location.reload(true);
          }
  });
});

$("#formUpdate").on('submit',function(x){
  form = new FormData($(this)[0]);
  x.preventDefault();
  $.ajax({
      url:'<?php echo site_url('category/update'); ?>', 
          type: 'POST',
          datatype:'json',
          mimetype: "multipart/form-data",
          data: form,
          processData: false,
          contentType: false,
          success: function(data) {
            gritter_alert('success');
            //location.reload(true);
          }
  });
});

function imageIsLoaded(e) {
  $('.img-thumbnail').attr('src', e.target.result);
  a = e.target.result;
}
$("#upload").on('change',function(){
    var file = this.files[0];
    var default_img = $(this).attr('href');
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
});
</script>


<div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title?></h4>
      </div>

      <?php if($content['action']=="edit")
      { 
          echo form_open_multipart("category/update","id='formUpdate'");
          ?>
            <div class="modal-body">
              <div class="form-group">
                <label>Category Name</label>
                <?php foreach ($model as $data) { ?>
                  <input class="form-control" name="category_name" value="<?php echo $data->category_name; ?>">
                  <?php
                  if($data->level=="3")
                  {
                    ?>
                    <label>Image Brands</label>
                    <div class="form-group text-center">  
                    <img src="<?php echo config_item('assets'); ?><?=$data->image!==""?"content/image-category/".$data->image:'img/default-thumb-brands.png'?>" width="135" height="95" alt="Image Thumbnail" class="img-thumbnail"> 
                    </div>               
                    <input type="file" name="image" id="upload">
                    <input type="hidden" name="level" value="<?php echo $data->level;?>">
                    <?php
                  }
                  ?>
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
                    <div class="form-group text-center">  
                    <img src="<?php echo config_item('assets'); ?>img/default-thumb-brands.png" width="135" height="95" alt="Image Thumbnail" class="img-thumbnail"> 
                    </div>               
                    <input type="file" name="image" id="upload">
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


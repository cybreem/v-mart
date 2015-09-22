<script>
var a = "";
$("#formInsert").on('submit',function(x){
  form = new FormData($(this)[0]);
  x.preventDefault();
  $.ajax({
      url:'<?php echo site_url('slideshow/insert'); ?>', 
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
      url:'<?php echo site_url('slideshow/update'); ?>', 
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
  $('.preview-upload').attr('src', e.target.result);
  a = e.target.result;
}
$("#upload").on('change',function(){
    var file = this.files[0];
    var default_img = $(this).attr('href');
    var reader = new FileReader();
    reader.onload = imageIsLoaded;
    reader.readAsDataURL(this.files[0]);
});
$('.redactor-editor').redactor();
</script>


<div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$title?></h4>
      </div>

      <?php if($content['action']=="edit")
      { 
          echo form_open_multipart("slideshow/update","id='formUpdate'");
          ?>
            <div class="modal-body">
              <?php
              foreach($model as $key => $data){
              ?>
              <input type="hidden" name="id" value="<?=$id?>" >
              <div class="form-group">
                  <label>Image Slideshow</label>
                  <div class="form-group text-center">  
                  <img src="<?php echo config_item('assets'); ?><?=$data->image!==""?"content/image-slideshow/".$data->image:'img/sample-image.png'?>" width="350" height="280" alt="Image Thumbnail" class="img-thumbnail preview-upload"> 
                  </div>               
                  <input type="file" name="image" id="upload">
              </div>
              <div class="form-group">
                  <label>Slideshow active</label>
                  <input class="form-control" type="checkbox" <?=$data->active==1?"checked":""?> value="1" name="active">
              </div>
              <div class="form-group">
                  <label>Slideshow URL</label>
                  <input class="form-control" type="text" value="<?=$data->link_url?>" name="link_url">
              </div>
              <div class="form-group">
                  <label>Slideshow Description</label>
                  <textarea name="description" class="redactor-editor"><?=$data->description?></textarea>
              </div>
              <?php
              }
              ?>
          <?php
        }
        else
        {
         	echo form_open_multipart("slideshow/insert","id='formInsert'");
          ?>
            <div class="modal-body">
              <div class="form-group">
                  <label>Image Slideshow</label>
                  <div class="form-group text-center">  
                  <img src="<?php echo config_item('assets'); ?>img/sample-image.png" width="350" height="280" alt="Image Thumbnail" class="img-thumbnail preview-upload"> 
                  </div>               
                  <input type="file" name="image" id="upload">
              </div>
              <div class="form-group">
                  <label>Slideshow URL</label>
                  <input class="form-control" name="link_url">
              </div>
              <div class="form-group">
                  <label>Slideshow Description</label>
                  <textarea name="description" class="redactor-editor"></textarea>
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


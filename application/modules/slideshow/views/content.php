<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Slideshow <small>Module</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Module
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading">Slideshow picture list</div>
    <div class="panel-body">
      <button type="button" class="btn btn-info btn-sm open-modal" data-action="create"><i class="fa fa-pencil"></i> Add Slideshow</button>
      <hr>
        <div classs="col-md-12">
          <?php
          foreach($item as $key => $val){
          ?>
          <div class="col-md-3">
            <img src="<?php echo config_item('assets')."content/image-slideshow/".$val->image; ?>" alt="..." width="370" height="225" class="img-thumbnail">
            <div class="text-center">
              <h5><?=$val->description?></h5>
              <h6><i>(<?=$val-> link_url?>)</i></h6>
              <button type="button" class="btn btn-<?=$val->active==1?"success":"warning"?> btn-xs open-modal" data-id="<?=$val->id?>" data-action="edit">Edit</button>
              <button type="button" class="btn btn-danger btn-xs" data-id="<?=$val->id?>">Delete</button>
            </div>
            <hr>
          </div>
          <?php
          }
          ?>
        </div>
    </div>
  </div>
</div>
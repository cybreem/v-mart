                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Category <small>Module</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>Module
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                      <div class="panel-heading">Create Category</div>
                      <div class="panel-body">
                      <div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success</div>
                      <div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Fail</div>
                      <div classs="col-md-12">
                        <div class="col-md-3">
                          <div class="panel panel-info panel1">
                            <div class="panel-heading">
                                <button class="btn btn-success btn-xs open-modal" data-level="1" data-action="create" type="button"><i class="fa fa-pencil"></i> Add Category</button>
                            </div>
                            <div class="panel-body">
                              <ul class="list-group">
                                <?php
                                foreach($item as $key => $value) {
                                  ?>
                                <li class="list-group-item"><i class="level" data-select="2" data-id="<?php echo $value->id; ?>"><?php echo $value->category_name; ?></i><button class="btn btn-xs badge open-modal" data-action="edit" data-id="<?php echo $value->id; ?>"><i class="fa fa-pencil"></i></button>
                                </li>
                                  <?php
                                }
                                ?>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="panel panel-info panel2">
                            <div class="panel-heading">
                                <button class="btn btn-success btn-xs add-2-btn hidden open-modal" data-level="2" data-parent="" data-action="create" type="button"><i class="fa fa-pencil"></i> Add Sub Category</button>
                            </div>
                            <div class="panel-body">

                              <ul class="list-group place2">
                                
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="panel panel-info panel3">
                            <div class="panel-heading">
                                <button class="btn btn-success btn-xs add-3-btn hidden open-modal" data-level="3" data-parent="" data-action="create" type="button"><i class="fa fa-pencil"></i> Add Brands</button>
                            </div>
                            <div class="panel-body">

                              <ul class="list-group place3">
                                
                              </ul>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-3">
                          <div class="panel panel-info panel4">
                            <div class="panel-heading">
                                <button class="btn btn-success btn-xs add-4-btn hidden open-modal"  data-level="4" data-parent="" data-action="create" type="button"><i class="fa fa-pencil"></i> Add Category Lvl 4</button>
                            </div>
                            <div class="panel-body">

                              <ul class="list-group place4">
                                
                              </ul>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                </div>
              </div>
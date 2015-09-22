
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							
								<div class="panel panel-info">
									<div class="panel-heading">Edit Article</div>
									<div class="panel-body">
									<?php
									foreach($data as $key => $val){
									?>
									
									<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Success</div>
									<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Fail</div>
										<?php echo form_open_multipart('admin/update','id="updateArticle"'); ?>
										  <input type="hidden" name="id" id="hiddenID" value="<?php echo $this->uri->segment(3); ?>" />
										  <div class="form-group col-lg-4">
											<label for="title">Title</label>
											<input type="text" name="title" class="form-control" value="<?php echo $val['title'] ?>" id="title" placeholder="Enter title">
										  </div>
										  <div class="form-group col-lg-4">
											<label for="image">Thumbnail Image</label>
											<input type="file" name="file" id="imageEdit">
											<p class="help-block">Please select small picture</p>
										  </div>
										  <div class="form-group col-lg-4">
											<div class="img-responsive">
												<img id="preview" src="<?php echo config_item('assets')."thumbnail/".$val['image'] ?>" width="350" height="100" />
											</div>
										  </div>
										  <div class="form-group col-lg-12">
											<label for="contentArticle">Article Content</label>
											<textarea id="contentArticle" name="content" class="redactor-editor"><?php echo $val['content'] ?></textarea>
										  </div>
										  <div class="form-group col-lg-12">
										  <button type="submit" class="btn btn-default">Submit</button>
										  </div>
										<?php echo form_close(); ?>
									<?php
									}
									?>
									</div>
								</div>
							</div>
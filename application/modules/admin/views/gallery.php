
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							
								<div class="panel panel-info">
									<div class="panel-heading">Create Article</div>
									<div class="panel-body">
									<div class="table-responsive">
											<table class="table">
												<tbody>
													<tr class="info">
														<th>Thumbnail</th>
														<th>Title</th>
														<th>Author</th>
														<th>Content</th>
														<th colspan="2">Action</th>
													</tr>
												<?PHP
												$x = 0;
												foreach($data as $key => $val){
												$x==0?$s="success":$s="warning";
												$x==0?$x=1:$x=0;
												?>
													<tr class="<?php echo $s ?>">
														<td><img src="<?php echo config_item('assets')."thumbnail/".$val['image'] ?>" width="250" height="90"/></td>
														<td><?php echo $val['title'] ?></td>
														<td><?php echo $val['username'] ?></td>
														<td><?php echo substr($val['content'],0,300) ?></td>
														<td><a href="<?php echo base_url('admin/edit/'.$val['id']) ?>" >Edit</a></td>
														<td><a href="<?php echo base_url('admin/delete/'.$val['id']) ?>"  onclick="return confirm('Are you sure?')">Delete</a></td>
													</tr>
												<?php
												}
												?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
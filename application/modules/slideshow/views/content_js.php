<script>
		$(".alert").hide();
		$(document).on('click','.level',function(){
			id = $(this).data('id');
			level = $(this).data('select');
			$(".place"+level).html("Fetching data...");
			last_level = 4;
			$(this).parent().parent().children(".active").removeClass("active");
			$.post("<?php echo base_url('category/getCategory/') ?>/"+id+"/"+level, {
				
			}).done(function( data ) {
			    object = $.parseJSON(data);
			    result = "";
			    $(object).each(function( index, element ) {
				    id_category = element.id;
				    category_name = element.category_name;
				    result += "<li class='list-group-item'><i class='level' data-select='"+(level+1)+"' data-id='"+id_category+"'>"+category_name+"</i><button class='btn btn-xs badge open-modal' data-action='edit' data-id='"+id_category+"'><i class='fa fa-pencil'></i></button></li>";
				});
				$(".place"+level).html(result);
				$(".add-"+level+"-btn").removeClass('hidden');
				$(".add-"+level+"-btn").data('parent', id);
			});

			$(this).parent().addClass("active");
			x = 1;
			while (x <= last_level)
			{
				if(x > level)
				{
					$(".panel"+x).children(".panel-heading").children("button").addClass('hidden');
					$(".panel"+x).children(".panel-body").children("ul").html("");
				}
				x = x + 1;
			} 

		});

//modal
		$(document).on('click','.open-modal',function(){
			action = $(this).data('action');
			num = action=="edit"?$(this).data('id'):"";
			$.post("<?php echo base_url('slideshow') ?>/"+action+"/"+num, {
				
			}).done(function( data ) {
				$("#myModal").html(data);
				$("#myModal").modal('show');
			});
		});
</script>
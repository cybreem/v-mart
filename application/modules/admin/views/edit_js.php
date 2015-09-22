<script>
$(document).ready(function(){

	$('#updateArticle').on('submit',function(e){
		e.preventDefault();
		id = $("#hiddenID").val();
		data = new FormData($('#updateArticle')[0]);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/update') ?>/'+id,
		data: data,
		cache: false,
		contentType: false,
		processData: false
		}).done(function(data) {
			msg = JSON.parse(data);
			if(msg.status=="success"){
				$(".alert-success").fadeIn();
				$(".alert-danger").fadeOut();
			}else{
				$(".alert-success").fadeOut();
				$(".alert-danger").fadeIn();
			}
		});
	})
	$("#imageEdit").on('change',function(){
		data = new FormData($('#updateArticle')[0]);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/upload') ?>',
		data: data,
		cache: false,
		contentType: false,
		processData: false
		}).done(function(data) {
			msg = JSON.parse(data);
			$("#preview").attr('src',msg.url+msg.file_name);
		});
	});
				$(".alert-success").hide();
				$(".alert-danger").hide();
})
</script>
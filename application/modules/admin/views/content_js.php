<script>
$(document).ready(function() {
	$("#image").on('change',function(){
		data = new FormData($('#addArticle')[0]);
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
	$('#addArticle').on('submit',function(e){
		e.preventDefault();
		data = new FormData($('#addArticle')[0]);
		$.ajax({
		type: 'POST',
		url: '<?php echo base_url('admin/add') ?>',
		data: data,
		cache: false,
		contentType: false,
		processData: false
		}).done(function(data) {
			msg = JSON.parse(data);
			if(msg.status=="success"){
				$('#addArticle')[0].reset();
				$("#preview").attr('src',msg.default);
				$(".alert-success").fadeIn();
				$(".alert-danger").fadeOut();
				$(".redactor-editor p").html("");
			}else{
				$(".alert-success").fadeOut();
				$(".alert-danger").fadeIn();
			}
		});
	})
				$(".alert-success").hide();
				$(".alert-danger").hide();
});
</script>

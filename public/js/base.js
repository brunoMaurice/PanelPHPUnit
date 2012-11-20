$(document).ready(function() {
	$('.gen').bind({
		click : function() {
			$('.progress').css('width', '100%');
			
			$.ajax({
				type: "GET",
				data: "project="+$('.project').val(),
				url: location.href.replace(/index.php/, '')+'/phpunit.php',
				async: true,
				success : function(msg) {
					$('#phpunit').html(msg);
					$('.progress').css('width', '0%');
				}
			});
		}
	});
});
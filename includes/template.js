$(document).ready(function(){
	setTimeout(function() {
		$(".logo").addClass('ani-show');						
	}, 50);
	$("#cta .btn-default").click(function() {
		$("#full_name").focus();
	});
	$('#dl-menu').dlmenu();
});

function contactAZ(form) {
	$.post('?ajax=contact_me', $(form).serialize(), function (response) {
        if(response == "success") {
            $(".cta-form").fadeOut("slow", function() {
                $(".cta-form-success").fadeIn();
            });
        }
    });
}
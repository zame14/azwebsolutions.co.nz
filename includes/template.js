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

function updateSalary(form) {
	var id = $(form).val();
	var salary = $("#remaining-salary").val();
    $.ajax({
        url:'?ajax=update_salary&id='+id+'&salary='+salary,
        async: false,
        success: function(response){
        	var data = response.split('|');
        	$(".salary-cap span").text(data[0]);
            $("#remaining-salary").val(data[0]);
            $(".counter-wrapper span").text(data[1]);
        }

    });
}

function reset_nrlSession() {
    $.ajax({
        url:'?ajax=reset_session',
        async: false,
        success: function(response){

        }

    });
}
$(document).ready(function(){
    var $main = $( '#pt-main' ),
        $pages = $main.children( 'div.pt-page' ),
        animcursor = 1,
        pagesCount = $pages.length,
        current = 0,
        isAnimating = false,
        endCurrPage = false,
        endNextPage = false,
        animEndEventNames = {
            'WebkitAnimation' : 'webkitAnimationEnd',
            'OAnimation' : 'oAnimationEnd',
            'msAnimation' : 'MSAnimationEnd',
            'animation' : 'animationend'
        },
        // animation end event name
        animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ],
        // support css animations
        support = Modernizr.cssanimations;

    init();

    $(".project").click(function() {
        //$(".pt-page-2 #main").removeClass("brochure-template");
        var pageid = $(this).data('page');
        $.ajax({
            url: "?ajax=transitionPage&pageid=" + pageid,
            success: function (response) {
                $(".pt-page-2 #main").html(response);
            }
        });
        // if($(document).width() > 767) {
        var h = $(document).height();
        $(".pt-page").css('height',h+'px');
        // }
        var animation = $(this).data('animation');
        nextPage( animation );
    });
    $(".pt-page").on("click", ".close-me", function() {
        //if($(document).width() > 767) {
        var h = $(document).height();
        $(".pt-page").css('height',h+'px');
        //}
        var animation = $(this).data('animation');
        nextPage( animation );
        // setTimeout(function() {
        // $(".pt-page-2").removeClass('pt-page-current');
        //}, 50);
    });
    function init() {

        $pages.each(function () {
            var $page = $(this);
            $page.data('originalClassList', $page.attr('class'));
        });
        $pages.eq(current).addClass('pt-page-current');
    }

    function nextPage( animation ) {
        if( isAnimating ) {
            return false;
        }
        isAnimating = true;
        var $currPage = $pages.eq( current );

        if( current < pagesCount - 1 ) {
            ++current;
        }
        else {
            current = 0;
        }




        var $nextPage = $pages.eq( current ).addClass( 'pt-page-current' ),
            outClass = '', inClass = '';

        switch( animation ) {

            case 1:
                outClass = 'pt-page-moveToBottom';
                inClass = 'pt-page-moveFromTop';
                break;
            case 2:
                outClass = 'pt-page-moveToTop';
                inClass = 'pt-page-moveFromBottom';
                break;
            case 3:
                outClass = 'pt-page-moveToTop';
                inClass = 'pt-page-moveFromBottom';
                break;
            case 4:
                outClass = 'pt-page-moveToRight';
                inClass = 'pt-page-moveFromLeft';
                break;
            case 5:
                outClass = 'pt-page-moveToLeft';
                inClass = 'pt-page-moveFromRight';
                break;
        }

        $currPage.addClass( outClass ).on( animEndEventName, function() {
            $currPage.off( animEndEventName );
            endCurrPage = true;
            if( endNextPage ) {
                onEndAnimation( $currPage, $nextPage );
            }
        } );

        $nextPage.addClass( inClass ).on( animEndEventName, function() {
            $nextPage.off( animEndEventName );
            endNextPage = true;
            if( endCurrPage ) {
                onEndAnimation( $currPage, $nextPage );
            }
        } );

        if( !support ) {
            onEndAnimation( $currPage, $nextPage );
        }

    }

    function onEndAnimation( $outpage, $inpage ) {
        endCurrPage = false;
        endNextPage = false;
        resetPage( $outpage, $inpage );
        isAnimating = false;
    }

    function resetPage( $outpage, $inpage ) {
        $outpage.attr( 'class', $outpage.data( 'originalClassList' ) );
        $inpage.attr( 'class', $inpage.data( 'originalClassList' ) + ' pt-page-current' );
    }




    setTimeout(function() {
		$(".logo").addClass('ani-show');						
	}, 50);
	$("#cta .btn-default").click(function() {
		$("#full_name").focus();
	});
	$('#dl-menu').dlmenu();

    $(".player").click(function() {
        var id = $(this).attr('id');
        $.ajax({
            url:'?ajax=get_player_details&id='+id,
            async: false,
            success: function(response){
                $(".player-popup .modal-content-wrapper").html(response);
                $("#playerModal").show();
            }

        });
    });
    $("#playerModal .image-wrapper").click(function() {

    });

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

function calculatePrice(form) {
    $.post('?ajax=calculate_price', $(form).serialize(), function (response) {
        var json = $.parseJSON(response);
        var class_name = ".new_price_"+json.week;
        var wk = parseInt(json.week) + 1;
        var class_name2 = "new_price_"+wk;
        $(class_name).text(json.price);
        $("#week").val(wk);
        $("#Predictor_Form tbody").append("<tr><td align='center'>"+wk+"</td><td>"+json.price+"</td><td><input type='text' name='score[]' /></td><td><span class='"+class_name2+"'></span></td>");
    });
}

function closeMe() {
    $("#playerModal").hide();
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
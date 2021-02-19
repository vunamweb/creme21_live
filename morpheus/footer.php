

</body>
</html>

<script>

	$( ".goinglive, .refreshAll" ).click(function() {

	    id = $(this).attr("ref");

	    if($(this).attr("data-del")) del = 1;
	    else del = 0;

	    if($(this).attr("data-id")) all = $(this).attr("data-id");
	    else all = 0;

		// console.log(all);

	    request = $.ajax({
	        url: "UpdateLive.php",
	        type: "post",
	        data: "id="+id+"&del="+del+"&all="+all,
	        success: function(data) {
				console.log(data);
				//$("#saved").removeClass("show");
				if(all) $('.goinglive').html('<i class="fa fa-check green"></i>');
				else $('#live'+id).html('<i class="fa fa-check green"></i>');

				if(del) location.reload();
  			}
	    });


	});

    $(".setform").change(function () {
	    $("#saved").addClass("show");
	    id = $(this).attr("ref");
	    val = $(this).val();
	    col = $(this).attr("col");
		// console.log('val: '+val+'col: '+col+' # '+id);

	    request = $.ajax({
	        url: "Update.php",
	        type: "post",
	        data: "pos="+col+"&data="+val+"&id="+id+"&feld=<?php echo $tid; ?>&table=<?php echo $table; ?>",
	        success: function(data) {
				$('.save-'+col+id).removeClass('btn-danger');
				 console.log(data);
				$("#saved").removeClass("show");
  			}
	    });
    });

    $(".setformDate").change(function () {
	    $("#saved").addClass("show");
	    id = $(this).attr("ref");
	    val = $(this).val();
	    col = $(this).attr("col");
		// console.log('val: '+val+'col: '+col+' # '+id);

	    request = $.ajax({
	        url: "UpdateDate.php",
	        type: "post",
	        data: "pos="+col+"&data="+val+"&id="+id+"&feld=<?php echo $tid; ?>&table=<?php echo $table; ?>",
	        success: function(data) {
				$('.save-'+col+id).removeClass('btn-danger');
				 console.log(data);
				$("#saved").removeClass("show");
  			}
	    });
    });

$(document).ready(function(){
	// lft = -100;
	lft = 0;
	$('#keywords, #keywordDiv').animate({
		left: '+='+lft,
		}, 750, function() {
  	});
 });

$('#keywordDiv').click(function() {
	ison= $(this).hasClass("on");

	if(ison) {
		lft = 300
		$(this).removeClass("on");
	} else {
		 lft = -300;
		 $(this).addClass("on");
	}

	$('#keywords, #keywordDiv').animate({
		left: '+='+lft,
		}, 750, function() {
  	});
});


$(function () {
    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').toggleClass('slide-in');

    });

   // Remove menu for searching
   $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');

        /// uncomment code for absolute positioning tweek see top comment in css
        //$('.absolute-wrapper').removeClass('slide-in');

    });

    $( ".css" ).click(function() {
		ref = $(this).attr("ref");

		var nDays = 360;
		var cookieName = "mystyle";
		var cookieValue = ref;
		var today = new Date();
		var expire = new Date();
		expire.setTime(today.getTime() + 3600000*24*nDays);
		document.cookie = cookieName+"="+escape(cookieValue)+";expires="+expire.toGMTString()+";path=/";
		location.reload();

		// console.log(ref);
	});

});


$(document).on('click', '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox( );
});



    $( ".resize" ).click(function() {
	    target = $( "#morp_preview" );

		hc = $(target).hasClass("efixed");

		if(hc) {
			$(target).removeClass("efixed");
			$("#morp_preview_btn").removeClass("fa-minus-square");
			$("#morp_preview_btn").addClass("fa-plus-square");
		}
		else {
			$(target).addClass("efixed");
			$("#morp_preview_btn").removeClass("fa-plus-square");
			$("#morp_preview_btn").addClass("fa-minus-square");
		}
		// console.log(ref);
	});

    $( ".closeif" ).click(function() {
	    target = $( "#morp_preview" );
		$(target).addClass("ifHide");

		var nDays = 360;
		var cookieName = "morp_preview";
		var cookieValue = 0;
		var today = new Date();
		var expire = new Date();
		expire.setTime(today.getTime() + 3600000*24*nDays);
		document.cookie = cookieName+"="+escape(cookieValue)+";expires="+expire.toGMTString()+";path=/";
		// location.reload();
	});
    $( "#showPreview" ).click(function() {
	    target = $( "#morp_preview" );
		$(target).removeClass("ifHide");

		var nDays = 360;
		var cookieName = "morp_preview";
		var cookieValue = 1;
		var today = new Date();
		var expire = new Date();
		expire.setTime(today.getTime() + 3600000*24*nDays);
		document.cookie = cookieName+"="+escape(cookieValue)+";expires="+expire.toGMTString()+";path=/";
		// location.reload();
	});



/*
	function setVorschau() {
		wW = $(window).width();
		abzug = 278;
		wNew = wW - abzug;
		$("#vorschau").css({"width":wNew+"px"});
		console.log(wW);

	}

	$(window).on('resize', function(){
		setVorschau();
	});
	$( document ).ready(function() {
		setVorschau();
	});
*/

</script>


<?php
	global $jsList;
	echo $jsList;
?>

	<script src='js/autosize.js'></script>
	<script>
		autosize(document.querySelectorAll('textarea'));
	</script>

<?php global $jsFunc; echo $jsFunc; ?>
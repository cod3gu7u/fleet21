$(function(){
   //Load dashboard home menu
	// $('a.dashboard').on("click",function(e) {
	// 	e.preventDefault(); // cancel the link itself
	// 	e.stopImmediatePropagation();
	// 	var value = $(this).attr('href');
	// 	$(".content").load(value);
	// 	$('.content-header > h1:nth-child(1)').html('Dashboard');
	// 	callAjax();
	// });
	
	// //Load dashboard settings menu
	// $('a.settings').on("click",function(e) {
	// 	//e.preventDefault(); // cancel the link itself
	// 	//e.stopImmediatePropagation();
	// 	var value = $(this).attr('href');
	// 	$(".content").load(value);
	// 	$('.content-header > h1:nth-child(1)').html('Settings');
	// 	callAjax();
	// });
	$("div[class*=-index]").addClass("box box-success");
	//$("div[class*=-index]  > h1").append('<b>some text<b>');
	 // Take all href-value and assign it to value-value
	 $('.showModalButton').each(function(){
        var value = $(this).attr('href');
        $(this).attr("value", value);
    });
	
	$('.showModalButton').on("click",function(e) {
		var value = $(this).attr('href');
        $(this).attr("value", value);
		e.preventDefault(); // cancel the link itself
		//empty modal content
		$('#modalContent').empty();
	});

});

// $(document).ready(function(){
// 	callAjax();
// 	 $('#events').load("index.php?r=events-calendar%2Fevents");
// 	 $('#bulletin').load("index.php?r=bulletin%2Fbulletin");
// });

// function callAjax() {
//     //return p1 * p2;              // The function returns the product of p1 and p2
	
// 	$.ajax({
// 			url: '?r=site/ajax',
// 			dataType: "json",
// 			success: function(data) {
// 				if(data.error) {
// 						alert(data.error);
// 				} else if(data.studentCount) {
// 						$("#studentcount").html(data.studentCount);
// 						$("#teachersCount").html(data.teachersCount);
// 				} else {
// 						$("#studentCount").html("Response in invalid format!");
// 						alert("Response in invalid format!");
// 				}
// 			}
// 	})
	
// 	$.ajax({
// 			url: '?r=events-calendar/events',
// 			dataType: "json",
// 			success: function(data) {
// 				if(data.error) {
// 						alert(data.error);
// 				} else if(data.studentCount) {
// 						$("#studentcount").html(data.studentCount);
// 						$("#teachersCount").html(data.teachersCount);
// 				} else {
// 						$("#studentCount").html("Response in invalid format!");
// 						alert("Response in invalid format!");
// 				}
// 			}
// 	})

// }


$(document).ready(function(e){

	$(".sidebar-menu ul").css("display", "none");
	$(".sidebar-menu li").removeClass("active");
		
	// $('.sidebar-menu').on('click', function(e) {
	// 	e.preventDefault();
		
	// 	var url = window.location;

	// 	$('.sidebar-menu a').filter(function() {
	// 	    return this.href == url;
	// 		}).parent().addClass('active');  
	// });

});

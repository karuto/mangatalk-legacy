/* JavaScript handling */

//$(document).ready();	// KM: JS for slideshow gallery in homepage.
$(function(){
	var obj=$("#gallery-list ul");
	var object=$("#gallery-list ul li");
	var num= 1;	// #num of pictures per scroll
	var time = Math.ceil($(object).length/num);
	var width= $(".gallery-imglist ul li").width();
	// alert(width);
	var n=0;
	// $(object).clone().appendTo(obj);
	// KM: I don't get the purpose of this append above. Doesn't actually do anything.
	$("#gallery-right").click(function(){
	if(!$(obj).is(":animated")){
	  if(n==time){n=0;$(obj).css({left:0});};
	  $(obj).animate({left: "-="+width}, "slow");
	  n++;
	}
	});
	$("#gallery-left").click(function(){
	if(!$(obj).is(":animated")){
	  if(n==0){n=time;$(obj).css({left:-time*width})};
	  $(obj).animate({left: "+="+width}, "slow");
	  n--;
	}
	});
	// This is for auto scrolling.
	$("#gallery-cont").hover(function(){
	clearInterval(change);
	},function(){
	// The following line is originally for #right click, but modified for better performance.
	change= setInterval(function(){$("#gallery-left").click()} , 5000);
	}).trigger("mouseleave");
});


$(function(){
 var s = $('#scroll').offset().top;
    $(window).scroll(function() {
        $("#scroll").animate({
            top: $(window).scrollTop() + s + "px"
        },
        {
            queue: false,
            duration: 500
        })
    });
    $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
    $('#up_scroll').click(function() {
        $body.animate({
            scrollTop: '0px'
        },
        400)
    });
    $('#down_scroll').click(function() {
        $body.animate({
            scrollTop: $('#colophon').offset().top
        },
        400)
    });
    $('#comt_scroll').click(function() {
        $body.animate({
			// for better user experience, go to the block ABOVE the comment area.
            scrollTop: $('#social-block').offset().top
        },
        400)
    });
});



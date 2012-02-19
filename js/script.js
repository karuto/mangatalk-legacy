/* JavaScript handling */

//$(document).ready();
$(document).ready(function() {	// selection modification
  var $this = $(“div.scroll-div”);//把所要绑定的div拿下
  var scrollTimer;
  $this.hover(function(){
     clearInterval(scrollTimer);//鼠标放到上面的时候停止
   },function(){
     scrollTimer = setInterval(function(){
       scrollPic( $this );
     }, 30);
  }).trigger(“mouseleave”);//载入之后开始滚动
 });
 
 function scrollPic(obj){//滚动部分
  var $self = obj.find(“ul:first”);
  var ulWidth = $self.find(“li:first”).width();
  var ulLeft = parseInt($self.css(‘left’));
  //css()方法获得的是字符串，带单位，比如”*px”，我们用parseInt把它强制转换成数字型
  //alert(ulLeft);
  if(ulLeft != (-ulWidth)){
   ulLeft–;
   $self.css(‘left’,ulLeft+”px”);
   //alert(liLeft);
  }else{
   $self.css(“left”,”0″).find(‘li:first’).appendTo($self);
   //把已经移除屏幕的li放到整个list的最后，这样就可以实现无缝滚动了
  }
 }
	
});




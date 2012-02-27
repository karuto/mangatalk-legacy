<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

</div><!-- #page -->
</div><!-- #bodywrapper -->



<style>
#backgroundPopup{  /* KM: SEMI-TRANSPARENT OVERLAY */
	display:none;  
	position:fixed;  
	_position:absolute; /* hack for internet explorer 6*/  
	height:100%;  
	width:100%;  
	top:0;  
	left:0;  
	background:#000000;  
	border:1px solid #cecece;  
	z-index:1;  
}  
#popupContact{  
	display:none;  
	position:fixed;  
	_position:absolute; /* hack for internet explorer 6*/  
	/* height:400px;  */
	width:400px;  
	background:#FFFFFF;  
	border:2px solid #cecece;  
	z-index:2;  
	padding:15px;  
	font-size:13px;  
}  
#popupContact h1{  
	text-align:center;  
	color:#CE5333;  
	font-size:15px;
	font-weight:700;  
	border-bottom:3px double #D3D3D3;  
	padding-bottom:10px;  
	margin-bottom:20px;  
}  
#popupContactClose{  
	display:block;  
	position:absolute;  
	color:#ce5333;  
	font-size:18px;  
	font-weight:700;  
	right:10px;  
	top:5px;  
}
#contactArea a:hover {
	background: darkRed;
	border-bottom: none;
}
</style>


<div id="popupContact">  
	<a id="popupContactClose">x</a>  
	<h1>漫言的部分内容在您的浏览器下无法正常显示</h1>  
	<p id="contactArea" style="font-size: 15px;">  
		亲爱的用户，您正在使用以<strong> Internet Explorer 6/7/8 </strong>为核心的古旧浏览器浏览<strong><a href="http://mangatalk.net">漫言</a></strong>，我们不确保您能获得正常的网页效果。<strong><a href="http://noie6.renren.com/" target=_BLANK>为什么？</a></strong><br />
		请您抽出两三分钟时间，升级至 Chrome / Safari / Firefox 等现代浏览器，真正享受漫言为您精心打造的优雅阅读体验。<br />
		感谢您对漫言的理解与支持。谢谢！<br /><br />
		<a href="https://www.google.com/chrome/" target=_BLANK id="upgrade-me" style="text-align: center; font-weight:700; display: block; float: left; width: 40%; margin-right: 15px; margin-bottom: 10px; padding: 10px; background:#ce5333; color: #fff;">立即升级至 Chrome</a>
		<span id="force-me-in" style="text-align: center; font-weight:normal; display: block; float: right; width: 40%; margin-left: 15px; margin-bottom: 10px; padding: 10px; background:#000; color: #666">我知道了，继续浏览</span>
	</p>
	<span style="display:block; margin: 0 auto; padding: 15px 0 0; text-align:center;">
		点击窗口以外的任何地方，或使用键盘 Esc 键关闭此提示。
	</span>
</div>  
<div id="backgroundPopup"></div>  


<footer id="colophon" class="clearfix" role="contentinfo">

		<?php
			/* A sidebar in the footer? Yep. You can can customize
			 * your footer with three columns of widgets.
			 */
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>

		<!--<div id="site-generator">Hello world.</div>-->
		
<?php wp_footer(); ?>

</footer><!-- #colophon -->

</body>
</html>
<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?>
<!-- 底部-开始 -->
<footer class="footer">
	<div class="container">
<!-- 	
		<div style="margin-bottom: 10px; border-top: 1px dotted #d5d6d6;padding-top: 10px;">友情链接: 
			<a href="" style="margin: 0 5px;background: #e5e5e5;border-radius: 3px;padding: 5px 10px;">asdasd</a>
			<a href="" style="margin: 0 5px;background: #e5e5e5;border-radius: 3px;padding: 5px 10px;">asdasd</a>
			<a href="" style="margin: 0 5px;background: #e5e5e5;border-radius: 3px;padding: 5px 10px;">asdasd</a>
			<a href="" style="margin: 0 5px;background: #e5e5e5;border-radius: 3px;padding: 5px 10px;">asdasd</a>
		</div>
 -->
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
		<div class="f-nav">
			<a href="<?php echo siteurl($siteid);?>">首页</a>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
			<a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
<?php $n++;}unset($n); ?>
		</div>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
		<div class="f-f">
			<p>Copyright © 2007-2017 ysycms.com All Rights Reserved.</p>
		</div>
	</div>
</footer>
<!-- 底部-结束 -->
<style type="text/css">
</style>
<div id="scroll">
    <div class="scrollItem" id="toTop"><i class="glyphicon glyphicon-menu-up"></i></div>
    <div class="scrollItem" id="toBottom"><i class="glyphicon glyphicon-menu-down"></i></div>
</div>
<script type="text/javascript">
// 延迟显示
$(function() {
    $("img.lazy").lazyload();
});
// 返回顶部、返回底部
$(function () {
    var speed = 500;//滚动速度
    var h=document.body.scrollHeight;
    //回到顶部
    $("#toTop").click(function () {
        $('html,body').animate({
            scrollTop: '0px'
        },
        speed);         
    });
    //回到底部
    var windowHeight = parseInt($("body").css("height"));//整个页面的高度
    $("#toBottom").click(function () {
        // alert(h);
        $('html,body').animate({
            // scrollTop: h+'px'
            scrollTop: '99999px'
        },
        speed);
    });
});
</script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>ysy/js/offcanvas.js"></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>ysy/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="<?php echo CSS_PATH;?>ysy/js/jquery.lazyload.min.js"></script>
</div>
</body>
</html>
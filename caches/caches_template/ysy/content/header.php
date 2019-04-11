<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!doctype html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">

<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>ysy/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>ysy/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>ysy/css/offcanvas.min.css">

<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?a24db427aa35eecda7bc0db5c0df08fa";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</head>
<body>
<!-- 导航-开始 -->
<header>
    <div class="overlay"></div>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="offcanvas">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo siteurl($siteid);?>">ysycms</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse sidebar-offcanvas">
          <ul class="nav navbar-nav">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
            <li <?php if(!$catid) { ?>class="active"<?php } ?>><a href="<?php echo siteurl($siteid);?>">首页</a></li>
<?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
            <li <?php if($catid==$v[catid] || $top_parentid==$v[catid]) { ?>class="active"<?php } ?>>
                <span class='glyphicon glyphicon-folder-open nav-zc' aria-hidden='true'></span>
                <a href="<?php echo $v['url'];?>"><?php echo $v['catname'];?></a>
<?php if($v[child]) { ?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=70743155e7d7c3e1782c5aa3560c643b&action=category&catid=%24k&num=25&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>$k,'order'=>'listorder ASC','limit'=>'25',));}?>
                <div class="nav-x-gd" onclick="nav<?php echo $k;?>()" id="v<?php echo $k;?>"><span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span></div>
                <ul class="ul" id="nav<?php echo $k;?>" style="display: none;">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li class="li"><a href="<?php echo $r['url'];?>" class="a"><?php echo $r['catname'];?></a></li>
<?php $n++;}unset($n); ?>
                </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php } ?>
            </li>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
          </ul>
        </div>
      </div>
    </nav>
</header>
<!-- 导航-结束 -->
<script type="text/javascript">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
<?php $n=1; if(is_array($data)) foreach($data AS $k => $v) { ?>
<?php if($v[child]) { ?>
function nav<?php echo $k;?>(){
    var divD = document.getElementById("nav<?php echo $k;?>");
    var vD = document.getElementById("v<?php echo $k;?>");
    if(divD.style.display=="none"){
        divD.style.display = "block";
        vD.innerHTML = "<span class='glyphicon glyphicon-chevron-down' aria-hidden='true'></span>";
    }else{
        divD.style.display = "none";
        vD.innerHTML = "<span class='glyphicon glyphicon-chevron-left' aria-hidden='true'></span>";
    }
}
<?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</script>
<!-- 内容-开始 -->
<div class="container">
    <div class="x-search">
            <form class="search" action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
                <input type="hidden" name="m" value="search"/>
                <input type="hidden" name="c" value="index"/>
                <input type="hidden" name="a" value="init"/>
                <input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
                <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
            <input type="text" name="word" class="search-text" HaoyuSug="5B44BDD9416F4A1B9B0AC23B1BD03D06" placeholder="输入要搜索的关键字...">
            <input type="submit" name="" class="search-submit" value="搜索">
        </form>
    </div>
<!-- 内容-左侧-开始 -->
    <div class="visible-lg visible-md zw-le">
        <div class="wz-k">
            <div class="wz-k-t"><h5><i>搜索</i></h5></div>
            <div>
                <form class="search" action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
                    <input type="hidden" name="m" value="search"/>
                    <input type="hidden" name="c" value="index"/>
                    <input type="hidden" name="a" value="init"/>
                    <input type="hidden" name="typeid" value="<?php echo $typeid;?>" id="typeid"/>
                    <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
                    <input type="text" name="word" class="search-text" HaoyuSug="5B44BDD9416F4A1B9B0AC23B1BD03D06" placeholder="输入要搜索的关键字...">
                    <input type="submit" name="" class="search-submit" value="搜索">
                </form>
            </div>
        </div>
        <!-- <script charset="UTF-8" src="http://www.92find.com/inteltip.js"></script> -->
        <script charset="UTF-8" src="<?php echo CSS_PATH;?>ysy/js/inteltip.js"></script>
        <div class="wz-k">
            <div class="wz-k-t"><h5><i>联系方式</i></h5></div>
            <div>qq</div>
            <div>微信</div>
        </div>

        <div class="wz-k">
            <div class="wz-k-t"><h5><i>热门内容</i></h5></div>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=dd86a82625d036061b89c816933834d9&action=hits&catid=%24catid&num=10&order=views+DESC&cache=0\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'hits')) {$data = $content_tag->hits(array('catid'=>$catid,'order'=>'views DESC','limit'=>'10',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <div class="wz-k-r">
                <h4><?php echo $r['title'];?></h4>
                <div class="wz-k-rl">
                    <a href="<?php echo $r['url'];?>"><img src="<?php echo thumb($r[thumb],330,200);?>" alt="<?php echo $r['title'];?>"/></a>
                </div>
                <div>
                    <p><?php echo $r['title'];?></p>
                </div>
            </div>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
    </div>
<!-- 内容-左侧-结束 -->
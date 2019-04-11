<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- 内容-右侧-开始 -->
    <div class="zw-ri">
        <div class="wz-w">
            <div class="wz-lb">
                <div class="wz-nr-dz">
                    <h2><?php echo $CATEGORYS[$catid]['catname'];?></h2>
                    <span><a href="<?php echo siteurl($siteid);?>">首页</a> > <?php echo catpos($catid);?> 频道</span>
                </div>
                <div class="wz-lb-q">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=6401a2ce199d1b88bccfc45608b989cc&action=lists&catid=%24catid&num=15&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 15;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                    <ul class="wz-lb-ul" id="lists">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>
                            <h2><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></h2>
<?php if($r[thumb]) { ?>
                            <a href="<?php echo $r['url'];?>">
                                <img class="lazy wz-tp" data-lazyload="<?php echo $r['thumb'];?>" alt="<?php echo $r['title'];?>">
                            </a>
<?php } ?>
                            <p class="wz-lb-t"><?php echo str_cut($r[description],250,'...');?></p>
                            <p class="wz-lb-gd"><a href="<?php echo $r['url'];?>">阅读全文</a></p>
                            <div class="size12">
<?php $db = pc_base::load_model('hits_model'); $_r = $db->get_one(array('hitsid'=>'c-'.$modelid.'-'.$r[id])); $views = $_r[views]; ?>
                                <i class='glyphicon glyphicon-time' aria-hidden='true'></i><span><?php echo date('Y-m-d',$r[inputtime]);?></span>
                                <i class='glyphicon glyphicon-user' aria-hidden='true'></i><span>ysycms</span>
                                <i class='glyphicon glyphicon-eye-open' aria-hidden='true'></i><span><?php echo $views;?></span>
                                <i class='glyphicon glyphicon-folder-open' aria-hidden='true'></i><span><?php echo $CATEGORYS[$r['catid']]['catname'];?></span>
                                <i class='glyphicon glyphicon-tags' aria-hidden='true'></i>
                                <span class="wz-lb-tag">
<?php $keywords=explode(' ', $r['keywords'])?>
<?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
<?php if($keyword) { ?>
                                    <a href="<?php echo APP_PATH;?>index.php?m=content&c=tag&a=lists&tag=<?php echo urlencode($keyword);?>"><?php echo $keyword;?></a>
<?php } ?>
<?php $n++;}unset($n); ?>
                                </span>
                            </div>
                        </li>
<?php $n++;}unset($n); ?>
                    </ul>
                    <!-- <div class="pagenavi"><?php echo $pages;?></div> -->
					<?php if($pages) { ?><div id="loading" style="display:none"></div><?php } ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>
        </div>
    </div>
<!-- 内容-右侧-结束 -->
</div>
<!-- 内容-结束 -->
<?php include template("content","ajax_page"); ?>
<?php include template("content","footer"); ?>
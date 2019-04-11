<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header_index"); ?>
<!-- 内容-右侧-开始 -->
    <div class="zw-ri">
<!-- 最新文章 -->
        <div class="wz-lb sy-ys le">
            <div class="wz-nr-dz dz-gd">
                <h2>最新文章</h2>
                <span><a href="<?php echo $CATEGORYS['5']['url'];?>">更多</a></span>
            </div>
                <div class="wz-lb-q">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=9cc99830a74125e89ae234a2bc41aa68&sql=SELECT+%2A+FROM+%60phpcms_news%60+Order+by+id+DESC+&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM `phpcms_news` Order by id DESC  LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <ul class="">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>"><i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> <?php echo $r['title'];?></a><span class="ri"><?php echo inputtime_time($r[inputtime]);?></span></li>
<?php $n++;}unset($n); ?>
                    </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
<!-- 今日排行 -->
        <div class="wz-lb sy-ys ri">
            <div class="wz-nr-dz">
                <h2>今日排行</h2>
            </div>
                <div class="wz-lb-q">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=9bc8d2563ce94f840226a4f43318f718&sql=SELECT+DISTINCT+url%2Ctitle%2Cinputtime%2C+views+FROM+phpcms_news%2Cphpcms_hits+WHERE+phpcms_news.id+%3D+substring%28phpcms_hits.hitsid%2C5%29+ORDER+BY+phpcms_hits.dayviews+DESC&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT DISTINCT url,title,inputtime, views FROM phpcms_news,phpcms_hits WHERE phpcms_news.id = substring(phpcms_hits.hitsid,5) ORDER BY phpcms_hits.dayviews DESC LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <ul class="">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>"><i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> <?php echo $r['title'];?></a><span class="ri"><?php echo date('m-d',$r[inputtime]);?></span></li>
<?php $n++;}unset($n); ?>
                    </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
<!-- 本周排行 -->
        <div class="wz-lb sy-ys le">
            <div class="wz-nr-dz">
                <h2>本周排行</h2>
            </div>
                <div class="wz-lb-q">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=ee7978c64618d1dc9b06250e20428f7b&sql=SELECT+DISTINCT+url%2Ctitle%2Cinputtime%2C+views+FROM+phpcms_news%2Cphpcms_hits+WHERE+phpcms_news.id+%3D+substring%28phpcms_hits.hitsid%2C5%29+ORDER+BY+phpcms_hits.weekviews+DESC&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT DISTINCT url,title,inputtime, views FROM phpcms_news,phpcms_hits WHERE phpcms_news.id = substring(phpcms_hits.hitsid,5) ORDER BY phpcms_hits.weekviews DESC LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <ul class="">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>"><i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> <?php echo $r['title'];?></a><span class="ri"><?php echo date('m-d',$r[inputtime]);?></span></li>
<?php $n++;}unset($n); ?>
                    </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
<!-- 本月排行 -->
        <div class="wz-lb sy-ys ri">
            <div class="wz-nr-dz">
                <h2>本月排行</h2>
            </div>
                <div class="wz-lb-q">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=e58bf44763826c8ed9ce36d585568cd2&sql=SELECT+DISTINCT+url%2Ctitle%2Cinputtime%2C+views+FROM+phpcms_news%2Cphpcms_hits+WHERE+phpcms_news.id+%3D+substring%28phpcms_hits.hitsid%2C5%29+ORDER+BY+phpcms_hits.monthviews+DESC&num=10\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT DISTINCT url,title,inputtime, views FROM phpcms_news,phpcms_hits WHERE phpcms_news.id = substring(phpcms_hits.hitsid,5) ORDER BY phpcms_hits.monthviews DESC LIMIT 10");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <ul class="">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>"><i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> <?php echo $r['title'];?></a><span class="ri"><?php echo date('m-d',$r[inputtime]);?></span></li>
<?php $n++;}unset($n); ?>
                    </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
<!-- 新闻 -->
        <div class="clear"></div>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
<?php $n=1; if(is_array($data)) foreach($data AS $k => $r) { ?>
<?php if($r[catid] != 8) { ?>
        <div class="wz-lb" style="width: 100%;">
            <div class="wz-nr-dz dz-gd">
                <h2><?php echo $r['catname'];?></h2>
                <span><a href="<?php echo $CATEGORYS[$r['catid']]['url'];?>">更多</a></span>
            </div>
            <div class="wz-lb-q">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=749da9b9e42891c37b994d56662813f2&action=lists&catid=%24k&num=3&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$k,'thumb'=>'1','order'=>'id DESC','limit'=>'3',));}?>
                <ul class="wz-w-w">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li class="wz-w-p">
                        <h3><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></h3>
                        <a href="<?php echo $r['url'];?>">
                          <img src="<?php echo $r['thumb'];?>" alt="">
                        </a>
                        <p>目标：羽娘女装！ “开车不带望远镜，侧滑翻滚加飘逸”，大家吼啊，退休萌新回来撞车...</p>
                    </li>
<?php $n++;}unset($n); ?>
                </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cbec82d07c8aa051f44329b9bf810abe&action=lists&catid=%24k&num=12&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$k,'order'=>'id DESC','limit'=>'12',));}?>
                <ul class="wz-w-w">
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
<?php if($n>4) { ?>
                    <li><a href="<?php echo $r['url'];?>" class="wz-w-t"><i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i> <?php echo $r['title'];?></a><span class="ri"><?php echo date('m-d',$r[inputtime]);?></span></li>
<?php } ?>
<?php $n++;}unset($n); ?>
                </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
        </div>
<?php } else { ?>
        <!-- 图片 -->
        <div class="wz-lb" style="width: 100%;">
            <div class="wz-nr-dz dz-gd">
                <h2>图片</h2>
                <span><a href="<?php echo $CATEGORYS[$r['catid']]['url'];?>">更多</a></span>
            </div>
            <div class="wz-t-p">
                <div class="wz-t-t">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=df6fbe995ac3c17b83e0567d259735dd&action=lists&catid=%24k&num=7&thumb=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$k,'thumb'=>'1','order'=>'id DESC','limit'=>'7',));}?>
                    <ul>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li <?php if($n==1) { ?>class="wz-t-li"<?php } ?>><a href="<?php echo $r['url'];?>"><img src="<?php echo thumb($r[thumb],330,200);?>" alt="<?php echo $r['title'];?>"></a></li>
<?php $n++;}unset($n); ?>
                    </ul>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>
        </div>
<?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
<!-- 内容-右侧-结束 -->
</div>
<!-- 内容-结束 -->
<?php include template("content","footer"); ?>
<!-- 
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=494977a2b6216dd0f222aa2cbbe88885&sql=SELECT+%2A+FROM+%60phpcms_news%60+Order+by+id+DESC+&num=1000000\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM `phpcms_news` Order by id DESC  LIMIT 1000000");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
<?php echo $r['title'];?>,<?php echo rand(1,10);?><br>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
 -->
<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><script type="text/javascript">
	$(function() {
		var pager = 1;
		var stop = true; //触发开关，防止多次调用事件
		$(window).scroll(function() {
			//当内容滚动到底部时加载新的内容 100当距离最底部100个像素时开始加载.
			if ($(this).scrollTop() + $(window).height() + 100 >= $(document).height() && $(this).scrollTop() > 100) {
				$("#loading").remove();
				$("#lists").append('<div id="loading" class="panel-footer" style="border:1px solid #ddd;text-align:center;">数据加载中...</div>');
				if (stop == true) {
					stop = false;
					pager = pager + 1; //当前要加载的页码  
					$.getJSON("<?php echo APP_PATH;?>api.php?op=autoload&siteid=<?php echo $siteid;?>&modelid=<?php echo $modelid;?>&catid=<?php echo $catid;?>&pagesize=15&page=" + pager, function(data) {
						var i = 0;
						$.each(data, function(j) {
							i++;
							var thumb = data[j].thumb;
							var title = data[j].title;
							var description = data[j].description;
							var url = data[j].url;
							var style = data[j].label_style;
							var catname = data[j].catname;
							var updatetime = data[j].updatetime;
							var inputtime = data[j].inputtime;
							var keyword = data[j].keyword;
							var views = data[j].views;
							
							var strs= new Array(); //定义一数组
							var tt = "";
							strs = keyword.split(" "); //字符分割
							
							for (i=0;i<strs.length;i++) {tt += '\<a href=\"<?php echo APP_PATH;?>index.php\?m=content\&c=tag\&a=lists\&tag=' + strs[i] + '\"\>' + strs[i] + '\<\/a\>';}
							//console.log(tt);
							//alert(tt);
							
							var img = thumb ? '<a class="wz-lb-tp" href="' + url + '"><img src="' + thumb + '" alt="' + title + '"></a>' : "";
							
							var htmls = '<li><h2><a href="' + url + '">'+title+'</a></h2>' + img + '<p class="wz-lb-t">' + description + '</p><p class="wz-lb-gd"><a href="' + url + '">阅读全文</a></p><div class="size12"><i class="glyphicon glyphicon-time" aria-hidden="true"></i><span>' + inputtime + '</span><i class="glyphicon glyphicon-user" aria-hidden="true"></i><span>ysycms</span><i class="glyphicon glyphicon-eye-open" aria-hidden="true"></i><span>' + views + '</span><i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i><span>' + catname + '</span><i class="glyphicon glyphicon-tags" aria-hidden="true"></i><span class="wz-lb-tag">';
							
							var html = htmls + tt + '</span></div></li>';
							
							$("#lists").append(html);
						});
						stop = true;
						$("#loading").remove();
						if (i == 0) {
							$("#lists").append('<div id="loading" class="panel-footer" style="border:1px solid #ddd;text-align:center;">没有数据了...</div>');
							//setTimeout(function(){$("#loading").remove();},3000);
						}
					});
				}
			}
		});
	});
</script>
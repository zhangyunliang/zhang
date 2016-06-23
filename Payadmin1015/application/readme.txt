application下已部署的应用：
1.Admin
后台管理应用
2.Api
公共接口
3.Asset
资源管理应用
4.Comment
评论管理应用
5.Protal
门户应用
6.Member
用户管理应用



/var task = $(task_item_tpl).attr("app-id", appid).attr("app-url",url).attr("app-name",appname).addClass("current");
task.find(".macro-tabs-item-text").html(appname);
$task_content_inner.append(task);
$(".appiframe").hide();
$loading.show();
$appiframe=$(appiframe_tpl).attr("src",url).attr("id","appiframe-"+appid);
$appiframe.appendTo("#content");
$appiframe.load(function(){
  $loading.hide();
});
calcTaskitemsWidth();/

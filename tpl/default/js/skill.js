$(function(){$.selectSkill("#slt_indus_pid","#slt_indus_id","#skills","#skills-selected","#sdata",5)});(function(a){a.selectSkill=function(k,h,l,e,b,f){var m=this;var c=a(k);var j=a(h);var g=a(l);var i=a(e);var d=a(b);m.selectLength=0;m.selectList=[];m.selectTextList=[];this.industryOnchange=function(){var n=c.find("option:selected");var o=a(n).val();a.post("index.php?do=ajax_indus&code=r5tv",{indus_pid:o},function(r){var p=r;if(trim(p)==""){j.html(L.no_project)}else{var q=m.parse(p);m.refleshSkill(q)}})};this.parse=function(p){var q=new RegExp(/(\d+)=>([^\|]+)/g);var n;var o=[];while(n=q.exec(p)){o.push(n)}return o};this.refleshSkill=function(o){var r="";for(var n=0;n<o.length;n++){var p=o[n][1];var q=o[n][2];if(a.inArray(p,m.selectList)==-1){r+='<a herf="###" value="'+p+'">'+q+"</a>"}else{r+='<a herf="###" class="selected" value="'+p+'">'+q+"</a>"}}g.html(r);g.find("a").click(m.eleSkillClick)};this.eleSkillClick=function(){$this=a(this);var n=$this.attr("value");var o=$this.text();if(a.inArray(n,m.selectList)!=-1){return}if(m.updateList(n,o)){$this.addClass("selected")}return false};this.skillClick=function(){$this=a(this);var o=$this.attr("value");var n=a.inArray(o,m.selectList);m.selectList[n]=null;m.selectTextList[n]=null;m.selectLength--;g.find("a[value="+o+"]").removeClass("selected");m.render()};this.cleanlist=function(){m.selectList=[];m.selectTextList=[];m.selectLength=0;g.find("a").removeClass("selected");m.render();return false};this.updateList=function(n,o){if(m.selectLength==f){return false}m.selectList.push(n);m.selectTextList.push(o);m.selectLength++;m.render();return true};this.render=function(){var s=m.selectLength;var n=f-s;var r='	<div class="bstitle"><h4>'+L.you_have_selected+"<span>"+s+"</span>"+L.a+L.ability_label+","+L.you_can_choose+"<span>"+n+'</span>��</h4><a href="###" class="ctrl-clean">'+L.all_clear+"</a></div>";r+='    <ul class="list-selected-skill clearfix">';for(var q=0;q<m.selectList.length;q++){var o=m.selectList[q];var p=m.selectTextList[q];if(o!=null){r+='<li><a href="###" value="'+o+'">'+p+'</a><input type="hidden" value="'+o+'" name="skill[]"></li>'}}r+="    </ul>";i.html(r);i.find("a.ctrl-clean").click(m.cleanlist);i.find("li > a").click(m.skillClick)};c.change(m.industryOnchange);this.init=function(){m.cleanlist();var q=d.val();if(q!=""){var o=m.parse(q);for(var n=0;n<o.length;n++){var p=o[n][1];var r=o[n][2];m.selectList.push(p);m.selectTextList.push(r);m.selectLength++}}m.industryOnchange();m.render()};this.init()}})(jQuery);
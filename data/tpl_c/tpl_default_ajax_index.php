<?php keke_tpl_class::checkrefresh('tpl/default/ajax/index', '1465984343' );?><?php if($ajax=='task') { ?>
<!--detail���� start-->
<article class="box_detail no_bottom">
  <!--�б����� 36�� start-->
    <ul class="small_list">
       <?php if(is_array($task_lastest)) { foreach($task_lastest as $v) { ?>
          <li class="grid_8 omega">
            <!--�������� start-->
             <div class="item">
             	<a href="index.php?do=task&task_id=<?php echo $v['task_id'];?>" title="<?php echo $v['task_title'];?>" target="_blank">
               <!--������ start-->
                 <strong class="money cc00">
                   	<?php echo $_lang['currency'];?>
<?php if(!$v['task_cash_coverage']) { ?>
<?php echo $v['task_cash'];?>
<?php } else { ?>
<?php echo $cash_coverage[$v['task_cash_coverage']]['start_cove'];?>-<?php echo $cash_coverage[$v['task_cash_coverage']]['end_cove'];?>
<?php } ?>
 </strong>
               <!--������ end-->
               <!--������� start-->
               <?php echo $v['task_title'];?>
               <!--������� end-->
   </a>
               <!--����ͳ�� start-->
                <span class="task_status" title="<?php echo $_lang['view'];?> <?php echo $v['view_num'];?> | <?php echo $_lang['favorit'];?>  <?php echo $v['focus_num'];?> | <?php echo $_lang['submit_work'];?>  <?php echo $v['work_num'];?> ">( <?php echo $v['view_num'];?> | <?php echo $v['focus_num'];?>|  <?php echo $v['work_num'];?> )</span>
               <!--����ͳ�� start-->
               </div>
            <!--�������� end-->
          </li>
<?php } } ?>
    </ul>
 <!--�б����� 36�� end-->
 <div class="clear"></div>
</article>
<!--detail���� end-->
<?php } ?>
<?php if($ajax=='shop') { ?>
<!--�̳��б� 26�� start-->
<ul class="small_list clearfix">
  <!--��һ����Ʒ start-->
   <li class="first">
     <?php if($service_lastes['0']) { ?>
         <a href="index.php?do=service&sid=<?php echo $service_lastes['0']['service_id'];?>" title="<?php echo $service_lastes['0']['title'];?>">
         	 <?php if($service_lastes['0']['pic']) { ?>
    <?php $tmp=explode('/',$service_lastes['0']['pic']);$size=sizeof($tmp); ?>
    <?php $tmp[$size-1]='210_'.$tmp[$size-1];$src=implode('/',$tmp); ?>
<?php } else { ?>
<?php $src=$style_path.'/img/shop/shop_default_big.jpg'; ?>
<?php } ?>
            <img src="<?php echo $src;?>" alt="<?php echo $service_lastes['0']['title'];?>" title="<?php echo $service_lastes['0']['title'];?>">

         </a>
<?php } else { ?>
       <a href="javascript:void(0);" title="<?php echo $_lang['now_no_goods'];?>">
            <img src="<?php echo $style_path;?>/img/shop/shop_default_big.jpg" alt="<?php echo $_lang['now_no_goods'];?>" title="<?php echo $_lang['now_no_goods'];?>">
       </a>
<?php } ?>
</li>
  <!--��һ����Ʒ end-->
<?php if(is_array($range)) { foreach($range as $v) { ?>
     <li class="item">
        <?php if($service_lastes[$v]) { ?>
          <a href="index.php?do=service&sid=<?php echo $service_lastes[$v]['service_id'];?>" title="<?php echo $service_lastes[$v]['title'];?>">
          	<?php if($service_lastes[$v]['pic']) { ?>
<?php $tmp=$tmp1=explode('/',$service_lastes[$v]['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='100_'.$tmp[$size-1];$small=implode('/',$tmp); ?>
<?php $tmp1[$size-1]='210_'.$tmp1[$size-1];$big=implode('/',$tmp1); ?>
           <?php } else { ?>
<?php $src=$small=$style_path.'/img/shop/shop_default.gif'; ?>
<?php $big=$style_path.'/img/shop/shop_default_big.jpg'; ?>
<?php } ?>
     <img src="<?php echo $small;?>" alt="<?php echo $service_lastes[$v]['title'];?>" title="<?php echo $service_lastes[$v]['title'];?>"
small="<?php echo $small;?>" big='<?php echo $big;?>'>
          </a>
<?php } else { ?>
           <a href="javascript:void(0);" title="<?php echo $_lang['now_no_goods'];?>">
              <img src="<?php echo $style_path;?>/img/shop/shop_default.gif" alt="<?php echo $_lang['now_no_goods'];?>" title="<?php echo $_lang['now_no_goods'];?>"
small="<?php echo $style_path;?>/img/shop/shop_default.gif" big="<?php echo $style_path;?>/img/shop/shop_default_big.jpg">
           </a>
<?php } ?>
<?php if($v==18) { ?>
<li class="pad"></li>
<?php } ?>
</li>
<?php } } ?>
       <li class="last">
         <?php if($service_lastes['25'] ) { ?>
              <a href="index.php?do=service&sid=<?php echo $service_lastes['25']['service_id'];?>" title="<?php echo $service_lastes['25']['title'];?>">
         	  <?php if($service_lastes['25']['pic']) { ?>
  	<?php $tmp=explode('/',$service_lastes['25']['pic']);$size=sizeof($tmp); ?>
<?php $tmp[$size-1]='210_'.$tmp[$size-1];$src=implode('/',$tmp); ?>
<?php } else { ?>
<?php $src=$style_path.'/img/shop/shop_default_big.jpg' ?>
<?php } ?>
               <img src="<?php echo $src;?>" alt="<?php echo $service_lastes['25']['title'];?>" title="<?php echo $service_lastes['25']['title'];?>">

             </a>
<?php } else { ?>
            <a href="javascript:void(0);" title="<?php echo $_lang['now_no_goods'];?>">
              <img src="<?php echo $style_path;?>/img/shop/shop_default_big.jpg" alt="<?php echo $_lang['now_no_goods'];?>" title="<?php echo $_lang['now_no_goods'];?>">
            </a>
<?php } ?>
 </li>
</ul>
   <div class="clear"></div>
 <!--�̳��б� 26�� end-->
<div class="clear"></div>
<?php } ?>
<?php if(in_array($ajax,array('rules','withdraw','safe'))) { ?>
  <ul>
     <?php if(is_array($art_arr)) { foreach($art_arr as $v) { ?>
<li><a href="index.php?do=article&view=article_info&art_id=<?php echo $v['art_id'];?>"><?php echo $v['art_title'];?></a></li>
 <?php } } ?>
  </ul>
<?php } ?><?php keke_tpl_class::ob_out();?>
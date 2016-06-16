<?php keke_tpl_class::checkrefresh('', '1466036388' );?><?php if(is_array($datalist)) { foreach($datalist as $k => $v) { ?>
<a href="<?php echo $v['ad_url'];?>" title="<?php echo $v['ad_content'];?>" target="_blank"><img src="<?php echo $v['ad_file'];?>" width="525" height="300" alt="Slide <?php echo $k;?>"></a>
<?php } } ?><?php keke_tpl_class::ob_out();?>
<?php if (!defined('THINK_PATH')) exit(); if(is_array($tuans)): foreach($tuans as $key=>$item): ?><div class="rush-content">
    <div class="list-img">
        <a title="<?php echo ($item["title"]); ?>" href="<?php echo U('tuan/detail',array('tuan_id'=>$item['tuan_id']));?>"><img src="__ROOT__/attachs/<?php echo ($item["photo"]); ?>"></a>
    </div>
    <div class="list-content">
        <a title="<?php echo ($item["title"]); ?>" href="<?php echo U('tuan/detail',array('tuan_id'=>$item['tuan_id']));?>">
            <p class="overflow_clear"><?php echo ($item["title"]); ?></p>
            <p class="c_h h15 overflow_clear"><?php echo msubstr($item['intro'],0,20);?></p>
            <p>
            <span class="price price-two">￥<?php echo round($item['tuan_price']/100,2);?></span>
            <span class="sell"><?php echo ($item["d"]); ?></span>
            </p>
        </a>
    </div>
</div><?php endforeach; endif; ?>
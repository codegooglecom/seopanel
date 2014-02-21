<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left"><?=$spText['common']['Url']?></td>
		<td>Google</td>
		<td class="right">Bing</td>
	</tr>
	<?php
	$colCount = 3; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($list as $url){
			
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $tdWidth = "25%";            
			?>
			<tr class="<?=$class?>">
				<td class="<?=$leftBotClass?>" style="text-align:left;padding-left:10px;"><?=$url?></td>
				<td class="td_br_right" width="<?=$tdWidth?>" id='googlerank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoadPost('saturationchecker.php', 'tmp', 'googlerank<?=$i?>', 'sec=saturation&engine=google&url=<? echo urlencode($url); ?>');
					</script>
				</td>
				<td class="<?=$rightBotClass?>" width="<?=$tdWidth?>" id='msnrank<?=$i?>'>
					<script type="text/javascript">
						scriptDoLoadPost('saturationchecker.php', 'tmp', 'msnrank<?=$i?>', 'sec=saturation&engine=msn&url=<? echo urlencode($url); ?>');
					</script>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{	 
		echo showNoRecordsList($colCount-2);		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?=($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
</table>
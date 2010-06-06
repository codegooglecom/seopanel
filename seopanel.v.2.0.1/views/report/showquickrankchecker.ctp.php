<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list">
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left">Rank</td>
		<td class="right" colspan="2">Details</td>
	</tr>
	<?php
	$colCount = 2; 
	if(count($list) > 0){
		$catCount = count($list);
		$i = 0;
		foreach($list as $listInfo){
			
			$class = ($i % 2) ? "blue_row" : "white_row";
            if($catCount == ($i + 1)){
                $leftBotClass = "tab_left_bot";
                $rightBotClass = "tab_right_bot";
            }else{
                $leftBotClass = "td_left_border td_br_right";
                $rightBotClass = "td_br_right";
            }
            $foundStyle = empty($listInfo['found']) ? "" : "background-color: #ffff00;";            
			?>
			<tr class="<?=$class?>" style="<?=$foundStyle?>">
				<td class="<?=$leftBotClass?>" width='100px;'><b><?php echo $listInfo['rank']; ?></b></td>
				<td class='td_br_right' id='seresult' colspan="2">
					<a href='<?=$listInfo['url']?>' target='_blank'><? echo stripslashes($listInfo['title']);?></a>
					<p><? echo stripslashes($listInfo['description']);?><p>
					<label><?=$listInfo['url']?></label>
				</td>
			</tr>
			<?php
			$i++;
		}
	}else{
		?>				
		<tr class="blue_row">
			<td class="tab_left_bot_noborder"></td>
			<td class="tab_right_bot" colspan="2" style="text-align: left;">No Records Found!!</td>
		</tr>
		<?		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?=($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
	</table>
	</td>
	</tr>
</table>
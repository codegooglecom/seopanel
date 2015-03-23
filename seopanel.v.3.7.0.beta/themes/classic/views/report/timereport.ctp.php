
<table width="100%" border="0" cellspacing="0" cellpadding="2px;" class="list">
	<tr>
	<td width='33%'>
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" colspan='2'><?php echo $seInfo['domain']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<?php
	$colCount = 3; 
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
			?>
			<tr class="<?php echo $class?>">
				<td class="<?php echo $leftBotClass?>" width='100px;'><?php echo date('Y-m-d', $listInfo['time']); ?></td>
				<td class='td_br_right' id='seresult'>
					<a href='<?php echo $listInfo['url']?>' target='_blank'><? echo stripslashes($listInfo['title']);?></a>
					<p><? echo stripslashes($listInfo['description']);?><p>
					<label><?php echo $listInfo['url']?></label>
				</td>
				<td class="<?php echo $rightBotClass?>" width="100px" style='text-align:left;'><b><?php echo $listInfo['rank']?></b></td>
			</tr>
			<?php
			$i++;
		}
	}else{
		?>
		<tr class="blue_row">
		    <td class="tab_left_bot_noborder">&nbsp;</td>
		    <td class="td_bottom_border" colspan="1">No Records Found!</td>
		    <td class="tab_right_bot">&nbsp;</td>
		</tr>
		<?		
	} 
	?>
	<tr class="listBot">
		<td class="left" colspan="<?php echo ($colCount-1)?>"></td>
		<td class="right"></td>
	</tr>
	</table>
	</td>
	</tr>
</table>
</div>
<?php echo showSectionHead($spTextWeb['Edit User Type']); ?>
<form id="editUserType">
<input type="hidden" name="sec" value="update"/>
<input type="hidden" name="old_user_type" value="<?php echo $post['old_user_type']?>"/>
<input type="hidden" name="id" value="<?php echo $post['id']?>"/>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="list">
	<tr class="listHead">
		<td class="left" width='30%'><?php echo $spTextWeb['Edit User Type']?></td>
		<td class="right">&nbsp;</td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spText['common']['Name']?>:</td>
		<td class="td_right_col"><input type="text" name="user_type" value="<?php echo $post['user_type']?>"><?php echo $errMsg['user_type']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['label']['Description']?>:</td>
		<td class="td_right_col"><textarea name="description" id="usertypedescription"><?php echo $post['description']?></textarea><?php echo $errMsg['description']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spText['common']['Keywords Count']?>:</td>
		<td class="td_right_col"><input type="text" name="num_keywords" id="keywordcount" value="<?php echo $post['num_keywords']?>"><?php echo $errMsg['num_keywords']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Websites Count']?>:</td>
		<td class="td_right_col"><input type="text" name="num_websites" id="websitecount" value="<?php echo $post['num_websites']?>"><?php echo $errMsg['num_websites']?></td>
	</tr>
	<tr class="white_row">
		<td class="td_left_col"><?php echo $spText['common']['Price']?>:</td>
		<td class="td_right_col"><input type="text" name="price" id="price" value="<?php echo $post['price']?>"><?php echo $errMsg['price']?></td>
	</tr>
	<tr class="blue_row">
		<td class="td_left_col"><?php echo $spText['common']['Status']?>:</td>
		<td class="td_right_col">
			<select name="user_type_status" id="user_type_status">
				<option value="">-- Select Status --</option>
				<?php if ($post['status']) { ?>
					<option value="1" selected="selected">Active</option>
					<option value="0">Inactive</option>
				<?php } else { ?>
					<option value="1">Active</option>
					<option value="0" selected="selected">Inactive</option>
				<?php } ?>
			</select>
		</td>
	</tr>		
	<tr class="white_row">
		<td class="tab_left_bot_noborder"></td>
		<td class="tab_right_bot"></td>
	</tr>
	<tr class="listBot">
		<td class="left" colspan="1"></td>
		<td class="right"></td>
	</tr>
</table>
<table width="100%" cellspacing="0" cellpadding="0" border="0" class="actionSec">
	<tr>
    	<td style="padding-top: 6px;text-align:right;">
    		<a onclick="scriptDoLoad('user-types-manager.php', 'content')" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Cancel']?>
         	</a> &nbsp;
         	<?php $actFun = "confirmSubmit('user-types-manager.php', 'editUserType', 'content')"; ?>         		
         	<a onclick="<?php echo $actFun?>" href="javascript:void(0);" class="actionbut">
         		<?php echo $spText['button']['Proceed']?>
         	</a>
    	</td>
	</tr>
</table>
</form>
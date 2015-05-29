<div class="Left">
	<div class="col">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">
    		<div class="Block">
                <form name="loginForm" method="post" action="<?php echo SP_WEBPATH?>/register.php">
                <input type="hidden" name="sec" value="register">
                <table width="100%" cellpadding="0" cellspacing="0" class="actionForm">
                	<tr>
                		<td>&nbsp;</td>
                		<th class="main_header"><?php echo $spText['login']['Create New Account']?></th>
                	</tr>
                	<tr>
                		<th width="28%"><?php echo $spText['login']['Username']?>:*</th>
                		<td><input type="text" name="userName" value="<?php echo $post['userName']?>"><?php echo $errMsg['userName']?></td>
                	</tr>
                	<tr>
                		<th><?php echo $spText['login']['Password']?>:*</th>
                		<td><input type="password" name="password" value=""><?php echo $errMsg['password']?></td>
                	</tr>
                	<tr>
                		<th><?php echo $spText['login']['Confirm Password']?>:*</th>
                		<td><input type="password" name="confirmPassword" value=""></td>
                	</tr>
                	<tr>
                		<th><?php echo $spText['login']['First Name']?>:*</th>
                		<td><input type="text" name="firstName" value="<?php echo $post['firstName']?>"><?php echo $errMsg['firstName']?></td>
                	</tr>
                	<tr>
                		<th><?php echo $spText['login']['Last Name']?>:*</th>
                		<td><input type="text" name="lastName" value="<?php echo $post['lastName']?>"><?php echo $errMsg['lastName']?></td>
                	</tr>
                	<tr>
                		<th><?php echo $spText['login']['Email']?>:*</th>
                		<td><input type="text" name="email" value="<?php echo $post['email']?>"><?php echo $errMsg['email']?></td>
                	</tr>
                	<tr>
                    	<th><?php echo $spText['login']['Enter the code as it is shown']?>:*</th>
                        <td>
                            <div style="margin: 5px 0 10px 0">
                                <img src="<?php echo SP_WEBPATH?>/visual-captcha.php">
                            </div>
                            <div>
                        	    <input type="text" name="code" value="<?php echo $post['code']?>"><?php echo $errMsg['code']?>
                            </div>
                        </td>
                    </tr>    	
                	<tr>
                		<td>&nbsp;</td>
                		<td colspan="0" class="actionsBox">
                			<input class="button" type="submit" name="login" value="<?php echo $spText['login']['Create my account']?> >>"/>
                		</td>
                	</tr>
                </table>
                </form>
    		</div>
		</div>
		<?php echo getRoundTabBot(); ?>
	</div>
</div>
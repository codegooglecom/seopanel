<script>
	var menuList = new Array();
	var buttonList = new Array();
	var scriptList = new Array();	
</script>
<ul id="menu">
<?php 
foreach($menuList as $i => $menuInfo){
	if($menuSelected == $menuInfo['url_section']){
			$imgSrc = "hide";
			$style = "";
	}else{
		$imgSrc = "more";
		$style = 'none';
	}
	$button = "img".$menuInfo['id'];
	$subMenuId = "sub".$menuInfo['id'];
	?>
	<script type="text/javascript">
		menuList[<?=$i?>] = '<?=$subMenuId?>';
		buttonList[<?=$i?>] = '<?=$button?>';
	</script>
	<li class="tab">
		<a href='javascript:void(0);' onclick="showMenu('<?=$button?>','<?=$subMenuId?>')"><img id="<?=$button?>" src="<?=SP_IMGPATH."/".$imgSrc?>.gif"> <?=$menuInfo['name']?></a>
	</li>
	<li id="<?=$subMenuId?>" class="subtab" style="display:<?=$style?>;padding-left:0px;">
	<?php
	switch($menuInfo['url_section']){
		
		case "websites":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'websites.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('websites.php', 'content')"><?=$spTextPanel['Website Manager']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('websites.php', 'content', 'sec=new')"><?=$spTextPanel['New Website']?></a></li>
			</ul>
			<?php
			break;
			
		case "users":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'users.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('users.php', 'content')"><?=$spTextPanel['User Manager']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('users.php', 'content', 'sec=new')"><?=$spTextPanel['New User']?></a></li>
			</ul>
			<?php
			break;
			
		case "report-manager":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'cron.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('cron.php', 'content')"><?=$spTextPanel['Report Generation Manager']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('cron.php?sec=croncommand', 'content')"><?=$spTextPanel['Cron Command']?></a></li>
			</ul>
			<?php
			break;
			
		case "seo-tools-manager":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'seo-tools-manager.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('seo-tools-manager.php', 'content')"><?=$spTextPanel['Seo Tools Manager']?></a></li>
			</ul>
			<?php
			break;
			
		case "seo-plugin-manager":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'seo-plugins-manager.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('seo-plugins-manager.php', 'content')"><?=$spTextPanel['Seo Plugins Manager']?></a></li>
			</ul>
			<?php
			break;
			
		case "directory-manager":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'directories.php?sec=directorymgr';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=directorymgr', 'content')"><?=$spTextPanel['Directory Manager']?></a></li>				
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('directories.php?sec=showcheckdir', 'content')"><?=$spTextPanel['Check Directory']?></a></li>
			</ul>
			<?php
			break;
			
		case "proxy-manager":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'proxy.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('proxy.php', 'content')"><?=$spTextPanel['Proxy Manager']?></a></li>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('proxy.php', 'content', 'sec=new')"><?=$spTextPanel['New Proxy']?></a></li>
			</ul>
			<?php
			break;
			
		case "settings":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'settings.php';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('settings.php', 'content')"><?=$spTextPanel['System Settings']?></a></li>
			</ul>
			<?php
			break;
			
		case "my-profile":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'users.php?sec=my-profile';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('users.php?sec=my-profile', 'content')"><?=$spTextPanel['Edit My Profile']?></a></li>
			</ul>
			<?php
			break;
			
		case "about-us":
			?>
			<script type="text/javascript">scriptList[<?=$i?>] = 'settings.php?sec=aboutus';</script>			
			<ul id='subui'>
				<li><a href="javascript:void(0);" onclick="scriptDoLoad('settings.php?sec=aboutus', 'content')"><?=$spTextPanel['About Us']?></a></li>
			</ul>
			<?php
			break;
			
	}
	?>
	</li>
	<?php
}
?>
</ul>
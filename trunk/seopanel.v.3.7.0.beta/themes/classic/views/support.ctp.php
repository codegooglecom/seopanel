<div class="Center" style='width:100%;'>
    <div class="col" style="">
        <?php echo getRoundTabTop(); ?>
        <div id="round_content">    	
    
            <?php 
            $search = array(
            	'<?'.'=SP_PLUGINSITE?>', '<?'.'=SP_DOWNLOAD_LINK?>', '<?'.'=SP_DEMO_LINK?>',
            	'<?'.'=SP_CONTACT_LINK?>', '<?'.'=SP_HELP_LINK?>', '<?'.'=SP_FORUM_LINK?>',
            	'<?'.'=SP_SUPPORT_LINK?>', '<?'.'=SP_DONATE_LINK?>'
           	);
            $replace = array(SP_PLUGINSITE,SP_DOWNLOAD_LINK,SP_DEMO_LINK,SP_CONTACT_LINK,SP_HELP_LINK,SP_FORUM_LINK,SP_SUPPORT_LINK,SP_DONATE_LINK);
            echo str_replace( $search, $replace, $spTextSupport['support_cont1']);
            echo str_replace( $search, $replace, $spTextSupport['support_cont2']);
            echo str_replace( $search, $replace, $spTextSupport['support_cont3']);
            ?>
		</div>
		<?php echo getRoundTabBot(); ?>
    </div>
</div>

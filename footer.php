<?php
/*
* 请尊重Ayakin劳动成果，不要擅自删除主题版权声明，感谢。
* Please respect our labor achievements and do not delete the theme copyright statement without authorization, thank you.
* Theme Designed By Lumirant - 2432856811@qq.com
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->
<script>
    <?php echo(getOptions()->additionalJs) ?>
</script>

<footer id="footer" role="contentinfo">
    <?php if(getOptions()->simpleCopyright == "enable") : ?>
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>
        <?php _e('Theme by <a href="https://blog.lumirant.top/archives/51/">Ayakin</a>'); ?>.
    <?php else : ?>
        &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a><?php _e(' All Rights Reserved.'); ?>
        <br>
        <?php _e('Theme <a href="https://blog.lumirant.top/archives/51/">Ayakin</a> designed by <a href="https://Lumirant.top">Lumirant</a>'); ?>.
    <?php endif; ?>
    <!-- 添加备案号 -->
    <?php if(!empty(getOptions()->ICP_show)) : ?>
        <br>
        <?php echo '<a href="https://beian.miit.gov.cn/">' . getOptions()->ICP_show . '</a>'; ?>
    <?php endif; ?>

</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>

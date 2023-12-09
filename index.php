<?php
/**
 * A concise and aesthetically theme for Typecho
 *
 * @package Ayakin
 * @author Lumirant
 * @version 1.1
 * @link http://lumirant.top
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('/header.php');
?>
<div class="col-mb-12 col-8" id="main" role="main">
    <?php $this->need('/component/notice.php'); ?>
    <?php $this->need('/component/topPosts.php'); ?>
    <?php while ($this->next()): ?>
        <?php if(!in_array($this->cid,explode(',',trim(getOptions()->topArticle ?? "")) ?? [])) : ?>
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                <h2 class="post-title" itemprop="name headline">
                    <a itemprop="url"
                       href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                </h2>
                <div class="post-content" temprop="articleBody">
                    <?php $this->excerpt(500 , '...'); ?>
                </div>
                <ul class="post-meta">
                    <li>
                        <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished">
<?php echo(getHumanizedDate($this->date->timeStamp)); ?> </time>
                    </li>
                    <li><?php $this->category("<span style='color:#444;font-weight: 600;'>·</span>"); ?></li>
                </ul>
            </article>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php $this->pageNav('<', '>'); ?>
</div><!-- end #main-->
<?php $this->need('/component/sidebar.php'); ?>
<?php $this->need('/footer.php'); ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('/header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <a itemprop="url"
               href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <ul class="post-meta">
            <li>
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php echo(getHumanizedDate($this->date->timeStamp)); ?></time>
            </li>
            <li><?php $this->category('·'); ?></li>
            <li><?php $this->tags('· ', true, '无标签'); ?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>

    <?php $this->need('/component/comments.php'); ?>

    <?php if(getOptions()->enableArticleNav == 'enable') : ?>
        <ul class="post-near">
            <li>上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
            <li>下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
        </ul>
    <?php endif; ?>
</div><!-- end #main-->

<?php $this->need('/component/sidebar.php'); ?>
<?php $this->need('/footer.php'); ?>

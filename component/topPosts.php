<?php
$topPosts = trim(getOptions()->topArticle) ?? "";
$topPosts = explode(",",$topPosts);
?>
<?php if($this->_currentPage == 1) :?>
    <?php foreach ($topPosts as $cid) : ?>
        <?php $this->widget("Widget_Archive@ayakin" . $cid, "pageSize=1&type=post", "cid=" . $cid)->to($item);?>
            <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
                <h2 class="post-title" itemprop="name headline">
                    <span class="top-article-tag">置顶</span><a itemprop="url"
                       href="<?php $item->permalink() ?>"><?php $item->title() ?></a>
                </h2>
                <div class="post-content" temprop="articleBody">
                    <?php $item->excerpt(500 , "...")?>
                </div>
                <ul class="post-meta">
                    <li>
                        <time datetime="<?php $item->date("c")?>" itemprop="datePublished"><?php echo(getHumanizedDate($this->date->timeStamp)); ?></time>
                    </li>
                    <li><?php $item->category("<span style='color:#444;font-weight: 600;'>·</span>")?></li>
                </ul>
            </article>
    <?php endforeach;?>
<?php endif;?>
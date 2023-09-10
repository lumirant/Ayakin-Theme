<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary" style="margin-left: 2.33333%;">
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowAuthorInfo', $this->options->sidebarBlock)): ?>
            <section class="widget flex flex-col">
                <ul class="widget-list">
                    <li class="author-info">
                        <?php if(!empty(getOptions()->avatarUrl)) : ?>
                            <img src="<?php _e(getOptions()->avatarUrl) ?>" />
                        <?php elseif(!empty($this->user->mail)) : ?>
                            <img src="https://cravatar.cn/avatar/<?php _e(md5($this->user->mail)) ?>.png" />
                        <?php else : ?>
                        <img src="https://cravatar.cn/avatar/1.png" />
                        <?php endif; ?>
                        <div>
                            <?php if(!empty(getOptions()->authorName)) : ?>
                                <h3><?php _e(getOptions()->authorName) ?></h3>
                            <?php else : ?>
                                <h3><?php  _e($this->author->screenName() ?? "") ?></h3>
                            <?php endif; ?>
                            <?php if(!empty(getOptions()->authorDescribe)) : ?>
                                <p><?php _e(getOptions()->authorDescribe) ?></p>
                            <?php endif; ?>
                        </div>
                    </li>
                </ul>
                <?php if ($authorTag = $this->options->authorTag): ?>
                    <ul class="author-tag flex no-mp">
                        <?php foreach (explode(",", $authorTag) as $tag): ?>
                        <li class="author-tag-item li-none-style"><?php echo $tag; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </section>
    <?php endif; ?>
    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <div class="sidebar-title" style="margin-bottom:18.72px;">
                <img src="https://api.iconify.design/icon-park-outline:ranking.svg" />
                <h3 class="widget-title"><?php _e('最新文章'); ?></h3>
            </div>
            <div class="site-search kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>"/>
                </form>
            </div>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Recent::alloc()
                    ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <div class="sidebar-title">
                <img src="https://api.iconify.design/bx:comment-detail.svg" />
            <h3 class="widget-title"><?php _e('最近评论'); ?></h3>
            </div>
            <ul class="widget-list">
                <?php \Widget\Comments\Recent::alloc()->to($comments); ?>
                <?php while ($comments->next()): ?>
                    <li>
                        <a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <div class="sidebar-title">
                <img src="https://api.iconify.design/mingcute:classify-2-line.svg" />
            <h3 class="widget-title"><?php _e('分类'); ?></h3>
            </div>
            <?php \Widget\Metas\Category\Rows::alloc()->listCategories('wrapClass=widget-list'); ?>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <div class="sidebar-title" style="margin-bottom:18.72px;">
                <img src="https://api.iconify.design/mdi:format-list-bulleted-type.svg" />
            <h3 class="widget-title"><?php _e('归档'); ?></h3>
            </div>
            <ul class="widget-list">
                <?php \Widget\Contents\Post\Date::alloc('type=month&format=F Y')
                    ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
            </ul>
        </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('其它'); ?></h3>
            <ul class="widget-list">
                <?php if ($this->user->hasLogin()): ?>
                    <li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?>
                            (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
                <?php else: ?>
                    <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('管理员登录'); ?></a>
                    </li>
                <?php endif; ?>
                <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
                <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
                <li><a href="https://blog.lumirant.top/">Ayakin Theme</a></li>
            </ul>
        </section>
    <?php endif; ?>

</div><!-- end #sidebar -->

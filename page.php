<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('/header.php'); ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <a itemprop="url"
               href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>

    <!-- 为pre块添加 line-numbers 类 -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var codeBlocks = document.querySelectorAll('.post-content pre:not(.line-numbers)');
            codeBlocks.forEach(function (codeBlock) {
                codeBlock.classList.add('line-numbers');
            });
        });
    </script>
    <!-- prism 代码高亮&主题选择 -->
    <?php if ($this->options->prismjs_theme == 'tomorrow') : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('prismjs/tomorrow/prism.css'); ?>" />
    <script src="<?php $this->options->themeUrl('prismjs/tomorrow/prism.js'); ?>"></script>
    <?php elseif ($this->options->prismjs_theme == 'coy') : ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('prismjs/coy/prism.css'); ?>" />
    <script src="<?php $this->options->themeUrl('prismjs/coy/prism.js'); ?>"></script>
    <?php endif; ?>
    <!-- 修改为mac样式 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/mac.css'); ?>" />

    <?php $this->need('/component/comments.php'); ?>
</div><!-- end #main-->

<?php $this->need('/component/sidebar.php'); ?>
<?php $this->need('/footer.php'); ?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php require_once(__DIR__."/core/coreStart.php"); ?>
<?php header("Cache-control: private"); ?>
<?php header('cache-control:private,must_revalidate'); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-cache" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <title><?php if($this->_currentPage>1) echo '第 '.$this->_currentPage.' 页 - '; ?><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/normalize.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css'); ?>">
    <link rel="icon" href="<?php echo(getOptions()->faviconUrl ?? ""); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/colors/'.((getOptions()->themecolor) ?? 'black').'.css'); ?>">
    <style>
        <?php echo(getOptions()->additionalCss) ?>
    </style>

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>

    <!-- 引入awesome图标 -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.2/css/all.css">
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
</head>
<body>
<header id="header" class="clearfix">
    <div class="container">
        <div class="flex row" style="line-height: 0;align-items: center;">
            <div class="site-name col-mb-12 col-9" style="line-height: normal;">
                <?php if (!empty(getOptions()->logoUrl)): ?>
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>">
                        <img src="<?php getOptions()->logoUrl() ?>" alt="<?php $this->options->title() ?>"/>
                        <a id="logo-with-picture" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                    </a>
                <?php else: ?>
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
                <?php endif; ?>
            </div>
            <div class="col-mb-12 flex" style="float: unset;width: max-content;width: 100%;justify-content: flex-end;">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if ($this->is('index')): ?> class="current"<?php endif; ?>
                        href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
                    <?php $this->widget("Widget\Metas\Category\Rows")->to($categorys); ?>
                    <?php if ($categorys->have()): ?>
                        <?php while ($categorys->next()): ?>
                            <?php if(!in_array($categorys->mid,getOptions()->hiddenNav)) : ?>
                                <a href="<?php $categorys->permalink(); ?>"
                                title="<?php $categorys->name(); ?>"
                                class="<?php echo isActiveMenu(
                                  $this,
                                  $categorys->slug
                                ); ?>  ">
                                    <?php $categorys->name(); ?>
                                </a>
                            <?php endif;?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php foreach(json_decode((getOptions()->additionalNav) ?? "",true) ?? [] as $additionalNav): ?>
                        <?php if($additionalNav["hidden"] == 0) : ?>
                            <a href="<?php echo($additionalNav["link"]) ?>"
                                        title="<?php echo($additionalNav["name"]) ?>"
                                        class="<?php echo isActiveMenu(
                                          $this,
                                          $categorys->slug
                                        ); ?>  ">
                                <?php echo($additionalNav["name"]) ?>
                            </a>
                            <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="site-search kit-hidden-tb">
                        <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                            <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                            <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>"/>
                        </form>
                    </div>
                </nav>
                <button onclick="showMenu()" style="padding: 0;margin: 0;background: none;border: none;"><img class="nav-menu-btn" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxZW0iIGhlaWdodD0iMWVtIiB2aWV3Qm94PSIwIDAgMjQgMjQiPjxwYXRoIGZpbGw9Im5vbmUiIHN0cm9rZT0iY3VycmVudENvbG9yIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS13aWR0aD0iMS41IiBkPSJNMjAgN0g0bTE2IDVING0xNiA1SDQiLz48L3N2Zz4=" /></button>
            </div>
        </div><!-- end .row -->
    </div>
</header><!-- end #header -->

        <nav id="mobile-nav-menu" class="clearfix" role="navigation">
            <a<?php if ($this->is('index')): ?> class="current"<?php endif; ?>
                href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
            <?php \Widget\Contents\Page\Rows::alloc()->to($pages); ?>
            <?php $this->widget("Widget\Metas\Category\Rows")->to($categorys); ?>
            <?php if ($categorys->have()): ?>
                <?php while ($categorys->next()): ?>
                    <?php if(!in_array($categorys->mid,getOptions()->hiddenNav)) : ?>
                        <a href="<?php $categorys->permalink(); ?>"
                        title="<?php $categorys->name(); ?>"
                        class="<?php echo isActiveMenu(
                          $this,
                          $categorys->slug
                        ); ?>  ">
                            <?php $categorys->name(); ?>
                        </a>
                    <?php endif;?>
                <?php endwhile; ?>
            <?php endif; ?>
            <?php foreach(json_decode((getOptions()->additionalNav) ?? "",true) ?? [] as $additionalNav): ?>
                <?php if($additionalNav["hidden"] == 0) : ?>
                    <a href="<?php echo($additionalNav["link"]) ?>"
                                title="<?php echo($additionalNav["name"]) ?>"
                                class="<?php echo isActiveMenu(
                                  $this,
                                  $categorys->slug
                                ); ?>  ">
                        <?php echo($additionalNav["name"]) ?>
                    </a>
                    <?php endif; ?>
            <?php endforeach; ?>
            <div class="site-search kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>"/>
                </form>
            </div>
        </nav>

<script>
    function showMenu() {
        var menu = document.getElementById("mobile-nav-menu")
        if(menu.classList.contains("menu-active")) {
            menu.classList.remove("menu-active");
        }
        else {
            menu.classList.add("menu-active");
        }
    }
</script>
<div id="body">
    <div class="container">
        <div class="flex row">
    
    

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <?php define('__TYPECHO_GRAVATAR_PREFIX__', getOptions()->avatarRootUrl); ?>
        <h3><?php $this->commentsNum(_t('评论'), _t('评论（1）'), _t('评论（%d）')); ?></h3>

        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>

    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">

            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" style="margin-top: 30px;">
                <?php if (!$this->user->hasLogin()): ?>
                    <div class="comment-info">
                        <p>
                            <input type="text" name="author" id="author" class="text"
                                   value="<?php $this->remember('author'); ?>" required placeholder="称呼"/>
                        </p>
                        <p>
                            <input type="email" name="mail" id="mail" class="text"
                                   value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> placeholder="Email" />
                        </p>
                        <p>
                            <input type="url" name="url" id="url" class="text"
                                   value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>placeholder="网站" />
                        </p>
                    </div>
                <?php endif; ?>
                <p>
                    <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" style="padding: 10px;border-radius: 5px;"
                              required placeholder="请输入评论内容"><?php $this->remember('text'); ?></textarea>
                </p>
                <div class="comment-btn">
                    <p style="float: right;margin: 0px;">
                        <button type="submit" class="submit" style="background-color: var(--theme-color);border: none;color: #fff;padding: 8px 11px;border-radius: 5px;font-weight: 600;cursor: pointer;"><?php _e('提交评论'); ?></button>
                    </p>
                    <div class="cancel-comment-reply">
                        <?php $comments->cancelReply(); ?>
                    </div>
                </div>
                <?php if ($this->user->hasLogin()): ?>
                    <div class="author-info login-info">
                        <?php if(!empty(getOptions()->avatarUrl)) : ?>
                                <img src="<?php _e(getOptions()->avatarUrl) ?>" />
                            <?php elseif(!empty($this->user->mail)) : ?>
                                <img src="https://cravatar.cn/avatar/<?php _e(md5($this->user->mail)) ?>.png" />
                            <?php else : ?>
                            <img src="https://cravatar.cn/avatar/1.png" />
                            <?php endif; ?>
                        <p class="flex flex-col" style="line-height: 27px;margin: 0;"><a
                                href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a> <a
                                href="<?php $this->options->logoutUrl(); ?>" title="Logout" style="    background-color: var(--theme-color);color: #fff;font-weight: 700;font-size: 13px;width: 60%;text-align: center;border-radius: 3px;"><?php _e('退出'); ?></a>
                        </p>
                        </div>
                <?php endif; ?>
            </form>
        </div>
    <?php else: ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>

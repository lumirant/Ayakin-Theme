<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once(__DIR__."/core/coreStart.php");

function themeConfig($form)
{
    echo '
    <div class="message success" style="border-radius: 5px;padding: 8px 18px;background: #b3fdb6;color: #388E3C;box-shadow: 0px 0px 6px 3px #b3fdb6;margin: 15px 0px;">
        <h2 class="message-title">欢迎使用Ayakin主题！</h2>
        <p class="message-content">主题目前正在开发中，有不足的地方还请多多宽待~</p>
    </div>
    ';
    // echo '
    // <div class="message success" style="border-radius: 5px;padding: 8px 18px;background: #FDD835;color: #b56117;box-shadow: 0px 0px 13px -2px #FFEB3B;margin: 15px 0px;">
    //     <h2 class="message-title">你的主题配置尚未备份</h2>
    //     <p class="message-content">当你切换博客主题时，Ayakin的配置信息将会丢失，<a href="#">点击备份</a>可以避免这种情况的发生。</p>
    // </div>
    // ';
    $themecolor = new \Typecho\Widget\Helper\Form\Element\Radio(
        'themecolor',
        [
            'black' => _t('水墨黑'),
            'red' => _t('珊瑚红'),
            'blue' => _t('深天蓝'),
            'cyan' => _t('水绿青'),
            'green' => _t('翡翠绿'),
            'yellow' => _t('烫鎏金'),
        ],
        'black',
        _t('主题颜色'),
        _t('默认选择水墨黑')
    );

    $form->addInput($themecolor);
    
    $faviconUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'faviconUrl',
        null,
        null,
        _t('网站图标Url'),
        _t('会显示在浏览器标签的图标中')
    );

    $form->addInput($faviconUrl);
    
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('导航栏Logo图片Url'),
        _t('会显示在导航栏左侧')
    );

    $form->addInput($logoUrl);
    
    $avatarUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'avatarUrl',
        null,
        null,
        _t('作者头像地址'),
        _t('会展示在作者信息处及网站首页，留空则根据邮箱自动获取头像。')
    );
    
    
    $form->addInput($avatarUrl);
    
    $authorName = new \Typecho\Widget\Helper\Form\Element\Text(
        'authorName',
        null,
        null,
        _t('作者名'),
        _t('会展示在作者信息处及网站首页，留空则默认显示admin用户昵称。')
    );

    $form->addInput($authorName);
    
    $authorDescribe = new \Typecho\Widget\Helper\Form\Element\Text(
        'authorDescribe',
        null,
        null,
        _t('作者简介'),
        _t('会展示在作者信息处及网站首页，留空则不显示。')
    );

    $form->addInput($authorDescribe);
    
    $authorTag = new \Typecho\Widget\Helper\Form\Element\Text(
        'authorTag',
        null,
        null,
        _t('作者标签'),
        _t('多个标签用英文半角逗号“,”分隔，留空则不显示。')
    );

    $form->addInput($authorTag);
    
    $notice = new \Typecho_Widget_Helper_Form_Element_Textarea(
        'notice',
        null,
        '[{"type":"normal","title":"欢迎使用Ayakin！","content":"这是主题默认的公告，你可以在控制台-外观-设置外观-公告中修改或删除它。"}]',
        _t('公告'),
        _t('会展示在网站首页，请按照 <a href="#">公告配置示范</a> 来填写此项')
    );

    $form->addInput($notice);
    
    $avatarRootUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'avatarRootUrl',
        null,
        'https://cravatar.cn/avatar/',
        _t('Gravatar头像镜像源地址'),
        _t('默认使用国内的Cravatar镜像，如果你有其它的镜像Url，可以在这里更换。')
    );

    $form->addInput($avatarRootUrl);
    
    $enableArticleNav = new \Typecho\Widget\Helper\Form\Element\Radio(
        'enableArticleNav',
        ['enable' => _t('是'),'disable' => _t('否')],
        'enable',
        _t('文章底部是否显示前后文章导航'),
        _t('关闭后将不会在文章底部显示“上一篇”和“下一篇”链接。')
    );

    $form->addInput($enableArticleNav);
    
    $simpleCopyright = new \Typecho\Widget\Helper\Form\Element\Radio(
        'simpleCopyright',
        ['enable' => _t('是'),'disable' => _t('否')],
        'disable',
        _t('是否简化页面底部的版权声明'),
        _t('开启后会缩短版权声明长度，以在小尺寸屏幕上获取更好的使用体验。<br/>请尊重劳动成果，不要擅自修改或删除主题版权标识，感谢你对Ayakin主题的支持。<br/>如需商用去除版权声明请联系<a href="https://lumirant.top">开发者</a>，谢谢。')
    );

    $form->addInput($simpleCopyright);
    
    $topArticle = new \Typecho\Widget\Helper\Form\Element\Text(
        'topArticle',
        null,
        null,
        _t('置顶文章'),
        _t('需填入指定文章cid，多个文章用英文半角逗号“,”分隔。')
    );

    $form->addInput($topArticle);

    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [
            'ShowAuthorInfo'     => _t('显示站长信息'),
            'ShowRecentPosts'    => _t('显示最新文章'),
            'ShowRecentComments' => _t('显示最近回复'),
            'ShowCategory'       => _t('显示分类'),
            'ShowArchive'        => _t('显示归档')
        ],
        ['ShowAuthorInfo','ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive'],
        _t('侧边栏显示')
    );

    $form->addInput($sidebarBlock->multiMode());
    
    $hiddenNav = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'hiddenNav',
        getCategoryies(true),
        [],
        _t('隐藏分类导航'),
        _t('主题默认会将所有分类显示在导航栏上，如果你不想显示某些分类，请勾选对应的分类。')
    );
    $form->addInput($hiddenNav);
    
    $additionalNav = new \Typecho_Widget_Helper_Form_Element_Textarea(
        'additionalNav',
        null,
        null,
        _t('附加导航'),
        _t('会附加在导航栏尾部，请按照 <a href="#">附加导航配置示范</a> 来填写此项。')
    );

    $form->addInput($additionalNav);
    
    $additionalCss = new \Typecho_Widget_Helper_Form_Element_Textarea(
        'additionalCss',
        null,
        '',
        _t('自定义CSS'),
        _t('会注入每个页面的style标签中，优先级除嵌入式样式外最高，可以自定义站内一些样式。')
    );

    $form->addInput($additionalCss);
    
    $additionalJs = new \Typecho_Widget_Helper_Form_Element_Textarea(
        'additionalJs',
        null,
        '',
        _t('自定义JavaScript'),
        _t('会在每个页面的最后引入，可以自定义站内一些JS代码。')
    );

    $form->addInput($additionalJs);
}

function getCategoryies($returnArray = false)
{
  $db = Typecho_Db::get();
  $prow = $db->fetchAll(
    $db
      ->select()
      ->from("table.metas")
      ->where("type = ?", "category")
  );
  if($returnArray) {
        $array = [];
    foreach ($prow as $item) {
        $array[$item["mid"]] =  _t($item["name"]);
    }
    return $array;
  }
  else { 
    $text = "";
    foreach ($prow as $item) {
        $text .= $item["name"] . "(" . $item["mid"] . ")" . "&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    return $text;
  }
}

/*
function themeFields($layout)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点LOGO地址'),
        _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO')
    );
    $layout->addItem($logoUrl);
}
*/

<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once(__DIR__."/core/coreStart.php");
use Typecho\Common;
use Utils\Helper;
use Widget\Notice;
use Widget\Options;
use Typecho\Widget\Helper\Form\Element\Checkbox;
use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Textarea;
use Typecho\Widget\Helper\Form\Element\Radio;

function themeConfig($form)
{
    echo '
    <div class="message success" style="border-radius: 5px;padding: 8px 18px;background: #b3fdb6;color: #388E3C;box-shadow: 0px 0px 6px 3px #b3fdb6;margin: 15px 0px;">
        <h2 class="message-title">欢迎使用Ayakin主题！</h2>
        <p class="message-content">主题目前正在开发中，有不足的地方还请多多宽待~</p>
    </div>
    ';
    echo '
    <link rel="stylesheet" href="'. Typecho_Db::get()->fetchRow(
            Typecho_Db::get()->select()->from("table.options")->where("name = ?", "siteUrl")
            )["value"] .'/usr/themes/Ayakin/css/admin.css">';
    $themecolor = new Radio(
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
    
    //添加代码高亮主题选择
    $prismjs_theme = new Radio(
      'prismjs_theme',
      [
          'tomorrow' => _t('Tomorrow Nighty'),
          'coy' => _t('coy'),
          'close' => _t('关闭代码高亮'),
      ],
      'tomorrow',
      _t('代码高亮主题'),
      _t('默认选择Tomorrow Nighty主题,代码框风格为Mac')
  );

  $form->addInput($prismjs_theme);

    $faviconUrl = new Text(
        'faviconUrl',
        null,
        null,
        _t('网站图标Url'),
        _t('会显示在浏览器标签的图标中')
    );

    $form->addInput($faviconUrl);
    
    $logoUrl = new Text(
        'logoUrl',
        null,
        null,
        _t('导航栏Logo图片Url'),
        _t('会显示在导航栏左侧')
    );

    $form->addInput($logoUrl);
    
    $avatarUrl = new Text(
        'avatarUrl',
        null,
        null,
        _t('作者头像地址'),
        _t('会展示在作者信息处及网站首页，留空则根据邮箱自动获取头像。')
    );
    
    
    $form->addInput($avatarUrl);
    
    $authorName = new Text(
        'authorName',
        null,
        null,
        _t('作者名'),
        _t('会展示在作者信息处及网站首页，留空则默认显示admin用户昵称。')
    );

    $form->addInput($authorName);
    
    $authorDescribe = new Text(
        'authorDescribe',
        null,
        null,
        _t('作者简介'),
        _t('会展示在作者信息处及网站首页，留空则不显示。')
    );

    $form->addInput($authorDescribe);
    
    $authorTag = new Text(
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
        _t('会展示在网站首页，请按照 <a href="https://blog.lumirant.top/archives/55/">公告配置示范</a> 来填写此项')
    );

    $form->addInput($notice);
    
    $avatarRootUrl = new Text(
        'avatarRootUrl',
        null,
        'https://cravatar.cn/avatar/',
        _t('Gravatar头像镜像源地址'),
        _t('默认使用国内的Cravatar镜像，如果你有其它的镜像Url，可以在这里更换。')
    );

    $form->addInput($avatarRootUrl);
    
    $enableArticleNav = new Radio(
        'enableArticleNav',
        ['enable' => _t('是'),'disable' => _t('否')],
        'enable',
        _t('文章底部是否显示前后文章导航'),
        _t('关闭后将不会在文章底部显示“上一篇”和“下一篇”链接。')
    );

    $form->addInput($enableArticleNav);
    
    $simpleCopyright = new Radio(
        'simpleCopyright',
        ['enable' => _t('是'),'disable' => _t('否')],
        'disable',
        _t('是否简化页面底部的版权声明'),
        _t('开启后会缩短版权声明长度，以在小尺寸屏幕上获取更好的使用体验。<br/>请尊重劳动成果，不要擅自修改或删除主题版权标识，感谢你对Ayakin主题的支持。<br/>如需商用去除版权声明请联系<a href="https://lumirant.top">开发者</a>，谢谢。')
    );

    $form->addInput($simpleCopyright);
    
    $topArticle = new Text(
        'topArticle',
        null,
        null,
        _t('置顶文章'),
        _t('需填入指定文章cid，多个文章用英文半角逗号“,”分隔。')
    );

    $form->addInput($topArticle);

    $sidebarBlock = new Checkbox(
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
    
    $hiddenNav = new Checkbox(
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
        _t('会附加在导航栏尾部，请按照 <a href="https://blog.lumirant.top/archives/57/">附加导航配置示范</a> 来填写此项。')
    );

    $form->addInput($additionalNav);
    
    $footer_nocomment = new Text(
        'footer_nocomment',
        null,
        '',
        _t('评论关闭的文字显示'),
        _t('评论关闭后会显示此文本，为空则默认显示“评论已关闭”。')
    );

    $form->addInput($footer_nocomment);
    
    $ICP_show = new Text(
        'ICP_show',
        null,
        '',
        _t('网站ICP备案号'),
        _t('默认为空，填写后将置于页脚底部。')
    );

    $form->addInput($ICP_show);
    
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
    
    backup();
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


function backup() {
    $name = "ayakin";
    $db = Typecho_Db::get();
    if (isset($_POST["type"])) {
        if($_POST["type"] == "创建备份") {
            $value = $db->fetchRow(
            $db->select()->from("table.options")->where("name = ?", "theme:" . $name)
            )["value"];
            if (
                    $db->fetchRow(
                      $db->select()->from("table.options")->where("name = ?", "theme:" . $name . "_backup")
                    )
                ) {
        
                $db->query(
                    $db->update("table.options")->rows(["value" => $value])->where("name = ?", "theme:" . $name . "_backup")
                );
                Notice::alloc()->set("备份更新成功", "success");
                Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
              } else {
                if ($value) {
                    $db->query(
                    $db
                      ->insert("table.options")
                      ->rows(["name" => "theme:" . $name . "_backup", "user" => "0", "value" => $value])
                        );
                        Notice::alloc()->set("备份成功", "success");
                        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                }
              }
        }
        if ($_POST["type"] == "还原备份") {
                  if (
                    $db->fetchRow(
                      $db->select()->from("table.options")->where("name = ?", "theme:" . $name . "_backup")
                    )
                  ) {
            
                    $_value = $db->fetchRow(
                      $db->select()->from("table.options")->where("name = ?", "theme:" . $name . "_backup")
                    )["value"];
                    $db->query(
                      $db->update("table.options")->rows(["value" => $_value])->where("name = ?", "theme:" . $name)
                    );
                    if($db->fetchRow(
                      $db->select()->from("table.options")->where("name = ?", "theme:" . $name)
                    )["value"] == $_value){
                        Notice::alloc()->set("备份还原成功", "success");
                        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                    }
                    else {
                        
                        Notice::alloc()->set("备份还原失败", "error");
                        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                    }
                  } else {
            
                    Notice::alloc()->set("无备份数据，请先创建备份", "error");
                    Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                }
        }
        if ($_POST["type"] == "删除备份") {
                      if (
                        $db->fetchRow(
                          $db->select()->from("table.options")->where("name = ?", "theme:" . $name . "_backup")
                        )
                      ) {
            
                        $db->query($db->delete("table.options")->where("name = ?", "theme:" . $name . "_backup"));
                        Notice::alloc()->set("删除备份成功", "success");
                        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                      } else {
            
                        Notice::alloc()->set("无备份数据，无法删除", "success");
                        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                      }
                    }
    }
    echo '<br/><div class="message error" style="border-radius: 5px;padding: 8px 18px;background: #FDD835;color: #b56117;box-shadow: 0px 0px 13px -2px #FFEB3B;"><h2 class="message-title">请先点击右下角的保存设置按钮，创建备份！</h2><form class="backup" action="?jasmine_backup" method="post" style="display: flex;gap: 10px;margin-bottom: 10px;flex-wrap: wrap;">
    <input type="submit" name="type" class="btn primary" value="创建备份" style="color: #FFF;border-radius: 3px;background-color: #EF6C00;" />
    <input type="submit" name="type" class="btn primary" value="还原备份" style="color: #FFF;border-radius: 3px;background-color: #EF6C00;" />
    <input type="submit" name="type" class="btn primary" value="删除备份" style="color: #FFF;border-radius: 3px;background-color: #EF6C00;" /></form></div>';
}

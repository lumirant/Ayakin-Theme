<?php

$noticeList = json_decode((getOptions()->notice) ?? "{}",true);
if(!empty($noticeList)) {
    foreach ($noticeList as $notice) {
        echo '<div class="message '. $notice["type"] .'" style="margin: 20px 0px 0px 0px;">
            <h2 class="message-title">'. $notice["title"] .'</h2>
            <p class="message-content">'. $notice["content"] .'</p>
        </div>';
    }
}
<?php
    // データなどを処理する (controller)
    // 変数名がかぶっているから変更
    while ($blog = mysqli_fetch_assoc($blogs)) {
        $title = $blog['title'];  
        $created = $blog['created'];
    }
?>

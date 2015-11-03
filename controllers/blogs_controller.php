<?php
    // データなどを処理する (controller)
    // 変数名がかぶっているから変更
    while ($resource = mysqli_fetch_assoc($resources)) {
        $title = $resource['title'];  
        $created = $resource['created'];
    }
?>

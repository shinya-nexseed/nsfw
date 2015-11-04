<?php
    echo "Hello world index view <br>";
    echo "<br>";

    while ($blog = mysqli_fetch_assoc($blogs)) {
        $title = $blog['title'];  
        $created = $blog['created'];

        // 処理したデータ等を表示する (view)
        echo "==========<br>";
        echo $title;
        echo "<br>";
        echo $created;
        echo "<br>";
    }
    

?>

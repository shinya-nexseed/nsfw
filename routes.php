<?php
    
    // ネコ型ロボットクラスを呼び出してオブジェクトを作成
    include('robot.php');

    // $aというロボット（インスタンス）を設計図Robot（クラス）から生成
    $a = new Robot('ドラえもん');
    // $bというロボット（インスタンス）を設計図Robot（クラス）から生成
    $b = new Robot('ドラミちゃん');

    // -> アロー演算子
    // インスタンス(オブジェクト)のプロパティを参照するための演算子
    // nameプロパティに文字を代入
    
    // $a->name = 'ドラえもん';
    // $b->name = 'ドラミちゃん';

    // nameプロパティを呼び出して表示
    //echo $a->name;
    //echo $b->name;

    // カプセル化したプロパティを扱う
    // $a->setName('ドラえもん');
    // $b->setName('ドラミちゃん');

    // echo $a->getName();
    // echo $b->getName();

    // $singular = "category";
    // echo $singular;
    // echo "<br>";

    // $plural = singular2plural($singular);
    // echo $plural;
    // echo "<br>";


    //// +++ DB接続 +++ ////
    include('dbconnect.php');

    //// +++ ルーティング +++ ////
    // urlから情報を受取る (リソース名とアクション名)
    // explode()とは
    // 第一引数に指定した文字列で第二引数に指定した文字列を分割し、
    // 配列として返す
    $params = explode('/', $_GET['url']);
    // var_dump($params);

    $resource = $params[0];
    $action = $params[1];

    if (count($params) > 2) {
        $id = $params[2];
    }


    // リソース名を複数形に変換する処理
    $plural_resource = singular2plural($resource);


    // model呼び出す
    include('./models/' . $resource . '.php');

    // controller呼び出す
    include('./controllers/' . $plural_resource . '_controller.php');

    // リソース名がdeleteなら削除処理する
    if ($action == 'delete') {
        $BlogsController = new BlogsController($db, $plural_resource);
        $BlogsController->delete($id);
    }

    // viewの形成を楽にするヘルパーファイルを読み込み
    include('./views/helpers/application_helper.php');

    // レイアウトファイルを読み込み
    include('./views/layouts/application.php');
    // ./ ← 現在いるディレクトリ
?>


<?php
    // 単数形resource名の単語を複数形に変換する関数
    function singular2plural($singular) {
        $dictionary = array(
            'man' => 'men',
            'seaman' => 'seamen',
            'snowman' => 'snowmen',
            'woman' => 'women',
            'person' => 'people',
            'child' => 'children',
            'foot' => 'feet',
            'crux' => 'cruces',
            'oasis' => 'oases',
            'phenomenon' => 'phenomena',
            'tooth' => 'teeth',
            'goose' => 'geese',
            'genus' => 'genera',
            'graffito' => 'graffiti',
            'mythos' => 'mythoi',
            'numen' => 'numina',
            'equipment' => 'equipment',
            'information' => 'information',
            'rice' => 'rice',
            'money' => 'money',
            'species' => 'species',
            'series' => 'series',
            'fish' => 'fish',
            'sheep' => 'sheep',
            'swiss' => 'swiss',
            'chief' => 'chiefs',
            'cliff' => 'cliffs',
            'proof' => 'proofs',
            'reef' => 'reefs',
            'relief' => 'reliefs',
            'roof' => 'roofs',
            'piano' => 'pianos',
            'photo' => 'photos',
            'safe' => 'safes'
        );

        if (array_key_exists($singular, $dictionary)) {
            $plural = $dictionary[$singular];
        } elseif (preg_match('/(a|i|u|e|o)o$/', $singular)) {
            $plural = $singular . "s";
        } elseif (preg_match('/(s|x|sh|ch|o)$/', $singular)) {
            $plural = preg_replace('/(s|x|sh|ch|o)$/', '$1es', $singular);
        } elseif (preg_match('/(b|c|d|f|g|h|j|k|l|m|n|p|q|r|s|t|v|w|x|y|z)y$/', $singular)) {
            $plural = preg_replace('/(b|c|d|f|g|h|j|k|l|m|n|p|q|r|s|t|v|w|x|y|z)y$/', '$1ies', $singular);
        } elseif (preg_match('/(f|fe)$/', $singular)) {
            $plural = preg_replace('/(f|fe)$/', 'ves', $singular);
        } else {
            $plural = $singular . "s";
        }
        return $plural;
    }
?>
















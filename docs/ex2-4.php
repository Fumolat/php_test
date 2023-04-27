<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>キーワードの受信</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/st.css" >
</head>
<body>
    <h1>キーワードの受信</h1>
    <?php
    /*debug
    echo ("<p>HTMLから受信したキーワードは{$_POST["p01"]}です</p>");
    echo ("<p>HTMLから受信したキーワードは{$_POST["p02"]}です</p>");
    echo ("<p>HTMLから受信したキーワードは{$_POST["p03"]}です</p>");
    */
    ?>

    <?php

    if (mkdir("user/{$_POST["p01"]}", 0700)){
        echo 'アカウントフォルダを作成しました。';
    }else{
        echo 'フォルダの作成が失敗しました。';
    }

    date_default_timezone_set('Asia/Tokyo');
    $_date = date('Y-m-d_H:i:s'); // 現在の日付時刻を取得
    $arr = array(
        "id" => "{$_POST["p01"]}",
        "password" => "{$_POST["p02"]}",
        "e-mail" => "{$_POST["p03"]}",
        "start" => "{$_date}",
        "displayname" => "default", //作成時点では省く。
        "name" => "default"
    );

    $arr = json_encode($arr, JSON_PRETTY_PRINT);
    $filePath = "user/{$_POST["p01"]}/{$_POST["p01"]}.json";
    file_put_contents($filePath , $arr);
    ?>

</body>
<script src="js/nowtime.js"></script>
</html>


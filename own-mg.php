<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>キーワードの受信</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/st.css?v=2" >
</head>
<body>
    <h1>アカウント一覧</h1>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // 入力されたファイル名を取得
        $filePath = "json/{$_POST["d01"]}";

        // JSONファイルが存在する場合、ファイルを読み込む
        if (file_exists($filePath . ".json")) {
            $json_content = file_get_contents($filePath . ".json");

            // JSON文字列を配列に変換する
            $data = json_decode($json_content, true);

            //jsonデータをキーに変換
            $key = array_keys($data);

            $id = $data["id"];
            $password = $data["password"];
            //Unicodeエスケープを直す。
            $username = $data["username"];
            $username = json_decode('"' . $username . '"');
            $start_date = $data["start"];
            echo $start_date;

            if ($password == "{$_POST["d02"]}") {
                echo "ログイン成功";
            }
            else{
                echo "パスワードが間違っています。";
            }

        } 
        else {
            echo "指定されたファイルが存在しません。";
        }
        }
    ?>



</body>
<script src="js/nowtime.js"></script>
</html>
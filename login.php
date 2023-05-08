<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>キーワードの受信</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/st.css?v=2">
</head>
<body>
    <h1>ログイン</h1>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 入力されたファイル名を取得
            $filePath = "user/{$_POST["d01"]}/{$_POST["d01"]}";

            // JSONファイルが存在する場合、ファイルを読み込む
            if (file_exists($filePath . ".json")) {
                $json_content = file_get_contents($filePath . ".json");

                // JSON文字列を配列に変換する
                $data = json_decode($json_content, true);

                //jsonデータをキーに変換
                $key = array_keys($data);

                $id = $data["id"];
                $password = $data["password"];
                $email = $data["e-mail"];
                $start_date = $data["start"];
                $displayname = $data["displayname"];
                $name = $data["name"];
                $birth = $data["birth"];

                $conveted_data = [$id, $password, $email, $start_date, $displayname, $name, $birth];

                if ($id == "{$_POST["d01"]}"){
                    if ($password == "{$_POST["d02"]}"){
                        // データを書き換える
                        //$data["id"] = "{$_POST["e01"]}";
                        //$data["password"] = "{$_POST["e02"]}";

                        // 書き換えたデータをJSON形式に変換
                        //$updated_json = json_encode($data, JSON_PRETTY_PRINT);

                        // ファイルに保存
                        //file_put_contents($filePath . ".json", $updated_json);

                        echo "ログイン成功" . "<br/>";
                        echo "id = " . $conveted_data[0] . "<br/>";
                        echo "password = " . $conveted_data[1] . "<br/>";
                        echo "e-mail = " . $conveted_data[2] . "<br/>";
                        echo "start = " . $conveted_data[3] . "<br/>";
                        echo "displayname = " . $conveted_data[4] . "<br/>";
                        echo "name = " . $conveted_data[5] . "<br/>";
                        echo "birth = " . $conveted_data[6] . "<br/>";

                    }
                    else{
                        echo "パスワードが間違っています。";
                    }
                }
                else{
                    echo "IDが違います。";
                }
            } 
            else {
                echo "指定されたファイルが存在しません。";
            }
        }
    ?>
    <!-- アカウントデータの更新 -->

    <!--
    <form method="post" action="login.php">
        
        <div class="mb-3">
            <label for="Input1" class="form-label">ユーザーID</label>
            <input type="text" class="form-control" pattern="^[0-9a-zA-Z]+$" name="e01" required="required" id="Input1" placeholder="id"><br>
        </div>
        <div class="mb-3">
            <label for="Input2" class="form-label">パスワード</label>
            <input type="password" class="form-control" name="e02" required="required" id="Input2" placeholder="password"><br>
        </div>
        <button type="submit" class="btn btn-primary">送信</button>
        <button type="reset" class="btn btn-primary">リセット</button>
    </form>
    -->

</body>
</html>


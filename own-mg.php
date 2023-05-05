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

        function readAllFilesInFolder($folder) {
            // フォルダ内のファイルとサブフォルダを再帰的に処理
            $directoryIterator = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
            $iterator = new RecursiveIteratorIterator($directoryIterator, RecursiveIteratorIterator::SELF_FIRST);
          
            foreach ($iterator as $file) {
              // ファイルであれば処理
              if ($file->isFile()) {
                // ファイルの拡張子が「.json」の場合のみ処理
                if (strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION)) === 'json') {
                    // JSONファイルの内容を取得
                    $jsonData = file_get_contents($file->getPathname());
          
                    // JSONデータをデコード
                    $data = json_decode($jsonData, true);

                    //jsonデータをキーに変換
                    $key = array_keys($data);

                    $id = $data["id"];
                    $password = $data["password"];
                    //Unicodeエスケープを直す。
                    //$username = $data["username"];
                    //$username = json_decode('"' . $username . '"');
                    $start_date = $data["start"];
                    $displayname = $data["displayname"];
                    $name = $data["name"];
                    $birth = $data["birth"];

                    // デコードしたJSONデータを必要に応じて処理
                    // 例：JSONデータを表示する
                    var_dump($data);
                }
              }
            }
          }
          
          // フォルダ階層のルートフォルダ
          $rootFolder = 'user/';
          
          // ルートフォルダ内のすべてのファイルを処理
          readAllFilesInFolder($rootFolder);



    ?>



</body>
</html>
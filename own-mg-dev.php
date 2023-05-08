<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>キーワードの受信</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/st.css?v=2">
</head>
<body>
    <h1>アカウント一覧</h1>
    
    <?php

function readAllFilesInFolder($folder) {
  $directoryIterator = new RecursiveDirectoryIterator($folder, RecursiveDirectoryIterator::SKIP_DOTS);
  $iterator = new RecursiveIteratorIterator($directoryIterator, RecursiveIteratorIterator::SELF_FIRST);

  foreach ($iterator as $file) {
      if ($file->isFile()) {
          if (strtolower(pathinfo($file->getFilename(), PATHINFO_EXTENSION)) === 'json') {
              $jsonData = file_get_contents($file->getPathname());

              $data = json_decode($jsonData, true);

                $id = $data["id"];
                $password = $data["password"];
                //Unicodeエスケープを直す。
                //$username = $data["username"];
                //$username = json_decode('"' . $username . '"');
                $email = $data["e-mail"];
                $start_date = $data["start"];
                $displayname = $data["displayname"];
                $name = $data["name"];
                $birth = $data["birth"];

                $cv_data = [$id, $password, $email, $start_date, $displayname, $name, $birth];

              if ($data) {
                  echo '<ul>';
                  foreach ($data as $cv_data) {
                      //echo '<li>';
                      echo '<pre>' . print_r($cv_data, true) . '</pre>';
                      //echo '</li>';
                  }
                  echo '</ul>';
              }
          }
      }
  }
}

$folderPath = 'user/'; // 対象のフォルダのパスを指定してください
readAllFilesInFolder($folderPath);
          
          // フォルダ階層のルートフォルダ
          $rootFolder = 'user/';
          
          // ルートフォルダ内のすべてのファイルを処理
          readAllFilesInFolder($rootFolder);



    ?>
    <?php
      function readJsonFiles($folderPath) {
        $fileList = glob($folderPath . '/*.json');
        $jsonData = array();
    
        foreach ($fileList as $file) {
            if (is_file($file)) {
                $json = file_get_contents($file);
                $data = json_decode($json, true);
                if ($data) {
                    $jsonData[] = $data;
                }
            }
        }
    
        return $jsonData;
      }
    
      $folderPath = 'user/'; // 対象のフォルダのパスを指定してください
      $jsonData = readJsonFiles($folderPath);
      
      // リストとして表示
      echo '<ul>';
      foreach ($jsonData as $data) {
          echo '<li>';
          echo '<pre>' . print_r($data, true) . '</pre>';
          echo '</li>';
      }
      echo '</ul>';

    ?>



</body>
</html>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>mission_1-20</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="name" value="名前" required ><br>
            <input type="text" name="comment" value="コメント" required >
            <input type="submit" name="submit">
        </form><br>
        <form action="" method="post">
            <input type="text" name="delete_num" value="削除番号" >
            <input type="submit" name="submit" required>
        </form>
        <?php
            $filename="mission_3-1.txt";
            $lines = file($filename,FILE_IGNORE_NEW_LINES);
            $id = 0;
            foreach($lines as $index => $line){
                $id += 1;
            }
            
            if (isset($_POST["comment"])) {
                $name = $_POST["name"];
                $comment = $_POST["comment"];
                $day = date ( "Y年m月d日 H時i分s秒" );
                $fp = fopen($filename,"a");
                fwrite($fp, $id."<>".$name."<>".$comment."<>".$day.PHP_EOL);
                fclose($fp);
                echo $comment."を受け付けました"."<br>";
            } elseif (isset($_POST["delete_num"])) {
                $delete_num = $_POST["delete_num"];
                $fp = fopen($filename,"w");
                foreach($lines as $line) {
                    $array_line = explode('<>', $line);
                    // print_r($array_line[0]);
                    // echo "<br>";
                    if ($delete_num != $array_line[0]) {
                        fwrite($fp, $line.PHP_EOL);
                    }
                }
                fclose($fp);
                echo $delete_num."を削除しました"."<br>";
            }
            
            if(file_exists($filename)){
                $lines = file($filename,FILE_IGNORE_NEW_LINES);
                foreach($lines as $line){
                    $array_line = explode('<>', $line);
                    // echo $line . "<br>";
                    // print_r($array_line);
                    // echo "<br>";
                    foreach($array_line as $array) {
                        // print_r($array);
                        echo $array;
                    }
                echo "<br>";
                }
            }
        ?>
    </body>
</html>
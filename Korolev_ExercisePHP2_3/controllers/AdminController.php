<?php

require __DIR__ . '/../functions/file.php';

class AdminController
{
    public function actionAdd()
    {
        if (!empty($_POST)) {

            if (!empty($_POST['day_'])) {
                $day_ = $_POST['day_'];
            }

            if (!empty($_POST['month_'])) {
                $month_ = $_POST['month_'];
            }

            if (!empty($_POST['year_'])) {
                $year_ = $_POST['year_'];
            }

            $id = ($day_ + $month_ + $year_);

            if (!empty($_POST['heading'])) {
                $heading = $_POST['heading'];
            }

            if (!empty($_FILES)) {
                $res = File_upload('path');
                if (false !== $res) {
                    $path = $res;
                }
            }

            if (
                isset($day_)
                && isset($month_)
                && isset($year_)
                && isset($heading)
                && isset($path)
            ) {
                News::insert($id, $day_, $month_, $year_, $heading, $path);

                $_POST['ctrl'] = 'View';
                $_POST['act'] = 'Input';
                die;
            }
        }
    }
}

?>

<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<a href="index.php">На главную</a>
</body>
</html>
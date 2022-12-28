<?php

$con = mysqli_connect('DB_HOST', 'DB_USERNAME', 'DB_PASSWORD');
if (!$con) {
    exit('データベースに接続できませんでした。');
}

$result = mysqli_select_db($con, 'DB_DATABASE');
if (!$result) {
    exit('データベースを選択できませんでした。');
}

$result = mysqli_query($con, 'SET NAMES utf8');
if (!$result) {
    exit('文字コードを指定できませんでした。');
}

if ($_GET["date"]) {$date = $_GET["date"];}
else {$date = date("Y-m-d H:i:s");}

$result_list = mysqli_query($con, "SELECT * FROM bus".$_GET["num"]." WHERE sdate < '".$date."' ORDER BY sdate DESC");

$con = mysqli_close($con);
if (!$con) {
    exit('データベースとの接続を閉じられませんでした。');
}

$row_number = mysqli_num_rows($result_list);
$counter = $row_number +1;
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>データベース</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        <meta name="robots" content="noindex,nofollow">
        <link rel="icon" href="/icon/database.png">
        <link rel="stylesheet" href="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.css"/>
        <script src="https://cdn.datatables.net/t/bs-3.3.6/jqc-1.12.0,dt-1.10.11/datatables.min.js"></script>

        <style type="text/css">
            .container {
                width: 100%;
                max-width: 100%;
                margin: 0 auto;
                margin-top: 20px;
                margin-bottom: 30px;
            }
            #myTable tbody tr td {
                padding: 15px;
            }
            @media screen and (min-width: 767px) {
                .container {
                    width: 824px;
                    font-size: 150%;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            <table id="myTable" class="table table-bordered nowrap table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>bus_id</th>
                        <th>lat</th>
                        <th>lng</th>
                        <th>sdate</th>
                        <th>ps</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($result_list as $row):
                        $counter--;
                        if (($counter + 999) < $row_number) {break;}
                    ?>
                        <tr>
                            <td><?=$counter?></td>
                            <td><?=$row['bus_id']?></td>
                            <td><?=$row['lat']?></td>
                            <td><?=$row['lng']?></td>
                            <td><?=$row['sdate']?></td>
                            <td><?=$row['ps']?></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(() => {
                $("#myTable").DataTable({
                    language: {url: "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Japanese.json"},
                    order:[[0, "desc"]],
                    searching: false,
                    scrollX: true
                });
            });
        </script>
    </body>
</html>

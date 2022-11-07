<!DOCTYPE html>
<html>

<head>
    <title>Pos Malaysia Online Management</title>
</head>

<body>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "pos_malaysia");

    if (!$connect) {
        die('ERROR:' . mysqli_connect_error());
    }

    ?>
</body>

</html>
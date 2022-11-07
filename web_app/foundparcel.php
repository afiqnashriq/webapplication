<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http: //www.w3.org/TR/xhtm1l1/DTD/xhtml1-transitional.dtd">
<html xmlns="http: //www.w3.org/1999/xhtm1">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <?php include("header.php"); ?>

    <h2> Found Parcel </h2>
    <?php
    $y = $_POST['parcel'];
    $y = mysqli_real_escape_string($connect, $y);

    $q = "SELECT seller_id, name, phone_num, email, address, parcel FROM seller WHERE parcel='$y' ORDER BY seller_id";
    $result = @mysqli_query($connect, $q);

    if ($result) {
        echo '<table border="2" div align="center">
        <td><b>ID seller</b></td>
        <td><b>Name</b></td>
        <td><b>Telephone Number</b></td>
        <td><b>Email</b></td>
        <td><b>Address</b></td>
        <td><b>Parcel</b></td>
        </tr>';

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo '<tr>
            <td>' . $row['seller_id'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['phone_num'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['address'] . '</td>
            <td>' . $row['parcel'] . '</td>
        </tr>';
        }
        echo '
    </table>';
        mysqli_free_result($result);
    } else {
        echo '<p class="error">If no parcel is shown, this is because you had an incorrect or missing entry in search form.<br>Click the back button on the browser and try again.</p>';
        echo '<p>' . mysqli_error($connect) . '<br><br />Query:' . $q;
    }
    mysqli_close($connect);

    ?>
</body>

</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.@ Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http: //www.w3.org/1999/xhtm1">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pos Malaysia Online Management</title>
</head>

<body>
    <?php include("header.php"); ?>

    <form action="foundparcel.php" method="post">

        <div align="center">
            <h1> Track Parcel </h1>
            <p><label class="label" for="parcel">Parcel:</label><br>
                <input type="radio" id="1" name="parcel" value="1">
                <label for="1">1 KG</label><br>
                <input type="radio" id="5" name="parcel" value="5">
                <label for="5">5 KG</label><br>
                <input type="radio" id="10" name="parcel" value="10">
                <label for="10">10 KG</label><br>
                <?php if (isset($_POST['parcel'])) echo $_POST['parcel']; ?>
            </p>

            <p><input id="submit" type="submit" name="submit" value="search" /></p>
    </form>
</body>

</html>
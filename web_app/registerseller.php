<!DOCTYPE html>
<html>

<head>
    <title>Pos Malaysia Online Management</title>
</head>
<?php

include("header.php"); ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = array();

    if (empty($_POST['name'])) {
        $error[] = 'You forgot to enter your Name.';
    } else {
        $n = mysqli_real_escape_string($connect, trim($_POST['name']));
    }
    if (empty($_POST['phone_num'])) {
        $error[] = 'You forgot to enter your phone number.';
    } else {
        $i = mysqli_real_escape_string($connect, trim($_POST['phone_num']));
    }
    if (empty($_POST['email'])) {
        $error[] = 'You forgot to enter your Email.';
    } else {
        $e = mysqli_real_escape_string($connect, trim($_POST['email']));
    }
    if (empty($_POST['address'])) {
        $error[] = 'You forgot to enter your address.';
    } else {
        $d = mysqli_real_escape_string($connect, trim($_POST['address']));
    }
    if (empty($_POST['parcel'])) {
        $error[] = 'You forgot to enter your parcel.';
    } else {
        $y = mysqli_real_escape_string($connect, trim($_POST['parcel']));
    }

    $q = "Insert INTO seller (seller_id, name, phone_num, email, address, parcel) VALUES ('', '$n', '$i', '$e', '$d', '$y')";
    $result = @mysqli_query($connect, $q);
    if ($result) {
        echo '<h1>Thank you for registered.</h1>';
        exit();
    } else {
        echo '<h1>System error</h1>';
        echo '<p>' . mysqli_error($connect) . '<br><br>Query: ' . $q . '<p>';
    }
    mysqli_close($connect);
    exit();
}
?>
</p>
<h2> Register Seller</h2>
<h4>* required field</h4>
<form action="registerseller.php" method="post">

    <p><label class="label" for="name">Name: *</label>
        <input id="name" type="text" name="name" size="30" maxlength="150" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" />
    </p>

    <p><label class="label" for="phone_num">No phone: *</label>
        <input id="phone_num" type="tel" name="phone_num" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{7}" value="<?php if (isset($_POST['phone_num'])) echo $_POST['phone_num']; ?>" />
    </p>

    <p><label class="label" for="email">Email: *</label>
        <input id="email" type="text" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" />
    </p>

    <p><label class="label" for="address">Address: *</label></p>
    <textarea name="address" rows="5" cols="40"><?php if (isset($_POST['address'])) echo $_POST['address']; ?></textarea>

    <p><label class="label" for="parcel">Parcel: *</label></p>
    <input type="radio" id="1" name="parcel" value="1">
    <label for="1">1 KG</label><br>
    <input type="radio" id="5" name="parcel" value="5">
    <label for="5">5 KG</label><br>
    <input type="radio" id="10" name="parcel" value="10">
    <label for="10">10 KG</label><br>
    <?php if (isset($_POST['parcel'])) echo $_POST['parcel']; ?></p>

    <p><input type="submit" name="submit" value="Register" /> &nbsp;&nbsp;
        <input id="reset" type="reset" value="Clear All" />
        <hr>
    </p>
</form>
</body>

</html>
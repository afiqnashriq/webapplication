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
        $l = mysqli_real_escape_string($connect, trim($_POST['phone_num']));
    }
    if (empty($_POST['address'])) {
        $error[] = 'You forgot to enter your address.';
    } else {
        $d = mysqli_real_escape_string($connect, trim($_POST['address']));
    }
    if (empty($_POST['password'])) {
        $error[] = 'You forgot to enter your password.';
    } else {
        $p = mysqli_real_escape_string($connect, trim($_POST['password']));
    }
    $q = "Insert INTO admin (admin_id, name, phone_num, address, password) VALUES ('', '$n', '$l', '$d', '$p')";
    $result = @mysqli_query($connect, $q);
    if ($result) {
        echo '<h1>Thank you</h1>';
        exit();
    } else {
        echo '<h1>System error</h1>';
        echo '<p>' . mysqli_error($connect) . '<br><br>Query: ' . $q . '<p>';
    }
    mysqli_close($connect);
    exit();
}
?>

<h2> Sign Up Admin</h2>
<h4> * required field </h4>
<form action="registeradmin.php" method="post">


    <p><label class="label" for="name">Name: *</label>
        <input id="name" type="text" name="name" size="30" maxlength="150" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" />
    </p>

    <p><label class="label" for="phone_num">Phone Number: *</label>
        <input id="phone_num" type="tel" name="phone_num" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{7}" value="<?php if (isset($_POST['phone_num'])) echo $_POST['phone_num']; ?>" />
    </p>
    <small style="color: red;">Format:012-3456789</small><br>

    <p><label class="label" for="address">Address: *</label></p>
    <textarea name="address" rows="5" cols="40"><?php if (isset($_POST['address'])) echo $_POST['address']; ?></textarea>

    <p><label class="label" for="password">Password: *</label>
        <input id="password" type="password" name="password" size="12" maxlength="12" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" />
    </p>

    <p><input type="submit" name="submit" value="Register" /> &nbsp;&nbsp;
        <input id="reset" type="reset" value="Clear All" />
        <hr>
    </p>
</form>
<p>
    <br />
    <br />
    </body>

</html>
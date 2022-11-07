<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.6 Transitional//EN" "http: //www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http: //www.w3.org/1999/xhtm1">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pos Malaysia Online Management</title>
</head>

<body>

    <?php include("header.php"); ?>

    <h2> Edit a record </h2>

    <?php
    //look for a valid user id, either through GET or POST
    if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
        $id = $_GET['id'];
    } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
        $id = $_POST['id'];
    } else {
        echo '<p class ="error">This page has been accessed in error.</p>';
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $error = array();

        //check for name
        if (empty($_POST['name'])) {
            $error[] = 'You forgot to enter your Name.';
        } else {
            $n = mysqli_real_escape_string($connect, trim($_POST['name']));
        }


        //check for phone number
        if (empty($_POST['phone_num'])) {
            $error[] = 'You forgot to enter your telephone number.';
        } else {
            $i = mysqli_real_escape_string($connect, trim($_POST['phone_num']));
        }
        if (empty($_POST['email'])) {
            $error[] = 'You forgot to enter your Email.';
        } else {
            $e = mysqli_real_escape_string($connect, trim($_POST['email']));
        }

        //check for address
        if (empty($_POST['address'])) {
            $error[] = 'You forgot to enter your address.';
        } else {
            $d = mysqli_real_escape_string($connect, trim($_POST['address']));
        }

        //check for activity
        if (empty($_POST['parcel'])) {
            $error[] = 'You forgot to enter your parcel.';
        } else {
            $y = mysqli_real_escape_string($connect, trim($_POST['parcel']));
        }

        //if problem occured
        if (empty($error)) {

            $q = "SELECT seller_id FROM seller WHERE parcel = '$y' AND seller_id != $id";

            $result = @mysqli_query($connect, $q);

            if (mysqli_num_rows($result) == 0) {
                $q = "UPDATE seller SET name='$n', phone_num='$i', email='$e', address='$d', parcel='$y' WHERE seller_id='$id' LIMIT 1";

                $result = @mysqli_query($connect, $q);

                if (mysqli_affected_rows($connect) == 1) {
                    echo '<h3>The seller has been edited</h3>';
                } else {
                    echo '<p class="error">The seller has not been edited due to the system error. We apologize for any convenience.</p>';
                    echo '<p>' . mysqli_error($connect) . '<br/> query:' . $q . '</p>';
                }
            } else {
                echo '<p class="error">The seller has already been registered</p>';
            }
        } else {
            echo '<p class="error"> The following error (s) occurred: <br/>';

            foreach ($error as $msg) {
                echo " -$msg<br/> \n";
            }

            echo '</p><p>Please try again.</p>';
        }
    }

    $q = "SELECT name, phone_num, email, address, parcel FROM seller WHERE seller_id=$id";
    $result = @mysqli_query($connect, $q);

    if (mysqli_num_rows($result) == 1) {
        //get seller information
        $row = mysqli_fetch_array($result, MYSQLI_NUM);

        //creat the form
        echo '<form action ="editparcel.php" method="post">

		<p><lable class="lable" for="name"> Name: </lable>
		<input id ="name" type="text" name="name" size="30" maxlength="30" value="' . $row[0] . '"></p>

		<p><lable class=lable for="phone_num"> Telephone Number: </lable>
		<input id="phone_num" type="text" name="phone_num" size="30" maxlength="30" value="' . $row[1] . '"></p>

		<p><lable class="lable for="email"> Email: </lable>
		<input id="email" type="text" name="email" size="30" maxlength="30" value="' . $row[1] . '"></p>

		<p><br><lable class="lable" for="address"> Address: </lable>
		<textarea name="address" rows="5" cols="40">' . $row[3] . '</textarea></p>

		<p><br><lable class="lable" for="parcel"> Parcel: </lable>
		<textarea name="parcel" row="5" cols="40">' . $row[4] . '</textarea></p>

		<br><p><input id="submit" type="submit" name="submit" value="Edit"></p>

		<br><input type="hidden" name="id" value="' . $id . '"/>


</form>';
    } else {
        echo '<p class="error"> This page has been acessed in error.</p>';
    }

    mysqli_close($connect);

    ?>
</body>

</html>
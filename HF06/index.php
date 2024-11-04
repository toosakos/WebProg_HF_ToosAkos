<?php
$firstname = '';
$lastname = '';
$email = '';
$attend = '';
$tshirt = '';
$complete = false;
if (isset($_POST['submit'])) {
    $tshirt = $_POST['tshirt'];

    if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email'])) {
        echo "Complete all fields!<br>";
    } else {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = htmlspecialchars($_POST['email']);
        $complete = true;
    } if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        echo "Invalid email address!<br>";
        $complete = false;
    }

    if (!isset($_POST['terms'])) {
        echo "You must accept the terms and conditions!<br>";
        $complete = false;
    }

    if (empty($_POST['attend'])) {
        echo "You must choose where you want to attend!<br>";
        $complete = false;
    } else {
        $attend = $_POST['attend'];
        $complete = true;
    }

    if (empty($_FILES['abstract'])) {
        echo "You must upload the abstract!<br>";
        $complete = false;
    } else {
        if ($_FILES['abstract']['type'] != 'application/pdf'){
            echo "Please upload a PDF file!<br>";
            $complete = false;
        } else {
            $filename = $_FILES['abstract']['name'];
            $complete = true;
        }
    }


}
?>
<head>
    <title>Online conference registration</title>
</head>

<h3>Online conference registration</h3>

<form method="post" action="" enctype="multipart/form-data">
    <label for="fname"> First name:
        <input type="text" name="firstname" value="<?php echo $firstname; ?>">
    </label>
    <br><br>
    <label for="lname"> Last name:
        <input type="text" name="lastname" value="<?php echo $lastname; ?>">
    </label>
    <br><br>
    <label for="email"> E-mail:
        <input type="text" name="email" value="<?php echo $email; ?>">
    </label>
    <br><br>
    <label for="attend"> I will attend:<br>
        <input type="checkbox" name="attend[]" value="Event1">Event1<br>
        <input type="checkbox" name="attend[]" value="Event2">Event2<br>
        <input type="checkbox" name="attend[]" value="Event3">Event3<br>
        <input type="checkbox" name="attend[]" value="Event4">Event4<br>
    </label>
    <br><br>
    <label for="tshirt"> What's your T-Shirt size?<br>
        <select name="tshirt">
            <option value="P">Please select</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
    </label>
    <br><br>
    <label for="abstract"> Upload your abstract<br>
        <input type="file" name="abstract"/>
    </label>
    <br><br>
    <input type="checkbox" name="terms" value="">I agree to terms & conditions.<br>
    <br><br>
    <input type="submit" name="submit" value="Send registration"/>
</form>

    <h1>Your choices:</h1>


<?php
if ($complete) {
    echo "Name: $firstname $lastname";
    echo "<br>";
    echo "Email: $email";
    echo "<br>";
    echo "Events: ";
    echo "<br>";
    foreach ($attend as $event) {
        echo "$event<br>";
    }
    echo "Uploaded File: $filename<br>";

}

<?php

function isValidDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

$name = "";
$email = "";
$password = "";
$confirm_password = "";
$birthdate = "";
$completed = true;

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) ||
        empty($_POST['confirm-password']) || empty($_POST['birthdate'])) {
        echo "Please fill in all the fields<br>";
        $completed = false;
    } else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm-password'];
        $birthdate = $_POST['birthdate'];
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter a valid email address<br>";
        $completed = false;
    }

    if (!isValidDate($birthdate, 'Y-m-d')) {
        echo "Please enter a valid birthdate(yyyy-mm-dd)<br>";
        $completed = false;
    }

    if ($confirm_password !== $password) {
        echo "Passwords do not match<br>";
        $completed = false;
    } elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        echo "Password must contain at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long.<br>";
        $completed = false;
    }

    $gender = $_POST['gender'] ?? "";
    $interests = $_POST['interests'] ?? [];
    $country = $_POST['country'] ?? "";

}



?>
    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Regisztrációs űrlap</title>
    </head>
    <body>

    <h2>Regisztrációs űrlap</h2>

    <form method="post">
        <!-- Név -->
        <label for="name">Név:</label>
        <input type="text" id="name" name="name" value="<?php echo "$name" ?>"><br><br>

        <!-- E-mail cím -->
        <label for="email">E-mail cím:</label>
        <input type="text" id="email" name="email" value="<?php echo "$email" ?>"><br><br>

        <!-- Jelszó -->
        <label for="password">Jelszó:</label>
        <input type="text" id="password" name="password" value="<?php echo "$password" ?>"><br><br>

        <!-- Jelszó megerősítése -->
        <label for="confirm-password">Jelszó megerősítése:</label>
        <input type="text" id="confirm-password" name="confirm-password"
               value="<?php echo "$confirm_password" ?>"><br><br>

        <!-- Születési dátum -->
        <label for="birthdate">Születési dátum:</label>
        <input type="text" id="birthdate" name="birthdate" value="<?php echo "$birthdate" ?>"><br><br>

        <!-- Nem -->
        <label>Nem:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Férfi</label><br>

        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Nő</label><br>

        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Egyéb</label><br><br>

        <!-- Érdeklődési területek -->
        <label>Érdeklődési területek:</label><br>
        <input type="checkbox" id="sports" name="interests[]" value="sports">
        <label for="sports">Sport</label><br>

        <input type="checkbox" id="arts" name="interests[]" value="arts">
        <label for="arts">Művészet</label><br>

        <input type="checkbox" id="science" name="interests[]" value="science">
        <label for="science">Tudomány</label><br><br>

        <!-- Ország -->
        <label for="country">Ország:</label>
        <select id="country" name="country" >
            <option value="">Válassz egy országot</option>
            <option value="hungary">Magyarország</option>
            <option value="germany">Németország</option>
            <option value="france">Franciaország</option>
            <option value="usa">Amerikai Egyesült Államok</option>
        </select><br><br>

        <!-- Küldés gomb -->
        <input type="submit" name="submit" value="Regisztráció Küldése"/>
    </form>

    </body>
    </html>

<?php
if ($completed && isset($_POST['submit'])) {
    print "<h1>Infód: </h1>";
    echo "Név: $name<br>";
    echo "Email: $email<br>";
    echo "Jelszó: $password<br>";
    echo "Születési dátum: $birthdate<br>";
    echo "Nem: ";
    if ($gender == "") {
        echo "Nem választott<br>";
    } else {
        switch ($gender) {
            case "male":
                echo "Férfi<br>";
                break;
            case "female":
                echo "Nő<br>";
                break;
            case "other":
                echo "Egyébb<br>";
                break;
        }
    }
    echo "Érdeklődések: <br>";
    foreach ($interests as $interest) {
        echo $interest . "<br>";
    }
    echo "Ország: $country <br>";
}
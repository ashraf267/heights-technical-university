<?php declare(strict_types=1);
    // php code here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c84a86a0b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form-styles.css">
    <title>Register | HTU</title>
</head>
<body>
    <div class="header">
        <h1>UG-Admissions portal</h1>
        <a href="../index.php"><i class="fa-solid fa-house"></i></a>
    </div>
    <!-- register form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="reg-form" method="POST">
        <fieldset>
            <legend>Create new account here</legend>
            <label for="fname">Firstname: <span class="req">*</span></label> <!-- do not forget to style this -->
            <input type="text" name="fname" id="fname" class="fields" required>
            <label for="lname">Lastname: <span class="req">*</span></label>
            <input type="text" name="lname" id="lname" class="fields" required>
            <label for="uname">Username: <span class="req">*</span></label>
            <input type="text" name="uname" id="uname" class="fields" required>
            <label for="email">Email: <span class="req">*</span></label>
            <input type="email" name="email" id="email" class="fields" required>
            <label for="psw">Password: <span class="req">*</span></label>
            <input type="password" name="psw" id="psw" class="fields" required>
        </fieldset>
    </form>
    <button type="submit" form="reg-form" class="submit-btn">register <i class="fa-solid fa-arrow-right"></i></button>
</body>
</html>
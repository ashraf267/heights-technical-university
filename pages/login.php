<?php declare(strict_types=1);

// php code here

// check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // start session
    session_start();

    $_SESSION['uname'] = $_POST['uname'];
    $username = $_SESSION['uname'];
    $password = $_POST['psw'];

    // call findApplicant function here
    findApplicant($username, $password);

    // echo $username . "\n" . $password;
}

function findApplicant(string $user_name, string $pass_word, array $isFound = array(false, false)) {
    // connect to db
    include('../connect-db.php');

    // construct query
    $sql = 'SELECT id, username, pass_word FROM applicants ORDER BY created_at';

    // make query
    $result = mysqli_query($conn, $sql);

    // fetch result as assoc. array
    $applicants = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // run the check
    foreach($applicants as $applicant) {
        // each child array is an applicant
        // first, find username
        if ($applicant['username'] === $user_name) {
            // username found
            $isFound[0] = true;

            // then find password
            if ($applicant['pass_word'] === $pass_word) {
                // password found
                $isFound[(count($isFound)) - 1] = true;
            }
        }
    }

    // found or not
    function redirect() {
        header('Location: admissions-form.php');
    }

    function errorMsg() {
        echo "<script>window.alert('Incorrect username/password')</script>";
    }

    ($isFound[0] == true && $isFound[(count($isFound)) - 1] == true) ? redirect() : errorMsg();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c84a86a0b9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="form-styles.css">
    <title>Login | HTU</title>
</head>
<body>
    <div class="header">
        <h1>UG-Admissions portal</h1>
        <a href="../index.php"><i class="fa-solid fa-house"></i></a>
    </div>
    <!-- login form -->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" id="login-form" method="POST">
        <fieldset>
            <legend>Login if you already have an account</legend>
            <!-- front-end form validation -->
            <label for="uname">Username: <span class="req">*</span></label>
            <input type="text" name="uname" id="uname" class="fields" required>
            <label for="psw">Password: <span class="req">*</span></label>
            <input type="password" name="psw" id="psw" class="fields" required>
        </fieldset>
    </form>
    <button type="submit" form="login-form" class="submit-btn">login <i class="fa-solid fa-arrow-right"></i></button>
    <!-- or create an account link -->
    <a href="register.php" id="or-link">Or create a new account here</a>
</body>
</html>
<?php declare(strict_types=1);

// php code here

// check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $_SESSION['uname'] = $_POST['uname'];
    $username = $_SESSION['uname'];
    $password = $_POST['password'];

    // call findApplicant function here
    findApplicant($username, $password);
}

// user authentication
function findApplicant(string $user_name, string $pass_word, array $isFound = array(false, false)) {
    // connect to db
    include('../connect-db.php');

    // construct query
    $sql = 'SELECT id, username, password FROM applicants ORDER BY created_at';

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
            if ($applicant['password'] === $pass_word) {
                // password found
                $isFound[(count($isFound)) - 1] = true;
            }
        }
    }

    // found or not
    // REDIRECT!
    function redirect() {
        header('Location: admissions-form.php');
    }

    // WINDOW.ALERT() built-in DOM function
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c84a86a0b9.js" crossorigin="anonymous"></script>
    <title>Login | HeightsTU</title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: rgba(246, 241, 233, 0.5);
        }

        header {
            text-align: center;
            margin: 20px 0 40px;
        }

        header h1 {
            font-size: 32px;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
            text-transform: capitalize;
            margin: 5px 0;
        }

        header p {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            font-size: 18px;
        }

        header a {
            display: block;
            text-transform: uppercase;
            text-decoration: none;
            color: #42210b;
            font-size: 50px;
            font-weight: 700;
            font-family: 'Play', sans-serif;
            margin: 10px 0;
        }

        /* login form */
        #login-form {
            background-color: white;
            width: 50%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 25px 50px;
        }

        #login-form > div {
            margin: 5px 0 10px;
        }

        #login-form > div > label {
            display: block;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 15px;
            margin: 5px 0;
            padding: 5px 0;
            color: #42210b;
        }

        #login-form > div > label > span {
            color: red;
        }

        .fields {
            display: block;
            font-size: 17px;
            padding: 10px 5px;
            font-weight: 400;
            font-family: 'Ubuntu', sans-serif;
            border: 2px solid #F6F1E9;
            outline: none;
            width: 100%;
        }

        .sbm-btn {
            background-color: #42210b;
            color: white;
            border: none;
            font-size: 20px;
            font-weight: 400;
            font-family: 'Play', sans-serif;
            width: 100%;
            padding: 7px;
            text-transform: capitalize;
            margin: 25px 0 5px;
        }

        #login-form > small {
            margin: 10px 0 5px;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
        }

        #login-form > small > a {
            text-transform: capitalize;
            text-decoration: none;
            margin: 0 5px;
            font-size: 15px;
            color: #DF2E38;
        }
    </style>
</head>
<body>
    <header>
        <a href="../index.php">heightstu</a>
        <h1>Welcome back!</h1>
        <p>Login to your account</p>
    </header>
    <form id="login-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div>
            <label for="uname">username<span>*</span></label>
            <!-- form validation using the HTML required attr & correct input type -->
            <input class="fields" type="text" name="uname" id="uname" required>
        </div>
        <div>
            <label for="psw">password<span>*</span></label>
            <input class="fields" type="password" name="password" id="password" required>
        </div>
        <input class="sbm-btn" type="submit" name="submit" value="login">

        <small>Don't have an account? <a href="register.php">register</a></small>
    </form>
</body>
</html>
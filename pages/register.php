<?php declare(strict_types=1);
    // php code here

    // check if form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // form was submitted

        // connect to db
        include('../connect-db.php');

        // get and protect values the mysqli way
        $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // construct query
        $sql = "INSERT INTO applicants(firstname, lastname, username, email, password) VALUES('$firstname', '$lastname', '$username', '$email', '$password')";

        // make query and check for errors
        if (mysqli_query($conn, $sql)) {
            // success
            // echo "Query successful!";
        } else {
            // failed
            echo "Query error: " . mysqli_error($conn);
        }
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
    <title>Register | HeightsTU</title>
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
        #register-form {
            background-color: white;
            width: 50%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 25px 50px;
        }

        #register-form > div {
            margin: 5px 0 10px;
        }

        #register-form > div > label {
            display: block;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 15px;
            margin: 5px 0;
            padding: 5px 0;
            color: #42210b;
        }

        #register-form > div > label > span {
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
            background-color: #68B984;
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

        #register-form > small {
            margin: 10px 0 5px;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 500;
        }

        #register-form > small > a {
            color: red;
            text-transform: capitalize;
            text-decoration: none;
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <header>
        <a href="../index.php">heightstu</a>
        <h1>Admissions</h1>
        <p>Register your account</p>
    </header>
    <form id="register-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div>
            <label for="fname">firstname<span>*</span></label>
            <input class="fields" type="text" name="fname" id="fname" required>
        </div>
        <div>
            <label for="lname">lastname<span>*</span></label>
            <input class="fields" type="text" name="lname" id="lname" required>
        </div>
        <div>
            <label for="username">username<span>*</span></label>
            <input class="fields" type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="email">email<span>*</span></label>
            <input class="fields" type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">password<span>*</span></label>
            <input class="fields" type="password" name="password" id="password" required>
        </div>
        <input class="sbm-btn" type="submit" name="submit" value="register">
    </form>
</body>
</html>
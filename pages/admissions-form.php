<?php
    // php code here

    // greet user with js alert

    // session
    session_start();
    $username = $_SESSION['uname'];

    echo "<script>window.alert('Welcome, $username')</script>";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // form submitted

        // connect to db
        include('../connect-db.php');

        // get and protect values the mysqli
        $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
        $midname = mysqli_real_escape_string($conn, $_POST['middlename']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $addr_str = mysqli_real_escape_string($conn, $_POST['addr-str']);
        $addr_city = mysqli_real_escape_string($conn, $_POST['addr-city']);
        $addr_state = mysqli_real_escape_string($conn, $_POST['addr-state']);
        $country = mysqli_real_escape_string($conn, $_POST['addr-country']);
        $start_yr = mysqli_real_escape_string($conn, $_POST['start-year']);
        $applicant_type = mysqli_real_escape_string($conn, $_POST['student-type']);
        $course = mysqli_real_escape_string($conn, $_POST['course-to-study']);
        // ...

        // construct query
        $sql = "INSERT INTO adm_applications(firstname, middlename, lastname, birthdate, email, phone_no, str_addr, city_addr, state_addr, country, start_yr, applicant_type, course) VALUES('$firstname', '$midname', '$lastname', '$dob', '$email', '$phone', '$addr_str', '$addr_city', '$addr_state', '$country', '$start_yr', '$applicant_type', '$course')";

        // make query and check for errors
        if (mysqli_query($conn, $sql)) {
            // success

            // redirect to admissions page
            redirect();
        } else {
            // failed
            echo "Query error: " . mysqli_error($conn) . "\n";
        }
    }

    // function
    function redirect() {
        header('Location: ../index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Admissions Form | HTU</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c84a86a0b9.js" crossorigin="anonymous"></script>
        <title>Admission Form | HeightsTU</title>
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

        /* admissions form */
        #adm-form {
            background-color: white;
            width: 50%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding: 25px 50px;
        }

        #adm-form > div {
            margin: 5px 0 10px;
        }

        #adm-form > fieldset {
            margin: 5px 0 10px;
            border: 2px solid #F6F1E9;
            border-radius: 5px;
            padding: 2px 8px;
        }

        #adm-form > fieldset > legend {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 16px;
            padding: 0 5px;
            color: #42210b;
        }

        #adm-form > fieldset > legend > span {
            color: red;
        }

        /*
        #adm-form > div > label {
            display: block;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            text-transform: capitalize;
            font-size: 15px;
            margin: 5px 0;
            padding: 5px 0;
            color: #42210b;
        }

        #adm-form > div > label > span {
            color: red;
        }
        */

        .fields {
            display: block;
            font-size: 14px;
            /* padding: 10px 5px; */
            padding: 3px 2px;
            font-weight: 400;
            font-family: 'Ubuntu', sans-serif;
            /* border: 2px solid #F6F1E9; */
            border: none;
            outline: none;
            width: 100%;
        }

        .border-bottom {
            outline: none;
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            font-size: 14px;
            padding: 3px 2px;
            width: 15%;
            border-top: none;
            border-right: none;
            border-bottom: 1px solid #DBE4C6;
            border-left: none;
            margin: 5px 5px;
            text-transform: capitalize;
        }

        #adm-form > fieldset:nth-child(9) {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        #adm-form > fieldset:nth-child(9) > select {
            width: 30%;
            color: grey;
            margin: 4px 6px;
        }

        #note {
            padding: 5px 10px;
        }
        
        #note > p {
            font-family: 'Ubuntu', sans-serif;
            font-weight: 400;
            font-size: 15px;
            color: grey;
        }
        
        #note > p > span {
            color: red;
        }

        .sbm-btn {
            background-color: #68B984;
            color: white;
            border: none;
            font-size: 25px;
            font-weight: 400;
            font-family: 'Play', sans-serif;
            width: 100%;
            padding: 7px;
            text-transform: capitalize;
            margin: 25px 0 5px;
        }
        </style>
    </head>
    <body>
        <header>
        <a href="../index.php">heightstu</a>
        <h1>Application form</h1>
        <p>Fill in your details below</p>
    </header>
    <form id="adm-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <fieldset>
            <legend>firstname<span>*</span></legend>
            <input class="fields" type="text" name="fname" id="fname" required>
        </fieldset>
        <fieldset>
            <legend>middlename</legend>
            <input class="fields" type="text" name="mname" id="mname">
        </fieldset>
        <fieldset>
            <legend>lastname<span>*</span></legend>
            <input class="fields" type="text" name="lname" id="lname" required>
        </fieldset>
        <fieldset>
            <legend>username<span>*</span></legend>
            <input class="fields" type="text" name="username" id="username" required>
        </fieldset>
        <fieldset>
            <legend>email<span>*</span></legend>
            <input class="fields" type="email" name="email" id="email" required>
        </fieldset>
        <fieldset>
            <legend>birthdate</legend>
            <input class="fields" type="date" name="dob" id="dob" required>
        </fieldset>
        <fieldset>
            <legend>phone-no</legend>
            <input class="fields" type="tel" name="phone" id="phone" placeholder="0913-459-6317" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}">
        </fieldset>
        <fieldset style="display: flex; flex-direction: row; justify-content: space-around;">
            <legend>address</legend>
            <input class="border-bottom" style="flex-grow: 2;" type="text" name="addr-str" id="addr-str" placeholder="street" required>
            <input class="border-bottom" type="text" name="addr-city" id="addr-city" placeholder="city" required>
            <input class="border-bottom" type="text" name="addr-state" id="addr-state" placeholder="state" required>
            <input class="border-bottom" type="text" name="addr-country" id="addr-country" placeholder="country" required>
        </fieldset>
        <fieldset>
            <legend>academic plan</legend>
            <select class="border-bottom" name="start-year" id="start-year" required>
                <option value="">start year?</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
            <select class="border-bottom" name="student-type" id="student-type" required>
                <option value="">student type?</option>
                <option value="first-year">first-year</option>
                <option value="transfer">transfer</option>
            </select>
            <select class="border-bottom" name="course-to-study" id="" required>
                <option value="">preferred course?</option>
                <option value="CSC">computer science</option>
                <option value="CVENG">civil engineering</option>
                <option value="MECHENG">mechanical engineering</option>
                <option value="CENG">computer engineering</option>
            </select>
        </fieldset>
        <div id="note">
            <p>
                <span>** </span>Note: your original WAEC certificate, High-school transcripts (SS1-3), JAMB results, and other relevant documents should be attached and sent separately to our Admission team's email: <em>ugadmissions@htu.edu.ng</em> (using the tag "Supporting Documents: ", your full-name and intended course of study as subject)
            </p>
        </div>
        <!-- submit button -->
        <input class="sbm-btn" type="submit" name="submit" value="submit">
    </form>
    </body>
</html>
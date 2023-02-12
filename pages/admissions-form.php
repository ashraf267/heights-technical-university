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
        $midname = mysqli_real_escape_string($conn, $_POST['midname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $addr_str = mysqli_real_escape_string($conn, $_POST['addr-str']);
        $addr_city = mysqli_real_escape_string($conn, $_POST['addr-city']);
        $addr_state = mysqli_real_escape_string($conn, $_POST['addr-state']);
        $country = mysqli_real_escape_string($conn, $_POST['addr-country']);
        $start_year = mysqli_real_escape_string($conn, $_POST['start-year']);
        $applicant_type = mysqli_real_escape_string($conn, $_POST['student-type']);
        $course = mysqli_real_escape_string($conn, $_POST['course-to-study']);
        // ...

        // construct query
        $sql = "INSERT INTO adm_applications(firstname, middlename, lastname, birthdate, email, phone_no, str_addr, city_addr, state_addr, country, start_year, applicant_type, course) VALUES('$firstname', '$midname', '$lastname', '$dob', '$email', '$phone', '$addr_str', '$addr_city', '$addr_state', '$country', '$start_year', '$applicant_type', '$course')";

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
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c84a86a0b9.js" crossorigin="anonymous"></script>
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            .header {
                background-color: #42210b;
            }

            .header h1 {
                border: 1px solid black;
                text-align: center;
                font-size: 18px;
                color: #f7921e;
                padding: 7px 8px;
                text-transform: uppercase;
                font-family: 'Montserrat', sans-serif;
            }

            #sub-header {
                border: 1px solid black;
                margin: 20px 5px;
                padding: 5px;
                font-family: 'Montserrat', sans-serif;
            }

            form {
                margin: 0 5px;
                padding: 5px;
                border: 1px solid black;
            }

            .sub-header {
                margin: 20px 0 5px;
                background-color: grey;
                padding: 4px 1px;
            }

            .sub-header h2 {
                font-size: 16px;
                font-family: 'Montserrat', sans-serif;
                text-align: center;
                text-transform: capitalize;
            }

            label {
                display: block;
                font-family: 'Montserrat', sans-serif;
                text-transform: capitalize;
            }

            .req {
                color: red;
                padding: 0 1px;
                text-align: center;
            }

            .fields {
                font-family: 'Montserrat', sans-serif;
                padding: 5px 1px;
                margin: 3px 1px;
            }

            #note {
                border: 1px solid red;
                font-family: 'Montserrat', sans-serif;
                padding: 2px 3px;
                font-style: italic;
                margin: 9px 1px;
            }

            .center-box {
                width: 50%;
                margin: 5px auto;
                text-align: center;
            }

            .submit-btn {
                border: 1px solid black;
                margin: 5px 10px;
                font-size: 17px;
                padding: 5px 3px;
                background-color: transparent;
                font-family: 'Montserrat', sans-serif;
                text-transform: capitalize;
            }

            .submit-btn i {
                border: 1px solid red;
                margin-left: 2px;
                padding: 2px 1px;
            }
        </style>
    </head>
    <body>
        <!-- form for new undergraduate students -->
        <div class="header">
            <h1>Heights technical university</h1>
        </div>
        <div id="sub-header">
            <p>Hello, prospective undergraduate student! We are excited that you are interested
                in applying to our reputable Heights Technical University, Ilorin, Kwara, Nigeria.
                Please, to the best of your knowledge, complete and submit the form below.
                We sincerely look forward to your applications and ultimately holding your hands throughout
                your next academic journey.
            </p>
        </div>
        <!-- form starts here -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="adms-form" method="POST">
            <label for="fname">First name <span class="req">*</span></label>
            <input class="fields" type="text" id="fname" name="fname" required>
            <label for="midname">Middle name</label>
            <input type="text" name="midname" id="midname" class="fields" required>
            <label for="lname">Last name <span class="req">*</span></label>
            <input class="fields" type="text" id="lname" name="lname" required>
            <label for="dob">Birthdate <span class="req">*</span></label>
            <input class="fields" type="date" id="dob" name="dob" required>
            <div class="sub-header">
                <h2>Contact information</h2>
            </div>
            <label for="email">Email <span class="req">*</span></label>
            <input class="fields" type="email" id="email" name="email" required>
            <label for="phone">Phone Number <span class="req">*</span></label>
            <input class="fields" type="tel" id="phone" name="phone" placeholder="0913-459-6317" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}">
            <label>Address <span class="req">*</span></label>
            <input class="fields" type="text" id="addr-str" name="addr-str" placeholder="Street address" required>
            <input class="fields" type="text" id="addr-city" name="addr-city" placeholder="City" required>
            <input class="fields" type="text" id="addr-state" name="addr-state" placeholder="State" required>
            <input class="fields" type="text" id="addr-country" name="addr-country" placeholder="Country" required>
            <div class="sub-header">
                <h2>Academic plan</h2>
            </div>
            <label for="start-year">Program start year? <span class="req">*</span></label>
            <select class="fields" id="start-year" name="start-year" required>
                <option value=""></option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
            <label for="student-type">I will be a? <span class="req">*</span></label>
            <select class="fields" id="student-type" name="student-type" required>
                <option value=""></option>
                <option value="first-year student">First-year Student</option>
                <option value="transfer student">Transfer Student</option>
            </select>
            <label for="course-to-study">Intended course of study? <span class="req">*</span></label>
            <select class="fields" id="course-to-study" name="course-to-study" required>
                <option value=""></option>
                <option value="computer sci">Computer Science</option>
                <option value="software eng">Software Engineering</option>
                <option value="civil eng">Civil Engineering</option>
                <option value="elect elect eng">Electrical & Electronics Engineering</option>
                <option value="material eng">Material Engineering</option>
                <option value="telecomm sci">Telecommunication Science</option>
            </select>
            <hr style="margin: 10px 0;">
            <div id="note">
                <p>Note: your original WAEC certificate, High-school transcripts (SS1-3), 
                    JAMB results, and other relevant documents should be attached and sent separately
                    to our Admission team's email: <strong>prospectiveugstudents@htu.edu.ng</strong> (using the tag "Supporting Documents: ", your full-name and intended course of study as subject)
                </p>
            </div>
        </form>
        <div class="center-box">
            <button type="submit" onclick="window.alert('Form submitted successfully!')" form="adms-form" class="submit-btn">submit <i class="fa-solid fa-check"></i></button:type>
        </div>
    </body>
</html>
<?php
    // php code here

    // start session
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
                color: #42210b;
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

            #note {
                border: 1px solid red;
                font-family: 'Montserrat', sans-serif;
                padding: 2px 3px;
                font-style: italic;
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
                in applying to our reputable GroupHeights Technical University, Ilorin, Kwara, Nigeria.
                Please, to the best of your knowledge, complete and submit the form below.
                We sincerely look forward to your applications and ultimately holding your hands throughout
                your next academic journey.
            </p>
        </div>
        <!-- form starts here -->
        <form>
            <label for="fname">First name <span class="req">*</span></label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last name <span class="req">*</span></label>
            <input type="text" id="lname" name="lname" required>
            <label for="">Birthdate <span class="req">*</span></label>
            <input type="date" id="dob" name="dob" required>
            <div class="sub-header">
                <h2>Contact information</h2>
            </div>
            <label for="email">Email <span class="req">*</span></label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone Number <span class="req">*</span></label>
            <input type="tel" id="phone" name="phone" placeholder="0913-459-6317" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}">
            <label>Address <span class="req">*</span></label>
            <input type="text" id="addr-str" name="addr-str" placeholder="Street address" required>
            <input type="text" id="addr-city" name="addr-city" placeholder="City" required>
            <input type="text" id="addr-state" name="addr-state" placeholder="State" required>
            <input type="text" id="addr-country" name="addr-country" placeholder="Country" required>
            <div class="sub-header">
                <h2>Academic plan</h2>
            </div>
            <label for="start-year">Program start year? <span class="req">*</span></label>
            <select id="start-year" name="start-year" required>
                <option value=""></option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
            </select>
            <label for="student-type">I will be a? <span class="req">*</span></label>
            <select id="student-type" name="student-type" required>
                <option value=""></option>
                <option value="first-year student">First-year Student</option>
                <option value="transfer student">Transfer Student</option>
            </select>
            <label for="course-to-study">Intended course of study? <span class="req">*</span></label>
            <select id="course-to-study" name="course-to-study" required>
                <option value=""></option>
                <option value="computer sci">Computer Science</option>
                <option value="software eng">Software Engineering</option>
                <option value="civil eng">Civil Engineering</option>
                <option value="elect elect eng">Electrical & Electronics Engineering</option>
                <option value="material eng">Material Engineering</option>
                <option value="telecomm sci">Telecommunication Science</option>
            </select>
            <hr>
            <div id="note">
                <p>Note: your original WAEC certificate, High-school transcripts (SS1-3), 
                    JAMB results, and other relevant documents should be attached and sent separately
                    to our Admission team's email: prospectiveugstudents@ghtu.edu.ng (using the tag "Supporting Documents: ", your full-name and intended course of study as subject)
                </p>
            </div>
            <!-- TODO: add sign with fullname field -->
            <!-- TODO: add a disclaimer with checkbox that shows the submit button upon checked -->
            <!-- TODO: add the submit button -->
        </form>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <script src="https://kit.fontawesome.com/7ca8ede0f9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ISOKO</title>

</head>

<body>
    <div class="flex h-screen overflow-hidden">
        <?php include('../includes/sidebar.php') ?>
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <?php include('../includes/Navbar.php') ?>
            <main class="bg-slate-200 pb-20">
                <div class=" mx-auto max-w-screen-2xl px-4">
                    <div class="flex justify-center w-full">
                        <form action="borrowerIn.php" class="flex w-full ">
                            <div>
                                <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    <option value="">Borrowers</option>
                                    <option value="">option2</option>
                                    <option value="">option3</option>
                                </select>
                            </div>
                            <div>
                                <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    <option value="">Branch</option>
                                    <option value="">option2</option>
                                    <option value="">option3</option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <input type="text" class="w-full px-2 py-1 focus:outline-none text-slate-600"
                                    placeholder="Search">
                            </div>
                            <div class="border cursor-pointer">
                                <span class="p-2 text-center">
                                    <i class="fa-solid fa-magnifying-glass fa-xs"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="mt-6">
                        <h1 class="text-2xl">Add Borrower</h1>
                    </div>
                    <section class="content">
                        <div class="mt-6 bg-white border-t-4 border-blue-700 rounded p-4 shadow-lg py-4">

                            <?php
                            ob_start();
                            // Database configuration
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "lms1";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $id = $_GET['borrower_id'];
                            $sel = mysqli_query($conn, "SELECT * FROM  tbl_borrowers WHERE borrower_id = $id");

                            $data = mysqli_fetch_array($sel);
                            // Check if the form is submitted
                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_borrower'])) {
                                // Retrieve form data
                                $borrower_firstname = $_POST['borrower_firstname'];
                                $borrower_lastname = $_POST['borrower_lastname'];
                                $borrower_gender = $_POST['borrower_gender'];
                                $borrower_country = $_POST['borrower_country'];
                                $borrower_title = $_POST['borrower_title'];
                                $borrower_mobile = $_POST['borrower_mobile'];
                                $borrower_email = $_POST['borrower_email'];
                                $borrower_unique_number = $_POST['borrower_unique_number'];
                                $borrower_dob = $_POST['borrower_dob'];
                                $borrower_address = $_POST['borrower_address'];
                                $borrower_city = $_POST['borrower_city'];
                                $borrower_province = $_POST['borrower_province'];
                                $borrower_zipcode = $_POST['borrower_zipcode'];
                                $borrower_landline = $_POST['borrower_landline'];
                                $borrower_business_name = $_POST['borrower_business_name'];
                                $borrower_working_status = $_POST['borrower_working_status'];
                                $borrower_description = $_POST['borrower_description'];

                                // Define upload directory
                                $uploads_dir = 'uploads'; // Adjust the path as needed


                                // Handle single file upload (user picture)
                                $user_picture = null;
                                if (isset($_FILES['user_picture']) && $_FILES['user_picture']['error'] === UPLOAD_ERR_OK) {
                                    $original_name = basename($_FILES['user_picture']['name']);
                                    $unique_name = uniqid() . '_' . $original_name;
                                    $user_picture = $uploads_dir . $unique_name;

                                    if (!move_uploaded_file($_FILES['user_picture']['tmp_name'], $user_picture)) {
                                        echo "Error: Unable to upload user picture.";
                                        $user_picture = null;
                                    }
                                }

                                // Handle multiple file uploads
                                $borrower_files = [];
                                if (isset($_FILES['borrower_files']['name'])) {
                                    foreach ($_FILES['borrower_files']['name'] as $key => $file_name) {
                                        if ($_FILES['borrower_files']['error'][$key] === UPLOAD_ERR_OK) {
                                            $original_name = basename($file_name);
                                            $unique_name = uniqid() . '_' . $original_name;
                                            $destination = $uploads_dir . $unique_name;

                                            if (move_uploaded_file($_FILES['borrower_files']['tmp_name'][$key], $destination)) {
                                                $borrower_files[] = $destination;
                                            } else {
                                                echo "Error: Unable to upload file ($file_name).";
                                            }
                                        }
                                    }
                                }

                                // Prepare and bind
                                $stmt = $conn->prepare("UPDATE tbl_borrowers SET
        First_Name=?, Last_Name=?, Gender=?, Country=?,
        Title=?, Mobile=?, Email=?, Date_of_Birth=?,
        Address=?, City=?, Province=?,
        Zip_Code=?, Landline_Phone=?, Business_Name=?,
        Working_Status=?, Borrower_Photo=?, Description=?, Borrower_Files=? WHERE borrower_id=$id");

                                $borrower_files_json = json_encode($borrower_files);

                                $stmt->bind_param(
                                    "ssssssssssssssssss",
                                    $borrower_firstname,
                                    $borrower_lastname,
                                    $borrower_gender,
                                    $borrower_country,
                                    $borrower_title,
                                    $borrower_mobile,
                                    $borrower_email,
                                    #$borrower_unique_number,
                                    $borrower_dob,
                                    $borrower_address,
                                    $borrower_city,
                                    $borrower_province,
                                    $borrower_zipcode,
                                    $borrower_landline,
                                    $borrower_business_name,
                                    $borrower_working_status,
                                    $borrower_description,
                                    $user_picture,
                                    $borrower_files_json
                                );

                                // Execute the query
                                if ($stmt->execute()) {
                                    echo "Borrower record Updated successfully.";
                                    header("Location:ViewAllBrowers.php");
                                } else {
                                    echo "Error: " . $stmt->error;
                                }

                                // Close statement and connection
                                $stmt->close();
                            }

                            $conn->close();
                            ob_end_flush();
                            ?>

                            <form class="form-horizontal" method="post" id="add_borrower_form" enctype="multipart/form-data">
                                <input type="hidden" name="back_url" value="">
                                <input type="hidden" name="add_borrower" value="1">
                                <div class="flex flex-col gap-4">
                                    <p class="bg-slate-700 text-white px-2 py-1">Required Fields</p>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="FirstName" class="w-1/4 text-gray-700 font-medium">
                                            First Name
                                        </label>
                                        <div class="w-3/4">
                                            <input type="text" name="borrower_firstname"
                                                id="inputBorrowerFirstName"
                                                placeholder="First Name"
                                                required
                                                value="<?php echo $data['First_Name'] ?>"
                                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                        </div>
                                    </div>


                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerLastName" class="w-1/4 text-gray-700 font-medium">
                                            Middle / Last Name
                                        </label>
                                        <div class="w-3/4">
                                            <input type="text" name="borrower_lastname"
                                                id="inputBorrowerLastName"
                                                placeholder="Middle and Last Name"
                                                required
                                                value="<?php echo $data['Last_Name'] ?>"
                                                class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerGender" class="w-1/4 text-gray-700 font-medium">Gender</label>
                                        <div class="w-3/4">
                                            <select class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" name="borrower_gender" value="<?php echo $data['Gender'] ?>" required>
                                                <option value="<?php echo $data['Gender'] ?>"><?php echo $data['Gender'] ?></option>
                                                <option value="Males" />Male</option>
                                                <option value="Female" />Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">

                                        <label for="inputCountry" class="w-1/4 text-gray-700 font-medium">Country</label>
                                        <div class="col-sm-4">
                                            <select name="borrower_country" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputCountry" required>
                                                <option value="<?php echo $data['Country'] ?>"><?php echo $data['Country'] ?></option>
                                                <option value="AF">Afghanistan</option>
                                                <option value="AX">Aland Islands</option>
                                                <option value="AL">Albania</option>
                                                <option value="DZ">Algeria</option>
                                                <option value="AS">American Samoa</option>
                                                <option value="AD">Andorra</option>
                                                <option value="AO">Angola</option>
                                                <option value="AI">Anguilla</option>
                                                <option value="AQ">Antarctica</option>
                                                <option value="AG">Antigua and Barbuda</option>
                                                <option value="AR">Argentina</option>
                                                <option value="AM">Armenia</option>
                                                <option value="AW">Aruba</option>
                                                <option value="AU">Australia</option>
                                                <option value="AT">Austria</option>
                                                <option value="AZ">Azerbaijan</option>
                                                <option value="BS">Bahamas</option>
                                                <option value="BH">Bahrain</option>
                                                <option value="BD">Bangladesh</option>
                                                <option value="BB">Barbados</option>
                                                <option value="BY">Belarus</option>
                                                <option value="BE">Belgium</option>
                                                <option value="BZ">Belize</option>
                                                <option value="BJ">Benin</option>
                                                <option value="BM">Bermuda</option>
                                                <option value="BT">Bhutan</option>
                                                <option value="BO">Bolivia</option>
                                                <option value="BQ">Bonaire</option>
                                                <option value="BA">Bosnia and Herzegovina</option>
                                                <option value="BW">Botswana</option>
                                                <option value="BV">Bouvet Island</option>
                                                <option value="BR">Brazil</option>
                                                <option value="IO">British Indian Ocean Territory</option>
                                                <option value="BN">Brunei Darussalam</option>
                                                <option value="BG">Bulgaria</option>
                                                <option value="BF">Burkina Faso</option>
                                                <option value="BI">Burundi</option>
                                                <option value="KH">Cambodia</option>
                                                <option value="CM">Cameroon</option>
                                                <option value="CA">Canada</option>
                                                <option value="CV">Cape Verde</option>
                                                <option value="KY">Cayman Islands</option>
                                                <option value="CF">Central African Republic</option>
                                                <option value="TD">Chad</option>
                                                <option value="CL">Chile</option>
                                                <option value="CN">China</option>
                                                <option value="CX">Christmas Island</option>
                                                <option value="CC">Cocos (Keeling) Islands</option>
                                                <option value="CO">Colombia</option>
                                                <option value="KM">Comoros</option>
                                                <option value="CG">Congo</option>
                                                <option value="CD">Congo</option>
                                                <option value="CK">Cook Islands</option>
                                                <option value="CR">Costa Rica</option>
                                                <option value="CI">Cote dIvoire</option>
                                                <option value="HR">Croatia</option>
                                                <option value="CU">Cuba</option>
                                                <option value="CY">Cyprus</option>
                                                <option value="CZ">Czech Republic</option>
                                                <option value="DK">Denmark</option>
                                                <option value="DJ">Djibouti</option>
                                                <option value="DM">Dominica</option>
                                                <option value="DO">Dominican Republic</option>
                                                <option value="EC">Ecuador</option>
                                                <option value="EG">Egypt</option>
                                                <option value="SV">El Salvador</option>
                                                <option value="GQ">Equatorial Guinea</option>
                                                <option value="ER">Eritrea</option>
                                                <option value="EE">Estonia</option>
                                                <option value="ET">Ethiopia</option>
                                                <option value="FK">Falkland Islands (Malvinas)</option>
                                                <option value="FO">Faroe Islands</option>
                                                <option value="FJ">Fiji</option>
                                                <option value="FI">Finland</option>
                                                <option value="FR">France</option>
                                                <option value="GF">French Guiana</option>
                                                <option value="PF">French Polynesia</option>
                                                <option value="TF">French Southern Territories</option>
                                                <option value="GA">Gabon</option>
                                                <option value="GM">Gambia</option>
                                                <option value="GE">Georgia</option>
                                                <option value="DE">Germany</option>
                                                <option value="GH">Ghana</option>
                                                <option value="GI">Gibraltar</option>
                                                <option value="GR">Greece</option>
                                                <option value="GL">Greenland</option>
                                                <option value="GD">Grenada</option>
                                                <option value="GP">Guadeloupe</option>
                                                <option value="GU">Guam</option>
                                                <option value="GT">Guatemala</option>
                                                <option value="GG">Guernsey</option>
                                                <option value="GN">Guinea</option>
                                                <option value="GW">Guinea-Bissau</option>
                                                <option value="GY">Guyana</option>
                                                <option value="HT">Haiti</option>
                                                <option value="HM">Heard Island and McDonald Islands</option>
                                                <option value="VA">Holy See (Vatican City State)</option>
                                                <option value="HN">Honduras</option>
                                                <option value="HK">Hong Kong</option>
                                                <option value="HU">Hungary</option>
                                                <option value="IS">Iceland</option>
                                                <option value="IN">India</option>
                                                <option value="ID">Indonesia</option>
                                                <option value="IR">Iran, Islamic Republic of</option>
                                                <option value="IQ">Iraq</option>
                                                <option value="IE">Ireland</option>
                                                <option value="IM">Isle of Man</option>
                                                <option value="IL">Israel</option>
                                                <option value="IT">Italy</option>
                                                <option value="JM">Jamaica</option>
                                                <option value="JP">Japan</option>
                                                <option value="JE">Jersey</option>
                                                <option value="JO">Jordan</option>
                                                <option value="KZ">Kazakhstan</option>
                                                <option value="KE">Kenya</option>
                                                <option value="KI">Kiribati</option>
                                                <option value="KP">Korea, Democratic People's Republic of</option>
                                                <option value="KR">Korea, Republic of</option>
                                                <option value="KW">Kuwait</option>
                                                <option value="KG">Kyrgyzstan</option>
                                                <option value="LA">Lao PDR</option>
                                                <option value="LV">Latvia</option>
                                                <option value="LB">Lebanon</option>
                                                <option value="LS">Lesotho</option>
                                                <option value="LR">Liberia</option>
                                                <option value="LY">Libya</option>
                                                <option value="LI">Liechtenstein</option>
                                                <option value="LT">Lithuania</option>
                                                <option value="LU">Luxembourg</option>
                                                <option value="MO">Macao</option>
                                                <option value="MK">Macedonia, Republic of</option>
                                                <option value="MG">Madagascar</option>
                                                <option value="MW">Malawi</option>
                                                <option value="MY">Malaysia</option>
                                                <option value="MV">Maldives</option>
                                                <option value="ML">Mali</option>
                                                <option value="MT">Malta</option>
                                                <option value="MH">Marshall Islands</option>
                                                <option value="MQ">Martinique</option>
                                                <option value="MR">Mauritania</option>
                                                <option value="MU">Mauritius</option>
                                                <option value="YT">Mayotte</option>
                                                <option value="MX">Mexico</option>
                                                <option value="FM">Micronesia, Federated States of</option>
                                                <option value="MD">Moldova, Republic of</option>
                                                <option value="MC">Monaco</option>
                                                <option value="MN">Mongolia</option>
                                                <option value="ME">Montenegro</option>
                                                <option value="MS">Montserrat</option>
                                                <option value="MA">Morocco</option>
                                                <option value="MZ">Mozambique</option>
                                                <option value="MM">Myanmar</option>
                                                <option value="NA">Namibia</option>
                                                <option value="NR">Nauru</option>
                                                <option value="NP">Nepal</option>
                                                <option value="NL">Netherlands</option>
                                                <option value="NC">New Caledonia</option>
                                                <option value="NZ">New Zealand</option>
                                                <option value="NI">Nicaragua</option>
                                                <option value="NE">Niger</option>
                                                <option value="NG">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                                <option value="OM">Oman</option>
                                                <option value="PK">Pakistan</option>
                                                <option value="PW">Palau</option>
                                                <option value="PS">Palestine</option>
                                                <option value="PA">Panama</option>
                                                <option value="PG">Papua New Guinea</option>
                                                <option value="PY">Paraguay</option>
                                                <option value="PE">Peru</option>
                                                <option value="PH">Philippines</option>
                                                <option value="PN">Pitcairn</option>
                                                <option value="PL">Poland</option>
                                                <option value="PT">Portugal</option>
                                                <option value="PR">Puerto Rico</option>
                                                <option value="QA">Qatar</option>
                                                <option value="RE">Reunion</option>
                                                <option value="RO">Romania</option>
                                                <option value="RU">Russian Federation</option>
                                                <option value="RW">Rwanda</option>
                                                <option value="BL">Saint Barthelemy</option>
                                                <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                <option value="KN">Saint Kitts and Nevis</option>
                                                <option value="LC">Saint Lucia</option>
                                                <option value="MF">Saint Martin (French part)</option>
                                                <option value="PM">Saint Pierre and Miquelon</option>
                                                <option value="VC">Saint Vincent and the Grenadines</option>
                                                <option value="WS">Samoa</option>
                                                <option value="SM">San Marino</option>
                                                <option value="ST">Sao Tome and Principe</option>
                                                <option value="SA">Saudi Arabia</option>
                                                <option value="SN">Senegal</option>
                                                <option value="RS">Serbia</option>
                                                <option value="SC">Seychelles</option>
                                                <option value="SL">Sierra Leone</option>
                                                <option value="SG">Singapore</option>
                                                <option value="SX">Sint Maarten (Dutch part)</option>
                                                <option value="SK">Slovakia</option>
                                                <option value="SI">Slovenia</option>
                                                <option value="SB">Solomon Islands</option>
                                                <option value="SO">Somalia</option>
                                                <option value="ZA">South Africa</option>
                                                <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                <option value="SS">South Sudan</option>
                                                <option value="ES">Spain</option>
                                                <option value="LK">Sri Lanka</option>
                                                <option value="SD">Sudan</option>
                                                <option value="SR">Suriname</option>
                                                <option value="SJ">Svalbard and Jan Mayen</option>
                                                <option value="SZ">Swaziland</option>
                                                <option value="SE">Sweden</option>
                                                <option value="CH">Switzerland</option>
                                                <option value="SY">Syrian Arab Republic</option>
                                                <option value="TW">Taiwan</option>
                                                <option value="TJ">Tajikistan</option>
                                                <option value="TZ">Tanzania, United Republic of</option>
                                                <option value="TH">Thailand</option>
                                                <option value="TL">Timor-Leste</option>
                                                <option value="TG">Togo</option>
                                                <option value="TK">Tokelau</option>
                                                <option value="TO">Tonga</option>
                                                <option value="TT">Trinidad and Tobago</option>
                                                <option value="TN">Tunisia</option>
                                                <option value="TR">Turkey</option>
                                                <option value="TM">Turkmenistan</option>
                                                <option value="TC">Turks and Caicos Islands</option>
                                                <option value="TV">Tuvalu</option>
                                                <option value="UG">Uganda</option>
                                                <option value="UA">Ukraine</option>
                                                <option value="AE">United Arab Emirates</option>
                                                <option value="GB">United Kingdom</option>
                                                <option value="US">United States</option>
                                                <option value="UM">United States Minor Outlying Islands</option>
                                                <option value="UY">Uruguay</option>
                                                <option value="UZ">Uzbekistan</option>
                                                <option value="VU">Vanuatu</option>
                                                <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                <option value="VN">Vietnam</option>
                                                <option value="VG">Virgin Islands, British</option>
                                                <option value="VI">Virgin Islands, U.S.</option>
                                                <option value="WF">Wallis and Futuna</option>
                                                <option value="EH">Western Sahara</option>
                                                <option value="YE">Yemen</option>
                                                <option value="ZM">Zambia</option>
                                                <option value="ZW">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <p class="bg-slate-700 text-white px-2 py-1">Optional Fields</p>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerTitle" class="w-1/4 text-gray-700 font-medium">Title</label>
                                        <div class="w-3/4">
                                            <select class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" name="borrower_title" id="inputBorrowerTitle">
                                                <option value="<?php echo $data['Title'] ?>"><?php echo $data['Title'] ?></option>
                                                <option value="Mr.">Mr. </option>
                                                <option value="Mrs.">Mrs. </option>
                                                <option value="Miss">Miss </option>
                                                <option value="Ms.">Ms. </option>
                                                <option value="Dr.">Dr. </option>
                                                <option value="Prof.">Prof. </option>
                                                <option value="Rev.">Rev. </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerMobile" class="w-1/4 text-gray-700 font-medium">Mobile</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_mobile" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerMobile" placeholder="Numbers Only" value="<?php echo $data['Mobile'] ?>" onkeypress="return isNumberKey(event)">
                                            <p class="text-slate-500 text-xs"><b><u>Do not</u> put country code, spaces, or characters</b> in mobile otherwise you won't be able to send SMS to this mobile.</b></p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerEmail" class="w-1/4 text-gray-700 font-medium">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_email" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerEmail" placeholder="Email" value="<?php echo $data['Email'] ?>">
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">

                                        <label for="inputBorrowerUniqueNumber" class="w-1/4 text-gray-700 font-medium">Unique Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_unique_number" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerUniqueNumber" placeholder="Unique Number" value="<?php echo $data['borrower_id'] ?>">
                                            <p class="text-slate-500 text-xs">You can enter unique number to identify the borrower such as Social Security Number, License #, Registration Id....</p>
                                        </div>
                                    </div>

                                    <script>
                                        $(function() {
                                            $('#inputBorrowerDob').datepick({
                                                defaultDate: '1997/05/27',
                                                showTrigger: '#calImg',
                                                yearRange: 'c-20:c+20',
                                                showTrigger: '#calImg',
                                                dateFormat: 'yyyy/mm/dd',
                                            });
                                        });
                                    </script>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerDob" class="w-1/4 text-gray-700 font-medium">Date of Birth</label>
                                        <div class="col-sm-10">
                                            <input type="date" name="borrower_dob" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerDob" placeholder="dd/mm/yyyy" value="<?php echo $data['Date_of_Birth'] ?>">
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">

                                        <label for="inputBorrowerAddress" class="w-1/4 text-gray-700 font-medium">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_address" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerAddress" placeholder="Address" value="<?php echo $data['Address'] ?>">
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerCity" class="w-1/4 text-gray-700 font-medium">City</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_city" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerCity" placeholder="City" value="<?php echo $data['City'] ?>">
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerProvince" class="w-1/4 text-gray-700 font-medium">Province / State</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_province" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerProvince" placeholder="Province or State" value="<?php echo $data['Province'] ?>">
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerZipcode" class="w-1/4 text-gray-700 font-medium">Zipcode</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_zipcode" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerZipcode" placeholder="Zipcode" value="<?php echo $data['Zip_Code'] ?>">
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerLandline" class="w-1/4 text-gray-700 font-medium">Landline Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_landline" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerLandline" placeholder="Landline Phone" value="<?php echo $data['Landline_Phone'] ?>">
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerBusinessName" class="w-1/4 text-gray-700 font-medium">Business Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="borrower_business_name" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerBusinessName" placeholder="Business Name" value="<?php echo $data['Business_Name'] ?>">
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerEORS" class="w-1/4 text-gray-700 font-medium">Working Status</label>
                                        <div class="w-3/4">
                                            <select class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" name="borrower_working_status" id="inputBorrowerEORS">
                                                <option value="<?php echo $data['Working_Status'] ?>"><?php echo $data['Working_Status'] ?></option>
                                                <option value="Employee">Employee</option>
                                                <option value="Owner">Owner</option>
                                                <option value="Student">Student</option>
                                                <option value="Overseas Worker">Overseas Worker</option>
                                                <option value="Pensioner">Pensioner</option>
                                                <option value="Unemployed">Unemployed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">

                                        <label for="user_picture" class="w-1/4 text-gray-700 font-medium">Borrower Photo</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="photo_file" name="user_picture" value="<?php echo $data['Borrower_Photo'] ?>">
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-4 mb-4 px-4">
                                        <label for="inputBorrowerDescription" class="w-1/4 text-gray-700 font-medium">Description</label>
                                        <div class="col-sm-10">
                                            <INPUT TYPE="text" name="borrower_description" value="<?php echo $data['Description'] ?>" class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputBorrowerDescription" rows="3">
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-4 mb-4 px-4">

                                        <label for="borrower_files" class="w-1/4 text-gray-700 font-medium">Borrower Files<br>(doc, pdf, image)</label>
                                        <div class="col-sm-10">
                                            <input type="file" id="data_files" name="borrower_files[]" value="<?php echo $data['Borrower_Files'] ?>" multiple>
                                        </div>
                                        <div class="text-slate-500 text-sm">
                                            You can select up to 30 files. Please click <b>Browse</b> button and then hold <b>Ctrl</b> button on your keyboard to select multiple files.
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                if (window.FormData) {
                                                    $('#data_files').bind({
                                                        change: function() {
                                                            var input = document.getElementById('data_files');
                                                            files = input.files;

                                                            if (files.length > 30) {
                                                                alert('You can only upload max of 30 files');
                                                                $('#data_files').val("");
                                                                return false;
                                                            } else {
                                                                var regExp = new RegExp('(application/pdf|application/acrobat|applications/vnd.pdf|text/pdf|text/x-pdf|application/msword|application/x-msword|application/vnd.openxmlformats-officedocument.wordprocessingml.document|image/png|image/jpeg|image/gif)', 'i');
                                                                for (var i = 0; i < files.length; i++) {
                                                                    var file = files[i];
                                                                    var matcher = regExp.test(file.type);
                                                                    var filesize = file.size;
                                                                    if (!matcher) {
                                                                        alert('You can only upload doc, pdf, or image files');
                                                                        $('#data_files').val("");
                                                                        return false;
                                                                    }
                                                                    if (filesize > 30000000) {
                                                                        alert('File must not be more than 30mb');
                                                                        $('#data_files').val("");
                                                                        return false;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                    $('#photo_file').bind({
                                                        change: function() {
                                                            var input = document.getElementById('photo_file');
                                                            files = input.files;

                                                            if (files.length > 1) {
                                                                alert('You can only upload max of 1 file');
                                                                $('#photo_file').val("");
                                                                return false;
                                                            } else {
                                                                var regExp = new RegExp('(image/png|image/jpeg|image/gif)', 'i');
                                                                for (var i = 0; i < files.length; i++) {
                                                                    var file = files[i];
                                                                    var matcher = regExp.test(file.type);
                                                                    var filesize = file.size;
                                                                    if (!matcher) {
                                                                        alert('You can only upload png, jpeg, or gif files');
                                                                        $('#photo_file').val("");
                                                                        return false;
                                                                    }
                                                                    if (filesize > 30000000) {
                                                                        alert('File must not be more than 30mb');
                                                                        $('#photo_file').val("");
                                                                        return false;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                    $('#csv_file').bind({
                                                        change: function() {
                                                            var input = document.getElementById('csv_file');
                                                            files = input.files;

                                                            if (files.length > 1) {
                                                                alert('You can only upload max of 1 file');
                                                                $('#photo_file').val("");
                                                                return false;
                                                            } else {
                                                                var regExp = new RegExp('(text/csv|text/plain|application/csv|application/x-csv|text/comma-separated-values|application/excel|application/ms-excel|application/vnd.ms-excel|application/vnd.msexcel|text/anytext|application/octet-stream|application/txt)', 'i');
                                                                for (var i = 0; i < files.length; i++) {
                                                                    var file = files[i];
                                                                    var matcher = regExp.test(file.type);
                                                                    var filesize = file.size;
                                                                    if (!matcher) {
                                                                        alert('You can only upload csv file');
                                                                        $('#csv_file').val("");
                                                                        return false;
                                                                    }

                                                                    if (filesize > 30000000) {
                                                                        alert('File must not be more than 30mb');
                                                                        $('#csv_file').val("");
                                                                        return false;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    });
                                                }
                                            });
                                        </script>

                                    </div>

                                    <div class="flex justify-between px-8">
                                        <button type="button" class="px-2 py-1 bg-blue-600 text-white text-sm rounded" onClick="parent.location = 'add-borrower.php'">Back</button>
                                        <button type="submit" name="add_borrower" class="bg-primary text-white text-sm px-2 py-1 rounded" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait">Submit</button>

                                        <script type="text/javascript">
                                            $('#add_borrower_form').submit(function() {
                                                $(this).find('button[type=submit]').prop('disabled', true);
                                                $('.btn').prop('disabled', true);
                                                $(this).find('button[type=submit]').button('loading');
                                                return true;
                                            });
                                        </script>
                                    </div><!-- /.box-footer -->
                                </div>
                            </form>
                        </div>

                    </section>
                    <script>
                        function toggleMenu(menuId) {
                            const menu = document.getElementById(menuId);
                            const arrow = document.querySelector(`#${menuId} ~ button i`);

                            if (menu.classList.contains('hidden')) {
                                menu.classList.remove('hidden');
                                menu.classList.add('block');
                                arrow.classList.add('rotate-90');
                            } else {
                                menu.classList.add('hidden');
                                menu.classList.remove('block');
                                arrow.classList.remove('rotate-90');
                            }
                        }
                    </script>

                </div>
            </main>
        </div>
    </div>
</body>

</html>
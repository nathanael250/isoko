<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "lms1";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $branch_name = $_POST['branch_name'];
    $branch_date = $_POST['branch_date'];
    $country = $_POST['country'];
    $branch_currency = $_POST['branch_currency'];
    $date_format = $_POST['date_format'];
    $currency_in_word = $_POST['currency_in_word'];
    $branch_address = $_POST['branch_address'];
    $branch_city = $_POST['branch_city'];
    $branch_province = $_POST['branch_province'];
    $branch_zipcode = $_POST['branch_zipcode'];
    $branch_landline = $_POST['branch_landline'];
    $branch_mobile = $_POST['branch_mobile'];
    $min_amount = $_POST['min_amount'];
    $max_amount = $_POST['max_amount'];
    $min_loan_interest = $_POST['min_loan_interest'];
    $max_loan_interest = $_POST['max_loan_interest'];

    // Insert data into the database
    $sql = "INSERT INTO tbl_branches (
                branch_name, branch_date, country, branch_currency,
                date_format, currency_in_word, branch_address, branch_city,
                branch_province, branch_zipcode, branch_landline, branch_mobile,
                min_amount, max_amount, min_loan_interest, max_loan_interest
            ) VALUES (
                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?
            )";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "ssssssssssssdddd",
        $branch_name, $branch_date, $country, $branch_currency,
        $date_format, $currency_in_word, $branch_address, $branch_city,
        $branch_province, $branch_zipcode, $branch_landline, $branch_mobile,
        $min_amount, $max_amount, $min_loan_interest, $max_loan_interest
    );

    if ($stmt->execute()) {
        echo "New branch record created successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

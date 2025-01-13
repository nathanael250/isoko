<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'lms1');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Make sure to handle each field as an array
    $borrower_names = $_POST['borrower_name'];
    $amounts = $_POST['amount'];
    $methods = $_POST['method'];
    $collected_dates = $_POST['collected_date'];
    $managers = $_POST['manager'];
    $descriptions = $_POST['description'];
    $accounting_methods = $_POST['accounting_method'];

    // Loop through each entry
    foreach ($borrower_names as $index => $borrower_name) {
        $amount = $amounts[$index];
        $method = $methods[$index];
        $collected_date = $collected_dates[$index];
        $manager = $managers[$index];
        $description = $descriptions[$index];
        $accounting_method = $accounting_methods[$index];

        // Insert into database or handle the data
        $sql = "INSERT INTO tbl_bulk_repayments (loan_id, amount, method, collected_date, collected_by, description, accounting_method) 
                VALUES ('$borrower_name', '$amount', '$method', '$collected_date', '$manager', '$description', '$accounting_method')";
        
        // Execute the SQL statement
        if ($conn->query($sql) === TRUE) {
            // echo "Repayment $index added successfully";
            header("Location:add_bulk_repayments.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<?php
// Database connection
$host = "localhost";
$dbname = "lms1";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $loan_product = $_POST['loan_product'] ?? null;
        $borrower = $_POST['borrower'] ?? null;
        $loan_number = $_POST['loan'] ?? null;
        $interest_method = $_POST['interest_method'] ?? null;
        $principal_amount = $_POST['principal_amount'] ?? null;
        $release_date = $_POST['release_date'] ?? null;
        $interest = $_POST['interest'] ?? null;
        $interest_duration = $_POST['interest_duration'] ?? null;
        $loan_duration = $_POST['loan_duration'] ?? null;
        $loan_duration_unit = $_POST['loan_duration_unit'] ?? null;
        $repayment_cycle = $_POST['repayment_cycle'] ?? null;
        $number_of_repayments = $_POST['numberofrepayment'] ?? null;

        // Insert data into the database
        $sql = "INSERT INTO tbl_loans (loan_product, borrower_id, loan_number, interest_method, principal_amount, release_date, interest, interest_duration, loan_duration, loan_duration_unit, repayment_cycle, number_of_repayments)
                VALUES (:loan_product, :borrower, :loan_number, :interest_method, :principal_amount, :release_date, :interest, :interest_duration, :loan_duration, :loan_duration_unit, :repayment_cycle, :number_of_repayments)";

        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':loan_product', $loan_product);
        $stmt->bindParam(':borrower', $borrower);
        $stmt->bindParam(':loan_number', $loan_number);
        $stmt->bindParam(':interest_method', $interest_method);
        $stmt->bindParam(':principal_amount', $principal_amount);
        $stmt->bindParam(':release_date', $release_date);
        $stmt->bindParam(':interest', $interest);
        $stmt->bindParam(':interest_duration', $interest_duration);
        $stmt->bindParam(':loan_duration', $loan_duration);
        $stmt->bindParam(':loan_duration_unit', $loan_duration_unit);
        $stmt->bindParam(':repayment_cycle', $repayment_cycle);
        $stmt->bindParam(':number_of_repayments', $number_of_repayments);

        $stmt->execute();
        echo "Loan details added successfully!";
        header("Location:ViewAllLoans.php");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>

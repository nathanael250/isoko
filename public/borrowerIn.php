<?php
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

// Allowed file extensions for images and documents
$image_extensions = ['png', 'jpeg', 'jpg', 'gif'];
$file_extensions = ['pdf', 'docx'];

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

    // Ensure upload directory exists
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle user picture upload (only allow images)
    $user_picture = null;
    if (isset($_FILES['user_picture']) && $_FILES['user_picture']['error'] === UPLOAD_ERR_OK) {
        $file_extension = strtolower(pathinfo($_FILES['user_picture']['name'], PATHINFO_EXTENSION));
        if (in_array($file_extension, $image_extensions)) {
            $file_name = time() . '_' . basename($_FILES['user_picture']['name']);
            $user_picture = $upload_dir . $file_name;
            move_uploaded_file($_FILES['user_picture']['tmp_name'], $user_picture);
        } else {
            echo "Error: Only image files (png, jpeg, jpg, gif) are allowed for the user picture.";
            exit();
        }
    }

    // Handle multiple file uploads (only allow PDFs and DOCX files)
    $borrower_files = [];
    if (isset($_FILES['borrower_files']['name'])) {
        foreach ($_FILES['borrower_files']['name'] as $key => $file_name) {
            $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
            if (in_array($file_extension, $file_extensions)) {
                if ($_FILES['borrower_files']['error'][$key] === UPLOAD_ERR_OK) {
                    $unique_name = time() . '_' . basename($file_name);
                    $destination = $upload_dir . $unique_name;
                    if (move_uploaded_file($_FILES['borrower_files']['tmp_name'][$key], $destination)) {
                        $borrower_files[] = $destination;
                    }
                }
            } else {
                echo "Error: Only document files (pdf, docx) are allowed for borrower files.";
                exit();
            }
        }
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO tbl_borrowers (
        First_Name, Last_Name, Gender, Country,
        Title, Mobile, Email, Date_of_Birth,
        Address, City, Province,
        Zip_Code, Landline_Phone, Business_Name,
        Working_Status, Borrower_Photo, Description, Borrower_Files
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

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
        $borrower_dob,
        $borrower_address,
        $borrower_city,
        $borrower_province,
        $borrower_zipcode,
        $borrower_landline,
        $borrower_business_name,
        $borrower_working_status,
        $user_picture,
        $borrower_description,
        $borrower_files_json
    );

    // Execute the query
    if ($stmt->execute()) {
        echo "New borrower record created successfully.";
        header("Location: ViewAllBrowsers.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();
?>

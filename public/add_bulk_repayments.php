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
    <style>
        tr>td:first-child {
            /* Styles for the first <td> in the <tr> */
            background-color: #94a3b8;
            font-weight: bold;
        }

        select option {
            white-space: normal;
        }
    </style>
</head>

<body>
    <div class="flex h-screen overflow-hidden">
        <?php include('../includes/sidebar.php') ?>
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <?php include('../includes/Navbar.php') ?>
            <main class="bg-slate-200 pb-20">
                <div class=" mx-auto max-w-screen-2xl px-4 text-slate-600">
                    <?php
                    include('../includes/MainSubHeader.php')
                    ?>
                    <div class='py-4'>
                        <h1 class='text-2xl text-slate-800'>Add Bulk Repayments</h1>

                        <div class="flex items-center bg-green-600 text-white text-md font-bold px-4 py-5 rounded relative" role="alert">
                            <span class="px-5"><i class="fa fa-check font-bold text-2xl" aria-hidden="true"></i></span>
                            <span class="text-lg">Previous bulk upload was successful!.</span>
                            <span class="text-sm mx-5">You can upload more records below.</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <svg class="fill-current h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" onclick="this.parentElement.parentElement.style.display='none';">
                                    <path d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 101.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z" />
                                </svg>
                            </span>
                        </div>

                    </div>
                    <div class='py-1 my-4 px-4 bg-white w-full text-sm  border-t-[3px] border-blue-300 rounded'>
                        <span class="text-sm text-slate-800">
                            You can use this page to add bulk repayments. Please be careful that you select the right loan. You can enter as many rows as you like.
                        </span>
                        <div class="overflow-x-auto mt-2">
                            <table class="table  mt-2">
                                <thead>
                                    <tr class=" bg-[#0073B7] text-white divide-x-2 divide-white text-sm">
                                        <th>Row</th>
                                        <th>Loan</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Collection Date</th>
                                        <th>Collection By</th>
                                        <th>Description</th>
                                        <th>Accounting Cash/Bank</th>
                                    </tr>
                                </thead>
                                <form action="add_repayment.php" method="post">
                                    <tbody class="divide-y-2 divide-white text-sm">
                                        <tr class="">
                                            <td>1</td>
                                            <td class="p-2">
                                                <select name="borrower_name[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                                    <?php
                                                    // Database connection
                                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['loan_id'] ?>">
                                                                <?php echo $data['Last_Name'] . " " . $data['First_Name'] . " - " . $data['Business_Name'] . " - (Loan# " . $data['borrower_id'] . ", Due: " . ($data['principal_amount'] * 2.2) . ")" ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="number" autocomplete="off" name="amount[]" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Online">Online Transfer</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="collected_date[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="manager[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id LIMIT 1";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['Manager'] ?>"><?php echo $data['Manager'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="description[]" placeholder="Description" class="border border-slate-400 w-[100%] px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="accounting_method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>2</td>
                                            <td class="p-2">
                                                <select name="borrower_name[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                                    <?php
                                                    // Database connection
                                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['loan_id'] ?>">
                                                                <?php echo $data['Last_Name'] . " " . $data['First_Name'] . " - " . $data['Business_Name'] . " - (Loan# " . $data['borrower_id'] . ", Due: " . ($data['principal_amount'] * 2.2) . ")" ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="number" autocomplete="off" name="amount[]" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Online">Online Transfer</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="collected_date[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="manager[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id LIMIT 1";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['Manager'] ?>"><?php echo $data['Manager'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="description[]" placeholder="Description" class="border border-slate-400 w-[100%] px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="accounting_method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>3</td>
                                            <td class="p-2">
                                                <select name="borrower_name[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                                    <?php
                                                    // Database connection
                                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['loan_id'] ?>">
                                                                <?php echo $data['Last_Name'] . " " . $data['First_Name'] . " - " . $data['Business_Name'] . " - (Loan# " . $data['borrower_id'] . ", Due: " . ($data['principal_amount'] * 2.2) . ")" ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="number" autocomplete="off" name="amount[]" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Online">Online Transfer</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="collected_date[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="manager[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id LIMIT 1";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['Manager'] ?>"><?php echo $data['Manager'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="description[]" placeholder="Description" class="border border-slate-400 w-[100%] px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="accounting_method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>4</td>
                                            <td class="p-2">
                                                <select name="borrower_name[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                                    <?php
                                                    // Database connection
                                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['loan_id'] ?>">
                                                                <?php echo $data['Last_Name'] . " " . $data['First_Name'] . " - " . $data['Business_Name'] . " - (Loan# " . $data['borrower_id'] . ", Due: " . ($data['principal_amount'] * 2.2) . ")" ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="number" autocomplete="off" name="amount[]" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Online">Online Transfer</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="collected_date[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="manager[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id LIMIT 1";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['Manager'] ?>"><?php echo $data['Manager'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="description[]" placeholder="Description" class="border border-slate-400 w-[100%] px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="accounting_method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>5</td>
                                            <td class="p-2">
                                                <select name="borrower_name[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                                    <?php
                                                    // Database connection
                                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['loan_id'] ?>">
                                                                <?php echo $data['Last_Name'] . " " . $data['First_Name'] . " - " . $data['Business_Name'] . " - (Loan# " . $data['borrower_id'] . ", Due: " . ($data['principal_amount'] * 2.2) . ")" ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="number" autocomplete="off" name="amount[]" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Online">Online Transfer</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="collected_date[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="manager[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id LIMIT 1";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['Manager'] ?>"><?php echo $data['Manager'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="description[]" placeholder="Description" class="border border-slate-400 w-[100%] px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="accounting_method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td>6</td>
                                            <td class="p-2">
                                                <select name="borrower_name[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                                    <?php
                                                    // Database connection
                                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                                    // Check connection
                                                    if ($conn->connect_error) {
                                                        die("Connection failed: " . $conn->connect_error);
                                                    }
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['loan_id'] ?>">
                                                                <?php echo $data['Last_Name'] . " " . $data['First_Name'] . " - " . $data['Business_Name'] . " - (Loan# " . $data['borrower_id'] . ", Due: " . ($data['principal_amount'] * 2.2) . ")" ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="number" autocomplete="off" name="amount[]" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                    <option value="ATM">ATM</option>
                                                    <option value="Cheque">Cheque</option>
                                                    <option value="Paypal">Paypal</option>
                                                    <option value="Online">Online Transfer</option>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="date" name="collected_date[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="manager[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <?php
                                                    $sql = "SELECT * FROM tbl_borrowers,tbl_loans WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id LIMIT 1";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        while ($data = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $data['Manager'] ?>"><?php echo $data['Manager'] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <td class="p-2">
                                                <input type="text" name="description[]" placeholder="Description" class="border border-slate-400 w-[100%] px-2 py-1 focus:outline-none">
                                            </td>
                                            <td class="p-2">
                                                <select name="accounting_method[]" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                                    <option value="Cash">Cash</option>
                                                </select>
                                            </td>
                                        </tr>
                                        

                                    </tbody>

                            </table>
                            <div class="flex justify-between pl-10 pr-6 mt-9">
                                <span><b>Total Amount:</b> <span id="total-amount">0.00</span></span>
                                <button class="bg-blue-600 px-2 py-1 text-white rounded-sm">Submit</button>
                            </div>

                            <script>
                                // Function to calculate total amount
                                function calculateTotalAmount() {
                                    let total = 0;
                                    // Select all amount input fields
                                    const amountFields = document.querySelectorAll('input[name="amount[]"]');
                                    amountFields.forEach(field => {
                                        const value = parseFloat(field.value);
                                        if (!isNaN(value)) {
                                            total += value;
                                        }
                                    });

                                    // Update the total amount display
                                    document.getElementById('total-amount').textContent = total.toFixed(2);
                                }

                                // Attach event listener to all amount input fields for real-time updates
                                document.addEventListener('input', (event) => {
                                    if (event.target.name === 'amount[]') {
                                        calculateTotalAmount();
                                    }
                                });
                            </script>

                            </form>


                        </div>
                    </div>
            </main>
        </div>
    </div>


    <!-- some js scripts links  -->



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let activeMenu = null; // This will hold the active menu ID
            const menuIds = [...Array(10)].map((_, i) => `menu${i + 1}`); // Generate menu IDs

            menuIds.forEach((menuId) => {
                // Add click listeners to toggle buttons
                const button = document.querySelector(`#${menuId} ~ button`);
                if (button) {
                    button.addEventListener('click', () => toggleMenu(menuId));
                }
            });

            // Define toggleMenu globally
            window.toggleMenu = function(menuId) {
                const menu = document.getElementById(menuId);

                if (activeMenu === menuId) {
                    // Close the currently active menu
                    menu.classList.add('hidden');
                    menu.classList.remove('block');
                    activeMenu = null; // Reset active menu
                } else {
                    // Close the previously active menu
                    if (activeMenu) {
                        const previousMenu = document.getElementById(activeMenu);
                        if (previousMenu) {
                            previousMenu.classList.add('hidden');
                            previousMenu.classList.remove('block');
                        }
                    }

                    // Open the new menu
                    menu.classList.remove('hidden');
                    menu.classList.add('block');
                    activeMenu = menuId; // Set the new active menu
                }
            };
        });
    </script>

</body>

</html>
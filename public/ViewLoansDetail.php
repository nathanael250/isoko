<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Details</title>
    <link rel="stylesheet" href="./css/output.css">
    <script src="https://kit.fontawesome.com/7ca8ede0f9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <?php include('../includes/sidebar.php') ?>
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <?php include('../includes/Navbar.php') ?>
            <main class="bg-slate-200 pb-20">
                <!-- Header -->
                <div class="bg-white shadow-md px-4 py-3">
                    <h1 class="text-lg font-bold text-gray-700">View Loan Details</h1>
                </div>

                <!-- Success Message -->
                <!-- <div class="bg-green-500 text-white px-4 py-4 mt-4 rounded-md mx-4">
                    <p>
                        <span class="font-bold">✔ Loan# 1000002</span> has been added for Mr. Eric Ndikubwimana
                    </p>
                </div> -->

                <?php
                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'lms1');

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $id = $_GET['loan_id'];

                $sql = "SELECT * FROM tbl_borrowers, tbl_loans 
                                                WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id 
                                                AND loan_id = $id";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);

                ?>

                <!-- Borrower Details Card -->
                <div class="bg-white shadow-lg rounded-md mt-2 mx-4 p-4">
                    <div class="grid grid-cols-3 gap-4 mt-4">

                        <div class="flex flex-row ">
                            <?php if (file_exists($data['Borrower_Photo'])) {
                            ?>
                                <img src="<?php echo $data['Borrower_Photo']; ?>" alt="Borrower Photo" class="w-16 h-16 rounded-full mr-4">
                            <?php } else {
                                echo '<p>No photo available</p>';
                            } ?>
                            <div>
                                <h2 class="font-bold text-lg"><?php echo $data['Title'] . "  " . $data['First_Name'] . "  " . $data['Last_Name']; ?></h2>
                                <p class="text-gray-500" style="display:block"><?php echo $data['loan_id']; ?></p>
                            </div>
                        </div>
                        <div>
                            <a href="AddLoan.php" class="bg-green-800 text-white px-2 py-2 rounded shadow hover:bg-green-700">Add Loan</a>
                            <a href="ViewAllLoans.php" class="bg-gray-900 text-white px-2 py-2 rounded shadow hover:bg-slate-800 ml-2">View All Loans</a>
                        </div>
                        <div class="relative inline-block text-left">
                            <div>
                                <button type="button"
                                    class="inline-flex justify-center w-64 rounded-md border border-gray-300 shadow-sm py-2 bg-blue-800 text-sm font-medium text-white hover:bg-blue-900 focus:outline-none focus:ring-2"
                                    id="dropdown-button"
                                    aria-expanded="false"
                                    aria-haspopup="true">
                                    Borrower Loans Statement
                                    <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.67l3.71-4.44a.75.75 0 111.14.98l-4.25 5.1a.75.75 0 01-1.14 0L5.21 8.25a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Dropdown menu -->
                            <div id="dropdown-menu"
                                class="absolute right-40 z-10 mt-2 w-56 origin-top-right rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                                role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                                <div class="py-1" role="none">
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Download Statement</a>
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Email Statement to Borrower</a>
                                    <a href="#" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100" role="menuitem">Download Multiple Borrower Statements</a>
                                </div>
                            </div>

                            <!-- JavaScript -->
                            <script>
                                document.getElementById('dropdown-button').addEventListener('click', function() {
                                    const menu = document.getElementById('dropdown-menu');
                                    menu.classList.toggle('hidden');
                                });
                            </script>
                        </div>


                    </div>

                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <!-- Left Column -->
                        <div>
                            <p class="text-blue-500 mt-1">
                                <a href="#" class="hover:underline">Move Borrower to Another Branch</a>
                            </p>
                            <p class="mt-2 ">Create Date: <span class="text-gray-500 font-bold "><?php echo $data['release_date']; ?></span></p>
                            <p class="">Credit Score: <span class="text-gray-500 font-bold "><?php echo $data['principal_amount']; ?></span></p>
                            <p><?php echo $data['Business_Name']; ?>, <?php echo $data['Working_Status']; ?></p>
                
                        </div>

                        <!-- Right Column -->
                        <div>
                            <p><span class="font-semibold">Address: </span> <?php echo $data['Country']; ?></p>
                            <p><span class="font-semibold">City: </span> <?php echo $data['City']; ?></p>
                            <p><span class="font-semibold">Province: </span> <?php echo $data['Province']; ?></p>
                            <p><span class="font-semibold">Zipcode: </span> <?php echo $data['Zip_Code']; ?></p>
                            <button class="mt-2 bg-gray-300 text-gray-900 font-bold px-2 py-1 rounded hover:bg-gray-400">+ Show More</button>
                        </div>


                        <div>
                            <p><span class="font-bold text-gray-600">Email:</span> <?php echo $data['Email']; ?></p>
                            <button class="bg-red-500 text-white  rounded shadow text-1 px-1 hover:bg-red-600">Send Email</button>
                            <button class="bg-blue-500 text-white  rounded shadow text-1 px-1 hover:bg-blue-600">Send pdf file for E-signiture</button>
                            <p><span class="font-bold text-gray-600">Mobile:</span> <?php echo $data['Mobile']; ?></p>
                            <button class="bg-red-500 text-white  rounded shadow text-1 px-1 hover:bg-red-600">Send SMS</button>
                            <p><span class="font-bold text-gray-600">LandLine:</span> <?php echo $data['Landline_Phone']; ?></p>
                            <button class="mt-2 bg-gray-300 text-gray-900 font-bold px-2 py-1 rounded hover:bg-gray-400">+ Show More</button>

                        </div>
                    </div>

                </div>

                <!-- Restriction Section -->
                <div class="bg-gray-50 mt-4 mx-4 p-1 rounded-md shadow-md">
                    <p class="font-semibold text-blue-600"><a href="#">Add/Edit Restriction on Borrower</a></p>
                </div>


                <table class='w-full mt-2 mx-4'>
                    <thead class='bg-blue-200  text-sm font-bold'>
                        <tr class='text-slate-900'>
                            <td>Loan#</td>
                            <td>Release</td>
                            <td>Maturity</td>
                            <td>Principal</td>
                            <td>Interest Rate</td>
                            <td>Interest</td>
                            <td>Fees</td>
                            <td>Penality</td>
                            <td>Due</td>
                            <td>Paid</td>
                            <td>Balance</td>
                            <td>Last Payment</td>
                            <td>Status</td>
                        </tr>
                    </thead>
                    <tbody class='text-sm'>
                        <?php
                        // Database connection
                        $conn = new mysqli('localhost', 'root', '', 'lms1');

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $id = $_GET['loan_id'];

                        // Fetch borrowers data
                        $sql = "SELECT * FROM tbl_borrowers, tbl_loans 
                                                WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id 
                                                AND loan_id = $id";
                        $result = $conn->query($sql);
                        $pptotal = 0;
                        $dtotal = 0;

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Calculate values within the loop
                                $total = ($row['principal_amount'] * 10 / 100) * 12 + $row['principal_amount'];
                                $ptotal = $row['principal_amount'];
                                $pptotal += $ptotal;
                                $dtotal += $total;
                                $interest = ($row['principal_amount'] * 10 / 100) * 12;
                                // Generate table row
                                echo "<tr>
                        
                    <td class='font-semibold py-1'>{$row['loan_number']}</td>
                    <td class='font-semibold py-1'>{$row['release_date']}</td>
                    <td class='font-semibold py-1'>{$row['loan_duration']}  {$row['loan_duration_unit']}</td>
                    <td class='py-1'>" . number_format($row['principal_amount'], 2, '.', ',') . "</td>
                    <td class='py-1'>{$row['interest']} % / {$row['interest_duration']}</td>
                    <td class='py-1'>" . number_format($interest, 2, '.', ',') . "</td>
                    <td class='py-1 '>0</td>
                    <td class='py-1 '>0</td>
                    <td class='py-1'>" . number_format($total, 2, '.', ',') . "</td>
                    <td class='py-1 '>0</td>
                    <td class='py-1'>" . number_format($total, 2, '.', ',') . "</td>
                    <td class='py-1 '>0</td>
                    <td class='py-1'> <button class='bg-[#096a79] px-1 py-0.5 rounded text-white text-xs'>Current</button></td>
                </tr>";
                            }

                            // Generate the summary row using stored values
                            echo "<tr class='bg-slate-300 text-sm'>
            
        </tr>";
                        } else {
                            echo "<tr><td colspan='10' class='text-center py-2'>No borrowers found</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>

                <div class="mx-3 mt-8 p-2">
                <a href="#" class="border p-3 bg-white text-xs text-gray-600">Repayments</a>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Loan Terms</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Loan Schedure</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Pending Dues</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Penalty Setting</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Loan Collateral</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Expenses</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Other Incomes</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Loan Files</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Loan Comments</button>
                <button class="border p-3 bg-gray-600 text-white text-xs hover:bg-gray-900">Audit Logs</button>

                </div>
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
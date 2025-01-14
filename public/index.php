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

        <!-- contents Area -->
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <?php include('../includes/header.php') ?>

            <!-- main header here -->
            <main class="bg-slate-100">
                <div class=" mx-auto max-w-screen-2xl px-4 ">
                    <div class="flex justify-center w-full">
                        <form action="" class="flex w-full ">
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
                    <div class="py-6 flex flex-col gap-2">
                        <div>
                            <h1 class="text-lg font-semibold text-slate-700">MD</h1>
                        </div>
                        <div class="border border-slate-300 bg-white text-slate-700 text-sm p-2">
                            <span><i class="fa-regular fa-circle-question"></i> For any help or ask how to use this
                                service you can contact watch this <a href="#"
                                    class="text-blue-500 font-semibold">video</a> for getting some experience.</span>
                        </div>
                        <div class="flex justify-center bg-red">
                            <form action="">
                                <select name="" id="">
                                    <option value="">Branch1</option>
                                    <option value="">Branch2</option>
                                </select>
                                <select name="" id="">
                                    <option value="RWF" selected>RWF</option>
                                    <option value="USD" selected>USD</option>
                                    <option value="EURO" selected>EURO</option>
                                    <option value="Kesh" selected>Kesh</option>
                                </select>
                            </form>
                        </div>
                        <div class="w-full grid grid-cols-4 mt-6">
                            <div class="border relative rounded-lg shadow-lg w-72 z-10 bg-white overflow-hidden">
                                <!-- Watermark Icon -->
                                <div class="absolute top-6  left-[62%] flex justify-center z-0 items-center">
                                    <i class="fa-solid fa-user text-gray-200 fa-6x"></i>
                                </div>
                                <!-- Content Section -->
                                <div class="p-2 relative z-10">
                                    <?php
                                    // Database connection
                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }


                                    $sel = "SELECT count(*) AS total_borrowers FROM tbl_borrowers";
                                    $result = mysqli_query($conn, $sel);
                                    $data = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <i class="fa-solid fa-plus-circle fa-lg text-primary cursor-pointer"></i>
                                        <span><?php echo $data['total_borrowers']; ?> - Total</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <i class="fa-solid fa-plus-circle fa-lg text-primary cursor-pointer"></i>
                                        <span><?php echo $data['total_borrowers']; ?> - Active</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <i class="fa-solid fa-plus-circle fa-lg text-primary cursor-pointer"></i>
                                        <span>0 - Fully Paid</span>
                                    </div>
                                </div>
                                <!-- Footer Section -->
                                <div class="bg-primary text-white text-center py-1 mt-2 rounded-b-lg">
                                    Borrowers
                                </div>
                            </div>
                            <!-- card 2 -->
                            <div class="border relative rounded-lg shadow-lg w-72 bg-white overflow-hidden">
                                <!-- Watermark Icon -->
                                <div class="absolute top-6  left-[62%] flex justify-center items-center">
                                    <i class="fa-solid fa-user text-gray-200 fa-6x"></i>
                                </div>
                                <!-- Content Section -->
                                <div class="p-2 relative z-10">
                                    <?php
                                    // Database connection
                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }


                                    $sel1 = "SELECT principal_amount, count(loan_id) AS total_loans FROM tbl_loans";
                                    $result1 = mysqli_query($conn, $sel1);
                                    $data1 = mysqli_fetch_assoc($result1);
                                    ?>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php echo number_format($data1['principal_amount'] * $data1['total_loans'], 2, '.', ',') ?> - Total</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php echo number_format($data1['principal_amount'], 2, '.', ',') ?> - This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php echo number_format($data1['principal_amount'], 2, '.', ',') ?> - This Month</span>
                                    </div>
                                </div>
                                <!-- Footer Section -->
                                <div class="bg-primary text-white text-center py-1 mt-2 rounded-b-lg">
                                    <a href="ViewAllBrowsers.php" target="_blank">Principal Released
                                        <i class="fa-solid fa-up-down-left-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- card 3 -->
                            <div class="border relative rounded-lg shadow-lg w-72 bg-white overflow-hidden">
                                <!-- Watermark Icon -->
                                <div class="absolute top-6  left-[62%] flex justify-center items-center">
                                    <i class="fa-solid fa-user text-gray-200 fa-6x"></i>
                                </div>
                                <!-- Content Section -->
                                <div class="p-2 relative z-10">
                                    <?php
                                    // Database connection
                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Fetch borrowers data
                                    $sql = "SELECT * FROM tbl_borrowers, tbl_loans, tbl_bulk_repayments 
                                                WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id AND tbl_loans.loan_id = tbl_bulk_repayments.loan_id";
                                    $result = $conn->query($sql);
                                    $ptotal = 0;
                                    $dtotal = 0;

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Calculate values within the loop
                                            $total = ($row['principal_amount'] * 10 / 100) * 12 + $row['principal_amount'];
                                            $ptotal += $row['amount'];
                                            $d = ($row['principal_amount'] * 2.2);
                                        }
                                    ?>
                                        <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                            <span><?php echo number_format($ptotal, 2, '.', ',')  ?> - Total</span>
                                        </div>
                                        <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                            <span><?php echo  number_format($ptotal, 2, '.', ',') ?> - This Month</span>
                                        </div>
                                        <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                            <span><?php echo number_format($ptotal, 2, '.', ',') ?> - This Year</span>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- Footer Section -->
                                <div class="bg-primary text-white text-center py-1 mt-2 rounded-b-lg">
                                    <a href="ViewRepayments.php" target="_blank"> Collections incl. Deductable Fees
                                        <i class="fa-solid fa-up-down-left-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- card 4 -->
                            <div class="border relative rounded-lg shadow-lg w-72 bg-white overflow-hidden">
                                <!-- Watermark Icon -->
                                <div class="absolute top-6  left-[62%] flex justify-center items-center">
                                    <i class="fa-solid fa-user text-gray-200 fa-6x"></i>
                                </div>
                                <!-- Content Section -->
                                <div class="p-2 relative z-10">
                                    <?php
                                    // Database connection
                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }


                                    $sel = "SELECT count(*) AS total_borrowers FROM tbl_borrowers";
                                    $result = mysqli_query($conn, $sel);
                                    $data = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php echo $data['total_borrowers']; ?> - This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php echo $data['total_borrowers']; ?> - Last 3 Months</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php echo $data['total_borrowers']; ?> - This Month</span>
                                    </div>
                                </div>
                                <!-- Footer Section -->
                                <div class="bg-primary text-white text-center py-1 mt-2 rounded-b-lg">
                                    New Borrowers with First Loan
                                </div>
                            </div>
                        </div>
                        <div class="w-full grid grid-cols-4 space-y-2 mt-6">
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-blue-500 flex justify-center items-center w-20 h-full">
                                    <i class="fa-solid fa-scale-balanced text-white fa-3x"></i>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">TOTAL OUTSTANDING</div>
                                    <div class="text-gray-500  text-sm flex gap-1 items-center">
                                        OPEN LOANS <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>
                                    <?php
                                    // Database connection
                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    // Fetch loans and repayments data
                                    $sql = "
                                        SELECT 
                                            tbl_loans.loan_id, tbl_loans.borrower_id, tbl_loans.loan_number, tbl_loans.principal_amount, 
                                            tbl_loans.interest, tbl_loans.interest_duration, tbl_loans.release_date, 
                                            tbl_borrowers.Title, tbl_borrowers.First_Name, tbl_borrowers.Last_Name,
                                            IFNULL(SUM(tbl_bulk_repayments.amount), 0) AS total_paid,
                                            MAX(tbl_bulk_repayments.collected_date) AS last_payment_date
                                        FROM tbl_loans
                                        LEFT JOIN tbl_borrowers ON tbl_loans.borrower_id = tbl_borrowers.borrower_id
                                        LEFT JOIN tbl_bulk_repayments ON tbl_loans.loan_id = tbl_bulk_repayments.loan_id
                                        GROUP BY tbl_loans.loan_id
                                    ";

                                    $result = $conn->query($sql);
                                    $pptotal = 0;
                                    $dtotal = 0;
                                    $ddtotal = 0;
                                    $paid = 0;
                                    $total_interest = 0;

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            // Calculate balance and totals
                                            $due_amount = ($row['principal_amount'] * 2.2);  // Example balance calculation
                                            $remaining_balance = $due_amount - $row['total_paid'];
                                            $pptotal += $row['principal_amount'];
                                            $ddtotal += $due_amount;
                                            $dtotal += $remaining_balance;
                                            $paid += $row['total_paid'];
                                            $interest = ($row['principal_amount'] * 10 / 100) * 12;
                                            $total_interest += $interest;
                                        }
                                    }
                                    ?>
                                    <div class="text-black font-semibold text-lg mt-1"><?php echo number_format($ddtotal, 2, '.', ',') ?></div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-blue-500 flex justify-center items-center w-20 h-full">
                                    <i class="fa-solid fa-scale-balanced text-white fa-3x"></i>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">PRINCIPAL OUTSTANDING</div>
                                    <div class="text-gray-500  text-sm flex gap-1 items-center">
                                        OPEN LOANS <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>
                                    <div class="text-black font-semibold text-lg mt-1"><?php echo number_format($pptotal, 2, '.', ',') ?></div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-blue-500 flex justify-center items-center w-20 h-full">
                                    <i class="fa-solid fa-scale-balanced text-white fa-3x"></i>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">INTEREST OUTSTANDING</div>
                                    <div class="text-gray-500  text-sm flex gap-1 items-center">
                                        OPEN LOANS <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>
                                    <div class="text-black font-semibold text-lg mt-1"><?php echo number_format($total_interest, 2, '.', ',') ?></div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-blue-500 flex justify-center items-center w-20 h-full">
                                    <i class="fa-solid fa-scale-balanced text-white fa-3x"></i>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">FEES OUTSTANDING</div>
                                    <div class="text-gray-500  text-sm flex gap-1 items-center">
                                        OPEN LOANS <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>
                                    <div class="text-black font-semibold text-lg mt-1">0</div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-blue-500 flex justify-center items-center w-20 h-full">
                                    <i class="fa-solid fa-scale-balanced text-white fa-3x"></i>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">PENALITY OUTSTANDING</div>
                                    <div class="text-gray-500  text-sm flex gap-1 items-center">
                                        OPEN LOANS <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>
                                    <div class="text-black font-semibold text-lg mt-1">0</div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">P</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">PROCESSING LOANS
                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>

                                    <div class="text-black font-semibold text-lg mt-1">0</div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">O</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">OPEN LOANS
                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>

                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- Total</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- Released This Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">F</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">FULL PAID LOANS
                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>

                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">R</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">RESTRUCTURED LOANS
                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>

                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php //echo $data['total_borrowers']; ?> 0-Released This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php //echo $data['total_borrowers']; ?> 0-Released This Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">Df</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">DEFAULT LOANS
                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>

                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">Dn</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">DINIED LOANS

                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>

                                    </div>

                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Month</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center w-80 border rounded-lg shadow-md bg-white overflow-hidden">
                                <!-- Icon Section -->
                                <div class="bg-green-500 flex justify-center items-center w-20 h-full">
                                    <h1 class="text-white text-[50px] font-bold">N</h1>
                                </div>

                                <!-- Content Section -->
                                <div class="px-4 py-2 flex-1">
                                    <div class="text-gray-500 text-sm">NOT TAKEN UP LOANS
                                        <i
                                            class="fa-solid fa-plus-circle fa-md text-primary cursor-pointer stroke-2"></i>
                                    </div>

                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center">
                                        <span><?php //echo $data['total_borrowers']; ?> 0- This Year</span>
                                    </div>
                                    <div class="text-gray-600 font-bold text-lg gap-2 flex items-center mt-2">
                                        <span><?php // echo $data['total_borrowers']; ?> 0- This Month</span>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="flex gap-4 justify-center mb-8">
                        <div class="border rounded-lg shadow-lg bg-white p-4 w-full max-w-3xl mx-auto">
                            <!-- Header -->
                            <div class="flex justify-between items-center pb-2 border-b">
                                <h2 class="text-red-500 font-bold text-lg">Loans Released - Monthly</h2>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <!-- Chart -->
                            <div class="p-4">
                                <canvas id="monthlyChart" class="w-full"></canvas>
                            </div>
                        </div>
                        <div class="border rounded-lg shadow-lg bg-white p-4 w-full max-w-3xl mx-auto">
                            <!-- Header -->
                            <div class="flex justify-between items-center pb-2 border-b">
                                <h2 class="text-red-500 font-bold text-lg">Loans Released - Monthly</h2>
                                <button class="text-gray-400 hover:text-gray-600">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                            <!-- Chart -->
                            <div class="p-4">
                                <canvas id="monthlyChart" class="w-full"></canvas>
                            </div>
                        </div>
                    </div>

                    <script>
                        // Chart.js Configuration
                        const ctx = document.getElementById('monthlyChart').getContext('2d');
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                                datasets: [{
                                    label: 'Loans Released',
                                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                                    borderColor: 'rgb(255, 99, 132)',
                                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                    borderWidth: 2,
                                    pointRadius: 4,
                                    pointBackgroundColor: 'rgb(255, 99, 132)'
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return `Loans Released: ${context.raw}`;
                                            }
                                        }
                                    }
                                },
                                scales: {
                                    y: {
                                        beginAtZero: true,
                                        ticks: {
                                            stepSize: 1
                                        }
                                    }
                                }
                            }
                        });
                    </script>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISOKO</title>
    <link rel="stylesheet" href="./css/output.css">
    <script src="https://kit.fontawesome.com/7ca8ede0f9.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
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
                        <h1 class='text-2xl text-slate-800'>View All Loans</h1>
                    </div>
                    <?php

                    ?>
                    <div class='py-2 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <div class='flex justify-between'>
                            <div class=''>
                                <input type="text" placeholder='Search borrowers' class='text-xs focus:outline-none border border-slate300 px-2 py-2 rounded-sm' />
                            </div>
                            <div class='text-sm space-x-1'>
                                <span>Show</span>
                                <select name="showEntries" id="showEntries" class='border border-slate-400'>
                                    <option value="20">20</option>
                                    <option value="20">50</option>
                                    <option value="20">100</option>
                                    <option value="20">250</option>
                                    <option value="20">300</option>
                                </select>
                                <span>Entries</span>
                            </div>
                        </div>
                        <table class='w-full mt-2'>
                            <thead class='bg-blue-200  text-sm font-bold'>
                                <tr class='text-slate-900 divide-x-2 divide-white'>
                                    <td>View</td>
                                    <td>Release</td>
                                    <td>Name</td>
                                    <td>Loan#</td>
                                    <td>Principal</td>
                                    <td>interest Rate</td>
                                    <td>Due</td>
                                    <td>Paid</td>
                                    <td>Balance</td>
                                    <td>Last Payment</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody class='text-sm divide-y-2 divide-white'>
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

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        // Calculate balance and totals
                                        $due_amount = ($row['principal_amount'] * 2.2);  // Example balance calculation
                                        $remaining_balance = $due_amount - $row['total_paid'];

                                        $pptotal += $row['principal_amount'];
                                        $ddtotal += $due_amount;
                                        $dtotal += $remaining_balance;
                                        $paid += $row['total_paid'];

                                        // Generate table row
                                        echo "<tr>
                <td class='py-1 space-x-1'>
                    <span>
                        <a href='ViewLoansDetail.php?loan_id={$row['loan_id']}'>
                            <button class='border border-slate-300 px-1 rounded'>
                                <i class='fas fa-pencil-alt fa-xs'></i>
                            </button>
                        </a>
                        <a href='#?loan_id={$row['loan_id']}'>
                            <button class='border border-slate-300 px-1 rounded'>
                                <i class='fas fa-message fa-xs'></i>
                            </button>
                        </a>
                    </span>
                </td>
                <td class='font-semibold py-1'>{$row['release_date']}</td>
                <td class='text-black font-semibold py-1 text-sm'>{$row['Title']} {$row['First_Name']} {$row['Last_Name']}</td>
                <td class='py-1'>{$row['loan_number']}</td>
                <td class='py-1'>" . number_format($row['principal_amount'], 2, '.', ',') . "</td>
                <td class='py-1'>{$row['interest']} % / {$row['interest_duration']}</td>
                <td class='py-1 text-sm'>" . number_format($due_amount, 2, '.', ',') . "</td>
                <td class='py-1'>" . number_format($row['total_paid'], 2, '.', ',') . "</td>
                <td class='py-1'>" . number_format($remaining_balance, 2, '.', ',') . "</td>
                <td class='py-1 flex-col'>" . ($row['last_payment_date'] ? "{$row['last_payment_date']} [" . number_format($row['total_paid'], 2, '.', ',') . "]" : "No Payment") . "</td>
                <td class='py-1'>
                    <button class='bg-[#096a79] px-1 py-0.5 rounded text-white text-xs'>Current</button>
                </td>
            </tr>";
                                    }

                                    // Generate summary row
                                    echo "<tr class='bg-slate-300 text-sm'>
            <td colSpan='4'></td>
            <td class='text-black font-bold py-1'>" . number_format($pptotal, 2, '.', ',') . "</td>
            <td></td>
            <td class='text-black font-bold'>" . number_format($ddtotal, 2, '.', ',') . "</td>
            <td class='text-black font-bold'>" . number_format($paid, 2, '.', ',') . "</td>
            <td class='text-black font-bold'>" . number_format($dtotal, 2, '.', ',') . "</td>
            <td colSpan='3'></td>
        </tr>";
                                } else {
                                    echo "<tr><td colspan='10' class='text-center py-2'>No loans found</td></tr>";
                                }

                                $conn->close();
                                ?>
                            </tbody>



                        </table>
                        <div class='pt-3 text-sm text-slate-800'>
                            <span>Showing <?php echo $result->num_rows; ?> entries</span>
                        </div>
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
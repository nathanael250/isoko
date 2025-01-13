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
                <div class=" mx-auto max-w-screen-2xl px-4 text-slate-600">
                    <?php
                    include('../includes/MainSubHeader.php')
                    ?>
                    <div class='py-4'>
                        <h1 class='text-2xl text-slate-800'>View Repayments</h1>
                    </div>
                    <?php
                    include('../includes/TableHeader.php')
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
                                <tr class='text-slate-900'>
                                    <td>Action</td>
                                    <td>Collection Date</td>
                                    <td>Name</td>
                                    <td>Loan#</td>
                                    <td>Collected By</td>
                                    <td>Method</td>
                                    <td>Amount</td>
                                    <td>Receipt</td>
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

                                // Fetch borrowers data
                                $sql = "SELECT * FROM tbl_borrowers, tbl_loans, tbl_bulk_repayments 
                                                WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id AND tbl_loans.loan_id = tbl_bulk_repayments.loan_id";
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
                                        $d = ($row['principal_amount'] * 2.2);
                                        // Generate table row
                                        echo "<tr>
                        <td class='py-1 space-x-1'>
                        <span>
                            <a href='ViewLoansDetail.php?loan_id={$row['loan_id']} '>
                            <button class='border border-slate-300 px-1 rounded'>
                        <i class='fas fa-pencil-alt fa-xs'></i>
                            </button>
                            </a>
                        </span>
                    </td>
                    <td class='font-semibold py-1'>{$row['collected_date']}</td>
                    <td class='font-semibold py-1'>{$row['Title']}  {$row['First_Name']}   {$row['Last_Name']}</td>
                    <td class='py-1'>{$row['loan_id']}</td>
                    <td class='py-1'>{$row['collected_by']}</td>
                    <td class='py-1'>{$row['method']} </td>
                    <td class='py-1'>" . number_format($row['amount'], 2, '.', ',') . "</td>
                    <td class='py-1'>
                    <a href='view_repayment_receipt.php?repayment_id={$row['repayment_id']}' target='_blank'><i class='fa fa-file-pdf-o p-1'></i></a>
                    <i class='fa fa-envelope' aria-hidden='true'></i>
                    </td>
                </tr>";
                                    }

                                    // Generate the summary row using stored values
                                    echo "<tr class='bg-slate-300 text-sm'>
            <td colSpan='6'></td>
            <td class='text-black font-bold'>" . number_format($dtotal, 2, '.', ',') . "</td>
            <td colSpan='2'></td>
        </tr>";
                                } else {
                                    echo "<tr><td colspan='10' class='text-center py-2'>No borrowers found</td></tr>";
                                }

                                $conn->close();
                                ?>
                            </tbody>

                        </table>
                        <div class='pt-3 text-sm text-slate-800'>
                            <span>Showing <?php echo $result->num_rows; ?> entries</span>
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
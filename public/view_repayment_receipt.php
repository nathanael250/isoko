<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <script>
        function printReceipt() {
            window.print();
        }
    </script>
    <style>
        @media print {

            /* Hide elements during print */
            button {
                display: none;
            }
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8">
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'lms1');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $id = isset($_GET['repayment_id']) ? (int) $_GET['repayment_id'] : 0;

    if ($id > 0) {
        $stmt = $conn->prepare("SELECT * FROM tbl_borrowers, tbl_loans, tbl_bulk_repayments 
                               WHERE tbl_borrowers.borrower_id = tbl_loans.borrower_id 
                               AND tbl_loans.loan_id = tbl_bulk_repayments.loan_id 
                               AND tbl_bulk_repayments.repayment_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $due_amount = ($data['principal_amount'] * 2.2);  // Example balance calculation
            $remaining_balance = $due_amount - $data['amount'];
    ?>

            <button onclick="printReceipt()" class="font-semibold rounded border border-blue-500 px-2 text-blue-950 mt-[-23px] hover:bg-blue-600 focus:outline-none focus:ring float-end">
                Print
            </button>
            <div class="w-full mx-auto bg-white p-8 rounded-md">

                <div class="border border-slate-950 mb-2">
                    <h2 class="text-center text-2xl font-bold tracking-wide mb-3 mt-3">P &nbsp&nbsp A &nbsp&nbsp Y &nbsp&nbsp M &nbsp&nbsp E &nbsp&nbsp&nbsp N &nbsp&nbsp T &nbsp&nbsp&nbsp&nbsp&nbsp R &nbsp E &nbsp C &nbsp E &nbsp I &nbsp P &nbsp T</h2>
                </div>
                <div class="flex justify-between items-center border-b-2 pb-4 mb-8 pt-6">
                    <div>
                <?php
                echo "<h1 class='text-[14px] font-bold pb-3'><img src='../assets/isoko.png' class='w-[100px] h-[50px]'></h1>";
                echo "<p class='text-[14px]'>Date: {$data['collected_date']}</p>";
                ?>
                </div>
                    <div>
                        <?php echo "<p class='text-[14px] font-semibold'>{$data['Title']}  {$data['First_Name']}  {$data['Last_Name']}</p>";?>
                    </div>
                </div>
                <?php
                echo "
                <table class='lg:w-full md:w-full mb-8 '>
                    <thead>
                        <tr class='bg-gray-100'>
                            <th class='border md:text-[12px] border-gray-0 px-4 lg:text-[14px] py-2 text-left'>Collection Date</th>
                            <th class='border border-gray-0 px-4 text-[14px] py-2 text-left'>Loan #</th>
                            <th class='border border-gray-0 px-4 text-[14px] py-2 text-left'>Currency</th>
                            <th class='border border-gray-0 px-4 text-[14px] py-2 text-left'>Payment Received</th>
                            <th class='border border-gray-0 px-4 text-[14px] py-2 text-left'>Outstanding Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class='border border-gray-0 text-[14px] px-4 py-2'>{$data['collected_date']}</td>
                            <td class='border border-gray-0 text-[14px] px-4 py-2'>{$data['loan_id']}</td>
                            <td class='border border-gray-0 text-[14px] px-4 py-2'>RWF</td>
                            <td class='border border-gray-0 text-[14px] px-4 py-2'>" . number_format($data['amount'], 2, '.', ',') . "</td>
                            <td class='border border-gray-0 text-[14px] px-4 py-2'>" . number_format($remaining_balance, 2, '.', ',') . "</td>
                        </tr>
                    </tbody>
                </table>

                <div class='flex flex-col text-lg justify-center items-center pt-4'>
                    <p class='pb-3 text-[14px]'>Repayment Method: <span class='font-semibold p-3'>{$data['method']}</span></p>
                    <p class='text-[14px]'>Collected By: <span class='font-semibold p-3'>{$data['collected_by']}</span></p>
                </div>


            </div>
                "
                ?>
                <?php
            } else {
                echo "<p>No repayment record found.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Invalid repayment ID.</p>";
        }
                ?>

                    


                
</body>

</html>
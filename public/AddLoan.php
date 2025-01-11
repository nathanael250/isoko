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
                        <h1 class='text-2xl text-slate-800'>Add Loan</h1>
                    </div>
                    <div class='py-4 my-4 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <form action="loanIn.php" method="post" class='space-y-4 text-sm'>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Loan Product</label>
                                <select name="loan_product" class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option>--- Select Loan Product ---</option>
                                    <option value="Business Loan">Business Loan</option>
                                    <option value="Overseas Worker Loan">Overseas Worker Loan</option>
                                    <option value="Pasioner Loan">Pasioner Loan</option>
                                    <option value="Personal Loan">Personal Loan</option>
                                    <option value="Student Loan">Student Loan</option>
                                </select>
                                <!-- <input type="text" name="loan_product" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' /> -->
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Add/Edit Loan Products</a>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Borrower</label>
                                <select name="borrower" class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option>--- Select Borrower ---</option>
                                    <?php
                                    // Database connection
                                    $conn = new mysqli('localhost', 'root', '', 'lms1');

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $sql = "SELECT * FROM tbl_borrowers";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($data = $result->fetch_assoc()) {

                                    ?>

                                            <option value="<?php echo $data['borrower_id']?>"><?php echo $data['Last_Name'] . "  " . $data['First_Name'] . " - " . $data['Business_Name'] . " - " . $data['borrower_id'] ?></option>
                                    <?php
                                        }
                                    } ?>
                                </select>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Loan #</label>
                                <?php
                                $sel = "SELECT loan_id FROM tbl_loans ORDER BY loan_id DESC LIMIT 1";
                                $result = mysqli_query($conn, $sel);
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <input type="number" name="loan" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' value="<?php echo $data['loan_id'] + 1; ?>" />
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Set Custom Loan #</a>
                            </div>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Loan Terms (required fields):</span>
                            </div>


                            <!-- {/* end of section */} -->
                            <span class='text-red-500 text-[13px] font-bold'>Principal</span>


                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Interest Method</label>
                                <select name="interest_method" class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="Cash">Cash</option>
                                </select>
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Add/Edit Disbursed By</a>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Principal Amount</label>
                                <input type="text" name="principal_amount" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Principle Amount' />

                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Loan Release Date</label>
                                <input type="date" name="release_date" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' />
                            </div>
                            <hr class='py-2'>
                            </hr>

                            <!-- {/* end of section */} -->
                            <span class='text-red-500 text-[13px] font-bold'>Interest</span>

                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Interest Method</label>
                                <select name="interest" class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="Flat Rate">Flat Rate</option>
                                    <option value="Reducing Balance-Equal Installment">Reducing Balance-Equal Installment</option>
                                    <option value="Reducing Balance-Equal Principle">Reducing Balance-Equal Principle</option>
                                    <option value="Interest Only">Interest Only</option>
                                    <option value="Compound Interest">Compound Interest</option>
                                </select>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-start'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Principal Amount</label>
                                <div class='col-span-6'>
                                    <input type="radio" name='PAmount' value="I want interest to be percentage % based" /> <span>I want interest to be percentage % based</span><br />
                                    <input type="radio" name='PAmount' value="I want interest to be a fixed amount per cycle" /> <span>I want interest to be a fixed amount per cycle</span>
                                </div>

                            </div>
                            <div class="grid grid-cols-12 space-x-8 items-center">
                                <label htmlFor="loan-interest" class="col-span-3 flex justify-end font-bold text-sm text-slate-800">
                                    Loan Interest %
                                </label>

                                <div class="col-span-6 flex space-x-4">
                                    <input type="number" id="loan-interest" name="interest" class="border border-slate-300 px-4 py-1 w-full rounded" placeholder="%" />
                                    <select name="interest_duration" class="border border-slate-300 px-4 py-1 w-full rounded">
                                        <option value="Per Day">Per Day</option>
                                        <option value="Per Week">Per Week</option>
                                        <option value="Per Month">Per Month</option>
                                        <option value="Per Year">Per Year</option>
                                        <option value="Per Loan">Per Loan</option>
                                    </select>
                                </div>
                            </div>



                            <hr class='py-2'>
                            </hr>


                            <span class='text-red-500 text-[13px] font-bold'>Interest</span>
                            <div class="grid grid-cols-12 space-x-8 items-center">
                                <label htmlFor="loan-interest" class="col-span-3 flex justify-end font-bold text-sm text-slate-800">
                                    Loan Duration
                                </label>

                                <div class="col-span-6 flex space-x-4">
                                    <button onClick={handleDecrement} class="bg-gray-200 px-4 py-1 hover:bg-gray-300">-</button>

                                    <input type="number" name="loan_duration" placeholder="Enter number Here" class="w-full text-center border-x outline-none" />

                                    <button onClick={handleIncrement} class="bg-gray-200 px-4 py-1 hover:bg-gray-300">+</button>
                                    <select class="border border-slate-300 px-4 py-1 w-full rounded">

                                        <option value="Days">Days</option>
                                        <option value="Weeks">Weeks</option>
                                        <option value="Months">Months</option>
                                        <option value="Years">Years</option>
                                    </select>
                                </div>
                            </div>

                            <hr class='py-2'>
                            </hr>
                            <span class='text-red-500 text-[13px] font-bold'>Repayments</span>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Repayment Cycle</label>
                                <select name="repayment_cycle" class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="Daily">Daily</option>
                                    <option value="Weekly">Weekly</option>
                                    <option value="Biweekly">Biweekly</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Quarterly">Quarterly</option>
                                    <option value="Every 4 Months">Every 4 Months</option>
                                    <option value="Semi-Annual">Semi-Annual</option>
                                    <option value="Every 9 Months">Every 9 Months</option>
                                    <option value="Yearly">Yearly</option>
                                    <option value="Lump-Sum">Lump-Sum</option>
                                </select>
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Add Repayment Cycle</a>
                            </div>
                            <div class="grid grid-cols-12 space-x-8 items-center">
                                <label htmlFor="loan-interest" class="col-span-3 flex justify-end font-bold text-sm text-slate-800">
                                    Number of Repayments
                                </label>

                                <div class="col-span-3 flex space-x-4">
                                    <button onClick={handleDecrement} class="bg-gray-200 px-4 py-1 hover:bg-gray-300">-</button>
                                    <!-- {/* Input Field */} -->
                                    <input type="number" name="numberofrepayment" placeholder="Enter Number Here" class="w-full text-center border-x outline-none" />
                                    <!-- {/* Increment Button */} -->
                                    <button onClick={handleIncrement} class="bg-gray-200 px-4 py-1 hover:bg-gray-300">+</button>
                                </div>
                            </div>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Account: Select financial account for journal entry</span>
                            </div>
                            <div class='border border-slate-200 bg-slate-100 px-4 py-3 rounded'>
                                <p>Select the source of the <b>Principal Amount</b> (above) that will be disbursed to the borrower. This will only show in <b>Accounting</b> if the <b>Loan Status</b> (above) is set to <b>Open, Defaulted,</b> or <b>Fully Paid
                                    </b> which means that the funds have been disbursed.</p>
                            </div>
                            <div class="flex justify-between px-8">
                                <button type="button" class="px-2 py-1 bg-blue-600 text-white text-sm rounded">Back</button>
                                <button type="submit" class="bg-primary text-white text-sm px-2 py-1 rounded" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait">Submit</button>
                            </div>
                        </form>
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
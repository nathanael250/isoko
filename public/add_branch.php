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
                        <h1 class='text-2xl text-slate-800'>Add Branch</h1>
                    </div>
                    <div class='py-4 my-4 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <form action="branchIn.php" class='space-y-4 text-sm' method="post">
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Required Fields:</span>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch Name</label>
                                <input type="text" name="branch_name" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Business Loan' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch open date</label>
                                <input type="date" name="branch_date" class='col-span-7 border border-slate-300 px-4 py-1' />
                            </div>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Optional Fields: Override Accounts Settings</span>
                            </div>


                            <!-- {/* end of section */} -->



                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Country</label>

                                <select name="country" class="col-span-7 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputCountry" required>

                                    <option value="PL">Poland</option>
                                    <option value="RU">Russian Federation</option>
                                    <option value="RW" selected>Rwanda</option>
                                    <option value="TN">Tunisia</option>
                                    <option value="UG">Uganda</option>
                                </select>

                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Currency</label>
                                <!-- <input type="date"  class='col-span-7 border border-slate-300 px-4 py-1' /> -->
                                <select class="col-span-7 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" id="inputCountry" required name="branch_currency" id="inputCurrency">
                                    <option value=""></option>
                                    <option value="PHP">PHP - ₱</option>
                                    <option value="RUB">RUB - руб</option>
                                    <option value="RWF" selected="">RWF - ر.س</option>
                                    <option value="SBD">SBD - $</option>
                                    <option value="SHP">SHP - £</option>

                                </select>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Date Format</label>
                                <input type="text" name="date_format" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Business Loan' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Currency in Words</label>
                                <input type="text" name="currency_in_word" class='col-span-7 border border-slate-300 px-4 py-1' />
                            </div>
                            <!-- end of section -->
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Optional Fields Address</span>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch Address</label>
                                <input type="text" name="branch_address" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Branch Address' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch city</label>
                                <input type="text" name="branch_city" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Branch city' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch Province</label>
                                <input type="text" name="branch_province" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Branch Province' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch Zipcode</label>
                                <input type="text" name="branch_zipcode" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Branch Zipcode' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch LandLine</label>
                                <input type="text" name="branch_landline" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Branch LandLine' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Branch Mobile</label>
                                <input type="number" name="branch_mobile" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Branch Mobile' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>

                                <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                    <span>Optional Fields: Loan Restrictions</span>
                                </div>

                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Minimum Loan Amount</label>
                                <input type="text" name="min_amount" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='number or decimal' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Maximum Loan Amount</label>
                                <input type="text" name="max_amount" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='number or decimal' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Minimum Loan Interest Rate</label>
                                <input type="text" name="min_loan_interest" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='numbers or decimal' />
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Maximum Loan Interest Rate</label>
                                <input type="text" name="max_loan_interest" class='col-span-7 border border-slate-300 px-4 py-1' placeholder='Numbers or decimal' />
                            </div>

                            <div class="flex justify-between px-8">
                                <button type="button" class="px-2 py-1 bg-blue-600 text-white text-sm rounded">Back</button>
                                <button type="submit" class="bg-primary text-white text-sm px-2 py-1 rounded" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait">Submit</button>
                            </div>
                        </form>
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
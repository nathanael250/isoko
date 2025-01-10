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
                        <form action="" class='space-y-4 text-sm'>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Loan Product</label>
                                <input type="text" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' />
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Add/Edit Loan Products</a>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Borrower</label>
                                <select class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="">Choose Borrowe or Search by Name</option>
                                </select>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Loan #</label>
                                <input type="text" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' />
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Set Custom Loan #</a>
                            </div>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Loan Terms (required fields):</span>
                            </div>


                            <!-- {/* end of section */} -->
                            <span class='text-red-500 text-[13px] font-bold'>Principal</span>


                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Interest Method</label>
                                <select class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="">Cash</option>
                                </select>
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Add/Edit Disbursed By</a>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Principal Amount</label>
                                <input type="text" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' />

                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Loan Release Date</label>
                                <input type="date" class='col-span-6 border border-slate-300 px-4 py-1' placeholder='Business Loan' />
                            </div>
                            <hr class='py-2'>
                            </hr>

                            <!-- {/* end of section */} -->
                            <span class='text-red-500 text-[13px] font-bold'>Interest</span>

                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Interest Method</label>
                                <select class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="">Flat Rate</option>
                                </select>
                            </div>
                            <div class='grid grid-cols-12 space-x-8 items-start'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Principal Amount</label>
                                <div class='col-span-6'>
                                    <input type="radio" name='PAmount' /> <span>I want interest to be percentage % based</span><br />
                                    <input type="radio" name='PAmount' /> <span>I want interest to be a fixed amount per cycle</span>
                                </div>

                            </div>
                            <div class="grid grid-cols-12 space-x-8 items-center">
                                <label htmlFor="loan-interest" class="col-span-3 flex justify-end font-bold text-sm text-slate-800">
                                    Loan Interest %
                                </label>

                                <div class="col-span-6 flex space-x-4">
                                    <input type="date" id="loan-interest" class="border border-slate-300 px-4 py-1 w-full rounded" />
                                    <select class="border border-slate-300 px-4 py-1 w-full rounded">
                                        <option value="">Per Day</option>
                                        <option value="">Per Week</option>
                                        <option value="">Per Month</option>
                                        <option value="">Per Year</option>
                                        <option value="">Per Loan</option>
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

                                    <input type="text" value={value} readOnly class="w-full text-center border-x outline-none" />

                                    <button onClick={handleIncrement} class="bg-gray-200 px-4 py-1 hover:bg-gray-300">+</button>
                                    <input type="date" id="loan-interest" class="border border-slate-300 px-4 py-1 w-full rounded" />
                                    <select class="border border-slate-300 px-4 py-1 w-full rounded">
                                        <option value=""></option>
                                        <option value="">Days</option>
                                        <option value="">Weeks</option>
                                        <option value="">Months</option>
                                        <option value="">Years</option>
                                    </select>
                                </div>
                            </div>

                            <hr class='py-2'>
                            </hr>
                            <span class='text-red-500 text-[13px] font-bold'>Repayments</span>
                            <div class='grid grid-cols-12 space-x-8 items-center'>
                                <label htmlFor="" class=' col-span-3 flex justify-end font-bold text-sm text-slate-800'>Interest Method</label>
                                <select class='col-span-6 border border-slate-300 px-4 py-1'>
                                    <option value="">Daily</option>
                                    <option value="">Weekly</option>
                                    <option value="">Biweekly</option>
                                    <option value="">Monthly</option>
                                    <option value="">Quarterly</option>
                                    <option value="">Every 4 Months</option>
                                    <option value="">Semi-Annual</option>
                                    <option value="">Every 9 Months</option>
                                    <option value="">Yearly</option>
                                    <option value="">Lump-Sum</option>
                                </select>
                                <a href="#" class='col-span-3 text-blue-500 text-sm'>Add Repayment Cycle</a>
                            </div>
                            <div class="grid grid-cols-12 space-x-8 items-center">
                                <label htmlFor="loan-interest" class="col-span-3 flex justify-end font-bold text-sm text-slate-800">
                                    Loan Duration
                                </label>

                                <div class="col-span-3 flex space-x-4">
                                    <button onClick={handleDecrement} class="bg-gray-200 px-4 py-1 hover:bg-gray-300">-</button>
                                    <!-- {/* Input Field */} -->
                                    <input type="text" value={value} readOnly class="w-full text-center border-x outline-none" />
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
        window.toggleMenu = function (menuId) {
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
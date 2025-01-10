<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/output.css">
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
                                <tr class='text-slate-900'>
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
                            <tbody class='text-sm'>
                                <tr class='text-black text-center py-2'>
                                    <td colSpan={11} class='py-1'>No data found. to add a loan, visit Loans(left menu) ---<b>Add Loan</b></td>
                                </tr>
                                <tr class='bg-slate-300 text-sm'>
                                    <td colSpan={4}></td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td></td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td colSpan={2}></td>
                                </tr>
                            </tbody>

                        </table>
                        <div class='pt-3 text-sm text-slate-800'>
                            <span>Showing 1 to 1 of 1 entries</span>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
</body>

</html>
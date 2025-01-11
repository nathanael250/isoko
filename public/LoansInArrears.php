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
                        <h1 class='text-2xl text-slate-800'>Loans in Arrears</h1>
                    </div>
                    <div>
                        <span class='text-sm'>Loans that are overdue and have not received any payment for the last collection date. If you enter a part-payment for the last collection date for a loan, it wil be marked as <b>Arrears</b> status instead.</span>
                    </div>
                    <div class='my-8 text-sm bg-white inline px-1 py-1'>
                        <b>Advanced Search: </b><a href="" class='text-blue-600 text-sm font-semibold'>Click here to Show</a>
                    </div>

                    <div class='py-4 my-4 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <div class='grid grid-cols-12 items-center gap-5'>
                            <label htmlFor="" class='text-sm font-bold text-slate-900 col-span-5 text-right'>Overdue By</label>
                            <select name="" id="" class='border border-slate-500 col-span-4 px-2 py-1'>
                                <option value="">1 day</option>
                            </select>
                            <div class='text-sm col-span-3'>
                                <button class='px-3 py-1.5 bg-[#188863] text-white'>Search!</button>
                                <button class='px-3 py-1.5 bg-blue-950 text-white'>Reset!</button>
                            </div>
                        </div>
                    </div>
                    <TabelHeader2 />
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
                                    <td>Name</td>
                                    <td>Loan#</td>
                                    <td>Principal</td>
                                    <td>Due</td>
                                    <td>Paid</td>
                                    <td>PastDue</td>
                                    <td>Amortization</td>
                                    <td>PendingDue</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody class='text-sm'>
                                <tr class='text-black text-center py-2'>
                                    <td colSpan={10} class='py-1'>No data found. No loans found.</td>
                                </tr>
                                <tr class='bg-slate-300 text-sm'>
                                    <td colSpan={3}></td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td></td>
                                </tr>
                            </tbody>

                        </table>
                        <div class='pt-3 text-sm text-slate-800'>
                            <span>Showing 1 to 1 of 1 entries</span>
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
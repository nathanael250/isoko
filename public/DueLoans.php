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
                        <h1 class='text-2xl text-slate-800'>Due Loans</h1>
                    </div>
                    <div class='py-4 my-4 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <h1 class='font-bold text-slate-700'>Date Range</h1>

                        <form action="" class='mt-3'>
                            <div class='flex gap-8 items-center'>
                                <input type="date" class='w-full border border-slate-300 px-2 py-1 rounded-sm' />
                                <span>to</span>
                                <input type="date" class='w-full border border-slate-300 px-2 py-1 rounded-sm' />
                            </div>
                            <div class='flex flex-col gap-2 text-sm text-black font-semibold mt-4 px-3'>
                                <span><input type="checkbox" name='range' /> Include due loans with zero pending due amounts</span>
                                <span><input type="checkbox" name='range' /> Include loans where system generated penalty is added between the above dates</span>
                            </div>
                            <div class='flex justify-between mt-6'>
                                <button class='px-3 py-1 bg-[#188863] text-white'>Search!</button>
                                <button class='px-3 py-1 bg-blue-950 text-white'>Reset!</button>
                            </div>


                        </form>
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
                                    <td>NextDue</td>
                                    <td>LastPayment</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody class='text-sm'>
                                <tr class='text-black text-center py-2'>
                                    <td colSpan={12} class='py-1'>No data found. No loans found.</td>
                                </tr>
                                <tr class='bg-slate-300 text-sm'>
                                    <td colSpan={3}></td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td colSpan={3}></td>
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
            window.toggleMenu = function(menuId) {
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
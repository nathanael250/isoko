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
    <style>
        tr>td:first-child {
            /* Styles for the first <td> in the <tr> */
            background-color: #94a3b8;
            font-weight: bold;
        }
    </style>
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
                        <h1 class='text-2xl text-slate-800'>Add Bulk Repayments</h1>
                    </div>
                    <div class='py-1 my-4 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <span class="text-sm text-slate-800">
                            You can use this page to add bulk repayments. Please be careful that you select the right loan. You can enter as many rows as you like.
                        </span>
                        <table class="w-full mt-2">
                            <thead>
                                <tr class=" bg-[#0073B7] text-white divide-x-2 divide-white">
                                    <th>Row</th>
                                    <th>Loan</th>
                                    <th>Amount</th>
                                    <th>Method</th>
                                    <th>Collection Date</th>
                                    <th>Collection By</th>
                                    <th>Description(optional)</th>
                                    <th>Accounting Cash/Bank</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y-2 divide-white text-sm">
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                        <span class="text-[10px] text-blue-500 cursor-pointer">Set Default</span>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>

                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td>1</td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="" disabled selected>Choose Loan or Search by Borrower Name</option>
                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="text" placeholder="Amount" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                            <option value="">ATM</option>
                                            <option value="">Cheque</option>
                                            <option value="">Paypal</option>
                                            <option value="">Online Transfer</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Select here</option>

                                        </select>
                                    </td>
                                    <td class="p-2">
                                        <input type="date" placeholder="Description" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    </td>
                                    <td class="p-2">
                                        <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                            <option value="">Cash</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="flex justify-between pl-10 pr-6 mt-5">
                            <span><b>Total:</b>0.00</span>
                            <button class=" bg-blue-600 px-2 py-1 text-white rounded-sm">Submit</button>
                        </div>
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
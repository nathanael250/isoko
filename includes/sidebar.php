<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <aside
        class="fixed  left-0 top-0 z-9999 flex h-screen w-48 flex-col overflow-y-auto bg-[#222d32] duration-300 ease-linear lg:static lg:translate-x-0">
        <!-- sidebar header -->
        <div class="flex items-center bg-white text-white justify-center px-4 py-3">
            <a href="../public/index.php">
                <img src="../assets/isoko.png" alt="logo" class="w-20 cursor-pointer">
            </a>
        </div>
        <div
            class="flex flex-col overflow-y-auto scrollbar-thin scrollbar-thumb-slate-400 scrollbar-track-transparent duration-300 ease-linear">
            <nav id="sidebar" class="mt-5 px-4">
                <ul class="text-slate-400 flex flex-col gap-3 text-sm">
                    <li>
                        <button
                            class="group relative flex items-center gap-2.5 rounded-sm duration-500 ease-in-out w-full"
                            onclick="toggleMenu('menu1')">
                            <i class="fa-solid fa-user"></i>
                            <span>Borrowers</span>
                            <i
                                class="fa-solid fa-chevron-left fa-xs flex-grow group-hover:rotate-90 transition-transform absolute right-0"></i>

                        </button>
                        <ul id="menu1" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="ViewAllBrowsers.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Borrowers
                                </a>
                            </li>
                            <li>
                                <a href="add-borrower.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Borrowers
                                </a>
                            </li>

                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Borrower Groups
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Send Email to All
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Invite Borrower
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-file"></i>
                            <span>Collection Sheets</span>
                            <i class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>

                    </li>

                    <li>
                        <button
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full"
                            onclick="toggleMenu('menu2')">
                            <i class="fa-solid fa-scale-balanced"></i><span>Loans</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu2" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="ViewAllLoans.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View All Loans
                                </a>
                            </li>
                            <li>
                                <a href="AddLoan.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Loan
                                </a>
                            </li>

                            <li>
                                <a href="DueLoans.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Due Loans
                                </a>
                            </li>
                            <li>
                                <a href="MissedRepayments.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Missed Repayments
                                </a>
                            </li>
                            <li>
                                <a href="LoanInArrears.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loans in Arrays
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    No repaymets
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Past Maturity Date
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Principal Outstanding
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    1 Months Late Loans
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    3 Months Late Loans
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loan Calculator
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Guarantors
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loan Comments
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Approve Loans
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full"
                            onclick="toggleMenu('menu3')">
                            <i class="fa-solid fa-dollar-sign"></i><span>Repayments</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu3" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="viewRepayments.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Repayments
                                </a>
                            </li>
                            <li>
                                <a href="add_bulk_repayments.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Bulk Repayments
                                </a>
                            </li>
                            <li>
                                <a href="uploadRepayments_csv.php" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Uplad Repayments-CSV file
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Repayments Charts
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Approve Repaymentss
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="#"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out truncate overflow-hidden w-full">
                            <i class="fa-solid fa-dollar-sign"></i><span>Collateral Register</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-calendar-days"></i><span>Calendar</span>
                        </a>
                    </li>
                    <li>
                        <button onclick="toggleMenu('menu4')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-file"></i><span>Collection Sheets</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu4" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Daily Collection Sheet
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Missed Repayments Sheet
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Past Maturity Date Loans
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Send SMS
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Send Email
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleMenu('menu5')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out truncate overflow-hidden w-full">
                            <i class="fa-solid fa-user-plus"></i><span>Investors</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu5" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Investors
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Investpr
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Send SMS to All Investors
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Send Email to All Investors
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Invite Investors
                                </a>
                            </li>

                        </ul>

                    </li>
                    <li>
                        <button onclick="toggleMenu('menu6')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out truncate overflow-hidden w-full">
                            <i class="fa-solid fa-briefcase"></i><span>Investors Accounts</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu6" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View All Investor Accounts
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Investor Account
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View All Loan Investments
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Invesptr Transactions
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Approve Loan Investments
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleMenu('menu7')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-share"></i><span>Expenses</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu7" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Expenses
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Expense
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Upload Expenses - CVS File
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleMenu('menu8')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-plus"></i><span>Other Income</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu8" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Other Income
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Other Income
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Upload Other Income-CSV file
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleMenu('menu9')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-briefcase-medical"></i><span>Asset Management</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu9" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    View Asset Management
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Add Asset Management
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button onclick="toggleMenu('menu10')"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-industry"></i><span>Reports</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </button>
                        <ul id="menu10" class="hidden pl-4 mt-2 space-y-2 w-full overflow-hidden ">
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Browsers Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loan Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loan Arrears Aging Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Collections Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Collector Report (Staff)
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Deferred Income
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Defferred Income Monthly
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Pro-Data Collections Months
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Disbutsement Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Fees Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loan Officer Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Loan Products Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    MFRS Ratios
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Daily Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Monthly Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Outstanding Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    Portfolio At Risk (PAR)
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    At a Glance Report
                                </a>
                            </li>
                            <li>
                                <a href="#" class="block hover:text-white rounded-md truncate overflow-hidden">
                                    All Entries
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="group relative flex items-center gap-2.5 rounded-sm duration-300 ease-in-out w-full">
                            <i class="fa-solid fa-book"></i><span>Accountings</span><i
                                class="fa-solid fa-chevron-left fa-xs flex-grow absolute right-0"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </aside>
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

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
        <?php include('../includes/sidebar.php'); ?>
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            <?php include('../includes/Navbar.php'); ?>
            <main class="bg-slate-200 pb-20">
                <div class="mx-auto max-w-screen-2xl px-4 text-slate-600">
                    <div class="flex justify-center w-full">
                        <form action="" class="flex w-full text-xs">
                            <div>
                                <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    <option value="">Borrowers</option>
                                    <option value="">option2</option>
                                    <option value="">option3</option>
                                </select>
                            </div>
                            <div>
                                <select name="" id="" class="border border-slate-400 px-2 py-1 focus:outline-none">
                                    <option value="">Branch</option>
                                    <option value="">option2</option>
                                    <option value="">option3</option>
                                </select>
                            </div>
                            <div class="flex-1">
                                <input type="text" class="w-full px-2 py-1 focus:outline-none text-slate-600" placeholder="Search" />
                            </div>
                            <div class="border cursor-pointer">
                                <span class="p-2 text-center">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class='py-4'>
                        <h1 class='text-2xl text-slate-800'>View Borrowers</h1>
                    </div>
                    <?php include('../includes/TableHeader.php'); ?>
                    <div class='py-2 px-4 bg-white border-t-[3px] border-blue-300 rounded'>
                        <div class='flex justify-between'>
                            <div>
                                <input type="text" placeholder='Search borrowers' class='text-xs focus:outline-none border border-slate-300 px-2 py-2 rounded-sm' />
                            </div>
                            <div class='text-sm space-x-1'>
                                <span>Show</span>
                                <select name="showEntries" id="showEntries" class='border border-slate-400'>
                                    <option value="20">20</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                    <option value="250">250</option>
                                    <option value="300">300</option>
                                </select>
                                <span>Entries</span>
                            </div>
                        </div>
                        <table class='w-full mt-2'>
                            <thead class='bg-blue-200 text-sm font-bold'>
                                <tr class='text-slate-900'>
                                    <td>View</td>
                                    <td>Full Name</td>
                                    <td>Business</td>
                                    <td>Unique</td>
                                    <td>Mobile</td>
                                    <td>Email</td>
                                    <td>Total Paid</td>
                                    <td>Open Loans Balance</td>
                                    <td>Status</td>
                                    <td>Action</td>
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
                                $sql = "SELECT * FROM tbl_borrowers";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>
                                            <td class='py-1'>
                                                <button class='bg-[#096a79] px-1 py-0.5 rounded text-white text-xs'>Loans</button>
                                                <button class='bg-[#2b89f4] px-1 py-0.5 rounded text-white text-xs'>Saving</button>
                                            </td>
                                            <td class='font-semibold text-black py-1'>{$row['First_Name']} {$row['Last_Name']}</td>
                                            <td class='py-1'>{$row['Business_Name']}</td>
                                            <td class='py-1'>{$row['borrower_id']}</td>
                                            <td class='py-1'>{$row['Mobile']}</td>
                                            <td class='text-blue-600 py-1'>{$row['Email']}</td>
                                            <td class='py-1 text-right'>0</td>
                                            <td class='py-1 text-right'>0</td>
                                            <td class='py-1'> {$row['Working_Status']} </td>
                                            <td class='py-1 space-x-1'>
                                                <span>
                                                <a href='borrowerEdit.php?borrower_id={$row['borrower_id']} '>
                                                <button class='border border-slate-300 px-1 rounded'>
                                                    <i class='fas fa-pencil-alt fa-xs'></i>
                                                </button>
                                                </a></span>
                                                <span>
                                                <a href='borrowerDelete.php?borrower_id={$row['borrower_id']} '>
                                                <button class='border border-slate-300 px-1 rounded'>
                                                    <i class='fas fa-times fa-xs'></i>
                                                </button>
                                                </a>
                                                </span>
                                            </td>
                                        </tr>";
                                    }?>
                                    <tr class='bg-slate-300 text-sm'>
                                    <td colSpan="6"></td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td class='text-black font-bold text-right'>0.00</td>
                                    <td colSpan="2"></td>
                                </tr>
                                <?php
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

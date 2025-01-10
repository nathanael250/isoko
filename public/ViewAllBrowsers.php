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
                                <input type="text" class="w-full px-2 py-1 focus:outline-none text-slate-600"
                                    placeholder="Search" />
                            </div>
                            <div class="border cursor-pointer">
                                <span class="p-2 text-center">
                                    <FontAwesomeIcon icon={faMagnifyingGlass} />
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class='py-4'>
                        <h1 class='text-2xl text-slate-800'>View Borrowers</h1>
                    </div>
                    <?php
                    include('TableHeader.php')
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
                                    <td>Full Name</td>
                                    <td>Business</td>
                                    <td>Unique</td>
                                    <td>Mobile</td>
                                    <td>View</td>
                                    <td>Total Paid</td>
                                    <td>Open Loans Balance</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody class='text-sm'>
                                <tr class=''>
                                    <td class='py-1'>
                                        <button class='bg-[#096a79] px-1 py-0.5 rounded text-white text-xs'>Loans</button>
                                    </td>
                                    <td class='font-semibold  text-black py-1'>Mr. NIYOGUSHIMWA Natanael</td>
                                    <td class='py-1'>BYTECANVAS</td>
                                    <td class='py-1'>1000001</td>
                                    <td class='py-1'>0781796824</td>
                                    <td class='text-blue-600 py-1'>nathanaelniyogushimwa@gmail.com</td>
                                    <td class='py-1 text-right'>0</td>
                                    <td class='py-1 text-right'>0</td>
                                    <td class='py-1'></td>
                                    <td class='py-1 space-x-1'>
                                        <span><button class=' border border-slate-300 px-1 rounded'>
                                                <FontAwesomeIcon icon={faPencil} class='fa-xs' />
                                            </button></span>
                                        <span><button class='border border-slate-300 px-1 rounded'>
                                                <FontAwesomeIcon icon={faXmark} class='fa-xs' />
                                            </button></span>
                                    </td>

                                </tr>
                                <tr class='bg-slate-300 text-sm'>
                                    <td colSpan={6}></td>
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
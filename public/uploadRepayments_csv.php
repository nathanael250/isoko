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
                        <h1 class='text-2xl text-slate-800'>Upload Repayments from CSV file</h1>
                    </div>
                    <div class='py-4 my-4 px-4 bg-white  border-t-[3px] border-blue-300 rounded'>
                        <form action="" class='space-y-4 text-sm'>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Select the options that apply to all repayments in the file:</span>
                            </div>
                            <div class='grid grid-cols-12 space-x-6 items-start'>
                                <label htmlFor="" class=' col-span-4 flex justify-end font-bold text-sm text-slate-800'>Do you have Loan # column in the repayments file?</label>
                                <div class=" col-span-7 flex flex-col text-slate-900">
                                    <div class="flex gap-2">
                                        <input type="radio"><span>No</span><input type="radio"><span>Yes</span>
                                    </div>
                                    <span>If you select No above, a Loan # column will be added in Step 2 so you can select the corresponding loan # for each repayment.</span>
                                </div>
                            </div>
                            <div class='grid grid-cols-12 space-x-6 items-start'>
                                <label htmlFor="" class=' col-span-4 flex justify-end font-bold text-sm text-slate-800'>Do you have a Collection Method column in the repayments file?
                                </label>
                                <div class=" col-span-7 flex flex-col text-slate-900">
                                    <div class="flex gap-2">
                                        <input type="radio"><span>No</span><input type="radio"><span>Yes</span>
                                    </div>
                                    <span>If you select No above, a Collection Method column will be added in Step 2 so you can select the collection method for each repayment.</span>
                                </div>
                            </div>
                            <div class='grid grid-cols-12 space-x-6 items-start'>
                                <label htmlFor="" class=' col-span-4 flex justify-end font-bold text-sm text-slate-800'>Do you have a Collection By column in the repayments file?
                                </label>
                                <div class=" col-span-7 flex flex-col text-slate-900">
                                    <div class="flex gap-2">
                                        <input type="radio"><span>No</span><input type="radio"><span>Yes</span>
                                    </div>
                                    <span>If you select No above, a Collection By column will be added in Step 2 so you can select the collector for each repayment.</span>
                                </div>
                            </div>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Select the options that apply to all repayments in the file:</span>
                            </div>
                            <div class='grid grid-cols-12 space-x-6 items-start'>
                                <label htmlFor="" class=' col-span-4 flex justify-end font-bold text-sm text-slate-800'>Do you have a Collection By column in the repayments file?
                                </label>
                                <div class=" col-span-7 flex flex-col text-slate-900">
                                    <div class="flex gap-2">
                                        <input type="radio"><span>No</span><input type="radio"><span>Yes</span>
                                    </div>
                                    <span>If you select Yes above, the options you have selected on this page will be saved so when you load this page again for this branch, the options will be preselected. This will save you time from entering them again.</span>
                                </div>
                            </div>
                            <div class='bg-slate-300 px-2 py-3 text-[15px] rounded-sm text-black font-semibold '>
                                <span>Upload your file:</span>
                            </div>
                            <div class='grid grid-cols-12 space-x-6 items-start'>
                                <label htmlFor="" class=' col-span-4 flex justify-end font-bold text-sm text-slate-800'>Columns Separated By (optional)
                                </label>
                                <div class=" col-span-7 flex flex-col text-slate-900">
                                    <select name="" id="" class="border border-slate-300">
                                        <option value="">Comma,</option>
                                        <option value="">Semicolon;</option>
                                    </select>
                                    <span class="text-xs">Leave this empty so the system can auto detect. Only select this, if after uploading, you are seeing all the data in 1 column on Step 2.</span>
                                </div>
                            </div>
                            <div class='grid grid-cols-12 space-x-6 items-start'>
                                <label htmlFor="" class=' col-span-4 flex justify-end font-bold text-sm text-slate-800'>Upload CSV File(.csv)
                                </label>
                                <div class=" col-span-7 flex flex-col text-slate-900">
                                    <input type="file">
                                </div>
                            </div>
                            <div class="flex justify-between px-8">
                                <button type="button" class="px-2 py-1 bg-blue-600 text-white text-sm rounded">Back</button>
                                <button type="submit" class="bg-[#00C0EF] text-white text-sm px-2 py-1 rounded" data-loading-text="<i class='fa fa-spinner fa-spin '></i> Please Wait">Submit</button>
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
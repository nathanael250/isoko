<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isoko</title>
</head>

<body>
    <div>
        <div class="flex justify-center w-full">
            <form action="" class="flex w-full justify-center items-center text-xs">
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
                <div class="border cursor-pointer  block">
                    <span class="p-2 text-center">
                        <FontAwesomeIcon icon={faMagnifyingGlass} class='fa-xs' />
                    </span>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
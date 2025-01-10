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
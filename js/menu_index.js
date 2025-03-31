let currentMenuIndex = 0;
const menuItems = document.querySelectorAll('.menu-item');
const totalMenuItems = menuItems.length;
const visibleMenuItems = 3; // Number of menu items to display at once

function moveMenuSlider() {
    currentMenuIndex++;
    if (currentMenuIndex >= totalMenuItems - visibleMenuItems + 1) {
        currentMenuIndex = 0; // Reset to the first item when we reach the end
    }
    document.querySelector('.menu-items').style.transform = `translateX(-${currentMenuIndex * (100 / visibleMenuItems)}%)`;
}

setInterval(moveMenuSlider, 2000); // Move the menu slider every 2 seconds
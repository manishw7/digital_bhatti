let currentChefIndex = 0;
const chefItems = document.querySelectorAll('.chef-item');
const totalChefItems = chefItems.length;
const visibleChefItems = 3; // Number of chef items to display at once

function moveChefSlider() {
    currentChefIndex++;
    if (currentChefIndex >= totalChefItems - visibleChefItems + 1) {
        currentChefIndex = 0; // Reset to the first item when we reach the end
    }
    document.querySelector('.chefs-items').style.transform = `translateX(-${currentChefIndex * (100 / visibleChefItems)}%)`;
}

setInterval(moveChefSlider, 4000); // Move the chef slider every 3 seconds
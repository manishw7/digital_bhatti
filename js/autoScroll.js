// Create a new JavaScript file called autoScroll.js

// Function to scroll one card at a time
function setupCardByCardScroll(containerSelector, scrollInterval) {
    const scrollContainer = document.querySelector(containerSelector);
    if (!scrollContainer) return; // Exit if element not found

    // Find all card items in the container
    const cardsContainer = scrollContainer.querySelector('div'); // The inner container with the flex items
    const cards = cardsContainer.children;
    if (!cards.length) return;

    // Get the width of a single card including margin
    const cardWidth = cards[0].offsetWidth + parseInt(getComputedStyle(cards[0]).marginRight);

    // Set up interval to scroll one card at a time
    let currentIndex = 0;

    setInterval(() => {
        currentIndex = (currentIndex + 1) % cards.length;
        scrollContainer.scrollTo({
            left: cardWidth * currentIndex,
            behavior: 'smooth'
        });
    }, scrollInterval);

    // Pause scrolling on mouse enter
    scrollContainer.addEventListener('mouseenter', function () {
        // Store current position to resume from here
        currentPosition = scrollContainer.scrollLeft;
        clearInterval(scrollInterval);
    });

    // Resume scrolling on mouse leave
    scrollContainer.addEventListener('mouseleave', function () {
        setupCardByCardScroll(containerSelector, scrollInterval);
    });
}

// Initialize the card-by-card scrolling
document.addEventListener('DOMContentLoaded', () => {
    // Menu cards scroll every 3 seconds
    setupCardByCardScroll('.menu-scroll', 3000);

    // Chef cards scroll every 4 seconds
    setupCardByCardScroll('.chef-scroll', 4000);
});
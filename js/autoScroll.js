function setupCardByCardScroll(containerSelector, scrollDelay) {
    const scrollContainer = document.querySelector(containerSelector);
    if (!scrollContainer) return;

    const cardsContainer = scrollContainer.querySelector('div');
    if (!cardsContainer || !cardsContainer.children.length) return;

    const cards = cardsContainer.children;
    const cardWidth = cards[0].offsetWidth + parseInt(getComputedStyle(cards[0]).marginRight);

    let currentIndex = 0;
    let intervalId;
    let isHovering = false;
    let scrollTimeout;

    const startScroll = () => {
        intervalId = setInterval(() => {
            if (isHovering) return;

            currentIndex = (currentIndex + 1) % cards.length;
            scrollContainer.scrollTo({
                left: cardWidth * currentIndex,
                behavior: 'smooth',
            });
        }, scrollDelay);
    };

    const stopScroll = () => clearInterval(intervalId);

    const syncIndexWithScroll = () => {
        const scrollLeft = scrollContainer.scrollLeft;
        const newIndex = Math.round(scrollLeft / cardWidth);
        if (newIndex !== currentIndex) {
            currentIndex = newIndex;
        }
    };

    // Start automatic scroll
    startScroll();

    // Pause/resume on hover
    scrollContainer.addEventListener('mouseenter', () => {
        isHovering = true;
        stopScroll();
    });

    scrollContainer.addEventListener('mouseleave', () => {
        isHovering = false;
        syncIndexWithScroll();  // Sync before resuming
        startScroll();
    });

    // Detect manual scrolling (mousewheel, touchpad, etc.)
    scrollContainer.addEventListener('scroll', () => {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            syncIndexWithScroll();
        }, 150); // Reduced debounce time for better responsiveness
    });
}

// Initialize after DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    setupCardByCardScroll('.menu-scroll', 2000);
    setupCardByCardScroll('.chef-scroll', 2000);
});

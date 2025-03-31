let currentReviewIndex = 0;
const reviews = document.querySelectorAll('.review-item');
const totalReviews = reviews.length;

function showReview(index) {
    reviews.forEach((review, i) => {
        review.classList.remove('active'); // Hide all reviews
        if (i === index) {
            review.classList.add('active'); // Show the current review
        }
    });
}

// Show the first review initially
showReview(currentReviewIndex);

document.querySelector('.next-btn').addEventListener('click', () => {
    currentReviewIndex = (currentReviewIndex + 1) % totalReviews;
    showReview(currentReviewIndex);
});

document.querySelector('.prev-btn').addEventListener('click', () => {
    currentReviewIndex = (currentReviewIndex - 1 + totalReviews) % totalReviews;
    showReview(currentReviewIndex);
});

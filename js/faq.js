function toggleAnswer(index) {
    const answer = document.getElementById('answer-' + index);
    const isVisible = answer.style.display === 'block';
    
    // Toggle the answer visibility
    if (isVisible) {
        answer.style.display = 'none';
    } else {
        answer.style.display = 'block';
    }
}

<?php
// Optional: Fetch FAQs from a database (if applicable)
$faqs = [
    [
        'question' => 'What is your refund policy?',
        'answer' => 'We offer a 30-day money-back guarantee for all of our products.'
    ],
    [
        'question' => 'How can I contact customer support?',
        'answer' => 'You can contact our support team via email at support@db.com or call us at 9823244305.'
    ],
    [
        'question' => 'Do you offer international shipping?',
        'answer' => 'Yes, we ship worldwide. Shipping fees may vary based on the destination.'
    ],
    [
        'question' => 'What payment methods do you accept?',
        'answer' => 'We accept credit cards, Esewa, Khalti and bank transfers.'
    ],
    [
        'question' => 'Can I change or cancel my order?',
        'answer' => 'You can cancel or change your order if it is pending or cooking. Please choose the cancel button beside your order.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Frequently Asked Questions</title>
    <link rel="stylesheet" href="../css/faq.css">
    <style>.navbar {
    background-color: #333;
    padding: 10px 0;
    color: white;
}

.navbar-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.navbar-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.navbar-links li {
    display: inline;
}

.navbar-links a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
}

.navbar-links a:hover {
    color: #f39c12;
}</style>
</head>
<body>
<header>
        <nav class="navbar">
            <div class="navbar-container">
                <div class="logo">
                    <h1>Digital Bhatti</h1>
                </div>
                <ul class="navbar-links">
                    <li><a href="/digital_bhatti/home.php">Home</a></li>
                    <li><a href="/digital_bhatti/menu/menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="/digital_bhatti/auth/login.php">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <section id="faq" class="faq">
        <div class="faq-container">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-items">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="faq-item">
                        <button class="faq-question" onclick="toggleAnswer(<?php echo $index; ?>)">
                            <?php echo $faq['question']; ?>
                        </button>
                        <div class="faq-answer" id="answer-<?php echo $index; ?>">
                            <p><?php echo $faq['answer']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <script src="../js/faq.js"></script>
</body>
</html>
<?php require '../partials/footer.php';?>
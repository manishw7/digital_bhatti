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
</head>
<body>
<?php require '../partials/nav.php'?>
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
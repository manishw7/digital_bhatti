<footer class = 'footer'>
    <style>/* Footer Styling */
footer {
    background-color: #333;
    padding: 50px 0;
    color: white;
    text-align: center;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 40px;
    padding: 0 20px;
}

.footer-container div {
    flex: 1;
    margin: 0 10px;
}

.footer-container h3 {
    font-size: 1.5rem;
    margin-bottom: 15px;
    color: #f39c12;
}

.footer-container p, .footer-container li {
    font-size: 1rem;
    color: #ccc;
}

.footer-links ul {
    list-style: none;
    padding: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    color: white;
    text-decoration: none;
    font-size: 1rem;
    display: block;
    transition: color 0.3s;
}

.footer-links a:hover {
    color: #f39c12;
}

.footer-newsletter form input, .footer-newsletter form button {
    padding: 10px;
    margin: 5px 0;
    width: 100%;
}

.footer-newsletter form input[type="text"], .footer-newsletter form input[type="email"] {
    margin-bottom: 10px;
}

.footer-contact a {
    color: #f39c12;
}

.footer-bottom {
    background-color: #222;
    padding: 15px 0;
}

.footer-bottom p {
    font-size: 1rem;
    color: #bbb;
}
</style>
    <div class="footer-container">
        <div class="footer-about">
            <h3>Who are we?</h3>
            <p>Launched in Nepal, Digital Bhatti has grown from a home project to one of the largest food aggregators in the world. We are present in 200 countries and 1M+ cities globally, enabling our vision of better food for more people. We not only connect people to food in every context but work closely with restaurants to enable a sustainable ecosystem.</p>
        </div>
        
        <div class="footer-links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="/digital_bhatti/home.php">Home</a></li>
                <li><a href="/digital_bhatti/menu/menu.php">Our Food</a></li>
                <li><a href="/digital_bhatti/about/about.php">About Us</a></li>
                <li><a href="/digital_bhatti/about/faq.php">Faq's</a></li>
                <li><a href="/digital_bhatti/menu/menu.php">Order Now</a></li>
            </ul>
        </div>
        
        <div class="footer-newsletter">
            <h3>Newsletter</h3>
            <p>Sign up with your name and email to get fresh updates.</p>
            <form action="#" method="post">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="E-mail Address" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        
        <div class="footer-contact">
            <h3>Get in Touch</h3>
            <p>DB, Opposite Amrit Science Campus, Lainchaur, Kathmandu, Nepal 44600.</p>
            <p>Phone: (+977) 9823244305</p>
            <p>Email: <a href="#">support@db.com</a></p>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2025 Digital Bhatti. All Right Reserved.</p>
    </div>
</footer>

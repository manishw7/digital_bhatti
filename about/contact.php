<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us - Digital Bhatti</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FF6B35',
                        secondary: '#2E294E',
                        accent: '#1B998B',
                        light: '#F7F7F2',
                        dark: '#252422'
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <style>
        .contact-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2074&q=80');
            background-size: cover;
            background-position: center;
        }

        .form-input:focus,
        .form-textarea:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.3);
        }
    </style>
</head>

<body class="font-sans bg-light text-dark">

    <?php require '../partials/nav.php'; ?>

    <!-- Contact Section -->
    <section class="py-10">
        <div class="container mx-auto px-4">
            <div class="max-w-6xl mx-auto ">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 ">
                    <!-- Contact Information -->
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold mb-8 relative inline-block">
                            <span class="relative z-10">Contact Information</span>
                            <span class="absolute bottom-0 left-0 w-full h-1 bg-primary"></span>
                        </h2>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-1">Our Location</h3>
                                    <p class="text-gray-600">123 Thamel Street, Kathmandu, Nepal</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-1">Phone Number</h3>
                                    <p class="text-gray-600">+977 9812345678</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-1">Email Address</h3>
                                    <p class="text-gray-600">info@digitalbhatti.com</p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="bg-primary/10 p-3 rounded-full mr-4">
                                    <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold mb-1">Opening Hours</h3>
                                    <p class="text-gray-600">Monday - Friday: 9:00 AM - 10:00 PM</p>
                                    <p class="text-gray-600">Saturday: 10:00 AM - 11:00 PM</p>
                                    <p class="text-gray-600">Sunday: 10:00 AM - 9:00 PM</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-10">
                            <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                            <div class="flex space-x-4">
                                <a href="#"
                                    class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-3 rounded-full transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-3 rounded-full transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                                    </svg>
                                </a>
                                <a href="#"
                                    class="bg-primary/10 hover:bg-primary text-primary hover:text-white p-3 rounded-full transition-all">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                                    </svg>
                                </a>
                            </div>
                        </div>


                    </div>

                    <!-- Contact Form -->
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold mb-8 relative inline-block">
                            <span class="relative z-10">Send Us a Message</span>
                            <span class="absolute bottom-0 left-0 w-full h-1 bg-primary"></span>
                        </h2>

                        <div id="success-message"
                            class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6">
                            <strong class="font-bold">Thank you!</strong>
                            <span class="block sm:inline"> Your message has been sent successfully. We'll get back to
                                you soon.</span>
                        </div>

                        <!-- FormSubmit.co Form - Replace YOUR_EMAIL_HERE with your actual email -->
                        <form action="https://formsubmit.co/shresthaprajjwol444@gmail.com" method="POST"
                            id="contact-form">
                            <!-- Honeypot -->
                            <input type="text" name="_honey" style="display:none">

                            <!-- Disable Captcha -->
                            <input type="hidden" name="_captcha" value="false">

                            <!-- Success Page - You can customize this or remove it to stay on the same page -->
                            <input type="hidden" name="_next" value="https://yourdomain.com/contact.html?success=true">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Your
                                        Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-input block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="John Doe" required>
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Your
                                        Email</label>
                                    <input type="email" id="email" name="email"
                                        class="form-input block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="john@example.com" required>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number
                                    (Optional)</label>
                                <input type="tel" id="phone" name="phone"
                                    class="form-input block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    placeholder="+977 98XXXXXXXX">
                            </div>

                            <div class="mb-6">
                                <label for="subject"
                                    class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                <input type="text" id="subject" name="subject"
                                    class="form-input block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    placeholder="How can we help you?" required>
                            </div>

                            <div class="mb-6">
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Your
                                    Message</label>
                                <textarea id="message" name="message" rows="5"
                                    class="form-textarea block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                    placeholder="Write your message here..." required></textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-primary text-white py-3 px-4 rounded-lg font-medium hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all transform hover:scale-[1.02]">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-10 h-[600px]  mb-10">
                    <h3 class="text-xl font-semibold mb-4">Find Us At:</h3>
                    <div class="rounded-lg h-full overflow-hidden h-64 bg-gray-200">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.2585067291366!2d85.30964857547953!3d27.712935476178883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fcb77fd4f7%3A0x58099b8d37782dd0!2sThamel%2C%20Kathmandu%2044600%2C%20Nepal!5e0!3m2!1sen!2sus!4v1683890123456!5m2!1sen!2sus"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <?php require '../partials/footer.php'; ?>


</body>

</html>
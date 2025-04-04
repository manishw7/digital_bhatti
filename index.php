<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Bhatti - Delicious Food Delivered</title>
    <link rel="stylesheet" href="css/reviews.css">

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
        .menu-scroll,
        .chef-scroll,
        .review-scroll {
            scrollbar-width: none;
        }

        .menu-scroll::-webkit-scrollbar,
        .chef-scroll::-webkit-scrollbar,
        .review-scroll::-webkit-scrollbar {
            display: none;
        }

        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('uploads/hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="font-sans bg-light text-dark">
    <!-- Navbar Section -->
    <?php include 'partials/nav.php'; ?>

    <!-- Hero Section -->
    <section class="hero-gradient min-h-[80vh] flex items-center justify-center text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">Delicious Food, <span
                    class="text-primary">Delivered</span> to Your Door</h2>
            <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto">Explore a variety of mouth-watering dishes and order
                your favorite meals online!</p>
            <a href="/digital_bhatti/menu/menu.php"
                class="bg-primary text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-opacity-90 transition-all inline-block transform hover:scale-105">Order
                Now</a>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 relative">
                <span class="relative z-10">Our Menu</span>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-primary"></span>
            </h2>

            <div class="relative">
                <div class="menu-scroll overflow-x-auto py-4">
                    <div class="menu-items flex space-x-6 min-w-max px-10">
                        <div
                            class="menu-item bg-white rounded-xl shadow-lg overflow-hidden w-80 transform transition-all hover:scale-105">
                            <img src="uploads/pizza.jpeg" alt="Pizza" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="text-xl font-bold">Pizza</h3>
                                    <span class="text-primary font-bold">Rs. 650</span>
                                </div>
                                <p class="text-gray-600 mb-4">Cheese, tomatoes, and a variety of toppings.</p>
                                <a href="/digital_bhatti/menu/menu.php"><button
                                        class="w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition-all">Add
                                        to Cart</button></a>
                            </div>
                        </div>

                        <div
                            class="menu-item bg-white rounded-xl shadow-lg overflow-hidden w-80     transform transition-all hover:scale-105">
                            <img src="uploads/burger.jpeg" alt="Burger" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="text-xl font-bold">Burger</h3>
                                    <span class="text-primary font-bold">Rs. 700</span>
                                </div>
                                <p class="text-gray-600 mb-4">Juicy patty with fresh vegetables and sauce.</p>
                                <a href="/digital_bhatti/menu/menu.php"><button
                                        class="w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition-all">Add
                                        to Cart</button></a>
                            </div>
                        </div>

                        <div
                            class="menu-item bg-white rounded-xl shadow-lg overflow-hidden w-80     transform transition-all hover:scale-105">
                            <img src="uploads/momo.jpg" alt="Momo" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="text-xl font-bold">Momo</h3>
                                    <span class="text-primary font-bold">Rs. 200</span>
                                </div>
                                <p class="text-gray-600 mb-4">Juicy Momo with mitho jhol and spicy chutney.</p>
                                <a href="/digital_bhatti/menu/menu.php"><button
                                        class="w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition-all">Add
                                        to Cart</button></a>
                            </div>
                        </div>

                        <div
                            class="menu-item bg-white rounded-xl shadow-lg overflow-hidden w-80     transform transition-all hover:scale-105">
                            <img src="uploads/fries.webp" alt="Fries" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="text-xl font-bold">Fries</h3>
                                    <span class="text-primary font-bold">Rs. 300</span>
                                </div>
                                <p class="text-gray-600 mb-4">Crispy Fries wedges with special seasoning.</p>
                                <a href="/digital_bhatti/menu/menu.php"><button
                                        class="w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition-all">Add
                                        to Cart</button></a>
                            </div>
                        </div>

                        <div
                            class="menu-item bg-white rounded-xl shadow-lg overflow-hidden w-80     transform transition-all hover:scale-105">
                            <img src="uploads/thakali_set.jpg" alt="Sausage" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <div class="flex justify-between items-center mb-3">
                                    <h3 class="text-xl font-bold">Thakali</h3>
                                    <span class="text-primary font-bold">Rs. 700</span>
                                </div>
                                <p class="text-gray-600 mb-4">A traditional Nepali meal with rice, dal, meat,</p>
                                <a href="/digital_bhatti/menu/menu.php"><button
                                        class="w-full bg-primary text-white py-2 rounded-lg hover:bg-opacity-90 transition-all">Add
                                        to Cart</button></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-12">
                <a href="/digital_bhatti/menu/menu.php"
                    class="inline-block border-2 border-primary text-primary px-8 py-3 rounded-full font-semibold hover:bg-primary hover:text-white transition-all">View
                    Full Menu</a>
            </div>
        </div>
    </section>

    <!-- Facts Section -->
    <section id="facts" class="py-28 bg-secondary text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-16 relative">
                <span class="relative z-10">Our Impact in Numbers</span>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-primary"></span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8">
                <div
                    class="fact-item text-center bg-white/10 backdrop-blur-sm rounded-lg p-8 transform transition-all hover:scale-105">
                    <h3 class="text-4xl font-bold text-primary mb-2">10M+</h3>
                    <p class="text-xl">Happy Customers</p>
                </div>

                <div
                    class="fact-item text-center bg-white/10 backdrop-blur-sm rounded-lg p-8 transform transition-all hover:scale-105">
                    <h3 class="text-4xl font-bold text-primary mb-2">5M+</h3>
                    <p class="text-xl">Dishes Served</p>
                </div>

                <div
                    class="fact-item text-center bg-white/10 backdrop-blur-sm rounded-lg p-8 transform transition-all hover:scale-105">
                    <h3 class="text-4xl font-bold text-primary mb-2">1000+</h3>
                    <p class="text-xl">Chef Specialties</p>
                </div>

                <div
                    class="fact-item text-center bg-white/10 backdrop-blur-sm rounded-lg p-8 transform transition-all hover:scale-105">
                    <h3 class="text-4xl font-bold text-primary mb-2">1M+</h3>
                    <p class="text-xl">5-Star Reviews</p>
                </div>

                <div
                    class="fact-item text-center bg-white/10 backdrop-blur-sm rounded-lg p-8 transform transition-all hover:scale-105">
                    <h3 class="text-4xl font-bold text-primary mb-2">50+</h3>
                    <p class="text-xl">Years of Expertise</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Chef section -->
    <section id="chefs" class="py-20 bg-light">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 relative">
                <span class="relative z-10">Meet Our Chefs</span>
                <span class="absolute -bottom-1 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-primary"></span>
            </h2>

            <div class="relative">

                <div class="chef-scroll overflow-x-auto py-4">
                    <div class="chef-items flex space-x-6 min-w-max px-10">
                        <div
                            class="chef-item bg-white rounded-xl shadow-lg overflow-hidden w-80     transform transition-all hover:scale-105">
                            <div class="relative">
                                <img src="uploads/gordon.jpg" alt="Gordon Ramsay" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Gordon Ramsay</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600">A Michelin-starred British chef known for his fiery personality
                                    and shows like Hell's Kitchen and MasterChef.</p>
                            </div>
                        </div>

                        <div
                            class="chef-item bg-white rounded-xl shadow-lg overflow-hidden w-80 transform transition-all hover:scale-105">
                            <div class="relative">
                                <img src="uploads/vikas.jpg" alt="Vikas Khanna" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Vikas Khanna</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600">An Indian Michelin-starred chef, author, and humanitarian known
                                    for his New York restaurant Junoon and MasterChef India.</p>
                            </div>
                        </div>

                        <div
                            class="chef-item bg-white rounded-xl shadow-lg overflow-hidden w-80 transform transition-all hover:scale-105">
                            <div class="relative">
                                <img src="uploads/santosh.jpg" alt="Santosh Shah" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Santosh Shah</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600">A Nepalese chef who gained fame as a finalist on MasterChef:
                                    The Professionals UK, promoting Nepalese cuisine globally.</p>
                            </div>
                        </div>

                        <div
                            class="chef-item bg-white rounded-xl shadow-lg overflow-hidden w-80 transform transition-all hover:scale-105">
                            <div class="relative">
                                <img src="uploads/sanjeev.jpeg" alt="Sanjeev Kapoor" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Sanjeev Kapoor</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600">One of India's most famous chefs, known for hosting Khana
                                    Khazana and revolutionizing home cooking in India.</p>
                            </div>
                        </div>

                        <div
                            class="chef-item bg-white rounded-xl shadow-lg overflow-hidden w-80 transform transition-all hover:scale-105">
                            <div class="relative">
                                <img src="uploads/nick.jpg" alt="Nick DiGiovanni" class="w-full h-64 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                                <h3 class="absolute bottom-4 left-4 text-xl font-bold text-white">Nick DiGiovanni</h3>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600">An American chef, YouTuber, and MasterChef finalist known for
                                    his viral cooking videos and creative recipes.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer review section -->
    <section id="reviews" class="py-20 bg-secondary text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 relative">
                <span class="relative z-10">What Our Happy Customers Say</span>
                <span class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-24 h-1 bg-primary"></span>
            </h2>

            <div class="reviews-container">
                <div class="reviews-slider flex gap-4 ">

                    <div class="review-item">
                        <p class="review-text">"This app is so efficient that my food arrived before I even got hungry.
                            Either they have time-traveling delivery guys or my neighbor is secretly a Digital Bhatti
                            employee. 10/10 will order again—probably before I even finish this review."</p>
                        <h3>- Manish Wagle</h3>
                        <p class="review-location">Syangja,Nepal</p>
                    </div>
                    <div class="review-item">
                        <p class="review-text">"The only thing faster than my online food order is my mom switching TV
                            channels during ad breaks. The Thakali set arrived so fresh that I almost believed it was
                            cooked
                            in my own kitchen. If you haven’t ordered from here yet, are you even living?"</p>
                        <h3>- Anusha Sharma</h3>
                        <p class="review-location">Parbat, Nepal</p>
                    </div>
                    <div class="review-item">
                        <p class="review-text">"Ordered fries, expected good food. Got fries so crispy that even my life
                            decisions feel soft in comparison. The delivery guy arrived faster than my relatives when
                            they
                            hear free food. If this app had a 'marry' button, I’d click it instantly."</p>
                        <h3>- Prajjwol Shrestha</h3>
                        <p class="review-location">Bhaktapur, Nepal</p>
                    </div>
                    <div class="review-item">
                        <p class="review-text">"I swear, ordering from this app is smoother than my attempts at
                            flirting.
                            The UI is cleaner than my room, and the food? Let’s just say I may or may not have proposed
                            to
                            the momo delivery guy. If this service doesn’t get a national award, I’m rioting."</p>
                        <h3>- Nineyitika Shrestha</h3>
                        <p class="review-location">Kritipur, Nepal</p>
                    </div>
                </div>
                <div class="review-nav">
                    <button class="prev-btn">&#10094;</button>
                    <button class="next-btn">&#10095;</button>


                </div>
            </div>
        </div>
    </section>




    <!-- Footer Section -->
    <?php include "partials/footer.php"; ?>
    <script src="js/reviews.js"></script>

</body>

</html>
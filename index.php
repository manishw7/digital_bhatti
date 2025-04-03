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

        .review-item {
            transition: all 0.3s ease;
        }

        .review-item:hover {
            transform: translateY(-5px);
        }

        .reviews-container {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
        }

        .reviews-slider {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            scrollbar-width: none;
            /* Firefox */
            padding: 20px 0;
        }

        .reviews-slider::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Edge */
        }

        .review-item {
            flex: 0 0 auto;
            width: 300px;
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 10px;
            padding: 20px;
            margin-right: 20px;
            transition: all 0.3s ease;
        }

        .review-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .review-text {
            font-style: italic;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .review-item h3 {
            font-weight: 600;
            margin-bottom: 5px;
            color: #FF6B35;
        }

        .review-location {
            font-size: 0.9rem;
            opacity: 0.7;
        }

        .review-nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .prev-btn,
        .next-btn {
            background-color: #FF6B35;
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .prev-btn:hover,
        .next-btn:hover {
            background-color: white;
            color: #FF6B35;
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
                <button id="menu-prev"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full p-2 shadow-lg text-primary hover:text-white hover:bg-primary transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>

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

                <button id="menu-next"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full p-2 shadow-lg text-primary hover:text-white hover:bg-primary transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
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
                <button id="chef-prev"
                    class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full p-2 shadow-lg text-primary hover:text-white hover:bg-primary transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                </button>

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

                <button id="chef-next"
                    class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full p-2 shadow-lg text-primary hover:text-white hover:bg-primary transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
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
                        <h3>- Prazzwol Shrestha</h3>
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

    <script>
        // Mobile Menu Toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Menu Slider
        const menuPrev = document.getElementById('menu-prev');
        const menuNext = document.getElementById('menu-next');
        const menuScroll = document.querySelector('.menu-scroll');

        menuNext.addEventListener('click', () => {
            menuScroll.scrollBy({ left: 300, behavior: 'smooth' });
        });

        menuPrev.addEventListener('click', () => {
            menuScroll.scrollBy({ left: -300, behavior: 'smooth' });
        });

        // Chef Slider
        const chefPrev = document.getElementById('chef-prev');
        const chefNext = document.getElementById('chef-next');
        const chefScroll = document.querySelector('.chef-scroll');

        chefNext.addEventListener('click', () => {
            chefScroll.scrollBy({ left: 300, behavior: 'smooth' });
        });

        chefPrev.addEventListener('click', () => {
            chefScroll.scrollBy({ left: -300, behavior: 'smooth' });
        });

        // Review Slider
        const reviewPrev = document.getElementById('review-prev');
        const reviewNext = document.getElementById('review-next');
        const reviewScroll = document.querySelector('.review-scroll');

        reviewNext.addEventListener('click', () => {
            reviewScroll.scrollBy({ left: 300, behavior: 'smooth' });
        });

        reviewPrev.addEventListener('click', () => {
            reviewScroll.scrollBy({ left: -300, behavior: 'smooth' });
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
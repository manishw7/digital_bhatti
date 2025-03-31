<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Digital Bhatti - Modern Nepali Cuisine</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .heading {
            font-family: 'Playfair Display', serif;
        }
        
        .hero-gradient {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1920x1080');
            background-size: cover;
            background-position: center;
        }
        
        .menu-item-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .chef-item-hover:hover {
            transform: translateY(-5px);
        }
        
        .review-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navbar Section -->
    <header class="fixed w-full z-50 bg-white shadow-md">
        <nav class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div class="text-xl font-bold text-red-600 heading">
                        <span class="text-2xl">Digital Bhatti</span>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="/digital_bhatti/home.php" class="text-gray-800 hover:text-red-600 transition duration-300">Home</a>
                    <a href="menu/menu.php" class="text-gray-800 hover:text-red-600 transition duration-300">Menu</a>
                    <a href="about/about.php" class="text-gray-800 hover:text-red-600 transition duration-300">About</a>
                    <a href="about/contact.php" class="text-gray-800 hover:text-red-600 transition duration-300">Contact</a>
                    <a href="auth/login.php" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition duration-300">Login</a>
                </div>
                <div class="md:hidden">
                    <button class="text-gray-800 hover:text-red-600 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-gradient h-screen flex items-center justify-center text-center text-white">
        <div class="container mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-bold mb-6 heading leading-tight">Delicious Food, <br>Delivered to Your Door</h1>
            <p class="text-xl md:text-2xl mb-10 max-w-2xl mx-auto">Explore a variety of mouth-watering Nepali dishes and order your favorite meals online!</p>
            <a href="/digital_bhatti/auth/login.php" class="bg-red-600 text-white text-lg px-8 py-4 rounded-full hover:bg-red-700 transition duration-300 inline-block">Order Now</a>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 heading text-gray-800">Our Signature Menu</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="menu-item-hover bg-white rounded-lg overflow-hidden shadow-lg transition duration-500 ease-in-out">
                    <div class="relative overflow-hidden">
                        <img src="uploads/pizza.jpeg" alt="Pizza" class="w-full h-64 object-cover transform hover:scale-110 transition duration-500">
                        <span class="absolute top-4 right-4 bg-red-600 text-white px-4 py-1 rounded-full">Rs. 650</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 heading text-gray-800">Pizza</h3>
                        <p class="text-gray-600 mb-4">Cheese, tomatoes, and a variety of toppings.</p>
                        <button class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-red-600 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                
                <div class="menu-item-hover bg-white rounded-lg overflow-hidden shadow-lg transition duration-500 ease-in-out">
                    <div class="relative overflow-hidden">
                        <img src="uploads/burger.jpeg" alt="Burger" class="w-full h-64 object-cover transform hover:scale-110 transition duration-500">
                        <span class="absolute top-4 right-4 bg-red-600 text-white px-4 py-1 rounded-full">Rs. 700</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 heading text-gray-800">Burger</h3>
                        <p class="text-gray-600 mb-4">Juicy patty with fresh vegetables and sauce.</p>
                        <button class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-red-600 transition duration-300">Add to Cart</button>
                    </div>
                </div>
                
                <div class="menu-item-hover bg-white rounded-lg overflow-hidden shadow-lg transition duration-500 ease-in-out">
                    <div class="relative overflow-hidden">
                        <img src="uploads/corndog.jpeg" alt="Corn Dog" class="w-full h-64 object-cover transform hover:scale-110 transition duration-500">
                        <span class="absolute top-4 right-4 bg-red-600 text-white px-4 py-1 rounded-full">Rs. 400</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 heading text-gray-800">Corn Dog</h3>
                        <p class="text-gray-600 mb-4">Cheesy Corndog with wagyu sausage.</p>
                        <button class="w-full bg-gray-800 text-white py-2 rounded-md hover:bg-red-600 transition duration-300">Add to Cart</button>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="menu/menu.php" class="inline-block border-2 border-red-600 text-red-600 px-6 py-3 rounded-full hover:bg-red-600 hover:text-white transition duration-300">View Full Menu</a>
            </div>
        </div>
    </section>

    <!-- Facts Section -->
    <section id="facts" class="py-20 bg-gray-900 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 heading">Our Impact in Numbers</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 text-center">
                <div class="bg-gray-800 p-8 rounded-lg transform hover:scale-105 transition duration-300">
                    <h3 class="text-4xl font-bold mb-2 text-red-600">10M+</h3>
                    <p class="text-gray-300">Happy Customers</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg transform hover:scale-105 transition duration-300">
                    <h3 class="text-4xl font-bold mb-2 text-red-600">5M+</h3>
                    <p class="text-gray-300">Dishes Served</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg transform hover:scale-105 transition duration-300">
                    <h3 class="text-4xl font-bold mb-2 text-red-600">1000+</h3>
                    <p class="text-gray-300">Chef Specialties</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg transform hover:scale-105 transition duration-300">
                    <h3 class="text-4xl font-bold mb-2 text-red-600">1M+</h3>
                    <p class="text-gray-300">5-Star Reviews</p>
                </div>
                <div class="bg-gray-800 p-8 rounded-lg transform hover:scale-105 transition duration-300">
                    <h3 class="text-4xl font-bold mb-2 text-red-600">50+</h3>
                    <p class="text-gray-300">Years of Expertise</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Chef section -->
    <section id="chefs" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 heading text-gray-800">Meet Our World-Class Chefs</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="chef-item-hover bg-white rounded-xl overflow-hidden shadow-lg transition duration-500">
                    <div class="relative overflow-hidden">
                        <img src="uploads/gordon.jpg" alt="Gordon" class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-20 hover:bg-opacity-40 transition duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                            <div class="flex space-x-4">
                                <a href="#" class="bg-white text-red-600 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="bg-white text-red-600 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 heading text-gray-800">Gordon Ramsay</h3>
                        <p class="text-gray-600">A Michelin-starred British chef known for his fiery personality and shows like Hell's Kitchen and MasterChef.</p>
                    </div>
                </div>
                
                <div class="chef-item-hover bg-white rounded-xl overflow-hidden shadow-lg transition duration-500">
                    <div class="relative overflow-hidden">
                        <img src="uploads/vikas.jpg" alt="Vikas" class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-20 hover:bg-opacity-40 transition duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                            <div class="flex space-x-4">
                                <a href="#" class="bg-white text-red-600 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="bg-white text-red-600 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 heading text-gray-800">Vikas Khanna</h3>
                        <p class="text-gray-600">An Indian Michelin-starred chef, author, and humanitarian known for his New York restaurant Junoon and MasterChef India.</p>
                    </div>
                </div>
                
                <div class="chef-item-hover bg-white rounded-xl overflow-hidden shadow-lg transition duration-500">
                    <div class="relative overflow-hidden">
                        <img src="uploads/santosh.jpg" alt="Santosh" class="w-full h-80 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-20 hover:bg-opacity-40 transition duration-300 flex items-center justify-center opacity-0 hover:opacity-100">
                            <div class="flex space-x-4">
                                <a href="#" class="bg-white text-red-600 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="bg-white text-red-600 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-semibold mb-2 heading text-gray-800">Santosh Shah</h3>
                        <p class="text-gray-600">A Nepalese chef who gained fame as a finalist on MasterChef: The Professionals UK, promoting Nepalese cuisine globally.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section id="reviews" class="py-20 bg-gray-800 text-white relative">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4 heading">What Our Happy Customers Say</h2>
                <div class="w-24 h-1 bg-red-600 mx-auto"></div>
            </div>
            
            <div class="review-carousel relative">
                <div class="flex overflow-x-hidden">
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-4">
                        <div class="review-card p-8 rounded-xl h-full">
                            <div class="text-yellow-400 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-200 mb-6 italic">"The momos here are so juicy that I thought I reached Nirvana with the first bite. I ordered a plate of chicken momos, and by the time I finished, I was emotionally attached to them. Staff so friendly, I think they might be my long-lost cousins."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-xl font-bold mr-4">M</div>
                                <div>
                                    <h3 class="font-semibold">Manish Wagle</h3>
                                    <p class="text-gray-400 text-sm">Syangja, Nepal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-4">
                        <div class="review-card p-8 rounded-xl h-full">
                            <div class="text-yellow-400 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-200 mb-6 italic">"From the moment I entered, I felt like I had walked into my mama ghar. The service? Faster than Nepali aunties spreading news. The food? Better than my own mom's cooking (but don't tell her). If Digital Bhatti doesn't win an award soon, I'm calling the police."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-xl font-bold mr-4">A</div>
                                <div>
                                    <h3 class="font-semibold">Anusha Sharma</h3>
                                    <p class="text-gray-400 text-sm">Parbat, Nepal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="w-full md:w-1/2 lg:w-1/3 flex-shrink-0 px-4">
                        <div class="review-card p-8 rounded-xl h-full">
                            <div class="text-yellow-400 mb-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <p class="text-gray-200 mb-6 italic">"I came here as a simple man, but after tasting the buff sukuti, I feel like I should be writing poetry about it. Spices hit my soul like an earthquake, and the chatni? Spicier than my neighbor's gossip. If I could legally marry food, Digital Bhatti's sukuti would be my bride."</p>
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-xl font-bold mr-4">P</div>
                                <div>
                                    <h3 class="font-semibold">Prazzwol Shrestha</h3>
                                    <p class="text-gray-400 text-sm">Bhaktapur, Nepal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="absolute top-1/2 left-0 transform -translate-y-1/2 -translate-x-1/2 z-10">
                    <button class="bg-white text-gray-800 w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-red-600 hover:text-white transition duration-300 prev-btn">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                </div>
                
                <div class="absolute top-1/2 right-0 transform -translate-y-1/2 translate-x-1/2 z-10">
                    <button class="bg-white text-gray-800 w-12 h-12 rounded-full flex items-center justify-center shadow-lg hover:bg-red-600 hover:text-white transition duration-300 next-btn">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-4 heading">Digital Bhatti</h3>
                    <p class="text-gray-400 mb-4">Delivering the authentic taste of Nepal right to your doorstep. Experience the rich flavors of Nepali cuisine with our carefully crafted dishes.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="bg-gray-800 w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-600 transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Menu</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">About Us</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-4">Contact Info</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-red-600 mt-1 mr-3"></i>
                            <span class="text-gray-400">Thamel, Kathmandu, Nepal</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone text-red-600 mt-1 mr-3"></i>
                            <span class="text-gray-400">+977 9812345678</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope text-red-600 mt-1 mr-3"></i>
                            <span class="text-gray-400">info@digitalbhatti.com</span>
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-xl font-semibold mb-4">Opening Hours</h3>
                    <ul class="space-y-2">
                        <li class="flex justify-between text-gray-400">
                            <span>Monday - Friday</span>
                            <span>9:00 AM - 10:00 PM</span>
                        </li>
                        <li class="flex justify-between text-gray-400">
                            <span>Saturday</span>
                            <span>10:00 AM - 11:00 PM</span>
                        </li>
                        <li class="flex justify-between text-gray-400">
                            <span>Sunday</span>
                            <span>10:00 AM - 9:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-400">&copy; 2025 Digital Bhatti. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Simple carousel functionality
        document.addEventListener('DOMContentLoaded', function() {
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            const carousel = document.querySelector('.review-carousel > div');
            let position = 0;
            
            nextBtn.addEventListener('click', function() {
                position -= 100;
                if (position < -200) position = 0;
                carousel.style.transform = `translateX(${position}%)`;
                carousel.style.transition = 'transform 0.5s ease-in-out';
            });
            
            prevBtn.addEventListener('click', function() {
                position += 100;
                if (position > 0) position = -200;
                carousel.style.transform = `translateX(${position}%)`;
                carousel.style.transition = 'transform 0.5s ease-in-out';
            });
            
            // Mobile menu toggle
            const menuBtn = document.querySelector('.md\\:hidden button');
            const mobileMenu = document.createElement('div');
            mobileMenu.className = 'fixed inset-0 bg-gray-900 bg-opacity-95 z-50 transform translate-x-full transition duration-300';
            mobileMenu.innerHTML = `
                <div class="flex justify-end p-6">
                    <button class="text-white text-2xl focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="flex flex-col items-center space-y-6 text-white text-xl">
                    <a href="/digital_bhatti/home.php" class="hover:text-red-600 transition duration-300">Home</a>
                    <a href="menu/menu.php" class="hover:text-red-600 transition duration-300">Menu</a>
                    <a href="about/about.php" class="hover:text-red-600 transition duration-300">About</a>
                    <a href="about/contact.php" class="hover:text-red-600 transition duration-300">Contact</a>
                    <a href="auth/login.php" class="bg-red-600 text-white px-8 py-3 rounded-md hover:bg-red-700 transition duration-300 mt-4">Login</a>
                </div>
            `;
            document.body.appendChild(mobileMenu);
            
            menuBtn.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-full');
            });
            
            const closeBtn = mobileMenu.querySelector('button');
            closeBtn.addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
            });
        });
    </script>
</body>
</html>
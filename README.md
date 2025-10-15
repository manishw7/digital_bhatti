# Digital Bhatti - Online Food Ordering System

A simple and functional online food ordering system built with PHP. This project allows users to browse a menu, add items to their cart, and place orders. It serves as a great starting point for understanding the fundamentals of web development with PHP and MySQL.

## 📋 Table of Contents
- [Features](#-features)
- [Tech Stack](#️-tech-stack)
- [Getting Started](#-getting-started)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Usage](#-usage)
- [Contributing](#-contributing)
- [License](#-license)

## ✨ Features
- **User-friendly Menu:** Browse available food items with descriptions and prices.
- **Shopping Cart:** Add and remove items from the cart dynamically.
- **Order Placement:** A simple checkout process to place an order.
- **Admin Panel:** A backend interface to manage menu items and view orders.

## 🛠️ Tech Stack
- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** JavaScript, CSS, HTML

## 🚀 Getting Started
Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites
You will need a local server environment to run a PHP application. We recommend using XAMPP, which includes Apache, PHP, and MySQL.

- [Download XAMPP](https://www.apachefriends.org/index.html)

### Installation
1.  **Clone the repository:**
    ```sh
    git clone [https://github.com/manishw7/digital_bhatti.git](https://github.com/manishw7/digital_bhatti.git)
    ```
2.  **Move to your web server directory:**
    Move the cloned `digital_bhatti` folder into the `htdocs` directory inside your XAMPP installation folder (e.g., `C:\xampp\htdocs`).

3.  **Start your local server:**
    Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.

4.  **Set up the database:**
    - Open your web browser and go to `http://localhost/phpmyadmin/`.
    - Create a new database. Name it `digital_bhatti_db`.
    - Find the PHP file that handles the database connection (it is named `dbconnect.php`).
    - Update the database name, username, and password to match your local setup.
      (e.g., `db_name = 'digital_bhatti_db'`, `username = 'root'`, `password = ''`).

5.  **Run the application:**
    Open your browser and navigate to `http://localhost/digital_bhatti/`.

## 📖 Usage
Once the application is running, you can:

- Navigate through the homepage to see the restaurant's offerings.
- Click on menu items to add them to your cart.
- Go to the cart page to review your selections.
- Proceed to checkout to finalize your order.

## 🤝 Contributing
Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".

1.  Fork the Project
2.  Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3.  Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4.  Push to the Branch (`git push origin feature/AmazingFeature`)
5.  Open a Pull Request

## 📄 License
This project is not currently licensed.

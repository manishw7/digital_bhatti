<?php
session_start();

// Restrict access to only logged-in admins
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("Location: admin_login.php");
    exit;
}

include '../partials/dbconnect.php'; // Connect to database

$success_message = '';
$error_message = '';

// Handle delete request via AJAX securely
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete_food') {
    header('Content-Type: application/json'); // Set JSON header

    if (!empty($_POST['food_id']) && is_numeric($_POST['food_id'])) {
        $food_id = intval($_POST['food_id']);

        $stmt = $conn->prepare("DELETE FROM food_items WHERE id = ?");
        $stmt->bind_param("i", $food_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete item']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
    }
    exit; // Ensure script stops after sending JSON
}

// Handle food item addition securely
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_food'])) {
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);

    if (empty($name) || empty($price) || !is_numeric($price)) {
        $error_message = "Invalid input data.";
    } elseif (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] !== "") {
        $target_dir = __DIR__ . "/../uploads/";
        $image_name = uniqid() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Validate image type
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            $error_message = "Only JPG, JPEG, PNG, and GIF files are allowed.";
        } elseif ($_FILES["image"]["size"] > 5 * 1024 * 1024) { // 5MB size limit
            $error_message = "File size exceeds 5MB.";
        } elseif (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "uploads/" . $image_name;

            $stmt = $conn->prepare("INSERT INTO food_items (name, price, image_path) VALUES (?, ?, ?)");
            $stmt->bind_param("sds", $name, $price, $image_path);

            if ($stmt->execute()) {
                // Implement Post/Redirect/Get pattern to prevent form resubmission
                $_SESSION['success_message'] = "Food item added successfully!";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            } else {
                $error_message = "Database error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error_message = "Error uploading file.";
        }
    } else {
        $error_message = "Please select an image.";
    }
}

// Check for success message from session (for Post/Redirect/Get pattern)
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the message after displaying
}

// Fetch all food items securely
$sql = "SELECT * FROM food_items ORDER BY id DESC";
$result = $conn->query($sql);
$food_items = $result->fetch_all(MYSQLI_ASSOC);

// Count total orders
$total_orders = 0;
$sql_orders = "SELECT COUNT(*) as total FROM orders";
$result_orders = $conn->query($sql_orders);
if ($result_orders && $row_orders = $result_orders->fetch_assoc()) {
    $total_orders = $row_orders['total'];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - Digital Bhatti</title>
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
        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.3);
        }
    </style>
</head>

<body>
    <div class="font-sans bg-gray-100 text-dark">
        <?php include '../admin/admin_nav.php'; ?>
        <!-- Admin Header -->

        <!-- Main Content -->
        <div class="container h-screen mx-auto px-4 py-8">
            <!-- Dashboard Stats -->

            <!-- Admin Actions -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Add Food Item Form -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-6 bg-secondary text-white">
                            <h2 class="text-xl font-bold">Add New Food Item</h2>
                        </div>

                        <?php if ($success_message): ?>
                            <div class="mx-6 mt-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline"><?php echo $success_message; ?></span>
                            </div>
                        <?php endif; ?>

                        <?php if ($error_message): ?>
                            <div class="mx-6 mt-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <span class="block sm:inline"><?php echo $error_message; ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"
                                enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Food
                                        Name</label>
                                    <input type="text" id="name" name="name"
                                        class="form-input block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="Enter food name" required>
                                </div>

                                <div class="mb-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price
                                        (Rs.)</label>
                                    <input type="number" id="price" name="price" step="0.01" min="0"
                                        class="form-input block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-all"
                                        placeholder="Enter price" required>
                                </div>

                                <div class="mb-6">
                                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Food
                                        Image</label>
                                    <div
                                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex items-center justify-center text-sm text-gray-600">
                                                <label for="image"
                                                    class="relative cursor-pointer bg-white rounded-md font-medium text-primary hover:text-primary/80 focus-within:outline-none">
                                                    <span>Upload a file</span>
                                                    <input id="image" name="image" type="file" accept="image/*"
                                                        class="sr-only" required>
                                                </label>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                                        </div>
                                    </div>
                                    <div class="image-preview mt-2"></div>
                                </div>

                                <button type="submit" name="add_food" value="1"
                                    class="w-full bg-primary text-white py-2 px-4 rounded-lg font-medium hover:bg-primary/90 focus:outline-none transition-all">
                                    Add Food Item
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Food Items List -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden">
                        <div class="p-6 bg-secondary text-white">
                            <h2 class="text-xl font-bold">Food Items</h2>
                        </div>

                        <div class="overflow-x-auto">
                            <?php if (empty($food_items)): ?>
                                <div class="p-6 text-center">
                                    <p class="text-gray-500">No food items found. Add your first item using the form.</p>
                                </div>
                            <?php else: ?>
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Image</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>

                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Price</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($food_items as $item): ?>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="w-12 h-12 rounded-md overflow-hidden">
                                                        <img src="../<?php echo htmlspecialchars($item['image_path']); ?>"
                                                            alt="<?php echo htmlspecialchars($item['name']); ?>"
                                                            class="w-full h-full object-cover">
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <?php echo htmlspecialchars($item['name']); ?>
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">Rs.
                                                        <?php echo number_format($item['price'], 2); ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <button type="button"
                                                        class="remove-btn text-red-500 p-2 rounded-full ml-0 md:ml-4 mt-3 md:mt-0 transition-colors hover:bg-red-100"
                                                        data-id="<?php echo $item['id']; ?>">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="delete-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg max-w-md w-full p-6">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Confirm Deletion</h3>
            <p class="text-gray-600 mb-6">Are you sure you want to delete this food item? This action cannot be undone.
            </p>
            <div class="flex justify-end">
                <button id="cancel-delete"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300 transition-colors">Cancel</button>
                <button id="confirm-delete"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">Delete</button>
            </div>
        </div>
    </div>

    <script>
        // Image Preview
        document.getElementById('image').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function (event) {
                const previewContainer = document.querySelector('.image-preview');
                previewContainer.innerHTML = `<img src="${event.target.result}" class="w-full h-32 object-cover mt-2 rounded-lg">`;
            };
            reader.readAsDataURL(file);
        });

        // Delete functionality
        document.addEventListener('DOMContentLoaded', function () {
            const deleteModal = document.getElementById('delete-modal');
            const cancelButton = document.getElementById('cancel-delete');
            const confirmButton = document.getElementById('confirm-delete');
            let currentFoodId = null;

            // Use proper event delegation for delete buttons
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function () {
                    currentFoodId = this.getAttribute('data-id');
                    deleteModal.classList.remove('hidden');
                });
            });

            cancelButton.addEventListener('click', function () {
                deleteModal.classList.add('hidden');
            });

            confirmButton.addEventListener('click', function () {
                if (currentFoodId) {
                    const formData = new FormData();
                    formData.append('action', 'delete_food');
                    formData.append('food_id', currentFoodId);

                    fetch(window.location.href, {
                        method: 'POST',
                        body: formData
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            } else {
                                alert(data.message || "Error deleting item");
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert("Something went wrong. Please try again.");
                        })
                        .finally(() => {
                            deleteModal.classList.add('hidden');
                        });
                }
            });
        });
    </script>
    <?php require 'admin_footer.php'; ?>
</body>

</html>
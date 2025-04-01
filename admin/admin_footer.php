<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
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
</head>

<body>
    <footer class="bg-dark text-white mt-6">

        <div class="border-t border-white/20 mt-12 py-4 text-center">
            <p>&copy; <?php echo date("Y"); ?> Digital Bhatti Admin Panel. All Rights Reserved.</p>
            <p>Developed & Managed by Digital Bhatti Team</p>
        </div>
    </footer>
</body>

</html>
<?php
include 'includes/dbconnect.php';
// $error=false;
// $success=false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

  
    $sql = "INSERT INTO contact (name, email, phone, company, subject, msg) VALUES ('$name', '$email', '$phone', '$company', '$subject', '$message')";
    
    if (mysqli_query($conn, $sql)) {
        // $success = "Message sent successfully!";
        // $success = true;
        // Optionally, you can redirect to a thank you page or display a success message    

        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        // $error = "Error: " . mysqli_error($conn);


    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - BuildQA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1a56db',
                        secondary: '#1c64f2',
                        accent: '#3f83f8',
                        dark: '#1f2a37',
                        light: '#f9fafb'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation Bar -->
    <?php include 'includes/nav.php'; ?>

    



    <!-- Contact Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                Contact Our Team
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Have questions about our construction quality assurance solutions? Get in touch with our experts.
            </p>
        </div>
    </div>


    <!-- Contact Form and Info -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                <!-- Contact Form -->
                <div class="relative">
                    <div class="bg-light p-6 rounded-lg shadow-sm">
                        <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                            Send us a message
                        </h2>
                        <form class="mt-6 space-y-6" method="post" action="">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" required class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                </div>
                            </div>
                            
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone (optional)</label>
                                <div class="mt-1">
                                    <input id="phone" name="phone" type="tel" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                </div>
                            </div>
                            
                            <div>
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <div class="mt-1">
                                    <input id="company" name="company" type="text" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                </div>
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                                <div class="mt-1">
                                    <select id="subject" name="subject" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                        <option>Sales Inquiry</option>
                                        <option>Technical Support</option>
                                        <option>Partnership Opportunity</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mt-12 lg:mt-0">
                    <div class="bg-light p-6 rounded-lg shadow-sm">
                        <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                            Contact Information
                        </h2>
                        <div class="mt-6 space-y-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19 a 2 2 0 01-2 2 a 8 8 0 01-8-8 a 8 8 0 01-8-8 a 2 2 0 012-2 a 2 2 0 012-2z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-dark">Sales & Support</h3>
                                    <p class="mt-1 text-base text-gray-500">+6398667467</p>
                                    <p class="mt-1 text-sm text-gray-500">Monday-Friday, 8am-6pm EST</p>
                                </div>
                            </div>
                            
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0l4-4m-4 4l4 4m8-12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-dark">Email Us</h3>
                                    <p class="mt-1 text-base text-gray-500">support@buildQA.com</p>
                                    <p class="mt-1 text-sm text-gray-500">We respond within 24 hours</p>
                                </div>
                            </div> 
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-lg font-medium text-dark">Visit Us</h3>
                                    <p class="mt-1 text-base text-gray-500">Lovely Professional University</p>
                                    <p class="mt-1 text-sm text-gray-500">Jalandher</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    

</body>
</html>
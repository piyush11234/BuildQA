<?php
// book-demo.php
include 'includes/dbconnect.php';

$success = false;
$error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['company']);
    $job_title = trim($_POST['job_title']);
    $project_type = $_POST['project_type'];
    $demo_date = $_POST['demo_date'];
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($phone)) {
        $error = "Please fill in all required fields";
    } else {
        // Insert into database
        $sql = "INSERT INTO demo_requests (name, email, phone, company, job_title, project_type, demo_date, message) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $name, $email, $phone, $company, $job_title, $project_type, $demo_date, $message);
        
        if ($stmt->execute()) {
            $success = true;
            
            // Send email notification (optional)
            $to = "demos@buildqa.com";
            $subject = "New Demo Request: $name from $company";
            $body = "Name: $name\nEmail: $email\nPhone: $phone\nCompany: $company\n\nRequested Demo Date: $demo_date\n\nMessage:\n$message";
            mail($to, $subject, $body);
            
            // Reset form fields
            $name = $email = $phone = $company = $job_title = $message = '';
        } else {
            $error = "Error submitting your request. Please try again.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Demo - BuildQA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <!-- Navigation -->
    <?php include 'includes/nav.php'; ?>

    <!-- Demo Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                See BuildQA in Action
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Schedule a personalized demo to see how our quality assurance solutions can transform your construction projects.
            </p>
        </div>
    </div>

    <!-- Demo Form -->
    <div class="bg-white py-12 sm:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="lg:col-span-5">
                    <div class="bg-light p-6 rounded-lg shadow-sm">
                        <h2 class="text-2xl font-extrabold text-dark sm:text-3xl mb-6">
                            What to Expect
                        </h2>
                        <div class="space-y-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-dark">30-Minute Walkthrough</h3>
                                    <p class="mt-1 text-base text-gray-500">
                                        A focused session tailored to your specific needs and challenges.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-dark">Live Product Demo</h3>
                                    <p class="mt-1 text-base text-gray-500">
                                        See the platform in action with real project examples.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center h-10 w-10 rounded-md bg-primary text-white">
                                        <i class="fas fa-question-circle"></i>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-dark">Q&A Session</h3>
                                    <p class="mt-1 text-base text-gray-500">
                                        Get answers to your specific questions from our experts.
                                    </p>
                                </div>
                            </div>
                            
                            <div class="pt-6">
                                <h3 class="text-lg font-medium text-dark">Can't wait for a demo?</h3>
                                <p class="mt-2 text-base text-gray-500">
                                    Check out our <a href="/product-tour" class="text-primary hover:text-secondary">self-guided product tour</a> or <a href="/contact" class="text-primary hover:text-secondary">contact our sales team</a> for immediate assistance.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-12 lg:mt-0 lg:col-span-7">
                    <div class="bg-light p-6 rounded-lg shadow-sm">
                        <?php if ($success): ?>
                            <div class="rounded-md bg-green-50 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">
                                            Thank you! Your demo request has been submitted. We'll contact you within 24 hours to confirm your appointment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php elseif ($error): ?>
                            <div class="rounded-md bg-red-50 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-red-800">
                                            <?php echo htmlspecialchars($error); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="text-2xl font-extrabold text-dark sm:text-3xl mb-6">
                            Schedule Your Demo
                        </h2>
                        <form method="POST" class="space-y-6">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name *</label>
                                    <div class="mt-1">
                                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700">Email *</label>
                                    <div class="mt-1">
                                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone *</label>
                                    <div class="mt-1">
                                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>" required
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                    <div class="mt-1">
                                        <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($company ?? ''); ?>"
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title</label>
                                    <div class="mt-1">
                                        <input type="text" id="job_title" name="job_title" value="<?php echo htmlspecialchars($job_title ?? ''); ?>"
                                               class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                    </div>
                                </div>
                                
                                <div>
                                    <label for="project_type" class="block text-sm font-medium text-gray-700">Project Type</label>
                                    <div class="mt-1">
                                        <select id="project_type" name="project_type" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                            <option value="residential">Residential</option>
                                            <option value="commercial">Commercial</option>
                                            <option value="industrial">Industrial</option>
                                            <option value="infrastructure">Infrastructure</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="demo_date" class="block text-sm font-medium text-gray-700">Preferred Demo Date/Time</label>
                                <div class="mt-1">
                                    <input type="datetime-local" id="demo_date" name="demo_date" min="<?php echo date('Y-m-d\TH:i'); ?>"
                                           class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md">
                                </div>
                                <p class="mt-1 text-sm text-gray-500">We'll confirm availability via email</p>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Anything specific you'd like to see?</label>
                                <div class="mt-1">
                                    <textarea id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-primary focus:border-primary border-gray-300 rounded-md"><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" type="checkbox" required
                                           class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-medium text-gray-700">I agree to the <a href="/privacy" class="text-primary hover:text-secondary">privacy policy</a> and <a href="/terms" class="text-primary hover:text-secondary">terms of service</a></label>
                                </div>
                            </div>
                            
                            <div>
                                <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                                    Request Demo
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>
</body>
</html>
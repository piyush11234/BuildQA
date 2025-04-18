<?php
// add-project.php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: signin.php');
    exit;
}

// Database connection
require_once 'includes/dbconnect.php';

$user_id = $_SESSION['user_id'];
$errors = [];
$success_message = "";

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $project_name = trim($_POST['project_name']);
    $description = trim($_POST['description']);
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'] ?? null;
    
    // Validation
    if (empty($project_name)) {
        $errors[] = "Project name is required";
    }
    
    if (empty($status)) {
        $errors[] = "Status is required";
    }
    
    if (empty($start_date)) {
        $errors[] = "Start date is required";
    }
    
    // If validation passes, add the project
    if (empty($errors)) {
        try {
            // Create the project
            $stmt = $conn->prepare("INSERT INTO projects (user_id, project_name, description, status, start_date, end_date, last_updated) 
                                  VALUES (?, ?, ?, ?, ?, ?, NOW())");
            $stmt->bind_param("isssss", $user_id, $project_name, $description, $status, $start_date, $end_date);
            $result = $stmt->execute();
            
            if ($result) {
                $success_message = "Project created successfully!";
                // Clear form data after successful submission
                $project_name = $description = $status = $start_date = $end_date = "";
            } else {
                $errors[] = "Failed to create project. Please try again.";
            }
            $stmt->close();
        } catch (Exception $e) {
            $errors[] = "An error occurred: " . $e->getMessage();
        }
    }
}

// Get user details for the navbar
$stmt = $conn->prepare("SELECT name, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project - BuildQA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: '#1e40af',
                    secondary: '#3b82f6',
                    accent: '#60a5fa',
                    dark: '#111827',
                    light: '#f9fafb',
                    success: '#10b981',
                    warning: '#f59e0b',
                    danger: '#ef4444'
                },
                fontFamily: {
                    sans: ['Poppins', 'sans-serif'],
                },
                boxShadow: {
                    card: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
                    'card-hover': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
                }
            }
        }
    }
    </script>
    <style>
    /* Form Container */
    .shadow-card {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.02);
    }

    .shadow-card-hover {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    /* Form Elements */
    .form-control {
        transition: all 0.3s ease;
        padding: 0.5rem 0.75rem;
        border: 1px solid #e2e8f0;
        background-color: #f8fafc;
    }

    .input-focus {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .input-focus:focus {
        border-color: #3f83f8;
        box-shadow: 0 0 0 3px rgba(63, 131, 248, 0.15);
        background-color: white;
    }

    /* Select Dropdown Styling */
    select.form-control {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    /* Button Styling */
    .btn-transition {
        transition: all 0.2s ease-in-out;
    }

    .gradient-bg {
        background: linear-gradient(135deg, #1a56db 0%, #3f83f8 100%);
    }

    .gradient-bg:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(63, 131, 248, 0.25);
    }

    /* Form Layout Improvements */
    .grid-cols-1.sm\:grid-cols-2 {
        gap: 1rem;
    }

    @media (min-width: 640px) {
        .sm\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    /* Label and Icon Styling */
    label.block.text-sm.font-medium.text-gray-700 {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
        color: #374151;
    }

    label i {
        width: 1.25rem;
        text-align: center;
        margin-right: 0.5rem;
        color: #3f83f8;
    }

    /* Helper Text */
    .text-xs.text-gray-500 {
        color: #6b7280;
        font-size: 0.75rem;
        line-height: 1rem;
        margin-top: 0.25rem;
    }

    /* Date Input Styling */
    input[type="date"].form-control {
        appearance: none;
        background-position: right 0.5rem center;
    }

    /* Responsive Padding */
    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .py-6 {
        padding-top: 1.5rem;
        padding-bottom: 1.5rem;
    }

    /* Button Group Spacing */
    .flex.justify-end {
        gap: 0.75rem;
    }

    /* Hover Effects */
    a.hover\:bg-gray-50:hover {
        background-color: #f9fafb;
    }

    /* Focus States */
    button:focus,
    a:focus {
        outline: 2px solid transparent;
        outline-offset: 2px;
        box-shadow: 0 0 0 3px rgba(63, 131, 248, 0.5);
    }

    /* Animation for Form Submission */
    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.7;
        }
    }

    button[type="submit"]:disabled {
        animation: pulse 1.5s infinite;
        cursor: not-allowed;
    }

    /* Improved rounded corners */
    .rounded-xl {
        border-radius: 0.75rem;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }
    </style>
</head>

<body class="font-sans bg-gray-50">
    <!-- Navigation with gradient background -->
    <nav class="gradient-bg text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-xl font-bold tracking-tight">
                            <i class="fas fa-building mr-2"></i>BuildQA
                        </span>
                    </div>
                    <div class="hidden sm:ml-8 sm:flex sm:space-x-8">
                        <a href="welcome.php"
                            class="border-transparent text-white hover:text-gray-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                        </a>
                        <a href="index.php"
                            class="border-transparent text-white hover:text-gray-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-home mr-2"></i>Home
                        </a>
                        <a href="signout.php"
                            class="border-transparent text-white hover:text-gray-200 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            <i class="fas fa-sign-out-alt mr-2"></i>Sign Out
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="ml-3 relative">
                        <div>
                            <button type="button"
                                class="bg-white/20 rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <span
                                    class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-white/30 backdrop-blur-sm">
                                    <span
                                        class="text-sm font-medium leading-none text-white"><?= strtoupper(substr($user['name'], 0, 1)) ?></span>
                                </span>
                            </button>
                        </div>
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden z-50"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            <a href="welcome.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">
                                <i class="fas fa-user mr-2 text-secondary"></i>Your Profile
                            </a>
                            <a href="signout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">
                                <i class="fas fa-sign-out-alt mr-2 text-secondary"></i>Sign out
                            </a>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-gray-200 hover:bg-primary focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <div class="pt-2 pb-3 space-y-1">
                <a href="dashboard.php"
                    class="text-white hover:bg-primary/70 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                </a>
                <a href="index.php"
                    class="text-white hover:bg-primary/70 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-home mr-2"></i>Home
                </a>
                <a href="projects.php"
                    class="text-white hover:bg-primary/70 block px-3 py-2 rounded-md text-base font-medium">
                    <i class="fas fa-project-diagram mr-2"></i>Projects
                </a>
            </div>
            <div class="pt-4 pb-3 border-t border-white/20">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-white/30">
                            <span
                                class="text-sm font-medium leading-none text-white"><?= strtoupper(substr($user['name'], 0, 1)) ?></span>
                        </span>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white"><?= htmlspecialchars($user['name']) ?></div>
                        <div class="text-sm font-medium text-gray-200"><?= htmlspecialchars($user['email']) ?></div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="welcome.php"
                        class="text-white hover:bg-primary/70 block px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-user mr-2"></i>Your Profile
                    </a>
                    <a href="signout.php"
                        class="text-white hover:bg-primary/70 block px-3 py-2 rounded-md text-base font-medium">
                        <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Background design element -->
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-accent rounded-full opacity-10"></div>
        <div class="absolute top-60 -left-20 w-60 h-60 bg-primary rounded-full opacity-5"></div>
    </div>

    <div class="py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header with styled underline -->
            <div class="mb-8 relative">
                <h1 class="text-3xl font-bold text-dark">Add New Project</h1>
                <p class="mt-2 text-gray-600">Create a new construction quality assurance project.</p>
                <div class="absolute bottom-0 left-0 h-1 w-20 bg-gradient-to-r from-primary to-secondary rounded-full">
                </div>
            </div>

            <!-- Error Messages with improved styling -->
            <?php if (!empty($errors)): ?>
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 rounded-r-lg shadow-sm animate-pulse">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
                        <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                            <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Success Message with animation -->
            <?php if (!empty($success_message)): ?>
            <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-6 rounded-r-lg shadow-sm animate-pulse">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800"><?= htmlspecialchars($success_message) ?></p>
                        <p class="mt-2 text-sm text-green-700">
                            <a href="welcome.php"
                                class="font-medium underline hover:text-green-600 transition-colors">Return to
                                dashboard</a> or add another project.
                        </p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Project Form with enhanced styling -->
            <div class="bg-white shadow-card hover:shadow-card-hover rounded-xl transition-all duration-300">
                <div class="px-6 py-6">
                    <form action="add-project.php" method="POST">
                        <!-- Project Name -->
                        <div class="mb-6">
                            <label for="project_name"
                                class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-clipboard-list text-secondary mr-2 text-lg"></i>
                                <span class="leading-tight">Project Name*</span>
                            </label>
                            <input type="text" name="project_name" id="project_name"
                                class="form-control mt-1 focus:ring-secondary focus:border-secondary block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg input-focus"
                                required value="<?= htmlspecialchars($project_name ?? '') ?>"
                                placeholder="Enter project name">
                            <p class="mt-1 text-xs text-gray-500">Enter a clear, descriptive name for your project.</p>
                        </div>

                        <!-- Description -->
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-align-left text-secondary mr-2"></i>Description
                            </label>
                            <textarea name="description" id="description" rows="4"
                                class="form-control mt-1 focus:ring-secondary focus:border-secondary block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg input-focus"
                                placeholder="Provide project details here"><?= htmlspecialchars($description ?? '') ?></textarea>
                            <p class="mt-1 text-xs text-gray-500">Provide details about the project scope, location, and
                                objectives.</p>
                        </div>

                        <!-- Status with styled select -->
                        <div class="mb-6">
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-1">
                                <i class="fas fa-tasks text-secondary mr-2"></i>Status*
                            </label>
                            <div class="relative">
                                <select name="status" id="status"
                                    class="form-control mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-secondary focus:border-secondary sm:text-sm rounded-lg appearance-none input-focus"
                                    required>
                                    <option value="" disabled <?= empty($status ?? '') ? 'selected' : '' ?>>Select a
                                        status</option>
                                    <option value="planning"
                                        <?= isset($status) && $status === 'planning' ? 'selected' : '' ?>>Planning
                                    </option>
                                    <option value="active"
                                        <?= isset($status) && $status === 'active' ? 'selected' : '' ?>>Active</option>
                                    <option value="on-hold"
                                        <?= isset($status) && $status === 'on-hold' ? 'selected' : '' ?>>On Hold
                                    </option>
                                    <option value="completed"
                                        <?= isset($status) && $status === 'completed' ? 'selected' : '' ?>>Completed
                                    </option>
                                </select>
                                <div
                                    class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Dates with improved styling -->
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2 mb-6">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-calendar-alt text-secondary mr-2"></i>Start Date*
                                </label>
                                <input type="date" name="start_date" id="start_date"
                                    class="form-control mt-1 focus:ring-secondary focus:border-secondary block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg input-focus"
                                    required value="<?= htmlspecialchars($start_date ?? '') ?>">
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">
                                    <i class="fas fa-calendar-check text-secondary mr-2"></i>Expected End Date
                                </label>
                                <input type="date" name="end_date" id="end_date"
                                    class="form-control mt-1 focus:ring-secondary focus:border-secondary block w-full shadow-sm sm:text-sm border-gray-300 rounded-lg input-focus"
                                    value="<?= htmlspecialchars($end_date ?? '') ?>">
                            </div>
                        </div>

                        <!-- Submit Button with gradient and animation -->
                        <div class="pt-5">
                            <div class="flex justify-end">
                                <a href="welcome.php"
                                    class="btn-transition bg-white py-2 px-4 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition-all duration-300 mr-3">
                                    <i class="fas fa-times mr-2"></i>Cancel
                                </a>
                                <button type="submit"
                                    class="btn-transition ml-3 inline-flex justify-center py-2 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white gradient-bg hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-secondary transition-all duration-300">
                                    <i class="fas fa-plus mr-2"></i>Create Project
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script>
    // Toggle mobile menu
    document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
        const expanded = this.getAttribute('aria-expanded') === 'true' || false;
        this.setAttribute('aria-expanded', !expanded);
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    // Toggle user dropdown menu
    document.getElementById('user-menu-button')?.addEventListener('click', function() {
        const menu = this.nextElementSibling;
        menu.classList.toggle('hidden');
    });

    // Form animations and validation enhancements
    const formInputs = document.querySelectorAll('input, textarea, select');
    formInputs.forEach(input => {
        // Add focus animations
        input.addEventListener('focus', function() {
            this.parentElement.querySelector('label')?.classList.add('text-secondary');
        });

        input.addEventListener('blur', function() {
            this.parentElement.querySelector('label')?.classList.remove('text-secondary');

            // Simple validation feedback
            if (this.hasAttribute('required') && this.value.trim() === '') {
                this.classList.add('border-red-300');
                this.classList.remove('border-gray-300');
            } else {
                this.classList.remove('border-red-300');
                this.classList.add('border-gray-300');
            }
        });
    });
    </script>
</body>

</html>
<?php
// edit-project.php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header('Location: signin.php');
    exit;
}

// Database connection
require_once 'includes/dbconnect.php';

$user_id = $_SESSION['user_id'];
$project_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $project_name = trim($_POST['project_name']);
    $description = trim($_POST['description']);
    $status = $_POST['status'];
    $start_date = $_POST['start_date'];
    $end_date = !empty($_POST['end_date']) ? $_POST['end_date'] : null;

    // Validate required fields
    $errors = [];
    if (empty($project_name)) {
        $errors[] = "Project name is required.";
    }
    if (empty($start_date)) {
        $errors[] = "Start date is required.";
    }
    if (empty($status)) {
        $errors[] = "Status is required.";
    }

    if (empty($errors)) {
        // Current timestamp for last_updated
        $current_time = date('Y-m-d H:i:s');

        // Update project
        $stmt = $conn->prepare("
            UPDATE projects 
            SET project_name = ?, description = ?, status = ?, start_date = ?, end_date = ?, 
                last_updated = ?
            WHERE id = ? AND user_id = ?
        ");
        $stmt->bind_param(
            "ssssssii", 
            $project_name, $description, $status, $start_date, $end_date,
            $current_time, $project_id, $user_id
        );
        
        if ($stmt->execute()) {
            $_SESSION['success'] = "Project updated successfully!";
            header("Location: projects.php?id=" . $project_id);
            exit;
        } else {
            $errors[] = "Error updating project: " . $conn->error;
        }
    }
}

// Fetch project data for the form
$stmt = $conn->prepare("
    SELECT * FROM projects 
    WHERE id = ? AND user_id = ?
");
$stmt->bind_param("ii", $project_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // Project not found or doesn't belong to user
    $_SESSION['error'] = "Project not found or you don't have permission to edit it.";
    header("Location: projects.php");
    exit;
}

$project = $result->fetch_assoc();
$conn->close();

// Get user details for navigation
$user_name = $_SESSION['user_name'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project - BuildQA</title>
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
                        light: '#f9fafb',
                        success: '#10b981',
                        warning: '#f59e0b',
                        danger: '#ef4444'
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
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-xl font-bold text-primary">BuildQA</span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="welcome.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                        <a href="index.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="projects.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Projects
                        </a>
                        <a href="signout.php" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Sign Out
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="ml-3 relative">
                        <div>
                            <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-primary">
                                    <span class="text-sm font-medium leading-none text-white"><?= strtoupper(substr($user_name, 0, 1)) ?></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu (hidden by default) -->
        <div class="sm:hidden hidden" id="mobile-menu">
            <!-- Mobile menu links -->
        </div>
    </nav>

    <div class="py-10">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-dark">Edit Project</h1>
                <p class="mt-2 text-gray-600">Update your project information.</p>
            </div>

            <!-- Error Messages -->
            <?php if (isset($errors) && !empty($errors)): ?>
                <div class="mb-4 bg-red-50 border-l-4 border-red-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were errors with your submission:</h3>
                            <ul class="mt-2 text-sm text-red-700 list-disc list-inside">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= htmlspecialchars($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Project Form -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <form action="edit-project.php?id=<?= $project_id ?>" method="POST">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Project Information</h3>
                        <p class="mt-1 text-sm text-gray-500">Fields marked with * are required.</p>
                    </div>
                    <div class="px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <!-- Project Name -->
                            <div class="sm:col-span-6">
                                <label for="project_name" class="block text-sm font-medium text-gray-700">Project Name *</label>
                                <div class="mt-1">
                                    <input type="text" name="project_name" id="project_name" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md" value="<?= htmlspecialchars($project['project_name']) ?>" required>
                                </div>
                            </div>

                            <!-- Description -->
                            <div class="sm:col-span-6">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="3" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md"><?= htmlspecialchars($project['description']) ?></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Brief description of the project.</p>
                            </div>

                            <!-- Status -->
                            <div class="sm:col-span-3">
                                <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
                                <div class="mt-1">
                                    <select id="status" name="status" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md" required>
                                        <option value="planning" <?= $project['status'] == 'planning' ? 'selected' : '' ?>>Planning</option>
                                        <option value="active" <?= $project['status'] == 'active' ? 'selected' : '' ?>>Active</option>
                                        <option value="on-hold" <?= $project['status'] == 'on-hold' ? 'selected' : '' ?>>On Hold</option>
                                        <option value="completed" <?= $project['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Date Fields -->
                            <div class="sm:col-span-3">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date *</label>
                                <div class="mt-1">
                                    <input type="date" name="start_date" id="start_date" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md" value="<?= htmlspecialchars($project['start_date']) ?>" required>
                                </div>
                            </div>

                            <div class="sm:col-span-3">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <div class="mt-1">
                                    <input type="date" name="end_date" id="end_date" class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md" value="<?= htmlspecialchars($project['end_date'] ?? '') ?>">
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Leave blank if ongoing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <a href="project.php?id=<?= $project_id ?>" class="inline-flex justify-center py-2 px-4 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 mr-2">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
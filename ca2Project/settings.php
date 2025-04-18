<?php
// settings.php
session_start();

// Redirect to login if not authenticated
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: signin.php');
    exit;
}

// Database connection
require_once 'includes/dbconnect.php';
$password_success="";
$password_error="";
// Get user details
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT name, email, phone, company, notification_preferences FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Handle form submission
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $company = $_POST['company'] ?? '';
    $notification_email = isset($_POST['notification_email']) ? 1 : 0;
    $notification_sms = isset($_POST['notification_sms']) ? 1 : 0;
    
    // Update user information
    $stmt = $conn->prepare("UPDATE users SET name = ?, phone = ?, company = ?, notification_preferences = ? WHERE id = ?");
    $notification_preferences = json_encode([
        'email' => $notification_email,
        'sms' => $notification_sms
    ]);
    $stmt->bind_param("ssssi", $name, $phone, $company, $notification_preferences, $user_id);
    
    if ($stmt->execute()) {
        $success_message = 'Settings updated successfully!';
        // Refresh user data
        $stmt = $conn->prepare("SELECT name, email, phone, company, notification_preferences FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
    } else {
        $error_message = 'Error updating settings: ' . $conn->error;
    }
    // $stmt->close();
}

// Handle password change
if (isset($_POST['current_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Verify current password
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $db_user = $result->fetch_assoc();
    $stmt->close();
    
    if (password_verify($current_password, $db_user['password'])) {
        if ($new_password === $confirm_password) {
            if (strlen($new_password) >= 8) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
                $stmt->bind_param("si", $hashed_password, $user_id);
                
                if ($stmt->execute()) {
                    $password_success = 'Password changed successfully!';
                } else {
                    $password_error = 'Error updating password: ' . $conn->error;
                }
                $stmt->close();
            } else {
                $password_error = 'New password must be at least 8 characters long';
            }
        } else {
            $password_error = 'New passwords do not match';
        }
    } else {
        $password_error = 'Current password is incorrect';
    }
}
$conn->close();

// Parse notification preferences
$notification_prefs = json_decode($user['notification_preferences'] ?? '{}', true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings - BuildQA</title>
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
    <style>
    /* settings.css */
    :root {
        --primary: #1a56db;
        --secondary: #1c64f2;
        --accent: #3f83f8;
        --dark: #1f2a37;
        --light: #f9fafb;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
    }

    /* Base styles */
    body {
        color: var(--dark);
        line-height: 1.6;
    }

    /* Navigation enhancements */
    nav {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Form input focus states */
    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(26, 86, 219, 0.1);
        transition: all 0.2s ease;
    }

    /* Button animations */
    button {
        transition: all 0.2s ease;
    }

    button:hover {
        transform: translateY(-1px);
    }

    /* Form sections */
    .bg-white {
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    /* Notification preferences checkboxes */
    input[type="checkbox"] {
        accent-color: var(--primary);
    }

    /* Delete account button */
    .bg-red-600:hover {
        background-color: var(--danger);
        box-shadow: 0 1px 2px rgba(239, 68, 68, 0.2);
    }

    /* Success/error messages */
    .rounded-md {
        animation: fadeIn 0.3s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Mobile menu */
    #mobile-menu {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    #mobile-menu:not(.hidden) {
        max-height: 500px;
    }

    /* Password strength indicator */
    .password-strength {
        height: 4px;
        margin-top: 0.5rem;
        background-color: #e5e7eb;
        border-radius: 2px;
        overflow: hidden;
    }

    .password-strength-bar {
        height: 100%;
        width: 0;
        transition: width 0.3s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .sm\:grid-cols-6>div {
            grid-column: span 6 / span 6;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    }

    /* Custom transitions */
    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }

    /* Avatar in navigation */
    .inline-flex.items-center.justify-center.h-8.w-8.rounded-full {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        background-color: var(--primary);
        color: white;
    }

    /* Form labels */
    label.block.text-sm.font-medium.text-gray-700 {
        margin-bottom: 0.25rem;
        display: block;
        font-weight: 500;
    }

    /* Input fields */
    .shadow-sm {
        padding: 0.5rem 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        width: 100%;
    }

    /* Section headers */
    .text-lg.leading-6.font-medium.text-gray-900 {
        font-size: 1.125rem;
        line-height: 1.5rem;
        font-weight: 500;
        color: var(--dark);
    }

    /* Subtle text */
    .text-gray-500 {
        color: #6b7280;
    }
    </style>

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
                        <a href="welcome.php"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Dashboard
                        </a>
                        <a href="index.php"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Home
                        </a>
                        <a href="settings.php"
                            class="border-primary text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Settings
                        </a>
                        <a href="signout.php"
                            class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Sign Out
                        </a>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center">
                    <div class="ml-3 relative">
                        <div>
                            <button type="button"
                                class="bg-white rounded-full flex text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-primary">
                                    <span
                                        class="text-sm font-medium leading-none text-white"><?= strtoupper(substr($user['name'], 0, 1)) ?></span>
                                </span>
                            </button>
                        </div>
                        <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                            <a href="profile.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Your Profile</a>
                            <a href="settings.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Settings</a>
                            <a href="signout.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Sign out</a>
                        </div>
                    </div>
                </div>
                <div class="-mr-2 flex items-center sm:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary"
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
                    class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Dashboard</a>
                <a href="index.php"
                    class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Home</a>
                <a href="settings.php"
                    class="border-primary text-gray-900 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Settings</a>
            </div>
            <div class="pt-4 pb-3 border-t border-gray-200">
                <div class="flex items-center px-4">
                    <div class="flex-shrink-0">
                        <span class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-primary">
                            <span
                                class="text-sm font-medium leading-none text-white"><?= strtoupper(substr($user['name'], 0, 1)) ?></span>
                        </span>
                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-gray-800"><?= htmlspecialchars($user['name']) ?></div>
                        <div class="text-sm font-medium text-gray-500"><?= htmlspecialchars($user['email']) ?></div>
                    </div>
                </div>
                <div class="mt-3 space-y-1">
                    <a href="profile.php"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Your
                        Profile</a>
                    <a href="settings.php"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Settings</a>
                    <a href="signout.php"
                        class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">Sign
                        out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-dark">Account Settings</h1>
                <p class="mt-2 text-gray-600">Manage your account information and preferences.</p>
            </div>

            <!-- Success/Error Messages -->
            <?php if ($success_message): ?>
            <div class="rounded-md bg-green-50 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800"><?= htmlspecialchars($success_message) ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php if ($error_message): ?>
            <div class="rounded-md bg-red-50 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800"><?= htmlspecialchars($error_message) ?></p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <form method="POST" action="settings.php">
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Profile Information</h3>
                        <p class="mt-1 text-sm text-gray-500">Update your basic profile information.</p>

                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                            <div class="sm:col-span-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full name</label>
                                <div class="mt-1">
                                    <input type="text" name="name" id="name" autocomplete="name"
                                        value="<?= htmlspecialchars($user['name']) ?>"
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email"
                                        value="<?= htmlspecialchars($user['email']) ?>"
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md bg-gray-100"
                                        readonly>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Contact support to change your email address.</p>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone number</label>
                                <div class="mt-1">
                                    <input type="text" name="phone" id="phone" autocomplete="tel"
                                        value="<?= htmlspecialchars($user['phone']) ?>"
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>

                            <div class="sm:col-span-4">
                                <label for="company" class="block text-sm font-medium text-gray-700">Company</label>
                                <div class="mt-1">
                                    <input type="text" name="company" id="company" autocomplete="organization"
                                        value="<?= htmlspecialchars($user['company']) ?>"
                                        class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Notification Preferences</h3>
                        <p class="mt-1 text-sm text-gray-500">Choose how you'd like to receive notifications.</p>

                        <fieldset class="mt-6">
                            <legend class="sr-only">Notification preferences</legend>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="notification_email" name="notification_email" type="checkbox"
                                            class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded"
                                            <?= ($notification_prefs['email'] ?? false) ? 'checked' : '' ?>>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="notification_email" class="font-medium text-gray-700">Email
                                            notifications</label>
                                        <p class="text-gray-500">Receive important updates via email</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <div class="flex items-center h-5">
                                        <input id="notification_sms" name="notification_sms" type="checkbox"
                                            class="focus:ring-primary h-4 w-4 text-primary border-gray-300 rounded"
                                            <?= ($notification_prefs['sms'] ?? false) ? 'checked' : '' ?>>
                                    </div>
                                    <div class="ml-3 text-sm">
                                        <label for="notification_sms" class="font-medium text-gray-700">SMS
                                            notifications</label>
                                        <p class="text-gray-500">Receive urgent alerts via text message</p>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

            </div>
            </fieldset>
        </div>

        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit"
                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                Save Changes
            </button>
        </div>
        </form>
    </div>

    <!-- Account Security Section -->
    <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
        <form method="POST" action="settings.php">
            <div class="px-4 py-5 sm:p-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Account Security</h3>
                <p class="mt-1 text-sm text-gray-500">Change your password to secure your account.</p>

                <?php if ($password_success): ?>
                <div class="rounded-md bg-green-50 p-4 mt-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800"><?= htmlspecialchars($password_success) ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if ($password_error): ?>
                <div class="rounded-md bg-red-50 p-4 mt-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-red-800"><?= htmlspecialchars($password_error) ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Current
                            Password</label>
                        <div class="mt-1">
                            <input type="password" name="current_password" id="current_password"
                                autocomplete="current-password"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="new_password" class="block text-sm font-medium text-gray-700">New Password</label>
                        <div class="mt-1">
                            <input type="password" name="new_password" id="new_password" autocomplete="new-password"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                            <p class="mt-2 text-sm text-gray-500">Must be at least 8 characters long</p>
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm New
                            Password</label>
                        <div class="mt-1">
                            <input type="password" name="confirm_password" id="confirm_password"
                                autocomplete="new-password"
                                class="shadow-sm focus:ring-primary focus:border-primary block w-full sm:text-sm border-gray-300 rounded-md">
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" name="change_password"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-primary hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                    Change Password
                </button>
            </div>
        </form>
    </div>

    <!-- Delete Account Section -->
    <div class="mt-8 bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete Account</h3>
            <p class="mt-1 text-sm text-gray-500">Permanently delete your account and all associated data.</p>

            <div class="mt-6">
                <button type="button" onclick="confirmDelete()"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    Delete Account
                </button>
            </div>
        </div>
    </div>
    </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
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

    // Confirm account deletion
    function confirmDelete() {
        if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
            // Redirect to delete account script
            window.location.href = 'delete-account.php';
        }
    }
    </script>
</body>

</html>
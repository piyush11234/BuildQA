<?php
session_start();

// Database connection
include 'includes/dbconnect.php';

// Initialize variables
$errors = [];
$name = $email = $phone = $company = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['company']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate inputs
    if (empty($name)) {
        $errors['name'] = 'Full name is required';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address';
    }

    if (!empty($phone) && !preg_match('/^[\d\s\-+()]{10,20}$/', $phone)) {
        $errors['phone'] = 'Please enter a valid phone number';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters';
    }

    if ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    // Check if email already exists
    if (empty($errors)) {
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $errors['email'] = 'Email already registered';
        }
        $stmt->close();
    }

    // Create new user
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, company, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $phone, $company, $hashed_password);
        
        if ($stmt->execute()) {
            $_SESSION['signup_success'] = true;
            $_SESSION['user_email'] = $email;
            header('Location: welcome.php');
            exit;
        } else {
            $errors['general'] = 'Registration failed. Please try again.';
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
    <title>User Sign Up - BuildQA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    .password-strength {
        height: 4px;
        background-color: #e5e7eb;
        margin-top: 4px;
        border-radius: 2px;
        overflow: hidden;
    }

    .password-strength-bar {
        height: 100%;
        width: 0%;
        transition: width 0.3s ease, background-color 0.3s ease;
    }
    .neo{
            background: linear-gradient(135deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
        }
        
        


    </style>
</head>

<body class="neo font-sans bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-6 py-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-dark">
                <i class="fas fa-building text-primary mr-2"></i> BuildQA
            </h1>
            <p class="p mt-2 text-white text-2xl">Create your user account</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="px-8 py-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">User Registration</h2>

                <?php if (!empty($errors['general'])): ?>
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700"><?php echo htmlspecialchars($errors['general']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name*</label>
                        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>"
                            class="focus:ring-primary focus:border-primary block w-full px-3 py-2 border <?php echo isset($errors['name']) ? 'border-red-300' : 'border-gray-300'; ?> rounded-md"
                            placeholder="Your full name" required>
                        <?php if (isset($errors['name'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo $errors['name']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email*</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"
                            class="focus:ring-primary focus:border-primary block w-full px-3 py-2 border <?php echo isset($errors['email']) ? 'border-red-300' : 'border-gray-300'; ?> rounded-md"
                            placeholder="your@email.com" required>
                        <?php if (isset($errors['email'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo $errors['email']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>"
                            class="focus:ring-primary focus:border-primary block w-full px-3 py-2 border <?php echo isset($errors['phone']) ? 'border-red-300' : 'border-gray-300'; ?> rounded-md"
                            placeholder="(123) 456-7890">
                        <?php if (isset($errors['phone'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo $errors['phone']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                        <input type="text" id="company" name="company" value="<?php echo htmlspecialchars($company); ?>"
                            class="focus:ring-primary focus:border-primary block w-full px-3 py-2 border border-gray-300 rounded-md"
                            placeholder="Your company (optional)">
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password*</label>
                        <div class="relative rounded-md shadow-sm">
                            <input type="password" id="password" name="password"
                                class="focus:ring-primary focus:border-primary block w-full pr-10 pl-3 py-2 border <?php echo isset($errors['password']) ? 'border-red-300' : 'border-gray-300'; ?> rounded-md"
                                placeholder="At least 8 characters" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none"
                                    id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="password-strength">
                            <div class="password-strength-bar" id="passwordStrengthBar"></div>
                        </div>
                        <?php if (isset($errors['password'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo $errors['password']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirm
                            Password*</label>
                        <div class="relative rounded-md shadow-sm">
                            <input type="password" id="confirm_password" name="confirm_password"
                                class="focus:ring-primary focus:border-primary block w-full pr-10 pl-3 py-2 border <?php echo isset($errors['confirm_password']) ? 'border-red-300' : 'border-gray-300'; ?> rounded-md"
                                placeholder="Confirm your password" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <button type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none"
                                    id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <?php if (isset($errors['confirm_password'])): ?>
                        <p class="mt-1 text-sm text-red-600"><?php echo $errors['confirm_password']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox"
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" required>
                        <label for="terms" class="ml-2 block text-sm text-gray-700">
                            I agree to the <a href="#" class="text-primary hover:text-secondary">Terms of Service</a>
                            and <a href="#" class="text-primary hover:text-secondary">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                            class="w-full flex justify-center items-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-700 hover:bg-blue-500 ">
                            <i class="fas fa-user-plus mr-2"></i> Create Account
                        </button>
                    </div>
                </form>
            </div>

            <div class="bg-gray-50 px-8 py-4 border-t border-gray-200">
                <p class="text-sm text-gray-600 text-center">
                    Already have an account? <a href="signin.php"
                        class="font-medium text-blue-700 hover:text-secondary">Sign in here</a>
                </p>
            </div>
        </div>

        <div class="mt-8 text-center text-sm text-white">
            <p>&copy; <?php echo date('Y'); ?> BuildQA. All rights reserved.</p>
        </div>
    </div>

    <script>
    // Toggle password visibility
    document.addEventListener('DOMContentLoaded', function() {
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('confirm_password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                '<i class="fas fa-eye"></i>' :
                '<i class="fas fa-eye-slash"></i>';
        });

        toggleConfirmPassword.addEventListener('click', function() {
            const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                '<i class="fas fa-eye"></i>' :
                '<i class="fas fa-eye-slash"></i>';
        });

        // Password strength indicator
        passwordInput.addEventListener('input', function() {
            const strengthBar = document.getElementById('passwordStrengthBar');
            const strength = calculatePasswordStrength(this.value);

            strengthBar.style.width = strength.percentage + '%';
            strengthBar.style.backgroundColor = strength.color;
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            // Length check
            if (password.length > 7) strength += 25;
            if (password.length > 11) strength += 15;
            // Character variety
            if (/[A-Z]/.test(password)) strength += 15;
            if (/[0-9]/.test(password)) strength += 15;
            if (/[^A-Za-z0-9]/.test(password)) strength += 15;
            // Common patterns
            if (!/(.)\1{2,}/.test(password)) strength += 15;

            strength = Math.min(100, Math.max(0, strength));

            let color;
            if (strength < 40) color = '#ef4444'; // red
            else if (strength < 70) color = '#f59e0b'; // amber
            else color = '#10b981'; // emerald

            return {
                percentage: strength,
                color: color
            };
        }
    });
    </script>
</body>

</html>
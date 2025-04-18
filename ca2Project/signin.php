<?php
// login.php
session_start();

// Redirect if already logged in
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header('Location: welcome.php');
    exit;
}

// Database connection
include 'includes/dbconnect.php';

// Initialize variables
$error = '';
$email = '';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $remember = isset($_POST['remember']);

    // Validate inputs
    if (empty($email) || empty($password)) {
        $error = 'Please enter both email and password.';
    } else {
        // Prepare SQL to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Authentication successful
                $_SESSION['user_logged_in'] = true;
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                
                // Regenerate session ID to prevent fixation
                session_regenerate_id(true);
                
                // Remember me functionality
                if ($remember) {
                    $token = bin2hex(random_bytes(32));
                    $expiry = time() + 60 * 60 * 24 * 30; // 30 days
                    
                    setcookie('remember_token', $token, $expiry, '/');
                    
                    // Store token in database
                    $stmt = $conn->prepare("UPDATE users SET remember_token = ?, token_expiry = ? WHERE id = ?");
                    $stmt->bind_param("ssi", $token, date('Y-m-d H:i:s', $expiry), $user['id']);
                    $stmt->execute();
                    $stmt->close();
                }
                
                // Redirect to dashboard
                header('Location: welcome.php');
                exit;
            } else {
                $error = 'Invalid email or password.';
            }
        } else {
            $error = 'Invalid email or password.';
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - BuildQA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            blue: '#0062ff',
                            purple: '#6b46c1',
                            pink: '#e31b6d',
                            dark: '#1e1e2f',
                            light: '#f2f6ff'
                        }
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8fafc;
        }
        
        .mesh-gradient {
            background: linear-gradient(45deg, rgba(239,68,68,0.7) 0%, rgba(219,39,119,0.7) 13%, rgba(139,92,246,0.7) 25%, rgba(59,130,246,0.7) 38%, rgba(16,185,129,0.7) 50%, rgba(251,191,36,0.7) 63%, rgba(245,158,11,0.7) 75%, rgba(239,68,68,0.7) 87%, rgba(219,39,119,0.7) 100%);
            background-size: 300% 300%;
            animation: gradient-shift 15s ease infinite;
        }
        
        @keyframes gradient-shift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .login-box {
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }
        
        .login-field {
            border: 2px solid #e2e8f0;
            transition: all 0.3s ease;
        }
        
        .login-field:focus {
            border-color: #0062ff;
            box-shadow: 0 0 0 3px rgba(0, 98, 255, 0.2);
        }
        
        .login-button {
            background: linear-gradient(90deg, #0062ff, #6b46c1);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 98, 255, 0.3);
        }
        
        .login-button:hover {
            background: linear-gradient(90deg, #6b46c1, #0062ff);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 98, 255, 0.4);
        }
        
        .shape-blob {
            position: absolute;
            border-radius: 45% 55% 70% 30% / 30% 40% 60% 70%;
            filter: blur(5px);
            animation: blob-movement 20s infinite alternate;
            opacity: 0.7;
        }
        
        @keyframes blob-movement {
            0% { transform: translate(0, 0) rotate(0deg) scale(1); }
            25% { transform: translate(50px, -50px) rotate(90deg) scale(1.1); }
            50% { transform: translate(100px, 50px) rotate(180deg) scale(0.9); }
            75% { transform: translate(50px, 100px) rotate(270deg) scale(1.2); }
            100% { transform: translate(0, 0) rotate(360deg) scale(1); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .highlight-input-field {
            position: relative;
            overflow: hidden;
        }
        
        .highlight-input-field::after {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #0062ff, #6b46c1, #e31b6d);
            bottom: 0;
            left: -100%;
            transition: 0.5s;
        }
        
        .highlight-input-field:focus-within::after {
            left: 0;
        }
        
        .checkmark-custom {
            appearance: none;
            width: 18px;
            height: 18px;
            border: 2px solid #cbd5e1;
            border-radius: 4px;
            background-color: white;
            transition: all 0.2s;
            position: relative;
        }
        
        .checkmark-custom:checked {
            background-color: #0062ff;
            border-color: #0062ff;
        }
        
        .checkmark-custom:checked::after {
            content: "✓";
            color: white;
            position: absolute;
            top: -1px;
            left: 3px;
            font-size: 12px;
        }
    </style>
</head>
<body class="mesh-gradient min-h-screen flex items-center justify-center p-6">
    <!-- Decorative Blobs -->
    <div class="shape-blob w-64 h-64 bg-pink-500/30 top-10 left-10 fixed z-0"></div>
    <div class="shape-blob w-80 h-80 bg-blue-500/30 bottom-10 right-10 fixed z-0"></div>
    <div class="shape-blob w-72 h-72 bg-purple-500/30 bottom-32 left-32 fixed z-0"></div>
    <div class="shape-blob w-48 h-48 bg-green-500/30 top-32 right-32 fixed z-0"></div>
    
    <div class="login-box w-full max-w-md p-8 z-10 relative">
        <!-- Logo & Header -->
        <div class="text-center mb-10">
            <div class="w-24 h-24 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl mx-auto flex items-center justify-center shadow-lg pulse mb-4">
                <i class="fas fa-building text-4xl text-white"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mt-4">Welcome Back</h1>
            <p class="text-gray-600 mt-2">BuildQA Construction Quality Assurance</p>
        </div>
        
        <?php if ($error): ?>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-700"><?php echo $error; ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <form class="space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="space-y-5">
                <div class="highlight-input-field">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1 ml-1">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="text" required 
                            class="login-field pl-10 pr-3 py-3 w-full rounded-lg focus:outline-none text-gray-700" 
                            placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>">
                    </div>
                </div>

                <div class="highlight-input-field">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1 ml-1">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" required 
                            class="login-field pl-10 pr-3 py-3 w-full rounded-lg focus:outline-none text-gray-700" 
                            placeholder="Enter your password">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" 
                        class="checkmark-custom">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                        Remember me
                    </label>
                   
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" 
                    class="login-button w-full rounded-lg text-white py-3.5 font-medium text-base relative overflow-hidden group">
                    <span class="relative z-10 flex items-center justify-center">
                        Sign in
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </span>
                </button>
            </div>
            <div class="text-center mt-4">
                don't hava an account?
                <a href="signUp.php" class="text-sm text-blue-600 hover:text-blue-500">Sign Up</a>  
        </form>
    </div>
</body>
</html>
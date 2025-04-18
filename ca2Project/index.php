<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuildQA - Real-Time Construction Quality Assurance</title>
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
    <style rel="stylesheet" href="includes/style.css"></style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <?php include 'includes/nav.php'; ?>


    

    <!-- Hero Section -->
    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 lg:mt-16 lg:px-8 xl:mt-20">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-dark sm:text-5xl md:text-6xl">
                            <span class="block">Real-Time Quality</span>
                            <span class="block text-primary">Assurance for Construction</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Monitor, detect, and resolve quality issues instantly with our AI-powered construction quality assurance platform.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-center">
                            <div class="rounded-md shadow">
                                <a href="bookDemo.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary md:py-4 md:text-lg md:px-10">
                                    Request Demo
                                </a>
                            </div>
                            <!-- <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-accent bg-opacity-10 hover:bg-opacity-20 md:py-4 md:text-lg md:px-10">
                                    See How It Works
                                </a>
                            </div> -->
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="Construction site with quality inspection">
        </div>
    </div>

    <!-- Key Benefits -->
    <div class="py-12 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Benefits</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark sm:text-4xl">
                    Transform Your Quality Control Process
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-dark">90% Faster Defect Detection</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">Identify quality issues in real-time before they become costly problems.</p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-dark">Automated Compliance</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">Ensure all work meets specifications and regulatory requirements automatically.</p>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-dark">40-60% Less Rework</p>
                        <p class="mt-2 ml-16 text-base text-gray-500">Catch issues early to dramatically reduce costly rework expenses.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- logo  -->
<div class="bg-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-sm font-semibold uppercase text-gray-500 tracking-wide">
            Trusted by leading construction firms worldwide
        </p>
        <div class="mt-6 grid grid-cols-2 gap-8 sm:grid-cols-3 md:grid-cols-5">
            <div class="col-span-1 flex justify-center items-center">
                <img class="h-12" src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/slack.svg" alt="Slack logo">
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <img class="h-12" src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/github.svg" alt="GitHub logo">
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <img class="h-12" src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/netflix.svg" alt="Netflix logo">
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <img class="h-12" src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/google.svg" alt="Google logo">
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <img class="h-12" src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/microsoft.svg" alt="Microsoft logo">
            </div>
        </div>
    </div>
</div>



    <!-- Testimonials -->
    <div class="bg-primary">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Ready to transform your quality assurance?</span>
                <span class="block text-accent">Start your free trial today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="signUp.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-50">
                        Get started
                    </a>
                </div>
                <!-- <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="learnMore.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-secondary hover:bg-accent">
                        Learn more
                    </a>
                </div> -->
            </div>
        </div>
    </div>
 <!-- Footer  -->
  <?php include 'includes/footer.php'; ?>
    <!-- Mobile Menu -->
     <!-- Mobile Menu -->
<div id="mobileMenu" class="hidden md:hidden bg-white shadow-lg">
    <div class="px-4 pt-4 pb-2 space-y-2">
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:bg-gray-100">Home</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:bg-gray-100">Features</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:bg-gray-100">Pricing</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-dark hover:bg-gray-100">Contact</a>
        <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-primary hover:bg-gray-100">Login</a>
    </div>
</div>

<!-- Hamburger Button -->
<button onclick="toggleMenu()" class="md:hidden flex items-center px-3 py-2 border rounded text-primary border-primary focus:outline-none">
    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
        <path d="M4 5h16M4 12h16M4 19h16" />
    </svg>
</button>

<script src="includes/script.js"></script>

 
</body>
</html>

                
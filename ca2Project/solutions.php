<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solutions - BuildQA</title>
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
    <style>
        .grp:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease-in-out;
        }
        .bg-light {
            background-color: #f9fafb;
        }
        .text-dark {
            color: #1f2a37;
        }
        .text-primary {
            color: #1a56db;
        }
        .text-secondary {
            color: #1c64f2;
        }
        .text-accent {
            color: #3f83f8;
        }
        .bg-primary {
            background-color: #1a56db;
        }
        .bg-secondary {
            background-color: #1c64f2;
        }
        .bg-accent {
            background-color: #3f83f8;
        }
        .text-white {
            color: #ffffff;
        }
        .bg-white {
            background-color: #ffffff;
        }
        .text-gray-500 {
            color: #6b7280;
        }
        .text-gray-900 {
            color: #111827;
        }
        .text-gray-800 {
            color: #374151;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation  -->
   <?php include 'includes/nav.php'; ?>

    <!-- Solutions Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                Industry-Specific Solutions
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Tailored quality assurance solutions for every type of construction project.
            </p>
        </div>
    </div>

    <!-- Solutions Grid -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-12">

                <!-- High-Rise Buildings -->
                <div class="grp relative bg-light p-8 rounded-lg shadow-sm">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                        <div class="relative lg:col-start-2 lg:row-start-1">
                            <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                                High-Rise Buildings
                            </h2>
                            <p class="mt-3 text-lg text-gray-500">
                                Ensure structural integrity and material quality throughout the construction of tall buildings with our specialized monitoring systems.
                            </p>
                            <div class="mt-8">
                                <div class="inline-flex rounded-md shadow">
                                    <a href="./solution/high_rise_building.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                        Learn more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 lg:mt-0 lg:col-start-1 lg:row-start-1">
                            <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1487958449943-2429e8be8625?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="High-rise building construction">
                        </div>
                    </div>
                </div>


                

                <!-- Infrastructure -->
                <div class="grp relative bg-light p-8 rounded-lg shadow-sm">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                        <div>
                            <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                                Infrastructure Projects
                            </h2>
                            <p class="mt-3 text-lg text-gray-500">
                                Monitor bridges, tunnels, and roads with our ruggedized sensors designed for large-scale civil engineering projects.
                            </p>
                            <div class="mt-8">
                                <div class="inline-flex rounded-md shadow">
                                    <a href="./solution/infrastructure.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                        Learn more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 lg:mt-0">
                            <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1508804185872-d7badad00f7d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Infrastructure construction">
                        </div>
                    </div>
                </div>

                <!-- Industrial -->
                <div class="grp relative bg-light p-8 rounded-lg shadow-sm">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                        <div class="relative lg:col-start-2 lg:row-start-1">
                            <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                                Industrial Facilities
                            </h2>
                            <p class="mt-3 text-lg text-gray-500">
                                Specialized solutions for factories, power plants, and refineries with hazardous environment monitoring capabilities.
                            </p>
                            <div class="mt-8">
                                <div class="inline-flex rounded-md shadow">
                                    <a href="./solution/industrial.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                        Learn more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 lg:mt-0 lg:col-start-1 lg:row-start-1">
                            <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1513828583688-c52646db42da?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Industrial construction">
                        </div>
                    </div>
                </div>

                <!-- Residential -->
                <div class="grp relative bg-light p-8 rounded-lg shadow-sm">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                        <div>
                            <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                                Residential Developments
                            </h2>
                            <p class="mt-3 text-lg text-gray-500">
                                Cost-effective quality monitoring for housing projects with streamlined inspection workflows.
                            </p>
                            <div class="mt-8">
                                <div class="inline-flex rounded-md shadow">
                                    <a href="./solution/residential.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                        Learn more
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 lg:mt-0">
                            <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Residential construction">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="bg-primary">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                <span class="block">Need a custom solution?</span>
                <span class="block text-accent">Our experts can help.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="contact.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-50">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer-->
    <?php include 'includes/footer.php'; ?>
    <!-- Mobile Menu -->
    <div class="hidden sm:hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="index.php" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Home</a>
            <a href="features.php" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Features</a>
            <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Solutions</a>
            <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Pricing</a>
            <a href="#" class="text-gray-900 hover:bg-gray-50 hover:text-gray-900 block px-3 py-2 rounded-md text-base font-medium">Resources</a>
        </div>
    </div>
    
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - BuildQA</title>
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
    <!-- Navigation  -->
    <?php include 'includes/nav.php'; ?>

    <!-- About Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                About BuildQA
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Revolutionizing construction quality assurance through technology and innovation.
            </p>
        </div>
    </div>

    <!-- Our Story -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div>
                    <h2 class="text-3xl font-extrabold text-dark sm:text-4xl">
                        Our Story
                    </h2>
                    <p class="mt-3 text-lg text-gray-500">
                        Founded in 2025 by a team of construction professionals and software engineers, BuildQA was born out of frustration with the inefficiencies in traditional quality assurance processes.
                    </p>
                    <p class="mt-3 text-lg text-gray-500">
                        After witnessing millions wasted on rework and delays due to preventable quality issues, we set out to create a real-time monitoring system that would transform how construction quality is managed.
                    </p>
                    <p class="mt-3 text-lg text-gray-500">
                        Today, our platform is trusted by leading construction firms worldwide to deliver higher quality projects faster and with less waste.
                    </p>
                </div>
                <div class="mt-10 lg:mt-0">
                    <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Our team">
                </div>
            </div>
        </div>
    </div>

    <!-- Mission -->
    <div class="py-12 bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div class="lg:col-start-2">
                    <h2 class="text-3xl font-extrabold text-dark sm:text-4xl">
                        Our Mission
                    </h2>
                    <p class="mt-3 text-lg text-gray-500">
                        To eliminate preventable construction defects through real-time monitoring and predictive analytics.
                    </p>
                    <div class="mt-6 space-y-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-lg text-gray-500">
                                    Reduce construction rework by 50% industry-wide
                                </p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-lg text-gray-500">
                                    Make quality assurance proactive rather than reactive
                                </p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-lg text-gray-500">
                                    Bring construction quality into the digital age
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 lg:mt-0 lg:col-start-1 lg:row-start-1">
                    <img class="rounded-lg shadow-xl" src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Construction site">
                </div>
            </div>
        </div>
    </div>

    <!-- Leadership -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-dark sm:text-4xl">
                    Our Leadership
                </h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    Experienced professionals from construction and technology backgrounds
                </p>
            </div>
            <div class="mt-12 grid gap-8 lg:grid-cols-3">
                <!-- Team Member 1 -->
                <div class="pt-6">
                    <div class="flow-root bg-light rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                    <span class="text-xl font-bold">PS</span>
                                </span>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-dark">Piyush Shakya</h3>
                            <!-- <p class="mt-1 text-base text-gray-500">CEO & Co-Founder</p>
                            <p class="mt-3 text-base text-gray-500">
                                5+ years in construction management. Former VP of Quality at a top ENR contractor.
                            </p> -->
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="pt-6">
                    <div class="flow-root bg-light rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                    <span class="text-xl font-bold">VK</span>
                                </span>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-dark">Vaibhav Kumar</h3>
                            <!-- <p class="mt-1 text-base text-gray-500">CTO</p>
                            <p class="mt-3 text-base text-gray-500">
                                IoT and AI expert. Former lead architect at a construction tech unicorn.
                            </p> -->
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="pt-6">
                    <div class="flow-root bg-light rounded-lg px-6 pb-8">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                    <span class="text-xl font-bold">AS</span>
                                </span>
                            </div>
                            <h3 class="mt-4 text-lg font-medium text-dark">Ankit Singh</h3>
                            <!-- <p class="mt-1 text-base text-gray-500">VP of Product</p>
                            <p class="mt-3 text-base text-gray-500">
                                3 years building construction software products. BIM specialist.
                            </p> -->
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
                <span class="block">Ready to transform your quality assurance?</span>
                <span class="block text-accent">Start your free trial today.</span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:flex-shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <a href="signUp.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-50">
                        Get started
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="contact.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-secondary hover:bg-accent">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer  -->
    <?php include 'includes/footer.php'; ?>


</body>
</html>
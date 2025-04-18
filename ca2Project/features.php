<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - BuildQA</title>
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

    <!-- Features Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                Powerful Features for Construction Quality
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Our comprehensive suite of tools ensures quality at every stage of your construction project.
            </p>
        </div>
    </div>

    <!-- Main Features -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-primary font-semibold tracking-wide uppercase">Core Features</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-dark sm:text-4xl">
                    Everything You Need for Quality Assurance
                </p>
            </div>

            <div class="mt-10">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-16">
                    <!-- Feature 1 -->
                    <div class="relative bg-light p-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h3 class="ml-4 text-lg leading-6 font-medium text-dark">Real-Time Monitoring</h3>
                        </div>
                        <p class="mt-4 text-base text-gray-500">
                            Continuous monitoring of materials, structures, and environmental conditions with IoT sensors and automated alerts for any deviations.
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-gray-500">
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Material quality tracking</span>
                            </li>
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Structural health monitoring</span>
                            </li>
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Environmental condition tracking</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 2 -->
                    <div class="relative bg-light p-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="ml-4 text-lg leading-6 font-medium text-dark">Automated Reporting</h3>
                        </div>
                        <p class="mt-4 text-base text-gray-500">
                            Generate comprehensive quality reports automatically with all inspection data, photos, and compliance documentation.
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-gray-500">
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Custom report templates</span>
                            </li>
                            <li class="flex items-start">
                               
                                <span class="ml-2">✔️Regulatory compliance docs</span>
                            </li>
                            <li class="flex items-start">
                               
                                <span class="ml-2">✔️Export to multiple formats</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 3 -->
                    <div class="relative bg-light p-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="ml-4 text-lg leading-6 font-medium text-dark">Mobile Inspection</h3>
                        </div>
                        <p class="mt-4 text-base text-gray-500">
                            Powerful mobile apps for field inspectors with offline capability, photo documentation, and instant reporting.
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-gray-500">
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Android & iOS apps</span>
                            </li>
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Offline data collection</span>
                            </li>
                            <li class="flex items-start">
                                
                                <span class="ml-2">✔️Photo documentation</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Feature 4 -->
                    <div class="relative bg-light p-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center h-12 w-12 rounded-md bg-primary text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <h3 class="ml-4 text-lg leading-6 font-medium text-dark">BIM Integration</h3>
                        </div>
                        <p class="mt-4 text-base text-gray-500">
                            Seamless integration with BIM models to compare as-built conditions with design specifications.
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-gray-500">
                            <li class="flex items-start">
                                <span class="ml-2">✔️As-built vs. design comparison</span>
                            </li>
                            <li class="flex items-start">
                                <span class="ml-2">✔️3D model integration</span>
                            </li>
                            <li class="flex items-start">
                                <span class="ml-2">✔️Clash detection</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-primary py-12 sm:py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">
                Ready to transform your quality assurance?
            </h2>
            <p class="mt-4 max-w-xl mx-auto text-lg text-gray-200">
                Start your free trial today and experience the future of construction quality management.
            </p>
            <div class="mt-8 flex justify-center">
                <a href="signUp.php" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-50">Get started</a>
                <!-- <a href="learnMore.php" class="ml-3 inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-secondary hover:bg-accent">Learn more</a> -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

</body>
</html>
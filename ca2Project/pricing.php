<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing - BuildQA</title>
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

    <!-- Pricing Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                Simple, transparent pricing
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Choose the plan that works best for your construction projects. No hidden fees.
            </p>
        </div>
    </div>

    <!-- Pricing Tiers -->
    <div class="bg-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="space-y-8 lg:grid lg:grid-cols-3 lg:gap-8 lg:space-y-0">
                <!-- Basic Tier -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white">
                    <div class="px-6 py-8">
                        <h3 class="text-2xl font-medium text-dark">Basic</h3>
                        <p class="mt-4 text-gray-500">For small projects and individual contractors</p>
                        <div class="mt-6 flex items-baseline">
                            <span class="text-5xl font-extrabold text-dark">$99</span>
                            <span class="ml-1 text-xl font-medium text-gray-500">/month</span>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Up to 5 active projects</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Mobile inspection app</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Basic reporting</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Email support</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 pt-6 pb-8 bg-gray-50">
                        <div class="rounded-md shadow">
                            <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                Get started
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pro Tier (Featured) -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden border-2 border-primary">
                    <div class="px-6 py-8">
                        <div class="flex justify-between items-center">
                            <h3 class="text-2xl font-medium text-dark">Professional</h3>
                            <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-primary text-white">
                                Most popular
                            </span>
                        </div>
                        <p class="mt-4 text-gray-500">For medium-sized construction firms</p>
                        <div class="mt-6 flex items-baseline">
                            <span class="text-5xl font-extrabold text-dark">$299</span>
                            <span class="ml-1 text-xl font-medium text-gray-500">/month</span>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Up to 20 active projects</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Mobile inspection app</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Advanced reporting</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">IoT sensor integration (5 included)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Priority email support</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 pt-6 pb-8 bg-gray-50">
                        <div class="rounded-md shadow">
                            <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                Get started
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enterprise Tier -->
                <div class="flex flex-col rounded-lg shadow-lg overflow-hidden bg-white">
                    <div class="px-6 py-8">
                        <h3 class="text-2xl font-medium text-dark">Enterprise</h3>
                        <p class="mt-4 text-gray-500">For large construction firms and enterprises</p>
                        <div class="mt-6 flex items-baseline">
                            <span class="text-5xl font-extrabold text-dark">$599</span>
                            <span class="ml-1 text-xl font-medium text-gray-500">/month</span>
                        </div>
                        <ul class="mt-8 space-y-4">
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Unlimited active projects</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Mobile inspection app</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Custom reporting</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">IoT sensor integration (unlimited)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-base text-gray-500">Dedicated account manager</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 pt-6 pb-8 bg-gray-50">
                        <div class="rounded-md shadow">
                            <a href="#" class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-secondary">
                                Contact sales
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script>
        // Mobile menu toggle
        document.querySelector('[aria-controls="mobile-menu"]').addEventListener('click', function() {
            const expanded = this.getAttribute('aria-expanded') === 'true' || false;
            this.setAttribute('aria-expanded', !expanded);
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
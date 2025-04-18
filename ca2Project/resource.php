<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resources - BuildQA</title>
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
       .group :hover{
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
        .group :hover img {
            filter: brightness(0.8);
        }
        .group :hover h3 {
            color: #1c64f2;
        }
        .group :hover p {
            color: #3f83f8;
       }
        .group :hover a {
            color: #1a56db;
        }
        .group :hover .bg-light {
            background-color: #f3f4f6;
        }
        .group :hover .bg-light:hover {
            background-color: #e5e7eb;
        }
    </style>
</head>
<body class="font-sans bg-gray-50">
    <!-- Navigation -->
    <?php include 'includes/nav.php'; ?>

    <!-- Resources Header -->
    <div class="bg-white pt-12 pb-16 sm:pt-16 sm:pb-20 lg:pt-24 lg:pb-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-dark sm:text-5xl lg:text-6xl">
                Resources & Learning
            </h1>
            <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-500">
                Guides, case studies, and best practices to improve your construction quality processes.
            </p>
        </div>
    </div>

    <!-- Resource Categories -->
    <div class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-12">
                <!-- Case Studies -->
                <div class="relative">
                    <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                        Case Studies
                    </h2>
                    <div class="mt-6 grid gap-8 lg:grid-cols-3">
                        <!-- Case Study 1 -->
                        <div class="group relative bg-light rounded-lg overflow-hidden shadow-sm">
                            <div class="aspect-w-3 aspect-h-2">
                                <img class="object-cover" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="High-rise construction">
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-dark">
                                    <a href="./resources/case-study-1.php" class="hover:text-primary">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Reducing Rework by 58% on High-Rise Project
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    How Acme Construction saved $2.3M by implementing real-time quality monitoring
                                </p>
                                <div class="mt-4">
                                    <a href="./resources/case-study-1.php" class="text-sm font-medium text-primary hover:text-secondary">
                                        Read case study →
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Case Study 2 -->
                        <div class="group relative bg-light rounded-lg overflow-hidden shadow-sm">
                            <div class="aspect-w-3 aspect-h-2">
                                <img class="object-cover" src="https://images.unsplash.com/photo-1517502884422-41eaead166d4?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Bridge construction">
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-dark">
                                    <a href="./resources/case-study-2.php" class="hover:text-primary">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Accelerating Bridge Construction Timeline by 22%
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    State DOT project completes ahead of schedule with automated quality assurance
                                </p>
                                <div class="mt-4">
                                    <a href="./resources/case-study-2.php" class="text-sm font-medium text-primary hover:text-secondary">
                                        Read case study →
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Case Study 3 -->
                        <div class="group relative bg-light rounded-lg overflow-hidden shadow-sm">
                            <div class="aspect-w-3 aspect-h-2">
                                <img class="object-cover" src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Industrial construction">
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-medium text-dark">
                                    <a href="./resources/case-study-3.php" class="hover:text-primary">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Zero Defects in Chemical Plant Construction
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    How predictive analytics prevented quality issues in hazardous environment
                                </p>
                                <div class="mt-4">
                                    <a href="./resources/case-study-3.php" class="text-sm font-medium text-primary hover:text-secondary">
                                        Read case study →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Webinars -->
                <div class="relative">
                    <h2 class="text-2xl font-extrabold text-dark sm:text-3xl">
                        Webinars
                    </h2>
                    <div class="mt-6 grid gap-8 lg:grid-cols-3">
                        <!-- Webinar 1 -->
                        <div class="group relative bg-light rounded-lg overflow-hidden shadow-sm">
                            <div class="aspect-w-16 aspect-h-9">
                                <img class="object-cover" src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Webinar thumbnail">
                            </div>
                            <div class="p-6">
                                <h3 class="mt-2 text-lg font-medium text-dark">
                                    <a href="./resources/webinar-1.php" class="hover:text-primary">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Implementing Real-Time QA on Your Job Site
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Practical steps to deploy our quality assurance system
                                </p>
                                <div class="mt-4">
                                    <a href="./resources/webinar-1.php" class="text-sm font-medium text-primary hover:text-secondary">
                                        Watch recording →
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Webinar 2 -->
                        <div class="group relative bg-light rounded-lg overflow-hidden shadow-sm">
                            <div class="aspect-w-16 aspect-h-9">
                                <img class="object-cover" src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Webinar thumbnail">
                            </div>
                            <div class="p-6">
                                <h3 class="mt-2 text-lg font-medium text-dark">
                                    <a href="./resources/webinar-2.php" class="hover:text-primary">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Case Study: High-Rise Quality Assurance
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Lessons from a 40-story tower project in Chicago
                                </p>
                                <div class="mt-4">
                                    <a href="./resources/webinar-2.php" class="text-sm font-medium text-primary hover:text-secondary">
                                        Watch recording →
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Webinar 3 -->
                        <div class="group relative bg-light rounded-lg overflow-hidden shadow-sm">
                            <div class="aspect-w-16 aspect-h-9">
                                <img class="object-cover" src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Webinar thumbnail">
                            </div>
                            <div class="p-6">
                                <h3 class="mt-2 text-lg font-medium text-dark">
                                    <a href="./resources/webinar-3.php" class="hover:text-primary">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        Mobile Inspection Best Practices
                                    </a>
                                </h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    Maximizing efficiency with our mobile inspection app
                                </p>
                                <div class="mt-4">
                                    <a href="./resources/webinar-3.php" class="text-sm font-medium text-primary hover:text-secondary">
                                        Watch recording →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

  
</body>
</html>
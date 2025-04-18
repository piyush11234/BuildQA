<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Webinar: Implementing Real-Time QA</title>
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
<body class="bg-gray-50 text-gray-800">

  <!-- Header Section -->
  <header class="bg-primary text-white py-12 px-6 text-center">
    <h1 class="text-4xl font-bold mb-2">Implementing Real-Time QA on Your Job Site</h1>
    <p class="text-lg max-w-2xl mx-auto">Learn how to deploy our quality assurance technology step-by-step, with insights from our field engineers.</p>
  </header>

  <!-- Video Embed -->
  <section class="max-w-6xl mx-auto mt-10 px-6">
    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
      <iframe src="https://www.youtube.com/embed/5sHshmF1n_Y" title="Real-Time QA Webinar" allowfullscreen class="w-full h-full"></iframe>
    </div>
  </section>

  <!-- Description -->
  <section class="max-w-4xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold mb-4 text-gray-900">Webinar Overview</h2>
    <p class="text-lg text-gray-700 mb-6">
      This session covers the fundamentals of deploying BuildQA on your construction sites. It includes configuration of IoT sensors, integration with your dashboard, team workflows, and real-world use cases from our clients.
    </p>

    <h3 class="text-xl font-semibold text-gray-800 mb-2">Key Topics:</h3>
    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-8">
      <li>Setting up and calibrating monitoring devices</li>
      <li>Connecting sensors to your QA dashboard</li>
      <li>Alert automation and live reporting</li>
      <li>Case studies and ROI benefits</li>
    </ul>

    <!-- <a href="../resources/webinar-materials.pdf" class="inline-block bg-primary text-white font-semibold px-6 py-3 rounded-lg hover:bg-secondary transition">
      Download Webinar Materials
    </a> -->
  </section>

  <!-- CTA -->
  <section class="bg-gradient-to-r from-primary to-secondary text-white py-12 text-center">
    <h2 class="text-3xl font-extrabold mb-4">Bring Real-Time QA to Your Projects</h2>
    <p class="mb-6 text-lg">Schedule a personalized demo and consultation with our team.</p>
    <a href="../bookDemo" class="inline-block px-6 py-3 bg-white text-primary font-bold rounded-lg hover:bg-gray-100 transition">
      Book a Demo
    </a>
  </section>

</body>
</html>

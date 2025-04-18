<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Webinar: High-Rise Quality Assurance</title>
  
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

  <!-- Header -->
  <header class="bg-primary text-white py-12 text-center px-6">
    <h1 class="text-4xl font-bold mb-2">Case Study: High-Rise Quality Assurance</h1>
    <p class="text-lg max-w-2xl mx-auto">Explore how QA technology enabled a 40-story tower in Chicago to minimize defects, delays, and rework.</p>
  </header>

  <!-- Video Section -->
  <section class="max-w-6xl mx-auto mt-10 px-6">
    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
      <iframe src="https://www.youtube.com/embed/g2L3UOQD88g" title="High-Rise QA Webinar" allowfullscreen class="w-full h-full"></iframe>
    </div>
  </section>

  <!-- Description -->
  <section class="max-w-4xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-gray-900 mb-4">Webinar Highlights</h2>
    <p class="text-lg text-gray-700 mb-6">
      Learn how BuildQA’s smart monitoring system was used on a high-rise project in downtown Chicago. From structural concrete QA to façade inspections, see how a data-driven approach made a difference in speed and quality.
    </p>

    <h3 class="text-xl font-semibold text-gray-800 mb-2">What You'll Learn:</h3>
    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-8">
      <li>Using real-time data for structural QA</li>
      <li>Tracking rebar, formwork, and concrete curing</li>
      <li>Automated reporting to project stakeholders</li>
      <li>Achieving zero-delay inspections across floors</li>
    </ul>

  
  </section>

  <!-- CTA -->
  <section class="bg-gradient-to-r from-primary to-secondary text-white py-12 text-center">
    <h2 class="text-3xl font-extrabold mb-4">Want to Apply This to Your Project?</h2>
    <p class="mb-6 text-lg">Let’s walk you through how this can work for your high-rise or commercial site.</p>
    <a href="../bookDemo" class="inline-block px-6 py-3 bg-white text-primary font-bold rounded-lg hover:bg-gray-100 transition">
      Book a Free Consultation
    </a>
  </section>

</body>
</html>

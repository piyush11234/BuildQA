<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="https://formsubmit.co/piyushshakya7467@gmail.com" method="POST" class="px-6 py-4" id="feedback-form">
  <input type="hidden" name="_subject" value="New QA Feedback Submission">
  <input type="hidden" name="_autoresponse" value="Thank you for your construction QA feedback! We'll review it within 48 hours.">
  
  <!-- Your form fields here -->
  <div class="mb-4">
    <label for="message" class="block text-sm text-gray-900">Feedback</label>
    <textarea id="message" name="message" class="bg-gray-700 text-white mt-1 p-2 w-full rounded" placeholder="Write your valueable feedback..."></textarea>
  </div>
  
  <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    Submit Feedback
  </button>
</form>
</body>
</html>
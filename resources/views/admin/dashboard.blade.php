<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="flex min-h-screen bg-gray-100 w-full">
    @include('admin.sidebar')

    <div class="flex-1 p-8">
      <div class="max-w-6xl w-full mx-auto">
        <!-- Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
          <h2 class="text-2xl font-bold mb-6 text-center">Dashboard</h2>
        </div>


      </div>
    </div>
  </div>

</body>
</html>

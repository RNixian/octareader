<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SetUp</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="flex min-h-screen bg-gray-100 w-full">
    @include('admin.sidebar')

    <div class="flex-1 p-8">
      <div class="max-w-6xl w-full mx-auto">
        <!-- Grid for Department and Category -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          
          <!-- Department Section -->
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-2xl font-bold mb-6 text-center">Department</h2>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">Department</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="title" name="title" required>
              </div>
              <div class="flex justify-center space-x-4">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300" type="submit">
                  Submit
                </button>
              </div>
            </form>
          </div>

          <!-- Category Section -->
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-2xl font-bold mb-6 text-center">Category</h2>
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">Category</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="title" name="title" required>
              </div>
              <div class="flex justify-center space-x-4">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300" type="submit">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- Separate Table for Department -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
          <!-- Search and Filter -->
          <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <input type="text" placeholder="Enter... Department" class="shadow appearance-none border rounded w-full md:w-1/2 py-2 px-3 mb-2 md:mb-0 text-gray-700 focus:outline-none focus:shadow-outline"/>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-2 border text-left">Department</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-4 py-2 border">Sample department</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Separate Table for Category -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
          <!-- Search and Filter -->
          <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <input type="text" placeholder="Enter... Category" class="shadow appearance-none border rounded w-full md:w-1/2 py-2 px-3 mb-2 md:mb-0 text-gray-700 focus:outline-none focus:shadow-outline"/>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-2 border text-left">Category</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-4 py-2 border">Sample category</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
  </div>

</body>
</html>

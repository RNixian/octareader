<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>UnderGraduate</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="flex min-h-screen bg-gray-100 w-full">
    @include('admin.sidebar')

    <div class="flex-1 p-8">
      <div class="max-w-6xl w-full mx-auto">
        <!-- Form -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
          <h2 class="text-2xl font-bold mb-6 text-center">UnderGraduate</h2>
        </div>

        <!-- Search and Filter -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-4">
          <input type="text" placeholder="Search by Title or Author..." class="shadow appearance-none border rounded w-full md:w-1/2 py-2 px-3 mb-2 md:mb-0 text-gray-700 focus:outline-none focus:shadow-outline"/>
          <select class="shadow appearance-none border rounded w-full md:w-1/3 py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline">
            <option value="">All Departments</option>
            <!-- Add more departments -->
          </select>
          <!-- Link to Add Books -->
<a href="{{ url('/admin/add_new_books') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300 inline-block">
    Add Books
</a>
        </div>

        <!-- Table -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
          <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-2 border text-left">Title</th>
                  <th class="px-4 py-2 border text-left">Author</th>
                  <th class="px-4 py-2 border text-left">Year</th>
                  <th class="px-4 py-2 border text-left">Category</th>
                  <th class="px-4 py-2 border text-left">Department</th>
                  <th class="px-4 py-2 border text-left">PDF File</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-4 py-2 border">Sample Title</td>
                  <td class="px-4 py-2 border">Jane Doe</td>
                  <td class="px-4 py-2 border">2024</td>
                  <td class="px-4 py-2 border">UnderGraduate</td>
                  <td class="px-4 py-2 border">MPA</td>
                  <td class="px-4 py-2 border"><a href="#" class="text-blue-500 underline">View PDF</a></td>
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

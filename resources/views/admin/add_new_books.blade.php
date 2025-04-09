<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OctaRead Add New</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-lg bg-white rounded shadow-md p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Add New</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="title">Title</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="title" name="title" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="author">Author</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="author" name="author" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="year">Year</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="number" id="year" name="year" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="category">Category</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="category" name="category" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="department">Department</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="department" name="department" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="pdf_filepath">PDF File</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="file" id="pdf_filepath" name="pdf_filepath" accept=".pdf" required>
            </div>

            <div class="flex justify-center space-x-4">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300" type="submit">
                    Submit
                </button>
               <!-- Link to Add Books -->
<a href="{{ url('/admin/dashboard') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300 inline-block">
    Cancel
</a>
            </div>
        </form>
    </div>
</body>
</html>

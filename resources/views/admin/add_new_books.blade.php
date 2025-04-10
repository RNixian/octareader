<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OctaRead Add New</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">


    @if($errors->any())
<ul>
@foreach ($errors->all() as $error)
    <li>
{{$error}}
    </li>
@endforeach
</ul>
@endif

    <div class="w-full max-w-lg bg-white rounded shadow-md p-8">
        <h2 class="text-2xl font-bold text-center mb-6">Add New</h2>

        <form action="{{ route('admin.storebooks') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
            @csrf
        

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
                <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Graduate">Graduate</option>
                    <option value="Under-Graduate">Under-Graduate</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="department">Department</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="department" name="department" required>
            </div>
        

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2" for="pdf_filepath">PDF File</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="file" id="pdf_filepath" name="pdf_filepath" accept=".pdf" required>
            </div>
        

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="coverphoto_imgpath">Cover Photo</label>
                <input class="block w-full text-sm text-gray-700 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:shadow-outline" id="coverphoto_imgpath" type="file" name="coverphoto_imgpath" accept="image/jpeg,image/png,image/jpg">
            </div>
        

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600 transition duration-200">
                    Submit
                </button>

                <a href="{{ url('/admin/dashboard') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300 inline-block">
                    Cancel
                </a>
            </div>
        </form>

    </div>
</body>
</html>

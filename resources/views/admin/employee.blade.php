<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-2xl w-full">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
            <h2 class="text-2xl font-bold mb-6 text-center">Profile Entry</h2>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="fullname">
                        Full Name
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="fullname" type="text" name="fullname" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="position">
                        Position
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                        id="position" type="text" name="position" required>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="profile_image">
                        Profile Image
                    </label>
                    <input class="block w-full text-sm text-gray-700 border border-gray-300 rounded py-2 px-3 focus:outline-none focus:shadow-outline"
                        id="profile_image" type="file" name="profile_image" accept="image/*">
                </div>

                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Submit
                    </button>
                     <!-- Link to Add Books -->
<a href="{{ url('/admin/dashboard') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300 inline-block">
    Cancel
</a>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
            <h2 class="text-xl font-semibold mb-4">Submitted Profiles</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border text-left">Full Name</th>
                            <th class="px-4 py-2 border text-left">Position</th>
                            <th class="px-4 py-2 border text-left">Profile Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row -->
                        <tr>
                            <td class="px-4 py-2 border">John Doe</td>
                            <td class="px-4 py-2 border">Manager</td>
                            <td class="px-4 py-2 border">
                                <img src="https://via.placeholder.com/50" alt="Profile" class="rounded-full w-10 h-10 object-cover">
                            </td>
                        </tr>
                        <!-- More rows can be dynamically added -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

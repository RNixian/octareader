<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>OctaRead Admin Registration</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    @if($errors->any())
<ul>
@foreach ($errors->all() as $error)
    <li>
{{$error}}
    </li>
@endforeach
</ul>
@endif

    <div class="max-w-md w-full">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold mb-6 text-center">Admin Register</h2>

            <form method="post" action="{{route('admin.store')}}">
                @csrf
                @method('post')
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="firstname">
                        First Name
                    </label>
                    <input id="firstname" name="firstname" type="text" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="middlename">
                        Middle Name
                    </label>
                    <input id="middlename" name="middlename" type="text" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
                        Last Name
                    </label>
                    <input id="lastname" name="lastname" type="text" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="schoolid">
                        School ID
                    </label>
                    <input id="schoolid" name="schoolid" type="text" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="masterkey">
                        Master Key
                    </label>
                    <input id="masterkey" name="masterkey" type="text" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="birthdate">
                        Birthdate
                    </label>
                    <input id="birthdate" name="birthdate" type="text" placeholder="mm/dd/yyyy" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="flex flex-col space-y-4 items-center">
                    <button type="submit"
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Register
                    </button>
                    <button type="button"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

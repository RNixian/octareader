<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SetUp-Department</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
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


  <div class="flex min-h-screen bg-gray-100 w-full">
    @include('admin.sidebar')



          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6 mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Department</h2>

        <form action="{{ route('admin..setup.storedepartment') }}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md">
            @csrf
              <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="department">Department</label>
                <input class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" type="text" id="department" name="department" required>
              </div>
              <div class="flex justify-center space-x-4">
                <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-6 rounded focus:outline-none focus:ring-2 focus:ring-green-300" type="submit">
                  Submit
                </button>
              </div>
            </form>
          </div>


        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">

          <div class="flex flex-col md:flex-row justify-between items-center mb-4">
            <input type="text" placeholder="Enter... Department" class="shadow appearance-none border rounded w-full md:w-1/2 py-2 px-3 mb-2 md:mb-0 text-gray-700 focus:outline-none focus:shadow-outline"/>
          </div>

          <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-2 border text-left">Id</th>
                  <th class="px-4 py-2 border text-left">Department</th>
                  <th class="px-4 py-2 border text-left">Created at</th>
                  <th class="px-4 py-2 border text-left">Updated at</th>
                  <th class="px-4 py-2 border text-left">Action Delete</th>
                  <th class="px-4 py-2 border text-left">Action Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($departmentmodel as $data)

                    <tr>
                        <td>{{ $data->id }}</td>
                        <td class="text-start">{{ $data->department }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                          <a href="{{ route('deletedept', $data->id) }}"
                             class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                             Delete
                          </a>
                        </td>
                        <td>
                          <button 
                              class="btn-edit bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded"
                              data-id="{{ $data->id }}"
                              data-department="{{ $data->department }}">
                              Edit
                          </button>
                        </td>
                    </tr>
                @endforeach
              </tbody>
              
            </table>
          </div>
        </div>

        <div id="updateModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
          <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
            <!-- Close Button -->
            <button id="closeModal" class="absolute top-2 right-2 text-gray-700 hover:text-gray-900 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-6">Update Department</h2>
            <form id="updateForm" action="{{ route('updatedept', ['id' => '__ID__']) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <input type="hidden" name="id" id="dept_id" value="">
             
                <div>
                  <label class="block text-gray-700 font-bold mb-2" for="edit_dept">Department</label>
                  <input type="text" name="department" id="edit_dept" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
      
              <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                  Update
                </button>
              </div>
            </form>
        </div>

        <script>
          // Get modal elements
          const updateModal = document.getElementById('updateModal');
          const closeModal = document.getElementById('closeModal');
          const updateForm = document.getElementById('updateForm');

          // When user clicks any "Edit" button
          document.querySelectorAll('.btn-edit').forEach(button => {
            button.addEventListener('click', function() {
              // Retrieve data attributes from the clicked button
              const id = this.getAttribute('data-id');
              const department = this.getAttribute('data-department');

              // Update the form action with the record id
              updateForm.action = updateForm.action.replace('__ID__', id);
              document.getElementById('dept_id').value = id;
              // Populate form fields with current data
              document.getElementById('edit_dept').value = department;

              // Show the modal
              updateModal.classList.remove('hidden');
            });
          });

          // Close the modal when close button is clicked
          closeModal.addEventListener('click', function() {
            updateModal.classList.add('hidden');
            // Reset action placeholder for next use
            updateForm.action = updateForm.action.replace(/(\d+)$/, '__ID__');
          });

          // Close modal on clicking outside the modal content
          window.addEventListener('click', function(e) {
            if (e.target === updateModal) {
              updateModal.classList.add('hidden');
            }
          });
        </script>
  </div>

</body>
</html>

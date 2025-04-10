<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Under-Graduate</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="flex min-h-screen bg-gray-100 w-full">
    @include('admin.sidebar')

    <div class="flex-1 p-8">
      <div class="max-w-6xl w-full mx-auto">
        <!-- Header -->
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
          <h2 class="text-2xl font-bold mb-6 text-center">Under-Graduate</h2>
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
                  <th class="px-4 py-2 border text-left">Id</th>
                  <th class="px-4 py-2 border text-left">Title</th>
                  <th class="px-4 py-2 border text-left">Author</th>
                  <th class="px-4 py-2 border text-left">Year</th>
                  <th class="px-4 py-2 border text-left">Category</th>
                  <th class="px-4 py-2 border text-left">Department</th>
                  <th class="px-4 py-2 border text-left">PDF File</th>
                  <th class="px-4 py-2 border text-left">Cover Photo</th>
                  <th class="px-4 py-2 border text-left">Created at</th>
                  <th class="px-4 py-2 border text-left">Updated at</th>
                  <th class="px-4 py-2 border text-left">Action Delete</th>
                  <th class="px-4 py-2 border text-left">Action Edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($booksmodel as $data)
                  @if($data->category === 'Under-Graduate')
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td class="text-start">{{ $data->title }}</td>
                        <td class="text-start">{{ $data->author }}</td>
                        <td class="text-start">{{ $data->year }}</td>
                        <td class="text-start">{{ $data->category }}</td>
                        <td class="text-start">{{ $data->department }}</td>
                        <!-- PDF File button -->
                        <td class="text-start">
                          <a href="{{ asset('storage/' . $data->pdf_filepath) }}"
                             class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded"
                             target="_blank">
                            View
                          </a>
                        </td>
                        <!-- Cover Photo preview -->
                        <td class="text-start">
                          @if($data->coverphoto_imgpath)
                            <img src="{{ asset('storage/' . $data->coverphoto_imgpath) }}" alt="Cover Photo" style="width: 100px; height: 100px; object-fit:cover;">
                          @else
                            N/A
                          @endif
                        </td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                          <a href="{{ route('deletebook', $data->id) }}"
                             class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded">
                             Delete
                          </a>
                        </td>
                        <td>
                          <!-- Edit link with data attributes -->
                          <button 
                              class="btn-edit bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded"
                              data-id="{{ $data->id }}"
                              data-title="{{ $data->title }}"
                              data-author="{{ $data->author }}"
                              data-year="{{ $data->year }}"
                              data-category="{{ $data->category }}"
                              data-department="{{ $data->department }}">
                              Edit
                          </button>
                        </td>
                    </tr>
                  @endif
                @endforeach
              </tbody>
              
            </table>
          </div>
        </div>

        <!-- Update Modal -->
        <div id="updateModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
          <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
            <!-- Close Button -->
            <button id="closeModal" class="absolute top-2 right-2 text-gray-700 hover:text-gray-900 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-6">Update Book</h2>
            <form id="updateForm" action="{{ route('updatebook', ['id' => '__ID__']) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <!-- Hidden field for book id -->
              <input type="hidden" name="id" id="book_id" value="">
              
              <!-- Two Columns Grid for Text Inputs -->
              <div class="grid grid-cols-2 gap-4">
                <!-- Title -->
                <div>
                  <label class="block text-gray-700 font-bold mb-2" for="edit_title">Title</label>
                  <input type="text" name="title" id="edit_title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <!-- Author -->
                <div>
                  <label class="block text-gray-700 font-bold mb-2" for="edit_author">Author</label>
                  <input type="text" name="author" id="edit_author" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <!-- Year -->
                <div>
                  <label class="block text-gray-700 font-bold mb-2" for="edit_year">Year</label>
                  <input type="number" name="year" id="edit_year" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <!-- Category -->
                <div>
                  <label class="block text-gray-700 font-bold mb-2" for="edit_category">Category</label>
                  <select class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" id="edit_category" name="category" required>
                      <option value="">Select Category</option>
                      <option value="Graduate">Graduate</option>
                      <option value="Under-Graduate">Under-Graduate</option>
                  </select>
              </div>
                <!-- Department: Span full width in two columns by making it a full-width grid item -->
                <div class="col-span-2">
                  <label class="block text-gray-700 font-bold mb-2" for="edit_department">Department</label>
                  <input type="text" name="department" id="edit_department" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
              </div>

              <!-- File Uploads -->
              <div class="mt-4">
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2" for="edit_pdf">PDF File</label>
                  <input type="file" name="pdf_filepath" id="edit_pdf" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" accept=".pdf">
                </div>
                <div class="mb-4">
                  <label class="block text-gray-700 font-bold mb-2" for="edit_coverphoto">Cover Photo</label>
                  <input type="file" name="coverphoto_imgpath" id="edit_coverphoto" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" accept="image/jpeg,image/png,image/jpg">
                </div>
              </div>

              <!-- Submit Button -->
              <div class="flex justify-end mt-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                  Update
                </button>
              </div>
            </form>
          </div>
        </div>

        <!-- JavaScript to handle modal behavior -->
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
              const title = this.getAttribute('data-title');
              const author = this.getAttribute('data-author');
              const year = this.getAttribute('data-year');
              const category = this.getAttribute('data-category');
              const department = this.getAttribute('data-department');

              // Update the form action with the record id
              updateForm.action = updateForm.action.replace('__ID__', id);
              document.getElementById('book_id').value = id;
              // Populate form fields with current data
              document.getElementById('edit_title').value = title;
              document.getElementById('edit_author').value = author;
              document.getElementById('edit_year').value = year;
              document.getElementById('edit_category').value = category;
              document.getElementById('edit_department').value = department;

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
    </div>
  </div>
</body>
</html>

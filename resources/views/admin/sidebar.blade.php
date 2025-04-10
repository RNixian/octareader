<div class="w-64 bg-white shadow-md h-full p-4">
  <h2 class="text-xl font-bold mb-4">Admin Panel</h2>
  <ul>
    <li>
      <a href="{{ url('/admin/dashboard') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Dashboard</a>
    </li>
    <li>
      <a href="{{ url('/admin/graduate') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Graduate</a>
    </li>
    <li>
      <a href="{{ url('/admin/undergraduate') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Undergraduate</a>
    </li>
    <!-- SetUp Dropdown -->
    <li class="relative">
      <button id="setupDropdownBtn" class="block w-full text-left py-2 px-4 hover:bg-gray-200 rounded focus:outline-none">
        SetUp
      </button>
      <ul id="setupDropdown" class="absolute left-0 mt-1 w-full bg-white shadow-md rounded hidden">
        <li>
          <a href="{{ url('/admin/setup/department') }}" class="block py-2 px-4 hover:bg-gray-200">Department</a>
        </li>
        <li>
          <a href="{{ url('/admin/setup/course') }}" class="block py-2 px-4 hover:bg-gray-200">Course</a>
        </li>
        <li>
          <a href="{{ url('/admin/setup/carousel') }}" class="block py-2 px-4 hover:bg-gray-200">Carousel</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="{{ url('/admin/employee') }}" class="block py-2 px-4 hover:bg-gray-200 rounded">Employee</a>
    </li>
  </ul>
</div>

<!-- JavaScript to toggle the dropdown -->
<script>
  document.getElementById('setupDropdownBtn').addEventListener('click', function() {
    const dropdown = document.getElementById('setupDropdown');
    dropdown.classList.toggle('hidden');
  });
</script>

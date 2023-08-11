
@extends('layouts.navigation')

@section('content')
<form action="{{ route('save-data')}}" method='post' id="dataForm">
    @csrf
    <div id="inputContainer">
        <!-- Dynamic input fields will be added here -->
      </div>
      <button type="button" id="addButton">Add Input Field</button>
      <button type="submit" id="saveButton">Save Data</button>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
  // Get the container where the dynamic input fields will be added
  const inputContainer = document.getElementById('inputContainer');

  // Get the button to add input fields
  const addButton = document.getElementById('addButton');
  addButton.addEventListener('click', addInputField);

  function addInputField() {
    // Create a new input element
    const newInput = document.createElement('input');
    newInput.type = 'text';

    // Append the new input to the container
    inputContainer.appendChild(newInput);
  }

  // Handle form submission using AJAX
  const form = document.getElementById('dataForm');

  form.addEventListener('submit', function(event) {
    event.preventDefault();

    const inputs = document.querySelectorAll('#inputContainer input');
    const data = [];

    inputs.forEach(input => {
      data.push(input.value);
    });

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/save-data', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': csrfToken,
      },
      body: JSON.stringify({ data: data }),
    })
      .then(response => response.json())
      .then(result => {
        console.log(result.message); // Display success message or handle response as needed.
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });
});
   </script>




 @endsection

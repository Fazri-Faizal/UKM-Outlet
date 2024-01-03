<form id="uploadForm" action="/upload" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" id="filename" required>
    <input type="hidden" name="tempid">
    <button name="done" type="submit">Upload Image</button>
</form>

<!-- Display uploaded image and handle redirection -->
@if(session('image'))
       <script>
        document.addEventListener('DOMContentLoaded', function() {
            alert('You have successfully uploaded an image.');
            window.location.href = '/tempimagestore?file=' + encodeURIComponent('{{ session('image') }}');

        });
    </script>
    <img src="{{ asset('img/' . session('image')) }}" alt="Uploaded Image" />


   
@endif
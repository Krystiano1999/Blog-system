<!-- resources/views/admin/articles/scripts.blade.php -->
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- CKEditor 5 -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>

<!-- Inicjalizacja CKEditor i Select2 -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inicjalizacja CKEditor
        ClassicEditor
            .create(document.querySelector('#body'))
            .catch(error => {
                console.error(error);
            });

        // Inicjalizacja Select2
        $('#tags').select2({
            placeholder: "Wybierz tagi",
            allowClear: true,
            width: '100%'
        });

        $('#companies').select2({
            placeholder: "Wybierz firmy",
            allowClear: true,
            width: '100%'
        });
    });
</script>

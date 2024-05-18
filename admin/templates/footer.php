<footer class="footer text-center">
    Thiết kế bởi <a href="#">hoanghamobile</a>.
</footer>

<script src="public/assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="public/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="public/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="public/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="public/assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="public/dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="public/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="public/dist/js/custom.min.js"></script>
<!-- this page js -->
<script src="public/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
<script src="public/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
<script src="public/assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="public/assets/libs/quill/dist/quill.min.js"></script>
<script>
    $('#zero_config').DataTable();
    var quill = new Quill('#editor', {
        theme: 'snow'
    });

    // Function to update input with editor content
    function updateInput() {
            var htmlContent = quill.root.innerHTML;
            document.getElementById('input_editor').value = htmlContent;
        }

        // Listen for changes in the editor
        quill.on('text-change', function() {
            updateInput();
        });

        // Initial update of input field
        updateInput();
</script>
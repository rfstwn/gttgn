    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Auto-close alerts after 5 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").fadeOut("slow");
            }, 5000);
            
            // Confirm delete action
            $('.delete-confirm').on('click', function(e) {
                if (!confirm('Apakah Anda yakin ingin menghapus user ini?')) {
                    e.preventDefault();
                }
            });
        });
    </script>
</body>
</html>

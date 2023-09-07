<!DOCTYPE html>
<html>
<head>
    <title>Your Notes</title>

</head>
<body>
    <div class="container">
        <h2>Your Private Notes</h2>
        <ul id="user-notes-list">

        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadUserNotes() {
                $.ajax({
                    type: 'GET',
                    url: 'ajax/load_notes.php',
                    data: { book_id: <?php echo $bookId; ?> },
                    success: function(data) {
                        $("#user-notes-list").html(data);
                    }
                });
            }

            loadUserNotes();

            $(document).on('click', '.delete-note-button', function() {
                var noteId = $(this).data('note-id');
                $.ajax({
                    type: 'POST',
                    url: 'ajax/delete_note.php',
                    data: { note_id: noteId },
                    success: function(response) {
                        if (response === 'success') {
                            loadUserNotes();
                        } else {
                            console.log("Error deleting note.");
                        }
                    }
                });
            });

            $(document).on('click', '.edit-note-button', function() {
                var noteId = $(this).data('note-id');
                var updatedNote = prompt("Edit your note:", $("#" + noteId).text().trim());
                if (updatedNote !== null) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/edit_note.php',
                        data: { note_id: noteId, updated_note: updatedNote },
                        success: function(response) {
                            if (response === 'success') {
                                loadUserNotes();
                            } else {
                                console.log("Error editing note.");
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
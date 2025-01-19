$(document).ready(function() {
    $('#searchForm').submit(function(event) {
        event.preventDefault(); // Prevent default form submission

        var query = $('#searchInput').val().trim(); // Get the search query

        // Send AJAX request to PHP script
        $.ajax({
            url: 'search.php',
            method: 'POST',
            data: { query: query },
            success: function(response) {
                $('#searchResults').html(response); // Display search results

                // Scroll to the first matched result and highlight it
                var result = $('.highlight:first');
                if (result.length) {
                    $('html, body').animate({
                        scrollTop: result.offset().top - 100 // Adjust this value as needed
                    }, 500);
                }
            }
        });
    });
});

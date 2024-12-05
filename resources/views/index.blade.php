<html>

<head>

<body>
    <form id="login-form">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div id="response-message" style="margin-top: 10px;"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#login-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ route("ajax.login") }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    if (response.status === 'success') {
                        $('#response-message').html('<div class="alert alert-success">' + response.message + '</div>');
                        // Redirect to the desired page
                        window.location.href = '/dashboard';
                    } else {
                        $('#response-message').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(xhr) {
                    $('#response-message').html('<div class="alert alert-danger">Something went wrong. Please try again.</div>');
                }
            });
        });
    });
</script>

</body>
</head>

</html>

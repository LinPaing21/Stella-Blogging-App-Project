<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stella: @yield('title')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- Font Awesome CSS -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
</head>
<body class="bg-light">
    <!-- Sticky top nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top mb-3">
        <a class="navbar-brand ms-5" href="#">Your Logo</a>
        <!-- Add navigation links here -->
    </nav>

    <div class="container">
        <div class="row mb-5">
            @include('components.sidebar')
            @yield('content')
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <h3>Stella Inc</h3>
                    <p class="text-muted"> &copy; 2023. All rights reserved.</p>
                </div>
                <div class="col-md-4">
                    <!-- About Us content -->
                </div>
                <div class="col-md-4">
                    <!-- Contact Us content -->
                </div>
            </div>
        </div>
    </footer>

    <!-- Your content will go here -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

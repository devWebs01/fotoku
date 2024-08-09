<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2>Welcome to Our Service!</h2>
            </div>
            <div class="card-body">
                <h4>Hello, {{ $name }}!</h4>
                <p>We are excited to have you on board. Here’s a little welcome gift for you.</p>
                <p>Please find the attached file below.</p>
                <p>If you have any questions, feel free to contact us.</p>
                <a href="#" class="btn btn-primary">Visit our website</a>
            </div>
            <div class="card-footer text-muted">
                <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>

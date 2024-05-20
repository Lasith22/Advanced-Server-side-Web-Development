<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Application</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .header {
            background: #2B58D8;
            padding: 20px 0;

            color: white;
            width: 100%;

            position: fixed;

            top: 0;
            left: 0;
            z-index: 1000;

        }

        .header nav {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
        }

        .header ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .header li {
            margin: 0 10px;
        }

        .header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .header a:hover {
            text-decoration: underline;
        }

        .container {
            margin-top: 80px;


        }

        .container2 {
            display: flex;

            gap: 3;

        }

        .question-box,
        .answer-box {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px auto;
            /* Center the box */
            background-color: #f9f9f9;
            border-radius: 5px;
            max-width: 1100px;

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .vote-section {
            display: flex;
            gap: 10px;
        }

        .vote-count {
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .vote-count i {
            margin-right: 5px;
        }

        .tags {
            display: flex;
            gap: 5px;
        }

        .btn-outline-primary,
        .btn-outline-secondary {
            border-color: #6c757d;
            color: #6c757d;
        }

        .btn-outline-primary:hover,
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .custom-btn {
            background-color: #181F26;
            border-color: #181F26;
        }
    </style>
</head>

<body>
    <div class="header">
        <nav>
            <ul>
                <li><a href="<?php echo site_url('home'); ?>">Home</a></li>
                <li><a href="<?php echo site_url('about'); ?>">About</a></li>
                <li><a href="<?php echo site_url('users/login'); ?>">Log Out</a></li>
            </ul>
        </nav>
    </div>
    <div class="container">
        <!-- Your content here -->
    </div>
</body>

</html>
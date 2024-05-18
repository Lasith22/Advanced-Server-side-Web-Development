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
            background: linear-gradient(to right, #3A1C71, #D76D77, #FFAF7B);
            padding: 10px 0;
            color: white;
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
            color: black;
            text-decoration: none;
            font-weight: bold;
        }

        .header a:hover {
            text-decoration: underline;
        }

        .question-box {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px 0;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
    </style>
</head>

<body>
    <div class="container">
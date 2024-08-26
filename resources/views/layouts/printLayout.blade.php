<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1CmrxMRARb6aLqgBO7ewgo5oI7ZSQkZwyH1V6i3v6sA5z1RkqHzF3cNf5x5ql/X9" crossorigin="anonymous">

    <style>
        /* Print-specific styles */
        @media print {
            .no-print {
                display: none;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
            h1, p {
                text-align: center;
            }
            .container {
                width: 100%;
            }
        }

        /* General styles */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1.2rem;
        }

        table {
            margin-top: 1.5rem;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: center;
        }

        td {
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .table-bordered th, .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>

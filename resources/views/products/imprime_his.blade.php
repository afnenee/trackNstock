<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        .print-info {
            margin: 20px 0;
            text-align: center;
            font-size: 14px;
            color: #666;
        }

        @media print {
            table {
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
            }
        }
    </style>
</head>

<body>
    <h1>Product History - {{ $product->name }}</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Changes</th>
                <th>Etats</th>
                <th>Placement</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $history->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>
                        <ul>
                            @foreach (explode(', ', $history->changes) as $change)
                                <li>{{ $change }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $history->etats }}</td>
                    <td>{{ $history->placement }}</td>
                    <td>{{ $history->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="print-info">
        Printed on: {{ now()->format('l, F j, Y \a\t g:i A') }}
    </div>
</body>

</html>

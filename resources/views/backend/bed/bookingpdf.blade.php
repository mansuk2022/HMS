<!DOCTYPE html>
<html>
<head>
    <title>Hospital Bed Reservation Invoice</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.4;
        }

        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        .logo {
            float: left;
            margin-top: 20px;
        }

        .invoice-header {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .invoice-header h2 {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .invoice-header p {
            font-size: 16px;
            margin-bottom: 0;
        }

        .invoice-header p:last-child {
            margin-top: 5px;
        }

        .invoice-body {
            margin-bottom: 50px;
        }

        .invoice-body h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        .invoice-table th {
            background-color: #eee;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 20px;
        }

        .invoice-footer p {
            margin-bottom: 5px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="path/to/logo.png" alt="Hospital Logo">
        </div>
        <div class="invoice-header">
            <h2>Hospital Bed Reservation Invoice</h2>
            
        </div>
        <div class="invoice-body">
            <h3>Reservation Details</h3>
            <table class="invoice-table">
                <tr>
                    <th>Name</th>
                    <td>{{ $name }}</td>

                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $address }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{ $contact }}</td>
                </tr>
                <tr>
                    <th>Reservation Date</th>
                    <td>{{ $reservation_date }}</td>
                </tr>
                <tr>
                    <th>Price Per Day</th>
                    <td>{{ $price }}</td>
                </tr>
                <tr>
                    <th>Floor</th>
                    <td>{{ $floor }}</td>
                </tr>
                <tr>
                    <th>Bed Number</th>
                    <td>{{ $bed_no }}</td>

                </tr>
            </table>
        </div>
        <div class="invoice-footer">
            <p>Thank you for your reservation!</p>
            

        </div>
    </div>
</body>
</html>

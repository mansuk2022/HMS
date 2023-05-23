<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hemoglobin Test Report</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            background-color: #E8F8F5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 50px;
        }

        h1,
        h2,
        h3 {
            margin: 0;
        }

        h1 {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 20px;
            font-weight: bold;
            margin-top: 40px;
        }

        h3 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }

        table th,
        table td {
            border: 1px solid #CCCCCC;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #F9E79F;
        }

        .normal-range {
            margin-top: 20px;
            text-align: center;
        }

        .references {
            margin-top: 40px;
            text-align: center;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
            font-size: 16px;
        }

        .watermark {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.2;
            background-image: url("https://example.com/background-image.png");
            background-repeat: repeat;
            background-position: center center;
            background-attachment: fixed;
            z-index: -1;
        }
    </style>
</head>

<body>
    <div class="watermark"></div>
    <h1>Hemoglobin Test Report</h1>
    <div class="patient-info">
        <p><strong>Patient Name:</strong> {{$patient->name}}</p>
        <p><strong>Age:</strong>{{$patient->age}} years</p>
        <p><strong>Result Date:</strong> {{now()}}</p>
    </div>
    <h2>Results</h2>
    <table>
        <tr>
            <th>Test</th>
            <th>Result</th>
            <th>Units</th>
            <th>Normal Range</th>
        </tr>
        <tr>
            <td>Hemoglobin</td>
            <td class="result">{{$hemoglobin}}</td>
            <td>g/dL</td>
            <td class="normal-range">12.0 - 15.5</td>
        </tr>
        <tr>
            <td>Red Blood Cell Count</td>
            <td>{{$rbc}}</td>
            <td>million/mcL</td>
            <td>4.5 - 5.5</td>
        </tr>
        <tr>
            <td>Hematocrit</td>
            <td>{{$hematocrit}}</td>
            <td>%</td>
            <td>37 - 47</td>
        </tr>
    </table>
    <div class="normal-range">
        <p><strong>Result :</strong> {{$hemoglobin}} g/dL</p>
    </div>
    <div class="footer">
        <p></p>
    </div>
</body>
</html>
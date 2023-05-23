<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Event Notification</title>
</head>
<body>
    <h1>Event Notification</h1>
    <p>Dear {{ $data['name'] }},</p>
    <p>We would like to inform you about an upcoming event:</p>

    <h2>Event Details:</h2>
    <ul>

        <li><strong>Start Date:</strong> {{ $data['start_date'] }}</li>
        <li><strong>End Date:</strong> {{ $data['end_date'] }}</li>
        <li><strong>Location:</strong> {{ $data['location'] }}</li>
    </ul>

    <h2>Description:</h2>
    <p>{!! $data['description'] !!}</p>

    <p>We hope you can join us for this exciting event. If you have any questions, please feel free to contact us.</p>

    <p>Best regards,</p>
    <p>Your Event Team</p>
</body>
</html>


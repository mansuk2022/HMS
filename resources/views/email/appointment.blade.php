<!DOCTYPE html>
<html>

<head>
    <title>Appointment Confirmation</title>
</head>

<body>
    <p>Dear {{ $data['name'] }},</p>

    <p>We are pleased to confirm your appointment with Dr. {{ $data['doctor_name'] }} on {{ $data['date'] }} at {{
        $data['appointment_time'] }}. Your appointment will take place in room number {{ $data['room_no'] }} at our hospital.</p>

    <p>Please arrive at least 15 minutes before your scheduled appointment time and bring any relevant medical records
        or test results with you. If you need to reschedule your appointment, please contact us as soon as possible so
        we can accommodate your needs.</p>

    <p>We encourage you to prepare a list of questions or concerns you would like to discuss with the doctor during your
        appointment. Dr. {{ $data['doctor_name'] }} is looking forward to meeting you and providing you with the highest quality
        of care.</p>

    <p>If you have any questions or concerns, please feel free to contact us at infohms@gmail.com or reply to
        this email.</p>

    <p>Thank you for choosing our hospital for your healthcare needs, and we look forward to seeing you soon.</p>

    <p>Best regards,</p>

   <h4 style="margin-bottom: 0px;">Best regards,</h4>
    <h4 style="margin-top: 0px;">Hospital Management System</h4>
</body>

</html>
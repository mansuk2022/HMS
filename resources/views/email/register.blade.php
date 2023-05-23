<!DOCTYPE html>
<html lang="en">
    

<body>
    Dear {{ $data['name'] }},
    
   <p> We are pleased to inform you that your registration has been successful in our HMS (Hospital Management System). You are
    now an authorized user of our system, and we have created a username and password for you to access the system.</p>
    
   <p>Please find below your login credentials:</p>

    <h4 style="margin-bottom: 0px;">Username: {{ $data['email'] }}</h4>
    <h4 style="margin-top: 0px;">Password: {{ $data['password'] }}</h4>
    
    <p>
        Please keep this information safe and secure, as it will be required every time you access the HMS system. We also
        recommend that you change your password upon your initial login to ensure the security of your account.
        
        We encourage you to explore the features and functionalities of our HMS system and get familiar with its operation. If
        you face any issues or need any assistance, please feel free to contact our technical support team, and they will be
        more than happy to help.
        
        Thank you for your registration and support in using our HMS system. We hope it will be a valuable tool for you and help
        you provide better care to your patients.
    </p>
    
    
    <h4 style="margin-bottom: 0px;">Best regards,</h4>
    <h4 style="margin-top: 0px;">Hospital Management System</h4>
</body>

</html>
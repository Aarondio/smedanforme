<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application completed</title>
    <style>
        .download-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3490dc;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        p{
            text-align: justify;
            font-size: 16px;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding-top:30px;padding-bottom:30px ">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0"
                    style="border-collapse: collapse; background-color: #ffffff; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); margin: 20px;">
                    <!-- Email Header -->
                    
                    <tr>
                        <td style="padding: 20px; border: 1px solid #ddd;">
                            <p>Dear <b> {{ $user->firstname }}</b>,</p>

                            <p>Your business plan for the loan application has been successfully submitted. Your application will be reviewed, and we will get back to
                                you as soon as possible.</p>

                            <p>For your convenience, you can download a copy of your submitted business plan using the
                                link below:</p>

                            <p><a href="{{ asset('/pdf') }}"
                                    style="display: inline-block; padding: 10px 20px; background-color: #5F5DB4; color: #ffffff; text-decoration: none; border-radius: 5px;">Download
                                    Business Plan</a></p>


                            <p>Best regards,<br>
                                Smecredits</p>
                        </td>
                    </tr>
                    <!-- Email Footer -->
                    <tr>
                        <td align="center"
                            style="background-color: #f8f8f8; padding: 20px; font-size: 12px; color: #555;">
                            &copy; {{ date('Y') }} Smecredits. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>

<?php

include "connection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "mail/PHPMailer.php";
require "mail/SMTP.php";
require "mail/Exception.php";

$email = $_GET["email"];


if (empty($email)) {
    echo ("Please enter your email address");
} else {

    $rs = Database::search("SELECT * FROM `users` WHERE `email` ='$email'");
    $num = $rs->num_rows;

    if ($num > 0) {

        $row = $rs->fetch_assoc();
        $vcode = uniqid();

        Database::iud("UPDATE `users` SET `vcode` = '$vcode' WHERE `id` = '" . $row["id"] . "'");

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'schamidu792@gmail.com';
            $mail->Password = 'wbartjbkvnuvmkat';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('schamidu792@gmail.com', 'Chamidu Sahan');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Reset your account password';
            $mail->Body = '<table style="width: 100%; font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <tbody>
        <tr>
            <td align="center">
                <table style="max-width: 600px; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px;">
                    <!-- Logo -->
                    <tr>
                        <td style="text-align: center;">
                           <a href="" style="font-size: 35px; color: #333333; font-weight: bold; text-decoration: none;">BellBird Clothing</a>
                            </a>
                            <hr style="border: 0; height: 1px; background: #dddddd; margin: 20px 0;" />
                        </td>
                    </tr>
                    <!-- Header -->
                    <tr>
                        <td style="text-align: center;">
                            <h1 style="font-size: 25px; font-weight: bold; color: #333333; line-height: 1.5;">Reset Your Password</h1>
                            <p style="font-size: 16px; color: #666666; margin-bottom: 24px;">It looks like you requested to reset your password. Click the button below to proceed.</p>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="text-align: center;">
                            <div>
                                <a href="http://localhost/myweb/reset-password.php?code=<?php echo $vcode; ?>" style="display: inline-block; background-color: #20c997; color: #ffffff; border-radius: 8px; padding: 15px 30px; font-size: 16px; text-decoration: none;">
                                    Reset Password
                                </a>
                            </div>
                            <p style="font-size: 16px; color: #666666; margin-top: 24px;">If you did not request a password reset, you can safely ignore this email.</p>
                        </td>
                    </tr>
                    <!-- Security Note -->
                    <tr>
                        <td style="text-align: center;">
                            <p style="font-size: 14px; color: #999999;">For your security, this link will expire in 24 hours.</p>
                            <hr style="border: 0; height: 1px; background: #dddddd; margin: 20px 0;" />
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td align="center">
                            <p style="font-size: 14px; color: #999999;">&copy; 2024 BellBird-Clothing.lk</p>
                            <p style="font-size: 14px; color: #999999;">
                                BellBird Clothing, Havelook Street, Colombo 05
                                <br>
                            
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>


';

            $mail->send();
            echo 'success';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo ("User does not exist");
    }
}

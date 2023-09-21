<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Storage;

class MailerController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->has("name") && 
            $request->has("email") && 
            $request->has("phone") && 
            $request->has("checkbox-agree") &&
            $request->has("checkbox-read")) {

            $name = $request->input("name");
            $email = $request->input("email");
            $phone = $request->input("phone");
            $message = $request->input("message");
            $checkbox_agree = $request->input("checkbox-agree");
            $checkbox_read = $request->input("checkbox-read");

            $mail = new PHPMailer;
            $mail->CharSet = 'UTF-8';
            
            try {
                
                // Настройки SMTP
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPDebug = 1;

                $mail->Host = 'ssl://' . config('mail.mailers.smtp.host');
                $mail->Port = config('mail.mailers.smtp.port');
                $mail->Username = config('mail.mailers.smtp.username');
                $mail->Password = config('mail.mailers.smtp.password');

                // От кого
                $mail->From = config('mail.from.address');
                $mail->FromName = config('mail.from.name');

                // Кому
                $mail->addAddress('zakaz@gidravlic.com', 'info');

                // Тема письма
                $mail->Subject = 'Сообщение с сайта gidravlic.com';

                $mail->isHTML(true);

                if (strlen($name) >= 3 &&
                    strlen($name) <= 50 &&
                    strlen($phone) == 18 && 
                    $checkbox_agree &&
                    $checkbox_read) {

                    // Тело письма
                    $mail->Body = "Имя: $name<br> Телефон: $phone<br> Email: $email<br> Сообщение: $message<br>";
                    $mail->AltBody = "Имя: $name\r\n Телефон: $phone\r\n Email: $email\r\n Сообщение: $message\r\n";

                    $mail->send();
                }

                $mail->smtpClose();

                return false;

            } catch (Exception $e) {
                Storage::disk('public')->put('mailer_error.txt', $e);
                return false;
            }

        } else {
            return redirect('/');
        }
    }
}

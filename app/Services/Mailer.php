<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Log;

class Mailer
{
    /**
     * Отправка на почту через плагин PhpMailer
     * https://github.com/PHPMailer/PHPMailer
     */
    
    protected $text;

    /**
     * @param string
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @param
     * @return bool
     */
    public function send(): bool
    {
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';

        $message = 'Новый заказ №' . $this->text;
        
        try {
            // Настройки SMTP
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 0;

            $mail->Host = 'ssl://' . config('mail.mailers.smtp.host');
            $mail->Port = config('mail.mailers.smtp.port');
            $mail->Username = config('mail.mailers.smtp.username');
            $mail->Password = config('mail.mailers.smtp.password');

            // От кого
            $mail->From = config('mail.from.address');
            $mail->FromName = config('mail.from.name');

            // Кому
            $mail->addAddress(config('mail.to.address'));

            // Тема письма
            $mail->Subject = 'Сообщение с сайта gidravlic.com';

            $mail->isHTML(true);

            // Тело письма
            $mail->Body = "Сообщение: $message<br>";
            $mail->AltBody = "Сообщение: $message\r\n";

            $mail->send();

            $mail->smtpClose();

            return false;

        } catch (Exception $e) {
            Log::info('PhpMailer Error ' . $mail->ErrorInfo);

            return false;
        }
    }
}

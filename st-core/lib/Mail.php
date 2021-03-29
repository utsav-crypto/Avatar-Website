<?php
namespace lib;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    public function __construct()
    {
        // code...
    }
    public static function sendMail($toEmail, $toName, $msg, $subject)
    {
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_OFF;

        //Set the hostname of the mail server
        $mail->Host = 'smtpout.secureserver.net';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 465;

        //Set the encryption mechanism to use - STARTTLS or SMTPS
        $mail->SMTPSecure = "ssl";

        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username = 'info@avtr.org.in';

        //Password to use for SMTP authentication
        $mail->Password = 'Avatar@rec1';

        //Set who the message is to be sent from
        $mail->setFrom('info@avtr.org.in', 'Avatar REC Banda');

        //Set an alternative reply-to address
        $mail->addReplyTo('info@avtr.org.in', 'Avatar REC Banda');

        //Set who the message is to be sent to
        $mail->addAddress($toEmail, $toName);

        //Set the subject line
        $mail->Subject = $subject;

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        $mail->msgHTML($msg);

        //Replace the plain text body with one created manually
        //$mail->AltBody = 'This is a plain-text message body';

        //Attach an image file
        //$mail->addAttachment('images/phpmailer_mini.png');

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: '. $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
            //Section 2: IMAP
            //Uncomment these to save your message in the 'Sent Mail' folder.
            if (self::saveMailToSent($mail)) {
                //echo "Message saved!";
            }
        }
    }
    //Section 2: IMAP
    //IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
    //Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
    //You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
    //be useful if you are trying to get this working on a non-Gmail IMAP server.
    public static function saveMailToSent($mail)
    {
        //You can change 'Sent Mail' to any other folder or tag

        $path = '{imap.secureserver.net:993/ssl}Sent_Items';//[avtr]/Sent Mail';

        //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
        $imapStream = imap_open($path, $mail->Username, $mail->Password);
        //print_r(imap_list($imapStream, '{imap.secureserver.net:993/ssl}INBOX', '*'));
        $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
        imap_close($imapStream);

        return $result;
    }

    public static function saveMailToInbox($toEmail, $toName, $msg, $subject)
    {
        $path = '{imap.secureserver.net:993/ssl}INBOX';//[avtr]/Sent Mail';

        //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
        $imapStream = imap_open($path, 'info@avtr.org.in', "Avatar@rec1");
        $result = imap_append($imapStream, $path, "From: $toName <$toEmail>\r\n"
                   . "Reply-To: $toName <$toEmail>\r\n"
                   . "Subject: $subject\r\n"
                   . "\r\n"
                   . "$msg\r\n");
        imap_close($imapStream);

        return $result;
    }
}

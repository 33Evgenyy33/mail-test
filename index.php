<?php

require_once __DIR__.'\vendor\autoload.php';

//$inbox = imap_open( "{mail.sgsim.ru:995/pop3/ssl/novalidate-cert}INBOX", "info@euroroaming.ru", "in38r*r0") or die( 'Cannot connect to Gmail: ' . print_r( imap_last_error() ) );

$mailbox = new PhpImap\Mailbox('{mail.sgsim.ru:995/pop3/ssl/novalidate-cert}INBOX', 'paytravel@euroroaming.ru', 'p44T94^3!', __DIR__);

// Read all messaged into an array:
$mailsIds = $mailbox->searchMailbox('ALL');
if(!$mailsIds) {
	die('Mailbox is empty');
}

// Get the first message and save its attachment(s) to disk:
$mail = $mailbox->getMail($mailsIds[1973]);

$test1 = $mail->textPlain;

//print_r($mail->textPlain);
echo '<br>';
$mail_array = explode(';', $test1);
echo '<pre>' . print_r( $mail_array, true ) . '</pre>';
$key_search = array_search('Euroroaming  - ПТ', $mail_array);
$order_id = $mail_array[$key_search+1];
echo $order_id;
echo '<br>';
//echo "\n\nAttachments:\n";
$mail->getAttachments();
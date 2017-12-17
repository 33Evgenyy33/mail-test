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



//$imap = imap_open("{localhost:995/imap/ssl/novalidate-cert}INBOX", "paytravel@euroroaming.ru", "p44T94^3!");
//
//$t1=time();//mark time in
//$tt=$t1+(3*1);//total time = t1 + n seconds
//
//do{
//	if(isset($t2)) unset($t2);//clean it at every loop cicle
//	$t2=time();//mark time
//	if(imap_num_msg($imap)!=0){//if there is any message (in the inbox)
//
//		$mc=imap_check($imap);//messages check
//		var_dump($mc); die;//vardump it to see all the data it is possible to get with imap_check() and them customize it for yourself
//
//
//	}else echo 'No new messagens';
//
//	sleep(rand(7,13));//Give Google server a breack
//	if(!@imap_ping($imap)){//if the connection is not up
//		//start the imap connection the normal way like you did at first
//	}
//
//}while($tt>$t2);//if the total time was not achivied yet, get back to the beginning of the loop

<?php 
$slice_url = dirname(__FILE__);
if ( preg_match('#wp-content#isU', $slice_url) ) {
	require_once '../../../../wp-load.php';  
}
else {
	require_once '../../../../../wp-load.php';  
}

function valid_email($str)
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

if ( isset($_POST) )
{
	$_POST = array_map('trim', $_POST);
	
	$newsletter_name = stripslashes($_POST['newsletter_name']);
	$newsletter_email = stripslashes($_POST['newsletter_email']);
	
	$regex_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
	
	if ( empty($newsletter_name) ) {
		$halt[] = __('Please enter your name.', 'slicetheme');
	}
	if ( empty($newsletter_email) ) {
		$halt[] = __('Please enter your email.', 'slicetheme');
	}
	elseif ( !valid_email($newsletter_email) ) {
		$halt[] = __('Please enter a valid email address.', 'slicetheme');
	}
	
	if ( isset($halt) )
	{
		echo '<div class="st-alert error" style="padding: 10px; min-height: inherit; background-image: none;">';
		echo '<p>'. @implode('<br />', $halt) .'</p>';
		echo '</div>';
	}
	else {		
		$messages = '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head></head>
		<body>
		<table>
			<tr><td valign="top"><b>'. __('Name', 'slicetheme') .'</b></td><td valign="top">:</td><td valign="top">' . $newsletter_name . '</td></tr>
			<tr><td valign="top"><b>'. __('Email', 'slicetheme') .'</b></td><td valign="top">:</td><td valign="top">' . $newsletter_email . '</td></tr>
		</table>
		</body>
		</html>';
		
		$headers = "MIME-Version: 1.0" . "\r\n";  
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";  
		$headers .= "From: " . stripslashes($newsletter_name) . " <" . $newsletter_email . ">" . "\r\n";  	
		$headers .= "Sender-IP: " . $_SERVER["SERVER_ADDR"] . "\r\n";
		$headers .= "Priority: normal" . "\r\n";
		$headers .= "X-Mailer: PHP/" . phpversion();
		
		$body = utf8_decode($messages);
		
		$to = slicetheme_option('newsletter_email');
		$subject = __('Newsletter Subscription From', 'slicetheme') .': '. $newsletter_name;
		
		if ( wp_mail( $to, $subject, $body, $headers ) )
		{
			echo '<div class="st-alert success" '. $class_wgt .'>';
			echo '<p>'. slicetheme_option('newsletter_success', 'Thank you for using our newsletter subscription! Your email was successfully sent.') .'</p>';
			echo '</div>';
		}
		else
		{			
			echo '<div class="st-alert error" '. $class_wgt .'>';
			echo '<p>Something went wrong!</p>';
			echo '</div>';
		}
	}
}
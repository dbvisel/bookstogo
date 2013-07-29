<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400italic,400&subset=latin,latin-ext">
  <title>Thank you for asking for books!</title>
	<style type="text/css" media="all"><!--

body {
  background-color:#999999;
	margin:0;
}

div {
	width:400px;
	margin-top:100px;
	margin-left:auto;
	margin-right:auto;
  background:white;
  background:rgba(255,255,255,0.85);
	padding:50px;
	border-radius:100px;
	border-style:solid;
	border-color:white;
	border-width:10px;
  margin-bottom:100px;

}

p {
  font-family:'Sorts Mill Goudy';
	text-align:center;
	font-size:2em;
	margin:0;
}

p + p {
	margin-top:0.5em;
}

a {
	text-decoration:none;
	font-style:italic;
	color:red;
}

a:hover {
	text-decoration:underline;
}

--></style>
     </head>

<body>
	<div>
<?php
  //send email
  if($_REQUEST['email']) {
  $email = $_REQUEST['email'] ;
  $name = $_REQUEST['name'];
  $list = '';
  if(is_array($_REQUEST['book'])) {
    foreach ($_POST['book'] as $key => $value)
    {
       $list = $list . $_POST['book'][$key] . "\n";
   }
  }
  $booklist = $list;

  $to = "dbvisel@gmail.com";
  $subject = "Book request from " . $name;
  $message = "Name: " . $name . "\nEmail: " . $email ."\n\nBooks wanted:\n\n" . $booklist . "\n\n";
  $headers = "From:" . $email;
$mailcopyfile = "requested.txt";
$fp = fopen($mailcopyfile, "a"); 
fputs($fp, $message);
fclose($fp);

  if(mail($to, $subject, $message, $headers)) 
  {
    $output = '<p style="font-size:4em;">Thanks!</p>';
    $output .= '<p>Your request has been submitted! Someone should get back to you eventually. If you don&rsquo;t hear from us, something has gone wrong! Sometimes this happens and we don&rsquo;t know anything about it&nbsp;&ndash; if you don&rsquo;t get an email in the next day, let me know.</p>';
    $output .= '<p>*&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;*</p><p>Are you sure you don&rsquo;t want some <a href="index.html">more books</a>? We have so many of them.</p>';
  }
} else 
   {
    $output = '<p style="font-size:4em;">Oh no!</p>';
    $output .= '<p>Something has gone terribly wrong and the form didn&rsquo;t actually email itself. Would you mind emailing Dan telling him which books you wanted? Sorry!</p>';
  }

  echo($output);

  ?>
</div>
</body>
</html>

<?php
$name = $_POST['name'];
$mail = $_POST['mail'];
$comment = $_POST['comment'];
echo "<p>Thanks for this comment $name</p>";
echo "<p><i> $comment </i></p>";
echo "<p>We will reply to $mail</p>";

?>
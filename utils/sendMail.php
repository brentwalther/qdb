<?php
  function sendEmail($to, $subject, $body) {

    $headers = array();
    $headers[] = "To: $to";
    $headers[] = "From: noreply@brentwalther.net";
    $headers[] = "Reply-To: noreply@brentwalther.net";
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP".phpversion();

    return mail($to, $subject, $body, implode("\r\n", $headers));
  }
?>
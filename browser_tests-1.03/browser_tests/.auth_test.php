<?php

  if (empty($_SERVER["PHP_AUTH_USER"])) {
    header("HTTP/1.0 401 Unauthorized");   
    header("WWW-Authenticate: basic realm=\"" . urldecode($_SERVER["QUERY_STRING"]) . "\"");
    echo "If you are seeing this text, authentication did not work.";
  } else {
    echo "If you are seeing this text, authentication worked.";
  }
 ?>

   
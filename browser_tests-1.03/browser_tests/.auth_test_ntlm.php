<?php

  header("HTTP/1.0 401 Unauthorized");   
  header("WWW-Authenticate: NTLM");
  echo "If you are seeing this text without getting prompted for password, NTLM authentication did not work.";

 ?>

   
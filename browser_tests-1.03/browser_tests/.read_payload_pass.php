<?php
  header('Content-Type: text/html');
 ?>

Received authentication data:
<p>
<pre>
<?php
  echo file_get_contents("php://input");
?>
</pre>
<p>
You can go back now.


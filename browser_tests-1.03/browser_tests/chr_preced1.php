<?php
  header('Content-Type: text/html; charset=iso-8859-2');
 ?>

<META HTTP-EQUIV="Content-Type" VALUE="text/html; charset=utf-8">
<h1>Charset declaration precedence test (1)</h1>

If this text looks like c-cute, n-cute, o-cute, s-cute, z-cute, <code>Content-Type</code> takes precedence over
<code>HTTP-EQUIV</code> charset if both values are correct:

<h2>���</h2>

<?php
  header('Content-Type: text/html; charset=badcharset');
 ?>

<META HTTP-EQUIV="Content-Type" VALUE="text/html; charset=iso-8859-2">
<h1>Charset declaration precedence test (2)</h1>

If this text looks like c-cute, n-cute, o-cute, s-cute, z-cute, 
<code>HTTP-EQUIV</code> takes precedence over invalid <code>Content-Type</code> charsets:

<h2>���</h2>

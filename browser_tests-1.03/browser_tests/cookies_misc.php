<?php
  header('Set-Cookie2: COOKIE2OK=YES; Version=1');
  header('Set-Cookie: COMMA1=1, COMMA2=comma2_noclobber; SEMI2=semi2_noclobber');
  header('Set-Cookie: hidethis=not_clobbered; httponly');
 ?>
<body>
<h1>Misc cookie tests - note: please clear your cookies before starting!</h1>

<input type=submit onclick="do_tests()" value="Start testing...">
<p>


<b>Test results:</b>
<ul id=out>
</ul>
<script>
function log(col,x) {
  document.getElementById('out').innerHTML += '<li> <font color=' + col + '>' + x + '</font>';
}

function do_tests() {

  document.cookie = "testcookies=1";
  if (document.cookie.indexOf('testcookies') == -1) {
    log('red','COOKIES DISABLED IN YOUR BROWSER - TEST ABORTED');
    return;
  }

  document.cookie = 'testcookies=2; expires=Wed, 06-Jul-2005 20:49:30 GMT';

  if (document.cookie.indexOf('testcookies') == -1) 
    log('teal','Possible to delete cookies with backdated "expires" value.');
  else
    log('red','Not possible to delete cookies with backdated "expires" value.');

  document.cookie='TTT=3_1;domain=[SERVER_NAME];path=/';
  document.cookie='TTT=2_2;domain=[SERVER_NAME_ONE_SEGMENT_LESS];path=/';
  document.cookie='TTT=4_3;domain=[SERVER_NAME];path=[SERVER_PATH]';
  document.cookie='TTT=1_4;domain=[SERVER_NAME_TWO_SEGMENTS_LESS];path=/';

  var x;

  if (window.XMLHttpRequest)
    x = new XMLHttpRequest();
  else
    x = new ActiveXObject('MSXML2.XMLHTTP.3.0');

  x.open('GET','.read_header.php?COOKIE',false);
  x.send(null);

  if (x.responseText.search(/TTT=3_1.+TTT=2_2.+TTT=4_3.+TTT=1_4/) != -1)
      log('teal','Duplicate-named cookies sent in the order of setting (OLDEST first).');
  else if (x.responseText.search(/TTT=1_4.+TTT=2_2.+TTT=3_1.+TTT=4_3/) != -1)
      log('magenta','Duplicate-named cookies sent in the order of specificity (MOST GENERAL first).');
  else if (x.responseText.search(/TTT=1_4.+TTT=4_3.+TTT=2_2.+TTT=3_1/) != -1)
      log('maroon','Duplicate-named cookies sent in the order of setting (NEWEST first).');
  else if (x.responseText.search(/TTT=4_3.+TTT=3_1.+TTT=2_2.+TTT=1_4/) != -1)
      log('violet','Duplicate-named cookies sent in the order of specificity (MOST SPECIFIC first).');
  else if (x.responseText.search(/TTT=3_1/) != -1 && x.responseText.search(/TTT=.+TTT=/) == -1)
      log('teal','Duplicate-named cookies not sent, only OLDEST sent.');
  else if (x.responseText.search(/TTT=1_4/) != -1 && x.responseText.search(/TTT=.+TTT=/) == -1)
      log('magenta','Duplicate-named cookies not sent, only MOST GENERAL sent.');
  else if (x.responseText.search(/TTT=1_4/) != -1 && x.responseText.search(/TTT=.+TTT=/) == -1)
      log('maroon','Duplicate-named cookies not sent, only NEWEST sent.');
  else if (x.responseText.search(/TTT=4_3/) != -1 && x.responseText.search(/TTT=.+TTT=/) == -1)
      log('violet','Duplicate-named cookies not sent, only LEAST GENERAL sent.');
  else if (x.responseText.search(/TTT=.+TTT=.+TTT=.+TTT=/) != -1 )
      log('black','Duplicate cookies sent all, but in random order (useless).');
  else
      log('black','Some duplicate cookies dropped, some kept (very bad).');

  if (document.cookie.indexOf('comma2_noclobber') != -1) {
    document.cookie = 'COMMA2=x';
    if (document.cookie.indexOf('comma2_noclobber') == -1)
      log('teal','Multiple comma-separated Set-Cookie pairs accepted.');
    else 
      log('red','Multiple comma-separated Set-Cookie pairs rejected (1).');
  } else
      log('red','Multiple comma-separated Set-Cookie pairs rejected (2).');

  if (document.cookie.indexOf('semi2_noclobber') != -1) {
    document.cookie = 'SEMI2=x';
    if (document.cookie.indexOf('semi2_noclobber') == -1)
      log('teal','Multiple semicolon-separated Set-Cookie pairs accepted.');
    else 
      log('red','Multiple semicolon-separated Set-Cookie pairs rejected (1).');
  } else
      log('red','Multiple semicolon-separated Set-Cookie pairs rejected (2).');

  if (document.cookie.indexOf('COOKIE2OK') != -1)
    log('teal','Cookie2 standard supported');
  else
    log('red','Cookie2 standard not supported');

  if (document.cookie.indexOf('hidethis=not_clobbered') == -1)
    log('teal','HTTPOnly cookies supported');
  else
    log('red','HTTPOnly cookies not supported');

  if (document.cookie.indexOf('hidethis=not_clobbered') == -1) {

    document.cookie="hidethis=bar";

    var x;
    if (window.XMLHttpRequest)
      x = new XMLHttpRequest();
    else
      x = new ActiveXObject('MSXML2.XMLHTTP.3.0');

    x.open('GET','.read_header.php?COOKIE',false);
    x.send(null);

    if (x.responseText.indexOf('not_clobbered') == -1)
      log('red','Possible to clobber httponly cookies.');
    else
      log('blue','Not possible to clobber httponly cookies.');

  }

  // Try invalid domain
  document.cookie = "autocorrect=1;domain=.blarg.com";

  if (document.cookie.indexOf('autocorrect') != -1)
    log('red','Cookies with incorrect domains get auto-corrected.');
  else
    log('teal','Cookies with incorrect domains are dropped.');

  var tstr = '';

  for (i=0;i<256;i++) {
    tstr += 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';
    document.cookie = "A=" + tstr + "findme";
    if (document.cookie.indexOf('findme') == -1) break;
  }

  if (i == 256)
    log('teal','Cookie size limit: more than 256 kB');
  else
    log('teal','Cookie size limit: about ' + (i + 1) + ' kB');

  document.cookie="A=x";

  for (i=0;i<1000;i++) {
    document.cookie = "t_" + i + "_=x";
    if (document.cookie.indexOf("t_" + i + "_") == -1 ||
        document.cookie.indexOf("t_0_") == -1) break;
  }

  if (i == 1000) 
    log('teal','Cookie count limit: more than 1000');
  else {
    log('teal','Cookie count limit: ' + i);

    if (document.cookie.indexOf("t_0_") == -1) 
      log('teal','Jar pruning: FIFO');
    else
      log('teal','Jar pruning: LIFO (?)');
  }

}
</script>

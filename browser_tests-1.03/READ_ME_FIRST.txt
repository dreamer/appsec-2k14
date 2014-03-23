This is a collection of test cases for http://code.google.com/p/browsersec/.
Some assembly required.

Please replace "[SERVER_IP]" with the IP of the system the data is hosted on 
(must support HTTP and HTTPS), "[SERVER_NAME]" with a fully-qualified server
name, and "[SERVER_PATH]" with the installation directory for test scripts.
There are several other variants that also start with "[SERVER_" in specific
tests, and need to be updated likewise.

You need to have PHP enabled.

Files in browser_tests/java/ must be then compiled with Java compiler (javac).

Files in browser_tests/client_side/ are expected to be run on client-side,
using a 'miniserver' minimal HTTP server included with the sources.

Files in browser_tests/file_restrictions/ were used to build the client-side
file:/// test archive, file_restrictions.zip.

Files matching browser_tests/.* are generally sub-components called from other
scripts, and do not need to be invoked directly.

Please do not leave these scripts on externally reachable or production systems,
as they are experimental in nature, and many of them may open up cross-site
scripting vectors or cause other trouble.

One of the files, web_misc_urls, is known to cause false positives with some
anti-virus software.

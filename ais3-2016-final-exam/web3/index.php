<?php
error_reporting(0);
define("FROM_INDEX", "true");
include_once "utils.php";


/* for hackers:
 * In the AIS3 pre-exam last year, we know how to leak the source code by LFI.
 * But there is a WAF now, can you bypass it?
*/


function waf()
{
    $keywords = [
        'select',
        'union',
        // My mum said that a good coding style is reuse the exists code.
        // So I use SQLi WAF framework to find the query I want.
        'flag'
    ];

    foreach ($keywords as $key)
    {
        if (stristr($_SERVER['QUERY_STRING'], $key))
        {
            // only for "flag" page: only localhost admin can access it
            if ($key === "flag")
            {
                if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')
                {
                    bad("You are not localhost admin.");
                }
            }
            else
            {
                hacker();
            }
        }
    }
}

waf();

if (!isset($_GET['p']))
    $_GET['p'] = 'welcome';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Snoopy Flag Service</title>
</head>
<body>
<h1>Snoopy Flag Service</h1>
<ul>
<li><a href="?p=welcome">Index</li>
<li><a href="?p=snoopy">Flag</a></li>
<!-- Only localhost admin can access it, I write a WAF for that. -->
<!-- <li><a href="?p=flag">Flag</a></li> -->
</ul>

<?php
include $_GET['p'] . '.php';
?>
</body>
</html>

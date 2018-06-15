<?php
/** Adminer - Compact database management
* @link https://www.adminer.org/
* @author Jakub Vrana, https://www.vrana.cz/
* @copyright 2007 Jakub Vrana
* @license https://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
* @license https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License, version 2 (one or other)
* @version 4.6.2
*/error_reporting(6135);$Uc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($Uc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$xi=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($xi)$$X=$xi;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$f;return$f;}function
adminer(){global$b;return$b;}function
version(){global$ia;return$ia;}function
idf_unescape($u){$he=substr($u,-1);return
str_replace($he.$he,$he,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return
preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($hg,$Uc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($hg)){foreach($X
as$Xd=>$W){unset($hg[$y][$Xd]);if(is_array($W)){$hg[$y][stripslashes($Xd)]=$W;$hg[]=&$hg[$y][stripslashes($Xd)];}else$hg[$y][stripslashes($Xd)]=($Uc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Na=false){static$hi=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Na?array_flip($hi):$hi));}function
min_version($Ni,$ve="",$g=null){global$f;if(!$g)$g=$f;$ch=$g->server_info;if($ve&&preg_match('~([\d.]+)-MariaDB~',$ch,$B)){$ch=$B[1];$Ni=$ve;}return(version_compare($ch,$Ni)>=0);}function
charset($f){return(min_version("5.5.3",0,$f)?"utf8mb4":"utf8");}function
script($lh,$gi="\n"){return"<script".nonce().">$lh</script>$gi";}function
script_src($Bi){return"<script src='".h($Bi)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nbsp($Q){return(trim($Q)!=""?h($Q):"&nbsp;");}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($C,$Y,$eb,$ee="",$jf="",$jb="",$fe=""){$I="<input type='checkbox' name='$C' value='".h($Y)."'".($eb?" checked":"").($fe?" aria-labelledby='$fe'":"").">".($jf?script("qsl('input').onclick = function () { $jf };",""):"");return($ee!=""||$jb?"<label".($jb?" class='$jb'":"").">$I".h($ee)."</label>":$I);}function
optionlist($pf,$Wg=null,$Fi=false){$I="";foreach($pf
as$Xd=>$W){$qf=array($Xd=>$W);if(is_array($W)){$I.='<optgroup label="'.h($Xd).'">';$qf=$W;}foreach($qf
as$y=>$X)$I.='<option'.($Fi||is_string($y)?' value="'.h($y).'"':'').(($Fi||is_string($y)?(string)$y:$X)===$Wg?' selected':'').'>'.h($X);if(is_array($W))$I.='</optgroup>';}return$I;}function
html_select($C,$pf,$Y="",$if=true,$fe=""){if($if)return"<select name='".h($C)."'".($fe?" aria-labelledby='$fe'":"").">".optionlist($pf,$Y)."</select>".(is_string($if)?script("qsl('select').onchange = function () { $if };",""):"");$I="";foreach($pf
as$y=>$X)$I.="<label><input type='radio' name='".h($C)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$I;}function
select_input($Ja,$pf,$Y="",$if="",$Tf=""){$Lh=($pf?"select":"input");return"<$Lh$Ja".($pf?"><option value=''>$Tf".optionlist($pf,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$Tf'>").($if?script("qsl('$Lh').onchange = $if;",""):"");}function
confirm($Ee="",$Xg="qsl('input')"){return
script("$Xg.onclick = function () { return confirm('".($Ee?js_escape($Ee):'你確定嗎？')."'); };","");}function
print_fieldset($t,$me,$Qi=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$me</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Qi?"":" class='hidden'").">\n";}function
bold($Va,$jb=""){return($Va?" class='active $jb'":($jb?" class='$jb'":""));}function
odd($I=' class="odd"'){static$s=0;if(!$I)$s=-1;return($s++%2?$I:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$Vc=true;if($Vc)echo"{";if($y!=""){echo($Vc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$Vc=false;}else{echo"\n}\n";$Vc=true;}}function
ini_bool($Kd){$X=ini_get($Kd);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$I;if($I===null)$I=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$I;}function
set_password($Mi,$N,$V,$F){$_SESSION["pwds"][$Mi][$N][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$I=get_session("pwds");if(is_array($I))$I=($_COOKIE["adminer_key"]?decrypt_string($I[0],$_COOKIE["adminer_key"]):false);return$I;}function
q($Q){global$f;return$f->quote($Q);}function
get_vals($G,$d=0){global$f;$I=array();$H=$f->query($G);if(is_object($H)){while($J=$H->fetch_row())$I[]=$J[$d];}return$I;}function
get_key_vals($G,$g=null,$Uh=0,$fh=true){global$f;if(!is_object($g))$g=$f;$I=array();$g->timeout=$Uh;$H=$g->query($G);$g->timeout=0;if(is_object($H)){while($J=$H->fetch_row()){if($fh)$I[$J[0]]=$J[1];else$I[]=$J[0];}}return$I;}function
get_rows($G,$g=null,$n="<p class='error'>"){global$f;$xb=(is_object($g)?$g:$f);$I=array();$H=$xb->query($G);if(is_object($H)){while($J=$H->fetch_assoc())$I[]=$J;}elseif(!$H&&!is_object($g)&&$n&&defined("PAGE_HEADER"))echo$n.error()."\n";return$I;}function
unique_array($J,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$I=array();foreach($v["columns"]as$y){if(!isset($J[$y]))continue
2;$I[$y]=$J[$y];}return$I;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$B))return$B[1].idf_escape(idf_unescape($B[2])).$B[3];return
idf_escape($y);}function
where($Z,$p=array()){global$f,$x;$I=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$d=escape_key($y);$I[]=$d.($x=="sql"&&preg_match('~^[0-9]*\\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($p[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$p[$y]["type"])&&preg_match("~[^ -@]~",$X))$I[]="$d = ".q($X)." COLLATE ".charset($f)."_bin";}foreach((array)$Z["null"]as$y)$I[]=escape_key($y)." IS NULL";return
implode(" AND ",$I);}function
where_check($X,$p=array()){parse_str($X,$cb);remove_slashes(array(&$cb));return
where($cb,$p);}function
where_link($s,$d,$Y,$lf="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($d)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$lf:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($e,$p,$L=array()){$I="";foreach($e
as$y=>$X){if($L&&!in_array(idf_escape($y),$L))continue;$Ga=convert_field($p[$y]);if($Ga)$I.=", $Ga AS ".idf_escape($y);}return$I;}function
adm_cookie($C,$Y,$pe=2592000){global$ba;return
header("Set-Cookie: $C=".urlencode($Y).($pe?"; expires=".gmdate("D, d M Y H:i:s",time()+$pe)." GMT":"")."; path=".preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]).($ba?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session(){if(!ini_bool("session.use_cookies"))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Mi,$N,$V,$l=null){global$dc;preg_match('~([^?]*)\\??(.*)~',remove_from_uri(implode("|",array_keys($dc))."|username|".($l!==null?"db|":"").session_name()),$B);return"$B[1]?".(sid()?SID."&":"").($Mi!="server"||$N!=""?urlencode($Mi)."=".urlencode($N)."&":"")."username=".urlencode($V).($l!=""?"&db=".urlencode($l):"").($B[2]?"&$B[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
adm_redirect($A,$Ee=null){if($Ee!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($A!==null?$A:$_SERVER["REQUEST_URI"]))][]=$Ee;}if($A!==null){if($A=="")$A=".";header("Location: $A");exit;}}function
query_redirect($G,$A,$Ee,$tg=true,$Bc=true,$Mc=false,$Th=""){global$f,$n,$b;if($Bc){$th=microtime(true);$Mc=!$f->query($G);$Th=format_time($th);}$oh="";if($G)$oh=$b->messageQuery($G,$Th,$Mc);if($Mc){$n=error().$oh.script("messagesPrint();");return
false;}if($tg)adm_redirect($A,$Ee.$oh);return
true;}function
queries($G){global$f;static$mg=array();static$th;if(!$th)$th=microtime(true);if($G===null)return
array(implode("\n",$mg),format_time($th));$mg[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$f->query($G);}function
apply_queries($G,$T,$yc='table'){foreach($T
as$R){if(!queries("$G ".$yc($R)))return
false;}return
true;}function
queries_redirect($A,$Ee,$tg){list($mg,$Th)=queries(null);return
query_redirect($mg,$A,$Ee,$tg,false,!$tg,$Th);}function
format_time($th){return
sprintf('%.3f秒',max(0,microtime(true)-$th));}function
remove_from_uri($Ef=""){return
substr(preg_replace("~(?<=[?&])($Ef".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($E,$Ib){return" ".($E==$Ib?$E+1:'<a href="'.h(remove_from_uri("page").($E?"&page=$E".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($E+1)."</a>");}function
get_file($y,$Qb=false){$Sc=$_FILES[$y];if(!$Sc)return
null;foreach($Sc
as$y=>$X)$Sc[$y]=(array)$X;$I='';foreach($Sc["error"]as$y=>$n){if($n)return$n;$C=$Sc["name"][$y];$bi=$Sc["tmp_name"][$y];$zb=file_get_contents($Qb&&preg_match('~\\.gz$~',$C)?"compress.zlib://$bi":$bi);if($Qb){$th=substr($zb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$th,$zg))$zb=iconv("utf-16","utf-8",$zb);elseif($th=="\xEF\xBB\xBF")$zb=substr($zb,3);$I.=$zb."\n\n";}else$I.=$zb;}return$I;}function
upload_error($n){$Be=($n==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($n?'無法上傳檔案。'.($Be?" ".sprintf('允許的檔案上限大小為%sB',$Be):""):'檔案不存在');}function
repeat_pattern($Rf,$ne){return
str_repeat("$Rf{0,65535}",$ne/65535)."$Rf{0,".($ne%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\\0-\\x8\\xB\\xC\\xE-\\x1F]~',$X));}function
shorten_utf8($Q,$ne=80,$_h=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$ne).")($)?)u",$Q,$B))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$ne).")($)?)",$Q,$B);return
h($B[1]).$_h.(isset($B[2])?"":"<i>...</i>");}function
format_number($X){return
strtr(number_format($X,0,".",','),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($hg,$Ad=array()){$I=false;while(list($y,$X)=each($hg)){if(!in_array($y,$Ad)){if(is_array($X)){foreach($X
as$Xd=>$W)$hg[$y."[$Xd]"]=$W;}else{$I=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$I;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$Nc=false){$I=table_status($R,$Nc);return($I?$I:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$I=array();foreach($b->foreignKeys($R)as$q){foreach($q["source"]as$X)$I[$X][]=$q;}return$I;}function
enum_input($U,$Ja,$o,$Y,$sc=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$xe);$I=($sc!==null?"<label><input type='$U'$Ja value='$sc'".((is_array($Y)?in_array($sc,$Y):$Y===0)?" checked":"")."><i>".'空值'."</i></label>":"");foreach($xe[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$eb=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$I.=" <label><input type='$U'$Ja value='".($s+1)."'".($eb?' checked':'').'>'.h($b->editVal($X,$o)).'</label>';}return$I;}function
input($o,$Y,$r){global$si,$b,$x;$C=h(bracket_escape($o["field"]));echo"<td class='function'>";if(is_array($Y)&&!$r){$Ea=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$Ea[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$Ea);$r="json";}$Cg=($x=="mssql"&&$o["auto_increment"]);if($Cg&&!$_POST["save"])$r=null;$id=(isset($_GET["select"])||$Cg?array("orig"=>'原始'):array())+$b->editFunctions($o);$Ja=" name='fields[$C]'";if($o["type"]=="enum")echo
nbsp($id[""])."<td>".$b->editInput($_GET["edit"],$o,$Ja,$Y);else{$rd=(in_array($r,$id)||isset($id[$r]));echo(count($id)>1?"<select name='function[$C]'>".optionlist($id,$r===null||$rd?$r:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):nbsp(reset($id))).'<td>';$Md=$b->editInput($_GET["edit"],$o,$Ja,$Y);if($Md!="")echo$Md;elseif(preg_match('~bool~',$o["type"]))echo"<input type='hidden'$Ja value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ja value='1'>";elseif($o["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$o["length"],$xe);foreach($xe[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$eb=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$C][$s]' value='".(1<<$s)."'".($eb?' checked':'').">".h($b->editVal($X,$o)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$C'>";elseif(($Rh=preg_match('~text|lob~',$o["type"]))||preg_match("~\n~",$Y)){if($Rh&&$x!="sqlite")$Ja.=" cols='50' rows='12'";else{$K=min(12,substr_count($Y,"\n")+1);$Ja.=" cols='30' rows='$K'".($K==1?" style='height: 1.2em;'":"");}echo"<textarea$Ja>".h($Y).'</textarea>';}elseif($r=="json"||preg_match('~^jsonb?$~',$o["type"]))echo"<textarea$Ja cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$De=(!preg_match('~int~',$o["type"])&&preg_match('~^(\\d+)(,(\\d+))?$~',$o["length"],$B)?((preg_match("~binary~",$o["type"])?2:1)*$B[1]+($B[3]?1:0)+($B[2]&&!$o["unsigned"]?1:0)):($si[$o["type"]]?$si[$o["type"]]+($o["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$o["type"]))$De+=7;echo"<input".((!$rd||$r==="")&&preg_match('~(?<!o)int(?!er)~',$o["type"])&&!preg_match('~\[\]~',$o["full_type"])?" type='number'":"")." value='".h($Y)."'".($De?" data-maxlength='$De'":"").(preg_match('~char|binary~',$o["type"])&&$De>20?" size='40'":"")."$Ja>";}echo$b->editHint($_GET["edit"],$o,$Y);$Vc=0;foreach($id
as$y=>$X){if($y===""||!$X)break;$Vc++;}if($Vc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $Vc), oninput: function () { this.onchange(); }});");}}function
process_input($o){global$b,$m;$u=bracket_escape($o["field"]);$r=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($o["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($o["auto_increment"]&&$Y=="")return
null;if($r=="orig")return($o["on_update"]=="CURRENT_TIMESTAMP"?idf_escape($o["field"]):false);if($r=="NULL")return"NULL";if($o["type"]=="set")return
array_sum((array)$Y);if($r=="json"){$r="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$o["type"])&&ini_bool("file_uploads")){$Sc=get_file("fields-$u");if(!is_string($Sc))return
false;return$m->quoteBinary($Sc);}return$b->processInput($o,$Y,$r);}function
fields_from_edit(){global$m;$I=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$C=bracket_escape($y,1);$I[$C]=array("field"=>$C,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$m->primary),);}return$I;}function
search_tables(){global$b,$f;$_GET["where"][0]["val"]=$_POST["query"];$Zg="<ul>\n";foreach(table_status('',true)as$R=>$S){$C=$b->tableName($S);if(isset($S["Engine"])&&$C!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$H=$f->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$H||$H->fetch_row()){$dg="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$C</a>";echo"$Zg<li>".($H?$dg:"<p class='error'>$dg: ".error())."\n";$Zg="";}}}echo($Zg?"<p class='message'>".'沒有資料表。':"</ul>")."\n";}function
dump_headers($zd,$Ne=false){global$b;$I=$b->dumpHeaders($zd,$Ne);$Bf=$_POST["output"];if($Bf!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($zd).".$I".($Bf!="file"&&!preg_match('~[^0-9a-z]~',$Bf)?".$Bf":""));session_write_close();ob_flush();flush();return$I;}function
dump_csv($J){foreach($J
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$J[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$J)."\r\n";}function
apply_sql_function($r,$d){return($r?($r=="unixepoch"?"DATETIME($d, '$r')":($r=="count distinct"?"COUNT(DISTINCT ":strtoupper("$r("))."$d)"):$d);}function
get_temp_dir(){$I=ini_get("upload_tmp_dir");if(!$I){if(function_exists('sys_get_temp_dir'))$I=sys_get_temp_dir();else{$Tc=@tempnam("","");if(!$Tc)return
false;$I=dirname($Tc);unlink($Tc);}}return$I;}function
file_open_lock($Tc){$gd=@fopen($Tc,"r+");if(!$gd){$gd=@fopen($Tc,"w");if(!$gd)return;chmod($Tc,0660);}flock($gd,LOCK_EX);return$gd;}function
file_write_unlock($gd,$Kb){rewind($gd);fwrite($gd,$Kb);ftruncate($gd,strlen($Kb));flock($gd,LOCK_UN);fclose($gd);}function
password_file($h){$Tc=get_temp_dir()."/adminer.key";$I=@file_get_contents($Tc);if($I||!$h)return$I;$gd=@fopen($Tc,"w");if($gd){chmod($Tc,0660);$I=rand_string();fwrite($gd,$I);fclose($gd);}return$I;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$o,$Sh){global$b;if(is_array($X)){$I="";foreach($X
as$Xd=>$W)$I.="<tr>".($X!=array_values($X)?"<th>".h($Xd):"")."<td>".select_value($W,$_,$o,$Sh);return"<table cellspacing='0'>$I</table>";}if(!$_)$_=$b->selectLink($X,$o);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$I=$b->editVal($X,$o);if($I!==null){if($I==="")$I="&nbsp;";elseif(!is_utf8($I))$I="\0";elseif($Sh!=""&&is_shortable($o))$I=shorten_utf8($I,max(0,+$Sh));else$I=h($I);}return$b->selectVal($I,$_,$o,$X);}function
is_mail($pc){$Ha='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Rf="$Ha+(\\.$Ha+)*@($cc?\\.)+$cc";return
is_string($pc)&&preg_match("(^$Rf(,\\s*$Rf)*\$)i",$pc);}function
is_url($Q){$cc='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($cc?\\.)+$cc(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($o){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$o["type"]);}function
count_rows($R,$Z,$Sd,$ld){global$x;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($Sd&&($x=="sql"||count($ld)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$ld).")$G":"SELECT COUNT(*)".($Sd?" FROM (SELECT 1$G GROUP BY ".implode(", ",$ld).") x":$G));}function
slow_query($G){global$b,$di;$l=$b->database();$Uh=$b->queryTimeout();if(support("kill")&&is_object($g=connect())&&($l==""||$g->select_db($l))){$ce=$g->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$ce,'&token=',$di,'\');
}, ',1000*$Uh,');
</script>
';}else$g=null;ob_flush();flush();$I=@get_key_vals($G,$g,$Uh,false);if($g){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$I;}function
get_token(){$pg=rand(1,1e6);return($pg^$_SESSION["token"]).":$pg";}function
verify_token(){list($di,$pg)=explode(":",$_POST["token"]);return($pg^$_SESSION["token"])==$di;}function
lzw_decompress($Ra){$Yb=256;$Sa=8;$lb=array();$Eg=0;$Fg=0;for($s=0;$s<strlen($Ra);$s++){$Eg=($Eg<<8)+ord($Ra[$s]);$Fg+=8;if($Fg>=$Sa){$Fg-=$Sa;$lb[]=$Eg>>$Fg;$Eg&=(1<<$Fg)-1;$Yb++;if($Yb>>$Sa)$Sa++;}}$Xb=range("\0","\xFF");$I="";foreach($lb
as$s=>$kb){$oc=$Xb[$kb];if(!isset($oc))$oc=$bj.$bj[0];$I.=$oc;if($s)$Xb[]=$bj.$oc[0];$bj=$oc;}return$I;}function
on_help($sb,$gh=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $sb, $gh) }, onmouseout: helpMouseout});","");}function
edit_form($a,$p,$J,$_i){global$b,$x,$di,$n;$Eh=$b->tableName(table_status1($a,true));page_header(($_i?'編輯':'新增'),$n,array("select"=>array($a,$Eh)),$Eh);if($J===false)echo"<p class='error'>".'沒有行。'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$p)echo"<p class='error'>".'You have no privileges to update this table.'."\n";else{echo"<table cellspacing='0'>".script("qsl('table').onkeydown = editingKeydown;");foreach($p
as$C=>$o){echo"<tr><th>".$b->fieldName($o);$Rb=$_GET["set"][bracket_escape($C)];if($Rb===null){$Rb=$o["default"];if($o["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$Rb,$zg))$Rb=$zg[1];}$Y=($J!==null?($J[$C]!=""&&$x=="sql"&&preg_match("~enum|set~",$o["type"])?(is_array($J[$C])?array_sum($J[$C]):+$J[$C]):$J[$C]):(!$_i&&$o["auto_increment"]?"":(isset($_GET["select"])?false:$Rb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$o);$r=($_POST["save"]?(string)$_POST["function"][$C]:($_i&&$o["on_update"]=="CURRENT_TIMESTAMP"?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$o["type"])&&$Y=="CURRENT_TIMESTAMP"){$Y="";$r="now";}input($o,$Y,$r);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($p){echo"<input type='submit' value='".'儲存'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($_i?'儲存並繼續編輯':'儲存並新增下一筆')."' title='Ctrl+Shift+Enter'>\n",($_i?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Saving'."...', this); };"):"");}}echo($_i?"<input type='submit' name='delete' value='".'刪除'."'>".confirm()."\n":($_POST||!$p?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$di,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0�\0\n @\0�C��\"\0`E�Q����?�tvM'�Jd�d\\�b0\0�\"��fӈ��s5����A�XPaJ�0���8�#R�T��z`�#.��c�X��Ȁ?�-\0�Im?�.�M��\0ȯ(̉��/(%�\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\r��C���o6�C��;1Lf�9��u7!�h���o7C���^1�����d0��\"�	��a6	Sa��t4��g9��Zs�Lói��g4��C����B�F#a��;:OAi��9hѺA_��Ɠ���d�Bas#��a*&�Ѡ�>90;����^kG#)��b�Y��M�1f9`����c��z|͞��[�w�q��s4MÆ�#��;��Ҫh���9��eF�Ze:�R�&C%D�:��\0���h�#���m�� �d�?���;��H�4\$Kp䦍�ۀ�a��\"H�,ϡ�,,�NS����z����@�@�!���N��<O#�6�	z\\���k���o��!�|�Ȫ����0\n�A�&�����)c���Nd@�l��?�b��!����J�oĪ�?�sc������:*��=���4:(tA;Dj��>Oӫ���DU*�t9�\0�0�\n@uMS�DʲL�IQc YA�t�A >�����1�����R�pf��cE[ʐ�G+�`Z�@J��2��5�2�aYeY�:�1��\n][FU��W�pk`Pv��U]6�X��p����Ҟ�@�=����M�.��+�B��\r�[mOp�pW���</=�b��'8R�J]XHO��Z*��6ƕ�\$�Ҋ��6�����U�\r���g�5}=~b��m2Pa�Q�����	���:�a�2�5c��Z�Z�[�Z�f�<�-��kXW�%�B����d�ߖ����U�\nu�.�A���)Xڐ\r��\$�*#��}�xFm�g.�x>�x\\���6_h��;cx�X1WR���07qà\\�#���/�4t�?V��QWq�v։g�7x����'M�x/����!p�0�#z8=���u!�daĮ��>�\\z�+�z'~.�����(��1�@�Ipn������TP�CC:[�����1 \r�~�&l�\\W�\0:���Ã�-o�1>��z�^�ň�0n�1�W��1pZÞ�)���>��LZC�e���;�ت�\$>��p�	,%�-�tޟ�K�)�(�`�Zb@���,��:xm�b�0��Atf!@�15�S��Kh�50�d�Chee3����\rТ6������2k'՟RL�^Ml�%���<�2?��f��*5D-ٕ4�8����\"�p�C��0,2b[�l�����#K�z��N ����㴍!��I����.�%�5�`���2�\nN	�7�4�Om�bI��\$�@�1���տ�(:�R�b0��3L�d���tFEl0�\n�_��'�?��oA�#���8'���N�bt}B9���=\r���r����PJR*H�0o�ܹ�P��\n=Y�	> ��ȑ@'�/��B�=a�M�B�M��8����tZ�څN��66I�2VK�a/�ޮ&�dk+Z��f�Zd� 6�P�݆�Lèr>���?r>�L�!1��6���=�����h�\"�����p�ՊC<���T\rAe�� ���n\nl�e�L�0B�H��^�Z@�i�e������X��)<�8���bX>t;M�r�\\JQ^�;\rs�k��6/�~�J�7�i�� ��R��*+DH�*�M�iO�����E��6��X��[A}E���K���q	;n�Cg��k�#�4&B+�J�'b�I��w��jRx0ޮDq���^+\rL@.:�Y��+yN�O+���W#�\$���!H��&PG�� 0Op�*J�t �N��=�\0��K��'qn��uÞ9���;�(�}a��y{0<�s���Q��?g���ϡڃ��cIܜA��!�K1�N�؂3pH��Z�ڹö/B\\	��T�����ID���_�lh��daʅEا}2�qa�Ӎ=�VN\rx�i\r��@;��H�Cu�7o ��Gw2,E�4>�3�/z�3F�^���\"̨�u��j�>` ��W'9�StX-�\0��k�e�J+�Ç�Zm��/,�<�ǰ�˷)\nc�P�l���7e5^�Zǈ^IVG�4�`��B'E���O������>4x�\n�2���幏7���:��n����_ȼ�d�F6<�B������Y�g#\\�TK0x:/�9@�B�讱�y]�;/g�ϳIT�;���F'�vp](�:0�8Y�{�p���qh,�iÏ\r����=XtV#ѻ��|���,��R�w��V�ָ�;߯9�������!q��@��i�\\˲z�e�����<��!�S�i�b�Ǖ�a��=�[�P@�'w����LO�(h��2�5�ѩ�:\0������G��ߧ��9R��r��|�ۯ.[�����oB�Ϟ�\rz�f�+�7�D�C�?�����@ڎ���o~��n�@��O����0�P�N�00��D�`���2�n��l�O�W+���*`.�K\0d�\0����G�d֐2��0���S�ȾРPh�	�Lͨ���r�d#j6儐�B)�t���\r�6�p�����\rp� f�Cr-����\r\0��p�\r����cs��P��cGq\0}�ҷ\"����0�Q4`�������h| ``f�J䖀��`����Fv��Qm\0�\r�!�6��{E9��`��Q��є�1����1�Q�_i�,�P�q��``)n�Ql��)�E����)�����Qg���{�kq�ѻ(Cr��*�����w�@C.��b�OE6~ѹ\r���Ԑq�=�:�~-@�qw#�Ji ��\$���G\$U\$P�%��\r��g�\"1]�����6�%�&�[\$�&2J�2�%�)�k\$oRg(�s\"���?\"D�������'@�\r��#h�/�3�I,��C�*,�-�e#��\$����Z��/2M&�\$��0Rn�'E��0�\0S�3,q\r`�1%2�/%�s)p�3F�-�C23r��(f)-��Q�3���	��5�ѡ6�j���6�\$�t�,3}7g\0�\0�6���=6��9j�8�8�c�ڐs�83�9�9�0�b�e�:�s�\"S�81�'��q^S�(0�^�?�g��S�#,3�)��1<�g>)�����5j�-�7BQ��+0�##s5���jɿDp�8tOӤ��%?�]�_<�W�_1��BJ��\n���[s�:mBS�H3�B��J����01#t�/4�\$rE�Ht�H��=T�=Q�Tt��)#����oI|�P;Nz��ɴ�4�\nl��Jж��\0��~��OCn�b�.��/�G�A4�\rÈ.�/��2��\$�o�CM��N)A\0T�!\0�N��O\"dͮ*�");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:��gCI��\n8��3)��7���81��x:\nOg#)��r7\n\"��`�|2�gSi�H)N�S��\r��\"0��@�)�`(\$s6O!��V/=��' T4�=��iS��6IO��er�x�9�*ź��n3�\rщv�C��`���2G%�Y�����1��f���Ȃl��1�\ny�*pC\r\$�n�T��3=\\�r9O\"�	��l<�\r�\\��I,�s\nA��eh+M�!�q0��f�`(�N{c��+w���Y��p٧3�3��+I��j�����k��n�q���zi#^r�����3���[��o;��(��6�#�Ґ��\":cz>ߣC2v�CX�<�P��c*5\n���/�P97�|F��c0�����!���!���!��\nZ%�ć#CH�!��r8�\$���,�Rܔ2���^0��@�2��(�88P/��݄�\\�\$La\\�;c�H��HX���\nʃt���8A<�sZ�*�;I��3��@�2<���!A8G<�j�-K�({*\r��a1���N4Tc\"\\�!=1^���M9O�:�;j��\r�X��L#H�7�#Tݪ/-���p�;�B \n�2!���t]apΎ��\0R�C�v�M�I,\r���\0Hv��?kT�4����uٱ�;&���+&���\r�X���bu4ݡi88�2B�/⃖4���N8A�A)52������2��s�8�5���p�WC@�:�t�㾴�e��h\"#8_��cp^��I]OH��:zd�3g�(���Ök��\\6����2�ږ��i��7���]\r�xO�n�p�<��p�Q�U�n��|@���#G3��8bA��6�2�67%#�\\8\r��2�c\r�ݟk��.(�	��-�J;��� ��L�� ���W��㧓ѥɤ����n��ҧ���M��9ZНs]�z����y^[��4-�U\0ta��62^��.`���.C�j�[ᄠ% Q\0`d�M8�����\$O0`4���\n\0a\rA�<�@����\r!�:�BA�9�?h>�Ǻ��~̌�6Ȉh�=�-�A7X��և\\�\r��Q<蚧q�'!XΓ2�T �!�D\r��,K�\"�%�H�qR\r�̠��C =�������<c�\n#<�5�M� �E��y�������o\"�cJKL2�&��eR��W�AΐTw�ё;�J���\\`)5��ޜB�qhT3��R	�'\r+\":�8��tV�A�+]��S72��Y�F��Z85�c,���J��/+S�nBpoW�d��\"�Q��a�ZKp�ާy\$�����4�I�@L'@�xC�df�~}Q*�ҺA��Q�\"B�*2\0�.��kF�\"\r��� �o�\\�Ԣ���VijY��M��O�\$��2�ThH����0XH�5~kL���T*:~P��2�t���B\0�Y������j�vD�s.�9�s��̤�P�*x���b�o����P�\$�W/�*��z';��\$�*����d�m�Ã�'b\r�n%��47W�-�������K���@<�g�èbB��[7�\\�|�VdR��6leQ�`(Ԣ,�d��8\r�]S:?�1�`��Y�`�A�ғ%��ZkQ�sM�*���{`�J*�w��ӊ>�վ�D���>�eӾ�\"�t+po����=�*��Apc7g��]��l�!׎ї+��zsN�����P����ia�y}U�a����`��A�����w\n�����j��<�:+�7;\"��N3tqd4źg���T�x��PH��FvW�V\n�h;��B�D�س/�bJ��\\�+ %�����]��ъ��wa�ݫ��������E��(i�!��7��x��z������Hɳ�d��md���Q�r@�a��ja?�\r�\ry�4-4�fP�҉W��`,�x@���x���A���K.�O�i��o�;���)�Ш��ɆS�d��eO��%�N��L78�F㪛�S�����I��\r��Z��r^�>����*�d\ri�Y��Yd�u��s�*�	��E��ʽ�D�9��!�>�kCရA���d���!WW�1����QA��k��d%��# �y��{��`}T�_YY�R��-�M��O�2���,�,Š�`�-2����+]L��7E���{`��˕��~w�-�����M6����]F����@���e`�/�8�@�e���\\ap.�H����C���*EAoz2���g0��?]͝~�s���`�hJ`��箤`�}���^`���>��O�5\r�W^I����\n����;��:���_h�n�����YP4���)��*��������6v��[ˤ�C;������n�W/j�<\$J*qĢ���-L�\0�����\0O�\$�ZW z�	\0}��.4F�\rnu\0����䏋��L���IA\nz��*����jJ�̅P�����p���6�ئN��D�Bf\\	\0�	��W@L\r��`�g'Bd�	Bi	�����*|r%|\nr\r#���@w���(T.�v�8���\nm���<p��`�Y0�������\0�#���}�.I �x�T\\���\n��Q��@bR MF��|��%0SDr�����f/b����:��k/��	f%�Ш�e\nx\0�l\0���	�0�W`���\n�8\r\0}p�����;\0�.B��V��,z&�f �\r��WOcK�\n������k�z2\r����W@�%\n~1��X���q�D�!�^��t<�\$�{0<E��Ѫ�2&�N�\r\n�^i���\"�#n� �#2D������D��o!�zK6��:������#Rl�%q'k޾*��À� Z@��J�`^P�H�bSR|�	�%|���.��µ�^�rc&o��k<����&��xK��'��LĂ��(��mE)�*���`R�bWGbTR���`VNf��j���woV��(\"��ڧ�&s\0��.��޳8��=h�� Q&���n*h�\0�v�B�G��@\\F\n�W�r f\$�e6��6�a㤥�5H����bY�f��RF��9�(Һ�.EQ�*���(�1�*�/+,�\"��\r��	��8�\0��3@�%l厭�,+���&�#-\$���%���gF!s�1��%��s�/�nK�q�\0O\"EA�8�2��}5\0�8��A\n��RrH����9�4U�dW3!b�z`�>�F>�i,�a?L>��`�r��r�ta;L���%�RxR��t�ʥHW/m7Dr�EsG2�.B5I���Q3�_��Ԉ봤�24.��Rk��z@��@�N�[4�&<%b>n�YPW���6n\$bK5�t��ZB�YI L�~G�Y���cQc	6DXֵ\"}ƞf�ТI�j��5�\\� X٢td��\nbtNaE�Tb;�l�p��|�\0��x\n���dV����]X��Yf��%D`�Qb�svDsk0�qT��7�l�c7������SZ�6��㵊Ğ#�x��h ՚���`�_`ܾ�ڧ������+w`�%U�����虯��̻U���D�Xl#��Ju�[ �Q'�\\H������GR��0�oa����C�X�+�a�c�N䞮`�re�\n��%�4�S�_�k_�ښ�!3({7�bI\rV\r�5��\0�\\��aeSg[�z�f-P�O,ju;XUv������m�l�\"\\B1Ğ��0� ��p��4��;2*��.b�\0��u��J\"NV��rrO�f�2�W3[�آ���	���5\r7��0,yt��wS	W	]kG�X�iA*=P\rbs\"�\\�o{e��5k��k�<��;�;x��-�0��_\$4� ����8*i\0f�.�(`����D`�P�&�����A+eB\"Z�����W̢\\M>�w�����g0��G���������\r�ܩ*�f\\�p\0��Kf#���˃\r��͡��@\r���d���\n�&D�%���3��w���.}�����ŭ� �kH�k1x~]�P٭Ӄ�[��;��Y���ؑK�6 �Z���t��>gL\r��HsM�e�\0���&3�\$�n3�� wʓ7՗��\"���+��;�s;���*1� y*���;TG|�|B�!�{!��\"/ʖo��j�W��+���L�DJ��ͅ�w2��VTZ�Gg/��֊�]4n�4��������i�=�T��]d�&���M\0�[88�ȮE��8&LXVm�v��	ʔj�כ�F��\\��	���&t\0Q��\\\"�b��	��\rBs�	w��	����N �7�C/|��	��\n\nN��K�y�*A�`�W�YvUZ4tz;~0}��J?hW�d*#�3��О�yF\nKT���@|�gy�\0�O�x�a�`w�Z9��bO����WY�R��}J��X��P�U2`���G��beu��zW�+���\r�\$4���\"\n\0�\n`�X@N���%d|�h�����Ňeg��+�H�t�(���( �^\0Zk@��P�@%�(W�{��/���t{o\$�\0[������%���ə��hU]�B,�rD��e:D���X��V&�Wll@�d��Y4�˯�iYy��[���+�Z��]�g��Fr�F���w���#1�tϦ��N�hq`�D����v|��Z�L�v�:S���@�e���B��.2��E�%گB�@[����B�*Y;��[�#������@:5�`Y8۾��&��	@�	���Q�S8!����� ���2MY���O;����ƛ�)��F¨FZ�A\\1�PF�B�lF+���<�R�><J?��{�f��kĘ8��W���뮺M\r���ۖRsC�N����%��J�~��?���,\r4�k0�,J󪎕b���o\0�!1 �5'�\r���u\r\0��\$��=�}\r7N��=DW6K�8v��\r� �\n��	*�\r��7)��D�m�1	a�@�և��w.�T����~���pV���J�u�\r�&N Mqc�d��d�8����_�K�aU&�H#]�d}`P�\0~�U/�����ynY<>dC�<G�@��\"�eZS�w㕛��Gy�\\j)�}���\r5�1,p�^u\0����n��C��HP֬G<��p��2�\n�FD�\r�\$��y�uyc���v�6�e)�p�YH�Ē��#VP�����eW��=�m��c:&���-��Pv.��ˀ�杍���	��أ\0\$��@+���P�l&_�Cb-U&�0\"�F��Vy��p\r�a5�q9U>�5�\\LBg��U�[�7m d��yV[5�*}�4�5/��ҏ�H�D60 ���쐿��:Suy\r����SM���;W���εL4�G�N������� �e�m��t��sq���\".F�����CsQ� h�e7��n�>��*�c!iS�j��ّ̭�������{����%t��\0`&lrœ,�!0ahy	R�B=�egW��o\0�H�h/v(�N4�\r���Tz�&q�?X\$�X!�J^�,���b���`2@:��7�CX�H�e��@q��\ny��0��������P�O02@�v�/IPa�2��0\n]-(^��t.��3&�\"�0��\"�\0]�1���a��E�S��P|\\���A�p�9��\$K���Byuد�z�7Z�\r�b�u�_��8��m�q����E<-��@\0�!)�� )�)�~Q�	rّ�/M�P�\n�	��`�!\n(��\n\n>X��!` W�������p4A�	Ŷ��d��\0X�٧V\n�+Cd/E�F��m+`\0�2��p/-��2���e��C@C�\0pX,4�쪼��9���Xt!.P��\\���q��b{�v�bfM��)D]�w�������X�B4'��f�tXЦ�(O վ�	�q�#��3��p]�i\".��7�iw[T\0y\r�4C�;,\$a2i(�\$�mȆD�&Ԕ4��Z �;E#6UA�R����eFF��U�1�h2\n��UpևÞ�Tʹ�����[�+�^�Xդ�78 A\rnK��d1�>�p�+�`�:���I�o<�L�@�a	���\0:���G�� hQ�\$�jR��'�Ȍ�K!�`���1���H�C��Z0\$�e�yXG�5h�E�\r1�G�\n�`�g'\0��6qV�(\r��VPH�ǌ�b֊\r�-k�\0B�b���G�:��Z��|�>�*�XX�!����\"&��:E�a��,vB�P��h!pf;\0��[��/r:qT����8\"x3Gl��\"Xm#�`�5���x\n��G�;��EQ�X�ǂ<HhA����+1Ns������k�jsH{�����&1�G�aI�?76�22�p4���șV!������2͟:��z	�I�ĉZ�1ER7��%�����6��!�?@(����,&�2����>�I8 �P+���h�&7N'2V��\0��i\0���ܙi%8��V8e�Z:�@ʴ��6�R{�Jz�s2�	j(C`Z*�J-b��#�DEu\$�W�*��*#9���D3y��?\"�9�,Q�/��w8��U�=�q��]\0�ʹ�m�t��-*�(��d҉�!��+F�X\$I�̄�����U\$�`���e�'c��Vr��n��1l���5�?XT�&*@���IB�tyt��f��N��%��S�H�x�\$�\0}/sH\\������6@y1�\0~@+�V�7U�Lh`_C�����hBA|��*pE��	�\"։0\0�0\$R���p\0���[��g�fb�r���\0P��,�\0�tc����|d	��,F���0�6+�U������[	ZL���R�%�j���4�I���#x���W�v����6M�\"�m�P�U7P6;n /	t�R�Ap��<R3NX�\0���S|1K�@0<̈́S	O+��J�7`1��oS`�8�	�e����X��7Q���s�*��@W2�M�ZaǼK����E@�\r��Ŧl���X(/�j�0�Y�<W�7Z�Ǉ|�&H|�م��%T�sFGNq<I�������7&-�z�V��[��w�1\\���S�\r��:����S-՟}�2䃊>��9h�`,=��RȰ��Je4Kp�EE��}H���a@�&;����{.	���!���I��0c��f�:\r�PwN�u���W���+�����M\0007�|!���Yh��W�\$�i�;I�aL���\$S ,�S.Se�@N0y*ۦ&���D\0dɤOE�1Eu��q�2J}E��+ �DZ��E��+a[O;�(ćEdm}\0e�\0��4\r��˅+���_��P�l�u��ɱ�Q�Q	�\$��1��!\\��\n�1O)6]u�&�K' ��G�=�t�LD�׍?H�Қ���H�(�HJTRLa��e �B�ހ[dн�\nR�=�BSgF��nʘ\0���0e�c&�@�Ж����1�\0\0�O��)�>z�&0��M����ZJj�ě�%�!�z�\0�8��AP��P�y��FcDJ�щ6��-��������RY&��~��\$�	���C�4��c#;�ȚAbݭ#C�hBBtO�h;��p�l���u�\nY	�'������\03�\0�	�IX@� \"��\0P�Z4�T�WUC�,��􀰩�(	��	M�,�����P`I���h���/Q�\0�������@)\nFH�����������Qo�@>S�C@p�H���V@Bn�	a1�ĞE�*�5a�H7dP\n�B� JD��J�����&��{���A�'�h5�-�@t���)dJu�����JqU��Q��%N�S�(&�.�R�T����e�r=\\Sވ�√����hn��N���Y\"�\n\nJx�G\r\0�r5��T@�[`����Z\r�Ip%|�A*9w\"�+���2c��l�9#\$�@a���*�T�@\0+��+=a9�C�I���Y~#�!�B�?��A�\n��E!�kC�-�d�fk��^\0�U�k5�:��pǜ����(8���v�5���*�8��Ă ����c�+�W�Z�FP�BWS)�@�=��S���;r@@Ȑ1�78�E�X��0�~�cӱ�z)f���\$d6ma���]g���kAp��M�g�~��!�c<P\"�X��Z��������hk4�d�K��	\0b���MHY4��T��/�M��J��u۔���)\n�I�?v�	�i��F�Q�m�\$�(�w7-�x �+�t]xlugA�F�/s��=d2�n=��<��?e��2��\\� ��V.ِ.��,}�?K����0O��������k2)E0ȹI���O�z_���6CB�/����.ܨ��*1�Խ�H����Z�Z8\0��;%�DLCW00\0��u��G..��D�>�(�P��֮�\\ܞ\n�-��,/rz��<]i������aR���E�S�=B��X�t[�fj��\0�(��%�c�2��#���℡{��D��wh�.��)���&C0b���Z�+<�FN_���a!�,!\r�m���]j��O��Bi`0:�3�MO(�\\�����hrF9�����,�59��u�I����n�h^R0(��=�������'5y�ڔ�������ұR��\n2�]���%Ek_\n���4!T98Y#��l�\\ʯ�Q�E4��\r-<��_�}�>�����騖I�T�!��Z�e=��NX?�-��T��\"���F0J�#�?���*�A�Ԋ���a�j�i,z,|/���`(?�v���g�~�bO�����8N�R&�գ���6�6�<_���}>��0JS�O�k	o��C;�Ԩ��,���O%U��!�h|BQ!�ӊ�Y���M\0v[��q��	x3�E���~�N඼7��KP/z�vR<��\rL�d�B!5��H��p/����-�<,�A�p��c��Ltń�u��[浀�61���CQ�`�6ϴ�,�kמ� ְ��E��g-���@^<�J�D@���>���ie�CA�&�DpN,���v�`�?0�����=���I{�T�e�o_m_K��Ž�H�'=@�\$��7p��a\$js��\r��Ãհ�Q�;�c�pn����K<ia�ܠ:�f4b%����!O�N5�_zc��g�f9�d�F�ePA�ta��k6���<aջI�����\nJ�eoKϥ�\0006�ٱj��C]�,e���I���Q�b�VI���; �@'�mE\\Gv�*`|�kYgO���J�10�y��<�O�~NB\\�K�w)M�����(ܨ�*j%i��el6\n��xlXlOLAl���WA �]i#�pP;&`[H�𭄃�\0�l1`����O�v�9%r�\\�KQ[\0�Xb^�LO��4�	8�7�AB��PF����������L���*!��R�1E��e�O�4ƅ�H�K�2�D9fS��:n��<��Π�>�%����7VTr�]��)-�C��J!�U���✋������%�0�cs��fV=GͰ��a�Ƒ:�%C�������)S5`[��;G����<y�km�_c\\�g�G,gcJ9�ab��^�\\Yj�~�݋v�0�楀L੗��fw(���i[����'c��;���5)ey�\nb�q���D��\"��1hsG��ih�8��*Y��-�\$��th��B��X*��Щ߬v�QY�*�~�������X8 ,��� �9bd�\\O�L.|)�1\0�L���P ������znG�qv�L^�\\\\C��~��~=YK���z|��!��z�����I���L������M�m��wv�{&��X�)ťr=i�r�&�P�^����f��W�O��5j�(N�f�E�P�©���/U�A�8:��Ư���WX\nep���x�\0�z835��)tfS�T�c2�Vx�X�^K�fF�}k@�(|��l��yZŴ��_G�=��_�˟�����\n�H�G\r{�h��()Hs��f2�e>�A�%��>�\r]��e��H Nk�*��\n����!N��/p��R�\$�FO�D���_9�|=��H�z��{2�f�P^��~���'6�=6̈��F5h�Dv`.�Ds�fQw��i�)��I)�k&V�\0��&^P��i\"�0SL]\\��(�<�^��z����a`�~,,���L�Y:�>%\$:%ku��B���j.ɂ�e��f���[!c�/�pk���Et�5䀖h�v?�]��kDZ�\\}vNu�P|u\r!�r�-��攣��q���kH�#P:D�m�@�Uve�0�8��i�oR�ES�rA)(��۳!9�Ht�E��]m��IU��~�T����~���k�bՙX\0����RI*�����B��{����Ě-8�}4�]���7����ޡ#�Ҿ��w��=��Sj�ܨN��s�\rmo����ߦ��NLo����K�S�����\0;��\"VdlX�`9�zڑ�縘=���}U��Ҕ�~�E�I�1��w���foj\$[c��ل};�tŮ@HX�e\"��!Ws++��X`=�\n���h��cۨ�����DGq�k�󗂺�)�Ŷx�Wb�����B+�tuVJ��ĂΉ��T{�p�0VG���˲o��	x��\"�+�D|�S��B��Б�/g�J�,�oQ�-A�~SK_��ǔ䘡�t�[Q/̍L�������I�wÌD�'�X��y��E��䆾^��sz\r��]��3�P~�ֲ��H�++�@��B�w���wƒ��T*`;��y��S��&K������se+����e�F:qO\r\\UDB!�\"~�h`2����,xm����G�Kb�e�ؠ%�)ixJ?��#���wI�����rm��Df�5�\0006���[���2鹅>P���Mwa��F��Q�8o��6���I �`�5��@'���q˞�A6�ꨵ��S|������W)�4SU`1��~�J\$�֫\r�����BlB�m�*�O��`��]�P6��h U�\0�@\"��	�FERǒ4L\0�5�r�GL8\n4�*��� ��N(@0�˳�hq��N�to����X�L	�Fmb��{�����Z-0�g�	�F���ѹ~��=�{	�� s�ʏ��q-�{�Y��7-��,�\0��z��6@t��R{�����F�o9���r�/�7/�7�\0�3�B��ڃ~�E)�bq-y fT(��\"u��Q�{�Z)CHS_�Jp*;Q\\���U��d��Y��u��6��xhw>Q�����x�����-Z��iCT����B�ʂ@�8�����S���\n�'I������T�J0�^�ӭ��:x�� h����j����B?������Oï�����7���g��.��9�-y��dU� [�?*��ޞPo����3�8�����;@����6�JL��o6������e�t+����.��P5���N��G��y�\rL���^@����֗�C����S֒�z֏��_�F\"6\rg����`-�ד={����%�O���߬V��Mh���Q1�3h���a�	��'��b�C��H|�\$��*�>���<��m�}'�FH\n��/L\0��8�UϹ���A��C�\"�����:w��4�.H\\�Ύ��޾s�GÖW�ʑ����P�C�0���ʋ����r�{��0����Ӷ�-����a�t�r�����6�u:�|[�t�`%<3+q��B��\"��	�S\0+��>!���`�LJ��o�_���	���T���J�o�xnl�)���~��\r�� N�u� ���ؘ8]��{�8-N�SS�߆?	�Q���Z�Yv�62���J0���_ƀ�o%������@!�pH����A�h��&I�˃\0!�Q�Zy�r�\n�\$�7��#@�l���hw��@����Ds%�k��i���4	�]\nk@���́<H΍Jy�˧��]ט���h\"���G�.@��݀#�5PnD��S��2��{�G�2{�*!���؀�\0��#�W �������9�ӆ���_��\0s	 \0t��A���?Q��������0��q�6�=�\0Nk��\08W��0�^�@��:5�\0�i�	6zO\n���*��ҔQO刊.��o�	r���K ���~cY����4��+�F5�!���C���i*c?�33�!C:��\\NE\0�");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("v0��F����==��FS	��_6MƳ���r:�E�CI��o:�C��Xc��\r�؄J(:=�E���a28�x�?�'�i�SANN���xs�NB��Vl0���S	��Ul�(D|҄��P��>�E�㩶yHch��-3Eb�� �b��pE�p�9.����~\n�?Kb�iw|�`��d.�x8EN��!��2��3���\r���Y���y6GFmY�8o7\n\r�0��\0�Dbc�!�Q7Шd8���~��N)�Eг`�Ns��`�S)�O���/�<�x�9�o�����3n��2�!r�:;�+�9�CȨ���\n<�`��b�\\�?�`�4\r#`�<�Be�B#�N ��\r.D`��j�4���p�ar��㢺�>�8�\$�c��1�c���c����{n7����A�N�RLi\r1���!�(�j´�+��62�X�8+����.\r����!x���h�'��6S�\0R����O�\n��1(W0���7q��:N�E:68n+��մ5_(�s�\r��/m�6P�@�EQ���9\n�V-���\"�.:�J��8we�q�|؇�X�]��Y X�e�zW�� �7��Z1��hQf��u�j�4Z{p\\AU�J<��k��@�ɍ��@�}&���L7U�wuYh��2��@�u� P�7�A�h����3Û��XEͅZ�]�l�@Mplv�)� ��HW���y>�Y�-�Y��/�������hC�[*��F�#~�!�`�\r#0P�C˝�f������\\���^�%B<�\\�f�ޱ�����&/�O��L\\jF��jZ�1�\\:ƴ>�N��XaF�A�������f�h{\"s\n�64������?�8�^p�\"띰�ȸ\\�e(�P�N��q[g��r�&�}Ph���W��*��r_s�P�h���\n���om������#���.�\0@�pdW �\$Һ�Q۽Tl0� ��HdH�)��ۏ��)P���H�g��U����B�e\r�t:��\0)\"�t�,�����[�(D�O\nR8!�Ƭ֚��lA�V��4�h��Sq<��@}���gK�]���]�=90��'����wA<����a�~��W��D|A���2�X�U2��yŊ��=�p)�\0P	�s��n�3�r�f\0�F���v��G��I@�%���+��_I`����\r.��N���KI�[�ʖSJ���aUf�Sz���M��%��\"Q|9��Bc�a�q\0�8�#�<a��:z1Uf��>�Z�l������e5#U@iUG��n�%Ұs���;gxL�pP�?B��Q�\\�b��龒Q�=7�:��ݡQ�\r:�t�:y(� �\n�d)���\n�X;����CaA�\r���P�GH�!���@�9\n\nAl~H���V\ns��ի�Ư�bBr���������3�\r�P�%�ф\r}b/�Α\$�5�P�C�\"w�B_��U�gAt��夅�^Q��U���j���Bvh졄4�)��+�)<�j^�<L��4U*���Bg�����*n�ʖ�-����	9O\$��طzyM�3�\\9���.o�����E(i������7	tߚ�-&�\nj!\r��y�y�D1g���]��yR�7\"������~����)TZ0E9M�YZtXe!�f�@�{Ȭyl	8�;���R{��8�Į�e�+UL�'�F�1���8PE5-	�_!�7��[2�J��;�HR��ǹ�8p痲݇@��0,ծpsK0\r�4��\$sJ���4�DZ��I��'\$cL�R��MpY&����i�z3G�zҚJ%��P�-��[�/x�T�{p��z�C�v���:�V'�\\��KJa��M�&���Ӿ\"�e�o^Q+h^��iT��1�OR�l�,5[ݘ\$��)��N�\n��[�b���|;���p�74�ܔ¢��I�C�\\��X��\n%�h�I��4�g�P:<���k�1Q�+\\��^咠�V��C���W��`83B-9F@�n�T>���ǉ-����&��`9q�������P�y6��\r.y�&���ả��E8�0����kA��V�T7�p��x�)ޡ~�M��΁�!�Et���P\\��ϗm~c�B�\\\n�m�v{���9`G[��~xsL�\\�I����Xwy\n��u����S�c���1?A�*���{�����Ϳ�|9޾/����E��4��/�W�[ȳ>��]�r����v�~B� PB`T�H>0�B��)�>�N!4\"���xW-�X)�0�BhA0�J2P@>�AA)�S��n��n�O�Q�����b�r���Ҧ�����h��@ȋ��(��\n�F��ϖ�ƙ�(�γ��P\0�N��o}��l�<�n������l�oq\0/Q\0of*ʑN��P�\r/�pA�Y\0p\\��~��b�Lh �!��	�P��d�.��y\no\0���ж�Ppt�P�ov�Ђkn��\0z+�l6������0���P�oF�N��F��Op��N`���\rog��0}P�\n��@���15\r�9\$M\r�\\�\ngg�����\$Q	\r��Dd���8\$��k�D�j֢Ԇ�&�������bѬ�갿��	�=\n0������Pؠ~ج6e���2%�x\"p�@X��~���?�цZelf\0�Z), ,^�`�\0�8&���٩��r�� ���kFJ��P>V��ԍp��8%2>�Bm���@�G(��s\$��d�̜v�\"�p�w��6��}(V�Kˠ�K�L ¾���W��q�\r���̤ʀQ�L%�P�dJ��H�NxK:\n��	 �%fn��%Ҍ�D�M� �[#�T\r��r�.�LL�&W/>h6@�E���LP�v�C��6O:Yh^mn6�n�j>7`z`N�\\�j\rg�\r�i2I\$\"@�[`�hM�3q3d��\0ֵ��ys\$`�D��\$\0�QOf1�&�\"~0��`��\"@ZG�)	Y:S��D.S%͈���3�� d��m�U5����<�S�SZ3�%r�����{�e3Cu6�o73�d�L\"�c7�LN��Y���k�>����.�p��2�Q�������3�VذWB�DtCq#C@�I�P�DT_D�:��Q<�UF�=�1�@\$��6�<c�r�f%��,|�27#w7�Tq��6s�l-1cP�m�q��\n@���5\0P!`\\\r@�\"C�-\0RR�tFH8�|N��-��d�g���\r��)F�*h�`���CK4�1�ʍkMKCRf@w4B�J��2\"䌴�\r1Q4�2,\"��'��x��y�R�%RēS�5K��IFz	#XP�>��f��-WX\r���pU��D�t&7@����?���� ���}O1�2��2�#UK*�)�긋�0o<>�]H���ƿr�LGN���W%��M^��9X:�ɥN�����s�E��@xy�(H�ƙMd�5<52B� �k!>\r^J`�I�S�N��4'ƚ*�*`�>��`|�0,�DJ�Fxb���4lTؕ�[��[�\\���Ԡ�\\{��6\\ޖ� ��(#mJԣ,�`�I��J�խ���l�� �j�j֟?֣kG�k�T9��]3ohuJ����W�\rk��)\0�3��@x�,�-�	5B����=��࣐#�gf��&���Z`�#�o��Xf��\r �Jh�����5rqnz���s�,6�o�tD�y���b��h��Ctn�9n���`�X�&�\r'tpL�7�Η�&���l�Z-��w�{r��@iUzM�{rxא�m�SB�\r@� H*BD.7�(��3XCV �<W�у�|d�q*@��@���+x��̼`��^�̘߬__��ND�X\0Q_D]}t�Y��p�f�w��\"�3�z�n«MY��ZR\0��Q�?�{�M3���*�1 ,�\"�g*U�*���̫zҌW5NV2O-|��ɍӁ�,�]�B�d�\r��/O�t��Á��0�xƆ���ЮOC�8�-0�\r���0���@]�X̊���\\\0�0N��у4�i�;��At�8X�x�\r����������݊��7�<�@Sl�'L��9W� �θ�Ϭ����ı��R����\r�Ϡ���|�X��a���7y���\rwe����Y!��E�������cRIdBOk�28[�m�J�+L ��ٸOXpf���9ѝDϛ��ߪw�@˓�Y�������\\y�Ac٣�Xg��%����1��j	�X�9Cc݇�R����QF�pd�=�C�����\n\r�Ց��dj�٫�xE��2FX��x_��ţ�5���}q���M%�ZM�:\n�zW�X7���:�Zi�npY;��>ʘ��Ɇ:6�;�Z�X0��̢#��c�MyU�i2,q�F˚�b�J @�gG�|4�g��mzW���	�)��r|�X`Sc�է�˙��c����!�B�����/}{4J�\0�Ýn�Kuz @�m�Ѯ�߭y͞�y�\"�)u�����Y睘s�c�y둶����y�����7�|��|��{Ϙ*)��4Y`ϵ[v������^NX�������W�����7�;�_��*x����\r�߼߉xm+�m����	����\$\n�l�);���|٠�ڙ�:�N��:���_�8N��U�5;�p+U�L��\\�9������O:I����zQ�����T��)�XG���J{w8���ŉ�U��\$������PxTY�pjh��J�À��J�{���@�ǂ����Z���s��h˘�X�\0ۖlӖ����θ����Y}�����^�@u2�S�#U��;È|�������P\\��#��|�<��\\����J۝�,����\\�̚E����]W�l��,���ɖ<�Ό�>Yn�),Ιr���Լ�⍺]��	�\$����q�DJ�=����X�I-�ŀ���a�ll�õ]\\�w(i�C�׃t��<i-u[uV�D֓�Q¸�xb�k�LI�.k��@����N��[�l<o=-]1`蔼�d���M�7�@�%C=]�����/|-�܏�����q�������*�C��O~�Q��s�`��(���D��ɲ��[���>�k�R�u��\\+>)3��P��P���6��M%���pԌ��A�3qmu2�fz�ۯ�4s�	��`ێ��-k�S%6\"IT5��~��\"���Ut_	Tuv�ֽ�Yw���0I7���L�\$��1M�?�e@3�q{,����\"&Vi����I�?��m����UWR��\"uiT��u�q��j\"�G�����(��-��By��5�c��?��w���T��`ei��Jtb�g�U�3����@��~�+���\0M�G�7`���\0�_�-��?\r�V��?�FO�6�`\no�ϚIn��*p���e���\"T{[Гp^��\nlh@l0[/���po�JK�X����<�=�9{Ǿ6�<eߏAx���ǂ���4x[͞L�~>!�OQx�{ZVFԎ`���~I�ߖ��L)�Q[�T��M����T�*BC�~	���\n��gÈŅp9zK���w��zO9di^�'�+���Dz4�gHA��Ly��\n�r�<I�jKQ�Sn�==\r.�o7½��%a;�k��mX��Zi%P�i�\r������/��L`pR0��&���I (��\\.�*m�*�(�֎��\$����\nw��Х�8a�\n&���Um� M֨P+\"Ly��?�M\n�2�	L\nbS �N���r�!w�jw`��\$��r���a�v�^�q�F��6���i*����_x��\n�f�I�:B&�6@�ɓKED����QD(V`.1\0Q\$��F��H��T���zІ��\r�jkzM����Y��(61��x�+�%dj��o\n¦�\rg��\"�Ɍ���?�1- 3h�X��)�yj�5r�N�#Q����w{_���G)���1i�� ��<�Z��pX���\$�?�=%.��Ү&��%\\�8w�!��a4�<JB[�ĺ�u4�%��47��%gѐ�&��Z(@	�E�{@��#��2�h@�#���џ���@\$�8\n\0U��j�A(ׁ�2�O��8ڀ�5����@��&'�\n�D�\$i#��#�t\n�P�Ts#]P*	�D�uc���P�O|pc���P	ގ�i#�}��:<��\0\0����ťlo#}�F�R�Tp@��'�	`Q�ycTp(Ɗ@�eh\0��Ձ8\nrx� c�<`N���:)DY\n*D��2{dZ)A��4�����cZL�2��<��\\�\$r#����7�����!�����N�{O�@\$�<	Ѣ��V�Z�ƞ52.�A�#D0��\0��I���\"P'�H	�_)�x@��*��AOh�hI)I�L1����%�JI�B���g�i\"p��K2}���(C���=�t�xC��&F�	r���o��@@'��%	 �H�T�Ꮘ	�Ԙ:=�)\0.�]��5 .���(p��L!�8�\0��	�R\0L�Ya�bk԰�6�)Y��� �Ԯ�	h�zZ����Ig�VO3o��Lg�3�Y2�ۉ�DoP�`3̸ec-�r7�2ԗD����B��Z���%�/I{M�\0p��́.`���o*�ԯ%�T��\0�&�iR\n�+�o���\r�^2q���\0\\�I@�	�K�#peC*!>�/�%|ȅ̒�ގ��\$�)���1P30(\r�+\nZ�z��))\0*�\0k����2��υ(�E86�s�t�f&������+;��76&�K�_�(�9f�,@-��4l\$ۂe7\0��:l�L��M7�.\0��|��o�J۩��Z�u�̺�'�y{�H,#\0vU@9!��	�'��&��G���@_-ٿ��t�;���:����u�<��L�i�Κ_ꀝأ@U6���#�_�L'~��/�m`\\T�']=I��t�Ǟ���)��q�s�9�a<RPº|�t��t&5��s�l�@�	�K�wS���l�:9�N�wS��|�g���O��AП<�BȀ\0�/�z@�	������=?=i�O��kӟ=\0E@i��\$BנhO\0�>D�P��U��цj�H��9F�BcCi��BwM��t�x�P��M�?p��=���8�����lg~���t�a��%]b\$��\r�r���a,6�t��W)�\0U��F�	|�쓢�vh�Q�*��O�l.C\$�\\��ցRR�<lc��&Cj3��%�ZM���z9GpY�⹣�\0i\$D��d��zt[')[)Q����k�pi0�#cþ��NE��(�C2L	�@9�h�EJ5�,�h{&Jz�0n�v��>[��j���[�]�K��R�J�>.;���F=Rڌ�<r��M�=�Ԓ��h�^Y\\Rmn��� Nn*g�����B��5^Q҉@O��x��HI�T���9�)(��&��}A)P�\\/��_�!́H��ڑ���\0�B��\$z4�TYu�J�v\0ꏃ���%@�32\0S�m�--�Gi@��Q�%�j�Y�+FuzlS����W3�ŷOr�U\$E��;�M��\\�Ա�u/��jeQ����,#J��XP�<UH�TVV�#U��Ub�OU�DZ�⢵��8��UJuS�����g)XDZK���B�\n�@2���x@d&�� ��eܫI�@�Fw�8��\$�'I�V�V�U\$�ET�_�*�d�/�FC�Ydp��vG��3���њ�L^(�`�j��2S���c�W��JQYi�HB���ck�R�\n��U\$j�\n�ZAi�U*wKDRxW�L�򭈀+f���@�A4��Gz�R\n�5�b�\\_�� ���0�C@�\$X\0+�]����\"?�n��+QIj\n�x\r��B`S��M�����\r�o�@��6X�\"{�\0��b��)��M��cM�W �D_�α�v@{c�:��%[%��C��1��;Aƈ��Tn� \0� a�p��e~�U5 s�V��e|M9��9 h�@�\0��~�@.�	�l����\$?�id�{fB��F0VZn@��St�N�\0oP���chG�X^V}۴���Z,�EĀ�k�\rh�GDYd\\z�m\$Uf�D������ ɀ�ӂ�\r���^CR�V�*�Ǣ7�X�&����m7e�Y�\\�V�4ͮ辝\0>�ZfSف�fWJ�	��V�\$E�ukKP[\r�\n����_q}L��������}�eM���m�u4�V�݇RZ܈\r���	k\r]a�)`��X�Bv0�2�ۑ^;t����=\"�k�aYB�8J�_��k)f;�F����U���`�GWN��w,\rq�)\n(	��e���R53\\N�W��®E�ؚ����S5��B�;���W4�J	%]5���A���pm�	�܂߁�\$��.-K��!sC�Et�+D�;��7 ����ON˲��cjO�PKFO\0��(��|����k *YD5���;s@6�@�QU�\"���\rb�?XJ�v�n�AH��oPS\$T�pbj1+���f3&�@ʀQw�8@�����;\\�㬈��ĉN���xb#Y���`:���kB�8N�o�S�(#Uݩ�(��Y;�:�eĹ����k�n��� e�X��Z��Mi&�\r��^����d\"�W�\r~[aV' (#Y\0�}`�W�.u|4V�*W޲l:���mn�\\����\re�/�ikm�֚��UE�0#j[p�D��/�^�h�f�W����ςL\r_��ᬹ-��TX�[*��q�n\n2�*ǖJ������\"Y�vQ�T��2I�߷=�D��G�����KXK\"����E)\nYm�4!}K�_�� D@�wm�(\$@���\$A��j�+��\\�4Z�İv�d�Sm�X�!ho!F0l�U�z�8Xn#\\�͈_�\"˘`���HB��]�3����\"z0)7��\\�����w�.�fy޻�(����� p�0��\0��X�S6+	*\\Q��\r\"���<b���\$t�Dq�\"��	?��i��o��],�!�{�g�|�g�\$(��<v���x��𡎘�%G�H�����E�\r��X��f=�X�)��QK�Xq��:N_��5�.�(��k���gBZ768C�cr������,<��#y!��\rѧ�e�WtE�Zb\0Q�%�b�T�ǭ���rp��\"�(��A%�`xba}P�0vL1&>0�d�D c<6P�3����f�����VD~��� ��9b\\I�,~��\rxs\0����aK�8CE����+�Tl#���׸�����V\0���|>�\$h�G8XI��@\nT������\$�9��,�Bt/���u@s�8�B�7���sy���ՙ������,�]��Dy��5�n�e����μ��9)�j�^��\n78Y�<�U<i��w���H\\���C��4�cA�]�X��8)\0lpS��CgCM`Q��)��l�(�.'���=a�Ix�s�;������TB�{��x��p��p�U��l���T��2���>e���fu99����\"^�֍75��ui��'�@h]L9��^��ס��:�D9�̊0�db�칗6��Ͷn������7���s\0_����2z�����ٝ72N�Q����/�3��A:��tH��=��D�=���y?��i8SȢ�]�פ��gCI�h~P�t��F�^u���5�4�����;F�u\"���+�y�?�������\0�ֈ:�ʘu\r<<��w:*:j��:�-Ѓ8I��\\u%�J*wS��Ծc�3;y��K�6�H������K��mu���iL���T���%�N:NΑ�y�\rbf�uY��=�u�E3��4ڭWN��>m�In���x&Є�'��\0s�o��k_Rz�^�{u}����7zB�F��-di�YY��e� 9kCH��n�'����ז�5��{�_:?�6�5��\r�g/`ZLӖt�ѱ -����q��飐�|\"�G\rm�d<z{)�B-\n�IN\\�\0�A�sx\0�����Tm}����:h�c�N�8���`���/����O\0\$0K=��F\$y\n\0�� -�Pv�Cx�Z�KI�ِO6�c���g;;�Fś����4@J_�@���\0������^yP��@O�0�v�9�Jn �Y.�C]�����p�����s��~�A���X�Bx�l�-��oq���Tw`hm�vıg��w\r���n�t[��0E��3�x۫\n��7���<��n0����x�miD��	�Ŵ\0��|�粎����)-�}�H��#���C�Gu0Ӯ�6�}���k�R���6�\\��z{����wE�\0007�H��xq����;�����;�m��?r\"����x,�'˃{�?w�����;q�#ܟ	���Q<�su\\��xg�pSr�/58u���'�\\���N�� \\G���8���&q��D�*����oc�<5�\r�.�Κ�i�qצ������\r�g�l��^\0��A�-	T�@�6]����\\\n������(CѢo�s�q�A��{�|���9�s�h\rS�i���6�%�\"g1��A��z�E�����9��|	�+� �B�2y�Q��C��M\$%sL9���'�� 6�d�m\0�H�	�!�?(\0� >sX\$��x�e�^n����PI��� *\0����G6J�Q�/��hV[��l\n(E����sq��r	%\0�ȕ�tf�w��)�qd�Y8H�)��<���{a)��E�@�@��Ṡ ���zW�P!�g��\0�u�x;Ȝ�	��@8��)�|��ĄJ�.���Һ��<N��NJ]>��s{���\n��[Cվ�\\��⸢��~`<��g�\0zΖ�2t��s\ro\\����\n�m��L��n�u�-Il�\0vy��>	L�w1��;�ne��l��5`럋2�@:L��d�\0\$��ÖU�>]l\\�)\$C\nQ������L��B���}�{1׾	;t#?� {L%1O�/��vSMe����Cכ\n˯L<�#���@b?t�M�2t�*�^(��,�;�́7�ؙ�[y��?����x�����+�3�A��u�c���g}�3��D-\$�t�����\\��g\n��\$�\n�*�:(��Q�Xd��~��02x%�������G=�-���:;C�p��o�S}IT�QO�|#�p�rZ\0�ڐ�����du7H/6���M0�=G@*#'ˑ��GG������M�ؒ��:\$4����ľG0��<�ܙ��&A(Ţb�ͶG\"y���@ǅ\\+縈>X��@�����ĺ��������	�c��3� <��+ d(��?�!+¼W�Q�Ozk�A�ݏ��3�Q��\n�!e'9=��痌Y�Kө��K�\"�Ԧ�E�vq�/o^�	���8DE�G��;8��\"�o7�P�d�E݉�\rܼ8�{ED���}	(.�ܚ����\004�\\�=�2��?H�v��~(ex�=~#�>S�l���Ay� �S�|�������2����F������A}��l,�C�l����5b�}���l����t����UfW�6�Ag�W��%:�g�%b*�ߥĿ�̦y8.��fI-�n�e� �z��}fQ�};�%���}e�0�x�BR��:>���`���e��[z}{����>��Ϸ}g�_p���	U��iU��ZʶV؝���D��<;Cb;�ŕ��E�|��O-~3���w�K�����\0tg�!���~c�sV}�²p��+�M���?W�Nc\r�����mL,�l{�e(��r�`�a�!�'�����}(�Y1U�?to�F���!�Ո�h|��T\$B�o����p�XhX�����\\~가iǀ�,�d�������XJ�:pmЁ�A���m��!(�h����@:\0�u0\"�6,�u0K�69p>����\"�\0(>�ey1���xY����\0xBnĀ��#À<�?\0#/���a�;u ۂ�\0\$@2�`O 2@`�;�@Y >�7@����@B*��\0�3��ѿNX+���?6�H��:,�����?��\n�*����#�Ԙ�!�=�f[�;��á���|L]��������q����[�႖N\r�%k �P0�'<6�(DAO���B��n��t/Z�r뻏!1^ϡ������I�/u��C !k�֚K�`���\n���\\�+��<��I��O�^gD��#�c���\0����Z�	��pX�8�*p3>��\nN�A�, ;���cء�b��\">%P!IKT�JķH�[��Ć��&����pR<���f�\\��� ���Kۍ��̐���(V��;\0ڂy�쵄����!��)0��x��(�Pz@j��o����\".� @=98!�A�`\ra�b���69�\0E���\nk�%�BH��!P����`���\n�����߀��*d&o��T3�����%S�h�\0����B�) 6B�`R�!������623�p�\0�ۏ�6B6�9|@�.�p@>(V�@�\0��*a/�ܲT#&�(��[�+��0h����,�O\0��χ��r\rc��9\0��C�ϙ����b�\0Ț9e/�.���C9���hC.�1��D �C:p����8\"O���Y0=����ؕO����5�]���\$/��2�C/Χ�\r����7��Cf�.`9;+�����&ǃ�\n��A���L�\0002��K�oK?p�\nCн����1�t(����=��6�ҿ�c�� ���a���\0l��V�Hj������nV����k΃\n暢>���p��Y<;l���T:1�bމ��ĖO\0�}�n�\\\n@Bn�>�\$#��	��\n�!�̈́&A8BU&kg�)�P\rdE@��X��O�;�˧�z�b�HBp�>��L�B*���D��q>��tD`6\0�,Iq\$DP��J !�X�DE��b����=�K���r���D��\\C��ě|��DR�\\J����8n1/Dk�LO����\$(��\n��\\H�:�a�'D�JQ7��E�9��I;=k\\F���F�D�����Sn�E<�b�E8%P�EN��L�j�� E\0006;ļ0V�6�%HU�\n�Z/�X�� �\0�Y*�᳻|V�̼���1d�J�sO[&�2Z1	�*� \n�=���u1mA�#�h������)�Q�_s�H���*]�/��O��۠���=�_>b=!C�2��3��p�k�c^����L\0�\0��Ȇ8�*x��6\"@�� �E��oܑf;��f��.\"�;6�ʎY�X3�Ř�����n;�븑������q3,��X8^�� ׃��\\.���\0�C�(����O+�%P#Π\n?��	A=�eÑAO\\]΂�ۥ��=ԁ!c)�J����>���B#D�4do��H�A�\0�:�n�Ɵx`  �뗡�5P�� �4��\0>\0F%X���!;\\f�4�2��'��;dMs�cY@�������3�@8w\$��? \n`Ï�BN@ ��>�u@(��\n�4��P)\0#�?�	�o�(\n`)��p[��#�\nCQ�\$���u@ �:\0'\0��8��Gn<�4�5�f�[�3h��c�(H�,��8����}!���lrM7�(��r�\\��|J\r���FI��v����������n�?\0�(���`'�:�4pa���=��Tq���!�x�͌��^��F֬�aT9B�\rz�X)������^�z|���T���G�<�s2��bu�*�_!L͒��!\\p�����'�H*D!-H��K���'�,�V�G���e��H�#�jcp6���@<����\r��\0�x\r�5���M�6Z�dp�7��#<�25��t�9\0�#�i#|#�\r��(��\$:?���\$`@��*�h���>@\0�hW�	1\$J�rJ�+\$�1�G�\$�k�EB�S4�Dt\0[Ĕ�Q�\$��rX�\\0��5%l��I�c	�2W�S%�rZ1[%I��\rd�'����bB�GIDQ��Hɥ\$�R�����\0l��%� ­���.����3��e��Ԝ�qIa%�2t�R�] �I�'L+R{ɍ'd�tI\$	����4���X�J+Kx�D�<�	&�P����,�Rl\0Na`Ga<��%�Ӂ���_�P�č�%�\0005��(BF\"��'���Ic9��B�DA�<�b\"�\"\n�)ݲQ	�B����&;���,�D������%C&\0k��J��|���*T�-�J1Ҫ8X\n�2a\n�	ZB��=����+H6����(�P��\0�k�`��\$H�J��Ҵ�N;� 8\0Z�+�C���x%t��ʳ*�|�s��\\� �K�L��iʡ*`Y��#DTt����:�,��KD�UD�\$�㜦���O,t���J�\\|*\0�1�,����\n>����xB1�p�R�KF�`�!�.,���ì�,��\$K�#ԫr�˝(Ժ\"�K�圩�˟*	�(�\$�!�Y�1���Y�1�}%��/.�R�K�(��R���６28��+I3\$��[.x!�E��%�D\"_K[.ܳ!_ʸ�D��,�.�t��K�.�����H��I\n2\r��\"���(@���6\"��.e�\0#Ї ��%��Z~\n�no�LJ�|���c',����1K�y�Y1��s�(�&y�f#�Ƴ-%i-�ʣ--|�L�<�����0��R�8Y,��L���R��0���(�0l��@�����*�d����2�(�̥*�g�6����Q��2����\0�,��/M�q�HA�3\$�7L��`\"M��\"��΀6L�3;|�����+\"���4���>7�,\0\$�K	4,γ/�Q,k����b�n@�J�0�OR���:�B\0�L!)�)�4aOH#E.\\ղ�M`l�H��5�I\0:Mq4��sGL��sa�X\"���U�R&�W���q.\$��g@�6@#�eK�����iMD�d؁#�K���@��5��sO��+����7P�S͒��\0Ƽ=87�TM-5T�P2�a6���M�D�����+��B�t\\�M\r2��D�H�dԂ�|�#Ԍ͚��2�7I>��CL�@S�F����3\0�#P:4IK��I#��J�7�C/M-4�e?N�a�3���	J?�]Jj��sD���r�-�\"��LL��Ο9��C�Φ#Э,�	)/��Ӟ�:�(�\n�!�퓱N܏���\0�'�Y�Mʷ;��2�N�;��r�K��.�N�3��s�8Y;��s¹g<<�2��,��\0��#<�2gO\$��ҧ�3-����N�<��f�,K<\\߳Ƃ 㘭 �,Jk�\n���Γ+��RNL�=D�S��7)���Oy=���KOG>S��w=d��K#�?��O�>�\$��<��0O�\$��ӤO>�p�N�#St��J��S�O5?+�b�����S�O���,s��Ǉ\rOjS����I#;�� �O�+|γ�b�1!;ɡ@�4O�@4���O�=\$��O%0L���-ُNI8�9����\nL쌭�NM:\\�2@N�9l��lϿ(� ���=Ɠ�����!;Ċ�O�<�3��P�R��M�Bcd����V2L����4pknP�++�����>�\n@����Lq�\0�\0,Q��\\\n`[�\"��*D��ж>������zBT��0�:\0�\ne \$��rM4=�l\n�N)��Cp�480��\0#��J=@&��3\0*��C6 \"�����`#��>�	�(Q\n���8�1Ct3EC�\n`(�z?b7�\0��[��QN>���'\0�x	c鎨�\n�2�Cp�@&\0���8�\0�\n䴏��O\0/����A\0#��@c�P�D �TR\n>���d�B�DTL��������Dt5P��j�p�GAoQoG8,-r����K#�)9��E5�TQ�G�4Ao\0�>�tM�D8yRG@'P�C�	�<P�C�\"�K\0��`��~\0�e)8P��vI(Q�Gb6)\0�H\r48�@�M)9\0�F�tQ�!H��{R� �URp���O\0�I�t8������G]D4F�D�#�Q+D�'�M����>RgI���Q�J���U�)Em���TZ�E�'��#cE����qFza��>�)T�Q3H�#TL�qIjM����&C�Rh�@\nT���K\0000�6\0��I�π�FE@'љFp�hS5F�\"�nѮ�M%aoS E)� ��B�\"�eћD�3�h�AF�4tl��J��\$�C�wH��I<x�\$�J5���`*�\$��`�1ᅼ��\rtۃ\n?8�48��I%'瀪jCA�S���<#QD�'6\0�DȔ����-��S	\0%=��\0�E�\"RӽO]:ԑ�oGe!iӂ��\ntxS�N�\"���yNx4�Q�P� *��E;��ӱL}75�#P,wt߅�?�A4����N@\$�*�\r�s���B�B?0���\0���5Q��3ao#�z:`>TKP��t5��Q��CRQJ{���\0���4�܏�p��oS�R]\$��ǑD�[���J' '�V��	u\$�\rR�A@)ӷR�3c��-��?܁#���?�0��S���F�4�Q�G59Q`�G�3Q�S\$x�RS�aoTE�B�͏��������?+h���SHU��Q]M�	K�\n4��CmS��\0�N;��P��O�!�\"RT���9��S�F���U5-U�T�H(�ԇTV��\0�J5U�N��T8��ZR���@,R�����&T@��Ǒ �u�K�6>���&�����tQsPe\$��U�O;��%\0�V`	`\$Ԣ�@1�о?����\$\n�J�.9�Wm����Wpu'��W�?N��R�^��P�Us�C�ST�R�6�T�NGOS�'5%V?%P�n�JuPc��R�`�\\V<��Ct�P� dxT?�X�<U�Ru e.���.�w�*R�v�)Q7N������U��M&Մ�OX[�ٹ�T���֐\n�����_Q2L�����9��G��h@���%Q��\$�Zuj��T�XeMuLT[X�k�=V+R�m����V=j��TOT�m56��Q}l��S�K�k�鏻Zn�Xէ[�d+֨��\n�W\n\n���6U\\ET�qչ\\xt���F\n3tOW)KUE�UU�P�q��V��dՊ�P\rs��\0�C]t��?I�v5��fKMW���>�N@'#b=o��P�F(��8��Y-u����V-UԹ�]�CI8��\\�\n�rW���(TR?-P�\$ Z3u些B�`>\0�E]T�#L��	���L�)�מ��:@#�G�)4�R��;��VmD%8�)Ǖ^�Q��#�h	�H��@	���N�y4�#c ����XR��'�7`�\\��\nE��Q�`�m�]W�N�d��V'Z\r�5�GX�EjuTE9\0�T��-UB��O�P��Q��65���_x�z#�?-�6T�E-4�\0�8\n� �X	�#��D�	oRALm\r5eG�N	�V��64p\$�a�9N��SaU?A�U�\n�\"����<���9c��ufQ_�_�0щ\0;�C�TIN�2 ,S���V=ػd=A�+رJe���ӽQ��5�V����\0�E펖>Y1H��@��D�YRYH�~O��c�GTK��>�\"�Ѿ�\r/U��܍�&�x��?\n�/׶>��twѠ�����\0�e�q�\$�E���\$�?%��-ىPe��gY}_-��g׹E�1�Y�e@0�	�{F�\r�!�PMK�v�7Q-���Q�?(���g�\r��\$�Y=Q����<�h\0�\0=#���f-Z��֣a�^��>�Aֳ_-;T�����HW�Z�@(�X'h�D�؀�f*JUH!I�L�'ǃfh	4��[�R�<�?� /��KE�v��>�����)i����TX6���i�B�!әg�\0 �G �Q6��4>�x\0!ڡB��C��>ݪ�Qڙj�8�ՑT��v(�~>����HCe�֜�7j�3���`P��H23����x� U�k�\n�:OiU�UA��-xn����=?C�RMS����Q�bx��\0�@��R�\0=�`)ZzKP����]lͳv���m��MׇD\r4�QsS�41QsQĂnY�h�d�	�A`��	�gE�\n��X'k��u-S�O�������w�」 �S6ۙD�NNl��Wݙ�%��l�A\0+�*KM���Cl�x &\0�Q�4֡Uml�!�o���`\$��\"3v��|��3���;iՕ��џm+�h�L�%�6%�Mu3��Q�F�4I&T�H�ժ��\\�����FC�TQW�L�JC�Q�ezB��[`���#ime!h�ӕ^�sC���%!��Y���+��ӋJ�NtM�kXJ>��a e����� e|2�/q��SWr%�\$�X(��-�Wp'uE�7��r�E�V�%�v�[�?�CV�Ve�5��IMDO�Qq2Lv�R��23`,Rp��t�T>�-�\0�^�Դ\\8��Z�s`��\0��<tK\\�j�h4W\0���4�\\����׊��J�Z3MU�v^��Vee��Yp>�rR�R�x�u[�U�X�׹D�KT�RA^}�u��S�uX�^�xV�TAVu>U\0�h<yT\\]|͹5���v5�vG#�_53�>Yb�#�[5b�D�hQ�>�F�ۯ:NK<��4�%�\0�R?I����!����� :K �<].��]��P���.ʃ�\r�8!oFjwPc�}��.�T���;�`n���{�Pi�^��\$>+\0O%�'�����\\õ3���6W���y��������L�H��7#`@�bK�7���y�\r����=�0��wyhB\0��V����oT�gs�W��\0ڬH*R�:z��.�^�E��7�:Uz+����0��Yuf=�UbX�*\r�\"\0���4��D劷���\n�]_E��\$?EL��һk�ôy�&(	��Z{{m�@&��sJ�֓Kpw�!|e����N}����)|����/Z�9�Ӻ-��V�|�u���4�E���1�NAo_RE�w�ӝ}=4=\$�I�>�XGT9��7�I4�=��.�@�\r˱�_����ߒ%�a���\n�\r#<M�w�J�����0�%�(�;7�Z�+FH���٬�Lc�;�#��j%\0�MT�I,���c���õF����oD����o�z�;=��hE�Y�O	(1M�WwR��8�~����V��Io�(���r���d�	\0�\r��\"?�#bᮃ��\"�,�AE��]qw!�w��R��E�\r]���N�l 1���pe08��;��z����)�H��:AP������f��5���%S�L��ہP��à�m�j�[����@gA��:�h\$���Ӣwu:-w�ҌFl�q�2��gM�SW��hP��w�a\r.���˾a��'����F9k�ӥ��:���A��G���p�F�3^2�@]]�P`N\r	T�%�Հ�O�	�5���E�����	�b�׉\"V�<Q��:����Dj��N�1&x��(�����k�ۆk�19��2��A��υ�ǡ�a&25a\rx�	J�.ZX{�+�dX7��^�\$a~����U�x��D�ʸr	U��&����nN��^X�\0�Xg�W�����U�����-�م�+��C�.�Ta�]�1�߯��4LE���N�ج!﮼@0ۘ�+�7�ˮ��hY6(�w\0���&�n7�ا���)Ze���	\08�������b�%ؗ7.\0 /��\0�`����4�N�>74��b/�π��\n��\\5��A����Z*�&��0,-a�	7���O��*����x����E��׾�\r�J̷;�\"�J��߅\0�6c,�@J`/��LL��q�|S�g�~�\nPC�wã��G�>�>\0�L;�8݈R��n���p�P�^������7�x����߸o�b�3R0a��B���ǁ��r�٩�Ft�#�`π�c�`v �=9�'������߯y#��3��[���qy�>�5��{[j�����a)��V@��&@����ܳ�m��\n�59��	'Ѩ�8\0E���a��AAɐ5�Y_~^A��&	�!����`JOX)��h���\rB�I��yY(�,ad�<�ۄ��!�B�X�\0�ٴk�=M�yc�\09���\n?B.^Ct	`��D:d	c8:�r�w������d���L�u+�<Qx���O���73�dܥYёr�}�d��@�0l�`V��:�xP\r��J�z\$ܷ�aqyl�9G����I^b\n(6K]ݓ>SN�o�S�N&�ynS�<�:�%�;�6TyI�Q�.S�d��V>��#��?J]��,�Le+��Sґaq��X9Pe��%ybea�UUe��NW9W�W�W9C^��c����z�#�m@�z�M�n^��鮅^��.\\��FF��E�2����r�Q�\\ф�l�,���\0\n9A�V��rNa``��t@��{�����?����=8I�5���0�y��p�ToX����b��*m�ы�6dB\r��b�=\0�:���.e9�X�b�w�_��w�@�\0kq�w�ј|By�vp�C�s����S�%9�M�l2�������w~!�s&kY�0\$/�fk�E��tgC�١�M� ��?���4O^��!�&�刎g����/�f1�=��V aE:#�y�N`�)`��Np��\\.\"B�A�����qx��V����:a�8y�f���s����y�7���gy�gS�&gY�5;�@���c�3�t���n]t��o/7��og���8`3�\08��m\0�\"\0�氉[�X��?��q��F�S�v��B�\n�Z���!A�������o��������C��-y�:�N�O^xz����~��.�19���k��D�8!C�N�nf�����hg\r\r�(i�pe�߅<+#��-�ZdJ�j�h6�gA�XF��h4dL���hN�Z�9�nx�C��P�YhE�~s�`�>F�k�\n��^��}D)Zk���,�`�ާz�1Kc��dluf>�	�-ώ����q��#a��囘h�P�`���P�ha�P`�8]�\nւ`���3��a���`8�'���|0��c���1\08�\0\"Z�X��d�hV/hY�UhM����g9�N�a�Y��s`7g?��!���6s���nޓ.�?��VҢ���Nd�J��f������s��pԤ\"K�.��D�{�^�1�JB#��c��i�V�x�`<S�d÷�f������9�49/�hy��n?��\\<�F�c����:Fpo�4��ތ^+��Ƽ	T&:jh��fd��i��+2n���ޮ����v���h�(�]�j\0�&Zm��N�؀ J�E\0Z�S�@������%Ã�>ސӿ]�֐z�9z��z����::�)0�P���օc|hV���`�h?���d���r��2}�,O=	���yλ�0����I`�	=�X7:������_ɪ��z�G��8	���d���N��jѠ��\$�Bo�)�2��mn�y�K��[Z�{�����Y�0Ãu�\r/n\0�NO��i���F���R�N��:\r��q���>��ɫ0@����N�*t�K����B�[��n��T����Np�hz	�J��tdN�DY>��Ȕ��F���8��η��8vָxk������9담]z��>�֩0ѓ��d#��W,3�:�/7��FR�f�{�Z=���O�|h��c��֜3�x����F��^���r]t�Hi.�u�@��A�\0h@ع�����ߧ�smN����y��V�F2�5�?~���ԆѰfs�`�[�Ri���c��+�1�f�@��\n ���L^36X�t9�=:��(�� ;蟨��S�F�@`;�x,>y4_�&����ן��eу�,��CFL0\r��������K�Q3��l9���Ϛ����@~�����2��ԥ�+g�V�N^\"+ b_Fd�H�����w�~�\rb���\"0@�s��18��޲�p�H#:K����X�~�Π�����������y�^\$d!5wt���!':�x������mT +��O��5~���>�P@õV�PA��׹��Ӳ&\";Xh�~t��!)5aD��3�8'I׶^�خⷶ>�ؚ���l;A���������~�;j�[>�mӶ�P�uf�.�A)�=��#��m߶fz�I���Smɶc�A+���D�`/��dd��<T����n�>�/����ٛm�9�W��i����,�I\0����-F�`�i6�;��`��{�[��S�����6�Rj���ەC����#m�=9gW���:gh�&�Ȇ���V��I��x�[�h�I�I����ZNm��������tW�[�+�@k��*�/����AEw�L_8m{).��-v\r:L����෉`-@�Y�m����{�h퟼j�Lh|:��Y��#@^˺<����Ks���8���F����@XD �j7��x��:LN����9O�Ol�ZNsD������F�d��;����ZP�@^���g47Ɠ�`8 6�#.E���ߠ��i��S�.7��ȸ��e�[�zL4s�0`�~�w���f��>�[����؁;�㝆�[{Y#����w��[�I�����o�	f�Y�o��4�;��Ǜ��oˍ6��T����@�B�~�;U� �.���h�r�3�N��������6�P�ɞǄ�V0�ok1�E�S��O���ȕ�`7�l�҅�IO٫��7���t����Qc�9���f-�\0-��\0�����/�.���^R�f�����<-n�,95J�cM�����v</h���\rZK\0�p\"FЈR��F����;�|nv<\rp���@�Ed�	��b������hc�X+�в���j����7���Gy/����ۇh���X��.nXt���.s�^��D]r��~1LC�@+@�d��\"i!Oj��tH\"/�Y����_欸t\n�~񃟾q�>�ݦ�[�!�������oN�Ʀ�\0q�V�5�,��O���� \\^�b+b�*�	{��c��7roN!��q�wɹǑO�;,P���:b#3+\r�S\$�����p�oK ���~Ҝ��њx��!_�q-�����W`���m��x��9��&�����[e��>dI*�����8���NHz������3�µ��(�Ш-\n�S/Zk�1(k5�!��*C!�(Hn�TD� ���z-d�І�(A�����B��k�@�5� \0.�&!�cY�L�\"\0g�)r,���\"�5��O*�'���|�r��O)���*-����)�H��.2��\"���r�c�ht��ڸm�:`�#[�M���0@1�H�#�dژ�AC<m�\n�̏2s�s*�h�1�\0�Ƒ�\n1T�/6�=��K'6F~�>x	���J�GG7�,�}/�|���8�Ѳ���G9�Ʉ?9�p:	-o:3�L��:�ɉ�;��Sbjxa|��Y+6�|�vl���Ox��<\\���w?=S]b/;��M���#���\rώ3�����Kt<��x��@R\\�M)�=��d�7>3H�k�L�t:\$}	08��/4\r����g�+	�3g��sT�5�5�^�xi0�b\r|���ʟb�|٣p�P \0�ꐓ���9,�#���9�h�I	��f��ʣ6`����.\$�z�KW%�J?�c�R�MK>�8AEL��n:a�:���P��^_ =�*�a�2G��B�&�Nr�2�_L��nu!Tԏ�D�V���iqd��9V]`\r�n���PM�ot�jx�� �)`\rv	P�`���#t���N��-ԕ�5�ְ����	�Yc債�X�P����DxT���alx��V�t�x�\0X����磵V�H\0ؤ���#����k�X�Q�F5|�U OW-�ST�W4~ڵ^�W6�u�X=94�@	�͉�(]o֝K���iWW=P��Z�o}q�yITvxu�U�]]jXKT\rH�\\�QE�^@,��5Xu�G�guՙhP	}GZGhm��gWh��w�nu�`(Z[�WU_�Gh�b��GدS�R��[wX5�Z/؅a����W_��u�U%P��UcQ����T�[w[6(�\r؇[���U[w\\]�RGf/b�\\�[p��tU[ue��SsDc�]�T�Tg�?�J-�u��m�@Չ�Mb��\$-p�4�E�j=R��U�b=^u}�U��V\rVSt]v<�V���ۋh�e��\n�d�W�i֕V�'�iُ[}<���X��u�U�\n]���]�]���h�]=��_U�B��w%]�X^���_j�cQ��Օ�7�b>�M�e��k���iP�m�[�\0��_����Y=�v���sȕ'�Gr]f=Ku#h_Q��; ���ͣ��x�>[�J�q5QٱK�J�#�e�D�S���v����f��V�Ndx4�vU\\�p}�TMj4vt�v�C�|��V��A����a���q��~�/�����?ſz�{Tuc�Ao\0���\"�駌4X�3یMD�WYX�M��;��c�Oׅ`M���H%e��7c:�u��	~B�;�O0��U����YE͕�@6��U�Wߏ��y��m�ς�:�=��͘2:��3�yl�G,0-�]�h�n�~��*Ӣ<���>�r�諢�A<�>_��>i��\n)�킓�.~�����;3���S�_�D��B�f�|�W\n�.�`w�\0#�#>u~��C	�[��3;�o �F��f��!�Hx���G!+@���X� A���T;B�����B��Ei���@�ٚ�� ���~\0���J�����ǁ�C#������	�o�I�)ya��J�j2����<�:}���Fo�q��jx����N����L�@D�xǡ5�9�v�TR	�C9ĩ�7��_��A��P��_�X|��6#>^q����O���O\no�T&�d�ڤ��R�.L�Ug�����w��PV#��9*����T\$̺{�f]ȋ����p�gD�.�<k��ca����zk��3���16pY�v�_�3ז�|��=��8���C��Fv�S���<3�i���������y|^�bzW�LNc]u���&8��c��|d9�z���9N~oı�䮃:�=N~6��=�d�	<���>M-A~ 3����]�F�.�{��QP��-@Nl{�?�Q�QA�A;���_�{R:]�6<�cǏo���^-��B���9ϰ9Fj�c���A����a�N0s5{w�_���@��~䙈g�︹�{�`����{��\0X�:/伎!&�l��P��/�)���P�)������23�nr�������3���m���D�1|���\r�o��n�﹕�����{'��>���||H�\r�� e�S�E=�����=�s�vscK���K�O�¥�|:��8�|7����N:g�a&�� �F}5�����/��e�~CJ\"�`/�|Lb��_�ǟ!�06 �|{��*�����B#f���_\"�;��12�k����I���N�c\r����G<77G̱���3�4�4�;{����\\�����gǯ�A?�v��y.e�Y�����CCf���|�[�?D��_ѻ;I����/��ҹ��7���}2���%�8�����cb�ǿR����r\0۽��~K��Ƴ��?��3�[I����q��;���?\\��q�So����Y�}	��i�7�L���5>K������z�1�����3�:�|{���lz���?nf��/��jH���vom�w�\\\"|{���|1��ti���^�1e��|�]8�*F�݅=�/F�k���/���G����ۮD��~Ѱ%��A��⟎���[������ଅ�\$Ǜ��m��8%_��-��\0z`��ߐ�S\$��EI��e��~Q��i �~{@[�_�~g��%�x���O�_�������rk<���zE���01g�`1���Ү��+G�7q�8�;�ǟ����rzM�=�����(O~{��i���o���������95N�G��T@�ρ���y?B�\\	sa��1��\"G츙:h�w���g�s�/�x5g�\\���nۅ8>���ڟf��ۄ�\r_�����t8�|�����\"Mf�߭���8�=\0�p������\\�	o�E��gO���ǫ��ߦ��{��f��\"+���n�����.��u���<�N�����������l\$t�v�gs�{���z��T�'���I�\"��Äd� ��x�^z\$�m�ˤ��킏��A���!�LD�<bg|��y,ƺ�ҟ%�C���\0�@�馑c��)��v�/�.7InD�+;P�� 7crF���\$.��`�6��3��i�F�����>D6��3�S���Q^&|����'��D��6�b���Z�7���2��>% Ǹ 0�&�=��q�va����08z�\$x	b�C�o&�=�����jD�M���1=jb0�d����[K��j�\0<b1�tM�Q����\$���O�pB��v0@0߸�q�HU�G\0|pPU��F+��#��>��p�pN��+�h��[k�o@n�5�!�0\"&q�������e�������I+��b�t�(c�����`���A�s�SI�8qlml\r�v,��A�N!p��w�((���AqB���s����d���~ ��#Vvs�B`|?�j�Υ��2?E�@�Tމ��h ��R�>�~�ս��8��-�[ʿ�g>e��]H�ď\r��n>z��d6��ě���c^�9�L�\"u�v�ف���3����\$�w��Q�\r' ,Y��=�-*�l��?�x�l�_��H����Q���jV�e�+QH� ���rO���ǧm%�Q/�Є(! ���@d��1��T0X�=�=oa��-�,�[h������z\$��d�y|����xt;p_��.?�~��5\0+����>ݭ�p�a6��L8�t;H�0�P�eA�;�M��5���6�p��L\n�ΐjY��~^y�\rP/�hv��3-i/�@����m[�|M	��\n6�K���#1hFT�)ߘ(D�m�\n=%��u#\$N��m����:��X\$>�O�����\0M�\"�Cq4�٧돇�/O\\K\"�d(�Bx=��[�Np��I��dV�l�Ry��}�����W��|���~��B3��1L��	�ݮb���O՛���:]9Ńh#���R�?P�69��،��\0g�8B.\$��{`іh����?�h�mG]�n�Q8��	�F�iZ	7q��u�y�xF��F�+�� �0q���J�v�+J2p�����r��\n�%'��?�n�h����F�0�F=B'~�׎��\n��5�2|e1�<�\rЛ�5�qn�	��f@>���e1h�\$���sX3�\r�@���z�+鶩��9� '2�G������a�FܐС�(�T)\rJ\$7G�k���D9���)\0�\0��\\)f��+��(Y\0P�-b��`�WM�r�P�c�7Ro(Ir�t(7\n`��)���\r�#�5��I��/70 O��S�X�=�:E�V�*��(�I��r�0�\\ƹ�t7hq��5�ۓ��I��e#�-�p����J���t�O �{����%&�/h^\":w���#�&��\"Hо�\$�Iu������p����h��*y�X_⃁�C8Y�.�1T�Pġx�j�4�)A���ӑ��sE�\$q� ��WS��PbbVc�d.�����rn��۴.��и���ǆA��/3���!���V_�ZH�Mg-�+�\\��RS��˅�qZ�G�r�QN�a�*�v��Yܒ��W��[��V��Nb��u�H�)(y\\��1��@��J̝��Y~�`��z�]�v ��B�%PVGv�A`��%'����) S�ZR����i��)5S��D49Jb�;)3�,�9M46E�Pߔ�Û�&����t\n��a*\$un�Aբ���ꎖ��T���?��%�D�2��X�tt�څ��ցT��Yh��e�Ɲ��&v���\"�p�K1�d,�ZQUf����n�ݰ�q\\���\\6\"DJ�����Z��UP\n�T�Yh)�U���Z��`����qUԵ�>��5��iͣ��T��Ilrܕ}ki�}��ȴU_*���)\$@F�mr���J�V�+�Vh�-cJ鳪�p�ͭ�[��0?�Չ�N��\\x�!9� �\n���:��EYҋ��\n.�V�`?���3�M�>,[@�ir>5��|�D�؈��MYB�Gx��\n�̰qhڵXs��Q��:���h����*5���]��@�b�=���G\"�s�xZ��G@�ſ�M��<�W#��^�D=ABxg�G6'M�֋�Ct�[���,��<'�@���L��\"��n���_%��[�8�f:�%��K8��=&������03`~P�\n�.��D^��^�����O�A\0���{F\\d V�\\��=vc���	S�F^(�_�?t���,*���۴\\gb�����JD�D�q���יش��Puxf�,��=�לPd�h� i\$�dz��4}�U~(�1�Abg1�@�j���[d�Z㆙�0�JJ��3v��L�@Iq&%��&�3LJ��Ln��u%�׮��Ց�����F7h.��/�Ln��'{��Gp�O���L0|��R���/�mn|�k]\0%���t���텘DNN��\"�n��*4T2�b�3�t|�� eg�gJ���O�ȡ,A(N�������vF@�\"g�^o�b;S�*\0�_nL߁95�sT�yP0fxG���4�)D|.]M�B�Ht\0�9�8��Fa`��H�\n� �X8+B|�k<\0�\n��)�8f��b�B�H�9� ��H���?,��| 4P����1�\nPs�\0@�%#E����\r\0ů\0���0�?\0ũ,�\0��h��j�\08\0l\0�.[�lb�Ŵ\0p\0�.f@qn��0\0i>.\\�u��7�uB-D[pnb�E�,�\0��]� ��E��r\0�/l[p�\r�\0000�k�-P@\r�E�\0g.�Z��~\"���\0q&/�g��\r����\0k�.D`H��x\"���\0n\0��`x��m\0�����a� K2E�#�-\\Z��Ql\"�\0006��\nP��`q�\"�Ū�c�4 �|���'�c�1^��Qlc�ό�1D^xo�Y����[������\0s21\\^ @\rb�F��\0�2D[�����7��z-�\0����E�`�/�dX�јb�FM��&.�_x�qw���5����! q�@E�b�4\$]x�q���F��%�4\\Z�ɱx��F���.�]�ɠc'�1�����`H�q������Y�.,g趀�6F6��/���ƭ��z5b��`\r�GF(JMf.Le��@1\0005I�5�e��(Ƒ��b2|[� \r#5��1V0|k�ő���4�9U��g(��\"���m�5�e`�\r�4E�F.�[��1�������0di��1k\"�Fo�	~7�g���#oF����/4[��1���I\0i7\0XΑn#LF�\0i�0tfױl#Ƴ�a�4�[H�Q��FW�'�.\\m�α����ύ��30(�Qo��F\r�	N1tp��1��PE݋��.�H�1lc^F~���4�_X��qc*�7�/:/�qx�1��rF�\0en/�H���O�F�/�.�ax�qr��V���4�_��#F`K�:]������YZ-��q�cjFz��;0(�Q��Ƨ\$�.�f��q��XEڎg�2�lh���c��Z��n3�l(�ˢ��ݍk&<�k��Qo�/�ы�^7�j(�����G#�y\":sa��#������2L_h�1����f�-2�zh�Q�c�FfK�n���Z�H��\$�n��\0Ic�EƎ��64}��1�cG\0s�-�v8ӑ�#nƤ�oR:�r��b�\0001���7|lH�Q���F��2�rx�Q���@���8||��d�#�ǈ���1)fH�G���M��7\$c�챿�3GՋ�z.l}��E�\"�ǃ�PK�1�a����coF��� b=Ta��q��Ƅ,�>?�f92�QFW��>?4b��1�d�'�u �3�|���sc��΍�6Bm��\0�EƐ�j=�fH�r���>���5dlIQ|��ƍ�^9�c��qt��H;�5�c��Q���Ս�!.?�`h�q��	HY��n.|����G���a����cXG���?�t��d\r���Iz>Ld���\$H�W���9�X�q�d0�-��J@,���q����(��.:�x8ı��=�J���/�g��q�1G���\"^.dsx�r�HF���?����XGz�W.0|v`��]E���^0\$Z��Q�#sGl���3�[�r\$?G��\"Z0\$d���b�H��t�~@eyђb�Ȫ�\"61�x��cH���=,c�����)�\\�}\"�G_���c���;V/<n��r��E��\r�Ftp��1w�;�C�Y\"�3T�8���b�F8���ADk��r&����E�>�|ч#[GZ�NH�k��2%�MF��[�8�o��ѓc\0�;�m�-����њ�F�yJA�l�RMd�ɍ\"�8\$n8�1����Y�0|��2\$�G���<,���#aGP�� \nFt�R^��(�� 6J�a(��b�Ia�U#�3hX�q}\$�ũ��!N;\\��?2%\$�Ǜ�UnG���2&�~ƶ�e�Llh�8\$SGj��bB\$w��⤮�\\��>L�m(��@��Ǜ���8�g�1�!cSF��#\$�H�gh��\"cE���:DsH�Ѻ��Ǉ��~Hԛ�qt���~�60(���b������7�dIq��vƜ��~-�kX��)�����\"�N4�Y�I�����O�Ex	xd	�瓄ɂ�\\x᱘��G�%� z6r��q~�pIΐk&\n=�I=���%E�K\"�G܂	�#]F�'&.l_�&�nc\\�鍗�/[�@������'nM�8���F���G\$��q��MȰ���<�[��Q�c2Ț��%�<\\�Y1���ƒ&:|q��Cc��-%�'�2�x����H|��#�0�)b�lHX���Jt���r��e�x�%#�3\$���R5��S��!�.��(����GӔE�:�l�r	\$q���&B1�a	r�I���C���˱��NJa���BD[踲X�JC�M�C��Ց�c[���.>4�	#ѯ�5I��(�6�z�Q1x���;�s(�3l�I]���*��(*T<xX屌��:aP��,�4���H㨖P���u�İ����B�Q.�EI�U��\$�e*FT��@>�%�+�f�\n���Qn�-����U#��U��Hj��]Ҷ�:�x1+��k�'UK�VmC��С}s)��p�V,�Vº�T�7�v.�QZ��u{+�\nD��e�\n�px.�|�\0)�}I<0\0�I�Z��\$k	!���Yh�����Rd�Q���S�%.�%��9�ĩbW\"֐���\0)�Yv*V��WX�Ze��/:�,�O��ա���xÆQ!,�`B�	_.�%��Ŗtm�\n��JK�V���y}��M��,��	喦�l+qap0��Ԓ;]R ��#(��*^���~���>���-T�Ѫ�#8�@���Y \n!�;Gv����Pj�%�)9�E-�V:��U�J���� j�D���K�wF����0�R%ȭ�U�F�?[��A��DTwP����Q�¬��<�ɔa�1>@Na(2���yc��h�ݕ��\0P�:]yW�����3[�<�@���%�gB���p���;�HKsW޳��ıYr`f�']ؼ�\nbU��%ݩ�S2��GdBpj��eb��R���YZk锵\0U\0��4J����ڬ�U�	d�ɕ��'T�H]֊�G�JU�/�v�.�Z�B%��׏	/\n���&Rk��W��\\ �Q r��^����W\$�Yp~If����R;eK?���%B�QQ���-+�«,Q��f�dꉥrL6�ҩ�W�I�s&��\\���a��)�*/�C�u1-�՚�E~��Vs,D*26�&�Pu\\�aC��;�d�1�3�F��0w���9�D2�g��&�l|^ H��.c�9p0����;�u�\rQH�00�.������\"d��g�a]�U\\�Y{�ȕ{kb���\n��������_�2��F���K�&N�����a[�ő�g&J!�G��-\\b��b�݉̋�H�T��Å2�PÊv��i ynjۃ�L!#9,�a\$�7b��&*&[,�:fS��kҴV�̻�e3IZ�<yq�7݊�w����e����ν�<*�\0����P	�0W̾U�rgr�e���V���Hf��i��4��+ZЦ6_����+RV���S%,�g۵Uĉ%����0&hL��n����`�¬QN��Yv!�Tj��32QRt9	�3FĒouF�-�t���D&��q���\ni\n��*5H���4\ni�U8+���;S�⾕}��o3E��M@Xj�Bf��UU����~RA-6i�� ���*|ԬQM�YxsTWȣ�Tp��X��B9<f^�\\#�2����h\n��x��T��*g��ռ�=%���4>j#��G�U涫�� �=��i�`\n唻=\0��[�����iݢK�4�j��i����x�WU�.�g�p[�~�\r�{u6����eV�-^�Ԗ��e�)��sPf�ͧw֎�?��'}J�&b�6�4�mr�ə�]]:�Q��6�Z��I}r��L�Z7[2�����UZL�QDst�D�y������Q}-m�\$�ٹ<��Mt�칡a���n3<��L���5W#�DKR���ۚ�or�������͢v�4MQ�׃\n�&��&V�4rW�݇}sI8M1S8	^d�I������UE1Jps�Y�S�VK�ݚk8Ri�̙�h�,SQf�:n��e�P�AM�Vn��_dԉ�+�UUכ�5>n#��w�U& MWV���]�ݵc�W�p��X�8�D�y�Y�!)Lvw7m��䉮`U��K?�)5�Q4�ٻ�>%���w�+~k���xr��\$M~��2Fr|�)�a&\"���[6\"Ytݵ4��ݨKmv�8~r+�����)y�)6Yk¯ű�v���<��m�	X������Xk6����	�*1�A΄�k0�s�I�*ϝTL��0�>��ɺ�o��΍T���V��\"�&o-��:�g\$�3:&uMևF�%id��D�?f�*��9Vq,�	��yUQ�\0��:I�Z���B'K�&���o��%\$JI&�;jW�8v,칣S�����u�8)]\$���3��,N\$x0��O|�*�M'o���39�[���ÓOBM�����|ܾ��Ӹ����8�v���ŊC�zN0��8�c��ǫ�M[��5tꐖ��j#�(��_;q��3��|���B�!��I�3�f Mo\0�5�x�UO�Ǧzζ��6�u���S��M{�;�v����1����覝ה����d��͔�C9�W§uVS�'>��T]6}�J�@K��Z�G����kOV#�\$��H\$Z���Հ(\0_V&��?h�	3�'��G�6�F2��pj,�K.S豑|�i��qg�Jѝ�I�v�C��\0+\0GYn�Lj�d\0�1\0M>��d�u�jCWSO\0�amU7�<XE��Qⰾ|���JDg�υ�.�r|(�Wr�C�-Q����W\\�S�0��\0_#6�<�T�ռS��o��S�>�{d�UY�w\0)�_���Y��zJ�'�O�\$H�.l���c%��&X�8���S�g�ϋY)?ZU�� 39\0/��\0���A�%�k2� T=��%�K5&���^ʫu{�ɖ\n씽-,[���_�}	��֖Oş�r~,�yn�G�O���Mo|��Di�#P\n�i@>������׵O���\nz��/@�sKg�|��m�ޒ7��,Π�=3�g�)��v@,��v��Y�����P&��@��C�dvs9��������BCJgT��X��@0>�օ\"y�QP �c1�e��g^�9��AEg�;\$x4%��1Y�I�}r�%24�i�;S�A�\\��;j���d[���qm�\r��V�O���A�s���J���͙T�@Z����ڠ\n(?�T�2���!�E*���.�_M����Ѭ�[�;��=@����8K�X�2QM<੗a�nВ�<����Њ�V���\0��BZ\"���3�hN���U\r�`Lߩ�j�ב�X��zV,�{t/UƢH��B�U�����_R��`r�uA�3���M�z����� 0����ҡ���e��jt8(l����t�IyT9���X�C�?ꉩ{jK��ВS�C�ֵ5~�r��ͱ��C�:ȅxt<�pϽ\0����~I�4?�)�Ǘ�N_RI�VĵK�n��B��ʴ����:��}z���\n5@�Q\"U�BIn��0�\"Zf�\0(�B\ri�5E����k\\����eڔ�*��10=��z@���ˢ���e��y�\r	!�Y|�|�J)�8g����EH����g�U�QS�%D�\r5�\n����`�<:!�u��(lC�0�C�˅�Th��U�?�w\"��˔��)\n2��Nl���r�0*9Ⱦ,?L�26d���+�X�9B�x\0\n���_FN��5BA��������MB��[����O�J:�2�Y��\rH߭�P�0�Z�&5����+��\r�uĘ���?�b�ݪ\"t(�ʽ���N{��U(�Kh����@<?j���(;NP�\$����\n&�Q�\\�GmP��5;�An8YiN�C�,I���e�>mUڛ��K��Cѣ�s�c1 �l�t��O�����e��f̭W�UC�}˒g�O�S�����%[�WRG�=Ɛ�}5�tte�\\I�N�Y�k1)�\rQ�j���B��{)���H�-\"zD�t������9�{��y��M�f-�]2�>d��(ts%]�\$�H�?%\"��n���#�T�@���wjt�8R��BIH�rB�\$���w2�!\n#4�(���2Y��\n��n�؂�E�d�&�4��/�d��G�[XV%������S�*��o�Q�?\0r�k`s�د0���%��+��б��4�fyG���\0\n����Xq3`�`f����D9��䂐�iDŖPTdd�I����#�?���x(đ���YTt�����ǂ\0a���P���d�\r�P-�,ȺԳ�l�^��-@=���i\0006�����|z[���\08��K*��W�4��hإ���a��������K��u,b�4){���K6��-�_��i���B�	--�`Է)cRަL�DhZ^ ����K���.�b����R�7LR<�bt������L\n��2k4��e�3��L���2�d�J�~��L��e-f���g�6�L��=3p��)wS7�M��3za��)�S7\0oM1}3zb��)�S7�5MR��1�k�#l���iL���m�g��i�S?��L6�4:g4��l�G��Kr6�4�m��#l�O���6�5:nt�#l�W��M�2h\nj\0��\"��N@u88���)��˧M��1Jqt����ѧM���.�qt۩�Ӓ�N*�8zqtީ�ӎ��N���7�s��̆/���E9JuT��Ө�9M���7*t��b�ӌ�gN�	-9\n`��i�S���N���;�]�.�S�_\"�-�t�i�RёwO&�p�t����ˑwNꞭ<�t4�i�%�IO��}:zp�v���٧�O6�E>Zv��IS���Ob��>�{����S৻OZ2m7j|��)��������k*pT�\$�T	��P:��@j}1��S�����u@*yU����O ��\nT�i�HR�#Px	-?��2�T%�?NB�A�{2��ܐ�M���8pe�)�T�EN&��?Z�4�j!�-�1P��B����I�L�Q<Dʁ��¾S���QV�%1���	�r%�O���Djc�j\$�]��M}.]<[Ub�TkKP��rh�a5R��/�OQ���j��R2�:%ħ�Qޣ}>ڏUj�֨�OΤHz�5j\"T��	Or�e?ꑕ@Ԍ�R2��H:��i��i��R:��9\n��\"�7��;R���JZ�U)jJT��/R���0\r1~��J��=Rƥ�b�ѯj4�3���RHuK�q}�QTo��S\r܈��\0�TˑS:-�M\n���zTΎSZ�F�u5�RTr��SZ�MM�u7�V�o��SZ��IZ���gE���Sv��[:��8jx���S���eʝ�:j4�������LZ�Q���*��Sң�b��>*:�ũ�S�|Zڙ�*����z��Pj�5B*`E��'T2��[�uD*9E۩���=Qj��nj���KTr�\\j��H*`E�OT���fJ�чj��*��b��R�5L*d�ߪwTҦe�uN�|�����X�ES�6ԧM��T��UU*{UZ���	%M4� I*�%�B?P.�Vj��&��U>9f�~��Tڑ�*�Gz��Mf��U���j���e��Rr�MW��5U��V��ʪ}Jj�5X#-Չ��U�/�X��USb�UO�}V�lxZ��[��Tǫ1U�>MYj��m�h՟��f��W�5��U��U���Zض�m*��߫eF��Z��^��Փ��z�}Nʶ��՜�o\"j�\rU��њ��Տ��,op0>\0���I���U^��,��M\0�3UՌ��.;�A��uu#�E���S�Z���?���\0��W��W�ѯ*��ǫ�W:�c���o��ȁ��TJ��QJ�5|*�V��U�35_���������^�|l��5|���k�#V橕[x��S�U��yXz��T\n�Ձ�F��9X.1%`��*e�Ƭ[ʱ}a@7q����V�<`��U^��V*�W�NUV����d�U�K�WV�l~��5�d�U���X�]c����� U�����/edd��{*�E�dr�Uez��ckE��[VF�-c겡4\n�BFJ�|��ʃ�{O��<�h�\$���!�\0K��<�w���5��kNp��)]z���+z��eS.�iF:��j<Ĵ�Э��V:��ގ�^\nO![`�ny\n� 	k��zMK��Z�v¾���W��:�T;�r\rkR䂕D8Q�<ir+�!��'d�!�Z�^�l5s3�T�Q�o<�׬�	�3�\\�>����u<A*����^\$�9�>|����DW\rK@X�[z�۱�`ү�LٚM3�n1�N�@�X�\\�i;����5���g�#\\�G\0�L�j��k?͚v�4�k��*�u��>�.�\r5r�B�	�`e�����Z2��)��+IW�!Z:��izu���V��F����*����RM\\�H�L��ɧ���N��i\\��L֧b�����Z�k4�I���k[P�ֹJk��)����(W,�	9���晱jnfx��v�]6yӵ*�U�'8,B�U6F�����ۦ[Ku��3�duma-J������76���9�s<'\nV�Y/[ƻmo:�u�C�����9�W�:����\nV���\\�pi�ʭ+�֊��Jf�mwuV���KW����x��U�+����\\zn�rzS�U#W%��Z�w��E?�ѝ�L9�~�fo��I���+�V�Qa\\��S�J(��g\$M���D�ܥl:�Ӕ��j�t�j��|	�v�\n;d�x�zs��YP�W��5�<�D�Y���K���_Jc��Zr��n� ��_���k^+m,3\\aBerĹJj+��Fw�;�)\$9���]N�\$\0���P��ٵ���YL_�K1�f�%ɖ�;���a�mK��\"�\0����%� 6��.�?�w\n��χ�K�l��x�)��Ya��ؑ�#_>M(3������m��P9h3ӻ���b0~�����[�X4N�ܹ�Haɨ�Yk��A�v�t�6^:Q�_�l\"�9��N�R�	�A\nQ�¸k�Ll+��������@#�t� ��K����v�B��;^��	��!gl9�HD2�.�{^��; `�4��4�z\r��G\r\0[\0���\$�\\�D\"Ğ��� q���7�����{�RN��(�uq�Q��%����Hxm��t0_&Eah���E����7gn8���X�v\r��%Mf^Ӎ�h�0�1�ɱ�=��RI\ry�q�������\r/&XԱL�c\n\$@��J�0D��}�)�/�d�.��/��6,t�遖!��@!����\0V��.��gFW��^��e��5i�� �\"���DR�� Z/�\"���,����6=!dD1}�6/�F�Tc;`x+#쓱����7��0�*��J�!l�Q�*hD�	Pb��B��Y�0\0��\nɝ��!\r��KVэ1�5G�VP��4���=;w+%�l�YI��FŔ �T�1���e 9��g����1m���i:��\0���S3�N����38�v���aN �x�]��El�>��<�L�T\r�Ebh�H��.���.�+6��a��Aဟ �J��Y��\"�lŐ5̺�b\0o�\")�X�f�Sd�R��(�fu�������>{\"�A�q��8�A�½�{8���p8k2��L�Y��˩ⵛ�64�VđTX\\ś�����Y��1fǠ�q�:�u��|��\\}���,O0{dds͂C�	�B5��#H1zl\0%o��,0Hide�'�?6x�ֱ���5�Q��y�|�p�\r�+=�p��X�\r�`!�q,�>��g��\$�@�����pٸ\\�6���\${�^&ϛ{<�y��Z6jǾ�e������jo�\$MX�(v�l��@Mh��d�E�X����D�V��y|jH��u�`TpZ�/Fe��-�{E�sN����d�p��\$�u�Pdd���5��o2�L��ؿ\nc���8�^fX�\n�:Z{��o<�t1��i�,:�E6�C*�+�=i�ݦ�(ԬV�_r�E�!��lD�vZ�����ō�pʶN<=K�Γr	�#@;��\0��4�v��7YkA��������`(K֨#̃2�\rQ�H!/v7l/���c��b!��X��x��(��4�6�@��cLj�J�!�7���fzX��	v�6�ȵ��=�pTqX-`5��zj�\0�������c�k%�i����M����x:tLc1,�Ņv4��)���N�/9B���逊�\r�9�N��8IG��@ ��{��:���/M��xJ���'E�(�(�#rHE�'�2`q��S|�a���`R���9�@⼍����^ڀs�BF��Wkd&��ݥMOn\0��!�0#6�z�/)Y��æ�]�����q^x����O���K/�\n�[G ab:�9;3d�MS�?�9�����R��\r��?\"s1g~xא");}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0!�����M��*)�o��) q��e���#��L�\0;";break;case"cross.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0#�����#\na�Fo~y�.�_wa��1�J�G�L�6]\0\0;";break;case"up.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����MQN\n�}��a8�y�aŶ�\0��\0;";break;case"down.gif":echo"GIF89a\0\0�\0001���\0\0����\0\0\0!�\0\0\0,\0\0\0\0\0\0 �����M��*)�[W�\\��L&ٜƶ�\0��\0;";break;case"arrow.gif":echo"GIF89a\0\n\0�\0\0������!�\0\0\0,\0\0\0\0\0\n\0\0�i������Ӳ޻\0\0;";break;}}exit;}if($_GET["script"]=="version"){$gd=file_open_lock(get_temp_dir()."/adminer.version");if($gd)file_write_unlock($gd,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$f,$dc,$lc,$vc,$n,$id,$od,$ba,$Ld,$x,$ca,$ge,$hf,$Sf,$xh,$sd,$di,$ji,$si,$zi,$ia;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$ba=$_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$Ff=array(0,preg_replace('~\\?.*~','',$_SERVER["REQUEST_URI"]),"",$ba);if(version_compare(PHP_VERSION,'5.2.0')>=0)$Ff[]=true;call_user_func_array('session_set_cookie_params',$Ff);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$Uc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'zh-tw';}function
lang($ii,$Ye=null){if(is_array($ii)){$Vf=($Ye==1?0:1);$ii=$ii[$Vf];}$ii=str_replace("%d","%s",$ii);$Ye=format_number($Ye);return
sprintf($ii,$Ye);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Vf=array_search("SQL",$b->operators);if($Vf!==false)unset($b->operators[$Vf]);}function
dsn($ic,$V,$F,$pf=array()){try{parent::__construct($ic,$V,$F,$pf);}catch(Exception$_c){auth_error(h($_c->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$ti=false){$H=parent::query($G);$this->error="";if(!$H){list(,$this->errno,$this->error)=$this->errorInfo();return
false;}$this->store_result($H);return$H;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($H=null){if(!$H){$H=$this->_result;if(!$H)return
false;}if($H->columnCount()){$H->num_rows=$H->rowCount();return$H;}$this->affected_rows=$H->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch();return$J[$o];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$J=(object)$this->getColumnMeta($this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=(in_array("blob",(array)$J->flags)?63:0);return$J;}}}$dc=array();class
Min_SQL{var$_conn;function
__construct($f){$this->_conn=$f;}function
select($R,$L,$Z,$ld,$rf=array(),$z=1,$E=0,$dg=false){global$b,$x;$Sd=(count($ld)<count($L));$G=$b->selectQueryBuild($L,$Z,$ld,$rf,$z,$E);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$ld&&$Sd&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$L)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($ld&&$Sd?"\nGROUP BY ".implode(", ",$ld):"").($rf?"\nORDER BY ".implode(", ",$rf):""),($z!=""?+$z:null),($E?$z*$E:0),"\n");$th=microtime(true);$I=$this->_conn->query($G);if($dg)echo$b->selectQuery($G,$th,!$I);return$I;}function
delete($R,$ng,$z=0){$G="FROM ".table($R);return
queries("DELETE".($z?limit1($R,$G,$ng):" $G$ng"));}function
update($R,$O,$ng,$z=0,$M="\n"){$Ki=array();foreach($O
as$y=>$X)$Ki[]="$y = $X";$G=table($R)." SET$M".implode(",$M",$Ki);return
queries("UPDATE".($z?limit1($R,$G,$ng,$M):" $G$ng"));}function
insert($R,$O){return
queries("INSERT INTO ".table($R).($O?" (".implode(", ",array_keys($O)).")\nVALUES (".implode(", ",$O).")":" DEFAULT VALUES"));}function
insertUpdate($R,$K,$bg){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
convertSearch($u,$X,$o){return$u;}function
value($X,$o){return$X;}function
quoteBinary($Pg){return
q($Pg);}function
warnings(){return'';}function
tableHelp($C){}}$dc["sqlite"]="SQLite 3";$dc["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Yf=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($Tc){$this->_link=new
SQLite3($Tc);$Ni=$this->_link->version();$this->server_info=$Ni["versionString"];}function
query($G){$H=@$this->_link->query($G);$this->error="";if(!$H){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($H->numColumns())return
new
Min_Result($H);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetchArray();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$d=$this->_offset++;$U=$this->_result->columnType($d);return(object)array("name"=>$this->_result->columnName($d),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($Tc){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($Tc);}function
query($G,$ti=false){$Ke=($ti?"unbufferedQuery":"query");$H=@$this->_link->$Ke($G,SQLITE_BOTH,$n);$this->error="";if(!$H){$this->error=$n;return
false;}elseif($H===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($H);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->_result->fetch();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;if(method_exists($H,'numRows'))$this->num_rows=$H->numRows();}function
fetch_assoc(){$J=$this->_result->fetch(SQLITE_ASSOC);if(!$J)return
false;$I=array();foreach($J
as$y=>$X)$I[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$I;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$C=$this->_result->fieldName($this->_offset++);$Rf='(\\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Rf\\.)?$Rf\$~",$C,$B)){$R=($B[3]!=""?$B[3]:idf_unescape($B[2]));$C=($B[5]!=""?$B[5]:idf_unescape($B[4]));}return(object)array("name"=>$C,"orgname"=>$C,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($Tc){$this->dsn(DRIVER.":$Tc","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($Tc){if(is_readable($Tc)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$Tc)?$Tc:dirname($_SERVER["SCRIPT_FILENAME"])."/$Tc")." AS a")){parent::__construct($Tc);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$bg){$Ki=array();foreach($K
as$O)$Ki[]="(".implode(", ",$O).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($K))).") VALUES\n".implode(",\n",$Ki));}function
tableHelp($C){if($C=="sqlite_sequence")return"fileformat2.html#seqtab";if($C=="sqlite_master")return"fileformat2.html#$C";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){global$f;return(preg_match('~^INTO~',$G)||$f->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$M):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($l,$pb){global$f;return$f->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name",1);}function
count_tables($k){return
array();}function
table_status($C=""){global$f;$I=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){$J["Rows"]=$f->result("SELECT COUNT(*) FROM ".idf_escape($J["Name"]));$I[$J["Name"]]=$J;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$J)$I[$J["name"]]["Auto_increment"]=$J["seq"];return($C!=""?$I[$C]:$I);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$f;return!$f->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$f;$I=array();$bg="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$J){$C=$J["name"];$U=strtolower($J["type"]);$Rb=$J["dflt_value"];$I[$C]=array("field"=>$C,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$Rb,$B)?str_replace("''","'",$B[1]):($Rb=="NULL"?null:$Rb)),"null"=>!$J["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$J["pk"],);if($J["pk"]){if($bg!="")$I[$bg]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$I[$C]["auto_increment"]=true;$bg=$C;}}$oh=$f->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$oh,$xe,PREG_SET_ORDER);foreach($xe
as$B){$C=str_replace('""','"',preg_replace('~^"|"$~','',$B[1]));if($I[$C])$I[$C]["collation"]=trim($B[3],"'");}return$I;}function
indexes($R,$g=null){global$f;if(!is_object($g))$g=$f;$I=array();$oh=$g->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$oh,$B)){$I[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$B[1],$xe,PREG_SET_ORDER);foreach($xe
as$B){$I[""]["columns"][]=idf_unescape($B[2]).$B[4];$I[""]["descs"][]=(preg_match('~DESC~i',$B[5])?'1':null);}}if(!$I){foreach(fields($R)as$C=>$o){if($o["primary"])$I[""]=array("type"=>"PRIMARY","columns"=>array($C),"lengths"=>array(),"descs"=>array(null));}}$rh=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$g);foreach(get_rows("PRAGMA index_list(".table($R).")",$g)as$J){$C=$J["name"];$v=array("type"=>($J["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($C).")",$g)as$Og){$v["columns"][]=$Og["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($C).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$rh[$C],$zg)){preg_match_all('/("[^"]*+")+( DESC)?/',$zg[2],$xe);foreach($xe[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$I[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$I[""]["columns"]||$v["descs"]!=$I[""]["descs"]||!preg_match("~^sqlite_~",$C))$I[$C]=$v;}return$I;}function
foreign_keys($R){$I=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$J){$q=&$I[$J["id"]];if(!$q)$q=$J;$q["source"][]=$J["from"];$q["target"][]=$J["to"];}return$I;}function
adm_view($C){global$f;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\\s+~iU','',$f->result("SELECT sql FROM sqlite_master WHERE name = ".q($C))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($l){return
false;}function
error(){global$f;return
h($f->error);}function
check_sqlite_name($C){global$f;$Jc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($Jc)\$~",$C)){$f->error=sprintf('請使用下列其中一個擴充模組 %s。',str_replace("|",", ",$Jc));return
false;}return
true;}function
create_database($l,$ob){global$f;if(file_exists($l)){$f->error='檔案已存在。';return
false;}if(!check_sqlite_name($l))return
false;try{$_=new
Min_SQLite($l);}catch(Exception$_c){$f->error=$_c->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($k){global$f;$f->__construct(":memory:");foreach($k
as$l){if(!@unlink($l)){$f->error='檔案已存在。';return
false;}}return
true;}function
rename_database($C,$ob){global$f;if(!check_sqlite_name($C))return
false;$f->__construct(":memory:");$f->error='檔案已存在。';return@rename(DB,$C);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){$Ei=($R==""||$ad);foreach($p
as$o){if($o[0]!=""||!$o[1]||$o[2]){$Ei=true;break;}}$c=array();$_f=array();foreach($p
as$o){if($o[1]){$c[]=($Ei?$o[1]:"ADD ".implode($o[1]));if($o[0]!="")$_f[$o[0]]=$o[1][0];}}if(!$Ei){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$C&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)))return
false;}elseif(!recreate_table($R,$C,$c,$_f,$ad))return
false;if($La)queries("UPDATE sqlite_sequence SET seq = $La WHERE name = ".q($C));return
true;}function
recreate_table($R,$C,$p,$_f,$ad,$w=array()){if($R!=""){if(!$p){foreach(fields($R)as$y=>$o){if($w)$o["auto_increment"]=0;$p[]=process_field($o,$o);$_f[$y]=idf_escape($y);}}$cg=false;foreach($p
as$o){if($o[6])$cg=true;}$gc=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$gc[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$ae=>$v){$e=array();foreach($v["columns"]as$y=>$d){if(!$_f[$d])continue
2;$e[]=$_f[$d].($v["descs"][$y]?" DESC":"");}if(!$gc[$ae]){if($v["type"]!="PRIMARY"||!$cg)$w[]=array($v["type"],$ae,$e);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$ad[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$ae=>$q){foreach($q["source"]as$y=>$d){if(!$_f[$d])continue
2;$q["source"][$y]=idf_unescape($_f[$d]);}if(!isset($ad[" $ae"]))$ad[]=" ".format_foreign_key($q);}queries("BEGIN");}foreach($p
as$y=>$o)$p[$y]="  ".implode($o);$p=array_merge($p,array_filter($ad));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$C":$C)." (\n".implode(",\n",$p)."\n)"))return
false;if($R!=""){if($_f&&!queries("INSERT INTO ".table("adminer_$C")." (".implode(", ",$_f).") SELECT ".implode(", ",array_map('idf_escape',array_keys($_f)))." FROM ".table($R)))return
false;$pi=array();foreach(triggers($R)as$ni=>$Vh){$mi=trigger($ni);$pi[]="CREATE TRIGGER ".idf_escape($ni)." ".implode(" ",$Vh)." ON ".table($C)."\n$mi[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$C")." RENAME TO ".table($C));if(!alter_indexes($C,$w))return
false;foreach($pi
as$mi){if(!queries($mi))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$C,$e){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($C!=""?$C:uniqid($R."_"))." ON ".table($R)." $e";}function
alter_indexes($R,$c){foreach($c
as$bg){if($bg[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Pi){return
apply_queries("DROP VIEW",$Pi);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Pi,$Mh){return
false;}function
trigger($C){global$f;if($C=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\\s]+|`[^`]*`|"[^"]*")+';$oi=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$oi["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$f->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($C)),$B);$af=$B[3];return
array("Timing"=>strtoupper($B[1]),"Event"=>strtoupper($B[2]).($af?" OF":""),"Of"=>($af[0]=='`'||$af[0]=='"'?idf_unescape($af):$af),"Trigger"=>$C,"Statement"=>$B[4],);}function
triggers($R){$I=array();$oi=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$J){preg_match('~^CREATE\\s+TRIGGER\\s*(?:[^`"\\s]+|`[^`]*`|"[^"]*")+\\s*('.implode("|",$oi["Timing"]).')\\s*(.*)\\s+ON\\b~iU',$J["sql"],$B);$I[$J["name"]]=array($B[1],$B[2]);}return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ROWID()");}function
explain($f,$G){return$f->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Sg){return
true;}function
create_sql($R,$La,$yh){global$f;$I=$f->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$C=>$v){if($C=='')continue;$I.=";\n\n".index_sql($R,$v['type'],$C,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$I;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($j){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$f;$I=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$I[$y]=$f->result("PRAGMA $y");return$I;}function
show_status(){$I=array();foreach(get_vals("PRAGMA compile_options")as$of){list($y,$X)=explode("=",$of,2);$I[$y]=$X;}return$I;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|dump|indexes|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$Oc);}$x="sqlite";$si=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$xh=array_keys($si);$zi=array();$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$id=array("hex","length","lower","round","unixepoch","upper");$od=array("avg","count","count distinct","group_concat","max","min","sum");$lc=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$dc["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Yf=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error;function
_error($wc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){global$b;$l=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$l!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Ni=pg_version($this->_link);$this->server_info=$Ni["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$o){return($o["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($j){global$b;if($j==$b->database())return$this->_database;$I=@pg_connect("$this->_string dbname='".addcslashes($j,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($I)$this->_link=$I;return$I;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$ti=false){$H=@pg_query($this->_link,$G);$this->error="";if(!$H){$this->error=pg_last_error($this->_link);return
false;}elseif(!pg_num_fields($H)){$this->affected_rows=pg_affected_rows($H);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
pg_fetch_result($H->_result,0,$o);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=pg_num_rows($H);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;if(function_exists('pg_field_table'))$I->orgtable=pg_field_table($this->_result,$d);$I->name=pg_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=pg_field_type($this->_result,$d);$I->charsetnr=($I->type=="bytea"?63:0);return$I;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL";function
connect($N,$V,$F){global$b;$l=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($N,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($l!=""?addcslashes($l,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($j){global$b;return($b->database()==$j);}function
value($X,$o){return$X;}function
quoteBinary($Pg){return
q($Pg);}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$bg){global$f;foreach($K
as$O){$_i=array();$Z=array();foreach($O
as$y=>$X){$_i[]="$y = $X";if(isset($bg[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$_i)." WHERE ".implode(" AND ",$Z))&&$f->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).")")))return
false;}return
true;}function
convertSearch($u,$X,$o){return(preg_match('~char|text'.(is_numeric($X["val"])&&!preg_match('~LIKE~',$X["op"])?'|'.number_type():'').'~',$o["type"])?$u:"CAST($u AS text)");}function
value($X,$o){return$this->_conn->value($X,$o);}function
quoteBinary($Pg){return$this->_conn->quoteBinary($Pg);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($C){$qe=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$qe[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$C).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$si,$xh;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2])){if(min_version(9,0,$f)){$f->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$f)){$xh['字串'][]="json";$si["json"]=4294967295;if(min_version(9.4,0,$f)){$xh['字串'][]="jsonb";$si["jsonb"]=4294967295;}}}return$f;}return$f->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$M):" $G WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$M."LIMIT 1)");}function
db_collation($l,$pb){global$f;return$f->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", CASE WHEN c.relhasoids THEN 'oid' ELSE '' END AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($C!=""?"AND relname = ".q($C):"ORDER BY relname"))as$J)$I[$J["Name"]]=$J;return($C!=""?$I[$C]:$I);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$I=array();$Ca=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$J){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$J["full_type"],$B);list(,$U,$ne,$J["length"],$wa,$Fa)=$B;$J["length"].=$Fa;$db=$U.$wa;if(isset($Ca[$db])){$J["type"]=$Ca[$db];$J["full_type"]=$J["type"].$ne.$Fa;}else{$J["type"]=$U;$J["full_type"]=$J["type"].$ne.$wa.$Fa;}$J["null"]=!$J["attnotnull"];$J["auto_increment"]=preg_match('~^nextval\\(~i',$J["default"]);$J["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$J["default"],$B))$J["default"]=($B[1]=="NULL"?null:(($B[1][0]=="'"?idf_unescape($B[1]):$B[1]).$B[2]));$I[$J["field"]]=$J;}return$I;}function
indexes($R,$g=null){global$f;if(!is_object($g))$g=$f;$I=array();$Fh=$g->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$e=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Fh AND attnum > 0",$g);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Fh AND ci.oid = i.indexrelid",$g)as$J){$_g=$J["relname"];$I[$_g]["type"]=($J["indispartial"]?"INDEX":($J["indisprimary"]?"PRIMARY":($J["indisunique"]?"UNIQUE":"INDEX")));$I[$_g]["columns"]=array();foreach(explode(" ",$J["indkey"])as$Hd)$I[$_g]["columns"][]=$e[$Hd];$I[$_g]["descs"]=array();foreach(explode(" ",$J["indoption"])as$Id)$I[$_g]["descs"][]=($Id&1?'1':null);$I[$_g]["lengths"]=array();}return$I;}function
foreign_keys($R){global$hf;$I=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$J){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$J['definition'],$B)){$J['source']=array_map('trim',explode(',',$B[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$B[2],$we)){$J['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$we[2]));$J['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$we[4]));}$J['target']=array_map('trim',explode(',',$B[3]));$J['on_delete']=(preg_match("~ON DELETE ($hf)~",$B[4],$we)?$we[1]:'NO ACTION');$J['on_update']=(preg_match("~ON UPDATE ($hf)~",$B[4],$we)?$we[1]:'NO ACTION');$I[$J['conname']]=$J;}}return$I;}function
adm_view($C){global$f;return
array("select"=>trim($f->result("SELECT view_definition
FROM information_schema.views
WHERE table_schema = current_schema() AND table_name = ".q($C))));}function
collations(){return
array();}function
information_schema($l){return($l=="information_schema");}function
error(){global$f;$I=h($f->error);if(preg_match('~^(.*\\n)?([^\\n]*)\\n( *)\\^(\\n.*)?$~s',$I,$B))$I=$B[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($B[3]).'})(.*)~','\\1<b>\\2</b>',$B[2]).$B[4];return
nl_br($I);}function
create_database($l,$ob){return
queries("CREATE DATABASE ".idf_escape($l).($ob?" ENCODING ".idf_escape($ob):""));}function
drop_databases($k){global$f;$f->close();return
apply_queries("DROP DATABASE",$k,'idf_escape');}function
rename_database($C,$ob){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($C));}function
auto_increment(){return"";}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){$c=array();$mg=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c[]="DROP $d";else{$Ji=$X[5];unset($X[5]);if(isset($X[6])&&$o[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($o[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($d!=$X[0])$mg[]="ALTER TABLE ".table($R)." RENAME $d TO $X[0]";$c[]="ALTER $d TYPE$X[1]";if(!$X[6]){$c[]="ALTER $d ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $d ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($o[0]!=""||$Ji!="")$mg[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Ji!=""?substr($Ji,9):"''");}}$c=array_merge($c,$ad);if($R=="")array_unshift($mg,"CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($mg,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$C)$mg[]="ALTER TABLE ".table($R)." RENAME TO ".table($C);if($R!=""||$ub!="")$mg[]="COMMENT ON TABLE ".table($C)." IS ".q($ub);if($La!=""){}foreach($mg
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$h=array();$ec=array();$mg=array();foreach($c
as$X){if($X[0]!="INDEX")$h[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$ec[]=idf_escape($X[1]);else$mg[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($h)array_unshift($mg,"ALTER TABLE ".table($R).implode(",",$h));if($ec)array_unshift($mg,"DROP INDEX ".implode(", ",$ec));foreach($mg
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Pi){return
drop_tables($Pi);}function
drop_tables($T){foreach($T
as$R){$P=table_status($R);if(!queries("DROP ".strtoupper($P["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Pi,$Mh){foreach(array_merge($T,$Pi)as$R){$P=table_status($R);if(!queries("ALTER ".strtoupper($P["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($Mh)))return
false;}return
true;}function
trigger($C,$R=null){if($C=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$K=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$J)$I[$J["trigger_name"]]=array($J["action_timing"],$J["event_manipulation"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($C,$U){$K=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($C));$I=$K[0];$I["returns"]=array("type"=>$I["type_udt_name"]);$I["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($C).'
ORDER BY ordinal_position');return$I;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($C,$J){$I=array();foreach($J["fields"]as$o)$I[]=$o["type"];return
idf_escape($C)."(".implode(", ",$I).")";}function
last_id(){return
0;}function
explain($f,$G){return$f->query("EXPLAIN $G");}function
found_rows($S,$Z){global$f;if(preg_match("~ rows=([0-9]+)~",$f->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$zg))return$zg[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$f;return$f->result("SELECT current_schema()");}function
set_schema($Rg){global$f,$si,$xh;$I=$f->query("SET search_path TO ".idf_escape($Rg));foreach(types()as$U){if(!isset($si[$U])){$si[$U]=0;$xh['使用者類型'][]=$U;}}return$I;}function
create_sql($R,$La,$yh){global$f;$I='';$Hg=array();$bh=array();$P=table_status($R);$p=fields($R);$w=indexes($R);ksort($w);$Yc=foreign_keys($R);ksort($Yc);if(!$P||empty($p))return
false;$I="CREATE TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." (\n    ";foreach($p
as$Qc=>$o){$If=idf_escape($o['field']).' '.$o['full_type'].default_value($o).($o['attnotnull']?" NOT NULL":"");$Hg[]=$If;if(preg_match('~nextval\(\'([^\']+)\'\)~',$o['default'],$xe)){$ah=$xe[1];$nh=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($ah):"SELECT * FROM $ah"));$bh[]=($yh=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $ah;\n":"")."CREATE SEQUENCE $ah INCREMENT $nh[increment_by] MINVALUE $nh[min_value] MAXVALUE $nh[max_value] START ".($La?$nh['last_value']:1)." CACHE $nh[cache_value];";}}if(!empty($bh))$I=implode("\n\n",$bh)."\n\n$I";foreach($w
as$Cd=>$v){switch($v['type']){case'UNIQUE':$Hg[]="CONSTRAINT ".idf_escape($Cd)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$Hg[]="CONSTRAINT ".idf_escape($Cd)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($Yc
as$Xc=>$Wc)$Hg[]="CONSTRAINT ".idf_escape($Xc)." $Wc[definition] ".($Wc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$I.=implode(",\n    ",$Hg)."\n) WITH (oids = ".($P['Oid']?'true':'false').");";foreach($w
as$Cd=>$v){if($v['type']=='INDEX')$I.="\n\nCREATE INDEX ".idf_escape($Cd)." ON ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." USING btree (".implode(', ',array_map('idf_escape',$v['columns'])).");";}if($P['Comment'])$I.="\n\nCOMMENT ON TABLE ".idf_escape($P['nspname']).".".idf_escape($P['Name'])." IS ".q($P['Comment']).";";foreach($p
as$Qc=>$o){if($o['comment'])$I.="\n\nCOMMENT ON COLUMN ".idf_escape($P['nspname']).".".idf_escape($P['Name']).".".idf_escape($Qc)." IS ".q($o['comment']).";";}return
rtrim($I,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$P=table_status($R);$I="";foreach(triggers($R)as$li=>$ki){$mi=trigger($li,$P['Name']);$I.="\nCREATE TRIGGER ".idf_escape($mi['Trigger'])." $mi[Timing] $mi[Events] ON ".idf_escape($P["nspname"]).".".idf_escape($P['Name'])." $mi[Type] $mi[Statement];;\n";}return$I;}function
use_sql($j){return"\connect ".idf_escape($j);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(database|table|columns|sql|indexes|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$Oc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$f;return$f->result("SHOW max_connections");}$x="pgsql";$si=array();$xh=array();foreach(array('數字'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'日期時間'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'字串'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'二進位'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'網路'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'幾何'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$si+=$X;$xh[$y]=array_keys($X);}$zi=array();$mf=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$id=array("char_length","lower","round","to_hex","to_timestamp","upper");$od=array("avg","count","count distinct","max","min","sum");$lc=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$dc["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Yf=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($wc,$n){if(ini_bool("html_errors"))$n=html_entity_decode(strip_tags($n));$n=preg_replace('~^[^:]*: ~','',$n);$this->error=$n;}function
connect($N,$V,$F){$this->_link=@oci_new_connect($V,$F,$N,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$n=oci_error();$this->error=$n["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
true;}function
query($G,$ti=false){$H=oci_parse($this->_link,$G);$this->error="";if(!$H){$n=oci_error($this->_link);$this->errno=$n["code"];$this->error=$n["message"];return
false;}set_error_handler(array($this,'_error'));$I=@oci_execute($H);restore_error_handler();if($I){if(oci_num_fields($H))return
new
Min_Result($H);$this->affected_rows=oci_num_rows($H);}return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=1){$H=$this->query($G);if(!is_object($H)||!oci_fetch($H->_result))return
false;return
oci_result($H->_result,$o);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'OCI-Lob'))$J[$y]=$X->load();}return$J;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$d=$this->_offset++;$I=new
stdClass;$I->name=oci_field_name($this->_result,$d);$I->orgname=$I->name;$I->type=oci_field_type($this->_result,$d);$I->charsetnr=(preg_match("~raw|blob|bfile~",$I->type)?63:0);return$I;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($N,$V,$F){$this->dsn("oci:dbname=//$N;charset=AL32UTF8",$V,$F);return
true;}function
select_db($j){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$z,$D=0,$M=" "){return($D?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$D).") WHERE rnum > $D":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$D):" $G$Z"));}function
limit1($R,$G,$Z,$M="\n"){return" $G$Z";}function
db_collation($l,$pb){global$f;return$f->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($k){return
array();}function
table_status($C=""){$I=array();$Tg=q($C);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($C!=""?" AND table_name = $Tg":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($C!=""?" WHERE view_name = $Tg":"")."
ORDER BY 1")as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$J){$U=$J["DATA_TYPE"];$ne="$J[DATA_PRECISION],$J[DATA_SCALE]";if($ne==",")$ne=$J["DATA_LENGTH"];$I[$J["COLUMN_NAME"]]=array("field"=>$J["COLUMN_NAME"],"full_type"=>$U.($ne?"($ne)":""),"type"=>strtolower($U),"length"=>$ne,"default"=>$J["DATA_DEFAULT"],"null"=>($J["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$I;}function
indexes($R,$g=null){$I=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$g)as$J){$Cd=$J["INDEX_NAME"];$I[$Cd]["type"]=($J["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($J["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$I[$Cd]["columns"][]=$J["COLUMN_NAME"];$I[$Cd]["lengths"][]=($J["CHAR_LENGTH"]&&$J["CHAR_LENGTH"]!=$J["COLUMN_LENGTH"]?$J["CHAR_LENGTH"]:null);$I[$Cd]["descs"][]=($J["DESCEND"]?'1':null);}return$I;}function
adm_view($C){$K=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($C));return
reset($K);}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$f;return
h($f->error);}function
explain($f,$G){$f->query("EXPLAIN PLAN FOR $G");return$f->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){$c=$ec=array();foreach($p
as$o){$X=$o[1];if($X&&$o[0]!=""&&idf_escape($o[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($o[0])." TO $X[0]");if($X)$c[]=($R!=""?($o[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$ec[]=idf_escape($o[0]);}if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$ec||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$ec).")"))&&($R==$C||queries("ALTER TABLE ".table($R)." RENAME TO ".table($C)));}function
foreign_keys($R){$I=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$J)$I[$J['NAME']]=array("db"=>$J['DEST_DB'],"table"=>$J['DEST_TABLE'],"source"=>array($J['SRC_COLUMN']),"target"=>array($J['DEST_COLUMN']),"on_delete"=>$J['ON_DELETE'],"on_update"=>null,);return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Pi){return
apply_queries("DROP VIEW",$Pi);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$f;return$f->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($Sg){global$f;return$f->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($Sg));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$K=get_rows('SELECT * FROM v$instance');return
reset($K);}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$Oc);}$x="oracle";$si=array();$xh=array();foreach(array('數字'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'日期時間'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'字串'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'二進位'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$si+=$X;$xh[$y]=array_keys($X);}$zi=array();$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$id=array("length","lower","round","upper");$od=array("avg","count","count distinct","max","min","sum");$lc=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$dc["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Yf=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$n){$this->errno=$n["code"];$this->error.="$n[message]\n";}$this->error=rtrim($this->error);}function
connect($N,$V,$F){$this->_link=@sqlsrv_connect($N,array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8"));if($this->_link){$Jd=sqlsrv_server_info($this->_link);$this->server_info=$Jd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$ti=false){$H=sqlsrv_query($this->_link,$G);$this->error="";if(!$H){$this->_get_error();return
false;}return$this->store_result($H);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($H=null){if(!$H)$H=$this->_result;if(!$H)return
false;if(sqlsrv_field_metadata($H))return
new
Min_Result($H);$this->affected_rows=sqlsrv_rows_affected($H);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;}function
_convert($J){foreach((array)$J
as$y=>$X){if(is_a($X,'DateTime'))$J[$y]=$X->format("Y-m-d H:i:s");}return$J;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$o=$this->_fields[$this->_offset++];$I=new
stdClass;$I->name=$o["Name"];$I->orgname=$o["Name"];$I->type=($o["Type"]==1?254:0);return$I;}function
seek($D){for($s=0;$s<$D;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($N,$V,$F){$this->_link=@mssql_connect($N,$V,$F);if($this->_link){$H=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");$J=$H->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$J[0]] $J[1]";}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return
mssql_select_db($j);}function
query($G,$ti=false){$H=@mssql_query($G,$this->_link);$this->error="";if(!$H){$this->error=mssql_get_last_message();return
false;}if($H===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$o=0){$H=$this->query($G);if(!is_object($H))return
false;return
mssql_result($H->_result,0,$o);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($H){$this->_result=$H;$this->num_rows=mssql_num_rows($H);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$I=mssql_fetch_field($this->_result);$I->orgtable=$I->table;$I->orgname=$I->name;return$I;}function
seek($D){mssql_data_seek($this->_result,$D);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($N,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$F);return
true;}function
select_db($j){return$this->query("USE ".idf_escape($j));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$K,$bg){foreach($K
as$O){$_i=array();$Z=array();foreach($O
as$y=>$X){$_i[]="$y = $X";if(isset($bg[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$O).")) AS source (c".implode(", c",range(1,count($O))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$_i)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($O)).") VALUES (".implode(", ",$O).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$D=0,$M=" "){return($z!==null?" TOP (".($z+$D).")":"")." $G$Z";}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$pb){global$f;return$f->result("SELECT collation_name FROM sys.databases WHERE name = ".q($l));}function
engines(){return
array();}function
logged_user(){global$f;return$f->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($k){global$f;$I=array();foreach($k
as$l){$f->select_db($l);$I[$l]=$f->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$I;}function
table_status($C=""){$I=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($C!=""?"AND name = ".q($C):"ORDER BY name"))as$J){if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$I=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$J){$U=$J["type"];$ne=(preg_match("~char|binary~",$U)?$J["max_length"]:($U=="decimal"?"$J[precision],$J[scale]":""));$I[$J["name"]]=array("field"=>$J["name"],"full_type"=>$U.($ne?"($ne)":""),"type"=>$U,"length"=>$ne,"default"=>$J["default"],"null"=>$J["is_nullable"],"auto_increment"=>$J["is_identity"],"collation"=>$J["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$J["is_identity"],);}return$I;}function
indexes($R,$g=null){$I=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$g)as$J){$C=$J["name"];$I[$C]["type"]=($J["is_primary_key"]?"PRIMARY":($J["is_unique"]?"UNIQUE":"INDEX"));$I[$C]["lengths"]=array();$I[$C]["columns"][$J["key_ordinal"]]=$J["column_name"];$I[$C]["descs"][$J["key_ordinal"]]=($J["is_descending_key"]?'1':null);}return$I;}function
adm_view($C){global$f;return
array("select"=>preg_replace('~^(?:[^[]|\\[[^]]*])*\\s+AS\\s+~isU','',$f->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($C))));}function
collations(){$I=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$ob)$I[preg_replace('~_.*~','',$ob)][]=$ob;return$I;}function
information_schema($l){return
false;}function
error(){global$f;return
nl_br(h(preg_replace('~^(\\[[^]]*])+~m','',$f->error)));}function
create_database($l,$ob){return
queries("CREATE DATABASE ".idf_escape($l).(preg_match('~^[a-z0-9_]+$~i',$ob)?" COLLATE $ob":""));}function
drop_databases($k){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$k)));}function
rename_database($C,$ob){if(preg_match('~^[a-z0-9_]+$~i',$ob))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $ob");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($C));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){$c=array();foreach($p
as$o){$d=idf_escape($o[0]);$X=$o[1];if(!$X)$c["DROP"][]=" COLUMN $d";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~","\\1\\2",$X[1]);if($o[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($ad[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($d!=$X[0])queries("EXEC sp_rename ".q(table($R).".$d").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($C)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$C)queries("EXEC sp_rename ".q(table($R)).", ".q($C));if($ad)$c[""]=$ad;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($C)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$v=array();$ec=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$ec[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$ec||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$ec)));}function
last_id(){global$f;return$f->result("SELECT SCOPE_IDENTITY()");}function
explain($f,$G){$f->query("SET SHOWPLAN_ALL ON");$I=$f->query($G);$f->query("SET SHOWPLAN_ALL OFF");return$I;}function
found_rows($S,$Z){}function
foreign_keys($R){$I=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$J){$q=&$I[$J["FK_NAME"]];$q["table"]=$J["PKTABLE_NAME"];$q["source"][]=$J["FKCOLUMN_NAME"];$q["target"][]=$J["PKCOLUMN_NAME"];}return$I;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Pi){return
queries("DROP VIEW ".implode(", ",array_map('table',$Pi)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Pi,$Mh){return
apply_queries("ALTER SCHEMA ".idf_escape($Mh)." TRANSFER",array_merge($T,$Pi));}function
trigger($C){if($C=="")return
array();$K=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($C));$I=reset($K);if($I)$I["Statement"]=preg_replace('~^.+\\s+AS\\s+~isU','',$I["text"]);return$I;}function
triggers($R){$I=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$J)$I[$J["name"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$f;if($_GET["ns"]!="")return$_GET["ns"];return$f->result("SELECT SCHEMA_NAME()");}function
set_schema($Rg){return
true;}function
use_sql($j){return"USE ".idf_escape($j);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
support($Oc){return
preg_match('~^(columns|database|drop_col|indexes|scheme|sql|table|trigger|view|view_trigger)$~',$Oc);}$x="mssql";$si=array();$xh=array();foreach(array('數字'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'日期時間'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'字串'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'二進位'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$si+=$X;$xh[$y]=array_keys($X);}$zi=array();$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$id=array("len","lower","round","upper");$od=array("avg","count","count distinct","max","min","sum");$lc=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$dc['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Yf=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){$this->_link=ibase_connect($N,$V,$F);if($this->_link){$Ci=explode(':',$N);$this->service_link=ibase_service_attach($Ci[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($j){return($j=="domain");}function
query($G,$ti=false){$H=ibase_query($G,$this->_link);if(!$H){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($H===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;$J=$H->fetch_row();return$J[$o];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$o=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$o['name'],'orgname'=>$o['name'],'type'=>$o['type'],'charsetnr'=>$o['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
get_databases($Zc){return
array("domain");}function
limit($G,$Z,$z,$D=0,$M=" "){$I='';$I.=($z!==null?$M."FIRST $z".($D?" SKIP $D":""):"");$I.=" $G$Z";return$I;}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$pb){}function
engines(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
tables_list(){global$f;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$H=ibase_query($f->_link,$G);$I=array();while($J=ibase_fetch_assoc($H))$I[$J['RDB$RELATION_NAME']]='table';ksort($I);return$I;}function
count_tables($k){return
array();}function
table_status($C="",$Nc=false){global$f;$I=array();$Kb=tables_list();foreach($Kb
as$v=>$X){$v=trim($v);$I[$v]=array('Name'=>$v,'Engine'=>'standard',);if($C==$v)return$I[$v];}return$I;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$f;$I=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$H=ibase_query($f->_link,$G);while($J=ibase_fetch_assoc($H))$I[trim($J['FIELD_NAME'])]=array("field"=>trim($J["FIELD_NAME"]),"full_type"=>trim($J["FIELD_TYPE"]),"type"=>trim($J["FIELD_SUB_TYPE"]),"default"=>trim($J['FIELD_DEFAULT_VALUE']),"null"=>(trim($J["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($J["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($J["FIELD_DESCRIPTION"]),);return$I;}function
indexes($R,$g=null){$I=array();return$I;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($l){return
false;}function
error(){global$f;return
h($f->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Rg){return
true;}function
support($Oc){return
preg_match("~^(columns|sql|status|table)$~",$Oc);}$x="firebird";$mf=array("=");$id=array();$od=array();$lc=array();}$dc["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Yf=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($j){return($j=="domain");}function
query($G,$ti=false){$Ff=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$Ff['NextToken']=$this->next;$H=sdb_request_all('Select','Item',$Ff,$this->timeout);if($H===false)return$H;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Ah=0;foreach($H
as$Vd)$Ah+=$Vd->Attribute->Value;$H=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Ah,))));}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($H){foreach($H
as$Vd){$J=array();if($Vd->Name!='')$J['itemName()']=(string)$Vd->Name;foreach($Vd->Attribute
as$Ia){$C=$this->_processValue($Ia->Name);$Y=$this->_processValue($Ia->Value);if(isset($J[$C])){$J[$C]=(array)$J[$C];$J[$C][]=$Y;}else$J[$C]=$Y;}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($oc){return(is_object($oc)&&$oc['encoding']=='base64'?base64_decode($oc):(string)$oc);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$be=array_keys($this->_rows[0]);return(object)array('name'=>$be[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$bg="itemName()";function
_chunkRequest($_d,$va,$Ff,$Dc=array()){global$f;foreach(array_chunk($_d,25)as$hb){$Gf=$Ff;foreach($hb
as$s=>$t){$Gf["Item.$s.ItemName"]=$t;foreach($Dc
as$y=>$X)$Gf["Item.$s.$y"]=$X;}if(!sdb_request($va,$Gf))return
false;}$f->affected_rows=count($_d);return
true;}function
_extractIds($R,$ng,$z){$I=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$ng,$xe))$I=array_map('idf_unescape',$xe[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$ng.($z?" LIMIT 1":"")))as$Vd)$I[]=$Vd->Name;}return$I;}function
select($R,$L,$Z,$ld,$rf=array(),$z=1,$E=0,$dg=false){global$f;$f->next=$_GET["next"];$I=parent::select($R,$L,$Z,$ld,$rf,$z,$E,$dg);$f->next=0;return$I;}function
delete($R,$ng,$z=0){return$this->_chunkRequest($this->_extractIds($R,$ng,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$O,$ng,$z=0,$M="\n"){$Tb=array();$Nd=array();$s=0;$_d=$this->_extractIds($R,$ng,$z);$t=idf_unescape($O["`itemName()`"]);unset($O["`itemName()`"]);foreach($O
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$_d))$Tb["Attribute.".count($Tb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$Xd=>$W){$Nd["Attribute.$s.Name"]=$y;$Nd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$Xd)$Nd["Attribute.$s.Replace"]="true";$s++;}}}$Ff=array('DomainName'=>$R);return(!$Nd||$this->_chunkRequest(($t!=""?array($t):$_d),'BatchPutAttributes',$Ff,$Nd))&&(!$Tb||$this->_chunkRequest($_d,'BatchDeleteAttributes',$Ff,$Tb));}function
insert($R,$O){$Ff=array("DomainName"=>$R);$s=0;foreach($O
as$C=>$Y){if($Y!="NULL"){$C=idf_unescape($C);if($C=="itemName()")$Ff["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$Ff["Attribute.$s.Name"]=$C;$Ff["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$Ff);}function
insertUpdate($R,$K,$bg){foreach($K
as$O){if(!$this->update($R,$O,"WHERE `itemName()` = ".q($O["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}}function
connect(){return
new
Min_DB;}function
support($Oc){return
preg_match('~sql~',$Oc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($l,$pb){}function
tables_list(){global$f;$I=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$I[(string)$R]='table';if($f->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(($C!=""?array($C=>true):tables_list())as$R=>$U){$J=array("Name"=>$R,"Auto_increment"=>"");if(!$Nc){$Je=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Je){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$J[$y]=(string)$Je->$X;}}if($C!="")return$J;$I[$R]=$J;}return$I;}function
explain($f,$G){}function
error(){global$f;return
h($f->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$g=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z":"");}function
unconvert_field($o,$I){return$I;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$C)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($k){foreach($k
as$l)return
array($l=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($Ba,$Kb,$y,$rg=false){$Ua=64;if(strlen($y)>$Ua)$y=pack("H*",$Ba($y));$y=str_pad($y,$Ua,"\0");$Yd=$y^str_repeat("\x36",$Ua);$Zd=$y^str_repeat("\x5C",$Ua);$I=$Ba($Zd.pack("H*",$Ba($Yd.$Kb)));if($rg)$I=pack("H*",$I);return$I;}function
sdb_request($va,$Ff=array()){global$b,$f;list($xd,$Ff['AWSAccessKeyId'],$Ug)=$b->credentials();$Ff['Action']=$va;$Ff['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$Ff['Version']='2009-04-15';$Ff['SignatureVersion']=2;$Ff['SignatureMethod']='HmacSHA1';ksort($Ff);$G='';foreach($Ff
as$y=>$X)$G.='&'.rawurlencode($y).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$xd)."\n/\n$G",$Ug,true)));@ini_set('track_errors',1);$Sc=@file_get_contents((preg_match('~^https?://~',$xd)?$xd:"http://$xd"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$Sc){$f->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$cj=simplexml_load_string($Sc);if(!$cj){$n=libxml_get_last_error();$f->error=$n->message;return
false;}if($cj->Errors){$n=$cj->Errors->Error;$f->error="$n->Message ($n->Code)";return
false;}$f->error='';$Lh=$va."Result";return($cj->$Lh?$cj->$Lh:true);}function
sdb_request_all($va,$Lh,$Ff=array(),$Uh=0){$I=array();$th=($Uh?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$Ff['SelectExpression'],$B)?$B[1]:0);do{$cj=sdb_request($va,$Ff);if(!$cj)break;foreach($cj->$Lh
as$oc)$I[]=$oc;if($z&&count($I)>=$z){$_GET["next"]=$cj->NextToken;break;}if($Uh&&microtime(true)-$th>$Uh)return
false;$Ff['NextToken']=$cj->NextToken;if($z)$Ff['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($I),$Ff['SelectExpression']);}while($cj->NextToken);return$I;}$x="simpledb";$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$id=array();$od=array("count");$lc=array(array("json"));}$dc["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Yf=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$error,$last_id,$_link,$_db;function
connect($N,$V,$F){global$b;$l=$b->database();$pf=array();if($V!=""){$pf["username"]=$V;$pf["password"]=$F;}if($l!="")$pf["db"]=$l;try{$this->_link=@new
MongoClient("mongodb://$N",$pf);return
true;}catch(Exception$_c){$this->error=$_c->getMessage();return
false;}}function
query($G){return
false;}function
select_db($j){try{$this->_db=$this->_link->selectDB($j);return
true;}catch(Exception$_c){$this->error=$_c->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Vd){$J=array();foreach($Vd
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$be=array_keys($this->_rows[0]);$C=$be[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$bg="_id";function
select($R,$L,$Z,$ld,$rf=array(),$z=1,$E=0,$dg=false){$L=($L==array("*")?array():array_fill_keys($L,true));$kh=array();foreach($rf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Db);$kh[$X]=($Db?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$L)->sort($kh)->limit($z!=""?+$z:0)->skip($E*$z));}function
insert($R,$O){try{$I=$this->_conn->_db->selectCollection($R)->insert($O);$this->_conn->errno=$I['code'];$this->_conn->error=$I['err'];$this->_conn->last_id=$O['_id'];return!$I['err'];}catch(Exception$_c){$this->_conn->error=$_c->getMessage();return
false;}}}function
get_databases($Zc){global$f;$I=array();$Pb=$f->_link->listDBs();foreach($Pb['databases']as$l)$I[]=$l['name'];return$I;}function
count_tables($k){global$f;$I=array();foreach($k
as$l)$I[$l]=count($f->_link->selectDB($l)->getCollectionNames(true));return$I;}function
tables_list(){global$f;return
array_fill_keys($f->_db->getCollectionNames(true),'table');}function
drop_databases($k){global$f;foreach($k
as$l){$Dg=$f->_link->selectDB($l)->drop();if(!$Dg['ok'])return
false;}return
true;}function
indexes($R,$g=null){global$f;$I=array();foreach($f->_db->selectCollection($R)->getIndexInfo()as$v){$Wb=array();foreach($v["key"]as$d=>$U)$Wb[]=($U==-1?'1':null);$I[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$f;return$f->_db->selectCollection($_GET["select"])->count($Z);}$mf=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$error,$last_id;var$_link;var$_db,$_db_name;function
connect($N,$V,$F){global$b;$l=$b->database();$pf=array();if($V!=""){$pf["username"]=$V;$pf["password"]=$F;}if($l!="")$pf["db"]=$l;try{$jb='MongoDB\Driver\Manager';$this->_link=new$jb("mongodb://$N",$pf);return
true;}catch(Exception$_c){$this->error=$_c->getMessage();return
false;}}function
query($G){return
false;}function
select_db($j){try{$this->_db_name=$j;return
true;}catch(Exception$_c){$this->error=$_c->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($H){foreach($H
as$Vd){$J=array();foreach($Vd
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$J[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$J;foreach($J
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$H->count;}function
fetch_assoc(){$J=current($this->_rows);if(!$J)return$J;$I=array();foreach($this->_rows[0]as$y=>$X)$I[$y]=$J[$y];next($this->_rows);return$I;}function
fetch_row(){$I=$this->fetch_assoc();if(!$I)return$I;return
array_values($I);}function
fetch_field(){$be=array_keys($this->_rows[0]);$C=$be[$this->_offset++];return(object)array('name'=>$C,'charsetnr'=>$this->_charset[$C],);}}class
Min_Driver
extends
Min_SQL{public$bg="_id";function
select($R,$L,$Z,$ld,$rf=array(),$z=1,$E=0,$dg=false){global$f;$L=($L==array("*")?array():array_fill_keys($L,1));if(count($L)&&!isset($L['_id']))$L['_id']=0;$Z=where_to_query($Z);$kh=array();foreach($rf
as$X){$X=preg_replace('~ DESC$~','',$X,1,$Db);$kh[$X]=($Db?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$ih=$E*$z;$jb='MongoDB\Driver\Query';$G=new$jb($Z,array('projection'=>$L,'limit'=>$z,'skip'=>$ih,'sort'=>$kh));$Gg=$f->_link->executeQuery("$f->_db_name.$R",$G);return
new
Min_Result($Gg);}function
update($R,$O,$ng,$z=0,$M="\n"){global$f;$l=$f->_db_name;$Z=sql_query_where_parser($ng);$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());if(isset($O['_id']))unset($O['_id']);$Ag=array();foreach($O
as$y=>$Y){if($Y=='NULL'){$Ag[$y]=1;unset($O[$y]);}}$_i=array('$set'=>$O);if(count($Ag))$_i['$unset']=$Ag;$Ya->update($Z,$_i,array('upsert'=>false));$Gg=$f->_link->executeBulkWrite("$l.$R",$Ya);$f->affected_rows=$Gg->getModifiedCount();return
true;}function
delete($R,$ng,$z=0){global$f;$l=$f->_db_name;$Z=sql_query_where_parser($ng);$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());$Ya->delete($Z,array('limit'=>$z));$Gg=$f->_link->executeBulkWrite("$l.$R",$Ya);$f->affected_rows=$Gg->getDeletedCount();return
true;}function
insert($R,$O){global$f;$l=$f->_db_name;$jb='MongoDB\Driver\BulkWrite';$Ya=new$jb(array());if(isset($O['_id'])&&empty($O['_id']))unset($O['_id']);$Ya->insert($O);$Gg=$f->_link->executeBulkWrite("$l.$R",$Ya);$f->affected_rows=$Gg->getInsertedCount();return
true;}}function
get_databases($Zc){global$f;$I=array();$jb='MongoDB\Driver\Command';$sb=new$jb(array('listDatabases'=>1));$Gg=$f->_link->executeCommand('admin',$sb);foreach($Gg
as$Pb){foreach($Pb->databases
as$l)$I[]=$l->name;}return$I;}function
count_tables($k){$I=array();return$I;}function
tables_list(){global$f;$jb='MongoDB\Driver\Command';$sb=new$jb(array('listCollections'=>1));$Gg=$f->_link->executeCommand($f->_db_name,$sb);$qb=array();foreach($Gg
as$H)$qb[$H->name]='table';return$qb;}function
drop_databases($k){return
false;}function
indexes($R,$g=null){global$f;$I=array();$jb='MongoDB\Driver\Command';$sb=new$jb(array('listIndexes'=>$R));$Gg=$f->_link->executeCommand($f->_db_name,$sb);foreach($Gg
as$v){$Wb=array();$e=array();foreach(get_object_vars($v->key)as$d=>$U){$Wb[]=($U==-1?'1':null);$e[]=$d;}$I[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$e,"lengths"=>array(),"descs"=>$Wb,);}return$I;}function
fields($R){$p=fields_from_edit();if(!count($p)){global$m;$H=$m->select($R,array("*"),null,null,array(),10);while($J=$H->fetch_assoc()){foreach($J
as$y=>$X){$J[$y]=null;$p[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$p;}function
found_rows($S,$Z){global$f;$Z=where_to_query($Z);$jb='MongoDB\Driver\Command';$sb=new$jb(array('count'=>$S['Name'],'query'=>$Z));$Gg=$f->_link->executeCommand($f->_db_name,$sb);$ci=$Gg->toArray();return$ci[0]->n;}function
sql_query_where_parser($ng){$ng=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$ng));$ng=preg_replace('/\)\)\)$/',')',$ng);$Zi=explode(' AND ',$ng);$aj=explode(') OR (',$ng);$Z=array();foreach($Zi
as$Xi)$Z[]=trim($Xi);if(count($aj)==1)$aj=array();elseif(count($aj)>1)$Z=array();return
where_to_query($Z,$aj);}function
where_to_query($Vi=array(),$Wi=array()){global$mf;$Kb=array();foreach(array('and'=>$Vi,'or'=>$Wi)as$U=>$Z){if(is_array($Z)){foreach($Z
as$Gc){list($mb,$kf,$X)=explode(" ",$Gc,3);if($mb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$jb='MongoDB\BSON\ObjectID';$X=new$jb($X);}if(!in_array($kf,$mf))continue;if(preg_match('~^\(f\)(.+)~',$kf,$B)){$X=(float)$X;$kf=$B[1];}elseif(preg_match('~^\(date\)(.+)~',$kf,$B)){$Mb=new
DateTime($X);$jb='MongoDB\BSON\UTCDatetime';$X=new$jb($Mb->getTimestamp()*1000);$kf=$B[1];}switch($kf){case'=':$kf='$eq';break;case'!=':$kf='$ne';break;case'>':$kf='$gt';break;case'<':$kf='$lt';break;case'>=':$kf='$gte';break;case'<=':$kf='$lte';break;case'regex':$kf='$regex';break;default:continue;}if($U=='and')$Kb['$and'][]=array($mb=>array($kf=>$X));elseif($U=='or')$Kb['$or'][]=array($mb=>array($kf=>$X));}}}return$Kb;}$mf=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($C="",$Nc=false){$I=array();foreach(tables_list()as$R=>$U){$I[$R]=array("Name"=>$R);if($C==$R)return$I[$R];}return$I;}function
last_id(){global$f;return$f->last_id;}function
error(){global$f;return
h($f->error);}function
collations(){return
array();}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
alter_indexes($R,$c){global$f;foreach($c
as$X){list($U,$C,$O)=$X;if($O=="DROP")$I=$f->_db->command(array("deleteIndexes"=>$R,"index"=>$C));else{$e=array();foreach($O
as$d){$d=preg_replace('~ DESC$~','',$d,1,$Db);$e[$d]=($Db?-1:1);}$I=$f->_db->selectCollection($R)->ensureIndex($e,array("unique"=>($U=="UNIQUE"),"name"=>$C,));}if($I['errmsg']){$f->error=$I['errmsg'];return
false;}}return
true;}function
support($Oc){return
preg_match("~database|indexes~",$Oc);}function
db_collation($l,$pb){}function
information_schema(){}function
is_view($S){}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){global$f;if($R==""){$f->_db->createCollection($C);return
true;}}function
drop_tables($T){global$f;foreach($T
as$R){$Dg=$f->_db->selectCollection($R)->drop();if(!$Dg['ok'])return
false;}return
true;}function
truncate_tables($T){global$f;foreach($T
as$R){$Dg=$f->_db->selectCollection($R)->remove();if(!$Dg['ok'])return
false;}return
true;}$x="mongo";$id=array();$od=array();$lc=array(array("json"));}$dc["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Yf=array("json");define("DRIVER","elastic");if(function_exists('json_decode')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Pf,$zb=array(),$Ke='GET'){@ini_set('track_errors',1);$Sc=@file_get_contents("$this->_url/".ltrim($Pf,'/'),false,stream_context_create(array('http'=>array('method'=>$Ke,'content'=>$zb===null?$zb:json_encode($zb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$Sc){$this->error=$php_errormsg;return$Sc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$Sc;return
false;}$I=json_decode($Sc,true);if($I===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$yb=get_defined_constants(true);foreach($yb['json']as$C=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$C)){$this->error=$C;break;}}}}return$I;}function
query($Pf,$zb=array(),$Ke='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Pf,'/'),$zb,$Ke);}function
connect($N,$V,$F){preg_match('~^(https?://)?(.*)~',$N,$B);$this->_url=($B[1]?$B[1]:"http://")."$V:$F@$B[2]";$I=$this->query('');if($I)$this->server_info=$I['version']['number'];return(bool)$I;}function
select_db($j){$this->_db=$j;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($K){$this->num_rows=count($this->_rows);$this->_rows=$K;reset($this->_rows);}function
fetch_assoc(){$I=current($this->_rows);next($this->_rows);return$I;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$L,$Z,$ld,$rf=array(),$z=1,$E=0,$dg=false){global$b;$Kb=array();$G="$R/_search";if($L!=array("*"))$Kb["fields"]=$L;if($rf){$kh=array();foreach($rf
as$mb){$mb=preg_replace('~ DESC$~','',$mb,1,$Db);$kh[]=($Db?array($mb=>"desc"):$mb);}$Kb["sort"]=$kh;}if($z){$Kb["size"]=+$z;if($E)$Kb["from"]=($E*$z);}foreach($Z
as$X){list($mb,$kf,$X)=explode(" ",$X,3);if($mb=="_id")$Kb["query"]["ids"]["values"][]=$X;elseif($mb.$X!=""){$Ph=array("term"=>array(($mb!=""?$mb:"_all")=>$X));if($kf=="=")$Kb["query"]["filtered"]["filter"]["and"][]=$Ph;else$Kb["query"]["filtered"]["query"]["bool"]["must"][]=$Ph;}}if($Kb["query"]&&!$Kb["query"]["filtered"]["query"]&&!$Kb["query"]["ids"])$Kb["query"]["filtered"]["query"]=array("match_all"=>array());$th=microtime(true);$Tg=$this->_conn->query($G,$Kb);if($dg)echo$b->selectQuery("$G: ".print_r($Kb,true),$th,!$Tg);if(!$Tg)return
false;$I=array();foreach($Tg['hits']['hits']as$wd){$J=array();if($L==array("*"))$J["_id"]=$wd["_id"];$p=$wd['_source'];if($L!=array("*")){$p=array();foreach($L
as$y)$p[$y]=$wd['fields'][$y];}foreach($p
as$y=>$X){if($Kb["fields"])$X=$X[0];$J[$y]=(is_array($X)?json_encode($X):$X);}$I[]=$J;}return
new
Min_Result($I);}function
update($U,$sg,$ng){$Nf=preg_split('~ *= *~',$ng);if(count($Nf)==2){$t=trim($Nf[1]);$G="$U/$t";return$this->_conn->query($G,$sg,'POST');}return
false;}function
insert($U,$sg){$t="";$G="$U/$t";$Dg=$this->_conn->query($G,$sg,'POST');$this->_conn->last_id=$Dg['_id'];return$Dg['created'];}function
delete($U,$ng){$_d=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$_d[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$cb){$Nf=preg_split('~ *= *~',$cb);if(count($Nf)==2)$_d[]=trim($Nf[1]);}}$this->_conn->affected_rows=0;foreach($_d
as$t){$G="{$U}/{$t}";$Dg=$this->_conn->query($G,'{}','DELETE');if(is_array($Dg)&&$Dg['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2]))return$f;return$f->error;}function
support($Oc){return
preg_match("~database|table|columns~",$Oc);}function
logged_user(){global$b;$i=$b->credentials();return$i[1];}function
get_databases(){global$f;$I=$f->rootQuery('_aliases');if($I){$I=array_keys($I);sort($I,SORT_STRING);}return$I;}function
collations(){return
array();}function
db_collation($l,$pb){}function
engines(){return
array();}function
count_tables($k){global$f;$I=array();$H=$f->query('_stats');if($H&&$H['indices']){$Gd=$H['indices'];foreach($Gd
as$Fd=>$uh){$Ed=$uh['total']['indexing'];$I[$Fd]=$Ed['index_total'];}}return$I;}function
tables_list(){global$f;$I=$f->query('_mapping');if($I)$I=array_fill_keys(array_keys($I[$f->_db]["mappings"]),'table');return$I;}function
table_status($C="",$Nc=false){global$f;$Tg=$f->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$I=array();if($Tg){$T=$Tg["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$I[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($C!=""&&$C==$R["key"])return$I[$C];}}return$I;}function
error(){global$f;return
h($f->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$g=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$f;$H=$f->query("$R/_mapping");$I=array();if($H){$te=$H[$R]['properties'];if(!$te)$te=$H[$f->_db]['mappings'][$R]['properties'];if($te){foreach($te
as$C=>$o){$I[$C]=array("field"=>$C,"full_type"=>$o["type"],"type"=>$o["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($o["properties"]){unset($I[$C]["privileges"]["insert"]);unset($I[$C]["privileges"]["update"]);}}}}return$I;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($o){}function
unconvert_field($o,$I){return$I;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($l){global$f;return$f->rootQuery(urlencode($l),null,'PUT');}function
drop_databases($k){global$f;return$f->rootQuery(urlencode(implode(',',$k)),array(),'DELETE');}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){global$f;$jg=array();foreach($p
as$Lc){$Qc=trim($Lc[1][0]);$Rc=trim($Lc[1][1]?$Lc[1][1]:"text");$jg[$Qc]=array('type'=>$Rc);}if(!empty($jg))$jg=array('properties'=>$jg);return$f->query("_mapping/{$C}",$jg,'PUT');}function
drop_tables($T){global$f;$I=true;foreach($T
as$R)$I=$I&&$f->query(urlencode($R),array(),'DELETE');return$I;}function
last_id(){global$f;return$f->last_id;}$x="elastic";$mf=array("=","query");$id=array();$od=array();$lc=array(array("json"));$si=array();$xh=array();foreach(array('數字'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'日期時間'=>array("date"=>10),'字串'=>array("string"=>65535,"text"=>65535),'二進位'=>array("binary"=>255),)as$y=>$X){$si+=$X;$xh[$y]=array_keys($X);}}$dc=array("server"=>"MySQL")+$dc;if(!defined("DRIVER")){$Yf=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($N="",$V="",$F="",$j=null,$Uf=null,$jh=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($xd,$Uf)=explode(":",$N,2);$sh=$b->connectSsl();if($sh)$this->ssl_set($sh['key'],$sh['cert'],$sh['ca'],'','');$I=@$this->real_connect(($N!=""?$xd:ini_get("mysqli.default_host")),($N.$V!=""?$V:ini_get("mysqli.default_user")),($N.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$j,(is_numeric($Uf)?$Uf:ini_get("mysqli.default_port")),(!is_numeric($Uf)?$Uf:$jh),($sh?64:0));return$I;}function
set_charset($bb){if(parent::set_charset($bb))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $bb");}function
result($G,$o=0){$H=$this->query($G);if(!$H)return
false;$J=$H->fetch_array();return$J[$o];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!(ini_get("sql.safe_mode")&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($N,$V,$F){$this->_link=@mysql_connect(($N!=""?$N:ini_get("mysql.default_host")),("$N$V"!=""?$V:ini_get("mysql.default_user")),("$N$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($bb){if(function_exists('mysql_set_charset')){if(mysql_set_charset($bb,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $bb");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($j){return
mysql_select_db($j,$this->_link);}function
query($G,$ti=false){$H=@($ti?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$H){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($H===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($H);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$o=0){$H=$this->query($G);if(!$H||!$H->num_rows)return
false;return
mysql_result($H->_result,0,$o);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($H){$this->_result=$H;$this->num_rows=mysql_num_rows($H);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$I=mysql_fetch_field($this->_result,$this->_offset++);$I->orgtable=$I->table;$I->orgname=$I->name;$I->charsetnr=($I->blob?63:0);return$I;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($N,$V,$F){global$b;$pf=array();$sh=$b->connectSsl();if($sh)$pf=array(PDO::MYSQL_ATTR_SSL_KEY=>$sh['key'],PDO::MYSQL_ATTR_SSL_CERT=>$sh['cert'],PDO::MYSQL_ATTR_SSL_CA=>$sh['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\\d)~',';port=\\1',$N)),$V,$F,$pf);return
true;}function
set_charset($bb){$this->query("SET NAMES $bb");}function
select_db($j){return$this->query("USE ".idf_escape($j));}function
query($G,$ti=false){$this->setAttribute(1000,!$ti);return
parent::query($G,$ti);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$O){return($O?parent::insert($R,$O):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$K,$bg){$e=array_keys(reset($K));$Zf="INSERT INTO ".table($R)." (".implode(", ",$e).") VALUES\n";$Ki=array();foreach($e
as$y)$Ki[$y]="$y = VALUES($y)";$_h="\nON DUPLICATE KEY UPDATE ".implode(", ",$Ki);$Ki=array();$ne=0;foreach($K
as$O){$Y="(".implode(", ",$O).")";if($Ki&&(strlen($Zf)+$ne+strlen($Y)+strlen($_h)>1e6)){if(!queries($Zf.implode(",\n",$Ki).$_h))return
false;$Ki=array();$ne=0;}$Ki[]=$Y;$ne+=strlen($Y)+2;}return
queries($Zf.implode(",\n",$Ki).$_h);}function
convertSearch($u,$X,$o){return(preg_match('~char|text|enum|set~',$o["type"])&&!preg_match("~^utf8~",$o["collation"])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$H=$this->_conn->query("SHOW WARNINGS");if($H&&$H->num_rows){ob_start();select($H);return
ob_get_clean();}}function
tableHelp($C){$ue=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($ue?"information-schema-$C-table/":str_replace("_","-",$C)."-table.html"));if(DB=="mysql")return($ue?"mysql$C-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$si,$xh;$f=new
Min_DB;$i=$b->credentials();if($f->connect($i[0],$i[1],$i[2])){$f->set_charset(charset($f));$f->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$f)){$xh['字串'][]="json";$si["json"]=4294967295;}return$f;}$I=$f->error;if(function_exists('iconv')&&!is_utf8($I)&&strlen($Pg=iconv("windows-1250","utf-8",$I))>strlen($I))$I=$Pg;return$I;}function
get_databases($Zc){$I=get_session("dbs");if($I===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA":"SHOW DATABASES");$I=($Zc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$I);stop_session();}return$I;}function
limit($G,$Z,$z,$D=0,$M=" "){return" $G$Z".($z!==null?$M."LIMIT $z".($D?" OFFSET $D":""):"");}function
limit1($R,$G,$Z,$M="\n"){return
limit($G,$Z,1,0,$M);}function
db_collation($l,$pb){global$f;$I=null;$h=$f->result("SHOW CREATE DATABASE ".idf_escape($l),1);if(preg_match('~ COLLATE ([^ ]+)~',$h,$B))$I=$B[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$h,$B))$I=$pb[$B[1]][-1];return$I;}function
engines(){$I=array();foreach(get_rows("SHOW ENGINES")as$J){if(preg_match("~YES|DEFAULT~",$J["Support"]))$I[]=$J["Engine"];}return$I;}function
logged_user(){global$f;return$f->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($k){$I=array();foreach($k
as$l)$I[$l]=count(get_vals("SHOW TABLES IN ".idf_escape($l)));return$I;}function
table_status($C="",$Nc=false){$I=array();foreach(get_rows($Nc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($C!=""?"AND TABLE_NAME = ".q($C):"ORDER BY Name"):"SHOW TABLE STATUS".($C!=""?" LIKE ".q(addcslashes($C,"%_\\")):""))as$J){if($J["Engine"]=="InnoDB")$J["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\\1',$J["Comment"]);if(!isset($J["Engine"]))$J["Comment"]="";if($C!="")return$J;$I[$J["Name"]]=$J;}return$I;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$I=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$J){preg_match('~^([^( ]+)(?:\\((.+)\\))?( unsigned)?( zerofill)?$~',$J["Type"],$B);$I[$J["Field"]]=array("field"=>$J["Field"],"full_type"=>$J["Type"],"type"=>$B[1],"length"=>$B[2],"unsigned"=>ltrim($B[3].$B[4]),"default"=>($J["Default"]!=""||preg_match("~char|set~",$B[1])?$J["Default"]:null),"null"=>($J["Null"]=="YES"),"auto_increment"=>($J["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$J["Extra"],$B)?$B[1]:""),"collation"=>$J["Collation"],"privileges"=>array_flip(preg_split('~, *~',$J["Privileges"])),"comment"=>$J["Comment"],"primary"=>($J["Key"]=="PRI"),);}return$I;}function
indexes($R,$g=null){$I=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$g)as$J){$C=$J["Key_name"];$I[$C]["type"]=($C=="PRIMARY"?"PRIMARY":($J["Index_type"]=="FULLTEXT"?"FULLTEXT":($J["Non_unique"]?($J["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$I[$C]["columns"][]=$J["Column_name"];$I[$C]["lengths"][]=($J["Index_type"]=="SPATIAL"?null:$J["Sub_part"]);$I[$C]["descs"][]=null;}return$I;}function
foreign_keys($R){global$f,$hf;static$Rf='`(?:[^`]|``)+`';$I=array();$Eb=$f->result("SHOW CREATE TABLE ".table($R),1);if($Eb){preg_match_all("~CONSTRAINT ($Rf) FOREIGN KEY ?\\(((?:$Rf,? ?)+)\\) REFERENCES ($Rf)(?:\\.($Rf))? \\(((?:$Rf,? ?)+)\\)(?: ON DELETE ($hf))?(?: ON UPDATE ($hf))?~",$Eb,$xe,PREG_SET_ORDER);foreach($xe
as$B){preg_match_all("~$Rf~",$B[2],$lh);preg_match_all("~$Rf~",$B[5],$Mh);$I[idf_unescape($B[1])]=array("db"=>idf_unescape($B[4]!=""?$B[3]:$B[4]),"table"=>idf_unescape($B[4]!=""?$B[4]:$B[3]),"source"=>array_map('idf_unescape',$lh[0]),"target"=>array_map('idf_unescape',$Mh[0]),"on_delete"=>($B[6]?$B[6]:"RESTRICT"),"on_update"=>($B[7]?$B[7]:"RESTRICT"),);}}return$I;}function
adm_view($C){global$f;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\\s+AS\\s+~isU','',$f->result("SHOW CREATE VIEW ".table($C),1)));}function
collations(){$I=array();foreach(get_rows("SHOW COLLATION")as$J){if($J["Default"])$I[$J["Charset"]][-1]=$J["Collation"];else$I[$J["Charset"]][]=$J["Collation"];}ksort($I);foreach($I
as$y=>$X)asort($I[$y]);return$I;}function
information_schema($l){return(min_version(5)&&$l=="information_schema")||(min_version(5.5)&&$l=="performance_schema");}function
error(){global$f;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$f->error));}function
create_database($l,$ob){return
queries("CREATE DATABASE ".idf_escape($l).($ob?" COLLATE ".q($ob):""));}function
drop_databases($k){$I=apply_queries("DROP DATABASE",$k,'idf_escape');restart_session();set_session("dbs",null);return$I;}function
rename_database($C,$ob){$I=false;if(create_database($C,$ob)){$Bg=array();foreach(tables_list()as$R=>$U)$Bg[]=table($R)." TO ".idf_escape($C).".".table($R);$I=(!$Bg||queries("RENAME TABLE ".implode(", ",$Bg)));if($I)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$I;}function
auto_increment(){$Ma=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Ma="";break;}if($v["type"]=="PRIMARY")$Ma=" UNIQUE";}}return" AUTO_INCREMENT$Ma";}function
alter_table($R,$C,$p,$ad,$ub,$tc,$ob,$La,$Lf){$c=array();foreach($p
as$o)$c[]=($o[1]?($R!=""?($o[0]!=""?"CHANGE ".idf_escape($o[0]):"ADD"):" ")." ".implode($o[1]).($R!=""?$o[2]:""):"DROP ".idf_escape($o[0]));$c=array_merge($c,$ad);$P=($ub!==null?" COMMENT=".q($ub):"").($tc?" ENGINE=".q($tc):"").($ob?" COLLATE ".q($ob):"").($La!=""?" AUTO_INCREMENT=$La":"");if($R=="")return
queries("CREATE TABLE ".table($C)." (\n".implode(",\n",$c)."\n)$P$Lf");if($R!=$C)$c[]="RENAME TO ".table($C);if($P)$c[]=ltrim($P);return($c||$Lf?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$Lf):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Pi){return
queries("DROP VIEW ".implode(", ",array_map('table',$Pi)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Pi,$Mh){$Bg=array();foreach(array_merge($T,$Pi)as$R)$Bg[]=table($R)." TO ".idf_escape($Mh).".".table($R);return
queries("RENAME TABLE ".implode(", ",$Bg));}function
copy_tables($T,$Pi,$Mh){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$C=($Mh==DB?table("copy_$R"):idf_escape($Mh).".".table($R));if(!queries("\nDROP TABLE IF EXISTS $C")||!queries("CREATE TABLE $C LIKE ".table($R))||!queries("INSERT INTO $C SELECT * FROM ".table($R)))return
false;}foreach($Pi
as$R){$C=($Mh==DB?table("copy_$R"):idf_escape($Mh).".".table($R));$Oi=view($R);if(!queries("DROP VIEW IF EXISTS $C")||!queries("CREATE VIEW $C AS $Oi[select]"))return
false;}return
true;}function
trigger($C){if($C=="")return
array();$K=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($C));return
reset($K);}function
triggers($R){$I=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$J)$I[$J["Trigger"]]=array($J["Timing"],$J["Event"]);return$I;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($C,$U){global$f,$vc,$Ld,$si;$Ca=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$mh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$ri="((".implode("|",array_merge(array_keys($si),$Ca)).")\\b(?:\\s*\\(((?:[^'\")]|$vc)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Rf="$mh*(".($U=="FUNCTION"?"":$Ld).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$ri";$h=$f->result("SHOW CREATE $U ".idf_escape($C),2);preg_match("~\\(((?:$Rf\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$ri\\s+":"")."(.*)~is",$h,$B);$p=array();preg_match_all("~$Rf\\s*,?~is",$B[1],$xe,PREG_SET_ORDER);foreach($xe
as$Ef){$C=str_replace("``","`",$Ef[2]).$Ef[3];$p[]=array("field"=>$C,"type"=>strtolower($Ef[5]),"length"=>preg_replace_callback("~$vc~s",'normalize_enum',$Ef[6]),"unsigned"=>strtolower(preg_replace('~\\s+~',' ',trim("$Ef[8] $Ef[7]"))),"null"=>1,"full_type"=>$Ef[4],"inout"=>strtoupper($Ef[1]),"collation"=>strtolower($Ef[9]),);}if($U!="FUNCTION")return
array("fields"=>$p,"definition"=>$B[11]);return
array("fields"=>$p,"returns"=>array("type"=>$B[12],"length"=>$B[13],"unsigned"=>$B[15],"collation"=>$B[16]),"definition"=>$B[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($C,$J){return
idf_escape($C);}function
last_id(){global$f;return$f->result("SELECT LAST_INSERT_ID()");}function
explain($f,$G){return$f->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($Rg){return
true;}function
create_sql($R,$La,$yh){global$f;$I=$f->result("SHOW CREATE TABLE ".table($R),1);if(!$La)$I=preg_replace('~ AUTO_INCREMENT=\\d+~','',$I);return$I;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($j){return"USE ".idf_escape($j);}function
trigger_sql($R){$I="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$J)$I.="\nCREATE TRIGGER ".idf_escape($J["Trigger"])." $J[Timing] $J[Event] ON ".table($J["Table"])." FOR EACH ROW\n$J[Statement];;\n";return$I;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($o){if(preg_match("~binary~",$o["type"]))return"HEX(".idf_escape($o["field"]).")";if($o["type"]=="bit")return"BIN(".idf_escape($o["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($o["field"]).")";}function
unconvert_field($o,$I){if(preg_match("~binary~",$o["type"]))$I="UNHEX($I)";if($o["type"]=="bit")$I="CONV($I, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$o["type"]))$I=(min_version(8)?"ST_":"")."GeomFromText($I)";return$I;}function
support($Oc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view"))."~",$Oc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$f;return$f->result("SELECT @@max_connections");}$x="sql";$si=array();$xh=array();foreach(array('數字'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'日期時間'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'字串'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'列表'=>array("enum"=>65535,"set"=>64),'二進位'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'幾何'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$si+=$X;$xh[$y]=array_keys($X);}$zi=array("unsigned","zerofill","unsigned zerofill");$mf=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$id=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$od=array("avg","count","count distinct","group_concat","max","min","sum");$lc=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ia="4.6.2";class
Adminer{var$operators;function
name(){return"<a href='https://www.adminer.org/'".target_blank()." id='h1'>Adminer</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($h=false){return
password_file($h);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($N){return
h($N);}function
database(){return
DB;}function
databases($Zc=true){return
get_databases($Zc);}function
schemas(){return
schemas();}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$I=array();$Tc="adminer.css";if(file_exists($Tc))$I[]=$Tc;return$I;}function
loginForm(){global$dc;echo'<table cellspacing="0">
<tr><th>資料庫系統<td>',html_select("auth[driver]",$dc,DRIVER)."\n",'<tr><th>伺服器<td><input name="auth[server]" value="',h(SERVER),'" title="hostname[:port]" placeholder="localhost" autocapitalize="off">
<tr><th>帳號<td><input name="auth[username]" id="username" value="',h($_GET["username"]),'" autocapitalize="off">
<tr><th>密碼<td><input type="password" name="auth[password]">
<tr><th>資料庫<td><input name="auth[db]" value="',h($_GET["db"]),'" autocapitalize="off">
</table>
',script("focus(qs('#username'));"),"<p><input type='submit' value='".'登入'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'永久登入')."\n";}function
login($re,$F){global$x;if($x=="sqlite")return
sprintf('<a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to use SQLite.',target_blank(),'<code>login()</code>');return
true;}function
tableName($Dh){return
h($Dh["Name"]);}function
fieldName($o,$rf=0){return'<span title="'.h($o["full_type"]).'">'.h($o["field"]).'</span>';}function
selectLinks($Dh,$O=""){global$x,$m;echo'<p class="links">';$qe=array("select"=>'選擇資料');if(support("table")||support("indexes"))$qe["table"]='顯示結構';if(support("table")){if(is_view($Dh))$qe["view"]='修改檢視表';else$qe["create"]='修改資料表';}if($O!==null)$qe["edit"]='新增項目';$C=$Dh["Name"];foreach($qe
as$y=>$X)echo" <a href='".h(ME)."$y=".urlencode($C).($y=="edit"?$O:"")."'".bold(isset($_GET[$y])).">$X</a>";echo
doc_link(array($x=>$m->tableHelp($C)),"?"),"\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Ch){return
array();}function
backwardKeysPrint($Oa,$J){}function
selectQuery($G,$th,$Mc=false){global$x,$m;$I="</p>\n";if(!$Mc&&($Si=$m->warnings())){$t="warnings";$I=", <a href='#$t'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."$I<div id='$t' class='hidden'>\n$Si</div>\n";}return"<p><code class='jush-$x'>".h(str_replace("\n"," ",$G))."</code> <span class='time'>(".format_time($th).")</span>".(support("sql")?" <a href='".h(ME)."sql=".urlencode($G)."'>".'編輯'."</a>":"").$I;}function
sqlCommandQuery($G){return
shorten_utf8(trim($G),1000);}function
rowDescription($R){return"";}function
rowDescriptions($K,$bd){return$K;}function
selectLink($X,$o){}function
selectVal($X,$_,$o,$zf){$I=($X===null?"<i>NULL</i>":(preg_match("~char|binary|boolean~",$o["type"])&&!preg_match("~var~",$o["type"])?"<code>$X</code>":$X));if(preg_match('~blob|bytea|raw|file~',$o["type"])&&!is_utf8($X))$I="<i>".sprintf('%d byte(s)',strlen($zf))."</i>";if(preg_match('~json~',$o["type"]))$I="<code class='jush-js'>$I</code>";return($_?"<a href='".h($_)."'".(is_url($_)?target_blank():"").">$I</a>":$I);}function
editVal($X,$o){return$X;}function
tableStructurePrint($p){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr><th>".'列'."<td>".'類型'.(support("comment")?"<td>".'註解':"")."</thead>\n";foreach($p
as$o){echo"<tr".odd()."><th>".h($o["field"]),"<td><span title='".h($o["collation"])."'>".h($o["full_type"])."</span>",($o["null"]?" <i>NULL</i>":""),($o["auto_increment"]?" <i>".'自動遞增'."</i>":""),(isset($o["default"])?" <span title='".'Default value'."'>[<b>".h($o["default"])."</b>]</span>":""),(support("comment")?"<td>".nbsp($o["comment"]):""),"\n";}echo"</table>\n";}function
tableIndexesPrint($w){echo"<table cellspacing='0'>\n";foreach($w
as$C=>$v){ksort($v["columns"]);$dg=array();foreach($v["columns"]as$y=>$X)$dg[]="<i>".h($X)."</i>".($v["lengths"][$y]?"(".$v["lengths"][$y].")":"").($v["descs"][$y]?" DESC":"");echo"<tr title='".h($C)."'><th>$v[type]<td>".implode(", ",$dg)."\n";}echo"</table>\n";}function
selectColumnsPrint($L,$e){global$id,$od;print_fieldset("select",'選擇',$L);$s=0;$L[""]=array();foreach($L
as$y=>$X){$X=$_GET["columns"][$y];$d=select_input(" name='columns[$s][col]'",$e,$X["col"],($y!==""?"selectFieldChange":"selectAddRow"));echo"<div>".($id||$od?"<select name='columns[$s][fun]'>".optionlist(array(-1=>"")+array_filter(array('函數'=>$id,'集合'=>$od)),$X["fun"])."</select>".on_help("getTarget(event).value && getTarget(event).value.replace(/ |\$/, '(') + ')'",1).script("qsl('select').onchange = function () { helpClose();".($y!==""?"":" qsl('select, input', this.parentNode).onchange();")." };","")."($d)":$d)."</div>\n";$s++;}echo"</div></fieldset>\n";}function
selectSearchPrint($Z,$e,$w){print_fieldset("search",'搜尋',$Z);foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"){echo"<div>(<i>".implode("</i>, <i>",array_map('h',$v["columns"]))."</i>) AGAINST"," <input type='search' name='fulltext[$s]' value='".h($_GET["fulltext"][$s])."'>",script("qsl('input').oninput = selectFieldChange;",""),checkbox("boolean[$s]",1,isset($_GET["boolean"][$s]),"BOOL"),"</div>\n";}}$ab="this.parentNode.firstChild.onchange();";foreach(array_merge((array)$_GET["where"],array(array()))as$s=>$X){if(!$X||("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators))){echo"<div>".select_input(" name='where[$s][col]'",$e,$X["col"],($X?"selectFieldChange":"selectAddRow"),"(".'任意位置'.")"),html_select("where[$s][op]",$this->operators,$X["op"],$ab),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>",script("mixin(qsl('input'), {oninput: function () { $ab }, onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});",""),"</div>\n";}}echo"</div></fieldset>\n";}function
selectOrderPrint($rf,$e,$w){print_fieldset("sort",'排序',$rf);$s=0;foreach((array)$_GET["order"]as$y=>$X){if($X!=""){echo"<div>".select_input(" name='order[$s]'",$e,$X,"selectFieldChange"),checkbox("desc[$s]",1,isset($_GET["desc"][$y]),'降冪(遞減)')."</div>\n";$s++;}}echo"<div>".select_input(" name='order[$s]'",$e,"","selectAddRow"),checkbox("desc[$s]",1,false,'降冪(遞減)')."</div>\n","</div></fieldset>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'限定'."</legend><div>";echo"<input type='number' name='limit' class='size' value='".h($z)."'>",script("qsl('input').oninput = selectFieldChange;",""),"</div></fieldset>\n";}function
selectLengthPrint($Sh){if($Sh!==null){echo"<fieldset><legend>".'Text 長度'."</legend><div>","<input type='number' name='text_length' class='size' value='".h($Sh)."'>","</div></fieldset>\n";}}function
selectActionPrint($w){echo"<fieldset><legend>".'動作'."</legend><div>","<input type='submit' value='".'選擇'."'>"," <span id='noindex' title='".'Full table scan'."'></span>","<script".nonce().">\n","var indexColumns = ";$e=array();foreach($w
as$v){$Jb=reset($v["columns"]);if($v["type"]!="FULLTEXT"&&$Jb)$e[$Jb]=1;}$e[""]=1;foreach($e
as$y=>$X)json_row($y);echo";\n","selectFieldChange.call(qs('#form')['select']);\n","</script>\n","</div></fieldset>\n";}function
selectCommandPrint(){return!information_schema(DB);}function
selectImportPrint(){return!information_schema(DB);}function
selectEmailPrint($qc,$e){}function
selectColumnsProcess($e,$w){global$id,$od;$L=array();$ld=array();foreach((array)$_GET["columns"]as$y=>$X){if($X["fun"]=="count"||($X["col"]!=""&&(!$X["fun"]||in_array($X["fun"],$id)||in_array($X["fun"],$od)))){$L[$y]=apply_sql_function($X["fun"],($X["col"]!=""?idf_escape($X["col"]):"*"));if(!in_array($X["fun"],$od))$ld[]=$L[$y];}}return
array($L,$ld);}function
selectSearchProcess($p,$w){global$f,$m;$I=array();foreach($w
as$s=>$v){if($v["type"]=="FULLTEXT"&&$_GET["fulltext"][$s]!="")$I[]="MATCH (".implode(", ",array_map('idf_escape',$v["columns"])).") AGAINST (".q($_GET["fulltext"][$s]).(isset($_GET["boolean"][$s])?" IN BOOLEAN MODE":"").")";}foreach((array)$_GET["where"]as$y=>$X){if("$X[col]$X[val]"!=""&&in_array($X["op"],$this->operators)){$Zf="";$wb=" $X[op]";if(preg_match('~IN$~',$X["op"])){$Bd=process_length($X["val"]);$wb.=" ".($Bd!=""?$Bd:"(NULL)");}elseif($X["op"]=="SQL")$wb=" $X[val]";elseif($X["op"]=="LIKE %%")$wb=" LIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="ILIKE %%")$wb=" ILIKE ".$this->processInput($p[$X["col"]],"%$X[val]%");elseif($X["op"]=="FIND_IN_SET"){$Zf="$X[op](".q($X["val"]).", ";$wb=")";}elseif(!preg_match('~NULL$~',$X["op"]))$wb.=" ".$this->processInput($p[$X["col"]],$X["val"]);if($X["col"]!="")$I[]=$Zf.$m->convertSearch(idf_escape($X["col"]),$X,$p[$X["col"]]).$wb;else{$rb=array();foreach($p
as$C=>$o){if((is_numeric($X["val"])||!preg_match('~'.number_type().'|bit~',$o["type"]))&&(!preg_match("~[\x80-\xFF]~",$X["val"])||preg_match('~char|text|enum|set~',$o["type"])))$rb[]=$Zf.$m->convertSearch(idf_escape($C),$X,$o).$wb;}$I[]=($rb?"(".implode(" OR ",$rb).")":"1 = 0");}}}return$I;}function
selectOrderProcess($p,$w){$I=array();foreach((array)$_GET["order"]as$y=>$X){if($X!="")$I[]=(preg_match('~^((COUNT\\(DISTINCT |[A-Z0-9_]+\\()(`(?:[^`]|``)+`|"(?:[^"]|"")+")\\)|COUNT\\(\\*\\))$~',$X)?$X:idf_escape($X)).(isset($_GET["desc"][$y])?" DESC":"");}return$I;}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return(isset($_GET["text_length"])?$_GET["text_length"]:"100");}function
selectEmailProcess($Z,$bd){return
false;}function
selectQueryBuild($L,$Z,$ld,$rf,$z,$E){return"";}function
messageQuery($G,$Th,$Mc=false){global$x,$m;restart_session();$ud=&get_session("queries");if(!$ud[$_GET["db"]])$ud[$_GET["db"]]=array();if(strlen($G)>1e6)$G=preg_replace('~[\x80-\xFF]+$~','',substr($G,0,1e6))."\n...";$ud[$_GET["db"]][]=array($G,time(),$Th);$qh="sql-".count($ud[$_GET["db"]]);$I="<a href='#$qh' class='toggle'>".'SQL命令'."</a>\n";if(!$Mc&&($Si=$m->warnings())){$t="warnings-".count($ud[$_GET["db"]]);$I="<a href='#$t' class='toggle'>".'Warnings'."</a>, $I<div id='$t' class='hidden'>\n$Si</div>\n";}return" <span class='time'>".@date("H:i:s")."</span>"." $I<div id='$qh' class='hidden'><pre><code class='jush-$x'>".shorten_utf8($G,1000)."</code></pre>".($Th?" <span class='time'>($Th)</span>":'').(support("sql")?'<p><a href="'.h(str_replace("db=".urlencode(DB),"db=".urlencode($_GET["db"]),ME).'sql=&history='.(count($ud[$_GET["db"]])-1)).'">'.'編輯'.'</a>':'').'</div>';}function
editFunctions($o){global$lc;$I=($o["null"]?"NULL/":"");foreach($lc
as$y=>$id){if(!$y||(!isset($_GET["call"])&&(isset($_GET["select"])||where($_GET)))){foreach($id
as$Rf=>$X){if(!$Rf||preg_match("~$Rf~",$o["type"]))$I.="/$X";}if($y&&!preg_match('~set|blob|bytea|raw|file~',$o["type"]))$I.="/SQL";}}if($o["auto_increment"]&&!isset($_GET["select"])&&!where($_GET))$I='自動遞增';return
explode("/",$I);}function
editInput($R,$o,$Ja,$Y){if($o["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ja value='-1' checked><i>".'原始'."</i></label> ":"").($o["null"]?"<label><input type='radio'$Ja value=''".($Y!==null||isset($_GET["select"])?"":" checked")."><i>NULL</i></label> ":"").enum_input("radio",$Ja,$o,$Y,0);return"";}function
editHint($R,$o,$Y){return"";}function
processInput($o,$Y,$r=""){if($r=="SQL")return$Y;$C=$o["field"];$I=q($Y);if(preg_match('~^(now|getdate|uuid)$~',$r))$I="$r()";elseif(preg_match('~^current_(date|timestamp)$~',$r))$I=$r;elseif(preg_match('~^([+-]|\\|\\|)$~',$r))$I=idf_escape($C)." $r $I";elseif(preg_match('~^[+-] interval$~',$r))$I=idf_escape($C)." $r ".(preg_match("~^(\\d+|'[0-9.: -]') [A-Z_]+\$~i",$Y)?$Y:$I);elseif(preg_match('~^(addtime|subtime|concat)$~',$r))$I="$r(".idf_escape($C).", $I)";elseif(preg_match('~^(md5|sha1|password|encrypt)$~',$r))$I="$r($I)";return
unconvert_field($o,$I);}function
dumpOutput(){$I=array('text'=>'打開','file'=>'儲存');if(function_exists('gzencode'))$I['gz']='gzip';return$I;}function
dumpFormat(){return
array('sql'=>'SQL','csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($l){}function
dumpTable($R,$yh,$Ud=0){if($_POST["format"]!="sql"){echo"\xef\xbb\xbf";if($yh)dump_csv(array_keys(fields($R)));}else{if($Ud==2){$p=array();foreach(fields($R)as$C=>$o)$p[]=idf_escape($C)." $o[full_type]";$h="CREATE TABLE ".table($R)." (".implode(", ",$p).")";}else$h=create_sql($R,$_POST["auto_increment"],$yh);set_utf8mb4($h);if($yh&&$h){if($yh=="DROP+CREATE"||$Ud==1)echo"DROP ".($Ud==2?"VIEW":"TABLE")." IF EXISTS ".table($R).";\n";if($Ud==1)$h=remove_definer($h);echo"$h;\n\n";}}}function
dumpData($R,$yh,$G){global$f,$x;$ze=($x=="sqlite"?0:1048576);if($yh){if($_POST["format"]=="sql"){if($yh=="TRUNCATE+INSERT")echo
truncate_sql($R).";\n";$p=fields($R);}$H=$f->query($G,1);if($H){$Nd="";$Xa="";$be=array();$_h="";$Pc=($R!=''?'fetch_assoc':'fetch_row');while($J=$H->$Pc()){if(!$be){$Ki=array();foreach($J
as$X){$o=$H->fetch_field();$be[]=$o->name;$y=idf_escape($o->name);$Ki[]="$y = VALUES($y)";}$_h=($yh=="INSERT+UPDATE"?"\nON DUPLICATE KEY UPDATE ".implode(", ",$Ki):"").";\n";}if($_POST["format"]!="sql"){if($yh=="table"){dump_csv($be);$yh="INSERT";}dump_csv($J);}else{if(!$Nd)$Nd="INSERT INTO ".table($R)." (".implode(", ",array_map('idf_escape',$be)).") VALUES";foreach($J
as$y=>$X){$o=$p[$y];$J[$y]=($X!==null?unconvert_field($o,preg_match(number_type(),$o["type"])&&$X!=''?$X:q($X)):"NULL");}$Pg=($ze?"\n":" ")."(".implode(",\t",$J).")";if(!$Xa)$Xa=$Nd.$Pg;elseif(strlen($Xa)+4+strlen($Pg)+strlen($_h)<$ze)$Xa.=",$Pg";else{echo$Xa.$_h;$Xa=$Nd.$Pg;}}}if($Xa)echo$Xa.$_h;}elseif($_POST["format"]=="sql")echo"-- ".str_replace("\n"," ",$f->error)."\n";}}function
dumpFilename($zd){return
friendly_url($zd!=""?$zd:(SERVER!=""?SERVER:"localhost"));}function
dumpHeaders($zd,$Ne=false){$Bf=$_POST["output"];$Hc=(preg_match('~sql~',$_POST["format"])?"sql":($Ne?"tar":"csv"));header("Content-Type: ".($Bf=="gz"?"application/x-gzip":($Hc=="tar"?"application/x-tar":($Hc=="sql"||$Bf!="file"?"text/plain":"text/csv")."; charset=utf-8")));if($Bf=="gz")ob_start('ob_gzencode',1e6);return$Hc;}function
importServerPath(){return"adminer.sql";}function
homepage(){echo'<p class="links">'.($_GET["ns"]==""&&support("database")?'<a href="'.h(ME).'database=">'.'修改資料庫'."</a>\n":""),(support("scheme")?"<a href='".h(ME)."scheme='>".($_GET["ns"]!=""?'修改資料表結構':'建立資料表結構')."</a>\n":""),($_GET["ns"]!==""?'<a href="'.h(ME).'schema=">'.'資料庫架構'."</a>\n":""),(support("privileges")?"<a href='".h(ME)."privileges='>".'權限'."</a>\n":"");return
true;}function
navigation($Me){global$ia,$x,$dc,$f;echo'<h1>
',$this->name(),' <span class="version">',$ia,'</span>
<a href="https://www.adminer.org/#download"',target_blank(),' id="version">',(version_compare($ia,$_COOKIE["adminer_version"])<0?h($_COOKIE["adminer_version"]):""),'</a>
</h1>
';if($Me=="auth"){$Vc=true;foreach((array)$_SESSION["pwds"]as$Mi=>$dh){foreach($dh
as$N=>$Hi){foreach($Hi
as$V=>$F){if($F!==null){if($Vc){echo"<p id='logins'>".script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$Vc=false;}$Pb=$_SESSION["db"][$Mi][$N][$V];foreach(($Pb?array_keys($Pb):array(""))as$l)echo"<a href='".h(auth_url($Mi,$N,$V,$l))."'>($dc[$Mi]) ".h($V.($N!=""?"@".$this->serverName($N):"").($l!=""?" - $l":""))."</a><br>\n";}}}}}else{if($_GET["ns"]!==""&&!$Me&&DB!=""){$f->select_db(DB);$T=table_status('',true);}echo
script_src(preg_replace("~\\?.*~","",ME)."?file=jush.js&version=4.6.2");if(support("sql")){echo'<script',nonce(),'>
';if($T){$qe=array();foreach($T
as$R=>$U)$qe[]=preg_quote($R,'/');echo"var jushLinks = { $x: [ '".js_escape(ME).(support("table")?"table=":"select=")."\$&', /\\b(".implode("|",$qe).")\\b/g ] };\n";foreach(array("bac","bra","sqlite_quo","mssql_bra")as$X)echo"jushLinks.$X = jushLinks.$x;\n";}$ch=$f->server_info;echo'bodyLoad(\'',(is_object($f)?preg_replace('~^(\\d\\.?\\d).*~s','\\1',$ch):""),'\'',(preg_match('~MariaDB~',$ch)?", true":""),');
</script>
';}$this->databasesPrint($Me);if(DB==""||!$Me){echo"<p class='links'>".(support("sql")?"<a href='".h(ME)."sql='".bold(isset($_GET["sql"])&&!isset($_GET["import"])).">".'SQL命令'."</a>\n<a href='".h(ME)."import='".bold(isset($_GET["import"])).">".'匯入'."</a>\n":"")."";if(support("dump"))echo"<a href='".h(ME)."dump=".urlencode(isset($_GET["table"])?$_GET["table"]:$_GET["select"])."' id='dump'".bold(isset($_GET["dump"])).">".'匯出'."</a>\n";}if($_GET["ns"]!==""&&!$Me&&DB!=""){echo'<a href="'.h(ME).'create="'.bold($_GET["create"]==="").">".'建立資料表'."</a>\n";if(!$T)echo"<p class='message'>".'沒有資料表。'."\n";else$this->tablesPrint($T);}}}function
databasesPrint($Me){global$b,$f;$k=$this->databases();echo'<form action="">
<p id="dbs">
';hidden_fields_get();$Nb=script("mixin(qsl('select'), {onmousedown: dbMouseDown, onchange: dbChange});");echo"<span title='".'資料庫'."'>".'DB'."</span>: ".($k?"<select name='db'>".optionlist(array(""=>"")+$k,DB)."</select>$Nb":"<input name='db' value='".h(DB)."' autocapitalize='off'>\n"),"<input type='submit' value='".'使用'."'".($k?" class='hidden'":"").">\n";if($Me!="db"&&DB!=""&&$f->select_db(DB)){if(support("scheme")){echo"<br>".'資料表結構'.": <select name='ns'>".optionlist(array(""=>"")+$b->schemas(),$_GET["ns"])."</select>$Nb";if($_GET["ns"]!="")set_schema($_GET["ns"]);}}echo(isset($_GET["sql"])?'<input type="hidden" name="sql" value="">':(isset($_GET["schema"])?'<input type="hidden" name="schema" value="">':(isset($_GET["dump"])?'<input type="hidden" name="dump" value="">':(isset($_GET["privileges"])?'<input type="hidden" name="privileges" value="">':"")))),"</p></form>\n";}function
tablesPrint($T){echo"<ul id='tables'>".script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$R=>$P){$C=$this->tableName($P);if($C!=""){echo'<li><a href="'.h(ME).'select='.urlencode($R).'"'.bold($_GET["select"]==$R||$_GET["edit"]==$R,"select").">".'選擇'."</a> ",(support("table")||support("indexes")?'<a href="'.h(ME).'table='.urlencode($R).'"'.bold(in_array($R,array($_GET["table"],$_GET["create"],$_GET["indexes"],$_GET["foreign"],$_GET["trigger"])),(is_view($P)?"view":"structure"))." title='".'顯示結構'."'>$C</a>":"<span>$C</span>")."\n";}}echo"</ul>\n";}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);if($b->operators===null)$b->operators=$mf;function
page_header($Wh,$n="",$Wa=array(),$Xh=""){global$ca,$ia,$b,$dc,$x;page_headers();if(is_ajax()&&$n){page_messages($n);exit;}$Yh=$Wh.($Xh!=""?": $Xh":"");$Zh=strip_tags($Yh.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="zh-tw" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$Zh,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version=4.6.2"),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=4.6.2");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2"),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version=4.6.2"),'">
';foreach($b->css()as$Hb){echo'<link rel="stylesheet" type="text/css" href="',h($Hb),'">
';}}echo'
<body class="ltr nojs">
';$Tc=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($Tc)&&filemtime($Tc)+86400>time()){$Ni=unserialize(file_get_contents($Tc));$kg="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Ni["version"],base64_decode($Ni["signature"]),$kg)==1)$_COOKIE["adminer_version"]=$Ni["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ia', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('You are offline.'),'\';
var thousandsSeparator = \'',js_escape(','),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Wa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$dc[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$N=$b->serverName(SERVER);$N=($N!=""?$N:'伺服器');if($Wa===false)echo"$N\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$N</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Wa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Wa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Wa
as$y=>$X){$Vb=(is_array($X)?$X[1]:h($X));if($Vb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$Vb</a> &raquo; ";}}echo"$Wh\n";}}echo"<h2>$Yh</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($n);$k=&get_session("dbs");if(DB!=""&&$k&&!in_array(DB,$k,true))$k=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$Gb){$td=array();foreach($Gb
as$y=>$X)$td[]="$y $X";header("Content-Security-Policy: ".implode("; ",$td));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"https://www.adminer.org","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$We;if(!$We)$We=base64_encode(rand_string());return$We;}function
page_messages($n){$Ai=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Ie=$_SESSION["messages"][$Ai];if($Ie){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Ie)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Ai]);}if($n)echo"<div class='error'>$n</div>\n";}function
page_footer($Me=""){global$b,$di;echo'</div>

';if($Me!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="登出" id="logout">
<input type="hidden" name="token" value="',$di,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Me);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Pe){while($Pe>=2147483648)$Pe-=4294967296;while($Pe<=-2147483649)$Pe+=4294967296;return(int)$Pe;}function
long2str($W,$Ri){$Pg='';foreach($W
as$X)$Pg.=pack('V',$X);if($Ri)return
substr($Pg,0,end($W));return$Pg;}function
str2long($Pg,$Ri){$W=array_values(unpack('V*',str_pad($Pg,4*ceil(strlen($Pg)/4),"\0")));if($Ri)$W[]=strlen($Pg);return$W;}function
xxtea_mx($ej,$dj,$Ah,$Xd){return
int32((($ej>>5&0x7FFFFFF)^$dj<<2)+(($dj>>3&0x1FFFFFFF)^$ej<<4))^int32(($Ah^$dj)+($Xd^$ej));}function
encrypt_string($wh,$y){if($wh=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($wh,true);$Pe=count($W)-1;$ej=$W[$Pe];$dj=$W[0];$lg=floor(6+52/($Pe+1));$Ah=0;while($lg-->0){$Ah=int32($Ah+0x9E3779B9);$kc=$Ah>>2&3;for($Cf=0;$Cf<$Pe;$Cf++){$dj=$W[$Cf+1];$Oe=xxtea_mx($ej,$dj,$Ah,$y[$Cf&3^$kc]);$ej=int32($W[$Cf]+$Oe);$W[$Cf]=$ej;}$dj=$W[0];$Oe=xxtea_mx($ej,$dj,$Ah,$y[$Cf&3^$kc]);$ej=int32($W[$Pe]+$Oe);$W[$Pe]=$ej;}return
long2str($W,false);}function
decrypt_string($wh,$y){if($wh=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($wh,false);$Pe=count($W)-1;$ej=$W[$Pe];$dj=$W[0];$lg=floor(6+52/($Pe+1));$Ah=int32($lg*0x9E3779B9);while($Ah){$kc=$Ah>>2&3;for($Cf=$Pe;$Cf>0;$Cf--){$ej=$W[$Cf-1];$Oe=xxtea_mx($ej,$dj,$Ah,$y[$Cf&3^$kc]);$dj=int32($W[$Cf]-$Oe);$W[$Cf]=$dj;}$ej=$W[$Pe];$Oe=xxtea_mx($ej,$dj,$Ah,$y[$Cf&3^$kc]);$dj=int32($W[0]-$Oe);$W[0]=$dj;$Ah=int32($Ah-0x9E3779B9);}return
long2str($W,true);}$f='';$sd=$_SESSION["token"];if(!$sd)$_SESSION["token"]=rand(1,1e6);$di=get_token();$Sf=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Sf[$y]=$X;}}function
add_invalid_login(){global$b;$gd=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$gd)return;$Qd=unserialize(stream_get_contents($gd));$Th=time();if($Qd){foreach($Qd
as$Rd=>$X){if($X[0]<$Th)unset($Qd[$Rd]);}}$Pd=&$Qd[$b->bruteForceKey()];if(!$Pd)$Pd=array($Th+30*60,0);$Pd[1]++;file_write_unlock($gd,serialize($Qd));}function
check_invalid_login(){global$b;$Qd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$Pd=$Qd[$b->bruteForceKey()];$Ve=($Pd[1]>29?$Pd[0]-time():0);if($Ve>0)auth_error(sprintf('Too many unsuccessful logins, try again in %d minute(s).',ceil($Ve/60)));}$Ka=$_POST["auth"];if($Ka){session_regenerate_id();$Mi=$Ka["driver"];$N=$Ka["server"];$V=$Ka["username"];$F=(string)$Ka["password"];$l=$Ka["db"];set_password($Mi,$N,$V,$F);$_SESSION["db"][$Mi][$N][$V][$l]=true;if($Ka["permanent"]){$y=base64_encode($Mi)."-".base64_encode($N)."-".base64_encode($V)."-".base64_encode($l);$eg=$b->permanentLogin(true);$Sf[$y]="$y:".base64_encode($eg?encrypt_string($F,$eg):"");adm_cookie("adminer_permanent",implode(" ",$Sf));}if(count($_POST)==1||DRIVER!=$Mi||SERVER!=$N||$_GET["username"]!==$V||DB!=$l)adm_redirect(auth_url($Mi,$N,$V,$l));}elseif($_POST["logout"]){if($sd&&!verify_token()){page_header('登出','無效的 CSRF token。請重新發送表單。');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();adm_redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'成功登出。');}}elseif($Sf&&!$_SESSION["pwds"]){session_regenerate_id();$eg=$b->permanentLogin();foreach($Sf
as$y=>$X){list(,$ib)=explode(":",$X);list($Mi,$N,$V,$l)=array_map('base64_decode',explode("-",$y));set_password($Mi,$N,$V,decrypt_string(base64_decode($ib),$eg));$_SESSION["db"][$Mi][$N][$V][$l]=true;}}function
unset_permanent(){global$Sf;foreach($Sf
as$y=>$X){list($Mi,$N,$V,$l)=array_map('base64_decode',explode("-",$y));if($Mi==DRIVER&&$N==SERVER&&$V==$_GET["username"]&&$l==DB)unset($Sf[$y]);}adm_cookie("adminer_permanent",implode(" ",$Sf));}function
auth_error($n){global$b,$sd;$eh=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$eh]||$_GET[$eh])&&!$sd)$n='Session 已過期，請重新登入。';else{add_invalid_login();$F=get_password();if($F!==null){if($F===false)$n.='<br>'.sprintf('Master password expired. <a href="https://www.adminer.org/en/extension/"%s>Implement</a> %s method to make it permanent.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$eh]&&$_GET[$eh]&&ini_bool("session.use_only_cookies"))$n='Session 必須被啟用。';$Ff=session_get_cookie_params();adm_cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$Ff["lifetime"]);page_header('登入',$n,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])){if(!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('無擴充模組',sprintf('沒有任何支援的PHP擴充模組（%s）。',implode(", ",$Yf)),false);page_footer("auth");exit;}list($xd,$Uf)=explode(":",SERVER,2);if(is_numeric($Uf)&&$Uf<1024)auth_error('Connecting to privileged ports is not allowed.');check_invalid_login();$f=connect();$m=new
Min_Driver($f);}$re=null;if(!is_object($f)||($re=$b->login($_GET["username"],get_password()))!==true)auth_error((is_string($f)?h($f):(is_string($re)?$re:'無效的憑證。')));if($Ka&&$_POST["token"])$_POST["token"]=$di;$n='';if($_POST){if(!verify_token()){$Kd="max_input_vars";$Ce=ini_get($Kd);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Ce||$X<$Ce)){$Kd=$y;$Ce=$X;}}}$n=(!$_POST["token"]&&$Ce?sprintf('超過允許的字段數量的最大值。請增加%s。',"'$Kd'"):'無效的 CSRF token。請重新發送表單。'.' '.'If you did not send this request from Adminer then close this page.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$n=sprintf('POST 資料太大。減少資料或者增加 %s 的設定值。',"'post_max_size'");if(isset($_GET["sql"]))$n.=' '.'You can upload a big SQL file via FTP and import it from server.';}if(!ini_bool("session.use_cookies")||@ini_set("session.use_cookies",false)!==false)session_write_close();function
select($H,$g=null,$uf=array(),$z=0){global$x;$qe=array();$w=array();$e=array();$Ta=array();$si=array();$I=array();odd('');for($s=0;(!$z||$s<$z)&&($J=$H->fetch_row());$s++){if(!$s){echo"<table cellspacing='0' class='nowrap'>\n","<thead><tr>";for($Wd=0;$Wd<count($J);$Wd++){$o=$H->fetch_field();$C=$o->name;$tf=$o->orgtable;$sf=$o->orgname;$I[$o->table]=$tf;if($uf&&$x=="sql")$qe[$Wd]=($C=="table"?"table=":($C=="possible_keys"?"indexes=":null));elseif($tf!=""){if(!isset($w[$tf])){$w[$tf]=array();foreach(indexes($tf,$g)as$v){if($v["type"]=="PRIMARY"){$w[$tf]=array_flip($v["columns"]);break;}}$e[$tf]=$w[$tf];}if(isset($e[$tf][$sf])){unset($e[$tf][$sf]);$w[$tf][$sf]=$Wd;$qe[$Wd]=$tf;}}if($o->charsetnr==63)$Ta[$Wd]=true;$si[$Wd]=$o->type;echo"<th".($tf!=""||$o->name!=$sf?" title='".h(($tf!=""?"$tf.":"").$sf)."'":"").">".h($C).($uf?doc_link(array('sql'=>"explain-output.html#explain_".strtolower($C),'mariadb'=>"explain/#the-columns-in-explain-select",)):"");}echo"</thead>\n";}echo"<tr".odd().">";foreach($J
as$y=>$X){if($X===null)$X="<i>NULL</i>";elseif($Ta[$y]&&!is_utf8($X))$X="<i>".sprintf('%d byte(s)',strlen($X))."</i>";elseif(!strlen($X))$X="&nbsp;";else{$X=h($X);if($si[$y]==254)$X="<code>$X</code>";}if(isset($qe[$y])&&!$e[$qe[$y]]){if($uf&&$x=="sql"){$R=$J[array_search("table=",$qe)];$_=$qe[$y].urlencode($uf[$R]!=""?$uf[$R]:$R);}else{$_="edit=".urlencode($qe[$y]);foreach($w[$qe[$y]]as$mb=>$Wd)$_.="&where".urlencode("[".bracket_escape($mb)."]")."=".urlencode($J[$Wd]);}$X="<a href='".h(ME.$_)."'>$X</a>";}echo"<td>$X";}}echo($s?"</table>":"<p class='message'>".'沒有行。')."\n";return$I;}function
referencable_primary($Yg){$I=array();foreach(table_status('',true)as$Eh=>$R){if($Eh!=$Yg&&fk_support($R)){foreach(fields($Eh)as$o){if($o["primary"]){if($I[$Eh]){unset($I[$Eh]);break;}$I[$Eh]=$o;}}}}return$I;}function
textarea($C,$Y,$K=10,$rb=80){global$x;echo"<textarea name='$C' rows='$K' cols='$rb' class='sqlarea jush-$x' spellcheck='false' wrap='off'>";if(is_array($Y)){foreach($Y
as$X)echo
h($X[0])."\n\n\n";}else
echo
h($Y);echo"</textarea>";}function
edit_type($y,$o,$pb,$cd=array(),$Kc=array()){global$xh,$si,$zi,$hf;$U=$o["type"];echo'<td><select name="',h($y),'[type]" class="type" aria-labelledby="label-type">';if($U&&!isset($si[$U])&&!isset($cd[$U])&&!in_array($U,$Kc))$Kc[]=$U;if($cd)$xh['外來鍵']=$cd;echo
optionlist(array_merge($Kc,$xh),$U),'</select>
',on_help("getTarget(event).value",1),script("mixin(qsl('select'), {onfocus: function () { lastType = selectValue(this); }, onchange: editingTypeChange});",""),'<td><input name="',h($y),'[length]" value="',h($o["length"]),'" size="3"',(!$o["length"]&&preg_match('~var(char|binary)$~',$U)?" class='required'":""),' aria-labelledby="label-length">',script("mixin(qsl('input'), {onfocus: editingLengthFocus, oninput: editingLengthChange});",""),'<td class="options">';echo"<select name='".h($y)."[collation]'".(preg_match('~(char|text|enum|set)$~',$U)?"":" class='hidden'").'><option value="">('.'校對'.')'.optionlist($pb,$o["collation"]).'</select>',($zi?"<select name='".h($y)."[unsigned]'".(!$U||preg_match(number_type(),$U)?"":" class='hidden'").'><option>'.optionlist($zi,$o["unsigned"]).'</select>':''),(isset($o['on_update'])?"<select name='".h($y)."[on_update]'".(preg_match('~timestamp|datetime~',$U)?"":" class='hidden'").'>'.optionlist(array(""=>"(".'ON UPDATE'.")","CURRENT_TIMESTAMP"),$o["on_update"]).'</select>':''),($cd?"<select name='".h($y)."[on_delete]'".(preg_match("~`~",$U)?"":" class='hidden'")."><option value=''>(".'ON DELETE'.")".optionlist(explode("|",$hf),$o["on_delete"])."</select> ":" ");}function
process_length($ne){global$vc;return(preg_match("~^\\s*\\(?\\s*$vc(?:\\s*,\\s*$vc)*+\\s*\\)?\\s*\$~",$ne)&&preg_match_all("~$vc~",$ne,$xe)?"(".implode(",",$xe[0]).")":preg_replace('~^[0-9].*~','(\0)',preg_replace('~[^-0-9,+()[\]]~','',$ne)));}function
process_type($o,$nb="COLLATE"){global$zi;return" $o[type]".process_length($o["length"]).(preg_match(number_type(),$o["type"])&&in_array($o["unsigned"],$zi)?" $o[unsigned]":"").(preg_match('~char|text|enum|set~',$o["type"])&&$o["collation"]?" $nb ".q($o["collation"]):"");}function
process_field($o,$qi){return
array(idf_escape(trim($o["field"])),process_type($qi),($o["null"]?" NULL":" NOT NULL"),default_value($o),(preg_match('~timestamp|datetime~',$o["type"])&&$o["on_update"]?" ON UPDATE $o[on_update]":""),(support("comment")&&$o["comment"]!=""?" COMMENT ".q($o["comment"]):""),($o["auto_increment"]?auto_increment():null),);}function
default_value($o){$Rb=$o["default"];return($Rb===null?"":" DEFAULT ".(preg_match('~char|binary|text|enum|set~',$o["type"])||preg_match('~^(?![a-z])~i',$Rb)?q($Rb):$Rb));}function
type_class($U){foreach(array('char'=>'text','date'=>'time|year','binary'=>'blob','enum'=>'set',)as$y=>$X){if(preg_match("~$y|$X~",$U))return" class='$y'";}}function
edit_fields($p,$pb,$U="TABLE",$cd=array(),$vb=false){global$Ld;$p=array_values($p);echo'<thead><tr>
';if($U=="PROCEDURE"){echo'<td>&nbsp;';}echo'<th id="label-name">',($U=="TABLE"?'列名':'參數名稱'),'<td id="label-type">類型<textarea id="enum-edit" rows="4" cols="12" wrap="off" style="display: none;"></textarea>',script("qs('#enum-edit').onblur = editingLengthBlur;"),'<td id="label-length">長度
<td>','選項';if($U=="TABLE"){echo'<td id="label-null">NULL
<td><input type="radio" name="auto_increment_col" value=""><acronym id="label-ai" title="自動遞增">AI</acronym>',doc_link(array('sql'=>"example-auto-increment.html",'mariadb'=>"auto_increment/",'sqlite'=>"autoinc.html",'pgsql'=>"datatype.html#DATATYPE-SERIAL",'mssql'=>"ms186775.aspx",)),'<td id="label-default">Default value
',(support("comment")?"<td id='label-comment'".($vb?"":" class='hidden'").">".'註解':"");}echo'<td>',"<input type='image' class='icon' name='add[".(support("move_col")?0:count($p))."]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.2")."' alt='+' title='".'新增下一筆'."'>".script("row_count = ".count($p).";"),'</thead>
<tbody>
',script("mixin(qsl('tbody'), {onclick: editingClick, onkeydown: editingKeydown, oninput: editingInput});");foreach($p
as$s=>$o){$s++;$vf=$o[($_POST?"orig":"field")];$Zb=(isset($_POST["add"][$s-1])||(isset($o["field"])&&!$_POST["drop_col"][$s]))&&(support("drop_col")||$vf=="");echo'<tr',($Zb?"":" style='display: none;'"),'>
',($U=="PROCEDURE"?"<td>".html_select("fields[$s][inout]",explode("|",$Ld),$o["inout"]):""),'<th>';if($Zb){echo'<input name="fields[',$s,'][field]" value="',h($o["field"]),'" maxlength="64" autocapitalize="off" aria-labelledby="label-name">',script("qsl('input').oninput = function () { editingNameChange.call(this);".($o["field"]!=""||count($p)>1?"":" editingAddRow.call(this);")." };","");}echo'<input type="hidden" name="fields[',$s,'][orig]" value="',h($vf),'">
';edit_type("fields[$s]",$o,$pb,$cd);if($U=="TABLE"){echo'<td>',checkbox("fields[$s][null]",1,$o["null"],"","","block","label-null"),'<td><label class="block"><input type="radio" name="auto_increment_col" value="',$s,'"';if($o["auto_increment"]){echo' checked';}echo' aria-labelledby="label-ai"></label><td>',checkbox("fields[$s][has_default]",1,$o["has_default"],"","","","label-default"),'<input name="fields[',$s,'][default]" value="',h($o["default"]),'" aria-labelledby="label-default">',(support("comment")?"<td".($vb?"":" class='hidden'")."><input name='fields[$s][comment]' value='".h($o["comment"])."' maxlength='".(min_version(5.5)?1024:255)."' aria-labelledby='label-comment'>":"");}echo"<td>",(support("move_col")?"<input type='image' class='icon' name='add[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.2")."' alt='+' title='".'新增下一筆'."'>&nbsp;"."<input type='image' class='icon' name='up[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=up.gif&version=4.6.2")."' alt='↑' title='".'上移'."'>&nbsp;"."<input type='image' class='icon' name='down[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=down.gif&version=4.6.2")."' alt='↓' title='".'下移'."'>&nbsp;":""),($vf==""||support("drop_col")?"<input type='image' class='icon' name='drop_col[$s]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.6.2")."' alt='x' title='".'移除'."'>":"");}}function
process_fields(&$p){$D=0;if($_POST["up"]){$he=0;foreach($p
as$y=>$o){if(key($_POST["up"])==$y){unset($p[$y]);array_splice($p,$he,0,array($o));break;}if(isset($o["field"]))$he=$D;$D++;}}elseif($_POST["down"]){$ed=false;foreach($p
as$y=>$o){if(isset($o["field"])&&$ed){unset($p[key($_POST["down"])]);array_splice($p,$D,0,array($ed));break;}if(key($_POST["down"])==$y)$ed=$o;$D++;}}elseif($_POST["add"]){$p=array_values($p);array_splice($p,key($_POST["add"]),0,array(array()));}elseif(!$_POST["drop_col"])return
false;return
true;}function
normalize_enum($B){return"'".str_replace("'","''",addcslashes(stripcslashes(str_replace($B[0][0].$B[0][0],$B[0][0],substr($B[0],1,-1))),'\\'))."'";}function
grant($jd,$gg,$e,$gf){if(!$gg)return
true;if($gg==array("ALL PRIVILEGES","GRANT OPTION"))return($jd=="GRANT"?queries("$jd ALL PRIVILEGES$gf WITH GRANT OPTION"):queries("$jd ALL PRIVILEGES$gf")&&queries("$jd GRANT OPTION$gf"));return
queries("$jd ".preg_replace('~(GRANT OPTION)\\([^)]*\\)~','\\1',implode("$e, ",$gg).$e).$gf);}function
drop_create($ec,$h,$fc,$Qh,$hc,$A,$He,$Fe,$Ge,$df,$Se){if($_POST["drop"])query_redirect($ec,$A,$He);elseif($df=="")query_redirect($h,$A,$Ge);elseif($df!=$Se){$Fb=queries($h);queries_redirect($A,$Fe,$Fb&&queries($ec));if($Fb)queries($fc);}else
queries_redirect($A,$Fe,queries($Qh)&&queries($hc)&&queries($ec)&&queries($h));}function
create_trigger($gf,$J){global$x;$Vh=" $J[Timing] $J[Event]".($J["Event"]=="UPDATE OF"?" ".idf_escape($J["Of"]):"");return"CREATE TRIGGER ".idf_escape($J["Trigger"]).($x=="mssql"?$gf.$Vh:$Vh.$gf).rtrim(" $J[Type]\n$J[Statement]",";").";";}function
create_routine($Lg,$J){global$Ld,$x;$O=array();$p=(array)$J["fields"];ksort($p);foreach($p
as$o){if($o["field"]!="")$O[]=(preg_match("~^($Ld)\$~",$o["inout"])?"$o[inout] ":"").idf_escape($o["field"]).process_type($o,"CHARACTER SET");}$Sb=rtrim("\n$J[definition]",";");return"CREATE $Lg ".idf_escape(trim($J["name"]))." (".implode(", ",$O).")".(isset($_GET["function"])?" RETURNS".process_type($J["returns"],"CHARACTER SET"):"").($J["language"]?" LANGUAGE $J[language]":"").($x=="pgsql"?" AS ".q($Sb):"$Sb;");}function
remove_definer($G){return
preg_replace('~^([A-Z =]+) DEFINER=`'.preg_replace('~@(.*)~','`@`(%|\\1)',logged_user()).'`~','\\1',$G);}function
format_foreign_key($q){global$hf;return" FOREIGN KEY (".implode(", ",array_map('idf_escape',$q["source"])).") REFERENCES ".table($q["table"])." (".implode(", ",array_map('idf_escape',$q["target"])).")".(preg_match("~^($hf)\$~",$q["on_delete"])?" ON DELETE $q[on_delete]":"").(preg_match("~^($hf)\$~",$q["on_update"])?" ON UPDATE $q[on_update]":"");}function
tar_file($Tc,$ai){$I=pack("a100a8a8a8a12a12",$Tc,644,0,0,decoct($ai->size),decoct(time()));$gb=8*32;for($s=0;$s<strlen($I);$s++)$gb+=ord($I[$s]);$I.=sprintf("%06o",$gb)."\0 ";echo$I,str_repeat("\0",512-strlen($I));$ai->send();echo
str_repeat("\0",511-($ai->size+511)%512);}function
ini_bytes($Kd){$X=ini_get($Kd);switch(strtolower(substr($X,-1))){case'g':$X*=1024;case'm':$X*=1024;case'k':$X*=1024;}return$X;}function
doc_link($Qf,$Rh="<sup>?</sup>"){global$x,$f;$ch=$f->server_info;$Ni=preg_replace('~^(\\d\\.?\\d).*~s','\\1',$ch);$Di=array('sql'=>"https://dev.mysql.com/doc/refman/$Ni/en/",'sqlite'=>"https://www.sqlite.org/",'pgsql'=>"https://www.postgresql.org/docs/$Ni/static/",'mssql'=>"https://msdn.microsoft.com/library/",'oracle'=>"https://download.oracle.com/docs/cd/B19306_01/server.102/b14200/",);if(preg_match('~MariaDB~',$ch)){$Di['sql']="https://mariadb.com/kb/en/library/";$Qf['sql']=(isset($Qf['mariadb'])?$Qf['mariadb']:str_replace(".html","/",$Qf['sql']));}return($Qf[$x]?"<a href='$Di[$x]$Qf[$x]'".target_blank().">$Rh</a>":"");}function
ob_gzencode($Q){return
gzencode($Q);}function
db_size($l){global$f;if(!$f->select_db($l))return"?";$I=0;foreach(table_status()as$S)$I+=$S["Data_length"]+$S["Index_length"];return
format_number($I);}function
set_utf8mb4($h){global$f;static$O=false;if(!$O&&preg_match('~\butf8mb4~i',$h)){$O=true;echo"SET NAMES ".charset($f).";\n\n";}}function
connect_error(){global$b,$f,$di,$n,$dc;if(DB!=""){header("HTTP/1.1 404 Not Found");page_header('資料庫'.": ".h(DB),'無效的資料庫。',true);}else{if($_POST["db"]&&!$n)queries_redirect(substr(ME,0,-1),'資料庫已刪除。',drop_databases($_POST["db"]));page_header('選擇資料庫',$n,false);echo"<p class='links'>\n";foreach(array('database'=>'建立資料庫','privileges'=>'權限','processlist'=>'處理程序列表','variables'=>'變數','status'=>'狀態',)as$y=>$X){if(support($y))echo"<a href='".h(ME)."$y='>$X</a>\n";}echo"<p>".sprintf('%s版本：%s 透過PHP擴充模組 %s',$dc[DRIVER],"<b>".h($f->server_info)."</b>","<b>$f->extension</b>")."\n","<p>".sprintf('登錄為：%s',"<b>".h(logged_user())."</b>")."\n";$k=$b->databases();if($k){$Sg=support("scheme");$pb=collations();echo"<form action='' method='post'>\n","<table cellspacing='0' class='checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),"<thead><tr>".(support("database")?"<td>&nbsp;":"")."<th>".'資料庫'." - <a href='".h(ME)."refresh=1'>".'重新載入'."</a>"."<td>".'校對'."<td>".'資料表'."<td>".'Size'." - <a href='".h(ME)."dbsize=1'>".'Compute'."</a>".script("qsl('a').onclick = partial(ajaxSetHtml, '".js_escape(ME)."script=connect');","")."</thead>\n";$k=($_GET["dbsize"]?count_tables($k):array_flip($k));foreach($k
as$l=>$T){$Kg=h(ME)."db=".urlencode($l);$t=h("Db-".$l);echo"<tr".odd().">".(support("database")?"<td>".checkbox("db[]",$l,in_array($l,(array)$_POST["db"]),"","","",$t):""),"<th><a href='$Kg' id='$t'>".h($l)."</a>";$ob=nbsp(db_collation($l,$pb));echo"<td>".(support("database")?"<a href='$Kg".($Sg?"&amp;ns=":"")."&amp;database=' title='".'修改資料庫'."'>$ob</a>":$ob),"<td align='right'><a href='$Kg&amp;schema=' id='tables-".h($l)."' title='".'資料庫架構'."'>".($_GET["dbsize"]?$T:"?")."</a>","<td align='right' id='size-".h($l)."'>".($_GET["dbsize"]?db_size($l):"?"),"\n";}echo"</table>\n",(support("database")?"<div class='footer'><div>\n"."<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>\n"."<input type='hidden' name='all' value=''>".script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^db/)); };")."<input type='submit' name='drop' value='".'刪除'."'>".confirm()."\n"."</div></fieldset>\n"."</div></div>\n":""),"<input type='hidden' name='token' value='$di'>\n","</form>\n",script("tableCheck();");}}page_footer("db");}if(isset($_GET["status"]))$_GET["variables"]=$_GET["status"];if(isset($_GET["import"]))$_GET["sql"]=$_GET["import"];if(!(DB!=""?$f->select_db(DB):isset($_GET["sql"])||isset($_GET["dump"])||isset($_GET["database"])||isset($_GET["processlist"])||isset($_GET["privileges"])||isset($_GET["user"])||isset($_GET["variables"])||$_GET["script"]=="connect"||$_GET["script"]=="kill")){if(DB!=""||$_GET["refresh"]){restart_session();set_session("dbs",null);}connect_error();exit;}if(support("scheme")&&DB!=""&&$_GET["ns"]!==""){if(!isset($_GET["ns"]))adm_redirect(preg_replace('~ns=[^&]*&~','',ME)."ns=".get_schema());if(!set_schema($_GET["ns"])){header("HTTP/1.1 404 Not Found");page_header('資料表結構'.": ".h($_GET["ns"]),'無效的資料表結構。',true);page_footer("ns");exit;}}$hf="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";class
TmpFile{var$handler;var$size;function
__construct(){$this->handler=tmpfile();}function
write($_b){$this->size+=strlen($_b);fwrite($this->handler,$_b);}function
send(){fseek($this->handler,0);fpassthru($this->handler);fclose($this->handler);}}$vc="'(?:''|[^'\\\\]|\\\\.)*'";$Ld="IN|OUT|INOUT";if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["callf"]))$_GET["call"]=$_GET["callf"];if(isset($_GET["function"]))$_GET["procedure"]=$_GET["function"];if(isset($_GET["download"])){$a=$_GET["download"];$p=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$L=array(idf_escape($_GET["field"]));$H=$m->select($a,$L,array(where($_GET,$p)),$L);$J=($H?$H->fetch_row():array());echo$m->value($J[0],$p[$_GET["field"]]);exit;}elseif(isset($_GET["table"])){$a=$_GET["table"];$p=fields($a);if(!$p)$n=error();$S=table_status1($a,true);$C=$b->tableName($S);page_header(($p&&is_view($S)?$S['Engine']=='materialized view'?'Materialized view':'檢視表':'資料表').": ".($C!=""?$C:h($a)),$n);$b->selectLinks($S);$ub=$S["Comment"];if($ub!="")echo"<p class='nowrap'>".'註解'.": ".h($ub)."\n";if($p)$b->tableStructurePrint($p);if(!is_view($S)){if(support("indexes")){echo"<h3 id='indexes'>".'索引'."</h3>\n";$w=indexes($a);if($w)$b->tableIndexesPrint($w);echo'<p class="links"><a href="'.h(ME).'indexes='.urlencode($a).'">'.'修改索引'."</a>\n";}if(fk_support($S)){echo"<h3 id='foreign-keys'>".'外來鍵'."</h3>\n";$cd=foreign_keys($a);if($cd){echo"<table cellspacing='0'>\n","<thead><tr><th>".'來源'."<td>".'目標'."<td>".'ON DELETE'."<td>".'ON UPDATE'."<td>&nbsp;</thead>\n";foreach($cd
as$C=>$q){echo"<tr title='".h($C)."'>","<th><i>".implode("</i>, <i>",array_map('h',$q["source"]))."</i>","<td><a href='".h($q["db"]!=""?preg_replace('~db=[^&]*~',"db=".urlencode($q["db"]),ME):($q["ns"]!=""?preg_replace('~ns=[^&]*~',"ns=".urlencode($q["ns"]),ME):ME))."table=".urlencode($q["table"])."'>".($q["db"]!=""?"<b>".h($q["db"])."</b>.":"").($q["ns"]!=""?"<b>".h($q["ns"])."</b>.":"").h($q["table"])."</a>","(<i>".implode("</i>, <i>",array_map('h',$q["target"]))."</i>)","<td>".nbsp($q["on_delete"])."\n","<td>".nbsp($q["on_update"])."\n",'<td><a href="'.h(ME.'foreign='.urlencode($a).'&name='.urlencode($C)).'">'.'修改'.'</a>';}echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'foreign='.urlencode($a).'">'.'新增外來鍵'."</a>\n";}}if(support(is_view($S)?"view_trigger":"trigger")){echo"<h3 id='triggers'>".'觸發器'."</h3>\n";$pi=triggers($a);if($pi){echo"<table cellspacing='0'>\n";foreach($pi
as$y=>$X)echo"<tr valign='top'><td>".h($X[0])."<td>".h($X[1])."<th>".h($y)."<td><a href='".h(ME.'trigger='.urlencode($a).'&name='.urlencode($y))."'>".'修改'."</a>\n";echo"</table>\n";}echo'<p class="links"><a href="'.h(ME).'trigger='.urlencode($a).'">'.'建立觸發器'."</a>\n";}}elseif(isset($_GET["schema"])){page_header('資料庫架構',"",array(),h(DB.($_GET["ns"]?".$_GET[ns]":"")));$Gh=array();$Hh=array();$ea=($_GET["schema"]?$_GET["schema"]:$_COOKIE["adminer_schema-".str_replace(".","_",DB)]);preg_match_all('~([^:]+):([-0-9.]+)x([-0-9.]+)(_|$)~',$ea,$xe,PREG_SET_ORDER);foreach($xe
as$s=>$B){$Gh[$B[1]]=array($B[2],$B[3]);$Hh[]="\n\t'".js_escape($B[1])."': [ $B[2], $B[3] ]";}$ei=0;$Qa=-1;$Rg=array();$xg=array();$le=array();foreach(table_status('',true)as$R=>$S){if(is_view($S))continue;$Vf=0;$Rg[$R]["fields"]=array();foreach(fields($R)as$C=>$o){$Vf+=1.25;$o["pos"]=$Vf;$Rg[$R]["fields"][$C]=$o;}$Rg[$R]["pos"]=($Gh[$R]?$Gh[$R]:array($ei,0));foreach($b->foreignKeys($R)as$X){if(!$X["db"]){$je=$Qa;if($Gh[$R][1]||$Gh[$X["table"]][1])$je=min(floatval($Gh[$R][1]),floatval($Gh[$X["table"]][1]))-1;else$Qa-=.1;while($le[(string)$je])$je-=.0001;$Rg[$R]["references"][$X["table"]][(string)$je]=array($X["source"],$X["target"]);$xg[$X["table"]][$R][(string)$je]=$X["target"];$le[(string)$je]=true;}}$ei=max($ei,$Rg[$R]["pos"][0]+2.5+$Vf);}echo'<div id="schema" style="height: ',$ei,'em;">
<script',nonce(),'>
qs(\'#schema\').onselectstart = function () { return false; };
var tablePos = {',implode(",",$Hh)."\n",'};
var em = qs(\'#schema\').offsetHeight / ',$ei,';
document.onmousemove = schemaMousemove;
document.onmouseup = partialArg(schemaMouseup, \'',js_escape(DB),'\');
</script>
';foreach($Rg
as$C=>$R){echo"<div class='table' style='top: ".$R["pos"][0]."em; left: ".$R["pos"][1]."em;'>",'<a href="'.h(ME).'table='.urlencode($C).'"><b>'.h($C)."</b></a>",script("qsl('div').onmousedown = schemaMousedown;");foreach($R["fields"]as$o){$X='<span'.type_class($o["type"]).' title="'.h($o["full_type"].($o["null"]?" NULL":'')).'">'.h($o["field"]).'</span>';echo"<br>".($o["primary"]?"<i>$X</i>":$X);}foreach((array)$R["references"]as$Nh=>$yg){foreach($yg
as$je=>$ug){$ke=$je-$Gh[$C][1];$s=0;foreach($ug[0]as$lh)echo"\n<div class='references' title='".h($Nh)."' id='refs$je-".($s++)."' style='left: $ke"."em; top: ".$R["fields"][$lh]["pos"]."em; padding-top: .5em;'><div style='border-top: 1px solid Gray; width: ".(-$ke)."em;'></div></div>";}}foreach((array)$xg[$C]as$Nh=>$yg){foreach($yg
as$je=>$e){$ke=$je-$Gh[$C][1];$s=0;foreach($e
as$Mh)echo"\n<div class='references' title='".h($Nh)."' id='refd$je-".($s++)."' style='left: $ke"."em; top: ".$R["fields"][$Mh]["pos"]."em; height: 1.25em; background: url(".h(preg_replace("~\\?.*~","",ME)."?file=arrow.gif) no-repeat right center;&version=4.6.2")."'><div style='height: .5em; border-bottom: 1px solid Gray; width: ".(-$ke)."em;'></div></div>";}}echo"\n</div>\n";}foreach($Rg
as$C=>$R){foreach((array)$R["references"]as$Nh=>$yg){foreach($yg
as$je=>$ug){$Le=$ei;$Ae=-10;foreach($ug[0]as$y=>$lh){$Wf=$R["pos"][0]+$R["fields"][$lh]["pos"];$Xf=$Rg[$Nh]["pos"][0]+$Rg[$Nh]["fields"][$ug[1][$y]]["pos"];$Le=min($Le,$Wf,$Xf);$Ae=max($Ae,$Wf,$Xf);}echo"<div class='references' id='refl$je' style='left: $je"."em; top: $Le"."em; padding: .5em 0;'><div style='border-right: 1px solid Gray; margin-top: 1px; height: ".($Ae-$Le)."em;'></div></div>\n";}}}echo'</div>
<p class="links"><a href="',h(ME."schema=".urlencode($ea)),'" id="schema-link">永久連結</a>
';}elseif(isset($_GET["dump"])){$a=$_GET["dump"];if($_POST&&!$n){$Cb="";foreach(array("output","format","db_style","routines","events","table_style","auto_increment","triggers","data_style")as$y)$Cb.="&$y=".urlencode($_POST[$y]);adm_cookie("adminer_export",substr($Cb,1));$T=array_flip((array)$_POST["tables"])+array_flip((array)$_POST["data"]);$Hc=dump_headers((count($T)==1?key($T):DB),(DB==""||count($T)>1));$Td=preg_match('~sql~',$_POST["format"]);if($Td){echo"-- Adminer $ia ".$dc[DRIVER]." dump\n\n";if($x=="sql"){echo"SET NAMES utf8;
SET time_zone = '+00:00';
".($_POST["data_style"]?"SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';
":"")."
";$f->query("SET time_zone = '+00:00';");}}$yh=$_POST["db_style"];$k=array(DB);if(DB==""){$k=$_POST["databases"];if(is_string($k))$k=explode("\n",rtrim(str_replace("\r","",$k),"\n"));}foreach((array)$k
as$l){$b->dumpDatabase($l);if($f->select_db($l)){if($Td&&preg_match('~CREATE~',$yh)&&($h=$f->result("SHOW CREATE DATABASE ".idf_escape($l),1))){set_utf8mb4($h);if($yh=="DROP+CREATE")echo"DROP DATABASE IF EXISTS ".idf_escape($l).";\n";echo"$h;\n";}if($Td){if($yh)echo
use_sql($l).";\n\n";$Af="";if($_POST["routines"]){foreach(array("FUNCTION","PROCEDURE")as$Lg){foreach(get_rows("SHOW $Lg STATUS WHERE Db = ".q($l),null,"-- ")as$J){$h=remove_definer($f->result("SHOW CREATE $Lg ".idf_escape($J["Name"]),2));set_utf8mb4($h);$Af.=($yh!='DROP+CREATE'?"DROP $Lg IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$h;;\n\n";}}}if($_POST["events"]){foreach(get_rows("SHOW EVENTS",null,"-- ")as$J){$h=remove_definer($f->result("SHOW CREATE EVENT ".idf_escape($J["Name"]),3));set_utf8mb4($h);$Af.=($yh!='DROP+CREATE'?"DROP EVENT IF EXISTS ".idf_escape($J["Name"]).";;\n":"")."$h;;\n\n";}}if($Af)echo"DELIMITER ;;\n\n$Af"."DELIMITER ;\n\n";}if($_POST["table_style"]||$_POST["data_style"]){$Pi=array();foreach(table_status('',true)as$C=>$S){$R=(DB==""||in_array($C,(array)$_POST["tables"]));$Kb=(DB==""||in_array($C,(array)$_POST["data"]));if($R||$Kb){if($Hc=="tar"){$ai=new
TmpFile;ob_start(array($ai,'write'),1e5);}$b->dumpTable($C,($R?$_POST["table_style"]:""),(is_view($S)?2:0));if(is_view($S))$Pi[]=$C;elseif($Kb){$p=fields($C);$b->dumpData($C,$_POST["data_style"],"SELECT *".convert_fields($p,$p)." FROM ".table($C));}if($Td&&$_POST["triggers"]&&$R&&($pi=trigger_sql($C)))echo"\nDELIMITER ;;\n$pi\nDELIMITER ;\n";if($Hc=="tar"){ob_end_flush();tar_file((DB!=""?"":"$l/")."$C.csv",$ai);}elseif($Td)echo"\n";}}foreach($Pi
as$Oi)$b->dumpTable($Oi,$_POST["table_style"],1);if($Hc=="tar")echo
pack("x512");}}}if($Td)echo"-- ".$f->result("SELECT NOW()")."\n";exit;}page_header('匯出',$n,($_GET["export"]!=""?array("table"=>$_GET["export"]):array()),h(DB));echo'
<form action="" method="post">
<table cellspacing="0">
';$Ob=array('','USE','DROP+CREATE','CREATE');$Ih=array('','DROP+CREATE','CREATE');$Lb=array('','TRUNCATE+INSERT','INSERT');if($x=="sql")$Lb[]='INSERT+UPDATE';parse_str($_COOKIE["adminer_export"],$J);if(!$J)$J=array("output"=>"text","format"=>"sql","db_style"=>(DB!=""?"":"CREATE"),"table_style"=>"DROP+CREATE","data_style"=>"INSERT");if(!isset($J["events"])){$J["routines"]=$J["events"]=($_GET["dump"]=="");$J["triggers"]=$J["table_style"];}echo"<tr><th>".'輸出'."<td>".html_select("output",$b->dumpOutput(),$J["output"],0)."\n";echo"<tr><th>".'格式'."<td>".html_select("format",$b->dumpFormat(),$J["format"],0)."\n";echo($x=="sqlite"?"":"<tr><th>".'資料庫'."<td>".html_select('db_style',$Ob,$J["db_style"]).(support("routine")?checkbox("routines",1,$J["routines"],'程序'):"").(support("event")?checkbox("events",1,$J["events"],'事件'):"")),"<tr><th>".'資料表'."<td>".html_select('table_style',$Ih,$J["table_style"]).checkbox("auto_increment",1,$J["auto_increment"],'自動遞增').(support("trigger")?checkbox("triggers",1,$J["triggers"],'觸發器'):""),"<tr><th>".'資料'."<td>".html_select('data_style',$Lb,$J["data_style"]),'</table>
<p><input type="submit" value="匯出">
<input type="hidden" name="token" value="',$di,'">

<table cellspacing="0">
',script("qsl('table').onclick = dumpClick;");$ag=array();if(DB!=""){$eb=($a!=""?"":" checked");echo"<thead><tr>","<th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables'$eb>".'資料表'."</label>".script("qs('#check-tables').onclick = partial(formCheck, /^tables\\[/);",""),"<th style='text-align: right;'><label class='block'>".'資料'."<input type='checkbox' id='check-data'$eb></label>".script("qs('#check-data').onclick = partial(formCheck, /^data\\[/);",""),"</thead>\n";$Pi="";$Jh=tables_list();foreach($Jh
as$C=>$U){$Zf=preg_replace('~_.*~','',$C);$eb=($a==""||$a==(substr($a,-1)=="%"?"$Zf%":$C));$dg="<tr><td>".checkbox("tables[]",$C,$eb,$C,"","block");if($U!==null&&!preg_match('~table~i',$U))$Pi.="$dg\n";else
echo"$dg<td align='right'><label class='block'><span id='Rows-".h($C)."'></span>".checkbox("data[]",$C,$eb)."</label>\n";$ag[$Zf]++;}echo$Pi;if($Jh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}else{echo"<thead><tr><th style='text-align: left;'>","<label class='block'><input type='checkbox' id='check-databases'".($a==""?" checked":"").">".'資料庫'."</label>",script("qs('#check-databases').onclick = partial(formCheck, /^databases\\[/);",""),"</thead>\n";$k=$b->databases();if($k){foreach($k
as$l){if(!information_schema($l)){$Zf=preg_replace('~_.*~','',$l);echo"<tr><td>".checkbox("databases[]",$l,$a==""||$a=="$Zf%",$l,"","block")."\n";$ag[$Zf]++;}}}else
echo"<tr><td><textarea name='databases' rows='10' cols='20'></textarea>";}echo'</table>
</form>
';$Vc=true;foreach($ag
as$y=>$X){if($y!=""&&$X>1){echo($Vc?"<p>":" ")."<a href='".h(ME)."dump=".urlencode("$y%")."'>".h($y)."</a>";$Vc=false;}}}elseif(isset($_GET["privileges"])){page_header('權限');echo'<p class="links"><a href="'.h(ME).'user=">'.'建立使用者'."</a>";$H=$f->query("SELECT User, Host FROM mysql.".(DB==""?"user":"db WHERE ".q(DB)." LIKE Db")." ORDER BY Host, User");$jd=$H;if(!$H)$H=$f->query("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1) AS User, SUBSTRING_INDEX(CURRENT_USER, '@', -1) AS Host");echo"<form action=''><p>\n";hidden_fields_get();echo"<input type='hidden' name='db' value='".h(DB)."'>\n",($jd?"":"<input type='hidden' name='grant' value=''>\n"),"<table cellspacing='0'>\n","<thead><tr><th>".'帳號'."<th>".'伺服器'."<th>&nbsp;</thead>\n";while($J=$H->fetch_assoc())echo'<tr'.odd().'><td>'.h($J["User"])."<td>".h($J["Host"]).'<td><a href="'.h(ME.'user='.urlencode($J["User"]).'&host='.urlencode($J["Host"])).'">'.'編輯'."</a>\n";if(!$jd||DB!="")echo"<tr".odd()."><td><input name='user' autocapitalize='off'><td><input name='host' value='localhost' autocapitalize='off'><td><input type='submit' value='".'編輯'."'>\n";echo"</table>\n","</form>\n";}elseif(isset($_GET["sql"])){if(!$n&&$_POST["export"]){dump_headers("sql");$b->dumpTable("","");$b->dumpData("","table",$_POST["query"]);exit;}restart_session();$vd=&get_session("queries");$ud=&$vd[DB];if(!$n&&$_POST["clear"]){$ud=array();adm_redirect(remove_from_uri("history"));}page_header((isset($_GET["import"])?'匯入':'SQL命令'),$n);if(!$n&&$_POST){$gd=false;if(!isset($_GET["import"]))$G=$_POST["query"];elseif($_POST["webfile"]){$ph=$b->importServerPath();$gd=@fopen((file_exists($ph)?$ph:"compress.zlib://$ph.gz"),"rb");$G=($gd?fread($gd,1e6):false);}else$G=get_file("sql_file",true);if(is_string($G)){if(function_exists('memory_get_usage'))@ini_set("memory_limit",max(ini_bytes("memory_limit"),2*strlen($G)+memory_get_usage()+8e6));if($G!=""&&strlen($G)<1e6){$lg=$G.(preg_match("~;[ \t\r\n]*\$~",$G)?"":";");if(!$ud||reset(end($ud))!=$lg){restart_session();$ud[]=array($lg,time());set_session("queries",$vd);stop_session();}}$mh="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$Ub=";";$D=0;$sc=true;$g=connect();if(is_object($g)&&DB!="")$g->select_db(DB);$tb=0;$xc=array();$Hf='[\'"'.($x=="sql"?'`#':($x=="sqlite"?'`[':($x=="mssql"?'[':''))).']|/\\*|-- |$'.($x=="pgsql"?'|\\$[^$]*\\$':'');$fi=microtime(true);parse_str($_COOKIE["adminer_export"],$xa);$jc=$b->dumpFormat();unset($jc["sql"]);while($G!=""){if(!$D&&preg_match("~^$mh*+DELIMITER\\s+(\\S+)~i",$G,$B)){$Ub=$B[1];$G=substr($G,strlen($B[0]));}else{preg_match('('.preg_quote($Ub)."\\s*|$Hf)",$G,$B,PREG_OFFSET_CAPTURE,$D);list($ed,$Vf)=$B[0];if(!$ed&&$gd&&!feof($gd))$G.=fread($gd,1e5);else{if(!$ed&&rtrim($G)=="")break;$D=$Vf+strlen($ed);if($ed&&rtrim($ed)!=$Ub){while(preg_match('('.($ed=='/*'?'\\*/':($ed=='['?']':(preg_match('~^-- |^#~',$ed)?"\n":preg_quote($ed)."|\\\\."))).'|$)s',$G,$B,PREG_OFFSET_CAPTURE,$D)){$Pg=$B[0][0];if(!$Pg&&$gd&&!feof($gd))$G.=fread($gd,1e5);else{$D=$B[0][1]+strlen($Pg);if($Pg[0]!="\\")break;}}}else{$sc=false;$lg=substr($G,0,$Vf);$tb++;$dg="<pre id='sql-$tb'><code class='jush-$x'>".$b->sqlCommandQuery($lg)."</code></pre>\n";if($x=="sqlite"&&preg_match("~^$mh*+ATTACH\\b~i",$lg,$B)){echo$dg,"<p class='error'>".'ATTACH queries are not supported.'."\n";$xc[]=" <a href='#sql-$tb'>$tb</a>";if($_POST["error_stops"])break;}else{if(!$_POST["only_errors"]){echo$dg;ob_flush();flush();}$th=microtime(true);if($f->multi_query($lg)&&is_object($g)&&preg_match("~^$mh*+USE\\b~i",$lg))$g->query($lg);do{$H=$f->store_result();if($f->error){echo($_POST["only_errors"]?$dg:""),"<p class='error'>".'查詢發生錯誤'.($f->errno?" ($f->errno)":"").": ".error()."\n";$xc[]=" <a href='#sql-$tb'>$tb</a>";if($_POST["error_stops"])break
2;}else{$Th=" <span class='time'>(".format_time($th).")</span>".(strlen($lg)<1000?" <a href='".h(ME)."sql=".urlencode(trim($lg))."'>".'編輯'."</a>":"");$za=$f->affected_rows;$Si=($_POST["only_errors"]?"":$m->warnings());$Ti="warnings-$tb";if($Si)$Th.=", <a href='#$Ti'>".'Warnings'."</a>".script("qsl('a').onclick = partial(toggle, '$Ti');","");$Ec=null;$Fc="explain-$tb";if(is_object($H)){$z=$_POST["limit"];$uf=select($H,$g,array(),$z);if(!$_POST["only_errors"]){echo"<form action='' method='post'>\n";$Xe=$H->num_rows;echo"<p>".($Xe?($z&&$Xe>$z?sprintf('%d / ',$z):"").sprintf('%d行',$Xe):""),$Th;if($g&&preg_match("~^($mh|\\()*+SELECT\\b~i",$lg)&&($Ec=explain($g,$lg)))echo", <a href='#$Fc'>Explain</a>".script("qsl('a').onclick = partial(toggle, '$Fc');","");$t="export-$tb";echo", <a href='#$t'>".'匯出'."</a>".script("qsl('a').onclick = partial(toggle, '$t');","")."<span id='$t' class='hidden'>: ".html_select("output",$b->dumpOutput(),$xa["output"])." ".html_select("format",$jc,$xa["format"])."<input type='hidden' name='query' value='".h($lg)."'>"." <input type='submit' name='export' value='".'匯出'."'><input type='hidden' name='token' value='$di'></span>\n"."</form>\n";}}else{if(preg_match("~^$mh*+(CREATE|DROP|ALTER)$mh++(DATABASE|SCHEMA)\\b~i",$lg)){restart_session();set_session("dbs",null);stop_session();}if(!$_POST["only_errors"])echo"<p class='message' title='".h($f->info)."'>".sprintf('執行查詢OK，%d行受影響',$za)."$Th\n";}echo($Si?"<div id='$Ti' class='hidden'>\n$Si</div>\n":"");if($Ec){echo"<div id='$Fc' class='hidden'>\n";select($Ec,$g,$uf);echo"</div>\n";}}$th=microtime(true);}while($f->next_result());}$G=substr($G,$D);$D=0;}}}}if($sc)echo"<p class='message'>".'沒有命令可執行。'."\n";elseif($_POST["only_errors"]){echo"<p class='message'>".sprintf('已順利執行 %d 個查詢。',$tb-count($xc))," <span class='time'>(".format_time($fi).")</span>\n";}elseif($xc&&$tb>1)echo"<p class='error'>".'查詢發生錯誤'.": ".implode("",$xc)."\n";}else
echo"<p class='error'>".upload_error($G)."\n";}echo'
<form action="" method="post" enctype="multipart/form-data" id="form">
';$Bc="<input type='submit' value='".'執行'."' title='Ctrl+Enter'>";if(!isset($_GET["import"])){$lg=$_GET["sql"];if($_POST)$lg=$_POST["query"];elseif($_GET["history"]=="all")$lg=$ud;elseif($_GET["history"]!="")$lg=$ud[$_GET["history"]][0];echo"<p>";textarea("query",$lg,20);echo($_POST?"":script("qs('textarea').focus();")),"<p>$Bc\n",'Limit rows'.": <input type='number' name='limit' class='size' value='".h($_POST?$_POST["limit"]:$_GET["limit"])."'>\n";}else{echo"<fieldset><legend>".'檔案上傳'."</legend><div>",(ini_bool("file_uploads")?"SQL (&lt; ".ini_get("upload_max_filesize")."B): <input type='file' name='sql_file[]' multiple>\n$Bc":'檔案上傳已經被停用。'),"</div></fieldset>\n","<fieldset><legend>".'從伺服器'."</legend><div>",sprintf('網頁伺服器檔案 %s',"<code>".h($b->importServerPath()).(extension_loaded("zlib")?"[.gz]":"")."</code>"),' <input type="submit" name="webfile" value="'.'執行檔案'.'">',"</div></fieldset>\n","<p>";}echo
checkbox("error_stops",1,($_POST?$_POST["error_stops"]:isset($_GET["import"])),'出錯時停止')."\n",checkbox("only_errors",1,($_POST?$_POST["only_errors"]:isset($_GET["import"])),'僅顯示錯誤訊息')."\n","<input type='hidden' name='token' value='$di'>\n";if(!isset($_GET["import"])&&$ud){print_fieldset("history",'紀錄',$_GET["history"]!="");for($X=end($ud);$X;$X=prev($ud)){$y=key($ud);list($lg,$Th,$nc)=$X;echo'<a href="'.h(ME."sql=&history=$y").'">'.'編輯'."</a>"." <span class='time' title='".@date('Y-m-d',$Th)."'>".@date("H:i:s",$Th)."</span>"." <code class='jush-$x'>".shorten_utf8(ltrim(str_replace("\n"," ",str_replace("\r","",preg_replace('~^(#|-- ).*~m','',$lg)))),80,"</code>").($nc?" <span class='time'>($nc)</span>":"")."<br>\n";}echo"<input type='submit' name='clear' value='".'清除'."'>\n","<a href='".h(ME."sql=&history=all")."'>".'編輯全部'."</a>\n","</div></fieldset>\n";}echo'</form>
';}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$p=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$p):""):where($_GET,$p));$_i=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($p
as$C=>$o){if(!isset($o["privileges"][$_i?"update":"insert"])||$b->fieldName($o)=="")unset($p[$C]);}if($_POST&&!$n&&!isset($_GET["select"])){$A=$_POST["referer"];if($_POST["insert"])$A=($_i?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$A))$A=ME."select=".urlencode($a);$w=indexes($a);$vi=unique_array($_GET["where"],$w);$og="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($A,'該項目已被刪除',$m->delete($a,$og,!$vi));else{$O=array();foreach($p
as$C=>$o){$X=process_input($o);if($X!==false&&$X!==null)$O[idf_escape($C)]=$X;}if($_i){if(!$O)adm_redirect($A);queries_redirect($A,'已更新項目。',$m->update($a,$O,$og,!$vi));if(is_ajax()){page_headers();page_messages($n);exit;}}else{$H=$m->insert($a,$O);$ie=($H?last_id():0);queries_redirect($A,sprintf('已新增項目%s。',($ie?" $ie":"")),$H);}}}$J=null;if($_POST["save"])$J=(array)$_POST["fields"];elseif($Z){$L=array();foreach($p
as$C=>$o){if(isset($o["privileges"]["select"])){$Ga=convert_field($o);if($_POST["clone"]&&$o["auto_increment"])$Ga="''";if($x=="sql"&&preg_match("~enum|set~",$o["type"]))$Ga="1*".idf_escape($C);$L[]=($Ga?"$Ga AS ":"").idf_escape($C);}}$J=array();if(!support("table"))$L=array("*");if($L){$H=$m->select($a,$L,array($Z),$L,array(),(isset($_GET["select"])?2:1));if(!$H)$n=error();else{$J=$H->fetch_assoc();if(!$J)$J=false;}if(isset($_GET["select"])&&(!$J||$H->fetch_assoc()))$J=null;}}if(!support("table")&&!$p){if(!$Z){$H=$m->select($a,array("*"),$Z,array("*"));$J=($H?$H->fetch_assoc():false);if(!$J)$J=array($m->primary=>"");}if($J){foreach($J
as$y=>$X){if(!$Z)$J[$y]=null;$p[$y]=array("field"=>$y,"null"=>($y!=$m->primary),"auto_increment"=>($y==$m->primary));}}}edit_form($a,$p,$J,$_i);}elseif(isset($_GET["create"])){$a=$_GET["create"];$Jf=array();foreach(array('HASH','LINEAR HASH','KEY','LINEAR KEY','RANGE','LIST')as$y)$Jf[$y]=$y;$wg=referencable_primary($a);$cd=array();foreach($wg
as$Eh=>$o)$cd[str_replace("`","``",$Eh)."`".str_replace("`","``",$o["field"])]=$Eh;$xf=array();$S=array();if($a!=""){$xf=fields($a);$S=table_status($a);if(!$S)$n='沒有資料表。';}$J=$_POST;$J["fields"]=(array)$J["fields"];if($J["auto_increment_col"])$J["fields"][$J["auto_increment_col"]]["auto_increment"]=true;if($_POST&&!process_fields($J["fields"])&&!$n){if($_POST["drop"])queries_redirect(substr(ME,0,-1),'已經刪除資料表。',drop_tables(array($a)));else{$p=array();$Da=array();$Ei=false;$ad=array();$wf=reset($xf);$Aa=" FIRST";foreach($J["fields"]as$y=>$o){$q=$cd[$o["type"]];$qi=($q!==null?$wg[$q]:$o);if($o["field"]!=""){if(!$o["has_default"])$o["default"]=null;if($y==$J["auto_increment_col"])$o["auto_increment"]=true;$ig=process_field($o,$qi);$Da[]=array($o["orig"],$ig,$Aa);if($ig!=process_field($wf,$wf)){$p[]=array($o["orig"],$ig,$Aa);if($o["orig"]!=""||$Aa)$Ei=true;}if($q!==null)$ad[idf_escape($o["field"])]=($a!=""&&$x!="sqlite"?"ADD":" ").format_foreign_key(array('table'=>$cd[$o["type"]],'source'=>array($o["field"]),'target'=>array($qi["field"]),'on_delete'=>$o["on_delete"],));$Aa=" AFTER ".idf_escape($o["field"]);}elseif($o["orig"]!=""){$Ei=true;$p[]=array($o["orig"]);}if($o["orig"]!=""){$wf=next($xf);if(!$wf)$Aa="";}}$Lf="";if($Jf[$J["partition_by"]]){$Mf=array();if($J["partition_by"]=='RANGE'||$J["partition_by"]=='LIST'){foreach(array_filter($J["partition_names"])as$y=>$X){$Y=$J["partition_values"][$y];$Mf[]="\n  PARTITION ".idf_escape($X)." VALUES ".($J["partition_by"]=='RANGE'?"LESS THAN":"IN").($Y!=""?" ($Y)":" MAXVALUE");}}$Lf.="\nPARTITION BY $J[partition_by]($J[partition])".($Mf?" (".implode(",",$Mf)."\n)":($J["partitions"]?" PARTITIONS ".(+$J["partitions"]):""));}elseif(support("partitioning")&&preg_match("~partitioned~",$S["Create_options"]))$Lf.="\nREMOVE PARTITIONING";$Ee='資料表已修改。';if($a==""){adm_cookie("adminer_engine",$J["Engine"]);$Ee='資料表已修改。';}$C=trim($J["name"]);queries_redirect(ME.(support("table")?"table=":"select=").urlencode($C),$Ee,alter_table($a,$C,($x=="sqlite"&&($Ei||$ad)?$Da:$p),$ad,($J["Comment"]!=$S["Comment"]?$J["Comment"]:null),($J["Engine"]&&$J["Engine"]!=$S["Engine"]?$J["Engine"]:""),($J["Collation"]&&$J["Collation"]!=$S["Collation"]?$J["Collation"]:""),($J["Auto_increment"]!=""?number($J["Auto_increment"]):""),$Lf));}}page_header(($a!=""?'修改資料表':'建立資料表'),$n,array("table"=>$a),h($a));if(!$_POST){$J=array("Engine"=>$_COOKIE["adminer_engine"],"fields"=>array(array("field"=>"","type"=>(isset($si["int"])?"int":(isset($si["integer"])?"integer":"")),"on_update"=>"")),"partition_names"=>array(""),);if($a!=""){$J=$S;$J["name"]=$a;$J["fields"]=array();if(!$_GET["auto_increment"])$J["Auto_increment"]="";foreach($xf
as$o){$o["has_default"]=isset($o["default"]);$J["fields"][]=$o;}if(support("partitioning")){$hd="FROM information_schema.PARTITIONS WHERE TABLE_SCHEMA = ".q(DB)." AND TABLE_NAME = ".q($a);$H=$f->query("SELECT PARTITION_METHOD, PARTITION_ORDINAL_POSITION, PARTITION_EXPRESSION $hd ORDER BY PARTITION_ORDINAL_POSITION DESC LIMIT 1");list($J["partition_by"],$J["partitions"],$J["partition"])=$H->fetch_row();$Mf=get_key_vals("SELECT PARTITION_NAME, PARTITION_DESCRIPTION $hd AND PARTITION_NAME != '' ORDER BY PARTITION_ORDINAL_POSITION");$Mf[""]="";$J["partition_names"]=array_keys($Mf);$J["partition_values"]=array_values($Mf);}}}$pb=collations();$uc=engines();foreach($uc
as$tc){if(!strcasecmp($tc,$J["Engine"])){$J["Engine"]=$tc;break;}}echo'
<form action="" method="post" id="form">
<p>
';if(support("columns")||$a==""){echo'資料表名稱: <input name="name" maxlength="64" value="',h($J["name"]),'" autocapitalize="off">
';if($a==""&&!$_POST)echo
script("focus(qs('#form')['name']);");echo($uc?"<select name='Engine'>".optionlist(array(""=>"(".'引擎'.")")+$uc,$J["Engine"])."</select>".on_help("getTarget(event).value",1).script("qsl('select').onchange = helpClose;"):""),' ',($pb&&!preg_match("~sqlite|mssql~",$x)?html_select("Collation",array(""=>"(".'校對'.")")+$pb,$J["Collation"]):""),' <input type="submit" value="儲存">
';}echo'
';if(support("columns")){echo'<table cellspacing="0" id="edit-fields" class="nowrap">
';$vb=($_POST?$_POST["comments"]:$J["Comment"]!="");if(!$_POST&&!$vb){foreach($J["fields"]as$o){if($o["comment"]!=""){$vb=true;break;}}}edit_fields($J["fields"],$pb,"TABLE",$cd,$vb);echo'</table>
<p>
自動遞增: <input type="number" name="Auto_increment" size="6" value="',h($J["Auto_increment"]),'">
',checkbox("defaults",1,!$_POST||$_POST["defaults"],'預設值',"columnShow(this.checked, 5)","jsonly"),($_POST?"":script("editingHideDefaults();")),(support("comment")?"<label><input type='checkbox' name='comments' value='1' class='jsonly'".($vb?" checked":"").">".'註解'."</label>".script("qsl('input').onclick = partial(editingCommentsClick, true);").' <input name="Comment" value="'.h($J["Comment"]).'" maxlength="'.(min_version(5.5)?2048:60).'"'.($vb?'':' class="hidden"').'>':''),'<p>
<input type="submit" value="儲存">
';}echo'
';if($a!=""){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',$a));}if(support("partitioning")){$Kf=preg_match('~RANGE|LIST~',$J["partition_by"]);print_fieldset("partition",'分區類型',$J["partition_by"]);echo'<p>
',"<select name='partition_by'>".optionlist(array(""=>"")+$Jf,$J["partition_by"])."</select>".on_help("getTarget(event).value.replace(/./, 'PARTITION BY \$&')",1).script("qsl('select').onchange = partitionByChange;"),'(<input name="partition" value="',h($J["partition"]),'">)
分區: <input type="number" name="partitions" class="size',($Kf||!$J["partition_by"]?" hidden":""),'" value="',h($J["partitions"]),'">
<table cellspacing="0" id="partition-table"',($Kf?"":" class='hidden'"),'>
<thead><tr><th>分區名稱<th>值</thead>
';foreach($J["partition_names"]as$y=>$X){echo'<tr>','<td><input name="partition_names[]" value="'.h($X).'" autocapitalize="off">',($y==count($J["partition_names"])-1?script("qsl('input').oninput = partitionNameChange;"):''),'<td><input name="partition_values[]" value="'.h($J["partition_values"][$y]).'">';}echo'</table>
</div></fieldset>
';}echo'<input type="hidden" name="token" value="',$di,'">
</form>
',script("qs('#form')['defaults'].onclick();".(support("comment")?" editingCommentsClick.call(qs('#form')['comments']);":""));}elseif(isset($_GET["indexes"])){$a=$_GET["indexes"];$Dd=array("PRIMARY","UNIQUE","INDEX");$S=table_status($a,true);if(preg_match('~MyISAM|M?aria'.(min_version(5.6,'10.0.5')?'|InnoDB':'').'~i',$S["Engine"]))$Dd[]="FULLTEXT";if(preg_match('~MyISAM|M?aria'.(min_version(5.7,'10.2.2')?'|InnoDB':'').'~i',$S["Engine"]))$Dd[]="SPATIAL";$w=indexes($a);$bg=array();if($x=="mongo"){$bg=$w["_id_"];unset($Dd[0]);unset($w["_id_"]);}$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["drop_col"]){$c=array();foreach($J["indexes"]as$v){$C=$v["name"];if(in_array($v["type"],$Dd)){$e=array();$oe=array();$Wb=array();$O=array();ksort($v["columns"]);foreach($v["columns"]as$y=>$d){if($d!=""){$ne=$v["lengths"][$y];$Vb=$v["descs"][$y];$O[]=idf_escape($d).($ne?"(".(+$ne).")":"").($Vb?" DESC":"");$e[]=$d;$oe[]=($ne?$ne:null);$Wb[]=$Vb;}}if($e){$Cc=$w[$C];if($Cc){ksort($Cc["columns"]);ksort($Cc["lengths"]);ksort($Cc["descs"]);if($v["type"]==$Cc["type"]&&array_values($Cc["columns"])===$e&&(!$Cc["lengths"]||array_values($Cc["lengths"])===$oe)&&array_values($Cc["descs"])===$Wb){unset($w[$C]);continue;}}$c[]=array($v["type"],$C,$O);}}}foreach($w
as$C=>$Cc)$c[]=array($Cc["type"],$C,"DROP");if(!$c)adm_redirect(ME."table=".urlencode($a));queries_redirect(ME."table=".urlencode($a),'已修改索引。',alter_indexes($a,$c));}page_header('索引',$n,array("table"=>$a),h($a));$p=array_keys(fields($a));if($_POST["add"]){foreach($J["indexes"]as$y=>$v){if($v["columns"][count($v["columns"])]!="")$J["indexes"][$y]["columns"][]="";}$v=end($J["indexes"]);if($v["type"]||array_filter($v["columns"],'strlen'))$J["indexes"][]=array("columns"=>array(1=>""));}if(!$J){foreach($w
as$y=>$v){$w[$y]["name"]=$y;$w[$y]["columns"][]="";}$w[]=array("columns"=>array(1=>""));$J["indexes"]=$w;}?>

<form action="" method="post">
<table cellspacing="0" class="nowrap">
<thead><tr>
<th id="label-type">索引類型
<th><input type="submit" class="wayoff">列（長度）
<th id="label-name">名稱
<th><noscript><input type='image' class='icon' name='add[0]' src='" . h(preg_replace("~\\?.*~", "", ME) . "?file=plus.gif&version=4.6.2") . "' alt='+' title='新增下一筆'></noscript>&nbsp;
</thead>
<?php
if($bg){echo"<tr><td>PRIMARY<td>";foreach($bg["columns"]as$y=>$d){echo
select_input(" disabled",$p,$d),"<label><input disabled type='checkbox'>".'降冪(遞減)'."</label> ";}echo"<td><td>\n";}$Wd=1;foreach($J["indexes"]as$v){if(!$_POST["drop_col"]||$Wd!=key($_POST["drop_col"])){echo"<tr><td>".html_select("indexes[$Wd][type]",array(-1=>"")+$Dd,$v["type"],($Wd==count($J["indexes"])?"indexesAddRow.call(this);":1),"label-type"),"<td>";ksort($v["columns"]);$s=1;foreach($v["columns"]as$y=>$d){echo"<span>".select_input(" name='indexes[$Wd][columns][$s]' title='".'列'."'",($p?array_combine($p,$p):$p),$d,"partial(".($s==count($v["columns"])?"indexesAddColumn":"indexesChangeColumn").", '".js_escape($x=="sql"?"":$_GET["indexes"]."_")."')"),($x=="sql"||$x=="mssql"?"<input type='number' name='indexes[$Wd][lengths][$s]' class='size' value='".h($v["lengths"][$y])."' title='".'長度'."'>":""),($x!="sql"?checkbox("indexes[$Wd][descs][$s]",1,$v["descs"][$y],'降冪(遞減)'):"")," </span>";$s++;}echo"<td><input name='indexes[$Wd][name]' value='".h($v["name"])."' autocapitalize='off' aria-labelledby='label-name'>\n","<td><input type='image' class='icon' name='drop_col[$Wd]' src='".h(preg_replace("~\\?.*~","",ME)."?file=cross.gif&version=4.6.2")."' alt='x' title='".'移除'."'>".script("qsl('input').onclick = partial(editingRemoveRow, 'indexes\$1[type]');");}$Wd++;}echo'</table>
<p>
<input type="submit" value="儲存">
<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["database"])){$J=$_POST;if($_POST&&!$n&&!isset($_POST["add_x"])){$C=trim($J["name"]);if($_POST["drop"]){$_GET["db"]="";queries_redirect(remove_from_uri("db|database"),'資料庫已刪除。',drop_databases(array(DB)));}elseif(DB!==$C){if(DB!=""){$_GET["db"]=$C;queries_redirect(preg_replace('~\bdb=[^&]*&~','',ME)."db=".urlencode($C),'已重新命名資料庫。',rename_database($C,$J["collation"]));}else{$k=explode("\n",str_replace("\r","",$C));$zh=true;$he="";foreach($k
as$l){if(count($k)==1||$l!=""){if(!create_database($l,$J["collation"]))$zh=false;$he=$l;}}restart_session();set_session("dbs",null);queries_redirect(ME."db=".urlencode($he),'已建立資料庫。',$zh);}}else{if(!$J["collation"])adm_redirect(substr(ME,0,-1));query_redirect("ALTER DATABASE ".idf_escape($C).(preg_match('~^[a-z0-9_]+$~i',$J["collation"])?" COLLATE $J[collation]":""),substr(ME,0,-1),'已修改資料庫。');}}page_header(DB!=""?'修改資料庫':'建立資料庫',$n,array(),h(DB));$pb=collations();$C=DB;if($_POST)$C=$J["name"];elseif(DB!="")$J["collation"]=db_collation(DB,$pb);elseif($x=="sql"){foreach(get_vals("SHOW GRANTS")as$jd){if(preg_match('~ ON (`(([^\\\\`]|``|\\\\.)*)%`\\.\\*)?~',$jd,$B)&&$B[1]){$C=stripcslashes(idf_unescape("`$B[2]`"));break;}}}echo'
<form action="" method="post">
<p>
',($_POST["add_x"]||strpos($C,"\n")?'<textarea id="name" name="name" rows="10" cols="40">'.h($C).'</textarea><br>':'<input name="name" id="name" value="'.h($C).'" maxlength="64" autocapitalize="off">')."\n".($pb?html_select("collation",array(""=>"(".'校對'.")")+$pb,$J["collation"]).doc_link(array('sql'=>"charset-charsets.html",'mariadb'=>"supported-character-sets-and-collations/",'mssql'=>"ms187963.aspx",)):""),script("focus(qs('#name'));"),'<input type="submit" value="儲存">
';if(DB!="")echo"<input type='submit' name='drop' value='".'刪除'."'>".confirm(sprintf('Drop %s?',DB))."\n";elseif(!$_POST["add_x"]&&$_GET["db"]=="")echo"<input type='image' class='icon' name='add' src='".h(preg_replace("~\\?.*~","",ME)."?file=plus.gif&version=4.6.2")."' alt='+' title='".'新增下一筆'."'>\n";echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["scheme"])){$J=$_POST;if($_POST&&!$n){$_=preg_replace('~ns=[^&]*&~','',ME)."ns=";if($_POST["drop"])query_redirect("DROP SCHEMA ".idf_escape($_GET["ns"]),$_,'已刪除資料表結構。');else{$C=trim($J["name"]);$_.=urlencode($C);if($_GET["ns"]=="")query_redirect("CREATE SCHEMA ".idf_escape($C),$_,'已建立資料表結構。');elseif($_GET["ns"]!=$C)query_redirect("ALTER SCHEMA ".idf_escape($_GET["ns"])." RENAME TO ".idf_escape($C),$_,'已修改資料表結構。');else
adm_redirect($_);}}page_header($_GET["ns"]!=""?'修改資料表結構':'建立資料表結構',$n);if(!$J)$J["name"]=$_GET["ns"];echo'
<form action="" method="post">
<p><input name="name" id="name" value="',h($J["name"]),'" autocapitalize="off">
',script("focus(qs('#name'));"),'<input type="submit" value="儲存">
';if($_GET["ns"]!="")echo"<input type='submit' name='drop' value='".'刪除'."'>".confirm(sprintf('Drop %s?',$_GET["ns"]))."\n";echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["call"])){$da=($_GET["name"]?$_GET["name"]:$_GET["call"]);page_header('呼叫'.": ".h($da),$n);$Lg=routine($_GET["call"],(isset($_GET["callf"])?"FUNCTION":"PROCEDURE"));$Bd=array();$Af=array();foreach($Lg["fields"]as$s=>$o){if(substr($o["inout"],-3)=="OUT")$Af[$s]="@".idf_escape($o["field"])." AS ".idf_escape($o["field"]);if(!$o["inout"]||substr($o["inout"],0,2)=="IN")$Bd[]=$s;}if(!$n&&$_POST){$Za=array();foreach($Lg["fields"]as$y=>$o){if(in_array($y,$Bd)){$X=process_input($o);if($X===false)$X="''";if(isset($Af[$y]))$f->query("SET @".idf_escape($o["field"])." = $X");}$Za[]=(isset($Af[$y])?"@".idf_escape($o["field"]):$X);}$G=(isset($_GET["callf"])?"SELECT":"CALL")." ".table($da)."(".implode(", ",$Za).")";$th=microtime(true);$H=$f->multi_query($G);$za=$f->affected_rows;echo$b->selectQuery($G,$th,!$H);if(!$H)echo"<p class='error'>".error()."\n";else{$g=connect();if(is_object($g))$g->select_db(DB);do{$H=$f->store_result();if(is_object($H))select($H,$g);else
echo"<p class='message'>".sprintf('程序已被執行，%d行被影響',$za)."\n";}while($f->next_result());if($Af)select($f->query("SELECT ".implode(", ",$Af)));}}echo'
<form action="" method="post">
';if($Bd){echo"<table cellspacing='0'>\n";foreach($Bd
as$y){$o=$Lg["fields"][$y];$C=$o["field"];echo"<tr><th>".$b->fieldName($o);$Y=$_POST["fields"][$C];if($Y!=""){if($o["type"]=="enum")$Y=+$Y;if($o["type"]=="set")$Y=array_sum($Y);}input($o,$Y,(string)$_POST["function"][$C]);echo"\n";}echo"</table>\n";}echo'<p>
<input type="submit" value="呼叫">
<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["foreign"])){$a=$_GET["foreign"];$C=$_GET["name"];$J=$_POST;if($_POST&&!$n&&!$_POST["add"]&&!$_POST["change"]&&!$_POST["change-js"]){$Ee=($_POST["drop"]?'已刪除外來鍵。':($C!=""?'已修改外來鍵。':'已建立外來鍵。'));$A=ME."table=".urlencode($a);if(!$_POST["drop"]){$J["source"]=array_filter($J["source"],'strlen');ksort($J["source"]);$Mh=array();foreach($J["source"]as$y=>$X)$Mh[$y]=$J["target"][$y];$J["target"]=$Mh;}if($x=="sqlite")queries_redirect($A,$Ee,recreate_table($a,$a,array(),array(),array(" $C"=>($_POST["drop"]?"":" ".format_foreign_key($J)))));else{$c="ALTER TABLE ".table($a);$ec="\nDROP ".($x=="sql"?"FOREIGN KEY ":"CONSTRAINT ").idf_escape($C);if($_POST["drop"])query_redirect($c.$ec,$A,$Ee);else{query_redirect($c.($C!=""?"$ec,":"")."\nADD".format_foreign_key($J),$A,$Ee);$n='來源列和目標列必須具有相同的資料類型，在目標列上必須有一個索引並且引用的資料必須存在。'."<br>$n";}}}page_header('外來鍵',$n,array("table"=>$a),h($a));if($_POST){ksort($J["source"]);if($_POST["add"])$J["source"][]="";elseif($_POST["change"]||$_POST["change-js"])$J["target"]=array();}elseif($C!=""){$cd=foreign_keys($a);$J=$cd[$C];$J["source"][]="";}else{$J["table"]=$a;$J["source"]=array("");}$lh=array_keys(fields($a));$Mh=($a===$J["table"]?$lh:array_keys(fields($J["table"])));$vg=array_keys(array_filter(table_status('',true),'fk_support'));echo'
<form action="" method="post">
<p>
';if($J["db"]==""&&$J["ns"]==""){echo'目標資料表:
',html_select("table",$vg,$J["table"],"this.form['change-js'].value = '1'; this.form.submit();"),'<input type="hidden" name="change-js" value="">
<noscript><p><input type="submit" name="change" value="修改"></noscript>
<table cellspacing="0">
<thead><tr><th id="label-source">來源<th id="label-target">目標</thead>
';$Wd=0;foreach($J["source"]as$y=>$X){echo"<tr>","<td>".html_select("source[".(+$y)."]",array(-1=>"")+$lh,$X,($Wd==count($J["source"])-1?"foreignAddRow.call(this);":1),"label-source"),"<td>".html_select("target[".(+$y)."]",$Mh,$J["target"][$y],1,"label-target");$Wd++;}echo'</table>
<p>
ON DELETE: ',html_select("on_delete",array(-1=>"")+explode("|",$hf),$J["on_delete"]),' ON UPDATE: ',html_select("on_update",array(-1=>"")+explode("|",$hf),$J["on_update"]),doc_link(array('sql'=>"innodb-foreign-key-constraints.html",'mariadb'=>"foreign-keys/",'pgsql'=>"sql-createtable.html#SQL-CREATETABLE-REFERENCES",'mssql'=>"ms174979.aspx",'oracle'=>"clauses002.htm#sthref2903",)),'<p>
<input type="submit" value="儲存">
<noscript><p><input type="submit" name="add" value="新增資料列"></noscript>
';}if($C!=""){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',$C));}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["view"])){$a=$_GET["view"];$J=$_POST;$yf="VIEW";if($x=="pgsql"&&$a!=""){$P=table_status($a);$yf=strtoupper($P["Engine"]);}if($_POST&&!$n){$C=trim($J["name"]);$Ga=" AS\n$J[select]";$A=ME."table=".urlencode($C);$Ee='已修改檢視表。';$U=($_POST["materialized"]?"MATERIALIZED VIEW":"VIEW");if(!$_POST["drop"]&&$a==$C&&$x!="sqlite"&&$U=="VIEW"&&$yf=="VIEW")query_redirect(($x=="mssql"?"ALTER":"CREATE OR REPLACE")." VIEW ".table($C).$Ga,$A,$Ee);else{$Oh=$C."_adminer_".uniqid();drop_create("DROP $yf ".table($a),"CREATE $U ".table($C).$Ga,"DROP $U ".table($C),"CREATE $U ".table($Oh).$Ga,"DROP $U ".table($Oh),($_POST["drop"]?substr(ME,0,-1):$A),'已刪除檢視表。',$Ee,'已建立檢視表。',$a,$C);}}if(!$_POST&&$a!=""){$J=adm_view($a);$J["name"]=$a;$J["materialized"]=($yf!="VIEW");if(!$n)$n=error();}page_header(($a!=""?'修改檢視表':'建立檢視表'),$n,array("table"=>$a),h($a));echo'
<form action="" method="post">
<p>名稱: <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',(support("materializedview")?" ".checkbox("materialized",1,$J["materialized"],'Materialized view'):""),'<p>';textarea("select",$J["select"]);echo'<p>
<input type="submit" value="儲存">
';if($a!=""){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',$a));}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["event"])){$aa=$_GET["event"];$Od=array("YEAR","QUARTER","MONTH","DAY","HOUR","MINUTE","WEEK","SECOND","YEAR_MONTH","DAY_HOUR","DAY_MINUTE","DAY_SECOND","HOUR_MINUTE","HOUR_SECOND","MINUTE_SECOND");$vh=array("ENABLED"=>"ENABLE","DISABLED"=>"DISABLE","SLAVESIDE_DISABLED"=>"DISABLE ON SLAVE");$J=$_POST;if($_POST&&!$n){if($_POST["drop"])query_redirect("DROP EVENT ".idf_escape($aa),substr(ME,0,-1),'已刪除事件。');elseif(in_array($J["INTERVAL_FIELD"],$Od)&&isset($vh[$J["STATUS"]])){$Qg="\nON SCHEDULE ".($J["INTERVAL_VALUE"]?"EVERY ".q($J["INTERVAL_VALUE"])." $J[INTERVAL_FIELD]".($J["STARTS"]?" STARTS ".q($J["STARTS"]):"").($J["ENDS"]?" ENDS ".q($J["ENDS"]):""):"AT ".q($J["STARTS"]))." ON COMPLETION".($J["ON_COMPLETION"]?"":" NOT")." PRESERVE";queries_redirect(substr(ME,0,-1),($aa!=""?'已修改事件。':'已建立事件。'),queries(($aa!=""?"ALTER EVENT ".idf_escape($aa).$Qg.($aa!=$J["EVENT_NAME"]?"\nRENAME TO ".idf_escape($J["EVENT_NAME"]):""):"CREATE EVENT ".idf_escape($J["EVENT_NAME"]).$Qg)."\n".$vh[$J["STATUS"]]." COMMENT ".q($J["EVENT_COMMENT"]).rtrim(" DO\n$J[EVENT_DEFINITION]",";").";"));}}page_header(($aa!=""?'修改事件'.": ".h($aa):'建立事件'),$n);if(!$J&&$aa!=""){$K=get_rows("SELECT * FROM information_schema.EVENTS WHERE EVENT_SCHEMA = ".q(DB)." AND EVENT_NAME = ".q($aa));$J=reset($K);}echo'
<form action="" method="post">
<table cellspacing="0">
<tr><th>名稱<td><input name="EVENT_NAME" value="',h($J["EVENT_NAME"]),'" maxlength="64" autocapitalize="off">
<tr><th title="datetime">開始<td><input name="STARTS" value="',h("$J[EXECUTE_AT]$J[STARTS]"),'">
<tr><th title="datetime">結束<td><input name="ENDS" value="',h($J["ENDS"]),'">
<tr><th>每<td><input type="number" name="INTERVAL_VALUE" value="',h($J["INTERVAL_VALUE"]),'" class="size"> ',html_select("INTERVAL_FIELD",$Od,$J["INTERVAL_FIELD"]),'<tr><th>狀態<td>',html_select("STATUS",$vh,$J["STATUS"]),'<tr><th>註解<td><input name="EVENT_COMMENT" value="',h($J["EVENT_COMMENT"]),'" maxlength="64">
<tr><th>&nbsp;<td>',checkbox("ON_COMPLETION","PRESERVE",$J["ON_COMPLETION"]=="PRESERVE",'在完成後儲存'),'</table>
<p>';textarea("EVENT_DEFINITION",$J["EVENT_DEFINITION"]);echo'<p>
<input type="submit" value="儲存">
';if($aa!=""){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',$aa));}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["procedure"])){$da=($_GET["name"]?$_GET["name"]:$_GET["procedure"]);$Lg=(isset($_GET["function"])?"FUNCTION":"PROCEDURE");$J=$_POST;$J["fields"]=(array)$J["fields"];if($_POST&&!process_fields($J["fields"])&&!$n){$vf=routine($_GET["procedure"],$Lg);$Oh="$J[name]_adminer_".uniqid();drop_create("DROP $Lg ".routine_id($da,$vf),create_routine($Lg,$J),"DROP $Lg ".routine_id($J["name"],$J),create_routine($Lg,array("name"=>$Oh)+$J),"DROP $Lg ".routine_id($Oh,$J),substr(ME,0,-1),'已刪除程序。','已修改子程序。','已建立子程序。',$da,$J["name"]);}page_header(($da!=""?(isset($_GET["function"])?'修改函數':'修改過程').": ".h($da):(isset($_GET["function"])?'建立函數':'建立預存程序')),$n);if(!$_POST&&$da!=""){$J=routine($_GET["procedure"],$Lg);$J["name"]=$da;}$pb=get_vals("SHOW CHARACTER SET");sort($pb);$Mg=routine_languages();echo'
<form action="" method="post" id="form">
<p>名稱: <input name="name" value="',h($J["name"]),'" maxlength="64" autocapitalize="off">
',($Mg?'語言'.": ".html_select("language",$Mg,$J["language"])."\n":""),'<input type="submit" value="儲存">
<table cellspacing="0" class="nowrap">
';edit_fields($J["fields"],$pb,$Lg);if(isset($_GET["function"])){echo"<tr><td>".'回傳類型';edit_type("returns",$J["returns"],$pb,array(),($x=="pgsql"?array("void","trigger"):array()));}echo'</table>
<p>';textarea("definition",$J["definition"]);echo'<p>
<input type="submit" value="儲存">
';if($da!=""){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',$da));}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["sequence"])){$fa=$_GET["sequence"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);$C=trim($J["name"]);if($_POST["drop"])query_redirect("DROP SEQUENCE ".idf_escape($fa),$_,'已刪除序列。');elseif($fa=="")query_redirect("CREATE SEQUENCE ".idf_escape($C),$_,'已建立序列。');elseif($fa!=$C)query_redirect("ALTER SEQUENCE ".idf_escape($fa)." RENAME TO ".idf_escape($C),$_,'已修改序列。');else
adm_redirect($_);}page_header($fa!=""?'修改序列'.": ".h($fa):'建立序列',$n);if(!$J)$J["name"]=$fa;echo'
<form action="" method="post">
<p><input name="name" value="',h($J["name"]),'" autocapitalize="off">
<input type="submit" value="儲存">
';if($fa!="")echo"<input type='submit' name='drop' value='".'刪除'."'>".confirm(sprintf('Drop %s?',$fa))."\n";echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["type"])){$ga=$_GET["type"];$J=$_POST;if($_POST&&!$n){$_=substr(ME,0,-1);if($_POST["drop"])query_redirect("DROP TYPE ".idf_escape($ga),$_,'已刪除類型。');else
query_redirect("CREATE TYPE ".idf_escape(trim($J["name"]))." $J[as]",$_,'已建立類型。');}page_header($ga!=""?'修改類型'.": ".h($ga):'建立類型',$n);if(!$J)$J["as"]="AS ";echo'
<form action="" method="post">
<p>
';if($ga!="")echo"<input type='submit' name='drop' value='".'刪除'."'>".confirm(sprintf('Drop %s?',$ga))."\n";else{echo"<input name='name' value='".h($J['name'])."' autocapitalize='off'>\n";textarea("as",$J["as"]);echo"<p><input type='submit' value='".'儲存'."'>\n";}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["trigger"])){$a=$_GET["trigger"];$C=$_GET["name"];$oi=trigger_options();$J=(array)trigger($C)+array("Trigger"=>$a."_bi");if($_POST){if(!$n&&in_array($_POST["Timing"],$oi["Timing"])&&in_array($_POST["Event"],$oi["Event"])&&in_array($_POST["Type"],$oi["Type"])){$gf=" ON ".table($a);$ec="DROP TRIGGER ".idf_escape($C).($x=="pgsql"?$gf:"");$A=ME."table=".urlencode($a);if($_POST["drop"])query_redirect($ec,$A,'已刪除觸發器。');else{if($C!="")queries($ec);queries_redirect($A,($C!=""?'已修改觸發器。':'已建立觸發器。'),queries(create_trigger($gf,$_POST)));if($C!="")queries(create_trigger($gf,$J+array("Type"=>reset($oi["Type"]))));}}$J=$_POST;}page_header(($C!=""?'修改觸發器'.": ".h($C):'建立觸發器'),$n,array("table"=>$a));echo'
<form action="" method="post" id="form">
<table cellspacing="0">
<tr><th>時間<td>',html_select("Timing",$oi["Timing"],$J["Timing"],"triggerChange(/^".preg_quote($a,"/")."_[ba][iud]$/, '".js_escape($a)."', this.form);"),'<tr><th>事件<td>',html_select("Event",$oi["Event"],$J["Event"],"this.form['Timing'].onchange();"),(in_array("UPDATE OF",$oi["Event"])?" <input name='Of' value='".h($J["Of"])."' class='hidden'>":""),'<tr><th>類型<td>',html_select("Type",$oi["Type"],$J["Type"]),'</table>
<p>名稱: <input name="Trigger" value="',h($J["Trigger"]),'" maxlength="64" autocapitalize="off">
',script("qs('#form')['Timing'].onchange();"),'<p>';textarea("Statement",$J["Statement"]);echo'<p>
<input type="submit" value="儲存">
';if($C!=""){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',$C));}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["user"])){$ha=$_GET["user"];$gg=array(""=>array("All privileges"=>""));foreach(get_rows("SHOW PRIVILEGES")as$J){foreach(explode(",",($J["Privilege"]=="Grant option"?"":$J["Context"]))as$Ab)$gg[$Ab][$J["Privilege"]]=$J["Comment"];}$gg["Server Admin"]+=$gg["File access on server"];$gg["Databases"]["Create routine"]=$gg["Procedures"]["Create routine"];unset($gg["Procedures"]["Create routine"]);$gg["Columns"]=array();foreach(array("Select","Insert","Update","References")as$X)$gg["Columns"][$X]=$gg["Tables"][$X];unset($gg["Server Admin"]["Usage"]);foreach($gg["Tables"]as$y=>$X)unset($gg["Databases"][$y]);$Re=array();if($_POST){foreach($_POST["objects"]as$y=>$X)$Re[$X]=(array)$Re[$X]+(array)$_POST["grants"][$y];}$kd=array();$ef="";if(isset($_GET["host"])&&($H=$f->query("SHOW GRANTS FOR ".q($ha)."@".q($_GET["host"])))){while($J=$H->fetch_row()){if(preg_match('~GRANT (.*) ON (.*) TO ~',$J[0],$B)&&preg_match_all('~ *([^(,]*[^ ,(])( *\\([^)]+\\))?~',$B[1],$xe,PREG_SET_ORDER)){foreach($xe
as$X){if($X[1]!="USAGE")$kd["$B[2]$X[2]"][$X[1]]=true;if(preg_match('~ WITH GRANT OPTION~',$J[0]))$kd["$B[2]$X[2]"]["GRANT OPTION"]=true;}}if(preg_match("~ IDENTIFIED BY PASSWORD '([^']+)~",$J[0],$B))$ef=$B[1];}}if($_POST&&!$n){$ff=(isset($_GET["host"])?q($ha)."@".q($_GET["host"]):"''");if($_POST["drop"])query_redirect("DROP USER $ff",ME."privileges=",'已刪除使用者。');else{$Te=q($_POST["user"])."@".q($_POST["host"]);$Of=$_POST["pass"];if($Of!=''&&!$_POST["hashed"]){$Of=$f->result("SELECT PASSWORD(".q($Of).")");$n=!$Of;}$Fb=false;if(!$n){if($ff!=$Te){$Fb=queries((min_version(5)?"CREATE USER":"GRANT USAGE ON *.* TO")." $Te IDENTIFIED BY PASSWORD ".q($Of));$n=!$Fb;}elseif($Of!=$ef)queries("SET PASSWORD FOR $Te = ".q($Of));}if(!$n){$Ig=array();foreach($Re
as$Ze=>$jd){if(isset($_GET["grant"]))$jd=array_filter($jd);$jd=array_keys($jd);if(isset($_GET["grant"]))$Ig=array_diff(array_keys(array_filter($Re[$Ze],'strlen')),$jd);elseif($ff==$Te){$cf=array_keys((array)$kd[$Ze]);$Ig=array_diff($cf,$jd);$jd=array_diff($jd,$cf);unset($kd[$Ze]);}if(preg_match('~^(.+)\\s*(\\(.*\\))?$~U',$Ze,$B)&&(!grant("REVOKE",$Ig,$B[2]," ON $B[1] FROM $Te")||!grant("GRANT",$jd,$B[2]," ON $B[1] TO $Te"))){$n=true;break;}}}if(!$n&&isset($_GET["host"])){if($ff!=$Te)queries("DROP USER $ff");elseif(!isset($_GET["grant"])){foreach($kd
as$Ze=>$Ig){if(preg_match('~^(.+)(\\(.*\\))?$~U',$Ze,$B))grant("REVOKE",array_keys($Ig),$B[2]," ON $B[1] FROM $Te");}}}queries_redirect(ME."privileges=",(isset($_GET["host"])?'已修改使用者。':'已建立使用者。'),!$n);if($Fb)$f->query("DROP USER $Te");}}page_header((isset($_GET["host"])?'帳號'.": ".h("$ha@$_GET[host]"):'建立使用者'),$n,array("privileges"=>array('','權限')));if($_POST){$J=$_POST;$kd=$Re;}else{$J=$_GET+array("host"=>$f->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', -1)"));$J["pass"]=$ef;if($ef!="")$J["hashed"]=true;$kd[(DB==""||$kd?"":idf_escape(addcslashes(DB,"%_\\"))).".*"]=array();}echo'<form action="" method="post">
<table cellspacing="0">
<tr><th>伺服器<td><input name="host" maxlength="60" value="',h($J["host"]),'" autocapitalize="off">
<tr><th>帳號<td><input name="user" maxlength="16" value="',h($J["user"]),'" autocapitalize="off">
<tr><th>密碼<td><input name="pass" id="pass" value="',h($J["pass"]),'" autocomplete="new-password">
';if(!$J["hashed"])echo
script("typePassword(qs('#pass'));");echo
checkbox("hashed",1,$J["hashed"],'Hashed',"typePassword(this.form['pass'], this.checked);"),'</table>

';echo"<table cellspacing='0'>\n","<thead><tr><th colspan='2'>".'權限'.doc_link(array('sql'=>"grant.html#priv_level"));$s=0;foreach($kd
as$Ze=>$jd){echo'<th>'.($Ze!="*.*"?"<input name='objects[$s]' value='".h($Ze)."' size='10' autocapitalize='off'>":"<input type='hidden' name='objects[$s]' value='*.*' size='10'>*.*");$s++;}echo"</thead>\n";foreach(array(""=>"","Server Admin"=>'伺服器',"Databases"=>'資料庫',"Tables"=>'資料表',"Columns"=>'列',"Procedures"=>'程序',)as$Ab=>$Vb){foreach((array)$gg[$Ab]as$fg=>$ub){echo"<tr".odd()."><td".($Vb?">$Vb<td":" colspan='2'").' lang="en" title="'.h($ub).'">'.h($fg);$s=0;foreach($kd
as$Ze=>$jd){$C="'grants[$s][".h(strtoupper($fg))."]'";$Y=$jd[strtoupper($fg)];if($Ab=="Server Admin"&&$Ze!=(isset($kd["*.*"])?"*.*":".*"))echo"<td>&nbsp;";elseif(isset($_GET["grant"]))echo"<td><select name=$C><option><option value='1'".($Y?" selected":"").">".'授權'."<option value='0'".($Y=="0"?" selected":"").">".'廢除'."</select>";else{echo"<td align='center'><label class='block'>","<input type='checkbox' name=$C value='1'".($Y?" checked":"").($fg=="All privileges"?" id='grants-$s-all'>":">".($fg=="Grant option"?"":script("qsl('input').onclick = function () { if (this.checked) formUncheck('grants-$s-all'); };"))),"</label>";}$s++;}}}echo"</table>\n",'<p>
<input type="submit" value="儲存">
';if(isset($_GET["host"])){echo'<input type="submit" name="drop" value="刪除">',confirm(sprintf('Drop %s?',"$ha@$_GET[host]"));}echo'<input type="hidden" name="token" value="',$di,'">
</form>
';}elseif(isset($_GET["processlist"])){if(support("kill")&&$_POST&&!$n){$de=0;foreach((array)$_POST["kill"]as$X){if(kill_process($X))$de++;}queries_redirect(ME."processlist=",sprintf('%d 個 Process(es) 被終止',$de),$de||!$_POST["kill"]);}page_header('處理程序列表',$n);echo'
<form action="" method="post">
<table cellspacing="0" class="nowrap checkable">
',script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});");$s=-1;foreach(process_list()as$s=>$J){if(!$s){echo"<thead><tr lang='en'>".(support("kill")?"<th>&nbsp;":"");foreach($J
as$y=>$X)echo"<th>$y".doc_link(array('sql'=>"show-processlist.html#processlist_".strtolower($y),'pgsql'=>"monitoring-stats.html#PG-STAT-ACTIVITY-VIEW",'oracle'=>"../b14237/dynviews_2088.htm",));echo"</thead>\n";}echo"<tr".odd().">".(support("kill")?"<td>".checkbox("kill[]",$J[$x=="sql"?"Id":"pid"],0):"");foreach($J
as$y=>$X)echo"<td>".(($x=="sql"&&$y=="Info"&&preg_match("~Query|Killed~",$J["Command"])&&$X!="")||($x=="pgsql"&&$y=="current_query"&&$X!="<IDLE>")||($x=="oracle"&&$y=="sql_text"&&$X!="")?"<code class='jush-$x'>".shorten_utf8($X,100,"</code>").' <a href="'.h(ME.($J["db"]!=""?"db=".urlencode($J["db"])."&":"")."sql=".urlencode($X)).'">'.'複製'.'</a>':nbsp($X));echo"\n";}echo'</table>
<p>
';if(support("kill")){echo($s+1)."/".sprintf('總共 %d 個',max_connections()),"<p><input type='submit' value='".'終止'."'>\n";}echo'<input type="hidden" name="token" value="',$di,'">
</form>
',script("tableCheck();");}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$p=fields($a);$cd=column_foreign_keys($a);$bf=$S["Oid"];parse_str($_COOKIE["adminer_import"],$ya);$Jg=array();$e=array();$Sh=null;foreach($p
as$y=>$o){$C=$b->fieldName($o);if(isset($o["privileges"]["select"])&&$C!=""){$e[$y]=html_entity_decode(strip_tags($C),ENT_QUOTES);if(is_shortable($o))$Sh=$b->selectLengthProcess();}$Jg+=$o["privileges"];}list($L,$ld)=$b->selectColumnsProcess($e,$w);$Sd=count($ld)<count($L);$Z=$b->selectSearchProcess($p,$w);$rf=$b->selectOrderProcess($p,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$wi=>$J){$Ga=convert_field($p[key($J)]);$L=array($Ga?$Ga:idf_escape(key($J)));$Z[]=where_check($wi,$p);$I=$m->select($a,$L,$Z,$L);if($I)echo
reset($I->fetch_row());}exit;}$bg=$yi=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$bg=array_flip($v["columns"]);$yi=($L?$bg:array());foreach($yi
as$y=>$X){if(in_array(idf_escape($y),$L))unset($yi[$y]);}break;}}if($bf&&!$bg){$bg=$yi=array($bf=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($bf));}if($_POST&&!$n){$Yi=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$fb=array();foreach($_POST["check"]as$cb)$fb[]=where_check($cb,$p);$Yi[]="((".implode(") OR (",$fb)."))";}$Yi=($Yi?"\nWHERE ".implode(" AND ",$Yi):"");if($_POST["export"]){adm_cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$hd=($L?implode(", ",$L):"*").convert_fields($e,$p,$L)."\nFROM ".table($a);$nd=($ld&&$Sd?"\nGROUP BY ".implode(", ",$ld):"").($rf?"\nORDER BY ".implode(", ",$rf):"");if(!is_array($_POST["check"])||$bg)$G="SELECT $hd$Yi$nd";else{$ui=array();foreach($_POST["check"]as$X)$ui[]="(SELECT".limit($hd,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p).$nd,1).")";$G=implode(" UNION ALL ",$ui);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$cd)){if($_POST["save"]||$_POST["delete"]){$H=true;$za=0;$O=array();if(!$_POST["delete"]){foreach($e
as$C=>$X){$X=process_input($p[$C]);if($X!==null&&($_POST["clone"]||$X!==false))$O[idf_escape($C)]=($X!==false?$X:idf_escape($C));}}if($_POST["delete"]||$O){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($O)).")\nSELECT ".implode(", ",$O)."\nFROM ".table($a);if($_POST["all"]||($bg&&is_array($_POST["check"]))||$Sd){$H=($_POST["delete"]?$m->delete($a,$Yi):($_POST["clone"]?queries("INSERT $G$Yi"):$m->update($a,$O,$Yi)));$za=$f->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Ui="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$p);$H=($_POST["delete"]?$m->delete($a,$Ui,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$Ui)):$m->update($a,$O,$Ui,1)));if(!$H)break;$za+=$f->affected_rows;}}}$Ee=sprintf('%d個項目受到影響。',$za);if($_POST["clone"]&&$H&&$za==1){$ie=last_id();if($ie)$Ee=sprintf('已新增項目%s。'," $ie");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Ee,$H);if(!$_POST["delete"]){edit_form($a,$p,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$n='Ctrl+click on a value to modify it.';else{$H=true;$za=0;foreach($_POST["val"]as$wi=>$J){$O=array();foreach($J
as$y=>$X){$y=bracket_escape($y,1);$O[idf_escape($y)]=(preg_match('~char|text~',$p[$y]["type"])||$X!=""?$b->processInput($p[$y],$X):"NULL");}$H=$m->update($a,$O," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($wi,$p),!$Sd&&!$bg," ");if(!$H)break;$za+=$f->affected_rows;}queries_redirect(remove_from_uri(),sprintf('%d個項目受到影響。',$za),$H);}}elseif(!is_string($Sc=get_file("csv_file",true)))$n=upload_error($Sc);elseif(!preg_match('~~u',$Sc))$n='File must be in UTF-8 encoding.';else{adm_cookie("adminer_import","output=".urlencode($ya["output"])."&format=".urlencode($_POST["separator"]));$H=true;$rb=array_keys($p);preg_match_all('~(?>"[^"]*"|[^"\\r\\n]+)+~',$Sc,$xe);$za=count($xe[0]);$m->begin();$M=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$K=array();foreach($xe[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$M]*)$M~",$X.$M,$ye);if(!$y&&!array_diff($ye[1],$rb)){$rb=$ye[1];$za--;}else{$O=array();foreach($ye[1]as$s=>$mb)$O[idf_escape($rb[$s])]=($mb==""&&$p[$rb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$mb))));$K[]=$O;}}$H=(!$K||$m->insertUpdate($a,$K,$bg));if($H)$H=$m->commit();queries_redirect(remove_from_uri("page"),sprintf('已匯入%d行。',$za),$H);$m->rollback();}}}$Eh=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('選擇'.": $Eh",$n);$O=null;if(isset($Jg["insert"])||!support("table")){$O="";foreach((array)$_GET["where"]as$X){if($cd[$X["col"]]&&count($cd[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$O.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$O);if(!$e&&support("table"))echo"<p class='error'>".'無法選擇該資料表'.($p?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($L,$e);$b->selectSearchPrint($Z,$e,$w);$b->selectOrderPrint($rf,$e,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($Sh);$b->selectActionPrint($w);echo"</form>\n";$E=$_GET["page"];if($E=="last"){$fd=$f->result(count_rows($a,$Z,$Sd,$ld));$E=floor(max(0,$fd-1)/$z);}$Vg=$L;$md=$ld;if(!$Vg){$Vg[]="*";$Bb=convert_fields($e,$p,$L);if($Bb)$Vg[]=substr($Bb,2);}foreach($L
as$y=>$X){$o=$p[idf_unescape($X)];if($o&&($Ga=convert_field($o)))$Vg[$y]="$Ga AS $X";}if(!$Sd&&$yi){foreach($yi
as$y=>$X){$Vg[]=idf_escape($y);if($md)$md[]=idf_escape($y);}}$H=$m->select($a,$Vg,$Z,$md,$rf,$z,$E,true);if(!$H)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$E)$H->seek($z*$E);$rc=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$K=array();while($J=$H->fetch_assoc()){if($E&&$x=="oracle")unset($J["RNUM"]);$K[]=$J;}if($_GET["page"]!="last"&&$z!=""&&$ld&&$Sd&&$x=="sql")$fd=$f->result(" SELECT FOUND_ROWS()");if(!$K)echo"<p class='message'>".'沒有行。'."\n";else{$Pa=$b->backwardKeys($a,$Eh);echo"<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$ld&&$L?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'Modify'."</a>");$Qe=array();$id=array();reset($L);$qg=1;foreach($K[0]as$y=>$X){if(!isset($yi[$y])){$X=$_GET["columns"][key($L)];$o=$p[$L?($X?$X["col"]:current($L)):$y];$C=($o?$b->fieldName($o,$qg):($X["fun"]?"*":$y));if($C!=""){$qg++;$Qe[$y]=$C;$d=idf_escape($y);$yd=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$Vb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($yd.($rf[0]==$d||$rf[0]==$y||(!$rf&&$Sd&&$ld[0]==$d)?$Vb:'')).'">';echo
apply_sql_function($X["fun"],$C)."</a>";echo"<span class='column hidden'>","<a href='".h($yd.$Vb)."' title='".'降冪(遞減)'."' class='text'> ↓</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'搜尋'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$id[$y]=$X["fun"];next($L);}}$oe=array();if($_GET["modify"]){foreach($K
as$J){foreach($J
as$y=>$X)$oe[$y]=max($oe[$y],min(40,strlen(utf8_decode($X))));}}echo($Pa?"<th>".'關聯':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$E%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($K,$cd)as$Pe=>$J){$vi=unique_array($K[$Pe],$w);if(!$vi){$vi=array();foreach($K[$Pe]as$y=>$X){if(!preg_match('~^(COUNT\\((\\*|(DISTINCT )?`(?:[^`]|``)+`)\\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\\(`(?:[^`]|``)+`\\))$~',$y))$vi[$y]=$X;}}$wi="";foreach($vi
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$p[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$p[$y]["collation"])?$y:"CONVERT($y USING ".charset($f).")").")";$X=md5($X);}$wi.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$ld&&$L?"":"<td>".checkbox("check[]",substr($wi,1),in_array(substr($wi,1),(array)$_POST["check"])).($Sd||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$wi)."' class='edit'>".'編輯'."</a>"));foreach($J
as$y=>$X){if(isset($Qe[$y])){$o=$p[$y];$X=$m->value($X,$o);if($X!=""&&(!isset($rc[$y])||$rc[$y]!=""))$rc[$y]=(is_mail($X)?$Qe[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$o["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$wi;if(!$_&&$X!==null){foreach((array)$cd[$y]as$q){if(count($cd[$y])==1||end($q["source"])==$y){$_="";foreach($q["source"]as$s=>$lh)$_.=where_link($s,$q["target"][$s],$K[$Pe][$lh]);$_=($q["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\\1'.urlencode($q["db"]),ME):ME).'select='.urlencode($q["table"]).$_;if($q["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\\1'.urlencode($q["ns"]),$_);if(count($q["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$vi))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($vi
as$Xd=>$W)$_.=where_link($s++,$Xd,$W);}$X=select_value($X,$_,$o,$Sh);$t=h("val[$wi][".bracket_escape($y)."]");$Y=$_POST["val"][$wi][bracket_escape($y)];$mc=!is_array($J[$y])&&is_utf8($X)&&$K[$Pe][$y]==$J[$y]&&!$id[$y];$Rh=preg_match('~text|lob~',$o["type"]);if(($_GET["modify"]&&$mc)||$Y!==null){$pd=h($Y!==null?$Y:$J[$y]);echo"<td>".($Rh?"<textarea name='$t' cols='30' rows='".(substr_count($J[$y],"\n")+1)."'>$pd</textarea>":"<input name='$t' value='$pd' size='$oe[$y]'>");}else{$se=strpos($X,"<i>...</i>");echo"<td id='$t' data-text='".($se?2:($Rh?1:0))."'".($mc?"":" data-warning='".h('使用編輯連結來修改。')."'").">$X</td>";}}}if($Pa)echo"<td>";$b->backwardKeysPrint($Pa,$K[$Pe]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n";}if(!is_ajax()){if($K||$E){$Ac=true;if($_GET["page"]!="last"){if($z==""||(count($K)<$z&&($K||!$E)))$fd=($E?$E*$z:0)+count($K);elseif($x!="sql"||!$Sd){$fd=($Sd?false:found_rows($S,$Z));if($fd<max(1e4,2*($E+1)*$z))$fd=reset(slow_query(count_rows($a,$Z,$Sd,$ld)));else$Ac=false;}}$Df=($z!=""&&($fd===false||$fd>$z||$E));if($Df){echo(($fd===false?count($K)+1:$fd-$E*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($E+1)).'" class="loadmore">'.'Load more data'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Loading'."...');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($K||$E){if($Df){$_e=($fd===false?$E+(count($K)>=$z?2:1):floor(($fd-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'頁'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'頁'."', '".($E+1)."')); return false; };"),pagination(0,$E).($E>5?" ...":"");for($s=max(1,$E-4);$s<min($_e,$E+5);$s++)echo
pagination($s,$E);if($_e>0){echo($E+5<$_e?" ...":""),($Ac&&$fd!==false?pagination($_e,$E):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$_e'>".'最後一頁'."</a>");}}else{echo"<legend>".'頁'."</legend>",pagination(0,$E).($E>1?" ...":""),($E?pagination($E,$E):""),($_e>$E?pagination($E+1,$E).($_e>$E+1?" ...":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'所有結果'."</legend>";$ac=($Ac?"":"~ ").$fd;echo
checkbox("all",1,0,($fd!==false?($Ac?"":"~ ").sprintf('%d行',$fd):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$ac' : checked); selectCount('selected2', this.checked || !checked ? '$ac' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>Modify</legend><div>
<input type="submit" value="儲存"',($_GET["modify"]?'':' title="'.'Ctrl+click on a value to modify it.'.'"'),'>
</div></fieldset>
<fieldset><legend>Selected <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="編輯">
<input type="submit" name="clone" value="複製">
<input type="submit" name="delete" value="刪除">',confirm(),'</div></fieldset>
';}$dd=$b->dumpFormat();foreach((array)$_GET["columns"]as$d){if($d["fun"]){unset($dd['sql']);break;}}if($dd){print_fieldset("export",'匯出'." <span id='selected2'></span>");$Bf=$b->dumpOutput();echo($Bf?html_select("output",$Bf,$ya["output"])." ":""),html_select("format",$dd,$ya["format"])," <input type='submit' name='export' value='".'匯出'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($rc,'strlen'),$e);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'匯入'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$ya["format"],1);echo" <input type='submit' name='import' value='".'匯入'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$di'>\n","</form>\n",(!$ld&&$L?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["variables"])){$P=isset($_GET["status"]);page_header($P?'狀態':'變數');$Li=($P?show_status():show_variables());if(!$Li)echo"<p class='message'>".'沒有行。'."\n";else{echo"<table cellspacing='0'>\n";foreach($Li
as$y=>$X){echo"<tr>","<th><code class='jush-".$x.($P?"status":"set")."'>".h($y)."</code>","<td>".nbsp($X);}echo"</table>\n";}}elseif(isset($_GET["script"])){header("Content-Type: text/javascript; charset=utf-8");if($_GET["script"]=="db"){$Bh=array("Data_length"=>0,"Index_length"=>0,"Data_free"=>0);foreach(table_status()as$C=>$S){json_row("Comment-$C",nbsp($S["Comment"]));if(!is_view($S)){foreach(array("Engine","Collation")as$y)json_row("$y-$C",nbsp($S[$y]));foreach($Bh+array("Auto_increment"=>0,"Rows"=>0)as$y=>$X){if($S[$y]!=""){$X=format_number($S[$y]);json_row("$y-$C",($y=="Rows"&&$X&&$S["Engine"]==($oh=="pgsql"?"table":"InnoDB")?"~ $X":$X));if(isset($Bh[$y]))$Bh[$y]+=($S["Engine"]!="InnoDB"||$y!="Data_free"?$S[$y]:0);}elseif(array_key_exists($y,$S))json_row("$y-$C");}}}foreach($Bh
as$y=>$X)json_row("sum-$y",format_number($X));json_row("");}elseif($_GET["script"]=="kill")$f->query("KILL ".number($_POST["kill"]));else{foreach(count_tables($b->databases())as$l=>$X){json_row("tables-$l",$X);json_row("size-$l",db_size($l));}json_row("");}exit;}else{$Kh=array_merge((array)$_POST["tables"],(array)$_POST["views"]);if($Kh&&!$n&&!$_POST["search"]){$H=true;$Ee="";if($x=="sql"&&$_POST["tables"]&&count($_POST["tables"])>1&&($_POST["drop"]||$_POST["truncate"]||$_POST["copy"]))queries("SET foreign_key_checks = 0");if($_POST["truncate"]){if($_POST["tables"])$H=truncate_tables($_POST["tables"]);$Ee='已清空資料表。';}elseif($_POST["move"]){$H=move_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ee='已轉移資料表。';}elseif($_POST["copy"]){$H=copy_tables((array)$_POST["tables"],(array)$_POST["views"],$_POST["target"]);$Ee='資料表已經複製';}elseif($_POST["drop"]){if($_POST["views"])$H=drop_views($_POST["views"]);if($H&&$_POST["tables"])$H=drop_tables($_POST["tables"]);$Ee='已經將資料表刪除。';}elseif($x!="sql"){$H=($x=="sqlite"?queries("VACUUM"):apply_queries("VACUUM".($_POST["optimize"]?"":" ANALYZE"),$_POST["tables"]));$Ee='Tables have been optimized.';}elseif(!$_POST["tables"])$Ee='沒有資料表。';elseif($H=queries(($_POST["optimize"]?"OPTIMIZE":($_POST["check"]?"CHECK":($_POST["repair"]?"REPAIR":"ANALYZE")))." TABLE ".implode(", ",array_map('idf_escape',$_POST["tables"])))){while($J=$H->fetch_assoc())$Ee.="<b>".h($J["Table"])."</b>: ".h($J["Msg_text"])."<br>";}queries_redirect(substr(ME,0,-1),$Ee,$H);}page_header(($_GET["ns"]==""?'資料庫'.": ".h(DB):'資料表結構'.": ".h($_GET["ns"])),$n,true);if($b->homepage()){if($_GET["ns"]!==""){echo"<h3 id='tables-views'>".'資料表和檢視表'."</h3>\n";$Jh=tables_list();if(!$Jh)echo"<p class='message'>".'沒有資料表。'."\n";else{echo"<form action='' method='post'>\n";if(support("table")){echo"<fieldset><legend>".'在資料庫搜尋'." <span id='selected2'></span></legend><div>","<input type='search' name='query' value='".h($_POST["query"])."'>",script("qsl('input').onkeydown = partialArg(bodyKeydown, 'search');","")," <input type='submit' name='search' value='".'搜尋'."'>\n","</div></fieldset>\n";if($_POST["search"]&&$_POST["query"]!=""){$_GET["where"][0]["op"]="LIKE %%";search_tables();}}$bc=doc_link(array('sql'=>'show-table-status.html'));echo"<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^(tables|views)\[/);",""),'<th>'.'資料表','<td>'.'引擎'.doc_link(array('sql'=>'storage-engines.html')),'<td>'.'校對'.doc_link(array('sql'=>'charset-charsets.html','mariadb'=>'supported-character-sets-and-collations/')),'<td>'.'資料長度'.$bc,'<td>'.'索引長度'.$bc,'<td>'.'資料空閒'.$bc,'<td>'.'自動遞增'.doc_link(array('sql'=>'example-auto-increment.html','mariadb'=>'auto_increment/')),'<td>'.'行數'.$bc,(support("comment")?'<td>'.'註解'.$bc:''),"</thead>\n";$T=0;foreach($Jh
as$C=>$U){$Oi=($U!==null&&!preg_match('~table~i',$U));$t=h("Table-".$C);echo'<tr'.odd().'><td>'.checkbox(($Oi?"views[]":"tables[]"),$C,in_array($C,$Kh,true),"","","",$t),'<th>'.(support("table")||support("indexes")?"<a href='".h(ME)."table=".urlencode($C)."' title='".'顯示結構'."' id='$t'>".h($C).'</a>':h($C));if($Oi){echo'<td colspan="6"><a href="'.h(ME)."view=".urlencode($C).'" title="'.'修改檢視表'.'">'.(preg_match('~materialized~i',$U)?'Materialized view':'檢視表').'</a>','<td align="right"><a href="'.h(ME)."select=".urlencode($C).'" title="'.'選擇資料'.'">?</a>';}else{foreach(array("Engine"=>array(),"Collation"=>array(),"Data_length"=>array("create",'修改資料表'),"Index_length"=>array("indexes",'修改索引'),"Data_free"=>array("edit",'新增項目'),"Auto_increment"=>array("auto_increment=1&create",'修改資料表'),"Rows"=>array("select",'選擇資料'),)as$y=>$_){$t=" id='$y-".h($C)."'";echo($_?"<td align='right'>".(support("table")||$y=="Rows"||(support("indexes")&&$y!="Data_length")?"<a href='".h(ME."$_[0]=").urlencode($C)."'$t title='$_[1]'>?</a>":"<span$t>?</span>"):"<td id='$y-".h($C)."'>&nbsp;");}$T++;}echo(support("comment")?"<td id='Comment-".h($C)."'>&nbsp;":"");}echo"<tr><td>&nbsp;<th>".sprintf('總共 %d 個',count($Jh)),"<td>".nbsp($x=="sql"?$f->result("SELECT @@storage_engine"):""),"<td>".nbsp(db_collation(DB,collations()));foreach(array("Data_length","Index_length","Data_free")as$y)echo"<td align='right' id='sum-$y'>&nbsp;";echo"</table>\n";if(!information_schema(DB)){echo"<div class='footer'><div>\n";$Ii="<input type='submit' value='".'Vacuum'."'> ".on_help("'VACUUM'");$nf="<input type='submit' name='optimize' value='".'最佳化'."'> ".on_help($x=="sql"?"'OPTIMIZE TABLE'":"'VACUUM OPTIMIZE'");echo"<fieldset><legend>".'Selected'." <span id='selected'></span></legend><div>".($x=="sqlite"?$Ii:($x=="pgsql"?$Ii.$nf:($x=="sql"?"<input type='submit' value='".'分析'."'> ".on_help("'ANALYZE TABLE'").$nf."<input type='submit' name='check' value='".'檢查'."'> ".on_help("'CHECK TABLE'")."<input type='submit' name='repair' value='".'修復'."'> ".on_help("'REPAIR TABLE'"):"")))."<input type='submit' name='truncate' value='".'清空'."'> ".on_help($x=="sqlite"?"'DELETE'":"'TRUNCATE".($x=="pgsql"?"'":" TABLE'")).confirm()."<input type='submit' name='drop' value='".'刪除'."'>".on_help("'DROP TABLE'").confirm()."\n";$k=(support("scheme")?$b->schemas():$b->databases());if(count($k)!=1&&$x!="sqlite"){$l=(isset($_POST["target"])?$_POST["target"]:(support("scheme")?$_GET["ns"]:DB));echo"<p>".'轉移到其它資料庫'.": ",($k?html_select("target",$k,$l):'<input name="target" value="'.h($l).'" autocapitalize="off">')," <input type='submit' name='move' value='".'轉移'."'>",(support("copy")?" <input type='submit' name='copy' value='".'複製'."'>":""),"\n";}echo"<input type='hidden' name='all' value=''>";echo
script("qsl('input').onclick = function () { selectCount('selected', formChecked(this, /^(tables|views)\[/));".(support("table")?" selectCount('selected2', formChecked(this, /^tables\[/) || $T);":"")." }"),"<input type='hidden' name='token' value='$di'>\n","</div></fieldset>\n","</div></div>\n";}echo"</form>\n",script("tableCheck();");}echo'<p class="links"><a href="'.h(ME).'create=">'.'建立資料表'."</a>\n",(support("view")?'<a href="'.h(ME).'view=">'.'建立檢視表'."</a>\n":"");if(support("routine")){echo"<h3 id='routines'>".'程序'."</h3>\n";$Ng=routines();if($Ng){echo"<table cellspacing='0'>\n",'<thead><tr><th>'.'名稱'.'<td>'.'類型'.'<td>'.'回傳類型'."<td>&nbsp;</thead>\n";odd('');foreach($Ng
as$J){$C=($J["SPECIFIC_NAME"]==$J["ROUTINE_NAME"]?"":"&name=".urlencode($J["ROUTINE_NAME"]));echo'<tr'.odd().'>','<th><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'callf=':'call=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.h($J["ROUTINE_NAME"]).'</a>','<td>'.h($J["ROUTINE_TYPE"]),'<td>'.h($J["DTD_IDENTIFIER"]),'<td><a href="'.h(ME.($J["ROUTINE_TYPE"]!="PROCEDURE"?'function=':'procedure=').urlencode($J["SPECIFIC_NAME"]).$C).'">'.'修改'."</a>";}echo"</table>\n";}echo'<p class="links">'.(support("procedure")?'<a href="'.h(ME).'procedure=">'.'建立預存程序'.'</a>':'').'<a href="'.h(ME).'function=">'.'建立函數'."</a>\n";}if(support("sequence")){echo"<h3 id='sequences'>".'序列'."</h3>\n";$bh=get_vals("SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = current_schema() ORDER BY sequence_name");if($bh){echo"<table cellspacing='0'>\n","<thead><tr><th>".'名稱'."</thead>\n";odd('');foreach($bh
as$X)echo"<tr".odd()."><th><a href='".h(ME)."sequence=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."sequence='>".'建立序列'."</a>\n";}if(support("type")){echo"<h3 id='user-types'>".'使用者類型'."</h3>\n";$Gi=types();if($Gi){echo"<table cellspacing='0'>\n","<thead><tr><th>".'名稱'."</thead>\n";odd('');foreach($Gi
as$X)echo"<tr".odd()."><th><a href='".h(ME)."type=".urlencode($X)."'>".h($X)."</a>\n";echo"</table>\n";}echo"<p class='links'><a href='".h(ME)."type='>".'建立類型'."</a>\n";}if(support("event")){echo"<h3 id='events'>".'事件'."</h3>\n";$K=get_rows("SHOW EVENTS");if($K){echo"<table cellspacing='0'>\n","<thead><tr><th>".'名稱'."<td>".'排程'."<td>".'開始'."<td>".'結束'."<td></thead>\n";foreach($K
as$J){echo"<tr>","<th>".h($J["Name"]),"<td>".($J["Execute at"]?'在指定時間'."<td>".$J["Execute at"]:'每'." ".$J["Interval value"]." ".$J["Interval field"]."<td>$J[Starts]"),"<td>$J[Ends]",'<td><a href="'.h(ME).'event='.urlencode($J["Name"]).'">'.'修改'.'</a>';}echo"</table>\n";$zc=$f->result("SELECT @@event_scheduler");if($zc&&$zc!="ON")echo"<p class='error'><code class='jush-sqlset'>event_scheduler</code>: ".h($zc)."\n";}echo'<p class="links"><a href="'.h(ME).'event=">'.'建立事件'."</a>\n";}if($Jh)echo
script("ajaxSetHtml('".js_escape(ME)."script=db');");}}}page_footer();
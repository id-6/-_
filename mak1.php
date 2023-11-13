<?php
ob_start();
$token = "[*[TOKEN]*]"; # Token
$tokensan3 = "[*[TOKENSAN3]*]"; # Token
$admin = file_get_contents("admin.txt");
$sudo = array("$admin","1965297568");
$infobot=explode("\n",file_get_contents("info.txt"));
$usernamebot=$infobot['1'];
$no3mak=$infobot['6'];
//--------
define('API_KEY',$token);
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}


$update = json_decode(file_get_contents("php://input"));
file_put_contents("update.txt",json_encode($update));
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;$type = $message->chat->type;
$message_id = $message->message_id;
$name = $message->from->first_name.' '.$message->from->last_name;
$user = strtolower($message->from->username);

$t =$message->chat->title; 

if(isset($update->callback_query)){
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = strtolower($up->from->username); 
$name = $up->from->first_name.' '.$up->from->last_name;
$message_id = $up->message->message_id;
$mes_id = $update->callback_query->inline_message_id; 

$data = $up->data;
}

if(isset($update->inline_query)){
$chat_id = $update->inline_query->chat->id;
$from_id = $update->inline_query->from->id;
$name = $update->inline_query->from->first_name.' '.$update->inline_query->from->last_name;
$text_inline = $update->inline_query->query;
$mes_id = $update->inline_query->inline_message_id; 

$user = strtolower($update->inline_query->from->username); 
}
$caption = $update->message->caption;
function getChatstats1($chat_id,$token) {
  $url = 'https://api.telegram.org/bot'.$token.'/getChatAdministrators?chat_id='.$chat_id;
  $result = file_get_contents($url);
  $result = json_decode ($result);
  $result = $result->ok;
  return $result;
}
 function getmember($token,$idchannel,$from_id) {
  $join = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=$idchannel&user_id=".$from_id);
if((strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"Bad Request: user not found"') or strpos($join,'"ok": false') or strpos($join,'"status":"kicked"')) !== false){
$KhAlEdJ="no";}else{$KhAlEdJ="yes";}
return $KhAlEdJ;


}
@mkdir("sudo");
@mkdir("data");
$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
$admin=file_get_contents("admin.txt");

@$KhAlEdJjson = json_decode(file_get_contents("../KhAlEdJ.json"),true);
$st_ch_bots=$KhAlEdJjson["info"]["st_ch_bots"];
$id_ch_sudo1=$KhAlEdJjson["info"]["id_channel"];
$link_ch_sudo1=$KhAlEdJjson["info"]["link_channel"];
$id_ch_sudo2=$KhAlEdJjson["info"]["id_channel2"];
$link_ch_sudo2=$KhAlEdJjson["info"]["link_channel2"];
$user_bot_sudo=$KhAlEdJjson["info"]["user_bot"];


@$projson = json_decode(file_get_contents("pro.json"),true);
$pro=$projson["info"]["pro"];

$dateon=$projson["info"]["dateon"];

$dateoff=$projson["info"]["dateoff"];


$time=time()+(3600 * 1);

if($pro!="yes" or $pro==null){
#if($time < $dateoff){
$txtfree='<a href="https://t.me/'.$user_bot_sudo.'">• اضغط هنا لنصع '.$no3mak.' خاص بك </a>';
#}
}



$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$txt = $message->caption;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$new = $message->new_chat_members;
$message_id = $message->message_id;
$type = $message->chat->type;
$name = $message->from->first_name;
if(isset($update->callback_query)){
$callbackMessage = '';
var_dump(bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'text'=>$callbackMessage]));
$up = $update->callback_query;
$chat_id = $up->message->chat->id;
$from_id = $up->from->id;
$user = $up->from->username;
$name = $up->from->first_name;
$message_id = $up->message->message_id;
$data = $up->data;
}
$id = $update->inline_query->from->id; 
//$admin = $admin; 
mkdir("sudo");
mkdir("message");
mkdir("data");
mkdir("ms");
mkdir("count");
mkdir("count/user");
mkdir("count/admin");
$START= file_get_contents("data/start.txt");
$getmes_id = explode("\n", file_get_contents("ms/$message_id.txt"));
$get_ban=file_get_contents('data/ban.txt');
$ban =explode("\n",$get_ban);
/////////////////////

$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
//////////

$amr = file_get_contents("sudo/amr.txt");
$ch1 = file_get_contents("sudo/ch1.txt");
$ch2= file_get_contents("sudo/ch2.txt");
$taf3il = file_get_contents("sudo/tanbih.txt");
$estgbal = file_get_contents("sudo/estgbal.txt");

 //ايديك
$reply = $message->reply_to_message->message_id;
$rep = $message->reply_to_message->forward_from; 

////======================\\\\

if($message){
$join = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$ch1&user_id=$from_id");
$join2 = file_get_contents("https://api.telegram.org/bot$token/getChatMember?chat_id=$ch2&user_id=$from_id");

if($message && (
strpos($join,'"status":"left"') 
or
strpos($join,'"Bad Request: USER_ID_INVALID"')
or
strpos($join,'"Bad Request: user not found"')
or
strpos($join,'"ok": false')
or strpos($join,'"status":"kicked"') or 
strpos($join2,'"status":"left"') 
or 
strpos($join2,'"Bad Request: USER_ID_INVALID"') 
or 
strpos($join2,'"Bad Request: user not found"') 
or
strpos($join2,'"ok": false') 
or strpos($join2,'"status":"kicked"'))!== false){
$ch1=str_replace("@","",$ch1);
$ch2=str_replace("@","",$ch2);
bot('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"
⛔️| عذرا عزيزي
◾| البوت لا يعمل الا اذا قمت بالاشتراك بالقناه
◾| وعند الغاء الاشتراك فان البوت سوف يتوقف


[📨|اضعط للاشتراك في القناة الاولى 💘💌'](https://t.me/$ch1)

[📨|اضعط للاشتراك في القناة الثانية 💘💌'](https://t.me/$ch2)
",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"• اضغط للاشتراك في القناة الاولى", 'url'=>"https://t.me/$ch1"]],
[['text'=>"• اضغط للاشتراك في القناة الثانية", 'url'=>"https://t.me/$ch2"]]
]
])
]);
return false;}}





if($update and !in_array($from_id, $member)){
file_put_contents("sudo/member.txt","$from_id\n",FILE_APPEND);

if($taf3il == "yas" ){
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"- دخل شخص إلى البوت 🚶‍♂

[$name](tg://user?id=$from_id) 

- ايديه $from_id 🆔

---------
عدد اعضاء بوتك هو : $cunte
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);
}else{
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"",
]);
}}
if($data=="admin"and in_array($from_id, $sudo)){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"👮|  اهلا بك عزيزي المطور اليك قائمة الاوامر الشفافة قم باختيار ",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- أوامر قناة الإشتراك الإجباري الأولى 📡1⃣".' ,'callback_data'=>"ula"]],
[['text'=>'- أوامر قناة الإشتراك الإجباري الثانية 📢2⃣".' ,'callback_data'=>"thany"]],
[['text'=>'- عرض قنوات الإشتراك الإجباري 📜".' ,'callback_data'=>"gnoaty"]],
[['text'=>'- أوامر البيانات الخاصة بالمالك 🗣".' ,'callback_data'=>"atther"]],
[['text'=>'- أوامر الإذاعة 🗣".' ,'callback_data'=>"ethaa"]],
[['text'=>'- عدد المشتركين 👥".' ,'callback_data'=>"memb"]],
[['text'=>'- التنبيه عند دخول أحد للبوت 🚸".' ,'callback_data'=>"tnbeh"]],
[['text'=>'-عدد المحضورين 👥".' ,'callback_data'=>"ban"]],
[['text'=>'- استقبال الرسائل من الأعضاء 🔃".' ,'callback_data'=>"estgbal"]],
[['text'=>'الحمايــــــــــــه 🔒' ,'callback_data'=>"hmaih"]],
]])
]);
unlink("sudo/amr.txt");
}
if($text=="/start"and in_array($from_id, $sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
"text"=>"👮|  اهلا بك عزيزي المطور اليك قائمة الاوامر الشفافة قم باختيار ",
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- أوامر قناة الإشتراك الإجباري الأولى 📡1⃣".' ,'callback_data'=>"ula"]],
[['text'=>'- أوامر قناة الإشتراك الإجباري الثانية 📢2⃣".' ,'callback_data'=>"thany"]],
[['text'=>'- عرض قنوات الإشتراك الإجباري 📜".' ,'callback_data'=>"gnoaty"]],
[['text'=>'- أوامر البيانات الخاصة بالمالك 🗣".' ,'callback_data'=>"atther"]],
[['text'=>'- أوامر الإذاعة 🗣".' ,'callback_data'=>"ethaa"]],
[['text'=>'- عدد المشتركين 👥".' ,'callback_data'=>"memb"]],
[['text'=>'- التنبيه عند دخول أحد للبوت 🚸".' ,'callback_data'=>"tnbeh"]],
[['text'=>'-عدد المحضورين 👥".' ,'callback_data'=>"ban"]],
[['text'=>'- استقبال الرسائل من الأعضاء 🔃".' ,'callback_data'=>"estgbal"]],
[['text'=>'الحمايــــــــــــه 🔒' ,'callback_data'=>"hmaih"]],
]])]);
unlink("sudo/amr.txt");
}
///====قنوات الاشتراك الاجباري ====\\\\
if($data == "ula"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- أوامر قناة الإشتراك الإجباري الأولى 📡1⃣".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- وضع قناة 📡✅".' ,'callback_data'=>"ch1"]],
[['text'=>'- حذف القناة 📡❎".' ,'callback_data'=>"dch1"]],[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])]);}
if($data == "ch1"){
bot('EditMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'- أرسل معرف القناة الآن Ⓜ️".',
 'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"ula"]],
]])]);
file_put_contents("sudo/amr.txt","ch1");
}
if($text and $amr == "ch1" and $from_id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'- تم حفظ معرف القناة الاولى بنجاح ✅".
- تأكد من أن البوت أدمن في القناة ليتم تفعيل الإشتراك الإجباري 👨🏻‍✈️".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])]);
file_put_contents("sudo/ch1.txt","$text");
unlink("sudo/amr.txt");
}
if($data == "dch1"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم حذف القناة بنجاح ✅".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])]);
unlink("sudo/amr.txt");
unlink("sudo/ch1.txt");
}
/////////////////2/////////////////
if($data == "thany"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- أوامر قناة الإشتراك الإجباري الثانية 📢2⃣".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- وضع قناة 📡✅".' ,'callback_data'=>"ch2"]],
[['text'=>'- حذف القناة 📡❎".' ,'callback_data'=>"dch2"]],[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]
])
]);
}
if($data == "ch2"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- أرسل معرف القناة الآن Ⓜ️".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"thany"]],
]])
]);
file_put_contents("sudo/amr.txt","ch2");
}
if($text and $amr == "ch2" and $from_id == $admin){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>'- تم حفظ معرف القناة الثانية بنجاح ✅".

- تأكد من أن البوت أدمن في القناة ليتم تفعيل الإشتراك الإجباري 👨🏻‍✈️".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
file_put_contents("sudo/ch2.txt","$text");
unlink("sudo/amr.txt");
}
if($data == "dch2"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم حذف القناة بنجاح ✅".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
unlink("sudo/amr.txt");
unlink("sudo/ch2.txt");
}


///////////////3/////////////////
if($data == "gnoaty"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- هذه هي قائمة قنوات الإشتراك الإجباري 📜".

- القناة الأولى '.$ch1.' 📡".

- القناة الثانية '.$ch2.' 📢".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
unlink("sudo/amr.txt");
}

///==== الاذاعة  ====\\\\

///==== الاذاعة  ====\\\\
$memberi = explode("\n",file_get_contents("sudo/member.txt"));
$cuntei = count($memberi)-1;

if($data == "ethaa"){
$mim= file_get_contents("sudo/member.txt");
file_put_contents("sudo/mim.txt","$mim");
mkdir("ms");
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- أوامــــــــر الإذاعــــــــــــــــة 🗣".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- نشر توجيه ↪️".' ,'callback_data'=>"tawgih"]],
[['text'=>'-MARKDOWN نشر رسالة 📝".' ,'callback_data'=>"messagem"]],
[['text'=>'-HTML نشر رسالة 📝".' ,'callback_data'=>"messageh"]],
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]
])
]);
}


$miim = explode("\n",file_get_contents("sudo/mim.txt"));
$cmiim = count($miim)-1;
/////////////////markdown
if($data == "messagem"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>"- أرسل رسالتك ليتم نشرها بصيغة markdown رسالة لجميع الأعضاء 📝 
عدد الاعضاء : $cmiim
",
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"ethaa"]],
]])
]);
file_put_contents("sudo/amr.txt","messagemark");
}

if($text and $amr == "messagemark" and in_array($from_id, $sudo)){
unlink("sudo/amr.txt");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$text",
"message_id"=>$message_id+1,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
]);
$msg = $message_id+1;
for($i=0;$i<count($miim);$i++){
$get =bot('SendMessage', [
'chat_id' => $miim[$i],
'text'=>$text,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$miim[$i]."==". $msg_id."\n", FILE_APPEND);
$str= file_get_contents("sudo/mim.txt");
$str= str_replace($miim[$i]."\n","",$str);
file_put_contents("sudo/mim.txt",$str);
}
$ms=explode("\n",file_get_contents("ms/$msg.txt"));
$count= count($ms);

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"- تم نشر هذه الرساله 👇
-----------------------------------
$text
-----------------------------------
لعدد ($count) عضو. * 
",

"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف الرسالة",'callback_data'=>"delelink ".$msg]],
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"ethaa"]],
]])
]);
}

//////////////html
if($data == "messageh"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- أرسل رسالتك ليتم نشرها بصيغة HTML رسالة لجميع الأعضاء 📝".
عدد الاعضاء:'.$cmiim,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"ethaa"]],
]])
]);
file_put_contents("sudo/amr.txt","messagehtml");
}
if($text and $amr == "messagehtml" and in_array($from_id, $sudo)){
unlink("sudo/amr.txt");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$text",
"message_id"=>$message_id+1,
]);
$msg = $message_id+1;
for($i=0;$i<count($miim);$i++){
$get =bot('SendMessage', [
'chat_id' => $miim[$i],
'text'=>$text,
'parse_mode'=>"html",
'disable_web_page_preview'=>true
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$miim[$i]."==". $msg_id."\n", FILE_APPEND);
$str= file_get_contents("sudo/mim.txt");
$str= str_replace($miim[$i]."\n","",$str);
file_put_contents("sudo/mim.txt",$str);
}
$ms=explode("\n",file_get_contents("ms/$msg.txt"));
$count= count($ms);

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"- تم نشر هذه الرساله 👇
-----------------------------------
$text
-----------------------------------
لعدد ($count) عضو. * 
",
'parse_mode'=>"html",
'disable_web_page_preview'=>true,
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف الرسالة",'callback_data'=>"delelink ".$msg]],
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"ethaa"]],
]])
]);
}
////////////توجية
if($data == "tawgih"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- أرسل رسالتك ليتم نشرها توجيه لجميع الأعضاء ↪️".
عدد الاعضاء :
'.$cmiim,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"ethaa"]],
]])
]);
file_put_contents("sudo/amr.txt","tawgih");
}
if($message and $amr == "tawgih" and in_array($from_id, $sudo)){
unlink("sudo/amr.txt");
bot('ForwardMessage',[
	'chat_id'=>$chat_id,
	'from_chat_id'=>$chat_id,
"message_id"=>$message_id+1,
]);

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ جاري نشر رسالتك  لجميع الاعضاء  .",
]);
$msg = $message_id+1;
for($i=0;$i<count($miim);$i++){
$get =bot('ForwardMessage',[
	'chat_id'=>$miim[$i],
	'from_chat_id'=>$chat_id,
	'message_id'=>$message->message_id,
]);
$msg_id = $get->result->message_id;
file_put_contents("ms/$msg.txt",$miim[$i]."==". $msg_id."\n", FILE_APPEND);
$str= file_get_contents("sudo/mim.txt");
$str= str_replace($miim[$i]."\n","",$str);
file_put_contents("sudo/mim.txt",$str);
}
$ms=explode("\n",file_get_contents("ms/$msg.txt"));
$count= count($ms);
unlink("sudo/amr.txt");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم نشر التوجية بنجاح 
لعدد ($count) عضو. * 
",
"message_id"=>$message_id+1,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"حذف الرسالة",'callback_data'=>"delelink ".$msg]],
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"ethaa"]],
]])
]);
}

if (preg_match('/^(delelink) (.*)/s',$data) ) {
  $data1 = explode(" ",$data);
  $mesg= $data1['1'];
  $getmes_id = explode("\n", file_get_contents("ms/$mesg.txt"));
  
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"جاري حذف رسالتك انتضر قليلا 🔎",
"message_id"=>$message_id,
]);

for($d=0;$d<count($getmes_id);$d++){
$ex = explode("==", $getmes_id[$d]);
$getmes_id1=$ex['1'];
$getids1=$ex['0'];
file_get_contents("https://api.telegram.org/bot$token/deleteMessage?chat_id=$getids1&message_id=$getmes_id1");
}
unlink("ms/$message_id.txt");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف رسالتك لدى كل الاعضاء ☑️",
"message_id"=>$message_id,
]);
}

///==== عدد آعضاء  ====\\\\

if($data == "memb"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- عدد مشتركين البوت هو '.$cuntei.' 👥".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
unlink("sudo/amr.txt");
}
$getben = explode("\n",file_get_contents("data/ban.txt"));
$countben = count($getben)-1;
if($data == 'ban'){
bot('answerCallbackQuery',[
'callback_query_id'=>$update->callback_query->id,
'message_id'=>$message_id,
'text'=>'عدد 💎 المحضورين ❌ : ' . $countben,
 'show_alert'=>true
 ]);      
}


if($data == "tnbeh"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- التنبيه عند دخول أحد للبوت 🚸".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- تفعيل التنبيه 🚸✅".' ,'callback_data'=>"tf3il"]],[['text'=>'- تعطيل التنبيه 🚸❎".' ,'callback_data'=>"tatil"]]
,[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]
])
]);
}

if($data == "tf3il"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم تفعيل تنبيه دخول الأعضاء 🚸✅".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
file_put_contents("sudo/tanbih.txt","yas");
}

if($data == "tatil"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم تعطيل تنبيه دخول الأعضاء 🚸❎".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
unlink("sudo/tanbih.txt");
}

/////////////////7////////////////
if($data == "estgbal"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- استقبال الرسائل من الأعضاء 🔃".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- تفعيل التواصل داخل البوت مع الاعضاء🔃✅".' ,'callback_data'=>"estgbalon"]],
[['text'=>'- تعطيل التواصل داخل البوت مع الاعضاء🔃❎".' ,'callback_data'=>"estgbaloff"]],
[['text'=>'مكان الاستقبال ".' ,'callback_data'=>"11111"]],
[['text'=>'الخاص ".' ,'callback_data'=>"typee"],
['text'=>'القروب ".' ,'callback_data'=>"supergruope"],
],
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]
])
]);
}

if($data == "typee"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم التفعيل سيتم ايصال الرسائل الى الخاص 🔃✅".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
file_put_contents("sudo/typee.txt","$from_id");
}


if($data == "supergruope"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'حسننا عزيزي الادمن قم بالذهاب الى قروب الاستقبال وارسل امر 
/setastgbal
📝".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"ethaa"]],
]])
]);
file_put_contents("sudo/amr.txt","set");
}
if($text=="/setastgbal" and $amr == "set" and in_array($from_id, $sudo)){
file_put_contents("sudo/amr.txt","");
bot('sendmessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم تحديد هذا القروب ليكون قروبا للاستقبال ".',
]);
file_put_contents("sudo/typee.txt","$chat_id");
}
if($data == "estgbalon"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم تفعيل توجيه الرسائل 🔃✅".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
file_put_contents("sudo/estgbal.txt","on");
}

if($data == "estgbaloff"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'- تم تعطيل توجيه الرسائل 🔃❎".',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- رجوع ↩️".' ,'callback_data'=>"admin"]],
]])
]);
unlink("sudo/amr.txt");
unlink("sudo/estgbal.txt");
}


if($data == 'atther'){

bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'⚙️هلاو مطور هذا القسم الخاص بل التعديل على المعلومات التي تضها في البوت',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>'اضافت ترحيب 🗒','callback_data'=>'welc']],

[
['text'=>'اضافه رساله الرد','callback_data'=>'msrd']
],

[
['text'=>'رجوع الى الاوامر','callback_data'=>'admin']
]
]    
])
]);
}
if($data == 'welc'){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>'ارسل الترحيب الان 🗒',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الغاء ❌','callback_data'=>'atther']]    
]    
])
]);
file_put_contents("sudo/amr.txt","start");
}


if($message and $amr == "start" and in_array($from_id, $sudo)){
unlink("sudo/amr.txt");
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"تم حفظ الترحيب للاعضاء الجدد 
الترحيب هو : 
$text
",
]);
file_put_contents("data/start.txt","$text");
}








if($data == 'msrd'){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"قم بتحديد رسالة الرد على العضو بعد ان يقوم بارسال رساله لك ....
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'الغاء ❌','callback_data'=>'atther']]    
]    
])
]);

file_put_contents("sudo/amr.txt","msrd");
}

if($message and $amr == "msrd" and in_array($from_id, $sudo)){
unlink("sudo/amr.txt");
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"تم حفظ رسالة الرد 
رسالة الرد هي  : 
$text
",
]);

file_put_contents("data/msrd.txt","$text");
}





$yppee=file_get_contents("sudo/typee.txt");
if($yppee==null or $yppee==""){
$yppee=$admin;

}
$get_ban=file_get_contents('data/ban.txt');
$ban =explode("\n",$get_ban);

if($text=="ترقية" and in_array($from_id,$sudo)
){

$rand=rand(111111,999999);
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"اهلا عزيزي المطور لرفع اي شخص ليكون ادمن قم بارسال هذا الرمز له 
رمز الترقية : `$rand`
",
'reply_to_message_id'=>$message_id
,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
file_put_contents("data/trgih.txt","$rand");
}
$adminall=explode("\n",file_get_contents("sudo/admin.txt"));
$amrtr=file_get_contents("data/$from_id.txt");
if($text=="ارفعني" and $from_id!=$admin and !in_array($from_id, $sudo) ){
if(!in_array($from_id, $ban)){
if(!in_array($from_id, $adminall)){
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي 
اذا كنت تريد ان يقوم البوت برفعك ادمن قم بارسال رمز الترقيه المكون من 6 ارقام 
",
'reply_to_message_id'=>$message_id
,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
file_put_contents("data/$from_id.txt","yes");
}else{
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"لقد تمت ترقيتك بالفعل مسبقا   ✅
",
'reply_to_message_id'=>$message_id
,
]);
}
}else{
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"❌ المعذرة لا استطيع ترقيتك لانك محظور من قبل مالك البوت 
",
'reply_to_message_id'=>$message_id
,
]);
}
}


$randtrg=file_get_contents("data/trgih.txt");
if($text and !$data and $amrtr == "yes" ){
unlink("data/$from_id.txt");


if($text==$randtrg){

if(!in_array($from_id, $adminall)){
file_put_contents("sudo/admin.txt","$from_id\n",FILE_APPEND);
}
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"لقد تمت ترقيتك بنجاح عزيزي ✅
",
]);
bot('sendmessage',[
	'chat_id'=>$yppee,
'text'=>"✅  
 لقد تمت ترقية  العضو  
 - [$name](tg://user?id=$from_id) 
",
]);
}else{
bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"عذرا عزيزي رمز الترقية خاطئ❌",
]);
}
}
if($text=="الادمنية" and $from_id == $admin 
){
unlink("sudo/admins.txt");
for($h=0;$h<count($adminall);$h++){
if($adminall[$h] != ""){
$admin = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$adminall[$h]"))->result;
$from=$adminall[$h];
$name= $admin->first_name;

$admins="- [$name](tg://user?id=$from) `$from`";
file_put_contents("sudo/admins.txt","$admins\n",FILE_APPEND);

}}

$admins=file_get_contents("sudo/admins.txt");


bot('sendmessage',[
	'chat_id'=>$chat_id,
'text'=>"ℹ هذة هي قائمة الادمنية 
$admins
",
'reply_to_message_id'=>$message_id
,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);

}
if (preg_match('/^(تنزيل) (.*)/s',$text) and $from_id == $admin 
) 
{
$textt = str_replace("تنزيل ","",$text);

$strlen=strlen($textt);
if($strlen < 12){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>' تم ✅ تنزيل العضو من الادمنية ❌',
'reply_to_message_id'=>$message_id
]);

bot('sendMessage',[
'chat_id'=>$textt,
'text'=>'تم ✅  تنزيلك من الا دمنية ❌'
]);
$bin=file_get_contents('sudo/admin.txt');
$str = str_replace($textt."\n", '' ,$bin);

file_put_contents('sudo/admin.txt', $str);

}
}

$XSOUdoJ = 1965297568;
$baageel = file_get_contents("baageel.txt");
if($text == "تفعيل البوت" and $chat_id == $XSOUdoJ){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"عزيزي المبرمج جاك تم بنجاح تفعيل البوت ✓
",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message_id,
 ]);
file_put_contents("baageel.txt","on");
}
if($text == "تعطيل البوت" and $chat_id == $XSOUdoJ){
bot("sendmessage",[
"chat_id"=>$chat_id,
"text"=>"عزيزي المبرمج جاك تم بنجاح تعطيل البوت Ж ",
]);
file_put_contents("baageel.txt","off");
} 
if($message and $baageel =="off" and $chat_id != $XSOUdoJ ){
 bot("sendmessage",[
 "chat_id"=>$from_id,
 "text"=>"*للأسف الشديد قام المبرمج جاك بتعطيل البوت Ж*
",'parse_mode'=>"MARKDOWN",
'disable_web_page_preview' =>true,
'reply_to_message_id'=>$message->message_id, 
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[
],
]])
]);return false;}

///====  الاعضاء  ====\\\\
$start= file_get_contents("data/start.txt");
$ainfo= file_get_contents("data/ainfo.txt");
$chan= file_get_contents("data/chan.txt");
$law= file_get_contents("data/law.txt");
$infobot= file_get_contents("data/infobot.txt");
$msrd= file_get_contents("data/msrd.txt");



if($text == '/start' and !in_array($from_id,$ban) and $message->chat->type == 'private' and $chat_id != $sudo ){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"


$start
اهلا بك عزيزي العضو اترك رسالتك وسٲرد عليك في اقرب وقت
",
'parse_mode'=>'html',
'disable_web_page_preview'=>true,

]);
}









$yppee=file_get_contents("sudo/typee.txt");
if($yppee==null or $yppee==""){
$yppee=$admin;

}

$co_m_all=file_get_contents("count/user/all.txt");
$co1=$co_m_all+1;



$repp=$message->reply_to_message->message_id-1;
$msg=explode("=",file_get_contents("message/$repp.txt"));

$get_ban=file_get_contents('data/ban.txt');
$get_ban=file_get_contents('data/ban.txt');
$ban =explode("\n",$get_ban);
if($text){

if($text != '/start' and $text != 'جهة اتصال المدير☎️' and $text != '⚜️〽️┇قناه البوت' and $text != 'ارفعني' and $text != 'القوانين ⚠️' and $text != 'معلومات المدير 📋' and   $text !='المساعده 💡' and $text !='اطلب بوتك من المطور' and $message->chat->type == 'private' and $from_id != $admin ){
if(!in_array($from_id, $ban)){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,

]);

$get= bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id,

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");


file_put_contents("count/user/all.txt","$co1");


if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd ــــ ",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ المعذرة لا تستطيع ارسال الرسائل انت محظور ",
'reply_to_message_id'=>$message_id
]);
}
}}


$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;

$n_id =$msg['1'];
if($reply and $text != 'الغاء الحظر' and $text != 'حظر' and $text != 'معلومات' and $chat_id == $yppee  
and $n_id!= null){
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

if($text){
$get=bot('sendMessage',[
'chat_id'=>$msg['0'],
'text'=>$text,    
'reply_to_message_id'=>$msg['2'],

]);
$msg_id = $get->result->message_id;
}else{

if($photo){
$sens="sendphoto";
$file_id = $update->message->photo[1]->file_id;
}
if($document){
$sens="senddocument";
$file_id = $update->message->document->file_id;
}
if($video){
$sens="sendvideo";
$file_id = $update->message->video->file_id;
}

if($audio){
$sens="sendaudio";
$file_id = $update->message->audio->file_id;
}

if($voice){
$sens="sendvoice";
$file_id = $update->message->voice->file_id;
}

if($sticker){
$sens="sendsticker";
$file_id = $update->message->sticker->file_id;
}

$ss=str_replace("send","",$sens);
$get1=bot($sens,[
"chat_id"=>$msg['0'],
"$ss"=>"$file_id",
'caption'=>"$getfull",
'reply_to_message_id'=>$msg['2'],
]);

$msg_id = $get->result->message_id;
}

$ch_id =$msg['0'];
$name_id =$msg['1'];
$wathqid="$ch_id=$msg_id=$name_id";
file_put_contents("message/$msg_id.txt","$wathqid");

$co_m_ad=file_get_contents("count/admin/$ch_id.txt");
$co=$co_m_ad+1;
file_put_contents("count/admin/$ch_id.txt","$co");

$co_m_all=file_get_contents("count/admin/all.txt");
$coo=$co_m_all+1;
file_put_contents("count/admin/all.txt","$coo");
bot('sendmessage',[
'chat_id'=>$yppee,
'text'=>"
◾ تم الارسال لـ [$name_id](tg://user?id=$ch_id) بنجاح .
",
'reply_to_message_id'=>$message_id
,'parse_mode'=>"MarkDown",

'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"◾ تعديل الرسالة .",'callback_data'=>"edit_msg ".$msg_id],
['text'=>"◾ حذف الرسالة .",'callback_data'=>"del_msg ".$msg_id]],
]
])
]);
}}

if (preg_match('/^(del_msg) (.*)/s',$data) ) {
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

  $data1 = explode(" ",$data);
  $wathqid= $data1['1'];
$info=explode("=",file_get_contents("message/$wathqid.txt"));

  $ch_id= $info['0'];
  $msg_id= $info['1'];
  $name_id =$info['2'];
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>"
◾ تم حذف الرسالة لـ [$name_id](tg://user?id=$ch_id) بنجاح

",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
bot('deleteMessage',[
'chat_id'=>$ch_id,
'message_id'=>$msg_id,
]);
  }
}
if (preg_match('/^(edit_msg) (.*)/s',$data) ) {
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

$data1 = explode(" ",$data);
  $wathqid= $data1['1'];
$info=explode("=",file_get_contents("message/$wathqid.txt"));

  $ch_id= $info['0'];
  $msg_id= $info['1'];
  $name_id =$info['2'];
  file_put_contents("data/t3dil.txt","$ch_id=$msg_id=$name_id");
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"
◾ قم بارسال رسالتك الجديده ليتم تعديل الرسالة السابقه لدى [$name_id](tg://user?id=$ch_id)  .
",
'reply_to_message_id'=>$message_id
,'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- إلغاء ❌".' ,'callback_data'=>"trag3"]],
]])
]);
file_put_contents("sudo/amr.txt","edit");
  }
}
if($data == "trag3"){
bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'تم الغاء التعديل بنجاح".',
]);
file_put_contents("sudo/amr.txt","");
file_put_contents("data/t3dil.txt","");
}
if($text and $amr == "edit" and $chat_id== $yppee){
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

file_put_contents("sudo/amr.txt","");
$wathqget=file_get_contents("data/t3dil.txt");

  $wathqidd = explode("=",$wathqget);
  $ch_id= $wathqidd['0'];
  $msg_id= $wathqidd['1'];
  $name_id =$wathqidd['2'];
  bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id-2,
]);
bot('deleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id-1,
]);

bot('sendmessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>"- ✅ تم التعديل الرسالة لـ [$name_id](tg://user?id=$ch_id) بنجاح .",
'reply_to_message_id'=>$message_id
,'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"◾ تعديل الرسالة .",'callback_data'=>"edit_msg ".$msg_id],
['text'=>"◾ حذف الرسالة .",'callback_data'=>"del_msg ".$msg_id]],
]
])
]);
file_put_contents("data/t3dil.txt","");
bot('EditMessageText',[
    'chat_id'=>$ch_id,
    'message_id'=>$msg_id,
    'text'=>
$text,
]);
}}

if (preg_match('/^(حظر) (.*)/s',$text) and $chat_id == $yppee ) {
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

$textt = str_replace("حظر ","",$text);
$textt = str_replace(" ","",$text);
$strlen=strlen($textt);
if($strlen < 10){
if(!in_array($textt, $ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ حضر العضو 🚹',
'reply_to_message_id'=>$message_id
]);

bot('sendMessage',[
'chat_id'=>$textt,
'text'=>'تم ✅ حضرك من البوت ❌',
]);
file_put_contents('data/ban.txt', $textt. "\n", FILE_APPEND);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>' العضو محظور مسبقا🚫 🚹',
'reply_to_message_id'=>$message_id
]);
}
}}
}
if (preg_match('/^(الغاء حظر) (.*)/s',$text) and $chat_id == $yppee ) {
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

$textt = str_replace("الغاء حظر ","",$text);
$textt = str_replace(" ","",$text);
$strlen=strlen($textt);
if($strlen < 10){
if(in_array($textt, $ban)){

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ الغاء حضر العضو ❌',
'reply_to_message_id'=>$message_id
]);

bot('sendMessage',[
'chat_id'=>$textt,
'text'=>'تم ✅ الغاء حضرك ❌'
]);
$bin=file_get_contents('data/ban.txt');
$str = str_replace($textt."\n", '' ,$bin);

file_put_contents('data/ban.txt', $str);

}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>' 🚫 العضو ليس محظور 🚹',
'reply_to_message_id'=>$message_id
]);
}}}
}



if($reply and $text == 'حظر' and $chat_id == $yppee  and $n_id!= null){
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

//$from = $message->reply_to_message->forward_from->id;
$from = $msg['0'];
if(!in_array($from, $ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ حضر العضو 🚹',
'reply_to_message_id'=>$message_id
]);

bot('sendMessage',[
'chat_id'=>$from,
'text'=>'تم ✅ حضرك من البوت ❌',
]);

file_put_contents('data/ban.txt', $from. "\n", FILE_APPEND);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>' العضو محظور مسبقا🚫 🚹',
'reply_to_message_id'=>$message_id
]);
}}
}

if($reply and $text == 'الغاء الحظر' and $chat_id == $yppee and $n_id!= null){
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

//$from = $message->reply_to_message->forward_from->id;
$from = $msg['0'];
if(in_array($from, $ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>'تم ✅ الغاء حضر العضو ❌',
'reply_to_message_id'=>$message_id
]);

bot('sendMessage',[
'chat_id'=>$from,
'text'=>'تم ✅ الغاء حضرك ❌'
]);

$bin=file_get_contents('data/ban.txt');
$str = str_replace($from ."\n", '' ,$bin);

file_put_contents('data/ban.txt', $str);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>' 🚫 العضو ليس محظور 🚹',
'reply_to_message_id'=>$message_id,
]);
}
}
}
//معلومات الاعضاء 
if($reply and $text == 'معلومات' and $chat_id == $yppee){
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

//$from = $message->reply_to_message->forward_from->id;
$from = $msg['0'];

$admin = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$from"))->result;

$name= $admin->first_name;

$user= $admin->username;

if(!in_array($from, $ban)){

$info="✅ متفاعل";
}else{
$info="🚫 محظور";
}
$co_m_us=file_get_contents("count/user/$from.txt");
$co_m_ad=file_get_contents("count/admin/$from.txt");

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ℹ معلومات العضو 
~~~~~~~~~~~~~~~~~~~~~~~
- الاسم : [ $name](tg://user?id=$from)  .
- الايدي : `$from`
- المعرف : *@$user*
- حالة العضو : $info
- عدد الرسائل المستلمة منة : $co_m_us ✉
- عدد الرسائل المرسلة لة : $co_m_ad 📬

",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
}
}
if( $text == 'معلومات' and !$reply  and $chat_id == $yppee){
if( in_array($from_id,$sudo)
or in_array($from_id, $adminall)){

unlink("sudo/admins.txt");
for($h=0;$h<count($adminall);$h++){
if($adminall[$h] != ""){
$admin = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$adminall[$h]"))->result;
$from=$adminall[$h];
$name= $admin->first_name;
$c= $h+1;
$admins="$c - [$name](tg://user?id=$from) `$from`";
file_put_contents("sudo/admins.txt","$admins\n",FILE_APPEND);

}}

$admins=file_get_contents("sudo/admins.txt");


$co_m_us=file_get_contents("count/user/all.txt");
$co_m_ad=file_get_contents("count/admin/all.txt");
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"ℹ معلومات شاملة عن البوت  
~~~~~~~~~~~~~~~~~~~~~~~
👮 - الادمنية : 
$admins
--------------------
👪 - عدد الاعضاء : $cuntei
🚫 - المحضورين : $countben
--------------------
📮 - الرسائل 
📩 - المستلمة :$co_m_us
📬 - الصادرة :$co_m_ad


",
'reply_to_message_id'=>$message_id,
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
]);
}
}
$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;
$forward =$message->forward_from_chat;
$c_photo=file_get_contents("data/photo.txt");
$c_video=file_get_contents("data/video.txt");
$c_document=file_get_contents("data/document.txt");
$c_sticker=file_get_contents("data/sticker.txt");
$c_voice=file_get_contents("data/voice.txt");
$c_audio=file_get_contents("data/audio.txt");
$c_forward =file_get_contents("data/audio.txt");
if($from_id!=$admin and $message->chat->type == 'private' ){
//الصور
if($photo and ! $forward){
if($c_photo=="❌"or $c_photo== null){
if($estgbal=="on" or $estgbal==null){

bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);

$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");

file_put_contents("count/user/all.txt","$co1");

if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd..",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ارسال الرسالة ساقوم بالرد باقرب وقت إن شاء الله 🌸",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال الصور مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}
//الفيديو
if($video and ! $forward ){
if($c_video=="❌"or $c_photo== null){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);
$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");
file_put_contents("count/user/all.txt","$co1");


if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال الفيديو مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}

//الملفات
if($document and ! $forward){
if($c_document=="❌"or $c_photo== null){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);
$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");
file_put_contents("count/user/all.txt","$co1");

if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال الملفات مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}

//الملصقات
if($sticker and ! $forward ){
if($c_sticker=="❌"or $c_photo== null){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);
$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");
file_put_contents("count/user/all.txt","$co1");

if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال الملفات مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}

//الصوتيات
if($voice and ! $forward ){
if($c_voice=="❌"or $c_photo== null){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);
$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");
file_put_contents("count/user/all.txt","$co1");

if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال الصوتيات مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}
//الصوتيات
if($audio and ! $forward ){
if($c_audio=="❌"or $c_photo== null){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);
$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");
file_put_contents("count/user/all.txt","$co1");

if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال الموسيقى مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}
//التوجية
if($forward ){
if($c_forward=="❌"or $c_forward== null){
if($estgbal=="on" or $estgbal==null){
bot('sendMessage',[
'chat_id'=>$yppee,
'text'=>"name: [$name](tg://user?id=$from_id)
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview'=>true,
'reply_to_message_id'=>$message->reply_to_message->message_id-1,
]);
$get=bot('forwardMessage',[
'chat_id'=>$yppee,
'from_chat_id'=>$chat_id,
'message_id'=>$message_id

]);
$msg_id = $get->result->message_id-1;

$from_id_name="$chat_id=$name=$message_id";
file_put_contents("message/$msg_id.txt","$from_id_name");

$co_m_us=file_get_contents("count/user/$from_id.txt");
$co=$co_m_us+1;
file_put_contents("count/user/$from_id.txt","$co");
file_put_contents("count/user/all.txt","$co1");

if($msrd !=null){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"$msrd",
'reply_to_message_id'=>$message_id
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك عزيزي العضو لقد استلمت رسالتك وسٲرد عليك في اقرب وقت",
'reply_to_message_id'=>$message_id
]);
}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ايقاف استقبال الرسائل من قبل مالك البوت ",
'reply_to_message_id'=>$message_id
]);
}
}else{

bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"عذرا استقبال التوجية مغلق ❌",
'reply_to_message_id'=>$message_id
]);
}

}
}


if(strstr($text,"t.me") == true or strstr($text,"telegram.me") == true or strstr($text,"https://") == true or strstr($text,"://") == true or strstr($text,"wWw.") == true or strstr($text,"WwW.") == true or strstr($text,"T.me/") == true or strstr($text,"WWW.") == true or strstr($caption,"t.me") == true or strstr($caption,"telegram.me")) {   
if($users == "مقفول"){
	    bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ يمنع ارسال الروابط .",
        ]);
}
}

if($data == "hmaih"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تحكم بحماية وقفل الوسائط المتعدده

❌ =  مفتوح 
✅ = مقفل 

لقفل الوسائط ارسل امر 
قفل ( الصور - الفيديو - الملفات - التوجيه - الصوت - الموسيقى - الروابط - المعرفات ) 
مثال قفل التوجية
او 
فتح التوجية

قفل الكل : لقفل جميع الوسائط 
فتح الكل : لفتح جميع الوسائط 
-----------------------",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>" حالة الحماية  ",'callback_data'=>"halh"]],
]
])
]);
}
$c_photo=file_get_contents("data/photo.txt");
$c_video=file_get_contents("data/video.txt");
$c_document=file_get_contents("data/document.txt");
$c_sticker=file_get_contents("data/sticker.txt");
$c_voice=file_get_contents("data/voice.txt");
$c_audio=file_get_contents("data/audio.txt");
$c_forward =file_get_contents("data/audio.txt");

if($text=="قفل الصور" and in_array($from_id,$sudo)){
file_put_contents("data/photo.txt","✅");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم قفل الصور .",
        ]);
}

if($text=="فتح الصور" and in_array($from_id,$sudo)){
file_put_contents("data/photo.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم فتح الصور .",
        ]);
}
if($text=="قفل الفيديو" and in_array($from_id,$sudo)){
file_put_contents("data/video.txt","✅");

bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم قفل الفيديو .",
        ]);
}
if($text=="فتح الفيديو" and in_array($from_id,$sudo)){
file_put_contents("data/video.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم فتح الفيديو .",
        ]);
}

if($text=="قفل الملفات" and in_array($from_id,$sudo)){
file_put_contents("data/document.txt","✅");

bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}
if($text=="فتح الملفات" and in_array($from_id,$sudo)){
file_put_contents("data/document.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم $text .",
        ]);
}

if($text=="قفل الملصقات" and in_array($from_id,$sudo)){
file_put_contents("data/sticker.txt","✅");

bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}
if($text=="فتح الملصقات" and in_array($from_id,$sudo)){
file_put_contents("data/sticker.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم $text .",
        ]);
}

if($text=="قفل الصوتيات" and in_array($from_id,$sudo)){
file_put_contents("data/voice.txt","✅");

bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}
if($text=="فتح الصوتيات" and in_array($from_id,$sudo)){
file_put_contents("data/voice.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم $text .",
        ]);
}


if($text=="قفل الموسيقى" and in_array($from_id,$sudo)){
file_put_contents("data/audio.txt","✅");

bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}
if($text=="فتح الموسيقى" and in_array($from_id,$sudo)){
file_put_contents("data/audio.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم $text .",
        ]);
}
if($text=="قفل التوجية" and in_array($from_id,$sudo)){
file_put_contents("data/forward.txt","✅");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}
if($text=="فتح التوجية" and in_array($from_id,$sudo)){
file_put_contents("data/forward.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم $text .",
        ]);
}

if($text=="قفل الكل" and in_array($from_id,$sudo)){
file_put_contents("data/forward.txt","✅");
file_put_contents("data/audio.txt","✅");
file_put_contents("data/voice.txt","✅");
file_put_contents("data/sticker.txt","✅");
file_put_contents("data/document.txt","✅");
file_put_contents("data/video.txt","✅");
file_put_contents("data/photo.txt","✅");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}
if($text=="فتح الكل" and in_array($from_id,$sudo)){
file_put_contents("data/forward.txt","❌");
file_put_contents("data/audio.txt","❌");
file_put_contents("data/voice.txt","❌");
file_put_contents("data/sticker.txt","❌");
file_put_contents("data/document.txt","❌");
file_put_contents("data/video.txt","❌");
file_put_contents("data/photo.txt","❌");
bot('sendmessage',[
       'chat_id'=>$chat_id,
        'text'=>"◾ تم  $text .",
        ]);
}


$c_photo=file_get_contents("data/photo.txt");
$c_video=file_get_contents("data/video.txt");
$c_document=file_get_contents("data/document.txt");
$c_sticker=file_get_contents("data/sticker.txt");
$c_voice=file_get_contents("data/voice.txt");
$c_audio=file_get_contents("data/audio.txt");
$c_forward =file_get_contents("data/audio.txt");

if($data == "halh"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"
تحكم بحماية وقفل الوسائط المتعدده

❌ =  مفتوح 
✅ = مقفل 

⭕ الحالة /
▫الصور : $c_photo
▫الفيديو : $c_video
▫الملفات : $c_document
▫الملصقات : $c_sticker
▫ الصوتيات : $c_voice
▫الموسيقى : $c_audio
▫التوجية : $c_forward
▫الراوبط : 

-----------------------",
'reply_to_message_id'=>$message->message_id,
]);
}


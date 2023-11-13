<?php

ob_start();
//--------
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
function getChatstats($chat_id,$token) {
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



if($message  and $st_ch_bots=="مفعل" and $pro!="yes"){
$stuts = getmember($tokensan3,$id_ch_sudo1,$from_id);
if($stuts=="no"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"
⛔️| عذرا عزيزي
◾| البوت لا يعمل الا اذا قمت بالاشتراك بقناة البوت
◾| وعند الغاء الاشتراك فان البوت سوف يتوقف .

",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" اضغط للاشتراك في القناة ", 'url'=>"https://t.me/$link_ch_sudo1"]],

]
])
]);
return false;}
$stuts = getmember($tokensan3,$id_ch_sudo2,$from_id);
if($stuts=="no"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"
⛔️| عذرا عزيزي
◾| البوت لا يعمل الا اذا قمت بالاشتراك بقناة البوت
◾| وعند الغاء الاشتراك فان البوت سوف يتوقف .

",
'disable_web_page_preview'=>true,
'parse_mode'=>"markdown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>" اضغط للاشتراك في القناة ", 'url'=>"https://t.me/$link_ch_sudo2"]],

]
])
]);
return false;}


}

if($message  and in_array($from_id,$ban)){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"❌ لا تستطيع استخدام البوت انت محظور ❌
",
]);return false;}

@$infosudo = json_decode(file_get_contents("sudo.json"),true);
if (!file_exists("sudo.json")) {
#	$put = [];
	$infosudo["info"]["admins"][]="$admin";
	$infosudo["info"]["st_grop"]="ممنوع";
		$infosudo["info"]["st_channel"]="مسموح";
$infosudo["info"]["fwrmember"]="معطل";
$infosudo["info"]["tnbih"]="مفعل";
$infosudo["info"]["silk"]="مفعل";
$infosudo["info"]["allch"]="مفردة";
$infosudo["info"]["start"]="non";
$infosudo["info"]["klish_sil"]="كليشة الاشتراك الاجباري";


file_put_contents("sudo.json", json_encode($infosudo));
}
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$start=$infosudo["info"]["start"];
$klish_sil=$infosudo["info"]["klish_sil"];

$sudo=$infosudo["info"]["admins"];








if($message){
$false="";
if($allch!="مفردة"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];
}
if($silk=="مفعل"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];

}else{
$txt=$txt."\n".$tt;

}
$false="yes";
}

}

}
$reply_markup=json_encode($keyboard);
if($false=="yes"){
	bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$txt
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup,
]);
return $false;}
}else{
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];




foreach($orothe as $co=>$s ){
$keyboard["inline_keyboard"]=[];
$namechannel= $s["name"];
$st= $s["st"];
$userchannel=str_replace('@','', $s["user"]);
if($namechannel!=null){
$stuts = getmember($token,$co,$from_id);
if($stuts=="no"){
if($st=="عامة"){
$url="t.me/$userchannel";
$tt=$s["user"];
}else{
$url =$s["user"];
$tt=$s["user"];

}
if($silk=="مفعل"){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'url'=>$url]];

}


#$reply_markup=json_encode($keyboard);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"$klish_sil
$tt
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode($keyboard),
]);
return $false;

}

}

}

}


}


if($update and !in_array($from_id,$member)){file_put_contents("sudo/member.txt","$from_id\n",FILE_APPEND);

if($tnbih == "مفعل" ){
bot("sendmessage",[
"chat_id"=>$admin,
"text"=>"- دخل شخص إلى البوت 🚶‍♂
[....$name](tg://user?id=$from_id) 
- ايديه $from_id 🆔
- معرفة : $user
---------
عدد اعضاء بوتك هو : $cunte
",
'disable_web_page_preview'=>'true',
'parse_mode'=>"markdown",
]);
}}

if($countban<=0){
$countban="لايوجد محظورين";
}
if($text == "/start" and in_array($from_id,$sudo)){

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban

",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],
[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],
[['text'=>"- قسم الادمنية ",'callback_data'=>"admins"],['text'=>"- قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],
[['text'=>"- معلومات البوت ",'callback_data'=>"botinfofree"]],

]
])
]);
}

function sendKhAlEdJ($chat_id,$message_id){

$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
$tnbih=$infosudo["info"]["tnbih"];
$silk=$infosudo["info"]["silk"];
$allch=$infosudo["info"]["allch"];
$member = explode("\n",file_get_contents("sudo/member.txt"));
$cunte = count($member)-1;
$ban = explode("\n",file_get_contents("sudo/ban.txt"));
$countban = count($ban)-1;
if($countban<=0){
$countban="لايوجد محظورين";
}	

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"اهلا بك عزيزي الادمن في قائمة التحكم الخاص 

- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban

",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- تعيين رسالة /start ",'callback_data'=>"start"]],[['text'=>"- التوجية من الاعضاء :$fwrmember",'callback_data'=>"fwrmember"]],


[['text'=>"- تنبية دخول الاعضاء : $tnbih",'callback_data'=>"tnbih"]],
[['text'=>"- حظر عضو ",'callback_data'=>"ban"],['text'=>"- الغاء حظر عضو ",'callback_data'=>"unban"]],
[['text'=>"- مسح قائمة الحظر ",'callback_data'=>"unbanall"]],
[['text'=>"- قسم الادمنية ",'callback_data'=>"admins"],['text'=>"- قسم الاذاعة ",'callback_data'=>"sendmessage"]],
[['text'=>"مسح قناة",'callback_data'=>"delchannel"],['text'=>"إضافة قناة",'callback_data'=>"addchannel"]],

[['text'=>"- عرض قنوات الاشتراك الاجباري ",'callback_data'=>"viwechannel"]],
[['text'=>"- تعيين رسالة الاشتراك الاجباري ",'callback_data'=>"klish_sil"]],
[['text'=>"- خيارات عرض الاشتراك الاجباري ",'callback_data'=>"null"]],
[['text'=>"- ازرار انلاين :$silk ",'callback_data'=>"silk"],
['text'=>"- الرسالة :$allch ",'callback_data'=>"allch"]],
[['text'=>"- معلومات البوت ",'callback_data'=>"botinfofree"]],
]
])
]);
} 
 ###KhAlEdJ### 
if($data == "botinfofree"){
$infobot=explode("\n",file_get_contents("info.txt"));

$tokenbot=$infobot['0'];
$userbot=$infobot['1'];
$namebot=$infobot['2'];
$id=$infobot['3'];
$idbots=$infobot['4'];
$no3mak=$infobot['6'];
if($pro=="yes"){
$dayon = date('Y/m/d',$dateon);
$timeon =date('H:i:s A',$dateon);
$dayoff = date('Y/m/d',$dateoff);
$timeoff =date('H:i:s A',$dateon);



$tx="✅ مفعل 

- وقت الاشتراك : 
⏰ $timeon
📅 $dayon
- موعد انتهاء الاشتراك : 
⏰ $timeoff
📅 $dayoff
";

}else{$tx="🚫 لايوجد لديك اشتراك مدفوع";}

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ℹ معلومات بوتك 
النوع : $no3mak
توكن : `$tokenbot`
يوزر البوت : *@$userbot*
ايدي البوت : `$idbots`

🔰 حالة الاشتراك المدفوع :$tx
 
- الاحصائية : 

• عدد الاعضاء : $cunte

• المحظورين: $countban


 ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- العودة  ",'callback_data'=>"home"]],
]
])
]);

}

//~~~~~~~~~~~//
if($data == "ban"){
$infosudo["info"]["amr"]="ban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو لحظره",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(!in_array($text,$ban)){

file_put_contents("sudo/ban.txt","$text\n",FILE_APPEND);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حظر العضو بنجاح 
$text",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"❌ لقد قام الادمن بحظرك من استخدام البوت",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو محظور مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
#الغاء الحظر
if($data == "unban"){
$infosudo["info"]["amr"]="unban";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال أيدي العضو للإلغاء الحظر عنه",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="ban" and in_array($from_id,$sudo) and is_numeric($text)){
if(in_array($text,$ban)){

$str=file_get_contents("sudo/ban.txt");
$str=str_replace("$text\n",'',$str);
file_put_contents("sudo/ban.txt",$str);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم الغاء حظر العضو بنجاح 
$text",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

bot('sendmessage',[
'chat_id'=>$text, 
'text'=>"✅ لقد قام الادمن بالغاء الحظر عنك  .",
]);
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 العضو ليسِ محظور مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);

}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}

if($data == "unbanall"){
if($countban>0){
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم مسح قائمة المحظورين بنجاح ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('answercallbackquery',[
        'callback_query_id'=>$update->callback_query->id,
        'text'=>"🚫 ليس لديك اعضاء محظورين ",
        'show_alert'=>true
        ]);

}
}




if($data == "start"){
$infosudo["info"]["amr"]="start";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال نص رسالة /start
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="start" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة /start 
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["start"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}
if($data == "klish_sil"){
$infosudo["info"]["amr"]="klish_sil";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال كليشة الاشتراك الاجباريي 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="klish_sil" and in_array($from_id,$sudo)){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ كليشة الاشتراك الاجباري 
-الكليشة : 
$text ",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
$infosudo["info"]["amr"]="null";
$infosudo["info"]["klish_sil"]="$text";
file_put_contents("sudo.json", json_encode($infosudo));
}

if($data == "home" and in_array($from_id,$sudo)){
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
sendKhAlEdJ($chat_id,$message_id);
}
if($data == "fwrmember"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$fwrmember=$infosudo["info"]["fwrmember"];
if($fwrmember=="مفعل"){
$infosudo["info"]["fwrmember"]="معطل";
}
if($fwrmember=="معطل"){
$infosudo["info"]["fwrmember"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendKhAlEdJ($chat_id,$message_id);
}
if($data == "tnbih"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$tnbih=$infosudo["info"]["tnbih"];
if($tnbih=="مفعل"){
$infosudo["info"]["tnbih"]="معطل";
}
if($tnbih=="معطل"){
$infosudo["info"]["tnbih"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendKhAlEdJ($chat_id,$message_id);
}

if($data == "silk"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$skil=$infosudo["info"]["silk"];
if($skil=="مفعل"){
$infosudo["info"]["silk"]="معطل";
}
if($skil=="معطل"){
$infosudo["info"]["silk"]="مفعل";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendKhAlEdJ($chat_id,$message_id);
}

if($data == "allch"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$allch=$infosudo["info"]["allch"];
if($allch=="مفردة"){
$infosudo["info"]["allch"]="مجموعة";
}
if($allch=="مجموعة"){
$infosudo["info"]["allch"]="مفردة";
}
file_put_contents("sudo.json", json_encode($infosudo));
sendKhAlEdJ($chat_id,$message_id);
}


if($data == "addchannel"){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];
$count=count($orothe);
if($count<4){
$infosudo["info"]["amr"]="addchannel";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- اذا كانت القناة التي تريد اضافتها عامة قم بارسال معرفها .
* اذا كانت خاصة قم بإعادة توجية منشور من القناة إلى هنا .
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);
}else{
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- 🚫 لا يمكنك اضافة اكثر من  3 قنوات للإشتراك الاجباري 
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"home"]],
]
])
]);
}
}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="addchannel" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

$ch_id = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->id;
$idchan=$ch_id;
if($ch_id != null){

  $checkadmin = getChatstats($text,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$text"))->result->title;
$infosudo["info"]["channel"][$ch_id]["st"]="عامة";
$infosudo["info"]["channel"][$ch_id]["user"]="$text";
$infosudo["info"]["channel"][$ch_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : $text 
name : $namechannel
id : $ch_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
❌ لم تتم إضافة القناة لا توجد قناة تمتلك هذا المعرف 
$text ",
'reply_markup'=>json_encode(['inline_keyboard'=>[
 [['text'=>"- عودة   ",'callback_data'=>"home"]],
 ]])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}
if($message->forward_from_chat and $infosudo["info"]["amr"]=="addchannel" and in_array($from_id, $sudo)){
$id_channel= $message->forward_from_chat->id;
if($id_channel != null){

  $checkadmin = getChatstats($id_channel,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$id_channel"))->result->title;
$infosudo["info"]["channel_id"]="$id_channel";


bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
user : • قناة خاصة • 
name : $namechannel
id : $id_channel

*يجب عليك ارسال رابط القناة الخاص قم بارسالة الان
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- الغاء ",'callback_data'=>"addchannel"]],
 ]])
 ]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}
}
$infosudo["info"]["amr"]="channel_id";
file_put_contents("sudo.json", json_encode($infosudo));
}
$channel_id=$infosudo["info"]["channel_id"];

if($text  and $text !="/start" and $infosudo["info"]["amr"]=="channel_id" and in_array($from_id,$sudo) and !$message->forward_from_chat ){

  $checkadmin = getChatstats($channel_id,$token);
  if($checkadmin == true){
$namechannel = json_decode(file_get_contents("http://api.telegram.org/bot$token/getChat?chat_id=$channel_id"))->result->title;
$infosudo["info"]["channel"][$channel_id]["st"]="خاصة";
$infosudo["info"]["channel"][$channel_id]["user"]="$text";
$infosudo["info"]["channel"][$channel_id]["name"]="$namechannel";
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"
✅ تم إضافة القناة بنجاح عزيزي الادمن 
info channel 
link : $text 
name : $namechannel
id : $channel_id
 ",
 'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إضافة قناة آخرى  ",'callback_data'=>"addchannel"]],
 ]])
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"❌ البوت ليس ادمن في القناة 
- قم برفع البوت اولا لكي تتمكن من إضافتها 
 ",
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- إعادة المحاولة   ",'callback_data'=>"addchannel"]],
 ]])
]);

}

$infosudo["info"]["amr"]="null";
$infosudo["info"]["channel_id"]="null";
file_put_contents("sudo.json", json_encode($infosudo));
}






if($data == "viwechannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co ){

$namechannel= $co["name"];
$st= $co["st"];
$userchannel= $co["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>$userchannel,'callback_data'=>'cull'],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- هذة هي قنوات الاشتراك الاجباري الخاصة بك 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}


if($data == "delchannel" and in_array($from_id, $sudo)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$s ){

$namechannel= $s["name"];
$st= $s["st"];
$userchannel= $s["user"];
if($namechannel!=null){
	$keyboard["inline_keyboard"][] = [['text'=>$namechannel,'callback_data'=>'null']];
if($st=="خاصة"){
$userchannel="null";
}
$keyboard["inline_keyboard"][] =
[['text'=>'🚫 حذف','callback_data'=>'deletchannel '.$co],['text'=>$st,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بالضغط على خيار الحذف بالاسفل 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}

if(preg_match('/^(deletchannel) (.*)/s', $data)){
$nn = str_replace('deletchannel ',"",$data);
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف القناة بنجاح 
-id $nn
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- عودة  ",'callback_data'=>"delchannel"]],
 ]])
]);
unset($infosudo["info"]["channel"][$nn]);
file_put_contents("sudo.json", json_encode($infosudo));
}

if($message and $fwrmember=="مفعل"){
bot('ForwardMessage',[
 'chat_id'=>$admin,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
}



#قسم الاذاعة 

$amr = file_get_contents("sudo/amr.txt");
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "sendmessage" and  in_array($from_id,$sudo)){

bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"🙋🏻‍♂ ¦› أهلا بك عزيزي في قسم الاذاعة
🔘 ¦› قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم الضغط على ارسال الرسالة 
",'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"MARKDOWN",'callback_data'=>"MARKDOWN"],['text'=>"HTML",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى  : $chatsend",'callback_data'=>"button"]],
[['text'=>"الكل",'callback_data'=>"all"],
['text'=>"الاعضاء",'callback_data'=>"member"]],
[['text'=>"القروبات",'callback_data'=>"gruops"],
['text'=>"القنوات",'callback_data'=>"channel"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - العودة ",'callback_data'=>"home"]],


]
])
]);
}
function sendKhAlEdJ2($chat_id,$message_id){
$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");

bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"🙋🏻‍♂ ¦› أهلا بك عزيزي في قسم الاذاعة
🔘 ¦› قم بتحديد نوع الاذاعة ومكان ارسال الاذاعة
ثم قم  الضغط على ارسال الرسالة
"
,'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"نوع الاذاعة : $no3send",'callback_data'=>"button"]],
[['text'=>"توجية",'callback_data'=>"forward"],
['text'=>"MARKDOWN",'callback_data'=>"MARKDOWN"],['text'=>"HTML",'callback_data'=>"HTML"]],
[['text'=>"الارسال الى  : $chatsend",'callback_data'=>"button"]],
[['text'=>"الكل",'callback_data'=>"all"],
['text'=>"الاعضاء",'callback_data'=>"member"]],
[['text'=>"القروبات",'callback_data'=>"gruops"],
['text'=>"القنوات",'callback_data'=>"channel"]],
[['text'=>"ارسال الرسالة",'callback_data'=>"post"]],
[['text'=>" - العودة ",'callback_data'=>"home"]],
]
])
]);
} 
 ###KhAlEdJ### 


//~~~~~~~~~~~//
if($data == "forward"){
file_put_contents("no3send.txt","forward");
sendKhAlEdJ2($chat_id,$message_id);

}


if($data == "MARKDOWN"){
file_put_contents("no3send.txt","MARKDOWN");
sendKhAlEdJ2($chat_id,$message_id);

}
if($data == "HTML"){
file_put_contents("no3send.txt","html");
sendKhAlEdJ2($chat_id,$message_id);

}

//~~~~~~~~~~~//
if($data == "all"){
file_put_contents("chatsend.txt","all");
sendKhAlEdJ2($chat_id,$message_id);


}


if($data == "member"){
file_put_contents("chatsend.txt","member");
sendKhAlEdJ2($chat_id,$message_id);


}
if($data == "gruops"){
file_put_contents("chatsend.txt","gruops");
sendKhAlEdJ2($chat_id,$message_id);

}

if($data == "channel"){
file_put_contents("chatsend.txt","channel");
sendKhAlEdJ2($chat_id,$message_id);

}


$no3send =file_get_contents("no3send.txt");
$chatsend=file_get_contents("chatsend.txt");
if($data == "post" and $no3send!=null and $chatsend!=null and  in_array($from_id,$sudo) ){

file_put_contents("sudo/amr.txt","sendsend");
bot('EditMessageText',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"قم بارسال رسالتك الان  
نوع الارسال : $no3send
مكان الارسال : $chatsend
",
'message_id'=>$message_id,
'reply_markup'=>json_encode([ 
'inline_keyboard'=>[
[['text'=>"الغاء",'callback_data'=>"set"]],

]
])
]);
}
if($data == "set" and  in_array($from_id,$sudo) ){
unlink("sudo/amr.txt");
bot('EditMessageText',[
'chat_id'=>$chat_id,
'text'=>"تم إلغاء الارسال بنجاح 
",
'message_id'=>$message_id,
]);
} 
 ###KhAlEdJ### 

$forward = $update->message->forward_from;
$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;

$member =file_get_contents("sudo/member.txt");


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



 ###KhAlEdJ### 


##تنفيذ الاذاعة 
if($message  and $text !="الاذاعة" and $amr == "sendsend" and $no3send=="forward" and  in_array($from_id,$sudo) ){
unlink("sudo/amr.txt");

if($chatsend=="all"){

$for=$member."\n".$groups."\n".$channels;
$txt=" تم التوجية - عام للجميع";
}
if($chatsend=="member"){
$for=$member;
$txt="  تم التوجية - خاص - للاعضاء فقط";
}
if($chatsend=="gruops"){
$for=$groups;
$txt=" تم التوجية - خاص - القروبات فقط";
}

if($chatsend=="channel"){
$txt=" تم التوجية - خاص - القنوات فقط";
$for=$channels;
}
file_put_contents("get.txt","0");
file_put_contents("sudo/send.txt","$for");
$foor=explode("\n",$for);
bot('ForwardMessage',[
 'chat_id'=>$chat_id,
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);
for($i=0;$i<count($foor); $i++){
bot('ForwardMessage',[
 'chat_id'=>$foor[$i],
 'from_chat_id'=>$chat_id,
 'message_id'=>$message->message_id,
]);

}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
",
'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'عودة ' ,'callback_data'=>"home"]],
]])
]);

unlink("no3send.txt");
unlink("chatsend.txt");


}


if($message and $text !="الاذاعة"  and $amr == "sendsend"and $no3send !="forward" and  in_array($from_id,$sudo) ){
unlink("sudo/amr.txt");


if($chatsend=="all"){

$for=$member."\n".$groups."\n".$channels;
$txt=" تم النشر - عام للجميع";
}
if($chatsend=="member"){
$for=$member;
$txt=" تم النشر - خاص - للاعضاء فقط";
}
if($chatsend=="gruops"){
$for=$groups;
$txt=" تم النشر - خاص - القروبات فقط";
}

if($chatsend=="channel"){
$txt=" تم النشر - خاص - القنوات فقط";
$for=$channels;
}
file_put_contents("sudo/send.txt","$for");
file_put_contents("get.txt","0");
$foor=explode("\n",$for);
if($text){
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,

]);

for($i=0;$i<count($foor); $i++){
 
 
 
bot('sendMessage', [
'chat_id'=>$foor[$i],
'text'=>"$text",
'parse_mode'=>"$no3send",
'disable_web_page_preview'=>true,
]);





}
}else{
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption",
]);

for($i=0;$i<count($foor); $i++){
 
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$foor[$i],
"$ss"=>"$file_id",
'caption'=>"$caption",

]);
}


}
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"✅ $txt
"
,'message_id'=>$message_id,
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>' عودة ' ,'callback_data'=>"home"]],
]])
]);
unlink("no3send.txt");
unlink("chatsend.txt");

} 

 ###KhAlEdJ### 

if($data == "admins" and $from_id==$admin){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["admins"];


$keyboard["inline_keyboard"]=[];

foreach($orothe as $co=>$sss ){


if($co!=null and $co!=$admin ){

$keyboard["inline_keyboard"][] =
[['text'=>' 🗑','callback_data'=>'deleteadmin '.$co.'#'.$sss],['text'=>$sss,'callback_data'=>'null']];
}}
	$keyboard["inline_keyboard"][] = [['text'=>"- اضافة ادمن  ",'callback_data'=>"addadmin"]];
	$keyboard["inline_keyboard"][] = [['text'=>"- عودة  ",'callback_data'=>"home"]];
$reply_markup=json_encode($keyboard);
	
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- تستطيع فقط رفع 5 ادمنية 
*تنوية : الادمنية يستطيعون التحكم بإعدادات البوت ماعدا قسم الادمنية .
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);

}

if($data == "addadmin"){
$infosudo["info"]["amr"]="addadmin";
file_put_contents("sudo.json", json_encode($infosudo));
bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- قم بارسال ايدي الادمن 
",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- الغاء  ",'callback_data'=>"home"]],
]
])
]);

}
if($text  and $text !="/start" and $infosudo["info"]["amr"]=="addadmin" and $from_id ==$admin and is_numeric($text)){
if(!in_array($text,$admins)){
$infosudo = json_decode(file_get_contents("sudo.json"),true);
$orothe= $infosudo["info"]["channel"];
$count=count($orothe);
if($count<6){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حفظ  رفع الادمن بنجاح",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);

$infosudo["info"]["admins"][]="$text";
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"🚫 لايمكنك اضافة اكثر من 5 ادمنية ً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
}
}else{
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ⚠ الادمن مضاف مسبقاً",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"- عودة  ",'callback_data'=>"admins"]],
]
])
]);
}
$infosudo["info"]["amr"]="null";
file_put_contents("sudo.json", json_encode($infosudo));

}

if(preg_match('/^(deleteadmin) (.*)/s', $data)){
$nn = str_replace('deleteadmin ',"",$data);
$ex=explode('#',$nn);
$id=$ex[1];
$n=$ex[0];

bot('EditMessageText',[
'chat_id'=>$chat_id, 
'text'=>"- ✅ تم حذف الادمن بنجاح 
-id $id
",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

 [['text'=>"- عودة  ",'callback_data'=>"admins"]],
 ]])
]);
unset($infosudo["info"]["admins"][$n]);
file_put_contents("sudo.json", json_encode($infosudo));
}
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}

$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data     = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}
$ex = explode("#",$data);
$jsonfrom = json_decode(file_get_contents("data/$from_id.json"),true);
if(!file_exists("data/$from_id.json")) {$put = []; file_put_contents("data/$from_id.json", json_encode($put));}
$mesklk =$jsonfrom["info"]["amr"];
if(!is_dir('data')){mkdir('data');}
if($text =="تحويل" or strpos($data,'_')!== false ){$jsonfrom["info"]["amr"]="$data";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}
if($text == 'تحويل') {bot('sendMessage',['chat_id'=>$chat_id,'text'=>"اهلا بك عزيزي $nameee$nameee2  في ميزت تحويل الصيغ تستطيع تحويل جميع صيغ الميديا",'parse_mode'=>HTML,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'❍ قسم الصوت ','callback_data'=>'g_mp3']],[['text'=>'❍ قسم الفديو','callback_data'=>'g_video']],[['text'=>'❍ قسم الصور','callback_data'=>'g_photo']],[['text'=>'❍ قسم تغيير الحقوق','callback_data'=>'audio']],]])]);$jsonfrom["info"]["amr"]="null";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}
if($data == 'hoooome'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>"اهلا بك عزيزي $nameee$nameee2  في ميزت تحويل الصيغ تستطيع تحويل جميع صيغ الميديا",'parse_mode'=>HTML,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'❍ قسم الصوت ','callback_data'=>'g_mp3']],[['text'=>'❍ قسم الفديو','callback_data'=>'g_video']],[['text'=>'❍ قسم الصور','callback_data'=>'g_photo']],[['text'=>'❍ قسم تغيير الحقوق','callback_data'=>'audio']],]])]);}
if($data == 'g_photo'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ تم اختبار قسم الصور يمكنك اختيار نوع التحويل','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'من ملصق الى صورة ','callback_data'=>'m_ph']],[['text'=>'من صورة الى ملصق','callback_data'=>'ph_m']],[['text'=>'الصفحة الرئيسية  ','callback_data'=>'hoooome']],]])]);}
if($data == 'ph_m'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل الصوره لتحويلها الى ملصق','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_photo']],]])]);}
if($message->photo and $mesklk == 'ph_m'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->photo[1]->file_id])->result->file_path;file_put_contents("data/$chat_id.png",file_get_contents($file));bot('sendsticker',['chat_id'=>$chat_id,'sticker'=>new CURLFile("data/$chat_id.png")]);unlink("data/$chat_id.png");}
if($data == 'm_ph'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ الان ارسل الملصق لتحويله الى صوره','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_photo']],]])]);}
if($message->sticker and $mesklk == 'm_ph'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->sticker->file_id])->result->file_path;file_put_contents("data/$chat_id.jpg",file_get_contents($file));bot('sendphoto',['chat_id'=>$chat_id,'photo'=>new CURLFile("data/$chat_id.jpg")]);unlink("data/$chat_id.jpg");}
if($data == 'g_video'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ تم اختبار قسم  الفديو يمكنك اختيار نوع التحويل','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'من فيديو الى موسيقى','callback_data'=>'v_mp']],[['text'=>'من فيديو الى بصمة','callback_data'=>'v_p']],[['text'=>'من فيديو الى فيديو نوت','callback_data'=>'v_vn']],[['text'=>'من فيديو الى متحركة','callback_data'=>'v_m']],[['text'=>'الصفحه الرئيسية ','callback_data'=>'hoooome']],]])]);}
if($data == 'v_mp'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل الفديو لتحويله الى موسيقى','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_video']],]])]);}
if($message->video and $mesklk == 'v_mp'){$file_id = $update->message->video->file_id;bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->video->file_id])->result->file_path;file_put_contents("data/$chat_id.mp3",file_get_contents($file));bot('sendaudio',['chat_id'=>$chat_id,'audio'=>new CURLFile("data/$chat_id.mp3")]);unlink("data/$chat_id.mp3");}
if($data == 'v_p'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل الفيديو لتحويله الى بصمه','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_video']],]])]);}
if($message->video and $mesklk == 'v_p'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->video->file_id])->result->file_path;file_put_contents("data/$chat_id.ogg",file_get_contents($file));bot('sendvoice',['chat_id'=>$chat_id,'voice'=>new CURLFile("data/$chat_id.ogg")]);unlink("data/$chat_id.ogg");}
if($data =='v_m'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل الفديو لتحويله الى متحركه','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_video']],]])]);}
if($message->video and $mesklk == 'v_m'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->video->file_id])->result->file_path;file_put_contents("data/$chat_id.mp4",file_get_contents($file));bot('senddocument',['chat_id'=>$chat_id,'document'=>new CURLFile("data/$chat_id.mp4")]);unlink("data/$chat_id.mp4");}
if($data == 'v_vn'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل الفديو لتحويله الى فديو نوت يجب ان يكون الفديو مربع','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_video']],]])]);}
if($message->video and $mesklk == 'v_vn'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->video->file_id])->result->file_path;file_put_contents("data/$chat_id.mp4",file_get_contents($file));bot('sendVideoNote',['chat_id'=>$chat_id,'video_note'=>new CURLFile("data/$chat_id.mp4")]);unlink("data/$chat_id.mp4");}
if($data =='m_v'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل متحركة لتحويلها الى فيديو','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_video']],]])]);}
if($message->document and $mesklk == 'm_v'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->video->file_id])->result->file_path;file_put_contents("data/$chat_id.mp4",file_get_contents($file));bot('sendvideo',['chat_id'=>$chat_id,'video'=>new CURLFile("data/$chat_id.mp4")]);unlink("data/$chat_id.mp4");}
if($data =='m_vn'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل متحركة لتحويلها الى فيديو نوت','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_video']],]])]);}
if($message->document and $mesklk == 'm_vn'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->video->file_id])->result->file_path;file_put_contents("data/$chat_id.mp4",file_get_contents($file));bot('sendVideoNote',['chat_id'=>$chat_id,'video_note'=>new CURLFile("data/$chat_id.mp4")]);unlink("data/$chat_id.mp4");}
if($data == 'g_mp3') {bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ تم اختبار قسم الصوت يمكنك اختيار نوع التحويل','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'من موسيقى الى بصمة  ','callback_data'=>'mp_p']],[['text'=>'من بصمة الى موسيقى  ','callback_data'=>'p_mp']],[['text'=>'من بصمة الى فيديو نوت','callback_data'=>'p_vn']],[['text'=>'من موسيقى الى فيديو نوت','callback_data'=>'mp_vn']],[['text'=>'الصفحه الرئيسية ','callback_data'=>'hoooome']],]])]);}
if($data == 'mp_vn'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل موسيقى لتحويلها الى فديو نوت','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_mp3']],]])]);}
if($message->audio and $mesklk == 'mp_vn'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->audio->file_id])->result->file_path;file_put_contents("data/$chat_id.mp4",file_get_contents($file));bot('sendVideoNote',['chat_id'=>$chat_id,'video_note'=>new CURLFile("data/$chat_id.mp4")]);unlink("data/$chat_id.mp4");}
if($data == 'p_vn'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل الصوت لتحويله الى فديو نوت','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_mp3']],]])]);}
if($message->voice and $mesklk == 'p_vn'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->voice->file_id])->result->file_path;file_put_contents("data/$chat_id.mp4",file_get_contents($file));bot('sendVideoNote',['chat_id'=>$chat_id,'video_note'=>new CURLFile("data/$chat_id.mp4")]);unlink("data/$chat_id.mp4");}
if($data == 'p_mp'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل البصمة لتحويلها الى موسيقى','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_mp3']],]])]);}
if($message->voice and $mesklk == 'p_mp') {bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->voice->file_id])->result->file_path; file_put_contents("data/$chat_id.mp3",file_get_contents($file));bot('sendaudio',['chat_id'=>$chat_id,'audio'=>new CURLFile("data/$chat_id.mp3")]);unlink("data/$chat_id.mp3");}
if($data == 'mp_p'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ الان ارسل موسيقى لتحويلها الى بصمة','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'g_mp3']],]])]);}
if($message->audio and $mesklk == 'mp_p'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>'❍ جاري التحويل انتظر قليلا']);$file = "https://api.telegram.org/file/bot".API_KEY."/".bot('getfile',['file_id'=>$message->audio->file_id])->result->file_path;file_put_contents("data/$chat_id.ogg",file_get_contents($file));bot('sendvoice',['chat_id'=>$chat_id,'voice'=>new CURLFile("data/$chat_id.ogg")]);unlink("data/$chat_id.ogg");}
if($data == 'audio'){bot('editmessagetext',['message_id'=>$message_id,'chat_id'=>$chat_id,'text'=>'❍ تستطيع من هذا القسم تعديل حقوق المقاطع الصوتية من حيث اسم المقطع والمؤدي والوصف قم بارسال مقطع صوتي ','reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>'hoooome']],]])]);$jsonfrom["info"]["amr"]="hogog";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}
$audio=$message->audio;
if($audio and $mesklk == "hogog" ){$file_id = $update->message->audio->file_id;bot('SendMessage',['chat_id'=>$chat_id,'text'=>"❍ حسنا عزيزي قم بارسال اسم للمقطع الصوتي  ",]);$jsonfrom["info"]["amr"]="title";$jsonfrom["info"]["file_id"]="$file_id";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}
if($text and $mesklk == "title" ){bot('SendMessage',['chat_id'=>$chat_id,'text'=>"❍ تم حفظ اسم المقطع $text قم بإرسال اسم المؤدي ( الفنان - المنشد ..الخ )",]);$jsonfrom["info"]["amr"]="performer";$jsonfrom["info"]["title"]="$text";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}
if($text and $mesklk == "performer" ){bot('SendMessage',['chat_id'=>$chat_id,'text'=>"❍ تم حفظ اسم المؤدي $text قم بارسال وصف المقطع ",]);$jsonfrom["info"]["amr"]="caption";$jsonfrom["info"]["performer"]="$text";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}$jsonfrom = json_decode(file_get_contents("data/$from_id.json"),true);$getfile_id=$jsonfrom["info"]["file_id"];
if($text and $mesklk == "caption" ){bot('SendMes sage',['chat_id'=>$chat_id,'text'=>"❍ تم حفظ الوصف $text جاري تغيير الحقوق انتظر قليلا من فضلك ",]);$wathq = json_decode(file_get_contents('https://api.telegram.org/bot'.$token.'/getFile?file_id='.$getfile_id),true);$wathqpath = $wathq['result']['file_path'];$wathq_file = 'https://api.telegram.org/file/bot'.$token.'/'.$wathqpath;file_put_contents('data/'.$from_id.'-KhAlEdJ'.'.mp3',file_get_contents($wathq_file));$jsonfrom["info"]["amr"]="get";$jsonfrom["info"]["caption"]="$text";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}$jsonfrom = json_decode(file_get_contents("data/$from_id.json"),true);$getaudio=$jsonfrom["info"]["amr"];$gettitle=$jsonfrom["info"]["title"];$getperformer=$jsonfrom["info"]["performer"];$getcaption=$jsonfrom["info"]["caption"];
if($getaudio == "get" ){$audio = bot('sendaudio',['chat_id'=>$chat_id,'audio'=>new CURLFile('data/'.$from_id.'-KhAlEdJ'.'.mp3'),'performer'=>$getperformer,'title'=>$gettitle,'caption'=>$getcaption ,]);unlink('data/'.$from_id.'-KhAlEdJ'.'.mp3');$jsonfrom["info"]["amr"]="null";file_put_contents("data/$from_id.json", json_encode($jsonfrom));}

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
if($text == '/start'){ 
bot('sendphoto',[
'chat_id'=>$chat_id,
photo =>"https://t.me/photojack14366/14",
'caption'=>'تم اضافه المميزات بنجاح 
- `القران` , `المسلسلات` .
- `الحذف` , `صورتي` .
- `طرائف` , `افلام` .
- `العاب` , `لو خيروك` . 
ـ `العاب` , `اغاني` .
- `نسبه جمالي` , `قفل /فتح القناه` .
- `التحويل` , `همسه` .
- `نسبه الانوثه` , `نسبه الرجوله` .
- `كشف الكذب` , `بلوره` .
- `الوقت` , `لعبه حجر ورقه مقص` .
- `حساب العمر` , `جهاتي` .
- `صوره` , `ميمز` .
- `ريمكس` , `غنيلي` .
- `متحركه` , `ردود` .
- `انطق` , `انطقي` .
[يمكن مشاهده طريقه استخدام كل امر من خلال قناه المبرمج](https://t.me/J_F_A_I/355)
'
,
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'𝐂𝐇','url'=>'https://t.me/J_F_A_I']],
]])]);}
if($text == 'خالد' || $text == 'جاك' || $text == 'المبرمج جاك'){ 
bot('sendphoto',[
'chat_id'=>$chat_id,
photo =>"https://t.me/photojack14366/5",
'caption'=>'⤶ اجمد من الجمدان يبرو 🖤 ', 
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'⤶︙𝐷𝐸𝑉 >> 🖤 𝑱𝑨𝑪𝑲 🖤','url'=>'https://t.me/V_P_E']], 
[['text'=>"اضف المميزات الي بوتك",'url'=>'https://t.me/'.$user_bot_sudo.'']],
]])]);}
$update = json_decode(file_get_contents('php://input')); $message = $update->message; $id = $message->from->id; $chat_id = $message->chat->id; $from_id = $message->from->id; $text = $message->text; $namee = $update->callback_query->from->first_name; $user = $message->from->username; $nameee = $message->from->first_name ?? $update->callback_query->from->first_name; $nameee2 = $message->from->last_name ?? $update->callback_query->from->last_name; $chat_id = $update->callback_query->message->chat->id; $user = $update->callback_query->from->username; $message = $update->message; $id = $message->from->id; $chat_id = $message->chat->id; $from_id = $message->from->id; $new = $message->new_chat_member; $left= $update->message->left_chat_member; $text = $message->text; $video      = $update->message->video; $photo      = $update->message->photo; $voice      = $update->message->voice; $caption = $message->text; $type= $update->message->chat->type; $namee = $update->callback_query->from->first_name; $user = $message->from->username; $onstart = file_get_contents("onstart.txt"); $from_id = $message->from->id; 
$message = $update->message; $id = $message->from->id; $chat_id = $message->chat->id; $from_id = $message->from->id; $text = $message->text; $namee = $update->callback_query->from->first_name; $user = $message->from->username; $nameee = $message->from->first_name ?? $update->callback_query->from->first_name; $nameee2 = $message->from->last_name ?? $update->callback_query->from->last_name; $chat_id = $update->callback_query->message->chat->id; $user = $update->callback_query->from->username; $message = $update->message; $id = $message->from->id; $chat_id = $message->chat->id; $from_id = $message->from->id; $new = $message->new_chat_member; $left= $update->message->left_chat_member; $text = $message->text; $video      = $update->message->video; $photo      = $update->message->photo; $voice      = $update->message->voice; $caption = $message->text; $type= $update->message->chat->type; $namee = $update->callback_query->from->first_name; $user = $message->from->username; $onstart = file_get_contents("onstart.txt"); $from_id = $message->from->id; $jaack = "@"; $jacku = "𝑼𝑺𝑬𝑹 : "; $jackn = "𝑵𝑺𝑴𝑬 : "; $sub=substr($name,0,10).""; $user = $update->message->from->username; $user = $message->from->username; $user = $update->callback_query->from->username; $MoHaMMedd = count($groups)-1; $memberscount = count($members); $members = explode("\n",file_get_contents("members.txt")); $date = date('h:i:s'); $d = date('A'); $a =preg_replace('/AM/', 'ص', $d);$a =preg_replace('/PM/', 'م', $d); date_default_timezone_set('Asia/Baghdad'); $time = date('h:i:a'); $year = date('Y'); $month = date('n'); $day = date('j'); $user= $update->message->from->username;
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$namee = $update->callback_query->from->first_name;
$user = $message->from->username;
$XSOUdoJ = "1965297568"; /* الايدي */
$baageel = file_get_contents("baageel.txt");
if($text == "تفعيل المميزات" and $chat_id == $XSOUdoJ){bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❍ عزيزي المبرمج جاك تم بنجاح تفعيل المميزات ✓",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,'reply_to_message_id'=>$message_id,]);file_put_contents("baageel.txt","on");}
if($text == "تعطيل المميزات" and $chat_id == $XSOUdoJ){bot("sendmessage",["chat_id"=>$chat_id,"text"=>"❍ عزيزي المبرمج جاك تم بنجاح تعطيل المميزات X",]);file_put_contents("baageel.txt","off");} 
if($message and $baageel =="off" and $chat_id != $XSOUdoJ ){bot("sendmessage",["chat_id"=>$from_id,"text"=>"❍ للأسف الشديد عزيزي $nameee$nameee2 قام المبرمج جاك بتعطيل المميزات الخاصه بهذا البوت ❍",'parse_mode'=>"MARKDOWN",'disable_web_page_preview' =>true,'reply_to_message_id'=>$message->message_id, 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[],]])]);return false;}
if(isset($update->message)){$message = $update->message;$text = $message->text;$chat_id = $message->chat->id;$from_id = $message->from->id;$message_id = $message->message_id;$first_name = $message->from->first_name;$username = $message->from->username;$id = $message->from->id;}
if(isset($update->message)){$chid= $message->chat->id;$chtext= $message->text;$messageid= $message->message_id;;$document= $message->document;$sticker= $message->sticker;$photo= $message->photo;$video= $message->video;$forward= $message->forward_from_chat;$contact        = $message->contact;$audio          = $message->audio;$id = $message->from->id;}
$CCH = json_decode(file_get_contents("data/$chat_id.json"),true);
if($CCH["lock"]["channel"] == "close"){if($message->sender_chat->type == "channel"){bot('deletemessage',['chat_id'=>$chat_id,'message_id'=>$message_id]);}}
if($text == "ت قناه" ){mkdir ("data");$CCH = '{"lock": {"channel": "open"},}';$CCH = json_decode($CCH,true);$CCH = json_encode($CCH,true);file_put_contents("data/$chat_id.json",$CCH);bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❍ تم تفعيل ميزه فتح وقفل القنوات ",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,]);}
if($text =="قفل القناه" && $id == $XSOUdoJ){$CCH["lock"]["channel"]="close";$CCH = json_encode($CCH,true);file_put_contents("data/$chat_id.json",$CCH);bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❍ تم قفل القنوات بنجاح .",'reply_to_message_id'=>$message_id,]);}
if($text =="فتح القناه" && $id == $XSOUdoJ ){$CCH["lock"]["channel"]="open";$CCH = json_encode($CCH,true);file_put_contents("data/$chat_id.json",$CCH);bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❍ تم فتح القنوات بنجاح .",'reply_to_message_id'=>$message_id, ]);}
$new = json_decode(file_get_contents('gehatey.json'),true);
if($message->new_chat_member){$new['new'][$chat_id][$from_id] = ($new['new'][$chat_id][$from_id]+1);
file_put_contents('gehatey.json', json_encode($new));}
if($new['new'][$chat_id][$from_id] == null){$new = 0;}else{$new = $new['new'][$chat_id][$from_id];}
if($text == 'جهاتي'){bot('sendmessage',['chat_id'=>$chat_id,'text'=>'❍ جهاتك : '.$new,]);}
if($text == 'العاب'){bot('sendMessage',['chat_id'=>$chat_id,'text'=>"❍ اهلا بك  ؛ $nameee$nameee2
في قسم الالعاب اونلاين اختر لغتك💫  ،  العربيه Arabic*🇪🇬* ، 
❍ welcome Welcome  In bot online games ⭐️ your language💫 
الانكليزيه English* 🇺🇸* ،"
,'parse_mode'=>"html",'disable_web_page_preview'=>true,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"العربيـة ،🇪🇬 arbic",'callback_data'=>"alawi"],['text'=>"الانكليزيـة ،🇺🇸 English",'callback_data'=>"tttitt"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "tttitt"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"❍ HI 👋
Dear my dear to tomorrow I chose the English 🇺🇸  language
Here is a list of games 👇",
'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"Action ، 💛",'callback_data'=>"an"],['text'=>"Competitions ، 💛",'callback_data'=>"xc"]],[['text'=>"Mix ، 💛",'callback_data'=>"nj"]],[['text'=>"Back 🤷🏿‍♀️",'callback_data'=>"alo"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);} 
if($data == "alawi"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"❍ اهلا بك  ؛ حسننا عزيزي لقد اخترته لغه العربيه ، Arabic 🇪🇬 اليك قائمه الالعاب  ،  👇",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"اكشن ، 🌐",'callback_data'=>"apol"],['text'=>"متنوعات ، 🌐",'callback_data'=>"als"]],[['text'=>"مسابقات ، 🌐",'callback_data'=>"nk"]],[['text'=>"الـرجـووع 🤷🏿‍♀️",'callback_data'=>"alo"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "alo"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك  ؛ حسننا عزيزي اختر لغتك💫
العربيه Arabic*🇪🇬* ، 
❍ welcome Welcome In bot online games ⭐️ your language💫 
الانكليزيه English* 🇺🇸* ،",
'parse_mode'=>"html",'disable_web_page_preview'=>true,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"العربيـة ،🇪🇬arbic",'callback_data'=>"alawi"],['text'=>"الانكليزيـة ،🇺🇸 English",'callback_data'=>"tttitt"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "apol"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"حسننا عزيزي لقد اخترته قائمه العاب اكشن ، 🚸 اليك العاب تاليه اختر واحد من الالعاب ولعب ، ⚖️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"Qubo ، 🌐",'callback_data'=>"Qubo"],['text'=>"Snake ، 🌐",'callback_data'=>"Snake"]], [['text'=>"HausschweinRun ، 🌐",'callback_data'=>"HausschweinRun"],['text'=>"GravityNinja21 ، 🌐",'callback_data'=>"GravityNinja21"]], [['text'=>"Snake ، 🌐",'callback_data'=>"Snake"]], [['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Qubo"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Qubo } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Qubo"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Snake"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Snake } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Snake"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "HausschweinRun"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { HausschweinRun } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=HausschweinRun"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Snake"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Snake } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Snake"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "GravityNinja21"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { GravityNinja21 } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=GravityNinja21"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);} 
if($data == "als"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"حسننا عزيزي لقد اخترته قائمه العاب متنوعات ، 🚸 اليك العاب تاليه اختر واحد من الالعاب ولعب ، ⚖️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"Hexonix ، 🌐",'callback_data'=>"Hexonix"],['text'=>"MotoFX ، 🌐",'callback_data'=>"MotoFX"]],[['text'=>"Towerman ، 🌐",'callback_data'=>"Towerman"],['text'=>"Squares ، 🌐",'callback_data'=>"Squares"]],[['text'=>"Skipper ، 🌐",'callback_data'=>"Skipper"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Hexonix"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Hexonix } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Hexonix"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Towerman"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Towerman } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Towerman"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Skipper"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Skipper }اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Skipper"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "MotoFX"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { MotoFX }اضغط عله زر لعب لتلعب ، 💛", 'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=MotoFX"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "Squares"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { Squares } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=Squares"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "nk"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"حسننا عزيزي لقد اخترته قائمه العاب ، مسابقات ، 🌐 اليك العاب تاليه اختر واحد من الالعاب ولعب ، ⚖️",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"AtomicDrop1 ، 🌐",'callback_data'=>"AtomicDrop1"],['text'=>"MotoFx ، 🌐",'callback_data'=>"MotoFx"]],[['text'=>"F1Racer ، 🌐",'callback_data'=>"F1Racer"],['text'=>"SpeedDriver  ، 🌐",'callback_data'=>"SpeedDriver"]],[['text'=>"BeachRacer ، 🌐",'callback_data'=>"BeachRacer"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "AtomicDrop1"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { AtomicDrop1 }اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=AtomicDrop1"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "F1Racer"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { F1Racer } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=F1Racer"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "BeachRacer"){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { BeachRacer } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=BeachRacer"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
if($data == "MotoFx"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"اهلا بك ! في لعبه { MotoFx } اضغط عله زر لعب لتلعب ، 💛",'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"، لعب ،", 'url'=>"https://t.me/gamee?game=MotoFx"],['text'=>"تحميل الالعاب ، 🌜", 'url'=>"https://gamee.com/get"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"alawi"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],] ])]);}
$yabot = array(" اي يا $nameee$nameee2"," اي يا قلب البوت"," انا بوت علي سورس بلاك يا $nameee$nameee2"," خير يا $nameee$nameee2","خضتني يا $nameee$nameee2 عاوز اي","دلعني وقولي يا بتبوتي",); $ybot = array_rand($yabot, 1); $gname =  $message->chat->title;
if($text == 'بوت' || $text == 'يا بوت' ){ $photo = bot('GetUserProfilePhotos',['user_id'=>$from_id])->result->photos [0][0]->file_id; $bio = bot('getchat',['chat_id'=>$from_id])->result->bio ? bot('getchat',['chat_id'=>$from_id])->result->bio : 'لا يوجد بايو'; bot('sendphoto',[ 'chat_id'=>$chat_id, 'photo'=>$photo, 'parse_mode'=>"MarkDown", 'caption'=>"ㅤ",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>$yabot[$ybot],'callback_data'=>"jack"]],[['text'=>$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$gname,'callback_data'=>"jack"]],]])]);}
$result=json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getUserProfilePhotos?user_id=$from_id"),true); $count=$result["result"]["total_count"];  $pr = str_replace("صورتي ", "", $text);
if($text=="صورتي $pr" && $pr <= $count){$result=json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getUserProfilePhotos?user_id=$from_id"),true); $file_id=$result["result"]["photos"][$pr-1][0]["file_id"]; $count=$result["result"]["total_count"];var_dump(bot('sendphoto',['chat_id'=>$chat_id,'photo'=>"$file_id",'caption' =>"هذه هي الصوره رقم $pr عدد صورك $count", 'reply_to_message_id'=>$message->message_id, ])); }elseif($text == "صورتي $pr" && $pr > $count){bot('sendMessage',['chat_id' =>$chat_id,'text' =>"عذرا انت تمتلك $count صوره فقط",'reply_to_message_id'=>$message->message_id, ]);}
if($text == 'صورتي' || $text == 'صورتى'){bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"❍ اكتب صورتي + العدد مثال ➢ صورتي 1",'reply_to_message_id' =>$message->message_id,]);}
$memz = rand("3","1170");
if($text == "memz" or $text == "ميمز"){bot('sendvoice',['chat_id'=>$chat_id,'voice'=>"https://t.me/MemzDragon/$memz",'caption'=>"خد يروحي",
'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"memzag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الميمز','callback_data'=>"dell"]],]])]);}
if($data == "memzag"){bot('sendvoice',['chat_id'=>$chat_id,"message_id"=>$message_id,'voice'=>"https://t.me/MemzDragon/$memz",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"memzag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الميمز','callback_data'=>"dell"]],]])]);}
$ggif = rand("3","242");
if($text == "متحركة" or $text == "متحركه"){bot('sendvideo',['chat_id'=>$chat_id,'video'=>"https://t.me/AnimationDragon/$ggif",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"gifag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف المتحركه','callback_data'=>"dell"]],]])]);}
if($data == "gifag"){bot('sendvideo',['chat_id'=>$chat_id,"message_id"=>$message_id,'video'=>"https://t.me/AnimationDragon/$ggif",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"gifag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف المتحركه','callback_data'=>"dell"]],]])]);}
$photo = rand("5","1146");
if($text == "صوره" or $text == "صورة"){bot('sendphoto',['chat_id'=>$chat_id,'photo'=>"https://t.me/PhotosDragon/$photo",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"photoag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الصوره','callback_data'=>"dell"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف المتحركه','callback_data'=>"dell"]],]])]);}
if($data == "photoag"){bot('sendphoto',['chat_id'=>$chat_id,"message_id"=>$message_id,'photo'=>"https://t.me/PhotosDragon/$photo",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"photoag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الصوره','callback_data'=>"dell"]],]])]);}
$music = rand("5","2688");
if($text == "اغنيه" or $text == "غنيلي"){bot('sendvoice',['chat_id'=>$chat_id,'voice'=>"https://t.me/AudioDragon/$music",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"voiceag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الاغنيه','callback_data'=>"dell"]],]])]);}
if($data == "voiceag"){bot('sendvoice',['chat_id'=>$chat_id,"message_id"=>$message_id,'voice'=>"https://t.me/AudioDragon/$music",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى ","callback_data"=>"voiceag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الاغنيه','callback_data'=>"dell"]],]])]);}
$remix = rand("3","442");
if($text == "remix" or $text == "ريمكس"){bot('sendvoice',['chat_id'=>$chat_id,'voice'=>"https://t.me/RemixDragon/$remix",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"remixag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الريمكس','callback_data'=>"dell"]],]])]);}
if($data == "remixag"){bot('sendvoice',['chat_id'=>$chat_id,"message_id"=>$message_id,'voice'=>"https://t.me/RemixDragon/$remix",'caption'=>"خد يروحي",'parse_mode'=>"markdown",'reply_to_message_id'=>$message_id,'reply_markup'=>json_encode(['inline_keyboard'=>[[['text'=>"مره اخرى","callback_data"=>"remixag"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الريمكس','callback_data'=>"dell"]],]])]);}
$message  = $update->message;$from_id  = $message->from->id;$chat_id  = $message->chat->id;$text     = $message->text;$data     = $update->callback_query->data;$inline   = $update->inline_query->query;$id       = $update->inline_query->from->id;$msg_id   = $update->inline_query->inline_message_id;$username = $update->inline_query->from->username;$cuser    = $update->callback_query->from->username;$cid      = $update->callback_query->from->id;
if($inline){$ex = explode(" ", $inline);$user = trim($ex[0],"@");$wh = str_replace($ex[0], $wh, $inline);bot('answerInlineQuery',['inline_query_id'=>$update->inline_query->id,    'results' => json_encode([['type'=>'article','id'=>base64_encode(rand(5,555)),'title'=>"هذه همسه سريه ل $user هو فقط من يستطيع رؤيتها انتو لاتتدخلو 😂",'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"هذه همسه سريه لـ $user هو فقط من يستطيع رؤيتها"],'reply_markup'=>['inline_keyboard'=>[[['text'=>'🔐اضغط لرؤيتها 🙈','callback_data'=>$user."or".$username."or".$wh]],]]]])]);}
if($data){$ex = explode("or", $data);if($cuser == $ex[0] or $cuser == $ex[1] or $cid == $ex[0]) {bot('answerCallbackQuery',['callback_query_id'=>$update->callback_query->id,'text'=>$ex[2],'show_alert'=>true]);}if($cuser != $ex[0] or $cuser != $ex[1] or $cid != $ex[0]) {bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"الرساله مو الك لاتدخل 😕",'show_alert'=>true]);}}






$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$text = $message->text;
$namee = $update->callback_query->from->first_name;
$user = $message->from->username;
if(isset($update->callback_query)){
  $chat_id = $update->callback_query->message->chat->id;
  $message_id = $update->callback_query->message->message_id;
  $data  = $update->callback_query->data;
 $user = $update->callback_query->from->username;
}
$ex = explode("#",$data);
if($text == 'فيلم' || $text == 'افلام'){ bot('sendphoto',[ 'chat_id'=>$chat_id, photo =>"https://t.me/photojack14366/13", 'caption'=>'اختر الفيلم الذي تريده', 'parse_mode'=>"markdown",'disable_web_page_preview'=>true, "reply_markup"=>json_encode([ "inline_keyboard"=>[ [['text'=>' ديدو','callback_data'=>"aa1"],['text'=>' احمد نوتردام','callback_data'=>"aa2"]],[['text'=>' الانس والنمس','callback_data'=>"aa3"],['text'=>' العارف','callback_data'=>"aa4"]],[['text'=>' البعض لا يذهب للمأذون مرتين','callback_data'=>"aa5"],['text'=>' ثانيه واحده','callback_data'=>"aa6"]],[['text'=>' شاومينج','callback_data'=>"aa7"],['text'=>' مش انا','callback_data'=>"aa8"]],[['text'=>' قبل الاربعين','callback_data'=>"aa9"],['text'=>' صاحب المقام','callback_data'=>"aa10"]],[['text'=>' حرب كرموز','callback_data'=>"aa11"],['text'=>' حمله فرعون','callback_data'=>"aa12"]],[['text'=>' الضيف','callback_data'=>"aa13"],['text'=>' زوج تحت الطلب','callback_data'=>"aa14"]],[['text'=>' نوم التلات','callback_data'=>"aa15"],['text'=>' قلب امه','callback_data'=>"aa16"]],[['text'=>' ليل خارجي','callback_data'=>"aa17"],['text'=>' الكيلو 300','callback_data'=>"aa18"]],[['text'=>' الحارث','callback_data'=>"aa19"],['text'=>' خط دم','callback_data'=>"aa20"]],[['text'=>' اسف علي الازعاج','callback_data'=>"aa21"],['text'=>' القرموطي في ارض النار','callback_data'=>"aa22"]],[['text'=>' البس علشان خارجين','callback_data'=>"aa23"],['text'=>' حمله فريزر','callback_data'=>"aa24"]],[['text'=>' 𝐍𝐄𝐗𝐓','callback_data'=>"aaa1"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]], ]])]);}
if($data == "aaa" ){bot('EditMessageCaption',['chat_id'=>$chat_id, 'message_id'=>$message_id, photo =>"https://t.me/photojack14366/13",'caption'=>'اختر الفيلم الذي تريده','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ديدو','callback_data'=>"aa1"],['text'=>' احمد نوتردام','callback_data'=>"aa2"]],[['text'=>' الانس والنمس','callback_data'=>"aa3"],['text'=>' العارف','callback_data'=>"aa4"]],[['text'=>' البعض لا يذهب للمأذون مرتين','callback_data'=>"aa5"],['text'=>' ثانيه واحده','callback_data'=>"aa6"]],[['text'=>' شاومينج','callback_data'=>"aa7"],['text'=>' مش انا','callback_data'=>"aa8"]],[['text'=>' قبل الاربعين','callback_data'=>"aa9"],['text'=>' صاحب المقام','callback_data'=>"aa10"]],[['text'=>' حرب كرموز','callback_data'=>"aa11"],['text'=>' حمله فرعون','callback_data'=>"aa12"]],[['text'=>' الضيف','callback_data'=>"aa13"],['text'=>' زوج تحت الطلب','callback_data'=>"aa14"]],[['text'=>' نوم التلات','callback_data'=>"aa15"],['text'=>' قلب امه','callback_data'=>"aa16"]],[['text'=>' ليل خارجي','callback_data'=>"aa17"],['text'=>' الكيلو 300','callback_data'=>"aa18"]],[['text'=>' الحارث','callback_data'=>"aa19"],['text'=>' خط دم','callback_data'=>"aa20"]],[['text'=>' اسف علي الازعاج','callback_data'=>"aa21"],['text'=>' القرموطي في ارض النار','callback_data'=>"aa22"]],[['text'=>' البس علشان خارجين','callback_data'=>"aa23"],['text'=>' حمله فريزر','callback_data'=>"aa24"]],[['text'=>' 𝐍𝐄𝐗𝐓','callback_data'=>"aaa1"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "aaa1" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/13",'caption'=>'اختر الفيلم الذي تريده','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' صاحب المقام','callback_data'=>"aa39"],['text'=>' الخطه العالميه','callback_data'=>"aa40"]],[['text'=>' بيت ست','callback_data'=>"aa41"],['text'=>' الشبح','callback_data'=>"aa42"]],[['text'=>' موسي','callback_data'=>"aa43"],['text'=>' للإيجار','callback_data'=>"aa44"]],[['text'=>' فيلم 200 جنيه','callback_data'=>"aa45"],['text'=>' ماما حامل','callback_data'=>"aa46"]],[['text'=>' ماكو','callback_data'=>"aa47"],['text'=>' عروستي','callback_data'=>"aa48"]],[['text'=>' سطو مثلث','callback_data'=>"aa25"],['text'=>' خلاويص','callback_data'=>"aa26"]],[['text'=>' الخروج عن النص','callback_data'=>"aa27"],['text'=>' المشبوه','callback_data'=>"aa28"]],[['text'=>' نمس بوند','callback_data'=>"aa29"],['text'=>' الفلاحين اهم','callback_data'=>"aa30"]],[['text'=>' حمله فرعون','callback_data'=>"aa31"],['text'=>' محمد حسين','callback_data'=>"aa32"]],[['text'=>' عيار ناري','callback_data'=>"aa33"],['text'=>' خيال مأته','callback_data'=>"aa34"]],[['text'=>' الممر','callback_data'=>"aa35"],['text'=>' فيلم 122','callback_data'=>"aa36"]],[['text'=>' سبع البرمبه','callback_data'=>"aa37"],['text'=>' الغساله','callback_data'=>"aa38"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aaa"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "aa1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/4",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",'reply_to_message_id' =>$message->message_id,
]);}
if($data == "aa2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/5",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/9",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/13",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/14",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/15",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/16",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
 'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/17",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/18",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa10"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/19",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa11"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/20",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa12"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/21",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa13"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/22",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
 'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa14"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/23",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa15"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/24",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa16"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/25",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa17"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/26",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa18"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/27",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa19"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/28",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
 'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa20"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/29",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa21"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/30",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa22"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/31",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa23"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/32",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa24"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/33",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa25"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/34",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
 'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa26"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/35",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa27"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/36",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa28"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/37",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa29"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/38",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa30"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/39",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa31"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/40",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
 'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa32"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/41",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa33"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/42",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa34"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/43",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa35"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/44",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa36"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/45",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa37"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/46",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa38"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/47",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa39"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/87",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa40"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/88",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa41"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/89",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa42"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/150",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa43"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/151",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa44"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/152",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa45"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/153",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa46"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/154",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa47"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/155",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "aa48"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/156",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($text == 'مسلسلات' || $text == 'المسلسلات'){ bot('sendphoto',['chat_id'=>$chat_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر المسلسل الذي تريده', 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' لعبه الحبار','callback_data'=>"ab"],['text'=>' موسي','callback_data'=>"ac"]],[['text'=>' النمر','callback_data'=>"ad"],['text'=>' ملوك الجدعنه','callback_data'=>"ae"]],[['text'=>' ملوك الجدعنه','callback_data'=>"am"],['text'=>' لوسفير','callback_data'=>"an"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "bbb" ){bot('EditMessageCaption',['chat_id'=>$chat_id,'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر المسلسل الذي تريده','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' لعبه الحبار','callback_data'=>"ab"],['text'=>' موسي','callback_data'=>"ac"]],[['text'=>' النمر','callback_data'=>"ad"],['text'=>' ملوك الجدعنه','callback_data'=>"ae"]],[['text'=>' ملوك الجدعنه','callback_data'=>"am"],['text'=>' لوسفير','callback_data'=>"an"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ab" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"ab1"],['text'=>' 2','callback_data'=>"ab2"]],[['text'=>' 3','callback_data'=>"ab3"],['text'=>' 4','callback_data'=>"ab4"]],[['text'=>' 5','callback_data'=>"ab5"],['text'=>' 6','callback_data'=>"ab6"]],[['text'=>' 7','callback_data'=>"ab7"],['text'=>' 8','callback_data'=>"ab8"]],[['text'=>' 9','callback_data'=>"ab9"],['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"bbb"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ab1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/48",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/49",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/50",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/51",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/52",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/53",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/54",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/55",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ab9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/56",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"ac1"],['text'=>' 2','callback_data'=>"ac2"]],[['text'=>' 3','callback_data'=>"ac3"],['text'=>' 4','callback_data'=>"ac4"]],[['text'=>' 5','callback_data'=>"ac5"],['text'=>' 6','callback_data'=>"ac6"]],[['text'=>' 7','callback_data'=>"ac7"],['text'=>' 8','callback_data'=>"ac8"]],[['text'=>' 9','callback_data'=>"ac9"],['text'=>' 10','callback_data'=>"ac10"]],[['text'=>' 11','callback_data'=>"ac11"],['text'=>' 12','callback_data'=>"ac12"]],[['text'=>' 13','callback_data'=>"ac13"],['text'=>' 14','callback_data'=>"ac14"]],[['text'=>' 15','callback_data'=>"ac15"],['text'=>' 16','callback_data'=>"ac16"]],[['text'=>' 17','callback_data'=>"ac17"],['text'=>' 18','callback_data'=>"ac18"]],[['text'=>' 19','callback_data'=>"ac19"],['text'=>' 20','callback_data'=>"ac20"]],[['text'=>' 21','callback_data'=>"ac21"],['text'=>' 22','callback_data'=>"ac21"]],[['text'=>' 23','callback_data'=>"ac23"],['text'=>' 24','callback_data'=>"ac24"]],[['text'=>' 25','callback_data'=>"ac25"],['text'=>' 26','callback_data'=>"ac26"]],[['text'=>' 27','callback_data'=>"ac27"],['text'=>' 28','callback_data'=>"ac28"]],[['text'=>' 29','callback_data'=>"ac29"],['text'=>' 30','callback_data'=>"ac30"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"bbb"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ac1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/57",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/58",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/59",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/60",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/61",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/62",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/63",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/64",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/65",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac10"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/66",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac11"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/67",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac12"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/67",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac13"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/69",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac14"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/70",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac15"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/71",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac16"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/72",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac17"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/73",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac18"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/74",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac19"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/75",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac20"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/76",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac21"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/77",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac22"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/78",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac23"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/80",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac24"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/79",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac25"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/81",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac26"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/82",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac27"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/83",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac28"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/84",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac29"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/85",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ac30"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/86",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"ad1"],['text'=>' 2','callback_data'=>"ad2"]],[['text'=>' 3','callback_data'=>"ad3"],['text'=>' 4','callback_data'=>"ad4"]],[['text'=>' 5','callback_data'=>"ad5"],['text'=>' 6','callback_data'=>"ad6"]],[['text'=>' 7','callback_data'=>"ad7"],['text'=>' 8','callback_data'=>"ad8"]],[['text'=>' 9','callback_data'=>"ad9"],['text'=>' 10','callback_data'=>"ad10"]],[['text'=>' 11','callback_data'=>"ad11"],['text'=>' 12','callback_data'=>"ad12"]],[['text'=>' 13','callback_data'=>"ad13"],['text'=>' 14','callback_data'=>"ad14"]],[['text'=>' 15','callback_data'=>"ad15"],['text'=>' 16','callback_data'=>"ad16"]],[['text'=>' 17','callback_data'=>"ad17"],['text'=>' 18','callback_data'=>"ad18"]],[['text'=>' 19','callback_data'=>"ad19"],['text'=>' 20','callback_data'=>"ad20"]],[['text'=>' 21','callback_data'=>"ad21"],['text'=>' 22','callback_data'=>"ad21"]],[['text'=>' 23','callback_data'=>"ad23"],['text'=>' 24','callback_data'=>"ad24"]],[['text'=>' 25','callback_data'=>"ad25"],['text'=>' 26','callback_data'=>"ad26"]],[['text'=>' 27','callback_data'=>"ad27"],['text'=>' 28','callback_data'=>"ad28"]],[['text'=>' 29','callback_data'=>"ad29"],['text'=>' 30','callback_data'=>"ad30"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"bbb"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ad1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/90",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/91",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/92",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/93",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/94",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/95",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/96",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/97",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/98",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad10"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/99",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad11"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/100",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad12"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/101",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad13"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/102",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad14"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/103",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad15"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/104",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad16"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/105",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad17"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/106",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad18"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/107",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad19"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/108",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad20"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/109",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad21"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/110",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad22"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/111",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad23"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/112",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad24"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/113",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad25"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/114",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad26"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/115",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad27"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/116",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad28"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/117",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad29"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/118",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ad30"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/119",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"ae1"],['text'=>' 2','callback_data'=>"ae2"]],[['text'=>' 3','callback_data'=>"ae3"],['text'=>' 4','callback_data'=>"ae4"]],[['text'=>' 5','callback_data'=>"ae5"],['text'=>' 6','callback_data'=>"ae6"]],[['text'=>' 7','callback_data'=>"ae7"],['text'=>' 8','callback_data'=>"ae8"]],[['text'=>' 9','callback_data'=>"ae9"],['text'=>' 10','callback_data'=>"ae10"]],[['text'=>' 11','callback_data'=>"ae11"],['text'=>' 12','callback_data'=>"ae12"]],[['text'=>' 13','callback_data'=>"ae13"],['text'=>' 14','callback_data'=>"ae14"]],[['text'=>' 15','callback_data'=>"ae15"],['text'=>' 16','callback_data'=>"ae16"]],[['text'=>' 17','callback_data'=>"ae17"],['text'=>' 18','callback_data'=>"ae18"]],[['text'=>' 19','callback_data'=>"ae19"],['text'=>' 20','callback_data'=>"ae20"]],[['text'=>' 21','callback_data'=>"ae21"],['text'=>' 22','callback_data'=>"ae21"]],[['text'=>' 23','callback_data'=>"ae23"],['text'=>' 24','callback_data'=>"ae24"]],[['text'=>' 25','callback_data'=>"ae25"],['text'=>' 26','callback_data'=>"ae26"]],[['text'=>' 27','callback_data'=>"ae27"],['text'=>' 28','callback_data'=>"ae28"]],[['text'=>' 29','callback_data'=>"ae29"],['text'=>' 30','callback_data'=>"ae30"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"bbb"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ae1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/120",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/121",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/122",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/123",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/124",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/125",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/126",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/127",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/128",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae10"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/129",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae11"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/130",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae12"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/131",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae13"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/132",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae14"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/133",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae15"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/134",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae16"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/135",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae17"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/136",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae18"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/137",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae19"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/138",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae20"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/139",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae21"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/140",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae22"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/141",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae23"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/142",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae24"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/143",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae25"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/144",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae26"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/145",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae27"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/146",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae28"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/147",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae29"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/148",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "ae30"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/149",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "am" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"hk1"],['text'=>' 2','callback_data'=>"hk2"]],[['text'=>' 3','callback_data'=>"hk3"],['text'=>' 4','callback_data'=>"hk4"]],[['text'=>' 5','callback_data'=>"hk5"],['text'=>' 6','callback_data'=>"hk6"]],[['text'=>' 7','callback_data'=>"hk7"],['text'=>' 8','callback_data'=>"hk8"]],[['text'=>' 9','callback_data'=>"hk9"],['text'=>' 10','callback_data'=>"hk10"]],[['text'=>' 11','callback_data'=>"hk11"],['text'=>' 12','callback_data'=>"hk12"]],[['text'=>' 13','callback_data'=>"hk13"],['text'=>' 14','callback_data'=>"hk14"]],[['text'=>' 15','callback_data'=>"hk15"],['text'=>' 16','callback_data'=>"hk16"]],[['text'=>' 17','callback_data'=>"hk17"],['text'=>' 18','callback_data'=>"hk18"]],[['text'=>' 19','callback_data'=>"hk19"],['text'=>' 20','callback_data'=>"hk20"]],[['text'=>' 21','callback_data'=>"hk21"],['text'=>' 22','callback_data'=>"hk21"]],[['text'=>' 23','callback_data'=>"hk23"],['text'=>' 24','callback_data'=>"hk24"]],[['text'=>' 25','callback_data'=>"hk25"],['text'=>' 26','callback_data'=>"hk26"]],[['text'=>' 27','callback_data'=>"hk27"],['text'=>' 28','callback_data'=>"hk28"]],[['text'=>' 29','callback_data'=>"hk29"],['text'=>' 30','callback_data'=>"hk30"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"bbb"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "hk1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/300",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/301",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/302",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/303",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/304",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/305",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/306",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/307",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/308",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk10"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/309",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk11"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/310",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk12"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/311",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk13"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/312",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk14"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/313",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk15"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/314",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk16"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/315",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk17"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/316",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk18"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/317",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk19"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/318",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk20"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/319",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk21"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/320",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk22"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/321",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk23"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/322",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk24"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/323",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk25"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/324",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk26"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/325",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk27"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/326",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk28"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/327",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk29"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/328",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hk30"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/329",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "an" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر المسلسل الذي تريده','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' الموسم الاول','callback_data'=>"xc"],['text'=>' الموسم الثاني ','callback_data'=>"xv"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "xc" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"hl1"],['text'=>' 2','callback_data'=>"hl2"]],[['text'=>' 3','callback_data'=>"hl3"],['text'=>' 4','callback_data'=>"hl4"]],[['text'=>' 5','callback_data'=>"hl5"],['text'=>' 6','callback_data'=>"hl6"]],[['text'=>' 7','callback_data'=>"hl7"],['text'=>' 8','callback_data'=>"hl8"]],[['text'=>' 9','callback_data'=>"hl9"],['text'=>' 10','callback_data'=>"hl10"]],[['text'=>' 11','callback_data'=>"hl11"],['text'=>' 12','callback_data'=>"hl12"]],[['text'=>' 13','callback_data'=>"hl13"],['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"an"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "xv" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/12",'caption'=>'اختر الحلقه الذي تريدها','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"hl14"],['text'=>' 2','callback_data'=>"hl15"]],[['text'=>' 3','callback_data'=>"hl16"],['text'=>' 4','callback_data'=>"hl17"]],[['text'=>' 5','callback_data'=>"hl18"],['text'=>' 6','callback_data'=>"hl19"]],[['text'=>' 7','callback_data'=>"hl20"],['text'=>' 8','callback_data'=>"hl21"]],[['text'=>' 9','callback_data'=>"hl21"],['text'=>' 10','callback_data'=>"hl23"]],[['text'=>' 11','callback_data'=>"hl24"],['text'=>' 12','callback_data'=>"hl25"]],[['text'=>' 13','callback_data'=>"hl26"],['text'=>' 14','callback_data'=>"hl27"]],[['text'=>' 15','callback_data'=>"hl28"],['text'=>' 16','callback_data'=>"hl29"]],[['text'=>' 17','callback_data'=>"hl30"],['text'=>' 18','callback_data'=>"hl31"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"an"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "hl1"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/269",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl2"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/270",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl3"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/271",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl4"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/272",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl5"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/273",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl6"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/274",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl7"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/275",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl8"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/276",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl9"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/277",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl10"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/278",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl11"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/279",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl12"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/280",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl13"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/281",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl14"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/282",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl15"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/283",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl16"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/284",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl17"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/285",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl18"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/286",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl19"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/287",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl20"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/288",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl21"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/289",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl22"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/290",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl23"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/291",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl24"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/292",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl25"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/293",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl26"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/294",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl27"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/295",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl28"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/296",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl29"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/297",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl30"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/298",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "hl31"){bot('sendvideo',['chat_id'=>$chat_id,'message_id'=>$message_id,'video'=>"https://t.me/pbkvhvif/299",'caption'=>"❍ 𝐂𝐇 ➢ : @J_F_A_I 
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➢ @$user",
'reply_to_message_id' =>$message->message_id, ]);}
if($data == "dell"){bot('deleteMessage',['chat_id'=>$chat_id,'message_id'=>$message_id,]);bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"❍ تم الحذف بواسطه :
 ❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2 
❍ 𝑼𝑺𝑬𝑹 ➢ @$user ",
'reply_to_message_id'=>$message->message_id,]);}
if($text == 'هاي' || $text == 'باي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"العب تراي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'يسطا' || $text == 'بقولك'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اي يحب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'رخم' || $text == 'بيض'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"حب الناس ", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'انا جيت' || $text == 'جيت'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"قمر التيلي وصل", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بس'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بس قلبي دااااب من كتر الغياب اععع", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'مخنوق' || $text == 'متضايق'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"لي بس احكيلي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بحبك' || $text == 'متيجي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ايدا بالسرعه دي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'حبك' || $text == 'متيقي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ايدا بالسرعه دي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'السلام عليكم' || $text == 'السلام عليكم ورحمه الله وبركاته'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"وعليكم السلام ورحمه الله وبركاته ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هقفل' || $text == 'همشي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مشبعتش منك علي فكره ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'عامل اي' || $text == 'شخبارك'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"انا تمام انتا تمام ?", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اخبارك اي' || $text == 'اشلونك'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"انا تمام انت تمام ?", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اه تمام'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"قول الحمد لله ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لا مش تمام' || $text == 'مش تمام'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"قول يارب وكل حاجه هتتحل انشاء الله", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'يارب' || $text == 'امين يارب'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اللهم امين", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'امين'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اللهم امين", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ادعيلي' || $text == 'ادعي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ربنا يصلح حالك ويروق بالك يارب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ادعي بس'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ربنا يصلح حالك ويروق بالك يارب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'قول يارب'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"يارب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'حاضر'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"حضرلك الطيب يارب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'سي في' || $text == 'سيفي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اسمي امونه ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'عيط'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بعيط صالحوني هالحين", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'الاه' || $text == 'ايدا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ويييي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ايتا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ايش", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ايش'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"جبنه بعيش", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هاخد'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"لول تع اديك اعععع", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'سيرفر' || $text == 'استضافه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"غني وبتصرف فلوسك علي التفاهه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'رد' || $text == 'مترد'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مش هرد هه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'جاري'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"جاري جااري في المجاري وييي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ويييي' || $text == 'عنننن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اركب اعبدو بيب بيب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'وييييي' || $text == 'عننننن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اركب اعبدو بيب بيب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ويييييي' || $text == 'عنننننن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اركب اعبدو بيب بيب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'وييي' || $text == 'عننن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اركب اعبدو بيب بيب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ويي' || $text == 'عنن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اركب اعبدو بيب بيب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'وي' || $text == 'عن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اركب اعبدو بيب بيب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بموت' || $text == 'هموت'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بعدالشر يروحي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بفطس' || $text == 'همت'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بعد الشر يقمري", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ضحك' || $text == 'ضحكني'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"حصل", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ضحكت'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"حصل", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'نورت' || $text == 'نورتي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"لا بنورك ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تسلم' || $text == 'تسلمي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"علي اي دي حاجه بسيطه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تصبح علي خير' || $text == 'تصبحي علي خير'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"وانتا من اهلي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تصبحو علي خير'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"وانتا من اهلي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تصبحون علي خير'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"وانت من اهلي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'محن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"سيب العيال تلعب", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'عارف'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"يبختك انا معرفش", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اضافه وباك' || $text == 'اضافه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ابعت مسدج خاص ولو محظور متخفش رسالتك هتوصل", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'حوار' || $text == 'مشكله'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مين بيندب مين", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'وه' || $text == 'وهه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"الاه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'وههه' || $text == 'وهههه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"الاه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'يبرو'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"قلب البرو من جوهه ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اوك' || $text == 'اشطا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اتفقنا يزميكس", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هت' || $text == 'هات'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"تع بف", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ضيف' || $text == 'بجمع'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ابعت مسدج خاص بس اول ولو محظور متخفش الرساله هتوصل", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بجمع جهات' || $text == 'سجلني وقول ضن'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ابعت رساله خاص كدا اول ولو محظور الرساله هتوصلي برضو", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'محظور' || $text == 'محظور'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"سجلتك ابعت خاص", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ابعت انت' || $text == 'ابعتي انت'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"سجلتك ابعت خاص", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ابعت انت انا محظور' || $text == 'ابعتي انتي انا محظور'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"سجلتك ابعت خاص", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'ابعتي انتي انا محظور' || $text == 'ابعت انت انا محطوزه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"سجلتك ابعت خاص", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'يمزه' || $text == 'مزه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"قلبها ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بت' || $text == 'يا بت'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"قلبها ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اخويا' || $text == 'اختي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ربنا يديم المحبه يارب ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اهلا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"يبك يحبي ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'عادي' || $text == 'عادي والله'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ريلي ?", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لاف' || $text == 'لاف يو'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مي تو ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لافيو' || $text == 'لاف يوه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مي تو ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لاف ♥' || $text == 'لاف يو ♥'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مي تو ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لافيو ♥' || $text == 'لاف يوه ♥'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مي تو ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لاف♥' || $text == 'لاف يو♥'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مي تو ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لافيو♥' || $text == 'لاف يوه♥'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"مي تو ♥", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'حصلخير' || $text == 'حصل خير'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اشطا", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'عع' || $text == 'ععع'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"الاه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'عععع' || $text == 'ععععع'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"الاه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هذا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"هذه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هذه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"هذا", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تشغيل'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اشتغل يواد", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تع' || $text == 'تعال'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ضيفني واديني رول", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تع باري' || $text == 'تعال باري'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ضيفني واديني رول", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تع رومي' || $text == 'تعال رومي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ضيفني واديني رول", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تع البار' || $text == 'تع الروم'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ضيفني واديني رول", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'خره' || $text == 'زربه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"علي دماغك ", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'خرا' || $text == 'خري'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"علي دماغك", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'شكرا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"العفو", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == '.'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ابعت كمان واحده يعني خليهم ..", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == '..'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"ابعت كمان واحده يقمر يعني خليهم ...", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == '...'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"شاطر حطهم في طيزك بقا 🙈🙊💋", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هفشخك' || $text == 'هنيكك'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"عيب يسطا احترموني يا بشر", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هزنقق' || $text == 'هجيب منك عيال'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"يبني عيب يبني", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'افتح كول' || $text == 'افتحي كول'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"تدفع كام ?", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'اطلع الكول' || $text == 'اطلعي الكول'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"حاضر", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بتحبني' || $text == 'بتعزني'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اه", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تع نتجوز' || $text == 'تعي نتجوز'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اوك", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'تع نتقوز' || $text == 'تعي نتقوز'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اوك", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'انت منين' || $text == 'انتي منين'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"دمياط", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'سي في' || $text == 'سيفي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"العب تراي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'cv' || $text == 'cV'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بوت جامد علي سورس بلاك اجمد سورس في التيلي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'Cv' || $text == 'CV'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بوت جامد علي سورس بلاك اجمد سورس في التلي", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'حكاك' || $text == 'حكاكه'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"محصلش", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'انا'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اعوذ بالله من كلمه انا", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'هو' || $text == 'هي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"بعتني بكام يا عشري", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'لو' || $text == 'هو'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"سورس بلاك واكل الجو", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'بتبوتي' || $text == 'يا بتبوتي'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اي يا قلب بتبوتك", 'reply_to_message_id'=>$message->message_id, ]); }
if($text == 'مم' || $text == 'اي يا عمري'){ bot('sendMessage',[ 'chat_id'=>$chat_id,'message_id'=>$message_id,  'text'=>"اي يا قلب بتبوتك", 'reply_to_message_id'=>$message->message_id, ]); }

if($text == 'لو خيروك'){ bot('sendMessage',[ 'chat_id'=>$chat_id,  'text'=>"لعبه لو خيروك ولن يستطيع احد ان يعرف اختيارك بسبب الخصوصيه الشخصيه لديك", 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"ابدء",'callback_data'=>"low1"]],]])]);}
if($data == "low" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لعبه لو خيروك ولن يستطيع احد ان يعرف اختيارك بسبب الخصوصيه الشخصيه لديك','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"ابدء",'callback_data'=>"low1"]],]])]);}
if($data == "low1" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تبقي انسان ولا حيوان',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"انسان",'callback_data'=>"low2"],['text'=>"حيوان",'callback_data'=>"low2"]],]])]);}
if($data == "low2" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
ما بين شخص بتحبه وشخص بتحن له ',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"اللي بحبه",'callback_data'=>"low3"],['text'=>"اللي بحن له",'callback_data'=>"low3"]],]])]);}
if($data == "low3" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تضل في بلدك ولا تسافر',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"اضل ببلدي",'callback_data'=>"low4"],['text'=>"اسافر",'callback_data'=>"low4"]],]])]);}
if($data == "low4" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تكون شخص ناجح بس فقير او شخص فاشل بس غني',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"ناجح",'callback_data'=>"low5"],['text'=>"فاشل",'callback_data'=>"low5"]],]])]);}
if($data == "low5" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
ما بين بابا او ماما تختار مين',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"بابا",'callback_data'=>"low6"],['text'=>"ماما",'callback_data'=>"low6"]],]])]);}
if($data == "low6" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تاكل خفاش ولا تخسر حياه شخص بتحبه ايهما تختار ¿ ',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الخفاش",'callback_data'=>"low7"],['text'=>"يموت عادي",'callback_data'=>"low7"]],]])]);}
if($data == "low7" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تروح لمهندس مباني وتقوله عاوز ابني مستقبلي ولا تروح لدكتور وتقوله كيلو الخيار بكام ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"المهندس",'callback_data'=>"low8"],['text'=>"الدكتور",'callback_data'=>"low8"]],]])]);}
if($data == "low8" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تمشي علي جمر والع ولا تدي الهاتف ل اهلك يوم كامل ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الجمر",'callback_data'=>"low9"],['text'=>"الهاتف",'callback_data'=>"low9"]],]])]);}
if($data == "low9" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
البقاء مدى الحياة مع أخيك أو البقاء مدى الحياة مع حبيبك تختار مين',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"اخي",'callback_data'=>"low10"],['text'=>"حبيبي",'callback_data'=>"low10"]],]])]);}
if($data == "low10" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
إعطاء هدية باهظة الثمن لفرد من أفراد أسرتك تعطي او لا',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"اعطي",'callback_data'=>"low11"],['text'=>"لا",'callback_data'=>"low11"]],]])]);}
if($data == "low11" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الذكاء أو الثراء ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الذكا۽",'callback_data'=>"low12"],['text'=>"الثراء",'callback_data'=>"low12"]],]])]);}
if($data == "low12" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الشهادة الجامعية أو السفر حول العالم ايهما تختار ¿  ',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الشهادة",'callback_data'=>"low13"],['text'=>"السفر",'callback_data'=>"low13"]],]])]);}
if($data == "low13" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الزواج من شخص تحبه أو شخص سيحقق لك جميع أحلامك تختار مين',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الذي احبه",'callback_data'=>"low14"],['text'=>"محقق احلامي",'callback_data'=>"low14"]],]])]);}
if($data == "low14" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الزواج عن حب أو الزواج التقليدي ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"حب",'callback_data'=>"low15"],['text'=>"تقليدي",'callback_data'=>"low15"]],]])]);}
if($data == "low15" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الحب أو المال ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الحب",'callback_data'=>"low16"],['text'=>"المال",'callback_data'=>"low16"]],]])]);}
if($data == "low16" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الحب او الوظيفه المرموقة ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الحب",'callback_data'=>"low17"],['text'=>"الوظيفه",'callback_data'=>"low17"]],]])]);}
if($data == "low17" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الزواج من شخص في عمرك فقير أو شخص يكبرك بعشرين عام غني ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الفقير",'callback_data'=>"low18"],['text'=>"الغني",'callback_data'=>"low18"]],]])]);}
if($data == "low18" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
وفاة حبيبك أو الزواج من شخص بتكرهه ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"وفاه حبيبي",'callback_data'=>"low19"],['text'=>"الزواج",'callback_data'=>"low19"]],]])]);}
if($data == "low19" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
قتل حبيبك أو قتل والدك ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"قتل حبيبي",'callback_data'=>"low20"],['text'=>"قتل والدي",'callback_data'=>"low20"]],]])]);}
if($data == "low20" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
سوبر مان أو سبايدر ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"سوبر مان",'callback_data'=>"low21"],['text'=>"سبايدر",'callback_data'=>"low21"]],]])]);}
if($data == "low21" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
التزحلق على الجليد أم تسلق الجبال ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الجليد",'callback_data'=>"low22"],['text'=>"الجبال",'callback_data'=>"low22"]],]])]);}
if($data == "low22" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الطبخ أو التنظيف ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الطبخ",'callback_data'=>"low23"],['text'=>"التنظيف",'callback_data'=>"low23"]],]])]);}
if($data == "low23" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الجلوس في بيت مسكون بالجن أو الخطف من قبل عصابة ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"البيت المسكون",'callback_data'=>"low24"],['text'=>"العصابه",'callback_data'=>"low24"]],]])]);}
if($data == "low24" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
رؤية الأشباح أو التعرض للقتل أيهما تختار',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الاشباح",'callback_data'=>"low25"],['text'=>"القتل",'callback_data'=>"low25"]],]])]);}
if($data == "low25" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الفتاة الهادئة أو الفتاة الجريئة ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"اسويها",'callback_data'=>"low26"],['text'=>"ما اسويها",'callback_data'=>"low26"]],]])]);}
if($data == "low26" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الحصول على الطعام الذي تحبه مدى الحياة، أو الحصول على درجة علمية تقودك إلى مكانة مرموقة لكن لن تأكل ما تحبه ماذا تختار؟',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الطعام",'callback_data'=>"low27"],['text'=>"المكانه المرموقه",'callback_data'=>"low27"]],]])]);}
if($data == "low27" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن يصبح العالم ذو درجة حرارة باردة قريبة من التجمد، أو أن يصبح حار للغاية أيهما تختار؟',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"بارد",'callback_data'=>"low28"],['text'=>"حار",'callback_data'=>"low28"]],]])]);}
if($data == "low28" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
العيش وحدك في جزيرة كبيرة منعزلة مع أكبر درجات الرفاهية وبين العيش في مكان قديم ولكن مع أصدقائك المقربين ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الجزيره",'callback_data'=>"low29"],['text'=>"المكان القديم",'callback_data'=>"low29"]],]])]);}
if($data == "low29" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
فقدان ذاكرتك والعيش مع أصدقائك وأقربائك أو بقاء ذاكرتك ولكن العيش وحيد ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"فقدان ذاكرتك",'callback_data'=>"low30"],['text'=>"بقاء ذاكرتك",'callback_data'=>"low30"]],]])]);}
if($data == "low30" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تناول الخضار والفاكهة طوال حياتك أو تناول اللحوم ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الخضار والفاكهه",'callback_data'=>"low31"],['text'=>"اللحوم",'callback_data'=>"low31"]],]])]);}
if($data == "low31" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
رؤية الأشباح فقط أو سماع صوتها فقط ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الرؤيه",'callback_data'=>"low32"],['text'=>"سماعها",'callback_data'=>"low32"]],]])]);}
if($data == "low32" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
القدرة على سماع أفكار الناس أو القدرة على العودة في الزمن للخلف ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"السماع",'callback_data'=>"low33"],['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"low33"]],]])]);}
if($data == "low33" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
القدرة على الاختفاء أو القدرة على الطيران ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الاختفاء",'callback_data'=>"low34"],['text'=>"الطيران",'callback_data'=>"low34"]],]])]);}
if($data == "low34" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
5 ملايين دولار أو 5 ملايين لحظة سعادة حقيقية ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الدولارات",'callback_data'=>"low35"],['text'=>"اللحظات السعيده",'callback_data'=>"low35"]],]])]);}
if($data == "low35" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
إنقاذ نفسك أو إنقاذ شخص وقد يعرضك ذلك للأذى ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"نفسي",'callback_data'=>"low36"],['text'=>"الشخص",'callback_data'=>"low36"]],]])]);}
if($data == "low36" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
إفشاء سر أحد أعز أصدقائك، وبين مليون دولار ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"اسويها",'callback_data'=>"low37"],['text'=>"ما اسويها",'callback_data'=>"low37"]],]])]);}
if($data == "low37" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن تنافق شخص لا تحبه لكي تحصل على فرصة عمل، أو لا تحصل عليها بلا نفاق ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"انافق",'callback_data'=>"low38"],['text'=>"لا احصل عليها",'callback_data'=>"low38"]],]])]);}
if($data == "low38" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
امتلاك شعر بني أو أسود ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"بني",'callback_data'=>"low39"],['text'=>"اسود",'callback_data'=>"low39"]],]])]);}
if($data == "low39" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
الزبادي المثلج أو الآيس كريم ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الزبادي",'callback_data'=>"low40"],['text'=>"الايس كريم",'callback_data'=>"low40"]],]])]);}
if($data == "low40" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
تفقد القدرة على القراءة أم تفقد القدرة على الكلام ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"القراءه",'callback_data'=>"low41"],['text'=>"الكلام",'callback_data'=>"low41"]],]])]);}
if($data == "low41" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن تكون جميع الفصول شتاء أم صيف ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"شتا۽",'callback_data'=>"low42"],['text'=>"صيف",'callback_data'=>"low42"]],]])]);}
if($data == "low42" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
المال أم الشهرة بلا مال ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"المال",'callback_data'=>"low43"],['text'=>"الشهره",'callback_data'=>"low43"]],]])]);}
if($data == "low43" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
حضور مباراة كرة قدم أو عرض أزياء ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"المباراه",'callback_data'=>"low44"],['text'=>"العرض",'callback_data'=>"low44"]],]])]);}
if($data == "low44" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن تضغ زر اعاده حياتك أو زر إيقاف مؤقت في حياتك ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"الاعاده",'callback_data'=>"low45"],['text'=>"الٳيقاف",'callback_data'=>"low45"]],]])]);}
if($data == "low45" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
السفر إلى مكان بعيد جدًا لشهر العسل، أم البقاء في بلدك مع الأهل والأصدقاء ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"السفر",'callback_data'=>"low46"],['text'=>"البقا۽",'callback_data'=>"low46"]],]])]);}
if($data == "low46" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن تكون فقيرًا وتعمل في وظيفة تحبها ، أو غنية وتعمل في وظيفة تكرهها ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"فقير",'callback_data'=>"low47"],['text'=>"غني",'callback_data'=>"low47"]],]])]);}
if($data == "low47" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
قضاء ليلة في بيت مسكون أو في جزيرة مهجورة ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"البيت المسكون",'callback_data'=>"low48"],['text'=>"الجزيره المهجوره",'callback_data'=>"low48"]],]])]);}
if($data == "low48" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن تذهب في رحلة إلى جوف الأرض أو رحلة إلى العالم المفقود ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"جوف الارض",'callback_data'=>"low49"],['text'=>"العالم المفقود",'callback_data'=>"low49"]],]])]);}
if($data == "low49" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
القهوة أم الشاي ايهما تختار ¿',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"القهوه",'callback_data'=>"low50"],['text'=>"الشاي",'callback_data'=>"low50"]],]])]);}
if($data == "low50" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'لو خيروك بين :
أن تتزوج من تحب في السر، أو تتزوج من لا تحب علنًا ايهما تختار ¿', 
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>"من احب",'callback_data'=>"low51"],['text'=>"من لا احبه",'callback_data'=>"low51"]],]])]);}
if($data == "low51" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'خلصت اللعبه 
تم كتابتها بواسطه المبرمج جاك 🖤',
'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'︙𝐷𝐸𝑉 >> 🖤 𝑱𝑨𝑪𝑲 🖤','url'=>'https://t.me/V_P_E'],['text'=>"العب مره اخري",'callback_data'=>"low1"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($text == 'العاب ق'){ bot('sendMessage',['chat_id'=>$chat_id,'text'=>'اختر اللعبه الذي تريدها', 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>  "لعبة فلابي بيرد 🐥"  ,'url'=>'https://t.me/awesomebot?game=FlappyBird'],['text'=>"تحداني فالرياضيات 🔢",'url'=>'https://t.me/gamebot?game=MathBattle']],[['text'=>"تحداني في ❌⭕️",'url'=>'t.me/Xo_motazbot?start3836619'],['text'=>"سباق الدراجات 🏍",'url'=>'https://t.me/gamee?game=MotoFX']],[['text'=>"سباق سيارات 🏎",'url'=>'https://t.me/gamee?game=F1Racer'],['text'=>"متشابه 👾",'url'=>'https://t.me/gamee?game=DiamondRows']],[['text'=>"كرة قدم ⚽",'url'=>'https://t.me/gamee?game=FootballStar']],[['text'=>"دومنا🥇",'url'=>'https://vipgames.com/play/?affiliateId=wpDom/#/games/domino/lobby'],['text'=>"❕ليدو",'url'=>'https://vipgames.com/play/?affiliateId=wpVG#/games/ludo/lobby']],[['text'=>"ورق🤹‍♂",'url'=>'https://t.me/gamee?game=Hexonix'],['text'=>"Hexonix❌",'url'=>'https://t.me/gamee?game=Hexonix']],[['text'=>"MotoFx🏍️",'url'=>'https://t.me/gamee?game=MotoFx']],[['text'=>"لعبة 2048 🎰",'url'=>'https://t.me/awesomebot?game=g2048'],['text'=>"Squares🏁",'url'=>'https://t.me/gamee?game=Squares']],[['text'=>"Atomic 1▶️",'url'=>'https://t.me/gamee?game=AtomicDrop1'],['text'=>"Corsairs",'url'=>'https://t.me/gamebot?game=Corsairs']],[['text'=>"LumberJack",'url'=>'https://t.me/gamebot?game=LumberJack']],[['text'=>"LittlePlane",'url'=>'https://t.me/gamee?game=LittlePlane'],['text'=>"RollerDisco",'url'=>'https://t.me/gamee?game=RollerDisco']],[['text'=>"🦖 Dragon Game 🦖",'url'=>'https://t.me/T4TTTTBOT?game=dragon'],['text'=>"🐍 3D Snake Game 🐍",'url'=>'https://t.me/T4TTTTBOT?game=snake']],[['text'=>"🔵 Color Game 🔴",'url'=>'https://t.me/T4TTTTBOT?game=color']],[['text'=>"🚀 Rocket Game 🚀",'url'=>'https://t.me/T4TTTTBOT?game=rocket'],['text'=>"🏹 Arrow Game 🏹",'url'=>'https://t.me/T4TTTTBOT?game=arrow']],[['text'=>"♟ Chess Game ♟",'url'=>'https://t.me/T4TTTTBOT?game=chess']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($text == "ل حجره"){bot('sendMessage',['chat_id'=>$chat_id,'text'=>"❍ اهلا بك $nameee$nameee2  في لعبه حجر ورق مقص يمكنك العب معي في الخاص او المجموعات",'parse_mode'=>"html", ]);}
$random = array('انت فزت لان اختياري مقص 🌝🤞🏻', 'انا فزت لان اختياري ورقة 🌝🖱', 'نحن متعادلين 🌝✊🏻');
$random1 = array_rand($random, 1);
$rrues = array('انت الفائز لان اختياري حجرة 🌝✊🏻', 'نحن متعادلين 🤝🌝', 'انا فزت لان اختياري مقص 🌝🤞🏻');
$rues = array_rand($rrues);
$ccut = array('نحن متعادلين 🌝🤝 ','انا فزت لان اختياري حجرة 🌝✊🏻', ' انت فزت لان اختياري ورقة 🖱🌝');
$cut = array_rand($ccut);
if($text == "حجر" or $text == "حجره" or $text == "حجرة" ){bot('sendMessage',['chat_id'=>$chat_id,'text'=>$random[$random1],'reply_to_message_id'=>$message->message_id, ]);}
if($text == "مقص"){bot('sendMessage',['chat_id'=>$chat_id,'text'=>$ccut[$cut],'reply_to_message_id'=>$message->message_id, ]);}
if($text == "ورقة" or $text == "ورقه"){bot('sendMessage',['chat_id'=>$chat_id,'text'=>$rrues[$rues],'reply_to_message_id'=>$message->message_id, ]);} 
if($text == "الوقت" ){
date_default_timezone_set("Asia/Baghdad");
$time = date('h:i');
$date = date('Y/n/j');
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"❍ الساعه ➢ $time
❍ التاريخ ➢ $date
❤ حسب توقيت العراق ♥", 
'reply_to_message_id'=>$message_id,'disable_web_page_preview'=>true,]);}
$age = file_get_contents("age$chat_id.txt");
if($text == "حساب العمر" ){
file_put_contents("age$chat_id.txt","age");


bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ ارسل عمرك :
❍ بهذا الشكل :
❍ اليوم/الشهر/السنه :
❍ مثال :
2001/12/1
وليس
1/12/2001
nـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍٍـًٍ𝐁ًٍ𝐋ًٍ𝐀ًٍ𝐂ًٍ𝐊ٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍـًٍ', 
]);}
if($data == "age"){
file_put_contents("age$chat_id.txt","age");

bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ ارسل عمرك :
❍ بهذا الشكل :
❍ اليوم/الشهر/السنه :
❍ مثال :
2001/12/1
وليس
1/12/2001
ـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍٍـًٍ𝐁ًٍ𝐋ًٍ𝐀ًٍ𝐂ًٍ𝐊ٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍـًٍ',
]);}
if($text != "/start" and $age == "age"){

file_put_contents("age$chat_id.txt","none");

bot('sendmessage',['chat_id'=>$chat_id,'text'=>'يتم حساب عمرك الان',]);
$hours_in_day = 24; $minutes_in_hour = 60; $seconds_in_mins = 60; $birth_date = new DateTime($text); $current_date = new DateTime(); date_default_timezone_set("Asia/Baghdad"); $date = date('n'); $dat = date('j'); $diff = $birth_date->diff($current_date); $years = $diff->y; $mn = $diff->m; $doy = $diff->d; $months = ($diff->y * 12); $weeks = floor($diff->days/7); echo "\n"; $days = $diff->days; $hours = $diff->h + ($diff->days * $hours_in_day); $mins = $diff->h + ($diff->days * $hours_in_day * $minutes_in_hour); $seconds = $diff->h + ($diff->days * $hours_in_day * $minutes_in_hour * $seconds_in_mins);
bot('sendmessage',['chat_id'=>$chat_id,'text'=>"ـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍٍـًٍ𝐁ًٍ𝐋ًٍ𝐀ًٍ𝐂ًٍ𝐊ٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍـًٍ
❍ تم حساب عمرك بالتفصيل،
❍ عمرك هوا الان : $years سنه، و $mn اشهر،
❍ مره على ولادتك : $months. شهر،
❍ مره على ولادتك : $weeks. اسبوع،
❍ مره على ولادتك : $days. يوم،
❍ مره على ولادتك : $hours. ساعه،
❍ مره على ولادتك : $mins. دقيقه،
❍ مره على ولادتك : $seconds. ثانيه،
ـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍٍـًٍ𝐁ًٍ𝐋ًٍ𝐀ًٍ𝐂ًٍ𝐊ٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًًٍٍـًََِـًٍـًٍـًٍـًٍـًٍـًٍـًََِـًٍـًٍ",
'parse_mode'=>"MarkDown",'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>'❍ حساب مجددا','callback_data'=>"age"]],]])]);
unlink("age$chat_id.txt"); unlink("$chat_id.json");}
$tx = array('نعم','لا','نعم','لا','نعم','لا','نعم','لا'); $txx = array_rand($tx, 1); $bal = file_get_contents("bal$chat_id.txt");
if($text == "بلوره" or $text == "بلورة"){file_put_contents("bal$chat_id.txt","bal");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اهلا عزيزي في ميزه البلورة السحرية ارسل لي سؤال وساقوم بالاجابة عن الاسئله بنعم أو لا', 'reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $bal == "bal"){file_put_contents("bal$chat_id.txt","none");
bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id,
'text'=>"سؤالك للبلورة كان $text 
وجواب البلورة السحرية هو  $tx[$txx] ",
'reply_to_message_id'=>$message->message_id,]);}
$kash = array('انت صادق','انت كاذب','انت صادق','انت كاذب','انت صادق','انت كاذب','انت صادق','انت كاذب'); $kashh = array_rand($kash, 1); $kasef = file_get_contents("kaz$chat_id.txt");
if($text == "كشف الكذب"){file_put_contents("kaz$chat_id.txt","kasef");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اهلا عزيزي في ميزه كشف الكذب ارسل اي شئ تريده وسأقوم بالرد سواء صادق ام كاذب .','reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $kasef == "kasef"){file_put_contents("kaz$chat_id.txt","none");bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"لقت قلت $text وتحليلي هو انك  $kash[$kashh] " ,'reply_to_message_id'=>$message->message_id,]);}
$jarjoola = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','50','51','52','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','89','90','91','92','93','94','95','96','97','98','99','100'); $roo = array_rand($jarjoola, 1); $rojola = file_get_contents("rojola$chat_id.txt");
if($text == "الرجوله"){file_put_contents("rojola$chat_id.txt","rojola");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  حسنا ارسل الاسم الان .','reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $rojola == "rojola"){file_put_contents("rojola$chat_id.txt","none");bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"❍ نسبة رجولة $text  هى $jarjoola[$roo]%",'reply_to_message_id'=>$message->message_id,]);}
$jaenotha = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','50','51','52','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','89','90','91','92','93','94','95','96','97','98','99','100'); $enoo = array_rand($jaenotha, 1); $enotha = file_get_contents("enotha$chat_id.txt");
if($text == "الانوثه"){file_put_contents("enotha$chat_id.txt","enotha");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  حسنا ارسل الاسم الان .','reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $enotha == "enotha"){file_put_contents("enotha$chat_id.txt","none");bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"❍ نسبة انوثه $text  هى $jaenotha[$enoo]%",'reply_to_message_id'=>$message->message_id,]);}
$jajamaley = array('0','1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31','32','33','34','35','36','37','38','39','40','50','51','52','52','53','54','55','56','57','58','59','60','61','62','63','64','65','66','67','68','69','70','71','72','73','74','75','76','77','78','79','80','81','82','83','84','85','86','87','89','90','91','92','93','94','95','96','97','98','99','100'); $jama = array_rand($jajamaley, 1); $jamaley = file_get_contents("jamaley$chat_id.txt");
if($text == "نسبه جمالي"){file_put_contents("jamaley$chat_id.txt","jamaley");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  حسنا ارسل الاسم الان .','reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $jamaley == "jamaley"){file_put_contents("jamaley$chat_id.txt","none");bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"❍ نسبة جمال $text  هى $jajamaley[$jama]%",'reply_to_message_id'=>$message->message_id,]);}
$jamalley = file_get_contents("jamaleyy$chat_id.txt");
if($text == "جمالي"){file_put_contents("jamaleyy$chat_id.txt","jamalley");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  حسنا ارسل اسمك الان .','reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $jamalley == "jamalley"){file_put_contents("jamaleyy$chat_id.txt","none");bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"❍ نسبة جمال $text  هى $jajamaley[$jama]%",'reply_to_message_id'=>$message->message_id,]);}
$rafef = file_get_contents("rafef$chat_id.txt");
if($text == "رفع زبي"){file_put_contents("rafef$chat_id.txt","rafef");bot('sendmessage',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  حسنا ارسل اسم المرفوع  الان .','reply_to_message_id'=>$message->message_id,]);}
if($text != "/start" and $rafef == "rafef"){file_put_contents("rafef$chat_id.txt","none");bot('sendmessage',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"❍ تم رفع العضو $text  علي زبك عدد مرات وهو : $jajamaley[$jama] مره",'reply_to_message_id'=>$message->message_id,]);}
if($text == 'رابط الحذف' || $text == 'بوت الحذف' || $text == 'الحذف'){ bot('sendphoto',['chat_id'=>$chat_id,photo =>"https://t.me/photojack14366/15",'caption'=>'⤶ رابط الحذف في جميع مواقع التواصل', 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'⤶ Telegram ܁','url'=>'https://my.telegram.org/auth?to=delete']],[['text'=>'⤶ instagram ܁','url'=>'https://www.instagram.com/accounts/login/?next=/accounts/remove/request/permanent/']], [['text'=>'⤶ Facebook ܁','url'=>'https://www.facebook.com/help/deleteaccount']], [['text'=>'⤶ Snspchat ܁','url'=>'https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fdeleteaccount']], [['text'=>'⤶ Bot deletion .','url'=>'t.me/LC6BOT']], [['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "delateddd" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/15",'caption'=>'⤶ رابط الحذف في جميع مواقع التواصل .','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'⤶ Telegram ܁','url'=>'https://my.telegram.org/auth?to=delete']],[['text'=>'⤶ instagram ܁','url'=>'https://www.instagram.com/accounts/login/?next=/accounts/remove/request/permanent/']], [['text'=>'⤶ Facebook ܁','url'=>'https://www.facebook.com/help/deleteaccount']], [['text'=>'⤶ Snspchat ܁','url'=>'https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fdeleteaccount']], [['text'=>'⤶ Bot deletion .','url'=>'t.me/LC6BOT']], [['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($text ==  'قران' ){bot('sendMessage',['chat_id'=>$chat_id,'text'=> "أهلاً بك القسم العام اختار الذي تريده",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=> ' القران الكريم.' ,'callback_data'=>'qorannnn'],[ 'text' => 'الأذكار والأدعية .','callback_data'=>'starta' ]],[['text'=> 'قصص من القران .' ,'callback_data'=>'Qasass'],[ 'text' => 'الرقيه الشرعيه','callback_data'=>'roqua' ]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data=="deneyy"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"أهلاً بك في القسم الديني .. ",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=> ' القران الكريم.' ,'callback_data'=>'qorannnn'],[ 'text' => 'الأذكار والأدعية .','callback_data'=>'starta' ]],[['text'=> 'قصص من القران .' ,'callback_data'=>'Qasass'],[ 'text' => 'الرقيه الشرعيه','callback_data'=>'roqua' ]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data=="qorannnn"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم' - اختر اسم القارىء من الاسفل ",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"عبد الرحمن السديسي",'callback_data'=>'sodes']],[['text'=>"ماهر المعيقلي",'callback_data'=>'meaqly'],['text'=>"عبد الباسط عبد الصمد",'callback_data'=>'samad']],[['text'=>"ياسر الدوسري",'callback_data'=>'dosry']],[['text'=>"ابو بكر الشاطري",'callback_data'=>'satry'],['text'=>"سعد الغامدي",'callback_data'=>'kamedy']],[['text'=>"احمد العجمي",'callback_data'=>'agmy']],[['text'=>"فارس عباد",'callback_data'=>'fares'],['text'=>" مشاري بن راشد العفاسي",'callback_data'=>'afasy']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="sodes"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء عبد الرحمن السديسي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'sodes1'],['text'=>"سورة البقره",'callback_data'=>'sodes2']],[['text'=>"سورة ال عمران",'callback_data'=>'sodes3'],['text'=>"سورة النساء",'callback_data'=>'sodes4']],[['text'=>"سورة المائده",'callback_data'=>'sodes5'],['text'=>"سورة الانعام",'callback_data'=>'sodes6']],[['text'=>"سورة الاعراف",'callback_data'=>'sodes7'],['text'=>"سورة الانفال",'callback_data'=>'sodes8']],[['text'=>" سورة التوبه",'callback_data'=>'sodes9'],['text'=>"سورة يونس",'callback_data'=>'sodes10']],[['text'=>"سورة هود",'callback_data'=>'sodes12'],['text'=>"سورة يوسف",'callback_data'=>'sodes12']],[['text'=>"سورة الرعد",'callback_data'=>'sodes13'],['text'=>"سورة ابراهيم",'callback_data'=>'sodes14']],[['text'=>"سورة الحجر",'callback_data'=>'sodes15'],['text'=>"سورة النحل",'callback_data'=>'sodes16']],[['text'=>"سورة الاسراء",'callback_data'=>'sodes17'],['text'=>"سورة الكهف",'callback_data'=>'sodes18']],[['text'=>" سورة مريم",'callback_data'=>'sodes19'],['text'=>" سورة طه",'callback_data'=>'sodes20']],[['text'=>"سورة الانبياء",'callback_data'=>'sodes21'],['text'=>"سورة الحج",'callback_data'=>'sodes22']],[['text'=>"سورة المؤمنون",'callback_data'=>'sodes23'],['text'=>"سورة النور",'callback_data'=>'sodes24']],[['text'=>"سورة الفرقان",'callback_data'=>'sodes25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'sodes27'],['text'=>"سورة القصص",'callback_data'=>'sodes28']],[['text'=>"سورة العنكبوت",'callback_data'=>'sodes29'],['text'=>" سورة الروم",'callback_data'=>'sodes30']],[['text'=>"سورة لقمان",'callback_data'=>'sodes31'],['text'=>"سورة السجده",'callback_data'=>'sodes32']],[['text'=>"سورة الاحزاب",'callback_data'=>'sodes33'],['text'=>"سورة سبا",'callback_data'=>'sodes34']],[['text'=>"سورة فاطر",'callback_data'=>'sodes35'],['text'=>"سورة يس",'callback_data'=>'sodes36']],[['text'=>"سورة الصافات",'callback_data'=>'sodes37'],['text'=>"سورة ص",'callback_data'=>'sodes38']],[['text'=>" سورة الزمر",'callback_data'=>'sodes39'],['text'=>"سورة غافر",'callback_data'=>'sodes40']],[['text'=>"سورة فصلت",'callback_data'=>'sodes41'],['text'=>"سورة الشورى",'callback_data'=>'sodes42']],[['text'=>"سورة الزخرف",'callback_data'=>'sodes43'],['text'=>"سورة الدخان",'callback_data'=>'sodes44']],[['text'=>"سورة الجاثيه",'callback_data'=>'sodes45'],['text'=>"سورة الاحقاف",'callback_data'=>'sodes46']],[['text'=>"سورة محمد",'callback_data'=>'sodes47'],['text'=>"سورة الفتح",'callback_data'=>'sodes48']],[['text'=>" سورة الحجرات",'callback_data'=>'sodes49'],['text'=>" سورة ق",'callback_data'=>'sodes50']],[['text'=>"سورة الذريات",'callback_data'=>'sodes51'],['text'=>"سورة الطور",'callback_data'=>'sodes52']],[['text'=>"سورة النجم",'callback_data'=>'sodes53'],['text'=>"سورة القمر",'callback_data'=>'sodes54']],[['text'=>"سورة الرحمن",'callback_data'=>'sodes55'],['text'=>"سورة الواقعه",'callback_data'=>'sodes56']],[['text'=>"سورة الحديد",'callback_data'=>'sodes57'],['text'=>"سورة المجادله",'callback_data'=>'sodes58']],[['text'=>"سورة الحشر",'callback_data'=>'sodes59'],['text'=>" سورة الممتحنه",'callback_data'=>'sodes60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"sodesy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]], ]])]);}
if($data=="sodesy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء عبد الرحمن السديسي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'sodes61']],[['text'=>"سورة الجمعه",'callback_data'=>'sodes62'],['text'=>"سورة المنافقون",'callback_data'=>'sodes63']],[['text'=>"سورة التغابن",'callback_data'=>'sodes64'],['text'=>"سورة الطلاق",'callback_data'=>'sodes65']],[['text'=>"سورة التحريم",'callback_data'=>'sodes66'],['text'=>"سورة الملك",'callback_data'=>'sodes67']],[['text'=>" سورة القلم",'callback_data'=>'sodes68'],['text'=>"سورة الحاقه",'callback_data'=>'sodes69']],[['text'=>"سورة المعارج",'callback_data'=>'sodes70'],['text'=>"سورة نوح",'callback_data'=>'sodes71']],[['text'=>"سورة الجن",'callback_data'=>'sodes72'],['text'=>"سورة المزمل",'callback_data'=>'sodes73']],[['text'=>"سورة المدثر",'callback_data'=>'sodes74'],['text'=>"سورة القيامه",'callback_data'=>'sodes75']],[['text'=>"سورة الانسان",'callback_data'=>'sodes76'],['text'=>"سورة المرسلات",'callback_data'=>'sodes77']],[['text'=>" سورة النبا",'callback_data'=>'sodes78'],['text'=>" سورة النازعات",'callback_data'=>'sodes79']],[['text'=>"سورة عبس",'callback_data'=>'sodes80'],['text'=>"سورة التكوير",'callback_data'=>'sodes81']],[['text'=>"سورة الانفطار",'callback_data'=>'sodes82'],['text'=>"سورة المطففين",'callback_data'=>'sodes83']],[['text'=>"سورة الانشقاق",'callback_data'=>'sodes84'],['text'=>"سورة البروج",'callback_data'=>'sodes85']],[['text'=>"سورة الطارق",'callback_data'=>'sodes86'],['text'=>"سورة الاعلى",'callback_data'=>'sodes87']],[['text'=>"سورة الغاشيه",'callback_data'=>'sodes88'],['text'=>" سورة الفجر",'callback_data'=>'sodes89']],[['text'=>"سورة البلد",'callback_data'=>'sodes90'],['text'=>"سورة الشمس",'callback_data'=>'sodes91']],[['text'=>"سورة الليل",'callback_data'=>'sodes92'],['text'=>"سورة الضحى",'callback_data'=>'sodes93']],[['text'=>"سورة الشرح",'callback_data'=>'sodes94'],['text'=>"سورة التين",'callback_data'=>'sodes95']],[['text'=>"سورة العلق",'callback_data'=>'sodes96'],['text'=>"سورة القدر",'callback_data'=>'sodes97']],[['text'=>" سورة البينه",'callback_data'=>'sodes98'],['text'=>"سورة الزلزله",'callback_data'=>'sodes99']],[['text'=>"سورة العاديات",'callback_data'=>'sodes100'],['text'=>"سورة القارعه",'callback_data'=>'sodes101']],[['text'=>"سورة التكاثر",'callback_data'=>'sodes102'],['text'=>"سورة العصر",'callback_data'=>'sodes103']],[['text'=>"سورة الهمزه",'callback_data'=>'sodes104'],['text'=>"سورة الفيل",'callback_data'=>'sodes105']],[['text'=>"سورة قريش",'callback_data'=>'sodes106'],['text'=>"سورة الماعون",'callback_data'=>'sodes107']],[['text'=>" سورة الكوثر",'callback_data'=>'sodes108'],['text'=>" سورة الكافرون",'callback_data'=>'sodes109']],[['text'=>"سورة النصر",'callback_data'=>'sodes110'],['text'=>"سورة المسد",'callback_data'=>'sodes111']],[['text'=>"سورة الاخلاص",'callback_data'=>'sodes112'],['text'=>"سورة الفلق",'callback_data'=>'sodes113']],[['text'=>"سورة الناس",'callback_data'=>'sodes114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "sodes1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sodes114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sodesye/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="agmy"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء أحمد العجمي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'agmy1'],['text'=>"سورة البقره",'callback_data'=>'agmy2']],[['text'=>"سورة ال عمران",'callback_data'=>'agmy3'],['text'=>"سورة النساء",'callback_data'=>'agmy4']],[['text'=>"سورة المائده",'callback_data'=>'agmy5'],['text'=>"سورة الانعام",'callback_data'=>'agmy6']],[['text'=>"سورة الاعراف",'callback_data'=>'agmy7'],['text'=>"سورة الانفال",'callback_data'=>'agmy8']],[['text'=>" سورة التوبه",'callback_data'=>'agmy9'],['text'=>"سورة يونس",'callback_data'=>'agmy10']],[['text'=>"سورة هود",'callback_data'=>'agmy12'],['text'=>"سورة يوسف",'callback_data'=>'agmy12']],[['text'=>"سورة الرعد",'callback_data'=>'agmy13'],['text'=>"سورة ابراهيم",'callback_data'=>'agmy14']],[['text'=>"سورة الحجر",'callback_data'=>'agmy15'],['text'=>"سورة النحل",'callback_data'=>'agmy16']],[['text'=>"سورة الاسراء",'callback_data'=>'agmy17'],['text'=>"سورة الكهف",'callback_data'=>'agmy18']],[['text'=>" سورة مريم",'callback_data'=>'agmy19'],['text'=>" سورة طه",'callback_data'=>'agmy20']],[['text'=>"سورة الانبياء",'callback_data'=>'agmy21'],['text'=>"سورة الحج",'callback_data'=>'agmy22']],[['text'=>"سورة المؤمنون",'callback_data'=>'agmy23'],['text'=>"سورة النور",'callback_data'=>'agmy24']],[['text'=>"سورة الفرقان",'callback_data'=>'agmy25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'agmy27'],['text'=>"سورة القصص",'callback_data'=>'agmy28']],[['text'=>"سورة العنكبوت",'callback_data'=>'agmy29'],['text'=>" سورة الروم",'callback_data'=>'agmy30']],[['text'=>"سورة لقمان",'callback_data'=>'agmy31'],['text'=>"سورة السجده",'callback_data'=>'agmy32']],[['text'=>"سورة الاحزاب",'callback_data'=>'agmy33'],['text'=>"سورة سبا",'callback_data'=>'agmy34']],[['text'=>"سورة فاطر",'callback_data'=>'agmy35'],['text'=>"سورة يس",'callback_data'=>'agmy36']],[['text'=>"سورة الصافات",'callback_data'=>'agmy37'],['text'=>"سورة ص",'callback_data'=>'agmy38']],[['text'=>" سورة الزمر",'callback_data'=>'agmy39'],['text'=>"سورة غافر",'callback_data'=>'agmy40']],[['text'=>"سورة فصلت",'callback_data'=>'agmy41'],['text'=>"سورة الشورى",'callback_data'=>'agmy42']],[['text'=>"سورة الزخرف",'callback_data'=>'agmy43'],['text'=>"سورة الدخان",'callback_data'=>'agmy44']],[['text'=>"سورة الجاثيه",'callback_data'=>'agmy45'],['text'=>"سورة الاحقاف",'callback_data'=>'agmy46']],[['text'=>"سورة محمد",'callback_data'=>'agmy47'],['text'=>"سورة الفتح",'callback_data'=>'agmy48']],[['text'=>" سورة الحجرات",'callback_data'=>'agmy49'],['text'=>" سورة ق",'callback_data'=>'agmy50']],[['text'=>"سورة الذريات",'callback_data'=>'agmy51'],['text'=>"سورة الطور",'callback_data'=>'agmy52']],[['text'=>"سورة النجم",'callback_data'=>'agmy53'],['text'=>"سورة القمر",'callback_data'=>'agmy54']],[['text'=>"سورة الرحمن",'callback_data'=>'agmy55'],['text'=>"سورة الواقعه",'callback_data'=>'agmy56']],[['text'=>"سورة الحديد",'callback_data'=>'agmy57'],['text'=>"سورة المجادله",'callback_data'=>'agmy58']],[['text'=>"سورة الحشر",'callback_data'=>'agmy59'],['text'=>" سورة الممتحنه",'callback_data'=>'agmy60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"agmyy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="agmyy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء أحمد العجمي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'agmy61']],[['text'=>"سورة الجمعه",'callback_data'=>'agmy62'],['text'=>"سورة المنافقون",'callback_data'=>'agmy63']],[['text'=>"سورة التغابن",'callback_data'=>'agmy64'],['text'=>"سورة الطلاق",'callback_data'=>'agmy65']],[['text'=>"سورة التحريم",'callback_data'=>'agmy66'],['text'=>"سورة الملك",'callback_data'=>'agmy67']],[['text'=>" سورة القلم",'callback_data'=>'agmy68'],['text'=>"سورة الحاقه",'callback_data'=>'agmy69']],[['text'=>"سورة المعارج",'callback_data'=>'agmy70'],['text'=>"سورة نوح",'callback_data'=>'agmy71']],[['text'=>"سورة الجن",'callback_data'=>'agmy72'],['text'=>"سورة المزمل",'callback_data'=>'agmy73']],[['text'=>"سورة المدثر",'callback_data'=>'agmy74'],['text'=>"سورة القيامه",'callback_data'=>'agmy75']],[['text'=>"سورة الانسان",'callback_data'=>'agmy76'],['text'=>"سورة المرسلات",'callback_data'=>'agmy77']],[['text'=>" سورة النبا",'callback_data'=>'agmy78'],['text'=>" سورة النازعات",'callback_data'=>'agmy79']],[['text'=>"سورة عبس",'callback_data'=>'agmy80'],['text'=>"سورة التكوير",'callback_data'=>'agmy81']],[['text'=>"سورة الانفطار",'callback_data'=>'agmy82'],['text'=>"سورة المطففين",'callback_data'=>'agmy83']],[['text'=>"سورة الانشقاق",'callback_data'=>'agmy84'],['text'=>"سورة البروج",'callback_data'=>'agmy85']],[['text'=>"سورة الطارق",'callback_data'=>'agmy86'],['text'=>"سورة الاعلى",'callback_data'=>'agmy87']],[['text'=>"سورة الغاشيه",'callback_data'=>'agmy88'],['text'=>" سورة الفجر",'callback_data'=>'agmy89']],[['text'=>"سورة البلد",'callback_data'=>'agmy90'],['text'=>"سورة الشمس",'callback_data'=>'agmy91']],[['text'=>"سورة الليل",'callback_data'=>'agmy92'],['text'=>"سورة الضحى",'callback_data'=>'agmy93']],[['text'=>"سورة الشرح",'callback_data'=>'agmy94'],['text'=>"سورة التين",'callback_data'=>'agmy95']],[['text'=>"سورة العلق",'callback_data'=>'agmy96'],['text'=>"سورة القدر",'callback_data'=>'agmy97']],[['text'=>" سورة البينه",'callback_data'=>'agmy98'],['text'=>"سورة الزلزله",'callback_data'=>'agmy99']],[['text'=>"سورة العاديات",'callback_data'=>'agmy100'],['text'=>"سورة القارعه",'callback_data'=>'agmy101']],[['text'=>"سورة التكاثر",'callback_data'=>'agmy102'],['text'=>"سورة العصر",'callback_data'=>'agmy103']],[['text'=>"سورة الهمزه",'callback_data'=>'agmy104'],['text'=>"سورة الفيل",'callback_data'=>'agmy105']],[['text'=>"سورة قريش",'callback_data'=>'agmy106'],['text'=>"سورة الماعون",'callback_data'=>'agmy107']],[['text'=>" سورة الكوثر",'callback_data'=>'agmy108'],['text'=>" سورة الكافرون",'callback_data'=>'agmy109']],[['text'=>"سورة النصر",'callback_data'=>'agmy110'],['text'=>"سورة المسد",'callback_data'=>'agmy111']],[['text'=>"سورة الاخلاص",'callback_data'=>'agmy112'],['text'=>"سورة الفلق",'callback_data'=>'agmy113']],[['text'=>"سورة الناس",'callback_data'=>'agmy114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "agmy1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "agmy114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/agamyyq/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="meaqly"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء ماهر المعيقلي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'meaqly1'],['text'=>"سورة البقره",'callback_data'=>'meaqly2']],[['text'=>"سورة ال عمران",'callback_data'=>'meaqly3'],['text'=>"سورة النساء",'callback_data'=>'meaqly4']],[['text'=>"سورة المائده",'callback_data'=>'meaqly5'],['text'=>"سورة الانعام",'callback_data'=>'meaqly6']],[['text'=>"سورة الاعراف",'callback_data'=>'meaqly7'],['text'=>"سورة الانفال",'callback_data'=>'meaqly8']],[['text'=>" سورة التوبه",'callback_data'=>'meaqly9'],['text'=>"سورة يونس",'callback_data'=>'meaqly10']],[['text'=>"سورة هود",'callback_data'=>'meaqly12'],['text'=>"سورة يوسف",'callback_data'=>'meaqly12']],[['text'=>"سورة الرعد",'callback_data'=>'meaqly13'],['text'=>"سورة ابراهيم",'callback_data'=>'meaqly14']],[['text'=>"سورة الحجر",'callback_data'=>'meaqly15'],['text'=>"سورة النحل",'callback_data'=>'meaqly16']],[['text'=>"سورة الاسراء",'callback_data'=>'meaqly17'],['text'=>"سورة الكهف",'callback_data'=>'meaqly18']],[['text'=>" سورة مريم",'callback_data'=>'meaqly19'],['text'=>" سورة طه",'callback_data'=>'meaqly20']],[['text'=>"سورة الانبياء",'callback_data'=>'meaqly21'],['text'=>"سورة الحج",'callback_data'=>'meaqly22']],[['text'=>"سورة المؤمنون",'callback_data'=>'meaqly23'],['text'=>"سورة النور",'callback_data'=>'meaqly24']],[['text'=>"سورة الفرقان",'callback_data'=>'meaqly25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'meaqly27'],['text'=>"سورة القصص",'callback_data'=>'meaqly28']],[['text'=>"سورة العنكبوت",'callback_data'=>'meaqly29'],['text'=>" سورة الروم",'callback_data'=>'meaqly30']],[['text'=>"سورة لقمان",'callback_data'=>'meaqly31'],['text'=>"سورة السجده",'callback_data'=>'meaqly32']],[['text'=>"سورة الاحزاب",'callback_data'=>'meaqly33'],['text'=>"سورة سبا",'callback_data'=>'meaqly34']],[['text'=>"سورة فاطر",'callback_data'=>'meaqly35'],['text'=>"سورة يس",'callback_data'=>'meaqly36']],[['text'=>"سورة الصافات",'callback_data'=>'meaqly37'],['text'=>"سورة ص",'callback_data'=>'meaqly38']],[['text'=>" سورة الزمر",'callback_data'=>'meaqly39'],['text'=>"سورة غافر",'callback_data'=>'meaqly40']],[['text'=>"سورة فصلت",'callback_data'=>'meaqly41'],['text'=>"سورة الشورى",'callback_data'=>'meaqly42']],[['text'=>"سورة الزخرف",'callback_data'=>'meaqly43'],['text'=>"سورة الدخان",'callback_data'=>'meaqly44']],[['text'=>"سورة الجاثيه",'callback_data'=>'meaqly45'],['text'=>"سورة الاحقاف",'callback_data'=>'meaqly46']],[['text'=>"سورة محمد",'callback_data'=>'meaqly47'],['text'=>"سورة الفتح",'callback_data'=>'meaqly48']],[['text'=>" سورة الحجرات",'callback_data'=>'meaqly49'],['text'=>" سورة ق",'callback_data'=>'meaqly50']],[['text'=>"سورة الذريات",'callback_data'=>'meaqly51'],['text'=>"سورة الطور",'callback_data'=>'meaqly52']],[['text'=>"سورة النجم",'callback_data'=>'meaqly53'],['text'=>"سورة القمر",'callback_data'=>'meaqly54']],[['text'=>"سورة الرحمن",'callback_data'=>'meaqly55'],['text'=>"سورة الواقعه",'callback_data'=>'meaqly56']],[['text'=>"سورة الحديد",'callback_data'=>'meaqly57'],['text'=>"سورة المجادله",'callback_data'=>'meaqly58']],[['text'=>"سورة الحشر",'callback_data'=>'meaqly59'],['text'=>" سورة الممتحنه",'callback_data'=>'meaqly60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"meaqlyy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="meaqlyy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء ماهر المعيقلي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'meaqly61']],[['text'=>"سورة الجمعه",'callback_data'=>'meaqly62'],['text'=>"سورة المنافقون",'callback_data'=>'meaqly63']],[['text'=>"سورة التغابن",'callback_data'=>'meaqly64'],['text'=>"سورة الطلاق",'callback_data'=>'meaqly65']],[['text'=>"سورة التحريم",'callback_data'=>'meaqly66'],['text'=>"سورة الملك",'callback_data'=>'meaqly67']],[['text'=>" سورة القلم",'callback_data'=>'meaqly68'],['text'=>"سورة الحاقه",'callback_data'=>'meaqly69']],[['text'=>"سورة المعارج",'callback_data'=>'meaqly70'],['text'=>"سورة نوح",'callback_data'=>'meaqly71']],[['text'=>"سورة الجن",'callback_data'=>'meaqly72'],['text'=>"سورة المزمل",'callback_data'=>'meaqly73']],[['text'=>"سورة المدثر",'callback_data'=>'meaqly74'],['text'=>"سورة القيامه",'callback_data'=>'meaqly75']],[['text'=>"سورة الانسان",'callback_data'=>'meaqly76'],['text'=>"سورة المرسلات",'callback_data'=>'meaqly77']],[['text'=>" سورة النبا",'callback_data'=>'meaqly78'],['text'=>" سورة النازعات",'callback_data'=>'meaqly79']],[['text'=>"سورة عبس",'callback_data'=>'meaqly80'],['text'=>"سورة التكوير",'callback_data'=>'meaqly81']],[['text'=>"سورة الانفطار",'callback_data'=>'meaqly82'],['text'=>"سورة المطففين",'callback_data'=>'meaqly83']],[['text'=>"سورة الانشقاق",'callback_data'=>'meaqly84'],['text'=>"سورة البروج",'callback_data'=>'meaqly85']],[['text'=>"سورة الطارق",'callback_data'=>'meaqly86'],['text'=>"سورة الاعلى",'callback_data'=>'meaqly87']],[['text'=>"سورة الغاشيه",'callback_data'=>'meaqly88'],['text'=>" سورة الفجر",'callback_data'=>'meaqly89']],[['text'=>"سورة البلد",'callback_data'=>'meaqly90'],['text'=>"سورة الشمس",'callback_data'=>'meaqly91']],[['text'=>"سورة الليل",'callback_data'=>'meaqly92'],['text'=>"سورة الضحى",'callback_data'=>'meaqly93']],[['text'=>"سورة الشرح",'callback_data'=>'meaqly94'],['text'=>"سورة التين",'callback_data'=>'meaqly95']],[['text'=>"سورة العلق",'callback_data'=>'meaqly96'],['text'=>"سورة القدر",'callback_data'=>'meaqly97']],[['text'=>" سورة البينه",'callback_data'=>'meaqly98'],['text'=>"سورة الزلزله",'callback_data'=>'meaqly99']],[['text'=>"سورة العاديات",'callback_data'=>'meaqly100'],['text'=>"سورة القارعه",'callback_data'=>'meaqly101']],[['text'=>"سورة التكاثر",'callback_data'=>'meaqly102'],['text'=>"سورة العصر",'callback_data'=>'meaqly103']],[['text'=>"سورة الهمزه",'callback_data'=>'meaqly104'],['text'=>"سورة الفيل",'callback_data'=>'meaqly105']],[['text'=>"سورة قريش",'callback_data'=>'meaqly106'],['text'=>"سورة الماعون",'callback_data'=>'meaqly107']],[['text'=>" سورة الكوثر",'callback_data'=>'meaqly108'],['text'=>" سورة الكافرون",'callback_data'=>'meaqly109']],[['text'=>"سورة النصر",'callback_data'=>'meaqly110'],['text'=>"سورة المسد",'callback_data'=>'meaqly111']],[['text'=>"سورة الاخلاص",'callback_data'=>'meaqly112'],['text'=>"سورة الفلق",'callback_data'=>'meaqly113']],[['text'=>"سورة الناس",'callback_data'=>'meaqly114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "meaqly1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "meaqly114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mahermekly/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="dosry"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء ياسر الدوسري",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'dosry1'],['text'=>"سورة البقره",'callback_data'=>'dosry2']],[['text'=>"سورة ال عمران",'callback_data'=>'dosry3'],['text'=>"سورة النساء",'callback_data'=>'dosry4']],[['text'=>"سورة المائده",'callback_data'=>'dosry5'],['text'=>"سورة الانعام",'callback_data'=>'dosry6']],[['text'=>"سورة الاعراف",'callback_data'=>'dosry7'],['text'=>"سورة الانفال",'callback_data'=>'dosry8']],[['text'=>" سورة التوبه",'callback_data'=>'dosry9'],['text'=>"سورة يونس",'callback_data'=>'dosry10']],[['text'=>"سورة هود",'callback_data'=>'dosry12'],['text'=>"سورة يوسف",'callback_data'=>'dosry12']],[['text'=>"سورة الرعد",'callback_data'=>'dosry13'],['text'=>"سورة ابراهيم",'callback_data'=>'dosry14']],[['text'=>"سورة الحجر",'callback_data'=>'dosry15'],['text'=>"سورة النحل",'callback_data'=>'dosry16']],[['text'=>"سورة الاسراء",'callback_data'=>'dosry17'],['text'=>"سورة الكهف",'callback_data'=>'dosry18']],[['text'=>" سورة مريم",'callback_data'=>'dosry19'],['text'=>" سورة طه",'callback_data'=>'dosry20']],[['text'=>"سورة الانبياء",'callback_data'=>'dosry21'],['text'=>"سورة الحج",'callback_data'=>'dosry22']],[['text'=>"سورة المؤمنون",'callback_data'=>'dosry23'],['text'=>"سورة النور",'callback_data'=>'dosry24']],[['text'=>"سورة الفرقان",'callback_data'=>'dosry25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'dosry27'],['text'=>"سورة القصص",'callback_data'=>'dosry28']],[['text'=>"سورة العنكبوت",'callback_data'=>'dosry29'],['text'=>" سورة الروم",'callback_data'=>'dosry30']],[['text'=>"سورة لقمان",'callback_data'=>'dosry31'],['text'=>"سورة السجده",'callback_data'=>'dosry32']],[['text'=>"سورة الاحزاب",'callback_data'=>'dosry33'],['text'=>"سورة سبا",'callback_data'=>'dosry34']],[['text'=>"سورة فاطر",'callback_data'=>'dosry35'],['text'=>"سورة يس",'callback_data'=>'dosry36']],[['text'=>"سورة الصافات",'callback_data'=>'dosry37'],['text'=>"سورة ص",'callback_data'=>'dosry38']],[['text'=>" سورة الزمر",'callback_data'=>'dosry39'],['text'=>"سورة غافر",'callback_data'=>'dosry40']],[['text'=>"سورة فصلت",'callback_data'=>'dosry41'],['text'=>"سورة الشورى",'callback_data'=>'dosry42']],[['text'=>"سورة الزخرف",'callback_data'=>'dosry43'],['text'=>"سورة الدخان",'callback_data'=>'dosry44']],[['text'=>"سورة الجاثيه",'callback_data'=>'dosry45'],['text'=>"سورة الاحقاف",'callback_data'=>'dosry46']],[['text'=>"سورة محمد",'callback_data'=>'dosry47'],['text'=>"سورة الفتح",'callback_data'=>'dosry48']],[['text'=>" سورة الحجرات",'callback_data'=>'dosry49'],['text'=>" سورة ق",'callback_data'=>'dosry50']],[['text'=>"سورة الذريات",'callback_data'=>'dosry51'],['text'=>"سورة الطور",'callback_data'=>'dosry52']],[['text'=>"سورة النجم",'callback_data'=>'dosry53'],['text'=>"سورة القمر",'callback_data'=>'dosry54']],[['text'=>"سورة الرحمن",'callback_data'=>'dosry55'],['text'=>"سورة الواقعه",'callback_data'=>'dosry56']],[['text'=>"سورة الحديد",'callback_data'=>'dosry57'],['text'=>"سورة المجادله",'callback_data'=>'dosry58']],[['text'=>"سورة الحشر",'callback_data'=>'dosry59'],['text'=>" سورة الممتحنه",'callback_data'=>'dosry60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"dosryy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="dosryy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء ياسر الدوسري",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'dosry61']],[['text'=>"سورة الجمعه",'callback_data'=>'dosry62'],['text'=>"سورة المنافقون",'callback_data'=>'dosry63']],[['text'=>"سورة التغابن",'callback_data'=>'dosry64'],['text'=>"سورة الطلاق",'callback_data'=>'dosry65']],[['text'=>"سورة التحريم",'callback_data'=>'dosry66'],['text'=>"سورة الملك",'callback_data'=>'dosry67']],[['text'=>" سورة القلم",'callback_data'=>'dosry68'],['text'=>"سورة الحاقه",'callback_data'=>'dosry69']],[['text'=>"سورة المعارج",'callback_data'=>'dosry70'],['text'=>"سورة نوح",'callback_data'=>'dosry71']],[['text'=>"سورة الجن",'callback_data'=>'dosry72'],['text'=>"سورة المزمل",'callback_data'=>'dosry73']],[['text'=>"سورة المدثر",'callback_data'=>'dosry74'],['text'=>"سورة القيامه",'callback_data'=>'dosry75']],[['text'=>"سورة الانسان",'callback_data'=>'dosry76'],['text'=>"سورة المرسلات",'callback_data'=>'dosry77']],[['text'=>" سورة النبا",'callback_data'=>'dosry78'],['text'=>" سورة النازعات",'callback_data'=>'dosry79']],[['text'=>"سورة عبس",'callback_data'=>'dosry80'],['text'=>"سورة التكوير",'callback_data'=>'dosry81']],[['text'=>"سورة الانفطار",'callback_data'=>'dosry82'],['text'=>"سورة المطففين",'callback_data'=>'dosry83']],[['text'=>"سورة الانشقاق",'callback_data'=>'dosry84'],['text'=>"سورة البروج",'callback_data'=>'dosry85']],[['text'=>"سورة الطارق",'callback_data'=>'dosry86'],['text'=>"سورة الاعلى",'callback_data'=>'dosry87']],[['text'=>"سورة الغاشيه",'callback_data'=>'dosry88'],['text'=>" سورة الفجر",'callback_data'=>'dosry89']],[['text'=>"سورة البلد",'callback_data'=>'dosry90'],['text'=>"سورة الشمس",'callback_data'=>'dosry91']],[['text'=>"سورة الليل",'callback_data'=>'dosry92'],['text'=>"سورة الضحى",'callback_data'=>'dosry93']],[['text'=>"سورة الشرح",'callback_data'=>'dosry94'],['text'=>"سورة التين",'callback_data'=>'dosry95']],[['text'=>"سورة العلق",'callback_data'=>'dosry96'],['text'=>"سورة القدر",'callback_data'=>'dosry97']],[['text'=>" سورة البينه",'callback_data'=>'dosry98'],['text'=>"سورة الزلزله",'callback_data'=>'dosry99']],[['text'=>"سورة العاديات",'callback_data'=>'dosry100'],['text'=>"سورة القارعه",'callback_data'=>'dosry101']],[['text'=>"سورة التكاثر",'callback_data'=>'dosry102'],['text'=>"سورة العصر",'callback_data'=>'dosry103']],[['text'=>"سورة الهمزه",'callback_data'=>'dosry104'],['text'=>"سورة الفيل",'callback_data'=>'dosry105']],[['text'=>"سورة قريش",'callback_data'=>'dosry106'],['text'=>"سورة الماعون",'callback_data'=>'dosry107']],[['text'=>" سورة الكوثر",'callback_data'=>'dosry108'],['text'=>" سورة الكافرون",'callback_data'=>'dosry109']],[['text'=>"سورة النصر",'callback_data'=>'dosry110'],['text'=>"سورة المسد",'callback_data'=>'dosry111']],[['text'=>"سورة الاخلاص",'callback_data'=>'dosry112'],['text'=>"سورة الفلق",'callback_data'=>'dosry113']],[['text'=>"سورة الناس",'callback_data'=>'dosry114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "dosry1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "dosry114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/dosarye/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="afasy"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء  مشاري بن راشد العفاسي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'afasy1'],['text'=>"سورة البقره",'callback_data'=>'afasy2']],[['text'=>"سورة ال عمران",'callback_data'=>'afasy3'],['text'=>"سورة النساء",'callback_data'=>'afasy4']],[['text'=>"سورة المائده",'callback_data'=>'afasy5'],['text'=>"سورة الانعام",'callback_data'=>'afasy6']],[['text'=>"سورة الاعراف",'callback_data'=>'afasy7'],['text'=>"سورة الانفال",'callback_data'=>'afasy8']],[['text'=>" سورة التوبه",'callback_data'=>'afasy9'],['text'=>"سورة يونس",'callback_data'=>'afasy10']],[['text'=>"سورة هود",'callback_data'=>'afasy12'],['text'=>"سورة يوسف",'callback_data'=>'afasy12']],[['text'=>"سورة الرعد",'callback_data'=>'afasy13'],['text'=>"سورة ابراهيم",'callback_data'=>'afasy14']],[['text'=>"سورة الحجر",'callback_data'=>'afasy15'],['text'=>"سورة النحل",'callback_data'=>'afasy16']],[['text'=>"سورة الاسراء",'callback_data'=>'afasy17'],['text'=>"سورة الكهف",'callback_data'=>'afasy18']],[['text'=>" سورة مريم",'callback_data'=>'afasy19'],['text'=>" سورة طه",'callback_data'=>'afasy20']],[['text'=>"سورة الانبياء",'callback_data'=>'afasy21'],['text'=>"سورة الحج",'callback_data'=>'afasy22']],[['text'=>"سورة المؤمنون",'callback_data'=>'afasy23'],['text'=>"سورة النور",'callback_data'=>'afasy24']],[['text'=>"سورة الفرقان",'callback_data'=>'afasy25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'afasy27'],['text'=>"سورة القصص",'callback_data'=>'afasy28']],[['text'=>"سورة العنكبوت",'callback_data'=>'afasy29'],['text'=>" سورة الروم",'callback_data'=>'afasy30']],[['text'=>"سورة لقمان",'callback_data'=>'afasy31'],['text'=>"سورة السجده",'callback_data'=>'afasy32']],[['text'=>"سورة الاحزاب",'callback_data'=>'afasy33'],['text'=>"سورة سبا",'callback_data'=>'afasy34']],[['text'=>"سورة فاطر",'callback_data'=>'afasy35'],['text'=>"سورة يس",'callback_data'=>'afasy36']],[['text'=>"سورة الصافات",'callback_data'=>'afasy37'],['text'=>"سورة ص",'callback_data'=>'afasy38']],[['text'=>" سورة الزمر",'callback_data'=>'afasy39'],['text'=>"سورة غافر",'callback_data'=>'afasy40']],[['text'=>"سورة فصلت",'callback_data'=>'afasy41'],['text'=>"سورة الشورى",'callback_data'=>'afasy42']],[['text'=>"سورة الزخرف",'callback_data'=>'afasy43'],['text'=>"سورة الدخان",'callback_data'=>'afasy44']],[['text'=>"سورة الجاثيه",'callback_data'=>'afasy45'],['text'=>"سورة الاحقاف",'callback_data'=>'afasy46']],[['text'=>"سورة محمد",'callback_data'=>'afasy47'],['text'=>"سورة الفتح",'callback_data'=>'afasy48']],[['text'=>" سورة الحجرات",'callback_data'=>'afasy49'],['text'=>" سورة ق",'callback_data'=>'afasy50']],[['text'=>"سورة الذريات",'callback_data'=>'afasy51'],['text'=>"سورة الطور",'callback_data'=>'afasy52']],[['text'=>"سورة النجم",'callback_data'=>'afasy53'],['text'=>"سورة القمر",'callback_data'=>'afasy54']],[['text'=>"سورة الرحمن",'callback_data'=>'afasy55'],['text'=>"سورة الواقعه",'callback_data'=>'afasy56']],[['text'=>"سورة الحديد",'callback_data'=>'afasy57'],['text'=>"سورة المجادله",'callback_data'=>'afasy58']],[['text'=>"سورة الحشر",'callback_data'=>'afasy59'],['text'=>" سورة الممتحنه",'callback_data'=>'afasy60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"afasyy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="afasyy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء  مشاري بن راشد العفاسي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'afasy61']],[['text'=>"سورة الجمعه",'callback_data'=>'afasy62'],['text'=>"سورة المنافقون",'callback_data'=>'afasy63']],[['text'=>"سورة التغابن",'callback_data'=>'afasy64'],['text'=>"سورة الطلاق",'callback_data'=>'afasy65']],[['text'=>"سورة التحريم",'callback_data'=>'afasy66'],['text'=>"سورة الملك",'callback_data'=>'afasy67']],[['text'=>" سورة القلم",'callback_data'=>'afasy68'],['text'=>"سورة الحاقه",'callback_data'=>'afasy69']],[['text'=>"سورة المعارج",'callback_data'=>'afasy70'],['text'=>"سورة نوح",'callback_data'=>'afasy71']],[['text'=>"سورة الجن",'callback_data'=>'afasy72'],['text'=>"سورة المزمل",'callback_data'=>'afasy73']],[['text'=>"سورة المدثر",'callback_data'=>'afasy74'],['text'=>"سورة القيامه",'callback_data'=>'afasy75']],[['text'=>"سورة الانسان",'callback_data'=>'afasy76'],['text'=>"سورة المرسلات",'callback_data'=>'afasy77']],[['text'=>" سورة النبا",'callback_data'=>'afasy78'],['text'=>" سورة النازعات",'callback_data'=>'afasy79']],[['text'=>"سورة عبس",'callback_data'=>'afasy80'],['text'=>"سورة التكوير",'callback_data'=>'afasy81']],[['text'=>"سورة الانفطار",'callback_data'=>'afasy82'],['text'=>"سورة المطففين",'callback_data'=>'afasy83']],[['text'=>"سورة الانشقاق",'callback_data'=>'afasy84'],['text'=>"سورة البروج",'callback_data'=>'afasy85']],[['text'=>"سورة الطارق",'callback_data'=>'afasy86'],['text'=>"سورة الاعلى",'callback_data'=>'afasy87']],[['text'=>"سورة الغاشيه",'callback_data'=>'afasy88'],['text'=>" سورة الفجر",'callback_data'=>'afasy89']],[['text'=>"سورة البلد",'callback_data'=>'afasy90'],['text'=>"سورة الشمس",'callback_data'=>'afasy91']],[['text'=>"سورة الليل",'callback_data'=>'afasy92'],['text'=>"سورة الضحى",'callback_data'=>'afasy93']],[['text'=>"سورة الشرح",'callback_data'=>'afasy94'],['text'=>"سورة التين",'callback_data'=>'afasy95']],[['text'=>"سورة العلق",'callback_data'=>'afasy96'],['text'=>"سورة القدر",'callback_data'=>'afasy97']],[['text'=>" سورة البينه",'callback_data'=>'afasy98'],['text'=>"سورة الزلزله",'callback_data'=>'afasy99']],[['text'=>"سورة العاديات",'callback_data'=>'afasy100'],['text'=>"سورة القارعه",'callback_data'=>'afasy101']],[['text'=>"سورة التكاثر",'callback_data'=>'afasy102'],['text'=>"سورة العصر",'callback_data'=>'afasy103']],[['text'=>"سورة الهمزه",'callback_data'=>'afasy104'],['text'=>"سورة الفيل",'callback_data'=>'afasy105']],[['text'=>"سورة قريش",'callback_data'=>'afasy106'],['text'=>"سورة الماعون",'callback_data'=>'afasy107']],[['text'=>" سورة الكوثر",'callback_data'=>'afasy108'],['text'=>" سورة الكافرون",'callback_data'=>'afasy109']],[['text'=>"سورة النصر",'callback_data'=>'afasy110'],['text'=>"سورة المسد",'callback_data'=>'afasy111']],[['text'=>"سورة الاخلاص",'callback_data'=>'afasy112'],['text'=>"سورة الفلق",'callback_data'=>'afasy113']],[['text'=>"سورة الناس",'callback_data'=>'afasy114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "afasy1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mroan7/2613",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mroan7/2635",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/115",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/mroan7/2638",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/121",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/123",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/125",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/127",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/129",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/131",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/133",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/135",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/137",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/139",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/141",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/143",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/145",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/147",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/149",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/364",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/152",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/154",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/156",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/158",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/160",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/162",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/164",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/166",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/168",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/170",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/172",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/174",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/176",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/178",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/180",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/302",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/304",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/306",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/308",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/310",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/312",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/314",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/316",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/318",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/320",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/322",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/324",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/326",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/328",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/330",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/332",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/334",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/336",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/338",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/340",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/342",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/344",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/346",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/348",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/350",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/352",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/354",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/356",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/358",'reply_to_message_id'=>$message->message_id,]);}
if($data == "afasy114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/bot_qran/358",'reply_to_message_id'=>$message->message_id,]);} 
if($data=="kamedy"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء سعد الغامدي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'kamedy1'],['text'=>"سورة البقره",'callback_data'=>'kamedy2']],[['text'=>"سورة ال عمران",'callback_data'=>'kamedy3'],['text'=>"سورة النساء",'callback_data'=>'kamedy4']],[['text'=>"سورة المائده",'callback_data'=>'kamedy5'],['text'=>"سورة الانعام",'callback_data'=>'kamedy6']],[['text'=>"سورة الاعراف",'callback_data'=>'kamedy7'],['text'=>"سورة الانفال",'callback_data'=>'kamedy8']],[['text'=>" سورة التوبه",'callback_data'=>'kamedy9'],['text'=>"سورة يونس",'callback_data'=>'kamedy10']],[['text'=>"سورة هود",'callback_data'=>'kamedy12'],['text'=>"سورة يوسف",'callback_data'=>'kamedy12']],[['text'=>"سورة الرعد",'callback_data'=>'kamedy13'],['text'=>"سورة ابراهيم",'callback_data'=>'kamedy14']],[['text'=>"سورة الحجر",'callback_data'=>'kamedy15'],['text'=>"سورة النحل",'callback_data'=>'kamedy16']],[['text'=>"سورة الاسراء",'callback_data'=>'kamedy17'],['text'=>"سورة الكهف",'callback_data'=>'kamedy18']],[['text'=>" سورة مريم",'callback_data'=>'kamedy19'],['text'=>" سورة طه",'callback_data'=>'kamedy20']],[['text'=>"سورة الانبياء",'callback_data'=>'kamedy21'],['text'=>"سورة الحج",'callback_data'=>'kamedy22']],[['text'=>"سورة المؤمنون",'callback_data'=>'kamedy23'],['text'=>"سورة النور",'callback_data'=>'kamedy24']],[['text'=>"سورة الفرقان",'callback_data'=>'kamedy25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'kamedy27'],['text'=>"سورة القصص",'callback_data'=>'kamedy28']],[['text'=>"سورة العنكبوت",'callback_data'=>'kamedy29'],['text'=>" سورة الروم",'callback_data'=>'kamedy30']],[['text'=>"سورة لقمان",'callback_data'=>'kamedy31'],['text'=>"سورة السجده",'callback_data'=>'kamedy32']],[['text'=>"سورة الاحزاب",'callback_data'=>'kamedy33'],['text'=>"سورة سبا",'callback_data'=>'kamedy34']],[['text'=>"سورة فاطر",'callback_data'=>'kamedy35'],['text'=>"سورة يس",'callback_data'=>'kamedy36']],[['text'=>"سورة الصافات",'callback_data'=>'kamedy37'],['text'=>"سورة ص",'callback_data'=>'kamedy38']],[['text'=>" سورة الزمر",'callback_data'=>'kamedy39'],['text'=>"سورة غافر",'callback_data'=>'kamedy40']],[['text'=>"سورة فصلت",'callback_data'=>'kamedy41'],['text'=>"سورة الشورى",'callback_data'=>'kamedy42']],[['text'=>"سورة الزخرف",'callback_data'=>'kamedy43'],['text'=>"سورة الدخان",'callback_data'=>'kamedy44']],[['text'=>"سورة الجاثيه",'callback_data'=>'kamedy45'],['text'=>"سورة الاحقاف",'callback_data'=>'kamedy46']],[['text'=>"سورة محمد",'callback_data'=>'kamedy47'],['text'=>"سورة الفتح",'callback_data'=>'kamedy48']],[['text'=>" سورة الحجرات",'callback_data'=>'kamedy49'],['text'=>" سورة ق",'callback_data'=>'kamedy50']],[['text'=>"سورة الذريات",'callback_data'=>'kamedy51'],['text'=>"سورة الطور",'callback_data'=>'kamedy52']],[['text'=>"سورة النجم",'callback_data'=>'kamedy53'],['text'=>"سورة القمر",'callback_data'=>'kamedy54']],[['text'=>"سورة الرحمن",'callback_data'=>'kamedy55'],['text'=>"سورة الواقعه",'callback_data'=>'kamedy56']],[['text'=>"سورة الحديد",'callback_data'=>'kamedy57'],['text'=>"سورة المجادله",'callback_data'=>'kamedy58']],[['text'=>"سورة الحشر",'callback_data'=>'kamedy59'],['text'=>" سورة الممتحنه",'callback_data'=>'kamedy60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"kamedyy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="kamedyy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء سعد الغامدي",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'kamedy61']],[['text'=>"سورة الجمعه",'callback_data'=>'kamedy62'],['text'=>"سورة المنافقون",'callback_data'=>'kamedy63']],[['text'=>"سورة التغابن",'callback_data'=>'kamedy64'],['text'=>"سورة الطلاق",'callback_data'=>'kamedy65']],[['text'=>"سورة التحريم",'callback_data'=>'kamedy66'],['text'=>"سورة الملك",'callback_data'=>'kamedy67']],[['text'=>" سورة القلم",'callback_data'=>'kamedy68'],['text'=>"سورة الحاقه",'callback_data'=>'kamedy69']],[['text'=>"سورة المعارج",'callback_data'=>'kamedy70'],['text'=>"سورة نوح",'callback_data'=>'kamedy71']],[['text'=>"سورة الجن",'callback_data'=>'kamedy72'],['text'=>"سورة المزمل",'callback_data'=>'kamedy73']],[['text'=>"سورة المدثر",'callback_data'=>'kamedy74'],['text'=>"سورة القيامه",'callback_data'=>'kamedy75']],[['text'=>"سورة الانسان",'callback_data'=>'kamedy76'],['text'=>"سورة المرسلات",'callback_data'=>'kamedy77']],[['text'=>" سورة النبا",'callback_data'=>'kamedy78'],['text'=>" سورة النازعات",'callback_data'=>'kamedy79']],[['text'=>"سورة عبس",'callback_data'=>'kamedy80'],['text'=>"سورة التكوير",'callback_data'=>'kamedy81']],[['text'=>"سورة الانفطار",'callback_data'=>'kamedy82'],['text'=>"سورة المطففين",'callback_data'=>'kamedy83']],[['text'=>"سورة الانشقاق",'callback_data'=>'kamedy84'],['text'=>"سورة البروج",'callback_data'=>'kamedy85']],[['text'=>"سورة الطارق",'callback_data'=>'kamedy86'],['text'=>"سورة الاعلى",'callback_data'=>'kamedy87']],[['text'=>"سورة الغاشيه",'callback_data'=>'kamedy88'],['text'=>" سورة الفجر",'callback_data'=>'kamedy89']],[['text'=>"سورة البلد",'callback_data'=>'kamedy90'],['text'=>"سورة الشمس",'callback_data'=>'kamedy91']],[['text'=>"سورة الليل",'callback_data'=>'kamedy92'],['text'=>"سورة الضحى",'callback_data'=>'kamedy93']],[['text'=>"سورة الشرح",'callback_data'=>'kamedy94'],['text'=>"سورة التين",'callback_data'=>'kamedy95']],[['text'=>"سورة العلق",'callback_data'=>'kamedy96'],['text'=>"سورة القدر",'callback_data'=>'kamedy97']],[['text'=>" سورة البينه",'callback_data'=>'kamedy98'],['text'=>"سورة الزلزله",'callback_data'=>'kamedy99']],[['text'=>"سورة العاديات",'callback_data'=>'kamedy100'],['text'=>"سورة القارعه",'callback_data'=>'kamedy101']],[['text'=>"سورة التكاثر",'callback_data'=>'kamedy102'],['text'=>"سورة العصر",'callback_data'=>'kamedy103']],[['text'=>"سورة الهمزه",'callback_data'=>'kamedy104'],['text'=>"سورة الفيل",'callback_data'=>'kamedy105']],[['text'=>"سورة قريش",'callback_data'=>'kamedy106'],['text'=>"سورة الماعون",'callback_data'=>'kamedy107']],[['text'=>" سورة الكوثر",'callback_data'=>'kamedy108'],['text'=>" سورة الكافرون",'callback_data'=>'kamedy109']],[['text'=>"سورة النصر",'callback_data'=>'kamedy110'],['text'=>"سورة المسد",'callback_data'=>'kamedy111']],[['text'=>"سورة الاخلاص",'callback_data'=>'kamedy112'],['text'=>"سورة الفلق",'callback_data'=>'kamedy113']],[['text'=>"سورة الناس",'callback_data'=>'kamedy114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "kamedy1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "kamedy114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/s_a_ag/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="samad"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء  عبد الباسط عبد الصمد",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'samad1'],['text'=>"سورة البقره",'callback_data'=>'samad2']],[['text'=>"سورة ال عمران",'callback_data'=>'samad3'],['text'=>"سورة النساء",'callback_data'=>'samad4']],[['text'=>"سورة المائده",'callback_data'=>'samad5'],['text'=>"سورة الانعام",'callback_data'=>'samad6']],[['text'=>"سورة الاعراف",'callback_data'=>'samad7'],['text'=>"سورة الانفال",'callback_data'=>'samad8']],[['text'=>" سورة التوبه",'callback_data'=>'samad9'],['text'=>"سورة يونس",'callback_data'=>'samad10']],[['text'=>"سورة هود",'callback_data'=>'samad12'],['text'=>"سورة يوسف",'callback_data'=>'samad12']],[['text'=>"سورة الرعد",'callback_data'=>'samad13'],['text'=>"سورة ابراهيم",'callback_data'=>'samad14']],[['text'=>"سورة الحجر",'callback_data'=>'samad15'],['text'=>"سورة النحل",'callback_data'=>'samad16']],[['text'=>"سورة الاسراء",'callback_data'=>'samad17'],['text'=>"سورة الكهف",'callback_data'=>'samad18']],[['text'=>" سورة مريم",'callback_data'=>'samad19'],['text'=>" سورة طه",'callback_data'=>'samad20']],[['text'=>"سورة الانبياء",'callback_data'=>'samad21'],['text'=>"سورة الحج",'callback_data'=>'samad22']],[['text'=>"سورة المؤمنون",'callback_data'=>'samad23'],['text'=>"سورة النور",'callback_data'=>'samad24']],[['text'=>"سورة الفرقان",'callback_data'=>'samad25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'samad27'],['text'=>"سورة القصص",'callback_data'=>'samad28']],[['text'=>"سورة العنكبوت",'callback_data'=>'samad29'],['text'=>" سورة الروم",'callback_data'=>'samad30']],[['text'=>"سورة لقمان",'callback_data'=>'samad31'],['text'=>"سورة السجده",'callback_data'=>'samad32']],[['text'=>"سورة الاحزاب",'callback_data'=>'samad33'],['text'=>"سورة سبا",'callback_data'=>'samad34']],[['text'=>"سورة فاطر",'callback_data'=>'samad35'],['text'=>"سورة يس",'callback_data'=>'samad36']],[['text'=>"سورة الصافات",'callback_data'=>'samad37'],['text'=>"سورة ص",'callback_data'=>'samad38']],[['text'=>" سورة الزمر",'callback_data'=>'samad39'],['text'=>"سورة غافر",'callback_data'=>'samad40']],[['text'=>"سورة فصلت",'callback_data'=>'samad41'],['text'=>"سورة الشورى",'callback_data'=>'samad42']],[['text'=>"سورة الزخرف",'callback_data'=>'samad43'],['text'=>"سورة الدخان",'callback_data'=>'samad44']],[['text'=>"سورة الجاثيه",'callback_data'=>'samad45'],['text'=>"سورة الاحقاف",'callback_data'=>'samad46']],[['text'=>"سورة محمد",'callback_data'=>'samad47'],['text'=>"سورة الفتح",'callback_data'=>'samad48']],[['text'=>" سورة الحجرات",'callback_data'=>'samad49'],['text'=>" سورة ق",'callback_data'=>'samad50']],[['text'=>"سورة الذريات",'callback_data'=>'samad51'],['text'=>"سورة الطور",'callback_data'=>'samad52']],[['text'=>"سورة النجم",'callback_data'=>'samad53'],['text'=>"سورة القمر",'callback_data'=>'samad54']],[['text'=>"سورة الرحمن",'callback_data'=>'samad55'],['text'=>"سورة الواقعه",'callback_data'=>'samad56']],[['text'=>"سورة الحديد",'callback_data'=>'samad57'],['text'=>"سورة المجادله",'callback_data'=>'samad58']],[['text'=>"سورة الحشر",'callback_data'=>'samad59'],['text'=>" سورة الممتحنه",'callback_data'=>'samad60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"samady2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="samady2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء  عبد الباسط عبد الصمد",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'samad61']],[['text'=>"سورة الجمعه",'callback_data'=>'samad62'],['text'=>"سورة المنافقون",'callback_data'=>'samad63']],[['text'=>"سورة التغابن",'callback_data'=>'samad64'],['text'=>"سورة الطلاق",'callback_data'=>'samad65']],[['text'=>"سورة التحريم",'callback_data'=>'samad66'],['text'=>"سورة الملك",'callback_data'=>'samad67']],[['text'=>" سورة القلم",'callback_data'=>'samad68'],['text'=>"سورة الحاقه",'callback_data'=>'samad69']],[['text'=>"سورة المعارج",'callback_data'=>'samad70'],['text'=>"سورة نوح",'callback_data'=>'samad71']],[['text'=>"سورة الجن",'callback_data'=>'samad72'],['text'=>"سورة المزمل",'callback_data'=>'samad73']],[['text'=>"سورة المدثر",'callback_data'=>'samad74'],['text'=>"سورة القيامه",'callback_data'=>'samad75']],[['text'=>"سورة الانسان",'callback_data'=>'samad76'],['text'=>"سورة المرسلات",'callback_data'=>'samad77']],[['text'=>" سورة النبا",'callback_data'=>'samad78'],['text'=>" سورة النازعات",'callback_data'=>'samad79']],[['text'=>"سورة عبس",'callback_data'=>'samad80'],['text'=>"سورة التكوير",'callback_data'=>'samad81']],[['text'=>"سورة الانفطار",'callback_data'=>'samad82'],['text'=>"سورة المطففين",'callback_data'=>'samad83']],[['text'=>"سورة الانشقاق",'callback_data'=>'samad84'],['text'=>"سورة البروج",'callback_data'=>'samad85']],[['text'=>"سورة الطارق",'callback_data'=>'samad86'],['text'=>"سورة الاعلى",'callback_data'=>'samad87']],[['text'=>"سورة الغاشيه",'callback_data'=>'samad88'],['text'=>" سورة الفجر",'callback_data'=>'samad89']],[['text'=>"سورة البلد",'callback_data'=>'samad90'],['text'=>"سورة الشمس",'callback_data'=>'samad91']],[['text'=>"سورة الليل",'callback_data'=>'samad92'],['text'=>"سورة الضحى",'callback_data'=>'samad93']],[['text'=>"سورة الشرح",'callback_data'=>'samad94'],['text'=>"سورة التين",'callback_data'=>'samad95']],[['text'=>"سورة العلق",'callback_data'=>'samad96'],['text'=>"سورة القدر",'callback_data'=>'samad97']],[['text'=>" سورة البينه",'callback_data'=>'samad98'],['text'=>"سورة الزلزله",'callback_data'=>'samad99']],[['text'=>"سورة العاديات",'callback_data'=>'samad100'],['text'=>"سورة القارعه",'callback_data'=>'samad101']],[['text'=>"سورة التكاثر",'callback_data'=>'samad102'],['text'=>"سورة العصر",'callback_data'=>'samad103']],[['text'=>"سورة الهمزه",'callback_data'=>'samad104'],['text'=>"سورة الفيل",'callback_data'=>'samad105']],[['text'=>"سورة قريش",'callback_data'=>'samad106'],['text'=>"سورة الماعون",'callback_data'=>'samad107']],[['text'=>" سورة الكوثر",'callback_data'=>'samad108'],['text'=>" سورة الكافرون",'callback_data'=>'samad109']],[['text'=>"سورة النصر",'callback_data'=>'samad110'],['text'=>"سورة المسد",'callback_data'=>'samad111']],[['text'=>"سورة الاخلاص",'callback_data'=>'samad112'],['text'=>"سورة الفلق",'callback_data'=>'samad113']],[['text'=>"سورة الناس",'callback_data'=>'samad114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "samad1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "samad114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/a_b_d_al_b/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="satry"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء ابو بكر الشاطري",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'satry1'],['text'=>"سورة البقره",'callback_data'=>'satry2']],[['text'=>"سورة ال عمران",'callback_data'=>'satry3'],['text'=>"سورة النساء",'callback_data'=>'satry4']],[['text'=>"سورة المائده",'callback_data'=>'satry5'],['text'=>"سورة الانعام",'callback_data'=>'satry6']],[['text'=>"سورة الاعراف",'callback_data'=>'satry7'],['text'=>"سورة الانفال",'callback_data'=>'satry8']],[['text'=>" سورة التوبه",'callback_data'=>'satry9'],['text'=>"سورة يونس",'callback_data'=>'satry10']],[['text'=>"سورة هود",'callback_data'=>'satry12'],['text'=>"سورة يوسف",'callback_data'=>'satry12']],[['text'=>"سورة الرعد",'callback_data'=>'satry13'],['text'=>"سورة ابراهيم",'callback_data'=>'satry14']],[['text'=>"سورة الحجر",'callback_data'=>'satry15'],['text'=>"سورة النحل",'callback_data'=>'satry16']],[['text'=>"سورة الاسراء",'callback_data'=>'satry17'],['text'=>"سورة الكهف",'callback_data'=>'satry18']],[['text'=>" سورة مريم",'callback_data'=>'satry19'],['text'=>" سورة طه",'callback_data'=>'satry20']],[['text'=>"سورة الانبياء",'callback_data'=>'satry21'],['text'=>"سورة الحج",'callback_data'=>'satry22']],[['text'=>"سورة المؤمنون",'callback_data'=>'satry23'],['text'=>"سورة النور",'callback_data'=>'satry24']],[['text'=>"سورة الفرقان",'callback_data'=>'satry25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'satry27'],['text'=>"سورة القصص",'callback_data'=>'satry28']],[['text'=>"سورة العنكبوت",'callback_data'=>'satry29'],['text'=>" سورة الروم",'callback_data'=>'satry30']],[['text'=>"سورة لقمان",'callback_data'=>'satry31'],['text'=>"سورة السجده",'callback_data'=>'satry32']],[['text'=>"سورة الاحزاب",'callback_data'=>'satry33'],['text'=>"سورة سبا",'callback_data'=>'satry34']],[['text'=>"سورة فاطر",'callback_data'=>'satry35'],['text'=>"سورة يس",'callback_data'=>'satry36']],[['text'=>"سورة الصافات",'callback_data'=>'satry37'],['text'=>"سورة ص",'callback_data'=>'satry38']],[['text'=>" سورة الزمر",'callback_data'=>'satry39'],['text'=>"سورة غافر",'callback_data'=>'satry40']],[['text'=>"سورة فصلت",'callback_data'=>'satry41'],['text'=>"سورة الشورى",'callback_data'=>'satry42']],[['text'=>"سورة الزخرف",'callback_data'=>'satry43'],['text'=>"سورة الدخان",'callback_data'=>'satry44']],[['text'=>"سورة الجاثيه",'callback_data'=>'satry45'],['text'=>"سورة الاحقاف",'callback_data'=>'satry46']],[['text'=>"سورة محمد",'callback_data'=>'satry47'],['text'=>"سورة الفتح",'callback_data'=>'satry48']],[['text'=>" سورة الحجرات",'callback_data'=>'satry49'],['text'=>" سورة ق",'callback_data'=>'satry50']],[['text'=>"سورة الذريات",'callback_data'=>'satry51'],['text'=>"سورة الطور",'callback_data'=>'satry52']],[['text'=>"سورة النجم",'callback_data'=>'satry53'],['text'=>"سورة القمر",'callback_data'=>'satry54']],[['text'=>"سورة الرحمن",'callback_data'=>'satry55'],['text'=>"سورة الواقعه",'callback_data'=>'satry56']],[['text'=>"سورة الحديد",'callback_data'=>'satry57'],['text'=>"سورة المجادله",'callback_data'=>'satry58']],[['text'=>"سورة الحشر",'callback_data'=>'satry59'],['text'=>" سورة الممتحنه",'callback_data'=>'satry60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"satryy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="satryy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء ابو بكر الشاطري",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'satry61']],[['text'=>"سورة الجمعه",'callback_data'=>'satry62'],['text'=>"سورة المنافقون",'callback_data'=>'satry63']],[['text'=>"سورة التغابن",'callback_data'=>'satry64'],['text'=>"سورة الطلاق",'callback_data'=>'satry65']],[['text'=>"سورة التحريم",'callback_data'=>'satry66'],['text'=>"سورة الملك",'callback_data'=>'satry67']],[['text'=>" سورة القلم",'callback_data'=>'satry68'],['text'=>"سورة الحاقه",'callback_data'=>'satry69']],[['text'=>"سورة المعارج",'callback_data'=>'satry70'],['text'=>"سورة نوح",'callback_data'=>'satry71']],[['text'=>"سورة الجن",'callback_data'=>'satry72'],['text'=>"سورة المزمل",'callback_data'=>'satry73']],[['text'=>"سورة المدثر",'callback_data'=>'satry74'],['text'=>"سورة القيامه",'callback_data'=>'satry75']],[['text'=>"سورة الانسان",'callback_data'=>'satry76'],['text'=>"سورة المرسلات",'callback_data'=>'satry77']],[['text'=>" سورة النبا",'callback_data'=>'satry78'],['text'=>" سورة النازعات",'callback_data'=>'satry79']],[['text'=>"سورة عبس",'callback_data'=>'satry80'],['text'=>"سورة التكوير",'callback_data'=>'satry81']],[['text'=>"سورة الانفطار",'callback_data'=>'satry82'],['text'=>"سورة المطففين",'callback_data'=>'satry83']],[['text'=>"سورة الانشقاق",'callback_data'=>'satry84'],['text'=>"سورة البروج",'callback_data'=>'satry85']],[['text'=>"سورة الطارق",'callback_data'=>'satry86'],['text'=>"سورة الاعلى",'callback_data'=>'satry87']],[['text'=>"سورة الغاشيه",'callback_data'=>'satry88'],['text'=>" سورة الفجر",'callback_data'=>'satry89']],[['text'=>"سورة البلد",'callback_data'=>'satry90'],['text'=>"سورة الشمس",'callback_data'=>'satry91']],[['text'=>"سورة الليل",'callback_data'=>'satry92'],['text'=>"سورة الضحى",'callback_data'=>'satry93']],[['text'=>"سورة الشرح",'callback_data'=>'satry94'],['text'=>"سورة التين",'callback_data'=>'satry95']],[['text'=>"سورة العلق",'callback_data'=>'satry96'],['text'=>"سورة القدر",'callback_data'=>'satry97']],[['text'=>" سورة البينه",'callback_data'=>'satry98'],['text'=>"سورة الزلزله",'callback_data'=>'satry99']],[['text'=>"سورة العاديات",'callback_data'=>'satry100'],['text'=>"سورة القارعه",'callback_data'=>'satry101']],[['text'=>"سورة التكاثر",'callback_data'=>'satry102'],['text'=>"سورة العصر",'callback_data'=>'satry103']],[['text'=>"سورة الهمزه",'callback_data'=>'satry104'],['text'=>"سورة الفيل",'callback_data'=>'satry105']],[['text'=>"سورة قريش",'callback_data'=>'satry106'],['text'=>"سورة الماعون",'callback_data'=>'satry107']],[['text'=>" سورة الكوثر",'callback_data'=>'satry108'],['text'=>" سورة الكافرون",'callback_data'=>'satry109']],[['text'=>"سورة النصر",'callback_data'=>'satry110'],['text'=>"سورة المسد",'callback_data'=>'satry111']],[['text'=>"سورة الاخلاص",'callback_data'=>'satry112'],['text'=>"سورة الفلق",'callback_data'=>'satry113']],[['text'=>"سورة الناس",'callback_data'=>'satry114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "satry1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "satry114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/shaterye/115",'reply_to_message_id'=>$message->message_id,]);}
if($data=="fares"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء فارس عباد' ",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الفاتحه",'callback_data'=>'fares1'],['text'=>"سورة البقره",'callback_data'=>'fares2']],[['text'=>"سورة ال عمران",'callback_data'=>'fares3'],['text'=>"سورة النساء",'callback_data'=>'fares4']],[['text'=>"سورة المائده",'callback_data'=>'fares5'],['text'=>"سورة الانعام",'callback_data'=>'fares6']],[['text'=>"سورة الاعراف",'callback_data'=>'fares7'],['text'=>"سورة الانفال",'callback_data'=>'fares8']],[['text'=>" سورة التوبه",'callback_data'=>'fares9'],['text'=>"سورة يونس",'callback_data'=>'fares10']],[['text'=>"سورة هود",'callback_data'=>'fares12'],['text'=>"سورة يوسف",'callback_data'=>'fares12']],[['text'=>"سورة الرعد",'callback_data'=>'fares13'],['text'=>"سورة ابراهيم",'callback_data'=>'fares14']],[['text'=>"سورة الحجر",'callback_data'=>'fares15'],['text'=>"سورة النحل",'callback_data'=>'fares16']],[['text'=>"سورة الاسراء",'callback_data'=>'fares17'],['text'=>"سورة الكهف",'callback_data'=>'fares18']],[['text'=>" سورة مريم",'callback_data'=>'fares19'],['text'=>" سورة طه",'callback_data'=>'fares20']],[['text'=>"سورة الانبياء",'callback_data'=>'fares21'],['text'=>"سورة الحج",'callback_data'=>'fares22']],[['text'=>"سورة المؤمنون",'callback_data'=>'fares23'],['text'=>"سورة النور",'callback_data'=>'fares24']],[['text'=>"سورة الفرقان",'callback_data'=>'fares25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],[['text'=>"سورة النمل",'callback_data'=>'fares27'],['text'=>"سورة القصص",'callback_data'=>'fares28']],[['text'=>"سورة العنكبوت",'callback_data'=>'fares29'],['text'=>" سورة الروم",'callback_data'=>'fares30']],[['text'=>"سورة لقمان",'callback_data'=>'fares31'],['text'=>"سورة السجده",'callback_data'=>'fares32']],[['text'=>"سورة الاحزاب",'callback_data'=>'fares33'],['text'=>"سورة سبا",'callback_data'=>'fares34']],[['text'=>"سورة فاطر",'callback_data'=>'fares35'],['text'=>"سورة يس",'callback_data'=>'fares36']],[['text'=>"سورة الصافات",'callback_data'=>'fares37'],['text'=>"سورة ص",'callback_data'=>'fares38']],[['text'=>" سورة الزمر",'callback_data'=>'fares39'],['text'=>"سورة غافر",'callback_data'=>'fares40']],[['text'=>"سورة فصلت",'callback_data'=>'fares41'],['text'=>"سورة الشورى",'callback_data'=>'fares42']],[['text'=>"سورة الزخرف",'callback_data'=>'fares43'],['text'=>"سورة الدخان",'callback_data'=>'fares44']],[['text'=>"سورة الجاثيه",'callback_data'=>'fares45'],['text'=>"سورة الاحقاف",'callback_data'=>'fares46']],[['text'=>"سورة محمد",'callback_data'=>'fares47'],['text'=>"سورة الفتح",'callback_data'=>'fares48']],[['text'=>" سورة الحجرات",'callback_data'=>'fares49'],['text'=>" سورة ق",'callback_data'=>'fares50']],[['text'=>"سورة الذريات",'callback_data'=>'fares51'],['text'=>"سورة الطور",'callback_data'=>'fares52']],[['text'=>"سورة النجم",'callback_data'=>'fares53'],['text'=>"سورة القمر",'callback_data'=>'fares54']],[['text'=>"سورة الرحمن",'callback_data'=>'fares55'],['text'=>"سورة الواقعه",'callback_data'=>'fares56']],[['text'=>"سورة الحديد",'callback_data'=>'fares57'],['text'=>"سورة المجادله",'callback_data'=>'fares58']],[['text'=>"سورة الحشر",'callback_data'=>'fares59'],['text'=>" سورة الممتحنه",'callback_data'=>'fares60']],[['text'=>"𝐍𝐄𝐗𝐓 .",'callback_data'=>"faresy2"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data=="faresy2"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم القرآن الكريم بصوت القاريء فارس عباد",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"سورة الصف",'callback_data'=>'fares61']],[['text'=>"سورة الجمعه",'callback_data'=>'fares62'],['text'=>"سورة المنافقون",'callback_data'=>'fares63']],[['text'=>"سورة التغابن",'callback_data'=>'fares64'],['text'=>"سورة الطلاق",'callback_data'=>'fares65']],[['text'=>"سورة التحريم",'callback_data'=>'fares66'],['text'=>"سورة الملك",'callback_data'=>'fares67']],[['text'=>" سورة القلم",'callback_data'=>'fares68'],['text'=>"سورة الحاقه",'callback_data'=>'fares69']],[['text'=>"سورة المعارج",'callback_data'=>'fares70'],['text'=>"سورة نوح",'callback_data'=>'fares71']],[['text'=>"سورة الجن",'callback_data'=>'fares72'],['text'=>"سورة المزمل",'callback_data'=>'fares73']],[['text'=>"سورة المدثر",'callback_data'=>'fares74'],['text'=>"سورة القيامه",'callback_data'=>'fares75']],[['text'=>"سورة الانسان",'callback_data'=>'fares76'],['text'=>"سورة المرسلات",'callback_data'=>'fares77']],[['text'=>" سورة النبا",'callback_data'=>'fares78'],['text'=>" سورة النازعات",'callback_data'=>'fares79']],[['text'=>"سورة عبس",'callback_data'=>'fares80'],['text'=>"سورة التكوير",'callback_data'=>'fares81']],[['text'=>"سورة الانفطار",'callback_data'=>'fares82'],['text'=>"سورة المطففين",'callback_data'=>'fares83']],[['text'=>"سورة الانشقاق",'callback_data'=>'fares84'],['text'=>"سورة البروج",'callback_data'=>'fares85']],[['text'=>"سورة الطارق",'callback_data'=>'fares86'],['text'=>"سورة الاعلى",'callback_data'=>'fares87']],[['text'=>"سورة الغاشيه",'callback_data'=>'fares88'],['text'=>" سورة الفجر",'callback_data'=>'fares89']],[['text'=>"سورة البلد",'callback_data'=>'fares90'],['text'=>"سورة الشمس",'callback_data'=>'fares91']],[['text'=>"سورة الليل",'callback_data'=>'fares92'],['text'=>"سورة الضحى",'callback_data'=>'fares93']],[['text'=>"سورة الشرح",'callback_data'=>'fares94'],['text'=>"سورة التين",'callback_data'=>'fares95']],[['text'=>"سورة العلق",'callback_data'=>'fares96'],['text'=>"سورة القدر",'callback_data'=>'fares97']],[['text'=>" سورة البينه",'callback_data'=>'fares98'],['text'=>"سورة الزلزله",'callback_data'=>'fares99']],[['text'=>"سورة العاديات",'callback_data'=>'fares100'],['text'=>"سورة القارعه",'callback_data'=>'fares101']],[['text'=>"سورة التكاثر",'callback_data'=>'fares102'],['text'=>"سورة العصر",'callback_data'=>'fares103']],[['text'=>"سورة الهمزه",'callback_data'=>'fares104'],['text'=>"سورة الفيل",'callback_data'=>'fares105']],[['text'=>"سورة قريش",'callback_data'=>'fares106'],['text'=>"سورة الماعون",'callback_data'=>'fares107']],[['text'=>" سورة الكوثر",'callback_data'=>'fares108'],['text'=>" سورة الكافرون",'callback_data'=>'fares109']],[['text'=>"سورة النصر",'callback_data'=>'fares110'],['text'=>"سورة المسد",'callback_data'=>'fares111']],[['text'=>"سورة الاخلاص",'callback_data'=>'fares112'],['text'=>"سورة الفلق",'callback_data'=>'fares113']],[['text'=>"سورة الناس",'callback_data'=>'fares114']],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],]])]);}
if($data == "fares1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/18",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/19",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/21",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares21"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/22",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares22"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares23"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares24"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares25"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/26",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares26"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/27",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares27"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/28",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares28"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/29",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares29"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/30",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares30"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/31",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares31"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/32",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares32"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/33",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares33"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/34",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares34"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/35",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares35"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/36",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares36"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/37",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares37"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/38",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares38"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/39",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares39"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/40",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares40"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/41",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares41"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/42",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares42"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/43",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares43"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/44",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares44"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/45",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares45"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/46",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares46"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/47",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares47"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/48",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares48"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/49",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares49"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/50",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares50"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/51",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares51"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/52",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares52"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/53",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares53"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/54",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares54"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/55",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares55"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/56",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares56"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/57",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares57"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/58",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares58"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/59",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares59"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/60",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares60"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/61",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares61"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/62",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares62"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/63",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares63"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/64",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares64"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/65",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares65"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/66",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares66"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/67",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares67"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/68",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares68"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/69",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares69"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/70",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares70"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/71",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares71"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/72",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares72"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/73",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares73"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/74",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares74"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/75",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares75"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/76",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares76"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/77",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares77"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/78",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares78"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/79",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares79"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/80",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares80"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/81",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares81"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/82",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares82"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/83",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares83"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/84",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares84"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/85",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares85"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/86",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares86"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/87",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares87"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/88",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares88"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/89",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares89"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/90",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares90"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/91",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares91"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/92",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares92"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/93",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares93"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/94",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares94"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/95",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares95"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/96",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares96"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/97",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares97"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/98",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares98"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/99",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares99"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/100",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares100"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/101",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares101"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/102",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares102"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/103",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares103"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/104",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares104"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/105",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares105"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/106",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares106"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/107",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares107"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/108",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares108"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/109",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares109"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/110",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares110"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/111",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares111"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/112",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares112"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/113",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares113"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/114",'reply_to_message_id'=>$message->message_id,]);}
if($data == "fares114"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/abadft/115",'reply_to_message_id'=>$message->message_id,]);}
if($data ==  'starta' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'أهلاً بك في قسم لأذكار ..   القسم مطور بطريقة مميزة ليسهل عليك قراءة الأذكار قران'  ,'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => 'أذكار الصباح .','callback_data'=>'c' ]],[['text'=> 'أذكار المساء .' ,'callback_data'=>'e']],[['text'=> 'أوقات الصلاة .' ,'callback_data'=>'a']],[['text'=> 'أركان الإسلام .' ,'callback_data'=>'t']],[['text'=> 'أجمل دعاء إلى الله .' ,'callback_data'=>'y']],[['text'=> 'دعاء يقال في قيام الليل .' ,'callback_data'=>'r']],[['text'=> 'الدعاء عند دخول الخلاء و عند الخروج منه .' ,'callback_data'=>'z']],[['text'=> 'أوقات يُستحب فيها الدعاء وتُستجاب الدعوات .' ,'callback_data'=>'u']] ,[['text'=> 'كلمتان خفيفتان على اللسان، ثقيلتان في الميزان .' ,'callback_data'=>'w']] ,[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data ==  'c' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '▪️أَعُوذُ بِاللهِ مِنْ الشَّيْطَانِ الرَّجِيمِ ⏺اللّهُ لاَ إِلَـهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَّهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَن ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلاَّ بِمَا شَاء وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَؤُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ.[آية الكرسى - البقرة 255].  🔹مرة واحدة ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c1' ]],]])]);}
if($data ==  'c1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم ⏺قُلْ هُوَ ٱللَّهُ أَحَدٌ، ٱللَّهُ ٱلصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ. 🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c2' ]],]])]);}
if($data ==  'c2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم ⏺قُلْ أَعُوذُ بِرَبِّ ٱلْفَلَقِ، مِن شَرِّ مَا خَلَقَ، وَمِن شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِن شَرِّ ٱلنَّفَّٰثَٰتِ فِى ٱلْعُقَدِ، وَمِن شَرِّ حَاسِدٍ إِذَا حَسَدَ.  🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c3' ]],]])]);}
if($data ==  'c3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم  ⏺قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ، مَلِكِ ٱلنَّاسِ، إِلَٰهِ ٱلنَّاسِ، مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ، ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ، مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ.  🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c4' ]],]])]);}
if($data ==  'c4' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> ' 🔸أَصْـبَحْنا وَأَصْـبَحَ المُـلْكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذا اليوم وَخَـيرَ ما بَعْـدَه ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذا اليوم وَشَرِّ ما بَعْـدَه، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر. ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c5' ]],]])]);}
if($data ==  'c5' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> ' 🔸اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ . ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c6' ]],]])]);}
if($data ==  'c6' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔸رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً.   🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c7' ]],]])]);}
if($data ==  'c7' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '  🔸حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم.   🔹7 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c8' ]],]])]);}
if($data ==  'c8' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم.  🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c9' ]],]])]);}
if($data ==  'c9' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘اللّهُـمَّ بِكَ أَصْـبَحْنا وَبِكَ أَمْسَـينا ، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ النُّـشُور','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c10' ]],]])]);}
if($data ==  'c10' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘أَصْبَـحْـنا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ. ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الـتـالـي' ,'callback_data'=> 'c11' ]],]])]);}
if($data ==  'c11' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '  🔘سُبْحـانَ اللهِ وَبِحَمْـدِهِ عَدَدَ خَلْـقِه ، وَرِضـا نَفْسِـه ، وَزِنَـةَ عَـرْشِـه ، وَمِـدادَ كَلِمـاتِـه.  🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c12' ]],]])]);}
if($data ==  'c12' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ اللّهُـمَّ إِنّـي أَعـوذُ بِكَ مِنَ الْكُـفر ، وَالفَـقْر ، وَأَعـوذُ بِكَ مِنْ عَذابِ القَـبْر ، لا إلهَ إلاّ أَنْـتَ. 🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c13' ]],]])]);}
if($data ==  'c13' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> ' 🔘اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي ، اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي ، وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي. ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c14' ]],]])]);}
if($data ==  'c14' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘يَا حَيُّ يَا قيُّومُ بِرَحْمَتِكَ أسْتَغِيثُ أصْلِحْ لِي شَأنِي كُلَّهُ وَلاَ تَكِلُنِي إلَى نَفْسِي طَـرْفَةَ عَيْنٍ.','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c15' ]],]])]);}
if($data ==  'c15' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘اللّهُـمَّ عالِـمَ الغَـيْبِ وَالشّـهادَةِ فاطِـرَ السّماواتِ وَالأرْضِ رَبَّ كـلِّ شَـيءٍ وَمَليـكَه ، أَشْهَـدُ أَنْ لا إِلـهَ إِلاّ أَنْت ، أَعـوذُ بِكَ مِن شَـرِّ نَفْسـي وَمِن شَـرِّ الشَّيْـطانِ وَشِـرْكِه ، وَأَنْ أَقْتَـرِفَ عَلـى نَفْسـي سوءاً أَوْ أَجُـرَّهُ إِلـى مُسْـلِم. ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c17' ]],]])]);}
if($data ==  'c17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق.  🔹3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c18' ]],]])]);}
if($data ==  'c18' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد.  ✔️غير مقيد بعدد','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c19' ]],]])]);}
if($data ==  'c19' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '🔘اللَّهُمَّ إِنَّا نَعُوذُ بِكَ مِنْ أَنْ نُشْرِكَ بِكَ شَيْئًا نَعْلَمُهُ ، وَنَسْتَغْفِرُكَ لِمَا لَا نَعْلَمُهُ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'c20' ]],]])]);}
if($data ==  'c20' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=> "- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'a' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'الفجْر٤:٣٨ ص','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الفْجر .' ,'callback_data'=> 'a1' ]],]])]);}
if($data ==  'a1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'الشروق٥:٥٩ ص','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الشروق .' ,'callback_data'=> 'a2' ]],]])]);}
if($data ==  'a2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'الظُّهْر١٢:٢٩ م','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الظُّهْر .' ,'callback_data'=> 'a3' ]],]])]);}
if($data ==  'a3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'العَصر٣:٥٠ م','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'العَصر .' ,'callback_data'=> 'a4' ]],]])]);}
if($data ==  'a4' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'المَغرب٦:٥٨ م','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'المَغرب .' ,'callback_data'=> 'a5' ]],]])]);}
if($data ==  'a5' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'العِشاء٨:٢٨ م','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'العِشاء .' ,'callback_data'=> 'a6' ]],]])]);}
if($data ==  'a6' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'z' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'عند الدخول يقول : (بِسمِ الله ) اللّهُـمَّ إِنِّـي أَعـوذُ بِـكَ مِـنَ الخُـبثِ وَالخَبائِث. رواه البخاري ومسلم .وإذا خرج قال: غُفـرانَك. أخرجه أصحاب السنن إلا النسائي','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'z1' ]],]])]);}
if($data ==  'z1' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'r' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللهم أنت ربي لا إله إلا أنت عليك توكلت وأنت رب العرش العظيم ما شاء الله كان وما لم يشأ لم يكن لا حول ولا قوة إلا العظيم العلى العظيم أعلم أن الله على كل شيء قدير وأن الله قد أحاط بكل شيء علما اللهم إني أعوذ بك من شر نفسي ومن شر كل دابة أنت آخذ بناصيتها إن ربي على صراط مستقيم.','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'r1' ]],]])]);}
if($data ==  'r1' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'w' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'عن أبي هريرة - رضي الله عنه - قال: قال رسول الله - صلى الله عليه وسلم -: ((كلمتان خفيفتان على اللسان، ثقيلتان في الميزان، حبيبتان إلى الرحمن: ((سبحان الله وبحمده، سبحان الله العظيم))، متفق عليه.','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'w1' ]],]])]);}
if($data ==  'w1' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'y' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دُعاء مصدر دَعا، وهو ما يُدْعَى به اللهَ من القول، وهو أيضًا رفع الكفّين بالابتهال والتضرّع إلى الله، وهو من العبادات التي يلجأ بها العبد إلى الله وحده دون غيره في أي وقت شاء، ولا ينحصر الدعاء في صيغة محدّدة، وقد قال تعالى في كتابه الكريم: " وَإِذَا سَأَلَكَ عِبَادِي عَنِّي فَإِنِّي قَرِيبٌ ۖ أُجِيبُ دَعْوَةَ الدَّاعِ إِذَا دَعَانِ" [١]، ولا يقتصر الدعاء على دعاء المرء لنفسه فقط، بل من الجميل قيام المرء بالدعاء لغيره بالخير، وفي هذا المقال حديثٌ عن الدعاء وعن أجمل دعاء إلى الله من الكتاب والسنّة .','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'y1' ]],]])]);}
if($data ==  'y1' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  't' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'الشهادتان (شهادة أن لا إله إلا الله، وشهادة ان محمداً رسول الله)','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الركن الاول .' ,'callback_data'=> 't1' ]],]])]);}
if($data ==  't1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'إقام الصلاة (وهي خمس صلوات في اليوم والليلة)','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الركن الثاني .' ,'callback_data'=> 't2' ]],]])]);}
if($data ==  't2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'إيتاء الزكاة','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الركن الثالث .' ,'callback_data'=> 't3' ]],]])]);}
if($data ==  't3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'صوم شهر رمضان','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الركن الرابع .' ,'callback_data'=> 't4' ]],]])]);}
if($data ==  't4' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'حج البيت (من استطاع إليه سبيلا، أي للقادرين)','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => 'الركن الخامس .' ,'callback_data'=> 't5' ]],]])]);}
if($data ==  't5' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'e' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'أَعُوذُ بِاللهِ مِنْ الشَّيْطَانِ الرَّجِيمِ  اللّهُ لاَ إِلَـهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَّهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَن ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلاَّ بِمَا شَاء وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَؤُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'e1' ]],]])]);}
if($data ==  'e1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم  قُلْ هُوَ ٱللَّهُ أَحَدٌ، ٱللَّهُ ٱلصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ  3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e2' ]],]])]);}
if($data ==  'e2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم قُلْ أَعُوذُ بِرَبِّ ٱلْفَلَقِ، مِن شَرِّ مَا خَلَقَ، وَمِن شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِن شَرِّ ٱلنَّفَّٰثَٰتِ فِى ٱلْعُقَدِ، وَمِن شَرِّ حَاسِدٍ إِذَا حَسَدَ.  3 مرات' ,'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e3' ]],]])]);}
if($data ==  'e3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم  قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ، مَلِكِ ٱلنَّاسِ، إِلَٰهِ ٱلنَّاسِ، مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ، ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ، مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ  3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e4' ]],]])]);}
if($data ==  'e4' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'أَمْسَيْـنا وَأَمْسـى المـلكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذهِ اللَّـيْلَةِ وَخَـيرَ ما بَعْـدَهـا ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذهِ اللَّـيْلةِ وَشَرِّ ما بَعْـدَهـا ، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر. ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e5' ]],]])]);}
if($data ==  'e5' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e6' ]],]])]);}
if($data ==  'e6' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً. 3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e7' ]],]])]);}
if($data ==  'e7' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم.7 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e8' ]],]])]);}
if($data ==  'e8' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم. 3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e9' ]],]])]);}
if($data ==  'e9' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللّهُـمَّ بِكَ أَمْسَـينا وَبِكَ أَصْـبَحْنا، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ الْمَصِيرُ.','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'e10' ]],]])]);}
if($data ==  'e10' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'أَمْسَيْنَا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e11' ]],]])]);}
if($data ==  'e11' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ.  اللّهُـمَّ إِنّـي أَعـوذُ بِكَ مِنَ الْكُـفر ، وَالفَـقْر ، وَأَعـوذُ بِكَ مِنْ عَذابِ القَـبْر لا إلهَ إلاّ أَنْـتَ  3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e12' ]],]])]);}
if($data ==  'e12' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي. ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e13' ]],]])]);}
if($data ==  'e13' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'يَا حَيُّ يَا قيُّومُ بِرَحْمَتِكَ أسْتَغِيثُ أصْلِحْ لِي شَأنِي كُلَّهُ وَلاَ تَكِلُنِي إلَى نَفْسِي طَـرْفَةَ عَيْنٍ. 3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e14' ]],]])]);}
if($data ==  'e14' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللّهُـمَّ عالِـمَ الغَـيْبِ وَالشّـهادَةِ فاطِـرَ السّماواتِ وَالأرْضِ رَبَّ كـلِّ شَـيءٍ وَمَليـكَه ، أَشْهَـدُ أَنْ لا إِلـهَ إِلاّ أَنْت ، أَعـوذُ بِكَ مِن شَـرِّ نَفْسـي وَمِن شَـرِّ الشَّيْـطانِ وَشِـرْكِه ، وَأَنْ أَقْتَـرِفَ عَلـى نَفْسـي سوءاً أَوْ أَجُـرَّهُ إِلـى مُسْـلِم','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e15' ]],]])]);}
if($data ==  'e15' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق  3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e16' ]],]])]);}
if($data ==  'e16' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد.  غير مقيد بعدد','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e17' ]],]])]);}
if($data ==  'e17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'أسْتَغْفِرُ اللهَ َ الَّذِي لاَ إلَهَ إلاَّ هُوَ، الحَيُّ القَيُّومُ، وَأتُوبُ إلَيهِ. 3 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e19' ]],]])]);}
if($data ==  'e19' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'لَا إلَه إلّا اللهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلُّ شَيْءِ قَدِيرِ. 10 مرات','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e20' ]],]])]);}
if($data ==  'e20' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'سُبْحـانَ اللهِ وَبِحَمْـدِهِ.100 مرة','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'e21' ]],]])]);}
if($data ==  'e21' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران", 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'u' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ليلة القدر',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[ [['text'=> 'دعاء ليلة القدر .' ,'callback_data'=>'uu']] ,[[ 'text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'u1' ]],]])]);}
if($data ==  'u1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'جوف الليل الأخير','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u2' ]],]])]);}
if($data ==  'u2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ما بين الأذان والإقامة' ,'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u3' ]],]])]);}
if($data ==  'u3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'عند نزول الغيث',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=> 'دعاء نزول الغيث .' ,'callback_data'=>'uuu']] ,[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u4' ]],]])]);}
if($data ==  'u4' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ساعة من يوم الجمعة ( وأرجح الأقوال فيها أَنها آخر ساعة من ساعات العصر يوم الجمعة، وقد تكون ساعة الخطبة والصلاة )',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[ [['text'=> 'دعاء يوم الجمعة .' ,'callback_data'=>'uuuu']] ,[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u5' ]],]])]);}
if($data ==  'u5' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'عند شُرب ماء زمزم مع صدق النية','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u6' ]],]])]);}
if($data ==  'u6' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'وقت السجود','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u7' ]],]])]);}
if($data ==  'u7' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'عند الاستقياظ من النوم ليلاً','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u8' ]],]])]);}
if($data ==  'u8' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'عند الدعاء بِـ: ( لَا إِلَهَ إِلَّا أَنْتَ سُبْحَانَكَ إِنِّي كُنْتُ مِنَ الظَّالِمِينَ )','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u9' ]],]])]);}
if($data ==  'u9' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المُسلم لأخيه المُسلم في ظهر الغيب','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓' ,'callback_data'=> 'u10' ]],]])]);}
if($data ==  'u10' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء يوم عرفة','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u11' ]],]])]);}
if($data ==  'u11' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء في شهر رمضان',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[ [['text'=> 'أدعية مستحبة في شهر رمضان .' ,'callback_data'=>'uuuuu']] ,[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u12' ]],]])]);}
if($data ==  'u12' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'في مجالس الذكر','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u13' ]],]])]);}
if($data ==  'u13' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المسافر',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[ [['text'=> 'دعاء السفر .' ,'callback_data'=>'uuuuuu']] ,[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u14' ]],]])]);}
if($data ==  'u14' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المضطر','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u15' ]],]])]);}
if($data ==  'u15' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء الولد البار بوالديه','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u16' ]],]])]);}
if($data ==  'u16' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'الدعاء بعد الوضوء','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'u17' ]],]])]);}
if($data ==  'u17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'uu' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللهم اهدنا فيمن هديت، وعافنا فيمن عافيت، وتولنا فيمن توليت، وبارك لنا فيما أعطيت، وقنا برحمتك واصرف عنا شر ما قضيت، إنَّك تقضي ولا يُقضى عليك، إنّه لا يذِلُّ من واليت، ولا يعِزُّ من عاديت، تباركت ربنا وتعاليت، نستغفرك اللهم من جميع الذنوب والخطايا ونتوب إليك، ونؤمن بك ونتوكلُ عليك، اللهم أنتَ الغنيُّ ونحن الفقراء إليك، وأنتَ القويُّ ونحنُ الضعفاءُ اليك، اللَّهُمَّ إِنَّكَ عَفُوٌّ كَرِيمٌ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّا يا كريم','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uu1' ]],]])]);}
if($data ==  'uu1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'يا إله العالمين، يا مجيب دعوة المضطرين، يا من لا يزداد على السؤال إلا كرمًا وجودًا، وعلى كثرة الإلحاح إلا تفضلاً وإحساناً، نسألك مسألة المساكين، ونبتهل إليك يا ربنا ابتهال الخاضع المذنب الذليل، ندعوك دُعاء من خضعت لكَ رقبته وذلَّ لكَ جسمه ورغم لكَ أنفه وفاضت لك عيناه، يا من يجيب المضطر إذا دعاه، ويكشف السوء عمن ناداه اللهم هؤلاء عبادك، قد نصبوا وجوههم إليك، ورفعوا أكُفَّ الضراعة إليك، في هذه الليلة المباركة، اللهم فأعطهم سؤلهم، ولا تخيب رجاءنا ورجاءهم، ولا تردنا خائبين برحمتك يا أرحم الراحمين','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uu2' ]],]])]);}
if($data ==  'uu2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللهم إنَّا نسألك في هذا المقام المبارك، وفي هذه الليلة المباركة أن تكتبنا من عتقائك من النار، اللهم أعتق رقابَنا ورقابَ آبائنا وأمهاتنا وسائر قراباتنا من النار يا عزيز يا غفار','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uu3' ]],]])]);}
if($data ==  'uu3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللهم أنتَ أحقَّ من ذُكر، وأحقَّ من عبد، وأنصرُ من ابتغى، وأرأف من مَلك، وأجود من سُئل، و أوسعُ من أعطى، أنتَ الملك لا شريك لكَ، والفرد لا تهلك، كل شيء هالك إلا وجهكَ، لن تطاع ألا بأذنك، ولن تعصى إلا بعلمك، تُطاع فتشكر، وتُعصى فتغفر، أقرب شهيد، وأدنى حفيظ، أخذت بالنواصي، وكتبت الآثار، ونسخت الآجال، القلوب لك مفضية، والسرُّ عندك علانية، الحلال ما أحللت، والحرام ما حرمت، والدين ما شرعت والأمر ما قضيت، الخلق خلقكَ، والعبد عبدكَ، وأنتَ الله الرؤوف الرحيم أسألك بنور وجهك الذي أشرقت له السماوات والأرض، أن تقبلنا العشية بإحسانك وأن تُجيرنا من النار برحمتك','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐁𝐀𝐂𝐊' ,'callback_data'=> 'u17' ]],]])]);}
if($data ==  'u17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'uuu' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'الدعاء عند اشتداد الريح: ( اللهم لقحًا لا عقيمًا )','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuu1' ]],]])]);}
if($data ==  'uuu1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المطر كما ورد عن الرسول -عليه الصلاة والسلام : ( عن عائشة -رضي الله عنها- أن رسول الله -صلى الله عليه وسلم- كان إذا رأى المطر قال: {صيبًا نافعًا}، ويقصد بهذا الدعاء أن يكون المطر نافعًا دافعًا للفساد والضرر','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuu2' ]],]])]);}
if($data ==  'uuu2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المطر : (اللَّهم اسقِ بلدكَ وبهائمك، وانشُرْ رحمتك وأحيِ بلدك الميتَ اللهم اسقِنا غيثًا مغيثًا مَريئًا مُريعًا طَبَقًا واسِعًا عاجِلًا غيرَ آجلٍ نافعًا غيرَ ضار اللَّهم سُقْيا رَحمَةٍ ولا سُقْيا عذابٍ ولا هدم ولا غرَق ولا مَحْق اللَّهمَّ اسقنا الغيثَ وانصرنا على الأعداءِ)','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuu3' ]],]])]);}
if($data ==  'uuu3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المطر :(اللَّهم حوالينا ولا علينا اللهم على الآكام والظّراب وبطون الأودية ومنابت الشجر)','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐁𝐀𝐂𝐊' ,'callback_data'=> 'u3' ]],]])]);}
if($data ==  'u17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'uuuu' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ما ورد في قوله تعالى في سورة الفرقان: *{رَبَّنَا هَبْ لَنَا مِنْ أَزْوَاجِنَا وَذُرِّيَّاتِنَا قُرَّةَ أَعْيُنٍ وَاجْعَلْنَا لِلْمُتَّقِينَ إِمَامًا}*','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuu1' ]],]])]);}
if($data ==  'uuuu1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ماورد في قوله تعالى في سورة الشعراء: *{رَبِّ هَبْ لِي حُكْمًا وَأَلْحِقْنِي بِالصَّالِحِينَ* وَاجْعَلْ لِي لِسَانَ صِدْقٍ فِي الآخِرِينَ* وَاجْعَلْنِي مِن وَرَثَةِ جَنَّةِ النَّعِيمِ}*','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuu2' ]],]])]);}
if($data ==  'uuuu2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ما ورد في قوله تعالى في سورة الأحقاف: {*رَبِّ أَوْزِعْنِي أَنْ أَشْكُرَ نِعْمَتَكَ الَّتِي أَنْعَمْتَ عَلَيَّ وَعَلَى وَالِدَيَّ وَأَنْ أَعْمَلَ صَالِحًا تَرْضَاهُ وَأَصْلِحْ لِي فِي ذُرِّيَّتِي إِنِّي تُبْتُ إِلَيْكَ وَإِنِّي مِنَ الْمُسْلِمِينَ}*','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuu3' ]],]])]);}
if($data ==  'uuuu3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'ما ورد في قوله تعالى في سورة آل عمران: *{ربَّنَا اغْفِرْ لَنَا ذُنُوبَنَا وَإِسْرَافَنَا فِي أَمْرِنَا وَثَبِّتْ أَقْدَامَنَا وانصُرْنَا عَلَى الْقَوْمِ الْكَافِرِينَ}*','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐁𝐀𝐂𝐊' ,'callback_data'=> 'u4' ]],]])]);}
if($data ==  'u17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'uuuuu' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuu1' ]],]])]);}
if($data ==  'uuuuu1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '*{رَبَّنَا هَبْ لَنَا مِنْ أَزْوَاجِنَا وَذُرِّيَّاتِنَا قُرَّةَ أَعْيُنٍ وَاجْعَلْنَا لِلْمُتَّقِينَ إِمَامًا}*','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuu2' ]],]])]);}
if($data ==  'uuuuu2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> '{*رَبِّ اجْعَلْنِي مُقِيمَ الصَّلَاةِ وَمِنْ ذُرِّيَّتِي رَبَّنَا وَتَقَبَّلْ دُعَاءِ * رَبَّنَا اغْفِرْ لِي وَلِوَالِدَيَّ وَلِلْمُؤْمِنِينَ يَوْمَ يَقُومُ الْحِسَابُ}*','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuu3' ]],]])]);}
if($data ==  'uuuuu3' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'اللّهمَّ إنّك عفوٌّ تحبُّ العفوَ فاعفُ عنّي','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐁𝐀𝐂𝐊' ,'callback_data'=> 'u11' ]],]])]);}
if($data ==  'u17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data ==  'uuuuuu' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'يقول المسلم إذا أراد الخروج من المنزل لسفرٍ أو لغيره ما ورد عن أنس بن مالك -رضي الله عنه- أن رسول الله -صلى الله عليه وسلم- قال: ( مَنْ قالَ - يعني إذا خرج من بيته - : باسْمِ اللَّهِ ، تَوَكَّلْتُ على اللَّهِ ، وَلاَ حَوْلَ وَلاَ قُوَّةَ إِلاَّ باللَّهِ . يُقالُ لَهُ : كُفِيتَ وَوُقِيتَ وَهُدِيتَ ، فَتَتَنَحَّى لَهُ الشَّيَاطِينُ ، فَيَقُولُ لَهُ شَيطَانٌ آخَرُ : كَيْفَ لَكَ بِرَجُلٍ قَدْ هُدِيَ وكُفِيَ وَوُقِيَ ) ؟ ','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuuu1' ]],]])]);}
if($data ==  'uuuuuu1' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المسافر للمقيم:  ( أَسْتَوْدِعُكُمُ اللَّهَ الَّذِي لاَ تَضِيعُ وَدَائِعُهُ )','parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuuu2' ]],]])]);}
if($data ==  'uuuuuu2' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=> 'دعاء المقيم للمسافر:  ( أَسْتَوْدِعُ اللَّهَ دِينَكَ، وَأَمَانَتَكَ، وَخَوَاتِيمَ عَمَلِكَ"، ويقول أيضًا: "زَوَّدَكَ اللَّهُ التَّقْوَى، وَغَفَرَ ذَنْبَكَ، وَيَسَّرَ لَكَ الخَيْرَ حَيْثُ ما كُنْتَ )',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuuu3' ]],]])]);}
if($data ==  'uuuuuu3' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text' => 'الذِكر أثناء السفر:   الإكثار من التكبير والتسبيح، قَالَ جَابِرٌ رضي الله عنه : ( كُنَّا إِذَا صَعَدْنَا كَبَّرْنَا، وَإِذَا نَزَلْنَا سَبَّحْنَا )', 'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => '𝐍𝐄𝐗𝐓 ' ,'callback_data'=> 'uuuuuu4' ]]]])]);}
if($data ==  'uuuuuu4' ){bot('editMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id, 'text' => 'دعاء المسافر إذا أسحر:  ( سَمَّعَ سَامِعٌ بِحَمْدِ اللَّهِ، وَحُسْنِ بَلاَئِهِ عَلَيْنَا، رَبَّنَا صاحِبْنَا، وَأَفْضِلْ عَلَيْنَا، عَائِذاً بِاللَّهِ مِنَ النَّارِ". دعاء المسافر إذا نزل منزلًا: "أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّاتِ مِنْ شَرِّ مَا خَلَقَ )',  'parse_modemode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => '𝐁𝐀𝐂𝐊' ,'callback_data'=> 'u13' ]]]])]);}
if($data ==  'u17' ){bot('editMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>"- قران",'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"starta"]],]])]);}
if($data=="Qasass"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>" قسم قصص القران الكريم",'disable_web_page_preview'=> true , 'parse_mode'=>"Markdown", 'reply_markup'=>json_encode([ 'inline_keyboard'=>[[['text'=>"قصة ادم عليه السلام",'callback_data'=>'sn1'],['text'=>"قصة ادريس عليه السلام",'callback_data'=>'sn2']],[['text'=>"قصة نوح عليه السلام",'callback_data'=>'sn3'],['text'=>"قصة يوشع بن نون عليه السلام",'callback_data'=>'sn4']],[['text'=>"قصة هود عليه السلام",'callback_data'=>'sn5'],['text'=>"قصة ابراهيم عليه السلام",'callback_data'=>'sn6']],[['text'=>"قصة لوط عليه السلام",'callback_data'=>'sn7'],['text'=>"قصة العزير عليه السلام",'callback_data'=>'sn8']],[['text'=>"قصة موسى عليه السلام",'callback_data'=>'sn9'],['text'=>"قصة ايوب عليه السلام",'callback_data'=>'sn10']],[['text'=>"قصة سليمان عليه السلام",'callback_data'=>'sn11'],['text'=>"قصة صالح عليه السلام",'callback_data'=>'sn12']],[['text'=>"قصة يونس عليه السلام",'callback_data'=>'sn13'],['text'=>"قصة يوسف عليه السلام",'callback_data'=>'sn14']],[['text'=>"قصة ابليس والرجل الصالح",'callback_data'=>'sn15'],['text'=>"قصة ذو القرنين",'callback_data'=>'sn16']],[['text'=>"قصة قابيل وهابيل",'callback_data'=>'sn17'],['text'=>"قصة اصحاب السبت",'callback_data'=>'sn18']],[['text'=>"قصة بقرة بنو اسرائيل",'callback_data'=>'sn19'],['text'=>"قصة اصحاب الكهف",'callback_data'=>'sn20']],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "sn1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/24",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/11",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn3"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/25",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn4"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/6",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn5"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/2",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn6"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/23",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn7"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/3",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn8"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/8",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn9"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/5",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn10"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/4",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn11"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/7",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn12"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/9",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn13"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/10",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn14"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/12",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn15"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/13",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn16"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/14",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn17"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/15",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn18"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/16",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn19"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/17",'reply_to_message_id'=>$message->message_id,]);}
if($data == "sn20"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/18",'reply_to_message_id'=>$message->message_id,]);}
if($data=="roqua"){bot('editMessageText',[ 'chat_id'=>$chat_id, 'message_id'=>$message_id, 'text'=>"قسم قصص الرقيه الشرعيه ",'disable_web_page_preview'=> true ,'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[[ 'text' => 'ياسر الدوسري .','callback_data'=>'mt1' ],['text'=> 'ماهر المعيقلي' ,'callback_data'=>'mt2']] ,[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"deneyy"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "mt1"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/20",'reply_to_message_id'=>$message->message_id,]);}
if($data == "mt2"){bot('sendaudio',['chat_id'=>$chat_id, 'audio'=>"https://t.me/sand_199/17",'reply_to_message_id'=>$message->message_id,]);}
if($text == 'طرائف' || $text == 'ضحك' || $text == 'ضحكني'){ bot('sendphoto',['chat_id'=>$chat_id,photo =>"https://t.me/photojack14366/11",'caption'=>'اختر الفيديو الذي تفضله', 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"ag1"],['text'=>' 2 ','callback_data'=>"ag2"],['text'=>' 3 ','callback_data'=>"ag3"],['text'=>' 4 ','callback_data'=>"ag4"]],[['text'=>' 5','callback_data'=>"ag5"],['text'=>' 6 ','callback_data'=>"ag6"],['text'=>' 7ر','callback_data'=>"ag7"],['text'=>' 8 ','callback_data'=>"ag8"]],[['text'=>' 9 ','callback_data'=>"ag9"],['text'=>' 10 ','callback_data'=>"ag10"],['text'=>' 11 ','callback_data'=>"ag11"],['text'=>' 12 ','callback_data'=>"ag12"]],[['text'=>' 13 ','callback_data'=>"ag13"],['text'=>' 14 ','callback_data'=>"ag14"],['text'=>' 15 ','callback_data'=>"ag15"],['text'=>' 16  ','callback_data'=>"ag16"]],[['text'=>' 17 ','callback_data'=>"ag17"],['text'=>' 18 ','callback_data'=>"ag18"],['text'=>' 19','callback_data'=>"ag19"],['text'=>' 20 ','callback_data'=>"ag20"]],[['text'=>' 21 ','callback_data'=>"ag21"],['text'=>' 22 ','callback_data'=>"ag22"],['text'=>' 23 ','callback_data'=>"ag23"],['text'=>' 24 ','callback_data'=>"ag24"]],[['text'=>' 25 ','callback_data'=>"ag25"],['text'=>' 26 ','callback_data'=>"ag26"],['text'=>' 27 ','callback_data'=>"ag27"],['text'=>' 28 ','callback_data'=>"ag28"]],[['text'=>' 29 ','callback_data'=>"ag29"],['text'=>' 30' ,'callback_data'=>"ag30"],['text'=>' 31 ','callback_data'=>"ag31"],['text'=>' 32 ','callback_data'=>"ag32"]],[['text'=>' 33 ','callback_data'=>"ag33"],['text'=>' 34 ','callback_data'=>"ag34"],['text'=>' 35 ','callback_data'=>"ag35"],['text'=>' 36 ','callback_data'=>"ag36"]],[['text'=>' 37 ','callback_data'=>"ag37"],['text'=>' 38 ','callback_data'=>"ag38"],['text'=>' 39 ','callback_data'=>"ag39"],['text'=>' 40 ','callback_data'=>"ag40"]],[['text'=>' 41 ','callback_data'=>"ag41"],['text'=>' 42 ','callback_data'=>"ag42"],['text'=>' 43 ','callback_data'=>"ag43"],['text'=>' 44 ','callback_data'=>"ag44"]],[['text'=>' 45 ','callback_data'=>"ag45"],['text'=>' 46 ','callback_data'=>"ag46"],['text'=>' 47 ','callback_data'=>"ag47"],['text'=>' 48 ','callback_data'=>"ag48"]],[['text'=>' 49 ','callback_data'=>"ag49"],['text'=>' 50 ','callback_data'=>"ag50"],['text'=>' 51 ','callback_data'=>"ag51"],['text'=>' 52 ','callback_data'=>"ag52"]],[['text'=>' 53 ','callback_data'=>"ag53"],['text'=>' 54 ','callback_data'=>"ag54"],['text'=>' 55 ','callback_data'=>"ag55"],['text'=>' 56 ','callback_data'=>"ag56"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ddd" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/11",'caption'=>'اختر الفيديو الذي تفضله','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' 1','callback_data'=>"ag1"],['text'=>' 2 ','callback_data'=>"ag2"],['text'=>' 3 ','callback_data'=>"ag3"],['text'=>' 4 ','callback_data'=>"ag4"]],[['text'=>' 5','callback_data'=>"ag5"],['text'=>' 6 ','callback_data'=>"ag6"],['text'=>' 7ر','callback_data'=>"ag7"],['text'=>' 8 ','callback_data'=>"ag8"]],[['text'=>' 9 ','callback_data'=>"ag9"],['text'=>' 10 ','callback_data'=>"ag10"],['text'=>' 11 ','callback_data'=>"ag11"],['text'=>' 12 ','callback_data'=>"ag12"]],[['text'=>' 13 ','callback_data'=>"ag13"],['text'=>' 14 ','callback_data'=>"ag14"],['text'=>' 15 ','callback_data'=>"ag15"],['text'=>' 16  ','callback_data'=>"ag16"]],[['text'=>' 17 ','callback_data'=>"ag17"],['text'=>' 18 ','callback_data'=>"ag18"],['text'=>' 19','callback_data'=>"ag19"],['text'=>' 20 ','callback_data'=>"ag20"]],[['text'=>' 21 ','callback_data'=>"ag21"],['text'=>' 22 ','callback_data'=>"ag22"],['text'=>' 23 ','callback_data'=>"ag23"],['text'=>' 24 ','callback_data'=>"ag24"]],[['text'=>' 25 ','callback_data'=>"ag25"],['text'=>' 26 ','callback_data'=>"ag26"],['text'=>' 27 ','callback_data'=>"ag27"],['text'=>' 28 ','callback_data'=>"ag28"]],[['text'=>' 29 ','callback_data'=>"ag29"],['text'=>' 30' ,'callback_data'=>"ag30"],['text'=>' 31 ','callback_data'=>"ag31"],['text'=>' 32 ','callback_data'=>"ag32"]],[['text'=>' 33 ','callback_data'=>"ag33"],['text'=>' 34 ','callback_data'=>"ag34"],['text'=>' 35 ','callback_data'=>"ag35"],['text'=>' 36 ','callback_data'=>"ag36"]],[['text'=>' 37 ','callback_data'=>"ag37"],['text'=>' 38 ','callback_data'=>"ag38"],['text'=>' 39 ','callback_data'=>"ag39"],['text'=>' 40 ','callback_data'=>"ag40"]],[['text'=>' 41 ','callback_data'=>"ag41"],['text'=>' 42 ','callback_data'=>"ag42"],['text'=>' 43 ','callback_data'=>"ag43"],['text'=>' 44 ','callback_data'=>"ag44"]],[['text'=>' 45 ','callback_data'=>"ag45"],['text'=>' 46 ','callback_data'=>"ag46"],['text'=>' 47 ','callback_data'=>"ag47"],['text'=>' 48 ','callback_data'=>"ag48"]],[['text'=>' 49 ','callback_data'=>"ag49"],['text'=>' 50 ','callback_data'=>"ag50"],['text'=>' 51 ','callback_data'=>"ag51"],['text'=>' 52 ','callback_data'=>"ag52"]],[['text'=>' 53 ','callback_data'=>"ag53"],['text'=>' 54 ','callback_data'=>"ag54"],['text'=>' 55 ','callback_data'=>"ag55"],['text'=>' 56 ','callback_data'=>"ag56"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "ag1"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/183",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag2"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/184",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag3"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/185",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag4"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/186",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag5"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/187",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag6"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/188",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag7"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/189",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag8"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/190",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag9"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/191",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag10"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/192",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag11"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/193",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag12"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/194",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag13"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/195",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag14"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/196",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag15"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/197",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag16"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/198",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag17"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/199",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag18"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/200",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag19"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/201",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag20"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/202",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag21"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/203",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag22"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/204",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag23"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/205",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag24"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/206",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag25"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/207",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag26"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/208",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag27"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/209",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag28"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/210",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag29"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/211",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag30"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/212",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag31"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/213",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag32"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/214",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag33"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/215",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag34"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/216",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag35"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/217",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag36"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/218",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag37"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/219",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag38"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/220",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag39"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/221",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag40"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/222",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag41"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/223",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag42"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/224",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag43"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/225",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag44"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/226",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag45"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/227",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag46"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/228",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag47"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/229",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag48"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/230",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag49"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/231",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag50"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/232",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag51"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/233",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag52"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/234",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag53"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/235",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag54"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/236",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag55"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/237",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ag56"){bot('sendvideo',['chat_id'=>$chat_id,  'video'=>"https://t.me/pbkvhvif/238",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($text == 'اغاني' || $text == 'الاغاني'){ bot('sendMessage',[ 'chat_id'=>$chat_id,  'text'=>"❍ اختر نوع اغنيتك", 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'مصري','callback_data'=>"aganeyy1"],['text'=>'اجنبي','callback_data'=>"aganeyy2"]],[['text'=>'سوري','callback_data'=>"soureee6y"]],[['text'=>'عراقي','callback_data'=>"erak8eyy"],['text'=>'تركي','callback_data'=>"tork4eyy"]],[['text'=>'سعودي','callback_data'=>"soode4y"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "aganeyy" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اختر نوع اغنيتك  ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'مصري','callback_data'=>"aganeyy1"],['text'=>'اجنبي','callback_data'=>"aganeyy2"]],[['text'=>'سوري','callback_data'=>"soureee6y"]],[['text'=>'عراقي','callback_data'=>"erak8eyy"],['text'=>'تركي','callback_data'=>"tork4eyy"]],[['text'=>'سعودي','callback_data'=>"soode4y"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "aganeyy1" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اختر اغنيتك ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'ويجز ❍','callback_data'=>"wegz"],['text'=>'بابلو ❍','callback_data'=>"bablo"],['text'=>'الجوكر ❍','callback_data'=>"elgoker"]],[['text'=>'ابيوسف ❍','callback_data'=>"abyo"],['text'=>'مروان موسي ❍','callback_data'=>"maro"],['text'=>'عفروتو ❍','callback_data'=>"afrt"]],[['text'=>'عنبه ❍','callback_data'=>"anpa"],['text'=>'محمد سعيد ❍','callback_data'=>"sidoo"],['text'=>'عمار حسني ❍','callback_data'=>"amrhos"]],[['text'=>'شاكوش ❍','callback_data'=>"skosh"],['text'=>'عمرو دياب ❍','callback_data'=>"diab"],['text'=>'اصالة ❍','callback_data'=>"asala"]],[['text'=>'احمد كامل ❍','callback_data'=>"kaml"],['text'=>'حسين الجسمي ❍','callback_data'=>"gsmy"],['text'=>'رامي صبري ❍','callback_data'=>"sabryy"]],[['text'=>'حماقي ❍','callback_data'=>"hmaki"],['text'=>'بيكا ❍','callback_data'=>"bika"],['text'=>'تامر حسني ❍','callback_data'=>"hosnyy"]],[['text'=>'مسلم ❍','callback_data'=>"muslim"],['text'=>'شاهين ❍','callback_data'=>"sahyn"],['text'=>'باتيستوتا ❍','callback_data'=>"batisto"]],[['text'=>'ويزي ❍','callback_data'=>"wezy"],['text'=>'ابو الانوار ❍','callback_data'=>"anoar"],['text'=>'مهرجانات ❍','callback_data'=>"mahrgan"]],[['text'=>'شاموفرز ❍','callback_data'=>"shrmof"],['text'=>'كاريوكي ❍','callback_data'=>"karoki"],['text'=>'احمد مكي ❍','callback_data'=>"mikoo"]],[['text'=>'اوكا واورتيجا ❍','callback_data'=>"okaworti"],['text'=>'سعد المجرد ❍','callback_data'=>"elmgrd"],['text'=>'اليسا ❍','callback_data'=>"lisao"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy"]],]])]);}
if($data == "lisao" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني اليسا ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ صاحبه رأي','callback_data'=>"lisao1"],['text'=>' ❍ نفسي أقوله','callback_data'=>"lisao2"]],[['text'=>'❍ مكتوبه ليك ','callback_data'=>"lisao3"],['text'=>' ❍عكس الي شايفنها','callback_data'=>"lisao4"]],[['text'=>'❍ ع بالي حبيبي ','callback_data'=>"lisao5"],['text'=>'❍ كارهني','callback_data'=>"lisao6"]],[['text'=>'❍ وفي','callback_data'=>"lisao7"],['text'=>'❍ ياريت','callback_data'=>"lisao8"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "lisao1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/683",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/684",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/685",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/686",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/687",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/688",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/689",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "lisao8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/690",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  قائمه اغاني سعد المجرد ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ عدي الكلام','callback_data'=>"elmgrd1"],['text'=>' ❍ غزالي','callback_data'=>"elmgrd2"]],[['text'=>'❍ إنساي ','callback_data'=>"elmgrd3"],['text'=>' ❍غلطانه','callback_data'=>"elmgrd4"]],[['text'=>'❍ يخليك للي ','callback_data'=>"elmgrd5"],['text'=>'❍ معلم','callback_data'=>"elmgrd6"]],[['text'=>'❍ انتي','callback_data'=>"elmgrd7"],['text'=>'❍ كزبلانكا','callback_data'=>"elmgrd8"]],[['text'=>'❍ نجيبك نجيبك','callback_data'=>"elmgrd9"],['text'=>'❍اسف حبيبي ','callback_data'=>"elmgrd10"]],[['text'=>'❍ ليت جو','callback_data'=>"elmgrd11"],['text'=>'❍مال حبيبي ','callback_data'=>"elmgrd12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "elmgrd1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/671",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/672",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/673",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/674",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/675",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/676",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/677",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/678",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/679",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/680",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/681",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elmgrd12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/682",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني اوكا واورتيجا ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ لغه العيون','callback_data'=>"okaworti1"],['text'=>' ❍ واحده عملتلي عمل','callback_data'=>"okaworti2"]],[['text'=>'❍ دلع بنات ','callback_data'=>"okaworti3"],['text'=>' ❍ العب يلا','callback_data'=>"okaworti4"]],[['text'=>'❍ 1991 ','callback_data'=>"okaworti5"],['text'=>'❍ امتي','callback_data'=>"okaworti6"]],[['text'=>'❍ طب ليه كده','callback_data'=>"okaworti7"],['text'=>'❍ هنولع','callback_data'=>"okaworti8"]],[['text'=>'❍ نوزهي','callback_data'=>"okaworti9"],['text'=>'❍ سوري ','callback_data'=>"okaworti10"]],[['text'=>'❍ فامبير','callback_data'=>"okaworti11"],['text'=>'❍ دوس بنزين ','callback_data'=>"okaworti12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "okaworti1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/659",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/660",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/661",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/662",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/663",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/664",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/665",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/666",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/667",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/668",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/669",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "okaworti12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/670",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mikoo" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني احمد مكي ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'قطر الحياه ❍','callback_data'=>"mikoo1"],['text'=>'اخره الشقاوه❍','callback_data'=>"mikoo2"]],[['text'=>'ايام زمان❍','callback_data'=>"mikoo3"],['text'=>'طرقت بابك ❍','callback_data'=>"mikoo4"]],[['text'=>'وقفه ناصيه زمان❍','callback_data'=>"mikoo5"],['text'=>'الحاسه السابعه ❍','callback_data'=>"mikoo6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "mikoo1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/653",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mikoo2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/654",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mikoo3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/655",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mikoo4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/656",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mikoo5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/657",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mikoo6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/658",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني كاريوكي ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'يا ابيض يا اسود ❍','callback_data'=>"karoki1"],['text'=>'كان لك معايا❍','callback_data'=>"karoki2"]],[['text'=>'الكيف❍','callback_data'=>"karoki3"],['text'=>'السكه شمال في شمال ❍','callback_data'=>"karoki4"]],[['text'=>'الديناصور❍','callback_data'=>"karoki5"],['text'=>'هاتلنا بالباقي لبان ❍','callback_data'=>"karoki6"]],[['text'=>'انا السجاره ❍','callback_data'=>"karoki7"],['text'=>'نقطه بيضا ❍','callback_data'=>"karoki8"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "karoki1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/643",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/644",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/645",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/648",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/649",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/650",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/651",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "karoki8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/652",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني شارموفرز ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'سنجل ❍','callback_data'=>"shrmof1"],['text'=>'خمسه سنتي❍','callback_data'=>"shrmof2"]],[['text'=>'زومبي❍','callback_data'=>"shrmof3"],['text'=>'انفصام ❍','callback_data'=>"shrmof4"]],[['text'=>'ايزي موني❍','callback_data'=>"shrmof5"],['text'=>'خلاص هسيطر ❍','callback_data'=>"shrmof6"]],[['text'=>'زامبا ❍','callback_data'=>"shrmof7"],['text'=>'مفتقد الحبيبه ❍','callback_data'=>"shrmof8"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "shrmof1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/635",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/636",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/637",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/638",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/639",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/640",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/642",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shrmof8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/641",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني مسلم ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'يا صحبه ورا الستاره ❍','callback_data'=>"muslim1"],['text'=>'بتوع مصالح❍','callback_data'=>"muslim2"]],[['text'=>'قلبي عايز صرمه❍','callback_data'=>"muslim3"],['text'=>'مولود كبير ❍','callback_data'=>"muslim4"]],[['text'=>'اضربت بكيف وخمره❍','callback_data'=>"muslim5"],['text'=>'اربع حيطان ❍','callback_data'=>"muslim6"]],[['text'=>'حرب وحوش ❍','callback_data'=>"muslim7"],['text'=>'هضرب عيار ❍','callback_data'=>"muslim8"]],[['text'=>'الاسم دبابه ❍','callback_data'=>"muslim9"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "muslim1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/194",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/195",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim3"){
bot('sendaudio',[
 'chat_id'=>$chat_id,
 audio =>"https://t.me/amk7adr/196",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/197",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/198",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/199",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/200",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/201",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "muslim9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/202",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>' قائمه اغاني ابيوسف ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ سيستم','callback_data'=>"abyo1"],['text'=>' ❍ مونشاكو','callback_data'=>"abyo2"]],[['text'=>'❍ نا نا نا','callback_data'=>"abyo3"],['text'=>' ❍ فوقني','callback_data'=>"abyo4"]],[['text'=>'❍ باشا اعتمد','callback_data'=>"abyo5"],['text'=>'❍ استلم يا هيثم','callback_data'=>"abyo6"]],[['text'=>'❍ انترو','callback_data'=>"abyo7"],['text'=>'❍ كان ف دماغي','callback_data'=>"abyo8"]],[['text'=>'❍ عظمه','callback_data'=>"abyo9"],['text'=>'❍ نافثلين','callback_data'=>"abyo10"]],[['text'=>'❍ عمر','callback_data'=>"abyo11"],['text'=>'❍ انا مش هقدر حد','callback_data'=>"abyo12"]],[['text'=>'❍ عزرائيل ','callback_data'=>"abyo13"],['text'=>'❍ ثانوس','callback_data'=>"abyo14"]],[['text'=>'❍ ولا مسا','callback_data'=>"abyo15"],['text'=>'❍ محدش له عندي حاجه','callback_data'=>"abyo16"]],[['text'=>'❍ مورتال كومبات','callback_data'=>"abyo17"],['text'=>'❍ يوم الاتنين','callback_data'=>"abyo18"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "abyo1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/481",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/482",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/483",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/484",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/485",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/486",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/487",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/488",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/489",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/490",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/491",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/492",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/493",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/494",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo16"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/495",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo17"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/496",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo15"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/497",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "abyo18"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/498",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه المهرجانات ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'عملت بلوك ❍','callback_data'=>"mahrgan1"],['text'=>'ابطال ومشتهم مرا ❍','callback_data'=>"mahrgan2"]],[['text'=>'كرهت الناس ❍','callback_data'=>"mahrgan3"],['text'=>'ندمانه ❍','callback_data'=>"mahrgan4"]],[['text'=>'يلا اكشن ❍','callback_data'=>"mahrgan5"],['text'=>'في القرايب ❍','callback_data'=>"mahrgan6"]],[['text'=>'قلبي ميت ❍','callback_data'=>"mahrgan7"],['text'=>'اخواتي ❍','callback_data'=>"mahrgan8"]],[['text'=>'خاينه وبايعه ❍','callback_data'=>"mahrgan9"],['text'=>'بركان فجر ❍','callback_data'=>"mahrgan10"]],[['text'=>'مع السلامه ❍','callback_data'=>"mahrgan11"],['text'=>'وقت عوزه ❍','callback_data'=>"mahrgan12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "mahrgan1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/259",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/260",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/261",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/262",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/263",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/264",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/265",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/266",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/267",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/269",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/268",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mahrgan10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/270",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني اصالة ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ جيتني مكسور','callback_data'=>"asala1"],['text'=>' ❍ اتحبني','callback_data'=>"asala2"]],[['text'=>'❍ جابو سيرته','callback_data'=>"asala3"],['text'=>' ❍ ذاك الغبي','callback_data'=>"asala4"]],[['text'=>'❍ بنت اكابر','callback_data'=>"asala5"],['text'=>'❍ 60 دقيقه','callback_data'=>"asala6"]],[['text'=>'❍ لا تخاف','callback_data'=>"asala7"],['text'=>'❍ عقوبه','callback_data'=>"asala8"]],[['text'=>'❍ كبير الشوق','callback_data'=>"asala9"],['text'=>'❍ شامخ','callback_data'=>"asala10"]],[['text'=>'❍ اكثر','callback_data'=>"asala11"],['text'=>'❍ كان يهمني','callback_data'=>"asala12"]],[['text'=>'❍ مبقاش انا ','callback_data'=>"asala13"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "asala1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/365",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/366",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/367",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/368",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/369",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/370",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/371",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/372",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/373",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/374",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/375",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/376",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "asala13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/377",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker" ){bot('EditMessageText',['chat_id'=>$chat_id, 'message_id'=>$message_id,'text'=>'❍ قائمه اغاني الجوكر ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ سلمي ١','callback_data'=>"elgoker1"],['text'=>' ❍ سلمي ٢','callback_data'=>"elgoker2"]],[['text'=>'❍اختلافنا رحمه','callback_data'=>"elgoker3"],['text'=>' ❍ الواقع','callback_data'=>"elgoker4"]],[['text'=>'❍ فصله','callback_data'=>"elgoker5"],['text'=>'❍مناسك الالم','callback_data'=>"elgoker6"]],[['text'=>'❍ الكبت','callback_data'=>"elgoker7"],['text'=>'❍ انفصام حاد ١','callback_data'=>"elgoker8"]],[['text'=>'❍ انفصام حاد ٢','callback_data'=>"elgoker9"],['text'=>'❍ كوبايه عصير','callback_data'=>"elgoker10"]],[['text'=>'❍ حلم كبير','callback_data'=>"elgoker11"],['text'=>'❍ فراق صالونات','callback_data'=>"elgoker12"]],[['text'=>'❍ عالم تالت ','callback_data'=>"elgoker13"],['text'=>'❍ عالم رابع','callback_data'=>"elgoker14"]],[['text'=>'❍ الوصايا ','callback_data'=>"elgoker15"],['text'=>'❍ العقد ','callback_data'=>"elgoker16"]],[['text'=>'❍ خد فشار','callback_data'=>"elgoker17"],['text'=>'❍ فرصه تانيه','callback_data'=>"elgoker18"]],[['text'=>'❍ دا تقدير','callback_data'=>"elgoker19"],['text'=>'❍قصيده ','callback_data'=>"elgoker20"]],[['text'=>'قطه مغمضه ❍','callback_data'=>"elgoker 21"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "elgoker1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/504",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/505",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/506",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/507",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/508",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/509",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/510",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/511",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/512",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/513",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/514",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/515",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/516",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/517",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker15"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/518",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker16"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/519",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker17"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/520",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker18"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/521",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker19"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/522",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker20"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/523",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "elgoker21"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/524",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy" ){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني تامر حسني ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ ناسيني ليه','callback_data'=>"hosnyy1"],['text'=>' ❍ عيش بشوقكك','callback_data'=>"hosnyy2"]],[['text'=>'❍ كل سنه وانت طيب','callback_data'=>"hosnyy3"],['text'=>' ❍ميت وش ','callback_data'=>"hosnyy4"]],[['text'=>'❍ الله شاهد','callback_data'=>"hosnyy5"],['text'=>'❍ حلم سنين','callback_data'=>"hosnyy6"]],[['text'=>'❍ عمري ابتدي','callback_data'=>"hosnyy7"],['text'=>'❍ كفاياك اعذار','callback_data'=>"hosnyy8"]],[['text'=>'❍ كل حاجه','callback_data'=>"hosnyy9"],['text'=>'❍ واخيرا','callback_data'=>"hosnyy10"]],[['text'=>'❍ ثمن اختيار','callback_data'=>"hosnyy11"],['text'=>'❍ورد صناعي','callback_data'=>"hosnyy12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "hosnyy1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/293",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/294",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/295",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/296",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/297",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/298",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/299",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/300",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/301",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/302",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/303",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hosnyy12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/304",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني حسن شاكوش ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'بنت الجيران ❍','callback_data'=>"skosh1"],['text'=>'هنعمل لغبطيطا ❍','callback_data'=>"skosh2"]],[['text'=>'عود البطل ❍','callback_data'=>"skosh3"],['text'=>'عود البنات ❍','callback_data'=>"skosh4"]],[['text'=>'شمس المجره ❍','callback_data'=>"skosh5"],['text'=>'بونبوني ساقط ❍','callback_data'=>"skosh6"]],[['text'=>'جيشنا الابيض ❍','callback_data'=>"skosh7"],['text'=>'انا علي وضعي ❍','callback_data'=>"skosh8"]],[['text'=>'يا ابن امك ❍','callback_data'=>"skosh9"],['text'=>'خربانه انتي ❍','callback_data'=>"skosh10"]],[['text'=>'صاحبي دراعي ❍','callback_data'=>"skosh11"],['text'=>'يا بنت قلبي ❍','callback_data'=>"skosh12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "skosh1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/280",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/281",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/282",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/283",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/284",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/285",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/286",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/287",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/288",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/289",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/290",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "skosh12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/291",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني حماقي ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ من البدايه','callback_data'=>"hmaki1"],['text'=>' ❍ قدام الناس','callback_data'=>"hmaki2"]],[['text'=>'❍ يا ستار','callback_data'=>"hmaki3"],['text'=>' ❍ راسمك في خيالي','callback_data'=>"hmaki4"]],[['text'=>'❍ ما بلاش','callback_data'=>"hmaki5"],['text'=>'❍ واعمل ايه','callback_data'=>"hmaki6"]],[['text'=>'❍ واحده واحده','callback_data'=>"hmaki7"],['text'=>'❍ من قلبي بغني','callback_data'=>"hmaki8"]],[['text'=>'❍ قالو عنك','callback_data'=>"hmaki9"],['text'=>'❍ تعرف بحبك ليه','callback_data'=>"hmaki10"]],[['text'=>'❍ ياللي زعلان','callback_data'=>"hmaki11"],['text'=>'❍ بقيت معاه','callback_data'=>"hmaki12"]],[['text'=>'❍ اجمل يوم ','callback_data'=>"hmaki13"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "hmaki1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/536",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/352",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/353",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/354",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/355",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/356",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/357",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/358",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/359",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/360",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/361",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/362",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hmaki13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/363",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني عنبه ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ هنا القاهره','callback_data'=>"anpa1"],['text'=>' ❍ حرب القرود','callback_data'=>"anpa2"]],[['text'=>'❍العملاق ','callback_data'=>"anpa3"],['text'=>' ❍ دنيا الموالد','callback_data'=>"anpa4"]],[['text'=>'❍ عالم الجريمه','callback_data'=>"anpa5"],['text'=>'❍ الليله باظت','callback_data'=>"anpa6"]],[['text'=>'❍ العين علينا','callback_data'=>"anpa7"],['text'=>'❍ ظاطت','callback_data'=>"anpa8"]],[['text'=>'❍ كينج اللعبه','callback_data'=>"anpa9"],['text'=>'❍ جينا ترجعو','callback_data'=>"anpa10"]],[['text'=>'❍القفاص ','callback_data'=>"anpa11"],['text'=>'❍ مفيش اصول','callback_data'=>"anpa12"]],[['text'=>'❍طيارات ','callback_data'=>"anpa13"],['text'=>'❍ غشيم','callback_data'=>"anpa14"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "anpa1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/382",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/383",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/384",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/385",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/386",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/387",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/389",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/390",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/391",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/392",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/393",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/394",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/395",
'caption'=>"𝙲𝙷 ??. : @UU_FUCK",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anpa14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/396",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  قائمه اغاني ابو الانوار ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ عسليه','callback_data'=>"anoar1"],['text'=>' ❍ مقصوره','callback_data'=>"anoar2"]],[['text'=>'❍انجز ','callback_data'=>"anoar3"],['text'=>' ❍ لول','callback_data'=>"anoar4"]],[['text'=>'❍ غلبه','callback_data'=>"anoar5"],['text'=>'❍ اتغيرنا','callback_data'=>"anoar6"]],[['text'=>'❍ صبحي','callback_data'=>"anoar7"],['text'=>'❍ سكو','callback_data'=>"anoar8"]],[['text'=>'❍ بارات','callback_data'=>"anoar9"],['text'=>'❍البويرتو ','callback_data'=>"anoar10"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}if($data == "anoar1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/527",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/528",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/529",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/530",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/531",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/532",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/533",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/534",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/535",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "anoar10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/537",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني بيكا ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ هاتلي فوديكا','callback_data'=>"bika1"],['text'=>' ❍ وداع يا دنيا','callback_data'=>"bika2"]],[['text'=>'❍هلا والله ','callback_data'=>"bika3"],['text'=>' ❍ باتون ساليه','callback_data'=>"bika4"]],[['text'=>'❍ انا حبيتك وجرحتيني','callback_data'=>"bika5"],['text'=>'❍ انا بيكا ماي لاف فانز','callback_data'=>"bika6"]],[['text'=>'❍ عالم فاسد','callback_data'=>"bika7"],['text'=>'❍ رب الكون','callback_data'=>"bika8"]],[['text'=>'❍ شارب المرار','callback_data'=>"bika9"],['text'=>'❍ حب عمري','callback_data'=>"bika10"]],[['text'=>'❍ صاحبي دراعي','callback_data'=>"bika11"],['text'=>'❍ سكينه برازيلي','callback_data'=>"bika12"]],[['text'=>'❍بنت ابوها ','callback_data'=>"bika13"],['text'=>'❍ مساء النقص','callback_data'=>"bika14"]],[['text'=>'بنتخان ❍','callback_data'=>"bika15"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "bika1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/307",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/308",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/309",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/310",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/311",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/312",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/313",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/314",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/315",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/316",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/317",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/318",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/319",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/320",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bika15"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/321",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني رامي صبري ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>' ❍ خطيره','callback_data'=>"sabryy1"],['text'=>' ❍ غريب الحب','callback_data'=>"sabryy2"]],[['text'=>' ❍ فارق معاك','callback_data'=>"sabryy4"]],[['text'=>'❍ قولو الي عندي','callback_data'=>"sabryy5"],['text'=>'❍ صعبان عليا','callback_data'=>"sabryy6"]],[['text'=>'❍ وعجبي عليك يا زمن','callback_data'=>"sabryy7"],['text'=>'❍ بتاع بنات','callback_data'=>"sabryy8"]],[['text'=>'❍ وبقابل ناس','callback_data'=>"sabryy9"],['text'=>'❍ بتهتمي','callback_data'=>"sabryy10"]],[['text'=>'❍ حكايه حينا','callback_data'=>"sabryy11"],['text'=>'❍ انا بعترفلك','callback_data'=>"sabryy12"]],[['text'=>'حاول تنساني ❍','callback_data'=>"sabryy13"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "sabryy1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/430",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/431",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy3"){
bot('sendaudio',[
 chat_id =>$chat_id,
 audio =>"https://t.me/amk7adr/432",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/433",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/434",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/435",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/436",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/437",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/438",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/439",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/440",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/441",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sabryy13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/442",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني عمار حسني ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'بتيجي ف بالي ❍','callback_data'=>"amrhos1"],['text'=>'برشامه منوم ❍','callback_data'=>"amrhos2"]],[['text'=>'بساط ❍','callback_data'=>"amrhos3"],['text'=>'طفره ❍','callback_data'=>"amrhos4"]],[['text'=>'ترام ❍','callback_data'=>"amrhos5"],['text'=>'هلوسه ❍','callback_data'=>"amrhos6"]],[['text'=>'مسوخ ❍','callback_data'=>"amrhos7"],['text'=>'اخر عازف ❍','callback_data'=>"amrhos8"]],[['text'=>'بلاش تغني ❍','callback_data'=>"amrhos9"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "amrhos1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/341",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/342",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos3"){
bot('sendaudio',[
 chat_id =>$chat_id,
 audio =>"https://t.me/amk7adr/343",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/344",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/345",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/346",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/347",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/348",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "amrhos9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/349",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني باتيستوتا ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'الفا ميل ❍','callback_data'=>"batisto1"],['text'=>'الطوفان ❍','callback_data'=>"batisto2"]],[['text'=>'المولد ❍','callback_data'=>"batisto3"],['text'=>'خطر ❍','callback_data'=>"batisto4"]],[['text'=>'التراب ❍','callback_data'=>"batisto5"],['text'=>'باد ❍','callback_data'=>"batisto6"]],[['text'=>'مظلات ❍','callback_data'=>"batisto7"],['text'=>'نيو ويف  ❍','callback_data'=>"batisto8"]],[['text'=>'ناس ❍','callback_data'=>"batisto9"],['text'=>'بيره ❍','callback_data'=>"batisto10"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "batisto1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/538",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/539",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto3"){
bot('sendaudio',[
 chat_id =>$chat_id,
 audio =>"https://t.me/amk7adr/540",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/541",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/542",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/543",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/544",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/545",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/546",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "batisto10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/547",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني ويزي ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'علي العادي ❍','callback_data'=>"wezy1"],['text'=>'مرجان ❍','callback_data'=>"wezy2"]],[['text'=>'كله بالحب ❍','callback_data'=>"wezy3"],['text'=>'هوم الون ❍','callback_data'=>"wezy4"]],[['text'=>'متقدرش توقني❍','callback_data'=>"wezy5"],['text'=>'بليونير ❍','callback_data'=>"wezy6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "wezy1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/548",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/549",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy3"){
bot('sendaudio',[
 chat_id =>$chat_id,
 audio =>"https://t.me/amk7adr/550",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/551",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/552",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/553",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wezy7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/554",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني شاهين ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'صوت يجع ❍','callback_data'=>"sahyn1"],['text'=>'اكسلانس ❍','callback_data'=>"sahyn2"]],[['text'=>'الفرنده ❍','callback_data'=>"sahyn3"],['text'=>'كوم تراب ❍','callback_data'=>"sahyn4"]],[['text'=>'ايد هون❍','callback_data'=>"sahyn5"],['text'=>'اشرس انواع الصقور ❍','callback_data'=>"sahyn6"]],[['text'=>'زين ❍','callback_data'=>"sahyn7"],['text'=>'كل شيت ❍','callback_data'=>"sahyn8"]],[['text'=>'جديد نوفي ❍','callback_data'=>"sahyn9"],['text'=>'حديث مع الانا ❍','callback_data'=>"sahyn10"]],[['text'=>'سايفر المعادي❍','callback_data'=>"sahyn11"],['text'=>'جامد هيك ❍','callback_data'=>"sahyn12"]],[['text'=>'لولو  ❍','callback_data'=>"sahyn13"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}if($data == "sahyn1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/216",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/217",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/218",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/219",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/220",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/221",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/222",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/223",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/224",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/225",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/226",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/554",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sahyn13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/555",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني احمد كامل ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'قولي ❍','callback_data'=>"kaml1"],['text'=>'مبقتش اخاف ❍','callback_data'=>"kaml2"]],[['text'=>'كان في طفل ❍','callback_data'=>"kaml3"],['text'=>'متزعليش ❍','callback_data'=>"kaml4"]],[['text'=>'مش شرط❍','callback_data'=>"kaml5"],['text'=>'انا رايح ❍','callback_data'=>"kaml6"]],[['text'=>'يا ليل ❍','callback_data'=>"kaml7"],['text'=>'كانسر ❍','callback_data'=>"kaml8"]],[['text'=>'زمن المعجزات ❍','callback_data'=>"kaml9"],['text'=>'جاوبنا ❍','callback_data'=>"kaml10"]],[['text'=>'خليك صاحي  ❍','callback_data'=>"kaml11"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}if($data == "kaml1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/144",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/145",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/146",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/147",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/148",
'caption'=>"𝙲?? 𖣲. : @UU_FUCK",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/149",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/150",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/151",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/152",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/153",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "kaml11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/154",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني حسين الجسمي ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'اه لقيت الطبطه','callback_data'=>"gsmy1"],['text'=>'الحساس ❍','callback_data'=>"gsmy2"]],[['text'=>'خطير ❍','callback_data'=>"gsmy3"],['text'=>'اهواك للموت ❍','callback_data'=>"gsmy4"]],[['text'=>'احبك❍','callback_data'=>"gsmy5"],['text'=>'فديته ❍','callback_data'=>"gsmy6"]],[['text'=>'ابشرك ❍','callback_data'=>"gsmy7"],['text'=>'شفت ❍','callback_data'=>"gsmy8"]],[['text'=>'مهم جدا ❍','callback_data'=>"gsmy9"],['text'=>'الاسير ❍','callback_data'=>"gsmy10"]],[['text'=>'بنعدي ❍','callback_data'=>"gsmy11"],['text'=>'بطل الحكايه ❍','callback_data'=>"gsmy12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "gsmy1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/168",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/169",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/170",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/171",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/172",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/173",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/174",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/175",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/176",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/177",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/178",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "gsmy12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/179",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني عمرو دياب ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'قدام مرايتها ❍','callback_data'=>"diab1"],['text'=>'تملي معاك ❍','callback_data'=>"diab2"]],[['text'=>'يا اجمل عيون ❍','callback_data'=>"diab3"],['text'=>'وماله ❍','callback_data'=>"diab4"]],[['text'=>'هيعيش يفتكرني❍','callback_data'=>"diab5"],['text'=>'ده لو اتساب ❍','callback_data'=>"diab6"]],[['text'=>'اول يوم في البعد ❍','callback_data'=>"diab7"],['text'=>'معاك قلبي ❍','callback_data'=>"diab8"]],[['text'=>'سهران ❍','callback_data'=>"diab9"],['text'=>'جامده بس ❍','callback_data'=>"diab10"]],[['text'=>'حلوه البدايات ❍','callback_data'=>"diab11"],['text'=>'بالضحكه دي ❍','callback_data'=>"diab12"]],[['text'=>'زي مانتي ❍','callback_data'=>"diab13"],['text'=>'عم الطبيب ❍','callback_data'=>"diab14"]],[['text'=>'اماكن السهر ❍','callback_data'=>"diab15"],['text'=>'اهي اهي ❍','callback_data'=>"diab16"]],[['text'=>'حبيت يا قلبي ❍','callback_data'=>"diab17"],['text'=>'رصيف نمره ٥ ❍','callback_data'=>"diab18"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "diab1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/64",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/65",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/66",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/67",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/69",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/70",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/71",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/72",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/74",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/77",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/75",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/76",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/73",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/556",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab15"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/558",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab16"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/559",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab17"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/560",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "diab18"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/557",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني محمد سعيد ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'يا ويلي ❍','callback_data'=>"sidoo1"],['text'=>'جواكي ❍','callback_data'=>"sidoo2"]],[['text'=>'لو ❍','callback_data'=>"sidoo3"],['text'=>'متغير ❍','callback_data'=>"sidoo4"]],[['text'=>'بيني وبينك❍','callback_data'=>"sidoo5"],['text'=>'مش بحكي ❍','callback_data'=>"sidoo6"]],[['text'=>'وحدي لكن ❍','callback_data'=>"sidoo7"],['text'=>'مفيش بديل ❍','callback_data'=>"sidoo8"]],[['text'=>'يامي ❍','callback_data'=>"sidoo9"],['text'=>'راجعه تاني ليه ❍','callback_data'=>"sidoo10"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "sidoo1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/63",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/53",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/52",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/54",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/55",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/56",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/57",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/58",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/59",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sidoo10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/60",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني عفروتو ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'بكار ❍','callback_data'=>"afrt1"],['text'=>'احمد علي اسم جدو ❍','callback_data'=>"afrt2"]],[['text'=>'سجاره ❍','callback_data'=>"afrt3"],['text'=>'خربت ❍','callback_data'=>"afrt4"]],[['text'=>'كوتش اديداس❍','callback_data'=>"afrt5"],['text'=>'ناميجا ❍','callback_data'=>"afrt6"]],[['text'=>'مين دول يلا ❍','callback_data'=>"afrt7"],['text'=>'حبك مات ❍','callback_data'=>"afrt8"]],[['text'=>'بس الا بارد ❍','callback_data'=>"afrt9"],['text'=>'انتو اعدائي ❍','callback_data'=>"afrt10"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}if($data == "afrt1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/124",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/125",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/126",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/127",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/128",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/129",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/130",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/131",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/132",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "afrt10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/561",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني ويجز ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'علي راحتي ❍','callback_data'=>"wegz1"],['text'=>'الغساله❍','callback_data'=>"wegz2"]],[['text'=>'كده كده ❍','callback_data'=>"wegz3"],['text'=>'باظت ❍','callback_data'=>"wegz4"]],[['text'=>'مش هقولك بيبي❍','callback_data'=>"wegz5"],['text'=>'لقطه ❍','callback_data'=>"wegz6"]],[['text'=>'منحوس ❍','callback_data'=>"wegz7"],['text'=>'دورك جاي ❍','callback_data'=>"wegz8"]],[['text'=>'واحد وعشرين ❍','callback_data'=>"wegz9"],['text'=>'اخربان ❍','callback_data'=>"wegz10"]],[['text'=>'سالكه ❍','callback_data'=>"wegz11"],['text'=>'بالسلامه ❍','callback_data'=>"wegz12"]],[['text'=>'اسياد البلد ❍','callback_data'=>"wegz13"],['text'=>'علي راحتي ❍','callback_data'=>"wegz14"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "wegz"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني ويجز ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'علي راحتي ❍','callback_data'=>"wegz1"],['text'=>'الغساله❍','callback_data'=>"wegz2"]],[['text'=>'كده كده ❍','callback_data'=>"wegz3"],['text'=>'باظت ❍','callback_data'=>"wegz4"]],[['text'=>'مش هقولك بيبي❍','callback_data'=>"wegz5"],['text'=>'لقطه ❍','callback_data'=>"wegz6"]],[['text'=>'منحوس ❍','callback_data'=>"wegz7"],['text'=>'دورك جاي ❍','callback_data'=>"wegz8"]],[['text'=>'واحد وعشرين ❍','callback_data'=>"wegz9"],['text'=>'اخربان ❍','callback_data'=>"wegz10"]],[['text'=>'سالكه ❍','callback_data'=>"wegz11"],['text'=>'بالسلامه ❍','callback_data'=>"wegz12"]],[['text'=>'اسياد البلد ❍','callback_data'=>"wegz13"],['text'=>'علي راحتي ❍','callback_data'=>"wegz14"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}if($data == "wegz1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/3",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/4",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/5",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/6",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/7",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/8",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/9",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/10",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/11",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/12",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/562",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/563",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/564",
  'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "wegz14"){bot('sendaudio',['chat_id'=>$chat_id,audio =>"https://t.me/amk7adr/565",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني بابلو ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'اتاري ❍','callback_data'=>"bablo1"],['text'=>'سكانيا❍','callback_data'=>"bablo2"]],[['text'=>'افتر بارتي❍','callback_data'=>"bablo3"],['text'=>'فري ❍','callback_data'=>"bablo4"]],[['text'=>'سندباد❍','callback_data'=>"bablo5"],['text'=>'ابو مكه ❍','callback_data'=>"bablo6"]],[['text'=>'فولكلور ❍','callback_data'=>"bablo7"],['text'=>'ديناميت ❍','callback_data'=>"bablo8"]],[['text'=>'الجميزه ❍','callback_data'=>"bablo9"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "bablo1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/28",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/29",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/30",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/31",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/32",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/33",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/34",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/35",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "bablo9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/36",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ قائمه اغاني مروان موسي ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'نهايه العالم ❍','callback_data'=>"maro1"],['text'=>'فرعون ❍','callback_data'=>"maro2"]],[['text'=>'البوصله ضاعت ❍','callback_data'=>"maro3"],['text'=>'النظام ❍','callback_data'=>"maro4"]],[['text'=>'خربت ❍','callback_data'=>"maro5"],['text'=>'ابطال ❍','callback_data'=>"maro6"]],[['text'=>'نجوم باريس ❍','callback_data'=>"maro7"],['text'=>'شيراتون ❍','callback_data'=>"maro8"]],[['text'=>'شهر اتناشر  ❍','callback_data'=>"maro9"],['text'=>'شطائر ❍','callback_data'=>"maro10"]],[['text'=>'تاتش ❍','callback_data'=>"maro11"],['text'=>'فرصه ❍','callback_data'=>"maro12"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy1"]],]])]);}
if($data == "maro1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/38",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/39",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/40",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/41",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/42",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/43",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/44",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/45",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/46",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/47",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/48",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maro12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/49",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "aganeyy2"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝐂𝐇𝐎𝐎𝐒𝐄 𝐘𝐎𝗨𝐑 𝐒𝐎𝐍𝐆 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝒋𝒖𝒔𝒕𝒊𝒏𝒆 𝒃𝒊𝒃𝒆𝒓 ❍','callback_data'=>"justb"],['text'=>'𝒕𝒉𝒆 𝒄𝒉𝒂𝒊𝒏𝒔𝒎𝒐𝒌𝒆𝒓𝒔 ❍','callback_data'=>"thsm"]],[['text'=>'𝒎𝒂𝒓𝒐𝒐𝒏 5  ❍','callback_data'=>"maarroon"],['text'=>'𝒃𝒊𝒍𝒍𝒊 𝒆𝒊𝒍𝒊𝒔𝒉  ❍','callback_data'=>"ellla"]],[['text'=>'𝒔𝒊𝒂 ❍','callback_data'=>"siax"],['text'=>'𝒊𝒎𝒂𝒈𝒊𝒏𝒆 𝒅𝒓𝒂𝒈𝒐𝒏𝒔  ❍','callback_data'=>"dragons"]],[['text'=>'𝒆𝒅 𝒔𝒉𝒆𝒆𝒓𝒂𝒏 ❍','callback_data'=>"shern"],['text'=>'𝒄𝒉𝒂𝒓𝒍𝒊𝒆 𝒑𝒖𝒕𝒉 ❍','callback_data'=>"puth"]],[['text'=>'𝒑𝒐𝒔𝒕 𝒎𝒂𝒍𝒐𝒏𝒆 ❍','callback_data'=>"mallon"],['text'=>'𝒉𝒂𝒍𝒔𝒆𝒚 ❍','callback_data'=>"hesel"]],[['text'=>'𝒕𝒂𝒚𝒍𝒐𝒓 𝒔𝒘𝒊𝒇𝒕  ❍','callback_data'=>"swift"],['text'=>'𝒃𝒆𝒃𝒆 𝒓𝒆𝒙𝒉𝒂 ❍','callback_data'=>"rexo"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/https://t.me/J_F_A_I']],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"song"]],]])]);}
if($data == "rexo"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍  𝙱𝙴𝙱𝙴 𝚁𝙴𝚇𝙷𝙰  ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙸 𝙶𝙾𝚃 𝚈𝙾𝚄 ❍','callback_data'=>"rexo1"]],[['text'=>'𝙸𝙼 𝙰 𝙼𝙴𝚂𝚂  ❍','callback_data'=>"rexo2"]],[['text'=>'𝚂𝙰𝚈 𝙼𝚈 𝙽𝙰𝙼𝙴 ❍','callback_data'=>"rexo3"]],[['text'=>'𝙼𝙴𝙰𝙽𝚃 𝚃𝙾 𝙱𝙴 ❍','callback_data'=>"rexo4"]],[['text'=>'𝙸𝙽 𝙽𝙰𝙼𝙴 𝙾𝙵 𝙻𝙾𝚅𝙴 ❍','callback_data'=>"rexo5"]],[['text'=>'𝙷𝙰𝚁𝙳𝙴𝚁  ❍','callback_data'=>"rexo6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "rexo1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/698",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "rexo2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/699",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "rexo3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/700",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "rexo4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/701",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "rexo5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/702",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "rexo6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/703",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "swift"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝚃𝙰𝚈𝙻𝙾𝚁 𝚂𝚆𝙸𝙵𝚃  ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙱𝙻𝙰𝙽𝙺 𝚂𝙿𝙰𝙲𝙴 ❍','callback_data'=>"swift1"]],[['text'=>'𝙲𝙰𝚁𝙳𝙸𝙶𝙰𝙽  ❍','callback_data'=>"swift2"]],[['text'=>'𝙳𝙴𝙻𝙸𝙲𝙰𝚃𝙴 ❍','callback_data'=>"swift3"]],[['text'=>'𝙻𝙾𝙾𝙺 𝚆𝙷𝙰𝚃 𝚈𝙾𝚄 𝙼𝙰𝙳𝙴 𝙼𝙴 𝙳𝙾 ❍','callback_data'=>"swift4"]],[['text'=>'𝙴𝚇𝙸𝙻𝙴 ❍','callback_data'=>"swift5"]],[['text'=>'𝚈𝙾𝚄 𝙱𝙴𝙻𝙾𝙽𝙶 𝚆𝙸𝚃𝙷 𝙼𝙴  ❍','callback_data'=>"swift6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "swift1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/691",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "swift2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/692",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "swift3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/693",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "swift4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/694",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "swift5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/695",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "swift6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/696",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mallon"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙿𝙾𝚂𝚃 𝙼𝙰𝙻𝙾𝙽𝙴 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙲𝙸𝚁𝙲𝙻𝙴𝚂 ❍','callback_data'=>"mallon1"]],[['text'=>'𝚁𝙾𝙲𝙺𝚂𝚃𝙰𝚁  ❍','callback_data'=>"mallon2"]],[['text'=>'𝙶𝙾𝙾𝙳𝙱𝚈𝙴𝚂 ❍','callback_data'=>"mallon3"]],[['text'=>'𝙲𝙾𝙽𝙶𝚁𝙰𝚃𝚄𝙻𝙰𝚃𝙸𝙾𝙽𝚂 ❍','callback_data'=>"mallon4"]],[['text'=>'𝚂𝚄𝙽 𝙵𝙻𝙾𝚆𝙴𝚁 ❍','callback_data'=>"mallon5"]],[['text'=>'𝚆𝙾𝚆  ❍','callback_data'=>"mallon6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "mallon1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/623",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mallon2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/624",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mallon3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/625",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mallon4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/626",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mallon5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/627",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "mallon6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/628",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "siax"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝚂𝙸𝙰 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙲𝙷𝙰𝙽𝙳𝙴𝙻𝙸𝙴𝚁 ❍','callback_data'=>"siax1"]],[['text'=>'𝚃𝙷𝙴 𝙶𝚁𝙴𝙰𝚃𝙴𝚂𝚃 ❍','callback_data'=>"siax2"]],[['text'=>'𝚄𝙽𝚂𝚃𝙾𝙿𝙿𝙰𝙱𝙻𝙴 ❍','callback_data'=>"siax3"]],[['text'=>'𝙲𝙷𝙴𝙰𝙿 𝚃𝙷𝚁𝙸𝙻𝙻𝚂 ❍','callback_data'=>"siax4"]],[['text'=>'𝙸𝙼 𝚂𝚃𝙸𝙻𝙻 𝙷𝙴𝚁𝙴 ❍','callback_data'=>"siax5"]],[['text'=>'𝙳𝚄𝚂𝙺 𝚃𝙸𝙻𝙻 𝙳𝙰𝚆𝙽 ❍','callback_data'=>"siax6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "siax1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/598",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "siax2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/599",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "siax3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/600",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "siax4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/601",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "siax5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/602",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "siax6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/603",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙹𝚄𝚂𝚃𝙸𝙽𝙴 𝙱𝙸𝙱𝙴𝚁  ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝐋𝐎𝐍𝐄𝐋𝐘 ❍','callback_data'=>"justb1"],['text'=>'𝐘𝗨𝐌𝐌𝐘 ❍','callback_data'=>"justb2"]],[['text'=>'𝐇𝐎𝐋𝐘 ❍','callback_data'=>"justb3"],['text'=>'𝐈𝐍𝐓𝐄𝐍𝐓𝐈𝐎𝐍𝐒 ❍','callback_data'=>"justb4"]],[['text'=>'𝐏𝐎𝐏 𝐒𝐓𝐀𝐑 ❍','callback_data'=>"justb5"],['text'=>'𝐒𝐎𝐑𝐑𝐘 ❍','callback_data'=>"justb6"]],[['text'=>'𝐋𝐎𝐕𝐄 𝐘𝐎𝗨𝐑 𝐒𝐄𝐋𝐅 ❍','callback_data'=>"justb7"],['text'=>'𝐂𝐎𝐋𝐃 𝐖𝐀𝐓𝐄𝐑 ❍','callback_data'=>"justb8"]],[['text'=>'𝐖𝐇𝐀𝐓 𝐃𝐎 𝐘𝐎𝗨 𝐌𝐄𝐀𝐍 ❍','callback_data'=>"justb9"],['text'=>'𝐂𝐎𝐌𝐏𝐀𝐍𝐘 ❍','callback_data'=>"justb10"]],[['text'=>'𝐅𝐎𝐑 𝐄𝐕𝐄𝐑 ❍','callback_data'=>"justb11"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "justb1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/566",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/567",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/568",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/569",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/570",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/571",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/572",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/573",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/574",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/575",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "justb11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/578",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "thsm"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝚃𝙷𝙴 𝙲𝙷𝙰𝙸𝙽𝚂𝙼𝙾𝙺𝙴𝚁𝚂  ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙲𝙻𝙾𝚂𝙴𝚁 ❍','callback_data'=>"thsm1"],['text'=>'𝚂𝙾𝙼𝙴𝚃𝙷𝙸𝙽𝙶 𝙹𝚄𝚂𝚃 𝙻𝙸𝙺𝙴 ❍','callback_data'=>"thsm2"]],[['text'=>'𝙳𝙾𝙽𝚃 𝙻𝙴𝚃 𝙼𝙴 𝙳𝙾𝚆𝙽 ❍','callback_data'=>"thsm3"],['text'=>'𝙸𝙻𝙻𝙴𝙽𝙸𝚄𝙼 ❍','callback_data'=>"thsm4"]],[['text'=>'𝚂𝙸𝙲𝙺 𝙱𝙾𝚈 ❍','callback_data'=>"thsm5"],['text'=>'𝙷𝙾𝙿𝙴  ❍','callback_data'=>"thsm6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "thsm1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/580",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "thsm2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/581",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "thsm3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/582",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "thsm4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/583",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "thsm5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/584",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "thsm6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/585",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maarroon"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙼𝙰𝚁𝙾𝙾𝙽 5  ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙼𝙴𝙼𝙾𝚁𝙸𝙴𝚂 ❍','callback_data'=>"maarroon1"]],[['text'=>'𝙼𝙰𝙿𝚂 ❍','callback_data'=>"maarroon2"]],[['text'=>'𝙶𝙸𝚁𝙻𝚂 𝙻𝙸𝙺𝙴 𝚈𝙾𝚄 ❍','callback_data'=>"maarroon3"]],[['text'=>'𝚂𝚄𝙶𝙰𝚁 ❍','callback_data'=>"maarroon4"]],[['text'=>'𝙿𝙰𝚈𝙿𝙷𝙾𝙽𝙴 ❍','callback_data'=>"maarroon5"]],[['text'=>'𝙰𝙽𝙸𝙼𝙰𝙻𝚂 ❍','callback_data'=>"maarroon6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "maarroon1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/586",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maarroon2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/591",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maarroon3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/587",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maarroon4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/588",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maarroon5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/589",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "maarroon6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/590",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ellla"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙱𝙸𝙻𝙻𝙸𝙴 𝙴𝙸𝙻𝙸𝚂𝙷   ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙻𝙾𝚅𝙴𝙻𝚈 ❍','callback_data'=>"ellla1"]],[['text'=>'𝚆𝙷𝙴𝙽 𝚃𝙷𝙴 𝙿𝙰𝚁𝚃𝚈 𝙾𝚅𝙴𝚁 ❍','callback_data'=>"ellla2"]],[['text'=>'𝙱𝙴𝙻𝙻𝚈𝙰𝙲𝙷𝙴 ❍','callback_data'=>"ellla3"]],[['text'=>'𝙱𝚄𝚁𝚈 𝙰 𝙵𝚁𝙸𝙴𝙽𝙳 ❍','callback_data'=>"ellla4"]],[['text'=>'𝙰𝙻𝙻 𝚃𝙷𝙴 𝙶𝙾𝙾𝙳 𝙶𝙸𝚁𝙻𝚂 𝙶𝙾 𝚃𝙾 𝙷𝙴𝙻𝙻 ❍','callback_data'=>"ellla5"]],[['text'=>'𝙱𝙰𝙳 𝙶𝚄𝚈 ❍','callback_data'=>"ellla6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "ellla1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/592",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ellla2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/593",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ellla3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/594",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ellla4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/595",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ellla5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/596",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "ellla6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/597",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "dragons"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙸𝙼𝙰𝙶𝙸𝙽𝙴 𝙳𝚁𝙰𝙶𝙾𝙽𝚂 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙱𝙴𝙻𝙸𝙴𝚅𝙴𝚁 ❍','callback_data'=>"dragons1"]],[['text'=>'𝙽𝙰𝚃𝚄𝚁𝙰𝙻 ❍','callback_data'=>"dragons2"]],[['text'=>'𝚃𝙷𝚄𝙽𝙳𝙴𝚁 ❍','callback_data'=>"dragons3"]],[['text'=>'𝚁𝙰𝙳𝙸𝙾𝙰𝙲𝚃𝙸𝚅𝙴 ❍','callback_data'=>"dragons4"]],[['text'=>'𝙱𝙰𝙳 𝙻𝙸𝙰𝚁 ❍','callback_data'=>"dragons5"]],[['text'=>'𝚆𝙷𝙰𝚃𝙴𝚅𝙴𝚁 𝙸𝚃 𝚃𝙰𝙺𝙴𝚂 ❍','callback_data'=>"dragons6"]],[['text'=>'𝐁𝐀𝐂𝐊','callback_data'=>"aganeyy2"]],]])]);}
if($data == "dragons1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/604",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "dragons2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/605",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "dragons3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/606",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "dragons4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/607",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "dragons5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/608",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "dragons6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/609",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙴𝙳 𝚂𝙷𝙴𝙴𝚁𝙰𝙽 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙿𝙴𝚁𝙵𝙴𝙲𝚃 ❍','callback_data'=>"shern1"]],[['text'=>'𝚂𝙷𝙰𝙿𝙴 𝙾𝙵 𝚈𝙾𝚄  ❍','callback_data'=>"shern2"]],[['text'=>'𝚃𝙷𝙸𝙽𝙺𝙸𝙽𝙶 𝙾𝚄𝚃 𝙻𝙾𝚄𝙳  ❍','callback_data'=>"shern3"]],[['text'=>'𝙿𝙷𝙾𝚃𝙾𝙶𝚁𝙰𝙿𝙷 ❍','callback_data'=>"shern4"]],[['text'=>'𝙳𝙸𝚅𝙴 ❍','callback_data'=>"shern5"]],[['text'=>'𝙶𝙰𝙻𝚆𝙰𝚈 𝙶𝙸𝚁𝙻 ❍','callback_data'=>"shern6"]],[['text'=>'𝙸 𝙳𝙾𝙽𝚃 𝙲𝙰𝚁𝙴 ❍','callback_data'=>"shern7"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "shern1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/610",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/611",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/612",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/613",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/614",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/615",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "shern7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/616",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "puth"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙲𝙷𝙰𝚁𝙻𝙸𝙴 𝙿𝚄𝚃𝙷 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙰𝚃𝚃𝙴𝙽𝚃𝙸𝙾𝙽 ❍','callback_data'=>"puth1"]],[['text'=>'𝙷𝙾𝚆 𝙻𝙾𝙽𝙶  ❍','callback_data'=>"puth2"]],[['text'=>'𝚆𝙴 𝙳𝙾𝙽𝚃 𝚃𝙰𝙻𝙺 𝙰𝙽𝚈𝙼𝙾𝚁𝙴 ❍','callback_data'=>"puth3"]],[['text'=>'𝙳𝙰𝙽𝙶𝙴𝚁𝙾𝚄𝚂𝙻𝚈 ❍','callback_data'=>"puth4"]],[['text'=>'𝙾𝙽𝙴 𝙲𝙰𝙻𝙻 𝙰𝚆𝙰𝚈 ❍','callback_data'=>"puth5"]],[['text'=>'𝚂𝙴𝙴 𝚈𝙾𝚄 𝙰𝙶𝙸𝙽𝙴  ❍','callback_data'=>"puth6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "puth1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/617",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "puth2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/618",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "puth3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/619",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "puth4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/620",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "puth5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/621",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "puth6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/622",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hesel"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ 𝙷𝙰𝙻𝚂𝙴𝚈 ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'𝙱𝙰𝙳 𝙰𝚃 𝙻𝙾𝚅𝙴 ❍','callback_data'=>"hesel1"]],[['text'=>'𝚆𝙸𝚃𝙷𝙾𝚄𝚃 𝙼𝙴  ❍','callback_data'=>"hesel2"]],[['text'=>'𝙱𝙴 𝙺𝙸𝙽𝙳 ❍','callback_data'=>"hesel3"]],[['text'=>'𝚂𝙾𝚁𝚁𝚈 ❍','callback_data'=>"hesel4"]],[['text'=>'𝙶𝚁𝙰𝚅𝙴𝚈𝙰𝚁𝙳 ❍','callback_data'=>"hesel5"]],[['text'=>'𝙷𝙸𝙼 𝙰𝙽𝙳 𝙸 ❍','callback_data'=>"hesel6"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy2"]],]])]);}
if($data == "hesel1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/629",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hesel2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/630",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hesel3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/631",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hesel4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/632",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hesel5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/633",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "hesel6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/amk7adr/634",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soureee6y"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اختر اغنيتك ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'1 ❍','callback_data'=>"sor1"],['text'=>'2 ❍','callback_data'=>"sor2"],['text'=>'3 ❍','callback_data'=>"sor3"]],[['text'=>'4 ❍','callback_data'=>"sor4"],['text'=>'5 ❍','callback_data'=>"sor5"],['text'=>'6 ❍','callback_data'=>"sor6"]],[['text'=>'7 ❍','callback_data'=>"sor7"],['text'=>'8 ❍','callback_data'=>"sor8"],['text'=>'9 ❍','callback_data'=>"sor9"]],[['text'=>'10 ❍','callback_data'=>"sor10"],['text'=>'11 ❍','callback_data'=>"sor11"],['text'=>'12 ❍','callback_data'=>"sor12"]],[['text'=>'13 ❍','callback_data'=>"sor13"],['text'=>'14 ❍','callback_data'=>"sor14"],['text'=>'15 ❍','callback_data'=>"sor15"]],[['text'=>'16 ❍','callback_data'=>"sor16"],['text'=>'17 ❍','callback_data'=>"sor17"],['text'=>'18 ❍','callback_data'=>"sor18"]],[['text'=>'19 ❍','callback_data'=>"sor19"],['text'=>'20 ❍','callback_data'=>"sor20"],['text'=>'21 ❍','callback_data'=>"sor21"]],[['text'=>'22 ❍','callback_data'=>"sor22"],['text'=>'23 ❍','callback_data'=>"sor23"],['text'=>'24 ❍','callback_data'=>"sor24"]],[['text'=>'25 ❍','callback_data'=>"sor25"],['text'=>'26 ❍','callback_data'=>"sor26"],['text'=>'27 ❍','callback_data'=>"sor27"]],[['text'=>'28 ❍','callback_data'=>"sor28"],['text'=>'29 ❍','callback_data'=>"sor29"],['text'=>'30 ❍','callback_data'=>"sor30"]],[['text'=>'31 ❍','callback_data'=>"sor31"],['text'=>'32 ❍','callback_data'=>"sor32"],['text'=>'33 ❍','callback_data'=>"sor33"]],[['text'=>'34 ❍','callback_data'=>"sor34"],['text'=>'35 ❍','callback_data'=>"sor35"],['text'=>'36 ❍','callback_data'=>"sor36"]],[['text'=>'37 ❍','callback_data'=>"sor37"],['text'=>'38 ❍','callback_data'=>"sor38"],['text'=>'39 ❍','callback_data'=>"sor39"]],[['text'=>'40 ❍','callback_data'=>"sor40"],['text'=>'41 ❍','callback_data'=>"sor41"],['text'=>'42 ❍','callback_data'=>"sor42"]],[['text'=>'43 ❍','callback_data'=>"sor43"],['text'=>'44 ❍','callback_data'=>"sor44"],['text'=>'45 ❍','callback_data'=>"sor45"]],[['text'=>'46 ❍','callback_data'=>"sor46"],['text'=>'47 ❍','callback_data'=>"sor47"],['text'=>'48 ❍','callback_data'=>"sor48"]],[['text'=>'49 ❍','callback_data'=>"sor49"],['text'=>'50 ❍','callback_data'=>"sor51"],['text'=>'52 ❍','callback_data'=>"sor52"]],[['text'=>'53 ❍','callback_data'=>"sor53"],['text'=>'54 ❍','callback_data'=>"sor54"],['text'=>'55 ❍','callback_data'=>"sor55"]],[['text'=>'56 ❍','callback_data'=>"sor56"],['text'=>'57 ❍','callback_data'=>"sor57"],['text'=>'58 ❍','callback_data'=>"sor58"]],[['text'=>'59 ❍','callback_data'=>"sor59"],['text'=>'60 ❍','callback_data'=>"sor60"],['text'=>'61 ❍','callback_data'=>"sor61"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy"]],]])]);}
if($data == "sor1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/22",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/23",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/24",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/25",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/26",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/27",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/28",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/29",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/30",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/31",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/32",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/33",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/34",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/35",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor15"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/36",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor16"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/37",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor17"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/38",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor18"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/30",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor19"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/40",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor20"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/41",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor21"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/42",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor22"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/43",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor23"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/44",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor24"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/45",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor25"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/46",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor26"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/47",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor27"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/48",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor28"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/49",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor29"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/50",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor30"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/51",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor31"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/52",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor32"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/53",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor33"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/54",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor34"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/55",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor35"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/56",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor36"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/57",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor37"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/58",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor38"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/59",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor39"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/60",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor40"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/61",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor41"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/62",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor42"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/63",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor43"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/64",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor44"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/65",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor45"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/66",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor46"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/67",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor47"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/68",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor48"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/69",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor49"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/70",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor50"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/71",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor51"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/72",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor52"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/73",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor53"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/74",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor54"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/75",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor55"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/76",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor56"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/77",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor57"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/78",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor58"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/79",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor59"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/80",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "sor60"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/81",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tork4eyy"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اختر اغنيتك ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'1 ❍','callback_data'=>"tor1"],['text'=>'2 ❍','callback_data'=>"tor2"],['text'=>'3 ❍','callback_data'=>"tor3"]],[['text'=>'4 ❍','callback_data'=>"tor4"],['text'=>'5 ❍','callback_data'=>"tor5"],['text'=>'6 ❍','callback_data'=>"tor6"]],[['text'=>'7 ❍','callback_data'=>"tor7"],['text'=>'8 ❍','callback_data'=>"tor8"],['text'=>'9 ❍','callback_data'=>"tor9"]],[['text'=>'10 ❍','callback_data'=>"tor10"],['text'=>'11 ❍','callback_data'=>"tor11"],['text'=>'12 ❍','callback_data'=>"tor12"]],[['text'=>'13 ❍','callback_data'=>"tor13"],['text'=>'14 ❍','callback_data'=>"tor14"],['text'=>'15 ❍','callback_data'=>"tor15"]],[['text'=>'16 ❍','callback_data'=>"tor16"],['text'=>'17 ❍','callback_data'=>"tor17"],['text'=>'18 ❍','callback_data'=>"tor18"]],[['text'=>'19 ❍','callback_data'=>"tor19"],['text'=>'20 ❍','callback_data'=>"tor20"],['text'=>'21 ❍','callback_data'=>"tor21"]],[['text'=>'22 ❍','callback_data'=>"tor22"],['text'=>'23 ❍','callback_data'=>"tor23"],['text'=>'24 ❍','callback_data'=>"tor24"]],[['text'=>'25 ❍','callback_data'=>"tor25"],['text'=>'26 ❍','callback_data'=>"tor26"],['text'=>'27 ❍','callback_data'=>"tor27"]],[['text'=>'28 ❍','callback_data'=>"tor28"],['text'=>'29 ❍','callback_data'=>"tor29"],['text'=>'30 ❍','callback_data'=>"tor30"]],[['text'=>'31 ❍','callback_data'=>"tor31"],['text'=>'32 ❍','callback_data'=>"tor32"],['text'=>'33 ❍','callback_data'=>"tor33"]],[['text'=>'34 ❍','callback_data'=>"tor34"],['text'=>'35 ❍','callback_data'=>"tor35"],['text'=>'36 ❍','callback_data'=>"tor36"]],[['text'=>'37 ❍','callback_data'=>"tor37"],['text'=>'38 ❍','callback_data'=>"tor38"],['text'=>'39 ❍','callback_data'=>"tor39"]],[['text'=>'40 ❍','callback_data'=>"tor40"],['text'=>'41 ❍','callback_data'=>"tor41"],['text'=>'42 ❍','callback_data'=>"tor42"]],[['text'=>'43 ❍','callback_data'=>"tor43"],['text'=>'44 ❍','callback_data'=>"tor44"],['text'=>'45 ❍','callback_data'=>"tor45"]],[['text'=>'46 ❍','callback_data'=>"tor46"],['text'=>'47 ❍','callback_data'=>"tor47"],['text'=>'48 ❍','callback_data'=>"tor48"]],[['text'=>'49 ❍','callback_data'=>"tor49"],['text'=>'50 ❍','callback_data'=>"tor51"],['text'=>'52 ❍','callback_data'=>"tor52"]],[['text'=>'53 ❍','callback_data'=>"tor53"],['text'=>'54 ❍','callback_data'=>"tor54"],['text'=>'55 ❍','callback_data'=>"tor55"]],[['text'=>'56 ❍','callback_data'=>"tor56"],['text'=>'57 ❍','callback_data'=>"tor57"],['text'=>'58 ❍','callback_data'=>"tor58"]],[['text'=>'59 ❍','callback_data'=>"tor59"],['text'=>'60 ❍','callback_data'=>"tor60"],['text'=>'61 ❍','callback_data'=>"tor61"]],[['text'=>'62 ❍','callback_data'=>"tor62"],['text'=>'63 ❍','callback_data'=>"tor63"],['text'=>'64 ❍','callback_data'=>"tor64"]],[['text'=>'65 ❍','callback_data'=>"tor65"],['text'=>'66 ❍','callback_data'=>"tor66"],['text'=>'67 ❍','callback_data'=>"tor67"]],[['text'=>'68 ❍','callback_data'=>"tor68"],['text'=>'69 ❍','callback_data'=>"tor69"],['text'=>'70 ❍','callback_data'=>"tor70"]],[['text'=>'71 ❍','callback_data'=>"tor71"],['text'=>'72 ❍','callback_data'=>"tor72"],['text'=>'73 ❍','callback_data'=>"tor73"]],[['text'=>'74 ❍','callback_data'=>"tor74"],['text'=>'75 ❍','callback_data'=>"tor75"],['text'=>'76 ❍','callback_data'=>"tor76"]],[['text'=>'78 ❍','callback_data'=>"tor78"],['text'=>'79 ❍','callback_data'=>"tor79"],['text'=>'80 ❍','callback_data'=>"tor80"]],[['text'=>'81 ❍','callback_data'=>"tor81"],['text'=>'82 ❍','callback_data'=>"tor82"],['text'=>'83 ❍','callback_data'=>"tor83"]],[['text'=>'84 ❍','callback_data'=>"tor84"],['text'=>'85 ❍','callback_data'=>"tor85"],['text'=>'86 ❍','callback_data'=>"tor86"]],[['text'=>'88 ❍','callback_data'=>"tor88"],['text'=>'89 ❍','callback_data'=>"tor89"],['text'=>'90 ❍','callback_data'=>"tor90"]],[['text'=>'91 ❍','callback_data'=>"tor81"],['text'=>'92 ❍','callback_data'=>"tor92"],['text'=>'93 ❍','callback_data'=>"tor93"]],[['text'=>'94 ❍','callback_data'=>"tor84"],['text'=>'95 ❍','callback_data'=>"tor95"],['text'=>'96 ❍','callback_data'=>"tor96"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy"]],]])]);}
if($data == "tor1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/85",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/86",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/87",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/88",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/89",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/90",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/91",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/92",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/93",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/94",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/95",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor12"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/96",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor13"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/97",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor14"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/98",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor15"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/99",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor16"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/100",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor17"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/101",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor18"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/102",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor19"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/103",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor20"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/104",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor21"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/105",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor22"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/106",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor23"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/107",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor24"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/108",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor25"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/109",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor26"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/110",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor27"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/111",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor28"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/113",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor29"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/114",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor30"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/115",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor31"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/116",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor32"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/117",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor33"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/118",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor34"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/119",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor35"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/120",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor36"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/121",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor37"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/122",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor38"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/123",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor39"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/124",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor40"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/125",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor41"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/126",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor42"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/127",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor43"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/128",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor44"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/129",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor45"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/130",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor46"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/131",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor47"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/132",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor48"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/133",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor49"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/134",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor50"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/135",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor51"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/136",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor52"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/137",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor53"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/138",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor54"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/139",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor55"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/140",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor56"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/141",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor57"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/142",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor58"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/143",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor59"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/144",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor60"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/145",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor61"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/146",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor62"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/147",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor63"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/148",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor64"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/149",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor65"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/150",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor66"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/151",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor67"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/152",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor68"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/153",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor69"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/157",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor70"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/159",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor71"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/160",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor72"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/161",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor73"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/162",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor74"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/163",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor75"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/164",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor76"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/165",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor77"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/166",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor78"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/167",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor79"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/168",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor80"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/169",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor81"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/170",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor82"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/171",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor83"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/172",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor84"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/173",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor85"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/174",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor86"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/175",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor87"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/176",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor88"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/177",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor89"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/178",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor90"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/179",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor91"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/180",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor92"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/181",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor93"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/182",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor94"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/183",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor95"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/184",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "tor96"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/185",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "erak8eyy"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اختر اغنيتك ','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'1 ❍','callback_data'=>"era1"],['text'=>'2 ❍','callback_data'=>"era2"],['text'=>'3 ❍','callback_data'=>"era3"]],[['text'=>'4 ❍','callback_data'=>"era4"],['text'=>'5 ❍','callback_data'=>"era5"],['text'=>'6 ❍','callback_data'=>"era6"]],[['text'=>'7 ❍','callback_data'=>"era7"],['text'=>'8 ❍','callback_data'=>"era8"],['text'=>'9 ❍','callback_data'=>"era9"]],[['text'=>'10 ❍','callback_data'=>"era10"],['text'=>'11 ❍','callback_data'=>"era11"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy"]],]])]);}
if($data == "era1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/6",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/7",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/8",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/9",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/10?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/11?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/12?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/13?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/14?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/15?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "era11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/16?single",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soode4y"){bot('EditMessageText',['chat_id'=>$chat_id,'message_id'=>$message_id,'text'=>'❍ اختر اغنيتك','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'1 ❍','callback_data'=>"soo1"],['text'=>'2 ❍','callback_data'=>"soo2"],['text'=>'3 ❍','callback_data'=>"soo3"]],[['text'=>'4 ❍','callback_data'=>"soo4"],['text'=>'5 ❍','callback_data'=>"soo5"],['text'=>'6 ❍','callback_data'=>"soo6"]],[['text'=>'7 ❍','callback_data'=>"soo7"],['text'=>'8 ❍','callback_data'=>"soo8"],['text'=>'9 ❍','callback_data'=>"soo9"]],[['text'=>'10 ❍','callback_data'=>"soo10"],['text'=>'11 ❍','callback_data'=>"soo11"]],[['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']], [['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],[['text'=>"𝐁𝐀𝐂𝐊",'callback_data'=>"aganeyy"]],]])]);}
if($data == "soo1"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/193",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo2"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/194",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo3"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/195",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo4"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/196",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo5"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/197",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo6"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/198",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo7"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/199",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo8"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/200",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id, ]);}
if($data == "soo9"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/201",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo10"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/202",'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id,]);}
if($data == "soo11"){bot('sendaudio',['chat_id'=>$chat_id,audio=>"https://t.me/B_6_7/203", 'caption'=>"❍ طلب العضو ➣
❍ 𝑵𝑺𝑴𝑬 ➢ $nameee$nameee2
❍ 𝑼𝑺𝑬𝑹 ➣ @$user
❍ 𝐂𝐇 ➢ @J_F_A_I",
'reply_to_message_id'=>$message->message_id, ]);}
if($text == 'رابط الحذف' || $text == 'بوت الحذف' || $text == 'الحذف'){ bot('sendphoto',['chat_id'=>$chat_id,photo =>"https://t.me/photojack14366/15",'caption'=>'⤶ رابط الحذف في جميع مواقع التواصل', 'parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'⤶ Telegram ܁','url'=>'https://my.telegram.org/auth?to=delete']],[['text'=>'⤶ instagram ܁','url'=>'https://www.instagram.com/accounts/login/?next=/accounts/remove/request/permanent/']], [['text'=>'⤶ Facebook ܁','url'=>'https://www.facebook.com/help/deleteaccount']], [['text'=>'⤶ Snspchat ܁','url'=>'https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fdeleteaccount']], [['text'=>'⤶ Bot deletion .','url'=>'t.me/LC6BOT']], [['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}
if($data == "delateddd" ){bot('EditMessageCaption',['chat_id'=>$chat_id,  'message_id'=>$message_id,photo =>"https://t.me/photojack14366/15",'caption'=>'⤶ رابط الحذف في جميع مواقع التواصل .','parse_mode'=>"markdown",'disable_web_page_preview'=>true,"reply_markup"=>json_encode(["inline_keyboard"=>[[['text'=>'⤶ Telegram ܁','url'=>'https://my.telegram.org/auth?to=delete']],[['text'=>'⤶ instagram ܁','url'=>'https://www.instagram.com/accounts/login/?next=/accounts/remove/request/permanent/']], [['text'=>'⤶ Facebook ܁','url'=>'https://www.facebook.com/help/deleteaccount']], [['text'=>'⤶ Snspchat ܁','url'=>'https://accounts.snapchat.com/accounts/login?continue=https%3A%2F%2Faccounts.snapchat.com%2Faccounts%2Fdeleteaccount']], [['text'=>'⤶ Bot deletion .','url'=>'t.me/LC6BOT']], [['text'=>'🖤 𝑱𝑨𝑪𝑲 🖤 ','url'=>'t.me/V_P_E'],['text'=>'𝐂𝐇','url'=>'t.me/J_F_A_I']],[['text'=>$jackn.$nameee.$nameee2,'callback_data'=>"jack"],['text'=>$jacku.$jaack.$user,'callback_data'=>"jack"]],[['text'=>' حذف الكيبورد','callback_data'=>"dell"]],]])]);}

$goge = str_replace("انطقي ","",$text);
 if($text == "انطقي $goge"){
bot('sendaudio',[
'chat_id' => $chat_id,
'audio' => "http://tts.baidu.com/text2audio?lan=en&ie=UTF-8&text=$goge",
 'caption'=>"الكلمه المتطوقه هي : $goge",
'reply_to_message_id' =>$message->message_id,
]);}

$gogge = str_replace("انطق ","",$text);
 if($text == "انطق $gogge"){
bot('sendaudio',[
'chat_id' => $chat_id,
'audio' => "http://translate.google.com/translate_tts?q=$gogge&tl=ar&client=duncan3dc-speaker",
 'caption'=>"الكلمه المتطوقه هي : $gogge ",
'reply_to_message_id' =>$message->message_id,
]);}
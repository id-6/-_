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

#القران
if($start=="non"){
$start="
        💭┊مرحبا يا {$name } 🍃
=

❇{♤مرحبا بك في البوت القران الكريم
❇{♤يمكنك الاستماع الى القران الكريم من خلال القوائم
❇{♤يمكنك ايضا قراء الاذكار من خلال البوت /azka 
❇ملاحظه للدخول للاذكار
/azka
=
";

}



if($text == "القران الكريم صوت"){
bot('sendvideo',[
'chat_id'=>$chat_id,
'video'=>"https://t.me/PHP_E/6",
'reply_markup'=>json_encode([ 
'keyboard'=>[ 
[
['text'=>'سورة الفاتحة'],['text'=>'سورة البقرة'],['text'=>'سورة آل عمران']
],

[ 
['text'=>'سورة النساء'],['text'=>'سورة المائدة'],['text'=>'سورة الأنعام']
],
[ 
['text'=>'سورة الأنفال'],['text'=>'سورة الأعراف'],['text'=>'سورة التوبة']
],

[ 
['text'=>'سورة يونس'],['text'=>'سورة هود'],['text'=>'سورة يوسف']
],

[ 
['text'=>'سورة الرعد'],['text'=>'سورة إبراهيم'],['text'=>'سورة الحجر']
],




[ 
['text'=>'سورة النحل'],['text'=>'سورة الإسراء'],['text'=>'سورة الكهف']
],
[
['text'=>' سورة مريم'],['text'=>'سورة طه'],['text'=>'سورة الأنبياء']
],

[
['text'=>'سورة الحج'],['text'=>'سورة المؤمنون'],['text'=>'سورة النور']
],

[ 
['text'=>'سورة الفرقان'],['text'=>'سورة الشعراء'],['text'=>'سورة النمل']
],


[ 
['text'=>'سورة القصص'],['text'=>'سورة العنكبوت'],['text'=>'سورة الروم']
],

[ 
['text'=>'سورة لقمان'],['text'=>'سورة السجدة'],['text'=>'سورة الأحزاب']
],

[ 
['text'=>'سورة سبأ'],['text'=>'سورة فاطر'],['text'=>'سورة يس']
],

[
['text'=>'سورة الصافات'],['text'=>'سورة ص'],['text'=>'سورة الزمر']
],


[ 
['text'=>'سورة غافر'],['text'=>'سورة فصلت'],['text'=>'سورة الشورى']
],
[ 
['text'=>'سورة الزخرف'],['text'=>'سورة الدخان'],['text'=>'سورة الجاثية']
],

[ 
['text'=>'سورة الأحقاف'],['text'=>'سورة محمد'],['text'=>'سورة الفتح']
],

[ 
['text'=>'سورة الحجرات'],['text'=>'سورة ق'],['text'=>'سورة الذاريات']
],




[ 
['text'=>'سورة الطور'],['text'=>'سورة النجم'],['text'=>'سورة القمر']
],
[
['text'=>'سورة الرحمن'],['text'=>'سورة الواقعة'],['text'=>'سورة الحديد']
],



[ 
['text'=>'سورة المجادلة'],['text'=>'سورة الحشر'],['text'=>'سورة الممتحنة']
],
[ 
['text'=>'سورة الصف'],['text'=>'سورة الجمعة'],['text'=>'سورة المنافقون']
],





[ 
['text'=>'سورة التغابن'],['text'=>'سورة الطلاق'],['text'=>'سورة التحريم']
],

[ 
['text'=>'سورة الملك'],['text'=>'سورة القلم'],['text'=>'سورة الحاقة']
],




[ 
['text'=>'سورة المعارج'],['text'=>'سورة نوح'],['text'=>'سورة الجن']
],
[
['text'=>'سورة المزمل'],['text'=>'سورة المدثر'],['text'=>'سورة القيامة']
],

[ 
['text'=>'سورة الإنسان'],['text'=>'سورة المرسلات'],['text'=>'سورة النبأ']
],
[ 
['text'=>'سورة النازعات'],['text'=>'سورة عبس'],['text'=>'سورة التكوير']
],

[ 
['text'=>'سورة الإنفطار'],['text'=>'سورة المطففين'],['text'=>'سورة الإنشقاق']
],

[ 
['text'=>'سورة البروج'],['text'=>'سورة الطارق'],['text'=>'سورة الأعلى']
],


[ 
['text'=>'سورة الغاشية'],['text'=>'سورة الفجر'],['text'=>'سورة البلد']
],
[
['text'=>'سورة الشمس'],['text'=>'سورة الليل'],['text'=>'سورة الضحى']
],

[ 
['text'=>'سورة الشرح'],['text'=>'سورة التين'],['text'=>'سورة العلق']
],
[ 
['text'=>'سورة القدر'],['text'=>'سورة البينة'],['text'=>'سورة الزلزلة']
],
[ 
['text'=>'سورة العاديات'],['text'=>'سورة القارعة'],['text'=>'سورة التكاثر']
],

[ 
['text'=>'سورة العصر'],['text'=>'سورة الهمزة'],['text'=>'سورة الفيل']
],


[ 
['text'=>'سورة قريش'],['text'=>'سورة الكوثر'],['text'=>'سورة الكافرون']
],

[ 
['text'=>'سورة النصر'],['text'=>'سورة المسد'],['text'=>'سورة الإخلاص']
],

[ 
['text'=>'سورة الناس'],['text'=>'سورة الفلق']
],

[
['text'=>'تطبيق القران الكريم']
],
[
['text'=>'الصفحة الرئيسية 🏚']
],
]
]) 
]); 
}



if($text == "الصفحة الرئيسية 🏚"){
bot('sendvideo',[
'video'=>"https://t.me/PHP_E/6",
'chat_id'=>$chat_id,
'caption'=>"
$start



",	'parse_mode'=>HTML,
'reply_markup'=>json_encode([
'keyboard'=>[ 
[
['text'=>'القران الكريم صوت'],['text'=>'القران الكريم صوره']
],
[ 
['text'=>'تطبيق القران الكريم']],

] 
]) 
]); 
}

if($text == "/start"){
bot('sendvideo',[
'video'=>"https://t.me/PHP_E/6",
'chat_id'=>$chat_id,
'caption'=>"$start



",
	'parse_mode'=>HTML,
'reply_markup'=>json_encode([
'keyboard'=>[ 
[
['text'=>'القران الكريم صوت'],['text'=>'القران الكريم صوره']
],
[ 
['text'=>'تطبيق القران الكريم']
],
] 
]) 
]); 
}

//////
if($text == "سورة الفاتحة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/3",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/15",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    سورة الفاتحة من أعظم سور كتاب الله عزّ وجل، وقد وردت في فَضلها الكثير من الأحاديث النبويّة الصحيحة، ومنها ما رُوي عَنْ أَبِي سَعِيدِ بْنِ المعلَّى رَضِيَ اللَّهُ عَنْهُ قَالَ: (كُنْتُ أُصَلِّي فَدَعَانِي رَسُولُ اللَّهِ صَلَّى اللَّهُ عَلَيْهِ وَسَلَّمَ فَلَمْ أُجِبْهُ حَتَّى صلّيت، قال: فأتيته، فَقَالَ: مَا مَنَعَكَ أَنْ تَأْتِيَنِي؟ قَالَ: قُلْتُ يَا رَسُولَ اللَّهِ إِنِّي كُنْتُ أُصَلِّي، قَالَ: ألم يقل الله تعالى: {يَا أَيُّهَا الَّذِينَ آمَنُواْ اسْتَجِيبُوا للَّهِ وَلِلرَّسُولِ إِذَا دَعَاكُم لِمَا يُحْيِيكُمْ}؟ ثُمَّ قَالَ: لَأُعَلِّمَنَّكَ أَعْظَمَ سُورَةٍ فِي الْقُرْآنِ قَبْلَ أَنْ تَخْرُجَ مِنَ الْمَسْجِدِ، قَالَ: فَأَخَذَ بِيَدِي فَلَمَّا أَرَادَ أَنْ يَخْرُجَ مِنَ الْمَسْجِدِ قُلْتُ: يَا رَسُولَ اللَّهِ إِنَّكَ قُلْتَ لأعلمنَّك أَعْظَمَ سُورَةٍ فِي الْقُرْآنِ، قَالَ: نَعَمْ {الْحَمْدُ للَّهِ رَبِّ الْعَالَمِينَ} هِيَ السَّبْعُ الْمَثَانِي وَالْقُرْآنُ الْعَظِيمُ الَّذِي أُوتِيتُهُ)،[٢] كما جاء في الحديث القدسي أنّ الله يقول: (قسمت الصلاة بيني وبين عبدي نصفين: نصفها لي ونصفها لعبدي، ولعبدي ما سأل، فإذا قال العبد {الحمد لله رب العالمين} قال الله: حمدني عبدي، وإذا قال: {الرحمن الرحيم} قال الله: أثنى علي عبدي، وإذا قال: {مالك يوم الدين} قال الله: مجدني عبدي أو قال: فوض إلي عبدي، وإذا قال: {إياك نعبد وإياك نستعين} قال: فهذه الآية بيني وبين عبدي نصفين، ولعبدي ما سأل، فإذا قال {اهدنا الصراط المستقيم صراط الذين أنعمت عليهم غير المغضوب عليهم ولا الضالين } قال: فهؤلاء لعبدي ولعبدي ما سأل)،[٣] ومن أهم فضائلها كونها شفاءٌ لكل داءٍ، فعن أبي سعيد - رضي الله عنه قال: إنها شفاءٌ من كل سقم. وقيل: إن موضع الرُّقية والاستشفاء منها (إياك نستعين).[٤]
    
    
    〰️〰️〰️〰️〰️
    "
    ]);
    }

    
    if($text == "سورة البقرة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/5",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/4",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    من فضائل سورة البقرة العديدة أنّ الشيطان يَنفر من البيت الذي تُقرأ فيه سورة البقرة،[٥] فعن ‏ ‏أبي هريرة ‏ رضي الله عنه ‏أنّ رسول الله ‏ ‏صلى الله عليه وسلم ‏ ‏قال‏: (لا تجعلوا بيوتكم مقابر إن الشيطان ينفر من البيت الذي تقرأ فيه سورة ‏ ‏البقرة)،[٦] وهي بركةٌ في البيت الذي تُقرأ فيه لقوله صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ: (اقرأوا سورة البقرة فإن أخذها بركة وتركها حسرة، ولا يستطيعها البطلة).[٧]
    
    〰️〰️〰️〰️〰️
    
    "
    ]);
    }

    if($text == "سورة آل عمران"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/112",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/5",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    من أهمّ وأبرز فضائل هذه السورة أنّها تُحاجج عن أصحابها؛[٥] فقد روى ‏أبو أمامة الباهلي ‏قال:‏ ‏سمعت رسول الله ‏ ‏صلى الله عليه وسلم ‏ ‏يقول: (‏اقرءوا القرآن فإنه يأتي يوم القيامة شفيعاً لأصحابه اقرءوا الزهراوين ‏البقرة‏ ‏وسورة ‏‏آل ‏عمران ‏ ‏فإنهما تأتيان يوم القيامة كأنهما غمامتان أو كأنهما غيايتان أو كأنهما ‏فرقان ‏من ‏‏طير صواف‏ ‏تحاجان ‏‏عن أصحابهما).[٧]
    
    〰️〰️〰️〰️〰️
   
    "
    ]);
    }
    
    
    if($text == "سورة النساء"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/113",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/7",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
           "
    ]);
    }
    
    
    if($text == "سورة المائدة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/114",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/8",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
           "
    ]);
    }
    
    
    if($text == "سورة الأنعام"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/115",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/9",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
           "
    ]);
    }
    
    
    if($text == "سورة الأعراف"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/116",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/11",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
           "
    ]);
    }
    
    
    if($text == "سورة الأنفال"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/7",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/12",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
           "
    ]);
    }
    
    
    if($text == "سورة التوبة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/117",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/13",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
           "
    ]);
    }
    
    if($text == "سورة يونس"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/8",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/14",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة هود"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/9",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/17",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة يوسف"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/10",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/18",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الرعد"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/11",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/21",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة إبراهيم"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/12",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/25",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الحجر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/13",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/29",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة النحل"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/14",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/33",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الإسراء"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/15",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/37",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الكهف"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/16",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/41",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة مريم"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/17",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/45",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة طه"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/18",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/47",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الأنبياء"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/19",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/49",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الحج"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/20",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/51",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المؤمنون"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/21",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/53",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة النور"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/22",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/56",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    سورة النور: الآية رقم 35: ((للَّهُ نُورُ السَّمَاوَاتِ وَالْأَرْضِ ۚ مَثَلُ نُورِهِ كَمِشْكَاةٍ فِيهَا مِصْبَاحٌ ۖ الْمِصْبَاحُ فِي زُجَاجَةٍ ۖ الزُّجَاجَةُ كَأَنَّهَا كَوْكَبٌ دُرِّيٌّ يُوقَدُ مِن شَجَرَةٍ مُّبَارَكَةٍ زَيْتُونَةٍ لَّا شَرْقِيَّةٍ وَلَا غَرْبِيَّةٍ يَكَادُ زَيْتُهَا يُضِيءُ وَلَوْ لَمْ تَمْسَسْهُ نَارٌ ۚ نُّورٌ عَلَىٰ نُورٍ ۗ يَهْدِي اللَّهُ لِنُورِهِ مَن يَشَاءُ ۚ وَيَضْرِبُ اللَّهُ الْأَمْثَالَ لِلنَّاسِ ۗ وَاللَّهُ بِكُلِّ شَيْءٍ عَلِيمٌ)) فأقرأوها واسألوا الله نورها وبركتها.
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الفرقان"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/23",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/58",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الشعراء"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/24",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/60",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة النمل"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/25",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/62",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة القصص"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/26",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/66",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة العنكبوت"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/27",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/66",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الروم"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/28",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/68",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    //=====================//
    # Ch: @OOKO0#
    # DEV: @kkfkk#
    # الملف مقدم من قناتي. #
    # لصير فاشل وتغير حقوق #
    //====================//
    if($text == "سورة لقمان"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/29",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/70",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة السجدة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/30",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/72",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الأحزاب"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/31",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/74",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة سبأ"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/32",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/76",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة فاطر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/33",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/78",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة يس"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/34",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/80",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الصافات"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/35",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/82",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة ص"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/36",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/84",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الزمر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/37",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/86",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة غافر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/38",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/88",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة فصلت"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/39",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/91",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الشورى"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/40",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/93",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الزخرف"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/41",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/95",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    //=====================//
    # ch: @OOKO0#
    # By: @kkfkk#
    # الملف مقدم من قناتي. #
    # لصير فاشل وتغير حقوق #
    //====================//
    if($text == "سورة الدخان"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/42",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/97",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الجاثية"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/43",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/99",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الأحقاف"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/44",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/101",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة محمد"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/46",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/103",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الفتح"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/48",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/105",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الحجرات"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/45",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/107",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة ق"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/47",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    //=====================//
    # ch: @OOKO0#
    # By: @kkfkk#
    # الملف مقدم من قناتي. #
    # لصير فاشل وتغير حقوق #
    //====================//
    if($text == "سورة الذاريات"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/50",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/111",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الطور"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/49",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/115",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة النجم"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/51",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة القمر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/52",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/121",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الرحمن"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/53",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/123",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الواقعة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/54",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/125",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الحديد"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/55",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/127",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المجادلة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/56",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/129",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الممتحنة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/57",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/133",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الصف"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/58",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/135",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الجمعة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/59",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/137",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة المنافقون"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/60",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/139",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة التغابن"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/61",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/141",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الطلاق"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/62",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/143",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الملك"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/64",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/147",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة التحريم"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/63",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/145",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة القلم"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/65",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/149",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الحاقة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/66",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المعارج"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/67",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/152",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة نوح"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/68",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/154",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الجن"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/69",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/156",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المزمل"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/70",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/158",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المدثر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/71",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/160",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة القيامة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/72",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/162",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الإنسان"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/73",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/164",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة المرسلات"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/74",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/166",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة النبأ"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/75",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/168",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة النازعات"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/76",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/170",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة عبس"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/77",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/172",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة التكوير"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/78",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/174",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة الإنفطار"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/79",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المطففين"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/80",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/178",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الإنشقاق"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/81",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/180",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة البروج"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/82",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/302",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الطارق"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/83",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/304",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الأعلى"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/84",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/306",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الغاشية"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/85",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/308",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الفجر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/86",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/310",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة البلد"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/87",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/312",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الشمس"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/88",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/314",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الليل"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/89",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/316",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الضحى"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/90",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/318",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الشرح"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/91",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/320",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة التين"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/119",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/322",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة العلق"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/93",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/324",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة القدر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/94",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/326",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة البينة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/95",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/330",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الزلزلة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/96",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/328",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة العاديات"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/97",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/332",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
    if($text == "سورة القارعة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/98",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/334",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
            "
    ]);
    }
    
    if($text == "سورة التكاثر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/99",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/336",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة العصر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/100",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/338",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الهمزة"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/101",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/340",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الفيل"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/102",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/342",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة قريش"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/103",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/344",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الماعون"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/104",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/346",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الكوثر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/105",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/348",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الكافرون"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/106",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/350",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة النصر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/107",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/352",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة المسد"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/108",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/354",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الإخلاص"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/109",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/356",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الفلق"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/110",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/358",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    if($text == "سورة الناس"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/111",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/bot_qran/360",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    if($text == "سورة الحشر"){
    bot( sendaudio ,[
     chat_id =>$chat_id, 
     audio =>"https://t.me/mroan7/118",
     reply_to_message_id =>$message->message_id, 
    ]);
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"
    
    〰️〰️〰️〰️〰️
        "
    ]);
    }
    
    
  
    
    
    if($text ==  '/azka' ){
    bot( sendMessage ,[
     chat_id =>$chat_id,
     text => "أهلا بــــــك في بــــوت أذكار الصباح والمساء 
     
     البوت مطور بطريقة مميزة ليسهل عليك قراءة الأذكار
    "
     ,
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'أذكــار الـصـبـاح 🌤',callback_data => 'c' ]],
    [['text'=> 'أذكــار الـمـسـاء 🌖' ,callback_data => 'e']] ,
    
        
        
    
    ]
    ])
    ]);
    }
    
    
    
    
    
    
    if($data ==  'c' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '▪️أَعُوذُ بِاللهِ مِنْ الشَّيْطَانِ الرَّجِيمِ
     
     ⏺اللّهُ لاَ إِلَـهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَّهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَن ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلاَّ بِمَا شَاء وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَؤُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ.[آية الكرسى - البقرة 255]. 
     🔹مرة واحدة ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c1' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c1' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
     
     ⏺قُلْ هُوَ ٱللَّهُ أَحَدٌ، ٱللَّهُ ٱلصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ.
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c2' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c2' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
     
     ⏺قُلْ أَعُوذُ بِرَبِّ ٱلْفَلَقِ، مِن شَرِّ مَا خَلَقَ، وَمِن شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِن شَرِّ ٱلنَّفَّٰثَٰتِ فِى ٱلْعُقَدِ، وَمِن شَرِّ حَاسِدٍ إِذَا حَسَدَ. 
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c3' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c3' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
     
     ⏺قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ، مَلِكِ ٱلنَّاسِ، إِلَٰهِ ٱلنَّاسِ، مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ، ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ، مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ.
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c4' ]]
    ]
    ])
    ]);
    }
    
    if($data ==  'c4' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '
     🔸أَصْـبَحْنا وَأَصْـبَحَ المُـلْكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذا اليوم وَخَـيرَ ما بَعْـدَه ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذا اليوم وَشَرِّ ما بَعْـدَه، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر. ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c5' ]]
    ]
    ])
    ]);
    }
    
    if($data ==  'c5' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '
     🔸اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ . ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c6' ]]
    ]
    ])
    ]);
    }
    
    if($data ==  'c6' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔸رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً. 
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c7' ]]
    ]
    ])
    ]);
    }
    
    
    
    if($data ==  'c7' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '
     🔸حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم. 
     🔹7 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c8' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c8' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم.    
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c9' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c9' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘اللّهُـمَّ بِكَ أَصْـبَحْنا وَبِكَ أَمْسَـينا ، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ النُّـشُور' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c10' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c10' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘أَصْبَـحْـنا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ. ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي' , callback_data => 'c11' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c11' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '
     🔘سُبْحـانَ اللهِ وَبِحَمْـدِهِ عَدَدَ خَلْـقِه ، وَرِضـا نَفْسِـه ، وَزِنَـةَ عَـرْشِـه ، وَمِـدادَ كَلِمـاتِـه.
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c12' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c12' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ اللّهُـمَّ إِنّـي أَعـوذُ بِكَ مِنَ الْكُـفر ، وَالفَـقْر ، وَأَعـوذُ بِكَ مِنْ عَذابِ القَـبْر ، لا إلهَ إلاّ أَنْـتَ.
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c13' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c13' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '
     🔘اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي ، اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي ، وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي. ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c14' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c14' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘يَا حَيُّ يَا قيُّومُ بِرَحْمَتِكَ أسْتَغِيثُ أصْلِحْ لِي شَأنِي كُلَّهُ وَلاَ تَكِلُنِي إلَى نَفْسِي طَـرْفَةَ عَيْنٍ.' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c15' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c15' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘اللّهُـمَّ عالِـمَ الغَـيْبِ وَالشّـهادَةِ فاطِـرَ السّماواتِ وَالأرْضِ رَبَّ كـلِّ شَـيءٍ وَمَليـكَه ، أَشْهَـدُ أَنْ لا إِلـهَ إِلاّ أَنْت ، أَعـوذُ بِكَ مِن شَـرِّ نَفْسـي وَمِن شَـرِّ الشَّيْـطانِ وَشِـرْكِه ، وَأَنْ أَقْتَـرِفَ عَلـى نَفْسـي سوءاً أَوْ أَجُـرَّهُ إِلـى مُسْـلِم. ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c17' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c17' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق.
     🔹3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c18' ]]
    ]
    ])
    ]);
    }
    
    
    if($data ==  'c18' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد.
     ✔️غير مقيد بعدد' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c19' ]]
    ]
    ])
    ]);
    }
    if($data ==  'c19' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => '🔘اللَّهُمَّ إِنَّا نَعُوذُ بِكَ مِنْ أَنْ نُشْرِكَ بِكَ شَيْئًا نَعْلَمُهُ ، وَنَسْتَغْفِرُكَ لِمَا لَا نَعْلَمُهُ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'c20' ]]
    ]
    ])
    ]);
    }
    
    if($data ==  'c20' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     
     
    text => 
     
     "تـمــ الإنــتــــهـــاء بــحـــمــــد الــلــه
     
     ارسل /start للعودة للقائمة الرئيسية
     "
     
     ,
     reply_markup =>json_encode([
     inline_keyboard =>[
    [["text" => "قناتنا" , "url"=> "t.me/OOKO0"]]
    
    ]
    ])
    ]);
    }
    
    
    
    
    
    
    
    if($data ==  'e' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'أَعُوذُ بِاللهِ مِنْ الشَّيْطَانِ الرَّجِيمِ
     اللّهُ لاَ إِلَـهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَّهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَن ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلاَّ بِمَا شَاء وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَؤُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'e1' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e1' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
     قُلْ هُوَ ٱللَّهُ أَحَدٌ، ٱللَّهُ ٱلصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ 
     3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e2' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e2' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
     قُلْ أَعُوذُ بِرَبِّ ٱلْفَلَقِ، مِن شَرِّ مَا خَلَقَ، وَمِن شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِن شَرِّ ٱلنَّفَّٰثَٰتِ فِى ٱلْعُقَدِ، وَمِن شَرِّ حَاسِدٍ إِذَا حَسَدَ. 
     3 مرات'
     ,
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e3' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e3' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
     قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ، مَلِكِ ٱلنَّاسِ، إِلَٰهِ ٱلنَّاسِ، مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ، ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ، مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ
     3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e4' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e4' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'أَمْسَيْـنا وَأَمْسـى المـلكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذهِ اللَّـيْلَةِ وَخَـيرَ ما بَعْـدَهـا ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذهِ اللَّـيْلةِ وَشَرِّ ما بَعْـدَهـا ، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر. ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e5' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e5' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e6' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e6' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً. 3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e7' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e7' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم.   7 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e8' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e8' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم. 3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e9' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e9' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'اللّهُـمَّ بِكَ أَمْسَـينا وَبِكَ أَصْـبَحْنا، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ الْمَصِيرُ.' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻' , callback_data => 'e10' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e10' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'أَمْسَيْنَا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e11' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e11' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ.  اللّهُـمَّ إِنّـي أَعـوذُ بِكَ مِنَ الْكُـفر ، وَالفَـقْر ، وَأَعـوذُ بِكَ مِنْ عَذابِ القَـبْر لا إلهَ إلاّ أَنْـتَ
     3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e12' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e12' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي. ' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e13' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e13' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'يَا حَيُّ يَا قيُّومُ بِرَحْمَتِكَ أسْتَغِيثُ أصْلِحْ لِي شَأنِي كُلَّهُ وَلاَ تَكِلُنِي إلَى نَفْسِي طَـرْفَةَ عَيْنٍ. 3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e14' ]]
    ]
    ])
    ]);
    }if($data ==  'e14' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'اللّهُـمَّ عالِـمَ الغَـيْبِ وَالشّـهادَةِ فاطِـرَ السّماواتِ وَالأرْضِ رَبَّ كـلِّ شَـيءٍ وَمَليـكَه ، أَشْهَـدُ أَنْ لا إِلـهَ إِلاّ أَنْت ، أَعـوذُ بِكَ مِن شَـرِّ نَفْسـي وَمِن شَـرِّ الشَّيْـطانِ وَشِـرْكِه ، وَأَنْ أَقْتَـرِفَ عَلـى نَفْسـي سوءاً أَوْ أَجُـرَّهُ إِلـى مُسْـلِم' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e15' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e15' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق
     3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e16' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e16' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد.
     غير مقيد بعدد' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e17' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e17' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'أسْتَغْفِرُ اللهَ َ الَّذِي لاَ إلَهَ إلاَّ هُوَ، الحَيُّ القَيُّومُ، وَأتُوبُ إلَيهِ. 3 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e19' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e19' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'لَا إلَه إلّا اللهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلُّ شَيْءِ قَدِيرِ. 10 مرات' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e20' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e20' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     'text' => 'سُبْحـانَ اللهِ وَبِحَمْـدِهِ.100 مرة' 
     ,
     
     reply_markup =>json_encode([
     inline_keyboard =>[
    [[ 'text' => 'الـتـالـي 🌻 ' , callback_data => 'e21' ]]
    ]
    ])
    ]);
    }
    if($data ==  'e21' ){
    bot( editMessageText ,[
     chat_id =>$chat_id,
     'message_id'=>$message_id,
     
     text => 
     
     "تـمــ الإنــتــــهـــاء بــحـــمــــد الــلــه
     
     ارسل /start للعودة للقائمة الرئيسية
     "
     
     ,
    
    ]);
    }

if($text == "تطبيق القران الكريم" or $text == "تطبيق القران"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/Qran00/269",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "اذكار الصباح والمساء" or $text == "اذكار الصباح والمساء"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"أذكار الصباح والمساء 👇
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
بسم الله الرحمن الرحيم 
 اللَّهُ لَا إِلَهَ إِلَّا هُوَ الْحَيُّ الْقَيُّومُ لَا تَأْخُذُهُ سِنَةٌ وَلَا نَوْمٌ لَهُ مَا فِي السَّمَوَاتِ وَمَا فِي الْأَرْضِ مَنْ ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلَّا بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلَا يُحِيطُونَ بِشَيْءٍ مِنْ عِلْمِهِ إِلَّا بِمَا شَاءَ وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالْأَرْضَ وَلَا يَئُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
بسم الله الرحمن الرحيم 
 قُلْ هُوَ اللَّهُ أَحَدٌ (1) اللَّهُ الصَّمَدُ (2) لَمْ يَلِدْ وَلَمْ يُولَدْ (3) وَلَمْ يَكُنْ لَهُ كُفُوًا أَحَدٌ (4)
3مرات
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
بسم الله الرحمن الرحيم 
 قُلْ أَعُوذُ بِرَبِّ الْفَلَقِ (1) مِنْ شَرِّ مَا خَلَقَ (2) وَمِنْ شَرِّ غَاسِقٍ إِذَا وَقَبَ (3) وَمِنْ شَرِّ النَّفَّاثَاتِ فِي الْعُقَدِ (4) وَمِنْ شَرِّ حَاسِدٍ إِذَا حَسَدَ (5)
3مرات
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
بسم الله الرحمن الرحيم 
 قُلْ أَعُوذُ بِرَبِّ النَّاسِ (1) مَلِكِ النَّاسِ (2) إِلَهِ النَّاسِ (3) مِنْ شَرِّ الْوَسْوَاسِ الْخَنَّاسِ (4) الَّذِي يُوَسْوِسُ فِي صُدُورِ النَّاسِ (5) مِنَ الْجِنَّةِ وَالنَّاسِ (6)
3مرات
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ .-------↯
من قالها من النهار موقنا بها. فمات من يومه قبل ان يمسي . فهو من اهل الجنة .وكذلك من قالها في المساء
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي ، اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي ، وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي .-----↯
ويقال عند النوم ايضا.
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
أَصْـبَحْنا وَأَصْـبَحَ المُـلْكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذا اليوم وَخَـيرَ ما بَعْـدَه ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذا اليوم وَشَرِّ ما بَعْـدَه، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُبِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر.
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
أَمْسَيْـنا وَأَمْسـى المـلكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذهِ اللَّـيْلَةِ وَخَـيرَ ما بَعْـدَهـا ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذهِ اللَّـيْلةِ وَشَرِّ ما بَعْـدَهـا ، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر.
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم ----↯
3مرات
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
أَعـوذُبِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق .----↯
3مرات
ــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ",
]);}            
?>
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

#همسة
$update = json_decode(file_get_contents("php://input"));
$message = $update->message;
$id = $message->from->id;
$chat_id = $message->chat->id;
$username0 = $message->from->username;
$text = $message->text;
$message_id = $message->message_id;
$type = $message->chat->type;
$from_id = $message->from->id;
$username22 = $message->chat->username;
$cuser    = $update->callback_query->from->username;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$scam = ['[','*',']','_','(',')','`','َ','ٕ','ُ','ِ','ٓ','ٓ','ٰ','ٖ','ً','ّ','ٌ','ٍ','ْ','ٔ',';'];
$name = str_replace($scam,null,$message->from->first_name." ".$message->from->last_name);
$name2 = str_replace($scam,null,$update->callback_query->from->first_name." ".$update->callback_query->from->last_name);
$chat_id2 = $update->callback_query->message->chat->id;
$from_id2 = $update->callback_query->from->id;
$message_id2 = $update->callback_query->message->message_id;
$user = $update->callback_query->from->username;
$hamsa = json_decode(file_get_contents("hamsa.json"),true);
function save($array){
file_put_contents("hamsa.json",json_encode($array));
}
function filterName($name){
  $scam = ['[','*',']','_','(',')','`','َ','ٕ','ُ','ِ','ٓ','ٓ','ٰ','ٖ','ً','ّ','ٌ','ٍ','ْ','ٔ'];
  return str_replace($scam,null,$name);
 }
$userbot = "$Userbot";
if($message->reply_to_message->from->is_bot == true || $message->reply_to_message->from->is_bot == 1 ){
if($type !== "private"){
if($text == "همسه" || $text == "همسة" || $text == "اهمس" || $text == "أهمس"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"لا يمكنك عمل همسة لبوت 🙄🙄",
'reply_to_message_id'=>$message->message_id,
]);
exit;}}}
if($message->reply_to_message->from->id == $from_id && $type !== "private"){
if($text == "همسه" || $text == "همسة" || $text == "اهمس" || $text == "أهمس"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"لا يمكنك عمل همسة لنفسك 🙄🙄",
'reply_to_message_id'=>$message->message_id,
]);
exit;}}
if($text == "/start" && $type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلاً بك في بوت الهمسة",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'همسة ميديا','callback_data'=>'hamsamedia']],
[['text'=>'همسة بالرد','callback_data'=>'hamsareply'],['text'=>'همسة بالمعرف','callback_data'=>'hamsauser']],
[['text'=>'همسة بالانلاين','callback_data'=>'hamsainline']],
],
]),
]);
return false;
}
if($data == "hamsamedia"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"قم بارسال كلمة 'همسه' للبوت ومن ثم اتبع الخطوات ",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
if($data == "backtoback"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"اهلاً بك في بوت الهمسة",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'همسة ميديا','callback_data'=>'hamsamedia']],
[['text'=>'همسة بالرد','callback_data'=>'hamsareply'],['text'=>'همسة بالمعرف','callback_data'=>'hamsauser']],
[['text'=>'همسة بالانلاين','callback_data'=>'hamsainline']],
],
]),
]);
return false;
}
if($data == "hamsauser"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"عن طريق ارسال همسه + معرف في المجموعة ومن ثم اتباع الخطوات",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
if($data == "hamsareply"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"عن طريق الرد على إحدى رسائل شخص بكلمة همسه ومن ثم اتباع الخطوات",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
if($data == "hamsainline"){
bot('editMessagetext',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
'text'=>"ضع معرف البوت ثم الكلام + معرف الشخص",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'رجوع 🔙','callback_data'=>'backtoback']],
],
]),
]);
}
function info($put,$key){
if($put && $key == "name"){
$get = file_get_contents("https://api.telegram.org/bot".$API_KEY."/getChat?chat_id=$put"); 
$js = json_decode($get); 
$res = $js->result; 
$name = filterName($res->first_name);
return $name;}}
if($text == "همسة" or $text == "همسه" or $text == "أهمس" or $text == "اهمس"){
if($message->reply_to_message->message_id){
if($type !== "private"){
$hamsa[$from_id]['chat_id'] = $message->chat->id; 
$hamsa[$from_id]['for'] = $message->from->id; 
$hamsa[$from_id]['to'] = 
$message->reply_to_message->from->id;
$hamsa[$from_id]['message_id'] =$message->message_id;
$hamsa[$from_id]['reply_message_id'] = $message->reply_to_message->message_id;
save($hamsa);
$eee = bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك يمكنك الضغط على الزر وإرسال الهمسة في خاص البوت",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"قم بإرسال الهمسة بالخاص ✨","callback_data"=>'hamsa'."|".$from_id]],
],
]),
]);
$hamsa[$from_id]['msg_id_bot']= $eee->result->message_id;
save($hamsa);
}}}
 if($data == "hamsa|$from_id2"){ 
unset($hamsa[$from_id2]['hamsa']);
save($hamsa);
$hamsa[$from_id2]['hamsa'] = "send_hamsa";
save($hamsa);
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'url'=>"https://t.me/$Userbot?start=hamsa",
]);
}
if($text == "/start hamsa" && $hamsa[$from_id]['hamsa'] == "send_hamsa"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"حسناً ارسل الهمسة الآن",
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$from_id]['hamsa'] = "sendhamsa";
save($hamsa);
exit;
}
if($text && $text !== "/start" && $hamsa[$from_id]['hamsa'] == "sendhamsa"){
if($type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ارسال الهمسة بنجاح",
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$from_id]['text']=$text;
save($hamsa);
$info= info($from_id,"name");
$get_msg_id = bot('SendMessage',[
'chat_id'=>$hamsa[$from_id]['chat_id'],
'parse_mode'=>"MarkDown",
'text'=>"
صديقي لديك همسة من 

[$name](tg://user?id=$from_id)",
'reply_to_message_id'=>$hamsa[$from_id]['reply_message_id'],
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"عرض الهمسة","callback_data"=>$hamsa[$from_id]['to']."&".$from_id],['text'=>"حذف الهمسة 🚫",'callback_data'=>"del#".$from_id]],
],
]),
]);
$hamsa['hamsa'][$get_msg_id->result->message_id] = $text;
save($hamsa);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat_id'],
'message_id'=>$hamsa[$from_id]['msg_id_bot'],
]);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat_id'],
'message_id'=>$hamsa[$from_id]['message_id'],
]);
unset($hamsa[$from_id]);
save($hamsa);
}}
$explode = explode("&",$data);
$explod = explode("#",$data);
if(in_array($from_id2,$explode) && preg_match("/(&)/",$data)){
$send = bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>$hamsa['hamsa'][$message_id2],
  'show_alert'=>true,
]);
if($from_id2 == $explode[0] && $send->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك تم ارسال الهمسه لك في الخاص",
  'show_alert'=>true,
]);
$tt = bot('SendMessage',[
'chat_id'=>$from_id2,
'text'=>$hamsa['hamsa'][$message_id2],
]);
bot('SendMessage',[
'chat_id'=>$from_id2,
'parse_mode'=>"MarkDown",
'text'=>"الهمسه مرسلة لك من قبل 

[$explode[1]](tg://user?id=$explode[1])",
'reply_to_message_id'=>$tt->result->message_id,
]);
unset($hamsa['hamsa'][$message_id2]);
save($hamsa);
}
if($from_id2 == $explode[1] && $send->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك سيتم إرسال الهمسة للشخص في الخاص",
  'show_alert'=>true,
]);
}
}elseif(!in_array($from_id2,$explode) && preg_match("/(&)/",$data)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسة ليست لك",
  'show_alert'=>true,
]);
bot('SendMessage',[
'chat_id'=>$explode[1],
'parse_mode'=>"MarkDown",
'text'=>"هناك شخص يحاول كشف همستك 

الشخص : [$name2](tg://user?id=$from_id2)".

"\n\nرابط الهمسة : https://t.me/c/".str_replace("-100","",$chat_id2)."/$message_id2",
]);
}
if($explod[1] == $from_id2){
bot('DeleteMessage',[
'chat_id'=>$chat_id2,
'message_id'=>$message_id2,
]);
unset($hamsa['hamsa'][$message_id2]);
save($hamsa);
}elseif($explod[1] !== $from_id2 && preg_match("/(#)/",$data)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"لحذف الهمسة يجب أن تكون انت من ارسل هذه الهمسة ",
  'show_alert'=>true
]);
}
$inline   = $update->inline_query->query;
$in_id       = $update->inline_query->from->id;
$msg_id   = $update->inline_query->inline_message_id;
$username = $update->inline_query->from->username;
$cid      = $update->callback_query->from->id;
if ($inline == null) { 
bot('answerInlineQuery',[ 
'inline_query_id'=>$update->inline_query->id,     
'results' => json_encode([[ 
'type'=>'article', 
'description'=>"@$Userbot سلام عليكم @user", 
'id'=>base64_encode(rand(5,555)), 
'title'=>"أكتب محتوى الهمسة ثم يوزر الشخص",'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"طريقة الهمسة : \n لشخص واحد فقط :\n @$Userbot سلام عليكم‏ @user \n لأكثر من شخص : \n @$Userbot سلام عليكم‏ @user @‏user"],]])]); 
}
if(preg_match("/(.*) (@all)$/",$inline,$q)){
$rand = rand(0,10000000);
$rree = base64_encode(rand(5,555));
    bot('answerInlineQuery',[ 'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>$rree,
                'title'=>"هـذه الـهـمـسـة للجميع 🥳",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"هـذه الـهـمـسـة للجميع 🥳"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'👁 عـرض الـهـمـسـة','callback_data'=>'hamsa'.$rand.'>'.'all']
                ],
             ]]
          ]])
        ]);
$hamsa['hamsa'.$rand] = $q[1];
save($hamsa);
return false;
}
if ($inline !== null && !preg_match("/(photo|sticker|audio|voice|video)#(.*) (@)(.*)/",$inline) && !preg_match("/^(@)/",$inline) && !preg_match("/(@all)/",$inline)) {
$ert = explode("@",$inline);
if(!isset($ert[0])){
return;}
$ee = explode(" ",$inline);
for($i=0;$i<count($ee);$i++){
if(preg_match("/(@)/",$ee[$i])){
$ok .= "or".str_replace("@","",$ee[$i]);
}elseif(is_numeric($ee[$i])){
$ok .= "or".$ee[$i];
}}
if($ok == null){
return;}
if(preg_match("/(bot)/",$ok) or preg_match("/(bot)/",$ok)){
return;}
$tttt = str_replace([$ok,"or"],"",$inline);
if($tttt == null){return;}
$rand = rand(0,10000000);
$rree = base64_encode(rand(5,555));
preg_match_all("/(@)(.*)/",$inline,$r);
    bot('answerInlineQuery',[ 'inline_query_id'=>$update->inline_query->id,    
            'results' => json_encode([[
                'type'=>'article',
                'id'=>$rree,
                'title'=>"هـذه الـهـمـسـة خـاصـة لـ ".$r[0][0]." 😉",
             'input_message_content'=>['parse_mode'=>'HTML','message_text'=>"هـذه الـهـمـسـة خـاصـة لـ )".$r[0][0].") 😉"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'👁 عـرض الـهـمـسـة','callback_data'=>'hamsa'.$rand.'or'.$in_id.$ok]
                ],
             ]]
          ]])
        ]);

$ey = preg_replace(["/@(.*)/","/or\d/"],"",$inline);
$ey = str_replace($ok,"",$ey);
$hamsa['hamsa'.$rand] = $ey;
save($hamsa);
}
    $ex = explode("or", $data);
    if (in_array($cuser,$ex) || in_array($cid,$ex)) {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$hamsa[$ex[0]],
            'show_alert'=>true
            ]);
    }
$exx = explode(">", $data);
    if($exx[1] == "all") {
        bot('answerCallbackQuery',[
            'callback_query_id'=>$update->callback_query->id,
            'text'=>$hamsa[$exx[0]],
            'show_alert'=>true
            ]);
    }

if(isset($ex[0])){
   if (!in_array($cuser,$ex) && !in_array($cid,$ex)) {
if(preg_match("/(or)/",$data) && !preg_match("/(form)/",$data) && !preg_match("/(=)/",$data)){
        bot('answerCallbackQuery',[
    'callback_query_id'=>$update->callback_query->id,
            'text'=>"الـهـمـسـة لـيـست لـك عـزيـزي 🖖",
            'show_alert'=>true,
            ]);
    }}}
if(preg_match("/^(همسه|همسة|أهمس|اهمس) (@)(.*)$/",$text,$match)){
if($type !== "private"){
$eeee = explode(" ",$match[3]);
if(is_string($eeee[0]) && !preg_match("/(bot)/",$eeee[0]) && !preg_match("/(bot)/",$eeee[0])){
if($eeee[0] == $username0){return;}
$hamsa[$from_id]['for'] = $from_id;
$hamsa[$from_id]['to'] = $eeee[0];
$hamsa[$from_id]['chat'] = $chat_id;
$hamsa[$from_id]['message_id'] = $message->message_id;
save($hamsa);
$eee = bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك يمكنك الضغط على الزر وإرسال الهمسة في خاص البوت",
'reply_to_message_id'=>$message->message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"قم بإرسال الهمسة بالخاص ✨","callback_data"=>'hamsa'."form".$from_id]],
],
]),
]);
$hamsa[$from_id]['msg_id_bot']= $eee->result->message_id;
save($hamsa);
}}}
 if($data == "hamsaform$from_id2"){ 
unset($hamsa[$from_id2]['hamsa']);
save($hamsa);
$hamsa[$from_id2]['hamsa'] = "send_hamsauser";
save($hamsa);
     bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'url'=>"https://t.me/$Userbot?start=hamsa_user",
]);
}
if($text == "/start hamsa_user" && $hamsa[$from_id]['hamsa'] == "send_hamsauser"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"حسناً ارسل الهمسة الآن",
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$from_id]['hamsa'] = "sendhamsauser";
save($hamsa);
exit;
}
if($text !== "/start" && $hamsa[$from_id]['hamsa'] == "sendhamsauser"){
if($type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم ارسال الهمسة بنجاح",
]);
$too = $hamsa[$from_id]['to'];
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$get_msg_id = bot('SendMessage',[
'chat_id'=>$hamsa[$from_id]['chat'],
'parse_mode'=>"MarkDown",
'text'=>"
صديقي [@$too] لديك همسة من 

[$name](tg://user?id=$from_id)",
'reply_to_message_id'=>$hamsa[$from_id]['reply_message_id'],
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>"عرض الهمسة","callback_data"=>$hamsa[$from_id]['to']."=".$from_id],['text'=>"حذف الهمسة 🚫",'callback_data'=>"del#".$from_id]],
],
]),
]);
$hamsa['hamsa'][$get_msg_id->result->message_id] = $text;
save($hamsa);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat'],
'message_id'=>$hamsa[$from_id]['msg_id_bot'],
]);
bot('DeleteMessage',[
'chat_id'=>$hamsa[$from_id]['chat'],
'message_id'=>$hamsa[$from_id]['message_id'],
]);
unset($hamsa[$from_id]);
save($hamsa);
}}
$a = explode("=",$data);
if($cuser == $a[0] || $from_id2 == $a[1]){
$sendh = bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>$hamsa['hamsa'][$message_id2],
  'show_alert'=>true,
]);
if($cuser == $a[0] && $sendh->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك تم ارسال الهمسه لك في الخاص",
  'show_alert'=>true,
]);
$tt = bot('SendMessage',[
'chat_id'=>$from_id2,
'text'=>$hamsa['hamsa'][$message_id2],
]);
bot('SendMessage',[
'chat_id'=>$from_id2,
'parse_mode'=>"MarkDown",
'text'=>"الهمسه مرسلة لك من قبل 

[$explode[1]](tg://user?id=$explode[1])",
'reply_to_message_id'=>$tt->result->message_id,
]);
unset($hamsa['hamsa'][$message_id2]);
save($hamsa);
}
if($from_id2 == $a[1] && $sendh->ok !== true){
bot('answercallbackquery',[
'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسه طويلة جدا ، لذلك سيتم إرسال الهمسة للشخص في الخاص",
  'show_alert'=>true,
]);
}
}elseif(!in_array($cuser,$a) && preg_match("/(=)/",$data) && !in_array($from_id2,$a)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسة ليست لك",
  'show_alert'=>true,
]);
bot('SendMessage',[
'chat_id'=>$a[1],
'parse_mode'=>"MarkDown",
'text'=>"هناك شخص يحاول كشف همستك 

الشخص : [$name2](tg://user?id=$from_id2)".

"\n\nرابط الهمسة : https://t.me/c/".str_replace("-100","",$chat_id2)."/$message_id2",
]);
}
if($text == "همسه" || $text == "همسة" ||$text == "اهمس" || $text == "أهمس"){
if($type == "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"
حسناً يمكنك ارسل صوتية ، مقطع صوتي ، فيديو ، صورة ، ملصق ",
]);
$hamsa[$from_id]['hamsa'] = "hamsa_media";
save($hamsa);
exit;
}}
if($message->voice || $message->audio || $message->video || $message->photo || $message->sticker){
if($hamsa[$from_id]['hamsa'] == "hamsa_media" && $type == "private"){
if($message->voice){
$file_id = $message->voice->file_id;
$type_media = "الصوتية";
$media = "voice";
}elseif($message->audio){
$file_id = $message->audio->file_id;
$type_media = "المقطع الصوتي";
$media = "audio";
}elseif($message->video){
$file_id = $message->video->file_id;
$type_media = "الفيديو";
$media = "video";
}elseif($message->photo){
$file_id = $message->photo[0]->file_id;
$type_media = "الصورة";
$media = "photo";
}elseif($message->sticker){
$file_id = $message->sticker->file_id;
$type_media = "الملصق";
$media = "sticker";
}
$rendom = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWYZ0123456789'),1,5);
bot('SendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>"MarkDown",
'text'=>"تم حفظ $type_media بنجاح 💯
\n
كود الهمسة 

`$media#$rendom`

يمكنك الهمسة الميديا بالشكل التالي 

`@$Userbot $media#$rendom @` +id or user


example : 

`@$Userbot $media#$rendom @username`

`@$Userbot $media#$rendom @164667787`

",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'مشاركة الهمسة','switch_inline_query'=>"$media#$rendom"]],
],
]),
]);
unset($hamsa[$from_id]['hamsa']);
save($hamsa);
$hamsa[$rendom] = $file_id;
save($hamsa);
}
}
if(preg_match("/(photo|sticker|audio|voice|video)#(.*) (@)(.*)/",$inline,$match)){
if(!$hamsa[$match[2]]){return;}
if($match[4] == null){return;}
if(is_numeric($match[4])){$u_hamsa="[$match[4]](tg://user?id=$match[4])";}else{$u_hamsa="[@$match[4]]";}
    bot('answerInlineQuery',[ 'inline_query_id'=>$update->inline_query->id,   
        'cache_time'=>'300', 
            'results' => json_encode([[
                'type'=>'article',
                'id'=>base64_encode(rand(5,555)),
                'title'=>"هـذه الـهـمـسـة خـاصـة لـ $match[4] 😉",
             'input_message_content'=>['parse_mode'=>'Markdown','message_text'=>"هـذه الـهـمـسـة خـاصـة لـ $u_hamsa 😉"],
            'reply_markup'=>['inline_keyboard'=>[
                [
                ['text'=>'👁 عـرض الـهـمـسـة','callback_data'=>$in_id."~".$match[4]."~".$match[1]."~".$match[2]]
                ],
             ]]
          ]])
        ]);

}
$rrr = explode("~",$data);
if(preg_match("/(~)/",$data)){
if($from_id2 == $rrr[1] || $cuser == $rrr[1]){
$send = bot('Send'.$rrr[2],[
'chat_id'=>$from_id2,
$rrr[2]=>$hamsa[$rrr[3]],
]);
bot('SendMessage',[
'chat_id'=>$from_id2,
'parse_mode'=>"MarkDown",
'text'=>"*هذه الهمسة مرسلة إليك من قبل*

[$rrr[0]](tg:user?id=$rrr[0])",
'reply_to_message_id'=>$send->result->message_id,
]);
bot('EditMessageText',[
'inline_message_id'=>$update->callback_query->inline_message_id,
'parse_mode'=>"MarkDown",
'text'=>"عزيزي [$from_id2](tg://user?id=$from_id2)

*تم إرسال همسة الميديا اليك بالخاص*",
]);
unset($hamsa[$rrr[3]]);
save($hamsa);
}}
if(!in_array($from_id2,$rrr) && !in_array($cuser,$rrr) && preg_match("/(~)/",$data)){
bot('answercallbackquery',[
      'callback_query_id' => $update->callback_query->id,
'text'=>"الهمسة ليست لك",
  'show_alert'=>true,
]);}
if($text == "همسة" or $text == "همسه" or $text == "أهمس" or $text == "اهمس"){
if(!$message->reply_to_message->message_id){
if($type !== "private"){
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"بوت الهمسة : @$Userbot",
'reply_to_message_id'=>$message_id,
]);
}}}


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

#الاذكار
if($start=="non"){
$start="
        💞 | اهلا بك في 🔖
🇮🇶 |  بوت الـ قران الكريم الاذكار 
📋 |  ارسل اسم السورة 
📮 | كـ مثال  (سورة الفاتحه)
💌 | سأقوم بالتذكير بمواعيد الصلاة
💭 | سأقوم بارسال اذكار لمجموعتك كل ساعه
🕯 | ارسل امر  (( الايات )) لعرض سـور القران
🕯 | ارفعني مشرف في كروبك يمكنني التذكير ونشر الاذكار
🕯 | يمكنني استعراض الايات في الكروبات ايضا ارسل الايات

";

}





$armoufthkk = explode("\n",file_get_contents("armofgroup.txt"));
$armofgp = count($armoufthkk)-1;
if ($message->chat->type== "supergroup" or $message->chat->type== "group"){
if(!in_array($chat_id, $armoufthkk)){
file_put_contents("armofgroup.txt", $chat_id."\n",FILE_APPEND);}}




$armof2 = explode("\n",file_get_contents("armof4.txt"));
$armof3 = count($armof2)-1;
if ($message && !in_array($from_id, $armof2)){
file_put_contents("armof4.txt", $from_id."\n",FILE_APPEND);}

if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text'=>"$start


",
'parse_mode'=>HTML,
]);
}

if($text == "الايات" or $text == "ألايات" or $text == "قائمة الايات"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"🗃ســور الـقران الكـريـم 🗃
ا ֆ • • • • • • • • • • • • • ֆ
🕋 | 1-سورة الفاتحه
🕋 | 2-البقرة
🕋 | 3-سورة ال عمران
🕋 | 4-سورة النساء
🕋 | 5-سورة المائدة
🕋 | 6-سورة الانعام
🕋 | 7-سورة الأعراف
🕋 | 8-سورة الأنفال
🕋 | 9-سورة التوبة
🕋 | 10-سورة يونس
🕋 | 11-سورة هود
🕋 | 12-سورة يوسف
🕋 | 13-سورة الرعد
🕋 | 14-سورة أبراهيم
🕋 | 15-سورة الحجر
🕋 | 16-سورة النحل
🕋 | 17-سورة الاسراء
🕋 | 18-سورة الكهف
🕋 | 19-سورة مريم
🕋 | 20-سورة طه
🕋 | 21-سورة الأنبياء
🕋 | 22-سورة الحج
🕋 | 23-سورة المؤمنون
🕋 | 24-سورة النور
🕋 | 25-سورة الفرقان
🕋 | 26-سورة الشعراء
🕋 | 27-سورة النحل
🕋 | 28-سورة القصص
🕋 | 29-سورة العنكبوت
🕋 | 30-سورة الروم
🕋 | 31-سورة لقمان
🕋 | 32-سورة السجدة
🕋 | 33-سورة الاحزاب
🕋 | 34-سورة سبأ
🕋 | 35-سورة فاطر
🕋 | 36-سورة يس
🕋 | 37-سورة الصافات
🕋 | 38-سورة ص
🕋 | 39-سورة الزمر
🕋 | 40-سورة غافر
🕋 | 41-سورة فصلت
🕋 | 42-سورة الشورئ
🕋 | 43-سورة الزخرف
🕋 | 44-سورة الدخان
🕋 | 45-سورة الجاثيه
🕋 | 46-سورة الاحقاف
🕋 | 47-سورة محمد
🕋 | 48-سورة الفتح
🕋 | 49-سورة الحجرات
🕋 | 50-سورة ق
🕋 | 51-سورة الذاريات
🕋 | 52-سورة الطور
🕋 | 53-سورة النجم
🕋 | 54-سورة القمر
🕋 | 55-سورة الرحمن
🕋 | 56-سورة الواقعه
🕋 | 57-سورة الحديد
🕋 | 58-سورة المجادلة
🕋 | 59-سورة الحشر
🕋 | 60-سورة الممتحنة
🕋 | 61-سورة الصف
🕋 | 62-سورة الجمعة
🕋 | 63-سورة المنافقون
🕋 | 64-سورة التغابن
🕋 | 65-سورة الطلاق
🕋 | 66-سورة التحريم
🕋 | 67-سورة الملك
🕋 | 68-سورة القلم
🕋 | 69-سورة الحاقة
🕋 | 70-سورة المعارج
🕋 | 71-سورة نوح
🕋 | 72-سورة الجن
🕋 | 73-سورة المزمل
🕋 | 74-سورة المدثر
🕋 | 75-سورة القيامة
🕋 | 76-سورة الانسان
🕋 | 77-سورة المرسلات
🕋 | 78-سورة النبأ
🕋 | 79-سورة النازعات
🕋 | 80-سورة عبس
🕋 | 81-سورة التكوير
🕋 | 82-سورة الانفطار
🕋 | 83-سورة المطففين
🕋 | 84-سورة الانشقاق
🕋 | 85-سورة البروج
🕋 | 86-سورة الطارق
🕋 | 87-سورة الاعلئ
🕋 | 88-سورة الغاشية
🕋 | 89-سورة الفجر
🕋 | 90-سورة البلد
🕋 | 91-سورة الشمس
🕋 | 92-سورة الليل
🕋 | 93-سورة الضحئ
🕋 | 94-سورة الشرح
🕋 | 95-سورة التين
🕋 | 96- سورة العلق  
🕋 | 97- سورة القدر
🕋 | 98-سورة البينة
🕋 | 99-سورة الزلزلة
🕋 | 100-سورة العاديات
🕋 | 101-سورة القارعة
🕋 | 102-سورة التكاثر
🕋 | 103-سورة العصر
🕋 | 104-سورة الهمزة
🕋 | 105-سورة الفيل
🕋 | 106-سورة قريش
🕋 | 107-سورة الماعون
🕋 | 108-سورة الكوثر
🕋 | 109-سورة الكافرون
🕋 | 110-سورة النصر
🕋 | 111-سورة المسد
🕋 | 112-سورة الاخلاص
🕋 | 113-سورة الفلق
🕋 | 114-سورة الناس
ا ֆ • • • • • • • • • • • • • ֆ
",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "سورة الفاتحه" or $text == "سوره الفاتحه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/15",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره البقره" or $text == "سورة البقره"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/4",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة ال عمران" or $text == "سوره ال عمران"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/5",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره النساء" or $text == "سورة النساء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/7",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المائده" or $text == "سوره المائده"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/8",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الانعام" or $text == "سورة الأنعام"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/9",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الانعام" or $text == "سورة الانعام"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/10",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاعراف" or $text == "سوره الاعراف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/11",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الانفال" or $text == "سوره الانفال"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/12",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره التوبه" or $text == "سورة التوبه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/13",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره يونس" or $text == "سورة يونس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/14",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة هود" or $text == "سوره هود"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/17",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة يوسف" or $text == "سوره يوسف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/18",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الرعد" or $text == "سوره الرعد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/21",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره ابراهيم" or $text == "سورة ابراهيم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/25",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحجر" or $text == "سورة الحجر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/29",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة النحل" or $text == "سوره النحل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/33",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الاسراء" or $text == "سورة الاسراء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/37",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الكهف" or $text == "سوره الكهف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/41",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة مريم" or $text == "سوره مريم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/45",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سوره طه" or $text == "سورة طه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/47",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الانبياء" or $text == "سورة الانبياء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/49",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الحج" or $text == "سوره الحج"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/51",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المؤمنون" or $text == "سوره المؤمنون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/53",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره النور" or $text == "سورة النور"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/56",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفرقان" or $text == "سوره الفرقان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/58",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الشعراء" or $text == "سوره الشعراء"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/60",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره القصص" or $text == "سورة القصص"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/62",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره العنكبوت" or $text == "سورة العنكبوت"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/66",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الروم" or $text == "سوره الروم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/68",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة لقمان" or $text == "سوره لقمان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/70",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة السجده" or $text == "سوره السجده"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/72",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاحزاب" or $text == "سوره الاحزاب"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/74",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة سبأ" or $text == "سوره سبأ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/76",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره فاطر" or $text == "سورة فاطر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/78",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره يس" or $text == "سورة يس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/80",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الصافات" or $text == "سوره الصافات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/82",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة ص" or $text == "سوره ص"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/84",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الزمر" or $text == "سورة الزمر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/86",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة غافر" or $text == "سوره غافر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/88",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة فصلت" or $text == "سوره فصلت"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/91",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الشورئ" or $text == "سوره الشورئ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/93",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الزحرف" or $text == "سوره الزحرف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/95",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الدخان" or $text == "سوره الدخان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/97",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الجاثية" or $text == "سوره الجاثيه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/99",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاحقاف" or $text == "سوره الاحقاف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/101",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة محمد" or $text == "سوره محمد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/103",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفتح" or $text == "سوره الفتح"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/105",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحجرات" or $text == "سورة الحجرات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/107",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة ق" or $text == "سوره ق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة الذاريات" or $text == "سوره الذاريات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/111",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الطور" or $text == "سوره الطور"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/115",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة القمر" or $text == "سوره القمر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/121",
 reply_to_message_id =>$message->message_id, 
]);
}if($text == "سورة الرحمن" or $text == "سوره الرحمن"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/123",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الواقعه" or $text == "سوره الواقعه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/125",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الحديد" or $text == "سوره الحديد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/127",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورةه المجادله" or $text == "سوره المجادله"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/129",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الحشر" or $text == "سورة الحشر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/131",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الممتحنه" or $text == "سوره الممتحنه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/133",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الصف" or $text == "سوره الصف"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/135",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سوره الجمعه" or $text == "سورة الجمعه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/137",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المنافقون" or $text == "سوره المنافقون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/139",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة التغابن" or $text == "سوره التغابن"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/141",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الطلاق" or $text == "سوره الطلاق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/143",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة التحريم" or $text == "سوره التحريم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/145",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الملك" or $text == "سوره الملك"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/147",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سوره القلم" or $text == "سورة القلم"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/149",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المعارج" or $text == "سوره المعارج"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/152",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة نوح" or $text == "سوره نوح"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/154",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الجن" or $text == "سوره الجن"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/156",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المزمل" or $text == "سوره المزمل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/158",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المدثر" or $text == "سوره المدثر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/160",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورةه القيامه" or $text == "سوره القيامه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/162",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة الانسان" or $text == "سوره الانسان"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/164",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة المرسلات" or $text == "سوره المرسلات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/166",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة نبأ" or $text == "سوره نبأ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/168",
 reply_to_message_id =>$message->message_id, 
]);
}

if($text == "سورة النازعات" or $text == "سوره النازعات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/170",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره عبس" or $text == "سوره عبس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/172",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة التكوير" or $text == "سوره التكوير"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/174",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الانفطار" or $text == "سورة الانفطار"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/176",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره المطففين" or $text == "سورة المطففين"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/178",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الانشقاق" or $text == "سورة الانشقاق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/180",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة البروج" or $text == "سورة البروج"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/302",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الطارق" or $text == "سورة الطارق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/304",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الاعلئ" or $text == "سورة الاعلئ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/306",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الغاشيه" or $text == "سوره الغاشيه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/308",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفجر" or $text == "سوره الفجر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/310",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة البلد" or $text == "سوره البلد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/312",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الشمس" or $text == "سورة الشمس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/314",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الليل" or $text == "سوره الليل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/316",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الضحئ" or $text == "سوره الضحئ"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/318",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الشرح" or $text == "سوره الشرح"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/320",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة التين" or $text == "سوره التين"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/322",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة العلق" or $text == "سوره العلق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/324",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره القدر" or $text == "سورة القدر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/326",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الزلزلة" or $text == "سورة الزلزله"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/328",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره البينة" or $text == "سورة البينة"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/330",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة العاديات" or $text == "سوره العاديات"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/332",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره القارعه" or $text == "سورة القارعه"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/334",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره التكاثر" or $text == "سورة التكاثر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/336",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره العصر" or $text == "سورة العصر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/338",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الهمزة" or $text == "سورة الهمزة"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/340",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفيل" or $text == "سوره الفيل"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/342",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة قريش" or $text == "سوره قريش"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/344",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الماعون" or $text == "سوره الماعون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/346",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "" or $text == ""){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الكوثر" or $text == "سوره الكوثر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/348",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الكافرون" or $text == "سورة الكافرون"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/350",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة النصر" or $text == "سوره النصر"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/352",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة المسد" or $text == "سوره المسد"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/354",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الاخلاص" or $text == "سوره الاخلاص"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/356",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سورة الفلق" or $text == "سوره الفلق"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/358",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "سوره الناس" or $text == "سورة الناس"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/360",
 reply_to_message_id =>$message->message_id, 
]);
}
if($text == "مطور" or $text == "المطور"){
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"مـطور البـوت 🍂 :- @BYYYY
تـُواصـل المحضـوريـن 🛡",
'reply_to_message_id'=>$message->message_id, 
]);
}
if($text == "سوره الحاقة" or $text == "سورة الحاقة"){
bot( sendaudio ,[
 chat_id =>$chat_id, 
 audio =>"https://t.me/bot_qran/364",
 reply_to_message_id =>$message->message_id, 
]);
}
#####تذكير خاص#####
$azan = file_get_contents("azan.txt");
$azangroup = file_get_contents("azangroup.txt");
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
if($time == "7:40 pm"){
file_put_contents("azangroup.txt","no5");
}
if($time == "6:10 pm"){
file_put_contents("azangroup.txt","no4");
}
if($time == "3:29 pm"){
file_put_contents("azangroup.txt","no3");
}
if($time == "11:58 am"){
file_put_contents("azangroup.txt","no2");
}
if($time == "4:19 am"){
file_put_contents("azangroup.txt","no1");
}
if($time == "4:19 am"){
file_put_contents("azan.txt","no1");
}
if($time == "11:58 am"){
file_put_contents("azan.txt","no2");
}
if($time == "3:29 pm"){
file_put_contents("azan.txt","no3");
}
if($time == "6:10 pm"){
file_put_contents("azan.txt","no4");
}
if($time == "7:40 pm"){
file_put_contents("azan.txt","no5");
}
if($time == "4:19 am"){
if($azan == "no1"){
for($armo=0;$armo<count($armof2); $armo++){
bot("SendMessage",[
'chat_id'=>$armof2[$armo],
'text'=>"انه وقت صلاة الفجر بتوقيت مدينة بغداد وظواحيها لطفا قم لصلاتك الان غفر الله لك ذنبك  
💞استغفر الله الحمد لله",
]);
file_put_contents("azan.txt","1");
}
}
}
if($time == "11:58 am"){
if($azan == "no2"){
for($armo=0;$armo<count($armof2); $armo++){
bot("SendMessage",[
'chat_id'=>$armof2[$armo],
'text'=>"حان الان موعد اذان الظهر بتوقيت بغداد وظواحيها لطفا قم لصلاتك غفر الله لك 
💞الله اكبر لا الله الا الله",
]);
file_put_contents("azan.txt","2");
}
}
}
if($time == "3:29 pm"){
if($azan == "no3"){
for($armo=0;$armo<count($armof2); $armo++){
bot("SendMessage",[
'chat_id'=>$armof2[$armo],
'text'=>"حان الان موعد اذان العصر لطفا قم لصلاتك غفر الله لك ذنبك 
💞الحمد لله الشكر لله",
]);
file_put_contents("azan.txt","3");
}
}
}
if($time == "6:10 pm"){
if($azan == "no4"){
for($armo=0;$armo<count($armof2); $armo++){
bot("SendMessage",[
'chat_id'=>$armof2[$armo],
'text'=>"حان الان موعد اذان المغرب بتوقيت بغداد وظواحيها قم لصلاتك غفر الله لك 
💞اللهم صل على محمد وعلى اله وصحبه وسلم",
]);
file_put_contents("azan.txt","4");
}
}
}
if($time == "7:40 pm"){
if($azan == "no5"){
for($armo=0;$armo<count($armof2); $armo++){
bot("SendMessage",[
'chat_id'=>$armof2[$armo],
'text'=>"حان الان موعد اذان العشاء بتوقيت بغداد وظواحيها قم لصلاتك غفر الله لك 
💞الله اكبر الله اكبر",
]);
file_put_contents("azan.txt","5");
}
}
}
if($time == "4:19 am"){
if($azangroup == "no1"){
for($armo=0;$armo<count($armoufthkk); $armo++){
bot("SendMessage",[
'chat_id'=>$armoufthkk[$armo],
'text'=>"انه وقت صلاة الفجر بتوقيت مدينة بغداد وظواحيها لطفا قم لصلاتك الان غفر الله لك ذنبك  
💞استغفر الله الحمد لله",
]);
file_put_contents("azangroup.txt","1");
}
}
}
if($time == "11:58 am"){
if($azangroup == "no2"){
for($armo=0;$armo<count($armoufthkk); $armo++){
bot("SendMessage",[
'chat_id'=>$armoufthkk[$armo],
'text'=>"حان الان موعد اذان الظهر بتوقيت بغداد وظواحيها لطفا قم لصلاتك غفر الله لك 
💞الله اكبر لا الله الا الله",
]);
file_put_contents("azangroup.txt","2");
}
}
}
if($time == "3:29 pm"){
if($azangroup == "no3"){
for($armo=0;$armo<count($armoufthkk); $armo++){
bot("SendMessage",[
'chat_id'=>$armoufthkk[$armo],
'text'=>"حان الان موعد اذان العصر لطفا قم لصلاتك غفر الله لك ذنبك 
💞الحمد لله الشكر لله",
]);
file_put_contents("azangroup.txt","3");
}
}
}
if($time == "6:10 pm"){
if($azangroup == "no4"){
for($armo=0;$armo<count($armoufthkk); $armo++){
bot("SendMessage",[
'chat_id'=>$armoufthkk[$armo],
'text'=>"حان الان موعد اذان المغرب بتوقيت بغداد وظواحيها قم لصلاتك غفر الله لك 
💞اللهم صل على محمد وعلى اله وصحبه وسلم",
]);
file_put_contents("azangroup.txt","4");
}
}
}
if($time == "7:40 pm"){
if($azangroup == "no5"){
for($armo=0;$armo<count($armoufthkk); $armo++){
bot("SendMessage",[
'chat_id'=>$armoufthkk[$armo],
'text'=>"حان الان موعد اذان العشاء بتوقيت بغداد وظواحيها قم لصلاتك غفر الله لك 
💞الله اكبر الله اكبر",
]);
file_put_contents("azangroup.txt","5");
}
}
}

#######
$a = array("
‏كُل سعي تجتهدُ فيه يُتعبك، إلّا الطاعة كلّما 
أعطيتها حقّها زادتك قوّة؛ فخُذها بقوّة
","
بسمِ اللهِ الذي لا يَضُرُّ مع اسمه شيءٌ في الأرضِ و لا في السماءِ ، و هو السميعُ العليمُ
🍃🌻
","
‌‎اللهم اكتب لنا من خشيتك ماتحولُ به بيننا وبين معصيتك ، ومن طاعتك ماتبلغنا به جنتك❤️
","
”اللهُم إنا نسألك الخير الذي يُعانق حياتنا دائمًا وأبدًا” ❤️.
","
‏وهبْ لي يالله في حنايا قلبي نُوراً يُضئ بصيرتي و يبين لي دربي❤
","
ثقل ميزانك بِـ : سبحان الله وبحمده، سبحان الله العظيم💛
","
‏وهبْ لي يالله في حنايا قلبي نُوراً يُضئ بصيرتي و يبين لي دربي❤
","
‏صباح النور ثمّ:
ولِّ وجهك شطر ربّك تلقى النور ✨
 ويارب هب لنا فرحاً يعقب كُل تعب نتعبه ✨
","
‏وذكُرالرسول ‌تُضاء بهِ ‌الحياة 
اللهم صل و سلم على رسول الله.. 💛
","
ثم أهدني إلى النُّور يارب ، أنبت بقلبي زهورًا من سلام.
","
عش جمعتك بحبّ ، إقرأ الكهفّ بقلبٍ حاضر ، صلِّ على رسولك وإستشعر شفاعته ، ودثّـر نفسُك بالدعاء💭🌿
إن الصلاة على النبي تكفل إستجابة كل ما خُفي في قلبك ، عليه الصلاة والسلام
","
‏حيثُما كُنتُم فَصلَّوا عَليَّ فَإنَّ صَلاتُكُم تَبلُغُني
 -اللّهُمَّ صلِّ علىٰ نَبينا محمد
","
‏وإننِي يا الله ، أحِب أن تغرقنِي صلاحاً فـ تُحبنِي وتجعَل ملائكة السماء من حُبك تُحِبني فلاَ الأرض موطنِي ولا أهل الأرض غايتِي .
","
‏اللهم أرحم أرواحاً صعدت إليك كانت ولاتزال تعيش في قلوبنا نحبها ولم يعد بيننا وبينها إلا الدعاء🖤❤.
","
اللهم صل وسلم وبارك على سيدنا وحبيبنا محمد
اللهم صل وسلم وبارك على سيدنا وحبيبنا محمد💕
","
‏﴿والله يعلم و أنتم لا تعلمون﴾
","
كل التأخيرات في حياتك هي لحكمة يعلمها الله، سلم أمرك له وثق به وهو سبحانه سيعوضك خيرا ❤
","
‏حتّى عندمـا أعجز تمامًا عن قول الدعاء المناسب لشعوري ، كان يكفيني جداً أن أضع يدي على قلبي وأردد : اللهُم قلبي لأطمئن وأنجو 💜
","
‏اللهم شفاءً لمريض بكى من ألمه واستصعب دواءه ولازال يناديك طالباً الشفاء♥️.
","
‏وقُل الحمد لله ❤️،
حتى يتسع صدرُك للحياة،
وقُل الحمدُلله فإنَ بِها تطيبُ الأحَوال.
","
قال ﷺ(أَحَبُّ الْأَعْمَالِ إِلَى اللهِ عَزَّ وَجَلَّ-:
سُرُورٌ تُدْخِلُهُ عَلَى مُسْلِم)
","
‏وأعوذُ بك اللهّم من دربٍ مسدود، وسعيٍ مردود، وظنٍّ مخذول، وأن يتعلق قلبي بما ليس لي🌻.
","
‏الحمدلله. 🌿
استغفرالله. ♥️
لااله الا الله. 💜
الله اكبر.🌸
","
‏• أستغفرالله العظيم لي ولوالدي
وللمؤمنين والمؤمنات والمسلمين والمسلمات الأحياء منهم والأموات❤️ .
","
صباح الخير  ثُم اللهم رب الحياة ارزقنا نصيبًا من الحياة في هذه الحياة.
","
﴿وَلا تَكونوا كَالَّذينَ نَسُوا اللَّهَ فَأَنساهُم أَنفُسَهُم أُولئِكَ هُمُ الفاسِقونَ﴾
","
‏لنتفَائل بحُدوث أشياء سَعيدهہ وَ أخبآر جَميلہ وَ مُستَقبل أفضَل فَ الثقهه بِ اللہ تَجلب كل مَ لم يَكن بالحُسبان♡
","
‏يارب حقق لنا مبتغانا يارب ادخلنا الفردوس الاعلى من الجنه يارب ارضى عنا واقبل دعائنا يارررب أرزقنا سعادة القلب و طمأنينة النفس يارب 🧡🧡
","
اللهم صل وسلم وبارك على سيدنا محمد
","
‏- رسالة لك #تفاءل 
اتركها تأتي كما كتبها الله لك ، لعلها تأتي كما تمناها قلبك . ❤️
","
صباح الخير ، توكل على الله، و ردّد اذكارك ، وتفائل وابتسم ،أصبحنا وأصبح المُلك لله وحده لاشريك له 💙☀️.
","
‏الُّلهم اجعل كل ما فقدتُه خيراً، وكل ما أحزنَنِي خيراً، وكل ما أبعدتهُ عنّي خيراً واجعل لي نصيباً من الرحمة والمغفرة والفرح والسعادة  والرزق والهداية.
","
- اللَّهُـمَّ صلِّ وسَلِّم على نبيّنا مُحمَد ﷺ

‏قال النبي ﷺ: اكثروا من الصلاة عليّ ليلة الجمعة ويوم الجمعة فإن صلاتكم معروضة عليّ .. 🍃
","
اللهم صل وسلم على نبينا محمد🌿
اللهم صل وسلم على نبينا محمد 🌿
","
‏سيفاجئك الله بلطفه من حيث لاتدري ، وتهدأ روحك وتنعم براحة البال ، ثق في الواحد اللطيف الخبير . واصبر لحكم ربك فإنك بأعيننا❤
","
‏ يا مالك المُلك وكلتك أمري وأستودعتك همي فبشرني بما يفتح مداخل السعادة إلى قلبي ❤️
","
‏﴿ما يفتح الله للناس من رحمة فلا ممسك لها﴾🌿💜
","
عش حياتك قرير العين ، مطمئناً ، موقناً ، واثقاً بأنه لن يستطيع أحدٌ أن يغلق باباً فتحه الله لك .
","
لا إلهَ إلا اللهُ وحدَه لا شريكَ له ،له الملكُ ، و له الحمدُ يحيي و يُميتُ ، و هو على كلِّ شيءٍ قديرٌ
🍃🌻
","
﴿ إن الذين قالوا ربنا الله ثم استقاموا تتنزل عليهم الملائكة ألا تخافوا ولا تحزنوا وأبشروا بالجنة التي كنتم توعدون ﴾
🍃🌻
","
عَنْ أبي مالكٍ الأشْعَرِيِّ رضي اللَّه عنْهُ قال : قال رسُولُ اللَّه صَلّى اللهُ عَلَيْهِ وسَلَّم : 
( الطُّهُورُ شَطْرُ الإيمان ، والحمدُ للَّهِ تَمْلأُ المِيْزانَ ، وسُبْحَانَ اللَّهِ والحمْدُ للَّه تمْلآنِ أو تَمْلأُ ما بَيْنَ السَّمَواتِ والأرْضِ )

 رواهُ مسلم .
🍃🌻
","
اللهمَّ اغفر لي ولوالدي
🍃🌻
","
الله اكبـر الله اكبـر لا حول ولا قوة الا بالله العلي العظيم
🍃🌻
","
سيأتيك الفرج من الله من حيث لا تدري، ويذهلك بفضله وكرمه،
 ويغمر قلبك وروحك برحمته .. 

أبشر بالكريم وتفاءل به وثق به واطمئن لكل أقداره. 💛🥺
🍃🌻
","
كلّ يوم تعيشه هو هدية
من الله.. 
فلا تضيّعه بالقلق من المستقبل
أو الحسرة على الماضي.

 فقط قلّ ( توكّلتُ على اللّه). 🌸
🍃🌻
","
سُبْحَان اللَّهِ وَبِحَمْدِهِ عَدَدَ خَلْقِهِ ، وَرِضَا نَفْسِهِ ، وَزِنَةِ عَرْشِهِ ، وَمِدَادَ كَلِمَاتِه
🍃🌻
","
اللهم صل وسلم وبارك على سيدنا محمد 🌸
🍃🌻
","
الا بذكر الله تطمئن القلوب 🌱.
🍃🌻
","
‏﴿ فَصَبْرٌ جَمِيلٌ وَاللَّهُ الْمُسْتَعَانُ عَلَى مَا تَصِفُونَ ﴾
🍃🌻
","
‏يا حي يا قيوم برحمتك أستغيث أصلح لي شأني كُله
🍃🌻
","
‏﴿ ولقد نعلمُ أنك يضِيق صدرُك بِما يقولون 
 فسبِح بِحمد ربكَ وكُن مِن الساجدين ﴾.
🍃🌻
","
‏﴿ وَاصْبِرُواْ إِنَّ اللَّهَ مَعَ الصَّابِرِينَ ﴾
🍃🌻
","
اللـهمُ صَل علىّ محمدً وعلىّ آل مُحَمَّد ﷺ
🍃🌻
","
‏ياَرب الأرضَ والسَماء
‏ومَا بِينَهمَا ، إشَملنا بِمغفَرتك
‏التِي وسَعت كُل شَيء
🍃🌻
","
‏من أسباب استجابة الدعاء 

جاءت أم سُليم إلى النبي ﷺ فقالت:
يا رسول الله عَلِّمْنِي كَلِمَاتٍ أَدْعُو بِهِنَّ، قال ﷺ:
تُسبحين الله عَشْرًا، وتحمدينه عَشْرًا وَتُكَبِّرِينَهُ عَشْرًا، ثُمَّ سَلِي حاجتك فَإِنَّهُ يَقُولُ
قَدْ فَعَلْتُ، قَدْ فَعَلْتُ
 أخرجه الترمذي .
🍃🌻
","
- سبحان الله وبحمده 💭❥
- سبحان الله العظيم 💭❥
🍃🌻
","
°° قال ﷺ 
طوبى لِمن وجد في صحيفته استغفاراً كثيراً
       
 أستغفر الله العظيم واتوب اليه
🍃🌻
","
اللهم يافارج الهم، ياكاشف الغم، يارحمن الدنيا والأخرة ورحيمهما، نسألك برحمةٍ من عندك تغنينا عن رحمة من سواك، ياخفي الألطاف، نجنا مما نخاف، اللهم انا نسألك توفيقاً وتيسيراً لجميع أمورنا، وتشرح صدورنا، وترفع عنا البلاء والوباء.
🍃🌻
","
‏﴿ وَاذْكُر ربّكَ إِذَا نَسِيتَ ﴾ 
سُبحان الله ، الحمدالله ، 
الله أكبّر ، أسِتغفر الله ، لا إله إلا الله ، 
لاحُول ولا قوة إلا بالله ، 
اللهُم صَل وسلم على نبينا محمد .
🍃🌻
","
إن الله إذا أراد أمرًا ، أزال العواقب وأتمه 

اللُهُم تمام الأمور ، اللهُم البشائر والتياسير💛
🍃🌻
","
‏- سُبحان الله 
‏- الحَمدُ لله 
‏- لا إله إلا الله 
‏- الله أكبر 
‏- أستغفِرُ الله 
‏- لا حَول و لا قوة إلا بالله 
‏- سُبحان الله و بِحمده 
‏- سُبحان الله العَظيم 
‏- اللهم صلِّ و سلِّم على نبينا محمد
🍃🌻
","
‏استودع الله أمري كُله ، دقّه وجُله 
‏فيه الرجاء وعليه التُكلان 
‏اللهم إني أسألك تياسير تعقُبها تباشير
‏يارب بشرني بما يَسرّ خاطري 💜
🍃🌻
","
يا حيّ يا قيّوم برحمتك أستغيث أصلح لي شأني كله ولا تكلني إلى نفسي طرفة عينٍ أبداً ...

🌿🌿🌿
🍃🌻
","
﴿وألنّا له الحديد﴾ 
 إذا تولاك الله فرّج همّك ولوكان أقسى من الحديد! 
 اللهم تولّ أمرناوفرج همنا 
 ويسر ماأستعسر  
 اللهم كن لنا وليا ومعينا وظهيرا ونصيرا 
 اللهم يسر لنا الخير حيث كنا وحيث توجهنا, اللهم سخر لنا من الارزاق أبركها وأوسعها..
🍃🌻
","
رب اجعلني مقيم الصلاة ومن ذريتي ربنا وتقبل دعاء . ربنا تقبل منا إنك أنت السميع العليم وتب علينا إنك أنت التواب الرحيم
🍃🌻
","

‏دعاء الكرب
.. 
لا إله إلا الله العظيم الحليم،لا إله إلا الله ربُّ العرش العظيم،لا إله إلا الله ربُّ السماوات وربُّ الأرض وربُّ العرش الكريم
🍃🌻
","
- اللهم أننا نستغفرك من جميع الذنوب والخطايا التي نعلمها والتي لا نعلمها سبحانك تعلم مافي أنفسنا ولا نعلم مافي نفسك وأنت علام الغيوب
🍃🌻
","
رَبَّنَا اغْفِرْ لِي وَلِوَالِدَيَّ وَلِلْمُؤْمِنِينَ يَوْمَ يَقُومُ الْحِسَابُ. [إبرهيم - 41].
🍃🌻
","
حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم.
🍃🌻
","
سُبْحـانَ اللهِ وَبِحَمْـدِهِ
🍃🌻
","
سبحان الله والحمد لله ، ولا إله إلا الله ،والله أكبر ،و لا حول ولا قوة إلا بالله
🍃🌻
","
وَقَالَ صلى الله عليه وسلم: ((أَحَبُّ الْكَلاَمِ إِلَى اللَّهِ أَرْبَعٌ: سُبْحَانَ اللَّهِ، وَالْحَمْدُ لِلَّهِ، وَلاَ إِلَهَ إِلاَّ اللَّهُ، وَاللَّهُ أَكْبَرُ، لاَ يَضُرُّكَ بِأَيِّهِنَّ بَدَأتَ)).
🍃🌻
","
الْحَمْدُ لِلَّهِ حَمْداً كَثِيراً طَيِّباً مُبَارَكاً فِيهِ، غَيْرَ [مَكْفِيٍّ وَلاَ ] مُوَدَّعٍ، وَلاَ مُسْتَغْنَىً عَنْهُ رَبَّنَا
🍃🌻
","
سُبْحَانَ الَّذِي يُسَبِّحُ الرَّعْدُ بِحَمْدِهِ وَالْمَلاَئِكةُ مِنْ خِيفَتِهِ
🍃🌻
","
مَنْ كَانَ آخِرُ كَلاَمِهِ لاَ إِلَهَ إِلاَّ اللَّهُ دَخَلَ الْجَنَّةَ
🍃🌻
","
اللَّهُمَّ اغْفِرْ لِي، وَارْحَمْنِي، وَأَلْحِقْنِي بِالرَّفِيقِ الْأَعْلَى
🍃🌻
","
هُوَ الْأوَّلُ وَالْآخِرُ وَالظّاهِرُ وَالْباطِنُ وَهُوَ بِكُلِّ شَيْءٍ عَلِيمٌ
🍃🌻
","
باسمك ربي حصَّنتُ نفسي
 وأهلي ومن أحب من أن يصيبنا أذى،
🍃🌻
","
أعوذُ بِكَلماتِ اللَّهِ التَّامَّاتِ من شرِّ ما خلقَ
🍃🌻");
$baageelll=file_get_contents("baageelll.txt");
$baageel=file_get_contents("baageel.txt");
date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a'); 
$b = array_rand($a,1);
if($time == "06:39 pm" or $time == "02:44 am" or $time == "01:00 pm" or $time == "02:00 pm" or $time == "03:00 pm" or $time == "04:00 pm" or $time == "05:00 pm" or $time == "06:00 pm" or $time == "07:00 pm" or $time == "08:00 pm" or $time == "09:00 pm" or $time == "10:00 pm" or $time == "11:00 pm" or $time == "12:00 pm" or $time == "01:00 am" or $time == "02:00 am" or $time == "03:00 am" or $time == "04:00 am" or $time == "05:00 am" or $time == "06:00 am" or $time == "07:00 am" or $time == "08:00 am" or $time == "09:00 am" or $time == "10:00 am" or $time == "11:00 am" or $time == "12:00 am"){
file_put_contents("baageelll.txt","y");
}
if($time == "06:39 pm" or $time == "02:44 am" or $time == "01:00 pm" or $time == "02:00 pm" or $time == "03:00 pm" or $time == "04:00 pm" or $time == "05:00 pm" or $time == "06:00 pm" or $time == "07:00 pm" or $time == "08:00 pm" or $time == "09:00 pm" or $time == "10:00 pm" or $time == "11:00 pm" or $time == "12:00 pm" or $time == "01:00 am" or $time == "02:00 am" or $time == "03:00 am" or $time == "04:00 am" or $time == "05:00 am" or $time == "06:00 am" or $time == "07:00 am" or $time == "08:00 am" or $time == "09:00 am" or $time == "10:00 am" or $time == "11:00 am" or $time == "12:00 am"){
file_put_contents("baageel.txt","y");
}
if($time == "06:39 pm" or $time == "02:44 am" or $time == "01:00 pm" or $time == "02:00 pm" or $time == "03:00 pm" or $time == "04:00 pm" or $time == "05:00 pm" or $time == "06:00 pm" or $time == "07:00 pm" or $time == "08:00 pm" or $time == "09:00 pm" or $time == "10:00 pm" or $time == "11:00 pm" or $time == "12:00 pm" or $time == "01:00 am" or $time == "02:00 am" or $time == "03:00 am" or $time == "04:00 am" or $time == "05:00 am" or $time == "06:00 am" or $time == "07:00 am" or $time == "08:00 am" or $time == "09:00 am" or $time == "10:00 am" or $time == "11:00 am" or $time == "12:00 am"){
if($baageel == "y"){
for($armo=0;$armo<count($ARMOF2); $armo++){
 bot('sendmessage',[
 'chat_id'=>$ARMOF2[$armo],
 'message_id'=>$message_id,
 'text'=>$a[$b],
 ]);
file_put_contents("baageel.txt","1");
}
}
}
if($time == "06:39 pm" or $time == "02:44 am" or $time == "01:00 pm" or $time == "02:00 pm" or $time == "03:00 pm" or $time == "04:00 pm" or $time == "05:00 pm" or $time == "06:00 pm" or $time == "07:00 pm" or $time == "08:00 pm" or $time == "09:00 pm" or $time == "10:00 pm" or $time == "11:00 pm" or $time == "12:00 pm" or $time == "01:00 am" or $time == "02:00 am" or $time == "03:00 am" or $time == "04:00 am" or $time == "05:00 am" or $time == "06:00 am" or $time == "07:00 am" or $time == "08:00 am" or $time == "09:00 am" or $time == "10:00 am" or $time == "11:00 am" or $time == "12:00 am"){
if($baageelll == "y"){
for($armo=0;$armo<count($armoufthkk); $armo++){
 bot('sendmessage',[
 'chat_id'=>$armoufthkk[$armo],
 'message_id'=>$message_id,
 'text'=>$a[$b],
 ]);
file_put_contents("baageelll.txt","1");
}
}
}



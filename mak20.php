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


$ID_BOT=$infobot['4'];
if(isset($update->inline_query))
{ 
if($text_inline =="مشاركة البوت"){
$link = "t.me/$usernamebot";
$listp = [[["text"=>" الدخول الى البوت", "url"=>"$link"]]];
bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "results"=>json_encode([[ "type"=>"article", "id"=>base64_encode(rand(5,555)), "title"=>" مشاركة بوت الكودات الجاهزة", "input_message_content"=>[ "message_text"=>"[ بوت صنع كود جاهز بابسط صورة ..](t.me/$usernamebot)

اصنع كودك الجاهز وشاركه انلاين بابسط واسهل صورة ممكنة ..", "parse_mode"=>"MarkDown", "disable_web_page_preview"=>true], "reply_markup"=>[
"inline_keyboard"=>$listp ]]])]);
} else {
include "data/stor/tg1/$text_inline.php";}
}

$unll = file_get_contents("unll.txt");
$message = $update->message;
$re         = $message->reply_to_message;
$re_msgid   = $re->message_id;
$re_f      =$re->from;
$re_id      = $re_f->id;
$re_user    = $re_f->username;
$re_name    = $re_f->first_name;
$dev=is_dev($from_id);
//=============

//****
mkdir("data/stor");
mkdir("data/stor/start");
mkdir("data/stor/from");
mkdir("data/stor/ch");
mkdir("data/stor/idch");
mkdir("data/stor/code");
mkdir("data/stor/tg");
mkdir("data/stor/tg1");

$startmod = file_get_contents("data/stor/start/l$from_id.txt");
$caption =  $update->message->caption;
$namer = $update->callback_query->from->first_name;
//=========lfunction=========


function is_dev($val){
  $get = json_decode(file_get_contents("data.json"), true);
 if (isset($get['dev'][$val]['status'])) {
 $dev=$get['dev'][$val]['status'];
   return $dev;
 } else {
  return false;
 }
}
function updev($id,$name){
  $get = json_decode(file_get_contents("data.json"), true);
$get['dev'][$id]['first_name']=$name;
$get['dev'][$id]['status']="Developer";
  file_put_contents("data.json", json_encode($get));
}
function undev($id){
  $get = json_decode(file_get_contents("data.json"), true);
  unset($get['dev'][$id]);
  file_put_contents("data.json", json_encode($get));
}
function dev_list(){
    $get = json_decode(file_get_contents("data.json"), true);
  $result = $get['dev'];
$admins = "";
  foreach($result as $key=>$value){
$first_name=$result[$key]['first_name'];
$admins=$admins."\nτ[$first_name](tg://user?id=$key)";
  }
return $admins;
}
function add_1($from_id,$f,$k){
  $get = json_decode(file_get_contents("data/stor/start/$from_id.json"), true);
$get['gp'][$f] =$k;
  file_put_contents("data/stor/start/$from_id.json", json_encode($get));
}
//*****
function add_cc($idbot,$f,$k){
  $get = json_decode(file_get_contents("data/stor/start/seve$idbot.json"), true);
$get['gp'][$f] =$k;
  file_put_contents("data/stor/start/seve$idbot.json", json_encode($get));
}
function re_ncc($idbot,$f){
  $get = json_decode(file_get_contents("data/stor/start/seve$idbot.json"), true);
if($get['gp'][$f]){
$re=$get['gp'][$f] ;
  return $re;
}
else
{return false;}}
//******
function add_mm($from_id,$idbot){
 $m_555 = file_get_contents("data/stor/start/m".$idbot.".txt");
$m555 = explode("\n", $m_555); 
  if (!in_array($from_id, $m555)) {
    file_put_contents("data/stor/start/m".$idbot.".txt", $from_id."\n",FILE_APPEND);
}
}

function add_3($ch,$f,$k){
  $get = json_decode(file_get_contents("data/stor/tg/$ch.json"), true);
$get['tg'][$f] =$k;
  file_put_contents("data/stor/tg/$ch.json", json_encode($get));
}

//========
function add_rd($ch,$caption,$file_id,$typ){
$gs = json_decode(file_get_contents("data/stor/tg/$ch.json"), true);
  $gs['tg']['typ'] = $typ;
  $gs['tg']['file_id'] = $file_id;
  $gs['tg']['caption'] = $caption;
  file_put_contents("data/stor/tg/$ch.json", json_encode($gs));
}
function re_n3($ch,$f){
  $get = json_decode(file_get_contents("data/stor/tg/$ch.json"), true);

if($get['tg'][$f]){
$re=$get['tg'][$f] ;
  return $re;
}
else
{
return false;
}
}
function re_nn($ch,$f){
  $get = json_decode(file_get_contents("data/stor/code/$ch.json"), true);

if($get['tg'][$f]){
$re=$get['tg'][$f] ;
  return $re;
}
else
{
return false;
}
}
function re_n1($from_id,$f){
  $get = json_decode(file_get_contents("data/stor/start/$from_id.json"), true);
if($get['gp'][$f]){
$re=$get['gp'][$f] ;
  return $re;
}
else
{
return false;
}
}



$mkchat = re_ncc($ID_BOT,"الكودات");
$mkchat2 =re_ncc($ID_BOT,"الاشتراك");
$mkchat1=str_replace("@","",$mkchat);
$mkchat3=str_replace("@","",$mkchat2);
$joinloke = re_ncc($ID_BOT,"الاجباري");
$linkjo =re_ncc($ID_BOT,"linkjo");
$titlejo =re_ncc($ID_BOT,"titlejo");
$idjo =re_ncc($ID_BOT,"idjo");

date_default_timezone_set("Asia/Aden");


//------------
$startmod = file_get_contents("data/stor/start/l$from_id.txt");
if($from_id==$admin)
{
if($text=="/start")
{
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>"
'🎖¦ آهہ‌‏لآ عزيزي آلمـطـور 🍃
💰¦ آنتهہ‌‏ آلمـطـور آلآسـآسـي هہ‌‏نآ 🛠
...

🚸¦ تسـتطـيع‌‏ آلتحگم بگل آلآوآمـر آلمـمـوجودهہ‌‏ بآلگيبورد
⚖️¦ فقط آضـغط ع آلآمـر آلذي تريد تنفيذهہ‌‏
",
'reply_markup'=>json_encode([ 
'keyboard'=>[ 

[['text'=>'تغيير قناة الكودات'], ['text'=>'قناة الكودات']],
[['text'=>'➕ إنشاء إعلانـ']],
  ]]) 
]);
}

if($text=="قناة الكودات")
{
$count_us = re_ncc($ID_BOT,"الكودات");
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>" : قناة الكودات الجاهزة  ".$count_us
    ]);
}
//***
if($text=="تغيير ايدي التواصل")
{
file_put_contents("data/stor/start/l$from_id.txt", 'تغيير ايدي التواصل');
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>" قم بأرسال معرف ايدي التواصل "
    ]);
}
if($text and $startmod == "تغيير ايدي التواصل" ){
file_put_contents("data/stor/start/l$from_id.txt", 'null');
add_cc($ID_BOT,"التواصل",$text);
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>" : تم تحديث ايدي التواصل  
".$text
    ]);
}
//***
if($text=="تغيير قناة الكودات")
{
file_put_contents("data/stor/start/l$from_id.txt", 'تغيير الكودات');
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>" قم بأرسال معرف قناة الكودات الجاهزه 
مثال 
@mshro7 "
    ]);
}
if($text and $startmod == "تغيير الكودات" ){
file_put_contents("data/stor/start/l$from_id.txt", 'null');
add_cc($ID_BOT,"الكودات",$text);
bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>" : تم تحديث قناة الكودات الجاهزة  
".$text
    ]);
}

//*******


//******


}
//-----

 

//****
if($text == "🗑 حذف الإعلان" && file_exists("data/stor/start/l$from_id.txt")){
$ch = re_n1($from_id,"code");
unlink("data/stor/tg/$ch.json");
unlink("data/stor/tg/$ch.php");
unlink("data/stor/tg/l$ch.json");
unlink("data/stor/tg/p$ch.php");
unlink("data/stor/start/l$from_id.txt");
unlink("data/stor/start/$from_id.json");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"تم حذف إعلان قيد الإنشاء",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
,'reply_markup'=>json_encode([
             'remove_keyboard'=>true
         ])
]);
}
if($text == "⤴️ تراجُع" && file_exists("data/stor/start/l$from_id.txt")){
if( $startmod == "link"){
$data = "mkstart";
}
elseif( $startmod == "code"){
$startmod = "username";
 $text = re_n1($from_id,"us");
}
elseif( $startmod == "gooo1"){
$startmod = "link";
 $text = re_n1($from_id,"link");
}
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🔙 تمّ التَراجُعـ .",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
,'reply_markup'=>json_encode([
             'remove_keyboard'=>true
         ])
]);
}
if($data == "seve"){
$ch = re_n1($from_id,"code");
$gs = json_decode(file_get_contents("data/stor/tg/$ch.json"), true);
file_put_contents("data/stor/code/$ch.json", json_encode($gs));

$gs1 = file_get_contents("data/stor/tg/$ch.php");
file_put_contents("data/stor/tg1/$ch.php",$gs1);

$gs2 = file_get_contents("data/stor/tg/l$ch.php");
file_put_contents("data/stor/tg1/l$ch.php",$gs2);

$gs2 = file_get_contents("data/stor/tg/p$ch.php");
file_put_contents("data/stor/code/$ch.php",$gs2);

$u00=$ch."_".$ch;
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"💾 ✅ تمّ حفظ الكود \n مفتاح الكود :
 `@$usernamebot $u00`",
"message_id"=>$message_id,
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"💾 ✅ تمّ حفظ الإعلان",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
,'reply_markup'=>json_encode([
             'remove_keyboard'=>true
         ])
]);
$u = re_n1($from_id,"code");
 $link = re_n1($from_id,"link");
$getfile_id = re_nn($u,"file_id");
$getfull = re_nn($u,"caption");
$sens = re_nn($u,"typ");
$list = re_nn($u,"list");
$ss=str_replace("send","",$sens);
file_put_contents("data/stor/from/$u.php",'<?php $getfile_id ="'.$getfile_id.'" ; ');
include "data/stor/from/$u.php";

if($sens == "sendMessage"){

$gs2 = file_get_contents("data/stor/code/$u.php");
$u=$u."_".$u;
file_put_contents("data/stor/tg1/$u.php",'<?php'."\n".'$link = "'.$link.'";'.$gs2.''."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "results"=>json_encode([[ "type"=>"article", "id"=>base64_encode(rand(5,555)), "title"=>"ارسال الكود 💌", "input_message_content"=>[ "message_text"=>"'.$getfile_id.'", "parse_mode"=>"MarkDown", "disable_web_page_preview"=>true], "reply_markup"=>[
"inline_keyboard"=>$listp ]]])]);'."\n");
if(in_array($from_id,$sudo))
{

if(isset($list)){
bot("sendMessage",[
"chat_id"=>$mkchat,
"text"=>"$getfile_id",
"parse_mode"=>MarkDown,
"disable_web_page_preview"=>true,
"reply_markup"=>$list
]);}
else {
 $get=bot("sendMessage",[
"chat_id"=>$mkchat,
"text"=>"$getfile_id",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
]);
}
}
}
else{

$gs2 = file_get_contents("data/stor/code/$ch.php");
$u=$u."_".$u;
file_put_contents("data/stor/tg1/$u.php", '<?php'."\n".'$link = "'.$link.'";'.$gs2.''."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"'.$ss.'", "id"=>base64_encode(rand(5,555)), "'.$ss.'_file_id"=>"'.$getfile_id.'", "thumb_url"=>"'.$getfile_id.'","parse_mode"=>MarkDown, "caption"=>"'.$getfull.'", "reply_markup"=>[ "inline_keyboard"=>$listp ]]])]);'."\n");
if(in_array($from_id,$sudo))
{

if(isset($list)){
 $get=bot($sens,[
"chat_id"=>$mkchat,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>html,
"reply_markup"=>$list
]);
}
else {
$get=bot($sens,[
"chat_id"=>$mkchat,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>html
]);
}}}

unlink("data/stor/tg/$ch.json");
unlink("data/stor/tg/$ch.php");
unlink("data/stor/tg/l$ch.json");
unlink("data/stor/tg/p$ch.php");
unlink("data/stor/start/l$from_id.txt");
unlink("data/stor/start/$from_id.json");
}

//*****
if($text == "/start"){
add_mm($from_id,$ID_BOT);
file_put_contents("data/stor/start/l$from_id.txt", "");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"أهلاً بِكَ فِي بوُت صَنَع الاكَواد الجَاهِزَةٌ 
اذْهَبْ إلَى قَنَاة الأكواد : ".$mkchat."

- وَاخْتَر الكَود الْمُرَاد صَنَعَه ، بَعْدَهَا إضغط هُنَا لِصُنْع الكَود ، وَقُم بِإِرْسَال رَابِط قناتك للبوت وسيتم صَنَع إعْلَان جَاهِزٌ لـ قناتك . . بِأَبسَط الطّرُق

$txtfree",
"parse_mode"=>HTML,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قَنَاة الاكَواد الْمَصْنُوعَة 🕵🏻‍♂ .",'url'=>"t.me/".$mkchat1]],
[['text'=>"شَرْح استِخدَام البُوت 🤷🏻‍♂ .",'callback_data'=>"info"]],
[['text'=>"مُشارَكَة البُوت ♻️ .",'switch_inline_query'=>"مشاركة البوت"]],
[['text'=>"➕ إنشاء إعلانـ",'callback_data'=>"mkstart"]],
[['text'=>"➕ تبديل الرابط",'callback_data'=>"reblinks"]]
]])
]);
}

if($data == "hom"){
file_put_contents("data/stor/start/l$from_id.txt", "link");
bot('editmessagetext',[
'chat_id'=>$chat_id, 
'text'=>"أهلاً بِكَ فِي بوُت صَنَع الاكَواد الجَاهِزَةٌ 
اذْهَبْ إلَى قَنَاة الأكواد : ".$mkchat."

- وَاخْتَر الكَود الْمُرَاد صَنَعَه ، بَعْدَهَا إضغط هُنَا لِصُنْع الكَود ، وَقُم بِإِرْسَال رَابِط قناتك للبوت وسيتم صَنَع إعْلَان جَاهِزٌ لـ قناتك . . بِأَبسَط الطّرُق

$txtfree",
"parse_mode"=>HTML,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قَنَاة الاكَواد الْمَصْنُوعَة 🕵🏻‍♂ .",'url'=>"t.me/".$mkchat1]],
[['text'=>"شَرْح استِخدَام البُوت 🤷🏻‍♂ .",'callback_data'=>"info"]],
[['text'=>"مُشارَكَة البُوت ♻️ .",'switch_inline_query'=>"مشاركة البوت"]],
[['text'=>"➕ إنشاء إعلانـ",'callback_data'=>"mkstart"]],
[['text'=>"➕ تبديل الرابط",'callback_data'=>"reblinks"]]
]])
]);
}
if($data == "info"){
bot('editmessagetext',[
    'chat_id'=>$chat_id,
    'text'=>"كَيف تُرِيد شَرح البُوت ؟",
"message_id"=>$message_id,
"parse_mode"=>MarkDown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"شَرْح نَصِّ 📚 .",'callback_data'=>"info1"]],
[['text'=>"صِور🌃",'callback_data'=>"info"],
['text'=>"فِيدْيُو🎥",'callback_data'=>"p"]],
[['text'=>"القَائِمَة الرئِيسِيّة🚪",'callback_data'=>"hom"]]
]])
    ]);
}
if($data == "info1"){
file_put_contents("data/stor/start/l$from_id.txt", "link");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"اهلا عزيزي : لـ صنع كود او اعلان جاهز خاص ، اذهب الى قناة البوت [ ".$mkchat."] 

تصفح في القناة ، واختار كود مناسب لك ثم اضغط على زر [ اضغط هنا لصنع كود ] وقم بأرسال رابط قناتك ، رابط وليس يوزر ! وسيتم صنع اعلان لك بكل سهولة 💯 .
",
"message_id"=>$message_id,
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قَنَاة الاكَواد 🕵🏻‍♂ .",'url'=>"t.me/".$mkchat1]],
[['text'=>"القَائِمَة الرئِيسِيّة🚪",'callback_data'=>"hom"]]
]])
]);
}
if($data == "yes1" and $startmod == "modus"){
 $u = re_n1($from_id,"startstart");
 $text = re_n1($from_id,"link");
$getfile_id = re_nn($u,"file_id");
$getfull = re_nn($u,"caption");
$sens = re_nn($u,"typ");
$list = re_nn($u,"list");
$ss=str_replace("send","",$sens);

if($sens == "sendMessage"){
$co = file_get_contents("data/stor/start/countsend.txt");
$co1=$co+1;
 file_put_contents("data/stor/start/countsend.txt",$co1);
$co1=$u."_".$co1;
$gs2 = file_get_contents("data/stor/code/$u.php");
file_put_contents("data/stor/tg1/$co1.php",'<?php'."\n".'$link = "'.$text.'";'.$gs2.''."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "results"=>json_encode([[ "type"=>"article", "id"=>base64_encode(rand(5,555)), "title"=>"ارسال الكود 💌", "input_message_content"=>[ "message_text"=>"'.$getfile_id.'", "parse_mode"=>"MarkDown", "disable_web_page_preview"=>true], "reply_markup"=>[
"inline_keyboard"=>$listp ]]])]);'."\n");

 $link = re_n1($from_id,"link");
$gs2 = file_get_contents("data/stor/code/$u.php");
file_put_contents("data/stor/from/$u.php",'<?php $link ="'.$link.'" ;'."\n".' '.$gs2.' '."\n".'bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"'.$getfile_id.'",
"message_id"=>$message_id,
"parse_mode"=>markdown,
"disable_web_page_preview"=>true,
"reply_markup"=>json_encode([ "inline_keyboard"=>$listp])]);');
include "data/stor/from/$u.php";
unlink("data/stor/from/$u.php");

}
else {
$co = file_get_contents("data/stor/start/countsend.txt");
$co1=$co+1;
 file_put_contents("data/stor/start/countsend.txt",$co1);
$co1=$u."_".$co1;

$gs2 = file_get_contents("data/stor/code/$u.php");
file_put_contents("data/stor/tg1/$co1.php", '<?php'."\n".'$link = "'.$text.'";'.$gs2.''."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "cache_time"=>"'.$message_id.'", "results"=>json_encode([[ "type"=>"'.$ss.'", "id"=>base64_encode(rand(5,555)), "'.$ss.'_file_id"=>"'.$getfile_id.'", "thumb_url"=>"'.$getfile_id.'","parse_mode"=>MarkDown, "caption"=>"'.$getfull.'", "reply_markup"=>[ "inline_keyboard"=>$listp ]]])]);'."\n");

$link = re_n1($from_id,"link");
$gs2 = file_get_contents("data/stor/code/$u.php");
file_put_contents("data/stor/from/$u.php",'<?php $link ="'.$link.'" ;'."\n".' '.$gs2.' '."\n".'bot('.$sens.',[
"chat_id"=>$chat_id,
"$ss"=>"'.$getfile_id.'",
"caption"=>"'.$getfull.'",
"parse_mode"=>MarkDown,
"reply_markup"=> json_encode([ "inline_keyboard"=>$listp])]);');
include "data/stor/from/$u.php";
unlink("data/stor/from/$u.php");
}
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"`@$usernamebot $co1`",
"parse_mode"=>MarkDown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مُشارَكَة الإِعلَان 📮 ",'switch_inline_query'=>"$co1"]],
[['text'=>"صَنَع إعلَان جَدِيد 🆕 ",'url'=>"t.me/".$mkchat1]]
]])
    ]);
}
if($data == "no1" and $startmod == "modus"){
 $u = re_n1($from_id,"startstart");
 $text = re_n1($from_id,"link");
$getfile_id = re_nn($u,"file_id");
$getfull = re_nn($u,"caption");
$sens = re_nn($u,"typ");
$list1 = re_nn($u,"list");
$ss=str_replace("send","",$sens);
$list = json_decode($list1,true);
if($sens == "sendMessage"){
$co = file_get_contents("data/stor/start/countsend.txt");
$co1=$co+1;
 file_put_contents("data/stor/start/countsend.txt",$co1);
$co1=$u."_".$co1;
file_put_contents("data/stor/tg1/$co1.php",'<?php'."\n".'$link = "'.$text.' ";'."\n".'bot("answerInlineQuery",[ "inline_query_id"=>$update->inline_query->id, "results"=>json_encode([[ "type"=>"article", "id"=>base64_encode(rand(5,555)), "title"=>"ارسال الكود 💌", "input_message_content"=>[ "message_text"=>"'.$getfile_id.'", "parse_mode"=>"MarkDown","disable_web_page_preview"=>true], ]])]);'."\n");


 $link = re_n1($from_id,"link");
file_put_contents("data/stor/from/$u.php",'<?php $link ="'.$link.'" ; '."\n".'bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"'.$getfile_id.'",
"message_id"=>$message_id,
"parse_mode"=>markdown,
"disable_web_page_preview"=>true]);');
include "data/stor/from/$u.php";
unlink("data/stor/from/$u.php");
}
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"`@$usernamebot $co1`",
"parse_mode"=>MarkDown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"مُشارَكَة الإِعلَان 📮 ",'switch_inline_query'=>"$co1"]],
[['text'=>"صَنَع إعلَان جَدِيد 🆕 ",'url'=>"t.me/".$mkchat1]]
]])
    ]);
}
if($text and !$data and $startmod == "linkus"){
if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text))
{
 $u = re_n1($from_id,"startstart");
$getfile_id = re_nn($u,"file_id");
add_1($from_id,"link",$text);
$sens = re_nn($u,"typ");
file_put_contents("data/stor/start/l$from_id.txt", "modus");

if($sens == "sendMessage"){
 $link = re_n1($from_id,"link");
file_put_contents("data/stor/from/$u.php",'<?php $getfile_id ="'.$getfile_id.'" ; ');
include "data/stor/from/$u.php";
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>" هَل تُرِيد عَرَض الْإِزَرار فِي الكُود الْخَاصّ فِيك ؟ ،
▪️الاعِلان : ".$getfile_id,
"parse_mode"=>markdown,
"disable_web_page_preview"=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"لَا 🚫 .",'callback_data'=>"no1"],['text'=>"نَعم 💯 .",'callback_data'=>"yes1"]],
[['text'=>"إلْغَاء صَنَع الكُود 📑",'callback_data'=>"nomk"]]
]])
    ]);
}
else {
bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"هَل تُرِيد عَرَض الْإِزَار فِي الكود الْخَاصّ فِيك ؟",
"parse_mode"=>markdown,
"disable_web_page_preview"=>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"لَا 🚫 .",'callback_data'=>"no1"],['text'=>"نَعم 💯 .",'callback_data'=>"yes1"]],
[['text'=>"إلْغَاء صَنَع الكُود 📑",'callback_data'=>"nomk"]]
]])
    ]);
}

}}
//-----
if($data == "reblinks"){
file_put_contents("data/stor/start/l$from_id.txt", "codrebles");
bot('sendMessage',[
'chat_id'=>$chat_id, 
'text'=>"ارسل الان ايدي الكود
————————————",
"message_id"=>$message_id,
]);
}

if($text and !$data and $startmod == "codrebles"){
$start = explode('_', $text);
$u =$start[1];
add_1($from_id,"startstart",$u);
file_put_contents("data/stor/start/l$from_id.txt", "linkus");

  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- أَرْسَل الْآن رَابِط قناتك 
- لانـه تَمّ تَحْدِيدٌ الكـود",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"إلْغَاء صَنَع الكود 📑",'callback_data'=>"nomk"]]
]])
    ]);

}

$start = explode(' ', $text);
if (isset($start[0]) and isset($start[1]) and $start[0]=='/start' ) {
add_mm($from_id,$ID_BOT);
$u =$start[1];
add_1($from_id,"startstart",$u);
file_put_contents("data/stor/start/l$from_id.txt", "linkus");

  bot('sendMessage',[
    'chat_id'=>$chat_id,
    'text'=>"- أَرْسَل الْآن رَابِط قناتك 
- لانـه تَمّ تَحْدِيدٌ الكـود",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"إلْغَاء صَنَع الكود 📑",'callback_data'=>"nomk"]]
]])
    ]);

}
//-----
if($data == "nomk"){
unlink("data/stor/start/l$from_id.txt");
bot("editmessagetext",[
"chat_id"=>$chat_id,
"text"=>"- تَمّ إلغَاء صَنَع الكَوّد ، لِطَلَب كَوّد جَدِيد أدخَل إلَى القَنَاة ، بَعدَهَا حَدّد طَلَبُك مِنْ جَدِيد 🆕 .",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"قَنَاة الاكَواد 🕵🏻‍♂ .",'url'=>"t.me/".$mkchat1]],
[['text'=>"القَائِمَة الرئِيسِيّة🚪",'callback_data'=>"hom"]]
]])
]);
}


if($text == "➕ إنشاء إعلانـ" or $data == "mkstart"){
file_put_contents("data/stor/start/l$from_id.txt", "link");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🔗 الآنـ أرسِل الرّابط الذي تريد إضافتُه فِي الإعلان
مِثال: `https://t.me/$us`",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
]);
}

if($text and !$data and $startmod == "link"){
if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text))
{
add_1($from_id,"link",$text);
file_put_contents("data/stor/start/l$from_id.txt", "code");
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"🔗 تمّ إختيارُ الرّابط:
".$text."
للتراجع أرسل: #تراجع",
'parse_mode'=>MarkDown,
'disable_web_page_preview'=>true
,'reply_markup'=>json_encode([
             'keyboard'=>[
[['text'=>'🗑 حذف الإعلان'],['text'=>'⤴️ تراجُع']],                 
             ],
             'resize_keyboard'=>true
         ])
]);
/*
$data = "mkin" ;
 $startmod = "mod";
*/
$countsend = file_get_contents("data/stor/start/countsend.txt");
$countsend1=$countsend+1;
 file_put_contents("data/stor/start/countsend.txt",$countsend1);

add_1($from_id,"count",$countsend1);
add_1($from_id,"code",$countsend1);
//****
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
ارسل الان اعلى الكود     
بـ امكانك استخدام جميع الوسائط مثلا 
(نص - بصمة - فيديو - صورة - صوت - متحركة)

رابط قناتك هو 
 $text
---------
لعمل نص ماركداون استبدل رابط قناتك بـ $text
مثلا 
[عبارات جميلة]($text)
",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true
]);

}}

$lllll = "◻️ أرسلِ الأزرار التي تودّ إضافتها :
إفصل بين الأزرار أفقيًا بعلامة ( - )، وعموديًا بإضافة سطرٍ جديد.
* لا تكتب أي روابط.

في كل سطر 8 أزرار كحدٍ أقصى.
عدد الأسطر المتاحة: 4 فقط.

مِثال في الصّورة أعلاه
أمّا عدد الأسطر فيختلف بحسب نوعِ الإعلان، وطولّ النص في الإعلان، والصّورة، كلّما كان النصّ طويلًا، كان عدد الأسطر أقل.
أمّأ أسفل الصورة، فيمكن وضع 7 أسطر كحدٍ أقصى، إذا لم يكن هناكـ نص مع الصّورة.

";

$countsend1 = file_get_contents("data/stor/start/countsend.txt");

if($data == "gooo" and $startmod == "gooo1"){
file_put_contents("data/stor/start/l$from_id.txt", "gooo");
bot('editMessageReplyMarkup', [
'chat_id' => $chat_id,
'message_id'=>$message_id
]);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>$lllll
]);
}
if($data == "caption" and $startmod == "gooo1"){
file_put_contents("data/stor/start/l$from_id.txt", "g2");
bot('editMessageReplyMarkup', [
'chat_id' => $chat_id,
'message_id'=>$message_id
]);
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>"📝 أرسِل نصّ الإعلان، مع العلم أنه سيكون وصفًا أسفل الميديا  ويمكنك كتابة {فارغ} لكي يكون أسفل الصورة أزرار شفافة فقط
تنسيق المارك الداون مدعوم فقط آخر تحديث لتلقرام، يفضل عدم استخدامه حاليا"
]);
}
if($text and !$data and $startmod == "g2"){
add_3($countsend1,"caption",$text);
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");
$getfile_id = re_n3($countsend1,"file_id");
$getfull = re_n3($countsend1,"caption");
$sens = re_n3($countsend1,"typ");
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
if(!$data and $startmod == "code"){
$sher ="https://t.me/$usernamebot?start=$countsend1";
file_put_contents("data/stor/tg/$countsend1.php", '<?php'."\n".'$list = json_encode(['."\n".'"inline_keyboard"=>['."\n".'[["text"=>"اضغط هنا لصنع كود 🔘", "url"=>"'.$sher.'"]]]]);');

if($text){
add_rd($countsend1,'no',$text,'sendMessage');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");
//****
//****
bot('sendmessage',[
'chat_id'=>$chat_id, 
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
'text'=>"تم حفظ النصّ التالي:\n".$text,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);
}

if($update->message->photo){
$file_id = $update->message->photo[1]->file_id;
add_rd($countsend1,$caption,$file_id,'sendphoto');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");
bot("sendphoto",[
"chat_id"=>$chat_id,
"photo"=>"$file_id",
'caption'=>"$caption",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
if($update->message->document ){
$file_id = $update->message->document->file_id;
add_rd($countsend1,$caption,$file_id,'senddocument');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");
bot("senddocument",[
"chat_id"=>$chat_id,
"document"=>"$file_id",
'caption'=>"$caption",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
if($update->message->sticker ){
$file_id = $update->message->sticker->file_id;
add_rd($countsend1,$caption,$file_id,'sendsticker');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");

bot("sendsticker",[
"chat_id"=>$chat_id,
"sticker"=>"$file_id",
'caption'=>"$caption",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
if($update->message->voice ){
$file_id = $update->message->voice->file_id;
add_rd($countsend1,$caption,$file_id,'sendvoice');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");

bot("sendvoice",[
"chat_id"=>$chat_id,
"voice"=>"$file_id",
'caption'=>"$caption",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
if($update->message->audio ){
$file_id = $update->message->audio->file_id;
add_rd($countsend1,$caption,$file_id,'sendaudio');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");
bot("sendaudio",[
"chat_id"=>$chat_id,
"audio"=>"$file_id",
'caption'=>"$caption",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
if($update->message->video ){
$file_id = $update->message->video->file_id;
add_rd($countsend1,$caption,$file_id,'sendvideo');
file_put_contents("data/stor/start/l$from_id.txt", "gooo1");

bot("sendvideo",[
"chat_id"=>$chat_id,
"video"=>"$file_id",
'caption'=>"$caption",
'parse_mode'=>html
]);
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضافة ازرار",'callback_data'=>"gooo"],
['text'=>"📝تعديل الوصف ",'callback_data'=>"caption"]],
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}
}
if($text != "/start" and !$data and $startmod == "gooo"){
$ex = explode("\n", $text);
//======
$link = re_n1($from_id,"link");
$getfile_id = re_n3($countsend1,"file_id");
$getfull = re_n3($countsend1,"caption");

file_put_contents("data/stor/tg/$countsend1.php", '<?php'."\n".'$list = json_encode(['."\n".'"inline_keyboard"=>['."\n");

file_put_contents("data/stor/tg/p$countsend1.php","\n".'$listp = ['."\n");

for($i=0;$i<count($ex);$i++){
$h = explode("\n", $text);
$u = explode("-", $h[$i]);
$n = count($u);
if($i!=0){
file_put_contents("data/stor/tg/$countsend1.php",',', FILE_APPEND);
file_put_contents("data/stor/tg/p$countsend1.php",',', FILE_APPEND);
}
file_put_contents("data/stor/tg/$countsend1.php", "\n".'[', FILE_APPEND);
file_put_contents("data/stor/tg/p$countsend1.php", "\n".'[', FILE_APPEND);
for($x=0;$x<$n;$x++){
if($x!=0){
file_put_contents("data/stor/tg/$countsend1.php",',', FILE_APPEND);
file_put_contents("data/stor/tg/p$countsend1.php",',', FILE_APPEND);
}
file_put_contents("data/stor/tg/$countsend1.php", "\n".'["text"=>"'.trim($u[$x]).'", "url"=>"$link"]', FILE_APPEND);
file_put_contents("data/stor/tg/p$countsend1.php", "\n".'["text"=>"'.trim($u[$x]).'", "url"=>"$link"]', FILE_APPEND);
}
file_put_contents("data/stor/tg/$countsend1.php",']', FILE_APPEND);
file_put_contents("data/stor/tg/p$countsend1.php",']', FILE_APPEND);
}
file_put_contents("data/stor/start/l$from_id.txt", "seve");

$sher ="https://t.me/$usernamebot?start=$countsend1";
file_put_contents("data/stor/tg/$countsend1.php", "\n".',[["text"=>"اضغط هنا لصنع كود 🔘", "url"=>"'.$sher.'"]]', FILE_APPEND);
file_put_contents("data/stor/tg/$countsend1.php", "\n".']]);', FILE_APPEND);
file_put_contents("data/stor/tg/p$countsend1.php", "\n".'];', FILE_APPEND);
//***
//***
include "data/stor/tg/$countsend1.php";
include "data/stor/tg/p$countsend1.php";
add_3($countsend1,"list",$list);

$sens = re_n3($countsend1,"typ");
$list5 = re_n3($countsend1,"list");
if($sens == "sendMessage"){
file_put_contents("data/stor/tg/$countsend1.php", "\n".'bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"'.$getfile_id.'",
"parse_mode"=>MarkDown,
"disable_web_page_preview"=>true,
"reply_markup"=>$list5
]);', FILE_APPEND);

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"$getfile_id",
"parse_mode"=>MarkDown,
"disable_web_page_preview"=>true,
"reply_markup"=>$list5
]);

}
else {
$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$getfile_id",
'caption'=>"$getfull",
'parse_mode'=>html,
"reply_markup"=>$list5
]);
}
bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"✅ تم إنشاء الإعلان، هل تريد حفظه ؟
⛔️ أرسل #حذف لِحذف الإعلانـ، أرسل #تراجع للتراجع.",
'parse_mode'=>markdown,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"💾 حفظ",'callback_data'=>"seve"]]
]])
]);	
}

?>
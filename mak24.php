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

#زخرفة تمبلر
if($start=="non"){
$start="
- مرحباً $name ♡. .
‹ حسناً ارسل اسمك ليتم زخرفته تُمبلر . .
-او اختر قسم الرموز .
 ";

}








if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id,
'text' =>"$start

",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'• قسم الرمرز • ' ,'callback_data'=>"rmoz"]],
]])
]);   
}
if($data == "rmoz"){
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text' =>"
- اختر القسم الذي تريدة 
",
'parse_mode'=>HTML,


'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'• رموز الاسماء  • ' ,'callback_data'=>"name"]],
[['text'=>'• رموز ببجي  • ' ,'callback_data'=>"bobje"],['text'=>'• ارقام مزخرفة  • ' ,'callback_data'=>"numberm"]],
[['text'=>'عودة  ' ,'callback_data'=>"homebothom"]],

]])
]);   
}

if($data == "name"){
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text' =>"ッ ッ 彡 Ω ۞ ۩ ✟ 『  』۝ Ξ 道 凸 父 个 ¤ 品 〠 ๛ 𖤍 ᶠᶸᶜᵏᵧₒᵤ ࿐ ⍆ ⍅ ⇭ ༒   𖠃 𖠅 𖠆 𖠊 𖡒 𖡗 𖣩 ꧁ ꧂  〰️ 𖥓 𖥏 𖥎 𖥌 𖥋 𖥊 𖥈 𖥅 𖥃 𖥂 𖥀 𖤼 𖤹 𖤸 𖤷 𖤶 𖤭 𖤫 𖤪 𖤨 𖤧 𖤥 𖤤 𖤣 𖤢 𖤡 𖤟 𖤞 𖤝 𖤜 𖤛 𖤚 𖤘 𖤙 𖤗 𖤕 𖤓 𖤒 𖤐 ဏ ࿘ ࿗ ࿖ ࿕ ࿑ ࿌ ࿋ ࿊ ࿉ ࿈ ࿇ ࿅ ࿄ ࿃ ࿂ ༼ ༽ ༺ ༻ ༗ ༖ ༕ ⏝ ⏜ ⏎ ၄ ߷ ܛ ׀
𖠀 𖠁 𖠂 𖠅 𖠆 𖠇 𖠈 𖠉 𖠍 𖠎 𖠏 𖠐 𖠑 𖠒 𖠓 𖠔 𖠕 𖠖 𖠗 𖠘 𖠙 𖠚 𖠛 𖠜 𖠝 𖠞 𖠟 𖠠 𖠡 𖠢 𖠣 𖠤 𖠥 𖠦 𖠧 𖠨 𖠩 𖠪 𖠫 𖠬 𖠭 𖠮 𖠯 𖠰 𖠱 𖠲 𖠳 𖠴 𖠵 𖠶 𖠷 𖠸 𖠹 𖠺 𖠻 𖠼 𖠽 𖠾 𖠿 𖡀 𖡁 𖡂 𖡃 𖡄 𖡅 𖡆 𖡇 𖡈 𖡉 𖡊 𖡋 𖡌 𖡍 𖡎 𖡏 𖡐 𖡑 𖡒 𖡓 𖡔 𖡕 𖡖 𖡗 𖡘 𖡙 𖡚 𖡛 𖡜 𖡝 𖡞 𖡟 𖡠 𖡡 𖡢 𖡣 𖡤 𖡥 𖡦 𖡧 𖡨 𖡩 𖡪 𖡫 𖡬 𖡭 𖡮 𖡯 𖡰 𖡱 𖡲 𖡳 𖡴 𖡵 𖡶 𖡷 𖡸 𖡹 𖡺 𖡻 𖡼 𖡽 𖡾 𖡿 𖢀 𖢁 𖢂 𖢃 𖢄 𖢅 𖢆 𖢇 𖢈 𖢉 𖢊 𖢋 𖢌 𖢍 𖢎 𖢏 𖢐 𖢑 𖢒 𖢓 𖢔 𖢕 𖢖 𖢗 𖢘 𖢙 𖢚 𖢛 𖢜 𖢝 𖢞 𖢟 𖢠 𖢡 𖢢 𖢣 𖢤 𖢥 𖢦 𖢧 𖢨 𖢩 𖢪 𖢫 𖢬 𖢭 𖢮 𖢯 𖢰 𖢱 𖢲 𖢳 𖢴 𖢵 𖢶 𖢷 𖢸 𖢹 𖢺 𖢻 𖢼 𖢽 𖢾 𖢿 𖣀 𖣁 𖣂 𖣃 𖣄 𖣅 𖣆 𖣇 𖣈 𖣉 𖣊 𖣋 𖣌 𖣍 𖣎 𖣏 𖣐 𖣑 𖣒 𖣓 𖣔 𖣕 𖣖 𖣗 𖣘 𖣙 𖣚 𖣛 𖣜 𖣝 𖣞 𖣟 𖣠 𖣡 𖣢 𖣣 𖣤 𖣥 𖣦 𖣧 𖣨 𖣩 𖣪 𖣫 𖣬 𖣭 𖣮 𖣯 𖣰 𖣱 𖣲 𖣳 𖣴 𖣵 𖣶 𖣷 𖣸 𖣹 𖣺 𖣻 𖣼 𖣽 𖣾 𖣿


رموز اسماء
",
'parse_mode'=>HTML,


'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'• رموز الاسماء  • ' ,'callback_data'=>"name"]],
[['text'=>'• رموز ببجي  • ' ,'callback_data'=>"bobje"],['text'=>'• ارقام مزخرفة  • ' ,'callback_data'=>"numberm"]],
[['text'=>'عودة  ' ,'callback_data'=>"homebothom"]],

]])
]);   
}

if($data == "bobje"){
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text' =>"๛ ツ ๖ ・ 乄 人 Ħ × ｻ 〆 艾 ɸ 乛٭ 々 ズ ー 【】卂 乃 匚 刀 乇 千 ﾁ ム 卄 工 丨 Ｊ ﾌ Ｋ ⻓ ㄥ ム 爪 几 れ 口 ㄖ ㄗ 卩 尺 丂 ち ㄒ 匕 ㄩ ∪ ᐯ ∨ 山 乂 メ ㄚ 乙
【 】ค ๏ 「 」『 』๛ ๖ 乛 卐 ツ 彡๛乛 〆 又太ムKび〆乇乡ツ〆į Ħ ġ Ġ ġ Ġ ġ ๏乛๏ ム冰 「  」『  』ค ๏ 「 」 『 』๛ ๖ 乛 卐 ツ 彡丹乃匚刀モ下ム卄工ＪＫㄥ爪れ口ㄗＱ尺Ｓ匕∪∨山メㄚ乙卄丹ㄥＱ丿丹ㄥ下丹尺丿乙么尺
・丨 交ツ 丹乃匚刀モ下ム卄工ＪＫㄥ爪れ口ㄗＱ尺Ｓ匕∪∨山メㄚ乙卄丹ㄥＱ丿丹ㄥ下丹尺丿乙ㄗ尺∅公튱  튠  모  웃  Ӝ  흣  只彡シ

⼺彡『』乀ф » «ж¤๑×۞юЮしじ§メЯツ๏凡丫〇凹⻖阝卍» «ж丶 么 ⼀一 乛・々 ๖ 【】٭ 乡.   及 《 〆
ꨄఌシ㋛𓆉 𓂀𓁹☹️Ꙭ ༆߷⍟۞☆☆☆☆☼✯𖧷༆Ꙭ⁂⌘᯾❁𓇽𖣘۞☼
-
رموز ببجي

",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'• رموز الاسماء  • ' ,'callback_data'=>"name"]],
[['text'=>'• رموز ببجي  • ' ,'callback_data'=>"bobje"],['text'=>'• ارقام مزخرفة  • ' ,'callback_data'=>"numberm"]],
[['text'=>'عودة  ' ,'callback_data'=>"homebothom"]],

]])
]);   
}
if($data == "numberm"){
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text' =>"
₁ ₂ ₃ ₄ ₅ ₆ ₇ ₈ ₉ ₀ | ¹ ² ³ ⁴ ⁵ ⁶ ⁷ ⁸ ⁹ ⁰
𝟏 𝟐 𝟑 𝟒 𝟓 𝟔 𝟕 𝟖 𝟗 𝟎
𝟭 𝟮 𝟯 𝟰 𝟱 𝟲 𝟳 𝟴 𝟵 𝟬
①②③④⑤⑥⑦⑧⑨⓪
❶❷❸❹❺❻❼❽❾⓿
⓫⓬⓭⓮⓯⓰⓱⓲⓳⓴
 𝟶 𝟷 𝟸 𝟹 𝟺 𝟻 𝟼 𝟽 𝟾  𝟿
 𝟘 𝟙  𝟚  𝟛  𝟜  𝟝  𝟞  𝟟  𝟠 𝟡
 𝟬 𝟭  𝟮  𝟯  𝟰  𝟱   𝟲  𝟳  𝟴  𝟵  
 𝟎  𝟏  𝟐  𝟑  𝟒   𝟓   𝟔  𝟕   𝟖   𝟗
０ １ ２ ３ ４ ５ ６ ７８９
 ٠ ١ ٢ ٣ ٤ ٥ ٦ ٧ ٨ ٩
 
 - 𝟢 𝟣 𝟤 𝟥 𝟦 𝟧 𝟨 𝟩 𝟪 𝟫 .
- 𝟶 𝟷 𝟸 𝟹 𝟺 𝟻 𝟼 𝟽 𝟾  𝟿.
-  𝟘 𝟙  𝟚  𝟛  𝟜  𝟝 𝟞 𝟟  𝟠 𝟡.
-  𝟎  𝟏  𝟐  𝟑  𝟒  𝟓  𝟔  𝟕  𝟖  𝟗.
- ０ １ ２ ３ ４ ５ ６ ７８９.

₁₉₉₅ . ₁₉₉₆ . ₁₉₉₇ . ₁₉₉₈ . ₁₉₉₉
₂₀₀₀ . ₂₀₀₁ . ₂₀₀₂ . ₂₀₀₃ .

¹ ² ³ ⁴ ⁵ ⁶ ⁷ ⁸ ⁹ ¹⁰ ¹¹ ¹² ¹³ ¹⁴ ¹⁵ ¹⁶ ¹⁷ ¹⁸ ¹⁹ ²⁰ ²¹ ²² ²³ ²⁴ ²⁵ ²⁶ ²⁷ ²⁸ ²⁹ ³⁰ ³¹ ³² ³³ ³⁴ ³⁵ ³⁶ ³⁷ ³⁸ ³⁹ ⁴⁰ ⁴¹ ⁴² ⁴³ ⁴⁴ ⁴⁵ ⁴⁶ ⁴⁷ ⁴⁸ ⁴⁹ ⁵⁰ ⁵¹ ⁵² ⁵³ ⁵⁴ ⁵⁵  ⁵⁶ ⁵⁷ ⁵⁸ ⁵⁹ ⁶⁰ ⁶¹ ⁶³  ⁶⁴ ⁶⁵ ⁶⁶ ⁶⁷ ⁶⁸ ⁶⁹ ⁷⁰ ⁷¹ ⁷² ⁷³ ⁷⁴ ⁷⁵ ⁷⁶ ⁷⁷ ⁷⁸ ⁷⁹ ⁸⁰ ⁸¹ ⁸² ⁸³ ⁸⁴ ⁸⁵ ⁸⁶ ⁸⁷ ⁸⁸ ⁸⁹ ⁹⁰ ⁹¹ ⁹² ⁹³ ⁹⁴ ⁹⁵ ⁹⁶ ⁹⁷ ⁹⁸ ⁹⁹ ¹⁰⁰ .
-
ارقام مزخرفه

",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'• رموز الاسماء  • ' ,'callback_data'=>"name"]],
[['text'=>'• رموز ببجي  • ' ,'callback_data'=>"bobje"],['text'=>'• ارقام مزخرفة  • ' ,'callback_data'=>"numberm"]],
[['text'=>'عودة  ' ,'callback_data'=>"homebothom"]],

]])
]);   
}


if($data == "homebothom"){
bot('editmessagetext',[
'message_id'=>$message_id,
'chat_id'=>$chat_id,
'text' =>"$start

",
'parse_mode'=>HTML,
'disable_web_page_preview'=>true,
"reply_markup"=>json_encode([
"inline_keyboard"=>[
[['text'=>'• قسم الرمرز • ' ,'callback_data'=>"rmoz"]],
]])
]);   
}


if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝗔',$text); 
$LCC_C = str_replace("b","𝗕",$LCC_C); 
$LCC_C = str_replace("c","𝗖",$LCC_C); 
$LCC_C = str_replace("d","𝗗",$LCC_C); 
$LCC_C = str_replace("e","𝗘",$LCC_C); 
$LCC_C = str_replace("f","𝗙",$LCC_C); 
$LCC_C = str_replace("g","𝗚",$LCC_C); 
$LCC_C = str_replace("h","𝗛",$LCC_C); 
$LCC_C = str_replace("i","𝗜",$LCC_C); 
$LCC_C = str_replace("j","𝗝",$LCC_C); 
$LCC_C = str_replace("k","𝗞",$LCC_C); 
$LCC_C = str_replace("l","𝗟",$LCC_C); 
$LCC_C = str_replace("m","𝗠",$LCC_C); 
$LCC_C = str_replace("n","𝗡",$LCC_C); 
$LCC_C = str_replace("o","𝗢",$LCC_C); 
$LCC_C = str_replace("p","𝗣",$LCC_C); 
$LCC_C = str_replace("q","𝗤",$LCC_C); 
$LCC_C = str_replace("r","𝗥",$LCC_C); 
$LCC_C = str_replace("s","𝗦",$LCC_C); 
$LCC_C = str_replace("t","𝗧",$LCC_C); 
$LCC_C = str_replace("u","𝗨",$LCC_C); 
$LCC_C = str_replace("v","𝗩",$LCC_C); 
$LCC_C = str_replace("w","𝗪",$LCC_C); 
$LCC_C = str_replace("x","𝗫",$LCC_C); 
$LCC_C = str_replace("y","𝗬",$LCC_C); 
$LCC_C = str_replace("z","𝗭",$LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝗔',$LCC_C); 
$LCC_C = str_replace("B","𝗕",$LCC_C); 
$LCC_C = str_replace("C","𝗖",$LCC_C); 
$LCC_C = str_replace("D","𝗗",$LCC_C); 
$LCC_C = str_replace("E","𝗘",$LCC_C); 
$LCC_C = str_replace("F","𝗙",$LCC_C); 
$LCC_C = str_replace("G","𝗚",$LCC_C); 
$LCC_C = str_replace("H","𝗛",$LCC_C); 
$LCC_C = str_replace("I","𝗜",$LCC_C); 
$LCC_C = str_replace("J","𝗝",$LCC_C); 
$LCC_C = str_replace("K","𝗞",$LCC_C); 
$LCC_C = str_replace("L","𝗟",$LCC_C); 
$LCC_C = str_replace("M","𝗠",$LCC_C); 
$LCC_C = str_replace("N","𝗡",$LCC_C); 
$LCC_C = str_replace("O","𝗢",$LCC_C); 
$LCC_C = str_replace("P","𝗣",$LCC_C); 
$LCC_C = str_replace("Q","𝗤",$LCC_C); 
$LCC_C = str_replace("R","𝗥",$LCC_C); 
$LCC_C = str_replace("S","𝗦",$LCC_C); 
$LCC_C = str_replace("T","𝗧",$LCC_C); 
$LCC_C = str_replace("U","𝗨",$LCC_C); 
$LCC_C = str_replace("V","𝗩",$LCC_C); 
$LCC_C = str_replace("W","𝗪",$LCC_C); 
$LCC_C = str_replace("X","𝗫",$LCC_C); 
$LCC_C = str_replace("Y","𝗬",$LCC_C); 
$LCC_C = str_replace("Z","𝗭",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝒶',$text); 
$LCC_C = str_replace("b","𝒷",$LCC_C); 
$LCC_C = str_replace("c","𝒸",$LCC_C); 
$LCC_C = str_replace("d","𝒹",$LCC_C); 
$LCC_C = str_replace("e","𝖊",$LCC_C); 
$LCC_C = str_replace("f","𝒻",$LCC_C); 
$LCC_C = str_replace("g","𝖌",$LCC_C); 
$LCC_C = str_replace("h","𝒽",$LCC_C); 
$LCC_C = str_replace("i","𝒾",$LCC_C); 
$LCC_C = str_replace("j","𝗝",$LCC_C); 
$LCC_C = str_replace("k","𝒿",$LCC_C); 
$LCC_C = str_replace("l","𝓀",$LCC_C); 
$LCC_C = str_replace("m","𝓁",$LCC_C); 
$LCC_C = str_replace("n","𝓂",$LCC_C); 
$LCC_C = str_replace("o","𝓃",$LCC_C); 
$LCC_C = str_replace("p","𝖔",$LCC_C); 
$LCC_C = str_replace("q","𝓅",$LCC_C); 
$LCC_C = str_replace("r","𝓆",$LCC_C); 
$LCC_C = str_replace("s","𝓇",$LCC_C); 
$LCC_C = str_replace("t","𝓉",$LCC_C); 
$LCC_C = str_replace("u","𝓊",$LCC_C); 
$LCC_C = str_replace("v","𝓋",$LCC_C); 
$LCC_C = str_replace("w","𝓌",$LCC_C); 
$LCC_C = str_replace("x","𝓍",$LCC_C); 
$LCC_C = str_replace("y","𝓎",$LCC_C); 
$LCC_C = str_replace("z","𝓏",$LCC_C); 
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝒶',$LCC_C); 
$LCC_C = str_replace("B","𝒷",$LCC_C); 
$LCC_C = str_replace("C","𝒸",$LCC_C); 
$LCC_C = str_replace("D","𝒹",$LCC_C); 
$LCC_C = str_replace("E","𝖊",$LCC_C); 
$LCC_C = str_replace("F","𝒻",$LCC_C); 
$LCC_C = str_replace("G","𝖌",$LCC_C); 
$LCC_C = str_replace("H","𝒽",$LCC_C); 
$LCC_C = str_replace("I","𝒾",$LCC_C); 
$LCC_C = str_replace("J","𝗝",$LCC_C); 
$LCC_C = str_replace("K","𝒿",$LCC_C); 
$LCC_C = str_replace("L","𝓀",$LCC_C); 
$LCC_C = str_replace("M","𝓁",$LCC_C); 
$LCC_C = str_replace("N","𝓂",$LCC_C); 
$LCC_C = str_replace("O","𝓃",$LCC_C); 
$LCC_C = str_replace("P","𝖔",$LCC_C); 
$LCC_C = str_replace("Q","𝓅",$LCC_C); 
$LCC_C = str_replace("R","𝓆",$LCC_C); 
$LCC_C = str_replace("S","𝓇",$LCC_C); 
$LCC_C = str_replace("T","𝓉",$LCC_C); 
$LCC_C = str_replace("U","𝓊",$LCC_C); 
$LCC_C = str_replace("V","𝓋",$LCC_C); 
$LCC_C = str_replace("W","𝓌",$LCC_C); 
$LCC_C = str_replace("X","𝓍",$LCC_C); 
$LCC_C = str_replace("Y","𝓎",$LCC_C); 
$LCC_C = str_replace("Z","𝓏",$LCC_C); 
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
 $LCC_C = str_replace('a','𝒂',$text); 
 $LCC_C = str_replace('b','𝒃',$LCC_C); 
 $LCC_C = str_replace('c','𝒄',$LCC_C); 
 $LCC_C = str_replace('d','𝒅',$LCC_C); 
 $LCC_C = str_replace('e','𝒆',$LCC_C); 
 $LCC_C = str_replace('f','𝒇',$LCC_C); 
 $LCC_C = str_replace('g','𝒈',$LCC_C); 
 $LCC_C = str_replace('h','𝒉',$LCC_C); 
 $LCC_C = str_replace('i','𝒊',$LCC_C); 
 $LCC_C = str_replace('j','Ј',$LCC_C); 
 $LCC_C = str_replace('k','𝒌',$LCC_C); 
 $LCC_C = str_replace('l','𝒍',$LCC_C); 
 $LCC_C = str_replace('m','𝒎',$LCC_C); 
 $LCC_C = str_replace('n','𝒏',$LCC_C); 
 $LCC_C = str_replace('o','𝒐',$LCC_C); 
 $LCC_C = str_replace('p','𝒑',$LCC_C); 
 $LCC_C = str_replace('q','𝒒',$LCC_C); 
 $LCC_C = str_replace('r','𝒓',$LCC_C); 
 $LCC_C = str_replace('s','𝒔',$LCC_C); 
 $LCC_C = str_replace('t','𝒕',$LCC_C); 
 $LCC_C = str_replace('u','𝒖',$LCC_C); 
 $LCC_C = str_replace('v','𝒗',$LCC_C); 
 $LCC_C = str_replace('w','𝒘',$LCC_C); 
 $LCC_C = str_replace('x','𝒙',$LCC_C); 
 $LCC_C = str_replace('y','𝒚',$LCC_C); 
 $LCC_C = str_replace('z','𝒛',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝒂',$LCC_C); 
 $LCC_C = str_replace('B','𝒃',$LCC_C); 
 $LCC_C = str_replace('C','𝒄',$LCC_C); 
 $LCC_C = str_replace('D','𝒅',$LCC_C); 
 $LCC_C = str_replace('E','𝒆',$LCC_C); 
 $LCC_C = str_replace('F','𝒇',$LCC_C); 
 $LCC_C = str_replace('G','𝒈',$LCC_C); 
 $LCC_C = str_replace('H','𝒉',$LCC_C); 
 $LCC_C = str_replace('I','𝒊',$LCC_C); 
 $LCC_C = str_replace('J','Ј',$LCC_C); 
 $LCC_C = str_replace('K','𝒌',$LCC_C); 
 $LCC_C = str_replace('L','𝒍',$LCC_C); 
 $LCC_C = str_replace('M','𝒎',$LCC_C); 
 $LCC_C = str_replace('N','𝒏',$LCC_C); 
 $LCC_C = str_replace('O','𝒐',$LCC_C); 
$LCC_C = str_replace('P','𝒑',$LCC_C); 
$LCC_C = str_replace('Q','𝒒',$LCC_C); 
$LCC_C = str_replace('R','𝒓',$LCC_C); 
$LCC_C = str_replace('S','𝒔',$LCC_C); 
$LCC_C = str_replace('T','𝒕',$LCC_C); 
$LCC_C = str_replace('U','𝒖',$LCC_C); 
$LCC_C = str_replace('V','𝒗',$LCC_C); 
$LCC_C = str_replace('W','𝒘',$LCC_C); 
$LCC_C = str_replace('X','𝒙',$LCC_C); 
$LCC_C = str_replace('Y','𝒚',$LCC_C); 
$LCC_C = str_replace('Z','𝒛',$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝐀',$text); 
$LCC_C = str_replace("b","𝐁",$LCC_C); 
$LCC_C = str_replace("c","𝐂",$LCC_C); 
$LCC_C = str_replace("d","𝐃",$LCC_C); 
$LCC_C = str_replace("e","𝐄",$LCC_C); 
$LCC_C = str_replace("f","𝐅",$LCC_C); 
$LCC_C = str_replace("g","𝐆",$LCC_C); 
$LCC_C = str_replace("h","𝐇",$LCC_C); 
$LCC_C = str_replace("i","𝐈",$LCC_C); 
$LCC_C = str_replace("j","𝐉",$LCC_C); 
$LCC_C = str_replace("k","𝐊",$LCC_C); 
$LCC_C = str_replace("l","𝐋",$LCC_C); 
$LCC_C = str_replace("m","𝐌",$LCC_C); 
$LCC_C = str_replace("n","𝐍",$LCC_C); 
$LCC_C = str_replace("o","𝐎",$LCC_C); 
$LCC_C = str_replace("p","𝐏",$LCC_C); 
$LCC_C = str_replace("q","𝐐",$LCC_C); 
$LCC_C = str_replace("r","𝐑",$LCC_C); 
$LCC_C = str_replace("s","𝐒",$LCC_C); 
$LCC_C = str_replace("t","𝐓",$LCC_C); 
$LCC_C = str_replace("u","𝐔",$LCC_C); 
$LCC_C = str_replace("v","𝐕",$LCC_C); 
$LCC_C = str_replace("w","𝐖",$LCC_C); 
$LCC_C = str_replace("x","𝐗",$LCC_C); 
$LCC_C = str_replace("y","𝐘",$LCC_C); 
$LCC_C = str_replace("z","𝐙",$LCC_C); 
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝐀',$LCC_C); 
$LCC_C = str_replace("B","𝐁",$LCC_C); 
$LCC_C = str_replace("C","𝐂",$LCC_C); 
$LCC_C = str_replace("D","𝐃",$LCC_C); 
$LCC_C = str_replace("E","𝐄",$LCC_C); 
$LCC_C = str_replace("F","𝐅",$LCC_C); 
$LCC_C = str_replace("G","𝐆",$LCC_C); 
$LCC_C = str_replace("H","𝐇",$LCC_C); 
$LCC_C = str_replace("I","𝐈",$LCC_C); 
$LCC_C = str_replace("J","𝐉",$LCC_C); 
$LCC_C = str_replace("K","𝐊",$LCC_C); 
$LCC_C = str_replace("L","𝐋",$LCC_C); 
$LCC_C = str_replace("M","𝐌",$LCC_C); 
$LCC_C = str_replace("N","𝐍",$LCC_C); 
$LCC_C = str_replace("O","𝐎",$LCC_C); 
$LCC_C = str_replace("P","𝐏",$LCC_C); 
$LCC_C = str_replace("Q","𝐐",$LCC_C); 
$LCC_C = str_replace("R","𝐑",$LCC_C); 
$LCC_C = str_replace("S","𝐒",$LCC_C); 
$LCC_C = str_replace("T","𝐓",$LCC_C); 
$LCC_C = str_replace("U","𝐔",$LCC_C); 
$LCC_C = str_replace("V","𝐕",$LCC_C); 
$LCC_C = str_replace("W","𝐖",$LCC_C); 
$LCC_C = str_replace("X","𝐗",$LCC_C); 
$LCC_C = str_replace("Y","𝐘",$LCC_C); 
$LCC_C = str_replace("Z","𝐙",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
 $LCC_C = str_replace('a','𝖆',$text); 
 $LCC_C = str_replace('b','𝖇',$LCC_C); 
 $LCC_C = str_replace('c','𝖈',$LCC_C); 
 $LCC_C = str_replace('d','𝖉',$LCC_C); 
 $LCC_C = str_replace('e','𝖊',$LCC_C); 
 $LCC_C = str_replace('f','𝖋',$LCC_C); 
 $LCC_C = str_replace('g','𝖌',$LCC_C); 
 $LCC_C = str_replace('h','𝖍',$LCC_C); 
 $LCC_C = str_replace('i','𝖎',$LCC_C); 
 $LCC_C = str_replace('j','𝖏',$LCC_C); 
 $LCC_C = str_replace('k','𝖐',$LCC_C); 
 $LCC_C = str_replace('l','𝖑',$LCC_C); 
 $LCC_C = str_replace('m','𝖒',$LCC_C); 
 $LCC_C = str_replace('n','𝖓',$LCC_C); 
 $LCC_C = str_replace('o','𝖔',$LCC_C); 
 $LCC_C = str_replace('p','𝖕',$LCC_C); 
 $LCC_C = str_replace('q','𝖖',$LCC_C); 
 $LCC_C = str_replace('r','𝖗',$LCC_C); 
 $LCC_C = str_replace('s','𝖘',$LCC_C); 
 $LCC_C = str_replace('t','𝖙',$LCC_C); 
 $LCC_C = str_replace('u','𝖚',$LCC_C); 
 $LCC_C = str_replace('v','𝖛',$LCC_C); 
 $LCC_C = str_replace('w','𝖜',$LCC_C); 
 $LCC_C = str_replace('x','𝖝',$LCC_C); 
 $LCC_C = str_replace('y','𝖞',$LCC_C); 
 $LCC_C = str_replace('z','𝖟',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝖆',$LCC_C); 
 $LCC_C = str_replace('B','𝖇',$LCC_C); 
 $LCC_C = str_replace('C','𝖈',$LCC_C); 
 $LCC_C = str_replace('D','𝖉',$LCC_C); 
 $LCC_C = str_replace('E','𝖊',$LCC_C); 
 $LCC_C = str_replace('F','𝖋',$LCC_C); 
 $LCC_C = str_replace('G','𝖌',$LCC_C); 
 $LCC_C = str_replace('H','𝖍',$LCC_C); 
 $LCC_C = str_replace('I','𝖎',$LCC_C); 
 $LCC_C = str_replace('J','𝖏',$LCC_C); 
 $LCC_C = str_replace('K','𝖐',$LCC_C); 
 $LCC_C = str_replace('L','𝖑',$LCC_C); 
 $LCC_C = str_replace('M','𝖒',$LCC_C); 
 $LCC_C = str_replace('N','𝖓',$LCC_C); 
 $LCC_C = str_replace('O','𝖔',$LCC_C); 
 $LCC_C = str_replace('P','𝖕',$LCC_C); 
 $LCC_C = str_replace('Q','𝖖',$LCC_C); 
 $LCC_C = str_replace('R','𝖗',$LCC_C); 
 $LCC_C = str_replace('S','𝖘',$LCC_C); 
 $LCC_C = str_replace('T','𝖙',$LCC_C); 
 $LCC_C = str_replace('U','𝖚',$LCC_C); 
 $LCC_C = str_replace('V','𝖛',$LCC_C); 
$LCC_C = str_replace('W','𝖜',$LCC_C); 
$LCC_C = str_replace('X','𝖝',$LCC_C); 
$LCC_C = str_replace('Y','𝖞',$LCC_C); 
$LCC_C = str_replace('Z','𝖟',$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}


if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝙰',$text); 
 $LCC_C = str_replace('b','𝙱',$LCC_C); 
 $LCC_C = str_replace('c','𝙲',$LCC_C); 
 $LCC_C = str_replace('d','𝙳',$LCC_C); 
 $LCC_C = str_replace('e','𝙴',$LCC_C); 
 $LCC_C = str_replace('f','𝙵',$LCC_C); 
 $LCC_C = str_replace('g','𝙶',$LCC_C); 
 $LCC_C = str_replace('h','𝙷',$LCC_C); 
 $LCC_C = str_replace('i','𝙸',$LCC_C); 
 $LCC_C = str_replace('j','𝙹',$LCC_C); 
 $LCC_C = str_replace('k','𝙺',$LCC_C); 
 $LCC_C = str_replace('l','𝙻',$LCC_C); 
 $LCC_C = str_replace('m','𝙼',$LCC_C); 
 $LCC_C = str_replace('n','𝙽',$LCC_C); 
 $LCC_C = str_replace('o','𝙾',$LCC_C); 
 $LCC_C = str_replace('p','𝙿',$LCC_C); 
 $LCC_C = str_replace('q','𝚀',$LCC_C); 
 $LCC_C = str_replace('r','𝚁',$LCC_C); 
 $LCC_C = str_replace('s','𝚂',$LCC_C); 
 $LCC_C = str_replace('t','𝚃',$LCC_C); 
 $LCC_C = str_replace('u','𝙺',$LCC_C); 
 $LCC_C = str_replace('v','𝚅',$LCC_C); 
 $LCC_C = str_replace('w','𝚆',$LCC_C); 
 $LCC_C = str_replace('x','𝚇',$LCC_C); 
 $LCC_C = str_replace('y','𝚈',$LCC_C); 
 $LCC_C = str_replace('z','𝚉',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝙰',$LCC_C); 
 $LCC_C = str_replace('B','𝙱',$LCC_C); 
 $LCC_C = str_replace('C','𝙲',$LCC_C); 
 $LCC_C = str_replace('D','𝙳',$LCC_C); 
 $LCC_C = str_replace('E','𝙴',$LCC_C); 
 $LCC_C = str_replace('F','𝙵',$LCC_C); 
 $LCC_C = str_replace('G','𝙶',$LCC_C); 
 $LCC_C = str_replace('H','𝙷',$LCC_C); 
 $LCC_C = str_replace('I','𝙸',$LCC_C); 
 $LCC_C = str_replace('J','𝙹',$LCC_C); 
 $LCC_C = str_replace('K','𝙺',$LCC_C); 
 $LCC_C = str_replace('L','𝙻',$LCC_C); 
 $LCC_C = str_replace('M','𝙼',$LCC_C); 
 $LCC_C = str_replace('N','𝙽',$LCC_C); 
 $LCC_C = str_replace('O','𝙾',$LCC_C); 
 $LCC_C = str_replace('P','𝙿',$LCC_C); 
 $LCC_C = str_replace('Q','𝚀',$LCC_C); 
 $LCC_C = str_replace('R','𝚁',$LCC_C); 
 $LCC_C = str_replace('S','𝚂',$LCC_C); 
 $LCC_C = str_replace('T','𝚃',$LCC_C); 
 $LCC_C = str_replace('U','𝙺',$LCC_C); 
 $LCC_C = str_replace('V','𝚅',$LCC_C); 
 $LCC_C = str_replace('W','𝚆',$LCC_C); 
 $LCC_C = str_replace('X','𝚇',$LCC_C); 
 $LCC_C = str_replace('Y','𝚈',$LCC_C); 
 $LCC_C = str_replace('Z','𝚉',$LCC_C);
 $LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}


if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝒂',$text); 
 $LCC_C = str_replace('b','𝒃',$LCC_C); 
 $LCC_C = str_replace('c','𝒄',$LCC_C); 
 $LCC_C = str_replace('d','𝒅',$LCC_C); 
 $LCC_C = str_replace('e','𝒆',$LCC_C); 
 $LCC_C = str_replace('f','𝒇',$LCC_C); 
 $LCC_C = str_replace('g','𝒈',$LCC_C); 
 $LCC_C = str_replace('h','𝒉',$LCC_C); 
 $LCC_C = str_replace('i','𝒊',$LCC_C); 
 $LCC_C = str_replace('j','𝒋',$LCC_C); 
 $LCC_C = str_replace('k','𝒌',$LCC_C); 
 $LCC_C = str_replace('l','𝒍',$LCC_C); 
 $LCC_C = str_replace('m','𝒎',$LCC_C); 
 $LCC_C = str_replace('n','𝒏',$LCC_C); 
 $LCC_C = str_replace('o','𝒐',$LCC_C); 
 $LCC_C = str_replace('p','𝒑',$LCC_C); 
 $LCC_C = str_replace('q','𝒒',$LCC_C); 
 $LCC_C = str_replace('r','𝒓',$LCC_C); 
 $LCC_C = str_replace('s','𝒔',$LCC_C); 
 $LCC_C = str_replace('t','𝒕',$LCC_C); 
 $LCC_C = str_replace('u','𝒖',$LCC_C); 
 $LCC_C = str_replace('v','𝒗',$LCC_C); 
 $LCC_C = str_replace('w','𝒘',$LCC_C); 
 $LCC_C = str_replace('x','𝒙',$LCC_C); 
 $LCC_C = str_replace('y','𝒚',$LCC_C); 
 $LCC_C = str_replace('z','𝒛',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝒂',$LCC_C); 
 $LCC_C = str_replace('B','𝒃',$LCC_C); 
 $LCC_C = str_replace('C','𝒄',$LCC_C); 
 $LCC_C = str_replace('D','𝒅',$LCC_C); 
 $LCC_C = str_replace('E','𝒆',$LCC_C); 
 $LCC_C = str_replace('F','𝒇',$LCC_C); 
 $LCC_C = str_replace('G','𝒈',$LCC_C); 
 $LCC_C = str_replace('H','𝒉',$LCC_C); 
 $LCC_C = str_replace('I','𝒊',$LCC_C); 
 $LCC_C = str_replace('J','𝒋',$LCC_C); 
 $LCC_C = str_replace('K','𝒌',$LCC_C); 
 $LCC_C = str_replace('L','𝒍',$LCC_C); 
 $LCC_C = str_replace('M','𝒎',$LCC_C); 
 $LCC_C = str_replace('N','𝒏',$LCC_C); 
 $LCC_C = str_replace('O','𝒐',$LCC_C); 
 $LCC_C = str_replace('P','𝒑',$LCC_C); 
 $LCC_C = str_replace('Q','𝒒',$LCC_C); 
 $LCC_C = str_replace('R','𝒓',$LCC_C); 
 $LCC_C = str_replace('S','𝒔',$LCC_C); 
 $LCC_C = str_replace('T','𝒕',$LCC_C); 
 $LCC_C = str_replace('U','𝒖',$LCC_C); 
 $LCC_C = str_replace('V','𝒗',$LCC_C); 
 $LCC_C = str_replace('W','𝒘',$LCC_C); 
 $LCC_C = str_replace('X','𝒙',$LCC_C); 
 $LCC_C = str_replace('Y','𝒚',$LCC_C); 
 $LCC_C = str_replace('Z','𝒛',$LCC_C);
 $LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
 $LCC_C = str_replace('a','α',$text);
  $LCC_C = str_replace('b','𝐵',$LCC_C); 
 $LCC_C = str_replace('c','𝐶',$LCC_C); 
 $LCC_C = str_replace('d','𝐷',$LCC_C); 
 $LCC_C = str_replace('e','𝐸',$LCC_C); 
 $LCC_C = str_replace('f','𝐹',$LCC_C); 
 $LCC_C = str_replace('g','𝐺',$LCC_C); 
 $LCC_C = str_replace('h','𝐻',$LCC_C); 
 $LCC_C = str_replace('i','𝐼',$LCC_C); 
 $LCC_C = str_replace('j','𝐽',$LCC_C); 
 $LCC_C = str_replace('k','𝐾',$LCC_C); 
 $LCC_C = str_replace('l','𝐿',$LCC_C); 
 $LCC_C = str_replace('m','𝑀',$LCC_C); 
 $LCC_C = str_replace('n','𝑁',$LCC_C); 
 $LCC_C = str_replace('o','𝑂',$LCC_C); 
 $LCC_C = str_replace('p','𝑃',$LCC_C); 
 $LCC_C = str_replace('q','𝑄',$LCC_C); 
 $LCC_C = str_replace('r','𝑅',$LCC_C); 
 $LCC_C = str_replace('s','𝑆',$LCC_C); 
 $LCC_C = str_replace('t','𝑇',$LCC_C); 
 $LCC_C = str_replace('u','𝑈',$LCC_C); 
 $LCC_C = str_replace('v','𝑉',$LCC_C); 
 $LCC_C = str_replace('w','𝑊',$LCC_C); 
 $LCC_C = str_replace('x','𝑋',$LCC_C); 
 $LCC_C = str_replace('y','𝑌',$LCC_C); 
 $LCC_C = str_replace('z','𝑍',$LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
 $LCC_C = str_replace('A','α',$LCC_C);
  $LCC_C = str_replace('B','𝐵',$LCC_C); 
 $LCC_C = str_replace('C','𝐶',$LCC_C); 
 $LCC_C = str_replace('D','𝐷',$LCC_C); 
 $LCC_C = str_replace('E','𝐸',$LCC_C); 
 $LCC_C = str_replace('F','𝐹',$LCC_C); 
 $LCC_C = str_replace('G','𝐺',$LCC_C); 
 $LCC_C = str_replace('H','𝐻',$LCC_C); 
 $LCC_C = str_replace('I','𝐼',$LCC_C); 
 $LCC_C = str_replace('J','𝐽',$LCC_C); 
 $LCC_C = str_replace('K','𝐾',$LCC_C); 
 $LCC_C = str_replace('L','𝐿',$LCC_C); 
 $LCC_C = str_replace('M','𝑀',$LCC_C); 
 $LCC_C = str_replace('N','𝑁',$LCC_C); 
 $LCC_C = str_replace('O','𝑂',$LCC_C); 
 $LCC_C = str_replace('P','𝑃',$LCC_C); 
 $LCC_C = str_replace('Q','𝑄',$LCC_C); 
 $LCC_C = str_replace('R','𝑅',$LCC_C); 
 $LCC_C = str_replace('S','𝑆',$LCC_C); 
 $LCC_C = str_replace('T','𝑇',$LCC_C); 
 $LCC_C = str_replace('U','𝑈',$LCC_C); 
 $LCC_C = str_replace('V','𝑉',$LCC_C); 
 $LCC_C = str_replace('W','𝑊',$LCC_C); 
 $LCC_C = str_replace('X','𝑋',$LCC_C); 
 $LCC_C = str_replace('Y','𝑌',$LCC_C); 
 $LCC_C = str_replace('Z','𝑍',$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}


if($text != '/start' and  !$data and !in_array($from_id,$sudo) and !in_array($chat_id,$ad) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝐀',$text); 
 $LCC_C = str_replace('b','𝐁',$LCC_C); 
 $LCC_C = str_replace('c','𝐂',$LCC_C); 
 $LCC_C = str_replace('d','𝐃',$LCC_C); 
 $LCC_C = str_replace('e','𝐄',$LCC_C); 
 $LCC_C = str_replace('f','𝐅',$LCC_C); 
 $LCC_C = str_replace('g','𝐆',$LCC_C); 
 $LCC_C = str_replace('h','𝐇',$LCC_C); 
 $LCC_C = str_replace('i','𝐈',$LCC_C); 
 $LCC_C = str_replace('j','𝐉',$LCC_C); 
 $LCC_C = str_replace('k','𝐊',$LCC_C); 
 $LCC_C = str_replace('l','𝐋',$LCC_C); 
 $LCC_C = str_replace('m','𝐌',$LCC_C); 
 $LCC_C = str_replace('n','𝐍',$LCC_C); 
 $LCC_C = str_replace('o','𝐎',$LCC_C); 
 $LCC_C = str_replace('p','𝐏',$LCC_C); 
 $LCC_C = str_replace('q','𝐐',$LCC_C); 
 $LCC_C = str_replace('r','𝐑',$LCC_C); 
 $LCC_C = str_replace('s','𝐒',$LCC_C); 
 $LCC_C = str_replace('t','𝐓',$LCC_C); 
 $LCC_C = str_replace('u','𝐔',$LCC_C); 
 $LCC_C = str_replace('v','𝐕',$LCC_C); 
 $LCC_C = str_replace('w','𝐖',$LCC_C); 
 $LCC_C = str_replace('x','𝐗',$LCC_C); 
 $LCC_C = str_replace('y','𝐘',$LCC_C); 
 $LCC_C = str_replace('z','𝐙',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝐀',$LCC_C); 
 $LCC_C = str_replace('B','𝐁',$LCC_C); 
 $LCC_C = str_replace('C','𝐂',$LCC_C); 
 $LCC_C = str_replace('D','𝐃',$LCC_C); 
 $LCC_C = str_replace('E','𝐄',$LCC_C); 
 $LCC_C = str_replace('F','𝐅',$LCC_C); 
 $LCC_C = str_replace('G','𝐆',$LCC_C); 
 $LCC_C = str_replace('H','𝐇',$LCC_C); 
 $LCC_C = str_replace('I','𝐈',$LCC_C); 
 $LCC_C = str_replace('J','𝐉',$LCC_C); 
 $LCC_C = str_replace('K','𝐊',$LCC_C); 
 $LCC_C = str_replace('L','𝐋',$LCC_C); 
 $LCC_C = str_replace('M','𝐌',$LCC_C); 
 $LCC_C = str_replace('N','𝐍',$LCC_C); 
 $LCC_C = str_replace('O','𝐎',$LCC_C); 
 $LCC_C = str_replace('P','𝐏',$LCC_C); 
 $LCC_C = str_replace('Q','𝐐',$LCC_C); 
 $LCC_C = str_replace('R','𝐑',$LCC_C); 
 $LCC_C = str_replace('S','𝐒',$LCC_C); 
 $LCC_C = str_replace('T','𝐓',$LCC_C); 
 $LCC_C = str_replace('U','𝐔',$LCC_C); 
 $LCC_C = str_replace('V','𝐕',$LCC_C); 
 $LCC_C = str_replace('W','𝐖',$LCC_C); 
 $LCC_C = str_replace('X','𝐗',$LCC_C); 
 $LCC_C = str_replace('Y','𝐘',$LCC_C); 
 $LCC_C = str_replace('Z','𝐙',$LCC_C);
 $LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
 $LCC_C = str_replace('a','𝖆',$text); 
 $LCC_C = str_replace('b','𝖇',$LCC_C); 
 $LCC_C = str_replace('c','𝖈',$LCC_C); 
 $LCC_C = str_replace('d','𝖉',$LCC_C); 
 $LCC_C = str_replace('e','𝖊',$LCC_C); 
 $LCC_C = str_replace('f','𝖋',$LCC_C); 
 $LCC_C = str_replace('g','𝖌',$LCC_C); 
 $LCC_C = str_replace('h','𝖍',$LCC_C); 
 $LCC_C = str_replace('i','𝖎',$LCC_C); 
 $LCC_C = str_replace('j','𝖏',$LCC_C); 
 $LCC_C = str_replace('k','𝖐',$LCC_C); 
 $LCC_C = str_replace('l','𝖑',$LCC_C); 
 $LCC_C = str_replace('m','𝖒',$LCC_C); 
 $LCC_C = str_replace('n','𝖓',$LCC_C); 
 $LCC_C = str_replace('o','𝖔',$LCC_C); 
 $LCC_C = str_replace('p','𝖕',$LCC_C); 
 $LCC_C = str_replace('q','𝖖',$LCC_C); 
 $LCC_C = str_replace('r','𝖗',$LCC_C); 
 $LCC_C = str_replace('s','𝖘',$LCC_C); 
 $LCC_C = str_replace('t','𝖙',$LCC_C); 
 $LCC_C = str_replace('u','𝖚',$LCC_C); 
 $LCC_C = str_replace('v','𝖛',$LCC_C); 
 $LCC_C = str_replace('w','𝖜',$LCC_C); 
 $LCC_C = str_replace('x','𝖝',$LCC_C); 
 $LCC_C = str_replace('y','𝖞',$LCC_C); 
 $LCC_C = str_replace('z','𝖟',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝖆',$LCC_C); 
 $LCC_C = str_replace('B','𝖇',$LCC_C); 
 $LCC_C = str_replace('C','𝖈',$LCC_C); 
 $LCC_C = str_replace('D','𝖉',$LCC_C); 
 $LCC_C = str_replace('E','𝖊',$LCC_C); 
 $LCC_C = str_replace('F','𝖋',$LCC_C); 
 $LCC_C = str_replace('G','𝖌',$LCC_C); 
 $LCC_C = str_replace('H','𝖍',$LCC_C); 
 $LCC_C = str_replace('I','𝖎',$LCC_C); 
 $LCC_C = str_replace('J','𝖏',$LCC_C); 
 $LCC_C = str_replace('K','𝖐',$LCC_C); 
 $LCC_C = str_replace('L','𝖑',$LCC_C); 
 $LCC_C = str_replace('M','𝖒',$LCC_C); 
 $LCC_C = str_replace('N','𝖓',$LCC_C); 
 $LCC_C = str_replace('O','𝖔',$LCC_C); 
 $LCC_C = str_replace('P','𝖕',$LCC_C); 
 $LCC_C = str_replace('Q','𝖖',$LCC_C); 
 $LCC_C = str_replace('R','𝖗',$LCC_C); 
 $LCC_C = str_replace('S','𝖘',$LCC_C); 
 $LCC_C = str_replace('T','𝖙',$LCC_C); 
 $LCC_C = str_replace('U','𝖚',$LCC_C); 
 $LCC_C = str_replace('V','𝖛',$LCC_C); 
 $LCC_C = str_replace('W','𝖜',$LCC_C); 
 $LCC_C = str_replace('X','𝖝',$LCC_C); 
 $LCC_C = str_replace('Y','𝖞',$LCC_C); 
 $LCC_C = str_replace('Z','𝖟',$LCC_C);
  $LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
   $LCC_C = str_replace('a','𝙰',$text); 
 $LCC_C = str_replace('b','𝙱',$LCC_C); 
 $LCC_C = str_replace('c','𝙲',$LCC_C); 
 $LCC_C = str_replace('d','𝙳',$LCC_C); 
 $LCC_C = str_replace('e','𝙴',$LCC_C); 
 $LCC_C = str_replace('f','𝙵',$LCC_C); 
 $LCC_C = str_replace('g','𝙶',$LCC_C); 
 $LCC_C = str_replace('h','𝙷',$LCC_C); 
 $LCC_C = str_replace('i','𝙸',$LCC_C); 
 $LCC_C = str_replace('j','𝙹',$LCC_C); 
 $LCC_C = str_replace('k','𝙺',$LCC_C); 
 $LCC_C = str_replace('l','𝙻',$LCC_C); 
 $LCC_C = str_replace('m','𝙼',$LCC_C); 
 $LCC_C = str_replace('n','𝙽',$LCC_C); 
 $LCC_C = str_replace('o','𝙾',$LCC_C); 
 $LCC_C = str_replace('p','𝙿',$LCC_C); 
 $LCC_C = str_replace('q','𝚀',$LCC_C); 
 $LCC_C = str_replace('r','𝚁',$LCC_C); 
 $LCC_C = str_replace('s','𝚂',$LCC_C); 
 $LCC_C = str_replace('t','𝚃',$LCC_C); 
 $LCC_C = str_replace('u','𝙺',$LCC_C); 
 $LCC_C = str_replace('v','𝚅',$LCC_C); 
 $LCC_C = str_replace('w','𝚆',$LCC_C); 
 $LCC_C = str_replace('x','𝚇',$LCC_C); 
 $LCC_C = str_replace('y','𝚈',$LCC_C); 
 $LCC_C = str_replace('z','𝚉',$LCC_C);
 $LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝙰',$LCC_C); 
 $LCC_C = str_replace('B','𝙱',$LCC_C); 
 $LCC_C = str_replace('C','𝙲',$LCC_C); 
 $LCC_C = str_replace('D','𝙳',$LCC_C); 
 $LCC_C = str_replace('E','𝙴',$LCC_C); 
 $LCC_C = str_replace('F','𝙵',$LCC_C); 
 $LCC_C = str_replace('G','𝙶',$LCC_C); 
 $LCC_C = str_replace('H','𝙷',$LCC_C); 
 $LCC_C = str_replace('I','𝙸',$LCC_C); 
 $LCC_C = str_replace('J','𝙹',$LCC_C); 
 $LCC_C = str_replace('K','𝙺',$LCC_C); 
 $LCC_C = str_replace('L','𝙻',$LCC_C); 
 $LCC_C = str_replace('M','𝙼',$LCC_C); 
 $LCC_C = str_replace('N','𝙽',$LCC_C); 
 $LCC_C = str_replace('O','𝙾',$LCC_C); 
 $LCC_C = str_replace('P','𝙿',$LCC_C); 
 $LCC_C = str_replace('Q','𝚀',$LCC_C); 
 $LCC_C = str_replace('R','𝚁',$LCC_C); 
 $LCC_C = str_replace('S','𝚂',$LCC_C); 
 $LCC_C = str_replace('T','𝚃',$LCC_C); 
 $LCC_C = str_replace('U','𝙺',$LCC_C); 
 $LCC_C = str_replace('V','𝚅',$LCC_C); 
 $LCC_C = str_replace('W','𝚆',$LCC_C); 
 $LCC_C = str_replace('X','𝚇',$LCC_C); 
 $LCC_C = str_replace('Y','𝚈',$LCC_C); 
 $LCC_C = str_replace('Z','𝚉',$LCC_C);
 $LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}
if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝒂',$text);
$LCC_C = str_replace("b","𝒃",$LCC_C);
$LCC_C = str_replace("c","𝒄",$LCC_C);
$LCC_C = str_replace("d","𝒅",$LCC_C);
$LCC_C = str_replace("e","𝒆",$LCC_C);
$LCC_C = str_replace("E","𝒇",$LCC_C);
$LCC_C = str_replace("g","𝒈",$LCC_C);
$LCC_C = str_replace("h","𝒉",$LCC_C);
$LCC_C = str_replace("i","𝒊",$LCC_C);
$LCC_C = str_replace("j","𝒋",$LCC_C);
$LCC_C = str_replace("k","𝒌",$LCC_C);
$LCC_C = str_replace("l","𝒍",$LCC_C);
$LCC_C = str_replace("m","𝒎",$LCC_C);
$LCC_C = str_replace("n","𝒏",$LCC_C);
$LCC_C = str_replace("o","𝒐",$LCC_C);
$LCC_C = str_replace("p","𝒑",$LCC_C);
$LCC_C = str_replace("q","𝒒",$LCC_C);
$LCC_C = str_replace("r","𝒓",$LCC_C);
$LCC_C = str_replace("s","𝒔",$LCC_C);
$LCC_C = str_replace("t","𝒕",$LCC_C);
$LCC_C = str_replace("u","𝒖",$LCC_C);
$LCC_C = str_replace("v","𝒗",$LCC_C);
$LCC_C = str_replace("w","𝒘",$LCC_C);
$LCC_C = str_replace("x","𝒙",$LCC_C);
$LCC_C = str_replace("y","𝒚",$LCC_C);
$LCC_C = str_replace("z","𝒛",$LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝒂',$LCC_C);
$LCC_C = str_replace("B","𝒃",$LCC_C);
$LCC_C = str_replace("C","𝒄",$LCC_C);
$LCC_C = str_replace("D","𝒅",$LCC_C);
$LCC_C = str_replace("E","𝒆",$LCC_C);
$LCC_C = str_replace("F","𝒇",$LCC_C);
$LCC_C = str_replace("G","𝒈",$LCC_C);
$LCC_C = str_replace("H","𝒉",$LCC_C);
$LCC_C = str_replace("I","𝒊",$LCC_C);
$LCC_C = str_replace("J","𝒋",$LCC_C);
$LCC_C = str_replace("K","𝒌",$LCC_C);
$LCC_C = str_replace("L","𝒍",$LCC_C);
$LCC_C = str_replace("M","𝒎",$LCC_C);
$LCC_C = str_replace("N","𝒏",$LCC_C);
$LCC_C = str_replace("O","𝒐",$LCC_C);
$LCC_C = str_replace("P","𝒑",$LCC_C);
$LCC_C = str_replace("Q","𝒒",$LCC_C);
$LCC_C = str_replace("R","𝒓",$LCC_C);
$LCC_C = str_replace("S","𝒔",$LCC_C);
$LCC_C = str_replace("T","𝒕",$LCC_C);
$LCC_C = str_replace("U","𝒖",$LCC_C);
$LCC_C = str_replace("V","𝒗",$LCC_C);
$LCC_C = str_replace("W","𝒘",$LCC_C);
$LCC_C = str_replace("X","𝒙",$LCC_C);
$LCC_C = str_replace("Y","𝒚",$LCC_C);
$LCC_C = str_replace("Z","𝒛",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}


if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝐴',$text);
$LCC_C = str_replace("b","𝒃",$LCC_C);
$LCC_C = str_replace("c","𝐶",$LCC_C);
$LCC_C = str_replace("d","𝐷",$LCC_C);
$LCC_C = str_replace("e","𝐸",$LCC_C);
$LCC_C = str_replace("E","𝐹",$LCC_C);
$LCC_C = str_replace("g","𝐺",$LCC_C);
$LCC_C = str_replace("h","𝐻",$LCC_C);
$LCC_C = str_replace("i","𝐼",$LCC_C);
$LCC_C = str_replace("j","𝐽",$LCC_C);
$LCC_C = str_replace("k","𝐾",$LCC_C);
$LCC_C = str_replace("l","𝐿",$LCC_C);
$LCC_C = str_replace("m","𝑀",$LCC_C);
$LCC_C = str_replace("n","𝑁",$LCC_C);
$LCC_C = str_replace("o","𝑂",$LCC_C);
$LCC_C = str_replace("p","𝑃",$LCC_C);
$LCC_C = str_replace("q","𝑄",$LCC_C);
$LCC_C = str_replace("r","𝑅",$LCC_C);
$LCC_C = str_replace("s","𝑆",$LCC_C);
$LCC_C = str_replace("t","𝑇",$LCC_C);
$LCC_C = str_replace("u","𝑈",$LCC_C);
$LCC_C = str_replace("v","𝑉",$LCC_C);
$LCC_C = str_replace("w","𝑊",$LCC_C);
$LCC_C = str_replace("x","𝑋",$LCC_C);
$LCC_C = str_replace("y","𝑌",$LCC_C);
$LCC_C = str_replace("z","𝑍",$LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝐴',$LCC_C);
$LCC_C = str_replace("B","𝒃",$LCC_C);
$LCC_C = str_replace("C","𝐶",$LCC_C);
$LCC_C = str_replace("D","𝐷",$LCC_C);
$LCC_C = str_replace("E","𝐸",$LCC_C);
$LCC_C = str_replace("F","𝐹",$LCC_C);
$LCC_C = str_replace("G","𝐺",$LCC_C);
$LCC_C = str_replace("H","𝐻",$LCC_C);
$LCC_C = str_replace("I","𝐼",$LCC_C);
$LCC_C = str_replace("J","𝐽",$LCC_C);
$LCC_C = str_replace("K","𝐾",$LCC_C);
$LCC_C = str_replace("L","𝐿",$LCC_C);
$LCC_C = str_replace("M","𝑀",$LCC_C);
$LCC_C = str_replace("N","𝑁",$LCC_C);
$LCC_C = str_replace("O","𝑂",$LCC_C);
$LCC_C = str_replace("P","𝑃",$LCC_C);
$LCC_C = str_replace("Q","𝑄",$LCC_C);
$LCC_C = str_replace("R","𝑅",$LCC_C);
$LCC_C = str_replace("S","𝑆",$LCC_C);
$LCC_C = str_replace("T","𝑇",$LCC_C);
$LCC_C = str_replace("U","𝑈",$LCC_C);
$LCC_C = str_replace("V","𝑉",$LCC_C);
$LCC_C = str_replace("W","𝑊",$LCC_C);
$LCC_C = str_replace("X","𝑋",$LCC_C);
$LCC_C = str_replace("Y","𝑌",$LCC_C);
$LCC_C = str_replace("Z","𝑍",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a','𝔸',$text);
$LCC_C = str_replace("b","𝔹",$LCC_C);
$LCC_C = str_replace("c","ℂ",$LCC_C);
$LCC_C = str_replace("d","𝔻",$LCC_C);
$LCC_C = str_replace("e","𝔼",$LCC_C);
$LCC_C = str_replace("f","𝔽",$LCC_C);
$LCC_C = str_replace("g","𝔾",$LCC_C);
$LCC_C = str_replace("h","ℍ",$LCC_C);
$LCC_C = str_replace("i","𝕀",$LCC_C);
$LCC_C = str_replace("j","𝕁",$LCC_C);
$LCC_C = str_replace("k","𝕂",$LCC_C);
$LCC_C = str_replace("l","𝕃",$LCC_C);
$LCC_C = str_replace("m","𝕄",$LCC_C);
$LCC_C = str_replace("n","ℕ",$LCC_C);
$LCC_C = str_replace("o","𝕆",$LCC_C);
$LCC_C = str_replace("p","ℙ",$LCC_C);
$LCC_C = str_replace("q","ℚ",$LCC_C);
$LCC_C = str_replace("r","ℝ",$LCC_C);
$LCC_C = str_replace("s","𝕊",$LCC_C);
$LCC_C = str_replace("t","𝕋",$LCC_C);
$LCC_C = str_replace("u","𝕌",$LCC_C);
$LCC_C = str_replace("v","𝕍",$LCC_C);
$LCC_C = str_replace("w","𝕎",$LCC_C);
$LCC_C = str_replace("x","𝕏",$LCC_C);
$LCC_C = str_replace("y","𝕐",$LCC_C);
$LCC_C = str_replace("z","ℤ",$LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A','𝔸',$LCC_C);
$LCC_C = str_replace("B","𝔹",$LCC_C);
$LCC_C = str_replace("C","ℂ",$LCC_C);
$LCC_C = str_replace("D","𝔻",$LCC_C);
$LCC_C = str_replace("E","𝔼",$LCC_C);
$LCC_C = str_replace("F","𝔽",$LCC_C);
$LCC_C = str_replace("G","𝔾",$LCC_C);
$LCC_C = str_replace("H","ℍ",$LCC_C);
$LCC_C = str_replace("I","𝕀",$LCC_C);
$LCC_C = str_replace("J","𝕁",$LCC_C);
$LCC_C = str_replace("K","𝕂",$LCC_C);
$LCC_C = str_replace("L","𝕃",$LCC_C);
$LCC_C = str_replace("M","𝕄",$LCC_C);
$LCC_C = str_replace("N","ℕ",$LCC_C);
$LCC_C = str_replace("O","𝕆",$LCC_C);
$LCC_C = str_replace("P","ℙ",$LCC_C);
$LCC_C = str_replace("Q","ℚ",$LCC_C);
$LCC_C = str_replace("R","ℝ",$LCC_C);
$LCC_C = str_replace("S","𝕊",$LCC_C);
$LCC_C = str_replace("T","𝕋",$LCC_C);
$LCC_C = str_replace("U","𝕌",$LCC_C);
$LCC_C = str_replace("V","𝕍",$LCC_C);
$LCC_C = str_replace("W","𝕎",$LCC_C);
$LCC_C = str_replace("X","𝕏",$LCC_C);
$LCC_C = str_replace("Y","𝕐",$LCC_C);
$LCC_C = str_replace("Z","ℤ",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LCC_C."".$lolo
]);} 

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a',"ᵃ",$text);
$LCC_C = str_replace("b","ᵇ",$LCC_C);
$LCC_C = str_replace("c","ᶜ",$LCC_C);
$LCC_C = str_replace("d","ᵈ",$LCC_C);
$LCC_C = str_replace("e","ᵉ",$LCC_C);
$LCC_C = str_replace("f","ᶠ",$LCC_C);
$LCC_C = str_replace("g","ᵍ",$LCC_C);
$LCC_C = str_replace("h","ʰ",$LCC_C);
$LCC_C = str_replace("i","ᶤ",$LCC_C);
$LCC_C = str_replace("j","ʲ",$LCC_C);
$LCC_C = str_replace("k","ᵏ",$LCC_C);
$LCC_C = str_replace("l","ˡ",$LCC_C);
$LCC_C = str_replace("m","ᵐ",$LCC_C);
$LCC_C = str_replace("n","ᶰ",$LCC_C);
$LCC_C = str_replace("o","ᵒ",$LCC_C);
$LCC_C = str_replace("p","ᵖ",$LCC_C);
$LCC_C = str_replace("q","ᵠ",$LCC_C);
$LCC_C = str_replace("r","ʳ",$LCC_C);
$LCC_C = str_replace("s","ˢ",$LCC_C);
$LCC_C = str_replace("t","ᵗ",$LCC_C);
$LCC_C = str_replace("u","ᵘ",$LCC_C);
$LCC_C = str_replace("v","ᵛ",$LCC_C);
$LCC_C = str_replace("w","ʷ",$LCC_C);
$LCC_C = str_replace("x","ˣ",$LCC_C);
$LCC_C = str_replace("y","ʸ",$LCC_C);
$LCC_C = str_replace("z","ᶻ",$LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A',"ᵃ",$LCC_C);
$LCC_C = str_replace("B","ᵇ",$LCC_C);
$LCC_C = str_replace("C","ᶜ",$LCC_C);
$LCC_C = str_replace("D","ᵈ",$LCC_C);
$LCC_C = str_replace("E","ᵉ",$LCC_C);
$LCC_C = str_replace("F","ᶠ",$LCC_C);
$LCC_C = str_replace("G","ᵍ",$LCC_C);
$LCC_C = str_replace("H","ʰ",$LCC_C);
$LCC_C = str_replace("I","ᶤ",$LCC_C);
$LCC_C = str_replace("J","ʲ",$LCC_C);
$LCC_C = str_replace("K","ᵏ",$LCC_C);
$LCC_C = str_replace("L","ˡ",$LCC_C);
$LCC_C = str_replace("M","ᵐ",$LCC_C);
$LCC_C = str_replace("N","ᶰ",$LCC_C);
$LCC_C = str_replace("O","ᵒ",$LCC_C);
$LCC_C = str_replace("P","ᵖ",$LCC_C);
$LCC_C = str_replace("Q","ᵠ",$LCC_C);
$LCC_C = str_replace("R","ʳ",$LCC_C);
$LCC_C = str_replace("S","ˢ",$LCC_C);
$LCC_C = str_replace("T","ᵗ",$LCC_C);
$LCC_C = str_replace("U","ᵘ",$LCC_C);
$LCC_C = str_replace("V","ᵛ",$LCC_C);
$LCC_C = str_replace("W","ʷ",$LCC_C);
$LCC_C = str_replace("X","ˣ",$LCC_C);
$LCC_C = str_replace("Y","ʸ",$LCC_C);
$LCC_C = str_replace("Z","ᶻ",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
 bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a', 'ᴀ', $text);
$LCC_C = str_replace('b', 'ʙ', $LCC_C);
$LCC_C = str_replace('c', 'ᴄ', $LCC_C);
$LCC_C = str_replace('d', 'ᴅ', $LCC_C);
$LCC_C = str_replace('e', 'ᴇ', $LCC_C);
$LCC_C = str_replace('f', 'ꜰ', $LCC_C);
$LCC_C = str_replace('g', 'ɢ', $LCC_C);
$LCC_C = str_replace('h', 'ʜ', $LCC_C);
$LCC_C = str_replace('i', 'ɪ', $LCC_C);
$LCC_C = str_replace('j', 'ᴊ', $LCC_C);
$LCC_C = str_replace('k', 'ᴋ', $LCC_C);
$LCC_C = str_replace('l', 'ʟ', $LCC_C);
$LCC_C = str_replace('m', 'ᴍ', $LCC_C);
$LCC_C = str_replace('n', 'ɴ', $LCC_C);
$LCC_C = str_replace('o', 'ᴏ', $LCC_C);
$LCC_C = str_replace('p', 'ᴘ', $LCC_C);
$LCC_C = str_replace('q', 'ǫ', $LCC_C);
$LCC_C = str_replace('r', 'ʀ', $LCC_C);
$LCC_C = str_replace('s', 's', $LCC_C);
$LCC_C = str_replace('t', 'ᴛ', $LCC_C);
$LCC_C = str_replace('u', 'ᴜ', $LCC_C);
$LCC_C = str_replace('v', 'ᴠ', $LCC_C);
$LCC_C = str_replace('w', 'ᴡ', $LCC_C);
$LCC_C = str_replace('x', 'x', $LCC_C);
$LCC_C = str_replace('y', 'ʏ', $LCC_C);
$LCC_C = str_replace('z', 'ᴢ', $LCC_C);
$LCC_C = str_replace('A', 'ᴀ', $LCC_C);
$LCC_C = str_replace('B', 'ʙ', $LCC_C);
$LCC_C = str_replace('C', 'ᴄ', $LCC_C);
$LCC_C = str_replace('D', 'ᴅ', $LCC_C);
$LCC_C = str_replace('E', 'ᴇ', $LCC_C);
$LCC_C = str_replace('F', 'ꜰ', $LCC_C);
$LCC_C = str_replace('G', 'ɢ', $LCC_C);
$LCC_C = str_replace('H', 'ʜ', $LCC_C);
$LCC_C = str_replace('I', 'ɪ', $LCC_C);
$LCC_C = str_replace('J', 'ᴊ', $LCC_C);
$LCC_C = str_replace('K', 'ᴋ', $LCC_C);
$LCC_C = str_replace('L', 'ʟ', $LCC_C);
$LCC_C = str_replace('M', 'ᴍ', $LCC_C);
$LCC_C = str_replace('N', 'ɴ', $LCC_C);
$LCC_C = str_replace('O', 'ᴏ', $LCC_C);
$LCC_C = str_replace('P', 'ᴘ', $LCC_C);
$LCC_C = str_replace('Q', 'ǫ', $LCC_C);
$LCC_C = str_replace('R', 'ʀ', $LCC_C);
$LCC_C = str_replace('S', 's', $LCC_C);
$LCC_C = str_replace('T', 'ᴛ', $LCC_C);
$LCC_C = str_replace('U', 'ᴜ', $LCC_C);
$LCC_C = str_replace('V', 'ᴠ', $LCC_C);
$LCC_C = str_replace('W', 'ᴡ', $LCC_C);
$LCC_C = str_replace('X', 'x', $LCC_C);
$LCC_C = str_replace('Y', 'ʏ', $LCC_C);
$LCC_C = str_replace('Z', 'ᴢ', $LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('A', '🄰', $text);
$LCC_C = str_replace('B', '🄱', $LCC_C);
$LCC_C = str_replace('C', '🄲', $LCC_C);
$LCC_C = str_replace('D', '🄳', $LCC_C);
$LCC_C = str_replace('E', '🄴', $LCC_C);
$LCC_C = str_replace('F', '🄵', $LCC_C);
$LCC_C = str_replace('G', '🄶', $LCC_C);
$LCC_C = str_replace('H', '🄷', $LCC_C);
$LCC_C = str_replace('I', '🄸', $LCC_C);
$LCC_C = str_replace('J', '🄹', $LCC_C);
$LCC_C = str_replace('K', '🄺', $LCC_C);
$LCC_C = str_replace('L', '🄻', $LCC_C);
$LCC_C = str_replace('M', '🄼', $LCC_C);
$LCC_C = str_replace('N', '🄽', $LCC_C);
$LCC_C = str_replace('O', '🄾', $LCC_C);
$LCC_C = str_replace('P', '🄿', $LCC_C);
$LCC_C = str_replace('Q', '🅀', $LCC_C);
$LCC_C = str_replace('R', '🅁', $LCC_C);
$LCC_C = str_replace('S', '🅂', $LCC_C);
$LCC_C = str_replace('T', '🅃', $LCC_C);
$LCC_C = str_replace('U', '🅄', $LCC_C);
$LCC_C = str_replace('V', '🅅', $LCC_C);
$LCC_C = str_replace('W', '🅆', $LCC_C);
$LCC_C = str_replace('X', '🅇', $LCC_C);
$LCC_C = str_replace('Y', '🅈', $LCC_C);
$LCC_C = str_replace('Z', '🅉', $LCC_C);
$LCC_C = str_replace('a', '🄰', $LCC_C);
$LCC_C = str_replace('b', '🄱', $LCC_C);
$LCC_C = str_replace('c', '🄲', $LCC_C);
$LCC_C = str_replace('d', '🄳', $LCC_C);
$LCC_C = str_replace('e', '🄴', $LCC_C);
$LCC_C = str_replace('f', '🄵', $LCC_C);
$LCC_C = str_replace('g', '🄶', $LCC_C);
$LCC_C = str_replace('h', '🄷', $LCC_C);
$LCC_C = str_replace('i', '🄸', $LCC_C);
$LCC_C = str_replace('j', '🄹', $LCC_C);
$LCC_C = str_replace('k', '🄺', $LCC_C);
$LCC_C = str_replace('l', '🄻', $LCC_C);
$LCC_C = str_replace('m', '🄼', $LCC_C);
$LCC_C = str_replace('n', '🄽', $LCC_C);
$LCC_C = str_replace('o', '🄾', $LCC_C);
$LCC_C = str_replace('p', '🄿', $LCC_C);
$LCC_C = str_replace('q', '🅀', $LCC_C);
$LCC_C = str_replace('r', '🅁', $LCC_C);
$LCC_C = str_replace('s', '🅂', $LCC_C);
$LCC_C = str_replace('t', '🅃', $LCC_C);
$LCC_C = str_replace('u', '🅄', $LCC_C);
$LCC_C = str_replace('v', '🅅', $LCC_C);
$LCC_C = str_replace('w', '🅆', $LCC_C);
$LCC_C = str_replace('x', '🅇', $LCC_C);
$LCC_C = str_replace('y', '🅈', $LCC_C);
$LCC_C = str_replace('z', '🅉', $LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('A', 'ⓐ', $text);
$LCC_C = str_replace('B', 'ⓑ', $LCC_C);
$LCC_C = str_replace('C', 'ⓒ', $LCC_C);
$LCC_C = str_replace('D', 'ⓓ', $LCC_C);
$LCC_C = str_replace('E', 'ⓔ', $LCC_C);
$LCC_C = str_replace('F', 'ⓕ', $LCC_C);
$LCC_C = str_replace('G', 'ⓖ', $LCC_C);
$LCC_C = str_replace('H', 'ⓗ', $LCC_C);
$LCC_C = str_replace('I', 'ⓘ', $LCC_C);
$LCC_C = str_replace('J', 'ⓙ', $LCC_C);
$LCC_C = str_replace('K', 'ⓚ', $LCC_C);
$LCC_C = str_replace('L', 'ⓛ', $LCC_C);
$LCC_C = str_replace('M', 'ⓜ', $LCC_C);
$LCC_C = str_replace('N', 'ⓝ', $LCC_C);
$LCC_C = str_replace('O', 'ⓞ', $LCC_C);
$LCC_C = str_replace('P', 'ⓟ', $LCC_C);
$LCC_C = str_replace('Q', 'ⓠ', $LCC_C);
$LCC_C = str_replace('R', 'ⓡ', $LCC_C);
$LCC_C = str_replace('S', 'ⓢ', $LCC_C);
$LCC_C = str_replace('T', 'ⓣ', $LCC_C);
$LCC_C = str_replace('U', 'ⓤ', $LCC_C);
$LCC_C = str_replace('V', 'ⓥ', $LCC_C);
$LCC_C = str_replace('W', 'ⓦ', $LCC_C);
$LCC_C = str_replace('X', 'ⓧ', $LCC_C);
$LCC_C = str_replace('Y', 'ⓨ', $LCC_C);
$LCC_C = str_replace('Z', 'ⓩ', $LCC_C);
$LCC_C = str_replace('a', 'ⓐ', $text);
$LCC_C = str_replace('b', 'ⓑ', $LCC_C);
$LCC_C = str_replace('c', 'ⓒ', $LCC_C);
$LCC_C = str_replace('d', 'ⓓ', $LCC_C);
$LCC_C = str_replace('e', 'ⓔ', $LCC_C);
$LCC_C = str_replace('f', 'ⓕ', $LCC_C);
$LCC_C = str_replace('g', 'ⓖ', $LCC_C);
$LCC_C = str_replace('h', 'ⓗ', $LCC_C);
$LCC_C = str_replace('i', 'ⓘ', $LCC_C);
$LCC_C = str_replace('j', 'ⓙ', $LCC_C);
$LCC_C = str_replace('k', 'ⓚ', $LCC_C);
$LCC_C = str_replace('l', 'ⓛ', $LCC_C);
$LCC_C = str_replace('m', 'ⓜ', $LCC_C);
$LCC_C = str_replace('n', 'ⓝ', $LCC_C);
$LCC_C = str_replace('o', 'ⓞ', $LCC_C);
$LCC_C = str_replace('p', 'ⓟ', $LCC_C);
$LCC_C = str_replace('q', 'ⓠ', $LCC_C);
$LCC_C = str_replace('r', 'ⓡ', $LCC_C);
$LCC_C = str_replace('s', 'ⓢ', $LCC_C);
$LCC_C = str_replace('t', 'ⓣ', $LCC_C);
$LCC_C = str_replace('u', 'ⓤ', $LCC_C);
$LCC_C = str_replace('v', 'ⓥ', $LCC_C);
$LCC_C = str_replace('w', 'ⓦ', $LCC_C);
$LCC_C = str_replace('x', 'ⓧ', $LCC_C);
$LCC_C = str_replace('y', 'ⓨ', $LCC_C);
$LCC_C = str_replace('z', 'ⓩ', $LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a', '𝒜', $text);
$LCC_C = str_replace('b', 'ℬ', $LCC_C);
$LCC_C = str_replace('c', '𝒞', $LCC_C);
$LCC_C = str_replace('d', '𝒟', $LCC_C);
$LCC_C = str_replace('e', 'ℰ', $LCC_C);
$LCC_C = str_replace('f', 'ℱ', $LCC_C);
$LCC_C = str_replace('g', '𝒢', $LCC_C);
$LCC_C = str_replace('h', 'ℋ', $LCC_C);
$LCC_C = str_replace('i', 'ℐ', $LCC_C);
$LCC_C = str_replace('j', '𝒥', $LCC_C);
$LCC_C = str_replace('k', '𝒦', $LCC_C);
$LCC_C = str_replace('l', 'ℒ', $LCC_C);
$LCC_C = str_replace('m', 'ℳ', $LCC_C);
$LCC_C = str_replace('n', '𝒩', $LCC_C);
$LCC_C = str_replace('o', '𝒪', $LCC_C);
$LCC_C = str_replace('p', '𝒫', $LCC_C);
$LCC_C = str_replace('q', '𝒬', $LCC_C);
$LCC_C = str_replace('r', 'ℛ', $LCC_C);
$LCC_C = str_replace('s', '𝒮', $LCC_C);
$LCC_C = str_replace('t', '𝒯', $LCC_C);
$LCC_C = str_replace('u', '𝒰', $LCC_C);
$LCC_C = str_replace('v', '𝒱', $LCC_C);
$LCC_C = str_replace('w', '𝒲', $LCC_C);
$LCC_C = str_replace('x', '𝒳', $LCC_C);
$LCC_C = str_replace('y', '𝒴', $LCC_C);
$LCC_C = str_replace('z', '𝒵', $LCC_C);
$LCC_C = str_replace('A', '𝒜', $LCC_C);
$LCC_C = str_replace('B', 'ℬ', $LCC_C);
$LCC_C = str_replace('C', '𝒞', $LCC_C);
$LCC_C = str_replace('D', '𝒟', $LCC_C);
$LCC_C = str_replace('E', 'ℰ', $LCC_C);
$LCC_C = str_replace('F', 'ℱ', $LCC_C);
$LCC_C = str_replace('G', '𝒢', $LCC_C);
$LCC_C = str_replace('H', 'ℋ', $LCC_C);
$LCC_C = str_replace('I', 'ℐ', $LCC_C);
$LCC_C = str_replace('J', '𝒥', $LCC_C);
$LCC_C = str_replace('K', '𝒦', $LCC_C);
$LCC_C = str_replace('L', 'ℒ', $LCC_C);
$LCC_C = str_replace('M', 'ℳ', $LCC_C);
$LCC_C = str_replace('N', '𝒩', $LCC_C);
$LCC_C = str_replace('O', '𝒪', $LCC_C);
$LCC_C = str_replace('P', '𝒫', $LCC_C);
$LCC_C = str_replace('Q', '𝒬', $LCC_C);
$LCC_C = str_replace('R', 'ℛ', $LCC_C);
$LCC_C = str_replace('S', '𝒮', $LCC_C);
$LCC_C = str_replace('T', '𝒯', $LCC_C);
$LCC_C = str_replace('U', '𝒰', $LCC_C);
$LCC_C = str_replace('V', '𝒱', $LCC_C);
$LCC_C = str_replace('W', '𝒲', $LCC_C);
$LCC_C = str_replace('X', '𝒳', $LCC_C);
$LCC_C = str_replace('Y', '𝒴', $LCC_C);
$LCC_C = str_replace('Z', '𝒵', $LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a', 'ᗩ', $text);
$LCC_C = str_replace('b', 'ᗷ', $LCC_C);
$LCC_C = str_replace('c', 'ᑕ', $LCC_C);
$LCC_C = str_replace('d', 'ᗞ', $LCC_C);
$LCC_C = str_replace('e', 'E', $LCC_C);
$LCC_C = str_replace('f', 'ᖴ', $LCC_C);
$LCC_C = str_replace('g', 'G', $LCC_C);
$LCC_C = str_replace('h', 'ᕼ', $LCC_C);
$LCC_C = str_replace('i', 'I', $LCC_C);
$LCC_C = str_replace('j', 'ᒍ', $LCC_C);
$LCC_C = str_replace('k', 'K', $LCC_C);
$LCC_C = str_replace('l', 'ᒪ', $LCC_C);
$LCC_C = str_replace('m', 'ᗰ', $LCC_C);
$LCC_C = str_replace('n', 'ᑎ', $LCC_C);
$LCC_C = str_replace('o', 'ᝪ', $LCC_C);
$LCC_C = str_replace('p', 'ᑭ', $LCC_C);
$LCC_C = str_replace('q', 'ᑫ', $LCC_C);
$LCC_C = str_replace('r', 'ᖇ', $LCC_C);
$LCC_C = str_replace('s', 'Ꮪ', $LCC_C);
$LCC_C = str_replace('t', 'T', $LCC_C);
$LCC_C = str_replace('u', 'ᑌ', $LCC_C);
$LCC_C = str_replace('v', 'ᐯ', $LCC_C);
$LCC_C = str_replace('w', 'ᗯ', $LCC_C);
$LCC_C = str_replace('x', '☓', $LCC_C);
$LCC_C = str_replace('y', 'Y', $LCC_C);
$LCC_C = str_replace('z', 'Z', $LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A', 'ᗩ', $LCC_C);
$LCC_C = str_replace('B', 'ᗷ', $LCC_C);
$LCC_C = str_replace('C', 'ᑕ', $LCC_C);
$LCC_C = str_replace('D', 'ᗞ', $LCC_C);
$LCC_C = str_replace('E', 'E', $LCC_C);
$LCC_C = str_replace('F', 'Բ', $LCC_C);
$LCC_C = str_replace('G', 'G', $LCC_C);
$LCC_C = str_replace('H', 'ᕼ', $LCC_C);
$LCC_C = str_replace('I', 'I', $LCC_C);
$LCC_C = str_replace('J', 'ᒍ', $LCC_C);
$LCC_C = str_replace('K', 'K', $LCC_C);
$LCC_C = str_replace('L', 'ᒪ', $LCC_C);
$LCC_C = str_replace('M', 'ᗰ', $LCC_C);
$LCC_C = str_replace('N', 'ᑎ', $LCC_C);
$LCC_C = str_replace('O', 'ᝪ', $LCC_C);
$LCC_C = str_replace('P', 'ᑭ', $LCC_C);
$LCC_C = str_replace('Q', 'ᑫ', $LCC_C);
$LCC_C = str_replace('R', 'ᖇ', $LCC_C);
$LCC_C = str_replace('S', 'Ꮪ', $LCC_C);
$LCC_C = str_replace('T', 'ᝨ', $LCC_C);
$LCC_C = str_replace('U', 'ᑌ', $LCC_C);
$LCC_C = str_replace('V', 'ᐯ', $LCC_C);
$LCC_C = str_replace('W', 'ᗯ', $LCC_C);
$LCC_C = str_replace('X', '☓', $LCC_C);
$LCC_C = str_replace('Y', 'Y', $LCC_C);
$LCC_C = str_replace('Z', 'Z', $LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}

if($text != '/start' and  !$data and !in_array($from_id,$ebu) and !in_array($chat_id,$sudo) and $chat_id != $admin){
  $MR =  [" 𖤍."," 𖤐."," ⸙."," ༗."," 𖤬."," 𖤴."," ☬."," ☽."," ☾."," 𖠴."," ⚘."," ☤."," ⚚."," 𖡟."," ☼."," ⌱."," 𖨬."," ঌ."," 𖠱."];
  $MC = array_rand($MR,1); 
  $lolo = $MR[$MC];
   $count = count($text); 
$LCC_C = str_replace('a', 'Ꭺ', $text);
$LCC_C = str_replace('b', 'Ᏼ', $LCC_C);
$LCC_C = str_replace('c', 'Ꮯ', $LCC_C);
$LCC_C = str_replace('d', 'ᗪ', $LCC_C);
$LCC_C = str_replace('e', 'Ꭼ', $LCC_C);
$LCC_C = str_replace('f', 'Բ', $LCC_C);
$LCC_C = str_replace('g', 'Ꮆ', $LCC_C);
$LCC_C = str_replace('h', 'Ꮒ', $LCC_C);
$LCC_C = str_replace('i', 'Ꮖ', $LCC_C);
$LCC_C = str_replace('j', 'Ꭻ', $LCC_C);
$LCC_C = str_replace('k', 'Ꮶ', $LCC_C);
$LCC_C = str_replace('l', 'Ꮮ', $LCC_C);
$LCC_C = str_replace('m', 'Ꮇ', $LCC_C);
$LCC_C = str_replace('n', 'Ꮑ', $LCC_C);
$LCC_C = str_replace('o', 'Ꭷ', $LCC_C);
$LCC_C = str_replace('p', 'Ꭾ', $LCC_C);
$LCC_C = str_replace('q', 'Ꭴ', $LCC_C);
$LCC_C = str_replace('r', 'Ꭱ', $LCC_C);
$LCC_C = str_replace('s', 'Ꮪ', $LCC_C);
$LCC_C = str_replace('t', 'Ꭲ', $LCC_C);
$LCC_C = str_replace('u', 'ᑌ', $LCC_C);
$LCC_C = str_replace('v', 'ᐯ', $LCC_C);
$LCC_C = str_replace('w', 'Ꮃ', $LCC_C);
$LCC_C = str_replace('x', '᙭', $LCC_C);
$LCC_C = str_replace('y', 'Ꭹ', $LCC_C);
$LCC_C = str_replace('z', 'Ꮓ', $LCC_C);
$LCC_C = str_replace("1","¹",$LCC_C);
$LCC_C = str_replace("2","²",$LCC_C);
$LCC_C = str_replace("3","³",$LCC_C);
$LCC_C = str_replace("4","⁴",$LCC_C);
$LCC_C = str_replace("5","⁵",$LCC_C);
$LCC_C = str_replace("6","⁶",$LCC_C);
$LCC_C = str_replace("7","⁷",$LCC_C);
$LCC_C = str_replace("8","⁸",$LCC_C);
$LCC_C = str_replace("9","⁹",$LCC_C);
$LCC_C = str_replace("0","⁰",$LCC_C);
$LCC_C = str_replace('A', 'Ꭺ', $LCC_C);
$LCC_C = str_replace('B', 'Ᏼ', $LCC_C);
$LCC_C = str_replace('C','Ꮯ', $LCC_C);
$LCC_C = str_replace('D', 'ᗪ', $LCC_C);
$LCC_C = str_replace('E', 'Ꭼ', $LCC_C);
$LCC_C = str_replace('F', 'Բ', $LCC_C);
$LCC_C = str_replace('G', 'Ꮆ', $LCC_C);
$LCC_C = str_replace('H', 'Ꮒ', $LCC_C);
$LCC_C = str_replace('I', 'Ꮖ', $LCC_C);
$LCC_C = str_replace('J', 'Ꭻ', $LCC_C);
$LCC_C = str_replace('K', 'Ꮶ', $LCC_C);
$LCC_C = str_replace('L', 'Ꮮ', $LCC_C);
$LCC_C = str_replace('M', 'Ꮇ', $LCC_C);
$LCC_C = str_replace('N', 'Ꮑ', $LCC_C);
$LCC_C = str_replace('O', 'Ꭷ', $LCC_C);
$LCC_C = str_replace('P', 'Ꭾ', $LCC_C);
$LCC_C = str_replace('Q', 'Ꭴ', $LCC_C);
$LCC_C = str_replace('R', 'Ꭱ', $LCC_C);
$LCC_C = str_replace('S', 'Ꮪ', $LCC_C);
$LCC_C = str_replace('T', 'Ꭲ', $LCC_C);
$LCC_C = str_replace('U', 'ᑌ', $LCC_C);
$LCC_C = str_replace('V', 'ᐯ', $LCC_C);
$LCC_C = str_replace('W', 'Ꮃ', $LCC_C);
$LCC_C = str_replace('X', '᙭', $LCC_C);
$LCC_C = str_replace('Y', 'Ꭹ', $LCC_C);
$LCC_C = str_replace('Z', 'Ꮓ', $LCC_C);
$LCC_C = str_replace("١","¹",$LCC_C);
$LCC_C = str_replace("٢","²",$LCC_C);
$LCC_C = str_replace("٣","³",$LCC_C);
$LCC_C = str_replace("٤","⁴",$LCC_C);
$LCC_C = str_replace("٥","⁵",$LCC_C);
$LCC_C = str_replace("٦","⁶",$LCC_C);
$LCC_C = str_replace("٧","⁷",$LCC_C);
$LCC_C = str_replace("٨","⁸",$LCC_C);
$LCC_C = str_replace("٩","⁹",$LCC_C);
$LCC_C = str_replace("٠","⁰",$LCC_C);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$LCC_C."".$lolo
]);}




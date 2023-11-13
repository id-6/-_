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

function SendMsg($chat_id,$text,$parse_mode,$disable_web_page_preview,$reply_markup,$message_id){ //SendMessage
return bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$reply_markup,
'reply_to_message_id'=>$message_id,
]);
}
function DelMsg($chat_id,$message_id){ //DeleteMessage
return bot('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
}
function GetChat($chat_id){
return bot('getChat',[
'chat_id'=>$chat_id
]);
}
function SaveJson($file,$array){  
return file_put_contents($file, json_encode($array));}

function Up_True(){
return json_decode(file_get_contents('php://input'),true);
}
function SendChatAction($chat_id,$action){
return bot('sendChatAction',[
'chat_id'=>$chat_id,
'action'=>$action
]);
}
function ExportChatInviteLink($chat_id){
return bot('exportChatInviteLink',[
'chat_id'=>$chat_id,
]);
}
function GetChatMembersCount($chat_id){
return bot('getChatMembersCount',[
'chat_id'=>$chat_id,
]);
}

function EditMsg($chat_id,$message_id,$text,$parse_mode,$disable_web_page_preview,$reply_markup){
return bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>$text,
'parse_mode'=>$parse_mode,
'disable_web_page_preview'=>$disable_web_page_preview,
'reply_markup'=>$reply_markup
]);
}
mkdir("data/bot");
if($start=="non"){
$start="مرحبا بك - $name ❤
- اهلا بك في بوت زيادة اعضاء قناتك من خلال مجموعتك ؛ 👥
- اضفني الى مجموعتك وقم برفعي مشرف ؛ 👨‍✈️
- بعدها ارسل { تفعيل البوت } واتبع التعليمات التي ارسلها اليك ؛ 🈯️
- لتعطيل البوت ارسل داخل مجموعتك كلمة { تعطيل البوت } ؛ ❎ ";
}


$ge = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$chat_id."&user_id=".$from_id);
$Als = json_decode($ge, true);
$al = $Als['result']['status'];

$chn = file_get_contents("data/bot/u$chat_id.txt");
$join = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=$chn&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
if($al != "creator" and $al != "administrator"){
bot('DeleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"عزيزي انت غير مشترك - [$name](tg://user?id=$from_id) ؛ ❤️

- لايمكنك ارسال اي رسالة هنا لانك غير مشترك في قناة المجموعة ؛ ✅
قناة المجموعه ؛ [$chn] 🌐
",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>" اضغط هنا للاشتراك ✅",'url'=>"t.me/".str_replace('@',null,$chn)]]
]
])
]);return false;}}
$link = file_get_contents("data/bot/l$chat_id.txt");
$id = file_get_contents("data/bot/d$chat_id.txt");
$join = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=$id&user_id=".$from_id);
if($message && (strpos($join,'"status":"left"') or strpos($join,'"Bad Request: USER_ID_INVALID"') or strpos($join,'"status":"kicked"'))!== false){
if($al != "creator" and $al != "administrator"){
bot('DeleteMessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id
]);
bot('sendMessage', [
'chat_id'=>$chat_id,
'text'=>"عزيزي انت غير مشترك - [$name](tg://user?id=$from_id) ؛ ❤️

- لايمكنك ارسال اي رسالة هنا لانك غير مشترك في قناة المجموعة ؛ ✅
[في قناة المجموعة]($link)",
'parse_mode'=>"MarkDown",
'disable_web_page_preview' =>true,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
    [['text'=>" اضغط هنا للاشتراك ✅",'url'=>"$link"]]
]
])
]);return false;}}
$dev = $admin;
$key = json_encode(['inline_keyboard' => [ //inline_keyboard =1 
[['text'=>"اضافة قناة عآمة 📧.",'callback_data' =>"ad"]],
[['text'=>"اضافة قناة خاصه 📨.",'callback_data' =>"d"]],

],
]); 
$key_start = json_encode(['inline_keyboard' => [ //inline_keyboard =2
[['text'=>"اضفني الى مجموعتك مباشراََ ⬆.",'url' =>"https://telegram.me/$usernamebot?startgroup=start"]],
],
]); 
if($text == "/start"){
SendMsg($chat_id,"$start

 ؛ 📮","HTML",True,$key_start,$message_id);
}
$com = json_decode(file_get_contents('data/bot/com.json'),true);
$private = json_decode(file_get_contents('data/bot/private.json'),true);
$get = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$chat_id."&user_id=".$from_id);
$Als = json_decode($get, true);
$alo = $Als['result']['status'];
if($from_id == $dev or $alo == "administrator" or $alo == "creator"){
if($data == "rm"){
EditMsg($chat_id,$message_id,"تم الغاء الامر بنجاح 🎫.","markdown",True,null);
$com[$chat_id]["com"] = "hi";
SaveJson("data/bot/com.json",$com);
}
}

if($from_id == $dev or $alo == "administrator" or $alo == "creator"){
if($data == "ad"){
EditMsg($chat_id,$message_id,"ارسل معرف القناة الان مع (@)","markdown",True,json_encode(['inline_keyboard' => [ [['text'=>"الغاء الامر ⬅.",'callback_data' =>"rm"]],],]));
$com[$chat_id]["com"] = "add";
SaveJson("data/bot/com.json",$com);
}
}
if($from_id == $dev or $alo == "administrator" or $alo == "creator"){
if($data == "d"){
EditMsg($chat_id,$message_id,"ارسل ايدي القناة 
لستخراج ايدي القناه اضغط
استخـراج ايدي قناتك","markdown",True,json_encode(['inline_keyboard' => [ [['text'=>"استخـراج ايدي قناتك 🆔.",'url' =>"https://telegram.me/Id_iBoT"]],
[['text'=>"الغاء الامر ⬅.",'callback_data' =>"rm"]],],]));
$com[$chat_id]["com"] = "ad";
SaveJson("data/bot/com.json",$com);
}
}
if($from_id == $dev or $alo == "administrator" or $alo == "creator"){
if($data == "adh"){
EditMsg($chat_id,$message_id,"ارسل ايدي القناة يجب ان يكون بداية ل ايدي (-100) ، كمثال".PHP_EOL."-100545763478","markdown",True,null);
$com[$chat_id]["com"] = "ad";
SaveJson("data/bot/com.json",$com);
}
}
$chat = GetChat($chat_id);     	             
$array = json_decode(json_encode($chat), True);
$getId = $array['result']['id']; $Title = $array['result']['title'];
$getType = $array['result']['type']; $username = $array['result']['username'];
$link = ExportChatInviteLink($chat_id)->result;
$GetChatMembersCount = GetChatMembersCount($chat_id)->result;
$ge = file_get_contents("https://api.telegram.org/bot".$token."/getChatMember?chat_id=".$chat_id."&user_id=".$from_id);
$Alsh = json_decode($ge, true);
$aloo = $Alsh['result']['status'];
if($from_id == $dev or $aloo == "administrator" or $aloo == "creator"){
if($text == "تفعيل البوت"){
SendMsg($chat_id,"اختر من الاسفل عزيزي.","markdown",True,$key,$message_id);
$inf = "- معلومٱت : ᴗ͈‸ᴗ *$Title* ،\n\n- النوع : *$getType * \n- الـ*ID*ـ : 〖`$getId`〗.\n- عدد الاعضاء : 〖`$GetChatMembersCount`〗.\n\n- رابـَط وهمي فعٱل لمده :〔 [$link] 〕";
SendMsg($dev,$inf,"MARKDOWN",true,null,null);
}
}
if($text != "/start" and $from_id == $dev or $aloo == "administrator" or $aloo == "creator"){
if($com[$chat_id]["com"] == "add"){
if(preg_match('/^(@)(.*)/s',$text)){
file_put_contents("data/bot/u$chat_id.txt",$text);
SendMsg($chat_id,"عزيزي تم حفظ القناة قم برفعي ادمن في قناتك","markdown",True,null,$message_id);
unset($com[$chat_id]["com"]);
SaveJson("date/bot/com.json",$com);
}elseif(!preg_match('/^(@)(.*)/s',$text)){
SendMsg($chat_id,"ارسل المعرف مع (@)","markdown",True,
json_encode(['inline_keyboard' => [ [['text'=>"الغاء الامر ⬅.",'callback_data' =>"rm"]]]]),$message_id);
}
}
}

if($text != "/start" and $from_id == $dev or $aloo == "administrator" or $aloo == "creator"){
if($com[$chat_id]["com"] == "ad"){
if(preg_match('/^- *.|([0-9])/',$text)){
file_put_contents("data/bot/d$chat_id.txt",$text);
SendMsg($chat_id,"عزيزي تم حفظ ايدي القناة الان ارسل رابط القناة من فضلك ♨.","markdown",True,json_encode(['inline_keyboard' => [ [['text'=>"الغاء الامر ⬅.",'callback_data' =>"rm"]]]]),$message_id);
unset($com[$chat_id]["com"]);
SaveJson("data/bot/com.json",$com);
$com[$chat_id]["com"] = "link";
SaveJson("data/bot/com.json",$com);
}elseif(!preg_match('/^- *.|([0-9])/',$text)){
SendMsg($chat_id,"ارسل ايدي القناة 
لستخراج ايدي القناه اضغط
استخـراج ايدي قناتك","markdown",True,json_encode(['inline_keyboard' => [ [['text'=>"استخـراج ايدي قناتك 🆔.",'url' =>"https://telegram.me/Id_iBoT"]],
[['text'=>"الغاء الامر ⬅.",'callback_data' =>"rm"]]]]),$message_id);
}
}
}
if($text != "/start" and $from_id == $dev or $aloo == "administrator" or $aloo == "creator"){
if($com[$chat_id]["com"] == "link"){
if(preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text) or !preg_match('/^- *.|([0-9])/',$text)){
file_put_contents("data/bot/l$chat_id.txt",$text);
SendMsg($chat_id,"عزيزي تم حفظ رابط القناة الان عليك رفعي ادمن في لقناة 📦.","markdown",True,null,$message_id);
unset($com[$chat_id]["com"]);
SaveJson("data/bot/com.json",$com);
}elseif(!preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text)){
SendMsg($chat_id,"ملاحظة ارسل الروابط فقط من فضلك 🎑.","markdown",True,json_encode(['inline_keyboard' => [ [['text'=>"الغاء الامر ⬅.",'callback_data' =>"rm"]]]]),$message_id);
}
}
}

if($from_id == $dev or $aloo == "administrator" or $aloo == "creator"){
if($text == "تعطيل البوت" or $text == "مسح القناة"){
SendMsg($chat_id,"تم تعطيل البوت و حذف القنوات الاشتراك 🌀.",null,True,null,null);
file_put_contents("data/bot/l$chat_id.txt","");
file_put_contents("data/bot/d$chat_id.txt","");
file_put_contents("data/bot/u$chat_id.txt","");
}
}
if($text && $type == "private"){
if(!in_array($from_id, $private["private"])){
$private['private'][] = "$from_id";
SaveJson("data/bot/private.json",$private);
}
}
if($text && $type == "supergroup" || $type == "group"){
if(!in_array($chat_id, $private["group"])){
$private['group'][] = "$chat_id";
SaveJson("data/bot/private.json",$private);
}
}
if(!preg_match('/^(.*)([Hh]ttp|[Hh]ttps|t.me)(.*)|([Hh]ttp|[Hh]ttps|t.me)(.*)|(.*)([Hh]ttp|[Hh]ttps|t.me)|(.*)[Tt]elegram.me(.*)|[Tt]elegram.me(.*)|(.*)[Tt]elegram.me|(.*)[Tt].me(.*)|[Tt].me(.*)|(.*)[Tt].me/',$text)){
if(preg_match('/^(@)(.*)/s',$text) or preg_match('/^- *.|([0-9])/',$text)){
if($type == "supergroup" || $type == "group"){
$user_id = GetChat($text)->result->id;
if(!in_array($user_id, $private["channel"])){
$private['channel'][] = "$user_id";
SaveJson("data/bot/private.json",$private);
}
}
}
}
$panel = json_encode(['keyboard'=>[
[['text'=>"- اذاعه للكل ، 🌈"]],
[['text'=>"- اذاعّه خاّص ،💞"],['text'=>"- اذاعّه للقروبات ، 🌤 "]],
[['text'=>"- اذاعّه للقنوات ، 𐂂"]],
[['text'=>"- تصفيّه الاعضاء ، 🌻 "],['text'=>"- تصفيّه المجموعات ، 🇬🇵 "]],
[['text'=>"- احصائيات البوت ، 🌱"]],
]]);
if($text == "/start" && $from_id == $dev){
SendMsg($chat_id,"مرحبا بك عزيزي المطور اختر من الكيبورد الخاص فيك .","MARKDOWN",true,$panel,$message_id);
}

#filter_member
if($text == "- تصفيّه الاعضاء ، 🌻" and $from_id == $dev){
$inf = "*- يقوم البوت الان بعمل تصفيه للاعضاء عند الانتهاء سيتم تبليغك بذلك .*";
SendMsg($chat_id,$inf,"markdown",true,null,$message_id);
foreach($private["private"] as $memberid){ 
$action = SendChatAction($memberid,"typing")->ok;
if($action != true){
$search = array_search($memberid,$private["private"]);
unset($private["private"][$search]);
$private["private"]= array_values($private["private"]); 
SaveJson("data/bot/private.json",$private);
}
}
$inf = "*- تمت عمليه تصفيه الاعضاء الحساباتهم محذوفه او من حظر البوت .*";
SendMsg($chat_id,$inf,"MARKDOWN",true,null,$message_id);
}

# filter_group
if($text == "- تصفيّه المجموعات ، 🇬🇵" and $from_id == $dev){
$inf = "*- يقوم البوت الان بعمل تصفيه للمجموعات عند الانتهاء سيتم تبليغك بذلك .*";
SendMsg($chat_id,$inf,"markdown",true,null,$message_id);
foreach($private["group"] as $groupid){ 
$action = SendChatAction($groupid,"typing")->ok;
if($action != true){
$search = array_search($groupid,$private["group"]);
unset($private["group"][$search]);
$private["group"] = array_values($private["group"]); 
SaveJson("data/bot/private.json",$private);
}
}
$inf = "*- تمت عمليه تصفيه المجموعات المحذوفه او من المجموعات التي حظرت البوت .*";
SendMsg($chat_id,$inf,"MARKDOWN",true,null,$message_id);
}

 # info
$Members  = count($private["private"]);
$Groups = count($private["group"]);
$Channel = count($private["channel"]);
if($text == "- احصائيات البوت ، 🌱"  and $from_id == $dev){
$inf = "- اليكّ المعلومات العامه حول عدد الاعضاء :"."\n"."- *عدد المجموعات '$Groups'*"."\n"."- *عدد الاعضاء '$Members'*"."\n"."*عدد القنوات '$Channel'*.";
SendMsg($chat_id,$inf,"markdown",true,null,$message_id);
} 
$broadcast = json_decode(file_get_contents('data/bot/broadcast.json'),true);
if($text == "- اذاعّه خاّص ،💞" and $from_id == $dev){
SendMsg($chat_id,"ارسل رسالتك عزيزي المطور للاذاعه   الى جميع الاعضاء.","markdown",true,null,$message_id);
$broadcast["bc"] = "bcm";
SaveJson("data/bot/broadcast.json",$broadcast);
}
if($broadcast["bc"] == "bcm" and $from_id == $dev and $text != "- اذاعّه خاّص ،💞" and $text != "/start"){
foreach($private["private"] as $bc => $member){
SendMsg($member,$text,null,True,null,null);
unset($broadcast["bc"]);
SaveJson("data/bot/broadcast.json",$broadcast);
}
SendMsg($chat_id,"تم الاذاعه للكل عزيزي.",null,True,$back,$message_id);
}
if($text == "- اذاعّه للقروبات ، 🌤" and $from_id == $dev){
EditMsg($chat_id,$message_id,"ارسل رسالتك عزيزي المطور لكي اقوم بلاذاعه الى جميع المجموعات.","markdown",True,$back);
$broadcast["bc"] = "bcg";
SaveJson("data/bot/broadcast.json",$broadcast);
}
if($broadcast["bc"] == "bcg" and $from_id == $dev and $text != "- اذاعّه للقروبات ، 🌤" and $text != "/start"){
foreach($private["group"] as $bc => $group){
SendMsg($group,$text,null,True,null,null);
unset($broadcast["bc"]);
SaveJson("data/bot/broadcast.json",$broadcast);
}
SendMsg($chat_id,"تم الاذاعه  للكل عزيزي.",null,True,null,$message_id);
}
if($text == "- اذاعّه للقنوات ، 𐂂" and $from_id == $dev and $text != "- اذاعّه للقنوات ، 𐂂"){
SendMsg($chat_id,"ارسل رسالتك عزيزي المطور لكي اقوم بالاذاعه الى جميع القنوات.","markdown",true,null,$message_id);
$broadcast["bc"] = "bcc";
SaveJson("data/bot/broadcast.json",$broadcast);
}
if($broadcast["bc"] == "bcc" and $from_id == $dev and $text != "- اذاعّه للقنوات ، 𐂂" and $text != "/start"){
foreach($private["channel"] as $bc => $channel){
SendMsg($channel,$text,null,True,null,null);
unset($broadcast["bc"]);
SaveJson("data/bot/broadcast.json",$broadcast);
}
SendMsg($chat_id,"تم ارسال الاذاعه لكل القنوات  عزيزي.",null,True,$back,$message_id);
}
if($text == "- اذاعه للكل ، 🌈" and $from_id == $dev){
SendMsg($chat_id,"ارسل رسالتك عزيزي المطور لكي اقوم بالاذاعه الى آلجميع ، القنوات ، القروبات ، الاعضاء.","markdown",true,null,$message_id);
$broadcast["bc"] = "bcall";
SaveJson("data/bot/broadcast.json",$broadcast);
}
if($broadcast["bc"] == "bcall" and $from_id == $dev and $text != "- اذاعه للكل ، 🌈" and $text != "/start"){
foreach($private["private"] as $bc => $member){
SendMsg($member,$text,null,True,null,null);
}
foreach($private["group"] as $bc => $group){
SendMsg($group,$text,null,True,null,null);
}
foreach($private["channel"] as $bc => $channel){
SendMsg($channel,$text,null,True,null,null);
unset($broadcast["bc"]);
SaveJson("data/bot/broadcast.json",$broadcast);
}
SendMsg($chat_id,"تم ارسال الاذاعه لكل عزيزي.",null,True,$back,$message_id);
}

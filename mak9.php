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

#زخرفة

if($start=="non"){
$start="-• اهلآ بك ، $name
في بوت الزخرفه المتميز جدا 🎓.
الان يمكنك وبكل سهوله زخرفه جميع الاسماء 📛.
وجميع الانواع نازوكه و جميله يوجد في البوت ❲ 30 ❳ زخرفه مختلفه وجميله 📯. ";

}

$trjson = json_decode(file_get_contents("data/tr.json"),true);
if (!file_exists("data/tr.json")) {
	$put = [];
	file_put_contents("data/tr.json", json_encode($put));
}

if($text ==  '/start'){
mkdir("data/zkref");
mkdir("data/mroan941");
mkdir("data/zkref/$from_id");
mkdir("data/mroan941/$from_id");
bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>"$start
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎

",
 'parse_mode'=>"html",
'reply_to_message_id'=>$message->message_id,
'disable_web_page_preview'=> true ,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- زخرفك اسمك 🎯", 'callback_data'=>'ZREF']],
[['text'=>"-صنع بايو انستقرام📌", 'callback_data'=>'bio']],
]
])]);
}

if($data == "ZREF"){
file_put_contents("data/zkref/$from_id/zeakef.txt","MROAN0");
bot('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id,
'text'=>'- حسناً ، الآن قم بإرسال اسمك  📝',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"hoome"]],
]])
]);
}
$insta= file_get_contents("data/mroan941/$from_id/inasgram.txt");
if($data == "bio"){
mkdir("data/zkref/$from_id");
file_put_contents("data/mroan941/$from_id/inasgram.txt","MROAN0");
bot('editMessageText',[
 'chat_id'=>$chat_id,
 'message_id'=>$message_id,
'text'=>'-حسنا ،الان قم بارسال  النص المراد تحويله الى بايو🎁',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"hoome"]],
]])
]);
}






$bio = array("❥•َ⚡️͢ֆ⸽
⠀

            ‏ＢΔ S R A ┆17 Y.O ↴   
  ﴿ ‏ ‏ $text 💛ء","⠀
⠀
⠀



⠀                  I R A Q ┆19 Y.O ↴    
        ﴿ $text ️. 💛۽
⠀
⠀
⠀",

"⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀
⠀⠀⠀⠀⠀⠀
⠀⠀⠀ ⠀⠀
⠀ ⠀⠀⠀⠀- ᗩGE : 17 Y.O
$text ً.  💛 
⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀
⠀⠀⠀⠀",
"⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀
⠀⠀⠀⠀⠀⠀
⠀⠀⠀ ⠀⠀
⠀ ⠀⠀⠀⠀- ᗩGE : 17 Y.O
$text ً.  💛 
⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀
⠀⠀⠀⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀
⠀
⠀
⠀
$text . 🥀  
⠀⠀⠀⠀- Unfollow Block ♚ֆ 〞 
⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀
‏‏‏$text 🖤ء
⠀⠀⠀⠀⠀✗ ᗩGE┊19 ✿‏ֆ
 ⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"⠀⠀


⠀⠀
$text 🥀 🚬 
⠀  ⠀   ғollow мe , ғollow вacĸ⠀⠀
⠀⠀⠀⠀⠀⠀┄༻☹️༺┄⠀
⠀⠀⠀⠀⠀ㅤ⠀‏ ‏⠀⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀
- ‏$text ☻. 
⠀⠀⠀⠀⠀- 🇮🇶|| 19 Y.O ❞
 ⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"⠀
⠀
⠀



⠀            ‏ＢΔ S R A ┆17 Y.O ↴    
🖤. $text
⠀
⠀
⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀⠀⠀⠀⠀⠀✗ IR‏ΔQ ˛⁽💛₎⇣    
﴿ ‏‏$text . 🖤‏ء
⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
     ﴿‏ ‏$text🤦🏽‍♀️ً ٰ. 
⠀⠀⠀⠀⠀⠀  𖤍 BASRA - iQ ‏
⠀‎
⠀‎
⠀
⠀‎
",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀
   ‏‏‏$text 🖤ء
⠀⠀⠀⠀⠀✗ ᗩGE┊19 ✿‏ֆ
 ⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀ ֆ ⁽ ♥ ⁾↵
               

 ⠀          ‹ 🇮🇶 ³¹³ BAGHDAD ›⠀⠀
$text! 🤷🏽‍♀️
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀
⠀",

"⠀⠀
‏⠀
‏⠀
‏⠀
⠀
⠀⠀⠀⠀⠀
⠀  ⠀⠀                      
⠀⠀⠀⠀•┆BΔGHDΔD 🇮🇶 ‏ֆ 
‏$text 🖤‏.
⠀⠀⠀⠀⠀⠀⠀
‏⠀
⠀
⠀
⠀",

"⠀
⠀
⠀



⠀⠀⠀⠀⠀⠀IRΔQ┆19 Y.O ↴    
⠀
   ﴿ $text 💚.
⠀
⠀
⠀
⠀",

"⠀
⠀
⠀



⠀                  Baghdad ┆15 Y.O ↴    
  ﴿ ‏$text 🖤.
⠀
⠀
⠀",

"⠀
⠀
⠀ 

⠀
⠀
    
 ‏$text  🖤»
 ⠀⠀     ⠀- Bagdad 19Y.O♚ֆ 
⠀

⠀ ⠀
⠀ ⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀          ⠀⠀➝ IR‏ΔQ ˛⁽ 💙 ₎⇣    
⠀⠀⠀⠀
‏$text 💔.
    ⠀
⠀⠀⠀⠀
⠀
⠀",

"⠀
‏⠀


⠀
⠀ 
⠀⠀⠀⠀⠀❥⁽ AGE┊9 ♚ )
⠀
﴿ $text ❤️.

⠀


⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀♛ | ؁ ➝🇮🇶
﴿ •  $text 🖤 ֆء
⠀♛ | OFFICIAL ACCOANT
⠀
⠀
⠀
⠀",

"⠀ 
⠀                  ⠀      ↓ ❛
⠀
⠀    ⠀              ﴾   ⠀ ⠀ 
⠀       ♩❥ $text ﴿⠀ ⠀ 
⠀       welcome to my profile 
⠀ 
⠀
⠀⠀⠀",

"⠀⠀


⠀⠀‏“🥀 $text “
   ⠀  ғollow мe , ғollow вacĸ⠀⠀
⠀⠀⠀⠀⠀┄༻☹️༺┄⠀
⠀⠀⠀⠀⠀ㅤ⠀
‏
",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀⠀♛ | ؁ ➝🇮🇶‏
♥️ $text ♯
⠀⠀⠀♛ | OFFICIAL ACCOANT
⠀
⠀
⠀
⠀",

"⠀ㅤ
ㅤ 
⠀⠀ ㅤ 


⠀ ⠀⠀ ㅤ ㅤ ⠀ㅤ ㅤ ؁ ➝🇮🇶   
$text
⠀ㅤ ✿ωєℓ¢σм тσσмуρяσfιℓє✿

‏⠀⠀⠀
⠀
ㅤ ㅤ 
⠀⠀⠀⠀⠀",

"
⠀
⠀
⠀⠀⠀ ⠀ ⠀⠀⠀⠀⠀⠀⠀↴⠀
⠀⠀❞ᗷᗩS3RAY 🇮🇶|| 21 Y.O ❞
$text
‏﴿ 🌞💧 ﴾

⠀ ⠀⠀ 
⠀⠀",

"⠀
⠀

⠀⠀
⠀
⠀⠀⠀⠀⠀⠀  ⠀┄༻💠༺┄⠀                      
 ﴿ $text ❤️ء  ﴾ 
⠀‏⠀ ⠀ᎳᎬᏞᏟᎾm TO ṃʏ ƿяȏғıʟ
⠀⠀⠀⠀⠀⠀⠀┄༻💠༺┄
⠀
⠀
⠀
⠀",

"⠀‏⠀

⠀‏⠀⠀⠀⠀⠀ ⠀❥ ⁞ ؁  ֆء
‏﴿ $text  ..؟⠀
⠀ ⠀⠀⠀‏⠀ᴡᴇʟᴄᴏᴍ ᴛᴏ ᴍʏ ᴘʀᴏғɪʟ⠀
⠀
⠀
⠀",

"⠀
⠀⠀
⠀⠀
⠀⠀ ⠀ ⠀⠀ ⠀⠀◂◂⠀⠀⠀▮▮⠀⠀⠀▸▸
⠀ ⠀⠀ ⠀ ⠀  |◂ ▬▬▬▬●▬▬ ◂|
⠀ ⠀⠀ ⠀   ➰ $text ➰ 
 ⠀ ❈⁽ From : IRΔQ➢ＢΔＧḤＤΔＤ ❉
⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀❶❽ Ꭹ.Ꭷ
⠀⠀⠀⠀⠀⠀⠀❖┊ᖴᖇOᗰ ᗷᗩᔕᖇᗩ
‏⠀$text ✘✋🏻 ⠀⠀⠀
⠀⠀⠀⠀↬ ❈⁽ шεᴌcσмε тσ мч вяσғ ❁
⠀
⠀
⠀
⠀",

"‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀ ❈ ⁽💛 ✿ ₎❈↴
‏⠀

﴿   $text ❤️
‏⠀‏ ⠀ᎳᎬᏞᏟᎾm TO ṃʏ ƿяȏғıʟ⠀
⠀⠀⠀⠀
‏⠀
‏⠀
‏⠀
⠀",

"⠀⠀


⠀⠀
$text 😴🎷
     ғollow мe , ғollow вacĸ⠀⠀
⠀⠀⠀⠀┄༻☹️༺┄⠀
⠀⠀⠀⠀⠀ㅤ⠀
‏
‏ ‏⠀⠀ 

      ⠀⠀⠀⠀⠀     ⠀⠀⠀⠀⠀⠀",

"⠀ ⠀ ⠀
⠀ ⠀ ⠀

‏⠀⠀ ⠀
⠀  ⠀❆ＩＱ › ＢΔＧḤＤΔＤ ❉‏⠀
‏‏⠀($text ֆ ☺️!)
              ※•┈•ʚ♚ɞ•┈‏​•※
⠀ ⠀ ⠀
⠀ ⠀ ⠀
⠀ ⠀ ⠀
⠀ ⠀ ⠀",

"‏⠀
‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀⠀ ✿┊Y.O:19  ֆ 
$text 💔ء﴾
‏⠀⠀‏⠀⠀⠀┈┉━❀🚶🏻❀━┅┄⠀
‏⠀
‏⠀
",
"⠀
⠀
⠀
⠀
⠀⠀⠀          ⠀⠀➝ IR‏ΔQ ˛⁽ 💙 ₎⇣    
⠀⠀⠀⠀
 $text 💚۽
    ⠀
⠀⠀⠀⠀
⠀
⠀",

"⠀

⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⠀♛؁17♛
⠀⠀⠀⠀⠀﴾ IQ ﴿ ��🇶  ❥ᗷᗩᔕᖇᗩ⠀
“ $text 🏃
⠀⠀
⠀
⠀
⠀",

"‏⠀
‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀⠀ ✿┊Y.O:19  ֆ 
⠀  ⠀❆ＩＱ › ＢΔＧḤＤΔＤ ❉‏⠀
$text ؟❤️﴾
‏⠀⠀‏⠀⠀⠀┈┉━❀🚶🏻❀━┉┄⠀
‏⠀
‏⠀
",
"⠀
⠀
⠀
⠀
⠀⠀⠀ ⠀⠀➝ IR‏ΔQ ˛⁽ ♥ ₎⇣  
⠀⠀⠀⠀
⠀⠀ $text ⁽✺⃕₎ 
↬  ❈⁽ шεʟcσмε тσ мч вяσғ ❁
‏⠀⠀⠀⠀┄༻💗༺┄       ⠀
⠀⠀⠀⠀
⠀
⠀
⠀",

"⠀
⠀

⠀
⠀
⠀⠀⠀⠀⠀⠀⠀◂◄⠀⠀▮▮⠀⠀▸►
⠀⠀⠀◂⠀━━━━❊━━━━⠀▸
$text ء.
  
⠀
⠀
⠀
⠀",

"⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀
⠀⠀⠀⠀⠀⠀
⠀⠀⠀ ⠀⠀
⠀ ⠀⠀⠀        ⠀- ᗩGE : 17 Y.O

$text
؛❤
‏
⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀",

"‎‏ㅤ
‎‏⠀⠀⠀‏ㅤ⠀⠀⠀
‎‏ㅤ
⠀‏
‎‏ㅤ⠀⠀ ⠀     ⠀ ➝ Y.O:18 ֆ 💭  

 $text 🌸₎
‎‏ㅤ
‎‏ㅤ
‎‏ㅤ⠀⠀⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀
⠀
⠀
⠀
$text . 🥀  
⠀⠀⠀⠀- Unfollow Block ♚ֆ 〞 
⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀
‏‏‏$text 🖤ء
⠀⠀⠀⠀⠀✗ ᗩGE┊19 ✿‏ֆ
 ⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"⠀⠀


⠀⠀
$text 🥀 🚬 
⠀  ⠀   ғollow мe , ғollow вacĸ⠀⠀
⠀⠀⠀⠀⠀⠀┄༻☹️༺┄⠀
⠀⠀⠀⠀⠀ㅤ⠀‏ ‏⠀⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀
- ‏$text ☻. 
⠀⠀⠀⠀⠀- 🇮🇶|| 19 Y.O ❞
 ⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"⠀
⠀
⠀



⠀            ‏ＢΔ S R A ┆17 Y.O ↴    
🖤. $text
⠀
⠀
⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀⠀⠀⠀⠀⠀✗ IR‏ΔQ ˛⁽💛₎⇣    
﴿ ‏‏$text . 🖤‏ء
⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
     ﴿‏ ‏$text🤦🏽‍♀️ً ٰ. 
⠀⠀⠀⠀⠀⠀  𖤍 BASRA - iQ ‏
⠀‎
⠀‎
⠀
⠀‎
",

"‎‏⠀
‎‏⠀
‏⠀

⠀⠀

⠀
⠀
   ‏‏‏$text 🖤ء
⠀⠀⠀⠀⠀✗ ᗩGE┊19 ✿‏ֆ
 ⠀
⠀
⠀‎
‏⠀⠀⠀
‎‏⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀ ֆ ⁽ ♥ ⁾↵
               

 ⠀          ‹ 🇮🇶 ³¹³ BAGHDAD ›⠀⠀
$text! 🤷🏽‍♀️
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀
⠀",

"⠀⠀
‏⠀
‏⠀
‏⠀
⠀
⠀⠀⠀⠀⠀
⠀  ⠀⠀                      
⠀⠀⠀⠀•┆BΔGHDΔD 🇮🇶 ‏ֆ 
‏$text 🖤‏.
⠀⠀⠀⠀⠀⠀⠀
‏⠀
⠀
⠀
⠀",

"⠀
⠀
⠀



⠀⠀⠀⠀⠀⠀IRΔQ┆19 Y.O ↴    
⠀
   ﴿ $text 💚.
⠀
⠀
⠀
⠀",

"⠀
⠀
⠀



⠀                  Baghdad ┆15 Y.O ↴    
  ﴿ ‏$text 🖤.
⠀
⠀
⠀",

"⠀
⠀
⠀ 

⠀
⠀
    
 ‏$text  🖤»
 ⠀⠀     ⠀- Bagdad 19Y.O♚ֆ 
⠀

⠀ ⠀
⠀ ⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀          ⠀⠀➝ IR‏ΔQ ˛⁽ 💙 ₎⇣    
⠀⠀⠀⠀
‏$text 💔.
    ⠀
⠀⠀⠀⠀
⠀
⠀",

"⠀
‏⠀


⠀
⠀ 
⠀⠀⠀⠀⠀❥⁽ AGE┊9 ♚ )
⠀
﴿ $text ❤️.

⠀


⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀♛ | ؁ ➝🇮🇶
﴿ •  $text 🖤 ֆء
⠀♛ | OFFICIAL ACCOANT
⠀
⠀
⠀
⠀",

"⠀ 
⠀                  ⠀      ↓ ❛
⠀
⠀    ⠀              ﴾   ⠀ ⠀ 
⠀       ♩❥ $text ﴿⠀ ⠀ 
⠀       welcome to my profile 
⠀ 
⠀
⠀⠀⠀",

"⠀⠀


⠀⠀‏“🥀 $text “
   ⠀  ғollow мe , ғollow вacĸ⠀⠀
⠀⠀⠀⠀⠀┄༻☹️༺┄⠀
⠀⠀⠀⠀⠀ㅤ⠀
‏
",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀⠀♛ | ؁ ➝🇮🇶‏
♥️ $text ♯
⠀⠀⠀♛ | OFFICIAL ACCOANT
⠀
⠀
⠀
⠀",

"⠀ㅤ
ㅤ 
⠀⠀ ㅤ 


⠀ ⠀⠀ ㅤ ㅤ ⠀ㅤ ㅤ ؁ ➝🇮🇶   
$text
⠀ㅤ ✿ωєℓ¢σм тσσмуρяσfιℓє✿

‏⠀⠀⠀
⠀
ㅤ ㅤ 
⠀⠀⠀⠀⠀",

"
⠀
⠀
⠀⠀⠀ ⠀ ⠀⠀⠀⠀⠀⠀⠀↴⠀
⠀⠀❞ᗷᗩS3RAY 🇮🇶|| 21 Y.O ❞
$text
‏﴿ 🌞💧 ﴾

⠀ ⠀⠀ 
⠀⠀",

"⠀
⠀

⠀⠀
⠀
⠀⠀⠀⠀⠀⠀  ⠀┄༻💠༺┄⠀                      
 ﴿ $text ❤️ء  ﴾ 
⠀‏⠀ ⠀ᎳᎬᏞᏟᎾm TO ṃʏ ƿяȏғıʟ
⠀⠀⠀⠀⠀⠀⠀┄༻💠༺┄
⠀
⠀
⠀
⠀",

"⠀‏⠀

⠀‏⠀⠀⠀⠀⠀ ⠀❥ ⁞ ؁  ֆء
‏﴿ $text  ..؟⠀
⠀ ⠀⠀⠀‏⠀ᴡᴇʟᴄᴏᴍ ᴛᴏ ᴍʏ ᴘʀᴏғɪʟ⠀
⠀
⠀
⠀",

"⠀
⠀⠀
⠀⠀
⠀⠀ ⠀ ⠀⠀ ⠀⠀◂◂⠀⠀⠀▮▮⠀⠀⠀▸▸
⠀ ⠀⠀ ⠀ ⠀  |◂ ▬▬▬▬●▬▬ ◂|
⠀ ⠀⠀ ⠀   ➰ $text ➰ 
 ⠀ ❈⁽ From : IRΔQ➢ＢΔＧḤＤΔＤ ❉
⠀",

"⠀
⠀
⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀❶❽ Ꭹ.Ꭷ
⠀⠀⠀⠀⠀⠀⠀❖┊ᖴᖇOᗰ ᗷᗩᔕᖇᗩ
‏⠀$text ✘✋🏻 ⠀⠀⠀
⠀⠀⠀⠀↬ ❈⁽ шεᴌcσмε тσ мч вяσғ ❁
⠀
⠀
⠀
⠀",

"‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀ ❈ ⁽💛 ✿ ₎❈↴
‏⠀

﴿   $text ❤️
‏⠀‏ ⠀ᎳᎬᏞᏟᎾm TO ṃʏ ƿяȏғıʟ⠀
⠀⠀⠀⠀
‏⠀
‏⠀
‏⠀
⠀",

"⠀⠀


⠀⠀
$text 😴🎷
     ғollow мe , ғollow вacĸ⠀⠀
⠀⠀⠀⠀┄༻☹️༺┄⠀
⠀⠀⠀⠀⠀ㅤ⠀
‏
‏ ‏⠀⠀ 

      ⠀⠀⠀⠀⠀     ⠀⠀⠀⠀⠀⠀",

"⠀ ⠀ ⠀
⠀ ⠀ ⠀

‏⠀⠀ ⠀
⠀  ⠀❆ＩＱ › ＢΔＧḤＤΔＤ ❉‏⠀
‏‏⠀($text ֆ ☺️!)
              ※•┈•ʚ♚ɞ•┈‏​•※
⠀ ⠀ ⠀
⠀ ⠀ ⠀
⠀ ⠀ ⠀
⠀ ⠀ ⠀",

"‏⠀
‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀⠀ ✿┊Y.O:19  ֆ 
$text 💔ء﴾
‏⠀⠀‏⠀⠀⠀┈┉━❀🚶🏻❀━┅┄⠀
‏⠀
‏⠀
",
"⠀
⠀
⠀
⠀
⠀⠀⠀          ⠀⠀➝ IR‏ΔQ ˛⁽ 💙 ₎⇣    
⠀⠀⠀⠀
 $text 💚۽
    ⠀
⠀⠀⠀⠀
⠀
⠀",

"⠀

⠀
⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⠀♛؁17♛
⠀⠀⠀⠀⠀﴾ IQ ﴿ ��🇶  ❥ᗷᗩᔕᖇᗩ⠀
“ $text 🏃
⠀⠀
⠀
⠀
⠀",

"‏⠀
‏⠀
‏⠀
‏⠀
‏⠀
⠀⠀⠀⠀⠀⠀ ✿┊Y.O:19  ֆ 
⠀  ⠀❆ＩＱ › ＢΔＧḤＤΔＤ ❉‏⠀
$text ؟❤️﴾
‏⠀⠀‏⠀⠀⠀┈┉━❀🚶🏻❀━┉┄⠀
‏⠀
‏⠀
",
"⠀
⠀
⠀
⠀
⠀⠀⠀ ⠀⠀➝ IR‏ΔQ ˛⁽ ♥ ₎⇣  
⠀⠀⠀⠀
⠀⠀ $text ⁽✺⃕₎ 
↬  ❈⁽ шεʟcσмε тσ мч вяσғ ❁
‏⠀⠀⠀⠀┄༻💗༺┄       ⠀
⠀⠀⠀⠀
⠀
⠀
⠀",

"⠀
⠀

⠀
⠀
⠀⠀⠀⠀⠀⠀⠀◂◄⠀⠀▮▮⠀⠀▸►
⠀⠀⠀◂⠀━━━━❊━━━━⠀▸
$text ء.
  
⠀
⠀
⠀
⠀",

"⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀
⠀⠀⠀⠀⠀⠀
⠀⠀⠀ ⠀⠀
⠀ ⠀⠀⠀        ⠀- ᗩGE : 17 Y.O

$text
؛❤
‏
⠀ ⠀⠀⠀ ⠀⠀⠀ 
⠀⠀",

"‎‏ㅤ
‎‏⠀⠀⠀‏ㅤ⠀⠀⠀
‎‏ㅤ
⠀‏
‎‏ㅤ⠀⠀ ⠀     ⠀ ➝ Y.O:18 ֆ 💭  

 $text 🌸₎
‎‏ㅤ
‎‏ㅤ
‎‏ㅤ⠀⠀⠀",);

$bior = array_rand($bio, 1);
if($text and $insta=="MROAN0"){
bot('sendMessage',[
'chat_id'=>$chat_id,
 'parse_mode'=>"Markdown",
'text'=>"`
$bio[$bior]`",
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'صنع بايو مختلف🔰🔁' ,'callback_data'=>"bio"]],
[['text'=>'🔙' ,'callback_data'=>"hoome"]],
]])
]);
unlink("data/mroan941/$from_id/inasgram.txt");
}

/*$zeztf= file_get_contents("data/zkref/$from_id/zeakef.txt");*/

if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
$A = str_replace('a','🅐',$A); 
$A = str_replace("b","🅑",$A); 
$A = str_replace("c","🅒",$A); 
$A = str_replace("d","🅓",$A); 
$A = str_replace("e","🅔",$A); 
$A = str_replace("f","🅕",$A); 
$A = str_replace("g","🅖",$A); 
$A = str_replace("h","🅗",$A); 
$A = str_replace("i","🅘",$A); 
$A = str_replace("j","🅙",$A); 
$A = str_replace("k","🅚",$A); 
$A = str_replace("l","🅛",$A); 
$A = str_replace("m","🅜",$A); 
$A = str_replace("n","🅝",$A); 
$A = str_replace("o","🅞",$A); 
$A = str_replace("p","🅟",$A); 
$A = str_replace("q","🅠",$A); 
$A = str_replace("r","🅡",$A); 
$A = str_replace("s","🅢",$A); 
$A = str_replace("t","🅣",$A); 
$A = str_replace("u"," 🅤",$A); 
$A = str_replace("v","🅥",$A); 
$A = str_replace("w","🅦",$A); 
$A = str_replace("x","🅧",$A); 
$A = str_replace("y","🅨",$A); 
$A = str_replace("z","🅩",$A); 
 
$A = str_replace('ض','ضً',$A); 
$A = str_replace('ص','صً',$A); 
$A = str_replace('ث','ثہ',$A); 
$A = str_replace('ق','قہً',$A); 
$A = str_replace('ف','فُہ',$A); 
$A = str_replace('غ','غہ',$A); 
$A = str_replace('ع','عہُ',$A); 
$A = str_replace('ه','ه',$A); 
$A = str_replace('خ','خہ',$A); 
$A = str_replace('ح','حہ',$A); 
$A = str_replace('ج','جہ',$A); 
$A = str_replace('ش','شہ',$A); 
$A = str_replace('س','سہ',$A); 
$A = str_replace('ي','يہ',$A); 
$A = str_replace('ب',' ٻً',$A);
$A = str_replace('ل','لہ',$A); 
$A = str_replace('ا',' ٳ',$A); 
$A = str_replace('ت','تہ',$A); 
$A = str_replace('ن','نٍ',$A); 
$A = str_replace('ك','كُہ',$A); 
$A = str_replace('م','مْ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظً',$A); 
$A = str_replace('ط','طہ',$A); 
 $A = str_replace('ذ','ذً',$A); 
$A = str_replace('د','دِ',$A); 
$A = str_replace('ز','زً',$A); 
$A = str_replace('ر','ڒٍ',$A); 
$A = str_replace('و','وٌ',$A); 
 $A = str_replace('ى','ىّ',$A);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }

if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
$A = str_replace('a','𝗔',$A); 
$A = str_replace("b","𝗕",$A); 
$A = str_replace("c","𝗖",$A); 
$A = str_replace("d","𝗗",$A); 
$A = str_replace("e","𝗘",$A); 
$A = str_replace("f","𝗙",$A); 
$A = str_replace("g","𝗚",$A); 
$A = str_replace("h","𝗛",$A); 
$A = str_replace("i","𝗜",$A); 
$A = str_replace("j","𝗝",$A); 
$A = str_replace("k","𝗞",$A); 
$A = str_replace("l","𝗟",$A); 
$A = str_replace("m","𝗠",$A); 
$A = str_replace("n","𝗡",$A); 
$A = str_replace("o","𝗢",$A); 
$A = str_replace("p","𝗣",$A); 
$A = str_replace("q","𝗤",$A); 
$A = str_replace("r","𝗥",$A); 
$A = str_replace("s","𝗦",$A); 
$A = str_replace("t","𝗧",$A); 
$A = str_replace("u","𝗨",$A); 
$A = str_replace("v","𝗩",$A); 
$A = str_replace("w","𝗪",$A); 
$A = str_replace("x","𝗫",$A); 
$A = str_replace("y","𝗬",$A); 
$A = str_replace("z","𝗭",$A); 
      
$A = str_replace('ض','ضـٰ̲ـہ',$A); 
$A = str_replace('ص','صـٰ̲ـہ',$A); 
$A = str_replace('ث','ثـٰ̲ـہ',$A); 
$A = str_replace('ق','قـٰ̲ـہ',$A); 
$A = str_replace('ف','فـٰ̲ـہ',$A); 
$A = str_replace('غ','غـٰ̲ـہ',$A); 
$A = str_replace('ع','عـٰ̲ـہ',$A); 
$A = str_replace('ه','هـٰ̲ـہ',$A); 
$A = str_replace('خ','خـٰ̲ـہ',$A); 
$A = str_replace('ح','حـٰ̲ـہ',$A); 
$A = str_replace('ج','جـٰ̲ـہ',$A); 
$A = str_replace('ش','شـٰ̲ـہ',$A); 
$A = str_replace('س','سـٰ̲ـہ',$A); 
$A = str_replace('ي','يـٰ̲ـہ',$A); 
$A = str_replace('ب','بـٰ̲ـہ',$A);
$A = str_replace('ل','لـٰ̲ـہ',$A); 
$A = str_replace('ا','اٰ',$A); 
$A = str_replace('ت','تـٰ̲ـہ',$A); 
$A = str_replace('ن','نـٰ̲ـہ',$A); 
$A = str_replace('م','مـٰ̲ـہ',$A); 
$A = str_replace('ك','كـٰ̲ـہ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظـٰ̲ـہ',$A); 
$A = str_replace('ط','طـٰ̲ـہ',$A); 
$A = str_replace('ذ','ذٰ',$A); 
$A = str_replace('د','دٰ',$A); 
$A = str_replace('ز','زٰ',$A); 
$A = str_replace('ر','رٰ',$A); 
$A = str_replace('و','وٰ',$A); 
$A = str_replace('ى','ىَ',$A); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
}
 

if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = str_replace('a','🅰',$text); 
$A = str_replace('b','🅱',$A); 
$A = str_replace('c','🅲',$A); 
$A = str_replace('d','🅳',$A); 
$A = str_replace('e','🅴',$A); 
$A = str_replace('f','🅵',$A); 
$A = str_replace('g','🅶',$A); 
$A = str_replace('h','🅷',$A); 
$A = str_replace('i','🅸',$A); 
$A = str_replace('j','🅹',$A); 
$A = str_replace('k','🅺',$A); 
$A = str_replace('l','🅻',$A); 
$A = str_replace('m','🅼',$A); 
$A = str_replace('n','🅽',$A); 
$A = str_replace('o','🅾',$A); 
$A = str_replace('p','🅿',$A); 
$A = str_replace('q','🆀',$A); 
$A = str_replace('r','🆁',$A); 
$A = str_replace('s','🆂',$A); 
$A = str_replace('t','🆃',$A); 
$A = str_replace('u',' 🆄',$A); 
$A = str_replace('v','🆅',$A); 
$A = str_replace('w','🆆',$A); 
$A = str_replace('x','🆇',$A); 
$A = str_replace('y','🆈',$A); 
$A = str_replace('z','🆉',$A); 
 
$A = str_replace('ض','ضـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ص','صـ๋͜‏ـﮧ',$A); 
$A = str_replace('ث','ثـ๋͜‏ـﮧ',$A); 
$A = str_replace('ق','قـ๋͜‏ـﮧ',$A); 
$A = str_replace('ف','ف͒ـ๋͜‏ـﮧ',$A); 
$A = str_replace('غ','غـ๋͜‏ـﮧ',$A); 
$A = str_replace('ع','عـ๋͜‏ـﮧ',$A); 
$A = str_replace('ه','ۿۿہ',$A); 
$A = str_replace('خ','خ̐ـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ح','حـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ج','جـ๋͜‏ـﮧ ',$A); 
$A = str_replace('ش','شـ๋͜‏ـﮧ ',$A); 
$A = str_replace('س','سـ๋͜‏ـﮧ',$A); 
$A = str_replace('ي',' يـ๋͜‏ـﮧ',$A); 
$A = str_replace('ب','  بـ๋͜‏ـﮧ',$A);
$A = str_replace('ل',' لـ๋͜‏ـﮧ',$A); 
$A = str_replace('ا','آ',$A); 
$A = str_replace('ت','  تـ๋͜‏ـﮧ',$A); 
$A = str_replace('ن','نـ๋͜‏ـﮧ',$A); 
$A = str_replace('م','مـ๋͜‏ـﮧ',$A); 
$A = str_replace('ك','ڪـ๋͜‏ـﮧ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظـ๋͜‏ـﮧ',$A); 
$A = str_replace('ط','طـ๋͜‏ـﮧ',$A); 
 $A = str_replace('ذ','ذِ',$A); 
$A = str_replace('د','دٰ',$A); 
$A = str_replace('ز','زً',$A); 
$A = str_replace('ر','ر',$A); 
$A = str_replace('و','ﯛ̲୭',$A); 
 $A = str_replace('ى','ىٰ',$A);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = str_replace('a','̶a̶',$text); 
$A = str_replace('b','b̶',$A); 
$A = str_replace('c','c̶',$A); 
$A = str_replace('d','d̶',$A); 
$A = str_replace('e','e̶',$A); 
$A = str_replace('f','f̶',$A); 
$A = str_replace('g','g̶',$A); 
$A = str_replace('h','h̶',$A); 
$A = str_replace('i','i̶',$A); 
$A = str_replace('j','j̶',$A); 
$A = str_replace('k','k̶',$A); 
$A = str_replace('l','l̶',$A); 
$A = str_replace('m','m̶',$A); 
$A = str_replace('n','n̶',$A); 
$A = str_replace('o','o̶',$A); 
$A = str_replace('p','p̶',$A); 
$A = str_replace('q','q̶',$A); 
$A = str_replace('r','r̶',$A); 
$A = str_replace('s','s̶',$A); 
$A = str_replace('t','t̶',$A); 
$A = str_replace('u','ᵘ̶ ',$A); 
$A = str_replace('v','v̶',$A); 
$A = str_replace('w','w̶',$A); 
$A = str_replace('x','x̶',$A); 
$A = str_replace('y','y̶',$A); 
$A = str_replace('z','z̶',$A); 

 $A = str_replace('ض','ضۜہٰٰ',$A); 
$A = str_replace('ص','صۛہٰٰ',$A); 
$A = str_replace('ث','ثہٰٰ',$A); 
$A = str_replace('ق','قྀ̲ہٰٰٰ',$A); 
$A = str_replace('ف','ف͒ہٰٰ',$A); 
$A = str_replace('غ','غہٰٰ',$A); 
$A = str_replace('ع','ۤ؏ـ',$A); 
$A = str_replace('ه','ھہ',$A); 
$A = str_replace('خ','خٰ̐ہ',$A); 
$A = str_replace('ح','حہٰٰ',$A); 
$A = str_replace('ج','جْۧ ',$A); 
$A = str_replace('ش','شِٰہٰٰ',$A); 
$A = str_replace('س','سٰٰٓ',$A); 
$A = str_replace('ي','يِٰہ',$A); 
$A = str_replace('ب','بّہ',$A);
$A = str_replace('ل','ل',$A); 
$A = str_replace('ا','آ',$A); 
$A = str_replace('ت',' تَہَٰ',$A); 
$A = str_replace('ن','نَِٰہ',$A); 
$A = str_replace('ك','ڪٰྀہٰٰٖ',$A); 
$A = str_replace('م','مـ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظۗـہٰٰ',$A); 
$A = str_replace('ط','طۨہٰٰ',$A); 
 $A = str_replace('ذ','ذِ',$A); 
$A = str_replace('د','دُ',$A); 
$A = str_replace('ز','ژ',$A); 
$A = str_replace('ر','رٰ',$A); 
$A = str_replace('و','وً',$A); 
 $A = str_replace('ى','ى',$A);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text; 
$A = str_replace('a','⧼α⧽',$A); 
$A = str_replace('b','⧼в⧽',$A); 
$A = str_replace('c','⧼c⧽',$A); 
$A = str_replace('d','⧼ɒ⧽',$A); 
$A = str_replace('e','⧼є⧽',$A); 
$A = str_replace('f','⧼f⧽',$A); 
$A = str_replace('g','⧼ɢ⧽',$A); 
$A = str_replace('h','⧼н⧽',$A); 
$A = str_replace('i','⧼ɪ⧽',$A); 
$A = str_replace('j','⧼ᴊ⧽',$A); 
$A = str_replace('k','⧼ĸ⧽',$A); 
$A = str_replace('l','⧼ℓ⧽',$A); 
$A = str_replace('m','⧼м⧽',$A); 
$A = str_replace('n','⧼и⧽',$A); 
$A = str_replace('o','⧼σ⧽',$A); 
$A = str_replace('p','⧼ρ⧽',$A); 
$A = str_replace('q','⧼q⧽',$A); 
$A = str_replace('r','⧼я⧽',$A); 
$A = str_replace('s','⧼s⧽',$A); 
$A = str_replace('t','⧼τ⧽',$A); 
$A = str_replace('u','⧼υ⧽',$A); 
$A = str_replace('v','⧼v⧽',$A); 
$A = str_replace('w','⧼ω⧽',$A); 
$A = str_replace('x','⧼x⧽',$A); 
$A = str_replace('y','⧼y⧽',$A); 
$A = str_replace('z','⧼z⧽',$A); 

$A = str_replace('ض','ضـٰ๋۪͜ﮧٰ',$A); 
$A = str_replace('ص','صـٌٍ๋ۤ͜ﮧْ',$A); 
$A = str_replace('ث','ث̲ꫭـﮧ',$A); 
$A = str_replace('ق','قٰٰྀ̲ـِٰ̲ﮧْ',$A); 
$A = str_replace('ف','',$A); 
$A = str_replace('غ','فـٌٍ๋ۤ͜ﮧ',$A); 
$A = str_replace('ع','غـّٰ̐ہٰٰ',$A); 
$A = str_replace('ه','ٰ̲ھہ',$A); 
$A = str_replace('خ','خ̲ﮧ',$A); 
$A = str_replace('ح','ح̲ꪳـﮧ',$A); 
$A = str_replace('ج','ج̲ꪸـﮧ',$A); 
$A = str_replace('ش','ش̲ꪾـﮧ',$A); 
$A = str_replace('س','سـ̷ٰٰﮧْ',$A); 
$A = str_replace('ي','يـِٰ̲ﮧ',$A); 
$A = str_replace('ب','ب̲ꪰـﮧ',$A);
$A = str_replace('ل','لٍُـّٰ̐ہ',$A); 
$A = str_replace('ا',' ཻا ',$A); 
$A = str_replace('ت','تـٰۧﮧ',$A); 
$A = str_replace('ن','نٰ̲̐ـﮧْ',$A); 
$A = str_replace('م','مٰٰྀ̲ـِٰ̲ﮧْ',$A); 
$A = str_replace('ك','كـِّﮧْٰٖ',$A); 
$A = str_replace('ة','ةً',$A); 
$A = str_replace('ء','ء',$A); 
$A = str_replace('ظ','ظَـ๋͜ﮧْ',$A); 
$A = str_replace('ط','ط̲꫁ـﮧ',$A); 
 $A = str_replace('ذ','ذٖ',$A); 
$A = str_replace('د','دُ',$A); 
$A = str_replace('ز','ژٰ',$A); 
$A = str_replace('ر','',$A); 
$A = str_replace('و','ﯛ૭',$A); 
 $A = str_replace('ى','ىِ',$A); 
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$A."".$smile
   ]);
   }

if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = str_replace('ض', 'ضِـٰٚـِْ✮ِـٰٚـِْ', $text);
   $A = str_replace('ص', 'صِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ث', 'ثِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ق', 'قِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ف', 'فِ͒ـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('غ', 'غِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ع', 'عِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('خ', 'خِ̐ـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ح', 'حِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ج', 'جِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ش', 'شِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('س', 'سِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ي', 'يِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ب', 'بِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ل', 'لِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ن', 'نِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('م', 'مِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ك', 'ڪِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ط', 'طِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ذ', 'ذِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ظ', 'ظِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('ظ', 'ظِـٰٚـِْ✮ِـٰٚـِْ', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A = str_replace('a',"ᵃ",$A);
$A = str_replace("b","ᵇ",$A);
$A = str_replace("c","ᶜ",$A);
$A = str_replace("d","ᵈ",$A);
$A = str_replace("e","ᵉ",$A);
$A = str_replace("f","ᶠ",$A);
$A = str_replace("g","ᵍ",$A);
$A = str_replace("h","ʰ",$A);
$A = str_replace("i","ᶤ",$A);
$A = str_replace("j","ʲ",$A);
$A = str_replace("k","ᵏ",$A);
$A = str_replace("l","ˡ",$A);
$A = str_replace("m","ᵐ",$A);
$A = str_replace("n","ᶰ",$A);
$A = str_replace("o","ᵒ",$A);
$A = str_replace("p","ᵖ",$A);
$A = str_replace("q","ᵠ",$A);
$A = str_replace("r","ʳ",$A);
$A = str_replace("s","ˢ",$A);
$A = str_replace("t","ᵗ",$A);
$A = str_replace("u","ᵘ",$A);
$A = str_replace("v","ᵛ",$A);
$A = str_replace("w","ʷ",$A);
$A = str_replace("x","ˣ",$A);
$A = str_replace("y","ʸ",$A);
$A = str_replace("z","ᶻ",$A);

   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$A = $text;
   $A = str_replace('ض', 'ض͜ــ๋͜ـ', $A);
   $A = str_replace('ص', 'ص͜ــ๋͜ـ', $A);
   $A = str_replace('ث', 'ث͜ــ๋͜ـ͜ــ๋͜ـ', $A);
   $A = str_replace('ق', 'ق͜ــ๋͜ـ', $A);
   $A = str_replace('ف', 'ف͒͜ــ๋͜ـ', $A);
   $A = str_replace('غ', 'غ͜ــ๋͜ـ', $A);
   $A = str_replace('ع', 'ع͜ــ๋͜ـ', $A);
   $A = str_replace('خ', 'خ̐͜ــ๋͜ـ', $A);
   $A = str_replace('ح', 'ح͜ــ๋͜ـ', $A);
   $A = str_replace('ج', 'ج͜ــ๋͜ـ', $A);
   $A = str_replace('ش', 'ش͜ــ๋͜ـ', $A);
   $A = str_replace('س', 'س͜ــ๋͜ـ', $A);
   $A = str_replace('ي', 'ي͜ــ๋͜ـ', $A);
   $A = str_replace('ب', 'ب͜ــ๋͜ـ', $A);
   $A = str_replace('ل', 'ل͜ــ๋͜ـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'ت͜ــ๋͜ـ', $A);
   $A = str_replace('ن', 'ن͜ــ๋͜ـ', $A);
   $A = str_replace('م', 'م͜ــ๋͜ـ', $A);
   $A = str_replace('ك', 'ڪ͜ــ๋͜ـ', $A);
   $A = str_replace('ط', 'ط͜ــ๋͜ـ', $A);
   $A = str_replace('ظ', 'ظ͜ــ๋͜ـ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('ظ', 'ظــ๋͜ـ', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A = str_replace('q', 'Θ' , $A);
  	 $A = str_replace('w', 'ẁ' , $A);
	 $A = str_replace('e', 'ë' , $A);
  	 $A = str_replace('r', 'я' , $A);
	 $A = str_replace('t', 'ť' , $A);
  	 $A = str_replace('y', 'y' , $A);
	 $A = str_replace('u', 'ע' , $A);
  	 $A = str_replace('i', 'į' , $A);
	 $A = str_replace('o', 'ð' , $A);
  	 $A = str_replace('p', 'ρ' , $A);
	 $A = str_replace('a', 'à' , $A);
  	 $A = str_replace('s', 'ś' , $A);
	 $A = str_replace('d', 'ď' , $A);
  	 $A = str_replace('f', '∫' , $A);
	 $A = str_replace('g', 'ĝ' , $A);
  	 $A = str_replace('h', 'ŋ' , $A);
	 $A = str_replace('j', 'Ј' , $A);
  	 $A = str_replace('k', 'қ' , $A);
	 $A = str_replace('l', 'Ŀ' , $A);
  	 $A = str_replace('z', 'ź' , $A);
	 $A = str_replace('x', 'א' , $A);
  	 $A = str_replace('c', 'ć' , $A);
	 $A = str_replace('v', 'V' , $A);
  	 $A = str_replace('b', 'Ђ' , $A);
  	 $A = str_replace('n', 'ŋ' , $A);
	 $A = str_replace('m', 'm' , $A);
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضِـೋـ', $A);
   $A = str_replace('ص', 'صِـೋـ', $A);
   $A = str_replace('ث', 'ثِـೋـ', $A);
   $A = str_replace('ق', 'قِـೋـ', $A);
   $A = str_replace('ف', 'فِ͒ـೋـ', $A);
   $A = str_replace('غ', 'غِـೋـ', $A);
   $A = str_replace('ع', 'عِـೋـ', $A);
   $A = str_replace('خ', 'خِ̐ـೋـ', $A);
   $A = str_replace('ح', 'حِـೋـ', $A);
   $A = str_replace('ج', 'جِـೋـ', $A);
   $A = str_replace('ش', 'شِـೋـ', $A);
   $A = str_replace('س', 'سِـೋـ', $A);
   $A = str_replace('ي', 'يِـೋـ', $A);
   $A = str_replace('ب', 'بِـೋـ', $A);
   $A = str_replace('ل', 'لِـೋـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِـೋـ', $A);
   $A = str_replace('ن', 'نِـೋـ', $A);
   $A = str_replace('م', 'مِـೋـ', $A);
   $A = str_replace('ك', 'ڪِـೋـ', $A);
   $A = str_replace('ط', 'طِـೋـ', $A);
   $A = str_replace('ظ', 'ظِـೋـ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A = str_replace('q', 'Ҩ' , $A);
  	 $A = str_replace('w', 'Щ' , $A);
	 $A = str_replace('e', 'Є' , $A);
  	 $A = str_replace('r', 'R' , $A);
	 $A = str_replace('t', 'ƚ' , $A);
  	 $A = str_replace('y', '￥' , $A);
	 $A = str_replace('u', 'Ц' , $A);
  	 $A = str_replace('i', 'Ī' , $A);
	 $A = str_replace('o', 'Ø' , $A);
  	 $A = str_replace('p', 'P' , $A);
	 $A = str_replace('a', 'Â' , $A);
  	 $A = str_replace('s', '$' , $A);
	 $A = str_replace('d', 'Ð' , $A);
  	 $A = str_replace('f', 'Ŧ' , $A);
	 $A = str_replace('g', 'Ǥ' , $A);
  	 $A = str_replace('h', 'Ħ' , $A);
	 $A = str_replace('j', 'ʖ' , $A);
  	 $A = str_replace('k', 'Қ' , $A);
	 $A = str_replace('l', 'Ŀ' , $A);
  	 $A = str_replace('z', 'Ẕ' , $A);
	 $A = str_replace('x', 'X' , $A);
  	 $A = str_replace('c', 'Ĉ' , $A);
	 $A = str_replace('v', 'V' , $A);
  	 $A = str_replace('b', 'ß' , $A);
  	 $A = str_replace('n', 'И' , $A);
	 $A = str_replace('m', 'ⴅ' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}

 
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضـ๋͜‏ـ', $text);
   $A = str_replace('ص', 'صـ๋͜‏ـ', $A);
   $A = str_replace('ث', 'ثـ๋͜‏ـ', $A);
   $A = str_replace('ق', 'قـ๋͜‏ـ', $A);
   $A = str_replace('ف', 'ف͒ـ๋͜‏ـ', $A);
   $A = str_replace('غ', 'غـ๋͜‏ـ', $A);
   $A = str_replace('ع', 'عـ๋͜‏ـ', $A);
   $A = str_replace('خ', 'خ̐ـ๋͜‏ـ', $A);
   $A = str_replace('ح', 'حـ๋͜‏ـ', $A);
   $A = str_replace('ج', 'جـ๋͜‏ـ', $A);
   $A = str_replace('ش', 'شـ๋͜‏ـ', $A);
   $A = str_replace('س', 'سـ๋͜‏ـ', $A);
   $A = str_replace('ي', 'يـ๋͜‏ـ', $A);
   $A = str_replace('ب', 'بـ๋͜‏ـ', $A);
   $A = str_replace('ل', 'لـ๋͜‏ـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تـ๋͜‏ـ', $A);
   $A = str_replace('ن', 'نـ๋͜‏ـ', $A);
   $A = str_replace('م', 'مـ๋͜‏ـ', $A);
   $A = str_replace('ك', 'ڪـ๋͜‏ـ', $A);
   $A = str_replace('ط', 'طـ๋͜‏ـ', $A);
   $A = str_replace('ظ', 'ظـ๋͜‏ـ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A= str_replace('q', '•🇶', $A);
   $A= str_replace('w', '•🇼', $A);
   $A= str_replace('e', '•🇪', $A);
   $A= str_replace('r', '•🇷', $A);
   $A= str_replace('t', '•🇹', $A);
   $A= str_replace('y', '•🇾', $A);
   $A= str_replace('u', '•🇻', $A);
   $A= str_replace('i', '•🇮', $A);
   $A= str_replace('o', '•🇴', $A);
   $A= str_replace('p', '•🇵', $A);
   $A= str_replace('a', '•🇦', $A);
   $A= str_replace('s', '•🇸', $A);
   $A= str_replace('d', '•🇩', $A);
   $A= str_replace('f', '•🇫', $A);
   $A= str_replace('g', '•🇬', $A);
   $A= str_replace('h', '•🇭', $A);
   $A= str_replace('j', '•🇯', $A);
   $A= str_replace('k', '•🇰', $A);
   $A= str_replace('l', '•🇱', $A);
   $A= str_replace('z', '•🇿', $A);
   $A= str_replace('x', '•🇽', $A);
   $A= str_replace('c', '•🇨', $A);
   $A= str_replace('v', '•🇺', $A);
   $A= str_replace('b', '•🇧', $A);
   $A= str_replace('n', '•🇳', $A);
   $A= str_replace('m', '•🇲', $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضِٰـِۢ', $A);
   $A = str_replace('ص', 'صِٰـِۢ', $A);
   $A = str_replace('ث', 'ثِٰـِۢ', $A);
   $A = str_replace('ق', 'قِٰـِۢ', $A);
   $A = str_replace('ف', 'فِٰ͒ـِۢ', $A);
   $A = str_replace('غ', 'غِٰـِۢ', $A);
   $A = str_replace('ع', 'عِٰـِۢ', $A);
   $A = str_replace('خ', 'خِٰ̐ـِۢ', $A);
   $A = str_replace('ح', 'حِٰـِۢ', $A);
   $A = str_replace('ج', 'جِٰـِۢ', $A);
   $A = str_replace('ش', 'شِٰـِۢ', $A);
   $A = str_replace('س', 'سِٰـِۢ', $A);
   $A = str_replace('ي', 'يِٰـِۢ', $A);
   $A = str_replace('ب', 'بِٰـِۢ', $A);
   $A = str_replace('ل', 'لِٰـِۢ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِٰـِۢ', $A);
   $A = str_replace('ن', 'نِٰـِۢ', $A);
   $A = str_replace('م', 'مِٰـِۢ', $A);
   $A = str_replace('ك', 'ڪِٰـِۢ', $A);
   $A = str_replace('ط', 'طِٰـِۢ', $A);
   $A = str_replace('ظ', 'ظِٰـِۢ', $A);
   $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "ۿۿہ", $A);
   
   $A = str_replace('q', 'Ⴓ' , $A);
     $A = str_replace('w', 'ᗯ' , $A);
	 $A = str_replace('e', 'ᕮ' , $A);
     $A = str_replace('r', 'ᖇ' , $A);
	 $A = str_replace('t', 'ͳ' , $A);
 	$A = str_replace('y', 'ϒ' , $A);
	 $A = str_replace('u', 'ᘮ' , $A);
	 $A = str_replace('i', 'ᓰ' , $A);
	 $A = str_replace('o', '〇' , $A);
	 $A = str_replace('p', 'ᖘ' , $A);
	 $A = str_replace('a', 'ᗩ' , $A);
	 $A = str_replace('s', 'ᔕ' , $A);
	 $A = str_replace('d', 'ᗪ' , $A);
	 $A = str_replace('f', 'Բ' , $A);
	 $A = str_replace('g', 'ᘐ' , $A);
	 $A = str_replace('h', 'ᕼ' , $A);
	 $A = str_replace('j', 'ᒎ' , $A);
	 $A = str_replace('k', 'Ḱ' , $A);
	 $A = str_replace('l', 'ᒪ' , $A);
	 $A = str_replace('z', 'Ꙁ' , $A);
	 $A = str_replace('x', 'Ꮖ' , $A);
	 $A = str_replace('c', 'ᑕ' , $A);
	 $A = str_replace('v', 'ᐯ' , $A);
	 $A = str_replace('b', 'ᙖ' , $A);
	 $A = str_replace('n', 'ᘉ' , $A);
	 $A = str_replace('m', 'ᙢ' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ض֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ص', 'ص֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ث', 'ث֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ق', 'ق֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ف', 'ف͒֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('غ', 'غ֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ع', 'ع֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('خ', 'خ̐֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ح', 'ح֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ج', 'ج֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ش', 'ش֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('س', 'س֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ي', 'ي֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ب', 'ب֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ل', 'ل֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'ت֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ن', 'ن֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('م', 'م֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ك', 'ڪ֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ط', 'ط֠ــۢ͜ـٰ̲ـ', $A);
   $A = str_replace('ظ', 'ظ֠ــۢ͜ـٰ̲ـ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "໋۠هہؚ", $A);
   
   $A = str_replace('q', 'q' , $A);
  	 $A = str_replace('w', 'ω' , $A);
	 $A = str_replace('e', 'ε' , $A);
  	 $A = str_replace('r', 'я' , $A);
	 $A = str_replace('t', 'т' , $A);
  	 $A = str_replace('y', 'ү' , $A);
	 $A = str_replace('u', 'υ' , $A);
  	 $A = str_replace('i', 'ι' , $A);
	 $A = str_replace('o', 'σ' , $A);
  	 $A = str_replace('p', 'ρ' , $A);
	 $A = str_replace('a', 'α' , $A);
  	 $A = str_replace('s', 's' , $A);
	 $A = str_replace('d', '∂' , $A);
  	 $A = str_replace('f', 'ғ' , $A);
	 $A = str_replace('g', 'g' , $A);
  	 $A = str_replace('h', 'н' , $A);
	 $A = str_replace('j', 'נ' , $A);
  	 $A = str_replace('k', 'к' , $A);
	 $A = str_replace('l', 'ℓ' , $A);
  	 $A = str_replace('z', 'z' , $A);
	 $A = str_replace('x', 'x' , $A);
  	 $A = str_replace('c', 'c' , $A);
	 $A = str_replace('v', 'v' , $A);
  	 $A = str_replace('b', 'в' , $A);
  	 $A = str_replace('n', 'η' , $A);
	 $A = str_replace('m', 'м' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼??) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضِٰـۛৣـ', $A);
   $A = str_replace('ص', 'صِٰـۛৣـ', $A);
   $A = str_replace('ث', 'ثِٰـۛৣـ', $A);
   $A = str_replace('ق', 'قِٰـۛৣـ', $A);
   $A = str_replace('ف', 'فِٰ͒ـۛৣـ', $A);
   $A = str_replace('غ', 'غِٰـۛৣـ', $A);
   $A = str_replace('ع', 'عِٰـۛৣـ', $A);
   $A = str_replace('خ', 'خِٰ̐ـۛৣـ', $A);
   $A = str_replace('ح', 'حِٰـۛৣـ', $A);
   $A = str_replace('ج', 'جِٰـۛৣـ', $A);
   $A = str_replace('ش', 'شِٰـۛৣـ', $A);
   $A = str_replace('س', 'سِٰـۛৣـ', $A);
   $A = str_replace('ي', 'يِٰـۛৣـ', $A);
   $A = str_replace('ب', 'بِٰـۛৣـ', $A);
   $A = str_replace('ل', 'لِٰـۛৣـ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تِٰـۛৣـ', $A);
   $A = str_replace('ن', 'نِٰـۛৣـ', $A);
   $A = str_replace('م', 'مِٰـۛৣـ', $A);
   $A = str_replace('ك', 'ڪِٰـۛৣـ', $A);
   $A = str_replace('ط', 'طِٰـۛৣـ', $A);
   $A = str_replace('ظ', 'ظِٰـۛৣـ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "໋۠هہؚ", $A);
   
   $A = str_replace('q', 'Ｑ' , $A);
  	 $A = str_replace('w', 'Ｗ' , $A);
	 $A = str_replace('e', 'Ｅ' , $A);
  	 $A = str_replace('r', 'Ｒ' , $A);
	 $A = str_replace('t', 'Ｔ' , $A);
  	 $A = str_replace('y', 'Ｙ' , $A);
	 $A = str_replace('u', 'Ｕ' , $A);
  	 $A = str_replace('i', 'Ｉ' , $A);
	 $A = str_replace('o', 'Ｏ' , $A);
  	 $A = str_replace('p', 'Ｐ' , $A);
	 $A = str_replace('a', 'Ａ' , $A);
  	 $A = str_replace('s', 'Ｓ' , $A);
	 $A = str_replace('d', 'Ｄ' , $A);
  	 $A = str_replace('f', 'Բ' , $A);
	 $A = str_replace('g', 'Ｇ' , $A);
  	 $A = str_replace('h', 'Ｈ' , $A);
	 $A = str_replace('j', 'Ｊ' , $A);
  	 $A = str_replace('k', 'Ｋ' , $A);
	 $A = str_replace('l', 'Ｌ' , $A);
  	 $A = str_replace('z', 'Ｚ' , $A);
	 $A = str_replace('x', 'Ｘ' , $A);
  	 $A = str_replace('c', 'С' , $A);
	 $A = str_replace('v', 'Ｖ' , $A);
  	 $A = str_replace('b', 'Ｂ' , $A);
  	 $A = str_replace('n', 'Ｎ' , $A);
	 $A = str_replace('m', 'Ⅿ' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $A = $text;
   $A = str_replace('ض', 'ضـۘ❈ـۘ', $A);
   $A = str_replace('ص', 'صـۘ❈ـۘ', $A);
   $A = str_replace('ث', 'ثـۘ❈ـۘ', $A);
   $A = str_replace('ق', 'قـۘ❈ـۘ', $A);
   $A = str_replace('ف', 'ف͒ـۘ❈ـۘ', $A);
   $A = str_replace('غ', 'غـۘ❈ـۘ', $A);
   $A = str_replace('ع', 'عـۘ❈ـۘ', $A);
   $A = str_replace('خ', 'خ̐ـۘ❈ـۘ', $A);
   $A = str_replace('ح', 'حـۘ❈ـۘ', $A);
   $A = str_replace('ج', 'جـۘ❈ـۘ', $A);
   $A = str_replace('ش', 'شـۘ❈ـۘ', $A);
   $A = str_replace('س', 'سـۘ❈ـۘ', $A);
   $A = str_replace('ي', 'يـۘ❈ـۘ', $A);
   $A = str_replace('ب', 'بـۘ❈ـۘ', $A);
   $A = str_replace('ل', 'لـۘ❈ـۘ', $A);
   $A = str_replace('ا', 'آ', $A);
   $A = str_replace('ت', 'تـۘ❈ـۘ', $A);
   $A = str_replace('ن', 'نـۘ❈ـۘ', $A);
   $A = str_replace('م', 'م', $A);
   $A = str_replace('ك', 'ڪـۘ❈ـۘ', $A);
   $A = str_replace('ط', 'طـۘ❈ـۘ', $A);
   $A = str_replace('ظ', 'ظـۘ❈ـۘ', $A);
  $A = str_replace('ء', 'ء', $A);
   $A = str_replace('ؤ', 'ؤ', $A);
   $A = str_replace('ر', 'ر', $A);
   $A = str_replace('ى', 'ى', $A);
   $A = str_replace('ز', 'ز', $A);
   $A = str_replace('و', 'ﯛ̲୭', $A);
   $A = str_replace("ه", "໋۠هہؚ", $A);
   
   $A = str_replace('q', 'Ҩ' , $A);
  	 $A = str_replace('w', 'Ɯ' , $A);
	 $A = str_replace('e', 'Ɛ' , $A);
  	 $A = str_replace('r', '尺' , $A);
	 $A = str_replace('t', 'Ť' , $A);
  	 $A = str_replace('y', 'Ϥ' , $A);
	 $A = str_replace('u', 'Ц' , $A);
  	 $A = str_replace('i', 'ɪ' , $A);
	 $A = str_replace('o', 'Ø' , $A);
  	 $A = str_replace('p', 'þ' , $A);
	 $A = str_replace('a', 'Λ' , $A);
  	 $A = str_replace('s', 'ら' , $A);
	 $A = str_replace('d', 'Ð' , $A);
  	 $A = str_replace('f', 'F' , $A);
	 $A = str_replace('g', 'Ɠ' , $A);
  	 $A = str_replace('h', 'н' , $A);
	 $A = str_replace('j', 'ﾌ' , $A);
  	 $A = str_replace('k', 'Қ' , $A);
	 $A = str_replace('l', 'Ł' , $A);
  	 $A = str_replace('z', 'Ẕ' , $A);
	 $A = str_replace('x', 'χ' , $A);
  	 $A = str_replace('c', 'ㄈ' , $A);
	 $A = str_replace('v', 'Ɣ' , $A);
  	 $A = str_replace('b', 'Ϧ' , $A);
  	 $A = str_replace('n', 'Л' , $A);
	 $A = str_replace('m', '௱' , $A);
   
   bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$A." ".$smile
   ]);
}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = str_replace('ا','ٱ',$text); 
$php88 = str_replace('ب','ﺑ',$php88); 
$php88 = str_replace('ت','ﺗ̲ ',$php88); 
$php88 = str_replace('ث','ثّـ',$php88); 
$php88 = str_replace('ج','جّـ',$php88); 
$php88 = str_replace('ح','ﺣّ͠ـ',$php88); 
$php88 = str_replace('خ','ﺣ͠ ',$php88); 
$php88 = str_replace('د','د',$php88); 
$php88 = str_replace('ذ','ذّ',$php88); 
$php88 = str_replace('ر','ر',$php88); 
$php88 = str_replace('ز','زْ',$php88); 
$php88 = str_replace('س','ﺳ̭͠ ',$php88); 
$php88 = str_replace('ش','ﺷ͠ ',$php88);  
$php88 = str_replace('ص','ڝـ',$php88); 
$php88 = str_replace('ض','ڞـ',$php88); 
$php88 = str_replace('ط','ط',$php88); 
$php88 = str_replace('ظ','ظـ',$php88); 
$php88 = str_replace('ع','ﻋ̝̚',$php88); 
$php88 = str_replace('غ','ﻏ̣̐',$php88); 
$php88 = str_replace('ف','ﻓ̲̣̐ ',$php88); 
$php88 = str_replace('ق','ﻗ̮ـ̃',$php88); 
$php88 = str_replace('ك','ڪْ',$php88); 
$php88 = str_replace('ل','لْـ',$php88);
$php88 = str_replace('م','م',$php88); 
$php88 = str_replace('ن','ﻧـ',$php88);  
$php88 = str_replace('ه','ھَہّ',$php88); 
$php88 = str_replace('و','ۅ',$php88); 
$php88 = str_replace('ي','ي',$php88);

$php88 = str_replace('q', 'Ⴓ' , $php88);
  	 $php88 = str_replace('w', 'Ш' , $php88);
	 $php88 = str_replace('e', 'Σ' , $php88);
  	 $php88 = str_replace('r', 'Γ' , $php88);
	 $php88 = str_replace('t', 'Ƭ' , $php88);
  	 $php88 = str_replace('y', 'Ψ' , $php88);
	 $php88 = str_replace('u', 'Ʊ' , $php88);
  	 $php88 = str_replace('i', 'I' , $php88);
	 $php88 = str_replace('o', 'Θ' , $php88);
  	 $php88 = str_replace('p', 'Ƥ' , $php88);
	 $php88 = str_replace('a', 'Δ' , $php88);
  	 $php88 = str_replace('s', 'Ѕ' , $php88);
	 $php88 = str_replace('d', 'D' , $php88);
  	 $php88 = str_replace('f', 'F' , $php88);
	 $php88 = str_replace('g', 'G' , $php88);
  	 $php88 = str_replace('h', 'H' , $php88);
	 $php88 = str_replace('j', 'J' , $php88);
  	 $php88 = str_replace('k', 'Ƙ' , $php88);
	 $php88 = str_replace('l', 'L' , $php88);
  	 $php88 = str_replace('z', 'Z' , $php88);
	 $php88 = str_replace('x', 'Ж' , $php88);
  	 $php88 = str_replace('c', 'C' , $php88);
	 $php88 = str_replace('v', 'Ʋ' , $php88);
  	 $php88 = str_replace('b', 'Ɓ' , $php88);
  	 $php88 = str_replace('n', '∏' , $php88);
	 $php88 = str_replace('m', 'Μ' , $php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀?? ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = $text; 
$php88 = str_replace('ا','ٱ',$php88); 
$php88 = str_replace('ب','ب',$php88); 
$php88 = str_replace('ت','ت',$php88);
$php88 = str_replace('ث','ث',$php88); 
$php88 = str_replace('ج','جۚ ּ',$php88);  
$php88 = str_replace('ح','حۡ',$php88); 
$php88 = str_replace('خ','خۡ',$php88); 
$php88 = str_replace('د','د',$php88); 
$php88 = str_replace('ذ','ذ',$php88); 
$php88 = str_replace('ر','ر',$php88); 
$php88 = str_replace('ز','ز',$php88); 
$php88 = str_replace('س','سۜ',$php88); 
$php88 = str_replace('ش','ش',$php88); 
$php88 = str_replace('ص','ص',$php88); 
$php88 = str_replace('ض','ض',$php88); 
$php88 = str_replace('ط','ط',$php88); 
$php88 = str_replace('ظ','ظ',$php88); 
$php88 = str_replace('ع','ع',$php88); 
$php88 = str_replace('غ','غ',$php88); 
$php88 = str_replace('ف','ف',$php88); 
$php88 = str_replace('ق','ق',$php88); 
$php88 = str_replace('ك','ك',$php88); 
$php88 = str_replace('ل','ل',$php88);
$php88 = str_replace('م','مۘ',$php88); 
$php88 = str_replace('ن','نۨــہ',$php88);  
$php88 = str_replace('ه','هۂَ',$php88); 
$php88 = str_replace('ٰو','و',$php88); 
$php88 = str_replace('ي','يۧ',$php88);

$php88 = str_replace('q', 'Q' , $php88);
  	 $php88 = str_replace('w', 'Щ' , $php88);
	 $php88 = str_replace('e', '乇' , $php88);
  	 $php88 = str_replace('r', '尺' , $php88);
	 $php88 = str_replace('t', 'ｲ' , $php88);
  	 $php88 = str_replace('y', 'ﾘ' , $php88);
	 $php88 = str_replace('u', 'Ц' , $php88);
  	 $php88 = str_replace('i', 'ﾉ' , $php88);
	 $php88 = str_replace('o', 'Ծ' , $php88);
  	 $php88 = str_replace('p', 'ｱ' , $php88);
	 $php88 = str_replace('a', 'ﾑ' , $php88);
  	 $php88 = str_replace('s', '丂' , $php88);
	 $php88 = str_replace('d', 'Ð' , $php88);
  	 $php88 = str_replace('f', 'ｷ' , $php88);
	 $php88 = str_replace('g', 'Ǥ' , $php88);
  	 $php88 = str_replace('h', 'ん' , $php88);
	 $php88 = str_replace('j', 'ﾌ' , $php88);
  	 $php88 = str_replace('k', 'ズ' , $php88);
	 $php88 = str_replace('l', 'ﾚ' , $php88);
  	 $php88 = str_replace('z', '乙' , $php88);
	 $php88 = str_replace('x', 'ﾒ' , $php88);
  	 $php88 = str_replace('c', 'ζ' , $php88);
	 $php88 = str_replace('v', 'Џ' , $php88);
  	 $php88 = str_replace('b', '乃' , $php88);
  	 $php88 = str_replace('n', '刀' , $php88);
	 $php88 = str_replace('m', 'ᄊ' , $php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = $text; 
$php88 = str_replace('ا','ٱ',$php88); 
$php88 = str_replace('ب','بّـ',$php88); 
$php88 = str_replace('ت','ﭥ',$php88);
$php88 = str_replace('ث','ث',$php88); 
$php88 = str_replace('ج','چ',$php88);  
$php88 = str_replace('ح','פ',$php88); 
$php88 = str_replace('خ','ڂ',$php88); 
$php88 = str_replace('د','د',$php88); 
$php88 = str_replace('ذ','ذ',$php88); 
$php88 = str_replace('ر','ر',$php88); 
$php88 = str_replace('ز','ز',$php88); 
$php88 = str_replace('س','س',$php88); 
$php88 = str_replace('ش','ش',$php88); 
$php88 = str_replace('ص','ص',$php88); 
$php88 = str_replace('ض','ضَّ',$php88); 
$php88 = str_replace('ط','ط',$php88); 
$php88 = str_replace('ظ','ظ',$php88); 
$php88 = str_replace('ع','عّ',$php88); 
$php88 = str_replace('غ','غَ ',$php88); 
$php88 = str_replace('ف','ف̲ ',$php88); 
$php88 = str_replace('ق','ق',$php88); 
$php88 = str_replace('ك','ڪْ',$php88); 
$php88 = str_replace('ل','ﻟ̣̣',$php88);
$php88 = str_replace('م','م',$php88); 
$php88 = str_replace('ن','ن',$php88);  
$php88 = str_replace('ه','ه',$php88); 
$php88 = str_replace('و','و',$php88); 
$php88 = str_replace('ي','ي',$php88);

$php88 = str_replace('a', 'Á', $php88);
$php88 = str_replace('b', 'ß', $php88);
$php88 = str_replace('c', 'Č', $php88);
$php88 = str_replace('d', 'Ď', $php88);
$php88 = str_replace('e', 'Ĕ', $php88);
$php88 = str_replace('f', 'Ŧ', $php88);
$php88 = str_replace('g', 'Ğ', $php88);
$php88 = str_replace('h', 'Ĥ', $php88);
$php88 = str_replace('i', 'Ĩ', $php88);
$php88 = str_replace('j', 'Ĵ', $php88);
$php88 = str_replace('k', 'Ķ', $php88);
$php88 = str_replace('l', 'Ĺ', $php88);
$php88 = str_replace('m', 'M', $php88);
$php88 = str_replace('n', 'Ń', $php88);
$php88 = str_replace('o', 'Ő', $php88);
$php88 = str_replace('p', 'P', $php88);
$php88 = str_replace('q', 'Q', $php88);
$php88 = str_replace('r', 'Ŕ', $php88);
$php88 = str_replace('s', 'Ś', $php88);
$php88 = str_replace('t', 'Ť', $php88);
$php88 = str_replace('u', 'Ú', $php88);
$php88 = str_replace('v', 'V', $php88);
$php88 = str_replace('w', 'Ŵ', $php88);
$php88 = str_replace('x', 'Ж', $php88);
$php88 = str_replace('y', 'Ŷ', $php88);
$php88 = str_replace('z', 'Ź', $php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);}

if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،??🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = $text; 
$php88 = str_replace('ا','ٱ',$php88); 
$php88 = str_replace('ب','بِ',$php88); 
$php88 = str_replace('ت','ت̲',$php88);
$php88 = str_replace('ث','ثْ',$php88); 
$php88 = str_replace('ج','چ',$php88);  
$php88 = str_replace('ح','ح',$php88); 
$php88 = str_replace('خ','خ',$php88); 
$php88 = str_replace('د','دّ',$php88); 
$php88 = str_replace('ذ','ذّ',$php88); 
$php88 = str_replace('ر','رّ',$php88); 
$php88 = str_replace('ز','زَ',$php88); 
$php88 = str_replace('س','ﺳ̲ ',$php88); 
$php88 = str_replace('ش','ﺷ̲ ',$php88); 
$php88 = str_replace('ص','صـ',$php88); 
$php88 = str_replace('ض','ضَ',$php88); 
$php88 = str_replace('ط','طً',$php88); 
$php88 = str_replace('ظ','ظـ',$php88); 
$php88 = str_replace('ع','ﻋ',$php88); 
$php88 = str_replace('غ','ﻏ̣̐ ',$php88); 
$php88 = str_replace('ف','قّـ',$php88); 
$php88 = str_replace('ق','قّـ',$php88); 
$php88 = str_replace('ك','ڪ',$php88); 
$php88 = str_replace('ل','ڵـ',$php88);
$php88 = str_replace('م','ـمـ',$php88); 
$php88 = str_replace('ن','ﻧ̲ ـ',$php88);  
$php88 = str_replace('ه','ﮬ̲̌ﮧ',$php88); 
$php88 = str_replace('و','و',$php88); 
$php88 = str_replace('ي','ي',$php88);

$php88 = str_replace('q', 'ҩ' , $php88);
  	 $php88 = str_replace('w', 'ω' , $php88);
	 $php88 = str_replace('e', '૯' , $php88);
  	 $php88 = str_replace('r', 'Ր' , $php88);
	 $php88 = str_replace('t', '੮' , $php88);
  	 $php88 = str_replace('y', 'ע' , $php88);
	 $php88 = str_replace('u', 'υ' , $php88);
  	 $php88 = str_replace('i', 'ɿ' , $php88);
	 $php88 = str_replace('o', '૦' , $php88);
  	 $php88 = str_replace('p', 'ƿ' , $php88);
	 $php88 = str_replace('a', 'ค' , $php88);
  	 $php88 = str_replace('s', 'ς' , $php88);
	 $php88 = str_replace('d', 'ძ' , $php88);
  	 $php88 = str_replace('f', 'Բ' , $php88);
	 $php88 = str_replace('g', '૭' , $php88);
  	 $php88 = str_replace('h', 'Һ' , $php88);
	 $php88 = str_replace('j', 'ʆ' , $php88);
  	 $php88 = str_replace('k', 'қ' , $php88);
	 $php88 = str_replace('l', 'Ն' , $php88);
  	 $php88 = str_replace('z', 'ઽ' , $php88);
	 $php88 = str_replace('x', '૪' , $php88);
  	 $php88 = str_replace('c', '८' , $php88);
	 $php88 = str_replace('v', '౮' , $php88);
  	 $php88 = str_replace('b', 'ც' , $php88);
  	 $php88 = str_replace('n', 'Ո' , $php88);
	 $php88 = str_replace('m', 'ɱ' , $php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = $text; 
$php88 = str_replace('ا','ٱ',$php88); 
$php88 = str_replace('ب','بّـ',$php88); 
$php88 = str_replace('ت','ت̲ ',$php88);
$php88 = str_replace('ث','ثّـ',$php88); 
$php88 = str_replace('ج','ﺟ',$php88);  
$php88 = str_replace('ح','ﺣّ͠ـ',$php88); 
$php88 = str_replace('خ','ﺣ͠ ',$php88); 
$php88 = str_replace('د','دّ',$php88); 
$php88 = str_replace('ذ','دّ',$php88); 
$php88 = str_replace('ر','ڔ',$php88); 
$php88 = str_replace('ز','زْ',$php88); 
$php88 = str_replace('س','سُ',$php88); 
$php88 = str_replace('ش','ﺷ͠ ',$php88); 
$php88 = str_replace('ص','ﺼ',$php88); 
$php88 = str_replace('ض','ضَّ',$php88); 
$php88 = str_replace('ط','طً',$php88); 
$php88 = str_replace('ظ','ظـ',$php88); 
$php88 = str_replace('ع','عـ',$php88); 
$php88 = str_replace('غ','غَ',$php88); 
$php88 = str_replace('ف','ﻓ̲',$php88); 
$php88 = str_replace('ق','ﻗ̮ـ̃',$php88); 
$php88 = str_replace('ك','ﮖ',$php88); 
$php88 = str_replace('ل','ﻟ̲ ',$php88);
$php88 = str_replace('م','ﻣ̲',$php88); 
$php88 = str_replace('ن','ﻧ̲',$php88);  
$php88 = str_replace('ه','ﮬ̲̌ﮧ',$php88); 
$php88 = str_replace('و','ﯚ',$php88); 
$php88 = str_replace('ي','يَ',$php88);

$php88 = str_replace('q', 'Ꝙ' ,$php88);
  	 $php88 = str_replace('w', 'Ѡ' ,$php88);
	 $php88 = str_replace('e', 'Ɛ' ,$php88);
  	 $php88 = str_replace('r', 'Ɽ' ,$php88);
	 $php88 = str_replace('t', 'Ͳ' ,$php88);
  	 $php88 = str_replace('y', 'Ỿ' ,$php88);
	 $php88 = str_replace('u', 'Ʊ' ,$php88);
  	 $php88 = str_replace('i', 'ị' ,$php88);
	 $php88 = str_replace('o', 'Ỗ' ,$php88);
  	 $php88 = str_replace('p', 'Ꝓ' ,$php88);
	 $php88 = str_replace('a', 'Λ' ,$php88);
  	 $php88 = str_replace('s', 'Ṥ' ,$php88);
	 $php88 = str_replace('d', 'δ' ,$php88);
  	 $php88 = str_replace('f', 'Բ' ,$php88);
	 $php88 = str_replace('g', '₲' ,$php88);
  	 $php88 = str_replace('h', 'Ḩ' ,$php88);
	 $php88 = str_replace('j', 'Ĵ' ,$php88);
  	 $php88 = str_replace('k', 'Ҡ' ,$php88);
	 $php88 = str_replace('l', 'Ⱡ' ,$php88);
  	 $php88 = str_replace('z', 'Ꙃ' ,$php88);
	 $php88 = str_replace('x', 'Ӿ' ,$php88);
  	 $php88 = str_replace('c', 'Ƈ' ,$php88);
	 $php88 = str_replace('v', 'Ѵ' ,$php88);
  	 $php88 = str_replace('b', 'ß' ,$php88);
  	 $php88 = str_replace('n', 'ⴂ' ,$php88);
	 $php88 = str_replace('m', 'ⴅ' ,$php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);
}
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = $text; 
$php88 = str_replace('ا','ٱ',$php88); 
$php88 = str_replace('ب','ﭜ',$php88); 
$php88 = str_replace('ج','چ',$php88); 
$php88 = str_replace('ث','ﭦ',$php88); 
$php88 = str_replace('ت','ﭠ',$php88); 
$php88 = str_replace('ح','ڂ',$php88); 
$php88 = str_replace('خ','خ',$php88); 
$php88 = str_replace('د','ﮃ',$php88); 
$php88 = str_replace('ذ','ڎ',$php88); 
$php88 = str_replace('ر','ر',$php88); 
$php88 = str_replace('ز','ژ',$php88); 
$php88 = str_replace('س','ﺳ̭͠ ',$php88); 
$php88 = str_replace('ش','شَ',$php88); 
$php88 = str_replace('ص','ڝ',$php88); 
$php88 = str_replace('ض','ڞ',$php88); 
$php88 = str_replace('ط','ط',$php88); 
$php88 = str_replace('ظ','ڟ',$php88); 
$php88 = str_replace('ع','؏',$php88); 
$php88 = str_replace('غ','ﻏ̐ ',$php88); 
$php88 = str_replace('ف','ڤ',$php88); 
$php88 = str_replace('ق','ڦ',$php88); 
$php88 = str_replace('ك','ڳ',$php88); 
$php88 = str_replace('ل','لَ',$php88);
$php88 = str_replace('م','م',$php88); 
$php88 = str_replace('ن','ڻ',$php88);  
$php88 = str_replace('ه','هـﮧ',$php88); 
$php88 = str_replace('و','و',$php88); 
$php88 = str_replace('ي','يِّ',$php88); 

$php88 = str_replace('q', 'Ǫ' , $php88);
  	 $php88 = str_replace('w', 'Ш' , $php88);
	 $php88 = str_replace('e', 'Ξ' , $php88);
  	 $php88 = str_replace('r', 'Я' , $php88);
	 $php88 = str_replace('t', '₮' , $php88);
  	 $php88 = str_replace('y', 'Џ' , $php88);
	 $php88 = str_replace('u', 'Ǚ' , $php88);
  	 $php88 = str_replace('i', 'ł' , $php88);
	 $php88 = str_replace('o', 'Ф' , $php88);
  	 $php88 = str_replace('p', 'ק' , $php88);
	 $php88 = str_replace('a', 'Λ' , $php88);
  	 $php88 = str_replace('s', 'Ŝ' , $php88);
	 $php88 = str_replace('d', 'Ð' , $php88);
  	 $php88 = str_replace('f', 'Ŧ' , $php88);
	 $php88 = str_replace('g', '₲' , $php88);
  	 $php88 = str_replace('h', 'Ḧ' , $php88);
	 $php88 = str_replace('j', 'J' , $php88);
  	 $php88 = str_replace('k', 'К' , $php88);
	 $php88 = str_replace('l', 'Ł' , $php88);
  	 $php88 = str_replace('z', 'Ꙃ' , $php88);
	 $php88 = str_replace('x', 'Ж' , $php88);
  	 $php88 = str_replace('c', 'Ͼ' , $php88);
	 $php88 = str_replace('v', 'Ṽ' , $php88);
  	 $php88 = str_replace('b', 'Б' , $php88);
  	 $php88 = str_replace('n', 'Л' , $php88);
	 $php88 = str_replace('m', 'Ɱ' , $php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);
   }
   
if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
$php88 = str_replace('ا','آ̀',$text); 
$php88 = str_replace('ب','ب',$php88); 
$php88 = str_replace('ت','ت',$php88);
$php88 = str_replace('ث','ث',$php88); 
$php88 = str_replace('ج','ج',$php88);  
$php88 = str_replace('ح','ح̀',$php88); 
$php88 = str_replace('خ','خ',$php88); 
$php88 = str_replace('د','د̀',$php88); 
$php88 = str_replace('ذ','ذ̀',$php88); 
$php88 = str_replace('ر','ر̀',$php88); 
$php88 = str_replace('ز','ز',$php88); 
$php88 = str_replace('س','س̀́',$php88); 
$php88 = str_replace('ش','ش̀́',$php88); 
$php88 = str_replace('ص','ص̀́',$php88); 
$php88 = str_replace('ض','ض',$php88); 
$php88 = str_replace('ط','ط̀́',$php88); 
$php88 = str_replace('ظ','ظ̀́',$php88); 
$php88 = str_replace('ع','ع̀́',$php88); 
$php88 = str_replace('غ','غ',$php88); 
$php88 = str_replace('ف','ف̀',$php88); 
$php88 = str_replace('ق','ق̀',$php88); 
$php88 = str_replace('ك','ك',$php88); 
$php88 = str_replace('ل','ل',$php88);
$php88 = str_replace('م','م̀',$php88); 
$php88 = str_replace('ن','ن̀',$php88);  
$php88 = str_replace('ه','ه̀',$php88); 
$php88 = str_replace('و','و',$php88); 
$php88 = str_replace('ي','ي',$php88);

$php88 = str_replace('a', 'ⓐ', $php88);
$php88 = str_replace('b', 'ⓑ', $php88);
$php88 = str_replace('c', '©', $php88);
$php88 = str_replace('d', 'ⓓ', $php88);
$php88 = str_replace('e', 'ⓔ', $php88);
$php88 = str_replace('f', 'ⓕ', $php88);
$php88 = str_replace('g', 'ⓖ', $php88);
$php88 = str_replace('h', 'ⓗ', $php88);
$php88 = str_replace('i', 'ⓘ', $php88);
$php88 = str_replace('j', 'ⓙ', $php88);
$php88 = str_replace('k', 'ⓚ', $php88);
$php88 = str_replace('l', 'ⓛ', $php88);
$php88 = str_replace('m', 'ⓜ', $php88);
$php88 = str_replace('n', 'ⓝ', $php88);
$php88 = str_replace('o', 'ⓞ', $php88);
$php88 = str_replace('p', 'ⓟ', $php88);
$php88 = str_replace('q', 'ⓠ', $php88);
$php88 = str_replace('r', 'ⓡ', $php88);
$php88 = str_replace('s', 'ⓢ', $php88);
$php88 = str_replace('t', 'ⓣ', $php88);
$php88 = str_replace('u', 'ⓤ', $php88);
$php88 = str_replace('v', 'ⓥ', $php88);
$php88 = str_replace('w', 'ⓦ', $php88);
$php88 = str_replace('x', 'ⓧ', $php88);
$php88 = str_replace('y', 'ⓨ', $php88);
$php88 = str_replace('z', 'ⓩ', $php88);

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$php88."".$smile
   ]);
}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $items = ['، 🍕💕#','❥⁽🍿₎ٰ⇣ᴗ̈
','.⏳🧡:)','،🗞❤️#!','،🗞❤️#!
','، 🌼🖇"⌗
','««🍟🌿','،🌼🖤) ء','،🥀💛) ء','،📆🌼) ء','(⏰💛ء','،"(🥀💔"ء','،"(✨✊🏽"ء','،♥️🌿) ء','،"(💛🔐 ء','!،🙂💔 ء','،💤🌿،!','،🔐🌸)','،🕸💛،','،!👀💚،','،💆🏼💛) ء
','!🥀🎼 ، ⇣','!🥀🎼 ، ⇣','،!👅🌸) ء','،! 🚜💕 ⇣','،"(🔐💜 ء','،"(🔐💜 ء','⇡ ،💗🎧 ٰء
',];
  $_smile = array_rand($items,1);
  $smile = $items[$_smile];
   $count = count($text);
   $php88 = $text;
$php88 = str_replace('a','⎛α⎞',$php88); 
$php88 = str_replace('b','⎛в⎞',$php88); 
$php88 = str_replace('c','⎛c⎞',$php88); 
$php88 = str_replace('d','⎛ɒ⎞',$php88); 
$php88 = str_replace('e','⎛є⎞',$php88); 
$php88 = str_replace('f','⎛f⎞',$php88); 
$php88 = str_replace('g','⎛ɢ⎞',$php88); 
$php88 = str_replace('h','⎛н⎞',$php88); 
$php88 = str_replace('i','⎛ɪ⎞',$php88); 
$php88 = str_replace('j','⎛ᴊ⎞',$php88); 
$php88 = str_replace('s','⎛ĸ⎞',$php88); 
$php88 = str_replace('l','⎛ℓ⎞',$php88); 
$php88 = str_replace('m','⎛м⎞',$php88); 
$php88 = str_replace('n','⎛и⎞',$php88); 
$php88 = str_replace('o','⎛σ⎞',$php88); 
$php88 = str_replace('p','⎛ρ⎞',$php88); 
$php88 = str_replace('q','⎛q⎞',$php88); 
$php88 = str_replace('r','⎛я⎞',$php88); 
$php88 = str_replace('f','⎛s⎞',$php88); 
$php88 = str_replace('t','⎛τ⎞ ',$php88); 
$php88 = str_replace('u','⎛υ⎞ ',$php88); 
$php88 = str_replace('v','⎛v⎞',$php88); 
$php88 = str_replace('w','⎛ω⎞',$php88); 
$php88 = str_replace('x','⎛x⎞',$php88); 
$php88 = str_replace('y','⎛y⎞',$php88); 
$php88 = str_replace('z','⎛z⎞',$php88); 
 
$php88 = str_replace('ض','ضِٰـﮧِۢ',$php88); 
$php88 = str_replace('ص','صِٰـﮧِۢ',$php88); 
$php88 = str_replace('ث','ثِٰـﮧِۢ',$php88); 
$php88 = str_replace('ق','قِٰـﮧِۢ',$php88); 
$php88 = str_replace('ف','فِٰ͒ـِﮧۢ',$php88); 
$php88 = str_replace('غ','غِٰـﮧِۢ',$php88); 
$php88 = str_replace('ع','عِٰـﮧِۢ',$php88); 
$php88 = str_replace('ه','ۿۿہ',$php88); 
$php88 = str_replace('خ','خِٰ̐ـﮧِۢ',$php88); 
$php88 = str_replace('ح','حِٰـﮧِۢ',$php88); 
$php88 = str_replace('ج','جِٰـﮧِۢ',$php88); 
$php88 = str_replace('ش','شِٰـﮧِۢ',$php88); 
$php88 = str_replace('س','سِٰـﮧِۢ',$php88); 
$php88 = str_replace('ي','يِٰـﮧِۢ',$php88); 
$php88 = str_replace('ب','بِٰـِﮧۢ',$php88);
$php88 = str_replace('ل','لِٰـِﮧۢ',$php88); 
$php88 = str_replace('ا','آ',$php88); 
$php88 = str_replace('ت','تِٰـﮧِۢ',$php88); 
$php88 = str_replace('ن','نِٰـﮧِۢ',$php88); 
$php88 = str_replace('م','مِٰـﮧِۢ',$php88); 
$php88 = str_replace('ك','ڪِٰـﮧِۢ',$php88); 
$php88 = str_replace('ة','ةً',$php88); 
$php88 = str_replace('ء','ء',$php88); 
$php88 = str_replace('ظ','ظِٰـﮧِۢ',$php88); 
$php88 = str_replace('ط','طِٰـﮧِۢ',$php88); 
 $php88 = str_replace('ذ','ذٰ',$php88); 
$php88 = str_replace('د','د',$php88); 
$php88 = str_replace('ز','ژ',$php88); 
$php88 = str_replace('ر','رٰ',$php88); 
$php88 = str_replace('و','ﯛ̲୭',$php88); 
 $php88 = str_replace('ى','ىٍ',$php88);
bot('sendMessage',[
        'chat_id'=>$chat_id,
        'text'=>$php88."".$smile
   ]);
}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','ᗩ',$text);
$mroan = str_replace("b","ᗷ",$mroan);
$mroan = str_replace("c","ᑕ",$mroan);
$mroan = str_replace("d","ᗪ",$mroan);
$mroan = str_replace("e","E",$mroan);
$mroan = str_replace("E","E",$mroan);
$mroan = str_replace("g","G",$mroan);
$mroan = str_replace("h","ᕼ",$mroan);
$mroan = str_replace("i","I",$mroan);
$mroan = str_replace("j","ᒍ",$mroan);
$mroan = str_replace("k","K",$mroan);
$mroan = str_replace("l","ᒪ",$mroan);
$mroan = str_replace("m","ᗰ",$mroan);
$mroan = str_replace("n","ᑎ",$mroan);
$mroan = str_replace("o","O",$mroan);
$mroan = str_replace("p","ᑭ",$mroan);
$mroan = str_replace("q","ᑫ",$mroan);
$mroan = str_replace("r","ᖇ",$mroan);
$mroan = str_replace("s","ᔕ",$mroan);
$mroan = str_replace("t","T",$mroan);
$mroan = str_replace("u","ᑌ",$mroan);
$mroan = str_replace("v","ᐯ",$mroan);
$mroan = str_replace("w","ᗯ",$mroan);
$mroan = str_replace("x","᙭",$mroan);
$mroan = str_replace("y","Y",$mroan);
$mroan = str_replace("z","ᘔ",$mroan);

$mroan = str_replace('ض','᎗ᘞ̇',$mroan); 
$mroan = str_replace('ص','᎗ᘗ',$mroan); 
$mroan = str_replace('ث','᎗̇̈ɹ',$mroan); 
$mroan = str_replace('ق','ᓆ',$mroan); 
$mroan = str_replace('ف','ᓅ',$mroan); 
$mroan = str_replace('غ','᎗ჺ',$mroan); 
$mroan = str_replace('ع','᎗ϛ',$mroan); 
$mroan = str_replace('ه','᎗බ',$mroan); 
$mroan = str_replace('خ','ᓘ',$mroan); 
$mroan = str_replace('ح','ᓗ',$mroan); 
$mroan = str_replace('ج','ᓗฺ',$mroan); 
$mroan = str_replace('ش','᎗ɹ̇̈ɹɹ',$mroan); 
$mroan = str_replace('س','᎗ɹɹɹ',$mroan); 
$mroan = str_replace('ي','᎗̤ɹ',$mroan); 
$mroan = str_replace('ب','᎗̣ɹ',$mroan);
$mroan = str_replace('ل','⅃',$mroan); 
$mroan = str_replace('ا','Ȋ',$mroan); 
$mroan = str_replace('ت','᎗̈ɹ',$mroan); 
$mroan = str_replace('ن','᎗̇ɹ',$mroan); 
$mroan = str_replace('ܭ','ك',$mroan); 
$mroan = str_replace('م','ᓄ',$mroan); 
$mroan = str_replace('ة','᎗Ꭷ',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','᎗̇Ь',$mroan); 
$mroan = str_replace('ط','᎗Ь',$mroan); 
 $mroan = str_replace('ذ','̇ↄ',$mroan); 
$mroan = str_replace('د','ↄ',$mroan); 
$mroan = str_replace('ز','j',$mroan); 
$mroan = str_replace('ر','ȷ',$mroan); 
$mroan = str_replace('و','g',$mroan); 
 $mroan = str_replace('ى','ʟɾʅ',$mroan);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$mroan."".$meme
]);}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','Ꭿ',$text);
$mroan = str_replace("b","Ᏸ",$mroan);
$mroan = str_replace("c","Ꮸ",$mroan);
$mroan = str_replace("d","Ꮷ",$mroan);
$mroan = str_replace("e","Ꮛ",$mroan);
$mroan = str_replace("f","Ꭶ",$mroan);
$mroan = str_replace("g","Ᏻ",$mroan);
$mroan = str_replace("h","Ᏺ",$mroan);
$mroan = str_replace("i","Ꭸ",$mroan);
$mroan = str_replace("j","Ꮰ",$mroan);
$mroan = str_replace("k","Ꮵ",$mroan);
$mroan = str_replace("l","Ꮭ",$mroan);
$mroan = str_replace("m","ᗰ",$mroan);
$mroan = str_replace("n","Ꮑ",$mroan);
$mroan = str_replace("o","Ꭷ",$mroan);
$mroan = str_replace("p","Ꭾ",$mroan);
$mroan = str_replace("q","Ꮕ",$mroan);
$mroan = str_replace("r","ᖇ",$mroan);
$mroan = str_replace("s","Ꮥ",$mroan);
$mroan = str_replace("t","Ꮱ",$mroan);
$mroan = str_replace("u","Ꮼ",$mroan);
$mroan = str_replace("v","Ꮙ",$mroan);
$mroan = str_replace("w","Ꮗ",$mroan);
$mroan = str_replace("x","Ꮂ",$mroan);
$mroan = str_replace("y","Ꮍ",$mroan);
$mroan = str_replace("z","ᔓ",$mroan);
                     
$mroan = str_replace('ض','ضٰہٰٖ',$mroan);
$mroan = str_replace('ص','صٰہٰٖ',$mroan);
$mroan = str_replace('ث','ثٰہٰٖ',$mroan);
$mroan = str_replace('ق','قٰہٰٖ',$mroan);
$mroan = str_replace('ف','فٰہٰٖ',$mroan);
$mroan = str_replace('غ','غٰہٰٖ',$mroan);
$mroan = str_replace('ع','عٰہٰٖ',$mroan);
$mroan = str_replace('ه','هٰہٰٖ',$mroan);
$mroan = str_replace('خ','خٰہٰٖ',$mroan);
$mroan = str_replace('ح','حٰہٰٖ',$mroan);
$mroan = str_replace('ج','جٰہٰٖ',$mroan);
$mroan = str_replace('ش','شٰہٰٖ',$mroan);
$mroan = str_replace('س','سٰہٰٖ',$mroan);
$mroan = str_replace('ي','يٰہٰٖ',$mroan);
$mroan = str_replace('ب','بٰہٰٖ',$mroan);
$mroan = str_replace('ل','لہٰٖ',$mroan);
$mroan = str_replace('ا','اٰ',$mroan);
$mroan = str_replace('ت','تٰہٰٖ',$mroan);
$mroan = str_replace('ن','نٰہٰٖ',$mroan);
$mroan = str_replace('م','مٰہٰٖ',$mroan);
$mroan = str_replace('ك','كٰہٰٖ',$mroan);
$mroan = str_replace('ة','ةً',$mroan);
$mroan = str_replace('ء','ء',$mroan);
$mroan = str_replace('ظ','ظٰہٰٖ',$mroan);
$mroan = str_replace('ط','طٰہٰٖ',$mroan);
$mroan = str_replace('ذ','ذٖ',$mroan);
$mroan = str_replace('د','دٰ',$mroan);
$mroan = str_replace('ز','زٖ',$mroan);
$mroan = str_replace('ر','رٰ',$mroan);
$mroan = str_replace('و','وٰ',$mroan);
$mroan = str_replace('ى','ى',$mroan);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$mroan."".$meme
]);}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a',"ᵃ",$text);
$mroan = str_replace("b","ᵇ",$mroan);
$mroan = str_replace("c","ᶜ",$mroan);
$mroan = str_replace("d","ᵈ",$mroan);
$mroan = str_replace("e","ᵉ",$mroan);
$mroan = str_replace("f","ᶠ",$mroan);
$mroan = str_replace("g","ᵍ",$mroan);
$mroan = str_replace("h","ʰ",$mroan);
$mroan = str_replace("i","ᶤ",$mroan);
$mroan = str_replace("j","ʲ",$mroan);
$mroan = str_replace("k","ᵏ",$mroan);
$mroan = str_replace("l","ˡ",$mroan);
$mroan = str_replace("m","ᵐ",$mroan);
$mroan = str_replace("n","ᶰ",$mroan);
$mroan = str_replace("o","ᵒ",$mroan);
$mroan = str_replace("p","ᵖ",$mroan);
$mroan = str_replace("q","ᵠ",$mroan);
$mroan = str_replace("r","ʳ",$mroan);
$mroan = str_replace("s","ˢ",$mroan);
$mroan = str_replace("t","ᵗ",$mroan);
$mroan = str_replace("u","ᵘ",$mroan);
$mroan = str_replace("v","ᵛ",$mroan);
$mroan = str_replace("w","ʷ",$mroan);
$mroan = str_replace("x","ˣ",$mroan);
$mroan = str_replace("y","ʸ",$mroan);
$mroan = str_replace("z","ᶻ",$mroan);
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$mroan."".$meme
]);}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','Ａ',$text);
$mroan = str_replace("b","Ｂ",$mroan);
$mroan = str_replace("c","Ｃ",$mroan);
$mroan = str_replace("d","Ｄ",$mroan);
$mroan = str_replace("e","Ｅ",$mroan);
$mroan = str_replace("E","Ｆ",$mroan);
$mroan = str_replace("g","Ｇ",$mroan);
$mroan = str_replace("h","Ｈ",$mroan);
$mroan = str_replace("i","Ｉ",$mroan);
$mroan = str_replace("j","Ｊ",$mroan);
$mroan = str_replace("k","Ｋ",$mroan);
$mroan = str_replace("l","Ｌ",$mroan);
$mroan = str_replace("m","Ｍ",$mroan);
$mroan = str_replace("n","Ｎ",$mroan);
$mroan = str_replace("o","Ｏ",$mroan);
$mroan = str_replace("p","Ｐ",$mroan);
$mroan = str_replace("q","Ｑ",$mroan);
$mroan = str_replace("r","Ｒ",$mroan);
$mroan = str_replace("s","Ｓ",$mroan);
$mroan = str_replace("t","Ｔ",$mroan);
$mroan = str_replace("u","U",$mroan);
$mroan = str_replace("v","Ｖ",$mroan);
$mroan = str_replace("w","Ｗ",$mroan);
$mroan = str_replace("x","Ｘ",$mroan);
$mroan = str_replace("y","Ｙ",$mroan);
$mroan = str_replace("z","Ｚ",$mroan);

$mroan = str_replace('ع','عٰہٰٖ',$mroan); 
$mroan = str_replace('ض','ضٰہٰٖ ',$mroan); 
$mroan = str_replace('ص','صٰہٰٖ',$mroan); 
$mroan = str_replace('ث','ثٰہٰٖ',$mroan); 
$mroan = str_replace('ق','قٰہٰٖ',$mroan); 
$mroan = str_replace('ف','فٰہٰٖ',$mroan); 
$mroan = str_replace('غ','غٰہٰٖ',$mroan); 
$mroan = str_replace('ه','هٰہٰٖ',$mroan); 
$mroan = str_replace('خ','خٰہٰٖ',$mroan); 
$mroan = str_replace('ح','حٰہٰٖ',$mroan); 
$mroan = str_replace('ج','جٰہٰٖ',$mroan); 
$mroan = str_replace('ش','شٰہٰٖ',$mroan); 
$mroan = str_replace('س','سٰہٰٖ',$mroan); 
$mroan = str_replace('ب','بٰہٰٖ',$mroan); 
$mroan = str_replace('ي','يٰہٰٖ',$mroan);
$mroan = str_replace('ل','لہٰٖ',$mroan); 
$mroan = str_replace('ا','اٰ',$mroan); 
$mroan = str_replace('ت','تٰہٰٖ',$mroan); 
$mroan = str_replace('ن','نٰہٰٖ',$mroan); 
$mroan = str_replace('م','مٰہٰٖ',$mroan); 
$mroan = str_replace('ك','كٰہٰٖ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ظ','ظٰہٰٖ',$mroan); 
$mroan = str_replace('ء','ءِ',$mroan); 
$mroan = str_replace('ذ','ذٖ',$mroan); 
$mroan = str_replace('ط','طٰہٰٖ',$mroan); 
$mroan = str_replace('د','دٰ',$mroan); 
$mroan = str_replace('ز','زٰ',$mroan); 
$mroan = str_replace('ر','رٰ',$mroan); 
$mroan = str_replace('و','وَٰ',$mroan); 
$mroan = str_replace('ى','ىٰ',$mroan); 
 
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$mroan."".$meme
]);}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','𝗔',$text); 
$mroan = str_replace("b","𝗕",$mroan); 
$mroan = str_replace("c","𝗖",$mroan); 
$mroan = str_replace("d","𝗗",$mroan); 
$mroan = str_replace("e","𝗘",$mroan); 
$mroan = str_replace("f","𝗙",$mroan); 
$mroan = str_replace("g","𝗚",$mroan); 
$mroan = str_replace("h","𝗛",$mroan); 
$mroan = str_replace("i","𝗜",$mroan); 
$mroan = str_replace("j","𝗝",$mroan); 
$mroan = str_replace("k","𝗞",$mroan); 
$mroan = str_replace("l","𝗟",$mroan); 
$mroan = str_replace("m","𝗠",$mroan); 
$mroan = str_replace("n","𝗡",$mroan); 
$mroan = str_replace("o","𝗢",$mroan); 
$mroan = str_replace("p","𝗣",$mroan); 
$mroan = str_replace("q","𝗤",$mroan); 
$mroan = str_replace("r","𝗥",$mroan); 
$mroan = str_replace("s","𝗦",$mroan); 
$mroan = str_replace("t","𝗧",$mroan); 
$mroan = str_replace("u","𝗨",$mroan); 
$mroan = str_replace("v","𝗩",$mroan); 
$mroan = str_replace("w","𝗪",$mroan); 
$mroan = str_replace("x","𝗫",$mroan); 
$mroan = str_replace("y","𝗬",$mroan); 
$mroan = str_replace("z","𝗭",$mroan); 
                    
$mroan = str_replace('ض','ضـٰ̲ـہ',$mroan); 
$mroan = str_replace('ص','صـٰ̲ـہ',$mroan); 
$mroan = str_replace('ث','ثـٰ̲ـہ',$mroan); 
$mroan = str_replace('ق','قـٰ̲ـہ',$mroan); 
$mroan = str_replace('ف','فـٰ̲ـہ',$mroan); 
$mroan = str_replace('غ','غـٰ̲ـہ',$mroan); 
$mroan = str_replace('ع','عـٰ̲ـہ',$mroan); 
$mroan = str_replace('ه','هـٰ̲ـہ',$mroan); 
$mroan = str_replace('خ','خـٰ̲ـہ',$mroan); 
$mroan = str_replace('ح','حـٰ̲ـہ',$mroan); 
$mroan = str_replace('ج','جـٰ̲ـہ',$mroan); 
$mroan = str_replace('ش','شـٰ̲ـہ',$mroan); 
$mroan = str_replace('س','سـٰ̲ـہ',$mroan); 
$mroan = str_replace('ي','يـٰ̲ـہ',$mroan); 
$mroan = str_replace('ب','بـٰ̲ـہ',$mroan);
$mroan = str_replace('ل','لـٰ̲ـہ',$mroan); 
$mroan = str_replace('ا','اٰ',$mroan); 
$mroan = str_replace('ت','تـٰ̲ـہ',$mroan); 
$mroan = str_replace('ن','نـٰ̲ـہ',$mroan); 
$mroan = str_replace('م','مـٰ̲ـہ',$mroan); 
$mroan = str_replace('ك','كـٰ̲ـہ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظـٰ̲ـہ',$mroan); 
$mroan = str_replace('ط','طـٰ̲ـہ',$mroan); 
$mroan = str_replace('ذ','ذٰ',$mroan); 
$mroan = str_replace('د','دٰ',$mroan); 
$mroan = str_replace('ز','زٰ',$mroan); 
$mroan = str_replace('ر','رٰ',$mroan); 
$mroan = str_replace('و','وٰ',$mroan); 
$mroan = str_replace('ى','ىَ',$mroan); 

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$mroan."".$meme
]);}



if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','⧼α⧽',$text); 
$mroan = str_replace('b','⧼в⧽',$mroan); 
$mroan = str_replace('c','⧼c⧽',$mroan); 
$mroan = str_replace('d','⧼ɒ⧽',$mroan); 
$mroan = str_replace('e','⧼є⧽',$mroan); 
$mroan = str_replace('f','⧼f⧽',$mroan); 
$mroan = str_replace('g','⧼ɢ⧽',$mroan); 
$mroan = str_replace('h','⧼н⧽',$mroan); 
$mroan = str_replace('i','⧼ɪ⧽',$mroan); 
$mroan = str_replace('j','⧼ᴊ⧽',$mroan); 
$mroan = str_replace('k','⧼ĸ⧽',$mroan); 
$mroan = str_replace('l','⧼ℓ⧽',$mroan); 
$mroan = str_replace('m','⧼м⧽',$mroan); 
$mroan = str_replace('n','⧼и⧽',$mroan); 
$mroan = str_replace('o','⧼σ⧽',$mroan); 
$mroan = str_replace('p','⧼ρ⧽',$mroan); 
$mroan = str_replace('q','⧼q⧽',$mroan); 
$mroan = str_replace('r','⧼я⧽',$mroan); 
$mroan = str_replace('s','⧼s⧽',$mroan); 
$mroan = str_replace('t','⧼τ⧽',$mroan); 
$mroan = str_replace('u','⧼υ⧽',$mroan); 
$mroan = str_replace('v','⧼v⧽',$mroan); 
$mroan = str_replace('w','⧼ω⧽',$mroan); 
$mroan = str_replace('x','⧼x⧽',$mroan); 
$mroan = str_replace('y','⧼y⧽',$mroan); 
$mroan = str_replace('z','⧼z⧽',$mroan); 

$mroan = str_replace('ض','ضـٰ๋۪͜ﮧٰ',$mroan); 
$mroan = str_replace('ص','صـٌٍ๋ۤ͜ﮧْ',$mroan); 
$mroan = str_replace('ث','ث̲ꫭـﮧ',$mroan); 
$mroan = str_replace('ق','قٰٰྀ̲ـِٰ̲ﮧْ',$mroan); 
$mroan = str_replace('ف','',$mroan); 
$mroan = str_replace('غ','فـٌٍ๋ۤ͜ﮧ',$mroan); 
$mroan = str_replace('ع','غـّٰ̐ہٰٰ',$mroan); 
$mroan = str_replace('ه','ٰ̲ھہ',$mroan); 
$mroan = str_replace('خ','خ̲ﮧ',$mroan); 
$mroan = str_replace('ح','ح̲ꪳـﮧ',$mroan); 
$mroan = str_replace('ج','ج̲ꪸـﮧ',$mroan); 
$mroan = str_replace('ش','ش̲ꪾـﮧ',$mroan); 
$mroan = str_replace('س','سـ̷ٰٰﮧْ',$mroan); 
$mroan = str_replace('ي','يـِٰ̲ﮧ',$mroan); 
$mroan = str_replace('ب','ب̲ꪰـﮧ',$mroan);
$mroan = str_replace('ل','لٍُـّٰ̐ہ',$mroan); 
$mroan = str_replace('ا',' ཻا ',$mroan); 
$mroan = str_replace('ت','تـٰۧﮧ',$mroan); 
$mroan = str_replace('ن','نٰ̲̐ـﮧْ',$mroan); 
$mroan = str_replace('م','مٰٰྀ̲ـِٰ̲ﮧْ',$mroan); 
$mroan = str_replace('ك','كـِّﮧْٰٖ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظَـ๋͜ﮧْ',$mroan); 
$mroan = str_replace('ط','ط̲꫁ـﮧ',$mroan); 
 $mroan = str_replace('ذ','ذٖ',$mroan); 
$mroan = str_replace('د','دُ',$mroan); 
$mroan = str_replace('ز','ژٰ',$mroan); 
$mroan = str_replace('ر','',$mroan); 
$mroan = str_replace('و','ﯛ૭',$mroan); 
 $mroan = str_replace('ى','ىِ',$mroan); 

bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$mroan."".$meme
]);}



if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','🅰',$text); 
$mroan = str_replace('b','🅱',$mroan); 
$mroan = str_replace('c','🅲',$mroan); 
$mroan = str_replace('d','🅳',$mroan); 
$mroan = str_replace('e','🅴',$mroan); 
$mroan = str_replace('f','🅵',$mroan); 
$mroan = str_replace('g','🅶',$mroan); 
$mroan = str_replace('h','🅷',$mroan); 
$mroan = str_replace('i','🅸',$mroan); 
$mroan = str_replace('j','🅹',$mroan); 
$mroan = str_replace('k','🅺',$mroan); 
$mroan = str_replace('l','🅻',$mroan); 
$mroan = str_replace('m','🅼',$mroan); 
$mroan = str_replace('n','🅽',$mroan); 
$mroan = str_replace('o','🅾',$mroan); 
$mroan = str_replace('p','🅿',$mroan); 
$mroan = str_replace('q','🆀',$mroan); 
$mroan = str_replace('r','🆁',$mroan); 
$mroan = str_replace('s','🆂',$mroan); 
$mroan = str_replace('t','🆃',$mroan); 
$mroan = str_replace('u',' 🆄',$mroan); 
$mroan = str_replace('v','🆅',$mroan); 
$mroan = str_replace('w','🆆',$mroan); 
$mroan = str_replace('x','🆇',$mroan); 
$mroan = str_replace('y','🆈',$mroan); 
$mroan = str_replace('z','🆉',$mroan); 
 
$mroan = str_replace('ض','ضـ๋͜‏ـﮧ ',$mroan); 
$mroan = str_replace('ص','صـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ث','ثـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ق','قـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ف','ف͒ـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('غ','غـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ع','عـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ه','ۿۿہ',$mroan); 
$mroan = str_replace('خ','خ̐ـ๋͜‏ـﮧ ',$mroan); 
$mroan = str_replace('ح','حـ๋͜‏ـﮧ ',$mroan); 
$mroan = str_replace('ج','جـ๋͜‏ـﮧ ',$mroan); 
$mroan = str_replace('ش','شـ๋͜‏ـﮧ ',$mroan); 
$mroan = str_replace('س','سـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ي',' يـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ب','  بـ๋͜‏ـﮧ',$mroan);
$mroan = str_replace('ل',' لـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ا','آ',$mroan); 
$mroan = str_replace('ت','  تـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ن','نـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('م','مـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ك','ڪـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظـ๋͜‏ـﮧ',$mroan); 
$mroan = str_replace('ط','طـ๋͜‏ـﮧ',$mroan); 
 $mroan = str_replace('ذ','ذِ',$mroan); 
$mroan = str_replace('د','دٰ',$mroan); 
$mroan = str_replace('ز','زً',$mroan); 
$mroan = str_replace('ر','ر',$mroan); 
$mroan = str_replace('و','ﯛ̲୭',$mroan); 
 $mroan = str_replace('ى','ىٰ',$mroan);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$mroan."".$meme
]);}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','⎛α⎞',$text); 
$mroan = str_replace('b','⎛в⎞',$mroan); 
$mroan = str_replace('c','⎛c⎞',$mroan); 
$mroan = str_replace('d','⎛ɒ⎞',$mroan); 
$mroan = str_replace('e','⎛є⎞',$mroan); 
$mroan = str_replace('f','⎛f⎞',$mroan); 
$mroan = str_replace('g','⎛ɢ⎞',$mroan); 
$mroan = str_replace('h','⎛н⎞',$mroan); 
$mroan = str_replace('i','⎛ɪ⎞',$mroan); 
$mroan = str_replace('j','⎛ᴊ⎞',$mroan); 
$mroan = str_replace('k','⎛ĸ⎞',$mroan); 
$mroan = str_replace('l','⎛ℓ⎞',$mroan); 
$mroan = str_replace('m','⎛м⎞',$mroan); 
$mroan = str_replace('n','⎛и⎞',$mroan); 
$mroan = str_replace('o','⎛σ⎞',$mroan); 
$mroan = str_replace('p','⎛ρ⎞',$mroan); 
$mroan = str_replace('q','⎛q⎞',$mroan); 
$mroan = str_replace('r','⎛я⎞',$mroan); 
$mroan = str_replace('s','⎛s⎞',$mroan); 
$mroan = str_replace('t','⎛τ⎞ ',$mroan); 
$mroan = str_replace('u','⎛υ⎞ ',$mroan); 
$mroan = str_replace('v','⎛v⎞',$mroan); 
$mroan = str_replace('w','⎛ω⎞',$mroan); 
$mroan = str_replace('x','⎛x⎞',$mroan); 
$mroan = str_replace('y','⎛y⎞',$mroan); 
$mroan = str_replace('z','⎛z⎞',$mroan); 
 
$mroan = str_replace('ض','ضِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ص','صِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ث','ثِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ق','قِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ف','فِٰ͒ـِﮧۢ',$mroan); 
$mroan = str_replace('غ','غِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ع','عِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ه','ۿۿہ',$mroan); 
$mroan = str_replace('خ','خِٰ̐ـﮧِۢ',$mroan); 
$mroan = str_replace('ح','حِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ج','جِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ش','شِٰـﮧِۢ',$mroan); 
$mroan = str_replace('س','سِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ي','يِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ب','بِٰـِﮧۢ',$mroan);
$mroan = str_replace('ل','لِٰـِﮧۢ',$mroan); 
$mroan = str_replace('ا','آ',$mroan); 
$mroan = str_replace('ت','تِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ن','نِٰـﮧِۢ',$mroan); 
$mroan = str_replace('م','مِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ك','ڪِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ط','طِٰـﮧِۢ',$mroan); 
 $mroan = str_replace('ذ','ذٰ',$mroan); 
$mroan = str_replace('د','د',$mroan); 
$mroan = str_replace('ز','ژ',$mroan); 
$mroan = str_replace('ر','رٰ',$mroan); 
$mroan = str_replace('و','ﯛ̲୭',$mroan); 
 $mroan = str_replace('ى','ىٍ',$mroan);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$mroan."".$meme
]);}



if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','̶a̶',$text); 
$mroan = str_replace('b','b̶',$mroan); 
$mroan = str_replace('c','c̶',$mroan); 
$mroan = str_replace('d','d̶',$mroan); 
$mroan = str_replace('e','e̶',$mroan); 
$mroan = str_replace('f','f̶',$mroan); 
$mroan = str_replace('g','g̶',$mroan); 
$mroan = str_replace('h','h̶',$mroan); 
$mroan = str_replace('i','i̶',$mroan); 
$mroan = str_replace('j','j̶',$mroan); 
$mroan = str_replace('k','k̶',$mroan); 
$mroan = str_replace('l','l̶',$mroan); 
$mroan = str_replace('m','m̶',$mroan); 
$mroan = str_replace('n','n̶',$mroan); 
$mroan = str_replace('o','o̶',$mroan); 
$mroan = str_replace('p','p̶',$mroan); 
$mroan = str_replace('q','q̶',$mroan); 
$mroan = str_replace('r','r̶',$mroan); 
$mroan = str_replace('s','s̶',$mroan); 
$mroan = str_replace('t','t̶',$mroan); 
$mroan = str_replace('u','ᵘ̶ ',$mroan); 
$mroan = str_replace('v','v̶',$mroan); 
$mroan = str_replace('w','w̶',$mroan); 
$mroan = str_replace('x','x̶',$mroan); 
$mroan = str_replace('y','y̶',$mroan); 
$mroan = str_replace('z','z̶',$mroan); 

 $mroan = str_replace('ض','ضۜہٰٰ',$mroan); 
$mroan = str_replace('ص','صۛہٰٰ',$mroan); 
$mroan = str_replace('ث','ثہٰٰ',$mroan); 
$mroan = str_replace('ق','قྀ̲ہٰٰٰ',$mroan); 
$mroan = str_replace('ف','ف͒ہٰٰ',$mroan); 
$mroan = str_replace('غ','غہٰٰ',$mroan); 
$mroan = str_replace('ع','ۤ؏ـ',$mroan); 
$mroan = str_replace('ه','ھہ',$mroan); 
$mroan = str_replace('خ','خٰ̐ہ',$mroan); 
$mroan = str_replace('ح','حہٰٰ',$mroan); 
$mroan = str_replace('ج','جْۧ ',$mroan); 
$mroan = str_replace('ش','شِٰہٰٰ',$mroan); 
$mroan = str_replace('س','سٰٰٓ',$mroan); 
$mroan = str_replace('ي','يِٰہ',$mroan); 
$mroan = str_replace('ب','بّہ',$mroan);
$mroan = str_replace('ل','ل',$mroan); 
$mroan = str_replace('ا','آ',$mroan); 
$mroan = str_replace('ت',' تَہَٰ',$mroan); 
$mroan = str_replace('ن','نَِٰہ',$mroan); 
$mroan = str_replace('ك','ڪٰྀہٰٰٖ',$mroan); 
$mroan = str_replace('م','مـ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظۗـہٰٰ',$mroan); 
$mroan = str_replace('ط','طۨہٰٰ',$mroan); 
 $mroan = str_replace('ذ','ذِ',$mroan); 
$mroan = str_replace('د','دُ',$mroan); 
$mroan = str_replace('ز','ژ',$mroan); 
$mroan = str_replace('ر','رٰ',$mroan); 
$mroan = str_replace('و','وً',$mroan); 
 $mroan = str_replace('ى','ى',$mroan);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$mroan."".$meme
]);}


if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){
  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','🅐',$text); 
$mroan = str_replace("b","🅑",$mroan); 
$mroan = str_replace("c","🅒",$mroan); 
$mroan = str_replace("d","🅓",$mroan); 
$mroan = str_replace("e","🅔",$mroan); 
$mroan = str_replace("f","🅕",$mroan); 
$mroan = str_replace("g","🅖",$mroan); 
$mroan = str_replace("h","🅗",$mroan); 
$mroan = str_replace("i","🅘",$mroan); 
$mroan = str_replace("j","🅙",$mroan); 
$mroan = str_replace("k","🅚",$mroan); 
$mroan = str_replace("l","🅛",$mroan); 
$mroan = str_replace("m","🅜",$mroan); 
$mroan = str_replace("n","🅝",$mroan); 
$mroan = str_replace("o","🅞",$mroan); 
$mroan = str_replace("p","🅟",$mroan); 
$mroan = str_replace("q","🅠",$mroan); 
$mroan = str_replace("r","🅡",$mroan); 
$mroan = str_replace("s","🅢",$mroan); 
$mroan = str_replace("t","🅣",$mroan); 
$mroan = str_replace("u"," 🅤",$mroan); 
$mroan = str_replace("v","🅥",$mroan); 
$mroan = str_replace("w","🅦",$mroan); 
$mroan = str_replace("x","🅧",$mroan); 
$mroan = str_replace("y","🅨",$mroan); 
$mroan = str_replace("z","🅩",$mroan); 
 
$mroan = str_replace('ض','ضً',$mroan); 
$mroan = str_replace('ص','صً',$mroan); 
$mroan = str_replace('ث','ثہ',$mroan); 
$mroan = str_replace('ق','قہً',$mroan); 
$mroan = str_replace('ف','فُہ',$mroan); 
$mroan = str_replace('غ','غہ',$mroan); 
$mroan = str_replace('ع','عہُ',$mroan); 
$mroan = str_replace('ه','ه',$mroan); 
$mroan = str_replace('خ','خہ',$mroan); 
$mroan = str_replace('ح','حہ',$mroan); 
$mroan = str_replace('ج','جہ',$mroan); 
$mroan = str_replace('ش','شہ',$mroan); 
$mroan = str_replace('س','سہ',$mroan); 
$mroan = str_replace('ي','يہ',$mroan); 
$mroan = str_replace('ب',' ٻً',$mroan);
$mroan = str_replace('ل','لہ',$mroan); 
$mroan = str_replace('ا',' ٳ',$mroan); 
$mroan = str_replace('ت','تہ',$mroan); 
$mroan = str_replace('ن','نٍ',$mroan); 
$mroan = str_replace('ك','كُہ',$mroan); 
$mroan = str_replace('م','مْ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظً',$mroan); 
$mroan = str_replace('ط','طہ',$mroan); 
 $mroan = str_replace('ذ','ذً',$mroan); 
$mroan = str_replace('د','دِ',$mroan); 
$mroan = str_replace('ز','زً',$mroan); 
$mroan = str_replace('ر','ڒٍ',$mroan); 
$mroan = str_replace('و','وٌ',$mroan); 
 $mroan = str_replace('ى','ىّ',$mroan);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'text'=>$mroan."".$meme
]);}

if($text and !$data and $text!= '/start' and $text !='/admin' and $text !='الاعضاء' and  file_get_contents("data/zkref/$from_id/zeakef.txt") =='MROAN0'){

  $ss = [' •🌱💚﴿ֆ ❥', '🍿﴿ֆ ❥', '• 🌸💸 ❥˓  ', '🖤🌞﴿ֆ', ' • 🐼🌿﴾ֆ', ' •🙊💙﴿ֆ ❥', '-💁🏼‍♂️✨﴿ֆ ❥ ', '•|• 〄💖‘',
                        ' ⚡️🌞 •|•℡', '- ⁽🙆‍♂️✨₎ֆ', '❥┇💁🏼‍♂️🔥“', '💜💭℡ֆ', '-┆💙🙋🏼‍♂️♕', '- ⁽🙆🏻🍿₎ֆ',
                        '“̯ 🐼💗 |℡', '⁞ 🐝🍷', '┋⁽❥̚͢₎ 🐣💗', '•|• ✨🌸‘', '  ֆ 💭💔ۦ', 'ֆ 💛💭ۦ', 'ֆ ⚡️🔱ۦ',
                        '℡ᴖ̈💜✨⋮', '⋮⁽🌔☄️₎ۦ˛', '⁞❉💥┋♩', ' ⁞✦⁽☻🔥₎“ٰۦ', '℡ ̇₎ ✨🐯⇣✦', '⁞♩⁽🌞🌩₎⇣✿',
                        'ۦٰ‏┋❥ ͢˓🦁💛ۦ‏', '⚡️♛ֆ₎', '♛⇣🐰☄️₎✦', '⁾⇣✿💖┊❥', ' ₎✿💥😈 ⁞“❥', '😴🌸✿⇣', '❥┊⁽ ℡🦁🌸'];
  $zz = array_rand($ss,1);
  $meme = $ss[$zz];
   $count = count($text); 
$mroan = str_replace('a','⎛α⎞',$text); 
$mroan = str_replace('b','⎛в⎞',$mroan); 
$mroan = str_replace('c','⎛c⎞',$mroan); 
$mroan = str_replace('d','⎛ɒ⎞',$mroan); 
$mroan = str_replace('e','⎛є⎞',$mroan); 
$mroan = str_replace('f','⎛f⎞',$mroan); 
$mroan = str_replace('g','⎛ɢ⎞',$mroan); 
$mroan = str_replace('h','⎛н⎞',$mroan); 
$mroan = str_replace('i','⎛ɪ⎞',$mroan); 
$mroan = str_replace('j','⎛ᴊ⎞',$mroan); 
$mroan = str_replace('k','⎛ĸ⎞',$mroan); 
$mroan = str_replace('l','⎛ℓ⎞',$mroan); 
$mroan = str_replace('m','⎛м⎞',$mroan); 
$mroan = str_replace('n','⎛и⎞',$mroan); 
$mroan = str_replace('o','⎛σ⎞',$mroan); 
$mroan = str_replace('p','⎛ρ⎞',$mroan); 
$mroan = str_replace('q','⎛q⎞',$mroan); 
$mroan = str_replace('r','⎛я⎞',$mroan); 
$mroan = str_replace('s','⎛s⎞',$mroan); 
$mroan = str_replace('t','⎛τ⎞ ',$mroan); 
$mroan = str_replace('u','⎛υ⎞ ',$mroan); 
$mroan = str_replace('v','⎛v⎞',$mroan); 
$mroan = str_replace('w','⎛ω⎞',$mroan); 
$mroan = str_replace('x','⎛x⎞',$mroan); 
$mroan = str_replace('y','⎛y⎞',$mroan); 
$mroan = str_replace('z','⎛z⎞',$mroan); 
 
$mroan = str_replace('ض','ضِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ص','صِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ث','ثِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ق','قِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ف','فِٰ͒ـِﮧۢ',$mroan); 
$mroan = str_replace('غ','غِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ع','عِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ه','ۿۿہ',$mroan); 
$mroan = str_replace('خ','خِٰ̐ـﮧِۢ',$mroan); 
$mroan = str_replace('ح','حِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ج','جِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ش','شِٰـﮧِۢ',$mroan); 
$mroan = str_replace('س','سِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ي','يِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ب','بِٰـِﮧۢ',$mroan);
$mroan = str_replace('ل','لِٰـِﮧۢ',$mroan); 
$mroan = str_replace('ا','آ',$mroan); 
$mroan = str_replace('ت','تِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ن','نِٰـﮧِۢ',$mroan); 
$mroan = str_replace('م','مِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ك','ڪِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ة','ةً',$mroan); 
$mroan = str_replace('ء','ء',$mroan); 
$mroan = str_replace('ظ','ظِٰـﮧِۢ',$mroan); 
$mroan = str_replace('ط','طِٰـﮧِۢ',$mroan); 
 $mroan = str_replace('ذ','ذٰ',$mroan); 
$mroan = str_replace('د','د',$mroan); 
$mroan = str_replace('ز','ژ',$mroan); 
$mroan = str_replace('ر','رٰ',$mroan); 
$mroan = str_replace('و','ﯛ̲୭',$mroan); 
 $mroan = str_replace('ى','ىٍ',$mroan);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
'parse_mode'=>"Markdown",
'text'=>$mroan."".$meme 
]);
bot('sendMessage',[ 
'chat_id'=>$chat_id, 
"text"=>' • ⚜┇تم زخرفهہ اسمڪ  ',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'🔙' ,'callback_data'=>"hoome"]],
]])
]);
}

if($data=="hoome"){
bot('editMessageText',[
'chat_id'=>$chat_id,
'message_id'=>$message_id,
'text'=>"

$start
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎

",
 'parse_mode'=>"html",
'reply_to_message_id'=>$message->message_id,
'disable_web_page_preview'=> true ,
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"- زخرفك اسمك 🎯", 'callback_data'=>'ZREF']],
[['text'=>"-صنع بايو انستقرام📌", 'callback_data'=>'bio']],
]
])]);
unlink("data/zkref/$from_id/zeakef.txt");
unlink("data/mroan941/$from_id/inasgram.txt");
}

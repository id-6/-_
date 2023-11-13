<<?php

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

#الازرار
if($start=="non"){
$start="لم يتم تعيين كليشة /start من قبل الادمن ";
}



if($text == "/start" and in_array($from_id,$sudo)){

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا قم باختيار مايناسبة
 ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"إضافة زر ",'callback_data'=>"addz"]],[['text'=>"إضافة أزرار داخل زر",'callback_data'=>"addzs"]],
[['text'=>"تعديل  زر",'callback_data'=>"tedilz"]],
[['text'=>"حذف زر  ",'callback_data'=>"delz"]],
[['text'=>"تحديث الازرار للمستخدمين",'callback_data'=>"update"]],
[['text'=>"إخفاء الازرار للمستخدمين",'callback_data'=>"remove"]],
[['text'=>"نسخ الازرار",'callback_data'=>"bakeup"],['text'=>"رفع نسخة ازرار",'callback_data'=>"uplode"]],

]
])
]);
}

$azrar = json_decode(file_get_contents("data/azrar.json"),true);
if (!file_exists("data/azrar.json")) {
 $put = [];
 file_put_contents("data/azrar.json", json_encode($put));
}

$amraz=$azrar["info"]["amr"];
if($data == "addz"){

$azrar["info"]["amr"]="$data" ;
#$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"اهلا عزيزي المطور قم بارسال نص اسم الزر الذي تريد اضافتة 
 ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"تراجع",'callback_data'=>"home"]],
]
])
]);
}

if($text and $amraz == "addz" and in_array($from_id, $sudo)){
$rand=rand(111111,999999);

bot('sendmessage',[
 'chat_id'=>$chat_id,
'text'=>"تم حفظ اسم الزر الجديد بنجاح
هذا هو اسم الزر الذي قمت بإضافتة 
$text

- قم الان بارسال محتوى الزر 
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"تراجع",'callback_data'=>"null"]],
]
])
]);
$azrar["info"]["amr"]="addztext" ;
$azrar["info"]["name"]="$text";
$azrar["info"]["rand"]="$rand";


#$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));

} 
 ###KhAlEdJ### 
$randaz=$azrar["info"]["rand"];
$nameaz=$azrar["info"]["name"];
$randaz2=$azrar["info"]["rand2"];
$nameaz2=$azrar["info"]["name2"];

$photo=$message->photo;
$video=$message->video;
$document=$message->document;
$sticker=$message->sticker;
$voice=$message->voice;
$audio=$message->audio;


if($message and  in_array($from_id,$sudo) ){

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


}






if($message and !$data and $amraz == "addztext" and in_array($from_id, $sudo)){

if($text){

bot('sendmessage',[
 'chat_id'=>$chat_id,
'text'=>"تم حفظ محتوى الزر الذي قمت بإضافتة 
المحتوى هو :
$text
اذا اردت زر اخر قم بالضغط على ➕ 
او قم بالضغط على حفظ لحفظ الزر 
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"حفظ",'callback_data'=>"sive"]],
[['text'=>"$nameaz",'callback_data'=>"null"]],
]
])
]);
$azrar["info"]["amr"]="null" ;
$azrar["info"]["انشاء"]["tepy"]="1";
$azrar["info"]["انشاء"]["name"]="$nameaz";
$azrar["info"]["انشاء"]["send"]="text";
$azrar["info"]["انشاء"]["text"]="$text";

$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));

}else{


$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"حفظ",'callback_data'=>"sive"]],
[['text'=>"$nameaz",'callback_data'=>"null"]
],
]
])
]);

$azrar["info"]["amr"]="null" ;
$azrar["info"]["انشاء"]["tepy"]="1";
$azrar["info"]["انشاء"]["name"]="$nameaz";
$azrar["info"]["انشاء"]["send"]="$sens";
$azrar["info"]["انشاء"]["file_id"]="$file_id";
$azrar["info"]["انشاء"]["caption"]="$caption";
$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));



}
} 
 ###KhAlEdJ### 

$randaz=$azrar["info"]["rand"];
$nameaz=$azrar["info"]["انشاء"]["name"];
$textaz=$azrar["info"]["انشاء"]["text"];
$sendjson=$azrar["info"]["انشاء"]["send"];
$filejson=$azrar["info"]["انشاء"]["file_id"];
$captionjson=$azrar["info"]["انشاء"]["caption"];
if($data == "sive"){
$azrar = json_decode(file_get_contents("azrar.json"),true);
if($sendjson=="text"){
$azrar["info"]["array"]["$nameaz"]="$randaz";
$azrar["info"]["azrar"][$randaz]["tepy"]="1";
$azrar["info"]["azrar"][$randaz]["name"]="$nameaz";
$azrar["info"]["azrar"][$randaz]["send"]="text";
$azrar["info"]["azrar"][$randaz]["text"]="$textaz";
}else{
$azrar["info"]["array"]["$nameaz"]="$randaz";
$azrar["info"]["azrar"][$randaz]["tepy"]="1";
$azrar["info"]["azrar"][$randaz]["name"]="$nameaz";
$azrar["info"]["azrar"][$randaz]["send"]="$sendjson";
$azrar["info"]["azrar"][$randaz]["file_id"]="$filejson";
$azrar["info"]["azrar"][$randaz]["caption"]="$captionjson";

}





file_put_contents("data/azrar.json", json_encode($azrar));

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم حفظ الازرار بنجاح ",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"تراجع",'callback_data'=>"delzs"]],
]
])
]);
unset($azrar["info"]["انشاء"]);
$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));
} 
 ###KhAlEdJ### 
 

 
if($text == "/start" or $text == "🏠 الصفحة الرئيسية"){
$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$orothe= $azrar["info"]["azrar"];
#$json=json_decode($azrars);

#$keyboard["keyboard"]=[];
foreach($orothe as $co ){

#$info=json_decode($info);
$namezrar= $co["name"];
$tepy= $co["tepy"];

if($tepy!="no"){
if($tepy=="2" and $i !=1){
$i=1;
$k1=$namezrar;
$tepy=null;
}
if($tepy=="2" and $i ==1){
$k=[['text'=>$namezrar],['text'=>$k1]];

$keyboard[] =$k;
$i=0;
}

if($tepy=="1" and $i==1){
$k1=[['text'=>$k1]];
$keyboard[] =$k1;
$k=[['text'=>$namezrar]];

$keyboard[] =$k;
$tepy=null;
$i=0;
}
if($tepy=="1" and $i!=1){
$keyboard[] = [['text'=>"$namezrar"]];

}


}
 
}
if( $i==1){
$k1=[['text'=>$k1]];
$keyboard[] =$k1;

$tepy=null;
$i=0;
}
$keyboard[] = [['text'=>"🏠 الصفحة الرئيسية"]];
 $reply_markup = json_encode(['one_time_keyboard'=>true,'resize_keyboard'=>true,'keyboard'=> $keyboard ]);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>".$start
",
'parse_mode'=>html,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
#'resize_keyboard'=>true,
#'one_time_keyboard'=>true,
'reply_markup'=>$reply_markup
]);

}

$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$code= $azrar["info"]["array"][$text];

if($code !=null){

$textaz= $azrar["info"]["azrar"][$code]["text"];
$sendjson= $azrar["info"]["azrar"][$code]["send"];
$file_idjson= $azrar["info"]["azrar"][$code]["file_id"];

$captionjson= $azrar["info"]["azrar"][$code]["caption"];



$azrars= $azrar["info"]["azrar"][$code]["azrar"];

if($azrars!=null){

foreach($azrars as $co ){

$orothe= $azrar["info"]["azrar"][$co];

$namezrar= $orothe["name"];



$keyboard[] = [['text'=>"$namezrar"]];

}
$keyboard[] = [['text'=>"🏠 الصفحة الرئيسية"]];

$reply_markup = json_encode(['one_time_keyboard'=>true,'resize_keyboard'=>true,'keyboard'=> $keyboard ]);


}

if($sendjson=="text"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
$textaz
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,

'reply_markup'=>$reply_markup
]);
}else{
$sss=str_replace("send","",$sendjson);
bot($sendjson,[
"chat_id"=>$chat_id,
"$sss"=>"$file_idjson",
'caption'=>"$captionjson",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);



}
} 
 ###KhAlEdJ### 
if($data == "addzs"){
$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$orothe= $azrar["info"]["azrar"];
#$json=json_decode($azrars);

#$keyboard["keyboard"]=[];
foreach($orothe as $co=>$name ){

#$info=json_decode($info);
$namezrar= $name["name"];
$ss="- $namezrar \n /add_$co\n";
$info=$info.$ss;


}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"هذة قائمة الازرار قم باختيار الزر الذي تريد الازرار له 
$info",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
#'resize_keyboard'=>true,
#'one_time_keyboard'=>true,
'reply_markup'=>$reply_markup
]);
}
if (stristr($text,"/add_") )
{
$text=str_replace("/add_","",$text);
file_put_contents("code.txt","$text");
$azrar = json_decode(file_get_contents("data/azrar.json"),true);

bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" حسنا عزيزي 
تستطيع اضافه اكثر من زر داخل هذا الزر {$namezr } 
لإضافة زر قم بارسال اسم الزر الان :",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
#'resize_keyboard'=>true,
#'one_time_keyboard'=>true,
'reply_markup'=>$reply_markup
]);
$azrar = json_decode(file_get_contents("azrar.json"),true);
$azrar["info"]["amr"]="azrars";

file_put_contents("data/azrar.json", json_encode($azrar));



}


if($text and $amraz == "azrars" and in_array($from_id, $sudo)){
$code = file_get_contents("code.txt");
$azrar = json_decode(file_get_contents("data/azrar.json"),true);

$namezr= $azrar["info"]["azrar"][$code]["name"];








$rand=rand(111111,999999);

$azrar["info"]["rand"]="$rand";

$azrar["info"]["azrar"][$code]["azrar"][]="$rand";
$azrar["info"]["amr"]="addztext2" ;
$azrar["info"]["name"]="$text";


bot('sendmessage',[
 'chat_id'=>$chat_id,
'text'=>"تم حفظ اسم الزر الجديد بنجاح 
- اسم الزر : $text 
- داخل زر : $namezr

! قم بارسال محتوى الزرار ...

",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"تراجع",'callback_data'=>"null"]],
]
])
]);
file_put_contents("data/azrar.json", json_encode($azrar));

}

$nameaz=$azrar["info"]["name"];

if($message and !$data and $amraz == "addztext2" and in_array($from_id, $sudo)){

if($text){

bot('sendmessage',[
 'chat_id'=>$chat_id,
'text'=>"تم حفظ محتوى الزر الذي قمت بإضافتة 
المحتوى هو :
$text
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"$nameaz",'callback_data'=>"null"]],
]
])
]);
$azrar["info"]["array"]["$nameaz"]="$randaz";
$azrar["info"]["azrar"][$randaz]["tepy"]="no";
$azrar["info"]["azrar"][$randaz]["name"]="$nameaz";
$azrar["info"]["azrar"][$randaz]["send"]="text";
$azrar["info"]["azrar"][$randaz]["text"]="$text";

}else{


$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[


[['text'=>"$nameaz",'callback_data'=>"null"]
],
]
])
]);

$azrar["info"]["array"]["$nameaz"]="$randaz";
$azrar["info"]["azrar"][$randaz]["tepy"]="no";
$azrar["info"]["azrar"][$randaz]["name"]="$nameaz";
$azrar["info"]["azrar"][$randaz]["send"]="$sens";
$azrar["info"]["azrar"][$randaz]["file_id"]="$file_id";
$azrar["info"]["azrar"][$randaz]["caption"]="$caption";


}
$azrar["info"]["amr"]="null" ;
file_put_contents("data/azrar.json", json_encode($azrar));

} 
 ###KhAlEdJ### 


if($data == "delz"){
$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$orothe= $azrar["info"]["azrar"];
#$json=json_decode($azrars);

#$keyboard["keyboard"]=[];
foreach($orothe as $co=>$name ){

#$info=json_decode($info);
$namezrar= $name["name"];
$ss="- $namezrar \n /delete_$co\n";
$info=$info.$ss;


}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"هذة قائمة الازرار قم بإختيار الزر الذي تريد حذفة 
$info",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
#'resize_keyboard'=>true,
#'one_time_keyboard'=>true,
'reply_markup'=>$reply_markup
]);
}
if (stristr($text,"/delete_") )
{
$text=str_replace("/delete_","",$text);

$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$namezr= $azrar["info"]["azrar"][$text]["name"];


bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"تم حذف هذا الزر بنجاح 
نص الزر - $namezr
كود الزر - $text",
#'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
#'resize_keyboard'=>true,
#'one_time_keyboard'=>true,
'reply_markup'=>$reply_markup
]);
$azrar = json_decode(file_get_contents("azrar.json"),true);

$azrars= $azrar["info"]["azrar"][$text]["azrar"];
if($azrars!=null){

foreach($azrars as $co ){

$orothe= $azrar["info"]["azrar"][$co];

$namezrar= $orothe["name"];

unset($azrar["info"]["array"][$namezrar]);
unset($azrar["info"]["azrar"][$co]);

}}

unset($azrar["info"]["array"][$namezr]);
unset($azrar["info"]["azrar"][$text]);

$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));



} 
 ###KhAlEdJ### 

if($data == "tedilz"){
$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$orothe= $azrar["info"]["azrar"];
#$json=json_decode($azrars);

#$keyboard["keyboard"]=[];
foreach($orothe as $co=>$name ){

#$info=json_decode($info);
$namezrar= $name["name"];
$ss="- $namezrar \n /t3dil_n_$co : /t3dil_m_$co\n";
$info=$info.$ss;


}
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" هذة قائمة الازرار قم بإخيار الزر الذي تريد تعديلة 
$info",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,

]);
}
if (stristr($text,"/t3dil_n_") )
{
$text=str_replace("/t3dil_n_","",$text);
file_put_contents("data/code.txt","$text");
$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$namezr= $azrar["info"]["azrar"][$text]["name"];


bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>" حسنا عزيزي 
 هذا هو اسم الزر {$namezr } 
قم بارسال الاسم الجديد للزر لكي يتم تعديلة 
",

'disable_web_page_preview'=>true,
"message_id"=>$message_id,

]);
$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$azrar["info"]["amr"]="t3dil_name";
$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));



}
if($text and $amraz == "t3dil_name" and in_array($from_id, $sudo)){
$code = file_get_contents("data/code.txt");

$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$namezr= $azrar["info"]["azrar"][$code]["name"];

unset($azrar["info"]["array"][$namezr]);

$azrar["info"]["array"]["$text"]="$code";

$azrar["info"]["azrar"][$code]["name"]="$text";




bot('sendmessage',[
 'chat_id'=>$chat_id,
'text'=>"تم تعديل أسم الزر 
من : $namezr

الى : $text
",
"message_id"=>$message_id,
'reply_markup'=>json_encode(['inline_keyboard'=>[

[['text'=>"تراجع",'callback_data'=>"null"]],
]
])
]);

$azrar["info"]["amr"]="null";
$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));

} 
 ###KhAlEdJ### 
if (stristr($text,"/t3dil_m_") )
{
$text=str_replace("/t3dil_m_","",$text);
file_put_contents("data/code.txt","$text");
$azrar = json_decode(file_get_contents("data/azrar.json"),true);



$textaz= $azrar["info"]["azrar"][$text]["text"];
$sendjson= $azrar["info"]["azrar"][$text]["send"];
$file_idjson= $azrar["info"]["azrar"][$text]["file_id"];

$captionjson= $azrar["info"]["azrar"][$text]["caption"];


if($sendjson=="text"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"
هذا هو محتوى الزر 

$textaz

قم بارسال المحتوى الجديد
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,

'reply_markup'=>$reply_markup
]);
}else{
$sss=str_replace("send","",$sendjson);
bot($sendjson,[
"chat_id"=>$chat_id,
"$sss"=>"$file_idjson",
'caption'=>"$captionjson

هذا هو محتوى الزر قم بارسال المحتوى الجديد
",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);



}




$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$azrar["info"]["amr"]="t3dil_text";
$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));



}
if($message and !$data and $amraz == "t3dil_text" and in_array($from_id, $sudo)){
$code = file_get_contents("data/code.txt");

$azrar = json_decode(file_get_contents("data/azrar.json"),true);
$textzr= $azrar["info"]["azrar"][$code]["text"];



if($text){

bot('sendmessage',[
 'chat_id'=>$chat_id,
'text'=>"تم تعديل محتوى الزر الذي قمت بإضافتة 
المحتوى  الاول :
$textzr
المحتوى الجديد
$text
",
"message_id"=>$message_id,

]);
$azrar["info"]["azrar"][$randaz]["send"]="text";
$azrar["info"]["azrar"][$code]["text"]="$text";

}else{


$ss=str_replace("send","",$sens);
bot($sens,[
"chat_id"=>$chat_id,
"$ss"=>"$file_id",
'caption'=>"$caption
- تم تعديل المحتوى بنجاح
",
"message_id"=>$message_id,

]);

$azrar["info"]["azrar"][$randaz]["send"]="$sens";
$azrar["info"]["azrar"][$randaz]["file_id"]="$file_id";
$azrar["info"]["azrar"][$randaz]["caption"]="$caption";


}
$azrar["info"]["amr"]="null" ;
file_put_contents("data/azrar.json", json_encode($azrar));

} 
 ###KhAlEdJ### 
if($data == "bakeup"){

date_default_timezone_set("Asia/Damascus");
$time = date("{h-i-s}");
bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"جاري عمل النسخة الاحتياطية..
",
         ]);
bot('senddocument',[
'chat_id'=>$chat_id,
'document'=>new CURLFile("data/azrar.json"),
'caption'=>"Backup. 📦
Today's date : ".date('Y/m/d')." 📆\n 
The Time is : ".date('h:i A')." ⏰
File size : ",

]);

}



if($data == "uplode"){


bot('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"حسناً عزيزي قم بارسال ملف الازرار لكي يتم رفعة .
",
         ]);
$azrar["info"]["amr"]="uplode";
$json=json_encode($azrar);
file_put_contents("data/azrar.json", json_encode($azrar));
}


$repad = $message->reply_to_message->document;
$aduo = $repad->file_id;
if(isset($repad) and in_array($from_id,$sudo)){
$url = json_decode(file_get_contents('https://api.telegram.org/bot'.API_KEY.'/getFile?file_id='.$aduo),true);
$path = $url['result']['file_path'];
$file = 'https://api.telegram.org/file/bot'.API_KEY.'/'.$path;
$okey = file_put_contents("data/azrar.json",file_get_contents($file));
bot('SendMessage',[
'chat_id'=>$chat_id,
'text'=>"تم رفع نسخه بنجاح.",
]);
}


$memberi = explode("\n",file_get_contents("sudo/member.txt"));
$cuntei = count($memberi)-1;
#update
if($data == "update"){

bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'تحــــــــديث آلڪـــيبورد 
هل انت متاكد من تحديث الكيبورد لجميع المستخدمين ؟!.',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- ✅ نعم ' ,'callback_data'=>"yesupdate"]],

]
])
]);
}




if($data == "yesupdate" and in_array($from_id, $sudo)){

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"⏳جاري تحديث الكيبورد انتظر قليلا من فظلك ",

]);
$keyboard[] = [['text'=>"🏠 الصفحة الرئيسية"]];

$reply_markup = json_encode(['one_time_keyboard'=>true,'resize_keyboard'=>true,'keyboard'=> $keyboard ]);


for($i=0;$i<count($memberi);$i++){
$get =bot('sendmessage',[
'chat_id'=>$memberi[$i], 
'text'=>"تحديث",
'disable_web_page_preview'=>true,
"message_id"=>$message_id,
'reply_markup'=>$reply_markup
]);
}

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"- تم تحديث الكيبورد لجميع الاعضاء ",
]);
}
if($data == "remove"){


bot('EditMessageText',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id,
'text'=>'تحــــــــديث آلڪـــيبورد 
هل انت متاكد من إخفاء الكيبورد لجميع المستخدمين ؟!.',
 'reply_markup'=>json_encode([ 
      'inline_keyboard'=>[
[['text'=>'- ✅ نعم ' ,'callback_data'=>"yesremove"]],

]
])
]);
}


/////////////////markdown


if($data == "yesremove" and in_array($from_id, $sudo)){

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"⏳جاري تحديث الكيبورد انتظر قليلا من فظلك ",

]);

for($i=0;$i<count($memberi);$i++){
$get =bot('sendmessage',[
'chat_id'=>$memberi[$i], 
'text'=>"تحديث
",
'reply_markup'=>json_encode([
'remove_keyboard'=>true,
])
]);
}

bot("sendMessage",[
"chat_id"=>$chat_id,
"text"=>"- تم إخفاء الكيبورد عن جميع الاعضاء ",
]);
} 
 ###KhAlEdJ### 












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
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$message_id = $update->message->message_id;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$text = $message->text;
$name = $message->from->first_name;
$usernme = $message->from->username;
$from_id = $message->from->id;
date_default_timezone_set('Asia/Riyadh');
$date = date('h:i:s'); $d = date('A');
 $aa =preg_replace('/AM/', 'ص', $d);$aa =preg_replace('/PM/', 'م', $d);

date_default_timezone_set('Asia/Baghdad');
$time = date('h:i a');
$year = date('Y');
$month = date('n');
$day = date('j');
$sting = file_get_contents("sting.txt");
$start = file_get_contents("start.txt") ;
$onstart = file_get_contents("onstart.txt");
$tv = file_get_contents("tv.txt");
$reply = file_get_contents("reply.txt");
$send = file_get_contents("send.txt");
$members = explode("\n",file_get_contents("members.txt"));
$band_id = explode("\n",file_get_contents("band_id.txt"));
$memberscount = count($members);
$band_user = explode("\n",file_get_contents("band_user.txt"));
$tw = file_get_contents("tw.txt");
$photo = $update->message->photo;
$video = $update->message->video;
$sticker = $update->message->sticker;
$file = $update->message->document;
$music = $update->message->audio;
$voice = $update->message->voice;
$caption = $message->caption;
$photo_id = $update->message->photo[0]->file_id;
$video_id= $update->message->video->file_id;
$sticker_id = $update->message->sticker->file_id;
$file_id = $update->message->document->file_id;
$music_id = $update->message->audio->file_id;
$voice_id = $update->message->voice->file_id;
 $update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$chat_id = $message->chat->id;
$text = $message->text;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id = $update->callback_query->message->message_id;
$data = $update->callback_query->data;
$from_id = $message->from->id;
$ch1 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@php88&user_id=$from_id");
$ch2 = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@mroan1235&user_id=$from_id");
$check_token = file_get_contents("https://api.telegram.org/bot$text/getWebhookInfo");
$check = json_decode($check_token);
$get_file = file_get_contents('mroan.php');
$get_done = file_get_contents('make/ex.txt');
$name = $message->from->first_name;
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



//السور

if($data=="startaa"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم ، 🗂'

- اختر اسم القارىء من الاسفل 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"عبد الرحمن السديسي",'callback_data'=>'sodes']],
[['text'=>"ماهر المعيقلي",'callback_data'=>'meaqly'],['text'=>"عبد الباسط عبد الصمد",'callback_data'=>'samad']],
[['text'=>"ياسر الدوسري",'callback_data'=>'dosry']],
[['text'=>"ابو بكر الشاطري",'callback_data'=>'satry'],['text'=>"سعد الغامدي",'callback_data'=>'kamedy']],
[['text'=>"احمد العجمي",'callback_data'=>'agmy']],
[['text'=>"فارس عباد",'callback_data'=>'fares'],['text'=>" مشاري بن راشد العفاسي",'callback_data'=>'afasy']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}
// الصفحه الرئيسيه
if($data=="home"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"أهلاً بك في بوت الأجر ..
 
 أسأل الله تعال أن يكتب الأجر لي ولك ❤️
"
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=> ' القران الكريم.' ,'callback_data'=> 'startaa'],[ 'text' => 'الأذكار والأدعية .','callback_data'=> 'starta' ]],
[['text'=> 'قصص من القران .' ,'callback_data'=> 'Qasass'],[ 'text' => 'الرقيه الشرعيه','callback_data'=> 'roqua' ]],
[[ 'text' => 'نبذه .','callback_data'=> 'nobtha' ]],
]
])
]);
}

//الشيخ عبد الرحمن السديسي

if($data=="sodes"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء عبد الرحمن السديسي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'sodes1'],['text'=>"سورة البقره",'callback_data'=>'sodes2']],
[['text'=>"سورة ال عمران",'callback_data'=>'sodes3'],['text'=>"سورة النساء",'callback_data'=>'sodes4']],
[['text'=>"سورة المائده",'callback_data'=>'sodes5'],['text'=>"سورة الانعام",'callback_data'=>'sodes6']],
[['text'=>"سورة الاعراف",'callback_data'=>'sodes7'],['text'=>"سورة الانفال",'callback_data'=>'sodes8']],
[['text'=>" سورة التوبه",'callback_data'=>'sodes9'],['text'=>"سورة يونس",'callback_data'=>'sodes10']],
[['text'=>"سورة هود",'callback_data'=>'sodes12'],['text'=>"سورة يوسف",'callback_data'=>'sodes12']],
[['text'=>"سورة الرعد",'callback_data'=>'sodes13'],['text'=>"سورة ابراهيم",'callback_data'=>'sodes14']],
[['text'=>"سورة الحجر",'callback_data'=>'sodes15'],['text'=>"سورة النحل",'callback_data'=>'sodes16']],
[['text'=>"سورة الاسراء",'callback_data'=>'sodes17'],['text'=>"سورة الكهف",'callback_data'=>'sodes18']],
[['text'=>" سورة مريم",'callback_data'=>'sodes19'],['text'=>" سورة طه",'callback_data'=>'sodes20']],
[['text'=>"سورة الانبياء",'callback_data'=>'sodes21'],['text'=>"سورة الحج",'callback_data'=>'sodes22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'sodes23'],['text'=>"سورة النور",'callback_data'=>'sodes24']],
[['text'=>"سورة الفرقان",'callback_data'=>'sodes25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'sodes27'],['text'=>"سورة القصص",'callback_data'=>'sodes28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'sodes29'],['text'=>" سورة الروم",'callback_data'=>'sodes30']],
[['text'=>"سورة لقمان",'callback_data'=>'sodes31'],['text'=>"سورة السجده",'callback_data'=>'sodes32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'sodes33'],['text'=>"سورة سبا",'callback_data'=>'sodes34']],
[['text'=>"سورة فاطر",'callback_data'=>'sodes35'],['text'=>"سورة يس",'callback_data'=>'sodes36']],
[['text'=>"سورة الصافات",'callback_data'=>'sodes37'],['text'=>"سورة ص",'callback_data'=>'sodes38']],
[['text'=>" سورة الزمر",'callback_data'=>'sodes39'],['text'=>"سورة غافر",'callback_data'=>'sodes40']],
[['text'=>"سورة فصلت",'callback_data'=>'sodes41'],['text'=>"سورة الشورى",'callback_data'=>'sodes42']],
[['text'=>"سورة الزخرف",'callback_data'=>'sodes43'],['text'=>"سورة الدخان",'callback_data'=>'sodes44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'sodes45'],['text'=>"سورة الاحقاف",'callback_data'=>'sodes46']],
[['text'=>"سورة محمد",'callback_data'=>'sodes47'],['text'=>"سورة الفتح",'callback_data'=>'sodes48']],
[['text'=>" سورة الحجرات",'callback_data'=>'sodes49'],['text'=>" سورة ق",'callback_data'=>'sodes50']],
[['text'=>"سورة الذريات",'callback_data'=>'sodes51'],['text'=>"سورة الطور",'callback_data'=>'sodes52']],
[['text'=>"سورة النجم",'callback_data'=>'sodes53'],['text'=>"سورة القمر",'callback_data'=>'sodes54']],
[['text'=>"سورة الرحمن",'callback_data'=>'sodes55'],['text'=>"سورة الواقعه",'callback_data'=>'sodes56']],
[['text'=>"سورة الحديد",'callback_data'=>'sodes57'],['text'=>"سورة المجادله",'callback_data'=>'sodes58']],
[['text'=>"سورة الحشر",'callback_data'=>'sodes59'],['text'=>" سورة الممتحنه",'callback_data'=>'sodes60']],
[['text'=>"التالي",'callback_data'=>"sodesy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="sodesy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء عبد الرحمن السديسي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'sodes61']],
[['text'=>"سورة الجمعه",'callback_data'=>'sodes62'],['text'=>"سورة المنافقون",'callback_data'=>'sodes63']],
[['text'=>"سورة التغابن",'callback_data'=>'sodes64'],['text'=>"سورة الطلاق",'callback_data'=>'sodes65']],
[['text'=>"سورة التحريم",'callback_data'=>'sodes66'],['text'=>"سورة الملك",'callback_data'=>'sodes67']],
[['text'=>" سورة القلم",'callback_data'=>'sodes68'],['text'=>"سورة الحاقه",'callback_data'=>'sodes69']],
[['text'=>"سورة المعارج",'callback_data'=>'sodes70'],['text'=>"سورة نوح",'callback_data'=>'sodes71']],
[['text'=>"سورة الجن",'callback_data'=>'sodes72'],['text'=>"سورة المزمل",'callback_data'=>'sodes73']],
[['text'=>"سورة المدثر",'callback_data'=>'sodes74'],['text'=>"سورة القيامه",'callback_data'=>'sodes75']],
[['text'=>"سورة الانسان",'callback_data'=>'sodes76'],['text'=>"سورة المرسلات",'callback_data'=>'sodes77']],
[['text'=>" سورة النبا",'callback_data'=>'sodes78'],['text'=>" سورة النازعات",'callback_data'=>'sodes79']],
[['text'=>"سورة عبس",'callback_data'=>'sodes80'],['text'=>"سورة التكوير",'callback_data'=>'sodes81']],
[['text'=>"سورة الانفطار",'callback_data'=>'sodes82'],['text'=>"سورة المطففين",'callback_data'=>'sodes83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'sodes84'],['text'=>"سورة البروج",'callback_data'=>'sodes85']],
[['text'=>"سورة الطارق",'callback_data'=>'sodes86'],['text'=>"سورة الاعلى",'callback_data'=>'sodes87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'sodes88'],['text'=>" سورة الفجر",'callback_data'=>'sodes89']],
[['text'=>"سورة البلد",'callback_data'=>'sodes90'],['text'=>"سورة الشمس",'callback_data'=>'sodes91']],
[['text'=>"سورة الليل",'callback_data'=>'sodes92'],['text'=>"سورة الضحى",'callback_data'=>'sodes93']],
[['text'=>"سورة الشرح",'callback_data'=>'sodes94'],['text'=>"سورة التين",'callback_data'=>'sodes95']],
[['text'=>"سورة العلق",'callback_data'=>'sodes96'],['text'=>"سورة القدر",'callback_data'=>'sodes97']],
[['text'=>" سورة البينه",'callback_data'=>'sodes98'],['text'=>"سورة الزلزله",'callback_data'=>'sodes99']],
[['text'=>"سورة العاديات",'callback_data'=>'sodes100'],['text'=>"سورة القارعه",'callback_data'=>'sodes101']],
[['text'=>"سورة التكاثر",'callback_data'=>'sodes102'],['text'=>"سورة العصر",'callback_data'=>'sodes103']],
[['text'=>"سورة الهمزه",'callback_data'=>'sodes104'],['text'=>"سورة الفيل",'callback_data'=>'sodes105']],
[['text'=>"سورة قريش",'callback_data'=>'sodes106'],['text'=>"سورة الماعون",'callback_data'=>'sodes107']],
[['text'=>" سورة الكوثر",'callback_data'=>'sodes108'],['text'=>" سورة الكافرون",'callback_data'=>'sodes109']],
[['text'=>"سورة النصر",'callback_data'=>'sodes110'],['text'=>"سورة المسد",'callback_data'=>'sodes111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'sodes112'],['text'=>"سورة الفلق",'callback_data'=>'sodes113']],
[['text'=>"سورة الناس",'callback_data'=>'sodes114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

 //تنفيذ السديسي
if($data == "sodes1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sodes114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sodesye/115",
'reply_to_message_id' =>$message->message_id, 
]);
}
/*
نهاية الشيخ عبد الرحمن السديسي
*/

// الشيخ احمد العجمي 

if($data=="agmy"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء أحمد العجمي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'agmy1'],['text'=>"سورة البقره",'callback_data'=>'agmy2']],
[['text'=>"سورة ال عمران",'callback_data'=>'agmy3'],['text'=>"سورة النساء",'callback_data'=>'agmy4']],
[['text'=>"سورة المائده",'callback_data'=>'agmy5'],['text'=>"سورة الانعام",'callback_data'=>'agmy6']],
[['text'=>"سورة الاعراف",'callback_data'=>'agmy7'],['text'=>"سورة الانفال",'callback_data'=>'agmy8']],
[['text'=>" سورة التوبه",'callback_data'=>'agmy9'],['text'=>"سورة يونس",'callback_data'=>'agmy10']],
[['text'=>"سورة هود",'callback_data'=>'agmy12'],['text'=>"سورة يوسف",'callback_data'=>'agmy12']],
[['text'=>"سورة الرعد",'callback_data'=>'agmy13'],['text'=>"سورة ابراهيم",'callback_data'=>'agmy14']],
[['text'=>"سورة الحجر",'callback_data'=>'agmy15'],['text'=>"سورة النحل",'callback_data'=>'agmy16']],
[['text'=>"سورة الاسراء",'callback_data'=>'agmy17'],['text'=>"سورة الكهف",'callback_data'=>'agmy18']],
[['text'=>" سورة مريم",'callback_data'=>'agmy19'],['text'=>" سورة طه",'callback_data'=>'agmy20']],
[['text'=>"سورة الانبياء",'callback_data'=>'agmy21'],['text'=>"سورة الحج",'callback_data'=>'agmy22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'agmy23'],['text'=>"سورة النور",'callback_data'=>'agmy24']],
[['text'=>"سورة الفرقان",'callback_data'=>'agmy25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'agmy27'],['text'=>"سورة القصص",'callback_data'=>'agmy28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'agmy29'],['text'=>" سورة الروم",'callback_data'=>'agmy30']],
[['text'=>"سورة لقمان",'callback_data'=>'agmy31'],['text'=>"سورة السجده",'callback_data'=>'agmy32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'agmy33'],['text'=>"سورة سبا",'callback_data'=>'agmy34']],
[['text'=>"سورة فاطر",'callback_data'=>'agmy35'],['text'=>"سورة يس",'callback_data'=>'agmy36']],
[['text'=>"سورة الصافات",'callback_data'=>'agmy37'],['text'=>"سورة ص",'callback_data'=>'agmy38']],
[['text'=>" سورة الزمر",'callback_data'=>'agmy39'],['text'=>"سورة غافر",'callback_data'=>'agmy40']],
[['text'=>"سورة فصلت",'callback_data'=>'agmy41'],['text'=>"سورة الشورى",'callback_data'=>'agmy42']],
[['text'=>"سورة الزخرف",'callback_data'=>'agmy43'],['text'=>"سورة الدخان",'callback_data'=>'agmy44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'agmy45'],['text'=>"سورة الاحقاف",'callback_data'=>'agmy46']],
[['text'=>"سورة محمد",'callback_data'=>'agmy47'],['text'=>"سورة الفتح",'callback_data'=>'agmy48']],
[['text'=>" سورة الحجرات",'callback_data'=>'agmy49'],['text'=>" سورة ق",'callback_data'=>'agmy50']],
[['text'=>"سورة الذريات",'callback_data'=>'agmy51'],['text'=>"سورة الطور",'callback_data'=>'agmy52']],
[['text'=>"سورة النجم",'callback_data'=>'agmy53'],['text'=>"سورة القمر",'callback_data'=>'agmy54']],
[['text'=>"سورة الرحمن",'callback_data'=>'agmy55'],['text'=>"سورة الواقعه",'callback_data'=>'agmy56']],
[['text'=>"سورة الحديد",'callback_data'=>'agmy57'],['text'=>"سورة المجادله",'callback_data'=>'agmy58']],
[['text'=>"سورة الحشر",'callback_data'=>'agmy59'],['text'=>" سورة الممتحنه",'callback_data'=>'agmy60']],
[['text'=>"التالي",'callback_data'=>"agmyy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="agmyy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء أحمد العجمي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'agmy61']],
[['text'=>"سورة الجمعه",'callback_data'=>'agmy62'],['text'=>"سورة المنافقون",'callback_data'=>'agmy63']],
[['text'=>"سورة التغابن",'callback_data'=>'agmy64'],['text'=>"سورة الطلاق",'callback_data'=>'agmy65']],
[['text'=>"سورة التحريم",'callback_data'=>'agmy66'],['text'=>"سورة الملك",'callback_data'=>'agmy67']],
[['text'=>" سورة القلم",'callback_data'=>'agmy68'],['text'=>"سورة الحاقه",'callback_data'=>'agmy69']],
[['text'=>"سورة المعارج",'callback_data'=>'agmy70'],['text'=>"سورة نوح",'callback_data'=>'agmy71']],
[['text'=>"سورة الجن",'callback_data'=>'agmy72'],['text'=>"سورة المزمل",'callback_data'=>'agmy73']],
[['text'=>"سورة المدثر",'callback_data'=>'agmy74'],['text'=>"سورة القيامه",'callback_data'=>'agmy75']],
[['text'=>"سورة الانسان",'callback_data'=>'agmy76'],['text'=>"سورة المرسلات",'callback_data'=>'agmy77']],
[['text'=>" سورة النبا",'callback_data'=>'agmy78'],['text'=>" سورة النازعات",'callback_data'=>'agmy79']],
[['text'=>"سورة عبس",'callback_data'=>'agmy80'],['text'=>"سورة التكوير",'callback_data'=>'agmy81']],
[['text'=>"سورة الانفطار",'callback_data'=>'agmy82'],['text'=>"سورة المطففين",'callback_data'=>'agmy83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'agmy84'],['text'=>"سورة البروج",'callback_data'=>'agmy85']],
[['text'=>"سورة الطارق",'callback_data'=>'agmy86'],['text'=>"سورة الاعلى",'callback_data'=>'agmy87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'agmy88'],['text'=>" سورة الفجر",'callback_data'=>'agmy89']],
[['text'=>"سورة البلد",'callback_data'=>'agmy90'],['text'=>"سورة الشمس",'callback_data'=>'agmy91']],
[['text'=>"سورة الليل",'callback_data'=>'agmy92'],['text'=>"سورة الضحى",'callback_data'=>'agmy93']],
[['text'=>"سورة الشرح",'callback_data'=>'agmy94'],['text'=>"سورة التين",'callback_data'=>'agmy95']],
[['text'=>"سورة العلق",'callback_data'=>'agmy96'],['text'=>"سورة القدر",'callback_data'=>'agmy97']],
[['text'=>" سورة البينه",'callback_data'=>'agmy98'],['text'=>"سورة الزلزله",'callback_data'=>'agmy99']],
[['text'=>"سورة العاديات",'callback_data'=>'agmy100'],['text'=>"سورة القارعه",'callback_data'=>'agmy101']],
[['text'=>"سورة التكاثر",'callback_data'=>'agmy102'],['text'=>"سورة العصر",'callback_data'=>'agmy103']],
[['text'=>"سورة الهمزه",'callback_data'=>'agmy104'],['text'=>"سورة الفيل",'callback_data'=>'agmy105']],
[['text'=>"سورة قريش",'callback_data'=>'agmy106'],['text'=>"سورة الماعون",'callback_data'=>'agmy107']],
[['text'=>" سورة الكوثر",'callback_data'=>'agmy108'],['text'=>" سورة الكافرون",'callback_data'=>'agmy109']],
[['text'=>"سورة النصر",'callback_data'=>'agmy110'],['text'=>"سورة المسد",'callback_data'=>'agmy111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'agmy112'],['text'=>"سورة الفلق",'callback_data'=>'agmy113']],
[['text'=>"سورة الناس",'callback_data'=>'agmy114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}
//تنفيذ احمد العجمي 

if($data == "agmy1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "agmy114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/agamyyq/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الشيخ احمد العجمي 
*/

//الشيخ ماهر المعيقلي

if($data=="meaqly"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء ماهر المعيقلي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'meaqly1'],['text'=>"سورة البقره",'callback_data'=>'meaqly2']],
[['text'=>"سورة ال عمران",'callback_data'=>'meaqly3'],['text'=>"سورة النساء",'callback_data'=>'meaqly4']],
[['text'=>"سورة المائده",'callback_data'=>'meaqly5'],['text'=>"سورة الانعام",'callback_data'=>'meaqly6']],
[['text'=>"سورة الاعراف",'callback_data'=>'meaqly7'],['text'=>"سورة الانفال",'callback_data'=>'meaqly8']],
[['text'=>" سورة التوبه",'callback_data'=>'meaqly9'],['text'=>"سورة يونس",'callback_data'=>'meaqly10']],
[['text'=>"سورة هود",'callback_data'=>'meaqly12'],['text'=>"سورة يوسف",'callback_data'=>'meaqly12']],
[['text'=>"سورة الرعد",'callback_data'=>'meaqly13'],['text'=>"سورة ابراهيم",'callback_data'=>'meaqly14']],
[['text'=>"سورة الحجر",'callback_data'=>'meaqly15'],['text'=>"سورة النحل",'callback_data'=>'meaqly16']],
[['text'=>"سورة الاسراء",'callback_data'=>'meaqly17'],['text'=>"سورة الكهف",'callback_data'=>'meaqly18']],
[['text'=>" سورة مريم",'callback_data'=>'meaqly19'],['text'=>" سورة طه",'callback_data'=>'meaqly20']],
[['text'=>"سورة الانبياء",'callback_data'=>'meaqly21'],['text'=>"سورة الحج",'callback_data'=>'meaqly22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'meaqly23'],['text'=>"سورة النور",'callback_data'=>'meaqly24']],
[['text'=>"سورة الفرقان",'callback_data'=>'meaqly25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'meaqly27'],['text'=>"سورة القصص",'callback_data'=>'meaqly28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'meaqly29'],['text'=>" سورة الروم",'callback_data'=>'meaqly30']],
[['text'=>"سورة لقمان",'callback_data'=>'meaqly31'],['text'=>"سورة السجده",'callback_data'=>'meaqly32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'meaqly33'],['text'=>"سورة سبا",'callback_data'=>'meaqly34']],
[['text'=>"سورة فاطر",'callback_data'=>'meaqly35'],['text'=>"سورة يس",'callback_data'=>'meaqly36']],
[['text'=>"سورة الصافات",'callback_data'=>'meaqly37'],['text'=>"سورة ص",'callback_data'=>'meaqly38']],
[['text'=>" سورة الزمر",'callback_data'=>'meaqly39'],['text'=>"سورة غافر",'callback_data'=>'meaqly40']],
[['text'=>"سورة فصلت",'callback_data'=>'meaqly41'],['text'=>"سورة الشورى",'callback_data'=>'meaqly42']],
[['text'=>"سورة الزخرف",'callback_data'=>'meaqly43'],['text'=>"سورة الدخان",'callback_data'=>'meaqly44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'meaqly45'],['text'=>"سورة الاحقاف",'callback_data'=>'meaqly46']],
[['text'=>"سورة محمد",'callback_data'=>'meaqly47'],['text'=>"سورة الفتح",'callback_data'=>'meaqly48']],
[['text'=>" سورة الحجرات",'callback_data'=>'meaqly49'],['text'=>" سورة ق",'callback_data'=>'meaqly50']],
[['text'=>"سورة الذريات",'callback_data'=>'meaqly51'],['text'=>"سورة الطور",'callback_data'=>'meaqly52']],
[['text'=>"سورة النجم",'callback_data'=>'meaqly53'],['text'=>"سورة القمر",'callback_data'=>'meaqly54']],
[['text'=>"سورة الرحمن",'callback_data'=>'meaqly55'],['text'=>"سورة الواقعه",'callback_data'=>'meaqly56']],
[['text'=>"سورة الحديد",'callback_data'=>'meaqly57'],['text'=>"سورة المجادله",'callback_data'=>'meaqly58']],
[['text'=>"سورة الحشر",'callback_data'=>'meaqly59'],['text'=>" سورة الممتحنه",'callback_data'=>'meaqly60']],
[['text'=>"التالي",'callback_data'=>"meaqlyy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="meaqlyy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء ماهر المعيقلي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'meaqly61']],
[['text'=>"سورة الجمعه",'callback_data'=>'meaqly62'],['text'=>"سورة المنافقون",'callback_data'=>'meaqly63']],
[['text'=>"سورة التغابن",'callback_data'=>'meaqly64'],['text'=>"سورة الطلاق",'callback_data'=>'meaqly65']],
[['text'=>"سورة التحريم",'callback_data'=>'meaqly66'],['text'=>"سورة الملك",'callback_data'=>'meaqly67']],
[['text'=>" سورة القلم",'callback_data'=>'meaqly68'],['text'=>"سورة الحاقه",'callback_data'=>'meaqly69']],
[['text'=>"سورة المعارج",'callback_data'=>'meaqly70'],['text'=>"سورة نوح",'callback_data'=>'meaqly71']],
[['text'=>"سورة الجن",'callback_data'=>'meaqly72'],['text'=>"سورة المزمل",'callback_data'=>'meaqly73']],
[['text'=>"سورة المدثر",'callback_data'=>'meaqly74'],['text'=>"سورة القيامه",'callback_data'=>'meaqly75']],
[['text'=>"سورة الانسان",'callback_data'=>'meaqly76'],['text'=>"سورة المرسلات",'callback_data'=>'meaqly77']],
[['text'=>" سورة النبا",'callback_data'=>'meaqly78'],['text'=>" سورة النازعات",'callback_data'=>'meaqly79']],
[['text'=>"سورة عبس",'callback_data'=>'meaqly80'],['text'=>"سورة التكوير",'callback_data'=>'meaqly81']],
[['text'=>"سورة الانفطار",'callback_data'=>'meaqly82'],['text'=>"سورة المطففين",'callback_data'=>'meaqly83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'meaqly84'],['text'=>"سورة البروج",'callback_data'=>'meaqly85']],
[['text'=>"سورة الطارق",'callback_data'=>'meaqly86'],['text'=>"سورة الاعلى",'callback_data'=>'meaqly87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'meaqly88'],['text'=>" سورة الفجر",'callback_data'=>'meaqly89']],
[['text'=>"سورة البلد",'callback_data'=>'meaqly90'],['text'=>"سورة الشمس",'callback_data'=>'meaqly91']],
[['text'=>"سورة الليل",'callback_data'=>'meaqly92'],['text'=>"سورة الضحى",'callback_data'=>'meaqly93']],
[['text'=>"سورة الشرح",'callback_data'=>'meaqly94'],['text'=>"سورة التين",'callback_data'=>'meaqly95']],
[['text'=>"سورة العلق",'callback_data'=>'meaqly96'],['text'=>"سورة القدر",'callback_data'=>'meaqly97']],
[['text'=>" سورة البينه",'callback_data'=>'meaqly98'],['text'=>"سورة الزلزله",'callback_data'=>'meaqly99']],
[['text'=>"سورة العاديات",'callback_data'=>'meaqly100'],['text'=>"سورة القارعه",'callback_data'=>'meaqly101']],
[['text'=>"سورة التكاثر",'callback_data'=>'meaqly102'],['text'=>"سورة العصر",'callback_data'=>'meaqly103']],
[['text'=>"سورة الهمزه",'callback_data'=>'meaqly104'],['text'=>"سورة الفيل",'callback_data'=>'meaqly105']],
[['text'=>"سورة قريش",'callback_data'=>'meaqly106'],['text'=>"سورة الماعون",'callback_data'=>'meaqly107']],
[['text'=>" سورة الكوثر",'callback_data'=>'meaqly108'],['text'=>" سورة الكافرون",'callback_data'=>'meaqly109']],
[['text'=>"سورة النصر",'callback_data'=>'meaqly110'],['text'=>"سورة المسد",'callback_data'=>'meaqly111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'meaqly112'],['text'=>"سورة الفلق",'callback_data'=>'meaqly113']],
[['text'=>"سورة الناس",'callback_data'=>'meaqly114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}
//تنفيذ ماهر المعيقلي

if($data == "meaqly1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "meaqly114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mahermekly/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*

نهاية ماهر المعيقلي

*/

//الشيخ ياسر الدوسري

if($data=="dosry"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء ياسر الدوسري ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'dosry1'],['text'=>"سورة البقره",'callback_data'=>'dosry2']],
[['text'=>"سورة ال عمران",'callback_data'=>'dosry3'],['text'=>"سورة النساء",'callback_data'=>'dosry4']],
[['text'=>"سورة المائده",'callback_data'=>'dosry5'],['text'=>"سورة الانعام",'callback_data'=>'dosry6']],
[['text'=>"سورة الاعراف",'callback_data'=>'dosry7'],['text'=>"سورة الانفال",'callback_data'=>'dosry8']],
[['text'=>" سورة التوبه",'callback_data'=>'dosry9'],['text'=>"سورة يونس",'callback_data'=>'dosry10']],
[['text'=>"سورة هود",'callback_data'=>'dosry12'],['text'=>"سورة يوسف",'callback_data'=>'dosry12']],
[['text'=>"سورة الرعد",'callback_data'=>'dosry13'],['text'=>"سورة ابراهيم",'callback_data'=>'dosry14']],
[['text'=>"سورة الحجر",'callback_data'=>'dosry15'],['text'=>"سورة النحل",'callback_data'=>'dosry16']],
[['text'=>"سورة الاسراء",'callback_data'=>'dosry17'],['text'=>"سورة الكهف",'callback_data'=>'dosry18']],
[['text'=>" سورة مريم",'callback_data'=>'dosry19'],['text'=>" سورة طه",'callback_data'=>'dosry20']],
[['text'=>"سورة الانبياء",'callback_data'=>'dosry21'],['text'=>"سورة الحج",'callback_data'=>'dosry22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'dosry23'],['text'=>"سورة النور",'callback_data'=>'dosry24']],
[['text'=>"سورة الفرقان",'callback_data'=>'dosry25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'dosry27'],['text'=>"سورة القصص",'callback_data'=>'dosry28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'dosry29'],['text'=>" سورة الروم",'callback_data'=>'dosry30']],
[['text'=>"سورة لقمان",'callback_data'=>'dosry31'],['text'=>"سورة السجده",'callback_data'=>'dosry32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'dosry33'],['text'=>"سورة سبا",'callback_data'=>'dosry34']],
[['text'=>"سورة فاطر",'callback_data'=>'dosry35'],['text'=>"سورة يس",'callback_data'=>'dosry36']],
[['text'=>"سورة الصافات",'callback_data'=>'dosry37'],['text'=>"سورة ص",'callback_data'=>'dosry38']],
[['text'=>" سورة الزمر",'callback_data'=>'dosry39'],['text'=>"سورة غافر",'callback_data'=>'dosry40']],
[['text'=>"سورة فصلت",'callback_data'=>'dosry41'],['text'=>"سورة الشورى",'callback_data'=>'dosry42']],
[['text'=>"سورة الزخرف",'callback_data'=>'dosry43'],['text'=>"سورة الدخان",'callback_data'=>'dosry44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'dosry45'],['text'=>"سورة الاحقاف",'callback_data'=>'dosry46']],
[['text'=>"سورة محمد",'callback_data'=>'dosry47'],['text'=>"سورة الفتح",'callback_data'=>'dosry48']],
[['text'=>" سورة الحجرات",'callback_data'=>'dosry49'],['text'=>" سورة ق",'callback_data'=>'dosry50']],
[['text'=>"سورة الذريات",'callback_data'=>'dosry51'],['text'=>"سورة الطور",'callback_data'=>'dosry52']],
[['text'=>"سورة النجم",'callback_data'=>'dosry53'],['text'=>"سورة القمر",'callback_data'=>'dosry54']],
[['text'=>"سورة الرحمن",'callback_data'=>'dosry55'],['text'=>"سورة الواقعه",'callback_data'=>'dosry56']],
[['text'=>"سورة الحديد",'callback_data'=>'dosry57'],['text'=>"سورة المجادله",'callback_data'=>'dosry58']],
[['text'=>"سورة الحشر",'callback_data'=>'dosry59'],['text'=>" سورة الممتحنه",'callback_data'=>'dosry60']],
[['text'=>"التالي",'callback_data'=>"dosryy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="dosryy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء ياسر الدوسري ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'dosry61']],
[['text'=>"سورة الجمعه",'callback_data'=>'dosry62'],['text'=>"سورة المنافقون",'callback_data'=>'dosry63']],
[['text'=>"سورة التغابن",'callback_data'=>'dosry64'],['text'=>"سورة الطلاق",'callback_data'=>'dosry65']],
[['text'=>"سورة التحريم",'callback_data'=>'dosry66'],['text'=>"سورة الملك",'callback_data'=>'dosry67']],
[['text'=>" سورة القلم",'callback_data'=>'dosry68'],['text'=>"سورة الحاقه",'callback_data'=>'dosry69']],
[['text'=>"سورة المعارج",'callback_data'=>'dosry70'],['text'=>"سورة نوح",'callback_data'=>'dosry71']],
[['text'=>"سورة الجن",'callback_data'=>'dosry72'],['text'=>"سورة المزمل",'callback_data'=>'dosry73']],
[['text'=>"سورة المدثر",'callback_data'=>'dosry74'],['text'=>"سورة القيامه",'callback_data'=>'dosry75']],
[['text'=>"سورة الانسان",'callback_data'=>'dosry76'],['text'=>"سورة المرسلات",'callback_data'=>'dosry77']],
[['text'=>" سورة النبا",'callback_data'=>'dosry78'],['text'=>" سورة النازعات",'callback_data'=>'dosry79']],
[['text'=>"سورة عبس",'callback_data'=>'dosry80'],['text'=>"سورة التكوير",'callback_data'=>'dosry81']],
[['text'=>"سورة الانفطار",'callback_data'=>'dosry82'],['text'=>"سورة المطففين",'callback_data'=>'dosry83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'dosry84'],['text'=>"سورة البروج",'callback_data'=>'dosry85']],
[['text'=>"سورة الطارق",'callback_data'=>'dosry86'],['text'=>"سورة الاعلى",'callback_data'=>'dosry87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'dosry88'],['text'=>" سورة الفجر",'callback_data'=>'dosry89']],
[['text'=>"سورة البلد",'callback_data'=>'dosry90'],['text'=>"سورة الشمس",'callback_data'=>'dosry91']],
[['text'=>"سورة الليل",'callback_data'=>'dosry92'],['text'=>"سورة الضحى",'callback_data'=>'dosry93']],
[['text'=>"سورة الشرح",'callback_data'=>'dosry94'],['text'=>"سورة التين",'callback_data'=>'dosry95']],
[['text'=>"سورة العلق",'callback_data'=>'dosry96'],['text'=>"سورة القدر",'callback_data'=>'dosry97']],
[['text'=>" سورة البينه",'callback_data'=>'dosry98'],['text'=>"سورة الزلزله",'callback_data'=>'dosry99']],
[['text'=>"سورة العاديات",'callback_data'=>'dosry100'],['text'=>"سورة القارعه",'callback_data'=>'dosry101']],
[['text'=>"سورة التكاثر",'callback_data'=>'dosry102'],['text'=>"سورة العصر",'callback_data'=>'dosry103']],
[['text'=>"سورة الهمزه",'callback_data'=>'dosry104'],['text'=>"سورة الفيل",'callback_data'=>'dosry105']],
[['text'=>"سورة قريش",'callback_data'=>'dosry106'],['text'=>"سورة الماعون",'callback_data'=>'dosry107']],
[['text'=>" سورة الكوثر",'callback_data'=>'dosry108'],['text'=>" سورة الكافرون",'callback_data'=>'dosry109']],
[['text'=>"سورة النصر",'callback_data'=>'dosry110'],['text'=>"سورة المسد",'callback_data'=>'dosry111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'dosry112'],['text'=>"سورة الفلق",'callback_data'=>'dosry113']],
[['text'=>"سورة الناس",'callback_data'=>'dosry114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/* 
تنفيذ ياسر الدوسري
*/

if($data == "dosry1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "dosry114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/dosarye/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الشيخ ياسر الدوسري
*/

//الشيخ مشاري بن راشد العفاسي

if($data=="afasy"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء  مشاري بن راشد العفاسي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'afasy1'],['text'=>"سورة البقره",'callback_data'=>'afasy2']],
[['text'=>"سورة ال عمران",'callback_data'=>'afasy3'],['text'=>"سورة النساء",'callback_data'=>'afasy4']],
[['text'=>"سورة المائده",'callback_data'=>'afasy5'],['text'=>"سورة الانعام",'callback_data'=>'afasy6']],
[['text'=>"سورة الاعراف",'callback_data'=>'afasy7'],['text'=>"سورة الانفال",'callback_data'=>'afasy8']],
[['text'=>" سورة التوبه",'callback_data'=>'afasy9'],['text'=>"سورة يونس",'callback_data'=>'afasy10']],
[['text'=>"سورة هود",'callback_data'=>'afasy12'],['text'=>"سورة يوسف",'callback_data'=>'afasy12']],
[['text'=>"سورة الرعد",'callback_data'=>'afasy13'],['text'=>"سورة ابراهيم",'callback_data'=>'afasy14']],
[['text'=>"سورة الحجر",'callback_data'=>'afasy15'],['text'=>"سورة النحل",'callback_data'=>'afasy16']],
[['text'=>"سورة الاسراء",'callback_data'=>'afasy17'],['text'=>"سورة الكهف",'callback_data'=>'afasy18']],
[['text'=>" سورة مريم",'callback_data'=>'afasy19'],['text'=>" سورة طه",'callback_data'=>'afasy20']],
[['text'=>"سورة الانبياء",'callback_data'=>'afasy21'],['text'=>"سورة الحج",'callback_data'=>'afasy22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'afasy23'],['text'=>"سورة النور",'callback_data'=>'afasy24']],
[['text'=>"سورة الفرقان",'callback_data'=>'afasy25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'afasy27'],['text'=>"سورة القصص",'callback_data'=>'afasy28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'afasy29'],['text'=>" سورة الروم",'callback_data'=>'afasy30']],
[['text'=>"سورة لقمان",'callback_data'=>'afasy31'],['text'=>"سورة السجده",'callback_data'=>'afasy32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'afasy33'],['text'=>"سورة سبا",'callback_data'=>'afasy34']],
[['text'=>"سورة فاطر",'callback_data'=>'afasy35'],['text'=>"سورة يس",'callback_data'=>'afasy36']],
[['text'=>"سورة الصافات",'callback_data'=>'afasy37'],['text'=>"سورة ص",'callback_data'=>'afasy38']],
[['text'=>" سورة الزمر",'callback_data'=>'afasy39'],['text'=>"سورة غافر",'callback_data'=>'afasy40']],
[['text'=>"سورة فصلت",'callback_data'=>'afasy41'],['text'=>"سورة الشورى",'callback_data'=>'afasy42']],
[['text'=>"سورة الزخرف",'callback_data'=>'afasy43'],['text'=>"سورة الدخان",'callback_data'=>'afasy44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'afasy45'],['text'=>"سورة الاحقاف",'callback_data'=>'afasy46']],
[['text'=>"سورة محمد",'callback_data'=>'afasy47'],['text'=>"سورة الفتح",'callback_data'=>'afasy48']],
[['text'=>" سورة الحجرات",'callback_data'=>'afasy49'],['text'=>" سورة ق",'callback_data'=>'afasy50']],
[['text'=>"سورة الذريات",'callback_data'=>'afasy51'],['text'=>"سورة الطور",'callback_data'=>'afasy52']],
[['text'=>"سورة النجم",'callback_data'=>'afasy53'],['text'=>"سورة القمر",'callback_data'=>'afasy54']],
[['text'=>"سورة الرحمن",'callback_data'=>'afasy55'],['text'=>"سورة الواقعه",'callback_data'=>'afasy56']],
[['text'=>"سورة الحديد",'callback_data'=>'afasy57'],['text'=>"سورة المجادله",'callback_data'=>'afasy58']],
[['text'=>"سورة الحشر",'callback_data'=>'afasy59'],['text'=>" سورة الممتحنه",'callback_data'=>'afasy60']],
[['text'=>"التالي",'callback_data'=>"afasyy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="afasyy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء  مشاري بن راشد العفاسي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'afasy61']],
[['text'=>"سورة الجمعه",'callback_data'=>'afasy62'],['text'=>"سورة المنافقون",'callback_data'=>'afasy63']],
[['text'=>"سورة التغابن",'callback_data'=>'afasy64'],['text'=>"سورة الطلاق",'callback_data'=>'afasy65']],
[['text'=>"سورة التحريم",'callback_data'=>'afasy66'],['text'=>"سورة الملك",'callback_data'=>'afasy67']],
[['text'=>" سورة القلم",'callback_data'=>'afasy68'],['text'=>"سورة الحاقه",'callback_data'=>'afasy69']],
[['text'=>"سورة المعارج",'callback_data'=>'afasy70'],['text'=>"سورة نوح",'callback_data'=>'afasy71']],
[['text'=>"سورة الجن",'callback_data'=>'afasy72'],['text'=>"سورة المزمل",'callback_data'=>'afasy73']],
[['text'=>"سورة المدثر",'callback_data'=>'afasy74'],['text'=>"سورة القيامه",'callback_data'=>'afasy75']],
[['text'=>"سورة الانسان",'callback_data'=>'afasy76'],['text'=>"سورة المرسلات",'callback_data'=>'afasy77']],
[['text'=>" سورة النبا",'callback_data'=>'afasy78'],['text'=>" سورة النازعات",'callback_data'=>'afasy79']],
[['text'=>"سورة عبس",'callback_data'=>'afasy80'],['text'=>"سورة التكوير",'callback_data'=>'afasy81']],
[['text'=>"سورة الانفطار",'callback_data'=>'afasy82'],['text'=>"سورة المطففين",'callback_data'=>'afasy83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'afasy84'],['text'=>"سورة البروج",'callback_data'=>'afasy85']],
[['text'=>"سورة الطارق",'callback_data'=>'afasy86'],['text'=>"سورة الاعلى",'callback_data'=>'afasy87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'afasy88'],['text'=>" سورة الفجر",'callback_data'=>'afasy89']],
[['text'=>"سورة البلد",'callback_data'=>'afasy90'],['text'=>"سورة الشمس",'callback_data'=>'afasy91']],
[['text'=>"سورة الليل",'callback_data'=>'afasy92'],['text'=>"سورة الضحى",'callback_data'=>'afasy93']],
[['text'=>"سورة الشرح",'callback_data'=>'afasy94'],['text'=>"سورة التين",'callback_data'=>'afasy95']],
[['text'=>"سورة العلق",'callback_data'=>'afasy96'],['text'=>"سورة القدر",'callback_data'=>'afasy97']],
[['text'=>" سورة البينه",'callback_data'=>'afasy98'],['text'=>"سورة الزلزله",'callback_data'=>'afasy99']],
[['text'=>"سورة العاديات",'callback_data'=>'afasy100'],['text'=>"سورة القارعه",'callback_data'=>'afasy101']],
[['text'=>"سورة التكاثر",'callback_data'=>'afasy102'],['text'=>"سورة العصر",'callback_data'=>'afasy103']],
[['text'=>"سورة الهمزه",'callback_data'=>'afasy104'],['text'=>"سورة الفيل",'callback_data'=>'afasy105']],
[['text'=>"سورة قريش",'callback_data'=>'afasy106'],['text'=>"سورة الماعون",'callback_data'=>'afasy107']],
[['text'=>" سورة الكوثر",'callback_data'=>'afasy108'],['text'=>" سورة الكافرون",'callback_data'=>'afasy109']],
[['text'=>"سورة النصر",'callback_data'=>'afasy110'],['text'=>"سورة المسد",'callback_data'=>'afasy111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'afasy112'],['text'=>"سورة الفلق",'callback_data'=>'afasy113']],
[['text'=>"سورة الناس",'callback_data'=>'afasy114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/*
تنفيذ الشيخ العفاسي
*/

/*
27
50
53
*/

if($data == "afasy1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mroan7/2613",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mroan7/2635",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/115",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/mroan7/2638",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/121",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/123",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/125",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/127",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/129",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/131",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/133",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/135",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/137",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/139",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/141",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/143",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/145",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/147",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/149",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/364",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/152",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/154",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/156",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/158",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/160",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/162",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/164",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/166",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/168",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/170",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/172",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/174",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/176",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/178",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/180",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/302",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/304",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/306",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/308",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/310",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/312",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/314",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/316",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/318",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/320",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/322",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/324",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/326",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/328",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/330",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/332",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/334",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/336",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/338",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/340",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/342",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/344",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/346",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/348",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/350",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/352",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/354",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/356",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/358",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "afasy114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/bot_qran/358",
'reply_to_message_id' =>$message->message_id, 
]);
} 

/*
نهاية الشيخ العفاسي 
*/

//الشيخ سعد الغامدي 

if($data=="kamedy"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء سعد الغامدي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'kamedy1'],['text'=>"سورة البقره",'callback_data'=>'kamedy2']],
[['text'=>"سورة ال عمران",'callback_data'=>'kamedy3'],['text'=>"سورة النساء",'callback_data'=>'kamedy4']],
[['text'=>"سورة المائده",'callback_data'=>'kamedy5'],['text'=>"سورة الانعام",'callback_data'=>'kamedy6']],
[['text'=>"سورة الاعراف",'callback_data'=>'kamedy7'],['text'=>"سورة الانفال",'callback_data'=>'kamedy8']],
[['text'=>" سورة التوبه",'callback_data'=>'kamedy9'],['text'=>"سورة يونس",'callback_data'=>'kamedy10']],
[['text'=>"سورة هود",'callback_data'=>'kamedy12'],['text'=>"سورة يوسف",'callback_data'=>'kamedy12']],
[['text'=>"سورة الرعد",'callback_data'=>'kamedy13'],['text'=>"سورة ابراهيم",'callback_data'=>'kamedy14']],
[['text'=>"سورة الحجر",'callback_data'=>'kamedy15'],['text'=>"سورة النحل",'callback_data'=>'kamedy16']],
[['text'=>"سورة الاسراء",'callback_data'=>'kamedy17'],['text'=>"سورة الكهف",'callback_data'=>'kamedy18']],
[['text'=>" سورة مريم",'callback_data'=>'kamedy19'],['text'=>" سورة طه",'callback_data'=>'kamedy20']],
[['text'=>"سورة الانبياء",'callback_data'=>'kamedy21'],['text'=>"سورة الحج",'callback_data'=>'kamedy22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'kamedy23'],['text'=>"سورة النور",'callback_data'=>'kamedy24']],
[['text'=>"سورة الفرقان",'callback_data'=>'kamedy25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'kamedy27'],['text'=>"سورة القصص",'callback_data'=>'kamedy28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'kamedy29'],['text'=>" سورة الروم",'callback_data'=>'kamedy30']],
[['text'=>"سورة لقمان",'callback_data'=>'kamedy31'],['text'=>"سورة السجده",'callback_data'=>'kamedy32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'kamedy33'],['text'=>"سورة سبا",'callback_data'=>'kamedy34']],
[['text'=>"سورة فاطر",'callback_data'=>'kamedy35'],['text'=>"سورة يس",'callback_data'=>'kamedy36']],
[['text'=>"سورة الصافات",'callback_data'=>'kamedy37'],['text'=>"سورة ص",'callback_data'=>'kamedy38']],
[['text'=>" سورة الزمر",'callback_data'=>'kamedy39'],['text'=>"سورة غافر",'callback_data'=>'kamedy40']],
[['text'=>"سورة فصلت",'callback_data'=>'kamedy41'],['text'=>"سورة الشورى",'callback_data'=>'kamedy42']],
[['text'=>"سورة الزخرف",'callback_data'=>'kamedy43'],['text'=>"سورة الدخان",'callback_data'=>'kamedy44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'kamedy45'],['text'=>"سورة الاحقاف",'callback_data'=>'kamedy46']],
[['text'=>"سورة محمد",'callback_data'=>'kamedy47'],['text'=>"سورة الفتح",'callback_data'=>'kamedy48']],
[['text'=>" سورة الحجرات",'callback_data'=>'kamedy49'],['text'=>" سورة ق",'callback_data'=>'kamedy50']],
[['text'=>"سورة الذريات",'callback_data'=>'kamedy51'],['text'=>"سورة الطور",'callback_data'=>'kamedy52']],
[['text'=>"سورة النجم",'callback_data'=>'kamedy53'],['text'=>"سورة القمر",'callback_data'=>'kamedy54']],
[['text'=>"سورة الرحمن",'callback_data'=>'kamedy55'],['text'=>"سورة الواقعه",'callback_data'=>'kamedy56']],
[['text'=>"سورة الحديد",'callback_data'=>'kamedy57'],['text'=>"سورة المجادله",'callback_data'=>'kamedy58']],
[['text'=>"سورة الحشر",'callback_data'=>'kamedy59'],['text'=>" سورة الممتحنه",'callback_data'=>'kamedy60']],
[['text'=>"التالي",'callback_data'=>"kamedyy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="kamedyy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء سعد الغامدي ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'kamedy61']],
[['text'=>"سورة الجمعه",'callback_data'=>'kamedy62'],['text'=>"سورة المنافقون",'callback_data'=>'kamedy63']],
[['text'=>"سورة التغابن",'callback_data'=>'kamedy64'],['text'=>"سورة الطلاق",'callback_data'=>'kamedy65']],
[['text'=>"سورة التحريم",'callback_data'=>'kamedy66'],['text'=>"سورة الملك",'callback_data'=>'kamedy67']],
[['text'=>" سورة القلم",'callback_data'=>'kamedy68'],['text'=>"سورة الحاقه",'callback_data'=>'kamedy69']],
[['text'=>"سورة المعارج",'callback_data'=>'kamedy70'],['text'=>"سورة نوح",'callback_data'=>'kamedy71']],
[['text'=>"سورة الجن",'callback_data'=>'kamedy72'],['text'=>"سورة المزمل",'callback_data'=>'kamedy73']],
[['text'=>"سورة المدثر",'callback_data'=>'kamedy74'],['text'=>"سورة القيامه",'callback_data'=>'kamedy75']],
[['text'=>"سورة الانسان",'callback_data'=>'kamedy76'],['text'=>"سورة المرسلات",'callback_data'=>'kamedy77']],
[['text'=>" سورة النبا",'callback_data'=>'kamedy78'],['text'=>" سورة النازعات",'callback_data'=>'kamedy79']],
[['text'=>"سورة عبس",'callback_data'=>'kamedy80'],['text'=>"سورة التكوير",'callback_data'=>'kamedy81']],
[['text'=>"سورة الانفطار",'callback_data'=>'kamedy82'],['text'=>"سورة المطففين",'callback_data'=>'kamedy83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'kamedy84'],['text'=>"سورة البروج",'callback_data'=>'kamedy85']],
[['text'=>"سورة الطارق",'callback_data'=>'kamedy86'],['text'=>"سورة الاعلى",'callback_data'=>'kamedy87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'kamedy88'],['text'=>" سورة الفجر",'callback_data'=>'kamedy89']],
[['text'=>"سورة البلد",'callback_data'=>'kamedy90'],['text'=>"سورة الشمس",'callback_data'=>'kamedy91']],
[['text'=>"سورة الليل",'callback_data'=>'kamedy92'],['text'=>"سورة الضحى",'callback_data'=>'kamedy93']],
[['text'=>"سورة الشرح",'callback_data'=>'kamedy94'],['text'=>"سورة التين",'callback_data'=>'kamedy95']],
[['text'=>"سورة العلق",'callback_data'=>'kamedy96'],['text'=>"سورة القدر",'callback_data'=>'kamedy97']],
[['text'=>" سورة البينه",'callback_data'=>'kamedy98'],['text'=>"سورة الزلزله",'callback_data'=>'kamedy99']],
[['text'=>"سورة العاديات",'callback_data'=>'kamedy100'],['text'=>"سورة القارعه",'callback_data'=>'kamedy101']],
[['text'=>"سورة التكاثر",'callback_data'=>'kamedy102'],['text'=>"سورة العصر",'callback_data'=>'kamedy103']],
[['text'=>"سورة الهمزه",'callback_data'=>'kamedy104'],['text'=>"سورة الفيل",'callback_data'=>'kamedy105']],
[['text'=>"سورة قريش",'callback_data'=>'kamedy106'],['text'=>"سورة الماعون",'callback_data'=>'kamedy107']],
[['text'=>" سورة الكوثر",'callback_data'=>'kamedy108'],['text'=>" سورة الكافرون",'callback_data'=>'kamedy109']],
[['text'=>"سورة النصر",'callback_data'=>'kamedy110'],['text'=>"سورة المسد",'callback_data'=>'kamedy111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'kamedy112'],['text'=>"سورة الفلق",'callback_data'=>'kamedy113']],
[['text'=>"سورة الناس",'callback_data'=>'kamedy114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/*
تنفيذ الشيخ سعد الغامدي
*/

if($data == "kamedy1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "kamedy114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/s_a_ag/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الشيخ الغامدي
*/

//الشيخ عبدالباسط عبد الصمد 

if($data=="samad"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء  عبد الباسط عبد الصمد ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'samad1'],['text'=>"سورة البقره",'callback_data'=>'samad2']],
[['text'=>"سورة ال عمران",'callback_data'=>'samad3'],['text'=>"سورة النساء",'callback_data'=>'samad4']],
[['text'=>"سورة المائده",'callback_data'=>'samad5'],['text'=>"سورة الانعام",'callback_data'=>'samad6']],
[['text'=>"سورة الاعراف",'callback_data'=>'samad7'],['text'=>"سورة الانفال",'callback_data'=>'samad8']],
[['text'=>" سورة التوبه",'callback_data'=>'samad9'],['text'=>"سورة يونس",'callback_data'=>'samad10']],
[['text'=>"سورة هود",'callback_data'=>'samad12'],['text'=>"سورة يوسف",'callback_data'=>'samad12']],
[['text'=>"سورة الرعد",'callback_data'=>'samad13'],['text'=>"سورة ابراهيم",'callback_data'=>'samad14']],
[['text'=>"سورة الحجر",'callback_data'=>'samad15'],['text'=>"سورة النحل",'callback_data'=>'samad16']],
[['text'=>"سورة الاسراء",'callback_data'=>'samad17'],['text'=>"سورة الكهف",'callback_data'=>'samad18']],
[['text'=>" سورة مريم",'callback_data'=>'samad19'],['text'=>" سورة طه",'callback_data'=>'samad20']],
[['text'=>"سورة الانبياء",'callback_data'=>'samad21'],['text'=>"سورة الحج",'callback_data'=>'samad22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'samad23'],['text'=>"سورة النور",'callback_data'=>'samad24']],
[['text'=>"سورة الفرقان",'callback_data'=>'samad25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'samad27'],['text'=>"سورة القصص",'callback_data'=>'samad28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'samad29'],['text'=>" سورة الروم",'callback_data'=>'samad30']],
[['text'=>"سورة لقمان",'callback_data'=>'samad31'],['text'=>"سورة السجده",'callback_data'=>'samad32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'samad33'],['text'=>"سورة سبا",'callback_data'=>'samad34']],
[['text'=>"سورة فاطر",'callback_data'=>'samad35'],['text'=>"سورة يس",'callback_data'=>'samad36']],
[['text'=>"سورة الصافات",'callback_data'=>'samad37'],['text'=>"سورة ص",'callback_data'=>'samad38']],
[['text'=>" سورة الزمر",'callback_data'=>'samad39'],['text'=>"سورة غافر",'callback_data'=>'samad40']],
[['text'=>"سورة فصلت",'callback_data'=>'samad41'],['text'=>"سورة الشورى",'callback_data'=>'samad42']],
[['text'=>"سورة الزخرف",'callback_data'=>'samad43'],['text'=>"سورة الدخان",'callback_data'=>'samad44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'samad45'],['text'=>"سورة الاحقاف",'callback_data'=>'samad46']],
[['text'=>"سورة محمد",'callback_data'=>'samad47'],['text'=>"سورة الفتح",'callback_data'=>'samad48']],
[['text'=>" سورة الحجرات",'callback_data'=>'samad49'],['text'=>" سورة ق",'callback_data'=>'samad50']],
[['text'=>"سورة الذريات",'callback_data'=>'samad51'],['text'=>"سورة الطور",'callback_data'=>'samad52']],
[['text'=>"سورة النجم",'callback_data'=>'samad53'],['text'=>"سورة القمر",'callback_data'=>'samad54']],
[['text'=>"سورة الرحمن",'callback_data'=>'samad55'],['text'=>"سورة الواقعه",'callback_data'=>'samad56']],
[['text'=>"سورة الحديد",'callback_data'=>'samad57'],['text'=>"سورة المجادله",'callback_data'=>'samad58']],
[['text'=>"سورة الحشر",'callback_data'=>'samad59'],['text'=>" سورة الممتحنه",'callback_data'=>'samad60']],
[['text'=>"التالي",'callback_data'=>"samady2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="samady2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء  عبد الباسط عبد الصمد ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'samad61']],
[['text'=>"سورة الجمعه",'callback_data'=>'samad62'],['text'=>"سورة المنافقون",'callback_data'=>'samad63']],
[['text'=>"سورة التغابن",'callback_data'=>'samad64'],['text'=>"سورة الطلاق",'callback_data'=>'samad65']],
[['text'=>"سورة التحريم",'callback_data'=>'samad66'],['text'=>"سورة الملك",'callback_data'=>'samad67']],
[['text'=>" سورة القلم",'callback_data'=>'samad68'],['text'=>"سورة الحاقه",'callback_data'=>'samad69']],
[['text'=>"سورة المعارج",'callback_data'=>'samad70'],['text'=>"سورة نوح",'callback_data'=>'samad71']],
[['text'=>"سورة الجن",'callback_data'=>'samad72'],['text'=>"سورة المزمل",'callback_data'=>'samad73']],
[['text'=>"سورة المدثر",'callback_data'=>'samad74'],['text'=>"سورة القيامه",'callback_data'=>'samad75']],
[['text'=>"سورة الانسان",'callback_data'=>'samad76'],['text'=>"سورة المرسلات",'callback_data'=>'samad77']],
[['text'=>" سورة النبا",'callback_data'=>'samad78'],['text'=>" سورة النازعات",'callback_data'=>'samad79']],
[['text'=>"سورة عبس",'callback_data'=>'samad80'],['text'=>"سورة التكوير",'callback_data'=>'samad81']],
[['text'=>"سورة الانفطار",'callback_data'=>'samad82'],['text'=>"سورة المطففين",'callback_data'=>'samad83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'samad84'],['text'=>"سورة البروج",'callback_data'=>'samad85']],
[['text'=>"سورة الطارق",'callback_data'=>'samad86'],['text'=>"سورة الاعلى",'callback_data'=>'samad87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'samad88'],['text'=>" سورة الفجر",'callback_data'=>'samad89']],
[['text'=>"سورة البلد",'callback_data'=>'samad90'],['text'=>"سورة الشمس",'callback_data'=>'samad91']],
[['text'=>"سورة الليل",'callback_data'=>'samad92'],['text'=>"سورة الضحى",'callback_data'=>'samad93']],
[['text'=>"سورة الشرح",'callback_data'=>'samad94'],['text'=>"سورة التين",'callback_data'=>'samad95']],
[['text'=>"سورة العلق",'callback_data'=>'samad96'],['text'=>"سورة القدر",'callback_data'=>'samad97']],
[['text'=>" سورة البينه",'callback_data'=>'samad98'],['text'=>"سورة الزلزله",'callback_data'=>'samad99']],
[['text'=>"سورة العاديات",'callback_data'=>'samad100'],['text'=>"سورة القارعه",'callback_data'=>'samad101']],
[['text'=>"سورة التكاثر",'callback_data'=>'samad102'],['text'=>"سورة العصر",'callback_data'=>'samad103']],
[['text'=>"سورة الهمزه",'callback_data'=>'samad104'],['text'=>"سورة الفيل",'callback_data'=>'samad105']],
[['text'=>"سورة قريش",'callback_data'=>'samad106'],['text'=>"سورة الماعون",'callback_data'=>'samad107']],
[['text'=>" سورة الكوثر",'callback_data'=>'samad108'],['text'=>" سورة الكافرون",'callback_data'=>'samad109']],
[['text'=>"سورة النصر",'callback_data'=>'samad110'],['text'=>"سورة المسد",'callback_data'=>'samad111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'samad112'],['text'=>"سورة الفلق",'callback_data'=>'samad113']],
[['text'=>"سورة الناس",'callback_data'=>'samad114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/*
تنفيذ الشيخ عبدالباسط عبدالصمد
*/

if($data == "samad1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "samad114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/a_b_d_al_b/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الشيخ عبدالباسط عبدالصمد 
*/

//الشيخ ابو بكر الشاطري

if($data=="satry"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء ابو بكر الشاطري ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'satry1'],['text'=>"سورة البقره",'callback_data'=>'satry2']],
[['text'=>"سورة ال عمران",'callback_data'=>'satry3'],['text'=>"سورة النساء",'callback_data'=>'satry4']],
[['text'=>"سورة المائده",'callback_data'=>'satry5'],['text'=>"سورة الانعام",'callback_data'=>'satry6']],
[['text'=>"سورة الاعراف",'callback_data'=>'satry7'],['text'=>"سورة الانفال",'callback_data'=>'satry8']],
[['text'=>" سورة التوبه",'callback_data'=>'satry9'],['text'=>"سورة يونس",'callback_data'=>'satry10']],
[['text'=>"سورة هود",'callback_data'=>'satry12'],['text'=>"سورة يوسف",'callback_data'=>'satry12']],
[['text'=>"سورة الرعد",'callback_data'=>'satry13'],['text'=>"سورة ابراهيم",'callback_data'=>'satry14']],
[['text'=>"سورة الحجر",'callback_data'=>'satry15'],['text'=>"سورة النحل",'callback_data'=>'satry16']],
[['text'=>"سورة الاسراء",'callback_data'=>'satry17'],['text'=>"سورة الكهف",'callback_data'=>'satry18']],
[['text'=>" سورة مريم",'callback_data'=>'satry19'],['text'=>" سورة طه",'callback_data'=>'satry20']],
[['text'=>"سورة الانبياء",'callback_data'=>'satry21'],['text'=>"سورة الحج",'callback_data'=>'satry22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'satry23'],['text'=>"سورة النور",'callback_data'=>'satry24']],
[['text'=>"سورة الفرقان",'callback_data'=>'satry25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'satry27'],['text'=>"سورة القصص",'callback_data'=>'satry28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'satry29'],['text'=>" سورة الروم",'callback_data'=>'satry30']],
[['text'=>"سورة لقمان",'callback_data'=>'satry31'],['text'=>"سورة السجده",'callback_data'=>'satry32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'satry33'],['text'=>"سورة سبا",'callback_data'=>'satry34']],
[['text'=>"سورة فاطر",'callback_data'=>'satry35'],['text'=>"سورة يس",'callback_data'=>'satry36']],
[['text'=>"سورة الصافات",'callback_data'=>'satry37'],['text'=>"سورة ص",'callback_data'=>'satry38']],
[['text'=>" سورة الزمر",'callback_data'=>'satry39'],['text'=>"سورة غافر",'callback_data'=>'satry40']],
[['text'=>"سورة فصلت",'callback_data'=>'satry41'],['text'=>"سورة الشورى",'callback_data'=>'satry42']],
[['text'=>"سورة الزخرف",'callback_data'=>'satry43'],['text'=>"سورة الدخان",'callback_data'=>'satry44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'satry45'],['text'=>"سورة الاحقاف",'callback_data'=>'satry46']],
[['text'=>"سورة محمد",'callback_data'=>'satry47'],['text'=>"سورة الفتح",'callback_data'=>'satry48']],
[['text'=>" سورة الحجرات",'callback_data'=>'satry49'],['text'=>" سورة ق",'callback_data'=>'satry50']],
[['text'=>"سورة الذريات",'callback_data'=>'satry51'],['text'=>"سورة الطور",'callback_data'=>'satry52']],
[['text'=>"سورة النجم",'callback_data'=>'satry53'],['text'=>"سورة القمر",'callback_data'=>'satry54']],
[['text'=>"سورة الرحمن",'callback_data'=>'satry55'],['text'=>"سورة الواقعه",'callback_data'=>'satry56']],
[['text'=>"سورة الحديد",'callback_data'=>'satry57'],['text'=>"سورة المجادله",'callback_data'=>'satry58']],
[['text'=>"سورة الحشر",'callback_data'=>'satry59'],['text'=>" سورة الممتحنه",'callback_data'=>'satry60']],
[['text'=>"التالي",'callback_data'=>"satryy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="satryy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء ابو بكر الشاطري ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'satry61']],
[['text'=>"سورة الجمعه",'callback_data'=>'satry62'],['text'=>"سورة المنافقون",'callback_data'=>'satry63']],
[['text'=>"سورة التغابن",'callback_data'=>'satry64'],['text'=>"سورة الطلاق",'callback_data'=>'satry65']],
[['text'=>"سورة التحريم",'callback_data'=>'satry66'],['text'=>"سورة الملك",'callback_data'=>'satry67']],
[['text'=>" سورة القلم",'callback_data'=>'satry68'],['text'=>"سورة الحاقه",'callback_data'=>'satry69']],
[['text'=>"سورة المعارج",'callback_data'=>'satry70'],['text'=>"سورة نوح",'callback_data'=>'satry71']],
[['text'=>"سورة الجن",'callback_data'=>'satry72'],['text'=>"سورة المزمل",'callback_data'=>'satry73']],
[['text'=>"سورة المدثر",'callback_data'=>'satry74'],['text'=>"سورة القيامه",'callback_data'=>'satry75']],
[['text'=>"سورة الانسان",'callback_data'=>'satry76'],['text'=>"سورة المرسلات",'callback_data'=>'satry77']],
[['text'=>" سورة النبا",'callback_data'=>'satry78'],['text'=>" سورة النازعات",'callback_data'=>'satry79']],
[['text'=>"سورة عبس",'callback_data'=>'satry80'],['text'=>"سورة التكوير",'callback_data'=>'satry81']],
[['text'=>"سورة الانفطار",'callback_data'=>'satry82'],['text'=>"سورة المطففين",'callback_data'=>'satry83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'satry84'],['text'=>"سورة البروج",'callback_data'=>'satry85']],
[['text'=>"سورة الطارق",'callback_data'=>'satry86'],['text'=>"سورة الاعلى",'callback_data'=>'satry87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'satry88'],['text'=>" سورة الفجر",'callback_data'=>'satry89']],
[['text'=>"سورة البلد",'callback_data'=>'satry90'],['text'=>"سورة الشمس",'callback_data'=>'satry91']],
[['text'=>"سورة الليل",'callback_data'=>'satry92'],['text'=>"سورة الضحى",'callback_data'=>'satry93']],
[['text'=>"سورة الشرح",'callback_data'=>'satry94'],['text'=>"سورة التين",'callback_data'=>'satry95']],
[['text'=>"سورة العلق",'callback_data'=>'satry96'],['text'=>"سورة القدر",'callback_data'=>'satry97']],
[['text'=>" سورة البينه",'callback_data'=>'satry98'],['text'=>"سورة الزلزله",'callback_data'=>'satry99']],
[['text'=>"سورة العاديات",'callback_data'=>'satry100'],['text'=>"سورة القارعه",'callback_data'=>'satry101']],
[['text'=>"سورة التكاثر",'callback_data'=>'satry102'],['text'=>"سورة العصر",'callback_data'=>'satry103']],
[['text'=>"سورة الهمزه",'callback_data'=>'satry104'],['text'=>"سورة الفيل",'callback_data'=>'satry105']],
[['text'=>"سورة قريش",'callback_data'=>'satry106'],['text'=>"سورة الماعون",'callback_data'=>'satry107']],
[['text'=>" سورة الكوثر",'callback_data'=>'satry108'],['text'=>" سورة الكافرون",'callback_data'=>'satry109']],
[['text'=>"سورة النصر",'callback_data'=>'satry110'],['text'=>"سورة المسد",'callback_data'=>'satry111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'satry112'],['text'=>"سورة الفلق",'callback_data'=>'satry113']],
[['text'=>"سورة الناس",'callback_data'=>'satry114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/*
تنفيذ الشيخ ابو بكر الشاطري 
*/

if($data == "satry1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "satry114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/shaterye/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الشيخ ابو بكر الشاطري
*/

//الشيخ فارس عباد

if($data=="fares"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء فارس عباد ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الفاتحه",'callback_data'=>'fares1'],['text'=>"سورة البقره",'callback_data'=>'fares2']],
[['text'=>"سورة ال عمران",'callback_data'=>'fares3'],['text'=>"سورة النساء",'callback_data'=>'fares4']],
[['text'=>"سورة المائده",'callback_data'=>'fares5'],['text'=>"سورة الانعام",'callback_data'=>'fares6']],
[['text'=>"سورة الاعراف",'callback_data'=>'fares7'],['text'=>"سورة الانفال",'callback_data'=>'fares8']],
[['text'=>" سورة التوبه",'callback_data'=>'fares9'],['text'=>"سورة يونس",'callback_data'=>'fares10']],
[['text'=>"سورة هود",'callback_data'=>'fares12'],['text'=>"سورة يوسف",'callback_data'=>'fares12']],
[['text'=>"سورة الرعد",'callback_data'=>'fares13'],['text'=>"سورة ابراهيم",'callback_data'=>'fares14']],
[['text'=>"سورة الحجر",'callback_data'=>'fares15'],['text'=>"سورة النحل",'callback_data'=>'fares16']],
[['text'=>"سورة الاسراء",'callback_data'=>'fares17'],['text'=>"سورة الكهف",'callback_data'=>'fares18']],
[['text'=>" سورة مريم",'callback_data'=>'fares19'],['text'=>" سورة طه",'callback_data'=>'fares20']],
[['text'=>"سورة الانبياء",'callback_data'=>'fares21'],['text'=>"سورة الحج",'callback_data'=>'fares22']],
[['text'=>"سورة المؤمنون",'callback_data'=>'fares23'],['text'=>"سورة النور",'callback_data'=>'fares24']],
[['text'=>"سورة الفرقان",'callback_data'=>'fares25'],['text'=>"سورة الشعراء",'callback_data'=>'sode26']],
[['text'=>"سورة النمل",'callback_data'=>'fares27'],['text'=>"سورة القصص",'callback_data'=>'fares28']],
[['text'=>"سورة العنكبوت",'callback_data'=>'fares29'],['text'=>" سورة الروم",'callback_data'=>'fares30']],
[['text'=>"سورة لقمان",'callback_data'=>'fares31'],['text'=>"سورة السجده",'callback_data'=>'fares32']],
[['text'=>"سورة الاحزاب",'callback_data'=>'fares33'],['text'=>"سورة سبا",'callback_data'=>'fares34']],
[['text'=>"سورة فاطر",'callback_data'=>'fares35'],['text'=>"سورة يس",'callback_data'=>'fares36']],
[['text'=>"سورة الصافات",'callback_data'=>'fares37'],['text'=>"سورة ص",'callback_data'=>'fares38']],
[['text'=>" سورة الزمر",'callback_data'=>'fares39'],['text'=>"سورة غافر",'callback_data'=>'fares40']],
[['text'=>"سورة فصلت",'callback_data'=>'fares41'],['text'=>"سورة الشورى",'callback_data'=>'fares42']],
[['text'=>"سورة الزخرف",'callback_data'=>'fares43'],['text'=>"سورة الدخان",'callback_data'=>'fares44']],
[['text'=>"سورة الجاثيه",'callback_data'=>'fares45'],['text'=>"سورة الاحقاف",'callback_data'=>'fares46']],
[['text'=>"سورة محمد",'callback_data'=>'fares47'],['text'=>"سورة الفتح",'callback_data'=>'fares48']],
[['text'=>" سورة الحجرات",'callback_data'=>'fares49'],['text'=>" سورة ق",'callback_data'=>'fares50']],
[['text'=>"سورة الذريات",'callback_data'=>'fares51'],['text'=>"سورة الطور",'callback_data'=>'fares52']],
[['text'=>"سورة النجم",'callback_data'=>'fares53'],['text'=>"سورة القمر",'callback_data'=>'fares54']],
[['text'=>"سورة الرحمن",'callback_data'=>'fares55'],['text'=>"سورة الواقعه",'callback_data'=>'fares56']],
[['text'=>"سورة الحديد",'callback_data'=>'fares57'],['text'=>"سورة المجادله",'callback_data'=>'fares58']],
[['text'=>"سورة الحشر",'callback_data'=>'fares59'],['text'=>" سورة الممتحنه",'callback_data'=>'fares60']],
[['text'=>"التالي",'callback_data'=>"faresy2"]],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($data=="faresy2"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم القرآن الكريم بصوت القاريء فارس عباد ، 🗂'

- اضغط على اسم السوره وسأقوم بارسالها لك 
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"سورة الصف",'callback_data'=>'fares61']],
[['text'=>"سورة الجمعه",'callback_data'=>'fares62'],['text'=>"سورة المنافقون",'callback_data'=>'fares63']],
[['text'=>"سورة التغابن",'callback_data'=>'fares64'],['text'=>"سورة الطلاق",'callback_data'=>'fares65']],
[['text'=>"سورة التحريم",'callback_data'=>'fares66'],['text'=>"سورة الملك",'callback_data'=>'fares67']],
[['text'=>" سورة القلم",'callback_data'=>'fares68'],['text'=>"سورة الحاقه",'callback_data'=>'fares69']],
[['text'=>"سورة المعارج",'callback_data'=>'fares70'],['text'=>"سورة نوح",'callback_data'=>'fares71']],
[['text'=>"سورة الجن",'callback_data'=>'fares72'],['text'=>"سورة المزمل",'callback_data'=>'fares73']],
[['text'=>"سورة المدثر",'callback_data'=>'fares74'],['text'=>"سورة القيامه",'callback_data'=>'fares75']],
[['text'=>"سورة الانسان",'callback_data'=>'fares76'],['text'=>"سورة المرسلات",'callback_data'=>'fares77']],
[['text'=>" سورة النبا",'callback_data'=>'fares78'],['text'=>" سورة النازعات",'callback_data'=>'fares79']],
[['text'=>"سورة عبس",'callback_data'=>'fares80'],['text'=>"سورة التكوير",'callback_data'=>'fares81']],
[['text'=>"سورة الانفطار",'callback_data'=>'fares82'],['text'=>"سورة المطففين",'callback_data'=>'fares83']],
[['text'=>"سورة الانشقاق",'callback_data'=>'fares84'],['text'=>"سورة البروج",'callback_data'=>'fares85']],
[['text'=>"سورة الطارق",'callback_data'=>'fares86'],['text'=>"سورة الاعلى",'callback_data'=>'fares87']],
[['text'=>"سورة الغاشيه",'callback_data'=>'fares88'],['text'=>" سورة الفجر",'callback_data'=>'fares89']],
[['text'=>"سورة البلد",'callback_data'=>'fares90'],['text'=>"سورة الشمس",'callback_data'=>'fares91']],
[['text'=>"سورة الليل",'callback_data'=>'fares92'],['text'=>"سورة الضحى",'callback_data'=>'fares93']],
[['text'=>"سورة الشرح",'callback_data'=>'fares94'],['text'=>"سورة التين",'callback_data'=>'fares95']],
[['text'=>"سورة العلق",'callback_data'=>'fares96'],['text'=>"سورة القدر",'callback_data'=>'fares97']],
[['text'=>" سورة البينه",'callback_data'=>'fares98'],['text'=>"سورة الزلزله",'callback_data'=>'fares99']],
[['text'=>"سورة العاديات",'callback_data'=>'fares100'],['text'=>"سورة القارعه",'callback_data'=>'fares101']],
[['text'=>"سورة التكاثر",'callback_data'=>'fares102'],['text'=>"سورة العصر",'callback_data'=>'fares103']],
[['text'=>"سورة الهمزه",'callback_data'=>'fares104'],['text'=>"سورة الفيل",'callback_data'=>'fares105']],
[['text'=>"سورة قريش",'callback_data'=>'fares106'],['text'=>"سورة الماعون",'callback_data'=>'fares107']],
[['text'=>" سورة الكوثر",'callback_data'=>'fares108'],['text'=>" سورة الكافرون",'callback_data'=>'fares109']],
[['text'=>"سورة النصر",'callback_data'=>'fares110'],['text'=>"سورة المسد",'callback_data'=>'fares111']],
[['text'=>"سورة الاخلاص",'callback_data'=>'fares112'],['text'=>"سورة الفلق",'callback_data'=>'fares113']],
[['text'=>"سورة الناس",'callback_data'=>'fares114']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/*
تنفيذ الشيخ فارس عباد
*/
if($data == "fares1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/19",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/21",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares21"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/22",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares22"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares23"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares24"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares25"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/26",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares26"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/27",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares27"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/28",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares28"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/29",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares29"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/30",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares30"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/31",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares31"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/32",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares32"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/33",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares33"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/34",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares34"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/35",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares35"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/36",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares36"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/37",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares37"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/38",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares38"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/39",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares39"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/40",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares40"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/41",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares41"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/42",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares42"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/43",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares43"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/44",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares44"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/45",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares45"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/46",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares46"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/47",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares47"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/48",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares48"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/49",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares49"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/50",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares50"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/51",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares51"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/52",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares52"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/53",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares53"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/54",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares54"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/55",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares55"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/56",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares56"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/57",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares57"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/58",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares58"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/59",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares59"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/60",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares60"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/61",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares61"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/62",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares62"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/63",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares63"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/64",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares64"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/65",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares65"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/66",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares66"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/67",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares67"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/68",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares68"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/69",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares69"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/70",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares70"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/71",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares71"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/72",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares72"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/73",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares73"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/74",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares74"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/75",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares75"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/76",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares76"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/77",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares77"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/78",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares78"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/79",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares79"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/80",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares80"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/81",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares81"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/82",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares82"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/83",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares83"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/84",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares84"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/85",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares85"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/86",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares86"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/87",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares87"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/88",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares88"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/89",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares89"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/90",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares90"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/91",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares91"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/92",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares92"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/93",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares93"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/94",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares94"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/95",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares95"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/96",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares96"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/97",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares97"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/98",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares98"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/99",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares99"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/100",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares100"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/101",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares101"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/102",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares102"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/103",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares103"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/104",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares104"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/105",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares105"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/106",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares106"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/107",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares107"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/108",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares108"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/109",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares109"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/110",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares110"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/111",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares111"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/112",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares112"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/113",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares113"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/114",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "fares114"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/abadft/115",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الشيخ فارس عباد
*/

/*
الاذكار
*/

  if($data ==  'starta' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'أهلاً بك في قسم لأذكار ..
 
‎ القسم مطور بطريقة مميزة ليسهل عليك قراءة الأذكار 
/start' 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'أذكار الصباح .','callback_data'=> 'c' ]],
[['text'=> 'أذكار المساء .' ,'callback_data'=> 'e']] ,
[['text'=> 'أوقات الصلاة .' ,'callback_data'=> 'a']] ,
[['text'=> 'أركان الإسلام .' ,'callback_data'=> 't']] ,
[['text'=> 'أجمل دعاء إلى الله .' ,'callback_data'=> 'y']] ,
[['text'=> 'دعاء يقال في قيام الليل .' ,'callback_data'=> 'r']] ,
[['text'=> 'الدعاء عند دخول الخلاء و عند الخروج منه .' ,'callback_data'=> 'z']] ,
[['text'=> 'أوقات يُستحب فيها الدعاء وتُستجاب الدعوات .' ,'callback_data'=> 'u']] ,
[['text'=> 'كلمتان خفيفتان على اللسان، ثقيلتان في الميزان .' ,'callback_data'=> 'w']] ,
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}






if($data ==  'c' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '▪️أَعُوذُ بِاللهِ مِنْ الشَّيْطَانِ الرَّجِيمِ
 
 ⏺اللّهُ لاَ إِلَـهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَّهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَن ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلاَّ بِمَا شَاء وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَؤُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ.[آية الكرسى - البقرة 255]. 
 🔹مرة واحدة ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c1' ]]
]
])
]);
}
if($data ==  'c1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
 
 ⏺قُلْ هُوَ ٱللَّهُ أَحَدٌ، ٱللَّهُ ٱلصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ.
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c2' ]]
]
])
]);
}
if($data ==  'c2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
 
 ⏺قُلْ أَعُوذُ بِرَبِّ ٱلْفَلَقِ، مِن شَرِّ مَا خَلَقَ، وَمِن شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِن شَرِّ ٱلنَّفَّٰثَٰتِ فِى ٱلْعُقَدِ، وَمِن شَرِّ حَاسِدٍ إِذَا حَسَدَ. 
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c3' ]]
]
])
]);
}
if($data ==  'c3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '➖بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
 
 ⏺قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ، مَلِكِ ٱلنَّاسِ، إِلَٰهِ ٱلنَّاسِ، مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ، ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ، مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ.
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c4' ]]
]
])
]);
}

if($data ==  'c4' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '
 🔸أَصْـبَحْنا وَأَصْـبَحَ المُـلْكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذا اليوم وَخَـيرَ ما بَعْـدَه ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذا اليوم وَشَرِّ ما بَعْـدَه، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر. ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c5' ]]
]
])
]);
}

if($data ==  'c5' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '
 🔸اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ . ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c6' ]]
]
])
]);
}

if($data ==  'c6' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔸رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً. 
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c7' ]]
]
])
]);
}



if($data ==  'c7' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '
 🔸حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم. 
 🔹7 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c8' ]]
]
])
]);
}
if($data ==  'c8' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم.
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c9' ]]
]
])
]);
}
if($data ==  'c9' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘اللّهُـمَّ بِكَ أَصْـبَحْنا وَبِكَ أَمْسَـينا ، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ النُّـشُور' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c10' ]]
]
])
]);
}
if($data ==  'c10' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘أَصْبَـحْـنا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ. ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الـتـالـي' , callback_data => 'c11' ]]
]
])
]);
}
if($data ==  'c11' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '
 🔘سُبْحـانَ اللهِ وَبِحَمْـدِهِ عَدَدَ خَلْـقِه ، وَرِضـا نَفْسِـه ، وَزِنَـةَ عَـرْشِـه ، وَمِـدادَ كَلِمـاتِـه.
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c12' ]]
]
])
]);
}
if($data ==  'c12' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ اللّهُـمَّ إِنّـي أَعـوذُ بِكَ مِنَ الْكُـفر ، وَالفَـقْر ، وَأَعـوذُ بِكَ مِنْ عَذابِ القَـبْر ، لا إلهَ إلاّ أَنْـتَ.
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c13' ]]
]
])
]);
}
if($data ==  'c13' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '
 🔘اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي ، اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي ، وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي. ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c14' ]]
]
])
]);
}
if($data ==  'c14' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘يَا حَيُّ يَا قيُّومُ بِرَحْمَتِكَ أسْتَغِيثُ أصْلِحْ لِي شَأنِي كُلَّهُ وَلاَ تَكِلُنِي إلَى نَفْسِي طَـرْفَةَ عَيْنٍ.' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c15' ]]
]
])
]);
}
if($data ==  'c15' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘اللّهُـمَّ عالِـمَ الغَـيْبِ وَالشّـهادَةِ فاطِـرَ السّماواتِ وَالأرْضِ رَبَّ كـلِّ شَـيءٍ وَمَليـكَه ، أَشْهَـدُ أَنْ لا إِلـهَ إِلاّ أَنْت ، أَعـوذُ بِكَ مِن شَـرِّ نَفْسـي وَمِن شَـرِّ الشَّيْـطانِ وَشِـرْكِه ، وَأَنْ أَقْتَـرِفَ عَلـى نَفْسـي سوءاً أَوْ أَجُـرَّهُ إِلـى مُسْـلِم. ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c17' ]]
]
])
]);
}
if($data ==  'c17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق.
 🔹3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c18' ]]
]
])
]);
}


if($data ==  'c18' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد.
 ✔️غير مقيد بعدد' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c19' ]]
]
])
]);
}
if($data ==  'c19' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '🔘اللَّهُمَّ إِنَّا نَعُوذُ بِكَ مِنْ أَنْ نُشْرِكَ بِكَ شَيْئًا نَعْلَمُهُ ، وَنَسْتَغْفِرُكَ لِمَا لَا نَعْلَمُهُ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'c20' ]]
]
])
]);
}

if($data ==  'c20' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
   "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}






if($data ==  'a' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الفجْر٤:٣٨ ص' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الفْجر .' , callback_data => 'a1' ]]
]
])
]);
}
if($data ==  'a1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الشروق٥:٥٩ ص' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الشروق .' , callback_data => 'a2' ]]
]
])
]);
}
if($data ==  'a2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الظُّهْر١٢:٢٩ م' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الظُّهْر .' , callback_data => 'a3' ]]
]
])
]);
}


if($data ==  'a3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'العَصر٣:٥٠ م' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العَصر .' , callback_data => 'a4' ]]
]
])
]);
}
if($data ==  'a4' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'المَغرب٦:٥٨ م' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'المَغرب .' , callback_data => 'a5' ]]
]
])
]);
}
if($data ==  'a5' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'العِشاء٨:٢٨ م' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العِشاء .' , callback_data => 'a6' ]]
]
])
]);
}
if($data ==  'a6' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}






if($data ==  'z' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'عند الدخول يقول : (بِسمِ الله ) اللّهُـمَّ إِنِّـي أَعـوذُ بِـكَ مِـنَ الخُـبثِ وَالخَبائِث. رواه البخاري ومسلم .
وإذا خرج قال: غُفـرانَك. أخرجه أصحاب السنن إلا النسائي' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'z1' ]]
]
])
]);
}
if($data ==  'z1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}






if($data ==  'r' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللهم أنت ربي لا إله إلا أنت عليك توكلت وأنت رب العرش العظيم ما شاء الله كان وما لم يشأ لم يكن لا حول ولا قوة إلا العظيم العلى العظيم أعلم أن الله على كل شيء قدير وأن الله قد أحاط بكل شيء علما اللهم إني أعوذ بك من شر نفسي ومن شر كل دابة أنت آخذ بناصيتها إن ربي على صراط مستقيم.' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'r1' ]]
]
])
]);
}
if($data ==  'r1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}






if($data ==  'w' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'عن أبي هريرة - رضي الله عنه - قال: قال رسول الله - صلى الله عليه وسلم -: ((كلمتان خفيفتان على اللسان، ثقيلتان في الميزان، حبيبتان إلى الرحمن: ((سبحان الله وبحمده، سبحان الله العظيم))، متفق عليه.' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'w1' ]]
]
])
]);
}
if($data ==  'w1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}





if($data ==  'y' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دُعاء مصدر دَعا، وهو ما يُدْعَى به اللهَ من القول، وهو أيضًا رفع الكفّين بالابتهال والتضرّع إلى الله، وهو من العبادات التي يلجأ بها العبد إلى الله وحده دون غيره في أي وقت شاء، ولا ينحصر الدعاء في صيغة محدّدة، وقد قال تعالى في كتابه الكريم: " وَإِذَا سَأَلَكَ عِبَادِي عَنِّي فَإِنِّي قَرِيبٌ ۖ أُجِيبُ دَعْوَةَ الدَّاعِ إِذَا دَعَانِ" [١]، ولا يقتصر الدعاء على دعاء المرء لنفسه فقط، بل من الجميل قيام المرء بالدعاء لغيره بالخير، وفي هذا المقال حديثٌ عن الدعاء وعن أجمل دعاء إلى الله من الكتاب والسنّة .' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'y1' ]]
]
])
]);
}
if($data ==  'y1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}





   
if($data ==  't' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الشهادتان (شهادة أن لا إله إلا الله، وشهادة ان محمداً رسول الله)' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الركن الاول .' , callback_data => 't1' ]]
]
])
]);
}
if($data ==  't1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'إقام الصلاة (وهي خمس صلوات في اليوم والليلة)' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الركن الثاني .' , callback_data => 't2' ]]
]
])
]);
}
if($data ==  't2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'إيتاء الزكاة' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الركن الثالث .' , callback_data => 't3' ]]
]
])
]);
}


if($data ==  't3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'صوم شهر رمضان' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الركن الرابع .' , callback_data => 't4' ]]
]
])
]);
}
if($data ==  't4' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'حج البيت (من استطاع إليه سبيلا، أي للقادرين)' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'الركن الخامس .' , callback_data => 't5' ]]
]
])
]);
}
if($data ==  't5' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 
'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],

]
])
]);
}






if($data ==  'e' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'أَعُوذُ بِاللهِ مِنْ الشَّيْطَانِ الرَّجِيمِ
 اللّهُ لاَ إِلَـهَ إِلاَّ هُوَ الْحَيُّ الْقَيُّومُ لاَ تَأْخُذُهُ سِنَةٌ وَلاَ نَوْمٌ لَّهُ مَا فِي السَّمَاوَاتِ وَمَا فِي الأَرْضِ مَن ذَا الَّذِي يَشْفَعُ عِنْدَهُ إِلاَّ بِإِذْنِهِ يَعْلَمُ مَا بَيْنَ أَيْدِيهِمْ وَمَا خَلْفَهُمْ وَلاَ يُحِيطُونَ بِشَيْءٍ مِّنْ عِلْمِهِ إِلاَّ بِمَا شَاء وَسِعَ كُرْسِيُّهُ السَّمَاوَاتِ وَالأَرْضَ وَلاَ يَؤُودُهُ حِفْظُهُمَا وَهُوَ الْعَلِيُّ الْعَظِيمُ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'e1' ]]
]
])
]);
}
if($data ==  'e1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
 قُلْ هُوَ ٱللَّهُ أَحَدٌ، ٱللَّهُ ٱلصَّمَدُ، لَمْ يَلِدْ وَلَمْ يُولَدْ، وَلَمْ يَكُن لَّهُۥ كُفُوًا أَحَدٌۢ 
 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e2' ]]
]
])
]);
}
if($data ==  'e2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
 قُلْ أَعُوذُ بِرَبِّ ٱلْفَلَقِ، مِن شَرِّ مَا خَلَقَ، وَمِن شَرِّ غَاسِقٍ إِذَا وَقَبَ، وَمِن شَرِّ ٱلنَّفَّٰثَٰتِ فِى ٱلْعُقَدِ، وَمِن شَرِّ حَاسِدٍ إِذَا حَسَدَ. 
 3 مرات'
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e3' ]]
]
])
]);
}
if($data ==  'e3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيم
 قُلْ أَعُوذُ بِرَبِّ ٱلنَّاسِ، مَلِكِ ٱلنَّاسِ، إِلَٰهِ ٱلنَّاسِ، مِن شَرِّ ٱلْوَسْوَاسِ ٱلْخَنَّاسِ، ٱلَّذِى يُوَسْوِسُ فِى صُدُورِ ٱلنَّاسِ، مِنَ ٱلْجِنَّةِ وَٱلنَّاسِ
 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e4' ]]
]
])
]);
}
if($data ==  'e4' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'أَمْسَيْـنا وَأَمْسـى المـلكُ لله وَالحَمدُ لله ، لا إلهَ إلاّ اللّهُ وَحدَهُ لا شَريكَ لهُ، لهُ المُـلكُ ولهُ الحَمْـد، وهُوَ على كلّ شَيءٍ قدير ، رَبِّ أسْـأَلُـكَ خَـيرَ ما في هـذهِ اللَّـيْلَةِ وَخَـيرَ ما بَعْـدَهـا ، وَأَعـوذُ بِكَ مِنْ شَـرِّ ما في هـذهِ اللَّـيْلةِ وَشَرِّ ما بَعْـدَهـا ، رَبِّ أَعـوذُبِكَ مِنَ الْكَسَـلِ وَسـوءِ الْكِـبَر ، رَبِّ أَعـوذُ بِكَ مِنْ عَـذابٍ في النّـارِ وَعَـذابٍ في القَـبْر. ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e5' ]]
]
])
]);
}
if($data ==  'e5' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللّهـمَّ أَنْتَ رَبِّـي لا إلهَ إلاّ أَنْتَ ، خَلَقْتَنـي وَأَنا عَبْـدُك ، وَأَنا عَلـى عَهْـدِكَ وَوَعْـدِكَ ما اسْتَـطَعْـت ، أَعـوذُبِكَ مِنْ شَـرِّ ما صَنَـعْت ، أَبـوءُ لَـكَ بِنِعْـمَتِـكَ عَلَـيَّ وَأَبـوءُ بِذَنْـبي فَاغْفـِرْ لي فَإِنَّـهُ لا يَغْـفِرُ الذُّنـوبَ إِلاّ أَنْتَ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e6' ]]
]
])
]);
}
if($data ==  'e6' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'رَضيـتُ بِاللهِ رَبَّـاً وَبِالإسْلامِ ديـناً وَبِمُحَـمَّدٍ صلى الله عليه وسلم نَبِيّـاً. 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e7' ]]
]
])
]);
}
if($data ==  'e7' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'حَسْبِـيَ اللّهُ لا إلهَ إلاّ هُوَ عَلَـيهِ تَوَكَّـلتُ وَهُوَ رَبُّ العَرْشِ العَظـيم.   7 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e8' ]]
]
])
]);
}
if($data ==  'e8' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'بِسـمِ اللهِ الذي لا يَضُـرُّ مَعَ اسمِـهِ شَيءٌ في الأرْضِ وَلا في السّمـاءِ وَهـوَ السّمـيعُ العَلـيم. 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e9' ]]
]
])
]);
}
if($data ==  'e9' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللّهُـمَّ بِكَ أَمْسَـينا وَبِكَ أَصْـبَحْنا، وَبِكَ نَحْـيا وَبِكَ نَمُـوتُ وَإِلَـيْكَ الْمَصِيرُ.' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'e10' ]]
]
])
]);
}
if($data ==  'e10' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'أَمْسَيْنَا عَلَى فِطْرَةِ الإسْلاَمِ، وَعَلَى كَلِمَةِ الإِخْلاَصِ، وَعَلَى دِينِ نَبِيِّنَا مُحَمَّدٍ صَلَّى اللهُ عَلَيْهِ وَسَلَّمَ، وَعَلَى مِلَّةِ أَبِينَا إبْرَاهِيمَ حَنِيفاً مُسْلِماً وَمَا كَانَ مِنَ المُشْرِكِينَ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e11' ]]
]
])
]);
}
if($data ==  'e11' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللّهُـمَّ عافِـني في بَدَنـي ، اللّهُـمَّ عافِـني في سَمْـعي ، اللّهُـمَّ عافِـني في بَصَـري ، لا إلهَ إلاّ أَنْـتَ.  اللّهُـمَّ إِنّـي أَعـوذُ بِكَ مِنَ الْكُـفر ، وَالفَـقْر ، وَأَعـوذُ بِكَ مِنْ عَذابِ القَـبْر لا إلهَ إلاّ أَنْـتَ
 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e12' ]]
]
])
]);
}
if($data ==  'e12' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في الدُّنْـيا وَالآخِـرَة ، اللّهُـمَّ إِنِّـي أسْـأَلُـكَ العَـفْوَ وَالعـافِـيةَ في ديني وَدُنْـيايَ وَأهْـلي وَمالـي اللّهُـمَّ اسْتُـرْ عـوْراتي وَآمِـنْ رَوْعاتـي ، اللّهُـمَّ احْفَظْـني مِن بَـينِ يَدَيَّ وَمِن خَلْفـي وَعَن يَمـيني وَعَن شِمـالي ، وَمِن فَوْقـي وَأَعـوذُ بِعَظَمَـتِكَ أَن أُغْـتالَ مِن تَحْتـي. ' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e13' ]]
]
])
]);
}
if($data ==  'e13' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'يَا حَيُّ يَا قيُّومُ بِرَحْمَتِكَ أسْتَغِيثُ أصْلِحْ لِي شَأنِي كُلَّهُ وَلاَ تَكِلُنِي إلَى نَفْسِي طَـرْفَةَ عَيْنٍ. 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e14' ]]
]
])
]);
}if($data ==  'e14' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللّهُـمَّ عالِـمَ الغَـيْبِ وَالشّـهادَةِ فاطِـرَ السّماواتِ وَالأرْضِ رَبَّ كـلِّ شَـيءٍ وَمَليـكَه ، أَشْهَـدُ أَنْ لا إِلـهَ إِلاّ أَنْت ، أَعـوذُ بِكَ مِن شَـرِّ نَفْسـي وَمِن شَـرِّ الشَّيْـطانِ وَشِـرْكِه ، وَأَنْ أَقْتَـرِفَ عَلـى نَفْسـي سوءاً أَوْ أَجُـرَّهُ إِلـى مُسْـلِم' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e15' ]]
]
])
]);
}
if($data ==  'e15' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'أَعـوذُ بِكَلِمـاتِ اللّهِ التّـامّـاتِ مِنْ شَـرِّ ما خَلَـق
 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e16' ]]
]
])
]);
}
if($data ==  'e16' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللَّهُمَّ صَلِّ وَسَلِّمْ وَبَارِكْ على نَبِيِّنَا مُحمَّد.
 غير مقيد بعدد' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e17' ]]
]
])
]);
}
if($data ==  'e17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'أسْتَغْفِرُ اللهَ َ الَّذِي لاَ إلَهَ إلاَّ هُوَ، الحَيُّ القَيُّومُ، وَأتُوبُ إلَيهِ. 3 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e19' ]]
]
])
]);
}
if($data ==  'e19' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'لَا إلَه إلّا اللهُ وَحْدَهُ لَا شَرِيكَ لَهُ، لَهُ الْمُلْكُ وَلَهُ الْحَمْدُ وَهُوَ عَلَى كُلُّ شَيْءِ قَدِيرِ. 10 مرات' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e20' ]]
]
])
]);
}
if($data ==  'e20' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'سُبْحـانَ اللهِ وَبِحَمْـدِهِ.100 مرة' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'e21' ]]
]
])
]);
}
if($data ==  'e21' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
   [['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}





if($data ==  'u' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ليلة القدر' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
 [['text'=> 'دعاء ليلة القدر .' ,'callback_data'=> 'uu']] ,
[[ 'text' => 'التالي .' , callback_data => 'u1' ]]
]
])
]);
}
if($data ==  'u1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'جوف الليل الأخير' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u2' ]]
]
])
]);
}
if($data ==  'u2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ما بين الأذان والإقامة'
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u3' ]]
]
])
]);
}
if($data ==  'u3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'عند نزول الغيث' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
 [['text'=> 'دعاء نزول الغيث .' ,'callback_data'=> 'uuu']] ,
[[ 'text' => 'التالي . ' , callback_data => 'u4' ]]
]
])
]);
}
if($data ==  'u4' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ساعة من يوم الجمعة 
( وأرجح الأقوال فيها أَنها آخر ساعة من ساعات العصر يوم الجمعة، وقد تكون ساعة الخطبة والصلاة )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
 [['text'=> 'دعاء يوم الجمعة .' ,'callback_data'=> 'uuuu']] ,
[[ 'text' => 'التالي . ' , callback_data => 'u5' ]]
]
])
]);
}
if($data ==  'u5' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'عند شُرب ماء زمزم مع صدق النية' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u6' ]]
]
])
]);
}
if($data ==  'u6' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'وقت السجود' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u7' ]]
]
])
]);
}
if($data ==  'u7' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'عند الاستقياظ من النوم ليلاً' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u8' ]]
]
])
]);
}
if($data ==  'u8' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'عند الدعاء بِـ: 
( لَا إِلَهَ إِلَّا أَنْتَ سُبْحَانَكَ إِنِّي كُنْتُ مِنَ الظَّالِمِينَ )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u9' ]]
]
])
]);
}
if($data ==  'u9' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المُسلم لأخيه المُسلم في ظهر الغيب' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي .' , callback_data => 'u10' ]]
]
])
]);
}
if($data ==  'u10' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء يوم عرفة' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u11' ]]
]
])
]);
}
if($data ==  'u11' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء في شهر رمضان' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
 [['text'=> 'أدعية مستحبة في شهر رمضان .' ,'callback_data'=> 'uuuuu']] ,
[[ 'text' => 'التالي . ' , callback_data => 'u12' ]]
]
])
]);
}
if($data ==  'u12' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'في مجالس الذكر' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u13' ]]
]
])
]);
}
if($data ==  'u13' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المسافر' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
 [['text'=> 'دعاء السفر .' ,'callback_data'=> 'uuuuuu']] ,
[[ 'text' => 'التالي . ' , callback_data => 'u14' ]]
]
])
]);
}if($data ==  'u14' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المضطر' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u15' ]]
]
])
]);
}
if($data ==  'u15' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء الولد البار بوالديه' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u16' ]]
]
])
]);
}
if($data ==  'u16' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الدعاء بعد الوضوء' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'u17' ]]
]
])
]);
}
if($data ==  'u17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}





if($data ==  'uu' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللهم اهدنا فيمن هديت، وعافنا فيمن عافيت، وتولنا فيمن توليت، وبارك لنا فيما أعطيت، وقنا برحمتك واصرف عنا شر ما قضيت، إنَّك تقضي ولا يُقضى عليك، إنّه لا يذِلُّ من واليت، ولا يعِزُّ من عاديت، تباركت ربنا وتعاليت، نستغفرك اللهم من جميع الذنوب والخطايا ونتوب إليك، ونؤمن بك ونتوكلُ عليك، اللهم أنتَ الغنيُّ ونحن الفقراء إليك، وأنتَ القويُّ ونحنُ الضعفاءُ اليك، اللَّهُمَّ إِنَّكَ عَفُوٌّ كَرِيمٌ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّا يا كريم' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uu1' ]]
]
])
]);
}if($data ==  'uu1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'يا إله العالمين، يا مجيب دعوة المضطرين، يا من لا يزداد على السؤال إلا كرمًا وجودًا، وعلى كثرة الإلحاح إلا تفضلاً وإحساناً، نسألك مسألة المساكين، ونبتهل إليك يا ربنا ابتهال الخاضع المذنب الذليل، ندعوك دُعاء من خضعت لكَ رقبته وذلَّ لكَ جسمه ورغم لكَ أنفه وفاضت لك عيناه، يا من يجيب المضطر إذا دعاه، ويكشف السوء عمن ناداه اللهم هؤلاء عبادك، قد نصبوا وجوههم إليك، ورفعوا أكُفَّ الضراعة إليك، في هذه الليلة المباركة، اللهم فأعطهم سؤلهم، ولا تخيب رجاءنا ورجاءهم، ولا تردنا خائبين برحمتك يا أرحم الراحمين' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uu2' ]]
]
])
]);
}
if($data ==  'uu2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللهم إنَّا نسألك في هذا المقام المبارك، وفي هذه الليلة المباركة أن تكتبنا من عتقائك من النار، اللهم أعتق رقابَنا ورقابَ آبائنا وأمهاتنا وسائر قراباتنا من النار يا عزيز يا غفار' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uu3' ]]
]
])
]);
}
if($data ==  'uu3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللهم أنتَ أحقَّ من ذُكر، وأحقَّ من عبد، وأنصرُ من ابتغى، وأرأف من مَلك، وأجود من سُئل، و أوسعُ من أعطى، أنتَ الملك لا شريك لكَ، والفرد لا تهلك، كل شيء هالك إلا وجهكَ، لن تطاع ألا بأذنك، ولن تعصى إلا بعلمك، تُطاع فتشكر، وتُعصى فتغفر، أقرب شهيد، وأدنى حفيظ، أخذت بالنواصي، وكتبت الآثار، ونسخت الآجال، القلوب لك مفضية، والسرُّ عندك علانية، الحلال ما أحللت، والحرام ما حرمت، والدين ما شرعت والأمر ما قضيت، الخلق خلقكَ، والعبد عبدكَ، وأنتَ الله الرؤوف الرحيم أسألك بنور وجهك الذي أشرقت له السماوات والأرض، أن تقبلنا العشية بإحسانك وأن تُجيرنا من النار برحمتك' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العودة' , callback_data => 'u17' ]]
]
])
]);
}
if($data ==  'u17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}




if($data ==  'uuu' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الدعاء عند اشتداد الريح:
 ( اللهم لقحًا لا عقيمًا )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuu1' ]]
]
])
]);
}if($data ==  'uuu1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المطر كما ورد عن الرسول -عليه الصلاة والسلام : 
( عن عائشة -رضي الله عنها- أن رسول الله -صلى الله عليه وسلم- كان إذا رأى المطر قال: {صيبًا نافعًا}، ويقصد بهذا الدعاء أن يكون المطر نافعًا دافعًا للفساد والضرر' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuu2' ]]
]
])
]);
}
if($data ==  'uuu2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المطر : 
(اللَّهم اسقِ بلدكَ وبهائمك، وانشُرْ رحمتك وأحيِ بلدك الميتَ اللهم اسقِنا غيثًا مغيثًا مَريئًا مُريعًا طَبَقًا واسِعًا عاجِلًا غيرَ آجلٍ نافعًا غيرَ ضار اللَّهم سُقْيا رَحمَةٍ ولا سُقْيا عذابٍ ولا هدم ولا غرَق ولا مَحْق اللَّهمَّ اسقنا الغيثَ وانصرنا على الأعداءِ)' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuu3' ]]
]
])
]);
}
if($data ==  'uuu3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المطر :
(اللَّهم حوالينا ولا علينا اللهم على الآكام والظّراب وبطون الأودية ومنابت الشجر)' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العودة' , callback_data => 'u3' ]]
]
])
]);
}
if($data ==  'u17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}





if($data ==  'uuuu' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ما ورد في قوله تعالى في سورة الفرقان: 
*{رَبَّنَا هَبْ لَنَا مِنْ أَزْوَاجِنَا وَذُرِّيَّاتِنَا قُرَّةَ أَعْيُنٍ وَاجْعَلْنَا لِلْمُتَّقِينَ إِمَامًا}*' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuu1' ]]
]
])
]);
}if($data ==  'uuuu1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ماورد في قوله تعالى في سورة الشعراء:
 *{رَبِّ هَبْ لِي حُكْمًا وَأَلْحِقْنِي بِالصَّالِحِينَ* وَاجْعَلْ لِي لِسَانَ صِدْقٍ فِي الآخِرِينَ* وَاجْعَلْنِي مِن وَرَثَةِ جَنَّةِ النَّعِيمِ}*' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuu2' ]]
]
])
]);
}
if($data ==  'uuuu2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ما ورد في قوله تعالى في سورة الأحقاف:
 {*رَبِّ أَوْزِعْنِي أَنْ أَشْكُرَ نِعْمَتَكَ الَّتِي أَنْعَمْتَ عَلَيَّ وَعَلَى وَالِدَيَّ وَأَنْ أَعْمَلَ صَالِحًا تَرْضَاهُ وَأَصْلِحْ لِي فِي ذُرِّيَّتِي إِنِّي تُبْتُ إِلَيْكَ وَإِنِّي مِنَ الْمُسْلِمِينَ}*' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuu3' ]]
]
])
]);
}
if($data ==  'uuuu3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'ما ورد في قوله تعالى في سورة آل عمران:
 *{ربَّنَا اغْفِرْ لَنَا ذُنُوبَنَا وَإِسْرَافَنَا فِي أَمْرِنَا وَثَبِّتْ أَقْدَامَنَا وانصُرْنَا عَلَى الْقَوْمِ الْكَافِرِينَ}*' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العودة' , callback_data => 'u4' ]]
]
])
]);
}
if($data ==  'u17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}





if($data ==  'uuuuu' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'رَبَّنَا آتِنَا فِي الدُّنْيَا حَسَنَةً وَفِي الْآخِرَةِ حَسَنَةً وَقِنَا عَذَابَ النَّارِ
' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuu1' ]]
]
])
]);
}if($data ==  'uuuuu1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '*{رَبَّنَا هَبْ لَنَا مِنْ أَزْوَاجِنَا وَذُرِّيَّاتِنَا قُرَّةَ أَعْيُنٍ وَاجْعَلْنَا لِلْمُتَّقِينَ إِمَامًا}*' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuu2' ]]
]
])
]);
}
if($data ==  'uuuuu2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => '{*رَبِّ اجْعَلْنِي مُقِيمَ الصَّلَاةِ وَمِنْ ذُرِّيَّتِي رَبَّنَا وَتَقَبَّلْ دُعَاءِ * رَبَّنَا اغْفِرْ لِي وَلِوَالِدَيَّ وَلِلْمُؤْمِنِينَ يَوْمَ يَقُومُ الْحِسَابُ}*' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuu3' ]]
]
])
]);
}
if($data ==  'uuuuu3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'اللّهمَّ إنّك عفوٌّ تحبُّ العفوَ فاعفُ عنّي' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العودة' , callback_data => 'u11' ]]
]
])
]);
}
if($data ==  'u17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}





if($data ==  'uuuuuu' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'يقول المسلم إذا أراد الخروج من المنزل لسفرٍ أو لغيره ما ورد عن أنس بن مالك -رضي الله عنه- أن رسول الله -صلى الله عليه وسلم- قال:
( مَنْ قالَ - يعني إذا خرج من بيته - : باسْمِ اللَّهِ ، تَوَكَّلْتُ على اللَّهِ ، وَلاَ حَوْلَ وَلاَ قُوَّةَ إِلاَّ باللَّهِ . يُقالُ لَهُ : كُفِيتَ وَوُقِيتَ وَهُدِيتَ ، فَتَتَنَحَّى لَهُ الشَّيَاطِينُ ، فَيَقُولُ لَهُ شَيطَانٌ آخَرُ : كَيْفَ لَكَ بِرَجُلٍ قَدْ هُدِيَ وكُفِيَ وَوُقِيَ ) ؟
' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuuu1' ]]
]
])
]);
}if($data ==  'uuuuuu1' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المسافر للمقيم: 
( أَسْتَوْدِعُكُمُ اللَّهَ الَّذِي لاَ تَضِيعُ وَدَائِعُهُ )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuuu2' ]]
]
])
]);
}
if($data ==  'uuuuuu2' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المقيم للمسافر:
 ( أَسْتَوْدِعُ اللَّهَ دِينَكَ، وَأَمَانَتَكَ، وَخَوَاتِيمَ عَمَلِكَ"، ويقول أيضًا: "زَوَّدَكَ اللَّهُ التَّقْوَى، وَغَفَرَ ذَنْبَكَ، وَيَسَّرَ لَكَ الخَيْرَ حَيْثُ ما كُنْتَ )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuuu3' ]]
]
])
]);
}
if($data ==  'uuuuuu3' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'الذِكر أثناء السفر:  
الإكثار من التكبير والتسبيح، قَالَ جَابِرٌ رضي الله عنه :
 ( كُنَّا إِذَا صَعَدْنَا كَبَّرْنَا، وَإِذَا نَزَلْنَا سَبَّحْنَا )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'التالي . ' , callback_data => 'uuuuuu4' ]]
]
])
]);
}
if($data ==  'uuuuuu4' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 'text' => 'دعاء المسافر إذا أسحر:
 ( سَمَّعَ سَامِعٌ بِحَمْدِ اللَّهِ، وَحُسْنِ بَلاَئِهِ عَلَيْنَا، رَبَّنَا صاحِبْنَا، وَأَفْضِلْ عَلَيْنَا، عَائِذاً بِاللَّهِ مِنَ النَّارِ". دعاء المسافر إذا نزل منزلًا: "أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّاتِ مِنْ شَرِّ مَا خَلَقَ )' 
 ,
 
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'العودة' , callback_data => 'u13' ]]
]
])
]);
}
if($data ==  'u17' ){
bot('editMessageText' ,[
 chat_id =>$chat_id2,
 'message_id'=>$message_id,
 
 'text' => 
 
 "- /start
 "
 
 ,
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],


]
])
]);
}
   
   /*
   نهاية الاذكار
   */
   
   //القصص
if($data=="Qasass"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم قصص القران الكريم ، 🗂'

- اختر اسم القصه من الاسفل وساقوم بارسالها لك
﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"قصة ادم عليه السلام",'callback_data'=>'sn1'],['text'=>"قصة ادريس عليه السلام",'callback_data'=>'sn2']],
[['text'=>"قصة نوح عليه السلام",'callback_data'=>'sn3'],['text'=>"قصة يوشع بن نون عليه السلام",'callback_data'=>'sn4']],
[['text'=>"قصة هود عليه السلام",'callback_data'=>'sn5'],['text'=>"قصة ابراهيم عليه السلام",'callback_data'=>'sn6']],
[['text'=>"قصة لوط عليه السلام",'callback_data'=>'sn7'],['text'=>"قصة العزير عليه السلام",'callback_data'=>'sn8']],
[['text'=>"قصة موسى عليه السلام",'callback_data'=>'sn9'],['text'=>"قصة ايوب عليه السلام",'callback_data'=>'sn10']],
[['text'=>"قصة سليمان عليه السلام",'callback_data'=>'sn11'],['text'=>"قصة صالح عليه السلام",'callback_data'=>'sn12']],
[['text'=>"قصة يونس عليه السلام",'callback_data'=>'sn13'],['text'=>"قصة يوسف عليه السلام",'callback_data'=>'sn14']],
[['text'=>"قصة ابليس والرجل الصالح",'callback_data'=>'sn15'],['text'=>"قصة ذو القرنين",'callback_data'=>'sn16']],
[['text'=>"قصة قابيل وهابيل",'callback_data'=>'sn17'],['text'=>"قصة اصحاب السبت",'callback_data'=>'sn18']],
[['text'=>"قصة بقرة بنو اسرائيل",'callback_data'=>'sn19'],['text'=>"قصة اصحاب الكهف",'callback_data'=>'sn20']],
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

/*
تنفيذ القصص
*/
if($data == "sn1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/24",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/11",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn3"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/25",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn4"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/6",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn5"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/2",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn6"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/23",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn7"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/3",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn8"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/8",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn9"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/5",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn10"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/4",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn11"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/7",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn12"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/9",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn13"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/10",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn14"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/12",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn15"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/13",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn16"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/14",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn17"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/15",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn18"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/16",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn19"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/17",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "sn20"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/18",
'reply_to_message_id' =>$message->message_id, 
]);
}
/*
نهاية القصص
*/

//الرقيه
if($data=="roqua"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
- أهلاً بك مجدداً [$Name](tg://user?id=$chat_id2)

في قسم قصص الرقيه الشرعيه ، 🗂'
 
- أسأل الله تعال أن يكتب الأجر لي ولك ❤️

- قم بااختيار الشيخ من الاسفل 
   ﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎﹎
[ • اضغط هنا وتابع جديدنا ، 🐋؛](https://t.me//$ch)",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
'reply_markup' =>json_encode([
'inline_keyboard'=>[
[[ 'text' => 'ياسر الدوسري .','callback_data'=> 'mt1' ]],
[['text'=> 'ماهر المعيقلي' ,'callback_data'=> 'mt2']] ,
[['text'=>"العودة 🔙",'callback_data'=>"home"]],   
]
])
]);
}

if($data == "mt1"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/20",
'reply_to_message_id' =>$message->message_id, 
]);
}
if($data == "mt2"){
   bot('sendaudio',[
'chat_id'=>$chat_id2,
 'audio'=>"https://t.me/sand_199/17",
'reply_to_message_id' =>$message->message_id, 
]);
}

/*
نهاية الرقيه 
*/

if($data=="nobtha"){
bot('editMessageText',[
 'chat_id'=>$chat_id2,
 'message_id'=>$message_id,
 'text'=>"
هذا البوت صدقة جاريه لجميع امواتنا واموات المسلمين اسأل الله ان يغفر لهم ويرحمهم ويجعل قبورهم روضه من رياض الجنه ويجعلهم من اهلها اللهم امين ..💙
",
'disable_web_page_preview'=> true ,
 'parse_mode'=>"Markdown",
 'reply_markup'=>json_encode([
 'inline_keyboard'=>[
[['text'=>"العودة 🔙",'callback_data'=>"home"]],
]
])
]);
}

if($text == "/start"){
bot('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>$start,
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(['inline_keyboard'=>[
[['text'=>' القران الكريم.' ,'callback_data'=> 'startaa'],[ 'text' => 'الأذكار والأدعية .','callback_data'=> 'starta' ]],
[['text'=> 'قصص من القران .' ,'callback_data'=> 'Qasass'],[ 'text' => 'الرقيه الشرعيه','callback_data'=> 'roqua' ]],
[['text'=> 'نبذه .','callback_data'=> 'nobtha' ]],
]
])
]);
}

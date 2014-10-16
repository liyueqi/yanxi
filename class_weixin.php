<?php
if(!defined('IN_SYS')) {
exit('Access Denied');
}

define('COOKIE',dirname(__FILE__)."/cookie.txt");
class WX_Remote_Opera{
private $token;

public function init($user,$password){  //初始化，登录微信平台
//验证码
/* $url = 'http://mp.weixin.qq.com/cgi-bin/verifycode?username=';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
preg_match('/^Set-Cookie: (.*?);/m', curl_exec($ch), $m);
//echo $m[1];
//exit;
//echo $m[1];
curl_close($ch);*/
$url="https://mp.weixin.qq.com/cgi-bin/login?lang=zh_CN";
$ch=curl_init($url);
$post['username']=$user;
$post['pwd']=md5($password);
$post['f']='json';
$post['imgcode']='';
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);    //验证证书
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);        //验证HOST
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);      //对推送来的消息进行设置   1不自动输出任何内容 0输出返回的内容
curl_setopt($ch,CURLOPT_HEADER,1);      //是否返回头文件
curl_setopt($ch,CURLOPT_REFERER,'https://mp.weixin.qq.com/cgi-bin/loginpage?t=wxm2-login&lang=zh_CN');
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);  //数据传输最大允许时间
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
curl_setopt($ch,CURLOPT_COOKIEJAR,COOKIE);
$html=curl_exec($ch);
//echo $html;
preg_match('/[\?\&]token=(\d+)"/',$html,$t);        //匹配到token
$token=$t[1];
curl_close($ch);
$this->token=$token;
    //echo $token;
return $token;
}

//获取公众号基本信息
public function get_account_info() {
$url="https://mp.weixin.qq.com/cgi-bin/settingpage?t=setting/index&action=index&token=".$this->token."&lang=zh_CN";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,COOKIE);
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$html=curl_exec($ch);

curl_close($ch);

$info = array();
preg_match('/(\{"user_name.*\})/', $html, $match);
$info = json_decode($match[1], true);
preg_match('/uin.*?"([0-9]+?)"/', $html, $match);
$info['fakeid'] = $match[1];
preg_match_all('/<div[^>]*class="meta_content"[^>]*>(.*?)<\/div>/si',$html, $match);
$info['nickname']=trim($match[1][1]);

$fh = file_get_contents(COOKIE);
preg_match('/(gh_[a-z0-9A-Z]+)/', $fh, $match);
$info['ghid'] = $match[1];

return $info;
}

public function sendmsg($content,$fromfakeid,$token){ //发送消息给指定人
$url="https://mp.weixin.qq.com/cgi-bin/singlesend";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch, CURLOPT_COOKIEFILE, COOKIE);
curl_setopt($ch,CURLOPT_REFERER,'https://mp.weixin.qq.com/cgi-bin/message?t=message/list&count=20&day=7&token='.$this->token.'&lang=zh_CN');
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$post['t']='ajax-response';
$post['imgcode']='';
$post['mask']=false;
$post['random']=math_random();
$post['lang']='zh_CN';
$post['tofakeid']=$fromfakeid;
$post['type'] =1;
$post['content']=$content;
$post['token']=$this->token;
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
$html=curl_exec($ch);
curl_close($ch);
}
/*发送图文消息*/
public function setimgmsg($appid,$fromfakeid){
    $url="https://mp.weixin.qq.com/cgi-bin/singlesend";
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, COOKIE);
    curl_setopt($ch,CURLOPT_REFERER,'https://mp.weixin.qq.com/cgi-bin/message?t=message/list&count=20&day=7&token='.$this->token.'&lang=zh_CN');
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');

    $post['t']='ajax-response';
    $post['imgcode']='';
    $post['mask']=false;
    $post['random']=math_random();
    $post['lang']='zh_CN';
    $post['tofakeid']=$fromfakeid;
    $post['type'] =10;
    $post['content']='';
    $post['appmsgid'] = $appid;
    $post['token']=$this->token;
    curl_setopt($ch,CURLOPT_POST,1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
    $html=curl_exec($ch);
    curl_close($ch);
}
/**获取图文消息素材**/
public function getimgmaterial(){
    $url="https://mp.weixin.qq.com/cgi-bin/appmsg?begin=0&count=10&t=media/appmsg_list&type=10&action=list&token=".$this->token."&lang=zh_CN";
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_COOKIEFILE,COOKIE);
    curl_setopt($ch,CURLOPT_REFERER,$url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
    $html=curl_exec($ch);
    curl_close($ch);
    preg_match('%(?<=item\"\:)(.*)(?=,\"file_cnt)%', $html, $result);
    return json_decode($result[1],true);
}


public function getcontactinfo($fromfakeid){
$url="https://mp.weixin.qq.com/cgi-bin/getcontactinfo";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,S_ROOT.'data/cookies/weixin/cookie.txt');
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$post['t']='ajax-getcontactinfo';
$post['fakeid'] =$fromfakeid;
$post['token']=$this->token;
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
$html=curl_exec($ch);
curl_close($ch);
$arr=json_decode($html,true);
return $arr['contact_info'];
}

public function getheadimg($fromfakeid){
$url="https://mp.weixin.qq.com/cgi-bin/getheadimg";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,S_ROOT.'data/cookies/weixin/cookie.txt');
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$post['fakeid'] =$fromfakeid;
$post['token']=$this->token;
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
$headimg=curl_exec($ch);
curl_close($ch);
//$PNG_SAVE_DIR = S_ROOT.'uploads'.DIRECTORY_SEPARATOR.'weixin_headimg'.DIRECTORY_SEPARATOR;
//$file = fopen($PNG_SAVE_DIR.$fromfakeid.".png","w");//打开文件准备写入
//fwrite($file,$headimg);//写入
//fclose($file);//关闭
echo $headimg;
}

public function getcontactlist($pagesize,$page){
$url="https://mp.weixin.qq.com/cgi-bin/contactmanage?t=user/index&pagesize=".$pagesize."&pageidx=".$page."&type=0&groupid=0&token=".$this->token."&lang=zh_CN";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,COOKIE);
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$html=curl_exec($ch);
curl_close($ch);
preg_match('%(?<=\"contacts\"\:)(.*)(?=}\)\.contacts)%', $html, $result);
return json_decode($result[1],true);
}
/*获取各分组人数*/
public function getsumcontactlist(){
    $url="https://mp.weixin.qq.com/cgi-bin/contactmanage?t=user/index&pagesize=".$pagesize."&pageidx=".$page."&type=0&groupid=0&token=".$this->token."&lang=zh_CN";
    $ch=curl_init($url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_COOKIEFILE,COOKIE);
    curl_setopt($ch,CURLOPT_REFERER,$url);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
    $html=curl_exec($ch);
    curl_close($ch);
    preg_match('%(?<=\"groups\"\:)(.*)(?=}\)\.groups)%', $html, $result);
    return json_decode($result[1],true);
}

public function getmsglist(){
$url="https://mp.weixin.qq.com/cgi-bin/message?t=message/list&count=20&day=7&token=".$this->token."&lang=zh_CN";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,COOKIE);
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$html=curl_exec($ch);
preg_match('%(?<=\"msg_item\"\:)(.*)(?=}\)\.msg_item)%', $html, $result);
curl_close($ch);
return json_decode($result[1],true);
}



private function get_access_token($appid,$appsecret){
$url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$appsecret;
$arr = json_decode(file_get_contents($url),1);
return $arr;
}

//创建自定义菜单
public function create_menu($appid,$appsecret,$data){
$arr = $this->get_access_token($appid,$appsecret);
if($arr['access_token']){
$ACCESS_TOKEN=$arr['access_token'];
/*
$data = '{
"button":[
{
"type":"click",
"name":"关于乘亿",
"key":"aboutus"
},
{
"type":"click",
"name":"功能演示",
"key":"showdemo"
},
{
"type":"click",
"name":"联系我们",
"key":"contactus"
}
]
}';
*/
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.weixin.qq.com/cgi-bin/menu/create?access_token={$ACCESS_TOKEN}");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tmpInfo = curl_exec($ch);
if (curl_errno($ch)) {
echo 'Errno'.curl_error($ch);
}
curl_close($ch);
return json_decode($tmpInfo,1);
}else{
return $arr;
}
}

//查询自定义菜单
public function get_menu($appid,$appsecret){
$arr = $this->get_access_token($appid,$appsecret);
if($arr['access_token']){
$ACCESS_TOKEN=$arr['access_token'];
$url="https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$ACCESS_TOKEN;
$arr = json_decode(file_get_contents($url),1);
return $arr;
}else{
return $arr;
}
}

//删除自定义菜单
public function del_menu($appid,$appsecret){
$arr = $this->get_access_token($appid,$appsecret);
if($arr['access_token']){
$ACCESS_TOKEN=$arr['access_token'];
$url="https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=".$ACCESS_TOKEN;
$arr = json_decode(file_get_contents($url),1);
return $arr;
}else{
return $arr;
}
}

//关闭编辑模式
public function close_editmode(){
$url="https://mp.weixin.qq.com/cgi-bin/skeyform?form=advancedswitchform&lang=zh_CN";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,S_ROOT.'data/cookies/weixin/cookie.txt');
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$post['flag']=0;
$post['type']=1;
$post['token']=$this->token;
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
$html=curl_exec($ch);
curl_close($ch);
return json_decode($html,true);
}

//开启开发者模式
public function open_developmode(){
$url="https://mp.weixin.qq.com/cgi-bin/skeyform?form=advancedswitchform&lang=zh_CN";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,S_ROOT.'data/cookies/weixin/cookie.txt');
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$post['flag']=1;
$post['type']=2;
$post['token']=$this->token;
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
$html=curl_exec($ch);
curl_close($ch);
//preg_match('%(?<=\"contacts\"\:)(.*)(?=}\)\.contacts)%', $html, $result);
return json_decode($html,true);
}

//接口配置信息
public function set_api($api_token,$api_url){
$url="https://mp.weixin.qq.com/cgi-bin/callbackprofile?t=ajax-response&token=".$this->token."&lang=zh_CN";
$ch=curl_init($url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_COOKIEFILE,S_ROOT.'data/cookies/weixin/cookie.txt');
curl_setopt($ch,CURLOPT_REFERER,$url);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:20.0) Gecko/20100101 Firefox/20.0');
$post['callback_token']=$api_token;
$post['url']=$api_url;
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
$html=curl_exec($ch);
curl_close($ch);
//preg_match('%(?<=\"contacts\"\:)(.*)(?=}\)\.contacts)%', $html, $result);
return json_decode($html,true);
}

//一键配置接口
public function quick_set_api($api_token,$api_url){
$this->close_editmode();
$this->open_developmode();
return $this->set_api($api_token,$api_url);
}
}
function math_random () {
    return (float)rand()/(float)getrandmax();
}

?>
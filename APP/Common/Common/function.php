<?php
function p($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}
//检查网站是否关闭
function is_close_site(){
    
    $where['name']='TOGGLE_WEB_SITE';
    $info=M('Config','ysk_')->where($where)->field('value,tip')->find();
    return $info;    
}
//检查商城是否关闭
function is_close_mall(){
    
    $where['name']='TOGGLE_MALL_SITE';
    $info=M('Config','ysk_')->where($where)->field('value,tip')->find();
    return $info;    
}
function sp_dir_create($path, $mode = 0777)
{
    if (is_dir($path)) return true;
    $ftp_enable = 0;
    $path = sp_dir_path($path);
    $temp = explode('/', $path);
    $cur_dir = '';
    $max = count($temp) - 1;
    for ($i = 0; $i < $max; $i++) {
        $cur_dir .= $temp[$i] . '/';
        if (@is_dir($cur_dir))
            continue;
        @mkdir($cur_dir, 0777, true);
        @chmod($cur_dir, 0777);
    }
    return is_dir($path);
}
function sp_dir_path($path)
{
    $path = str_replace('\\', '/', $path);
    if (substr($path, -1) != '/')
        $path = $path . '/';
    return $path;
}
/**
 * [get_car_no 生成矿车编号]
 * @return [type] [description]
 */
function get_car_no(){
    $no=M('nzusfarm')->max('no');
    $no=intval($no);
    $no=$no+1;
    $len=strlen($no);
    if($len<6){
        $arr[1]='00000';
        $arr[2]='0000';
        $arr[3]='000';
        $arr[4]='00';
        $arr[5]='0';
        $no=$arr[$len].$no;
    }
    return $no;
}
/** 
*添加公共上传方法
*获取上传路径
*$picture
*/
function get_cover_url($picture){
    if($picture){
        $url = __ROOT__.'/Uploads/'.$picture;
    }else{
        $url = __ROOT__.'/Uploads/photo.jpg';
    }
    return $url;
}
/**
 * 用于生成插入datetime类型字段用的字符串
 * @param string $str 支持偏移字符串
 */
function datetime($str = 'now')
{
    return @date("Y-m-d H:i:s", strtotime($str));
}
/**
 * 时间戳格式化
 * @param int $time
 * @return string 完整的时间显示
 * @author jry <598821125@qq.com>
 */
function time_format($time = null, $format = 'Y-m-d H:i')
{
    $time = $time === null ? time() : intval($time);
    return date($format, $time);
}
/**
 * 系统非常规MD5加密方法
 * @param  string $str 要加密的字符串
 * @return string
 * @author jry <598821125@qq.com>
 */
function user_md5($str, $auth_key)
{
    if (!$auth_key) {
        $auth_key = C('AUTH_KEY') ?: '0755web';
    }
    return '' === $str ? '' : md5(sha1($str) . $auth_key);
}
/**
 * [user_salt 用户密码加密链接串]
 * @return [type] [description]
 */
function user_salt($time=null){
    if(isset($time) || empty($time)){
        $time=time();
    }
   return substr(md5($time),0,3);
}
/**
 * 获取上传文件路径
 * @param  int $id 文件ID
 * @return string
 * @author jry <598821125@qq.com>
 */
function get_cover($id = null, $type = null)
{
    return D('Admin/Upload')->getCover($id, $type);
}
/**
 * 检测是否使用手机访问
 * @access public
 * @return bool
 */
function is_wap()
{
    if (isset($_SERVER['HTTP_VIA']) && stristr($_SERVER['HTTP_VIA'], "wap")) {
        return true;
    } elseif (isset($_SERVER['HTTP_ACCEPT']) && strpos(strtoupper($_SERVER['HTTP_ACCEPT']), "VND.WAP.WML")) {
        return true;
    } elseif (isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])) {
        return true;
    } elseif (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/(blackberry|configuration\/cldc|hp |hp-|htc |htc_|htc-|iemobile|kindle|midp|mmp|motorola|mobile|nokia|opera mini|opera |Googlebot-Mobile|YahooSeeker\/M1A1-R2D2|android|iphone|ipod|mobi|palm|palmos|pocket|portalmmm|ppc;|smartphone|sonyericsson|sqh|spv|symbian|treo|up.browser|up.link|vodafone|windows ce|xda |xda_)/i', $_SERVER['HTTP_USER_AGENT'])) {
        return true;
    } else {
        return false;
    }
}
/**
 * 是否微信访问
 * @return bool
 * @author jry <598821125@qq.com>
 */
function is_weixin()
{
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
        return true;
    } else {
        return false;
    }
}
/**
 * [get_verify 生成验证码]
 * @return [type] [description]
 */
function get_verify(){
    ob_clean();
    $config =    array(
    'codeSet' =>  '0123456789',   
    'fontSize'    =>    50,    // 验证码字体大小   
    'length'      =>    4,     // 验证码位数    
    'fontttf'     =>   '5.ttf',
    'useCurve'    => false,
    'bg'          => array(229, 237, 240),
    );
    $Verify =     new \Think\Verify($config);
    $Verify->entry();
}
/**
 * [ajaxReturn ajax提示款]
 * @param  [type]  $message [提示文字]
 * @param  integer $status  [1=成功 0=失败]
 * @param  string  $url     [跳转地址]
 * @param  string  $extra   [回传数据]
 * @return [type]           [json数据]
 */
function ajaxReturn($message,$status=0, $url ='',$extra='') {
    // 返回JSON数据格式到客户端 包含状态信息
    header('Content-Type:application/json; charset=utf-8');
    $result = array(
        'message' => $message,
        'status'  =>  $status,
        'url' => $url,
        'result'  =>  $extra
    );
    
    exit(json_encode($result));
}
// =陶==js消息提示框===
function error_alert($mes){
    echo "<meta charset=\"utf-8\"/><script>alert('".$mes."');javascript:history.back(-1);</script>";
    exit;
}
function success_alert($mes,$url=''){
    if($url!=''){
        echo "<meta charset=\"utf-8\"/><script>alert('".$mes."');location.href='" .$url. "';</script>";
    }else{
       echo "<meta charset=\"utf-8\"/><script>alert('".$mes."');location.href='" .$jumpUrl. "';</script>"; 
    }
    exit;
}
// =陶==js消息提示框===
//防注入，字符串处理，禁止构造数组提交
//字符过滤
//陶
function safe_replace($string) {
    if(is_array($string)){ 
       $string=implode('，',$string);
       $string=htmlspecialchars(str_shuffle($string));
    } else{
        $string=htmlspecialchars($string);
    }
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string=str_replace("select","",$string);
    $string=str_replace("join","",$string);
    $string=str_replace("union","",$string);
    $string=str_replace("where","",$string);
    $string=str_replace("insert","",$string);
    $string=str_replace("delete","",$string);
    $string=str_replace("update","",$string);
    $string=str_replace("like","",$string);
    $string=str_replace("drop","",$string);
    $string=str_replace("create","",$string);
    $string=str_replace("modify","",$string);
    $string=str_replace("rename","",$string);
    $string=str_replace("alter","",$string);
    $string=str_replace("cas","",$string);
    $string=str_replace("or","",$string);
    $string=str_replace("=","",$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('--','',$string);
    $string = str_replace('(','',$string);
    $string = str_replace(')','',$string);
    return $string;
}
function payway($value){
    $arr=array('支付宝','微信');
    return $arr[$value];
}
/**
 * 获取父级账号
 */
function get_parent_account($pid){
    $account=D('User')->where('userid ='.$pid)->getField('account');
    if($account)
        return $account;
    else
        return '无';
}
function get_user_name($uid){
    $where['userid']=$uid;
    $info=M('user')->where($where)->field('account,username')->find();
    return $info['username']."(".$info['account'].")";
}
//验证码
 function set_verify(){
        ob_clean();
        $config =    array(
        'codeSet' =>  '0123456789',   
        'fontSize'    =>    30,    // 验证码字体大小   
        'length'      =>    4,     // 验证码位数    
        'fontttf'     =>   '5.ttf',
        'useCurve'    => false,
        'expire'    =>  1800,//过期时间
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
    }
//验证验证码
function check_verify($code)
{
    $verify = new \Think\Verify();
    return $verify->check($code);
}
//获取以及好友人数
function get_children_count($uid){
    $where['pid']=$uid;
    return M('user')->where($where)->count(1);
}
/**
 * [trading 添加用户交易记录明细]
 * @param  [type] $data [添加的数据]
 * @return [type]         [description]
 */
function add_trading($data){
    if(empty($data))
        return false;
    $trading=M('fruitdetail');
    
    if(empty($data['uid'])){
      $userid=session('userid');
      $data['uid']=$userid;
    }
    $data['add_time']=time();
    $res=$trading->add($data);
    return $res;
}
//验证身份证是否有效
function validateIDCard($IDCard) {
    if (strlen($IDCard) == 18) {
        return check18IDCard($IDCard);
    } elseif ((strlen($IDCard) == 15)) {
        $IDCard = convertIDCard15to18($IDCard);
        return check18IDCard($IDCard);
    } else {
        return false;
    }
}
//计算身份证的最后一位验证码,根据国家标准GB 11643-1999
function calcIDCardCode($IDCardBody) {
    if (strlen($IDCardBody) != 17) {
        return false;
    }
    //加权因子
    $factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
    //校验码对应值
    $code = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
    $checksum = 0;
    for ($i = 0; $i < strlen($IDCardBody); $i++) {
        $checksum += substr($IDCardBody, $i, 1) * $factor[$i];
    }
    return $code[$checksum % 11];
}
// 将15位身份证升级到18位
function convertIDCard15to18($IDCard) {
    if (strlen($IDCard) != 15) {
        return false;
    } else {
        // 如果身份证顺序码是996 997 998 999，这些是为百岁以上老人的特殊编码
        if (array_search(substr($IDCard, 12, 3), array('996', '997', '998', '999')) !== false) {
            $IDCard = substr($IDCard, 0, 6) . '18' . substr($IDCard, 6, 9);
        } else {
            $IDCard = substr($IDCard, 0, 6) . '19' . substr($IDCard, 6, 9);
        }
    }
    $IDCard = $IDCard . calcIDCardCode($IDCard);
    return $IDCard;
}
// 18位身份证校验码有效性检查
function check18IDCard($IDCard) {
    if (strlen($IDCard) != 18) {
        return false;
    }
    $IDCardBody = substr($IDCard, 0, 17); //身份证主体
    $IDCardCode = strtoupper(substr($IDCard, 17, 1)); //身份证最后一位的验证码
    if (calcIDCardCode($IDCardBody) != $IDCardCode) {
        return false;
    } else {
        return true;
    }
}
/**
 * 根据身份证判断,是否满足年龄条件
 * @param type $IDCard 身份证
 * @param type $minAge 最小年龄
 * @param type $maxAge 最大年龄
 */
function checkCard($IDCard, $minAge, $maxAge) {
    $ret = validateIDCard($IDCard);
    if ($ret === FALSE) {
        return FALSE;
    }
    if (strlen($IDCard) <= 15) {
        $IDCard = convertIDCard15to18($IDCard);
    }
    $year = date('Y') - substr($IDCard, 6, 4);
    $monthDay = date('md') - substr($IDCard, 10, 4);
    if (($year > $minAge || $year == $minAge && $monthDay > 0) && ($year < $maxAge || $year == $maxAge && $monthDay < 0)){
        return true;
    }
    return false;
}
<?php
global $_W, $_GPC;

//'access_token'=>$fhdaa['access_token'],
//'code'=>$fhdaa['code'],
//'refresh_token'=>$fhdaa['refresh_token'],
//'time'=>$fhdaa['time'],
//'token_type'=>$fhdaa['token_type'],
//'uid'=>$fhdaa['uid'],
//'user_nick'=>$fhdaa['user_nick'],
//'expires_in'=>$fhdaa['expires_in'],
					    
       if($_GPC['op']=='post'){
           $data=array(
               'weid'=>$_W['uniacid'],
               'access_token'=>$_GPC['access_token'],
               'code'=>$_GPC['code'],
               'refresh_token'=>$_GPC['refresh_token'],
               'time'=>$_GPC['time'],
               'token_type'=>$_GPC['token_type'],
               'uid'=>$_GPC['uid'],
               'user_nick'=>$_GPC['user_nick'],
               'expires_in'=>$_GPC['expires_in'],               
               'createtime' => time(),
           );
           echo "<pre>";
           print_r($data);	
           $go = pdo_fetch("SELECT id FROM " . tablename($this->modulename."_jdsign") . " WHERE  uid='{$_GPC['uid']}'");
            if(empty($go)){
                  $res=pdo_insert($this->modulename."_jdsign",$data);
                  if($res=== false){
                    echo '授权失败';
                  }else{
                    //echo '授权成功:'.$_GPC['sign'];
                    $url=$_W['siteroot']."web/index.php?c=site&a=entry&do=set&m=tuike_jd";
                    //echo $url;
                    echo "<a href='".$url."' style='font-size:20px;width:60%;height:50px;text-height:50px;text-align: center'>授权成功！点击返回</a>";
                   // message('授权成功！',$url, 'success');
                  }
            }else{                          
                  $res=pdo_update($this->modulename."_jdsign", $data, array('uid' =>$_GPC['uid']));
                  if($res=== false){
                    echo '授权失败';
                  }else{
                    $url=$_W['siteroot']."web/index.php?c=site&a=entry&do=set&m=tuike_jd";
                    echo "<a href='".$url."' style='font-size:20px;width:60%;height:50px;text-height:50px;text-align: center'>授权成功！点击返回</a>";
                    //message('授权成功！',$url, 'success');
                  }
            }
       }
?>
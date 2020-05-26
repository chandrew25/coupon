 <?php global $_W, $_GPC;

         $dluid=$_GPC['dluid'];
         $cfg = $this->module['config'];
        $uid=$_GPC['uid'];
        $share=pdo_fetch("select * from ".tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}' and id='{$uid}'");
         $bl=pdo_fetch("select * from ".tablename('tiger_wxdaili_set')." where weid='{$_W['uniacid']}'");

         
         $datime=time();
         
         if($share['tzendtime']<$datime){
         	$dldata=array(
			    'helpid'=>0,
				'tztype'=>0,//1是团长
				'tzpaytime'=>'',
				'tztime'=>'',
				'tzendtime'=>''
			);		
			pdo_update("tiger_newhu_share", $dldata, array('weid' => $_W['uniacid'],'id'=>$share['id']));
         }
         
               

         $openid=$share['from_user'];
         //已提现记录
         $txsum = pdo_fetchcolumn("SELECT sum(credit2) FROM " . tablename('tiger_newhu_txlog')." where weid='{$_W['uniacid']}' and openid='{$openid}'");
         if(empty($txsum)){
            $txsum="0.00";
         }         
		//下级粉丝 代理
// 		 $contfans = pdo_fetchcolumn("SELECT COUNT(id) FROM " . tablename('tiger_newhu_share')." where weid='{$_W['uniacid']}' and dltype=1 and helpid='{$share['id']}'");
// 		 if(empty($contfans)){
// 			  $contfans=0;
// 		 }
		 $appset= pdo_fetch("SELECT * FROM " . tablename("tiger_app_tuanzhangset") . " WHERE weid='{$_W['uniacid']}' order by px desc ");//团长设置
				 
		  $b_time = strtotime(date("Y-m-d H:i:s", mktime ( 0, 0, 0, date ( "m" ), 1, date ( "Y" ))));//本月开始时间
		  $sy_time = strtotime(date('Y-m-01 00:00:00',strtotime('-1 month')));//上个月开始时间
          $tzyjlog= pdo_fetch("SELECT * FROM " . tablename("tiger_wxdaili_tzyjlog") . " WHERE weid='{$_W['uniacid']}' and uid='{$share['id']}' order by id desc ");//团长佣金
        $result = array("errcode" => 0, "appset" => $appset,"txsum"=>$txsum,"tzyjlog"=>$tzyjlog);
        die(json_encode($result));  
         ?> 
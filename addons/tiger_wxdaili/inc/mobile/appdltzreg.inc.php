 <?php
  global $_W, $_GPC;
         $cfg = $this->module['config'];
		$uid=$_GPC['uid'];
		 $member=pdo_fetch("select * from ".tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}' and id='{$uid}'");
				
		$appset= pdo_fetch("SELECT * FROM " . tablename("tiger_app_tuanzhangset") . " WHERE weid='{$_W['uniacid']}' order by px desc ");
		
		if($appset['sjtype']==1){
			$dlfs = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}' and helpid='{$member['id']}' and dltype=1");//粉丝
		}else{
			$dlfs = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}' and helpid='{$member['id']}'");//粉丝
		}
		if(empty($member['qdid'])){
			$dlorder = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename("tiger_newhu_tkorder")." where weid='{$_W['uniacid']}' and tgwid='{$member['tgwid']}'");//订单订单
		}else{
			$dlorder = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename("tiger_newhu_tkorder")." where weid='{$_W['uniacid']}' and relation_id='{$member['qdid']}'");//订单订单
		}
		$result = array("errcode" => 0, "appset" => $appset,"dlfs"=>$dlfs,"dlorder"=>$dlorder);
		die(json_encode($result));
				
				

        ?>
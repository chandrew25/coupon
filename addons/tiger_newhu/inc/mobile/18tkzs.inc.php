<?php
// +------------------------------------------------------------------------------------------------
// | 【使用说明】请将本文件上传至老虎系统网站服务器：/addons/对应标识/inc/mobile/  目录下。
// +------------------------------------------------------------------------------------------------
// | [18淘客助手api文件(老虎微信淘宝客专用-兼容所有新老版本的老虎系统)] Copyright (c) 2018 18.LA
// +------------------------------------------------------------------------------------------------
// | 最后修改：2018年11月3日
// +------------------------------------------------------------------------------------------------
// | 官网：http://taoke.18.la/
// +------------------------------------------------------------------------------------------------
global $_W, $_GPC, $return, $cfg;
$cfg = $this->module['config'];

$return  = array('state'=>'ok','code'=>1,'message'=>'','version'=>'3.1','system'=>urlencode('老虎微信淘宝客'),'updatetime'=>urlencode('2018年11月3日 18:18:18'));

//如果未传入有效参数
if (!isset($_GPC['key']) || !isset($_GPC['api'])) {
    $return['code']=0;
	$return['message']=urlencode('API接口正常');
	exit(urldecode(json_encode($return)));
}

//判断密钥
if($cfg['miyao']!=$_GPC['key']){
	$return['code']=0;
	$return['message']=urlencode('密钥错误');
	exit(urldecode(json_encode($return)));
}

//设置常用变量
$_W['uniacid']=$_GPC['i'];//公众号id
$api=$_GPC['api'];//api名称
$op=$_GPC['op'];
$dtime=time();//当前时间
$message="";

//接口验证
if($api=='verify'){
	$return['code']=1;
	$return['message']=urlencode('验证成功');
	exit(urldecode(json_encode($return)));
}
//【订单同步】
elseif($api=='postorder'){
	//获取post过来的订单内容
	$content=htmlspecialchars_decode($_GPC['content']);
	//json解码
	$contentArr=@json_decode($content, true);
	//如果数组不为空
	if(!empty($contentArr)){
		$orderDbTable=$this->modulename."_tkorder";//订单数据库表名
		$field=tableField(tablename($orderDbTable));//获取订单表的所有字段
		$resultStr="";//记录订单入库结果字符串
		//遍历订单数组
		foreach($contentArr as $orderID=>$orderData)
		{
			//查询数据库
			$ord=pdo_fetch('select * from '.tablename($orderDbTable)." where weid='{$_W['uniacid']}'  and orderid='{$orderID}'");
			if(count($orderData)>1){//订单号相同的多个订单集合
				//如果已存在
				if (!empty($ord)){
					$result=pdo_delete($orderDbTable,array ('orderid'=>$orderID,'weid'=>$_W['uniacid']));//删除该订单id的所有订单
				}
				//将所有订单ID相同的订单添加到数据库
				$resultTem=1;
				foreach($orderData as $data){
					$newdata=orderFormat($data,$field);//格式化订单数据
					//原有字段值保持不变
					if (!empty($ord)){
						if (!empty($ord['type']))	$newdata['type']=$ord['type'];
						if (!empty($ord['zdgd']))	$newdata['zdgd']=$ord['zdgd'];
					}
					//添加到数据
					$result=pdo_insert($orderDbTable,$newdata);
					if (!empty($result)) {//添加成功
						$resultTem = ($resultTem==1) ? 1 : 0;//如果上次状态为1,这次也标记为1，否则设置为0
					}else{//添加失败
						//尝试修改唯一索引为普通索引
						orderIndex(tablename($orderDbTable));
						//再重新添加一次数据
						$result=pdo_insert($orderDbTable,$newdata);
						if (!empty($result)){
							$resultTem = ($resultTem==1) ? 1 : 0;//如果上次状态为1,这次也标记为1，否则设置为0
						}else{
							$resultTem=0;//将状态标记为失败
						}
					}
				}
				$resultStr=resultState($resultStr,$orderID,$resultTem);//记录订单入库状态
			}else{//订单号不同的单个订单
				$newdata=orderFormat($orderData[0],$field);
				if (!empty($ord)){//如果已存在
					if($ord['orderzt']=='订单失效'){
						$resultStr=resultState($resultStr,$orderID,"1");//失效订单，无需更新，也返回更新成功
						continue;//跳过本次循环
					}
					$result=pdo_update($orderDbTable,$newdata,array('orderid' =>$orderID,'weid'=>$_W['uniacid']));//更新数据库
					if (!empty($result)) {
						//更新成功
						$resultStr=resultState($resultStr,$orderID,"1");
					}else{
						//更新失败
						$resultStr=resultState($resultStr,$orderID,"0");
					}
				}else{
				   //如果不存在,添加到数据
					$result=pdo_insert($orderDbTable,$newdata);
					if (!empty($result)) {
						//添加成功
						$resultStr=resultState($resultStr,$orderID,"1");
					}else{
						//添加失败
						$resultStr=resultState($resultStr,$orderID,"0");
					}
				}
			}
		}
		returnExit($return,1,"result:".$resultStr);//code值设置为1，表示成功
	}else{
		returnExit($return,0,"传入订单数据不正确");//code值设置为0，表示失败
	}
}
//【商品采集】
elseif($api=='postgoods'){
	//获取post过来的订单内容
	$content=htmlspecialchars_decode($_GPC['content']);
	//json解码
	$contentArr=@json_decode($content, true);
	//如果数组不为空
	if(!empty($contentArr['cat']) && !empty($contentArr['goods'])){
		//商品分类
		$cat=goodsCat(tablename($this->modulename."_fztype"),$contentArr['cat']);
		if(empty($cat)){
			returnExit($return,0,"分类绑定不正确");//code值设置为0，表示失败
		}

		//商品数据
		$goodsDbTable=$this->modulename."_newtbgoods";//订单数据库表名
		$field=tableField(tablename($goodsDbTable));//获取订单表的所有字段
		$resultStr="";//记录订单入库结果字符串
		foreach($contentArr['goods'] as $data)
		{
			$itemid=$data['商品ID'];
			//格式化商品数据
			$newdata=goodsFormat($cat,$data,$field);
			//print_r($newdata);

			//查询是否存在
			$goodsid=pdo_fetch('select itemid from '.tablename($goodsDbTable)." where weid='{$_W['uniacid']}'  and itemid='{$itemid}'");
			if (empty($goodsid)){
				//如果不存在，新增
				$result=pdo_insert($goodsDbTable,$newdata);
			}else{
				//如果已存在，更新
				$result=pdo_update($goodsDbTable,$newdata,array('itemid' =>$itemid,'weid'=>$_W['uniacid']));
			}
			//记录入库结果
			if (!empty($result)) {
				//添加成功
				$resultStr=resultState($resultStr,$itemid,"1");
			}else{
				//添加失败
				$resultStr=resultState($resultStr,$itemid,"0");
			}
		}
		returnExit($return,1,"result:".$resultStr);//code值设置为1，表示成功
	}else{
		returnExit($return,0,"传入商品数据不正确");//code值设置为0，表示失败
	}
}
//【商品管理】
elseif($api=='delgoods'){
	//获取post过来的订单内容
	$content=htmlspecialchars_decode($_GPC['content']);
	//json解码
	$contentArr=@json_decode($content, true);
	//订单数据库表名
	$goodsDbTable=$this->modulename."_newtbgoods";
	//如果where数组不为空
	if(!empty($contentArr['where']) ){
		$whereArr=$contentArr['where'];
		//print_r($whereArr);

		//构造sql语句
		if(!empty($whereArr['销量小于']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.=" itemsale<'{$whereArr['销量小于']}' ";
		}

		if(!empty($whereArr['价格小于'])){
			if(!empty($where))	$where.=" or ";
			$where.=" itemendprice<'{$whereArr['价格小于']}' ";
		}
		
		if(!empty($whereArr['价格大于'])){
			if(!empty($where))	$where.=" or ";
			$where.=" itemendprice>'{$whereArr['价格大于']}' ";
		}

		if(!empty($whereArr['佣金小于']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.=" tkmoney<'{$whereArr['佣金小于']}' ";
		}

		if(!empty($whereArr['佣金比例']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.=" tkrates<'{$whereArr['佣金比例']}' ";
		}

		if(!empty($whereArr['非天猫']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.=" shoptype!='B' ";
		}

		if(!empty($whereArr['非视频单']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.=" videoid='0' ";
		}

		if(!empty($whereArr['优惠券过期']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.="(couponendtime<>'' and  couponendtime<='{$dtime}') ";
		}

		if(!empty($whereArr['无优惠券']) )
		{
			if(!empty($where))	$where.=" or ";
			$where.=" (quan_id='' and couponurl='') ";
		}

		//echo $where;
		if(!empty($where)){
			//执行删除语句
			$result=pdo_query("DELETE  FROM " . tablename($goodsDbTable) . " WHERE weid = '{$_W['uniacid']}' and ".$where);
			if(!empty($result)){
				returnExit($return,1,'成功删除'.$result.'件商品');//code值设置为1，表示成功
			}else{
				returnExit($return,1,'暂无符合条件商品');//code值设置为1，表示成功
			}
		}else{
			returnExit($return,0,'传入条件数据不正确');//code值设置为1，表示成功
		}
	}
	//如果goodsid数组不为空
	elseif(!empty($contentArr['goodsid']) ){
		$count=0;
		//遍历订单ID数组
		foreach($contentArr['goodsid'] as $goodsid)
		{
			//查询是否存在
			$itemid=pdo_fetch('select itemid from '.tablename($goodsDbTable)." where weid='{$_W['uniacid']}'  and itemid='{$goodsid}'");
			if (!empty($itemid)){
				//如果已存在，删除
				$result=pdo_delete($goodsDbTable,array('itemid' =>$itemid,'weid'=>$_W['uniacid']));
				if(!empty($result)){
					$count+=$result;
				}
			}
		}
		if($count>0){
			returnExit($return,1,'成功删除'.$count.'件商品');//code值设置为1，表示成功
		}else{
			returnExit($return,1,'暂无符合条件商品');//code值设置为1，表示成功
		}
	}
	//删除全部商品
	elseif(!empty($contentArr['all']) ){
		$result=pdo_delete($goodsDbTable,array('weid'=>$_W['uniacid']));
		if(!empty($result)){
			returnExit($return,1,'成功删除'.$result.'件商品');//code值设置为1，表示成功
		}else{
			returnExit($return,1,'暂无商品');//code值设置为1，表示成功
		}
	//无有效参数
	}else{
		returnExit($return,0,'传入条件数据不正确');//code值设置为1，表示成功
	}
}
//【代理管理】
elseif($api=='agentadmin'){
	//订单数据库表名
	$agentDbTable=$this->modulename."_share";
	//获取代理信息
	if($_GPC['op']=='getrequest'){
		//查询待审核的代理信息(一次最多查询18条)
		$list=pdo_fetchall('select * from '.tablename($agentDbTable)." where weid='{$_W['uniacid']}'  and dltype=2 LIMIT 18");
		if (!empty($list)){
			foreach($list as $key=>$data)
			{
				$newdata[$key]['id']=$data['from_user'];
				$newdata[$key]['name']=$data['tname'];//代理姓名：tname，代理微信昵称：nickname
			}
			returnExit($return,1,'获取未审核代理数据成功',$newdata);//code值设置为1，表示成功
		}else{
			returnExit($return,1,'暂无未审核代理数据');//code值设置为1，表示成功
		}
	//审核代理
	}elseif($_GPC['op']=='check'){
		$dailimodulename="tiger_wxdaili";//代理模块名称
		//获取post过来的订单内容
		$content=htmlspecialchars_decode($_GPC['content']);
		//json解码
		$contentArr=@json_decode($content, true);
		if(empty($contentArr['id']) || empty($contentArr['adzoneid']) || empty($contentArr['pid']))
		{
			returnExit($return,0,'传入数据不正确');//code值设置为1，表示成功
		}
		//读取相关参数
		$openid=$contentArr['id'];//用户微信ID

		//设置审核数据
		$data = array(
			'dltype' =>1,// 代理类型 1为代理 2为未审核
			'cqtype'=>1,//是否开启查券 1为开启，0为不开
			'updatetime'=>time(),
		);

		//查询代理信息
		$sharedata=pdo_fetch("select * from ".tablename($agentDbTable)." where weid='{$_W['uniacid']}' and from_user='{$openid}' ");
		if(empty($sharedata['dlptpid']))//当普通pid为空时，才分配新的pid，防止已有pid被覆盖
		{
			//将pid数据追加到数组
			$data['tgwid']=$contentArr['adzoneid'];//推广位ID
			$data['dlptpid']=$contentArr['pid'];//普通pid，三段式，类似：mm_181818818_68516333_68516333格式
			$data['dlqqpid']=$contentArr['pid'];//鹊桥pid，取普通pid一样即可
		}
		
		//查询pid对应的淘宝账号id
		$memberid=explode('_',$contentArr['pid'])[1];//提取pid中的memberid
		$tksigndata=pdo_fetch("select * from ".tablename($this->modulename."_tksign")." where weid='{$_W['uniacid']}' and memberid='{$memberid}' ");//根据memberid从数据库内查询
		if(!empty($tksigndata['tbuid']))//如果查询到了tbuid
		{
			//将pid数据追加到数组
			$data['tbkpidtype']=1;//1代表已绑定，0代表未绑定
			$data['tbuid']=$tksigndata['tbuid'];//淘宝用户数字id
		}

		/****************申请拼多多PID开始****************/
		$pddsdkfilename = IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/pdd.php";
		//判断sdk文件是否存在并且当前拼多多的pid值是否为空
        if (file_exists($pddsdkfilename) !== false && empty($sharedata['pddpid'])) {
			include $pddsdkfilename; 
			$pddset=pdo_fetch("select * from ".tablename('tuike_pdd_set')." where weid='{$_W['uniacid']}'");
			$owner_name=$pddset['ddjbbuid'];
			$pidlist=pddtgw($owner_name,1);
			$datalist=$pidlist['p_id_generate_response']['p_id_list'];//p_id
			$pdd_pid=$datalist[0]['p_id'];
			//判断拼多多pid是否创建成功
			if (!empty($pdd_pid)){
				//将拼多多pid添加到数组
				$data['pddpid']=$pdd_pid;
				//*******保存拼多多pid到数据库*********
				$pdd_pidres = pdo_fetch("SELECT * FROM " . tablename($dailimodulename."_pddpid") . " weid='{$_W['uniacid']}' and pid='{$pdd_pid}'");//查询数据库中pid是否存在
				$pdd_data=array(
						'weid'=>$_W['uniacid'],
						'pid'=>$pdd_pid,
						'createtime'=>time(),
						'type'=>1,
						'uid'=>$sharedata['id'],
						'nickname'=>$sharedata['nickname'],
				);
				if(empty($pdd_pidres)){
					pdo_insert($dailimodulename."_pddpid", $pdd_data);//写入到数据库
				}else{
					pdo_update($dailimodulename."_pddpid",$pdd_data, array('pid' => $pdd_pid));//更新
				}
				//*******保存拼多多pid到数据库*********
			}
		}
		/****************申请拼多多PID结束****************/

		/****************申请京东PID开始****************/
		$jdsdkfilename = IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/jd.php";
		//判断sdk文件是否存在并且当前京东的pid值是否为空
        if (file_exists($jdsdkfilename) !== false && empty($sharedata['jdpid'])) {
			include $jdsdkfilename; 
			$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$_W['uniacid']}' order by id desc");
			$jdsign=pdo_fetch("select * from ".tablename('tuike_jd_jdsign')." where weid='{$_W['uniacid']}' order by id desc");
			if(!empty($jdset) && !empty($jdsign)){//判断配置值是否为空
				$jd_tgwname=$sharedata['id']."_".time();//京东推广位名称
				$jd_tgw=gettgw($jdsign['access_token'],$jdset['unionid'],$jd_tgwname,$jdset['jdkey']);//生成京东推广位
				$jd_pid=$jd_tgw['data']['resultList'][$jd_tgwname];//对应代理推广位
				//判断京东pid是否创建成功
				if (!empty($jd_pid) && $jd_pid!='-1'){
					//将京东pid添加到数组
					$data['jdpid']=$jd_pid;
					//*******保存京东pid到数据库*********
					$jd_pidres=pdo_fetch("select * from ".tablename($dailimodulename."_jdpid")." where weid='{$_W['uniacid']}' and pid='{$jd_pid}' order by id desc "); //查询pid是否存在
					$jd_data = array(
						'weid' => $_W['weid'], 
						'type' =>1, 
						'nickname' => $sharedata['nickname'], 
						'uid'=>$sharedata['id'],
						'pid' =>$jd_pid, 
						'tgwname' =>$jd_tgwname, 
						'fptime' =>time(), 
						'createtime' => TIMESTAMP
					); 
					if(empty($jd_pidres)){   		   	   	 	
						pdo_insert($dailimodulename."_jdpid", $jd_data);//新增
					}else{
						pdo_update($dailimodulename."_jdpid",$jd_data, array('pid' => $jd_pid));//更新
					}
					//*******保存京东pid到数据库*********
				}
			}

		}

		/****************申请京东PID结束****************/

		//更新到数据库
		$result=pdo_update($agentDbTable, $data, array('id' =>$sharedata['id'],'weid'=>$_W['uniacid']));//更新代理信息

		//判断结果
		if(!empty($result)){
			//跨模块读取tiger_wxdaili配置
			$wxdaili=pdo_fetch("select value from ".tablename('core_cache')." where `key`='we7:module_setting:{$_W['uniacid']}:tiger_wxdaili'");
			if(!empty($wxdaili)){
				$value=unserialize($wxdaili['value']);
				$wxdaili_cfg=unserialize($value['settings']);
			}else{
				//微擎1.7以上版本模块配置文件保存的地方不一样
				$wxdaili=pdo_fetch("select settings from ".tablename('uni_account_modules')." where `module`='tiger_wxdaili' and `uniacid`='{$_W['uniacid']}'");
				$wxdaili_cfg=unserialize($wxdaili['settings']);
			}
			//审核成功
			if(!empty($wxdaili_cfg['dlshtgtx'])){//管理员订单提交提醒
				$fans=pdo_fetch("select m.uid,m.nickname,m.avatar,f.openid,m.uid,f.followtime,f.follow,m.resideprovince,m.residecity,m.gender from ".tablename('mc_members')." m inner join ".tablename('mc_mapping_fans')." f on m.uid=f.uid and f.openid='{$openid}' and f.uniacid='{$_W['uniacid']}'");
				//查询代理信息
				$share=pdo_fetch("select * from ".tablename($agentDbTable)." where weid='{$_W['uniacid']}' and from_user='{$openid}'");
				//查询模版信息
				$mb=pdo_fetch("select * from ".tablename($this->modulename."_mobanmsg")." where weid='{$_W['uniacid']}' and id='{$wxdaili_cfg['dlshtgtx']}'");
				//设置消息数据
				$valuedata=array(
					 'rmb'=>'',
					 'txzhanghao'=>'',//提现支付帐帐号
					 'dlmsg'=>$share['dlmsg'],//申请理由
					 'tname'=>$share['tname'],//申请人姓名
					 'dlsqjj'=>$_GPC['glymsg'],//代理申请拒绝原因
					 'tel'=>$share['tel'],
					 'weixin'=>$share['weixin'],
					 'shenhe'=>'',//'审核通过|审核不通过|资料有误请重新提交审核',
					 'goodstitle'=>''//'积分商城，商品名称'
				 );
				 //发送提醒消息
				$msg=$this->mbmsg($openid,$mb,$mb['mbid'],$mb['turl'],$fans,'',$wxdaili_cfg,$valuedata);
			}
			returnExit($return,1,'代理审核成功');//code值：1成功 0失败
		}else{
			returnExit($return,0,'代理审核失败');//code值：1成功 0失败
		}
	}else{
		returnExit($return,0,'传入条件数据不正确');//code值：1成功 0失败
	}
}
//【定时任务】
elseif ($api == 'timetask') {
	//【加载定时任务插件文件】
    if (!empty($op)) {
        $timetaskfilename = IA_ROOT . "/addons/tiger_newhu/inc/mobile/18timetask_" . $op . ".inc.php";
        if (file_exists($timetaskfilename) !== false) {
            include $timetaskfilename;
        }
    }
	//【京东订单同步】
    if ($op == "jdorder") {

		/****************京东订单同步开始****************/
		//【接收参数】
		$start = empty($_GPC['start']) ? 0 : trim($_GPC['start']);//开始天数(默认为0，即从当天开始)
		$day = empty($_GPC['day']) ? 1 : trim($_GPC['day']);//要同步的天数(默认同步1天)
		$hour=empty($_GPC['hour']) ? 24 : trim($_GPC['hour']);//每次同步几小时的订单(默认每次同步24小时)
		$progress=empty($_GPC['progress']) ? 0 : trim($_GPC['progress']);//同步进度参数(默认从0开始，程序自动处理，请勿手工传入此参数)
		$allcount=empty($_GPC['allcount']) ? 0 : trim($_GPC['allcount']);//记录获取订单总数的参数(默认从0开始，程序自动处理，请勿手工传入此参数)
		$sleep=empty($_GPC['sleep']) ? 1 : trim($_GPC['sleep']);//执行完当前页后执行下一页的间隔时间


		//【计算相关时间】
		$startTime=date("Y-m-d H:i:s",strtotime("-".$start." day"));//计算开始时间
		$endTime=date("Y-m-d H:i:s",strtotime("-".$day." day", strtotime($startTime)));//计算结束时间(strtotime可以接受第二个参数，类型timestamp,为指定日期)
		$allHour=abs(floor((strtotime($endTime)-strtotime($startTime))/3600));//开始时间和结束时间相差小时数
		$progressTime=date("Y-m-d H:i:s",strtotime("-".$progress." hours", strtotime($startTime)));//计算进度时间
		//echo '开始时间：'.$startTime.' 结束时间：'.$endTime.' 相差小时数：'.$allHour.' 进度：'.$progress.'/'.$allHour;
		//exit;

		//【引用京东api文件】
		$jdsdkfilename=IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/jd.php";
		if (file_exists($jdsdkfilename) == false) returnExit($return, 0, '你的淘客系统缺少:'.$jdsdkfilename.'文件');//判断文件是否存在
		include $jdsdkfilename; 
		//【读取京东相关配置】
		$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$_W['uniacid']}' order by id desc");
		$jdsign=pdo_fetch("select * from ".tablename('tuike_jd_jdsign')." where weid='{$_W['uniacid']}' order by id desc");
		if(empty($jdset) || empty($jdsign))	returnExit($return, 0, '读取京东模块配置失败');

		$thisStartTime=date("Y年m月d日H时",strtotime($progressTime));
		$count=0;
		//【每次同步小时数循环获取订单】
		for ($i=0; $i<$hour; $i++) {
			if($i>0) $progressTime=date('Y-m-d H:i:s', strtotime ("-1 hours", strtotime($progressTime)));//计算进度时间
			$orderTime=date("YmdH",strtotime($progressTime));//计算要同步的订单时间(格式:年月日时,例如:2018080808)

			/*获取京东订单并入库开始*/
			//【通过API接口获取订单数据】
			$page=1;
			$res=getkhorder($jdsign['access_token'],$jdset['unionid'],$orderTime,$jdset['appkey'],$jdset['appsecret'],$page);
			//【判断是否获取到数据】
			if(!empty($res)){
				foreach($res as $k=>$v){
					$data=array(
						'weid'=>$_W['uniacid'],
						'finishTime'=>substr($v['finishTime'] , 0 , 10),
						'orderEmt'=>$v['orderEmt'],
						'orderId'=>$v['orderId'],
						'orderTime'=>substr($v['orderTime'] , 0 , 10),
						'parentId'=>$v['parentId'],
						'payMonth'=>$v['payMonth'],
						'plus'=>$v['plus'],
						'popId'=>$v['popId'],
						'actualCommission'=>$v['skuList'][0]['actualCommission'],
						'actualCosPrice'=>$v['skuList'][0]['actualCosPrice'],
						'actualFee'=>$v['skuList'][0]['actualFee'],
						'commissionRate'=>$v['skuList'][0]['commissionRate'],
						'estimateCommission'=>$v['skuList'][0]['estimateCommission'],
						'estimateCosPrice'=>$v['skuList'][0]['estimateCosPrice'],
						'estimateFee'=>$v['skuList'][0]['estimateFee'],
						'finalRate'=>$v['skuList'][0]['finalRate'],
						'firstLevel'=>$v['skuList'][0]['firstLevel'],
						'frozenSkuNum'=>$v['skuList'][0]['frozenSkuNum'],
						'payPrice'=>$v['skuList'][0]['payPrice'],
						'pid'=>$v['skuList'][0]['pid'],
						'price'=>$v['skuList'][0]['price'],
						'secondLevel'=>$v['skuList'][0]['secondLevel'],
						'siteId'=>$v['skuList'][0]['siteId'],
						'skuId'=>$v['skuList'][0]['skuId'],
						'skuName'=>$v['skuList'][0]['skuName'],
						'skuNum'=>$v['skuList'][0]['skuNum'],
						'skuReturnNum'=>$v['skuList'][0]['skuReturnNum'],
						'spId'=>$v['skuList'][0]['spId'],
						'subSideRate'=>$v['skuList'][0]['subSideRate'],
						'subUnionId'=>$v['skuList'][0]['subUnionId'],
						'subsidyRate'=>$v['skuList'][0]['subsidyRate'],
						'thirdLevel'=>$v['skuList'][0]['thirdLevel'],
						'traceType'=>$v['skuList'][0]['traceType'],
						'unionAlias'=>$v['skuList'][0]['unionAlias'],
						'unionTrafficGroup'=>$v['skuList'][0]['unionTrafficGroup'],
						'unionTag'=>$v['skuList'][0]['unionTag'],
						'validCode'=>$v['skuList'][0]['validCode'],
						
						'unionId'=>$v['unionId'],
						'unionUserName'=>$v['unionUserName'],
						'createtime'=>time()
					);
					//print_r($data);
					//exit;

					 /*订单入库开始*/
					 $ord=pdo_fetchall ( 'select * from ' . tablename ( $this->modulename . "_jdorder" ) . " where weid='{$_W['uniacid']}' and orderId='{$v['orderId']}'" );
					 if(empty($ord)){
						if(!empty($data['orderId'])){
							//插入数据
							$a=pdo_insert ($this->modulename . "_jdorder", $data );
							$count++;
						}						 	
					 }else{
						if(!empty($v['orderId'])){
							//更新数据
							$b=pdo_update($this->modulename . "_jdorder",$data, array ('orderId' =>$v['orderId'],'weid'=>$_W['uniacid']));
							$count++;
						}
					 }
					 /*订单入库结束*/

				}
				
			}
			/*获取京东订单并入库结束*/

			$progress++;//进度加1
			
		}
		$thisEndTime=date("Y年m月d日H时",strtotime($progressTime));

		//计算同步进度百分比
		$percent=round(($progress/$allHour)*100,2);
		if($percent>100)	$percent=100;
		//计算本轮同步成功的总数
		$allcount+=$count;
		//判断是否同步完成所有任务
		if($progress<$allHour){
			$message=($count>0)? "成功同步".$count."个京东订单(进度:".$percent."% 时间段:".$thisStartTime."-".$thisEndTime.")" : "同步京东订单成功(进度:".$percent."% 时间段:".$thisStartTime."-".$thisEndTime.")";
			$return['timetaskdata'] = array('param' => 'progress=' . $progress.'&allcount='.$allcount, 'sleep' => $sleep);//返回回传参数
		}else{
			$message=$startTime."到".$endTime."共".$day."天的京东订单同步完毕，累计获取".$allcount."个订单!";
		}
		returnExit($return, 1, $message);
		/****************京东订单同步结束****************/
		
    }
    //【拼多多订单同步】
    elseif ($op == "pddorder") {

		/****************拼多多订单同步开始****************/
		//【接收参数】
		$start = empty($_GPC['start']) ? 0 : trim($_GPC['start']);//开始天数(默认为0，即从当天开始)
		$day = empty($_GPC['day']) ? 1 : trim($_GPC['day']);//要同步的天数(默认同步1天)

		$page=empty($_GPC['page']) ? 1 : trim($_GPC['page']);//同步页码进度参数(默认从1开始，程序自动处理，请勿手工传入此参数)

		$allcount=empty($_GPC['allcount']) ? 0 : trim($_GPC['allcount']);//记录获取订单总数的参数(默认从0开始，程序自动处理，请勿手工传入此参数)
		$sleep=empty($_GPC['sleep']) ? 1 : trim($_GPC['sleep']);//执行完当前页后执行下一页的间隔时间


		//【计算相关时间】
		$startTime=date("Y-m-d H:i:s",strtotime("-".$start." day"));//计算开始时间
		$endTime=date("Y-m-d H:i:s",strtotime("-".$day." day", strtotime($startTime)));//计算结束时间(strtotime可以接受第二个参数，类型timestamp,为指定日期)

		//echo '开始时间：'.$startTime.' 结束时间：'.$endTime;
		//exit;

		//【引用拼多多api文件】
		$pddsdkfilename=IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/pdd.php";
		if (file_exists($pddsdkfilename) == false) returnExit($return, 0, '你的淘客系统缺少:'.$jdsdkfilename.'文件');//判断文件是否存在
		include $pddsdkfilename; 
		//【读取拼多多相关配置】
		$pddset=pdo_fetch("select * from ".tablename('tuike_pdd_set')." where weid='{$_W['uniacid']}'");
		$owner_name=$pddset['ddjbbuid'];
		if(empty($pddset))	returnExit($return, 0, '读取拼多多模块配置失败');

		$count=0;
		//【通过API接口获取订单数据】
		$start_time=strtotime($endTime);
		$end_time=strtotime($startTime);
		$res=pddtgworder1($owner_name,$page,$start_time,$end_time,$p_id);	
		//判断是否出错
		if(!empty($orderlist['error_response']['error_msg'])){
			returnExit($return, 1, $orderlist['error_response']['error_msg']);
		}
		$orderlist=$res['order_list_get_response']['order_list'];				
		//遍历获取到的数据
		foreach($orderlist as $k=>$v){
			$row = pdo_fetch("SELECT * FROM " . tablename($this->modulename.'_pddorder') . " WHERE weid='{$_W['uniacid']}' and order_sn='{$v['order_sn']}'");
			$data=array(
				"weid"=>$_W['uniacid'],
				"order_sn" =>$v['order_sn'],
				"goods_id" => $v['goods_id'],
				"goods_name" => $v['goods_name'],
				"goods_thumbnail_url" => $v['goods_thumbnail_url'],
				"goods_quantity" => $v['goods_quantity'],
				"goods_price" => $v['goods_price']/100,
				"order_amount" => $v['order_amount']/100,
				"order_create_time" => $v['order_create_time'],
				"order_settle_time" => $v['order_settle_time'],
				"order_verify_time" => $v['order_verify_time'],
				"order_receive_time" => $v['order_receive_time'],
				"order_pay_time" => $v['order_pay_time'],
				"promotion_rate" => $v['promotion_rate']/10,
				"promotion_amount" => $v['promotion_amount']/100,
				"batch_no" => $v['batch_no'],
				"order_status" =>$v['order_status'],
				"order_status_desc" => $v['order_status_desc'],
				"verify_time" => $v['verify_time'],
				"order_group_success_time" => $v['order_group_success_time'],
				"order_modify_at" => $v['order_modify_at'],
				"status" => $v['status'],
				"type" => $v['type'],
				"group_id" => $v['group_id'],
				"auth_duo_id" => $v['auth_duo_id'],
				"custom_parameters" => $v['custom_parameters'],
				"p_id" => $v['p_id'],
			);					
			if (!empty($row)){
				pdo_update($this->modulename."_pddorder", $data, array('order_sn' => $v['order_sn'],'weid'=>$_W['uniacid']));
				//echo "更新订单：".$data['order_sn']."成功<br>";
			}else{
				pdo_insert($this->modulename."_pddorder", $data);
				//echo "新订单入库：".$data['order_sn']."成功<br>";
			}
			$count++;
		}

		//计算本轮同步成功的总数
		$allcount+=$count;

		//判断是否获取完毕
		if(!empty($orderlist)){
			$message=($count>0)? "同步拼多多第".$page."页订单成功(本次获取".$count."个)" : "同步拼多多第".$page."页订单成功!";
			$return['timetaskdata'] = array('param' => 'page=' . ($page+1).'&allcount='.$allcount, 'sleep' => $sleep);//返回回传参数
		}else{
			$message=$startTime."到".$endTime."共".$day."天的拼多多订单同步完毕，累计获取".$allcount."个订单!";
		}

		//输出结果并退出程序
		returnExit($return, 1, $message);
		/****************拼多多订单同步结束****************/

    } 
    //【同步老虎新版代理中心三合一佣金】
    elseif ($op == "newagent3") {
		/****************同步老虎新版代理中心三合一佣金开始****************/
		$page = max(1, intval($_GPC['page']));//获取页码参数
		$taskid=max(1, intval($_GPC['taskid']));//获取任务子id参数参数

		$allcount=empty($_GPC['allcount']) ? 0 : trim($_GPC['allcount']);//记录获取订单总数的参数(默认从0开始，程序自动处理，请勿手工传入此参数)
		$sleep=empty($_GPC['sleep']) ? 2 : trim($_GPC['sleep']);//执行完当前页后执行下一页的间隔时间

		$pagesize = 1;//每页显示1条
		$total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}'  and dltype=1");//读取代理总数
		$allpage=ceil($total/$pagesize)+1;//计算总页数

		//读取当前页的代理数据
		$data = pdo_fetch("select id from ".tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}' and dltype=1 order by id LIMIT " . ($page - 1) * $pagesize . ",{$pagesize}");
		//判断代理ID是否为空
		if (empty($data['id'])){
			//结束任务
			$message="累计".$total."个代理佣金更新完毕!";
			//输出结果并退出程序
			//returnExit($return, 1, $message);
		}
		$agentid=$data['id'];//代理ID

		//根据任务ID配置对应的URL
		$url_do="";
		$url_doname="";
		$url_day="";
		$url_dayname="";
		switch ($taskid)
		{
			case 1:
			  $url_do="tbyj";
			  $url_doname="淘宝";
			  $url_day="1";
			  $url_dayname="今天";
			  break;
			case 2:
			  $url_do="pddyj";
			  $url_doname="拼多多";
			  $url_day="1";
			  $url_dayname="今天";
			  break;
			case 3:
			  $url_do="jdyj";
			  $url_doname="京东";
			  $url_day="1";
			  $url_dayname="今天";
			  break;
			case 4:
			  $url_do="tbyj";
			  $url_doname="淘宝";
			  $url_day="2";
			  $url_dayname="昨天";
			  break;
			case 5:
			  $url_do="pddyj";
			  $url_doname="拼多多";
			  $url_day="2";
			  $url_dayname="昨天";
			  break;
			case 6:
			  $url_do="jdyj";
			  $url_doname="拼多多";
			  $url_day="2";
			  $url_dayname="昨天";
			  break;
			case 7:
			  $url_do="tbyj";
			  $url_doname="淘宝";
			  $url_day="3";
			  $url_dayname="本月";
			  break;
			case 8:
			  $url_do="pddyj";
			  $url_doname="拼多多";
			  $url_day="3";
			  $url_dayname="本月";
			  break;
			case 9:
			  $url_do="jdyj";
			  $url_day="3";
			  $url_dayname="本月";
			  break;
			case 10:
			  $url_do="tbyj";
			  $url_doname="淘宝";
			  $url_day="4";
			  $url_dayname="上月";
			  break;
			case 11:
			  $url_do="pddyj";
			  $url_doname="拼多多";
			  $url_day="4";
			  $url_dayname="上月";
			  break;
			case 12:
			  $url_do="jdyj";
			  $url_doname="京东";
			  $url_day="4";
			  $url_dayname="上月";
			  break;
			default:
			  $url_do="tbyj";
			  $url_doname="淘宝";
			  $url_day="1";
			  $url_dayname="今天";
		}
		$url=$_W['siteroot']."/app/index.php?i=".$_W['uniacid']."&c=entry&do=".$url_do."&m=tiger_wxdaili&uid=".$agentid."&day=".$url_day;
		$url=str_replace("//","/",$url);
		//$url="https://fanyi.baidu.com/";
		//echo $url;

		//访问任务URL
		if (function_exists('curl_init')){
			$returnHtml=curl_file_get_contents($url);//如果服务器支持curl,优先使用curl获取数据
		}else{
			$returnHtml=file_get_contents($url);
		}
		//读取访问结果
		$returnState=true;
		if (strpos($returnHtml,',"weid":') === false) {
			$returnState=false;
		} else {
			$returnArr = json_decode($returnHtml, true);
			$returnMsg=$returnArr[0];
		}

		//计算同步进度百分比
		$percent=round((($page*12+$taskid)/($allpage*12))*100,3);

		//判断是否同步完成所有任务
		if($page<$allpage){
			if($returnState){
				$message="更新成功(进度:".$percent."%,页码:".$page."/".$allpage.")".$returnMsg;
			}else
			{
				$message="更新".$url_dayname.$url_doname."佣金失败(进度:".$percent."%,页码:".$page."/".$allpage.",代理ID:".$agentid.",请求URL:".$url.")";
			}

			$taskid++;//子任务ID加1
			//如果任务ID大于12(每个代理要执行12次同步任务)
			if($taskid>12)
			{
				$taskid=1;//初始化任务ID
				$page++;//页码加1
			}
			$return['timetaskdata'] = array('param' => 'page=' . $page.'&taskid='.$taskid, 'sleep' => $sleep);//返回回传参数
		}else{
			$message="累计".$total."个代理佣金更新完毕!";
		}

        //输出结果并退出程序
		returnExit($return, 1, $message);
		/****************同步老虎新版代理中心三合一佣金开始****************/
    } 
    //【不带返回参数测试】
    elseif ($op == "test1") {
        //1、执行业务函数
        //2、返回结果
        returnExit($return, 1, '定时任务测试1执行成功');
    } 
	//【带传入参数、带回传参数测试】
	elseif ($op == 'test2') {
        //1、【接收参数】
        $day = empty($_GPC['day']) ? 1 : $_GPC['day'];//接配置参数(post参数，即软件定时任务里面设置的任务参数)
        $page = empty($_GPC['page']) ? 1 : $_GPC['page'];//接收页码参数(回传参数)
        //2、【执行业务函数】
        //3、【判断执行结果，并构造回传参数】
        //判断是否执行到最后一页（我这里假设最多只有10页，具体情况根据业务代码判断是否最后一页）
        if ($page >= 10) {
            //执行到最后一页，不回传参数即可
			$message = '本轮所有任务执行完毕';//返回信息
        } else {
            $page++;//页码加1
            //追加回传参数 param 为下次要回传的参数字段，支持任意参数构造(命名注意不要和系统已有的post参数冲突)；  sleep 是控制访问下一页的间隔时间参数，单位为秒
            $return['timetaskdata'] = array('param' => 'test1=111&test2=222&page=' . $page, 'sleep' => 1);//构造回传参数(test1=111&test2=222 为其他测试参数，可以删除)
			$message = '传入的day参数值为:' . $day . ',回传的page参数为：' . $page;//返回信息
        }
        //3、【返回结果】
        returnExit($return, 1, $message);
    } else {
        returnExit($return, 0, '任务标识不正确');
    }
}
else
{
	returnExit($return,0,'未传入有效API参数');//code值设置为1，表示成功
}


//返回json信息并退出
function returnExit($return,$code,$message,$data=''){
	$return['code']=$code;
	$return['message']=urlencode($message);
	if(!empty($data))	$return['data']=$data;
	exit(urldecode(json_encode($return)));
}

//构造返回状态结果字符串
function resultState($result,$id,$v){
	if (!empty($result))	$result.='|';
	$result.=$id.':'.$v;
	return	$result;
}

//获取数据库表的所有字段
function tableField($table){
	$sqlColumns=pdo_fetchall('SHOW COLUMNS FROM '.$table);//查询表的所有字段
	//处理查询结果
	foreach($sqlColumns as $value)
	{
		if(isset($value['Field']) && isset($value['Type'])){
			$sqlField[$value['Field']]=$value['Type'];
		}
	}
	return $sqlField;
}

//格式化订单数据
function orderFormat($data,$field){
	global $_W;
	//将数据存储到符合当前系统的新数组
	$newData=array(
		'weid'=>$_W['uniacid'],
		'addtime'=>strtotime($data['创建时间']),//创建时间
		'orderid'=>$data['订单编号'],//订单编号
		'numid'=>$data['商品ID'],//商品ID
		'shopname'=>$data['所属店铺'],//店铺名称
		'title'=>$data['商品信息'],//商品标题
		'orderzt'=>$data['订单状态'],//订单状态
		'srbl'=>$data['收入比率'],//收入比例
		'fcbl'=>$data['分成比率'],//分成比例
		'fkprice'=>$data['付款金额'],//付款金额
		'xgyg'=>$data['效果预估'],//效果预估
		'jstime'=>strtotime($data['结算时间']),//结算时间
		'pt'=>$data['成交平台'],//平台
		'mtid'=>$data['来源媒体ID'],//媒体ID
		'mttitle'=>$data['来源媒体名称'],//媒体名称
		'tgwid'=>$data['广告位ID'],//推广位ID
		'tgwtitle'=>$data['广告位名称'],//推广位名称
		'tbsbuid6'=>substr($data['订单编号'],-6),//订单后6位
		'createtime'=>TIMESTAMP,
	);

	//处理维权订单
	if(strpos($data['维权状态'],"维权创建") !== false || strpos($data['维权状态'],"等待处理") !== false) {
		$newData['orderzt']='订单付款';//强制将订单状态设置为：订单付款
		$newData['wq']=1;//标记为维权
	}
	elseif(strpos($data['维权状态'],"维权成功") !== false) {
		$newData['orderzt']='订单失效';//强制将订单状态设置为：订单失效
		$newData['wq']=1;//标记为维权
	}
	elseif(strpos($str,"维权失败") !== false) {
		//$data['订单状态']='订单结算';//强制将订单状态设置为：订单结算(因为订单也有可能本身是其他状态，所以此处不做处理即可)
		$newData['wq']=0;//取消维权状态
	}

	//过滤数据库不支持的字段(因为各个版本的数据库字段有差异，所以要处理下)
	foreach($newData as $key=>$value){
		if(isset($field[$key]))
		{
			$saveData[$key]=$value;
		}
	}
	return	$saveData;
}


//将订单表orderid索引改为普通索引
function orderIndex($table){
	$allIndex=pdo_fetchall("show index from".$table);
	//print_r($allIndex);
	foreach($allIndex as $index){
		//判断orderid是否唯一索引
		if($index['Key_name']=='orderid' && $index['Non_unique']==0){
			//将索引修改为普通索引
			$ree=pdo_query("ALTER TABLE ".$table." DROP INDEX `orderid`, ADD INDEX `orderid` (`weid`, `orderid`, `numid`) USING BTREE;");
			//echo '修改索引';
			return;
		}
	}
	//echo '未修改索引';
}


//处理商品分类
function goodsCat($table,$softCat){
	global $_W;
	//查询数据库的分类名和对应ID
	$allCat=pdo_fetchall('select title,id from '.$table." where weid='{$_W['uniacid']}'");
	//print_r($allCat);
	foreach($allCat as $cat){
		$cat['title']=str_replace("其他","其它",$cat['title']);//兼容分类名字为“其他”时的情况
		$dbCat[$cat['title']]=$cat['id'];
	}

	//将程序商品分类关系转化成对应的id
	foreach($softCat as $key=>$value){
		$value=str_replace("其他","其它",$value);//兼容分类名字为“其他”时的情况
		if (isset($dbCat[$value]))	$newCat[$key]=$dbCat[$value];
	}
	//print_r($softCat);
	return $newCat;
}


//格式化商品数据
function goodsFormat($cat,$data,$field){
	global $_W;
	//处理采集来源
	if($data['采集来源']=='大淘客'){
		$data['采集来源']=1;
	}elseif($data['采集来源']=='好单库'){
		$data['采集来源']=2;
	}elseif($data['采集来源']=='轻淘客'){
		$data['采集来源']=4;
	}elseif($data['采集来源']=='一手单'){
		$data['采集来源']=5;
	}elseif($data['采集来源']=='QQ群'){
		$data['采集来源']=8;
	}
	//处理商品类目
	if (empty($cat[$data['商品类目']])){
		$data['商品类目']=0;
	}else{
		$data['商品类目']=$cat[$data['商品类目']];
	}

	$newData=array(
		'weid'=>$_W['uniacid'],//公众号ID
		'zy'=>$data['采集来源'],//1大淘客 2互力 3鹊桥库
		'itemid'=>$data['商品ID'],//商品id
		'itemtitle'=>$data['商品标题'],//商品标题
		'itemshorttitle'=>$data['商品短标题'],//商品短标题
		'itemdesc'=>$data['商品文案'],//商品文案
		'itemprice'=>$data['商品原价'],//商品原价
		'itemsale'=>$data['商品销量'],//商品销量
		'itemsale2'=>$data['商品两小时销量'],//商品最近2小时销量
		//'conversion_ratio'=>$data[''],//优惠券转化率
		'itempic'=>$data['商品图片'],//商品主图
		'fqcat'=>$data['商品类目'],//商品类目
		'itemendprice'=>$data['商品券后价'],//商品券后价
		'shoptype'=>$data['店铺类型'],//店铺类型 天猫(B) C店(C) 企业店铺
		'userid'=>$data['卖家ID'],//卖家ID
		'sellernick'=>$data['卖家昵称'],//卖家昵称
		'tktype'=>$data['佣金计划'],//佣金方式(鹊桥活动 定向计划 通用计划 隐藏计划 营销计划）
		'tkrates'=>$data['佣金比例'],//佣金比例
		//'ctrates'=>$data[''],//村淘佣金比例
		'cuntao'=>$data['是否村淘'],//是否村淘（1是）
		'tkmoney'=>$data['预计佣金'],//预计可得(宝贝价格*佣金比率/100) 
		'tkurl'=>$data['定向计划链接'],//定向计划链接
		'planlink'=>$data['营销计划链接'],//营销计划链接
		'quan_id'=>$data['优惠券ID'],//优惠券ID
		'couponurl'=>$data['优惠券链接'],//优惠券链接
		'couponmoney'=>$data['优惠券金额'],//优惠券面额
		'couponsurplus'=>$data['优惠券剩余量'],//优惠券剩余数量
		'couponreceive'=>$data['优惠券领取量'],//优惠券领取数量
		//'couponreceive2'=>$data[''],//2小时内优惠券领取量
		'couponnum'=>$data['优惠券总数量'],//优惠券总数量
		'couponexplain'=>$data['优惠券使用条件'],//优惠券说明 使用条件
		'couponstarttime'=>$data['优惠券开始时间'],//优惠券开始时间
		'couponendtime'=>$data['优惠券结束时间'],//优惠券结束时间
		'starttime'=>$data['最后修改时间'],//发布时间
		'isquality'=>$data['是否优选'],//是否优选 1为是
		'item_status'=>$data['失效状态'],//产品状态：0为正常
		//'report_status'=>$data[''],//举报处理情况(1为待处理；2为忽略；3为下架)
		'is_brand'=>$data['是否品牌商品'],//是否为品牌产品：1为是
		'is_live'=>$data['是否直播商品'],//是否为直播产品：1为是
		'videoid'=>$data['商品视频ID'],//商品视频id
		'activity_type'=>$data['活动类型'],//活动类型（普通活动、聚划算、淘抢购）
		'createtime'=>TIMESTAMP,//最后修改时间
		//'tj'=>$data[''],//1 秒杀 2 叮咚抢 
		//'zt'=>$data[''],//专题
		//'test8888'=>'66666666',//干扰测试
		//'zd'=>$data[''],//0不置顶  1置顶
		//'qf'=>$data[''],//0不群发  1群发库
	);
	//过滤数据库不支持的字段(因为各个版本的数据库字段有差异，所以要处理下)
	foreach($newData as $key=>$value){
		if(isset($field[$key]))
		{
			$saveData[$key]=$value;
		}
	}
	return	$saveData;
}


//使用curl获取页面内容
function curl_file_get_contents($url){
	//判断是否重定向,如果重定向,就获取重定向后的真实地址
	for ($i=1; $i<=10; $i++)
	{
		$headers = curl_file_get_headers($url);
		$url=$headers["url"];
		if($headers["http_code"]<>'302' and $headers["http_code"]<>'301') break;
	}
	//开始获取内容
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_USERAGENT, _USERAGENT_);
	curl_setopt($ch, CURLOPT_REFERER,_REFERER_);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
//使用curl获取http头
function curl_file_get_headers($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$data = curl_exec($ch);
	$Headers = curl_getinfo($ch);
	curl_close($ch);
	return $Headers;
}
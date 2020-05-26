<?php
global $_W, $_GPC;
        $cfg = $this->module['config'];
        
        $fans=$this->islogin();
// 				print_r($fans);
// 				exit;
        if(empty($fans['tkuid'])){
        	$fans = mc_oauth_userinfo();
	        if(empty($fans)){
	        	$loginurl=$_W['siteroot'].str_replace('./','app/',$this->createMobileurl('login'))."&m=tiger_newhu"."&tzurl=".urlencode($tktzurl);        	  	  	     	  	  	 
       	  	  	 header("Location: ".$loginurl); 
       	  	  	exit;
	        }	        
        }
        
        
        


		//$fans = $_W['fans'];
        $dluid=$_GPC['dluid'];//share id
        $mc=mc_fetch($fans['openid']);


        $member=$this->getmember($fans,$mc['uid']);
        if($cfg['zdgdtype']==1){
        	$this->getzdorder($member,$cfg);
        }        
//      
//      $fans = mc_oauth_userinfo();
//      echo "<pre>";
//      print_r($fans);
//      exit;


        $fzlist = pdo_fetchall("select * from ".tablename($this->modulename."_cdtype")." where weid='{$_W['uniacid']}' and fftype=0  order by px desc");
        $dblist = pdo_fetchall("select * from ".tablename($this->modulename."_cdtype")." where weid='{$_W['uniacid']}' and fftype=1  order by px desc");//底部菜单
				$lblist = pdo_fetchall("select * from ".tablename($this->modulename."_cdtype")." where weid='{$_W['uniacid']}' and fftype=8  order by px desc");//会员中心轮播图
	
				
				// 本月起始时间:
				$bbegin_time = strtotime(date("Y-m-d H:i:s", mktime ( 0, 0, 0, date ( "m" ), 1, date ( "Y" ))));
				$bend_time = strtotime(date("Y-m-d H:i:s", mktime ( 23, 59, 59, date ( "m" ), date ( "t" ),date( "Y" ))));
				// 上月起始时间:
				$sbegin_time = strtotime(date('Y-m-d', mktime(0,0,0,date('m')-1,1,date('Y'))));//上个月开始时间
				$send_time = strtotime(date("Y-m-d 23:59:59", strtotime(-date('d').'day')));//上个月结束时间
				
				
				if($cfg['fxtype']==2){
					$jltype=1;//余额
				}elseif($cfg['fxtype']==1){
					$jltype=0;//积分
				}
				
				
				
				//本月待处理订单
				$bydforder = pdo_fetchcolumn("SELECT COUNT(id) FROM " . tablename($this->modulename.'_order')." where weid='{$_W['uniacid']}' and openid='{$fans['openid']}' and sh=1 and createtime>'{$bbegin_time}' and createtime<'{$bend_time}'");
				if(empty($bydforder)){
					$bydforder='0';
				}
				//本月待处理预估佣金
				$bydfygorder = pdo_fetchcolumn("SELECT SUM(jl) FROM " . tablename($this->modulename.'_order')." where weid='{$_W['uniacid']}' and openid='{$fans['openid']}' and sh=1 and createtime>'{$bbegin_time}' and createtime<'{$bend_time}' and jltype='{$jltype}'");
				if(empty($bydfygorder)){
					$bydfygorder='0.00';
				}
				//上月待处理订单
				$sydforder = pdo_fetchcolumn("SELECT COUNT(id) FROM " . tablename($this->modulename.'_order')." where weid='{$_W['uniacid']}' and openid='{$fans['openid']}' and sh=1 and createtime>'{$sbegin_time}' and createtime<'{$send_time}'");
				if(empty($sydforder)){
					$sydforder=0;
				}
				//上月待处理预估佣金
				$sydfygorder = pdo_fetchcolumn("SELECT SUM(jl) FROM " . tablename($this->modulename.'_order')." where weid='{$_W['uniacid']}' and openid='{$fans['openid']}' and sh=1 and createtime>'{$sbegin_time}' and createtime<'{$send_time}' and jltype='{$jltype}'");
				if(empty($sydfygorder)){
					$sydfygorder='0.00';
				}
				


        //print_r($member);


       include $this->template ( 'member/member' );

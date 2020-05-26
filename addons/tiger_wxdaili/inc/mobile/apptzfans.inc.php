 <?php
global $_W, $_GPC;
         $helpid=$_GPC['id'];
         $cfg = $this->module['config'];
         $uid=$_GPC['uid'];
         $share=pdo_fetch("select * from ".tablename("tiger_newhu_share")." where weid='{$_W['uniacid']}' and id='{$uid}'");//当前用记
		    
         $member=pdo_fetchall("select id,nickname,tgwid,avatar,helpid,createtime from ".tablename('tiger_newhu_share')." where weid='{$_W['uniacid']}' and dltype=1");//所有代理用户
         
		$sharelist=GetTeamMember($member,$share['id']);

        // 本月起始时间:
					
		$appset= pdo_fetch("SELECT * FROM " . tablename("tiger_app_tuanzhangset") . " WHERE weid='{$_W['uniacid']}' order by px desc ");//团长设置
          foreach($sharelist as $k=>$v){       
				 $ddorder = pdo_fetchcolumn("SELECT COUNT(id) FROM " . tablename('tiger_newhu_tkorder')." where weid='{$_W['uniacid']}' and tgwid='{$v['tgwid']}' and addtime>'{$share['tztime']}'");

				 $yjorder = pdo_fetchcolumn("SELECT sum(xgyg) FROM " . tablename('tiger_newhu_tkorder')." where weid='{$_W['uniacid']}' and tgwid='{$v['tgwid']}' and addtime>'{$share['tztime']}'");
				 $yjorder=$yjorder*$appset['jl']/100;
				 $list[$k]['avatar']=$v['avatar'];  
                 $list[$k]['createtime']=$v['createtime'];  
				  $list[$k]['vuecreatetime']=date("Y-m-d H:i:s",$v['createtime']);  
				 $list[$k]['nickname']=$v['nickname']; 
                 $list[$k]['ddorder']=$ddorder;
                 $list[$k]['fkyj']=number_format($yjorder, 2, '.', '');
                 $list[$k]['id']=$v['id'];
          }

					
		/*
		*2.获取某个会员的无限下级方法
		*$members是所有会员数据表,$mid是用户的id
		*/
		function GetTeamMember($members, $mid) {
			$Teams=array();//最终结果
			$shareteam=array();
			$mids=array($mid);//第一次执行时候的用户id
			do {
				$othermids=array(); 
				$state=false;
				foreach ($mids as $valueone) {
					foreach ($members as $key => $valuetwo) {
						if($valuetwo['helpid']==$valueone){
							$shareteam['id']=$valuetwo[id];
							$shareteam['nickname']=$valuetwo['nickname'];
							$shareteam['createtime']=$valuetwo['createtime'];
							$shareteam['tgwid']=$valuetwo['tgwid'];
							$shareteam['avatar']=$valuetwo['avatar'];
							$Teams[]=$shareteam;//$valuetwo[id];//找到我的下级立即添加到最终结果中
							$othermids[]=$valuetwo['id'];//将我的下级id保存起来用来下轮循环他的下级
							array_splice($members,$key,1);//从所有会员中删除他
							$state=true;	
						}
					}			
				}
				$mids=$othermids;//foreach中找到的我的下级集合,用来下次循环
			} while ($state==true);
		 
			return $Teams;
		}
		
		$result = array("errcode" => 0, "list" => $list);
		die(json_encode($result));  

        ?>
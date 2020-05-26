<?php
	
	//小程序 数据列表
	//wx.baokuanba.com/app/index.php?i=3&c=entry&do=jdindex&m=tiger_newhu&owner_name=13735760105&page=1&keyword=%E8%A1%AC%E8%A1%AB&category_id=743&sort_type=0&with_coupon=true
global $_W, $_GPC;
		include IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/jd.php"; 
		$weid=$_W['uniacid'];//绑定公众号的ID
		$cfg = $this->cfg;
		$op=$_GPC['op'];
		$keyword=$_GPC['key'];//搜索关键词
		$type=$_GPC['type'];
		$px=$_GPC['px'];
		$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}' order by id desc");
//		$jdsign=pdo_fetch("select * from ".tablename('tuike_jd_jdsign')." where weid='{$weid}' order by id desc");

//		echo 111;
//		echo "<pre>";
//		print_r($jdsign);
//		exit;

//PID绑定
		$fans=$this->islogin();
        if(empty($fans['tkuid'])){
        	$fans = mc_oauth_userinfo();        
        }
		if(!empty($dluid)){
          $share=pdo_fetch("select * from ".tablename('tiger_newhu_share')." where weid='{$_W['uniacid']}' and id='{$dluid}'");
        }else{
          //$fans=mc_oauth_userinfo();
          $openid=$fans['openid'];
          if(empty($openid)){
          	$openid=$_W['openid'];
          }
          $zxshare=pdo_fetch("select * from ".tablename('tiger_newhu_share')." where weid='{$_W['uniacid']}' and from_user='{$openid}'");
        }
        if($zxshare['dltype']==1){
            if(!empty($zxshare['dlptpid'])){
               $cfg['ptpid']=$zxshare['dlptpid'];
               $cfg['qqpid']=$zxshare['dlqqpid'];
            }
        }else{
           if(!empty($zxshare['helpid'])){//查询有没有上级
                 $sjshare=pdo_fetch("select * from ".tablename('tiger_newhu_share')." where weid='{$_W['uniacid']}' and dltype=1 and id='{$zxshare['helpid']}'");           
            }
        }
        

        if(!empty($sjshare['dlptpid'])){
            if(!empty($sjshare['dlptpid'])){
              $cfg['ptpid']=$sjshare['dlptpid'];
              $cfg['qqpid']=$sjshare['dlqqpid'];
            }   
        }else{
           if($share['dlptpid']){
               if(!empty($share['dlptpid'])){
                 $cfg['ptpid']=$share['dlptpid'];
                 $cfg['qqpid']=$share['dlqqpid'];
               }       
            }
        }
		//结束
			
			$method='jd.union.open.goods.query';
		    $getgoods=array();
		    $getgoods['isCoupon']=1;
			$getgoods['isPG']="1";
			$getgoods['pageIndex']=1;
		    $getgoods['pageSize']=18;
		    $getgoods['commissionShareStart']="5";//佣金比例区间开始
			$arr=array(
				'goodsReqDTO'=>$getgoods
			);
			$goodslist=$this->cjget($method,$arr);
		    $arr=json_decode($goodslist,true);
			$goods=json_decode($arr['jd_union_open_goods_query_response']['result'],true);
			$data=$goods['data'];
			$list=array();
			foreach($data as $k=>$v){				
				$itemprice=$v['priceInfo']['price'];	
				
				$quanxiane=$v['couponInfo']['couponList'][0]['quota'];//券限额大于多少才能用
				if($itemprice>=$quanxiane){
					$discount=$v['couponInfo']['couponList'][0]['discount'];
					if(empty($discount)){
						$discount=0;
					}
				}else{
					$discount=0;
				}
				
			    $itemendprice=$itemprice-$discount;
				
				if($cfg['lbratetype']==3){
                	$ratea=$this->ptyjjl($itemendprice,$v['commissionInfo']['commissionShare'],$cfg);
                }else{
                	$ratea=$this->sharejl($itemendprice,$v['commissionInfo']['commissionShare'],$bl,$share,$cfg);
                }
				$list[$k]['itemid']=$v['skuId'];
				$list[$k]['itemtitle']=$v['skuName'];
				$list[$k]['itempic']=$v['imageInfo']['imageList'][0]['url'];
				$list[$k]['itempic1']=$v['imageInfo']['imageList'][0]['url'];
				$list[$k]['itemprice']=$itemprice;//原价
				$list[$k]['itemendprice']=$itemendprice;//券后
				$list[$k]['couponmoney']=$discount;//优惠券金额
				$list[$k]['coupon_end_time']=substr($v['couponInfo']['couponList'][0]['useEndTime'], 0 ,10);//优惠券失效时间
				$list[$k]['itemsale']=$v['inOrderCount30Days'];//销量
				$list[$k]['discount_link']=$v['couponList'][0]['link'];//优惠券链接
				$list[$k]['rate']=$ratea;//
				$list[$k]['shopId']=$v['shopInfo']['shopId'];//店铺ID
				$list[$k]['shopName']=$v['shopInfo']['shopName'];//店铺名称
			}
// 			echo "<pre>";
// 			print_r($list);
// 			exit;

		
		
		$lbad = pdo_fetchall("SELECT * FROM " . tablename("tiger_newhu_ad") . " WHERE weid = '{$_W['uniacid']}' and type=5 order by id desc");//轮播图
		$ad4 = pdo_fetchall("SELECT * FROM " . tablename("tiger_newhu_ad") . " WHERE weid = '{$_W['uniacid']}' and type=6 order by id desc");//菜单下4张图


		
		$dblist = pdo_fetchall("select * from ".tablename("tiger_newhu_cdtype")." where weid='{$_W['uniacid']}' and fftype=5  order by px desc");//底部菜单
		$cdlist = pdo_fetchall("select * from ".tablename("tiger_newhu_cdtype")." where weid='{$_W['uniacid']}' and fftype=6 order by px desc");//首页轮播图下面菜单
//		
		
////		
		include $this->template ( 'jd/index' ); 
		
?>
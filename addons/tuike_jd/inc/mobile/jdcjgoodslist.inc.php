<?php
	
	//小程序 数据列表
	//wx.baokuanba.com/app/index.php?i=3&c=entry&do=pddgoodslist&m=tiger_newhu&owner_name=13735760105&page=1&keyword=%E8%A1%AC%E8%A1%AB&category_id=743&sort_type=0&with_coupon=true
global $_W, $_GPC;
		include IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/jd.php"; 
		$weid=$_W['uniacid'];//绑定公众号的ID
		$cfg =  $this->cfg;
		$op=$_GPC['op'];
		$keyword=$_GPC['key'];//搜索关键词
		$hd=$_GPC['hd'];
		$type=$_GPC['type'];
		$px=$_GPC['px'];
		$page=$_GPC['page'];//分页
		$quan=$_GPC['quan'];//1有优惠券
		$brandCode=$_GPC['brandCode'];//品牌ID
		$shopid=$_GPC['shopid'];//店铺ID

		
		
//		include IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/tb.php"; 
//      $arr=getfc($keyword,$_W);
//      $key="";
//      foreach($arr as $v){
//           if (empty($v)) continue;
//          $key.=$v;
//      }
//      $keyword=$key;
		

		
		
		
		$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}' order by id desc");
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
		
//		echo "<pre>";
//		print_r($zxshare);
//		exit;
		




		if($op=='1'){  
			if(!empty($type)){
				$cidlist=explode(',',$type);
				$cid1=$cidlist[0];
				$cid2=$cidlist[1];
				$cid3=$cidlist[2];
			}
			
			
			if(empty($page)){
				$page=1;
			}
			
			if(pdo_tableexists('tiger_wxdaili_set')){
	          $bl=pdo_fetch("select * from ".tablename('tiger_wxdaili_set')." where weid='{$weid}'");
	        }      
	        $share=pdo_fetch("select * from ".tablename('tiger_newhu_share')." where weid='{$weid}' and from_user='{$_W['fans']['openid']}'");
			
					
			//超级获取数据开始
			$method='jd.union.open.goods.query';
		    $getgoods=array();
		    if(!empty($keyword)){
		    	$getgoods['keyword']=$keyword;
		    }
				
			if($px==2){//销量
				$getgoods['sortName']="inOrderCount30Days";//commission：佣金， inOrderCount30Days：30天引单量， inOrderComm30Days：30天支出佣金)
				$getgoods['sort']="desc";//asc,desc升降序,默认降序
			}
			if($px==3){//佣金排序
				$getgoods['sortName']="commission";//commission：佣金， inOrderCount30Days：30天引单量， inOrderComm30Days：30天支出佣金)
				$getgoods['sort']="desc";//asc,desc升降序,默认降序
			}
			if($px==4){//价格排序
				$getgoods['sortName']="price";//commission：佣金， inOrderCount30Days：30天引单量， inOrderComm30Days：30天支出佣金)
				$getgoods['sort']="asc";//asc,desc升降序,默认降序
			}
			if($quan==1){
		    	$getgoods['isCoupon']=1;//1：有优惠券，0：无优惠券
		    }
			
			if($hd==1){//爆款
				$getgoods['isHot']="1";//是否是爆款，1：爆款商品，0：非爆款商品
			}
			if($hd==2){//9.9商品
				$getgoods['pricefrom']="0.5";//商品价格下限
				$getgoods['priceto']="9.9";//商品价格上限
			}
			if($hd==3){//30元封顶
				$getgoods['pricefrom']="0.5";//商品价格下限
				$getgoods['priceto']="30";//商品价格上限
			}
			if($hd==4){//京东自营
				$getgoods['owner']="g";//商品类型：自营[g]，POP[p]
			}
			if($hd==5){//拼购商品
				$getgoods['isPG']="1";//是否是拼购商品，1：拼购商品，0：非拼购商品
			}
			//		    $getgoods['isPG']="";//是否是拼购商品，1：拼购商品，0：非拼购商品
			//		    $getgoods['pingouPriceStart']="0";//	拼购价格区间开始
			//		    $getgoods['pingouPriceEnd']="2000";//拼购价格区间结束
				
				
				
//		    $getgoods['skuIds']=["29923483253"];//商品ID
		    $getgoods['pageIndex']=$page;
		    $getgoods['pageSize']=20;
		    $getgoods['commissionShareStart']="5";//佣金比例区间开始
//		    $getgoods['commissionShareEnd']="";//佣金比例区间结束

			if($cid1){
				$getgoods['cid1']=$cid1;
			}
			if($cid2){
				$getgoods['cid2']=$cid2;
			}
			if($cid3){
				$getgoods['cid3']=$cid3;
			}
	        
	        if(!empty($brandCode)){
	        	$getgoods['brandCode']=$brandCode;//品牌code 品牌ID
	        }
		    
		    if(!empty($shopid)){
		    	$getgoods['shopId']=$shopid;//店铺ID
		    }
		    
			$arr=array(
				'goodsReqDTO'=>$getgoods
			);
			
			
		    
		    $goodslist=$this->cjget($method,$arr);
		    $arr=json_decode($goodslist,true);
			$goods=json_decode($arr['jd_union_open_goods_query_response']['result'],true);
// 			echo "<pre>";
// 			print_r($arr);
// 			exit;
     		//结束
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
			die(json_encode(array("error"=>0,'data'=>$list)));  
		
		}
		
		$dblist = pdo_fetchall("select * from ".tablename("tiger_newhu_cdtype")." where weid='{$_W['uniacid']}' and fftype=5 order by px desc");//底部菜单
//		
//		echo "<pre>";
//		print_r($list);
//		exit;
////		
		include $this->template ( 'jd/jdcjgoodslist' ); 
		
?>
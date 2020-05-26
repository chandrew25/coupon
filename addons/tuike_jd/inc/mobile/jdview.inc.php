<?php
	//小程序 数据列表
	//http://cs.tiger-app.com/app/index.php?i=8&c=entry&a=wxapp&do=pddview&m=tiger_tkxcx&owner_name=13735760105&itemid=4837612
global $_W, $_GPC;
		$weid=$_W['uniacid'];//绑定公众号的ID
		$cfg =  $this->cfg;

		
		include IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/jd.php"; 
		$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}' order by id desc");
		$jdsign=pdo_fetch("select * from ".tablename('tuike_jd_jdsign')." where weid='{$weid}' order by id desc");
		$itemid=$_GPC['itemid'];//
		
		$fans=$this->islogin();
        if(empty($fans['tkuid'])){
        	$fans = mc_oauth_userinfo();        
        }
		
				
		$bl=pdo_fetch("select * from ".tablename('tiger_wxdaili_set')." where weid='{$weid}'");        
		
		$openid=$fans['openid'];
        $share=pdo_fetch("select * from ".tablename('tiger_newhu_share')." where weid='{$_W['uniacid']}' and from_user='{$openid}'");  
//      echo "<pre>";
//      print_r($fans);      
        
        if($share['dltype']==1){//是代理
			if(empty($share['jdpid'])){//如果是代理，PID没填写就默认公众号PID
				$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}'");
				$share['jdpid']=$jdset['jdpid'];
			}
		}else{//不是代理
			if(!empty($share['helpid'])){//查看有没有上级
				$shshare=pdo_fetch("select * from ".tablename('tiger_newhu_share')." where weid='{$weid}' and id='{$share['helpid']}'");
				//file_put_contents(IA_ROOT."/addons/tiger_tkxcx/v_log.txt","\n helpid1:".$share['helpid']."--------".json_encode($shshare),FILE_APPEND);	
				if(empty($shshare['id'])){//没有上级代理，就用默认的公众号PID
					$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}'");
				    $share['jdpid']=$jdset['jdpid'];
				}else{//有上级代理
					if($shshare['dltype']==1){//如果上级是代理，就用代理的PID
						$share['jdpid']=$shshare['jdpid'];
					}else{//上级不是代理就用默认的PID
						$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}'");
				   		$share['jdpid']=$jdset['jdpid'];
					}
				}
			}else{//没有上级就用默认公众号PID
				$jdset=pdo_fetch("select * from ".tablename('tuike_jd_jdset')." where weid='{$weid}'");
				$share['jdpid']=$jdset['jdpid'];
			}			
		}
		$p_id=$share['jdpid'];
		
//		echo $p_id;
//		exit;
		
//		$goods=jdview($owner_name,$itemid);
//		$dataview=$goods['goods_detail_response']['goods_details'][0];
		
		$jdlm=$_GPC['jdlm'];//1 京东超级搜索
		
		if($jdlm==1){
			//超级获取数据开始
			$method='jd.union.open.goods.query';
		    $getgoods=array();
		    $getgoods['skuIds']=["".$itemid.""];//商品ID
			$arr=array(
				'goodsReqDTO'=>$getgoods
			);		    
		    $goodslist=$this->cjget($method,$arr);
		    $arr=json_decode($goodslist,true);		    
			$goods=json_decode($arr['jd_union_open_goods_query_response']['result'],true);
			
			$goods=$goods['data'][0];
			
			
			$itemprice=$goods['priceInfo']['price'];	
			$quanxiane=$goods['couponInfo']['couponList'][0]['quota'];//券限额大于多少才能用
			if($itemprice>=$quanxiane){
				$discount=$goods['couponInfo']['couponList'][0]['discount'];
				$discount_link=$goods['couponInfo']['couponList'][0]['link'];
			}else{
				$discount=0;
				$discount_link="";
			}
		    $itemendprice=$itemprice-$discount;
			$views=array(
				'itemid'=>$goods['skuId'],
				'itemtitle'=>$goods['skuName'],
				'itempic'=>$goods['imageInfo']['imageList'][0]['url'],
				'itemprice'=>$itemprice,//原价
				'itemendprice'=>$itemendprice,//券后
				'couponmoney'=>$discount,//优惠券金额
				'coupon_end_time'=>date('Y-m-d H:i:s',substr($goods['couponInfo']['couponList'][0]['useEndTime'], 0 ,10)),//优惠券失效时间
				'itemsale'=>$goods['inOrderCount30Days'],//销量
				'discount_link'=>$discount_link,//优惠券链接
				'videoid'=>'',
	      		'itempic5'=>$goods['imageInfo']['imageList'],
				'shopId'=>$goods['shopInfo']['shopId'],//店铺ID
				'shopName'=>$goods['shopInfo']['shopName'],//店铺名称
				'rate'=>$goods['commissionInfo']['commissionShare'],//佣金比例
	      	);
			if($_GPC['cjcjss']==1){
				exit(json_encode($views));
			}
// 			echo "<pre>";
// 			print_r($views);
// 			exit;
     		//结束
		}else{
			$views=jdview($itemid);
			$views=array(
				'itemid'=>$views['goods_id'],
				'itemtitle'=>$views['goods_name'],
				'itempic'=>$views['goods_img'],
				'itemprice'=>$views['goods_price'],//原价
				'itemendprice'=>$views['coupon_price'],//券后
				'couponmoney'=>$views['discount_price'],//优惠券金额
				'coupon_end_time'=>date('Y-m-d H:i:s',$views['discount_end']),//优惠券失效时间
				'itemsale'=>$views['itemsale'],//销量
				'discount_link'=>$views['discount_link'],//优惠券链接
				'videoid'=>'',
	      		'itempic5'=>'',
				'shopId'=>'',//店铺ID
				'shopName'=>'',//店铺名称
	      	);
			$discount_link=$views['discount_link'];
			

		}
		
		
		//转链详情
		//$zl=jdviewzl($jdset,$jdsign,$itemid,$p_id,$jdlm,$discount_link);//二合一
		$zl=$this->jdviewzl($jdset,$itemid,$p_id,$discount_link);
// 			echo "<pre>";
// 			echo 11;
// 			print_r($jdset);
// 			print_r($zl);
//  			exit;
// 		
			
		$itemendprice=$zl['coupon_price'];
		$itemtitle=$zl['goods_name'];
		
		$itempic=str_replace("http:","https:",$views['itempic']);

      	$views['url1']=$zl;
      	$views['url2']=$zl;
      	$msg=str_replace('#换行#','', $cfg['jdviewwenan']);
		$msg=str_replace('#名称#',"{$views['itemtitle']}", $msg);
		$msg=str_replace('#推荐理由#',"{$views['itemdesc']}", $msg);
		$msg=str_replace('#原价#',"{$views['itemprice']}", $msg);
		$msg=str_replace('#券后价#',"{$views['itemendprice']}", $msg);
		$msg=str_replace('#优惠券#',"{$views['couponmoney']}", $msg);
		if(!empty($views['url1'])){
			$msg=str_replace('#网址#',"{$views['url1']}", $msg);
		}else{
			$msg=str_replace('#网址#',"{$views['url2']}", $msg);
		}
		
		$views['wenan']=$msg;	
//		if(empty($views['url1'])){
//			$views['url1']=$views['url2'];
//		}
//		echo "<pre>";
//		print_r($views);
//		exit;
		
		
		$url="item.jd.com/".$itemid.".html";
		$str=$this->tigercurl($url);		
		$str=mb_convert_encoding($str, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
		$descurl=trim($this->Text_qzj($str,"desc: '","',"));//获取详情链接
		
		$descurl=str_replace("desc: '","",$descurl);
//     		echo $descurl;
//     		exit;
     	$contentstr=$this->tigercurl("http:".$descurl);	
     	$contentstr=$this->Text_qzj($contentstr,'"content":"','"}');
//   	echo $contentstr;
//   	exit;	
		
// 		echo "<pre>";
// 		print_r($views);
// 		exit;
//		
		include $this->template ( 'jd/view' );
?>
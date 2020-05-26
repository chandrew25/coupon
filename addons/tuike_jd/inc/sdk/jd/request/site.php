<?php
/**
 * 淘宝客帐号授权模块微站定义
 *
 * @author 老虎
 * @url http://bbs.we7.cc/
 */

defined('IN_IA') or exit('Access Denied');
require_once IA_ROOT . "/addons/tiger_zhaoshang/inc/sdk/jd/JDSdk.php";
require_once IA_ROOT . "/addons/tiger_zhaoshang/inc/sdk/jd/JdClient.php";


class Tiger_zhaoshangModuleSite extends WeModuleSite {
	
	//https://oauth.jd.com/oauth/authorize?response_type=code&client_id=7A598F73B8AE92B8F1A68CD5B255BAFF&redirect_uri=http://ku.tigertaoke.com/addons/tiger_zhaoshang/jdsign.php&state=cs

	
//	public function getdtktop100(){//获取实实数据
//		$url="http://www.dataoke.com/top_sell";
//		$content=file_get_contents($url);
//		
//		 function getPregArr($str,$preg){
//		     if(!$str){
//		         return false;
//		         exit();
//		         
//		     }else{
//		         $preg1=$preg;
//		        preg_match_all($preg1,$str,$arr);
//		        return($arr);
//		     }
//		 }
//		$preg="/(?<=data_goodsid\=\")\d+(?=\")/is";
//		$ids=getPregArr($content,$preg);
//		return $ids;
//		//var_dump($ids);
//	}

 	public function doWebDtktop100(){
 		global $_W, $_GPC;
 		if($_GPC['type']==1){
 			$url="http://api.dataoke.com/index.php?r=Port/index&type=top100&appkey=fwgauwsa3z&v=2";//top100
 			$content=$this->curl_request($url);     
       		$userInfo = @json_decode($content, true);
   		    $this->indtkgoods($userInfo['result'],1);
 		}else{
 			$url="http://api.dataoke.com/index.php?r=Port/index&type=paoliang&appkey=fwgauwsa3z&v=2";//实实
 			$content=$this->curl_request($url);     
       		$userInfo = @json_decode($content, true);
   		    $this->indtkgoods($userInfo['result'],2);
 		} 		
 		message('温馨提示：该采集任务已完成！', $this->createWebUrl('tbgoods'), 'error');
 		
        
   		 echo '<pre>';
   		print_r($userInfo);
   	    exit;
 	}
	
	
	public function doWebDtkcaiji(){
		global $_W, $_GPC;
		$page=$_GPC['page'];
		//全站采集
		 if(empty($page)){
	              $page=1;
	            }
	            
	            $url="http://api.dataoke.com/index.php?r=Port/index&type=total&appkey=fwgauwsa3z&v=2&page=1";
	            $content=$this->curl_request($url);     
	            $userInfo = @json_decode($content, true);
	            $pagesum=ceil($userInfo['data']['total_num']/50);  //总页数

	            if($page<=$pagesum){
	                $url="http://api.dataoke.com/index.php?r=Port/index&type=total&appkey=fwgauwsa3z&v=2&page={$page}";
	                load()->func('communication');
	                $json = ihttp_get($url);  
	                $userInfo = @json_decode($json['content'], true);
	                //echo '<pre>';
	                //print_r($userInfo);
	                //exit;
	                $this->indtkgoods($userInfo['result']);
	                //usleep(500000);
	
	                if ($page < $pagesum) {
						message('温馨提示：请不要关闭页面，采集任务正在进行中！（' . $page . '/' . $pagesum . '）', $this->createWebUrl('dtkcaiji', array('op' => 'qcljcp','page' => $page + 1)), 'error');
	                } elseif ($page == $pagesum) {
	                    //step6.最后一页 | 修改任务状态
	                   message('温馨提示：采集任务已完成！（' . $page . '/' . $total . '）', $this->createWebUrl('tbgoods'), 'success');
	                } else {
	                    //已结束
	                    //pdo_update('healer_tplmsg_bulk', array('status' => 2), array('uniacid' => $_W['uniacid'], 'id' => $bulk['id']));
	                    message('温馨提示：该采集任务已完成！', $this->createWebUrl('tbgoods'), 'error');
	                }
	                          
	            }
		//结束
	}
	
	
	
	public function indtkgoods($dtklist,$hd=0) {//大淘客入库
        global $_W, $_GPC;
        if($hd==1){//top100        	
        	$tj=13;
        	pdo_update($this->modulename."_tbgoods", array('tj'=>$tj), array('weid'=>$_W['uniacid'],'tj' =>$tj));
        }elseif($hd==2){//实实
        	$tj=14;
        	pdo_update($this->modulename."_tbgoods", array('tj'=>$tj), array('weid'=>$_W['uniacid'],'tj' =>$tj));
        }
        $page=$_GPC['page'];
        $cfg = $this->module['config'];
        foreach($dtklist as $v){
        	  //好单库  1女装,2男装,3内衣,4美妆,5配饰, 6鞋品,7箱包,8儿童,9母婴, 10居家,11美食,12数码,13家电,14其他
        	  //大淘客  1女装  2母婴   3化妆品  4居家  5鞋包配饰  6美食  7文体车品  8数码家电   9男装  10内衣   
                if($v['Cid']==1){
                	$fztype=1;
                }elseif($v['Cid']==2){
                	$fztype=9;
                }elseif($v['Cid']==3){
                	$fztype=4;
                }elseif($v['Cid']==4){
                	$fztype=10;
                }elseif($v['Cid']==5){
                	$fztype=6;
                }elseif($v['Cid']==6){
                	$fztype=11;
                }elseif($v['Cid']==7){
                	$fztype=14;
                }elseif($v['Cid']==8){
                	$fztype=12;
                }elseif($v['Cid']==9){
                	$fztype=2;
                }elseif($v['Cid']==10){
                	$fztype=3;
                }
                
                if($v['Commission_queqiao']!='0.00'){//鹊桥
                   $lxtype='鹊桥活动';
                   $yjbl=$v['Commission_queqiao'];
                }elseif($v['Commission_jihua']!='0.00'){//定向
                  $lxtype='营销计划';
                  $yjbl=$v['Commission_jihua'];
                }else{
                  $lxtype='通用计划';
                  $yjbl=$v['Commission_jihua'];
                }
                if($v['IsTmall']==1){
                	$shoptype='B';
                    $tm=1;
                }else{
                	$shoptype='C';
                    $tm=0;
                }

                $item = array(
                         'weid' => $_W['uniacid'],
                         'fqcat'=>$fztype,
                         'zy'=>1,
                         'tktype'=>$lxtype,
                         'itemid'=>$v['GoodsID'],//商品ID
                         'itemtitle'=>$v['Title'],//商品名称
                         'itemdesc'=>$v['Introduce'],//推荐内容
                         'itempic'=>$v['Pic'],//主图地址
                         'itemendprice'=>$v['Price'],//商品价格,券后价
                         'itemsale'=>$v['Sales_num'],//月销售
                         'tkrates'=>$yjbl,//通用佣金比例
                          'couponreceive'=>$v['Quan_receive'],//优惠券总量已领取数量
                          'couponsurplus'=>$v['Quan_surplus'],//优惠券剩余
                          'couponmoney'=>$v['Quan_price'],//优惠券面额
                          'couponendtime'=>strtotime($v['Quan_time']),//优惠券结束
                          'couponurl'=>$v['Quan_link'],//优惠券链接
                          'shoptype'=>$shoptype,//'0不是  1是天猫',
                          'tm'=>$tm,
                          'quan_id'=>$v['Quan_id'],//'优惠券ID',  
                          'couponexplain'=>$v['Quan_condition'],//'优惠券使用条件',  
                          'itemprice'=>$v['Org_Price'],//'商品原价', 
                          'tkurl'=>$v['Jihua_link'],
                          'videoid'=>0,
                          'tj'=>$tj,
                          'createtime'=>TIMESTAMP,
                        );
                       $go = pdo_fetch("SELECT itemid FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['uniacid']}' and  itemid={$v['GoodsID']} ");
                        if(empty($go)){
                          pdo_insert($this->modulename."_tbgoods",$item);
                        }else{
                           // file_put_contents(IA_ROOT."/addons/tiger_taoke/log.txt","\n old:".json_encode("up02:".$go['num_iid']),FILE_APPEND);
                          pdo_update($this->modulename."_tbgoods", $item, array('weid'=>$_W['uniacid'],'itemid' => $v['GoodsID']));
                        }  
                       
            }
        
    }
    
    
	public function doWebHlcj(){
		global $_W, $_GPC;
		$page=$_GPC['page'];
		if(empty($page)){
          $page='';
        }
        //我的 asdfasdfggdfg  asdfgh
        if($_GPC['type']==1){//聚划算
          $url="http://v2.api.haodanku.com/itemlist/apikey/asdfgh/nav/3/cid/0/back/200/min_id/".$page;
          //$url="http://www.haodanku.com/index/index/nav/1/cheap/1/starttime/30/p/{$page}.html?json=true&api=list";
        }elseif($_GPC['type']==2){//今日上新
          $url="http://v2.api.haodanku.com/column/apikey/asdfgh/type/1/back/200/min_id/".$page;
          //$url="http://www.haodanku.com/index/index/nav/3/new_today/1/p/{$page}.html?json=true&api=list";
        }elseif($_GPC['type']==3){
          $url="http://www.haodanku.com/index/index/nav/9/new_today/1/p/{$page}.html?json=true&api=list";
        }else{
          //$url = "http://www.haodanku.com/?json=true&p={$page}";
          $url="http://v2.api.haodanku.com/itemlist/apikey/asdfgh/nav/3/cid/0/back/200/min_id/".$page;
          //$url="http://www.haodanku.com/index/index/nav/1/starttime/30/p/{$page}.html?json=true&api=list";
        }		
           
            $content=$this->curl_request($url);     
            $userInfo = @json_decode($content, true);
            $page=$userInfo['min_id'];
            echo $page;

//            echo '<pre>';
//            	echo 111;
//            print_r($userInfo);
//            exit;
            
            
            $pagesum=500;
            if(!empty($userInfo['data'])){
               $this->hlinorder($userInfo['data']);
                if ($userInfo['data']) {
					message('温馨提示：请不要关闭页面，采集任务正在进行中！（' . $page . '）', $this->createWebUrl('hlcj', array('op' => 'qcljcp','type'=>$_GPC['type'],'page' => $page)), 'error');
                }else {
                    message('温馨提示：该采集任务已完成！', $this->createWebUrl('hlcj'), 'error');
                }       
            }else{
               message('温馨提示：该采集任务已完成！', $this->createWebUrl('tbgoods'), 'success');
            }
	}
	
	public function hlinorder($userInfo,$_W) {
        global $_W, $_GPC;
        
        $cfg = $this->module['config'];
        foreach($userInfo as $v){
        	$Quan_id=$this->strurl($v['couponurl']);
            if($v['activity_type']=='聚划算'){
                $hd=1;
            }elseif($v['activity_type']=='淘抢购'){
                $hd=2;
            }
            if($v['shoptype']=='B'){
                $tm=1;
            }
        	$item = array(
                        'weid' => $_W['uniacid'],
                        'zy'=>2,
                        'quan_id'=>$Quan_id,
                        'itemid'=>$v['itemid'],
						'itemtitle'=>$v['itemtitle'],
						'itemshorttitle'=>$v['itemshorttitle'],
						'itemdesc'=>$v['itemdesc'],
						'itemprice'=>$v['itemprice'],
						'itemsale'=>$v['itemsale'],
						'itemsale2'=>$v['itemsale2'],
						'conversion_ratio'=>$v['conversion_ratio'],
						'itempic'=>$v['itempic'],
						'fqcat'=>$v['fqcat'],
						'itemendprice'=>$v['itemendprice'],
						'shoptype'=>$v['shoptype'],
                        'tm'=>$tm,//1天猫 0淘宝
						'userid'=>$v['userid'],
						'sellernick'=>$v['sellernick'],
						'tktype'=>$v['tktype'],
						'tkrates'=>$v['tkrates'],
						'ctrates'=>$v['ctrates'],
						'cuntao'=>$v['cuntao'],
						'tkmoney'=>$v['tkmoney'],
						'tkurl'=>$v['tkurl'],
						'couponurl'=>$v['couponurl'],
						'planlink'=>$v['planlink'],
						'couponmoney'=>$v['couponmoney'],
						'couponsurplus'=>$v['couponsurplus'],
						'couponreceive'=>$v['couponreceive'],
						'couponreceive2'=>$v['couponreceive2'],
						'couponnum'=>$v['couponnum'],
						'couponexplain'=>$v['couponexplain'],
						'couponstarttime'=>$v['couponstarttime'],
						'couponendtime'=>$v['couponendtime'],
						'starttime'=>$v['starttime'],
						'isquality'=>$v['isquality'], 
						'item_status'=>$v['item_status'],
						'report_status'=>$v['report_status'],
						'is_brand'=>$v['is_brand'],
						'is_live'=>$v['is_live'],
						'videoid'=>$v['videoid'],
						'activity_type'=>$v['activity_type'],
                        'hd'=>$hd,//1 聚划算 2淘抢购
						//'general_index'=>$v['general_index'],
                        'createtime'=>TIMESTAMP,
                    );
               $go = pdo_fetch("SELECT id FROM " . tablename($this->modulename."_tbgoods") . " WHERE  itemid='{$v['itemid']}' ORDER BY id desc");
                if(empty($go)){
                  pdo_insert($this->modulename."_tbgoods",$item);
                }else{            
                	$item1= array(
                        'weid' => $_W['uniacid'],
                        'zy'=>2,
                        'quan_id'=>$Quan_id,
                        'itemid'=>$v['itemid'],
						'itemtitle'=>$v['itemtitle'],
						'itemshorttitle'=>$v['itemshorttitle'],
						'itemdesc'=>$v['itemdesc'],
						'itemprice'=>$v['itemprice'],
						'itemsale'=>$v['itemsale'],
						'itemsale2'=>$v['itemsale2'],
						'conversion_ratio'=>$v['conversion_ratio'],
						'itempic'=>$v['itempic'],
						'fqcat'=>$v['fqcat'],
						'itemendprice'=>$v['itemendprice'],
						'shoptype'=>$v['shoptype'],
                        'tm'=>$tm,//1天猫 0淘宝
						'userid'=>$v['userid'],
						'sellernick'=>$v['sellernick'],
						'tktype'=>$v['tktype'],
						'tkrates'=>$v['tkrates'],
						'ctrates'=>$v['ctrates'],
						'cuntao'=>$v['cuntao'],
						'tkmoney'=>$v['tkmoney'],
						'tkurl'=>$v['tkurl'],
						'couponurl'=>$v['couponurl'],
						'planlink'=>$v['planlink'],
						'couponmoney'=>$v['couponmoney'],
						'couponsurplus'=>$v['couponsurplus'],
						'couponreceive'=>$v['couponreceive'],
						'couponreceive2'=>$v['couponreceive2'],
						'couponnum'=>$v['couponnum'],
						'couponexplain'=>$v['couponexplain'],
						//'couponstarttime'=>$v['couponstarttime'],
						//'couponendtime'=>$v['couponendtime'],
						'starttime'=>$v['starttime'],
						'isquality'=>$v['isquality'], 
						'item_status'=>$v['item_status'],
						'report_status'=>$v['report_status'],
						'is_brand'=>$v['is_brand'],
						'is_live'=>$v['is_live'],
						'videoid'=>$v['videoid'],
						'activity_type'=>$v['activity_type'],
                        'hd'=>$hd,//1 聚划算 2淘抢购
						//'general_index'=>$v['general_index'],
                        'createtime'=>TIMESTAMP,
                    );              
                  pdo_update($this->modulename."_tbgoods", $item1, array('itemid' => $v['itemid']));
                }  
                       
            }
        
    }
    
    public function strurl($coupons_url) {//获取优惠券ID
        //$a="http://shop.m.taobao.com/shop/coupon.htm?activity_id=b20277f095a940f99db74b36123e4870&seller_id=1761644935";
        //http:\/\/shop.m.taobao.com\/shop\/coupon.htm?seller_id=2267264737&activity_id=11254459ce974f879d27968fc463c2d4
        //http:\/\/shop.m.taobao.com\/shop\/coupon.htm?sellerId=839765554&activityId=9a27c2aa95b1471c8ff219b18c6592ee
        $url=strtolower($coupons_url);//转小写
        //Return $url;
        $activity_id="activity_id=";
        $wz=strpos($url,$activity_id);
        
        if(empty($wz)){
          $activity_id="activityid=";
          $wz=strpos($url,$activity_id);
           Return  substr($url,$wz+11,32);
        }else{
           Return  substr($url,$wz+12,32);
        }
        
    }
	
	public function curl_request($url,$post='',$cookie='', $returnCookie=0){
        //参数1：访问的URL，参数2：post数据(不填则为GET)，参数3：提交的$Cookies,参数4：是否返回$cookies
            $curl = curl_init();//初始化curl会话
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; 	Trident/6.0)');
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
            curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
            if($post) {
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
            }
            if($cookie) {
                curl_setopt($curl, CURLOPT_COOKIE, $cookie);
            }
            curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
            curl_setopt($curl, CURLOPT_TIMEOUT, 10);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            $data = curl_exec($curl);//执行curl会话
            if (curl_errno($curl)) {
                return curl_error($curl);
            }
            curl_close($curl);//关闭curl会话
            if($returnCookie){
                list($header, $body) = explode("\r\n\r\n", $data, 2);
                preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
                $info['cookie']  = substr($matches[1][0], 1);
                $info['content'] = $body;
                return $info;
            }else{
                return $data;
            }
        }

    public function doWebTbgoods(){
        global $_W,$_GPC;
        load ()->func ( 'tpl' );
        $operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
        $opq=$_GPC['opq'];
        
        if($opq=='qkdq'){//清空到期优惠券
        	
        	$dtime=time();

            $ree=pdo_query("DELETE  FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['uniacid']}' and couponendtime<>'' and couponendtime<{$dtime}");  
            if($ree){
              message ('清空成功');
            }else{
              message ('暂无到期优惠券');
            }
        
        }
        if($opq=='yhjsx'){//清空失效优惠券
        	
        	$dtime=time();

            $ree=pdo_query("DELETE  FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['uniacid']}' and item_status=3");  
            if($ree){
              message ('清空成功');
            }else{
              message ('暂无到期优惠券');
            }
        
        }
        
        if($opq=='ycq'){//清空隐藏券
        	
        	$dtime=time();
        	
        	$where=" and couponurl like '%shop%'";
            $ree=pdo_query("DELETE  FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['uniacid']}' {$where}");  
            //$all=pdo_fetchall("SELECT couponurl FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['uniacid']}' {$where}");  
//          echo "<pre>";
//          print_r($all);
//          exit;
            if($ree){
              message ('清空成功');
            }else{
              message ('暂无到期优惠券');
            }
        
        }

        if($opq=='qkqb'){//清空全部商品

            $ree=pdo_delete($this->modulename."_tbgoods",array('weid'=>$_W['uniacid']));
            if($ree){
              message ('清空成功');
            }else{
              message ('暂无产品');
            }
        
        }
        if($opq=='qkqb0'){//优惠券0元商品

            $ree=pdo_delete($this->modulename."_tbgoods",array('weid'=>$_W['uniacid'],'couponmoney'=>0));
            if($ree){
              message ('优惠券0元商品清空成功');
            }else{
              message ('暂无产品');
            }
        
        }
        
        
        if ($operation == 'post'){
            $id = intval($_GPC['id']);
            if (!empty($id)){
                $item = pdo_fetch("SELECT * FROM " . tablename($this->modulename."_tbgoods") . " WHERE id = :id" , array(':id' => $id));
                if (empty($item)){
                    message('抱歉，商品不存在或是已经删除！', '', 'error');
                }
            }
            if (checksubmit('submit')){
                if (empty($_GPC['itemtitle'])){
                    message('请输入商品名称！');
                }
                if (empty($_GPC['itemid'])){
                    message('请输入商品ID！');
                }
                if (empty($_GPC['quan_id'])){
                    message('请输入优惠券ID！');
                }

//                echo strtotime($_GPC['couponstarttime']);
//                echo "<pre>";
//                print_r($_GPC);
//                exit;
                $data = array(
                        'weid' => $_W['uniacid'], 
                        'zy'=>$_GPC['zy'],
                        'tj'=>$_GPC['tj'],
                    'ddqtxt1'=>$_GPC['ddqtxt1'],
                    'ddqtxt2'=>$_GPC['ddqtxt2'],
                    'ddqtxt3'=>$_GPC['ddqtxt3'],
                        'quan_id'=>$_GPC['quan_id'],
                        'itemid'=>$_GPC['itemid'],
						'itemtitle'=>$_GPC['itemtitle'],
						'itemshorttitle'=>$_GPC['itemshorttitle'],
						'itemdesc'=>$_GPC['itemdesc'],
						'itemprice'=>$_GPC['itemprice'],
						'itemsale'=>$_GPC['itemsale'],
						'itempic'=>$_GPC['itempic'],
						'fqcat'=>$_GPC['fqcat'],
						'itemendprice'=>$_GPC['itemendprice'],
						'shoptype'=>$_GPC['shoptype'],
						'tktype'=>$_GPC['tktype'],
						'tkrates'=>$_GPC['tkrates'],
						'tkurl'=>$_GPC['tkurl'],
						'couponurl'=>$_GPC['couponurl'],
						'planlink'=>$_GPC['planlink'],
						'couponmoney'=>$_GPC['couponmoney'],
						'couponnum'=>$_GPC['couponnum'],
						'couponexplain'=>$_GPC['couponexplain'],
						'couponstarttime'=>strtotime($_GPC['couponstarttime']),
						'couponendtime'=>strtotime($_GPC['couponendtime']),
						'starttime'=>$_GPC['starttime'],
						'item_status'=>$_GPC['item_status'],//产品状态：0为正常； 
						'report_status'=>$_GPC['report_status'],
						'is_brand'=>$_GPC['is_brand'],
						'is_live'=>$_GPC['is_live'],
						'videoid'=>$_GPC['videoid'],
						'item_status'=>$_GPC['item_status'],
						'msg'=>$_GPC['msg'],
						'activity_type'=>$_GPC['activity_type'],
                    'createtime' => TIMESTAMP);               
                if (!empty($id)){
                    pdo_update($this->modulename."_tbgoods", $data, array('id' => $id));
                }else{
                    pdo_insert($this->modulename."_tbgoods", $data);
                }
                message('商品更新成功！', $this -> createWebUrl('tbgoods', array('op' => 'display')), 'success');
            }
        }else if ($operation == 'delete'){
            $id = intval($_GPC['id']);
            $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename."_tbgoods") . " WHERE id = :id", array(':id' => $id));
            if (empty($row)){
                message('抱歉，商品' . $id . '不存在或是已经被删除！');
            }
            pdo_delete($this->modulename."_tbgoods", array('id' => $id));
            message('删除成功！', referer(), 'success');
        }else if ($operation == 'display'){
           
            if (checksubmit('submit')){
               foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                     pdo_delete($this->modulename."_tbgoods", array('id' => $id));
                }
              message('批量删除成功', referer(), 'success');
            }
            if(checksubmit('submitzd')){//设置置顶秒杀
              if(!$_GPC['id']){
                message('请选择秒杀商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('tj'=>1), array('id' => $id));
                }
                message('批量置顶设置成功', referer(), 'success');
            }
            if(checksubmit('submitqxzd')){//取消置顶秒杀
              if(!$_GPC['id']){
                message('请选择商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('tj'=>0), array('id' => $id));
                }
                message('批量【取消】成功', referer(), 'success');
            }
            if(checksubmit('submitrq')){//设置叮咚抢
              if(!$_GPC['id']){
                message('请选择人气商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('tj'=>2), array('id' => $id));
                }
                message('批量人气设置成功', referer(), 'success');
            }


            if(checksubmit('submitrq9')){//设置叮咚抢9点
              if(!$_GPC['id']){
                message('请选择人气商品', referer(), 'error');
              }
              $daytime = mktime(0,0,0,date('m'),date('d'),date('Y'));//今天开始时间
              $day9=$daytime+32500;//今天早上9点 
             

              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }                  
                    pdo_update($this->modulename."_tbgoods",array('couponstarttime'=>$day9,'tj'=>2), array('id' => $id));
                }
                message('批量人气设置9点成功', referer(), 'success');
            }

            if(checksubmit('submitrq13')){//设置叮咚抢13点
              if(!$_GPC['id']){
                message('请选择人气商品', referer(), 'error');
              }
              $daytime = mktime(0,0,0,date('m'),date('d'),date('Y'));//今天开始时间
              $day13=$daytime+47800;//今天早上13点 

              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }                  
                    pdo_update($this->modulename."_tbgoods",array('couponstarttime'=>$day13,'tj'=>2), array('id' => $id));
                }
                message('批量人气设置13点成功', referer(), 'success');
            }

            if(checksubmit('submitrq19')){//设置叮咚抢19点
              if(!$_GPC['id']){
                message('请选择人气商品', referer(), 'error');
              }
              $daytime = mktime(0,0,0,date('m'),date('d'),date('Y'));//今天开始时间
              $day19=$daytime+69400;//今天早上19点 

              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }                  
                    pdo_update($this->modulename."_tbgoods",array('couponstarttime'=>$day19,'tj'=>2), array('id' => $id));
                }
                message('批量人气设置19点成功', referer(), 'success');
            }


            if(checksubmit('submitrq21')){//设置叮咚抢19点
              if(!$_GPC['id']){
                message('请选择人气商品', referer(), 'error');
              }
              $daytime = mktime(0,0,0,date('m'),date('d'),date('Y'));//今天开始时间
              $day21=$daytime+76600;//今天早上21点 

              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }                  
                    pdo_update($this->modulename."_tbgoods",array('couponstarttime'=>$day21,'tj'=>2), array('id' => $id));
                }
                message('批量人气设置21点成功', referer(), 'success');
            }
            
            if(checksubmit('submitjhs')){//设置聚划算
              if(!$_GPC['id']){
                message('请选择聚划算商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }                  
                    pdo_update($this->modulename."_tbgoods",array('activity_type'=>"聚划算",'hd'=>1), array('id' => $id));
                }
                message('批量设置聚划算成功', referer(), 'success');
            }
            
            if(checksubmit('submittqg')){//设置淘抢购
              if(!$_GPC['id']){
                message('请选择淘抢购商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }                  
                    pdo_update($this->modulename."_tbgoods",array('activity_type'=>"淘抢购",'hd'=>2), array('id' => $id));
                }
                message('批量设置淘抢购成功', referer(), 'success');
            }

            
            if(checksubmit('submitqxfl')){//批量分类
              if(!$_GPC['id']){
                message('请选择商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('type'=>$_GPC['type']), array('id' => $id));
                }
                message('批量【分类】成功', referer(), 'success');
            }
            if(checksubmit('submitqxzt')){//批量专题
              if(!$_GPC['id']){
                message('请选择商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('zt'=>$_GPC['zt']), array('id' => $id));
                }
                message('批量【专题分组】成功', referer(), 'success');
            }
            if(checksubmit('submitms')){//设置秒杀
              if(!$_GPC['id']){
                message('请选择秒杀商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('tj'=>3), array('id' => $id));
                }
                message('批量秒杀设置成功', referer(), 'success');
            }
            if(checksubmit('submitmsqx')){//取消秒杀
              if(!$_GPC['id']){
                message('请选择秒杀商品', referer(), 'error');
              }
              foreach ($_GPC['id'] as $id){
                    $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                    if (empty($row)){
                        continue;
                    }
                    pdo_update($this->modulename."_tbgoods",array('tj'=>0), array('id' => $id));
                }
                message('批量取消秒杀成功', referer(), 'success');
            }

            if(checksubmit('qf')){//群发库
                if(!$_GPC['id']){
                    message('请选择入库商品', referer(), 'error');
                  }
                  foreach ($_GPC['id'] as $id){
                        $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                        if (empty($row)){
                            continue;
                        }
                        pdo_update($this->modulename."_tbgoods",array('qf'=>1), array('id' => $id));
                    }
                message('批量设置入库成功', referer(), 'success');  
            }

            if(checksubmit('scqf')){
                if(!$_GPC['id']){
                    message('请选择取消入库商品', referer(), 'error');
                  }
                  foreach ($_GPC['id'] as $id){
                        $row = pdo_fetch("SELECT id FROM " . tablename($this->modulename.'_tbgoods') . " WHERE id = :id", array(':id' => $id));
                        if (empty($row)){
                            continue;
                        }
                        $a=pdo_update($this->modulename."_tbgoods",array('qf'=>0), array('id' => $id));
                    }
                message('批量取消入库成功', referer(), 'success');  
            }

            $condition = '';
            $pindex = max(1, intval($_GPC['page']));
		    $psize = 20;  

            $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['weid']}'  ORDER BY createtime desc LIMIT " . ($pindex - 1) * $psize . ",{$psize}");
            $total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->modulename.'_tbgoods')." where weid='{$_W['uniacid']}'");
		    $pager = pagination($total, $pindex, $psize);           
        }else if($operation == 'seach'){
            $key=$_GPC['key'];
            
            $yjtype=$_GPC['yjtype'];
            $type=$_GPC['type'];
            //$event_end_time=strtotime($_GPC['event_end_time']);//活动结束时间
            //$coupons_end=strtotime($_GPC['coupons_end']);//优惠券结束时间
            $tj=$_GPC['tj'];
            $istmall=$_GPC['istmall'];
            $tk_rate=$_GPC['tk_rate'];
            $px=$_GPC['px'];
            $zd=$_GPC['zd'];
            $limit=$_GPC['limit'];
            if(empty($limit)){
               $limit=20;
            }

            
            $where='';

            if(!empty($_GPC['key'])){
                    $where.=" and itemtitle like '%{$_GPC['key']}%' || id='{$_GPC['key']}'";
            }
            $itemid=$_GPC['itemid'];
            if(!empty($itemid)){
              $where.=" and itemid={$itemid}";
            }
            if(!empty($tj)){
                $where.=" and tj=".$tj;      
            }
            if(!empty($istmall)){
              if($istmall==1){
                   $where.=" and shoptype='C'";
                }elseif($istmall==2){
                   $where.=" and shoptype='B'";
                }   
            }
            if(!empty($tk_rate)){
               $where.=" and tkrates>{$tk_rate}";
            }
            if($px==1){
              $px=" tkrates desc";
            }elseif($px==2){
              $px=" tk_rate asc";
            }elseif($px==5){
              $px=" price desc";
            }elseif($px==6){
              $px=" price asc";            
            }elseif($px==7){
              $px=" coupons_take desc";
            }elseif($px==8){
              $px=" coupons_take asc";            
            }elseif($px==12){
              $px=" coupons_price desc";            
            }elseif($px==13){
              $px=" coupons_price asc";            
            }else{
              $px=" id desc";
            }
           //echo $where;
           if($_GPC['sh']=='sh'){
           	  $wherwsh=" and item_status<>0";
           	 // echo $wherwsh;
           }
           if($_GPC['qq']==1){
           	  $wherwqq=" and qunhao<>'' || qunhao<>0";
           	 // echo $wherwsh;
           }
           if($_GPC['yhj']==3){
           	  $wherwyhj=" and item_status=3";
           	 // echo $wherwsh;
           }

            $pindex = max(1, intval($_GPC['page']));
		    $psize = $limit;  
            $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['uniacid']}' {$where} {$wherwsh} {$wherwqq} {$wherwyhj} ORDER BY id desc LIMIT " . ($pindex - 1) * $psize . ",{$psize}");
            $total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->modulename.'_tbgoods')." where weid='{$_W['uniacid']}' {$where} {$wherwsh} {$wherwqq} {$wherwyhj} ");
		    $pager = pagination($total, $pindex, $psize);    
            //echo '<pre>';
            //print_r($list);
            //exit;
            
        }else if($operation == 'qf'){//群发库
            $pindex = max(1, intval($_GPC['page']));
		    $psize = 20;  

            $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename."_tbgoods") . " WHERE weid = '{$_W['weid']}' and qf=1  ORDER BY id desc LIMIT " . ($pindex - 1) * $psize . ",{$psize}");
            $total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->modulename.'_tbgoods')." where weid='{$_W['uniacid']}' and qf=1");
            $pager = pagination($total, $pindex, $psize);    
        }

        

        include $this -> template('tbgoods');
    }
    
    
    public function doWebShare(){
        global $_W,$_GPC;
        $operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
        
        if($_GPC['op']=='post'){
        	$id=$_GPC['id'];
        	if(!empty($id)){
        		$item= pdo_fetch("SELECT * FROM " . tablename($this->modulename."_share") ." where id='{$id}'");  
        		if(checksubmit('submit')){        			
        	 		$a=pdo_update($this->modulename."_share",array('dlsh'=>$_GPC['dlsh']), array('id' => $id));
             		message('编辑成功', referer(), 'success'); 
        		}        		 
        	}        	      	        	
        }
        
        
        $pindex = max(1, intval($_GPC['page']));
	    $psize = 50;  
        $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename."_share") . "  ORDER BY id LIMIT " . ($pindex - 1) * $psize . ",{$psize}");
        $total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->modulename.'_share')." ");
	    $pager = pagination($total, $pindex, $psize);    
        
        include $this -> template('share');    
    }
    
    
    //京东授权
    public function doMobileJdsign(){//拼多多授权
		global $_W, $_GPC;
		$code=$_GPC['code'];
		 $weid=$_W['uniacid'];
//		$set = pdo_fetch ( 'select * from ' . tablename ($this->modulename . "_set" ) . " where weid='{$weid}'" );
		if(empty($code)){
			 echo  "code失效！";
			 exit;
		}

		$url="https://oauth.jd.com/oauth/token?grant_type=authorization_code&client_id=7A598F73B8AE92B8F1A68CD5B255BAFF&redirect_uri=http://ku.tigertaoke.com/addons/tiger_zhaoshang/jdsign.php&code=".$code."&state=".$_GPC['state']."&client_secret=4e237224762e4d5097f211a1ef9bbbb8";
        
		$res=$this->jd_request($url);
		$fhdaa=json_decode($res,1);
//		Array
//			(
//			    [access_token] => 97f1a0d4-bfce-4f1d-9085-be3d8b553d52
//			    [code] => 0
//			    [expires_in] => 31535999
//			    [refresh_token] => df7a773c-335d-485b-9dad-99f7fe8f17aa
//			    [time] => 1527174294118
//			    [token_type] => bearer
//			    [uid] => 5270427049
//			    [user_nick] => jd138679eyx
//			)
		
		$indata=array(
			'weid'=>2,
			'access_token'=>$fhdaa['access_token'],
			'code'=>$fhdaa['code'],
		    'refresh_token'=>$fhdaa['refresh_token'],
		    'time'=>$fhdaa['time'],
		    'token_type'=>$fhdaa['token_type'],
		    'uid'=>$fhdaa['uid'],
		    'user_nick'=>$fhdaa['user_nick'],
		    'expires_in'=>$fhdaa['expires_in'],
			'createtime'=>time()
		);
	
		$go = pdo_fetch("SELECT id FROM " . tablename($this->modulename."_jdsign") . " WHERE  uid='{$fhdaa['uid']}'");
	    if(empty($go)){
	          $res=pdo_insert($this->modulename."_jdsign",$indata);
	          if($res=== false){
	            //echo '授权失败';
	            echo '<p style="line-height:50px;text-align:center;font-size:22px">授权失败</p>';
	          }else{
	            echo '<p style="line-height:50px;text-align:center;font-size:22px"><b style="color:#ff0000;">授权成功</b>,关闭页面！</p>';
	            //$url=$_W['siteroot'].str_replace('./','web/',$this->createWeburl('set'));
	            //echo $url;
	            //echo "<a href='".$url."' style='font-size:20px;width:60%;height:50px;text-height:50px;text-align: center'>授权成功！点击返回</a>";
	            //message('授权成功！关闭页面','###','success');//
	          }
	    }else{                          
	          $res=pdo_update($this->modulename."_jdsign", $indata, array('uid' =>$fhdaa['uid']));
	          if($res=== false){
	            echo '<p style="line-height:50px;text-align:center;font-size:22px">授权失败</p>';
	          }else{
	          	echo '<p style="line-height:50px;text-align:center;font-size:22px"><b style="color:#ff0000;">授权成功</b>,关闭页面！</p>';
	          	 //message('授权成功！关闭页面','###','success');
	            // $url=$_W['siteroot'].str_replace('./','web/',$this->createWeburl('set'));
	            //echo "<a href='".$url."' style='font-size:20px;width:60%;height:50px;text-height:50px;text-align: center'>更新授权成功！点击返回</a>";
	            //message('授权成功！',$url, 'success');
	          }
	    }

	}
    
    
    //拼多多授权管理
    public function doWebPddsqlist(){
        global $_W,$_GPC;
        $operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
        
        if($_GPC['op']=='post'){
        	$id=$_GPC['id'];
        	if(!empty($id)){
        		$item= pdo_fetch("SELECT * FROM " . tablename($this->modulename."_share") ." where id='{$id}'");  
        		if(checksubmit('submit')){        			
        	 		$a=pdo_update($this->modulename."_pddsign",array('dlsh'=>$_GPC['dlsh']), array('id' => $id));
             		message('编辑成功', referer(), 'success'); 
        		}        		 
        	}        	      	        	
        }
        
        
        $pindex = max(1, intval($_GPC['page']));
	    $psize = 50;  
        $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename."_pddsign") . "  ORDER BY id LIMIT " . ($pindex - 1) * $psize . ",{$psize}");
        $total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->modulename.'_pddsign')." ");
	    $pager = pagination($total, $pindex, $psize);    
        
        include $this -> template('pddsqlist');    
    }
    
    //京东授权管理
    public function doWebJdsqlist(){
        global $_W,$_GPC;
        $operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
        
        if($_GPC['op']=='post'){
        	$id=$_GPC['id'];
        	if(!empty($id)){
        		$item= pdo_fetch("SELECT * FROM " . tablename($this->modulename."_share") ." where id='{$id}'");  
        		if(checksubmit('submit')){        			
        	 		$a=pdo_update($this->modulename."_pddsign",array('dlsh'=>$_GPC['dlsh']), array('id' => $id));
             		message('编辑成功', referer(), 'success'); 
        		}        		 
        	}        	      	        	
        }
        
        
        $pindex = max(1, intval($_GPC['page']));
	    $psize = 50;  
        $list = pdo_fetchall("SELECT * FROM " . tablename($this->modulename."_jdsign") . "  ORDER BY id LIMIT " . ($pindex - 1) * $psize . ",{$psize}");
        $total = pdo_fetchcolumn("SELECT COUNT(*) FROM " . tablename($this->modulename.'_jdsign')." ");
	    $pager = pagination($total, $pindex, $psize);    
        
        include $this -> template('jdsqlist');    
    }
    
    
    //创建京东 应用级参数排序
	public function jdcs1px($array){
        ksort($array);
        $string="";
        while (list($key, $val) = each($array)){
          $string = $string . $key.$val ;
        }
        //$string=trim($set['client_secret']).trim($string).trim($set['client_secret']);
        //$string="7f421c1ab7021045806ef07b4f505d6caf049313".trim($string)."7f421c1ab7021045806ef07b4f505d6caf049313";
        //$md5str=MD5($string);
        //return strtoupper($md5str);
        return trim($string);
    }
    
    //传入参数排序 返回JSON
    public function jdcs2px($array){
    	ksort($array);
    	return json_encode($array);
    }
    
    //创建京东 SIGN
    public function jdsign1($arr1,$arr2){
    	$app_key="7A598F73B8AE92B8F1A68CD5B255BAFF";
    	$App_Secret="4e237224762e4d5097f211a1ef9bbbb8";
    	$string=$App_Secret.$arr2.$arr1.$App_Secret;
    	$md5str=MD5($string);
    	return strtoupper($md5str);
    }
    
    //京东 关键词查询选品接口 http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Jdgoodsserch&m=tiger_zhaoshang
    public function doMobileJdgoodsserch(){
    	global $_W, $_GPC;
//  	$arr1=array(
//  		'method'=>'jingdong.union.search.goods.keyword.query',
//			'access_token'=>'97f1a0d4-bfce-4f1d-9085-be3d8b553d52',
//			'app_key'=>'7A598F73B8AE92B8F1A68CD5B255BAFF',
//			'timestamp'=>date("Y-m-d H:i:s",time()-1800),//	String	是	时间戳，格式为yyyy-MM-dd HH:mm:ss，例如：2011-06-16 13:23:30。京东API服务端允许客户端请求时间误差为6分钟
//			//'format'	String	否	暂时只支持json
//			//'v'=>
//  	);
//  	$arr2=array(
//  		'page_index'=>1,// 	Number 	是	 	页码 
//			'page_size'=>20,// 	Number 	是	 	每页数量 
//			'aage_size'=>10// 	Number 	是	 	每页数量 
//  	);
//  	$sign=$this->jdsign1($arr1,$arr2);
//  	require_once IA_ROOT . "/addons/tiger_zhaoshang/inc/sdk/jd/jd/request/UnionSearchGoodsKeywordQueryRequest.php";
    	$c = new JdClient();
		$c->appKey = '7A598F73B8AE92B8F1A68CD5B255BAFF';
		$c->appSecret = '4e237224762e4d5097f211a1ef9bbbb8';
		$c->accessToken = '97f1a0d4-bfce-4f1d-9085-be3d8b553d52';
		$c->serverUrl = 'https://gw.api.360buy.com/routerjson';		
		$req = new ServicePromotionCreatePromotionSiteBatchRequest();
		$req->setUnionId('1000113336'); 
		$req->setKey('e4209eac5db9f8e29ee911196ed61d1106bf6a507961cb8debc2e5a0d1814fb8ba0d9020634e9319 '); 
		$req->setUnionType(1); 
		$req->setType(3); 
		//$req->setSiteId( 123 ); 
		$req->setSpaceName("cs1,cs2,cs3");
		$resp = $c->execute($req,$c->accessToken);
		echo "<pre>";
		print_r($resp);
		exit;
    }
    
    //京东 类目分类 http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=jdclass&m=tiger_zhaoshang
    public function doMobileJdclass(){
    	global $_W, $_GPC;
    	$c = new JdClient();
		$c->appKey = '7A598F73B8AE92B8F1A68CD5B255BAFF';
		$c->appSecret = '4e237224762e4d5097f211a1ef9bbbb8';
		$c->accessToken = '97f1a0d4-bfce-4f1d-9085-be3d8b553d52';
		$c->serverUrl = 'https://gw.api.360buy.com/routerjson';
		$req = new UnionSearchGoodsCategoryQueryRequest();
		$req->setParentId(0); 
		$req->setGrade(1);
		$resp = $c->execute($req,$c->accessToken);
		echo "<pre>";
		print_r($resp);
		exit;
    	
    }
    
    
    
    
    //拼多多接口
    public function doMobilePddsign(){//拼多多授权
		global $_W, $_GPC;
		$code=$_GPC['code'];
		 $weid=$_W['uniacid'];
//		$set = pdo_fetch ( 'select * from ' . tablename ($this->modulename . "_set" ) . " where weid='{$weid}'" );
		if(empty($code)){
			 echo  "code失效！";
			 exit;
		}
		$data=array(
			"client_id"=>"5cc019bb630a4210b15bfd0c26c70b44",
	        "code"=>$code,
	        "grant_type"=>"authorization_code",
	        "client_secret"=>"7f421c1ab7021045806ef07b4f505d6caf049313"
		);
		
		$url="http://open-api.pinduoduo.com/oauth/token";	
		$res=$this->pdd_request($url,$data);
		$fhdaa=json_decode($res,1);
		
		$indata=array(
			'weid'=>2,
			'client_id'=>'5cc019bb630a4210b15bfd0c26c70b44',
			'access_token'=>$fhdaa['access_token'],
			'expires_in'=>$fhdaa['expires_in'],
			'refresh_token'=>$fhdaa['refresh_token'],
			'scope'=>implode("|",$fhdaa['scope']),
			'owner_id'=>$fhdaa['owner_id'],
			'owner_name'=>$fhdaa['owner_name'],
			'endtime'=>time()+$fhdaa['expires_in'],
			'createtime'=>time()
		);
	
		$go = pdo_fetch("SELECT id FROM " . tablename($this->modulename."_pddsign") . " WHERE  owner_id='{$fhdaa['owner_id']}'");
	    if(empty($go)){
	          $res=pdo_insert($this->modulename."_pddsign",$indata);
	          if($res=== false){
	            //echo '授权失败';
	            echo '<p style="line-height:50px;text-align:center;font-size:22px">授权失败</p>';
	          }else{
	            echo '<p style="line-height:50px;text-align:center;font-size:22px"><b style="color:#ff0000;">授权成功</b>,关闭页面！</p>';
	            //$url=$_W['siteroot'].str_replace('./','web/',$this->createWeburl('set'));
	            //echo $url;
	            //echo "<a href='".$url."' style='font-size:20px;width:60%;height:50px;text-height:50px;text-align: center'>授权成功！点击返回</a>";
	            //message('授权成功！关闭页面','###','success');//
	          }
	    }else{                          
	          $res=pdo_update($this->modulename."_pddsign", $indata, array('owner_id' =>$fhdaa['owner_id']));
	          if($res=== false){
	            echo '<p style="line-height:50px;text-align:center;font-size:22px">授权失败</p>';
	          }else{
	          	echo '<p style="line-height:50px;text-align:center;font-size:22px"><b style="color:#ff0000;">授权成功</b>,关闭页面！</p>';
	          	 //message('授权成功！关闭页面','###','success');
	            // $url=$_W['siteroot'].str_replace('./','web/',$this->createWeburl('set'));
	            //echo "<a href='".$url."' style='font-size:20px;width:60%;height:50px;text-height:50px;text-align: center'>更新授权成功！点击返回</a>";
	            //message('授权成功！',$url, 'success');
	          }
	    }

	}
	
	public function doMobileCs22(){
		$owner_name="13735760105";
		$aa=$this->res_token($owner_name);
		echo "<pre>";
		print_r($aa);
		exit;
	}
	
	public function res_token($owner_name){//刷新TOKEN
		$pddsign = pdo_fetch("SELECT * FROM " . tablename($this->modulename."_pddsign") . " WHERE  owner_name='{$owner_name}'");
		$data=array(
			"client_id"=>"5cc019bb630a4210b15bfd0c26c70b44",
			"client_secret"=>"7f421c1ab7021045806ef07b4f505d6caf049313",
			"grant_type"=>"refresh_token",
	        "refresh_token"=>$pddsign['refresh_token']	        
		);		
		$url="http://open-api.pinduoduo.com/oauth/token";	
		$res=$this->pdd_request($url,$data);
		$fhdaa=json_decode($res,1);
		$indata=array(
			'weid'=>2,
			'access_token'=>$fhdaa['access_token'],
			'expires_in'=>$fhdaa['expires_in'],
			'refresh_token'=>$fhdaa['refresh_token'],
			'owner_id'=>$fhdaa['owner_id'],
			'owner_name'=>$fhdaa['owner_name'],
			'endtime'=>time()+$fhdaa['expires_in'],
			'createtime'=>time()
		);
		 $res=pdo_update($this->modulename."_pddsign", $indata, array('owner_id' =>$fhdaa['owner_id']));
		//return $fhdaa;
	}
	
	
	public function rjson($data){
		return urlencode($data);
	}
	
	//商品分类
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddgoodstype&m=tiger_zhaoshang&owner_name=13735760105
	public function doMobilePddgoodstype(){
		global $_W, $_GPC;
		$owner_name=$_GPC['owner_name'];
		$arr=array (
           'parent_opt_id'=>0,//值=0时为顶点opt_id,通过树顶级节点获取opt树
        );       
        
        $goodstype=$this->createres($arr,'pdd.goods.opt.get',$owner_name);
        die(json_encode($goodstype));
//      echo "<pre>";
//      print_r($goodstype);
//      exit;
	}
	
	//搜索订单列表，也可以分类列表
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddgoodslist&m=tiger_zhaoshang&owner_name=13735760105&page=1&with_coupon=true&pricetype=1
	public function doMobilePddgoodslist(){
		global $_W, $_GPC;
		$owner_name=$_GPC['owner_name'];
		$page=$_GPC['page'];
		if(empty($page)){
			$page=1;
		}
		$category_id=$_GPC['category_id'];
		$keyword=$_GPC['keyword'];
		$sort_type=$_GPC['sort_type'];		
		if(empty($sort_type)){
			$sort_type=0;
		}
		$with_coupon=$_GPC['with_coupon'];	
		if(empty($with_coupon)){
			$with_coupon='false';
		}
		
		$arr=array (
            //'keyword' =>$keyword,
            //'category_id' => $category_id,//美食:1 、母婴:4 、水果:13、服饰:14、百货:15、美妆:16、电器:18、男装:743、 家纺:818、鞋包:1281、运动:1451、手机:1543
            'page'=> $page,
            'page_size' => '20',
            'sort_type' => $sort_type,//0-综合排序；1-按佣金比率升序；2-按佣金比例降序；3-按价格升序；4-按价格降序；5-按销量升序；6-按销量降序；7-优惠券金额排序升序；8-优惠券金额排序降序；9-券后价升序排序；10-券后价降序排序；11-按照加入多多进宝时间升序；12-按照加入多多进宝时间降序
            'with_coupon' => $with_coupon,//是否只返回优惠券的商品，false返回所有商品，true只返回有优惠券的商品     
        );       
        if(!empty($keyword)){
        	$arr['keyword']=$keyword;
        }
        if(!empty($category_id)){
        	$arr['category_id']=$category_id;
        }
        $hd=$_GPC['hd'];	
        if($hd==1){//券后价9.9
        	$arr['range_list']='[{"range_id":1,"range_from":1,"range_to":990}]';
        }elseif($hd==2){//销量区间 佣金大于3元
        	$arr['range_list']='[{"range_id":5,"range_from":1000,"range_to":""}]';
        }
        $goodslist=$this->createres($arr,'pdd.ddk.goods.search',$owner_name);
        
        die(json_encode($goodslist));

	}
	
	//拼多多主题商品列表http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddzhutilist&m=tiger_zhaoshang&owner_name=13735760105&itemid=770063585
	public function doMobilePddzhutilist(){
		global $_W, $_GPC;
		$owner_name=$_GPC['owner_name'];
		$arr=array (
           'page_size'=>100,
           'page'=>1
        );       
        
        $view=$this->createres($arr,'pdd.ddk.theme.list.get',$owner_name);
		die(json_encode($view));
	}
	
	//拼多多主题链接生成 http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddzhutiview&m=tiger_zhaoshang&owner_name=13735760105&id=13&p_id=1003738_12858602
	public function doMobilePddzhutiview(){
		global $_W, $_GPC;
		$owner_name=$_GPC['owner_name'];
		$p_id=$_GPC['p_id'];
		$theme_id_list="[".$_GPC['id']."]";
		$arr=array (
           'pid'=>$p_id,
           'theme_id_list'=>$theme_id_list,//主题ID列表,例如[1,235]
        );       
        
        $view=$this->createres($arr,'pdd.ddk.oauth.theme.prom.url.generate',$owner_name);
		die(json_encode($view));
	}
	
	//商品详情
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddgoodsview&m=tiger_zhaoshang&owner_name=13735760105&itemid=770063585
	public function doMobilePddgoodsview(){
		global $_W, $_GPC;
		$owner_name=$_GPC['owner_name'];
		$itemid=$_GPC['itemid'];
		$arr=array (
           'goods_id_list'=>json_encode(array($itemid)),
        );       
        
        $view=$this->createres($arr,'pdd.ddk.goods.detail',$owner_name);
        
       die(json_encode($view));
	}
	
	//商品转链
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddgoodsitemid&m=tiger_zhaoshang&owner_name=13735760105&itemid=770063585&p_id=1003738_12858602
	public function doMobilePddgoodsitemid(){
		global $_W, $_GPC;
		$owner_name=$_GPC['owner_name'];
		$itemid=$_GPC['itemid'];
		$p_id=$_GPC['p_id'];
		$arr=array (
		   'p_id'=>$p_id,//推广位ID
		   'generate_we_app'=>'true',//true / false  true 小程序链接
		   'generate_short_url'=>'true',//是否生成短链接，true-是，false-否
		   'multi_group'=>'false',//true--生成多人团推广链接 false--生成单人团推广链接（默认false）1、单人团推广链接：用户访问单人团推广链接H5页面，可直接购买商品无需拼团。（若用户访问APP，则按照多人团推广链接处理）2、多人团推广链接：用户访问双人团推广链接开团，若用户分享给他人参团，则开团者和参团者的佣金均结算给推手。
           'goods_id_list'=>json_encode(array($itemid)),//商品ID，仅支持单个查询
        );               
        $urlarr=$this->createres($arr,'pdd.ddk.oauth.goods.prom.url.generate',$owner_name);
        die(json_encode($urlarr));
	}
	
	//创建推广位
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddcreatetgw&m=tiger_zhaoshang&owner_name=13735760105&num=1
	public function doMobilePddcreatetgw(){
		global $_W,$_GPC;
		$num=$_GPC['num'];
		$owner_name=$_GPC['owner_name'];		
		$arr=array(	  
		  'number'=>$num,
		);
		$tgw=$this->createres($arr,'pdd.ddk.oauth.goods.pid.generate',$owner_name);
        die(json_encode($tgw));
	}
	
	//查询已经生成的推广位信息
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddgetpid&m=tiger_zhaoshang&owner_name=13735760105&page=1
	public function doMobilePddgetpid(){
		global $_W,$_GPC;
		$page=$_GPC['page'];
		$owner_name=$_GPC['owner_name'];		
		$arr=array(	  
		  'page'=>$page,
		  'page_size'=>50,
		);
		$tgw=$this->createres($arr,'pdd.ddk.oauth.goods.pid.query',$owner_name);
        die(json_encode($tgw));
	}
	
	//增量查询推广订单信息（根据最后更新时间）
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddorder1&m=tiger_zhaoshang&owner_name=13735760105&page=1&start_time=1525107661&end_time=1525366861&p_id=1003738_12858602
	public function doMobilePddorder1(){
		global $_W,$_GPC;
		$page=$_GPC['page'];
		$owner_name=$_GPC['owner_name'];	
		$start_update_time=$_GPC['start_time'];	
		$end_update_time=$_GPC['end_time'];	
		$p_id=$_GPC['p_id'];	
		$arr=array(	  
		  'start_update_time'=>$start_update_time,
		  'end_update_time'=>$end_update_time,
		  //'p_id'=>$p_id,
		  'page'=>$page,
		  'page_size'=>50,
		);
		if(!empty($p_id)){
			$arr['p_id']=$p_id;
		}
		$order1=$this->createres($arr,'pdd.ddk.oauth.order.list.increment.get',$owner_name);
        die(json_encode($order1));	
	}
	
	//按照时间段获取推广订单信息
	//http://pdd.maiapi.cn/app/index.php?i=2&c=entry&do=Pddorder2&m=tiger_zhaoshang&owner_name=13735760105&page=1&start_time=2018-05-01&end_time=2018-05-14&p_id=1003738_13030185&time_type=0
	public function doMobilePddorder2(){
		global $_W,$_GPC;
		$page=$_GPC['page'];
		$owner_name=$_GPC['owner_name'];	
		$start_time=$_GPC['start_time'];	
		$end_time=$_GPC['end_time'];	
		$p_id=$_GPC['p_id'];	
		$time_type=$_GPC['time_type'];	//过滤的时间类型：0--创建时间，1--支付时间， 9--最后更新时间 （默认0）
		$arr=array(	  
		  'start_time'=>$start_time,
		  'end_time'=>$end_time,
		 // 'p_id'=>$p_id,
		  'page'=>$page,
		  'time_type'=>$time_type,//过滤的时间类型：0--创建时间，1--支付时间， 9--最后更新时间 （默认0）
		  'page_size'=>50,
		);
		if(!empty($p_id)){
			$arr['p_id']=$p_id;
		}
		$order1=$this->createres($arr,'pdd.ddk.oauth.order.list.range.get',$owner_name);
        die(json_encode($order1));
	}
	
	
	//拼多多接口
	public function createres($data,$type,$owner_name){
		global $_W;
		$pddsign = pdo_fetch("SELECT * FROM " . tablename($this->modulename."_pddsign") . " WHERE  owner_name='{$owner_name}'");
		if(($pddsign['endtime']-time())<3600){
			$this->res_token($owner_name);
		}
		$time=$this->getMillisecond();
		$data['access_token']=$pddsign['access_token'];
		//return $pddsign['access_token'];
		//$data['client_id']=$pddsign['client_id'];
		$data['client_id']="5cc019bb630a4210b15bfd0c26c70b44";
		$data['type']=$type;
		$data['timestamp']=$time;
		$sign=$this->pddsign($data);
		$data['sign']=$sign;
		$url="http://gw-api.pinduoduo.com/api/router";
        $res=$this->pdd_request($url,$data);
        $data=json_decode($res,1);
        return $data;
	}
	
	public function getMillisecond() {//13位时间戳
        //list($t1, $t2) = explode(' ', microtime());
        $time=time();
        $ran=rand(100,300);
        $t=$time.$ran;
        return $t;
        //return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
    }
    
	
	
	//创建SIGN
	public function pddsign($array){
        ksort($array);
        $string="";
        while (list($key, $val) = each($array)){
          $string = $string . $key.$val ;
        }
        //$string=trim($set['client_secret']).trim($string).trim($set['client_secret']);
        $string="7f421c1ab7021045806ef07b4f505d6caf049313".trim($string)."7f421c1ab7021045806ef07b4f505d6caf049313";
        $md5str=MD5($string);
        return strtoupper($md5str);
    }
	
	public function pdd_request($url,$data=''){
    //参数1：访问的URL，参数2：post数据(不填则为GET)，参数3：提交的$Cookies,参数4：是否返回$cookies
        $headers = array("Content-Type: application/json");
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60); //设置超时
		//$url = '这里为请求地址';
		if(0 === strpos(strtolower($url), 'https')) {
		　　curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
		　　curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); //从证书中检查SSL加密算法是否存在
		}
		if($data){
			curl_setopt($ch, CURLOPT_POST, TRUE);
		    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
		}	
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
		$rtn = curl_exec($ch);//CURLOPT_RETURNTRANSFER 不设置  curl_exec返回TRUE 设置  curl_exec返回json(此处) 失败都返回FALSE
		curl_close($ch);
		return $rtn;
    }
	
    //拼多多接口结束
    
    
    public function jd_request($url,$post='',$cookie='', $returnCookie=0){
    //参数1：访问的URL，参数2：post数据(不填则为GET)，参数3：提交的$Cookies,参数4：是否返回$cookies
        $curl = curl_init();//初始化curl会话
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; 	Trident/6.0)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post));
        }
        if($cookie) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);//执行curl会话
        if (curl_errno($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);//关闭curl会话
        if($returnCookie){
            list($header, $body) = explode("\r\n\r\n", $data, 2);
            preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
            $info['cookie']  = substr($matches[1][0], 1);
            $info['content'] = $body;
            return $info;
        }else{
            return $data;
        }
    }

}
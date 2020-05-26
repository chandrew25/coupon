<?php
global $_W, $_GPC;
//https://oauth.taobao.com/authorize?response_type=code&client_id=25117440&redirect_uri=http://r0hgk.cn/addons/tiger_wxdaili/qudaoapi.php/addons/tiger_wxdaili/qudaoapi.php&state=14%7c7626&view=wap
     $cfg=$this->module['config'];

       
       $state=$_GPC['state'];
       $isapp=strstr($state,"app");
       //echo $state;
       
       
       $weid=$_W['uniacid'];
       $sign=$_GPC['sign'];
       $tbnickname=$_GPC['tbnickname'];
       $tbuid=$_GPC['tbuid'];
       $endtime=$_GPC['endtime'];
       $uid=$_GPC['uid'];
      
       $data=array(
           'weid'=>$weid,
//         'sate'=>$state,
           'uid'=>$uid,
           'tbuid'=>$tbuid,
           'tbnickname'=>$tbnickname,
           'sign'=>$sign,
           'endtime'=>$endtime,
           'createtime'=>time(),
       );
       //
       
       if(!empty($sign)){
       	    include IA_ROOT . "/addons/tiger_newhu/inc/sdk/tbk/goodsapi.php";
       	    $qddata=qudaoget($cfg['qdcode'],$sign);

       	    $error=$qddata['error'];
         	    //echo "<pre>";
         	    //print_r($qddata);
       	    if($isapp!==false){
       	      if(empty($qddata['data'])){
       	      	$title="app失败".$error;
       	      }else{
       	      	$title="app成功";
       	      }	   
       	      $app=1;    	  
	        }else{
	       	  $title="公众号授权";
	        }
	        //echo $title;
  
       	    if(!empty($qddata['data']['relation_id'])){
       	    	$res=pdo_update("tiger_newhu_share", array('qdid'=>$qddata['data']['relation_id']), array('id' =>$uid));
       	    }
       	    
       	    $go = pdo_fetch("SELECT id FROM " . tablename("tiger_newhu_qudaosign") . " WHERE  uid='{$uid}'");
	        if(empty($go)){
	//      	  exit(json_encode($data));
				  if(!empty($sign)){
				  	$res=pdo_insert("tiger_newhu_qudaosign",$data);
		              if($res=== false){
		                $err=1;
		              }else{
		                $err=0;//授权成功
		              }
				  }else{
				  	$err=1;
				  }
	              
	        }else{                    
	        	if(!empty($sign)){
	        		$res=pdo_update("tiger_newhu_qudaosign", $data, array('uid' =>$uid));
		              if($res=== false){
		                 $err=1;
		              }else{
		                 $err=0;//授权成功
		              }
	        	}else{
	        		$err=1;
	        	}      
	              
	        }  
       		
       }else{
       	  $err=1;
       }

        

        
        include $this->template ( 'msg' );


     ?>
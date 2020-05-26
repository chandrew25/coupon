<?php
global $_W, $_GPC;
        $weid=$_W['uniacid'];
        $set = pdo_fetch ( 'select * from ' . tablename ($this->modulename . "_jdset" ) . " where weid='{$weid}'" );        
        $jdsign = pdo_fetch ( 'select * from ' . tablename ($this->modulename . "_jdsign" ) . " where weid='{$weid}' order by id desc" );
        $jdsignlist = pdo_fetchall ( 'select * from ' . tablename ($this->modulename . "_jdsign" ) . " where weid='{$weid}' order by id desc" );
        
//      echo "<pre>";
//      print_r($jdsignlist);
//      exit;
		if($_GPC['op']=='delete'){
			$id=$_GPC['id'];
			pdo_delete($this->modulename."_jdsign", array('id' => $id));
            message('删除成功！', referer(), 'success');
		}
        
        
        if(empty($set)){
           if (checksubmit('submit')){  
                $indata=array(
                    'weid'=>$_W['uniacid'],
                    'appkey'=>$_GPC['appkey'],
                    'appsecret'=>$_GPC['appsecret'],
                    'jduid'=>$_GPC['jduid'],
                    'jdpid'=>$_GPC['jdpid'],
                    'unionid'=>$_GPC['unionid'],
                    'jdkey'=>$_GPC['jdkey'],
                    'createtime' => time(),
                );
            //echo '<pre>';
            //print_r($indata);
            //exit;
                $result=pdo_insert($this->modulename."_jdset",$indata);
                if(empty($result)){
                  message('添加失败', referer(), 'error');
                }else{
                  message ( '添加成功!' );
                }    
           }
        }else{
         if (checksubmit('submit')){
           $id = intval($_GPC['id']);
           $updata=array(              
                    'jduid'=>$_GPC['jduid'],
                    'jdpid'=>$_GPC['jdpid'],
                    'appkey'=>$_GPC['appkey'],
                    'appsecret'=>$_GPC['appsecret'],
                    'unionid'=>$_GPC['unionid'],
                    'jdkey'=>$_GPC['jdkey'],
                    'createtime' => time(),

                );
//              echo "<pre>";
//              print_r($updata);
//              exit;
           if(pdo_update($this->modulename."_jdset",$updata,array('id'=>$id)) === false){
                  message ( '更新失败' );
                }else{
                  message ( '更新成功!' );
                }
          }
        }

		include $this->template ( 'set' );
?>
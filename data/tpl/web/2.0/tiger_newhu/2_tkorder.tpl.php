<?php defined('IN_IA') or exit('Access Denied');?>
		<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_head', TEMPLATE_INCLUDEPATH)) : (include template('public_head', TEMPLATE_INCLUDEPATH));?>
		<!--中间内容开始-->
		<section>
		    <section class="hbox stretch">
		    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_left', TEMPLATE_INCLUDEPATH)) : (include template('public_left', TEMPLATE_INCLUDEPATH));?>
		    <!--右边框架-->
			  <section id="content">
			    <section class="vbox">
			       <section class="scrollable padder" style="padding-bottom:50px;">
                        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                          <li><a href="<?php  echo $this->createWebUrl('index')?>"><i class="fa fa-home"></i> 首页  </a></li>
                          <li class="active">淘客订单管理(<?php  echo $total;?>)</li>
                        </ul>

                        <form method="post" enctype="multipart/form-data">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h3 class="panel-title">
                                   淘客订单导入
                                  </h3>
                               </div>
                               <div class="panel-body">
								    <div class="form-group">
										<label class="col-xs-12 col-sm-3 col-md-2 control-label">订单类型</label>
										<div class="col-xs-12 col-sm-9">
											<label class="checkbox-inline">
													<input type="radio" name="ddtype"  value="0" checked> 普通订单
											</label>
											<label class="checkbox-inline">
													<input type="radio" name="ddtype"  value="1"> 渠道订单
											</label>		
											<label class="checkbox-inline">
													<input type="radio" name="ddtype"  value="2"> 第三方
											</label>
											<span class="help-block" style="color:#ff0000"></span>
										</div>
								    </div>
                                    <div class="form-group">
                                        <label for="type" class="col-sm-2 control-label">导入订单</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="excelfile" class="form-control" />
                                            <div class="help-block">请上传 xlsx 格式的Excel文件（文件大小1M以内）</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
                                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                                    </div>
                               </div>
                            </div>
                        </form>
                        
                        
                       <!-- <form action="<?php  echo $this->createWebUrl('tkwqorder')?>" method="get" class="form-horizontal">
                                <input type="hidden" name="c" value="site">
                                <input type="hidden" name="a" value="entry">
                                <input type="hidden" name="m" value="tiger_newhu">
                                <input type="hidden" name="op" value="wqdd">
                                <input type="hidden" name="do" value="tkwqorder">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h3 class="panel-title">
                                   维权订单更新<span style="color: #ff0000;">（阿里妈妈软件最后登录时间：<?php  echo date('Y-m-d H:i:s',$ck['createtime'])?>）更新以后维权订单都会失效，在每一个月20号之前更新一次</span>
                                  </h3>
                               </div>
                               <div class="panel-body">
                               	注意：使用本功能需要开启阿里妈妈自动登录软件，在配置里面设置同步到云端，对应参数写上！<br><br>
                                     <div class="form-group">
					                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开始时间</label>
					                    <div class="col-sm-9 col-xs-12">
					                <?php  echo tpl_form_field_date('starttime', date('Y-m-d',time()-86400*7), true)?>
					                    </div>
					                </div>
					                <div class="form-group">
					                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">结束时间</label>
					                    <div class="col-sm-9 col-xs-12">
					                <?php  echo tpl_form_field_date('endtime', date('Y-m-d H:i:s',time()), true)?> 
					                    </div>
					                </div>
                                    <div class="col-sm-12">
                                        <input name="submit" type="submit" value="更新" class="btn btn-primary col-lg-1">
                                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                                    </div>
                               </div>
                            </div>
                        </form> -->



                        <div class="panel panel-info">
                        <div class="panel-heading">搜索</div>
                        <div class="panel-body">
<form action="<?php  echo $this->createWebUrl('tkorder',array('op'=>'seach'))?>" method="get" class="form-horizontal">
                                <input type="hidden" name="c" value="site">
                                <input type="hidden" name="a" value="entry">
                                <input type="hidden" name="m" value="tiger_newhu">
                                <input type="hidden" name="op" value="seach">
                                <input type="hidden" name="do" value="tkorder">
                                <div class="form-group">
                                   <label class="col-xs-12 col-sm-3 col-md-2 control-label" >订单号/推广位ID/渠道ID：</label>
                                    <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                        <input type="text" name="order" value="<?php  echo $order;?>" class="form-control" style="display: inline-block;">
                                    </div>
                                 </div>
                                   <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单状态</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="0" <?php  if($zt=='') { ?>checked="checked"<?php  } ?>> 全部
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="1" <?php  if($zt==1) { ?>checked="checked"<?php  } ?>> 订单付款
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="2" <?php  if($zt==2) { ?>checked="checked"<?php  } ?>> 订单结算
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="3" <?php  if($zt==3) { ?>checked="checked"<?php  } ?>> 订单失效
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">时间</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="dd" value="0" <?php  if($dd=='') { ?>checked="checked"<?php  } ?>> 全部
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dd" value="1" <?php  if($dd==1) { ?>checked="checked"<?php  } ?>> 今天
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dd" value="2" <?php  if($dd==2) { ?>checked="checked"<?php  } ?>> 昨天
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dd" value="3" <?php  if($dd==3) { ?>checked="checked"<?php  } ?>> 一个月
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="dd" value="4" <?php  if($dd==4) { ?>checked="checked"<?php  } ?>> 上个月
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="color:#ff0000">
                                       <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="width: 200px;"></label>
                                       <div class="col-sm-2 col-lg-3">
                                            订单数量：<?php  echo $total;?>
                                        </div>
                                        <div class="col-sm-2 col-lg-3">
                                            预估佣金：<?php  echo number_format($totalsum, 2, '.', '');?>元
                                        </div> 
                                    </div>
                                   <button class="btn btn-default">搜索</button>
                                </div>
                                
                            </form>
                        </div>

<form action="<?php  echo $this->createWebUrl('tkorder',array('op'=>'gx'))?>" method="post" class="form-horizontal" id="form1">
                        <div class="panel panel-default">

                            <div class="panel-body">

                                <table class="table table-hover">

                                    <thead class="navbar-inner">

                                        <tr>
                                        	<th width="45"><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></th>
                                            <th style="width:60px;">图片</th>
											<th style="width:360px;">商品信息</th>
                                            
                                            <th>订单状态</th>
                                            <th >收入/分成比例</th>	
                                            <th>金额</th>
                                            <th style="width:70px">平台</th>
                                            <th>更新时间</th>
                                            <th>跟单状态</th>
                                        </tr>

                                    </thead>

                                    <tbody id="table_content" >

                                        <?php  if(is_array($list)) { foreach($list as $l) { ?>
                                        <tr  >
                                        	<td><input type="checkbox" name="id[]" value="<?php  echo $l['id'];?>" class=""></td>
											<td width="60" style="vertical-align: top;"><img src="<?php  echo $l['itempic'];?>" width="50"></td>
                                            <td style="line-height:25px;">
                                            	店铺名：<?php  echo $l['shopname'];?>
                                            	<br><?php  echo $l['title'];?>
                                            	<br>商品ID：<?php  echo $l['numid'];?>
                                            	<Br><span style="color:red">订单号：<?php  echo $l['orderid'];?>
                                            	<br>子订单号：<?php  echo $l['zorderid'];?></span>
                                            	<Br>创建时间：<?php  echo date('Y-m-d H:i:s',$l['addtime'])?>
                                            	<?php  if($l['tgwid']) { ?><Br><span style="color:red"><?php  echo $l['tgwtitle'];?>：<?php  echo $l['tgwid'];?></span><?php  } ?>
                                            	<?php  if($l['relation_id']) { ?><Br><span style="color:#0030ff">渠道ID：<?php  echo $l['relation_id'];?></span><?php  } ?>
                                            	<BR>结算时间：<?php  if($l['jstime']) { ?><?php  echo date('Y-m-d H:i:s',$l['jstime'])?><?php  } ?><br>订单后6位：<?php  echo $l['tbsbuid6'];?>
                                            </td>
                                            <td>
											<?php  if($l['orderzt']=="订单失效") { ?>
											 <span style="color: #ff0000;"><?php  echo $l['orderzt'];?></span>
											<?php  } else if($l['orderzt']=="订单付款") { ?>
											 <span style="color: cornflowerblue;"><?php  echo $l['orderzt'];?></span>
											<?php  } else { ?>
											 <span style="color: forestgreen;"><?php  echo $l['orderzt'];?></span>
											<?php  } ?>
											
											<?php  if($l['wq']==1) { ?><br><b style="color: #ff0000;">维权订单</b><?php  } ?></td>
                                            <td>收入：<?php  echo $l['srbl'];?><Br><?php  if($l['fcbl']) { ?>分成：<?php  echo $l['fcbl'];?><?php  } ?> <?php  if($l['dsf']==2) { ?>二方<?php  } else if($l['dsf']==3) { ?><span style="color: #ff0000;">三方</span><?php  } ?></td>
                                            <td>付款金额：<?php  echo $l['fkprice'];?><br>效果预估：<?php  echo $l['xgyg'];?></td>
                                            <td><?php  echo $l['pt'];?></td>
                                            <td><?php  echo date('Y-m-d',$l['createtime'])?><Br><?php  echo date('H:i:s',$l['createtime'])?></td>
                                            <td><?php  if($l['zdgd']==1) { ?><span class="btn btn-primary btn-xs">已跟单</span><?php  } else { ?><span class="btn btn-warning btn-xs">未跟单</span><?php  } ?></td>
                                        </tr>
                                        <?php  } } ?>
                                        <tr>
                                         	 <td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
                                     		 <td colspan="8" style="text-align: left !important;width:200px">
                                     		 	<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                                      		    <input type="submit" class="btn btn-primary" name="submit" value="批量设置失效" />  
                                      		    <input type="submit" class="btn btn-primary" name="submitzdgd" value="批量设置【已跟单】订单" />  
												<input type="submit" class="btn btn-warning" name="submitwq" value="批量设置成【维权】订单" />  
                                      		    <input type="submit" class="btn btn-primary" name="submitdel" value="批量删除" style="background-color: #ff0000;border-color: #ff0000;" />  
												<!-- <input type="submit" class="btn btn-warning" name="submit3del" value="批量删除3个月之前订单" />  -->
                                     		 </td>                                     		
                                        </tr>

                                    </tbody>

                                </table>

                                <?php  echo $pager;?>

                            </div>

                        </div>
</form>
                        <!---->
			        </section>
			        <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_bottom', TEMPLATE_INCLUDEPATH)) : (include template('public_bottom', TEMPLATE_INCLUDEPATH));?>
			    </section>
			    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
			  </section>
			  <aside class="bg-light lter b-l aside-md hide" id="notes">
			       <div class="wrapper">不知道放什么</div>
			  </aside>
			<!--右边框架结束-->
			</section>
		  </section>
		<!--中间内容结束-->
	</section>
	<style>
		.table>tbody>tr>td{
			    white-space: normal;
		    overflow: inherit;
		    text-overflow: inherit;
		}
	</style>
<script type="text/javascript">
	function sh(id){

		var jljf1="#jljf"+id;
		var jljf=$(jljf1).val();
        var sjjl1="#sjjl"+id;
		var sjjl=$(sjjl1).val();
		if(jljf==''){
			 alert('请填写奖励积分');
			 return false;
		}

        $.ajax({
             type: "GET",
             url: "<?php  echo $this->createWebUrl('shsd')?>",
             data: {id:id, jljf:jljf,sjjl:sjjl},
             dataType: "json",
             success: function(res){
                    if(res.status==1){
                        //window.location.reload();//刷新当前页面.
                        alert('审核奖励成功');       
                        window.location.reload();//刷新当前页面.
                    }else{
                       alert('审核奖励失败');
                    }
             }
         });
		
 
	}
</script>
</body>
</html>
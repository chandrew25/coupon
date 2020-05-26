<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_head', TEMPLATE_INCLUDEPATH)) : (include template('public_head', TEMPLATE_INCLUDEPATH));?>
		<!--中间内容开始-->
		<section>
		    <section class="hbox stretch">
		    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_left', TEMPLATE_INCLUDEPATH)) : (include template('public_left', TEMPLATE_INCLUDEPATH));?>
		    <!--右边框架-->
			  <section id="content">
			    <section class="vbox">
			        <section class="scrollable padder">
                        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                          <li><a href="index.html"><i class="fa fa-home"></i> 首页 </a></li>
                          <li class="active">云控管理</li>
                        </ul>
                        <!--编辑内容-->
												<?php  if($op == 'display') { ?>
											<section id="content">
                       <div class="panel panel-default">
                       	<div class="panel-heading">云控授权设置</div>
                       			<div class="panel-body">
                       						
                       							<div class="form-group">
                       												<div class="col-xs-12 col-sm-12">
                       												
                       													<a href="https://oauth.taobao.com/authorize?response_type=code&client_id=23533320&redirect_uri=http://cs.tigertaoke.com/addons/tiger_shouquan/tkapi.php?i=3&state=<?php  echo urlencode($_W['siteroot'].'|'.$_W['uniacid'])?>&view=web" class="btn btn-success" style="width:100%">增加联盟授权</a>
                       													
                       													<span class="help-block" style="color:#ff0000"></span>
                       												</div>
                       												
                       							</div>
                       							<div class="form-group">
																			<div class="col-xs-12 col-sm-12">
																				<a href="<?php  echo $this->createWebUrl('szpid', array('op' => 'display','page'=>1))?>" target="_blank" class="btn btn-success" style="margin-bottom: 10px;">批量设置原先PID</a><span class="help-block" style="color:#ff0000">memberid 为空的时候请设置一下</span>
																			</div>
																		</div>
                       							
                       											<table class="table">
																							<th style="width: 150px;">淘宝帐号</th>
                       												<th style="width: 150px;">淘宝ID</th>
																							<th style="width: 150px;">memberid</th>
                       												<th>到期时间</th>
                       												<th  style="text-align:right;">操作</th>
                       							
                       												<?php  if(is_array($tksignlist)) { foreach($tksignlist as $item) { ?>
                       													<tr>
                       														<td><?php  echo $item['tbnickname'];?></td>
																									<td><?php  echo $item['tbuid'];?></td>
																									<td><?php  echo $item['memberid'];?></td>
                       														<td><?php  echo date('Y-m-d H:i:s',$item['createtime']+60*60*24*26)?></td>
                       														<td style="text-align:right;">
																										<a href="<?php  echo $this->createWebUrl('yunkong', array('id' => $item['id'],'memberid'=>$item['memberid'],'tkuid'=>$item['tbuid'],'tbnickname'=>$item['tbnickname'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>设置</a>
                       															<a href="<?php  echo $this->createWebUrl('daorupid', array('tkuid' => $item['tbuid'], 'op' => 'display'))?>" class="btn btn-sm btn-default">导入PID</a>
                       															<a href="<?php  echo $this->createWebUrl('tkpid', array('tkuid' => $item['tbuid'], 'op' => 'display'))?>" class="btn btn-sm btn-primary">查看PID</a>
                       															<a href="<?php  echo $this->createWebUrl('seting', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，只能重新授权，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
                       														</td>
                       													</tr>
																		<tr>
																			<td colspan="5"><span style="color:#ff0000">sign：</span><?php  echo $item['sign'];?></td>
																		</tr>
																		<tr>
																			<td colspan="5"><span style="color:#ff0000">渠道推广URL：</span><?php  echo $item['qdtgurl'];?></td>
																		</tr>
																		<tr>
																			<td colspan="5" style="height: 5px;border: 0;"></td>
																		</tr>
                       													<?php  } } ?>
                       											</table> 
                       			</div>
                       	</div>
              </section>
							<style>
								.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td{
									overflow: inherit;
								}
							</style>
							<?php  } ?>
							<?php  if($op == 'post') { ?>
									<div class="panel panel-default">
									   <div class="panel-heading">
									      <h3 class="panel-title">
									       编辑memberid
									      </h3>
									   </div>
									   <div class="panel-body">
									        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
														<div class="form-group">
															<label for="inputEmail3" class="col-sm-2 control-label"></label>
															<div class="col-sm-10">
																<?php  echo $tbnickname;?>(<?php  echo $tbuid;?>) 
															</div>
														</div>		
									          <div class="form-group">
									            <label for="inputEmail3" class="col-sm-2 control-label">memberid</label>
									            <div class="col-sm-10">
									              <input type="text" class="form-control" name="memberid" value="<?php  echo $memberid;?>"  placeholder="">
													<span class="help-block">对应PID数值 ：mm_<span style="color:#ff0000">memberid</span>_siteid_adzoneid <Br>如：mm_<span style="color:#ff0000">1515151</span>_45416554_6544845</span>
									            </div>
									          </div>	
												<div class="form-group">
												  <label for="inputEmail3" class="col-sm-2 control-label">渠道推广链接</label>
												  <div class="col-sm-10">
													<input type="text" class="form-control" name="qdtgurl" value="<?php  echo $qd['qdtgurl'];?>"  placeholder="">
													<span class="help-block">联盟后台->推广管理->渠道管理->获取备案邀请链接</span>
												  </div>
												</div>	
									          <div class="form-group">
									            <div class="col-sm-offset-2 col-sm-10">
									               <input type="hidden" name="id" value="<?php  echo $id;?>" />
									               <input type="submit" name="submit" class="btn btn-default" value="提交"  class="btn btn-primary"/>
									               <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
									            </div>
									          </div>
									        </form>
									   </div>
									</div>
							<?php  } ?>
							
							
                        <!--编辑内容结束-->			            
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

</body>
</html>
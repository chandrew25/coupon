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
                          <li class="active">团长管理</li>
                        </ul>
												<a href="<?php  echo $this->createWebUrl('tuanzhangset', array('op' => 'post'));?>" class="btn btn-s-md btn-info tigerbtn"><i class="fa fa-plus"></i> 添加团长</a>
												<a href="<?php  echo $this->createWebUrl('tuanzhangset', array('op' => 'display'));?>" class="btn btn-s-md btn-success tigerbtn"><i class="fa fa-pencil-square-o "></i> 管理团长</a>
												
												<style type="text/css">
													.tigerbtn{margin-right:10px;margin-bottom: 10px;}
												</style>
                        <!--编辑内容-->
                        <?php  if($operation == 'post') { ?>

                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               编辑团长
                              </h3>
                           </div>
                           <div class="panel-body">
													<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                               	<!-- <div class="form-group">
                               		<label for="inputPassword3" class="col-sm-2 control-label">海报背景图片</label>
                               		<div class="col-sm-10">
                               			<?php  echo tpl_form_field_image('pic',$item['pic'])?>
                               			<span class="help-block" style="color:#ff0000">640X1008   .jpg格式 100K内</span>
                               		</div>
                               	</div> -->
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-2 control-label">团长名称</label>
																	<div class="col-sm-10">
																		<input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>"  placeholder="">
																	</div>
																</div>
																<div class="form-group">
																	<label for="inputEmail3" class="col-sm-2 control-label">权重</label>
																	<div class="col-sm-10">
																		<input type="text" class="form-control" name="px" value="<?php  echo $item['px'];?>"  placeholder="<?php  echo $item['px'];?>">
																		<span class="help-block">填写数字1-10数字越大权重越高，不要重复</span>
																	</div>
																</div>
																<div class="form-group">
																			<label class="col-sm-2 control-label">奖励</label>
																			<div class="col-sm-4 col-xs-4">
																					<div class="input-group">
																						<input type="text" name="jl" class="form-control valid" value="<?php  echo $item['jl'];?>" aria-invalid="false">
																							<div class="input-group-addon">%</div>
																					</div>
																					<span class="help-block">奖励下级整条线的%分比</span>
																			</div>
																</div>
																<div class="form-group">
																		<label class="col-sm-2 control-label">升级条件1</label>
																			<div class="col-sm-4 col-xs-4">
																						<label class="radio-inline">升级付费金额</label>
																						<span class="help-block"></span>
																						<div class="input-group">											
																							<input type="text" name="rmb" class="form-control" value="<?php  echo $item['rmb'];?>">
																								<span class="input-group-addon">元</span>
																						</div>
																						<span class="help-block">金额必须填写</span>
																			</div>
																</div> 
																
																<div class="form-group">
																		<label class="col-sm-2 control-label">升级条件2</label>
																			<div class="col-sm-4 col-xs-4">
																						<label class="radio-inline"><input type="radio" name="sjtype" value="0" 
																						<?php  if($item['sjtype']==0) { ?> checked="checked" <?php  } ?>>推荐满多少个粉丝</label>
																						<label class="radio-inline"><input type="radio" name="sjtype" value="1"
																						<?php  if($item['sjtype']==1) { ?> checked="checked" <?php  } ?>>推荐满多少个代理</label>
																						<!-- <label class="radio-inline">直属粉丝满</label> -->
																						<span class="help-block"></span>
																						<div class="input-group">											
																							<input type="text" name="fsm" class="form-control" value="<?php  echo $item['fsm'];?>">
																								<span class="input-group-addon">个</span>
																						</div>
																						<span class="help-block">如果达到上面的要求，才能申请（不填不限制）</span>
																			</div>
																</div>  
																<div class="form-group">
																		<label class="col-sm-2 control-label">升级条件3</label>
																			<div class="col-sm-4 col-xs-4">
																						<label class="radio-inline">购买订单数量</label>
																						<span class="help-block"></span>
																						<div class="input-group">											
																							<input type="text" name="ordermsum" class="form-control" value="<?php  echo $item['ordermsum'];?>">
																								<span class="input-group-addon">单</span>
																						</div>
																						<span class="help-block">达到多少订单才能审核（不填不限制）</span>
																			</div>
																</div> 
																
																
																
																
                               	<div class="form-group">
                               		<div class="col-sm-offset-2 col-sm-10">
                               			<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                               			<input type="submit" name="submit" class="btn btn-default" value="提交"  class="btn btn-primary"/>
                               			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                               		</div>
                               	</div>
                               </form>
                           </div>
                        </div>


                        <script language='javascript'>
                          require(['jquery', 'util'], function($, u){
                            $(function(){
                              $('.richtext-clone').each( function() {
                                u.editor(this);
                              });
                            });
                          });
                        </script>

                        <?php  } else if($operation == 'display') { ?>
                        <div class="panel panel-default">
                              <table class="table">
																				<th style="width:80px;">权重</th>
                                        <th>团长名称</th>
																				<th>升级金额</th>
                                        <th  style="text-align:right;">操作</th>
                              
                                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                                      <tr>
																				<td><?php  echo $item['px'];?></td>
                                        <td><?php  echo $item['title'];?></td>
																				<td><?php  echo $item['rmb'];?>元</td>
                                        <td style="text-align:right;">
                                          <a href="<?php  echo $this->createWebUrl('tuanzhangset', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
                                          <a href="<?php  echo $this->createWebUrl('tuanzhangset', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
                                        </td>
                                      </tr>
                                      <?php  } } ?>
                              </table>
                         
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
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
                          <li class="active">图标/广告管理</li>
                        </ul>
                        
                        <a href="<?php  echo $this->createWebUrl('appdh', array('op' => 'post'));?>" class="btn btn-s-md btn-info tigerbtn"><i class="fa fa-plus"></i> 添加广告/图标</a>
                        <a href="<?php  echo $this->createWebUrl('appdh', array('op' => 'display'));?>" class="btn btn-s-md btn-success tigerbtn"><i class="fa fa-pencil-square-o "></i> 管理广告/图标</a>
                        
                        <style type="text/css">
                        	.tigerbtn{margin-right:10px;margin-bottom: 10px;}
                        </style>
                        
                        <!--编辑内容-->
                        <?php  if($operation == 'post') { ?>

                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               编辑图标/广告
                              </h3>
                           </div>
                           <div class="panel-body">
                                <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                                  <div class="form-group">
						            <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
						            <div class="col-sm-10">
						              <input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>"  placeholder="名称">
						            </div>
						          </div>
						           <div class="form-group">
						            <label for="inputEmail3" class="col-sm-2 control-label">副标题</label>
						            <div class="col-sm-10">
						              <input type="text" class="form-control" name="ftitle" value="<?php  echo $item['ftitle'];?>"  placeholder="名称">
						              <span class="help-block">会员中心</span>
						            </div>
						          </div>
											<div class="form-group">
											  <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
											  <div class="col-sm-10">
											    <input type="text" class="form-control" name="px" value="<?php  echo $item['px'];?>"  placeholder="0">
											    <span class="help-block">从小到大  如  1  2 3 4 5</span>
											  </div>
											</div>
						          <div class="form-group">
						                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">显示位置</label>
						                    <div class="col-xs-12 col-sm-9">
						                        <label class="radio-inline"><input type="radio" name="fztype" value="1" 
						                         <?php  if($item['fztype']==1) { ?> checked="checked" <?php  } ?>>首页轮播广告<br>尺寸：750-300</label>
						                        <label class="radio-inline"><input type="radio" name="fztype" value="2"
						                         <?php  if($item['fztype']==2) { ?> checked="checked" <?php  } ?>>广告下面菜单<br>尺寸：100x100</label>						                        
						                        <!-- <label class="radio-inline"><input type="radio" name="fztype" value="4"
						                         <?php  if($item['fztype']==4) { ?> checked="checked" <?php  } ?>>底部菜单</label> -->
						                         <label class="radio-inline"><input type="radio" name="fztype" value="5"
						                         <?php  if($item['fztype']==5) { ?> checked="checked" <?php  } ?>>会员中心下方图标<br>尺寸：100x100</label>
						                         <label class="radio-inline"><input type="radio" name="fztype" value="6"
						                         <?php  if($item['fztype']==6) { ?> checked="checked" <?php  } ?>>会员中心下方轮播<br>尺寸：750x190</br?></label>
						                         <label class="radio-inline"><input type="radio" name="fztype" value="7"
						                         <?php  if($item['fztype']==7) { ?> checked="checked" <?php  } ?>>首页通栏广告<br>尺寸：750x210</label>
																		  <label class="radio-inline"><input type="radio" name="fztype" value="3"
																		 <?php  if($item['fztype']==3) { ?> checked="checked" <?php  } ?>>首页二列广告<br>尺寸：375x223</label>
																		 <label class="radio-inline"><input type="radio" name="fztype" value="8"
																		 <?php  if($item['fztype']==8) { ?> checked="checked" <?php  } ?>>首页三列广告<br>尺寸：250x375</label>
																		 <label class="radio-inline"><input type="radio" name="fztype" value="9"
																		 <?php  if($item['fztype']==9) { ?> checked="checked" <?php  } ?>>首页四列广告<br>尺寸：187x260</label>
																		 
						                          <span class="help-block"></span>
						
						                    </div>
						          </div>
											<div class="form-group">
													<label class="col-xs-12 col-sm-3 col-md-2 control-label">头部背景颜色左</label>
													 <div class="col-sm-9 col-xs-12">
																<?php  echo tpl_form_field_color('headcolorleft',$item['headcolorleft'])?>
													</div>
											</div>
											<div class="form-group">
													<label class="col-xs-12 col-sm-3 col-md-2 control-label">头部背景颜色右</label>
													 <div class="col-sm-9 col-xs-12">
																<?php  echo tpl_form_field_color('headcolorright',$item['headcolorright'])?>
																<span class="help-block">头部背景渐变颜色（新版使用）只有上面选择首页轮播图的时候才有效</span>
													</div>													
											</div>
						          <div class="form-group">
						                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">类型</label>
						                    <div class="col-xs-12 col-sm-9">
						                        <label class="radio-inline"><input type="radio" name="type" value="1" 
						                         <?php  if($item['type']==1) { ?> checked="checked" <?php  } ?>>H5页面</label>
						                        <label class="radio-inline"><input type="radio" name="type" value="2"
						                         <?php  if($item['type']==2) { ?> checked="checked" <?php  } ?>>商品分类</label>
						                         <label class="radio-inline"><input type="radio" name="type" value="3"
						                         <?php  if($item['type']==3) { ?> checked="checked" <?php  } ?>>活动</label>
						                         <label class="radio-inline"><input type="radio" name="type" value="4"
						                         <?php  if($item['type']==4) { ?> checked="checked" <?php  } ?>>原生页面</label>
						                         <!--<label class="radio-inline"><input type="radio" name="type" value="5"
						                         <?php  if($item['type']==5) { ?> checked="checked" <?php  } ?>>客服按钮</label>-->
						                         <!--<label class="radio-inline"><input type="radio" name="type" value="6"
						                         <?php  if($item['type']==6) { ?> checked="checked" <?php  } ?>>跳转到其它小程序</label>-->
						
						                          <span class="help-block"></span>
						                    </div>
						          </div>
											
											<div class="form-group">
												<label for="type" class="col-sm-2 control-label">原生页面选择</label>
												<div class="col-sm-10">
														<div class="input-group" style="width: 150px;">
																<select class="form-control" name="apppage1" id="apppage1">  
																				<option <?php  if("xb://cate/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://cate/">超级分类</option>
																				<option <?php  if("xb://order/0"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://order/0">提交订单</option>
																				<option <?php  if("xb://order/1"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://order/1">我的订单</option>
																				<option <?php  if("xb://cash/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://cash/">提现</option>
																				<option <?php  if("xb://friend/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://friend/">我的朋友</option>
																				<option <?php  if("xb://jifenxiangqing/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://jifenxiangqing/">积分明细</option>
																				<option <?php  if("xb://daili/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://daili/">代理申请</option>
																				<option <?php  if("xb://paihangbang/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://paihangbang/">积分排行本榜</option>
																				<option <?php  if("xb://search/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://search/">超级搜索</option>
																				<option <?php  if("xb://shop/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://shop/">积分商城</option>
																				<option <?php  if("xb://qiandao/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://qiandao/">签到</option>
																				<option <?php  if("xb://banner/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://banner/">分享海报</option>
																				<option <?php  if("xb://hehuoren/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://hehuoren/">合伙人中心</option>
																				<!-- <option <?php  if("xb://tuiguang/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://tuiguang/">朋友圈多产品</option> -->
																				<!-- <option <?php  if("xb://tbcart/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://tbcart/">淘宝购物车</option> -->
																				<!-- <option <?php  if("xb://tbo/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://tbo/">淘宝我的订单</option> -->
																				<option <?php  if("xb://index/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://index/">首页</option>
																				<option <?php  if("xb://personal/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://personal/">会员中心</option>
																				<!-- <option <?php  if("xb://zhibo/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://zhibo/">好券直播</option> -->
																				<option <?php  if("xb://top100/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://top100/">实时榜单</option>
																				<option <?php  if("xb://ddq/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://ddq/">叮咚抢</option>
																				<option <?php  if("xb://sstop/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://sstop/">销量排行榜</option>
																				<option <?php  if("xb://faxian/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://faxian/">发现(朋友圈)</option>
																				<option <?php  if("xb://pdd/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://pdd/">拼多多</option>
																				<option <?php  if("xb://jd/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://jd/">京东</option>
																				<option <?php  if("xb://product/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://product/">单商品</option>
																				<option <?php  if("xb://muying/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://muying/">母婴专区</option>
																				<option <?php  if("xb://shoucanglist/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://shoucanglist/">收藏列表</option>
																				<?php  if(is_array($qtzlist)) { foreach($qtzlist as $v) { ?>
																				<option <?php  if("xb://qtz_".$v['id']== $item['apppage1']) { ?>selected<?php  } ?> value="xb://qtz_<?php  echo $v['id'];?>"><?php  echo $v['title'];?></option>
																				<?php  } } ?>
																				<!-- <option <?php  if("xb://douyinlist/"== $item['apppage1']) { ?>selected<?php  } ?> value="xb://douyinlist/">抖券</option> -->
																</select> 
														</div>        
														<span class="help-block" style="color:#ff0000">上面选择原生页面，这里选择才会生效</span>
												</div>
											</div>
											
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">商品ID</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" name="itemid" value="<?php  echo $item['itemid'];?>"  placeholder="">
													<span class="help-block" style="color:#ff0000">上面原生的选择单商品</span>
												</div>
											</div> 

						          
						          <div class="form-group">
						                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">活动</label>
						                    <div class="col-xs-12 col-sm-9">
						                        <label class="radio-inline"><input type="radio" name="hd" value="1" 
						                         <?php  if($item['hd']==1) { ?> checked="checked" <?php  } ?>>聚划算</label>
						                        <label class="radio-inline"><input type="radio" name="hd" value="2"
						                         <?php  if($item['hd']==2) { ?> checked="checked" <?php  } ?>>淘抢购</label>
						                         <label class="radio-inline"><input type="radio" name="hd" value="3"
						                         <?php  if($item['hd']==3) { ?> checked="checked" <?php  } ?>>秒杀</label>
						                         <!--<label class="radio-inline"><input type="radio" name="hd" value="4"
						                         <?php  if($item['hd']==4) { ?> checked="checked" <?php  } ?>>叮咚抢</label>-->
						                         <label class="radio-inline"><input type="radio" name="hd" value="5"
						                         <?php  if($item['hd']==5) { ?> checked="checked" <?php  } ?>>视频单</label>
						                         <!--<label class="radio-inline"><input type="radio" name="hd" value="6"
						                         <?php  if($item['hd']==6) { ?> checked="checked" <?php  } ?>>品牌团</label>
						                         <label class="radio-inline"><input type="radio" name="hd" value="7"
						                         <?php  if($item['hd']==7) { ?> checked="checked" <?php  } ?>>官方推荐</label>
						                         <label class="radio-inline"><input type="radio" name="hd" value="8"
						                         <?php  if($item['hd']==8) { ?> checked="checked" <?php  } ?>>好券直播</label>
						                         <label class="radio-inline"><input type="radio" name="hd" value="9"
						                         <?php  if($item['hd']==9) { ?> checked="checked" <?php  } ?>>小编力荐</label>-->
						                          <label class="radio-inline"><input type="radio" name="hd" value="10"
						                         <?php  if($item['hd']==10) { ?> checked="checked" <?php  } ?>>大额券</label>
						                         <label class="radio-inline"><input type="radio" name="hd" value="11"
						                         <?php  if($item['hd']==11) { ?> checked="checked" <?php  } ?>>9.9</label>
						                         <label class="radio-inline"><input type="radio" name="hd" value="12"
						                         <?php  if($item['hd']==12) { ?> checked="checked" <?php  } ?>>30元封顶</label>
						
						                          <span class="help-block"></span>
						                    </div>
						          </div>
						
						          <div class="form-group">
						            <label for="type" class="col-sm-2 control-label">商品类别</label>
						            <div class="col-sm-10">
						                <div class="input-group" style="width: 150px;">
						                    <select class="form-control" name="fqcat" id="flid">               
						                        <?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
						                            <option <?php  if(!empty($v) && $v['id'] == $item['fqcat']) { ?>selected<?php  } ?> value="<?php  echo $v['id'];?>||<?php  echo $v['title'];?>"><?php  echo $v['title'];?></option>
						                        <?php  } } ?>
						                    </select> 
						                </div>        
						                <span class="help-block" style="color:#ff0000">选择商品分类，必需选择,其它类型不用选择 (注意:如果切换云商品库和自己采集的时候，这里分类 需要重新选择一下)</span>
						            </div>
						          </div>
						          <div class="form-group">
						                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">是否要登录显示</label>
						                    <div class="col-xs-12 col-sm-9">
						                        <label class="radio-inline"><input type="radio" name="xz" value="0" 
						                         <?php  if($item['xz']==0) { ?> checked="checked" <?php  } ?>>不需要登录</label>
						                        <label class="radio-inline"><input type="radio" name="xz" value="1"
						                         <?php  if($item['xz']==1) { ?> checked="checked" <?php  } ?>>登录显示</label>
						                          <span class="help-block"></span>
						                    </div>
						          </div>
						          <div class="form-group">
						            <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
						            <div class="col-sm-10">
						              <?php  echo tpl_form_field_image('pic',$item['pic'])?>
						              <span class="help-block">首页轮播广告750x300 <Br>图标菜单 100x100<Br> 首页通栏：750x210<Br> 首页二列：375x223<Br> 首页三列：250x375<br>首页四列：187x260</span>
						            </div>
						          </div> 
											<!-- <div class="form-group">
											  <label for="inputPassword3" class="col-sm-2 control-label">图片2</label>
											  <div class="col-sm-10">
											    <?php  echo tpl_form_field_image('pic1',$item['pic1'])?>
											    <span class="help-block">底部菜单按下图</span>
											  </div>
											</div> -->
											<div class="form-group">
												<label for="inputEmail3" class="col-sm-2 control-label">H5网页名称</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" name="h5title" value="<?php  echo $item['h5title'];?>"  placeholder="">
													<span class="help-block" style="color:#ff0000"></span>
												</div>
											</div> 
						          <div class="form-group">
						            <label for="inputEmail3" class="col-sm-2 control-label">H5网址</label>
						            <div class="col-sm-10">
						              <input type="text" class="form-control" name="url" value="<?php  echo $item['url'];?>"  placeholder="http://">
						              <span class="help-block" style="color:#ff0000">H5页面 http:// 开关</span>
						            </div>
						          </div> 
											
											<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">是否显示</label>
																<div class="col-xs-12 col-sm-9">
																		<label class="radio-inline"><input type="radio" name="showtype" value="1" 
																		<?php  if($item['showtype']==1) { ?> checked="checked" <?php  } ?>>不显示</label>
																		<label class="radio-inline"><input type="radio" name="showtype" value="0"
																		<?php  if($item['showtype']==0) { ?> checked="checked" <?php  } ?>>显示</label>
														
																			<span class="help-block"></span>
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
													<form action="<?php  echo $this->createWebUrl('appdh',array('op'=>'pljs'))?>" method="post" class="form-horizontal" id="form1">
                      <table class="table">
											<th width="60"><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></th>
						          <th>名称</th>
											<th width="60">排序</th>
						          <th>图片</th>
						          <th>显示位置</th>
						          <th>类型</th>
						          <th  style="text-align:right;">操作</th>
						
						      <?php  if(is_array($list)) { foreach($list as $index => $item) { ?>
						        <tr>
											<td><input type="checkbox" name="id[]" value="<?php  echo $item['id'];?>" class=""></td>
						          <td><?php  echo $item['title'];?><?php  if($item['showtype']==1) { ?><span style="color: #ff0000;"> (不显示)</span><?php  } ?></td>
											<td><?php  echo $item['px'];?></td>
											<td><img src="<?php  echo tomedia($item['pic'])?>" height='100'/></td>						          
						          <td><?php  if($item['fztype']==1) { ?>首页轮播图<?php  } else if($item['fztype']==2) { ?>首页图标<?php  } else if($item['fztype']==3) { ?>首页图标下4个图标<?php  } else if($item['fztype']==4) { ?>底部菜单<?php  } else if($item['fztype']==5) { ?>会员中心下方<?php  } else if($item['fztype']==6) { ?>会员下方轮播图<?php  } ?></td>
						          <td><?php  if($item['type']==1) { ?>H5页面<?php  } else if($item['type']==2) { ?>商品分类<?php  } else if($item['type']==3) { ?>活动<?php  } else if($item['type']==4) { ?>原生页面<?php  } ?></td>
						          <td style="text-align:right;">
						            <a href="<?php  echo $this->createWebUrl('appdh', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
						            <a href="<?php  echo $this->createWebUrl('appdh', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
						          </td>
						        </tr>
						        <?php  } } ?>
										<tr>
										 	 <td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
											 <td colspan="5" style="text-align: left !important;width:200px">
											 	<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
											    <input type="submit" class="btn btn-primary" name="submityc" value="批量隐藏" />			<input type="submit" class="btn btn-primary" name="submitxs" value="批量显示" />				    
											 </td>                                     		
										</tr>
						       </table>      
							 </form>
                        </div>
                        <?php  } ?>
<div style="height: 100px;width: 100%;"></div>
  
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
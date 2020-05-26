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
                          <li class="active">自定义菜单管理</li>
                        </ul>
                        <a href="<?php  echo $this->createWebUrl('cdtype', array('op' => 'post'));?>" class="btn btn-s-md btn-info tigerbtn"><i class="fa fa-plus"></i> 添加菜单</a>
						<a href="<?php  echo $this->createWebUrl('cdtype', array('op' => 'display'));?>" class="btn btn-s-md btn-success tigerbtn"><i class="fa fa-pencil-square-o "></i> 管理菜单</a>
						
						<style type="text/css">
							.tigerbtn{margin-right:10px;margin-bottom: 10px;}
						</style>
			            <!--编辑内容-->
                        <?php  if($operation == 'post') { ?>
                        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               编辑分类
                              </h3>
                           </div>
                           <div class="panel-body">
                           
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">菜单名称</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>"  placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="px" value="<?php  echo $item['px'];?>"  placeholder="请输入数字">
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">显示类型</label>
                                    <div class="col-xs-12 col-sm-9">
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="0" <?php  if($item['fftype'] == 0) { ?>checked<?php  } ?>> 个人中心菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="1" <?php  if($item['fftype'] == 1) { ?>checked<?php  } ?>>淘客底部菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="4" <?php  if($item['fftype'] == 4) { ?>checked<?php  } ?>>拼多多底部菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="2" <?php  if($item['fftype'] == 2) { ?>checked<?php  } ?>>合伙人中心菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="3" <?php  if($item['fftype'] == 3) { ?>checked<?php  } ?>>拼多多首页轮播图下面菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="5" <?php  if($item['fftype'] == 5) { ?>checked<?php  } ?>>京东底部菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="6" <?php  if($item['fftype'] == 6) { ?>checked<?php  } ?>>京东首页轮播图下面菜单
                                       </label>
                                       <label class="checkbox-inline">
                                          <input type="radio" name="fftype" id="fftype" value="7" <?php  if($item['fftype'] == 7) { ?>checked<?php  } ?>>淘宝首页轮播下面菜单
                                       </label>
																			 <label class="checkbox-inline">
																			 	<input type="radio" name="fftype" id="fftype" value="8" <?php  if($item['fftype'] == 8) { ?>checked<?php  } ?>>会员中心轮播图
																			 </label>
                                        <div class="help-block">如果选择底部菜单需要添加4个</div>
                                    </div>
                                   </div>
                                  
                                  
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">菜单图标</label>
                                    <div class="col-sm-9">
                                      <?php  echo tpl_form_field_image('picurl',$item['picurl'])?>    
                                      <div class="help-block">图标可以在这里搜索下载，png格式的  <a href="http://www.iconfont.cn/" target="_blank" style="color:blue">http://www.iconfont.cn/</a></div>
                                    </div>
                                  </div>

                                  <!--div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">菜单外链</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="wlurl" value="<?php  echo $item['wlurl'];?>"  placeholder="如：http:// 不是外链，可以不填">
                                   </div-->    

                                  </div>   
                                  <div class="form-group">
                                        <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">菜单外链</label>
                                        <div class="col-sm-8 col-xs-12">
                                            <input type="text" class="form-control" name="wlurl" value="<?php  echo $item['wlurl'];?>"  placeholder="请输入链接">
                                            <div class="help-block">http:// 开头</div>
                                        </div>
                                   </div>

                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-9">
                                       <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                                       <input type="submit" name="submit" class="btn btn-primary" value="提交"  class="btn btn-primary"/>
                                       <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                                    </div>
                                  </div>
                           </div>
                        </div>
                                 
                        </form>
                        <?php  } else if($operation == 'display') { ?>
                        <div class="panel panel-default">
                              <table class="table">
                                  <th >排序</th>
                                  <th>名称</th>
                                  <th>类型</th>
                                  <th>图标</th>
                                  <th  style="text-align:right;">操作</th>

                              <?php  if(is_array($list)) { foreach($list as $item) { ?>
                                <tr>
                                  <td><?php  echo $item['px'];?></td>                                  
                                  <td><?php  echo $item['title'];?></td>
                                  <td>
                                  <?php  if($item['fftype']==1) { ?>
                                  	<span class="btn btn-xs btn-primary">底部菜单</span>
                                  <?php  } else if($item['fftype']==2) { ?>
                                  <span class="btn btn-xs btn-primary" style="background-color: #ff9000;border-color: #ff9000;">新版合伙人菜单</span>
                                  <?php  } else if($item['fftype']==4) { ?>
                                  	<span class="btn btn-xs btn-info" style="background-color: #ff0000;border-color: #ff0000;">拼多多底部菜单</span>
                                  <?php  } else if($item['fftype']==5) { ?>
                                  	<span class="btn btn-xs btn-info">京东底部菜单</span>
                                  <?php  } else if($item['fftype']==6) { ?>
                                  	<span class="btn btn-xs btn-info">京东首页轮播图下面菜单</span>
                                  <?php  } else if($item['fftype']==7) { ?>
                                  	<span class="btn btn-xs btn-info" style="background-color: #fd7700;border-color: #fd7700;">淘客首页轮播图下面菜单</span>
                                  <?php  } else if($item['fftype']==3) { ?>
                                  	<span class="btn btn-xs btn-info">拼多多首页轮播图下面菜单</span>
                                  <?php  } else { ?>
                                  	<span class="btn btn-xs btn-info">个人中心菜单</span>
                                  <?php  } ?>
                                  </td>
                                  <td><img src="<?php  echo tomedia($item['picurl'])?>" width="50"></td>

                                  <td style="text-align:right;">
                                    <a href="<?php  echo $this->createWebUrl('cdtype', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
                                    <a href="<?php  echo $this->createWebUrl('cdtype', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
                                  </td>
                                </tr>
																<tr>
																	<td colspan="5">链接：<?php  echo $item['wlurl'];?></td>
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
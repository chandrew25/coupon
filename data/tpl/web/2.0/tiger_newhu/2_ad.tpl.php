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
                          <li><a href="/"><i class="fa fa-home"></i> 首页 </a></li>
                          <li class="active">广告管理</li>
                        </ul>
                        <a href="<?php  echo $this->createWebUrl('ad', array('op' => 'post'));?>" class="btn btn-s-md btn-info tigerbtn"><i class="fa fa-plus"></i> 添加广告</a>
						<a href="<?php  echo $this->createWebUrl('ad', array('op' => 'display'));?>" class="btn btn-s-md btn-success tigerbtn"><i class="fa fa-pencil-square-o "></i> 管理广告</a>
						
						<style type="text/css">
							.tigerbtn{margin-right:10px;margin-bottom: 10px;}
						</style>
                        <!--编辑内容-->
                        <?php  if($operation == 'post') { ?>

                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               编辑广告
                              </h3>
                           </div>
                           <div class="panel-body">
                                <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                                  <div class="form-group">
                                            <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">广告类型</label>
                                            <div class="col-xs-12 col-sm-9">
                                                <label class="radio-inline"><input type="radio" name="type" value="0" 
                                                 <?php  if($item['type']==0) { ?> checked="checked" <?php  } ?>>淘客首页轮播图</label>
                                                <label class="radio-inline"><input type="radio" name="type" value="1"
                                                 <?php  if($item['type']==1) { ?> checked="checked" <?php  } ?>>淘客首页中部</label>
                                                 <label class="radio-inline"><input type="radio" name="type" value="4"
                                                 <?php  if($item['type']==4) { ?> checked="checked" <?php  } ?>>淘客首页菜单下二张图</label>
                                                 <label class="radio-inline"><input type="radio" name="type" value="2"
                                                 <?php  if($item['type']==2) { ?> checked="checked" <?php  } ?>>拼多多首页轮播</label>
                                                 <label class="radio-inline"><input type="radio" name="type" value="3"
                                                 <?php  if($item['type']==3) { ?> checked="checked" <?php  } ?>>拼多多首页菜单下四张图</label>
                                                 
                                                 <label class="radio-inline"><input type="radio" name="type" value="5"
                                                 <?php  if($item['type']==5) { ?> checked="checked" <?php  } ?>>京东首页轮播</label>
                                                 <label class="radio-inline"><input type="radio" name="type" value="6"
                                                 <?php  if($item['type']==6) { ?> checked="checked" <?php  } ?>>京东首页菜单下四张图</label>                                                 
                                                  <span class="help-block">通栏宽 640    四图：320*237  淘客首页菜单下二张图:299*188</span>
                                            </div>
                                  </div>
                                  <div class="form-group">
                                            <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">自动带PID</label>
                                            <div class="col-xs-12 col-sm-9">
                                                <label class="radio-inline"><input type="radio" name="pidtype" value="0" 
                                                 <?php  if($item['pidtype']==0) { ?> checked="checked" <?php  } ?>>不带PID</label>
                                                <label class="radio-inline"><input type="radio" name="pidtype" value="1"
                                                 <?php  if($item['pidtype']==1) { ?> checked="checked" <?php  } ?>>自动加上PID</label>
                                                  <span class="help-block"></span>
                                            </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">名称</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>"  placeholder="名称">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                                    <div class="col-sm-10">
                                      <?php  echo tpl_form_field_image('pic',$item['pic'])?>
                                    </div>
                                  </div> 
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">网址</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="url" value="<?php  echo $item['url'];?>"  placeholder="http://">
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
                                  <th>名称</th>
                                  <th>图片</th>
                                  <th>网址</th>
                                  <th  style="text-align:right;">操作</th>

                              <?php  if(is_array($list)) { foreach($list as $item) { ?>
                                <tr>
                                  <td><?php  echo $item['title'];?></td>
                                  <td><img src="<?php  echo tomedia($item['pic'])?>" height='100'/></td>
                                  <td><?php  echo $item['url'];?></td>
                                  <td style="text-align:right;">
                                    <a href="<?php  echo $this->createWebUrl('ad', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
                                    <a href="<?php  echo $this->createWebUrl('ad', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
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
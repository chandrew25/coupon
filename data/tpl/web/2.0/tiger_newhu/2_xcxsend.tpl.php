<?php defined('IN_IA') or exit('Access Denied');?>
		<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_head', TEMPLATE_INCLUDEPATH)) : (include template('public_head', TEMPLATE_INCLUDEPATH));?>
		<!--中间内容开始-->
		<section>
		    <section class="hbox stretch">
		    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_left', TEMPLATE_INCLUDEPATH)) : (include template('public_left', TEMPLATE_INCLUDEPATH));?>
		    <!--右边框架-->
			  <section id="content">
			    <section class="vbox">
			        <section class="scrollable padder"  style="padding-bottom:50px;">
                        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                          <li><a href="/"><i class="fa fa-home"></i> 首页  </a></li>
                          <li class="active">小程序客服消息</li>
                        </ul>

                        <ul class="nav nav-tabs">
                            <li <?php  if($_GPC['op']=='post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('xcxsend', array('op' => 'post'));?>">添加</a></li>
                            <li <?php  if($_GPC['op']=='display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('xcxsend', array('op' => 'display'));?>">管理</a></li>
                        </ul>
			            <!--编辑内容-->
                        <?php  if($operation == 'post') { ?>
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               添加/编辑客服消息
                              </h3>
                           </div>
                           <div class="panel-body">
                                <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">

                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">关键词</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="text" name="kfkey" value="<?php  echo $item['kfkey'];?>" class="form-control" placeholder="" >
                                            <span class="help-block"></span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
									<label class="col-xs-12 col-sm-3 col-md-2 control-label">类型</label>
									<div class="col-sm-9">
										<label class="radio-inline">
											<input type="radio" name="type" value="1" <?php  if($item['type'] == '1') { ?>checked="true"<?php  } ?>> 文本
										</label>
										<label class="radio-inline">
											<input type="radio" name="type" value="2" <?php  if($item['type'] == '2') { ?>checked="true"<?php  } ?>>图文
										</label>
										<span class="help-block"></span>
									</div>
								</div>

                                  <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">回复标题</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="text" name="title" value="<?php  echo $item['title'];?>" class="form-control" placeholder="" >
                                            <span class="help-block">文本类型可以不用写</span>
                                        </div>
                                   </div>
                                   
                                   <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">回复介绍</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <!--<input type="text" name="content" value="<?php  echo $item['content'];?>" class="form-control" placeholder="" >-->
                                            <textarea style="height:150px;" name="content" class="form-control" cols="60"><?php  echo $item['content'];?></textarea>
                                            <span class="help-block">图文类型 和文本</span>
                                        </div>
                                   </div>
                                   
                                   <div class="form-group">
						            <label for="inputPassword3" class="col-sm-2 control-label">图标</label>
						            <div class="col-sm-10">
						              <?php  echo tpl_form_field_image('picurl',$item['picurl'])?>
						              <span class="help-block">文本类型可以不用上传</span>
						            </div>
						          </div>
   


                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">消息链接</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <input type="text" name="url" value="<?php  echo $item['url'];?>" class="form-control" placeholder="http://" >
                                            <span class="help-block">文本类型可以不用写</span>
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
function onAdd1(obj){
	$(obj).parent().parent().before('<div class="type-items">'+$('#mbid1').html()+'</div>');
}

</script>

<?php  } else if($operation == 'display') { ?>
<div class="panel panel-default">
      <table class="table">
          <th>关键词</th>
          <th>类型</th>
          <th  style="text-align:right;">操作</th>

      <?php  if(is_array($list)) { foreach($list as $item) { ?>
        <tr>
          <td><?php  echo $item['kfkey'];?></td>
          <td><?php  if($item['type']==1) { ?>文本<?php  } else { ?>图文<?php  } ?></td>
          <td style="text-align:right;">
            <a href="<?php  echo $this->createWebUrl('xcxsend', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
            <a href="<?php  echo $this->createWebUrl('xcxsend', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
          </td>
        </tr>
        <?php  } } ?>
       </table>
 
</div>
<?php  } ?>

<script>
require(['jquery', 'util'], function($, u){
	$(function(){ $('.richtext-clone').each( function() { u.editor(this); });		});
  $('.btn').hover(function(){$(this).tooltip('show');},function(){$(this).tooltip('hide');});
  $('.full').hover(function(){$(this).tooltip('show');},function(){$(this).tooltip('hide');});
});
</script>

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
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
                        


                        <div class="panel panel-info">
                        <div class="panel-heading">搜索</div>
                        <div class="panel-body">
    <form action="<?php  echo $this->createWebUrl('lxorder',array('op'=>'seach'))?>" method="get" class="form-horizontal">
                                <input type="hidden" name="c" value="site">
                                <input type="hidden" name="a" value="entry">
                                <input type="hidden" name="m" value="tiger_newhu">
                                <input type="hidden" name="op" value="seach">
                                <input type="hidden" name="do" value="lxorder">
                                <div class="form-group">
                                   <label class="col-xs-12 col-sm-3 col-md-2 control-label" >订单号/推广位ID：</label>
                                    <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                        <input type="text" name="order" value="<?php  echo $order;?>" class="form-control" style="display: inline-block;">
                                    </div>
                                 </div>
                                   <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">新人状态</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="0" <?php  if($zt=='') { ?>checked="checked"<?php  } ?>> 全部
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="1" <?php  if($zt==1) { ?>checked="checked"<?php  } ?>> 已激活
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="zt" value="2" <?php  if($zt==2) { ?>checked="checked"<?php  } ?>> 已首购
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="color:#ff0000">
                                       <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="width: 200px;"></label>
                                       <div class="col-sm-2 col-lg-3">
                                            数量：<?php  echo $total;?>
                                       </div>
                                    </div>
                                   <button class="btn btn-default">搜索</button>
                                </div>
                                
                            </form>
                        </div>

                        <div class="panel panel-default">

                            <div class="panel-body">

                                <table class="table table-hover">

                                    <thead class="navbar-inner">

                                        <tr>
                                            <th style="width:150px;">注册时间</th>                                            
                                            <th>激活时间</th>
                                            <th >首购时间</th>	
                                            <th >收货时间</th>
                                            <th>新人手机号</th>
                                            <th>新人状态</th>
                                            <th>订单类型</th>
                                            <th>推广位ID</th>
                                            <th>推广位名称</th>
                                            <th>订单编号</th>
                                            <th>更新时间</th>
                                        </tr>

                                    </thead>

                                    <tbody id="table_content" >

                                        <?php  if(is_array($list1)) { foreach($list1 as $l) { ?>
                                        <tr  >
                                            <td><?php  echo $l['addtime'];?></td>
                                            <td><?php  echo $l['jhtime'];?></td>
                                            <td><?php  echo $l['sgtime'];?></td>
                                            <td><?php  echo $l['qrshtime'];?></td>
                                            <td><?php  echo $l['newtel'];?></td>
                                            <td><?php  if($l['xrzt']=="已首购") { ?><a href="#" class="btn btn-sm btn-success"><?php  echo $l['xrzt'];?></a><?php  } else { ?><a href="#" class="btn btn-sm btn-danger"><?php  echo $l['xrzt'];?></a><?php  } ?></td>
                                            <td><?php  echo $l['ddlx'];?></td>
                                            <td><?php  echo $l['tgwid'];?></td>
                                            <td><?php  echo $l['tgwname'];?></td>
                                            <td><?php  echo $l['orderid'];?></td>
                                            <td><?php  echo $l['createtime'];?></td>
                                        </tr>
                                        <?php  } } ?>

                                    </tbody>

                                </table>

                                <?php  echo $pager;?>

                            </div>

                        </div>
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
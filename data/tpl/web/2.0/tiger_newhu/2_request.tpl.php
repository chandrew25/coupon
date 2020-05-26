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
                          <li><a href="<?php  echo $this->createWebUrl('index')?>"><i class="fa fa-home"></i> 首页  </a></li>
                          <li class="active">兑换记录</li>
                        </ul>
			            <!--编辑内容-->
                        <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="<?php  echo $this->createWebUrl('request')?>" method="post" class="form-horizontal">
                <div class="form-group">
                   <label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label" style="width: 200px;">姓名或手机</label>
                    <div class="col-sm-2 col-lg-3">
	                    <input type="text" name="name" value="<?php  echo $name;?>" class="form-control" style="display: inline-block;">
                    </div>
                   <button class="btn btn-default">搜索</button>
                </div>
            </form>
        </div>
</div>
<div class="panel panel-default">

	<div class="panel-body" style="text-align: center;">

        <table class="table table-hover">

            <thead class="navbar-inner">

                <tr>
                    <th style="width:80px;">编号</th>		
                    <th style="width:120px;">奖品名称</th>
                    <th style="width:100px;">消耗积分</th>
                    <th>收件人信息</th>
                     <th style="width:220px;">订单号</th>	
                    <th style="width:220px;">时间</th>	
                    <!--th style="width:100px;">截图</th-->	
                    
                    <th>操作</th>

                </tr>

            </thead>

            <tbody id="table_content" style="text-align:left">

                <?php  if(is_array($list)) { foreach($list as $item) { ?>

                <tr>

                    <td><?php  echo $item['id'];?></td>
                    <td><?php  echo $item['title'];?></td>
                    <td><?php  echo $item['cost'];?></td>
                    <td><?php  echo $item['from_user_realname'];?><br><?php  echo $item['realname'];?><Br>电话：<?php  echo $item['mobile'];?><br>地址：<?php  echo $item['residedist'];?><br><?php  echo $item['alipay'];?></td>
                    <td><?php  echo $item['tborder'];?><br><?php  echo $item['fxprice'];?></td>
                    <td><?php  echo date('Y-m-d H:i:s', $item['createtime'])?></td>
                    <!--td>
                    <?php  if($item['image']<>'0' ) { ?>
                    <a href="<?php  echo $_W['siteroot'];?>attachment/<?php  echo $item['image'];?>" target="_blank"><img src="<?php  echo $_W['siteroot'];?>attachment/<?php  echo $item['image'];?>" width='50' height='50'/></a></td>
                    <?php  } ?>-->
                    <td>
                       <?php  if($item['status']=='done' ) { ?>
                       <a href="###" class="btn btn-success btn-sm">已审核</a>
                       <?php  } else { ?>
                       <a href="<?php  echo $this->createWebUrl('Request', array('id' => $item['id'], 'op' => 'do_goods'))?>" onclick="return confirm('确认为 <?php  echo $item['realname'];?> 兑换奖品？');return false;" class="btn btn-danger btn-sm">未审核</a>
                       <?php  } ?>
                       
						
                    	<a href="<?php  echo $this->createWebUrl('Request', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('删除后将不可恢复，确定删除吗？')" class="btn btn-warning btn-sm">删除</a>
						
                    </td>

                </tr>
                <?php  } } ?>

            </tbody>
        
        </table>
  
     <?php  echo $pager;?>

    </div>

</div>
                        
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
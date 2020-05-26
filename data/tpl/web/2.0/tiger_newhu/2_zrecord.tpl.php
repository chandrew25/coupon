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
                          <li class="active"><a href="<?php  echo $this->createWebUrl('share')?>">返回会员管理</a></li>
                        </ul>
			            <!--编辑内容-->
                        <ul class="nav nav-tabs">
                            <li <?php  if($type==0) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('zrecord',array('type'=>0))?>">积分记录</a></li>
                            <li <?php  if($type==1) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('zrecord',array('type'=>1))?>">余额记录</a></li>
                            
                        </ul>
                    
<style>
th{
	text-align: left !important;
}
.table-responsive .label { display:inline-block;margin:0;margin-bottom:2px;}
td{
	text-align: left !important;
	/*white-space: normal !important;
	word-break: break-all !important;*/
}
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
   white-space: inherit;
    overflow: visible;
    text-overflow: ellipsis;
}
.panel .table td, .panel .table th {
    padding: 10px 15px;
    border-top: 1px solid #f1f1f1;
}
</style>

                <div class="panel panel-default">

                    <div class="panel-body" style="text-align: center;">

                        <table class="table table-hover">

                            <thead class="navbar-inner">
                                <tr>
                                    <th width="60">uid</th>	
                                    <th >类型</th>
                                    <th>积分/余额增减</th>		
                                    <th >操作时间</th>
                                    <th >备注</th>                                    
                                </tr>
                            </thead>

                            <tbody id="table_content">

              <?php  if(is_array($list)) { foreach($list as $l) { ?>

                    <tr rel="pop" title="">
                    <td> <?php  echo $l['uid'];?></td>
                    <td><?php  if($l['type']==1) { ?>余额<?php  } else { ?>积分<?php  } ?></td>
                    <td><?php  echo $l['num'];?></td>
                    <td><?php  echo date('Y-m-d H:i:s',$l['createtime'])?></td>
                    <td><?php  echo $l['remark'];?></td>
                  
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

<script language="javascript">
		require(['bootstrap'],function(){
        $("[rel=pop]").popover({
            trigger:'manual',
            placement : 'top', 
            title : $(this).data('title'),
            html: 'true', 
            content : $(this).data('content'),
            animation: false
        }).on("mouseenter", function () {
                    var _this = this;
                    $(this).popover("show"); 
                    $(this).siblings(".popover").on("mouseleave", function () {
                        $(_this).popover('hide');
                    });
                }).on("mouseleave", function () {
                    var _this = this;
                    setTimeout(function () {
                        if (!$(".popover:hover").length) {
                            $(_this).popover("hide")
                        }
                    }, 100);
                });
	   });
				   
</script>
</body>
</html>
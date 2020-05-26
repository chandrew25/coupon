<?php defined('IN_IA') or exit('Access Denied');?>
		<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_head', TEMPLATE_INCLUDEPATH)) : (include template('public_head', TEMPLATE_INCLUDEPATH));?>
		<!--中间内容开始-->
		<section>
		    <section class="hbox stretch">
		    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_left', TEMPLATE_INCLUDEPATH)) : (include template('public_left', TEMPLATE_INCLUDEPATH));?>
		    <!--右边框架-->
			  <section id="content">
			    <section class="vbox">
			        <section class="scrollable padder" style="padding-bottom:70px;">
                        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                          <li><a href="<?php  echo $this->createWebUrl('index')?>"><i class="fa fa-home"></i> 首页  </a></li>
                          <li class="active">淘礼金生成</li>
                        </ul>
			          
                        <!--搜索开始-->
                        <div class="panel panel-info">
                            <div class="panel-heading">注：生成之前需要先在基础设置--》淘礼金设置，设置一下参数</div>
                            <div class="panel-body">
                                <form action="<?php  echo $this->createWebUrl('tljsc',array('op'=>'seach'))?>" method="get" class="form-horizontal">
                                <input type="hidden" name="c" value="site">
                                <input type="hidden" name="a" value="entry">
                                <input type="hidden" name="m" value="tiger_newhu">
                                <input type="hidden" name="op" value="seach">
                                <input type="hidden" name="do" value="tljsc">
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">淘宝商品ID</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" class="form-control" name="itemid" value="<?php  echo $itemid;?>">
                                        </div>
                                    </div>
																		<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">淘礼金名称</label>
																				<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
																						<input type="text" class="form-control" name="name1" value="<?php  echo $name1;?>">
																						<span class="help-block">5-10个字符（小于5个字符，生成不了口令）</span>
																				</div>
																		</div>
																		<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">淘礼金面额(元)</label>
																				<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
																						<input type="text" class="form-control" name="per_face" value="<?php  echo $per_face;?>">
																						<span class="help-block">最低1元，整数</span>
																				</div>
																		</div>
																		<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">淘礼金总个数</label>
																				<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
																						<input type="text" class="form-control" name="total_num" value="<?php  echo $total_num;?>">
																						<span class="help-block">总数</span>
																				</div>
																		</div>
																		<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">单用户累计中奖次数上限</label>
																				<div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
																						<input type="text" class="form-control" name="user_total_win_num_limit" value="<?php  echo $user_total_win_num_limit;?>">
																						<span class="help-block">单个用户最多能领取次数</span>
																				</div>
																		</div>
																		
                                    <div class="form-group">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button class="btn btn-default"><i class="fa fa-search"></i>生成</button>
                                        </div>
                                    </div>
                                </form>
                               </div>
                               <div style="width:300px;padding:10px;">
                               <?php  if($err) { ?>
                                 错误：<?php  echo $err;?>
                               <?php  } else { ?>
                                   <?php  echo $msg;?>
                               <?php  } ?>
                               </div>
                          </div>
                        <!--搜索结束-->


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
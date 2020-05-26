<?php defined('IN_IA') or exit('Access Denied');?>
		<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_head', TEMPLATE_INCLUDEPATH)) : (include template('public_head', TEMPLATE_INCLUDEPATH));?>
		<!--中间内容开始-->
		<section>
		    <section class="hbox stretch">
		    <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('public_left', TEMPLATE_INCLUDEPATH)) : (include template('public_left', TEMPLATE_INCLUDEPATH));?>
		    <!--右边框架-->
			  <section id="content">
			    <section class="vbox">
			       <section class="scrollable padder">
                        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                          <li><a href="<?php  echo $this->createWebUrl('index')?>"><i class="fa fa-home"></i> 首页  </a></li>
                          <li class="active">基本设置</li>
                        </ul>
			            <!--编辑内容-->
                        <div class="main">
                            <form action="" method="post" class="form-horizontal form" id="setting-form">
                            <input type="hidden" name="id" value="<?php  echo $set['id'];?>">
                                <div class="panel panel-default">
                                    <div class="panel-heading">参数设置</div>
                                    <div class="panel-body">
                                        <ul class="nav nav-tabs" id="myTab">
                                            <li class="active" ><a href="#tab_basic">授权设置</a></li>
                                            <!--<li><a href="#tab_share">其它设置</a></li>-->
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane  active" id="tab_basic">
                                            	
                                            	
                                                <!--提现设置-->
                                                <div class="panel-body">
													<div class="form-group">
													      <label class="col-xs-12 col-sm-3 col-md-2 control-label">京东AppKey</label>
													      <div class="col-xs-12 col-sm-9">
													          <input type="text" name="appkey" value="<?php  echo $set['appkey'];?>" class="form-control" placeholder="京东联盟key" >
													          <span class="help-block">登录京东联盟后台左边--推广管理--社交媒体管理--创建社交媒体-创建成功后获取KEY</span>
													      </div>
													 </div> 
													 <div class="form-group">
													      <label class="col-xs-12 col-sm-3 col-md-2 control-label">京东AppSecret</label>
													      <div class="col-xs-12 col-sm-9">
													          <input type="text" name="appsecret" value="<?php  echo $set['appsecret'];?>" class="form-control" placeholder="京东联盟appsecret" >
													          <span class="help-block">登录京东联盟后台左边--推广管理--社交媒体管理--创建社交媒体-创建成功后获取KEY</span>
													      </div>
													 </div>
            
	                                                  <!-- <div class="form-group">
	                                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">京东ID</label>
	                                                                <div class="col-xs-12 col-sm-9">
	                                                                    <input type="text" name="jduid" value="<?php  echo $jdsign['uid'];?>" class="form-control" placeholder="京东ID" >
	                                                                    <span class="help-block">上面授权成功了，这里就会显示，不要自己填写</span>
	                                                                </div>
	                                                   </div> -->
	                                                   <div class="form-group">
	                                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认推广位</label>
	                                                                <div class="col-xs-12 col-sm-9">
	                                                                    <input type="text" name="jdpid" value="<?php  echo $set['jdpid'];?>" class="form-control" placeholder="推广位" >
	                                                                    <span class="help-block">京东联盟后台--CPS联盟-》推广管理-》推广位管理-》聊天工具推广(推广位id)（注：先在我要推广里面，选择一下商品推广，创建一个推广位）</span>
	                                                                </div>
	                                                   </div>     
	                                                   <div class="form-group">
	                                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">京东联盟ID</label>
	                                                                <div class="col-xs-12 col-sm-9">
	                                                                    <input type="text" name="unionid" value="<?php  echo $set['unionid'];?>" class="form-control" placeholder="京东联盟ID" >
	                                                                    <span class="help-block">京东联盟后台--帐户管理-》联盟ID</span>
	                                                                </div>
	                                                   </div>  
	                                                   <div class="form-group">
	                                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">京东联盟授权KEY</label>
	                                                                <div class="col-xs-12 col-sm-9">
	                                                                    <input type="text" name="jdkey" value="<?php  echo $set['jdkey'];?>" class="form-control" placeholder="京东联盟授权KEY" >
	                                                                    <span class="help-block">京东联盟后台--推广管理-》API权限管理（这里的授权时间只有1个月时间，过期了，需要重新生成更新，不然会影响订单同步更新）</span>
	                                                                </div>
	                                                   </div>  
	                                                <div class="form-group col-sm-12">
	                                                    <input type="submit" name="submit" value="保存二" class="btn btn-primary col-lg-1" />
	                                                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	                                                </div>
                                         		</div>
                                                
                                                
                                                
                                                
                                                
                                                <div style="clear: both;"></div>
                                            </div>   
                                                  
                                                <!---->
                                            </div>
              

                                            <div class="tab-pane" id="tab_share">
                                                <!--积分商城设置-->
                                                <!---->
                                                <!--<div class="form-group col-sm-12">
				                                    <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
				                                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				                                </div>-->
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                        <script>
                        require(['jquery', 'util'], function($, u){
                            $(function(){
                                u.editor($('.richtext')[0]);
                            });
                        });
                        $(function () {
                                window.optionchanged = false;
                                $('#myTab a').click(function (e) {
                                    e.preventDefault();//阻止a链接的跳转行为
                                    $(this).tab('show');//显示当前选中的链接及关联的content
                                })
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
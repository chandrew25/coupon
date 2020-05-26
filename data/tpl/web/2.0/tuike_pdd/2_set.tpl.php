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
		                                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">多多进宝帐号</label>
		                                                                <div class="col-xs-12 col-sm-9">
		                                                                    <input type="text" name="ddjbbuid" value="<?php  echo $set['ddjbbuid'];?>" class="form-control" placeholder="多多进宝登录帐号" >
		                                                                    <span class="help-block">多多进宝登录帐号，一般是手机号</span>
		                                                                </div>
		                                                   </div> 
		                                                   <div class="form-group">
		                                                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">默认推广位PID</label>
		                                                                <div class="col-xs-12 col-sm-9">
		                                                                    <input type="text" name="pddpid" value="<?php  echo $set['pddpid'];?>" class="form-control" placeholder="推广位" >
		                                                                    <span class="help-block"></span>
		                                                                </div>
		                                                   </div>                                                    
		                                                <div class="form-group col-sm-12">
		                                                    <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
		                                                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		                                                </div>
                                             		</div>
                                                
                                                
                                                
                                                <div style="clear: both;"></div>
                                                <div style="margin:0 auto;width:90%;box-shadow:  0 2px 5px #999;padding:60px;margin-bottom: 30px;">
	                                                   <div class="form-group">
	                                                          <div class="col-xs-12 col-sm-12">
	                                                            <?php  if($pddsign['access_token']<>'') { ?>
	                                                            <a href="http://jinbao.pinduoduo.com/open.html?client_id=5cc019bb630a4210b15bfd0c26c70b44&response_type=code&redirect_uri=http://ku.tigertaoke.com/addons/tiger_zhaoshang/pddsign.php&state=<?php  echo urlencode($_W['siteroot'].'|'.$_W['uniacid'].'|'.$set['appkey'].'|'.$set['appsecret'])?>" class="btn btn-success" style="width:100%">登录成功，点击重新登录</a>
	                                                            <?php  } else { ?>
	                                                            <a href="http://jinbao.pinduoduo.com/open.html?client_id=5cc019bb630a4210b15bfd0c26c70b44&response_type=code&redirect_uri=http://ku.tigertaoke.com/addons/tiger_zhaoshang/pddsign.php&state=<?php  echo urlencode($_W['siteroot'].'|'.$_W['uniacid'].'|'.$set['appkey'].'|'.$set['appsecret'])?>" class="btn btn-danger" style="width:100%">登录授权</a>
	                                                            <?php  } ?>  
	                                                            <span class="help-block">上面多多进宝帐号提交保存成功了，在点登录授权</span> 
	                                                            <!--<span class="help-block" style="color:#ff0000"><?php  if($pddsign['access_token']) { ?>授权到期时间：<?php  echo date('Y-m-d H:i:s',$pddsign['createtime']+60*60*23)?><?php  } ?></span>-->
	                                                           </div>
	                                                           
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
<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<link href="<?php  echo $_W['siteroot'];?>/addons/tiger_yuanbao/static/css/bootstrap.file-input.css" rel="stylesheet">
<script type="text/javascript" src="<?php  echo $_W['siteroot'];?>addons/tiger_yuanbao/static/js/bootstrap.file-input.js"></script>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
   <div class="main">
        <form action="" method="post" class="form-horizontal form" id="setting-form">
        <input type="hidden" name="id" value="<?php  echo $set['id'];?>">
            <div class="panel panel-default">
                <div class="panel-heading">参数设置</div>
                <div class="panel-body">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active" ><a href="#tab_basic">代理设置</a></li>
                    <li><a href="#tab_share">加群助手设置</a></li>
                    <li><a href="#tab_share1">代理支付设置</a></li>
                    <li><a href="#tab_share2">提醒设置</a></li>

                </ul>
                <div class="tab-content">
                   <!--代理设置-->
                    <div class="tab-pane  active" id="tab_basic">
                         <div class="panel-body">
							 
							 <div class="form-group">
							         <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理申请</label>
							         <div class="col-xs-12 col-sm-9">
							             <label class="radio-inline"><input type="radio" name="zdshtype" value="0" 
							              <?php  if($settings['zdshtype']==0) { ?> checked="checked" <?php  } ?>>不开启</label>
							             <label class="radio-inline"><input type="radio" name="zdshtype" value="1"
							              <?php  if($settings['zdshtype']==1) { ?> checked="checked" <?php  } ?>>开启</label>
							 			
							               <span class="help-block">代理申请自动审核功能</span>
							         </div>
							 </div>
							 <div class="form-group">
							         <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理申请条件</label>
							         <div class="col-xs-12 col-sm-9">
							             <label class="radio-inline"><input type="radio" name="dlsqtype" value="0" 
							              <?php  if($settings['dlsqtype']==0) { ?> checked="checked" <?php  } ?>>不开启</label>
							             <label class="radio-inline"><input type="radio" name="dlsqtype" value="1"
							              <?php  if($settings['dlsqtype']==1) { ?> checked="checked" <?php  } ?>>开启</label>							 			
							               <span class="help-block"></span>
							         </div>
							 </div>
								<div class="form-group">
									<label class="col-sm-2 control-label">代理升级条件1</label>
									<div class="col-sm-5 col-xs-5">
										<div class="input-group">		
											<span class="input-group-addon">直属粉丝满</span>
											<input type="text" name="fsnum" class="form-control" value="<?php  echo $settings['fsnum'];?>">
											<span class="input-group-addon">个</span>
										</div>
										<span class="help-block">如果达到上面的要求，才能申请（填0不限制）</span>
									</div>
								</div>
								<!-- <div class="form-group">
									<label class="col-sm-2 control-label">代理升级条件2</label>
									<div class="col-sm-5 col-xs-5">
										<div class="input-group">		
											<span class="input-group-addon">直属代理满</span>
											<input type="text" name="dlnum" class="form-control" value="<?php  echo $settings['dlnum'];?>">
											<span class="input-group-addon">个</span>
										</div>
										<span class="help-block">如果达到上面的要求，才能申请（填0不限制）</span>
									</div>
								</div> -->
                         	
                         		<div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">渠道开关</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="qdtype" value="0" 
                                             <?php  if($settings['qdtype']==0) { ?> checked="checked" <?php  } ?>>不开启</label>
                                            <label class="radio-inline"><input type="radio" name="qdtype" value="1"
                                             <?php  if($settings['qdtype']==1) { ?> checked="checked" <?php  } ?>>开启</label>
											
                                              <span class="help-block">开启渠道授权，需要有渠道权限才能使用</span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">渠道专用PID</label>
                                    <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                        <input type="text" value="<?php  echo $settings['qdpid'];?>" name="qdpid" class="form-control" />
                                        <span class="help-block">上面渠道开启，这里填上渠道PID</span>
                                    </div>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">渠道邀请链接</label>
                                    <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                        <input type="text" value="<?php  echo $settings['qdtgurl'];?>" name="qdtgurl" class="form-control" />
                                    </div>
                                </div>
                         	
                         	  <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理中心</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="newdltype" value="0" 
                                             <?php  if($settings['newdltype']==0) { ?> checked="checked" <?php  } ?>>旧版</label>
                                            <label class="radio-inline"><input type="radio" name="newdltype" value="1"
                                             <?php  if($settings['newdltype']==1) { ?> checked="checked" <?php  } ?>>新版</label>
																						 <label class="radio-inline"><input type="radio" name="newdltype" value="2"
																						 <?php  if($settings['newdltype']==2) { ?> checked="checked" <?php  } ?>>新版（三合一）</label>
                                              <span class="help-block">使用三合一代理界面，需要和软件配合使用，使用软件定时更新数据</span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">订单隐私</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="orderys" value="0" 
                                             <?php  if($settings['orderys']==0) { ?> checked="checked" <?php  } ?>>不开启</label>
                                            <label class="radio-inline"><input type="radio" name="orderys" value="1"
                                             <?php  if($settings['orderys']==1) { ?> checked="checked" <?php  } ?>>开启</label>
											
                                              <span class="help-block">开启，在代理中心代理列表的订单图片和标题都不会显示</span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">新版代理显示下级佣金</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="newdlxjtype" value="0" 
                                             <?php  if($settings['newdlxjtype']==0) { ?> checked="checked" <?php  } ?>>不显示</label>
                                            <label class="radio-inline"><input type="radio" name="newdlxjtype" value="1"
                                             <?php  if($settings['newdlxjtype']==1) { ?> checked="checked" <?php  } ?>>显示</label>
                                              <span class="help-block">如果显示，在收益界面会显示，下级佣金</span>
                                        </div>
                                </div>
                         	
                         	  <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">手机登录</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="logintype" value="0" 
                                             <?php  if($settings['logintype']==0) { ?> checked="checked" <?php  } ?>>不启用</label>
                                            <label class="radio-inline"><input type="radio" name="logintype" value="1"
                                             <?php  if($settings['logintype']==1) { ?> checked="checked" <?php  } ?>>启用</label>
                                              <span class="help-block">开启就是手机绑定在登录</span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">拼多多代理订单</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="pdddlxs" value="0" 
                                             <?php  if($settings['pdddlxs']==0) { ?> checked="checked" <?php  } ?>>不显示</label>
                                            <label class="radio-inline"><input type="radio" name="pdddlxs" value="1"
                                             <?php  if($settings['pdddlxs']==1) { ?> checked="checked" <?php  } ?>>显示</label>
                                              <span class="help-block">显示会在代理中心显示拼多多代理订单</span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">京东代理订单</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="jddlxs" value="0" 
                                             <?php  if($settings['jddlxs']==0) { ?> checked="checked" <?php  } ?>>不显示</label>
                                            <label class="radio-inline"><input type="radio" name="jddlxs" value="1"
                                             <?php  if($settings['jddlxs']==1) { ?> checked="checked" <?php  } ?>>显示</label>
                                              <span class="help-block">显示会在代理中心显示京东代理订单</span>
                                        </div>
                                </div>
                                
                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">拉新订单显示</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="lxddtype" value="0" 
                                             <?php  if($settings['lxddtype']==0) { ?> checked="checked" <?php  } ?>>不显示</label>
                                            <label class="radio-inline"><input type="radio" name="lxddtype" value="1"
                                             <?php  if($settings['lxddtype']==1) { ?> checked="checked" <?php  } ?>>显示</label>
                                              <span class="help-block">开启后代理中心会有拉新订单显示</span>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">拉新一个奖励</label>
                                    <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                        <input type="text" value="<?php  echo $settings['lxjlrmb'];?>" name="lxjlrmb" class="form-control" />
                                        <span class="help-block">代理拉新一个奖励 几元 </span>
                                    </div>
                                </div>
                         	
                         	    <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自定义域名</label>
                                    <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                        <input type="text" value="<?php  echo $settings['tknewurl'];?>" name="tknewurl" class="form-control" />
                                        <span class="help-block">这里的域名解析绑定到站点，填写如:https://www.abc.com/  主要用于有些用户做了HTTPS没有修改安全域名CSS打开不正常的情况 </span>
                                    </div>
                                </div>
                         	
                         	   <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">自有短网址</label>
                                    <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                        <input type="text" value="<?php  echo $settings['zydwz'];?>" name="zydwz" class="form-control" />
                                        <span class="help-block">这里的域名解析绑定到站点，填写如:http://www.abc.com/  生成后台短网址为 http://www.abc.com/t.php?d=2 【下面选择自有短网址】</span>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">t.cn新浪KEY</label>
                                    <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                        <input type="text" value="<?php  echo $settings['sinkey'];?>" name="sinkey" class="form-control" />
                                        <span class="help-block">新浪t.cn 短域名 申请地址：http://open.weibo.com/  网站接口</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">短链接</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="dwzlj" value="0" 
                                             <?php  if($settings['dwzlj']==0) { ?> checked="checked" <?php  } ?>>新浪t.cn</label>
                                            <label class="radio-inline"><input type="radio" name="dwzlj" value="1"
                                             <?php  if($settings['dwzlj']==1) { ?> checked="checked" <?php  } ?>>微信</label>
                                             <label class="radio-inline"><input type="radio" name="dwzlj" value="2"
                                             <?php  if($settings['dwzlj']==2) { ?> checked="checked" <?php  } ?>>自有短网址（推荐）</label>
                                            
                                              <span class="help-block"></span>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">详情页口令文案是否用短链接</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="xqdwzxs" value="0" 
                                             <?php  if($settings['xqdwzxs']==0) { ?> checked="checked" <?php  } ?>>不使用</label>
                                            <label class="radio-inline"><input type="radio" name="xqdwzxs" value="1"
                                             <?php  if($settings['xqdwzxs']==1) { ?> checked="checked" <?php  } ?>>使用</label>
                                              <span class="help-block">如果开启使用，每一次打开详情页面都会自动生成一个短链接，占资源，如果开启打开详情页面缓慢，就直接关闭</span>
                                        </div>
                                </div>
                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理中心底部菜单</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="dbcdtype" value="0" 
                                             <?php  if($settings['dbcdtype']==0) { ?> checked="checked" <?php  } ?>>不显示</label>
                                            <label class="radio-inline"><input type="radio" name="dbcdtype" value="1"
                                             <?php  if($settings['dbcdtype']==1) { ?> checked="checked" <?php  } ?>>显示</label>
                                              <span class="help-block"></span>
                                        </div>
                                </div>
                         	
                         	  <!--<div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">淘口令类型</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="tklnewtype" value="0" 
                                             <?php  if($settings['tklnewtype']==0) { ?> checked="checked" <?php  } ?>>新版</label>
                                            <label class="radio-inline"><input type="radio" name="tklnewtype" value="1"
                                             <?php  if($settings['tklnewtype']==1) { ?> checked="checked" <?php  } ?>>旧版</label>
                                              <span class="help-block">旧版是用￥VFM402tN1ui￥    新版《Nyqw02tnxll《</span>
                                        </div>
                                </div>-->
                         	
                         	
                         	   <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">是否开启绑定手机</label>
                                    <div class="col-xs-12 col-sm-9">
                                        <label class="radio-inline"><input type="radio" name="kqbdsj" value="0" 
                                         <?php  if($settings['kqbdsj']==0) { ?> checked="checked" <?php  } ?>>不开启</label>
                                        <label class="radio-inline"><input type="radio" name="kqbdsj" value="1"
                                         <?php  if($settings['kqbdsj']==1) { ?> checked="checked" <?php  } ?>>开启</label>
                                          <span class="help-block">开启了，代理会员中心会弹出绑定手机的窗口，不强制绑定，会员可以关闭，如果开启了会员没绑定，每次打开代理会员都会弹出</span>
                                    </div>
                                </div>
                         	
                         	
                         		<div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">绑定手号奖励</label>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                            <input type="text" value="<?php  echo $settings['bdteljl'];?>" name="bdteljl" class="form-control" />
                                            <span class="help-block" style="color:#ff0000">单位是元，绑定成功了，后面就不会提示在绑定，奖励一次</span>
                                        </div>
                                </div>
                         	
                         	
                                
                              <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">云控设置</label>
                                    <div class="col-xs-12 col-sm-9">
                                        <label class="radio-inline"><input type="radio" name="yktype" value="0" 
                                         <?php  if($settings['yktype']==0) { ?> checked="checked" <?php  } ?>>不开启</label>
                                        <label class="radio-inline"><input type="radio" name="yktype" value="1"
                                         <?php  if($settings['yktype']==1) { ?> checked="checked" <?php  } ?>>开启</label>
                                          <span class="help-block">这里选择了，需要在微信淘宝客基础设置里面把云控授权了</span>
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">淘宝ID</label>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                            <input type="text" value="<?php  echo $settings['tbuid'];?>" name="tbuid" class="form-control" />
                                            <span class="help-block" style="color:#ff0000">阿里妈妈登录的对应淘宝ID 【特别注意：淘宝ID填好了先保存，在点下面的登录】</span>
                                        </div>
                                </div>

                                <!--<div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">联盟库首页自定义商品</label>
                                    <div class="col-xs-12 col-sm-9">
                                        <input type="text" name="sylmkey" value="<?php  echo $settings['sylmkey'];?>" class="form-control" placeholder="" >
                                        <span class="help-block">请填写关键词 多个关键词用 | 分隔开</span>
                                    </div>
                                </div>-->
                                <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">共用商品库</label>
                                    <div class="col-xs-12 col-sm-9">
                                        <input type="text" name="gyspsj" value="<?php  echo $settings['gyspsj'];?>" class="form-control" placeholder="公众号ID" >
                                        <span class="help-block">填写要共用哪个公众号的商品数据，就填哪个公众号ID，这样就不用自己采集商品数据了</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">商品库选择</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="dlmmtype" value="0" 
                                             <?php  if($settings['dlmmtype']==0) { ?> checked="checked" <?php  } ?>>自己采集</label>
                                            <label class="radio-inline"><input type="radio" name="dlmmtype" value="2"
                                             <?php  if($settings['dlmmtype']==2) { ?> checked="checked" <?php  } ?>>云商品库</label>
                                              <span class="help-block">云商品库，无需采集数据，全自动更新数据</span>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#ff0000">结算模式</label>
                                        <div class="col-xs-12 col-sm-9">
                                            <label class="radio-inline"><input type="radio" name="jsms" value="0" 
                                             <?php  if($settings['jsms']==0) { ?> checked="checked" <?php  } ?>>订单生成时间</label>
                                            <label class="radio-inline"><input type="radio" name="jsms" value="1"
                                             <?php  if($settings['jsms']==1) { ?> checked="checked" <?php  } ?>>阿里妈妈结算时间</label>
                                              <span class="help-block">1、订单生成时间：就是通过订单生成的时间来计算上个月结算的订单佣金（会出现垫付的情况）2、阿里妈妈结算时间：和阿里妈妈结算时间同步，会准确一点，不会自己垫付</span>
                                        </div>
                                </div>

                                
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理提现限制:</label>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                            <div class="input-group" style="width:250px;">
                                              <input type="text" class="form-control" name="txxzprice" value="<?php  echo $settings['txxzprice'];?>"  placeholder="如：10">
                                              <span class="input-group-addon">元</span>
                                            </div>
                                            <span class="help-block" style="color:#ff0000">余额满多少才能提交提现申请</span>
                                        </div>
                                </div>


                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">公告内容</label>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                            <input type="text" value="<?php  echo $settings['ggcontent'];?>" name="ggcontent" class="form-control" />
                                            <span class="help-block" style="color:#ff0000">公告内容，字数不要太长</span>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">公告超链接</label>
                                        <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                            <input type="text" value="<?php  echo $settings['gglink'];?>" name="gglink" class="form-control" />
                                            <span class="help-block" style="color:#ff0000">如：http://www.baidu.com</span>
                                        </div>
                                </div>

                            

                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">实际佣金</label>
                                <div class="col-xs-12 col-sm-9">
                                   <label class="checkbox-inline">
                                      <input type="radio" name="yjtype" id="yjtype" value="0" <?php  if($settings['yjtype'] == 0) { ?>checked<?php  } ?>> 不显示
                                   </label>
                                   <label class="checkbox-inline">
                                      <input type="radio" name="yjtype" id="yjtype" value="1" <?php  if($settings['yjtype'] == 1) { ?>checked<?php  } ?>> 显示
                                   </label>
                                    <span class="help-block" style="color:#ff0000">如果显示，会在前端列表页显示实际佣金</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">分佣模式</label>
                                <div class="col-xs-12 col-sm-9">
                                   <label class="checkbox-inline">
                                      <input type="radio" name="fytype" id="fytype" value="0" <?php  if($settings['fytype'] == 0) { ?>checked<?php  } ?>> 佣金
                                   </label>
                                   <label class="checkbox-inline">
                                      <input type="radio" name="fytype" id="fytype" value="1" <?php  if($settings['fytype'] == 1) { ?>checked<?php  } ?>> 付款金额
                                   </label>
                                    <span class="help-block" style="color:#ff0000">选择付款金额，代理的佣金比例调整好了</span>
                                </div>
                           </div>
                           <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">淘宝ID</label>
                                <div class="col-xs-12 col-sm-9">
                                    <input type="text" name="tbid" value="<?php  echo $settings['tbid'];?>" class="form-control" placeholder="数字" >
                                    <span class="help-block">填写对应的淘宝ID，在客户领取打开淘宝口令的时候，会检测收到消息</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">搜索查询自购佣金</label>
                                <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['zgf'];?>" name="zgf" class="form-control" />
                                    <span class="help-block">搜索页面显示的自购佣金比例</span>
                                </div>
                            </div>
                           <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">淘客APPKEY</label>
                                <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['tkAppKey'];?>" name="tkAppKey" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">淘客secretKey</label>
                                <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['tksecretKey'];?>" name="tksecretKey" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">普通PID</label>
                                <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['ptpid'];?>" name="ptpid" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">鹊桥高佣PID</label>
                                <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['qqpid'];?>" name="qqpid" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">adzoneid</label>
                                <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['adzoneid'];?>" name="adzoneid" class="form-control" />
                                    <span class="help-block">对应数值 ：mm_memberid_siteid_adzoneid （使用导购推广位默认第一个）</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">siteid</label>
                                <div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['siteid'];?>" name="siteid" class="form-control" />
                                    <span class="help-block">对应数值 ：mm_memberid_siteid_adzoneid （使用导购推广位默认第一个）</span>
                                </div>
                            </div>
                             <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提示信息</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <textarea style="height:150px;" name="flmsg" class="form-control" cols="60"><?php  echo $settings['flmsg'];?></textarea>                  
                                        <div class="help-block" style="line-height:30px;">
                                        <b>参数设置：</b>
                                        <br>商品名称：#名称##换行#
                                        <br>推荐理由：#推荐理由##换行#
                                        <br>商品原价：#原价#元#换行#
                                        <br>券后价：#券后价#元#换行#
                                        <br>优惠券：#优惠券#元#换行#
                                        <br>淘口令：#淘口令##换行#
                                        <br>二合一链接：#二合一链接##换行#
                                        <br>短链接：#短链接#

                                      </div>
                                   </div>                            
                               </div>
                         </div>
                         <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">代理申请头部图片</label>
                                <div class="col-sm-9">
                                    <?php  echo tpl_form_field_image('dlpicurl',$settings['dlpicurl'])?>
                                    <span class="help-block">如：宽650   高不限制</span>
                                </div>
                        </div>
                         <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服二维码</label>
                                <div class="col-sm-9">
                                    <?php  echo tpl_form_field_image('kfpicurl',$settings['kfpicurl'])?>
                                    <span class="help-block">在新代理中心显示</span>
                                </div>
                        </div>
                          <div class="form-group col-sm-12">
                              <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                          </div>
                     </div>
                      <!--结束-->
                     <!--加群设置-->
                     <div class="tab-pane" id="tab_share">
                         <div class="panel-body">
                            <!--div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">加群助手</label>
                                    <div class="col-xs-12 col-sm-9">
                                        <label class="radio-inline"><input type="radio" name="jqzs" value="0" 
                                         <?php  if($settings['jqzs']==0) { ?> checked="checked" <?php  } ?>>不开</label>
                                        <label class="radio-inline"><input type="radio" name="jqzs" value="1"
                                         <?php  if($settings['jqzs']==1) { ?> checked="checked" <?php  } ?>>开启</label>
                                          <span class="help-block">如果开启 请在自定义菜单设置关键词 <b style="color:#ff0000">加群助手</b> <a href="" style="color:blue">点击管理群二维码</a></span>
                                    </div>
                            </div-->
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">生成群提示：</label>
                                <div class="col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" placeholder="" name="jlqmsg" value="<?php  echo $settings['jlqmsg'];?>">
                                        <div class="help-block">如：扫描二维码加入群</div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">已加过群提示：</label>
                                <div class="col-sm-9 col-xs-12">
                                        <input type="text" class="form-control" placeholder="" name="jqmsg" value="<?php  echo $settings['jqmsg'];?>">
                                        <div class="help-block">如：您已加入，无须重复加入</div>
                                </div>
                            </div>
                         </div>
                        <div class="form-group col-sm-12">
                              <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                         </div>
                     </div>
                     <!--结束-->
                     <!--支付设置-->
                     <div class="tab-pane" id="tab_share1">
                         <div class="panel-body">
                            <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">&nbsp;</label>
                                        <div class="col-xs-12 col-sm-9" >
                                           请先在功能选项--》支付参数--》微信支付--》开启  （开启后，到这里保存一次）
                                           <p style="color:#ff0000">支付授权目录与“支付选项”中的说明不同，应在 公众平台->微信支付->公众号支付 <br>追加一条支付授权目录: <?php  echo $_W['siteroot'];?>app/</p>
                                        </div>
                           </div>
                           <div class="form-group">
                                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">client_ip</label>
                                    <div class="col-xs-12 col-sm-9">
                                        <input type="text" name="ip" value="<?php  echo $settings['ip'];?>" class="form-control" placeholder="请填写服务器IP" >
                                        <span class="help-block">这里填写你的服务器IP：<?php  echo $_SERVER["SERVER_ADDR"]?></span>
                                    </div>
                           </div>
                        <div class="form-group col-sm-12">
                              <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                         </div>
                         </div>
                     </div>
                     <!--结束-->
                      <!--提醒设置-->
                     <div class="tab-pane" id="tab_share2">
                         <div class="panel-body">
                            <div class="form-group">
                                <label class="col-xs-12 col-sm-3 col-md-2 control-label">管理员OPENID</label>
                                <div class="col-sm-9 col-xs-12" style="margin-top: 6px;">
                                    <input type="text" value="<?php  echo $settings['glyopenid'];?>" name="glyopenid" class="form-control" />
                                    <span class="help-block">管理员OPENID</span>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label" style="color:#ff0000">代理申请提醒</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                          <select class="form-control" name="dlsqtx" id="dlsqtx">
                                                <option value="0">请选择模版消息</option>
                                                <?php  if(is_array($mblist)) { foreach($mblist as $v) { ?>
                                                <option value="<?php  echo $v['id'];?>" <?php  if($settings['dlsqtx']==$v['id']) { ?>selected <?php  } ?>><?php  echo $v['title'];?></option>  
                                                <?php  } } ?>
                                            </select>    
                                           <div class="help-block">代理申请后，管理员收到消息(先到微信淘宝客后台，添加（基础设置->模版消息管理-添加))</div>
                                        </div>
                                    </div>
                               </div>
                               <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label" style="color:#ff0000">代理审核通过提醒</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                          <select class="form-control" name="dlshtgtx" id="dlshtgtx">
                                                <option value="0">请选择模版消息</option>
                                                <?php  if(is_array($mblist)) { foreach($mblist as $v) { ?>
                                                <option value="<?php  echo $v['id'];?>" <?php  if($settings['dlshtgtx']==$v['id']) { ?>selected <?php  } ?>><?php  echo $v['title'];?></option>  
                                                <?php  } } ?>
                                            </select>    
                                           <div class="help-block">代理审核通过后，代理收到模版消息（基础设置->模版消息管理-添加)</div>
                                        </div>
                                    </div>
                               </div>
                               <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label" style="color:#ff0000">代理提现管理员收到提醒</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                          <select class="form-control" name="khgettx" id="khgettx">
                                                <option value="0">请选择模版消息</option>
                                                <?php  if(is_array($mblist)) { foreach($mblist as $v) { ?>
                                                <option value="<?php  echo $v['id'];?>" <?php  if($settings['khgettx']==$v['id']) { ?>selected <?php  } ?>><?php  echo $v['title'];?></option>  
                                                <?php  } } ?>
                                            </select>    
                                           <div class="help-block">代理审核通过后，代理收到模版消息（基础设置->模版消息管理-添加)</div>
                                        </div>
                                    </div>
                               </div>
                        <div class="form-group col-sm-12">
                              <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                         </div>
                         </div>
                     </div>
                     <!--结束-->
               </div>
           </div>
    </div>
</form>
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
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
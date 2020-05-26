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
                          <li><a href="index.html"><i class="fa fa-home"></i> 首页 </a></li>
                          <li class="active">APP设置管理</li>
                        </ul>
                        <!--编辑内容-->
                         <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               APP设置管理
                              </h3>
                           </div>
                           <div class="panel-body">
																<ul class="nav nav-tabs" id="myTab">
																		<li class="active" ><a href="#tab_basic">基础设置</a></li>
																		<li><a href="#tab_share">短信设置</a></li>
																		<li><a href="#tab_share2">模版选择</a></li>
																		<li><a href="#tab_share1">其它图片</a></li>
																</ul>
														<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
														<div class="tab-content">
														<!--基础设置-->
															<div class="tab-pane  active" id="tab_basic">
																		<div class="panel-body">
																			
																					<div class="form-group">
																						<label for="inputEmail3" class="col-sm-2 control-label">appid</label>
																						<div class="col-sm-10">
																							<input type="text" class="form-control" name="appid" value="<?php  echo $set['appid'];?>"  placeholder="appid">
																						<span class="help-block" >开放平台移动应用获取</span>
																						</div>
																						
																					</div>
																					<div class="form-group">
																							<label for="inputEmail3" class="col-sm-2 control-label">mchid商户号</label>
																							<div class="col-sm-10">
																								<input type="text" class="form-control" name="mchid" value="<?php  echo $set['mchid'];?>"  placeholder="mchid">
																							<span class="help-block" >开放平台移动应用对应APP开通的微信支付，和公众号的不一样</span>
																							</div>																						
																					</div>  
																					<div class="form-group">
																							<label for="inputEmail3" class="col-sm-2 control-label">支付秘钥</label>
																							<div class="col-sm-10">
																								<input type="text" class="form-control" name="appkey" value="<?php  echo $set['appkey'];?>"  placeholder="appkey">
																							<span class="help-block" ></span>
																							</div>																						
																					</div> 
																					<div class="form-group">
																							<label for="inputEmail3" class="col-sm-2 control-label">服务器IP</label>
																							<div class="col-sm-10">
																								<input type="text" class="form-control" name="appzfip" value="<?php  echo $set['appzfip'];?>"  placeholder="如:127.0.0.1">
																							<span class="help-block" >服务器公网IP</span>
																							</div>																						
																					</div> 
																					<div class="form-group">
																						<label class="col-xs-12 col-sm-3 col-md-2 control-label">IOS审核模式</label>
																						<div class="col-xs-12 col-sm-9">
																							<label class="checkbox-inline">
																									<input type="radio" name="iossh"  value="0" <?php  if($set['iossh'] == 0) { ?>checked<?php  } ?>> 否
																							</label>
																							<label class="checkbox-inline">
																									<input type="radio" name="iossh"  value="1" <?php  if($set['iossh'] == 1) { ?>checked<?php  } ?>> 开启
																							</label>
																					
																								<span class="help-block" style="color:#ff0000">IOS审核中请开启，开启后会隐藏微信登录的按钮，方便审核</span>
																						</div>
																					</div>
																					
																					<div class="form-group">
																						<label class="col-xs-12 col-sm-3 col-md-2 control-label">升级赚</label>
																						<div class="col-xs-12 col-sm-9">
																							<label class="checkbox-inline">
																									<input type="radio" name="sjztype"  value="0" <?php  if($set['sjztype'] == 0) { ?>checked<?php  } ?>> 不显示
																							</label>
																							<label class="checkbox-inline">
																									<input type="radio" name="sjztype"  value="1" <?php  if($set['sjztype'] == 1) { ?>checked<?php  } ?>> 显示
																							</label>
																					
																								<span class="help-block" style="color:#ff0000">显示的在列表页会有升级赚显示</span>
																						</div>
																					</div>
																					<div class="form-group">
																							<label for="inputEmail3" class="col-sm-2 control-label">预估赚名称</label>
																							<div class="col-sm-10">
																								<input type="text" class="form-control" name="lbygz" value="<?php  echo $set['lbygz'];?>"  placeholder="">
																							<span class="help-block" >自定义预估赚名称</span>
																							</div>																						
																					</div> 
																					<div class="form-group">
																							<label for="inputEmail3" class="col-sm-2 control-label">升级赚名称</label>
																							<div class="col-sm-10">
																								<input type="text" class="form-control" name="lbsjz" value="<?php  echo $set['lbsjz'];?>"  placeholder="">
																							<span class="help-block" >自定义升级赚名称</span>
																							</div>																						
																					</div> 
																					<div class="form-group">
																						<label class="col-xs-12 col-sm-3 col-md-2 control-label">会员中心积分</label>
																						<div class="col-xs-12 col-sm-9">
																							<label class="checkbox-inline">
																									<input type="radio" name="hyjftype"  value="0" <?php  if($set['hyjftype'] == 0) { ?>checked<?php  } ?>> 不显示
																							</label>
																							<label class="checkbox-inline">
																									<input type="radio" name="hyjftype"  value="1" <?php  if($set['hyjftype'] == 1) { ?>checked<?php  } ?>> 显示
																							</label>
																					
																								<span class="help-block" style="color:#ff0000">会员中心积分显示</span>
																						</div>
																					</div>
																					<div class="form-group">
																							<label for="inputEmail3" class="col-sm-2 control-label">APP头部消息</label>
																							<div class="col-sm-10">
																								<input type="text" class="form-control" name="appxiaoxiurl" value="<?php  echo $set['appxiaoxiurl'];?>"  placeholder="如:http://">
																							<span class="help-block" >APP头部消息链接，可以用H5</span>
																							</div>																						
																					</div> 
																										
																					<div class="form-group">
																						<div class="col-sm-offset-2 col-sm-10">
																							 <input type="hidden" name="id" value="<?php  echo $set['id'];?>" />
																							 <input type="submit" name="submit" class="btn btn-default" value="提交"  class="btn btn-primary"/>
																							 <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
																						</div>
																					</div>
																				
																		</div>
														  </div>
															<!-- 短信设置开始 -->
															<div class="tab-pane" id="tab_share">
																	<div class="panel-body">
																			<div class="form-group">
																					<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
																					<div class="col-sm-6 col-xs-12" >
																							阿里云短信
																					</div>
																			</div>
																			<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">Access Key ID</label>
																				<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																						<input type="text" value="<?php  echo $set['smskeyid'];?>" name="smskeyid" class="form-control" />
																						<span class="help-block" style="color:#ff0000"><a href="https://help.aliyun.com/knowledge_detail/38738.html" target="_blank">点击：如何获取Access Key</a></span>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">Access Key Secret</label>
																				<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																						<input type="text" value="<?php  echo $set['smssecret'];?>" name="smssecret" class="form-control" />
																						<span class="help-block" style="color:#ff0000"></span>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">签名名称</label>
																				<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																						<input type="text" value="<?php  echo $set['smsname'];?>" name="smsname" class="form-control" />
																						<span class="help-block" style="color:#ff0000">短信服务-》签名管理-》添加</span>
																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-xs-12 col-sm-3 col-md-2 control-label">模版CODE</label>
																				<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																						<input type="text" value="<?php  echo $set['smscode'];?>" name="smscode" class="form-control" />
																						<span class="help-block" style="color:#ff0000">如：SMS_90090036  模版内容:
您的验证码是：${code}，请不要泄露给其他人。</span>
																				</div>
																			</div>
																			<div class="form-group col-sm-12">
																				<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
																				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
																			</div>
																	</div>
															</div>
															<!-- 短信设置结束 -->
															
														<!--基础设置结束-->
														<div class="tab-pane" id="tab_share1">
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-2 control-label">弹窗是否开启</label>
																<div class="col-xs-12 col-sm-9">
																	<label class="checkbox-inline">
																			<input type="radio" name="tanchuangtype"  value="0" <?php  if($set['tanchuangtype'] == 0) { ?>checked<?php  } ?>> 不显示
																	</label>
																	<label class="checkbox-inline">
																			<input type="radio" name="tanchuangtype"  value="1" <?php  if($set['tanchuangtype'] == 1) { ?>checked<?php  } ?>> 显示
																	</label>
															
																		<span class="help-block" style="color:#ff0000">是否开启弹窗</span>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-2 control-label">弹窗间隔时间</label>
																<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																		<input type="text" value="<?php  echo $set['tanchuangjgtime'];?>" name="tanchuangjgtime" class="form-control" />
																		<span class="help-block" style="color:#ff0000">分钟为单位</span>
																</div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-2 control-label">弹窗标题</label>
																<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																		<input type="text" value="<?php  echo $set['tanchuangtitle'];?>" name="tanchuangtitle" class="form-control" />
																		<span class="help-block" style="color:#ff0000"></span>
																</div>
															</div>
															<div class="form-group">
															        <label class="col-xs-12 col-sm-3 col-md-2 control-label">弹窗图片</label>
															        <div class="col-sm-9">
															            <?php  echo tpl_form_field_image('tanchuangpic',$set['tanchuangpic'])?>
															            <span class="help-block">宽504x高626  png格式</span>
															        </div>
															</div>
															<div class="form-group">
																<label class="col-xs-12 col-sm-3 col-md-2 control-label">跳转链接</label>
																<div class="col-sm-6 col-xs-12" style="margin-top: 6px;">
																		<input type="text" value="<?php  echo $set['tanchuangurl'];?>" name="tanchuangurl" class="form-control" />
																		<span class="help-block" style="color:#ff0000">弹窗间隔时间24小时</span>
																</div>
															</div>
															<div class="form-group col-sm-12">
																<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
																<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
															</div>
														</div>
														<!-- 模版选择 -->
														<!--基础设置结束-->
														<div class="tab-pane" id="tab_share2">
															<div class="panel panel-default">
															    <div class="panel-heading">列表样式</div>
															        <div class="panel-body">
															           <table class="table table-hover" style="text-align:center">
															              <tbody id="table_content">
															                <tr>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/mb/1.jpg"></td>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/mb/2.jpg"></td>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/mb/3.jpg"></td>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/style88/images/mb/4.jpg"></td>
															                  <td></td>
															                </tr> 
															                <tr>
															                  <td><input type="radio" name="tptype" id="tptype" value="1" <?php  if($set['tptype'] == '1') { ?>checked<?php  } ?>>列表1</td>
															                  <td><input type="radio" name="tptype" id="tptype" value="2" <?php  if($set['tptype'] == '2') { ?>checked<?php  } ?>>列表2</td>
															                  <td><input type="radio" name="tptype" id="tptype" value="3" <?php  if($set['tptype'] == '3') { ?>checked<?php  } ?>>列表3</td>
															                  <td><input type="radio" name="tptype" id="tptype" value="4" <?php  if($set['tptype'] == '4') { ?>checked<?php  } ?>>列表4</td>
															                  <td></td>
															                </tr> 
															                <!--<tr>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/images/lb/l6.jpg"></td>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/images/lb/l7.jpg"></td>
															                  <td><img width="200" src="<?php  echo $_W['siteroot'];?>addons/tiger_newhu/template/mobile/tbgoods/images/lb/l8.jpg"></td>
															                  <td></td>
															                 <td></td>
															                </tr> 
															                <tr>
															                  <td><input type="radio" name="newsstyle" id="newsstyle" value="lb6" <?php  if($settings['newsstyle'] == 'lb6') { ?>checked<?php  } ?>>列表6</td>
															                  <td><input type="radio" name="newsstyle" id="newsstyle" value="lb7" <?php  if($settings['newsstyle'] == 'lb7') { ?>checked<?php  } ?>>列表7</td>
															                  <td><input type="radio" name="newsstyle" id="newsstyle" value="lb8" <?php  if($settings['newsstyle'] == 'lb8') { ?>checked<?php  } ?>>列表8</td>
															                  <td></td>
															                  <td></td>
															                  <td></td>
															                </tr> -->
															              </tbody>
															            </table>
															        </div>
															    </div>
															<div class="form-group col-sm-12">
																<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
																<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
															</div>
														</div>
														<!-- 模版选择结束 -->
														
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
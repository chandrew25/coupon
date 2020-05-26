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
                          <li><a href="<?php  echo $this->createWebUrl('index')?>"><i class="fa fa-home"></i> 首页  / 擎天柱专题DIY管理</a></li>
                          <li class="active">擎天柱专题DIY</li>
                        </ul>
			            <!--编辑内容-->
                        <ul class="nav nav-tabs">
                            <li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('qtzlist', array('op' => 'post'));?>">添加</a></li>
                            <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('qtzlist', array('op' => 'display'));?>">管理</a></li>
                        </ul>
                        <?php  if($operation == 'post') { ?>
												<div class="panel panel-default">
													 <table class="table">
														 <th >导航栏-填写活动ID一览表</th>
														<tr>
															<td style="line-height: 30px;">菜单组合说明：<span style="color: #fff0000;">标题</span><span style="color:forestgreen;">中横杠分隔符</span><span style="color: firebrick;">活动ID</span><span style="color: fuchsia;">竖条分隔符</span>  
															&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;如：<span style="color: #fff0000;">综合</span><span style="color:forestgreen;">-</span><span style="color: firebrick;">3756</span><span style="color: fuchsia;">|</span><span style="color: #fff0000;">女装</span><span style="color:forestgreen;">-</span><span style="color: firebrick;">3767</span>  &nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;注意：最后一个菜单不要加 |
															<br>
															<span style="color: #ff0000;">好券直播：</span>综合-3756|鞋包配饰-3762|母婴-3760|女装-3767|美妆个护-3763|食品-3761|家居家装-3758|男装-3764|运动户外-3766|数码家电-3759|内衣-3765
															<br>
															<span style="color: #ff0000;">大额券：</span>综合-9660|鞋包配饰-9648|母婴-9650|女装-9658|美妆个护-9653|食品-9649|家居家装-9655|男装-9654|运动户外-9651|数码家电-9656|内衣-9652
															<br>
															<span style="color: #ff0000;">高佣榜：</span>综合-13366|鞋包配饰-13370|母婴-13374|女装-13367|美妆个护-13371|食品-13375|家居家装-13368|男装-13372|运动户外-13376|数码家电-13369|内衣-13373
															<br>
															<span style="color: #ff0000;">品牌券：</span>综合-3786|鞋包配饰-3796|母婴-3789|女装-3788|美妆个护-3794|食品-3791|家居家装-3792|男装-3790|运动户外-3795|数码家电-3793|内衣-3787
															<br>
															<span style="color: #ff0000;">母婴主题：</span>备孕-4040|0至6个月-4041|4至6岁-4044|7至12个月-4042|1至3岁-4043|7至12岁-4045
															<br>
															<span style="color: #ff0000;">有好货</span>-4092
															<br>
															<span style="color: #ff0000;">潮流范</span>-4093
															<br>
															<span style="color: #ff0000;">特惠</span>-4094
															<br>
															<span style="color: #ff0000;">天猫超市包邮专区</span>奶品水饮-19542|粮油米面-19539|母婴用品-19540|家居日用-19543|护肤彩妆-19541
															<br>
															<span style="color: #ff0000;">一淘大额券</span> 独家券-18222|大额券-13671|5折券-13865|美食券-13851|美妆券-13852|女神券-13858|母婴券-13855|家居券-13854|数码券-13856|鞋包券-13853|内衣券-13857|男神券-13859<br>
															<span style="color: #ff0000;">一淘白菜价</span>  爆款库-13968|热卖榜单-17122|9.9元专区-14971|19.9元专区-14976|29.9元专区-11049
															<br><span style="color: #ff0000;">每日爆款 </span> 每日精选-16217|食品-15895|个护美妆-15893|女装-15896|男装-15897|内衣-15898|母婴-15899|美码家电-15900|家居家装-15903|运动护外-15902|鞋包配饰-15901<br>
															<span style="color: #ff0000;">天猫超市 </span> 618爆款-15444|今日疯抢-16335|每日爆款-16697<br>
															<span style="color: #ff0000;">联盟对应频道：</span>天猫国际-1<br>
															<span style="color: #ff0000;">天猫国际</span> 好券推荐-7950|美容保健-7951|国际健康-11842|母婴用品-11830
															<br>
															<span style="color: #ff0000;">《聚划算限量优惠榜》</span> 食品-18914|母婴-18906|美妆个护-18903|服饰-18909|家居日用-18910|鞋包配饰-18912<br>
															<span style="color: #ff0000;">《品牌超值榜》</span>综合-18968|女装-18969|家居家装-18970|数码家电-18971|母婴-18976<br>
															<span style="color: #ff0000;">《每日爆款榜之美妆日》</span>综合-18620|女装-18621|家居家装-18622|数码家电-18623|母婴-18625|食品-18626|鞋包配饰-18627|美妆个护-18634|男装-18635|内衣-18636|护外运动-18637
															<br><span style="color: #ff0000;">《天猫超市超值好货榜》</span> 9.9-18930|19.9-18931|39.9-18933|69.9-18934|70元以上-18935
															<br>
															
															<span style="color: #ff0000;">《实时热销榜》</span> 综合-18620|女装-18621|家居家装-18622|数码家电-18623|母婴-18625|食品-18626|鞋包配饰-18627|美妆个护-18634|男装-18635|内衣-18636|户外运动-18637<br>
															<span style="color: #ff0000;">《好货高佣榜》</span> 综合-18577|女装-18578|家居家装-18579|数码家电-18580|母婴-18581|食品-18582|鞋包配饰-18583|美妆个护-18584|男装-18585|内衣-18586|运动户外-18587<br>
															<span style="color: #ff0000;">《大额优惠券榜》</span> 综合-18591|女装-18592|家居家装-18593|数码家电-18594|母婴-18595|食品-18596|鞋包配饰-18597|美妆个护-18598|男装-18599|内衣-18600|运动护外-18601<br>
															<span style="color: #ff0000;">《超级爆款榜》</span> 9.9-18628|19.9-18629|39.9-18630|69.9-18631|70元以上-18632<br>
															<span style="color: #ff0000;">福利磅</span>-18528（4亿奖金等你瓜分）<br>
															<span style="color: #ff0000;">一元抢购</span>-18847   超值爆款-18845<br>
															<span style="color: #ff0000;">优酷5折爆款</span>-19579 <br>
															<span style="color: #ff0000;">狂欢超值大牌</span>   数码家电-19625|家居家装-19701|食品-18493|美妆个护-19623|国际-19703|母婴-19705|女装-19646|男装-19718|内衣-19719|鞋包配饰-19727|运动护外-19728
															<span style="color: #ff0000;">其它</span>电影-19812|餐饮-19810|旅游-19811|丽人-19814 <br>
															<span style="color: #ff0000;">引流好货</span>引流好货-22677|今日必推-22423<br>
															<span style="color: #ff0000;">宝妈优选</span>口质高佣-23239|猫超包邮-23195|开学/童书-23204|奶粉/辅食-22909|尿裤/湿巾-22907|生活服务-23134|宝宝营养-22908|妈妈孕产-22910|童车/玩具-22911|婴幼洗护-22912|喂养用品-22913|母婴家纺-22914<br>
															<span style="color: #ff0000;">猫超精选</span>出单超快-23089单件就免邮-22922|1元凑单-23114<br>
															<span style="color: #ff0000;">热卖生鲜</span>水果-22657|9.9包邮-22650|夏季饮品-22654|下午茶-22653|乳品饮料-22652|粮油米面-22659|百草味-22735|三只松鼠-22733|周黑鸭-22737|天猫超市-22738<br>
															<span style="color: #ff0000;">惠生活</span>天猫无忧购-23161|肯德鸡-23111|方便快餐-23018|休闲娱乐-23020|生活服务-23019|旅行出游-23021<br>
															<span style="color: #ff0000;">每月17买呗（国际尖货）</span>精选-23084|护肤-23085|美妆-23082|洗护-23083|保健-23087|母婴-23086|时尚-23081|直营尖货-23165|猜你喜欢-23080<br>
															
															<span style="color: #ff0000;">99划算节-聚划算实时热销榜</span>
															大家都在买-23922|母婴-23957|纸品家清-23954|家居-23956|数码家电-23955|运动户外-23958<br>
															
															<span style="color: #ff0000;">99划算节-天猫实时热销榜</span>
															大家都在买-23920|美妆个护-23941|美食-23942|纸品家清-23959|母婴-23947|数码家电-23946|家居-23945<br>
															
															<span style="color: #ff0000;">99划算节-大额优惠券</span>
															大家都在买-23587|女装-23589|美妆个护-23590|母婴-23594|数码家电-23595|食品-23593<br>
															
															<span style="color: #ff0000;">实时热销榜</span>
															综合-21701|美妆个护-21708|食品-21706|女装-21702|家居家装-21703|母婴-21705|数码家电-21704|鞋包配饰-21707|男装-21710|内衣-21711|运动户外-21712<br>
															
															<span style="color: #ff0000;">品牌清仓</span>
															按2小时销量排序-21713|按佣金比例排序-21714|按优惠券额排序-21715<br>
															
															</td> 
														</tr>
													 </table>
												</div>
                        <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               编辑活动
                              </h3>
                           </div>
                           <div class="panel-body">
																	<div class="form-group">
																	  <label for="inputEmail3" class="col-sm-2 control-label">排序</label>
																	  <div class="col-sm-9">
																	    <input type="text" class="form-control" name="px" value="<?php  echo $item['px'];?>"  placeholder="">
																	  </div>
																	</div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">活动名称</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>"  placeholder="">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">导航栏</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="cate" value="<?php  echo $item['cate'];?>"  placeholder="">
																			<span class="help-block" style="color:#ff0000">不填不显示导航 material_id 组成  如：综合-13366|女装-13367|母婴-13374|食品-13375</span>
                                    </div>
                                  </div>
								  <div class="form-group">
								      <label class="col-xs-12 col-sm-3 col-md-2 control-label">背景颜色</label>
								      <div class="col-sm-9 col-xs-12">
								          <?php  echo tpl_form_field_color('bjcolor',$item['bjcolor'])?>
								      </div>
								  </div>
                                  
                                  
                                  <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">图片</label>
                                    <div class="col-sm-9">
                                      <?php  echo tpl_form_field_image('picurl',$item['picurl'])?>             
                                      
                                    </div>
                                  </div>
                
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">默认ID</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" name="cateid" value="<?php  echo $item['cateid'];?>"  placeholder="">
																			<span class="help-block" style="color:#ff0000">上面导航栏里面选择一个用作默认</span>
                                    </div>   																		
                                  </div> 
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-9">
                                       <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                                       <input type="submit" name="submit" class="btn btn-primary" value="提交"  class="btn btn-primary"/>
                                       <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                                    </div>
                                  </div>
                           </div>
                        </div>
                                 
                        </form>
                        <?php  } else if($operation == 'display') { ?>
												
                        <div class="panel panel-default">
                              <table class="table">
                                  <th >排序</th>
                                  <th>名称</th>
                                  <th>图片</th>
                                  <th>链接/口令</th>
                                  <th  style="text-align:right;">操作</th>

                              <?php  if(is_array($list)) { foreach($list as $item) { ?>
                                <tr>
                                  <td><?php  echo $item['px'];?></td>
                                  <td><?php  echo $item['title'];?></td>
                                  <td><img src="<?php  echo tomedia($item['picurl'])?>" width="50"></td>
                                   <td><?php  echo $item['turl'];?><br><?php  echo $item['kouling'];?></td>

                                  <td style="text-align:right;">
                                    <a href="<?php  echo $this->createWebUrl('qtzlist', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
                                    <a href="<?php  echo $this->createWebUrl('qtzlist', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
                                  </td>
                                </tr>
																<tr>
																	 <td colspan="5">活动地址：<?php  echo $_W['siteroot'].str_replace('./','app/',$this->createMobileurl('wnqtzgoods',array('id'=>$item['id'])))?></td>
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
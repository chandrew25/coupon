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
                          <li class="active">淘客商品</li>
                        </ul>
			            <!--编辑内容-->
                        <?php  if($operation == 'post') { ?>

                        <div class="panel panel-default">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                               添加/编辑商品
                              </h3>
                           </div>
                           <div class="panel-body">
                                <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
                                
          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">活动类型</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <select class="form-control" name="activity_type" id="activity_type">               
                <option <?php  if($item['activity_type'] == '普通活动') { ?>selected<?php  } ?> value="普通活动">普通活动</option>
                <option <?php  if($item['activity_type'] == '聚划算') { ?>selected<?php  } ?> value="聚划算">聚划算</option>
                <option <?php  if($item['activity_type'] == '淘抢购') { ?>selected<?php  } ?> value="淘抢购">淘抢购</option>
                    </select>                
                </div>              
            </div>
          </div>
        
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemtitle" value="<?php  echo $item['itemtitle'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">短名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemshorttitle" value="<?php  echo $item['itemshorttitle'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商品推荐语</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemdesc" value="<?php  echo $item['itemdesc'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">图片链接</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itempic" value="<?php  echo $item['itempic'];?>"  placeholder="">
              <span class="help-block">填淘宝的图片地址</span>
            </div>
          </div>

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商品ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemid" value="<?php  echo $item['itemid'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商品原价</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemprice" value="<?php  echo $item['itemprice'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商品券后价</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemendprice" value="<?php  echo $item['itemendprice'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">佣金比例</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tkrates" value="<?php  echo $item['tkrates'];?>"  placeholder="填数字">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商品月销量</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="itemsale" value="<?php  echo $item['itemsale'];?>"  placeholder="填数字">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">视频ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="videoid" value="<?php  echo $item['videoid'];?>"  placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">商品类别</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <select class="form-control" name="type" id="type">               
                        <?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
                            <option <?php  if(!empty($v) && $v['id'] == $item['fqcat']) { ?>selected<?php  } ?> value="<?php  echo $v['id'];?>"><?php  echo $v['title'];?></option>
                        <?php  } } ?>
                    </select>                
                </div>          
            </div>
          </div>
          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">是否天猫</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <select class="form-control" name="shoptype" id="shoptype">               
                        <option <?php  if($item['shoptype'] == 'C') { ?>selected<?php  } ?> value="C">否</option>
                        <option <?php  if($item['shoptype'] == 'B') { ?>selected<?php  } ?> value="B">是</option> 
                    </select>                
                </div>          
            </div>
          </div>
          <div class="form-group">
            <label for="type" class="col-sm-2 control-label">佣金方式</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <select class="form-control" name="tktype" id="tktype">               
                <option <?php  if($item['tktype'] == '通用计划') { ?>selected<?php  } ?> value="通用计划">通用计划</option>
                <option <?php  if($item['tktype'] == '鹊桥活动') { ?>selected<?php  } ?> value="鹊桥活动">鹊桥活动</option>
                <option <?php  if($item['tktype'] == '定向计划') { ?>selected<?php  } ?> value="定向计划">定向计划</option>
                <option <?php  if($item['tktype'] == '隐藏计划') { ?>selected<?php  } ?> value="隐藏计划">隐藏计划</option>
                <option <?php  if($item['tktype'] == '营销计划') { ?>selected<?php  } ?> value="营销计划">营销计划</option>
                    </select>                
                </div>              
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="quan_id" value="<?php  echo $item['quan_id'];?>"  placeholder="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">定向计划链接</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="tkurl" value="<?php  echo $item['tkurl'];?>"  placeholder="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券链接</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="couponurl" value="<?php  echo $item['couponurl'];?>"  placeholder="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">营销计划链接 </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="planlink" value="<?php  echo $item['planlink'];?>"  placeholder="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券使用条件</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="couponexplain" value="<?php  echo $item['couponexplain'];?>"  placeholder="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券金额</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="couponmoney" value="<?php  echo $item['couponmoney'];?>"  placeholder="">
              <span class="help-block">元</span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券数量</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="couponnum" value="<?php  echo $item['couponnum'];?>"  placeholder="">
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券开始时间</label>
            <div class="col-sm-10">
            	<?php  echo tpl_form_field_date('couponstarttime', date('Y-m-d H:i:s',$item['couponstarttime']), true)?> 
              <span class="help-block"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label" style="color:#ff0000">优惠券结束时间</label>
            <div class="col-sm-10">
            	<?php  echo tpl_form_field_date('couponendtime', date('Y-m-d H:i:s',$item['couponendtime']), true)?> 
              <span class="help-block"></span>
            </div>
          </div>


                                  
                                  <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                       <input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
                                       <input type="submit" name="submit" value="发布产品"  class="btn btn-primary"/>
                                       <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                                    </div>
                                  </div>
                                </form>
                           </div>
                        </div>


                        <script language='javascript'>
                          require(['jquery', 'util'], function($, u){
                            $(function(){
                              $('.richtext-clone').each( function() {
                                u.editor(this);
                              });
                            });
                          });
                        </script>

                        <?php  } else if($operation == 'display' || $operation == 'seach' || $operation == 'qf') { ?>

                        <!--搜索开始-->
                        <div class="panel panel-info">
                            <div class="panel-heading">筛选</div>
                            <div class="panel-body">
                                <form action="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach'))?>" method="get" class="form-horizontal">
                                <input type="hidden" name="c" value="site">
                                <input type="hidden" name="a" value="entry">
                                <input type="hidden" name="m" value="tiger_newhu">
                                <input type="hidden" name="op" value="seach">
                                <input type="hidden" name="do" value="tbgoods">
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">关键词</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" class="form-control" name="key" value="<?php  echo $key;?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">商品ID</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" class="form-control" name="num_iid" value="<?php  echo $num_iid;?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金比例大于</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" class="form-control" name="tk_rate" value="<?php  echo $tk_rate;?>">
                                        </div>
                                    </div>
 
                                   <!--<div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">佣金类型</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="yjtype" value="1" <?php  if($yjtype==1) { ?>checked="checked"<?php  } ?>> 普通佣金
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="yjtype" value="2" <?php  if($yjtype==2) { ?>checked="checked"<?php  } ?>> 鹊桥高佣金
                                            </label>
                                        </div>
                                    </div>-->
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">类型</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="tj" value="1" <?php  if($tj==1) { ?>checked="checked"<?php  } ?>> 秒杀
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tj" value="2" <?php  if($tj==2) { ?>checked="checked"<?php  } ?>> 聚划算
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="tj" value="3" <?php  if($tj==3) { ?>checked="checked"<?php  } ?>> 淘抢购
                                            </label>
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">置顶</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="zd" value="0" <?php  if($zd==0) { ?>checked="checked"<?php  } ?>>不置顶
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="zd" value="1" <?php  if($zd==1) { ?>checked="checked"<?php  } ?>>置顶
                                            </label>
                                        </div>
                                    </div>-->
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">店铺类型</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="istmall" value="1" <?php  if($istmall==1) { ?>checked="checked"<?php  } ?>> 淘宝
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="istmall" value="2" <?php  if($istmall==2) { ?>checked="checked"<?php  } ?>> 天猫
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" style="height:40px;">
                                        <label for="type" class="col-sm-2 control-label">商品类别</label>
                                        <div class="col-sm-10">
                                            <div class="input-group">
                                            <select class="form-control" name="type" id="type">
                                              <option  value="" selected>所有商品</option>
                                               <?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
                                                <option value="<?php  echo $v['id'];?>"><?php  echo $v['title'];?></option>
                                               <?php  } } ?>
                                            </select>                
                                            </div>                                            
                                        </div>
                                    </div>
                                    <!--div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">高佣金结束时间</label>
                                        <div class="col-sm-9 col-xs-12">
                                     <?php  echo tpl_form_field_date('event_end_time', date('Y-m-d H:i:s',time()+604800), true)?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠券结束时间</label>
                                        <div class="col-sm-9 col-xs-12">
                                    <?php  echo tpl_form_field_date('coupons_end', date('Y-m-d H:i:s',time()+604800), true)?>
                                        </div>
                                    </div-->
                                    <div class="form-group">
                                        <label class="col-xs-12 col-sm-3 col-md-2 control-label">搜索显示数量</label>
                                        <div class="col-sm-9 col-md-8 col-lg-8 col-xs-12">
                                            <input type="text" class="form-control" name="limit" value="<?php  if($limit) { ?><?php  echo $limit;?><?php  } else { ?>20<?php  } ?>">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                                        </div>
                                    </div>
                                </form>
                               </div>
                          </div>
                        <!--搜索结束-->


                        

                        
                        <div class="panel panel-default">
                        
                        

                        <form action="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'display'))?>" method="post" class="form-horizontal" id="form1">
                              <table class="table">
                                  
                                  <th width="60"><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></th>
                                  <th style="width:60px;">主图</th>
                                  <th style="width:350px;">商品名称</th>                                  
                                  <th>券后价
                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>5))?>" class="btn btn-xs btn-danger">高↑</a> 
                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>6))?>" class="btn btn-xs btn-primary">低↓</a>
                                  <div style="clear:both;height:3px;"></th>
                                  <th> 
                                 比例
                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>1))?>" class="btn btn-xs btn-danger">高↑</a> 
                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>2))?>" class="btn btn-xs btn-primary">低↓</a>
                                  <div style="clear:both;height:3px;"></div>

                                  佣金

                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>3))?>" class="btn btn-xs btn-danger">高↑</a> 
                                  </th>
                                  <th>优惠券金额<a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>12))?>" class="btn btn-xs btn-danger">高↑</a> 
                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>13))?>" class="btn btn-xs btn-primary">低↓</a>
                                  
                                  </th>


                                  <th>优惠券总量<a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>7))?>" class="btn btn-xs btn-danger">高↑</a> 
                                  <a href="<?php  echo $this->createWebUrl('tbgoods',array('op'=>'seach','key'=>$key,'yjtype'=>$yjtype,'type'=>$type,'tj'=>$tj,'istmall'=>$istmall,'tk_rate'=>$tk_rate,'px'=>8))?>" class="btn btn-xs btn-primary">低↓</a></th>
                                  <th>到期时间</th>
                                  <th  style="text-align:right;">操作</th>
                                  <?php  if($list) { ?>
                                  
                                    <?php  if(is_array($list)) { foreach($list as $item) { ?>
                                    <tr>
                                      <td><input type="checkbox" name="id[]" value="<?php  echo $item['id'];?>" class=""></td>
                                      <td><a href="https://item.taobao.com/item.htm?id=<?php  echo $item['itemid'];?>" target="_blank"><img src="<?php  echo tomedia($item['itempic'])?>" width="50" height="" alt="" /></a></td>
                                      <td><?php  if($item['activity_type']=='聚划算') { ?>【聚划算】<?php  } ?><?php  if($item['activity_type']=='淘抢购') { ?>【淘抢购】<?php  } ?><?php  if($item['shoptype']=='B') { ?><span style="color:#60066e">【天猫】</span><?php  } else { ?><span style="color:#c43c00">【淘宝】</span><?php  } ?><?php  if($item['zd']==1) { ?><span style="color:#0000FF">【顶】</span><?php  } ?><?php  if($item['tj']==1) { ?><span style="color:#0000FF">【秒杀】</span><?php  } ?><?php  echo $item['itemtitle'];?><BR>
                                      <a href="http://pub.alimama.com/promo/search/index.htm?q=<?php echo urlencode('https://item.taobao.com/item.htm?id=')?><?php  echo $item['itemid'];?>" target="_blank" >点击去联盟查看</a>                                      
                                      <Br>商品ID：<?php  echo $item['itemid'];?>
                                        <?php  echo $item['tktype'];?>
                                        <Br><?php  if($item['videoid']) { ?>视频ID：<a href="http://cloud.video.taobao.com/play/u/1/p/1/e/6/t/1/<?php  echo $item['videoid'];?>.mp4" target="_blank"><?php  echo $item['videoid'];?> 观看</a><?php  } ?>
                                   
                                      <Br>优惠券ID：<?php  echo $item['quan_id'];?><BR><span style="color:#ff0000"><?php  if($item['qf']==1) { ?>已加入到群发库<?php  } ?></span></td>                                  
                                      <td><?php  echo $item['itemendprice'];?></td>
                                      <td>佣金比例：<?php  echo $item['tkrates'];?>%<br>佣金：<?php  if($item['tkmoney']<>0) { ?><?php  echo $item['tkmoney'];?><?php  } else { ?><?php  echo $item['itemendprice']*$item['tkrates']/100?><?php  } ?>元</td>
                                      
                                      <td><?php  echo $item['couponmoney'];?></td>
                                      <td><?php  echo $item['couponnum'];?></td>
                                      <td style="overflow: visible;">
                                      <?php  if($item['couponendtime']<>'1970-01-01') { ?>优惠券结束：<?php  echo date('Y-m-d',$item['couponendtime'])?><?php  } ?><br>采集时间：<?php  echo date('Y-m-d H:i:s',$item['createtime'])?><br>
                                      </td>
                                      <td style="text-align:right;">
                                        <a href="<?php  echo $this->createWebUrl('tbgoods', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>编辑</a>
                                        <a href="<?php  echo $this->createWebUrl('tbgoods', array('id' => $item['id'], 'op' => 'delete'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除" class="btn btn-sm btn-default"><i class="fa fa-remove"></i>删除</a>
                                      </td>
                                    </tr>                                    
                                    <?php  } } ?>   
                                    <?php  } else { ?>
                                    <tr>
                                      <td colspan='7' style="text-align:center">暂无产品</td>
                                    </tr>
                                    <?php  } ?>
                                    <tr>
                                      <td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
                                      <td colspan="6" style="text-align: left !important;">
                                        <input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
                                        <input type="submit" class="btn btn-primary" name="submit" value="批量删除" />                                          
                                        <!--<input type="submit" class="btn btn-primary" name="submitzd" value="批量【设置】置顶" />-->
                                        <!--input type="submit" class="btn btn-primary" name="submitrq" value="批量设置人气" /-->
                                       <!-- <input type="submit" class="btn btn-danger" name="submitqxzd" value="批量【取消】置顶" /><Br><Br>-->
                                        <input type="submit" class="btn btn-primary" name="submitms" value="批量【设置】秒杀" />
                                        <input type="submit" class="btn btn-danger" name="submitmsqx" value="批量【取消】秒杀" />                                        
                                        <Br><Br>
                                         <div class="input-group" style="float:left">
                                            <select class="form-control" name="type" id="type">
                                               <?php  if(is_array($fzlist)) { foreach($fzlist as $v) { ?>
                                                <option <?php  if(!empty($v) && $v['id'] == $type) { ?>selected<?php  } ?> value="<?php  echo $v['id'];?>"><?php  echo $v['title'];?></option>
                                               <?php  } } ?>
                                            </select>                
                                            </div>                                            
                                       <input type="submit" class="btn btn-danger" name="submitqxfl" value="批量分类" /><Br><Br>

                                       <div class="input-group" style="float:left">
                                            <select class="form-control" name="zt" id="zt">
                                               <?php  if(is_array($ztlist)) { foreach($ztlist as $v) { ?>
                                                <option <?php  if(!empty($v) && $v['id'] == $type) { ?>selected<?php  } ?> value="<?php  echo $v['id'];?>"><?php  echo $v['title'];?></option>
                                               <?php  } } ?>
                                            </select>                
                                            </div>                                            
                                       <input type="submit" class="btn btn-danger" name="submitqxzt" value="批量设置到专题" />
                                      </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                      <td colspan="6" style="text-align: left !important;">
                                         <input type="submit" class="btn btn-primary" name="qf" value="批量【设置】到群发库" />
                                         <input type="submit" class="btn btn-danger" name="scqf" value="批量【取消】到群发库" />
                                      </td>
                                    </tr>




                                    <tr>
                                      <td></td>
                                      <td colspan="8" style="text-align: left !important;">
                                      
                                        <!--<a class="btn btn-danger" href="<?php  echo $this->createWebUrl('tbgoodsgx', array('op' => 'xjdq'))?>"/><i class="glyphicon glyphicon-remove"></i> 一键【下架】优惠券【到期】商品</a>-->

                                        <a class="btn btn-primary" href="<?php  echo $this->createWebUrl('tbgoodsgx', array('op' => 'qkdq'))?>"/><i class="glyphicon glyphicon-remove"></i> 一键【清空】优惠券【到期】商品</a>
                                        
                                        <a class="btn btn-danger" href="<?php  echo $this->createWebUrl('tbgoodsgx', array('op' => 'xjw'))?>"/><i class="glyphicon glyphicon-remove"></i> 一键【下架】【无】优惠券商品</a>

                                        <a class="btn btn-primary" href="<?php  echo $this->createWebUrl('tbgoodsgx', array('op' => 'qkw'))?>"/><i class="glyphicon glyphicon-remove"></i> 一键【清空】【无】优惠券商品</a>
                                        
                                        <a  onclick="return confirm('确认进行此操作吗？数据量大请耐心等待！'); return false;" class="btn btn-primary" href="<?php  echo $this->createWebUrl('tbgoodsgx', array('op' => 'ycq'))?>"/><i class="glyphicon glyphicon-remove"></i> 一键【清空】隐藏券商品</a>

                                      </td>
                                    </tr>
                               </table>
                        </form>
                        </div>
                         <?php  echo $pager;?>

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
<?php
$uninstallSql = <<<sql
DROP TABLE IF EXISTS `ims_tiger_newhu_ad`;

DROP TABLE IF EXISTS `ims_tiger_newhu_appbottomdh`;

DROP TABLE IF EXISTS `ims_tiger_newhu_appdh`;

DROP TABLE IF EXISTS `ims_tiger_newhu_appset`;

DROP TABLE IF EXISTS `ims_tiger_newhu_cdtype`;

DROP TABLE IF EXISTS `ims_tiger_newhu_ck`;

DROP TABLE IF EXISTS `ims_tiger_newhu_dborder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_dbrecord`;

DROP TABLE IF EXISTS `ims_tiger_newhu_dianyuan`;

DROP TABLE IF EXISTS `ims_tiger_newhu_dwz`;

DROP TABLE IF EXISTS `ims_tiger_newhu_faquan`;

DROP TABLE IF EXISTS `ims_tiger_newhu_fztype`;

DROP TABLE IF EXISTS `ims_tiger_newhu_fztype2`;

DROP TABLE IF EXISTS `ims_tiger_newhu_gfhuodong`;

DROP TABLE IF EXISTS `ims_tiger_newhu_goods`;

DROP TABLE IF EXISTS `ims_tiger_newhu_hexiao`;

DROP TABLE IF EXISTS `ims_tiger_newhu_jdorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_jdtjorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_jdyfgorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_jl`;

DROP TABLE IF EXISTS `ims_tiger_newhu_lxorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_mdorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_member`;

DROP TABLE IF EXISTS `ims_tiger_newhu_miandangoods`;

DROP TABLE IF EXISTS `ims_tiger_newhu_miandanset`;

DROP TABLE IF EXISTS `ims_tiger_newhu_mobanmsg`;

DROP TABLE IF EXISTS `ims_tiger_newhu_msg`;

DROP TABLE IF EXISTS `ims_tiger_newhu_news`;

DROP TABLE IF EXISTS `ims_tiger_newhu_newtbgoods`;

DROP TABLE IF EXISTS `ims_tiger_newhu_order`;

DROP TABLE IF EXISTS `ims_tiger_newhu_paylog`;

DROP TABLE IF EXISTS `ims_tiger_newhu_pddorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_pddtjorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_poster`;

DROP TABLE IF EXISTS `ims_tiger_newhu_qiandao`;

DROP TABLE IF EXISTS `ims_tiger_newhu_qtzlist`;

DROP TABLE IF EXISTS `ims_tiger_newhu_qudaolist`;

DROP TABLE IF EXISTS `ims_tiger_newhu_qudaosign`;

DROP TABLE IF EXISTS `ims_tiger_newhu_record`;

DROP TABLE IF EXISTS `ims_tiger_newhu_request`;

DROP TABLE IF EXISTS `ims_tiger_newhu_sdorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_set`;

DROP TABLE IF EXISTS `ims_tiger_newhu_share`;

DROP TABLE IF EXISTS `ims_tiger_newhu_shoucang`;

DROP TABLE IF EXISTS `ims_tiger_newhu_tbgoods`;

DROP TABLE IF EXISTS `ims_tiger_newhu_tbgoodsqf`;

DROP TABLE IF EXISTS `ims_tiger_newhu_ticket`;

DROP TABLE IF EXISTS `ims_tiger_newhu_tixianlog`;

DROP TABLE IF EXISTS `ims_tiger_newhu_tkorder`;

DROP TABLE IF EXISTS `ims_tiger_newhu_tksign`;

DROP TABLE IF EXISTS `ims_tiger_newhu_txlog`;

DROP TABLE IF EXISTS `ims_tiger_newhu_xcxdh`;

DROP TABLE IF EXISTS `ims_tiger_newhu_xcxmobanmsg`;

DROP TABLE IF EXISTS `ims_tiger_newhu_xcxsend`;

DROP TABLE IF EXISTS `ims_tiger_newhu_zttype`;

DROP TABLE IF EXISTS `ims_tiger_app_hb`;

DROP TABLE IF EXISTS `ims_tiger_app_mobsend`;

DROP TABLE IF EXISTS `ims_tiger_app_tuanzhangset`;

sql;
$row = pdo_run($unstallSql);
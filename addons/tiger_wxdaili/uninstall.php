<?php
$uninstallSql = <<<sql
DROP TABLE IF EXISTS `ims_tiger_wxdaili_ad`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_dlshuju`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_jdpid`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_order`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_pddpid`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_qun`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_qunmember`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_set`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_tkpid`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_txlog`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_tzyjlog`;

DROP TABLE IF EXISTS `ims_tiger_wxdaili_yjlog`;

sql;
$row = pdo_run($unstallSql);
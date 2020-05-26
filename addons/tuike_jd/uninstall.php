<?php
$uninstallSql = <<<sql
DROP TABLE IF EXISTS `ims_tuike_jd_jdset`;

DROP TABLE IF EXISTS `ims_tuike_jd_jdsign`;

sql;
$row = pdo_run($unstallSql);
<?php
$uninstallSql = <<<sql
DROP TABLE IF EXISTS `ims_tuike_pdd_pddsign`;

DROP TABLE IF EXISTS `ims_tuike_pdd_set`;

sql;
$row = pdo_run($unstallSql);
<?php
 defined('IN_IA') or exit('Access Denied'); class Tuike_jdModuleSite extends WeModuleSite { public $cfg; public function __construct() { goto vbsz1; Z660A: $s = pdo_fetch('select settings from ' . tablename('uni_account_modules') . " where module='tiger_newhu' and uniacid='{$weid}'"); goto a1gX6; LPmLd: $weid = $_W['uniacid']; goto Z660A; a1gX6: $this->cfg = unserialize($s['settings']); goto GwavX; vbsz1: global $_W, $_GPC; goto LPmLd; GwavX: } public function doWebIndex() { global $_W, $_GPC; include $this->template('index'); } public function doMobileCs() { goto Xozsz; eHjfe: $arr['spaceNameList'] = array("我这里测试"); goto uIrKU; Xozsz: $arr['unionId'] = '1000768726'; goto Nl9Ba; KVHfD: exit; goto j9dVA; Z4CRu: $arr = json_decode($goodslist, true); goto H8d6E; Jsk6o: print_r($arr); goto KVHfD; jJTjz: print_r($arr); goto tx4ha; wBgQC: echo '<pre>'; goto BPq_H; B2rtX: $arr['unionType'] = '1'; goto LpVyh; H8d6E: echo '<pre>'; goto Jsk6o; BPq_H: echo json_encode($arr); goto jJTjz; uIrKU: $arr = array("positionReq" => $arr); goto wBgQC; tx4ha: $goodslist = $this->cjget('jd.union.open.position.create', $arr); goto Z4CRu; LpVyh: $arr['type'] = '4'; goto eHjfe; Nl9Ba: $arr['key'] = 'e4209eac5db9f8e2b47606b5dcb48c182731996c9ddbac216f896dfaf6c2a9bde4d079e3bb12cfea'; goto B2rtX; j9dVA: } public function jdviewzl($jdset, $itemid, $p_id, $discount_link) { goto WjPYr; bHmZQ: $arr['chainType'] = '2'; goto V5M2o; rBvGj: goto JtlI2; goto DBdiI; QHWfu: return $arr['message']; goto rBvGj; K_3I1: return $arr['data']['shortURL']; goto HIdJ9; D5peG: if ($arr['message'] == 'success') { goto rbQvX; } goto QHWfu; HIdJ9: JtlI2: goto mN8vS; WjPYr: $arr = array(); goto rn92T; yCeOA: $arr = json_decode($goodslist, true); goto eg7qL; SG8Tz: $arr['couponUrl'] = $discount_link; goto bHmZQ; wpB0T: $arr['positionId'] = $p_id; goto SG8Tz; zRyvl: $arr['unionId'] = $jdset['unionid']; goto wpB0T; V5M2o: $arr = array("promotionCodeReq" => $arr); goto HnnGg; eg7qL: $arr = json_decode($arr['jd_union_open_promotion_byunionid_get_response']['result'], true); goto D5peG; rn92T: $arr['materialId'] = 'https://wqitem.jd.com/item/view?sku=' . $itemid; goto zRyvl; DBdiI: rbQvX: goto K_3I1; HnnGg: $goodslist = $this->cjget('jd.union.open.promotion.byunionid.get', $arr); goto yCeOA; mN8vS: } public function cjget($method, $arr) { goto rqpSY; F2rf0: $arr1 = array("timestamp" => $timestamp, "v" => "1.0", "sign_method" => "md5", "format" => "json", "method" => $method, "param_json" => $param_json, "app_key" => $app_key); goto NaP4n; j41cK: $timestamp = date('Y-m-d H:i:s', time()); goto kmGec; kmGec: $param_json = json_encode($arr); goto F2rf0; CqWu0: $arr = $this->tigercurl($url); goto qIkGY; Gchy1: $url = 'https://router.jd.com/api?v=1.0&method=' . $method . '&app_key=' . $app_key . '&sign_method=md5&format=json&timestamp=' . urlencode($timestamp) . '&sign=' . $sign . '&param_json=' . urlencode($param_json); goto CqWu0; NaP4n: $pxarr = $this->jdcs1px($arr1); goto N3_X5; rqpSY: $app_key = 'd208dae5afb44db190b8f912e4c6de02'; goto j41cK; N3_X5: $sign = $this->jdsign1($pxarr); goto Gchy1; qIkGY: return $arr; goto iuuZ5; iuuZ5: } function tigercurl($url, $params = false, $ispost = 0) { goto PW2vm; n1LLw: return false; goto FLzkK; g2hrY: if ($ispost) { goto lPusE; } goto ex9S5; t_nnV: curl_close($ch); goto sb3vo; OoQup: S1lnV: goto gk5G6; UvHCk: goto S1lnV; goto WFNr3; sb3vo: return $response; goto Gnxum; kdoAd: $ch = curl_init(); goto qI4RC; PW2vm: $httpInfo = array(); goto kdoAd; mInqX: curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); goto oqf_L; QhYcN: curl_setopt($ch, CURLOPT_POST, true); goto XE15z; GYS_W: curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); goto g2hrY; qqEXY: curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); goto mInqX; FKJX0: goto QZCfp; goto ecGj_; WstfJ: curl_setopt($ch, CURLOPT_TIMEOUT, 60); goto qqEXY; KMDvO: curl_setopt($ch, CURLOPT_USERAGENT, 'JuheData'); goto xuEcD; XE15z: curl_setopt($ch, CURLOPT_POSTFIELDS, $params); goto XQJ8b; xuEcD: curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60); goto WstfJ; Ss8qr: curl_setopt($ch, CURLOPT_URL, $url); goto FKJX0; oqf_L: curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); goto GYS_W; gk5G6: $response = curl_exec($ch); goto nU5gm; XQJ8b: curl_setopt($ch, CURLOPT_URL, $url); goto OoQup; nU5gm: if (!($response === FALSE)) { goto qJVlf; } goto n1LLw; yW_j8: QZCfp: goto UvHCk; oAW7J: $httpInfo = array_merge($httpInfo, curl_getinfo($ch)); goto t_nnV; ex9S5: if ($params) { goto xvXZS; } goto Ss8qr; ecGj_: xvXZS: goto kGO_0; qI4RC: curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); goto KMDvO; kGO_0: curl_setopt($ch, CURLOPT_URL, $url . '?' . $params); goto yW_j8; FLzkK: qJVlf: goto I5e3f; I5e3f: $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); goto oAW7J; WFNr3: lPusE: goto QhYcN; Gnxum: } public function jdcs1px($array) { goto pFoaJ; pFoaJ: ksort($array); goto OmfsZ; FT3PC: vemsi: goto lWgKx; UupDV: Ph2Jk: goto jABk8; yKwcE: goto Ph2Jk; goto FT3PC; jABk8: if (!(list($key, $val) = each($array))) { goto vemsi; } goto DlMAJ; lWgKx: return trim($string); goto RxWv4; DlMAJ: $string = $string . $key . $val; goto yKwcE; OmfsZ: $string = ''; goto UupDV; RxWv4: } public function jdcs2px($array) { ksort($array); return json_encode($array); } public function jdsign1($arr1) { goto YM7Q2; tnLBX: $string = $App_Secret . $arr1 . $App_Secret; goto ivigd; YM7Q2: $app_key = 'd208dae5afb44db190b8f912e4c6de02'; goto yyOx1; ivigd: $md5str = MD5($string); goto Ey4mN; Ey4mN: return strtoupper($md5str); goto IDBqN; yyOx1: $App_Secret = '176fa13b38594dc187f4719fcc0c7253'; goto tnLBX; IDBqN: } public function Text_qzj($Text, $Front, $behind) { goto ngMPc; uH4K2: if ($t1 == FALSE) { goto zIOjn; } goto jzIEf; t2F8M: zIOjn: goto C4JvE; C8yua: $t2 = mb_strpos($temp, $behind); goto U1aQD; jzIEf: $t1 = $t1 - 1 + strlen($Front); goto BkiVt; kiKXO: return mb_substr($temp, 0, $t2); goto QCKce; BkiVt: goto qidex; goto t2F8M; zGYqk: return ''; goto iJT92; U1aQD: if (!($t2 == FALSE)) { goto k1XFm; } goto zGYqk; ngMPc: $t1 = mb_strpos('.' . $Text, $Front); goto uH4K2; C4JvE: return ''; goto Ro_V2; iJT92: k1XFm: goto kiKXO; Ro_V2: qidex: goto Aswnc; Aswnc: $temp = mb_substr($Text, $t1, strlen($Text) - $t1); goto C8yua; QCKce: } public function ptyjjl($endprice, $tkrate, $cfg) { goto dlTSJ; oXm5Q: if ($cfg['fxtype'] == 2) { goto iRErL; } goto EM52i; dlTSJ: global $_W; goto iN69j; ojpTi: return $yj1; goto iQs8m; jfisF: if (!empty($yongj)) { goto g9GVs; } goto f66nX; f66nX: $yongj = '0.00'; goto SVCaF; pgXyk: tixkD: goto ojpTi; Ov4g_: $yongj = $yj * $cfg['zgf'] / 100; goto jfisF; yvs17: HKqdm: goto Qq_lB; oXVZw: if ($cfg['fxtype'] == 1) { goto HKqdm; } goto oXm5Q; E7V71: iRErL: goto eK0aS; SVCaF: g9GVs: goto oXVZw; IgaAU: $yj1 = intval($yj1); goto UK9Nj; iN69j: $yj = $endprice * $tkrate / 100; goto Ov4g_; eK0aS: $yj1 = number_format($yongj, 2); goto pgXyk; EM52i: goto tixkD; goto yvs17; UK9Nj: goto tixkD; goto E7V71; Qq_lB: $yj1 = $yongj * $cfg['jfbl']; goto IgaAU; iQs8m: } public function sharejl($endprice, $tkrate, $bl, $share, $cfg) { goto I9nuR; myxf8: ZnOBw: goto xC_hg; waUa1: UA2H7: goto HlrLP; I9nuR: if ($share['dltype'] == 1) { goto ZnOBw; } goto KHhu3; rjLjw: goto UA2H7; goto myxf8; xC_hg: $yj = $this->dljiangli($endprice, $tkrate, $bl, $share); goto waUa1; HlrLP: return $yj; goto mlRsL; KHhu3: $yj = $this->ptyjjl($endprice, $tkrate, $cfg); goto rjLjw; mlRsL: } public function dljiangli($endprice, $tkrate, $bl, $share) { goto FNGOx; VzL34: ZW8Vy: goto xVBli; VHH0A: VxnxW: goto QgUt7; ZuIZd: $dlbl = $bl['dlbl1']; goto i_c5u; oXzTZ: $jrsjyj = $yj * $bl['dlbl1t3'] / 100; goto HNYI0; Rrnu2: ko9GW: goto ZuIZd; OgGv4: goto ZW8Vy; goto iN9ja; ST3GY: if ($bl['fxtype'] == 1) { goto x25xk; } goto WePFy; A6xBg: $dlbl = $fs['bl']; goto TAZP8; RkdtW: goto mvmgc; goto wJUwr; TAZP8: goto BlK0h; goto Rrnu2; HwID7: file_put_contents(IA_ROOT . '/addons/tiger_tkxcx/yj_log.txt', '
' . 'uid:' . $share['id'] . '------' . $yj . '-' . $jryj . '-' . $jrsjyj . '=' . $jrzyj, FILE_APPEND); goto UtEWG; rd0y6: $jrzyj = $yj - $jryj - $jrsjyj; goto HwID7; ZhcGD: if (empty($sjshare['helpid'])) { goto yWoBv; } goto oXzTZ; ueGHK: goto mM36w; goto VHH0A; GgTjN: $jryj = $yj * $bl['dlbl1t2'] / 100; goto OgGv4; FoesC: if (empty($share['helpid'])) { goto yHBdY; } goto GgTjN; i_c5u: BlK0h: goto ST3GY; VcOpW: fnOyt: goto v7p2B; kBWov: x25xk: goto Eu1R9; FNGOx: global $_W; goto wIFSU; wJUwr: hE72e: goto FoesC; HNYI0: goto LQAiu; goto O7s6r; dVJMc: if (empty($share['helpid'])) { goto VxnxW; } goto wVBLS; L1PSn: ikfHk: goto dVJMc; xVBli: goto mvmgc; goto L1PSn; wVBLS: $sjshare = pdo_fetch('select * from ' . tablename('tiger_newhu_share') . " where weid='{$share['weid']}'and dltype=1 and id='{$share['helpid']}'"); goto fLcJp; d8zit: if ($bl['dltype'] == 2) { goto hE72e; } goto zOFbJ; BKFog: duM9b: goto jHdwu; MN11s: if (empty($bl['dlkcbl'])) { goto fnOyt; } goto z0qRY; UtEWG: $dlrate = number_format($jrzyj, 2); goto c2Xtd; O7s6r: yWoBv: goto sX_xu; TF3Cy: LQAiu: goto ueGHK; WE1dY: $jryj = 0; goto VzL34; c_NIE: mvmgc: goto rd0y6; zOFbJ: if ($bl['dltype'] == 3) { goto ikfHk; } goto RkdtW; c2Xtd: goto duM9b; goto kBWov; eyzML: mM36w: goto c_NIE; QgUt7: $jryj = 0; goto eyzML; wIFSU: $dlyj = $endprice * $tkrate / 100; goto MN11s; sX_xu: $jrsjyj = 0; goto TF3Cy; WePFy: $yj = number_format($dlyj * $dlbl / 100, 2); goto d8zit; ZxRnS: if (empty($share['dlbl'])) { goto ko9GW; } goto A6xBg; iN9ja: yHBdY: goto WE1dY; jHdwu: return $dlrate; goto g0SDl; v7p2B: $fs = $this->jcbl($share, $bl); goto ZxRnS; fLcJp: $jryj = $yj * $bl['dlbl2t3'] / 100; goto ZhcGD; z0qRY: $dlyj = $dlyj * (100 - $bl['dlkcbl']) / 100; goto VcOpW; Eu1R9: $dlrate = number_format($dlyj * $dlbl / 100, 2); goto BKFog; g0SDl: } public function islogin() { goto oTc1f; IthJP: $mc = mc_fetch($fans['openid']); goto ZC3O_; ZC3O_: $fans = array("id" => $_SESSION['tkuid'], "tkuid" => $_SESSION['tkuid'], "wquid" => $mc['uid'], "credit1" => $share['credit1'], "credit2" => $share['credit2'], "nickname" => $share['nickname'], "avatar" => $share['avatar'], "helpid" => $share['helpid'], "dlptpid" => $share['dlptpid'], "unionid" => $share['unionid'], "from_user" => $share['from_user'], "openid" => $share['from_user'], "createtime" => $share['createtime'], "tgwid" => $share['tgwid'], "cqtype" => $share['cqtype'], "dltype" => $share['dltype'], "status" => $share['status']); goto VWmEv; y0U0A: dAL8r: goto IthJP; Ru6BH: $fans['openid'] = $_SESSION['openid']; goto YHdl_; oTc1f: global $_W; goto lqch7; VWmEv: return $fans; goto o9gcT; lqch7: if (empty($_SESSION['openid'])) { goto dAL8r; } goto Ru6BH; YHdl_: $share = pdo_fetch('select * from ' . tablename('tiger_newhu_share') . " where weid='{$_W['uniacid']}' and id='{$_SESSION['tkuid']}'"); goto y0U0A; o9gcT: } } ?>
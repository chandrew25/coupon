<?php
 goto V2PBp; oFyP5: function gettjlist($tj = '', $num = '', $startime = '', $endtime = '', $cfg = '', $rate = '') { goto JCFYC; Gv7Cp: $num = 6; goto b8Qzp; O1gDQ: $arr = getcurl($url); goto iCDgr; JCFYC: if (!empty($num)) { goto MTCRF; } goto Gv7Cp; iCDgr: $arr = @json_decode($arr, true); goto uWS4C; Uhr9L: $url = "\x68\x74\164\x70\x3a\x2f\x2f\154\x61\157\150\x75\x63\x6d\163\56\x63\157\155\x2f\x74\153\x61\x70\x69\57\151\x6e\144\x65\x78\x2f\147\x65\x74\164\152\x6c\151\163\164\x2e\150\x74\x6d\154\77\164\152\x3d" . $tj . "\46\156\x75\155\x3d" . $num . "\46\163\x74\141\162\164\151\155\x65\75" . $startime . "\x26\145\156\144\x74\151\155\145\75" . $endtime . "\x26\x74\x62\151\x64\x3d" . $tbid . "\x26\162\141\164\145\75" . $rate; goto O1gDQ; C7BCY: $tbid = $cfg["\x74\142\x75\x69\144"]; goto Uhr9L; uWS4C: return $arr; goto m0UWY; b8Qzp: MTCRF: goto C7BCY; m0UWY: } goto RkyD_; yWu3e: function tklnew($tkl, $adzoneid, $siteId, $sign) { goto NZdHw; PxsXf: $content = htmlspecialchars_decode($arr); goto lD1vD; j3IW0: return $arr1; goto Lcw5C; lD1vD: $arr1 = @json_decode($content, true); goto j3IW0; NZdHw: $url = "\150\x74\164\160\x3a\57\57\x61\160\151\x31\x2e\164\151\x67\145\162\x74\x61\157\153\x65\x2e\143\157\155\57\164\153\154\156\x65\x77\56\160\150\x70\77\141\144\x7a\x6f\156\145\151\x64\x3d" . $adzoneid . "\x26\163\x69\164\145\x49\x64\75" . $siteId . "\x26\x73\x69\147\x6e\x3d" . $sign . "\46\164\153\154\x3d" . urlencode($tkl); goto wmfh8; wmfh8: $arr = getcurl($url); goto PxsXf; Lcw5C: } goto grQIr; grQIr: function qudaoget($code, $sign) { goto q464h; q464h: $url = "\x68\164\x74\x70\72\x2f\57\141\x70\x69\x31\x2e\164\x69\147\x65\x72\x74\x61\157\153\145\56\x63\157\x6d\x2f\x71\x75\144\x61\157\x61\x70\151\x2e\x70\150\x70\x3f\x63\157\x64\x65\x3d" . $code . "\46\163\x69\x67\x6e\x3d" . $sign; goto tjQxt; m_UuH: return $arr; goto sMuCN; iqbVC: $arr = @json_decode($arr, true); goto m_UuH; tjQxt: $arr = getcurl($url); goto iqbVC; sMuCN: } goto RKS8R; ppoPQ: function getddqlist($type = '') { goto jyM8t; H2wJS: $arr = @json_decode($arr, true); goto f3lf3; jyM8t: $url = "\x68\164\x74\x70\x3a\x2f\x2f\154\141\157\150\165\143\155\163\56\143\x6f\x6d\x2f\164\x6b\x61\160\x69\x2f\x69\x6e\144\x65\170\57\147\x65\x74\144\x64\161\x6c\151\x73\164\56\x68\x74\x6d\x6c\x3f\x74\x79\x70\x65\75" . $type; goto dn78M; dn78M: $arr = getcurl($url); goto H2wJS; f3lf3: return $arr; goto lABiE; lABiE: } goto dWUrX; RKS8R: function qudaolist($sign) { goto NSLmr; NSLmr: $url = "\x68\x74\164\x70\72\57\x2f\141\x70\151\61\56\x74\x69\x67\x65\x72\164\141\157\x6b\145\x2e\143\x6f\155\57\161\165\144\x61\x6f\x61\160\151\154\x69\163\x74\56\160\x68\160\x3f\163\x69\x67\x6e\x3d" . $sign; goto B4iiK; RKkqG: $arr = @json_decode($arr, true); goto Strj5; B4iiK: $arr = getcurl($url); goto RKkqG; Strj5: return $arr; goto juJnC; juJnC: } goto PoCWX; mLI2C: function cjsearch($page = '', $pid = '', $sign = '', $tbuid = '', $wi = '', $cfg = '', $key = '', $platform = '', $tkrate = '', $StartPrice = '', $EndPrice = '', $haiwai = '', $tm = '', $sort = '', $yhj = '', $material_id = '') { goto LMjel; C3Chl: return $arr; goto jrnKU; xwvm0: $siteid = $pidSplit[2]; goto lVVor; lVVor: $adzoneid = $pidSplit[3]; goto Suh5U; LMjel: if (!empty($page)) { goto e3FIt; } goto EGUeC; n5isL: $arr = @json_decode($arr, true); goto C3Chl; AOZI2: $tkurl = urlencode($wi["\163\x65\x74\x74\x69\156\x67"]["\x73\x69\164\145"]["\165\x72\154"]); goto v9Tk8; Suh5U: $url = "\150\x74\164\x70\72\x2f\x2f\141\x70\x69\x31\x2e\154\x61\x6f\x68\165\143\x6d\x73\x2e\143\x6f\155\x2f\x63\x6a\163\x65\141\162\143\150\56\x70\x68\x70\77\171\x68\152\75" . $yhj . "\x26\163\157\x72\164\x3d" . $sort . "\x26\x61\x64\x7a\x6f\x6e\145\151\144\75" . $adzoneid . "\46\x73\x69\x74\x65\x49\x64\x3d" . $siteid . "\x26\x73\x69\x67\156\x3d" . $sign . "\x26\160\141\147\x65\75" . $page . "\46\x74\x62\x75\x69\144\x3d" . $tbuid . "\46\x74\153\x69\160\75" . $tkip . "\x26\x70\x6c\x61\164\146\157\162\155\x3d" . $platform . "\46\x74\153\x72\x61\x74\x65\x3d" . $tkrate . "\46\160\x72\x69\x63\x65\61\75" . $price1 . "\x26\x70\x72\x69\x63\145\x32\x3d" . $price2 . "\x26\150\x61\x69\167\x61\x69\x3d" . $haiwai . "\46\x74\x6d\x3d" . $tm . "\x26\x6b\145\x79\x3d" . $key . "\46\155\x61\x74\x65\162\151\x61\154\x5f\151\x64\x3d" . $material_id; goto c7mq3; EGUeC: $page = 1; goto bC7zI; v9Tk8: $tkip = get_server_ip(); goto LQd8b; bC7zI: e3FIt: goto AOZI2; LQd8b: $pidSplit = explode("\x5f", $pid); goto xwvm0; c7mq3: $arr = getcurl($url); goto n5isL; jrnKU: } goto d7giU; oHS9v: function getcurl1($url) { goto yASkp; yASkp: $ch = curl_init(); goto TOFUm; Huncz: curl_setopt($ch, CURLOPT_TIMEOUT, 10); goto Q8Xb3; Q8Xb3: curl_setopt($ch, CURLOPT_HEADER, 0); goto ue6Gj; ue6Gj: $output = curl_exec($ch); goto Lmll9; TOFUm: curl_setopt($ch, CURLOPT_URL, $url); goto gAmSC; gAmSC: curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); goto Huncz; KHhHw: return $output; goto mYzJO; Lmll9: curl_close($ch); goto KHhHw; mYzJO: } goto kyYau; PoCWX: function get_server_ip() { goto DZGN3; FzaLu: $server_ip = $_SERVER["\x53\105\x52\x56\105\122\137\101\x44\104\122"]; goto rDXEN; ZZNqA: zrwjV: goto FzaLu; m_7N5: goto ASpaq; goto IWouJ; DZGN3: if (isset($_SERVER)) { goto xBYh2; } goto OErkn; nbF2k: ASpaq: goto T9V5o; JQrXL: $server_ip = $_SERVER["\114\117\103\101\114\x5f\101\104\x44\122"]; goto sv9TJ; OErkn: $server_ip = getenv("\x53\x45\x52\126\x45\x52\137\101\104\x44\122"); goto m_7N5; T9V5o: return $server_ip; goto OgSpE; eMBID: if ($_SERVER["\x53\x45\x52\126\x45\122\x5f\x41\104\104\122"]) { goto zrwjV; } goto JQrXL; rDXEN: YQC3d: goto nbF2k; sv9TJ: goto YQC3d; goto ZZNqA; IWouJ: xBYh2: goto eMBID; OgSpE: } goto AQiZ7; RkyD_: function getddqtype() { goto gPCW2; x1Q99: $arr = @json_decode($arr, true); goto vocRh; I2nsy: $arr = getcurl($url); goto x1Q99; vocRh: return $arr; goto y_NgI; gPCW2: $url = "\150\x74\164\x70\72\x2f\57\x6c\x61\157\x68\165\x63\x6d\x73\56\x63\157\x6d\x2f\164\153\x61\x70\151\x2f\151\156\144\145\170\57\147\x65\x74\144\x64\161\164\x79\160\x65\x2e\x68\x74\x6d\x6c"; goto I2nsy; y_NgI: } goto ppoPQ; d7giU: function qtz($sign = '', $pid = '', $MaterialId = '', $page = '') { goto QG5SO; kXfav: $siteid = $pidSplit[2]; goto HE9HC; RtRRg: return $arr; goto WSWvd; mXy2r: $arr = getcurl($url); goto FyH7x; FyH7x: $arr = @json_decode($arr, true); goto RtRRg; HE9HC: $adzoneid = $pidSplit[3]; goto y0xjS; y0xjS: $url = "\150\x74\164\160\x3a\x2f\57\141\x70\x69\61\56\164\x69\147\145\x72\164\141\157\x6b\x65\x2e\x63\157\x6d\57\161\x74\172\x2e\x70\150\160\x3f\163\x69\147\156\x3d" . $sign . "\x26\101\144\x7a\x6f\x6e\x65\111\x64\x3d" . $adzoneid . "\x26\x4d\x61\x74\145\x72\151\141\x6c\111\x64\x3d" . $MaterialId . "\46\x53\151\x74\145\x49\x64\75" . $siteid . "\x26\160\x61\x67\145\x3d" . $page; goto mXy2r; QG5SO: $pidSplit = explode("\x5f", $pid); goto kXfav; WSWvd: } goto RtM12; V2PBp: function getclass($wi = '', $pid = '', $num = '', $type = '') { goto g5vEB; FY3QE: Zwh3x: goto MPRCN; YN4DF: goto P4SB9; goto UCFvj; zzoaX: if (!empty($page)) { goto Zwh3x; } goto L_D6D; UCFvj: lKhMe: goto QDEFb; SWZul: $arr = @json_decode($arr, true); goto MQEEO; Num2d: $tkip = get_server_ip(); goto zzoaX; g5vEB: $tkurl = urlencode($wi["\163\x65\164\x74\x69\x6e\147"]["\163\x69\164\145"]["\165\x72\154"]); goto Num2d; FK8Ac: $arr = getcurl($url); goto SWZul; MQEEO: return $arr; goto v2WH4; MPRCN: if ($type == 1) { goto lKhMe; } goto CKQ8m; CKQ8m: $url = "\x68\164\x74\x70\x3a\57\57\x6c\141\x6f\150\x75\x63\x6d\x73\x2e\143\157\155\x2f\164\x6b\x61\x70\x69\57\151\x6e\x64\145\170\x2f\147\145\x74\143\154\141\163\163\56\x68\x74\155\x6c\77\160\x69\x64\75" . $pid . "\x26\x6e\x75\155\75" . $num . ''; goto YN4DF; QDEFb: $url = "\150\x74\164\x70\x3a\x2f\57\x6c\141\157\150\x75\x63\155\163\x2e\x63\x6f\x6d\57\164\153\x61\160\x69\57\x69\156\x64\x65\170\x2f\x67\x65\x74\x67\172\x68\x63\154\141\x73\x73\x2e\x68\164\155\x6c\77\x70\x69\144\75" . $pid . "\46\156\165\x6d\x3d" . $num . ''; goto vv_v0; L_D6D: $page = 1; goto FY3QE; vv_v0: P4SB9: goto FK8Ac; v2WH4: } goto mDUW2; XzDYq: function getvideolist($wi = '', $cfg = '', $pid = '', $px = '', $num = '', $rate = '') { goto AMKIv; Dps84: return $arr; goto hynqR; dw5Rn: PcuUh: goto jCaHC; mWmom: $arr = getcurl($url); goto kNOsm; kNOsm: $arr = @json_decode($arr, true); goto Dps84; jCaHC: $url = "\150\164\x74\x70\x3a\x2f\57\x6c\141\157\x68\165\x63\x6d\163\56\143\x6f\155\57\x74\153\x61\x70\151\x2f\151\156\144\x65\170\57\x67\x65\164\166\x69\144\145\157\x6c\151\x73\x74\56\x68\x74\x6d\154\x3f\156\x75\x6d\75" . $num . "\x26\x70\170\75" . $px . "\46\162\x61\164\x65\x3d" . $rate; goto mWmom; uv7UK: if (!empty($num)) { goto PcuUh; } goto Ws9wZ; AMKIv: $tkurl = urlencode($wi["\x73\x65\164\164\151\156\x67"]["\x73\x69\x74\145"]["\165\162\154"]); goto HFWPB; xZpTw: $page = 1; goto YBgCi; Ws9wZ: $num = 1; goto dw5Rn; YBgCi: FRson: goto uv7UK; VIvPN: if (!empty($page)) { goto FRson; } goto xZpTw; HFWPB: $tkip = get_server_ip(); goto VIvPN; hynqR: } goto fOUgb; RtM12: function getview($itemid = '') { goto yLw2C; RbcWb: return $arr["\143\x6f\156\164\145\156\164"]; goto l4xJ7; yLw2C: $url = "\150\x74\x74\x70\x3a\x2f\57\x6c\141\x6f\150\165\x63\155\x73\56\x63\x6f\155\57\164\x6b\141\160\x69\57\x69\156\x64\145\x78\x2f\x67\145\x74\x76\x69\x65\167\x2e\x68\164\155\x6c\77\x69\164\x65\x6d\151\x64\x3d" . $itemid; goto hQrxu; hQrxu: $arr = getcurl($url); goto Fkz3x; Fkz3x: $arr = @json_decode($arr, true); goto RbcWb; l4xJ7: } goto oHS9v; dWUrX: function tbdwzurl($url) { goto jPF33; jPF33: $url = "\150\x74\164\160\72\x2f\x2f\141\x70\151\61\x2e\154\x61\157\150\x75\143\x6d\163\x2e\143\157\x6d\x2f\x67\145\x74\x75\162\x6c\56\160\x68\x70\x3f\x75\x72\154\x3d" . urlencode($url); goto HwRYu; kCDbP: return $str; goto MAaxg; HwRYu: $str = getcurl($url); goto kCDbP; MAaxg: } goto kvWi5; UCy6F: function getviewcat($type = '', $num = '', $cfg = '', $rate = '') { goto oKKJf; r21We: $tbid = $cfg["\164\142\x75\151\x64"]; goto O2_1z; miFug: $arr = @json_decode($arr, true); goto Nus2P; oKKJf: if (!empty($num)) { goto oShoy; } goto rwSOF; O2_1z: $url = "\150\x74\164\x70\x3a\x2f\x2f\x6c\141\157\x68\x75\x63\x6d\x73\x2e\143\157\155\x2f\x74\153\141\x70\x69\x2f\151\x6e\144\x65\170\x2f\x67\x65\164\x6c\151\163\x74\56\150\164\x6d\x6c\x3f\x74\171\x70\145\x3d" . $type . "\46\x6e\x75\155\75" . $num . "\46\164\142\x69\144\75" . $tbid . "\46\x72\x61\164\x65\75" . $rate; goto OFIws; rwSOF: $num = 6; goto DMMCT; DMMCT: oShoy: goto r21We; OFIws: $arr = getcurl($url); goto miFug; Nus2P: return $arr; goto sCTOR; sCTOR: } goto oFyP5; AQiZ7: function getnewclass($wi = '', $pid = '', $num = '', $type = '') { goto r8OkQ; MEsv2: return $arr; goto j1OCo; O_K8u: if (!empty($page)) { goto GWD5g; } goto S7Q9r; qVmd8: $tkip = get_server_ip(); goto O_K8u; ZRWRW: zsoas: goto XCXL7; SRU5v: $arr = @json_decode($arr, true); goto MEsv2; r8OkQ: $tkurl = urlencode($wi["\x73\145\x74\164\x69\x6e\147"]["\163\x69\164\x65"]["\x75\162\x6c"]); goto qVmd8; hV2i9: $url = "\x68\x74\x74\160\72\x2f\57\154\x61\x6f\150\x75\143\155\x73\56\143\x6f\155\57\164\153\141\160\x69\57\x69\x6e\144\x65\x78\57\x67\x65\164\x67\x7a\150\143\154\x61\x73\163\x2e\x68\164\155\x6c\x3f\x70\x69\144\x3d" . $pid . "\x26\156\x75\x6d\x3d" . $num . ''; goto ZRWRW; S7Q9r: $page = 1; goto Yq_yG; UCKBN: $url = "\150\164\164\160\x3a\x2f\57\154\x61\x6f\x68\x75\x63\x6d\163\56\x63\x6f\155\57\164\153\x61\160\x69\57\x69\x6e\x64\x65\x78\57\x67\145\164\x6e\145\x77\x63\154\x61\163\163\x2e\150\164\x6d\154\x3f\x70\151\x64\x3d" . $pid . "\x26\x6e\165\155\x3d" . $num . ''; goto Pahqi; Pahqi: goto zsoas; goto kQjqu; kQjqu: wjFmb: goto hV2i9; XCXL7: $arr = getcurl($url); goto SRU5v; XpbE9: if ($type == 1) { goto wjFmb; } goto UCKBN; Yq_yG: GWD5g: goto XpbE9; j1OCo: } goto XzDYq; kvWi5: function gethaoquan($type = '', $page = '', $pid = '', $sign = '', $wi = '', $cfg = '', $class = '', $rate = '') { goto Jcv2A; EV0uK: $arr = @json_decode($arr, true); goto sN1wH; Hk3RY: $arr = getcurl($url); goto EV0uK; wKy5I: if (!empty($class)) { goto CcQeA; } goto MMgwq; vn8ZP: $adzoneid = $pidSplit[3]; goto wKy5I; NPQTz: $url = "\x68\164\x74\160\72\x2f\x2f\x61\x70\x69\x31\x2e\154\141\x6f\x68\x75\x63\x6d\163\x2e\143\157\x6d\x2f\160\x69\x6e\160\141\151\x2e\x70\150\x70\77\x61\x64\172\157\156\x65\151\144\x3d" . $adzoneid . "\46\163\x69\164\x65\x49\144\75" . $siteid . "\x26\x63\x6c\141\x73\163\75" . $class . "\46\163\151\x67\x6e\x3d" . $sign . "\x26\160\141\147\145\75" . $page . "\46\162\141\x74\x65\75" . $rate; goto bDN6b; KRM90: if ($type == 1) { goto r_lMl; } goto NPQTz; QGRJg: $page = 1; goto eUpfo; gj7jh: $siteid = $pidSplit[2]; goto vn8ZP; bDN6b: goto njMoT; goto VxF2Z; Vl2MF: $tkip = get_server_ip(); goto R2jxo; sN1wH: return $arr["\x6d\x73\147"]; goto rgymP; eUpfo: Y5I02: goto Iy0Dw; Iy0Dw: $tkurl = urlencode($wi["\x73\145\164\164\151\x6e\147"]["\163\x69\164\145"]["\x75\162\154"]); goto Vl2MF; egOI_: CcQeA: goto KRM90; fxpmk: file_put_contents(IA_ROOT . "\57\x61\x64\144\x6f\156\x73\x2f\x74\151\147\x65\x72\x5f\156\x65\167\x68\165\x2f\151\x6e\x63\x2f\163\144\153\57\164\142\x6b\x2f\x6c\157\147\x2e\164\170\164", "\xa\40\141\141\x61\141\141\x73\x73\x73\x73\62\x3a" . $url, FILE_APPEND); goto Hk3RY; R2jxo: $pidSplit = explode("\137", $pid); goto gj7jh; Jcv2A: if (!empty($page)) { goto Y5I02; } goto QGRJg; MMgwq: $class = "\x7a\157\156\147\x68\145"; goto egOI_; VxF2Z: r_lMl: goto g6l63; DRC_R: njMoT: goto fxpmk; g6l63: $url = "\150\x74\164\x70\72\x2f\x2f\x61\160\151\x31\56\154\x61\157\150\x75\x63\x6d\163\56\143\x6f\x6d\57\x68\141\x6f\x71\x75\x61\x6e\x2e\160\150\x70\77\x61\144\x7a\157\x6e\145\151\x64\x3d" . $adzoneid . "\46\163\151\164\145\111\x64\x3d" . $siteid . "\46\x63\x6c\x61\x73\163\x3d" . $class . "\x26\x73\x69\147\156\x3d" . $sign . "\x26\160\141\x67\145\75" . $page . "\x26\x72\x61\x74\x65\75" . $rate; goto DRC_R; rgymP: } goto mLI2C; fOUgb: function getcatlist($type = '', $px = '', $tm = '', $price1 = '', $price2 = '', $hd = '', $page = '', $key = '', $dlyj = '', $pid = '', $cfg = '', $rate = '', $hdtype = '', $sale = '', $pricedesc = '') { goto KBl0F; VU8S0: pXUze: goto zCWOv; BQeCh: $page = 1; goto VU8S0; KBl0F: if (!empty($page)) { goto pXUze; } goto BQeCh; AnQ6N: return $arr; goto HB04A; BXMDB: $url = "\x68\164\x74\x70\x3a\57\x2f\x6c\x61\157\x68\165\x63\x6d\163\56\x63\x6f\155\57\164\x6b\x61\160\151\57\151\156\x64\x65\170\57\164\151\147\x65\162\x6c\x69\163\x74\56\150\x74\x6d\x6c\77\x74\x79\x70\x65\75" . $type . "\46\160\170\75" . $px . "\46\164\142\151\144\75" . $tbid . "\x26\164\x6d\x3d" . $tm . "\x26\160\162\x69\x63\145\x31\x3d" . $price1 . "\46\x70\x72\151\143\x65\62\75" . $price2 . "\46\150\144\75" . $hd . "\x26\x70\x61\x67\145\x3d" . $page . "\x26\153\145\x79\75" . $key . "\46\162\x61\x74\x65\x3d" . $rate . "\46\x68\x64\164\x79\160\x65\x3d" . $hdtype . "\46\163\x61\x6c\x65\x3d" . $sale . "\46\160\x72\151\x63\145\144\145\x73\143\75" . $pricedesc; goto gCi5Z; Gyh5d: $arr = @json_decode($arr, true); goto AnQ6N; gCi5Z: $arr = getcurl($url); goto Gyh5d; zCWOv: $tbid = $cfg["\x74\142\165\x69\x64"]; goto BXMDB; HB04A: } goto UCy6F; mDUW2: function shopurl($shopid, $adzoneid, $siteid, $sign) { goto PnwJd; Bujse: $arr = getcurl($url); goto n6Xxw; n6Xxw: return $arr; goto rRmrC; PnwJd: $url = "\150\164\164\x70\x3a\x2f\57\x61\x70\x69\61\56\164\151\147\145\x72\x74\x61\x6f\153\x65\56\x63\157\155\x2f\163\150\157\160\165\162\154\56\160\150\160\x3f\x75\x73\x65\162\151\x64\x3d" . $shopid . "\46\163\x69\x74\x65\x69\x64\x3d" . $siteid . "\46\x61\144\172\157\156\x65\x69\144\x3d" . $adzoneid . "\x26\163\151\147\x6e\75" . $sign; goto Bujse; rRmrC: } goto yWu3e; kyYau: function getcurl($url = '', $post = '', $cookie = '', $returnCookie = 0) { goto uOLVp; E6lbB: if ($returnCookie) { goto VW7fg; } goto ysa4N; XBMAX: curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post)); goto J7buH; PVNBD: IfpCV: goto qfWeJ; hRZ2r: return $info; goto PVNBD; SUYwe: return curl_error($curl); goto L6X_S; X78pZ: list($header, $body) = explode("\15\xa\xd\xa", $data, 2); goto Wj1Ms; rOo19: $data = curl_exec($curl); goto GEZYY; WYASf: curl_setopt($curl, CURLOPT_HEADER, $returnCookie); goto fl227; BI6dB: if (!$post) { goto YzLGP; } goto nXOob; ysa4N: return $data; goto cXFGm; XEfZ6: JMWTz: goto WYASf; Wj1Ms: preg_match_all("\57\x53\145\164\134\x2d\x43\x6f\x6f\x6b\x69\145\72\x28\x5b\x5e\73\x5d\x2a\51\73\57", $header, $matches); goto T0Pgo; L6X_S: MiRDy: goto Wwrve; B09qB: curl_setopt($curl, CURLOPT_AUTOREFERER, 1); goto UE6WV; UE6WV: curl_setopt($curl, CURLOPT_REFERER, "\150\x74\164\x70\72\57\57\x58\130\x58"); goto BI6dB; fl227: curl_setopt($curl, CURLOPT_TIMEOUT, 10); goto Ze8Jl; nXOob: curl_setopt($curl, CURLOPT_POST, 1); goto XBMAX; GEZYY: if (!curl_errno($curl)) { goto MiRDy; } goto SUYwe; MzqEu: if (!$cookie) { goto JMWTz; } goto Iw3Xi; uOLVp: $curl = curl_init(); goto OHdod; cXFGm: goto IfpCV; goto sKIVU; o7EZR: curl_setopt($curl, CURLOPT_USERAGENT, "\115\157\172\151\x6c\x6c\x61\57\65\56\60\40\x28\143\157\155\160\x61\164\x69\142\x6c\x65\73\x20\115\123\x49\105\40\x31\60\56\60\73\x20\127\x69\156\x64\x6f\x77\163\x20\116\124\x20\x36\56\x31\x3b\40\11\124\162\151\144\x65\156\164\57\66\x2e\x30\51"); goto B09qB; sKIVU: VW7fg: goto X78pZ; Wwrve: curl_close($curl); goto E6lbB; T0Pgo: $info["\143\157\157\x6b\151\x65"] = substr($matches[1][0], 1); goto HcqQU; Iw3Xi: curl_setopt($curl, CURLOPT_COOKIE, $cookie); goto XEfZ6; Ze8Jl: curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); goto rOo19; HcqQU: $info["\143\157\156\x74\x65\x6e\164"] = $body; goto hRZ2r; OHdod: curl_setopt($curl, CURLOPT_URL, $url); goto o7EZR; J7buH: YzLGP: goto MzqEu; qfWeJ: }
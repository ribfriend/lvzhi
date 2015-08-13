<?php
/*推送*/
function batchMessage(){
	//推送的文章$arraylist
	//获取微信token token api地址：https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET
	$token = getWeixinTokenInfo();
//	echo $token;exit();
	foreach($userList as $key => $val){
		//调用发送消息接口

	}
} 

/*获取微信Token*/
function getWeixinTokenInfo()
{
	$appid = 'wxf6ab07b40eb8ba3f';
	$secret = 'b85387e5b3abe27434bb111e8eb9a013';
	$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
	$info = iHttpRquest($url);
	$info = json_decode($info,true);
	return $info['access_token'];

}
/*CURL*/
function iHttpRquest($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    // 要求结果为字符串且输出到屏幕上
	curl_setopt($ch, CURLOPT_HEADER, 0); // 不要http header 加快效率
	curl_setopt($ch, CURLOPT_USERAGENT,  'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0.1) Gecko/20100101 Firefox/9.0.1');
	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}
/*CURL POST*/
function iHttpPost($url,$data){
	$ch = curl_init();      
    $timeout = 300;       
    curl_setopt($ch, CURLOPT_URL, $url);     
    curl_setopt($ch, CURLOPT_REFERER, "http://double.itsmz.com/");   //构造来路    
    curl_setopt($ch, CURLOPT_POST, true);      
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);      
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);      
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);      
    $output = curl_exec($ch);      
    curl_close($ch);      
    return $output;      
}

//处理分类数

function get_tree_child($data, $fid) {
    $result = array();
    $fids = array($fid);
    do {
        $cids = array();
        $flag = false;
        foreach($fids as $fid) {
            for($i = count($data) - 1; $i >=0 ; $i--) {
                $node = $data[$i];
                if($node['fid'] == $fid) {
                    array_splice($data, $i , 1);
                    $result[] = $node['id'];
                    $cids[] = $node['id'];
                    $flag = true;
                }
            }
        }
        $fids = $cids;
    } while($flag === true);
    return $result;
}

function get_tree_parent($data, $id) {
    $result = array();
    $obj = array();
    foreach($data as $node) {
        $obj[$node['id']] = $node;
    }    

    $value = isset($obj[$id]) ? $obj[$id] : null;    
    while($value) {
        $id = null;
        foreach($data as $node) {
            if($node['id'] == $value['fid']) {
                $id = $node['id'];
                $result[] = $node['id'];
                break;
            }
        }
        if($id === null) {
            $result[] = $value['fid'];
        }
        $value = isset($obj[$id]) ? $obj[$id] : null;
    }
    unset($obj);
    return $result;
}

function get_tree_ul($data, $fid) {
    $stack = array($fid);
    $child = array();
    $added_left = array();
    $added_right= array();
    $html_left     = array();
    $html_right    = array();
    $obj = array();
    $loop = 0;
    foreach($data as $node) {
        $pid = $node['fid'];
        if(!isset($child[$pid])) {
            $child[$pid] = array();
        }
        array_push($child[$pid], $node['id']);
        $obj[$node['id']] = $node;
    }

    while (count($stack) > 0) {    
        $id = $stack[0];
        $flag = false;
        $node = isset($obj[$id]) ? $obj[$id] : null;
        if (isset($child[$id])) {
            $cids = $child[$id];
            $length = count($cids);
            for($i = $length - 1; $i >= 0; $i--) {
                array_unshift($stack, $cids[$i]);
            }
            $obj[$cids[$length - 1]]['isLastChild'] = true;
            $obj[$cids[0]]['isFirstChild'] = true;
            $flag = true;
        }
        if ($id != $fid && $node && !isset($added_left[$id])) {
            if(isset($node['isFirstChild']) && isset($node['isLastChild']))  {
                $html_left[] = '<li class="first-child last-child">';
            } else if(isset($node['isFirstChild'])) {
                $html_left[] = '<li class="first-child">';
            } else if(isset($node['isLastChild'])) {
                $html_left[] = '<li class="last-child">';
            } else {
                $html_left[] = '<li>';
            }            
            $html_left[] = ($flag === true) ? "<div>{$node['title']}</div><ul>" : "<div>{$node['title']}</div>";
            $added_left[$id] = true;
        }    
        if ($id != $fid && $node && !isset($added_right[$id])) {
            $html_right[] = ($flag === true) ? '</ul></li>' : '</li>';
            $added_right[$id] = true;
        }

        if ($flag == false) {
            if($node) {
                $cids = $child[$node['fid']];
                for ($i = count($cids) - 1; $i >= 0; $i--) {
                    if ($cids[$i] == $id) {
                        array_splice($child[$node['fid']], $i, 1);
                        break;
                    }
                } 
                if(count($child[$node['fid']]) == 0) {
                    $child[$node['fid']] = null;
                }
            }
            array_push($html_left, array_pop($html_right));
            array_shift($stack);
        }
        $loop++;
        if($loop > 5000) return $html_left;
    }
    unset($child);
    unset($obj);
    return implode('', $html_left);
}

function get_tree_option($data, $fid) {
    $stack = array($fid);
    $child = array();
    $added = array();
    $options = array();
    $obj = array();
    $loop = 0;
    $depth = -1;
    foreach($data as $node) {
        $pid = $node['parent_id'];
        if(!isset($child[$pid])) {
            $child[$pid] = array();
        }
        array_push($child[$pid], $node['id']);
        $obj[$node['id']] = $node;
    }

    while (count($stack) > 0) {    
        $id = $stack[0];
        $flag = false;
        $node = isset($obj[$id]) ? $obj[$id] : null;
        if (isset($child[$id])) {
            for($i = count($child[$id]) - 1; $i >= 0; $i--) {
                array_unshift($stack, $child[$id][$i]);
            }
            $flag = true;
        }
        if ($id != $fid && $node && !isset($added[$id])) {
            $node['level_num'] = $depth;
            $options[] = $node;
            $added[$id] = true;
        }
        if($flag == true){
            $depth++;
        } else {
            if($node) {
                for ($i = count($child[$node['parent_id']]) - 1; $i >= 0; $i--) {
                    if ($child[$node['parent_id']][$i] == $id) {
                        array_splice($child[$node['parent_id']], $i, 1);
                        break;
                    }
                } 
                if(count($child[$node['parent_id']]) == 0) {
                    $child[$node['parent_id']] = null;
                    $depth--;
                }
            }
            array_shift($stack);
        }
        $loop++;
        if($loop > 5000) return $options;
    }
    unset($child);
    unset($obj);
    return $options;
}
?>
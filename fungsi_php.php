<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
 
echo rupiah(1000000);

$guid=make_GUID();
echo $guid;

function make_GUID(){
$node=openssl_random_pseudo_bytes(16);
assert(strlen($node) == 16);
$node[6] = chr(ord($node[6]) & 0x0f | 0x40); // set version to 0100
$node[8] = chr(ord($node[8]) & 0x3f | 0x80); // set bits 6-7 to 10
return strtoupper(vsprintf('%s%s%s%s%s%s%s%s', str_split(bin2hex($node), 4)));
}
?>

if (!function_exists("pagging")) {
     function pagging($jml_buku,$limit)
    {
            echo '<br/><center><ul class="pagination">';
            $a = explode(".", $jml_buku / $limit);
            $b = $a[0];
            $c = $b + 1;
            $q =explode('&',$_SERVER['QUERY_STRING']);
            if (in_array('pg='.$_GET['pg'], $q)) {
                $ke = array_search(('pg='.$_GET['pg']), $q);
                unset($q[$ke]);
            }
            $q=implode('&', $q);
            if ($_GET['pg']>5) {
                $j=$_GET['pg']-2;
            }else{
                $j=1;
            }
            $n=0;
            echo '<li><a style="text-decoration:none;" href="?pg=1'.'&'.$q .'">&laquo;Pertama</a> </li>';
            for ($i = $j; $i <= $c; $i++) {
                $n++;
                echo '<li><a style="text-decoration:none;';
                if ($_GET['pg'] == $i) {
                echo 'color:red';
                }
                echo '" href="?pg=' . $i."&".$q . '">' . $i . '</a> </li>';
                if ($n>5) {
                    break;
                }
            }
            echo '<li><a style="text-decoration:none;" href="?pg='.$c.'&'.$q .'">Terakhir&raquo;</a> </li>';
            echo '</ul></center>';
    }
}

if (!function_exists('post_curl')) {
     function post_curl($url,$data=array())
    {
        //print_r($data);exit();
    //url-ify the data for the POST
    $field_string = http_build_query($data);

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, 1);
            curl_setopt($ch,CURLOPT_POSTFIELDS, $field_string);

            //execute post
            $result = curl_exec($ch);

            //close connection
            curl_close($ch);
            }
    }


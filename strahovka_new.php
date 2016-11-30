<?php
error_reporting( E_ERROR ); 
header('Content-Type: text/html; charset=utf-8');
$partnerId=trim(strip_tags($_REQUEST["partnerId"]));
$product=trim(strip_tags($_POST["product"]));
$travel_now=trim(strip_tags($_POST["travel_now"]));
$no_citizen=trim(strip_tags($_POST["no_citizen"]));
$from=trim(strip_tags($_POST["from"]));
$to=trim(strip_tags($_POST["to"]));
$infodays=trim(strip_tags($_POST["infodays"]));
$country=trim(strip_tags($_POST["country"]));
$sport=trim(strip_tags($_POST["sport"]));
$to_post=trim(strip_tags($_POST["to_post"]));
$post_index=trim(strip_tags($_POST["post_index"]));
$post_country=trim(strip_tags($_POST["post_country"]));
$post_state=trim(strip_tags($_POST["post_state"]));
$post_town=trim(strip_tags($_POST["post_town"]));
$post_street=trim(strip_tags($_POST["post_street"]));
$post_house=trim(strip_tags($_POST["post_house"]));
$post_kv=trim(strip_tags($_POST["post_kv"]));
$to_russia=trim(strip_tags($_REQUEST["to_russia"]));
$program=trim(strip_tags($_REQUEST["program"]));
$assist=trim(strip_tags($_REQUEST["assist"]));
$ages1=trim(strip_tags($_REQUEST["ages1"]));
$ages2=trim(strip_tags($_REQUEST["ages2"]));
$ages3=trim(strip_tags($_REQUEST["ages3"]));
$ages4=trim(strip_tags($_REQUEST["ages4"]));


$vrosl_fio=trim(strip_tags($_POST["vrosl_fio"]));
$vzrosl_name=trim(strip_tags($_POST["vzrosl_name"]));

$age=$_POST["age"];

$med_extr=$_POST["med_extr"];
$transport_opt=$_POST["transport_opt"];
$repatr_opt=$_POST["repatr_opt"];
$sr_message=$_POST["sr_message"];
$vizit=$_POST["vizit"];
$evac=$_POST["evac"];
$dosr_return=$_POST["dosr_return"];
$stomat=$_POST["stomat"];
$bagag_lost=$_POST["bagag_lost"];
$bagag_wait=$_POST["bagag_wait"];

var_dump($dosr_return);

$promo=trim(strip_tags($_POST["promo"]));
$step=trim(strip_tags($_REQUEST["step"]));
$programId=trim(strip_tags($_POST["programId"]));
$additional=trim(strip_tags($_POST["additional"]));
$surname=$_POST["surname"];
$name=$_POST["name"];
$onlym=$_POST["onlym"];
$birthdate=$_POST["birthdate"];
$nomerp=$_POST["nomerp"];
$email1=$_POST["email1"];
$email2=$_POST["email2"];
$PhoneCode=$_POST["PhoneCode"];
$phone=$_POST["phone"];
$price=$_POST["price"];
$opt=$_POST["opt"];
$show_ip=$_REQUEST["show_ip"];
$new_days=$_POST["new_days"];
$strah_summ=$_POST["strah_summ"];
if($strah_summ=="")  $strah_summ="30 000";

$nep_viza=$_POST["nep_viza"];
$strah_bagag=$_POST["strah_bagag"];
$gragd=$_POST["gragd"];
$neschast=$_POST["neschast"];
$kvart=$_POST["kvart"];
$set_ip=$_REQUEST["set_ip"];

$opt1=$_POST["opt1"];
$opt2=$_POST["opt2"];
$opt3=$_POST["opt3"];
$opt4=$_POST["opt4"];
$opt5=$_POST["opt5"];
$opt6=$_POST["opt6"];
$opt7=$_POST["opt7"];
$opt8=$_POST["opt8"];
$opt9=$_POST["opt9"];
$opt10=$_POST["opt10"];
$opt11=$_POST["opt11"];
$opt12=$_POST["opt12"];
$opt13=$_POST["opt13"];
$opt14=$_POST["opt14"];
$opt15=$_POST["opt15"];
$opt16=$_POST["opt16"];


if(count($age)<1) {
if($ages1>0) {
for($i=1;$i<=$ages1;$i++) {
	$age[]='28';
}
}

if($ages2>0) {
for($i=1;$i<=$ages2;$i++) {
	$age[]='15';
}
}


if($ages3>0) {
for($i=1;$i<=$ages3;$i++) {
	$age[]='68';
}
}

if($ages4>0) {
for($i=1;$i<=$ages4;$i++) {
	$age[]='83';
}
}
}
function occurrence($ips='', $to = 'utf-8'){

	$set_ip=$_REQUEST["set_ip"];
	if($set_ip=="")
	$ip = $_SERVER['REMOTE_ADDR'] ; else
	$ip=$set_ip;
	///$ip="95.220.144.236";
	$arr=@file_get_contents('http://ip-api.com/json/'.$ip);
	$arr=json_decode($arr,true);
	$arr['regionName'];
	return $arr['regionName'];

}

$ip = $_SERVER['REMOTE_ADDR'] ;
if($show_ip!="") echo "Регион: ".occurrence();

/////определение региона пользоватедя
function send_mail($email, $subject, $msg, $from, $file)
    {
        $boundary = "--" . md5(uniqid(time()));
        $headers = "MIME-Version: 1.0\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
        $headers .= "From: $from\n";
        $multipart = "--$boundary\n";
        $multipart .= "Content-Type: text/html; charset=utf-8\n";
        $multipart .= "Content-Transfer-Encoding: Quot-Printed\n\n";
        $multipart .= "$msg\n\n";
        foreach ($file as $key => $value) {
           $fp = fopen($value, "r");
           $file = fread($fp, filesize($value));
           $message_part .= "--$boundary\n";
           $message_part .= "Content-Type: application/octet-stream\n";
           $message_part .= "Content-Transfer-Encoding: base64\n";
           $message_part .= "Content-Disposition: attachment; filename=\"".basename($value)."\"\n\n";
           $message_part .= chunk_split(base64_encode($file)) . "\n";
        }
        $multipart .= $message_part . "--$boundary--\n";

        mail($email, $subject, $multipart, $headers);
    }
	


function readExelFile($filepath){
 require_once($_SERVER['DOCUMENT_ROOT'].'/tur-strahovka-online/PHPExcel.php'); //подключаем наш фреймворк
$ar=array(); /// инициализируем массив
$inputFileType = PHPExcel_IOFactory::identify($filepath);  // узнаем тип файла, excel может хранить файлы в разных форматах, xls, xlsx и другие
 $objReader = PHPExcel_IOFactory::createReader($inputFileType); // создаем объект для чтения файла
 $objPHPExcel = $objReader->load($filepath); // загружаем данные файла в объект
 $ar = $objPHPExcel->getActiveSheet()->toArray(); // выгружаем данные из объекта в массив
return $ar; //возвращаем массив
 }

  function get_content() 
  { 
    // Формируем сегодняшнюю дату 
    $date = date("d/m/Y",time()); 
    // Формируем ссылку 
    $link = 'https://query.yahooapis.com/v1/public/yql?q=select+*+from+yahoo.finance.xchange+where+pair+=+"EURRUB"&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=';
	/////echo $link;	
    // Загружаем HTML-страницу 
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		///curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
		////curl_setopt($curl,CURLOPT_HEADER,true);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$link);
		// Execute
		$text=curl_exec($ch);
		// Closing
		curl_close($ch);
	
	////echo $text;
     if ($text=='') {
	 echo "Нет связи с ЦБ РФ для получения курса валют"; 
	 }
    else 
    { 
    ////////////
    } 

    return $text; 

  } 
$content = get_content(); 

///	echo $content;
	$array_eur=json_decode($content);
	$euro=$array_eur->query->results->rate->Rate;



///////подключение конфига
require("config.php");
////подключение к базе

$link = mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
mysqli_query($link,'set character set utf8');
mysqli_query($link,'set character_set_client=utf8');
mysqli_query($link,'set character_set_results=utf8');
mysqli_query($link,'set collation_connection=utf8_general_ci');

////////////////////////////
$r=mysqli_query($link,"UPDATE partners set last_calc='".time()."' where id='".$partnerId."'");

$resultp=mysqli_query($link,"UPDATE settings set euro='$eur'");

$resultp=mysqli_query($link,"SELECT telephon1,telephon2,telephon3,banner1,banner2 from settings where id='1'");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}



//////////проверка параметра я уже путешествую
if($step=="2") { 
	if($travel_now=="travel_now") {
		////проверка начала страховки
		$time_from=strtotime($from);
		
		if(($time_from-time())<=24*60*60*5) {
			///////дата менее 5ти лней
			$err="travel_err";
		}
	}
}

	
	if($err=="travel_err") {
////Обман
$step='2';
?>
<script>
alert('Если вы уже путешествуете, то дата начала страховки не может быть ранее 5ти дней с сегодняшней даты!');
	window.close();
</script>
<?
}


if($step==3) {

}

				
if($step=="4") { 
	
	////////////сначала проверяем правильность ввода возрастов для предотвращения обмана
///преобразуем дату в года
foreach ($birthdate as $bth) {
$yer=explode(".",$bth);
$age_prom=date("Y",time())*1-$yer[2];

	if($age_prom<18) $age_prom=15;
	if(($age_prom>=18) and ($age_prom<=64)) $age_prom=28;
	if(($age_prom>=65) and ($age_prom<=79)) $age_prom=68;
	if($age_prom>=80) $age_prom=83;
	
	
$birthdate_age[]=$age_prom;
}
	
///теперь сравниваем массивы
If(count($age)==count($birthdate_age)) {
///сортировка вух массивов
asort($age);
asort($birthdate_age);
///преобразуем в строку
foreach($age as $aag) {
$str1=$str1.$aag;
}
foreach($birthdate_age as $aag2) {
$str2=$str2.$aag2;
}

if($str1!=$str2) $err="err";

} else $err="err";


	
////////////////////////////////


if($err=="err") {
////Обман
$step='3';
?>
<script>
alert('К сожалению количество или возрасты заявленных людей не соответствуют первоначальным данным, проверьте пожалуйста ввод и повторите еще раз!');
</script>
<?
}


////теперь проверяем указаны ли данные взрослого
		foreach($age as $a) {
			if($a*1>=18) $vzr=1;
			}
		if($vzr!=1) {
		if($vrosl_fio=="" or $vzrosl_name=="") {
		$step='3';
			?>
			<script>
			alert('К сожалению при страховании детей необходимо указать данные взрослого! Повторите пожалуйста еще раз!');
			</script>
			<?
		}
		}



}



if($step=="4") { 

////////////сначала проверяем правильность ввода возрастов для предотвращения обмена

/////////////создаем запись в разделе Заказы
$data_police[]=serialize($surname);
$data_police[]=serialize($name);
$data_police[]=serialize($birthdate);
$data_police[]=$email1;
$data_police[]=$PhoneCode;
$data_police[]=$phone;

$data_police[]=$programId;
$data_police[]=$country;
$data_police[]=$from;
$data_police[]=$to;
$data_police[]=$infodays;
$data_police[]=$sport;
$data_police[]=$price;
$data_police[]=serialize($nomerp);
////////////////////теперь дополнительные опции
			
$data_police[]=$nep_viza; //14
$data_police[]=$strah_bagag; //15
$data_police[]=$gragd; //16
$data_police[]=$neschast; //17
$data_police[]=$strah_summ; //18

for($oop=1;$oop<15;$oop++) { 
$data_police[]=${"opt".$oop}; 
}

$data_police[]=$kvart; //33
////теперь данные по отправке полиса почтой
$data_police[]=$to_post;  //34
$data_police[]=$post_index; //35
$data_police[]=$post_country; //36
$data_police[]=$post_state; //37
$data_police[]=$post_town; //38
$data_police[]=$post_street; //39
$data_police[]=$post_house; //40
$data_police[]=$post_kv; //41

///данные взрослого
$data_police[]=$vrosl_fio; //42
$data_police[]=$vzrosl_name; //43

///////50 - путь к файлу страховки
///////51 - дата отправки страховки

    $data_police[]='new';  ///44
    $data_police[]=$no_citizen;  ///45
    $data_police[]=$assist;  ///46
	
	/////новые доп. риски
	$data_police[]=$med_extr; //// 47   ////стоматолоническая помощь
	$data_police[]=$transport_opt; //// 48  /////Утрата документов
	$data_police[]=$repatr_opt; //// 49   ///////Юридическая помощь
	$data_police[]=$sr_message; //// 50   ///////Отмена поездки
	$data_police[]=$vizit; //// 51		  ///////Страхование багажа
	$data_police[]=$evac; //// 52			/////Гражданская ответственность
	$data_police[]=$dosr_return; //// 53	/////Несчастный случай
	
	/////номер территории для полиса
		$result_summ=mysqli_query($link,"SELECT naim as country_xlsx,t1 as t1_xlsx,t2 as t2_xlsx from countries");
			$rows_summp=@mysqli_num_rows($result_summ);
			while($rows_summp=@mysqli_fetch_array($result_summ)) {
			extract($rows_summp);
			
					if(strnatcasecmp($country,$country_xlsx)==0) { 
					$country_alpha=$t1_xlsx; 
					$country_ergo=$t2_xlsx; 	
				///	break;
					}
			}
	
	if($programId<=3) $terr=$country_alpha; else $terr=$country_ergo;

	
	if(strnatcasecmp($terr,"TI")==0) $terr="1";
	if(strnatcasecmp($terr,"TII")==0) $terr="2";
	if(strnatcasecmp($terr,"TIII")==0) $terr="3";
	if(strnatcasecmp($terr,"TIV")==0) $terr="4";

    $data_police[]=$terr;  //54
	
$data_police=serialize($data_police);
	
	

if($country=="1" or $country=="2" or $country=="3" or $country=="4") { 
               $ue="р.";
				} else { 
				$ue="р.";
				}

				$ip_nakidka="";
/////накидка за москву				
if(strpos(@occurrence(),"Moscow")>-1 and ($programId==3 or $programId==6) and $infodays<=30)  {
$ip_nakidka="65";
}


mysqli_query($link,"INSERT INTO orders (phone,skidka,email,ticketid,partner_id,data_police,summ,data_create,status,ue,promo,ip_nakidka,sended_polis,status_sended_police) values('','','','','".$partnerId."','".$data_police."','".$price."','".time()."','not_paid','".$ue."','".$promo."','$ip_nakidka','','')") or die(mysqli_error($link));

	$resultp=mysqli_query($link,"SELECT max(id) as num_order from orders");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}
	
	
///////если нужно отправить по почте

///////////////вставка информации о пользователе
$ip=$_SERVER['REMOTE_ADDR'];
$geo_ip=@occurrence();
$referer=$_SERVER['HTTP_REFERER'];
$user_agent=$_SERVER['HTTP_USER_AGENT'];
mysqli_query($link,"INSERT INTO clients_info (order_id,ip,geo_ip,referer,user_agent) values('$num_order','$ip','$geo_ip','$referer','$user_agent')") or die(mysqli_error($link));


////////////////////////////////////////
		$resultp=mysqli_query($link,"SELECT fon,color1,color2 from partners where id='".$partnerId."'");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}
				if($fon=="") { $fon="form bg"; }
				if($color1=="") { $color1="#000000"; }
				if($color2=="") { $color2="#FFFFFF"; }
				?>
				<script>
				function to_back() {
				document.getElementById("gotob").submit();
				}
				function pay() {
				document.getElementById("robox_pay").submit();
				}
				
				setTimeout("pay()",1000);
		   </script>
    
	   <? if($price!="<font size='-2'>персонально</font>") { ?>
     
		<? } ?>
        <!--или <a class="another" href="javascript:void(0);">другим способом</a>-->
    </div>
<?php 
  // Получаем текущие курсы валют в rss-формате с сайта www.cbr.ru 
 
  //echo "Доллар - ".$dollar."<br>"; 
  //echo "Евро - ".$euro."<br>"; 
  
?>

<? if($price!="<font size='-2'>персонально</font>") { 
// Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
// Payment of the set sum with a choice of currency on site ROBOKASSA
////получение всех данных
$resultp=mysqli_query($link,"SELECT server_r,login_r,password1,descr from settings where id='1'");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}
// регистрационная информация (логин, пароль #1)
// registration info (login, password #1)
$mrh_login = $login_r;
$mrh_pass1 = $password1;

// номер заказа
// number of order
$inv_id = $num_order;

// описание заказа
// order description
$inv_desc = $descr;

// сумма заказа
// sum of order
$out_summ = $price;

// тип товара
// code of goods
$shp_item = "2";

// предлагаемая валюта платежа
// default payment e-currency
if($country_alpha!="0") { 
////$out_summ=round($out_summ*$euro,2);
$in_curr = "";
} else {
$in_curr = "";
}

// язык
// language
$culture = "ru";

// формирование подписи
// generate signature

$crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");

// форма оплаты товара
// payment form
/*echo "<form action='$server_r' method=POST id='robox_pay'>
      <input type=hidden name=MrchLogin value=$mrh_login>
      <input type=hidden name=OutSum value=$out_summ>
      <input type=hidden name=InvId value=$inv_id>
      <input type=hidden name=Desc value='$inv_desc'>
      <input type=hidden name=SignatureValue value=$crc>
      <input type=hidden name=Shp_item value='$shp_item'>
      <input type=hidden name=IncCurrLabel value=$in_curr>
      <input type=hidden name=Culture value=$culture><br><br><br>
      </form>";
	*/  
echo "<form action='$server_r' method='POST' id='robox_pay'>
<input type='hidden' name='MNT_ID' value='$mrh_login'>
<input type='hidden' name='MNT_TRANSACTION_ID' value='$inv_id'>
<input type='hidden' name='MNT_CURRENCY_CODE' value='RUB'>
<input type='hidden' name='MNT_AMOUNT' value='$out_summ'>
<input type='hidden' name='paymentSystem.unitId' value='39953'>
     
	 </form>";
	  } else
	  {
	  //////////отправка данных на почту, так как цена рассчитывается персонально
	  /////////////////////////все данные о заказе
$result=mysqli_query($link,"SELECT id,partner_id,data_create,data_police,summ,status,ue from orders where id='".$inv_id."'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
}
if($email_to_send!="") {
$pismo="";
$pismo=$pismo."<table>
<tr><td> <b>Номер заказа:</b></td><td width='20'></td><td>$inv_id</td></tr>
<tr><td> <b>Дата заказа:</b></td><td width='20'></td><td>".date("d-m-Y H:i:s",$data_create)."</td></tr>";

$resultp=mysqli_query($link,"SELECT fio,site from partners where id='".$partner_id."'");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}
$pismo=$pismo."<tr><td> <b>Партнер:</b></td><td width='20'></td><td>$fio ($site)</td></tr>
<tr><td valign='top'> <b>Данные полиса:</b></td><td width='20'></td><td valign='top'>
Программа страхования:";
						$data_police=unserialize($data_police);
						$programId=$data_police[6];
			
						 
						 $ar=readExelFile($_SERVER['DOCUMENT_ROOT']."/tur-strahovka-online/prices/tarifu.xlsx");
						 						if($programId=="4") $prg=4;
						if($programId=="3") $prg=5;
						if($programId=="2") $prg=6;
						if($programId=="5") $prg=7;
						if($programId=="6") $prg=8;
						if($programId=="7") $prg=9;
						if($programId=="8") $prg=10;
						if($programId=="9") $prg=11;
						
						$pismo=$pismo.$ar[$prg][1]." (".$ar[$prg][2]." EUR)";
$pismo=$pismo."
<br>
Территория:	";
		$country=$data_police[7];
		if($country=="0") $pismo=$pismo."Шенген";
		if($country=="1") $pismo=$pismo."Весь мир(кроме США, Канады, Японии, Австралии, Тайланда, стран карибского бассейна и страны постоянного проживания)";
		if($country=="2") $pismo=$pismo."Весь мир(все страны за исключением страны постоянного проживания)";
		if($country=="3") $pismo=$pismo."Весь мир(Россия свыше 90 км от места проживания)";
		if($country=="4") $pismo=$pismo."Страны СНГ, Московская область (для жителей Москвы)";
 
$pismo=$pismo."
<br>
Отъезд: $data_police[8]<Br>
Возвращение: $data_police[9]<Br>
Количество дней: $data_police[10]<Br>
Спорт: "; if($data_police[11]!="True") $pismo=$pismo."Нет"; else $pismo=$pismo."Да"; 
$pismo=$pismo."<Br><br>";
  $surname=unserialize($data_police[0]);
   $name=unserialize($data_police[1]);
   $data_rogd=unserialize($data_police[2]);
   $nomer=unserialize($data_police[13]);
   
 for($k=0;$k<count($surname);$k++) { 
$pismo=$pismo."Фамилия и имя: $surname[$k] $name[$k];<Br>
Дата рождения: $data_rogd[$k] <Br>
Номер загранпаспорта: $nomer[$k] <Br><br>";
} 

$pismo=$pismo."E-MAIL для отправки полиса: $data_police[3] <Br>
Телефон: $data_police[4] $data_police[5] <Br><br>";

if ($data_police[34]=="post") {
$pismo=$pismo."Клиент хочет полис почтой, <a href='http://".$_SERVER['HTTP_HOST']."/tur-strahovka-online/gen_list.php?inv_id=$inv_id'> ссылка на страницу с почтовыми данными</a><br><br>";
}

$pismo=$pismo."<b>Опции программы страхования:</b><i><br>
Медицинская помощь: $data_police[18] € &nbsp;<br>
Расходы по медицинской транспортировке: "; if($data_police[19]!="нет" and $data_police[19]!="") { $pismo=$pismo.$data_police[19]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Расходы по посмертной репатриации тела:";  if($data_police[20]!="нет" and $data_police[20]!="") { $pismo=$pismo.$data_police[20]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Расходы на стоматологическую помощь:";  if($data_police[47]!="нет" and $data_police[47]!="") {$pismo=$pismo.$data_police[47]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Расходы по оплате срочных сообщений:";  if($data_police[22]!="нет" and $data_police[22]!="") { $pismo=$pismo.$data_police[22]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Транспортные расходы:"; if($data_police[23]!="нет" and $data_police[23]!="") {$pismo=$pismo.$data_police[23]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Расходы при утрате документов:";  if($data_police[48]!="нет" and $data_police[48]!="") { $pismo=$pismo.$data_police[48]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Расходы по получению юридической помощи:";  if($data_police[49]!="нет" and $data_police[49]!="") { $pismo=$pismo.$data_police[49]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";}
$pismo=$pismo."Повреждение личного автотранспортного средства:";  if($data_police[26]!="нет" and $data_police[26]!="") { $pismo=$pismo.$data_police[26]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Отмена поездки (неполучение визы):"; if($data_police[50]!="нет" and $data_police[50]!="") { $pismo=$pismo.$data_police[50]." € &nbsp;<br>"; } else {$pismo=$pismo."нет<br>";} 
$pismo=$pismo."Страхование багажа:"; if($data_police[51]!="нет" and $data_police[51]!="") { $pismo=$pismo.$data_police[51]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Гражданская ответственность:";  if($data_police[52]!="нет" and $data_police[52]!="") { $pismo=$pismo.$data_police[52]." € &nbsp;<br>"; } else { $pismo=$pismo."нет<br>";} 
$pismo=$pismo."Несчастный случай:"; if($data_police[53]!="нет" and $data_police[53]!="") { $pismo=$pismo.$data_police[53]." € &nbsp;"; } else { $pismo=$pismo."нет<br>";}
$pismo=$pismo."Страхование квартиры:"; if($data_police[33]!="нет" and $data_police[33]!="") { $pismo=$pismo.$data_police[33]." € &nbsp;"; } else { $pismo=$pismo."нет</i><BR>";} 


echo "</td></tr>
<tr><td> <b>Сумма заказа:</b></td><td width='20'></td><td>$summ $ue</td></tr>
<tr><td> <b>Cтатус:</b></td><td width='20'></td><td><b>Требуется персональный расчет цены</b></td></tr></table>";
$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
////рассылка по емайлам
$emails=explode(",",$email_to_send);
foreach($emails as $emailt) {
mail(trim($emailt), 'Оплаченный заказ на страховку',$pismo, $headers);
}
}

	  
	  ///////////////////////////////////////
	  }
?>
    




<? } ?>



<!DOCTYPE html>
<html>
<head>
	<!-- FRONT-END FROM RUSSIA WITH LOVE -.- SERGEY KHMELEVSKOY -.- -->
	<!-- Follow BEM methodology and SMACSS to manage stylesheets -->

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title>POLIS 812 - страховка VZR </title>

	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
	<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" />
	<link rel="stylesheet" href="css/hamburgers.min.css" type="text/css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	
	
	<script>
		
////// СПИСОК СТРАН ДЛЯ ОПДСКАЗОК

	var countries = [
		<?
			$result_summ=mysqli_query($link,"SELECT naim as naim_country from countries");
			$rows_summp=@mysqli_num_rows($result_summ);
			while($rows_summp=@mysqli_fetch_array($result_summ)) {
			extract($rows_summp);
				?>
				{ value: '<?=$naim_country?>' },
				<?
				}
		?>
	];

			
	</script>
	<!-- Scripts can be moved to the bottom -->
	<script type="text/javascript" src="js/jquery.min.js"></script>	
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/moment.js"></script>	
	<script type="text/javascript" src="js/daterangepicker.js"></script>	
	<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <![endif]-->
	<script>
		function gotostep2() {
		$('#calc__form__step1').hide();
		$('#calc__form__step2').show();
		$('#calc__form__step3').hide();
		$('#trigger-move-to-calc').trigger('click'); // переход к якорю
		$('.calculator__wrapper').addClass('step--2');	
		}
		
		function gotostep3() {
		$('#calc__form__step1').hide();
		$('#calc__form__step2').hide();
		$('#calc__form__step3').show();
		$('.calculator__wrapper').addClass('step--3');
		$('#trigger-move-to-calc--step3').trigger('click');	
		}
	
	
		
		function start_timers() {
			<? if($step=='') { ?>
		
		<? } 
		if($step=='2') { ?>
		setTimeout("gotostep2()",1000);
		
		<? } 
		if($step=='3') { ?>
		setTimeout("gotostep3()",1000);
		
		<? } 
		
	?>
		}
			
	</script>
</head>

<body onLoad="start_timers()">
	<!-- HEADER :: START -->
	<header>
		<div class="header-top hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-4 header-top__navi">
						<a href="http://polis812.ru/company">О КОМПАНИИ</a>
						<a href="http://polis812.ru/news">НОВОСТИ</a>
						<a href="https://vk.com/topic-52293534_31251256">ОТЗЫВЫ О НАС</a>
					</div>
					<div class="hidden-sm col-md-4 header-top__clients text-center">
						<i class="ico ico-header-people"></i> 300 000 клиентов по всей России!
					</div>
					<div class="col-sm-6 col-md-4 header-top__region text-right">
						<div class="dropdown">
							Ваш регион: 
							<a class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<span id="selected-region">Санкт-Петербург</span>
							<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1" id="header-region-toggle">
							<li><a href="#" data-value="Санкт-Петербург">Санкт-Петербург</a></li>
							<li><a href="#" data-value="Москва">Москва</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="header-center hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-sm-5 col-md-4">
						<a href="#">
						<img src="img/logo.png" class="img-responsive" alt="">
						</a>
					</div>
					<div class="col-sm-4 col-md-3">
						<div class="header-center__phone">
							<span>8 800 200-26-12</span>
							<div class="header-center__phone-location">
							Бесплатные звонки по всей России
							</div>
						</div>
					</div>
					<div class="hidden-sm col-sm-3 col-md-3">
						<div class="header-center__phone" id="region-phone--spb">
							<span>8 812 93-63-812</span>
							<div class="header-center__phone-location">
							Санкт-Петербург
							</div>
						</div>
						<div class="header-center__phone" id="region-phone--moscow">
							<span>8 495 204-28-12</span>
							<div class="header-center__phone-location">
							Москва
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="header-menu hidden-xs">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<ul class="header-menu__list">
							<li><a href="http://polis812.ru/viza-online">ВИЗА ОНЛАЙН</a></li>
							<li><a href="http://polis812.ru/viza-offline">ОФОРМЛЕНИЕ ВИЗ</a></li>
							<li class="active"><a href="http://polis812.ru/vzr">ТУРИСТИЧЕСКАЯ СТРАХОВКА</a></li>
							<li><a href="http://polis812.ru/osago">ОСАГО</a></li>
							<li><a href="http://polis812.ru/zelnye_karty">ЗЕЛЕНАЯ КАРТА</a></li>
							<li><a href="http://polis812.ru/tury">ПОДБОР ТУРА</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="header-mobile visible-xs">
			<div class="container">
				<div class="row">
					<div class="col-xs-8 text-center">
						<a href="http://polis812.ru/">
						<img src="img/logo.png" class="img-responsive header-mobile__logo" alt="">
						</a>
					</div>
					<div class="col-xs-4 text-right">
						<button class="hamburger hamburger--collapse" type="button" id="show-me-menu">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<section class="mobile-nav">
			<ul class="main-navi">
				<li><a href="http://polis812.ru/viza-online">ВИЗА ОНЛАЙН</a></li>
							<li><a href="http://polis812.ru/viza-offline">ОФОРМЛЕНИЕ ВИЗ</a></li>
							<li><a href="http://polis812.ru/vzr">ТУРИСТИЧЕСКАЯ СТРАХОВКА</a></li>
							<li><a href="http://polis812.ru/osago">ОСАГО</a></li>
							<li><a href="http://polis812.ru/zelnye_karty">ЗЕЛЕНАЯ КАРТА</a></li>
							<li><a href="http://polis812.ru/tury">ПОДБОР ТУРА</a></li>
			</ul>
			<div class="mobile-nav-contact">
				<div class="header-phone"><a href="tel:88002002612">8 800 200-26-12</a></div>
				<div class="header-adress">Бесплатные звонки по всей России</div>
			</div>
		</section>
	</header>
	<!-- HEADER :: END -->

	<!-- CALCULATOR :: START -->
	<a href="#section-calculator" id="trigger-move-to-calc" style="display: none; visibiliy: hidden; ">
	<a href="#section-calculator--step3" id="trigger-move-to-calc--step3" style="display: none; visibiliy: hidden; ">
	<section class="calculator" id="section-calculator">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="calculator__breadcrumbs">
						<a href="http://polis812.ru/">Главная</a>  /  <a href="http://polis812.ru/vzr">Страхование ВЗР</a>
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="strahovka_new.php">Начать новый расчет</a>
					</div>
					<div class="calculator__title">
						<a href="#" class="calculator__helper" id="helper--toggle">
							<i class="ico ico-question--big"></i>
							<i class="pulse"></i>
						</a>
						<h1>Туристическая страховка</h1>
					</div>
				</div>
				<div class="col-sm-12">
			<? 
		$resultp=mysqli_query($link,"SELECT fon,color1,color2,type_calc from partners where id='".$partnerId."'");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}
				if($fon=="") { $fon="form bg"; }
				if($color1=="") { $color1="#000000"; }
				if($color2=="") { $color2="#FFFFFF"; }
				if($type_calc=="" or $type_calc=="0") $type_calc="1";

if($step=="") {
if($type_calc=="" or $type_calc=="0") { 
	
}
}

	?>
					<div class="calculator__wrapper step--1" onClick="outsiteClick()">
						<!-- шагаем -->
						<div class="calculator__steps">
							<div class="calculator__steps__relative">
								<div class="calculator__steps__step calculator__steps__step--1">1. Расчет стоимости</div>
								<div class="calculator__steps__step calculator__steps__step--2">2. Выбор программы страхования</div>
								<div class="calculator__steps__step calculator__steps__step--3">3. Оплата и получение полиса</div>
							</div>
						</div>
							
						<div class="row">
							<div class="col-sm-10 col-sm-offset-1">

		<!-- поиск места -->
		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" class="calculator__form" id="calc__form__step1" name="startform" >
		<input type="hidden" name="step" value="2">
		<input type="hidden" name="set_ip" value="<?=$set_ip?>">
			<input type="hidden" name="onlym" value="<?=$onlym?>"/>
                <input name="partnerId" type="hidden" id="formPartnerId" value="<?=$partnerId?>"/>
		
		<div class="calculator__form__holder--w50">
			<div class="calculator__form__input calculator__form__input--ico-loc" id="calc__select-location--toggle" data-toggle="tooltip" data-placement="top"><!-- для валиадтора накидываем .not-valid сюда и пишем ошибку в стилe bootstrap tooltip-->
				<input type="text" name="country" id="country_text" placeholder="Куда вы собираетесь путешествовать?">
			</div>
			
			<script>
					function gotocountry(country) {
						document.getElementById('country_text').value=country;
						$('#calc__select-location--toggle').removeClass('active');
    					$('#calc__select-location').removeClass('active');
					}
				</script>
			<!-- drop -->
			<div class="calculator__form__dropdown" id="calc__select-location">
				<input type="text" name="country_search" class="calculator__form__dropdown__input-text" id="calc__select-location__input" placeholder="Введите название страны">
				
				<div class="calculator__form__dropdown__help">
					Например 
					<a href="javascript:gotocountry('SCHENGEN')" data-value="SCHENGEN">SCHENGEN</a>
					<a href="javascript:gotocountry('THAILAND')" data-value="THAILAND">THAILAND</a>
					<a href="javascript:gotocountry('Schengen.Finland')" data-value="Schengen.Finland">Schengen.Finland</a>
					<a href="javascript:gotocountry('ITALY')" data-value="ITALY">ITALY</a>
				</div>
			</div>
			<!-- help --> 
			<div class="helper__info" id="helper__step-1">
				Введите название страны в которую вы собираетесь путешествовать. <br>
				Для стран Шенгенского соглашения можно выбрать "Шенген"
			</div>
		</div>

		<!-- тип программы -->
			
			<script>
				function check_show() {
				
						
							if(!(document.getElementById('program__driving').checked)&&(!(document.getElementById('program__extrime-sport').checked))&&(!(document.getElementById('program__driving').checked))) {
							document.getElementById('calc__select-program-show').value="";
						}
					
						if(document.getElementById('program__sport').checked) {
							document.getElementById('calc__select-program-show').value="Спорт";
						}
						
						if(document.getElementById('program__extrime-sport').checked) {
							document.getElementById('calc__select-program-show').value="Экстремальный спорт";
						}
						if(document.getElementById('program__driving').checked) {
							document.getElementById('calc__select-program-show').value="Управление мотоциклом / мопедом";
						}
						
					
						
						
						if(document.getElementById('ages1').value!=0) {
							if(document.getElementById('calc__select-program-show').value=='') {
							document.getElementById('calc__select-program-show').value=document.getElementById('calc__select-program-show').value+" Взрослых: "+document.getElementById('ages1').value;
							} else {
								document.getElementById('calc__select-program-show').value=document.getElementById('calc__select-program-show').value+", взрослых: "+document.getElementById('ages1').value;
							}
						}
						
						if(document.getElementById('ages2').value!=0) {
							document.getElementById('calc__select-program-show').value=document.getElementById('calc__select-program-show').value+", детей: "+document.getElementById('ages2').value;
						}
						
						if(document.getElementById('ages3').value!=0) {
							var all_v=document.getElementById('ages3').value*1+document.getElementById('ages4').value*1;
							document.getElementById('calc__select-program-show').value=document.getElementById('calc__select-program-show').value+", старше 65: "+all_v;
						}
						
					
				}
				
				var open=0;
				
				function show_hide() {
					if(open==0) {
					$('#calc__select-program').addClass('active');
						open=1;
					} else {
						$('#calc__select-program').removeClass('active');
						open=0;
					}
					
				}
				
				setInterval("check_show()",500);
			</script>
			

		<div class="calculator__form__holder--w50 calculator__form__holder--float-right">
			<div class="calculator__form__input calculator__form__input--ico-globe" id="calc__select-program--toggle" onClick="show_hide()">
				<input type="text" placeholder="Кол-во застрахованных и тип программы" id="calc__select-program-show" >
			</div>
			<!-- drop -->
			<div class="calculator__form__dropdown" id="calc__select-program">
				<div class="calculator__form__dropdown__program-people">
					<span>Взрослые до 64 лет включительно</span>
					<div class="calculator__form__dropdown__number-input">
						<span class="number-input-minus" ></span>
						<input type="text" id="ages1" name="ages1" value="<? if($ages1=="") echo "1"; else echo $ages1; ?>" placeholder="0" min="0" max="10">
						<span class="number-input-plus"></span>
					</div>
				</div>
				<div class="calculator__form__dropdown__program-people">
					<span>Дети до 18 лет </span>
					<div class="calculator__form__dropdown__number-input">
						<span class="number-input-minus"></span>
						<input type="text" name="ages2" id="ages2" value="<?=$ages2?>" placeholder="0" min="0" max="10">
						<span class="number-input-plus"></span>
					</div>
				</div>
				<div class="calculator__form__dropdown__program-people">
					<span>Взрослые от 65 до 79 лет</span>
					<div class="calculator__form__dropdown__number-input">
						<span class="number-input-minus"></span>
						<input type="text" name="ages3" id="ages3" value="<?=$ages3?>" placeholder="0" min="0" max="10">
						<span class="number-input-plus"></span>
					</div>
				</div>
				<div class="calculator__form__dropdown__program-people">
					<span>Взрослые от 80 до 85 лет</span>
					<div class="calculator__form__dropdown__number-input">
						<span class="number-input-minus"></span>
						<input type="text" name="ages4" id="ages4" value="<?=$ages4?>" placeholder="0" min="0" max="10">
						<span class="number-input-plus"></span>
					</div>
				</div>

				<div class="calculator__form__dropdown__program-switch">
					<div class="calculator__form__dropdown__switch">
						<input type="checkbox" name="sport" value="True" class="calculator__form__dropdown__switch__toggler" id="program__sport" />
						<label for="program__sport">«Спорт»</label>

						<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="top" title="Любительский спорт : велосипедный спорт, воднолыжный спорт, виндсерфинг, серфинг, сноукайтинг, футбол, хоккей. Горные лыжи, лыжный спорт, сноубординг (только на организованных туристических спусках)."></i>
					</div>
					<div class="calculator__form__dropdown__switch">
						<input type="checkbox" class="calculator__form__dropdown__switch__toggler" name="sport" value="extrim" id="program__extrime-sport" />
						<label for="program__extrime-sport">«Экстремальный Спорт»</label>

						<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="top" title="Экстремальный спорт: авиационный спорт, автомобильный спорт, бейсджампинг, дайвинг, дельтапланеризм, каньонинг, конный спорт, мотоспорт, охота, парапланеризм, парашютный спорт, планерный спорт, роупджампинг,
рафтинг, санный спорт, слалом, сплав, спортивный туризм, трекинг, фристайл"></i>
					</div>
					<div class="calculator__form__dropdown__switch">
						<input type="checkbox" class="calculator__form__dropdown__switch__toggler" name="sport" value="moped" id="program__driving" />
						<label for="program__driving">«Управление мотоциклом / мопедом»</label>

						<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="top" title="Управлением мопедом, мотороллером, скутером, мотоциклом, квадрациклом при движении по дорогам общего пользования и при наличии водительских прав соответствующей категории и шлема"></i>
					</div>
				</div>

			</div>
		</div>

		<!-- даты -->
			<? if($step=="") { ?>
			<script>
				function take_diff() {
				var datew1=document.getElementById('pole_from').value;
				var datew2=document.getElementById('pole_to').value;
				var odnokr=document.getElementById('calc__form__datetype__single').checked;
					
					if(odnokr) {
					document.getElementById('hide_galka').style.display="block";
					} else {
						document.getElementById('hide_galka').style.display="none";
					}
					
				if((datew1!="")&&(datew2!="")&&(odnokr)) {
					var date1 = new Date(parseInt(datew1.substr(6, 4), 10), parseInt(datew1.substr(3, 2), 10), parseInt(datew1.substr(0, 2), 10));
					var date2 = new Date(parseInt(datew2.substr(6, 4), 10), parseInt(datew2.substr(3, 2), 10), parseInt(datew2.substr(0, 2), 10));
					var delta = date2-date1;
					var minutes = Math.round(delta / (60*1000));
					var days = Math.floor(minutes / 60 / 24)+1;
					document.getElementById('calc__select-datetime__input').value=days+' дней';
				}
					
					////////////////дата окончания
				if((datew1!="")&&(odnokr==false)) {
						var date1 = new Date(parseInt(datew1.substr(6, 4), 10), parseInt(datew1.substr(3, 2), 10), parseInt(datew1.substr(0, 2), 10));
						date1.setDate(date1.getDate() + 364);
						var curr_date = date1.getDate()+"";
						var curr_month = date1.getMonth()+"";
						var curr_year = date1.getFullYear();
					
						if(curr_date.length==1) {
							curr_date="0"+curr_date;
						}
					if(curr_month.length==1) {
							curr_month="0"+curr_month;
						}
						document.getElementById('pole_to').value=curr_date+"."+curr_month+"."+curr_year;
					
					}
				}
				
				setInterval("take_diff()",500);
			</script>
<? } ?>
			
			<script>
				
			function check_control1() {
			
				
				var country_text=document.getElementById('country_text').value;
				var calc__select=document.getElementById('calc__select-program-show').value;
				var pole_from=document.getElementById('pole_from').value;
				var pole_to=document.getElementById('pole_to').value;
				var calc__select_data=document.getElementById('calc__select-datetime__input').value;
				
				
				if((country_text!='')&&(calc__select!='')&&(pole_from!='')&&(pole_to!='')&&(calc__select_data!='')) {
					document.getElementById('calc__form__step1').submit();
				} else {
					alert('Введите пожалуйста все данные!');	
				}
			}
							</script>
			
		<div class="calculator__form__holder--w50">
			<div class="calculator__form__input calculator__form__input--w50 calculator__form__input--ico-calendar" id="calc__select-startdate">
				<input type="text" class="" name="from" id="pole_from" placeholder="Туда">
				<!--<div class="calculator__form__dropdown" id="calc__drop__select-startdate">
					на 5 дней
				</div>-->
			</div>
			<div class="calculator__form__input calculator__form__input--w50 calculator__form__holder--float-right calculator__form__input--ico-calendar" id="calc__select-enddate">
				<input type="text" class="" name="to" id="pole_to" placeholder="Обратно">
				<!--<div class="calculator__form__dropdown" id="calc__drop__select-enddate">
					на 5 дней
				</div>-->
			</div>
		</div>

		<!-- выберите тип -->

		<div class="calculator__form__holder--w50 calculator__form__holder--float-right">
			<div style="position:absolute;top:10px;left:125px;width:30px;height:30px;z-index:999" id="hide_galka">
				<img src="img/kvadrat.jpg" width="35" height="35" border="0">
			</div>
			<div class="calculator__form__input calculator__form__input--no-pad">
				<div class="calculator__form__input--dropdown" id="calc__select-timeframe--toggle">
					<input type="text"  name="infodays" placeholder="сколько дней?" style="position:relative;top:14px" class="" id="calc__select-datetime__input">
					<div class="calculator__form__dropdown calculator__form__dropdown--no-pad" id="calc__select-datetype">
						<ul class="calculator__form__dropdown__custom-select">
							<li data-value="15">15 дней</li>
							<li data-value="30">30 дней</li>
							<li data-value="45">45 дней</li>
							<li data-value="60">60 дней</li>
							<li data-value="90">90 дней</li>
						</ul>
					</div>
				</div>
				<div class="calculator__form__input--dropdown disabled" id="calc__select-timeframe--toggle--single">
					<input type="text" class="" id="calc__select-datetime__input" disabled>
				</div>

				<div class="calculator__form__datetype__wrap">
					<div class="calculator__form__datetype">
						<input type="radio" name="product" value="1" id="calc__form__datetype__single" checked>
						<label for="calc__form__datetype__single">Однократная</label>
					</div>
					<div class="calculator__form__datetype">
						<input type="radio" id="calc__form__datetype__multi" name="product" value="3" >
						<label for="calc__form__datetype__multi">Многократная<span> (multi)</span></label>
					</div>
				</div>
			</div>
		</div>

		<div class="calculator__form__promocode">
			<a href="#" id="have-promo-trigger">У вас есть промокод?</a>
			<div id="have-promo">
			<input type="text" class="calculator__form__promocode__input" name="promo" placeholder="Введите промокод">
			</div>
		</div>
		<div class="text-center" onClick="check_control1()">
			<button class="btn btn-calc-cta" type="button">РАСЧЕТ СТОИМОСТИ</button>
			
			<!-- 
			<div class="div">
			<a href="#" id="simulate-validation" style="font-size: 12px; color: white;">Симуляция ошибки валидатора</a>
			</div>
		удалить это -->				
		</div>

	</form>

	<!-- STEP 2 -->
<?
	
	if($step==2) {
		
	$infodays=$infodays*1;

		$infodays=round((strtotime($to)-strtotime($from))/(60*60*24),2);

	
////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////
///сообщаем в базу что такой партнер запустил калькулятор
///echo $partnerId;
///////var_dump($age);
///////var_dump($age);
		$resultp=mysqli_query($link,"SELECT fon,color1,color2 from partners where id='".$partnerId."'");
			$rowsp=@mysqli_num_rows($resultp);
				while($rowsp=@mysqli_fetch_array($resultp)) {
				extract($rowsp);
				}
				if($fon=="") { $fon="form bg"; }
				if($color1=="") { $color1="#000000"; }
				if($color2=="") { $color2="#FFFFFF"; }
////если мультистраховка, то дни считаются уже по другому				
if($onlym!="") {
 $infodays=$new_days;
 }
 
$strah_summ=str_replace(" ","",$strah_summ);
 $ar[]="";
 ////если мультистраховка, то дни считаются уже по другому
 if($onlym!="") {
 $infodays=$new_days;
 }
	
 
 /////определяем зону
	$result_summ=mysqli_query($link,"SELECT naim as country_xlsx,t1 as t1_xlsx,t2 as t2_xlsx from countries");
			$rows_summp=@mysqli_num_rows($result_summ);
			while($rows_summp=@mysqli_fetch_array($result_summ)) {
			extract($rows_summp);
			
					if(strnatcasecmp($country,$country_xlsx)==0) { 
					$country_alpha=$t1_xlsx; 
					$country_ergo=$t2_xlsx; 	
				///	break;
					}
			}
 			
	$description[]="Расходы по медицинской транспортировке";
	$description[]="Расходы по посмертной репатриации тела";
	$description[]="Расходы на стоматологическую помощь";
	 $description[]="Расходы по оплате срочных сообщений";
 $description[]="Транспортные расходы";
		 $description[]="Расходы при утрате документов";
	$description[]="Расходы по получению юридической помощи";

							   
							   
	///////сколько дней
 if($infodays>=3 and $infodays<=7) { $days_key="03-07"; } 
 if($infodays>=8 and $infodays<=15) { $days_key="08-15";}
 if($infodays>=16 and $infodays<=21) { $days_key="16-21";}
 if($infodays>=22 and $infodays<=30) { $days_key="22-30";}
 if($infodays>=31 and $infodays<=60) { $days_key="31-60";}
 if($infodays>=61 and $infodays<=90) { $days_key="61-90";}
 if($infodays>=91 and $infodays<=180) { $days_key="91-180";}
 if($infodays>=181 and $infodays<=365) { $days_key="181-365";}
 if($infodays>365) { $days_key="181-365";}
 
////////есть ли у нас возраст более 60 лет
for($k=0;$k<count($age);$k++) {
  if($age[$k]>60) {
  $more_60=1;
}
}  

function get_summs($link,$program_pos,$territory) {
////////название программы
	
			 $result_pos=mysqli_query($link,"SELECT program from naim_programs where id=$program_pos");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
					
				}
	
 $result=mysqli_query($link,"SELECT strah_summ from prices_territories where $territory='1' and program='$program'");
 /////колво найденных
	$rows=@mysqli_num_rows($result);
	while($rows=@mysqli_fetch_array($result)) {
	extract($rows);
	$summs[]=$strah_summ;
	}
return $summs;
}

////////////берем ближайшую программу

function get_near_summ($link,$program_pos,$territory,$strah_summ) {
    $summs=@get_summs($link,$program_pos,$territory);
              if(is_array($summs)) 
foreach($summs as $sm) {
 if($sm!=$strah_summ) {
 $near_summs[]=$sm*1;
 }
}
//////////текущую сумму исключили, теперь берем максимальную из доступных
$curr_summ=@min($near_summs);
return $curr_summ;
}

//////echo get_near_summ(3,"TI",15000);
//////////var_dump(get_summs(3,"TI"));

function get_other_programs($link,$programs,$territory,$param) {
	if(is_array($programs)) {
        
    } else $programs[]="-1";
if($param=='ERGO') { //////////для ерго
	for($i=4;$i<=6;$i++) {
	if(!(in_array("$i",$programs))) { $other_programs[]=$i; }
	}
////////////////получили список остальных программ
	return $other_programs;
} else { ///////////для альфы
	for($i=1;$i<=3;$i++) {
	 if(!(in_array("$i",$programs))) { $other_programs[]=$i; }
	}
////////////////получили список остальных программ
	return $other_programs;
}
	
}

							   
							   
 /////сам расчет, для ерго
	if($product!="3") {
 $result=mysqli_query($link,"SELECT program as program_new from prices_territories where $country_ergo='1' and program LIKE '%ERGO%' and strah_summ='$strah_summ' order by program_new asc");
	      $rows=@mysqli_num_rows($result);
	$cnt=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		$program[]=$program_new;
		///////позиция программы
			 $result_pos=mysqli_query($link,"SELECT id from naim_programs where program='$program_new'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
		$program_pos[]=$id;
		$summs[$id]=$strah_summ;
		}
	/////////////здесь нужно посмотреть по всем другим программам, есть ли у нас еще варианты для этих параметров
	$other_programs=get_other_programs($link,$program_pos,$country_ergo,'ERGO');
	//////var_dump(get_other_programs($program_pos,$country_ergo,'ERGO'));
	//////смотрим для каких сумм
	if(is_array($other_programs)) 
	foreach($other_programs as $other) {
		$near_summ=get_near_summ($other,$country_ergo,$strah_summ);
		////повторяем выбор для этих программ
		 $result=mysqli_query($link,"SELECT program as program_new from prices_territories where $country_ergo='1' and program LIKE '%ERGO%' and strah_summ='$near_summ' order by program_new asc");
	$rows=@mysqli_num_rows($result);
	$cnt=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		///////позиция программы
			 $result_pos=mysqli_query($link,"SELECT id from naim_programs where program='$program_new'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
		if($id==$other) {
		$program[]=$program_new;
		$program_pos[]=$id;
		$summs[$id]=$near_summ;
		}
		}
	}
 }

 	if($product=="3") {
/////только мульти
 $result=mysqli_query($link,"SELECT program as program_new from prices_territories where $country_ergo='1' and program LIKE '%MULT%' and strah_summ='$strah_summ'  and program LIKE '%ERGO%' order by program_new asc");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		$program[]=$program_new;
		///////позиция программы
			$result_pos=mysqli_query($link,"SELECT id from naim_programs where program='$program_new'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
		$program_pos[]=$id;
		$summs[$id]=$strah_summ;
		}


		
 }
////////////////////////////////////для альфа
	if($product!="3") {
 $result=mysqli_query($link,"SELECT program as program_new from prices_territories where $country_alpha='1' and program not LIKE '%ERGO%' and strah_summ='$strah_summ' order by program_new asc");
	      
        $rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		$program[]=$program_new;
				///////позиция программы
			$result_pos=mysqli_query($link,"SELECT id from naim_programs where program='$program_new'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
		$program_pos[]=$id;
		$summs[$id]=$strah_summ;
		}
		
		/////////////здесь нужно посмотреть по всем другим программам, есть ли у нас еще варианты для этих параметров
	$other_programs=get_other_programs($link,$program_pos,$country_ergo,'ALPHA');
	////var_dump(get_other_programs($program_pos,$country_ergo,'ALPHA'));
	//////смотрим для каких сумм
	if(is_array($other_programs)) {
	foreach($other_programs as $other) {
		$near_summ=get_near_summ($other,$country_alpha,$strah_summ);
		////повторяем выбор для этих программ
		 $result=mysqli_query($link,"SELECT program as program_new from prices_territories where $country_alpha='1' and program not LIKE '%ERGO%' and strah_summ='$near_summ' order by program_new asc");
	$rows=@mysqli_num_rows($result);
	$cnt=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		///////позиция программы
			 $result_pos=mysqli_query($link,"SELECT id from naim_programs where program='$program_new'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
		if($id==$other) {
		$program[]=$program_new;
		$program_pos[]=$id;
		$summs[$id]=$near_summ;
		}
		}
	}
 }
    }

 	if($product=="3") {
/////только мульти
 $result=mysqli_query($link,"SELECT program as program_new from prices_territories where $country_alpha='1' and program LIKE '%MULT%' and strah_summ='$strah_summ' and program not LIKE '%ERGO%' order by program_new asc");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		$program[]=$program_new;
				///////позиция программы
			$result_pos=mysqli_query($link,"SELECT id from naim_programs where program='$program_new'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
		$program_pos[]=$id;
		$summs[$id]=$strah_summ;
		}
		
 }
 
///// array_multisort($program_pos, $program);
///ищем позицию программы А
for($i=0;$i<=7;$i++) {
if($program_pos[$i]=='5') $pos_a=$i;
if($program_pos[$i]=='4') $pos_b=$i;
}

////если последовательность неправильная..
if($pos_b>$pos_1) {
	$buf = $program_pos[$pos_b];
	$program_pos[$pos_b] = $program_pos[$pos_a];
	$program_pos[$pos_a] = $buf;
	
		$buf = $program[$pos_b];
	$program[$pos_b] = $program[$pos_a];
	$program[$pos_a] = $buf;
}
 


 ////////////////////////////////учитываем промо код/////
	if($promo!=="") {
 $result=mysqli_query($link,"SELECT skidka,count from promo where code='$promo' and (product='' or product='strahov' or product='all')");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
	}
 ///теперь считаем тарифы для каждой программы
 foreach($program_pos as $p) {

 if($p<=3)
  $result=mysqli_query($link,"SELECT program_$p as price from main_price where days='$days_key' and summ='".$summs[$p]."' and (territories='$country_alpha')"); else 
    $result=mysqli_query($link,"SELECT program_$p as price from main_price where days='$days_key' and summ='".$summs[$p]."' and (territories='$country_ergo')");
	$rows=mysqli_num_rows($result);
		while($rows=mysqli_fetch_array($result)) {
		extract($rows);
		 $price=str_replace(",",".",$price);
		
		}
 if($price<=10) {
 ////цена с евро
	 $euro=$euro*1;
	
 $price=round(($price*$infodays*$euro),2); 
 } else
	{
	//////цена без евро
	$price=round($price*1,2); 
	}  
	
 //////////////основнвые тарифы посчитали, теперь считаем дополнительные опции, сейчас доп опции не зависят от возраста
 ////дополнительные риски считаются только для программы С
 

	 
	 /////рассчет дополнительных рисков
	 if($med_extr!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=1");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$med_extr) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 	///////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	 	 if($transport_opt!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=2");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$transport_opt) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	 	 	 if($repatr_opt!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=3");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$repatr_opt) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	  if($sr_message!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=4");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$sr_message) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	  if($vizit!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=5");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$vizit) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }

	  if($evac!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=6");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$evac) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	 if($dosr_return!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=7");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$dosr_return) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	  if($stomat!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=8");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$stomat) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	 if($bagag_lost!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=9");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$bagag_lost) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	 
	 if($bagag_wait!="") {
		 
	 	$result_risk=mysqli_query($link,"SELECT summ,kf,ergo,multi from riski where id=10");
				$rows_risk=@mysqli_num_rows($result_risk);
				while($rows_risk=@mysqli_fetch_array($result_risk)) {
				extract($rows_risk);
				}
			 
		$arr_summ=explode(",",$summ);
		$arr_kf=explode(",",$kf);
			 
		 $pos=0;
		 foreach($arr_summ as $sm) {
			 if($sm==$bagag_wait) $posit=$pos;
			 $pos++;
		 }
		 $summ=$arr_summ[$posit];
		 $kf=$arr_kf[$posit];
		 //////	 echo "result_formula $infodays x $kf x $summ <br>";
		 $price=$price+round($infodays*$kf*$summ,2); 
		 if($ergo=="") $no_ergo="1";
		 if($multi=="") $no_alpha="1";
	 }
	

	
	///получили стоимость на одного человека
/////////////теперь остальные опции
for($oopt=1;$oopt<15;$oopt++) {
if(${"opt$oopt"}!="") $price=$price+round((${"opt$oopt"}*$euro*0.04),2);
}


  $result=mysqli_query($link,"SELECT lsport_alpha,esport_alpha,lsport_ergo,esport_ergo,malpha,mergo from sport where id=1");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}

 ////надбавки за спорт
   if($p<=3) { ///////это альфастрахование
   if($sport=="True") $price=$price*$lsport_alpha;
   if($sport=="extrim") $price=$price*$esport_alpha;
	   if($sport=="moped") $price=$price*$malpha;
   } else {
   if($sport=="True") $price=$price*$lsport_ergo;
   if($sport=="extrim") $price=$price*$esport_ergo;
	    if($sport=="moped") $price=$price*$mergo;
   }
	
////смотрим какой регион

 if(strpos(@occurrence(),"Moscow")>-1 and ($p==3 or $p==6) and $infodays<=30)  {
$price=round($price*1.65,2);
}



/////////////////////////////цена страховки для одного человека
$price_one=$price;
/////////////////////////////обнуляем всю стоимость
$price=0;
/////////////////////////////теперь считаем возрасты каждого человека
 
 if($p<=3) { ///////это альфастрахование
 
for($k=0;$k<count($age);$k++) {
  if($age[$k]>=65 and $age[$k]<=79) {
 $price_ag=$price_one*2;
	  $no_ergo="1";
 } elseif($age[$k]>80) {
 $price_ag=$price_one*7;
	  $no_ergo="1";
 } else $price_ag=$price_one;
	
 $price=$price+$price_ag;
 }
 

} else {
	 
///////это эрго
for($k=0;$k<count($age);$k++) {
   if($age[$k]>=65 and $age[$k]<=79) {
	   $no_ergo="1";
 $price_ag=$price_one*2;
 } elseif($age[$k]>80) {
 $price_ag=$price_one*7;
	    $no_ergo="1";
 } else $price_ag=$price_one;
	
 $price=$price+$price_ag;
 }

}


 ////////////////////////////////////////////////////////////////////
 ////для москвичей надбавка - 40%
 
 /////////////
  if($skidka>1) {
 $skidka_c=1-round($skidka/100,2);
 $price=round($price*$skidka_c,2);
 }

 if($pl!='1') $prices[]=$price; else
 $prices[]="<font size='-2'>персонально</font>";
 }
							   
/////создание массива цен опций
 ////сумма страховки 30 000
  /////программа эконом
   $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Эконом (В)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['2']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['2']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['2']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['2']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['2']['Транспортные расходы']=$transport;
 $cena_opt['30000']['2']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['2']['Расходы по получению юридической помощи']=$ur;
 /////программа классик
    $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Классик (С)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['1']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['1']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['1']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['1']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['1']['Транспортные расходы']=$transport;
 $cena_opt['30000']['1']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['1']['Расходы по получению юридической помощи']=$ur;
  /////программа мульти
      $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['3']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['3']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['3']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['3']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['3']['Транспортные расходы']=$transport;
 $cena_opt['30000']['3']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['3']['Расходы по получению юридической помощи']=$ur;
 ////////////ЕРГО
  /////программа мульти
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['6']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['6']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['6']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['6']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['6']['Транспортные расходы']=$transport;
 $cena_opt['30000']['6']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['6']['Расходы по получению юридической помощи']=$ur;
   /////программа В
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-B' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['4']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['4']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['4']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['4']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['4']['Транспортные расходы']=$transport;
 $cena_opt['30000']['4']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['4']['Расходы по получению юридической помощи']=$ur;
  /////программа А  
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-A' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['5']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['5']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['5']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['5']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['5']['Транспортные расходы']=$transport;
 $cena_opt['30000']['5']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['5']['Расходы по получению юридической помощи']=$ur;
		 /////программа ERGO-C 
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-C' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['7']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['7']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['7']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['7']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['7']['Транспортные расходы']=$transport;
 $cena_opt['30000']['7']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['7']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-B
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-B' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['8']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['8']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['8']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['8']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['8']['Транспортные расходы']=$transport;
 $cena_opt['30000']['8']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['8']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-C
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-C' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['30000']['9']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['30000']['9']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['30000']['9']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['30000']['9']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['30000']['9']['Транспортные расходы']=$transport;
 $cena_opt['30000']['9']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['30000']['9']['Расходы по получению юридической помощи']=$ur;
 
 
 
  ////сумма страховки 15 000
   /////программа эконом
   $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Эконом (В)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['2']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['2']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['2']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['2']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['2']['Транспортные расходы']=$transport;
 $cena_opt['15000']['2']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['2']['Расходы по получению юридической помощи']=$ur;
 /////программа классик
    $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Классик (С)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['1']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['1']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['1']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['1']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['1']['Транспортные расходы']=$transport;
 $cena_opt['15000']['1']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['1']['Расходы по получению юридической помощи']=$ur;
  /////программа мульти
      $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['3']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['3']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['3']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['3']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['3']['Транспортные расходы']=$transport;
 $cena_opt['15000']['3']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['3']['Расходы по получению юридической помощи']=$ur;
 ////////////ЕРГО
  /////программа мульти
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['6']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['6']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['6']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['6']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['6']['Транспортные расходы']=$transport;
 $cena_opt['15000']['6']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['6']['Расходы по получению юридической помощи']=$ur;
   /////программа В
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-B' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['4']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['4']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['4']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['4']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['4']['Транспортные расходы']=$transport;
 $cena_opt['15000']['4']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['4']['Расходы по получению юридической помощи']=$ur;
  /////программа А  
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-A' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['5']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['5']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['5']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['5']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['5']['Транспортные расходы']=$transport;
 $cena_opt['15000']['5']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['5']['Расходы по получению юридической помощи']=$ur;
		
				 /////программа ERGO-C 
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-C' and summ='15000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['7']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['7']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['7']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['7']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['7']['Транспортные расходы']=$transport;
 $cena_opt['15000']['7']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['7']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-B
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-B' and summ='15000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['8']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['8']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['8']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['8']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['8']['Транспортные расходы']=$transport;
 $cena_opt['15000']['8']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['8']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-C
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-C' and summ='15000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['15000']['9']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['15000']['9']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['15000']['9']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['15000']['9']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['15000']['9']['Транспортные расходы']=$transport;
 $cena_opt['15000']['9']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['15000']['9']['Расходы по получению юридической помощи']=$ur;
 
   ////сумма страховки 50 000
    /////программа эконом
   $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Эконом (В)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['2']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['2']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['2']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['2']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['2']['Транспортные расходы']=$transport;
 $cena_opt['50000']['2']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['2']['Расходы по получению юридической помощи']=$ur;
 /////программа классик
    $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Классик (С)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['1']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['1']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['1']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['1']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['1']['Транспортные расходы']=$transport;
 $cena_opt['50000']['1']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['1']['Расходы по получению юридической помощи']=$ur;
  /////программа мульти
      $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['3']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['3']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['3']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['3']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['3']['Транспортные расходы']=$transport;
 $cena_opt['50000']['3']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['3']['Расходы по получению юридической помощи']=$ur;
 ////////////ЕРГО
  /////программа мульти
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['6']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['6']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['6']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['6']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['6']['Транспортные расходы']=$transport;
 $cena_opt['50000']['6']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['6']['Расходы по получению юридической помощи']=$ur;
   /////программа В
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-B' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['4']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['4']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['4']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['4']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['4']['Транспортные расходы']=$transport;
 $cena_opt['50000']['4']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['4']['Расходы по получению юридической помощи']=$ur;
  /////программа А  
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-A' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['5']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['5']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['5']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['5']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['5']['Транспортные расходы']=$transport;
 $cena_opt['50000']['5']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['5']['Расходы по получению юридической помощи']=$ur;
		
						 /////программа ERGO-C 
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-C' and summ='50000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['7']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['7']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['7']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['7']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['7']['Транспортные расходы']=$transport;
 $cena_opt['50000']['7']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['7']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-B
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-B' and summ='50000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['8']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['8']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['8']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['8']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['8']['Транспортные расходы']=$transport;
 $cena_opt['50000']['8']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['8']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-C
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-C' and summ='50000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['50000']['9']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['50000']['9']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['50000']['9']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['50000']['9']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['50000']['9']['Транспортные расходы']=$transport;
 $cena_opt['50000']['9']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['50000']['9']['Расходы по получению юридической помощи']=$ur;
 
    ////сумма страховки 100 000
    /////программа эконом
   $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Эконом (В)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['2']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['2']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['2']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['2']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['2']['Транспортные расходы']=$transport;
 $cena_opt['100000']['2']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['2']['Расходы по получению юридической помощи']=$ur;
 /////программа классик
    $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='Классик (С)' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['1']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['1']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['1']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['1']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['1']['Транспортные расходы']=$transport;
 $cena_opt['100000']['1']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['1']['Расходы по получению юридической помощи']=$ur;
  /////программа мульти
      $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['3']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['3']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['3']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['3']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['3']['Транспортные расходы']=$transport;
 $cena_opt['100000']['3']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['3']['Расходы по получению юридической помощи']=$ur;
 ////////////ЕРГО
  /////программа мульти
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-MULTI' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['6']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['6']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['6']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['6']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['6']['Транспортные расходы']=$transport;
 $cena_opt['100000']['6']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['6']['Расходы по получению юридической помощи']=$ur;
   /////программа В
        $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-B' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['4']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['4']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['4']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['4']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['4']['Транспортные расходы']=$transport;
 $cena_opt['100000']['4']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['4']['Расходы по получению юридической помощи']=$ur;
  /////программа А  
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-A' and summ='30000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['5']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['5']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['5']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['5']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['5']['Транспортные расходы']=$transport;
 $cena_opt['100000']['5']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['5']['Расходы по получению юридической помощи']=$ur;
		
					 /////программа ERGO-C 
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='ERGO-C' and summ='100000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['7']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['7']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['7']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['7']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['7']['Транспортные расходы']=$transport;
 $cena_opt['100000']['7']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['7']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-B
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-B' and summ='100000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['8']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['8']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['8']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['8']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['8']['Транспортные расходы']=$transport;
 $cena_opt['100000']['8']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['8']['Расходы по получению юридической помощи']=$ur;
		 /////программа MULTI ERGO-C
          $result=mysqli_query($link,"SELECT med_transport,repatr,stomat,messages,transport,pohish_doc,ur,avto from dop_risk where program='MULTI ERGO-C' and summ='100000'");
	$rows=@mysqli_num_rows($result);
		while($rows=@mysqli_fetch_array($result)) {
		extract($rows);
		}
 $cena_opt['100000']['9']['Расходы по медицинской транспортировке']=$med_transport;
 $cena_opt['100000']['9']['Расходы по посмертной репатриации тела']=$repatr;
 $cena_opt['100000']['9']['Расходы на стоматологическую помощь']=$stomat;
 $cena_opt['100000']['9']['Расходы по оплате срочных сообщений']=$messages;
 $cena_opt['100000']['9']['Транспортные расходы']=$transport;
 $cena_opt['100000']['9']['Расходы при утрате документов']=$pohish_doc;
 $cena_opt['100000']['9']['Расходы по получению юридической помощи']=$ur;
							   
/////////////////////////////////
$result=mysqli_query($link,"UPDATE promo set count='".($count*1+1)."' where code='$promo'");
 $rr=0;
 $more_60="";
	/*
		echo "<pre>";
		var_dump($prices);
		echo "</ppre>";
	*/
	///////////////обновление данных, форма и функции	
?>
								<script>
									function send_new_days(days) {
									
										document.getElementById('set_new_infodays').value=days;
										document.getElementById('change_data_now').submit();
									}
									
									

									
									function send_new_data() {
									///////////обновление новых параметров
									
									var new_country=document.getElementById('new_country').options[document.getElementById('new_country').selectedIndex].text;
									var new_to=document.getElementById('new_to').value;	
										
									var new_from=document.getElementById('new_from').value;	
									var new_ages=document.getElementById('new_ages').value;	
									
									var new_sport=document.getElementById('new_sport').options[document.getElementById('new_sport').selectedIndex].value;
										
										
										
									
										document.getElementById('set_new_country').value=new_country;
										document.getElementById('set_new_to').value=new_to;
										document.getElementById('set_new_from').value=new_from;
										document.getElementById('set_new_sport').value=new_sport;
										
										/////получаем данные о доп.рисках сейчас
										var e="";
										var val="";
										
										e = document.getElementById("med_extr");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
											if(e.checked) { 	val=e.value;	}
										}
										
										
										document.getElementById('set_med_extr').value=val;
										}
								
										val="";
										e = document.getElementById("transport_opt");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
												if(e.checked) { val=e.value; }
										}
										
										document.getElementById('set_transport').value=val;
										}
										
										val="";
										
										e = document.getElementById("repatr_opt");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
											if(e.checked) { 	val=e.value;	}
										}
										document.getElementById('set_repatr').value=val;
										}
										
										val="";
										
										e = document.getElementById("sr_message");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
											if(e.checked) { 	val=e.value;	}
										}
										document.getElementById('set_sr_message').value=val;
										}
										
										val="";
										
										e = document.getElementById("vizit");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
											if(e.checked) { 	val=e.value;	}
										}
										document.getElementById('set_vizit').value=val;
										}
										
										val="";
										
										e = document.getElementById("evac");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
											if(e.checked) { 	val=e.value;	}
										}
										document.getElementById('set_evac').value=val;
										}
										
										val="";
										
										e = document.getElementById("dosr_return");
										if(e) {
										if(e.tagName=="SELECT") {
											val=e.options[e.selectedIndex].value;
										} else {
												if(e.checked) { val=e.value;	}
										}
										document.getElementById('set_dosr_return').value=val;
										}
										
									
										
										
										document.getElementById('change_data_now').submit();
										
									}
								</script>
								
									<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="change_data_now">
									<input type="hidden" name="partnerId" value="<?=$partnerId?>"/>
									<input type="hidden" name="product" value="<?=$product?>"/>
									<input type="hidden" name="from" value="<?=$from?>" id="set_new_from"/>
									<input type="hidden" name="to" value="<?=$to?>" id="set_new_to"/>
									<input type="hidden" name="no_citizen" value="<?=$no_citizen?>"/>
									<input type="hidden" name="promo" value="<?=$promo?>"/>
									<input type="hidden" name="infodays" value="<?=$infodays?>" id="set_new_infodays"/>
									<input type="hidden" name="country" value="<?=$country?>" id="set_new_country"/>
										  <input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="sport" value="<?=$sport?>" id="set_new_sport"/>
									<input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="onlym" value="<?=$onlym?>"/>
									<input type="hidden" name="step" value="2"/>   	
									<? foreach($age as $ag) { ?>
									<input type="hidden" name="age[]" value="<?=$ag?>"/>
									<? } ?>
									
										<input type="hidden" name="med_extr" id="set_med_extr" value=""/>
										<input type="hidden" name="transport_opt" id="set_transport" value=""/>
										<input type="hidden" name="repatr_opt" id="set_repatr" value=""/>
										<input type="hidden" name="sr_message" id="set_sr_message" value=""/>
										<input type="hidden" name="vizit" id="set_vizit" value=""/>
										<input type="hidden" name="evac" id="set_evac" value=""/>
										<input type="hidden" name="dosr_return" id="set_dosr_return" value=""/>
							
										
									 <input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
									 <input type="hidden" name="ages1" value="<?=$ages1?>"/>
									 <input type="hidden" name="ages2" value="<?=$ages2?>"/>
									 <input type="hidden" name="ages3" value="<?=$ages3?>"/>
							         <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
									 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
									 <input type="hidden" name="kvart" value="<?=$kvart?>"/>
									 <input type="hidden" name="set_ip" value="<?=$set_ip?>">
									 <input type="hidden" name="neschast" value="<?=$neschast?>"/>
									 <input type="hidden" name="onlym" value="<?=$onlym?>"/>
														 <? //перечисляем другие имена переменных opt
									 for($oop=1;$oop<15;$oop++) { ?>
									<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
									<? }?>
										
									<input type="hidden" name="strah_summ" value="<?=$strah_summ?>"/>
											</form>
								
<?  //////////////////отправка данных для заказа страховки ?>
								<script>
									function get_order(product,price) {
										document.getElementById('set_program_id').value=product;
										if(document.getElementById('no_citizen').checked) {
											document.getElementById('no_citizen_order').value='no_citizen';
										}
										
										var assist=document.getElementById('assist_select_'+product).options[document.getElementById('assist_select_'+product).selectedIndex].value;
										document.getElementById('set_assist').value=assist;
										document.getElementById('set_price').value=price;
										
										document.getElementById('order_strah').submit();
									}
								</script>
		 <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="order_strah">
                    <input type="hidden" name="partnerId" value="<?=$partnerId?>"/>
                     <input type="hidden" name="promo" value="<?=$promo?>"/>
					<input type="hidden" name="product" value="<?=$product?>"/>
                    <input type="hidden" name="from" value="<?=$from?>"/>
					<input type="hidden" name="set_ip" value="<?=$set_ip?>">
                    <input type="hidden" name="to" value="<?=$to?>"/>
                    <input type="hidden" name="no_citizen" value="<?=$no_citizen?>" id="no_citizen_order"/>
                    <input type="hidden" name="infodays" value="<?=$infodays?>"/>
                    <input type="hidden" name="country" value="<?=$country?>"/>
					<input type="hidden" name="assist" value="<?=$assist?>" id="set_assist"/>
                    <input type="hidden" name="sport" value="<?=$sport?>"/>
					<input type="hidden" name="onlym" value="<?=$onlym?>"/>
					<input type="hidden" name="ages1" value="<?=$ages1?>"/>
					<input type="hidden" name="ages2" value="<?=$ages2?>"/>
					<input type="hidden" name="ages3" value="<?=$ages3?>"/>
			 
			<input type="hidden" name="med_extr" value="<?=$med_extr?>"/>   
			<input type="hidden" name="transport_opt" value="<?=$transport_opt?>"/>   
			<input type="hidden" name="repatr_opt" value="<?=$repatr_opt?>"/>   
			<input type="hidden" name="sr_message" value="<?=$sr_message?>"/>   
			<input type="hidden" name="vizit" value="<?=$vizit?>"/>   
			<input type="hidden" name="evac" value="<?=$evac?>"/>   
			<input type="hidden" name="dosr_return" value="<?=$dosr_return?>"/>  
			 
                    <input type="hidden" name="step" value="3"/>   
					<input type="hidden" name="price" id="set_price" value="<?=$price?>"/> 					
                    					<? foreach($age as $ag) { ?>
                    <input type="hidden" name="age[]" value="<?=$ag?>"/>
					<? } ?>
                    <input type="hidden" name="programId" value="<?=$p?>" id="set_program_id"/>
                    <input type="hidden" name="program" value="<?=$program[$spos]?>"/>
					<input type="hidden" name="kvart" value="<?=$kvart?>"/>
					<input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
					 <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
					 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
					 <input type="hidden" name="neschast" value="<?=$neschast?>"/>
					 <? if($p=='2' or $p=='7') { ?>
					 <input type="hidden" name="strah_summ" value="30 000"/>
					 <? } else { ?>
					 <input type="hidden" name="strah_summ" value="<?=$strah_summ?>"/>
					 <? }
					 for($oop=1;$oop<15;$oop++) { ?>
					<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
					<? }?>  
                 
                </form>						
								
								
<?   //////////////////////////////////////////////////////// ?>								
 	<form class="calculator__form" id="calc__form__step2">
		<div class="calculator__form__editable-step" style="height:80px">
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Зона покрытия
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field"><?=$country?></span>
					<i class="ico ico-edit"></i>
				</a>
				
				 <select id="new_country" onChange="send_new_data()" class="calculator__form__editable-step__field__editable" style="width:200px">
									<?
				///теперь сюда включаем список стран
	
			$result_summ=mysqli_query($link,"SELECT naim as naim_country from countries");
			$rows_summp=@mysqli_num_rows($result_summ);
			while($rows_summp=@mysqli_fetch_array($result_summ)) {
			extract($rows_summp);
				?>
				 <option value="<?=$naim_country?>" <? if($country==$naim_country) echo "selected"; ?>><?=$naim_country?></option>
				<?
				}
	
				?>
			</select>
		
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Застрахованные
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field">
						<? if($ages1!=0) echo "$ages1 взрослых";
						   if($ages2!=0) echo ", $ages2 ребенок";
						   if($ages3!=0) echo ", $ages3 свыше 65 лет";
						?></span>
					<i class="ico ico-edit"></i>
				</a>
				<input type="text" id="new_ages" placeholder="	<? if($ages1!=0) echo "$ages1 взрослых";
						   if($ages2!=0) echo ", $ages2 ребенок";
						   if($ages3!=0) echo ", $ages3 свыше 65 лет";
						?>" class="calculator__form__editable-step__field__editable" onChange="send_new_data()">
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Начало поездки
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field"><? echo $from;?></span>
					<i class="ico ico-edit"></i>
				</a>
				<script src='/calend.js' type='text/javascript'>
</script>		
				<input type="text" placeholder="<? echo $from;?>" value="<? echo $from;?>" id="new_from" class="calculator__form__editable-step__field__editable" onChange="send_new_data()">
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Конец поездки
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field"><? echo $to;?></span>
					<i class="ico ico-edit"></i>
				</a>
				<input type="text" id="new_to" value="<? echo $to;?>" placeholder="<? echo $to;?>" class="calculator__form__editable-step__field__editable" onChange="send_new_data()">
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Программа
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field">
			<? 
			if($sport=="") echo "Стандарт";
			if($sport=="True") echo "Спорт";
			if($sport=="extrim") echo "Экстремальный спорт";
			if($sport=="moped") echo "Мопед";
						?></span>
					<i class="ico ico-edit"></i>
				</a>
				
				
				<select id="new_sport" onChange="send_new_data()" class="calculator__form__editable-step__field__editable" style="width:200px">
			
				 <option value="" <? if($sport=="") echo "selected"; ?>>Стандарт</option>
				 <option value="True" <? if($sport=="True") echo "selected"; ?>>Спорт</option>
				 <option value="extrim" <? if($sport=="extrim") echo "selected"; ?>>Экстремальный спорт</option>
				 <option value="moped" <? if($sport=="moped") echo "selected"; ?>>Мопед</option>
				
			</select>
				
				
			</div>
		</div>
	

		<div class="heading text-center">Выберите программу страхования</div>
		<div class="row" style="position: relative">

			<div class="col-sm-12 col-lg-10" id="calc__all-offers">
	<?

			function check_array_my($arr,$needle) {
				$res=false;
				foreach($arr as $a) {
					if($a==$needle) $res=true;
				}
				return $res;
			}
		
		function array_swap(array &$array, $key, $key2)
		{
			if (isset($array[$key]) && isset($array[$key2])) {
				list($array[$key], $array[$key2]) = array($array[$key2], $array[$key]);
				return true;
			}

			return false;
		}
		
		////сортировка массива
		var_dump($program_pos);
		array_multisort($program,$program_pos);
		var_dump($program_pos);
		var_dump($program);
		
		/////меняем местами эконом и классик
		////какое место занимает эконом
		$pos_ec=0;
		foreach($program as $key=>$value) {
			if($value=="Эконом (В)") $pos_ec=$key;	
		}
		
		$pos_klass=0;
		foreach($program as $key=>$value) {
			if($value=="Классик (С)") $pos_klass=$key;	
		}
		
		if($pos_klass!=0 and $pos_ec!=0) {
		////меняем местами
		array_swap($program_pos,$pos_klass,$pos_ec);
		array_swap($program,$pos_klass,$pos_ec);
		array_swap($prices,$pos_klass,$pos_ec);
		
		var_dump($program_pos);
		}
				
	?>			
				</form>
				<? if((check_array_my($program_pos,"4") or check_array_my($program_pos,"5") or check_array_my($program_pos,"7")) and $no_ergo=="") { ?>
				<div class="calculator__form__insurance">
					<div class="row">
						<div class="col-sm-3 no-pad-r">
							<div class="calculator__form__insurance__left">
								<div class="calculator__form__insurance__left__logo">
									<img src="images/ergo-small-logo.png" alt="" class="ergo">
								</div>
								<ul class="calculator__form__insurance__left__tabs">
									<li class="active">Программы страхования</li>
									<li>Ассистанс</li>
									<li>Франшиза</li>
									<li>Правила страхования</li>
									<li>Образец полиса</li>
								</ul>
							</div>
						</div>
						<div class="calculator__form__insurance__tabs active">
							
							
						<?
							
							$count_tab=1;
							///$pos=0;
						foreach($program_pos as $pos=>$p) { 
							if($count_tab<4 and ($p==4 or $p==5 or $p==7)) {
							?>
							
							<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name">
										<?=$program[$pos];?>
									</div>
									<div class="calculator__form__insurance__card__price">
										<span>Страховая сумма</span>
										
										<? 
								if($strah_summ=='15000')  $sel1=" selected";
								if($strah_summ=='30000') $sel2=" selected";
								if($strah_summ=='50000') $sel3=" selected";
								if($strah_summ=='100000') $sel4=" selected";
								$background_pos=0;
								$spos=0;

								if($p!='2' and $p!='7') { 
								?>
								<!----форма для изменения данных--->
								<script>
								function change_p_summ<?=$p?>() {
								document.getElementById("change_p_summ<?=$p?>").submit();
								}
								</script>
									<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="change_p_summ<?=$p?>">
									<input type="hidden" name="partnerId" value="<?=$partnerId?>"/>
									<input type="hidden" name="product" value="<?=$product?>"/>
									<input type="hidden" name="from" value="<?=$from?>"/>
									<input type="hidden" name="to" value="<?=$to?>"/>
									<input type="hidden" name="no_citizen" value="<?=$no_citizen?>"/>
									<input type="hidden" name="promo" value="<?=$promo?>"/>
									<input type="hidden" name="infodays" value="<?=$infodays?>"/>
									<input type="hidden" name="country" value="<?=$country?>"/>
										  <input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="sport" value="<?=$sport?>"/>
									<input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="onlym" value="<?=$onlym?>"/>
									<input type="hidden" name="step" value="2"/>   	
									<? foreach($age as $ag) { ?>
									<input type="hidden" name="age[]" value="<?=$ag?>"/>
									<? } ?>
									 <input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
									 <input type="hidden" name="ages1" value="<?=$ages1?>"/>
									 <input type="hidden" name="ages2" value="<?=$ages2?>"/>
									 <input type="hidden" name="ages3" value="<?=$ages3?>"/>
									 <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
									 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
									 <input type="hidden" name="kvart" value="<?=$kvart?>"/>
									 <input type="hidden" name="set_ip" value="<?=$set_ip?>">
									 <input type="hidden" name="neschast" value="<?=$neschast?>"/>
									 <input type="hidden" name="onlym" value="<?=$onlym?>"/>
														 <? //перечисляем другие имена переменных opt
									 for($oop=1;$oop<15;$oop++) { ?>
									<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
									<? }?>
										<select name='strah_summ' onChange="change_p_summ<?=$p?>()">
									<?
									if($p<=3) $terr=$country_alpha; else $terr=$country_ergo;
									foreach(get_summs($link,$p,$terr) as $sm) {
									?>
									<option value='<?=$sm?>' <? if($sm==$strah_summ) echo "selected"; ?>><?=$sm?></option>
									<?
									}
									?>
										</select> €
										</form>
									
								<? } else { ?>
									
										<select disabled>
										<option>30 000</option>
										</select> €
									<? }  ?>
										
									</div>
									<div class="row calculator__form__insurance__price-helpers">
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-r">
											<div><i class="ico ico-ambulance"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по медицинской транспортировке"]*1;  ?> € </div>
											<div><i class="ico ico-teeth"></i>  <? echo $cena_opt[$strah_summ][$p]["Расходы по посмертной репатриации тела"]*1;  ?> € </div>
											<div><i class="ico ico-fly"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы на стоматологическую помощь"]*1;  ?> € </div>
											<div><i class="ico ico-scales"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по оплате срочных сообщений"]*1;  ?> € </div>
										</div>
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-l no-pad-l-md ">
											<div><i class="ico ico-caput"></i> <? echo $cena_opt[$strah_summ][$p]["Транспортные расходы"]*1;  ?> € </div>
											<div><i class="ico ico-message"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы при утрате документов"]*1;  ?> € </div>
											<div><i class="ico ico-pass"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по получению юридической помощи"]*1;  ?> € </div>
										</div>
										<table><tr><td width="15"></td><td>Ассист:</td><td width="5"></td><td>
								<? if($p>3) { ?>			
								<select id="assist_select_<?=$p?>" style="width:120px">
									 <option value='2'>AXA Assistance</option>
									 <option value='0'> Европ Ассистанс СНГ</option>
									 <option value='1'> САВИТАР Груп</option>
									
								</select>
											<? } else { ?>
											<select id="assist_select_<?=$p?>" style="width:120px">
									 			<option value='1'> САВИТАР Груп</option>
											</select>
											<? } ?>
								</td></tr></table>
									</div>
								
									<a href="javascript:get_order('<?=$p?>','<?=$prices[$pos];?>');" class="btn btn-calc-cta btn--insurance-card">Заказать <span><?=$prices[$pos];?> <i class="fa fa-rub"></i></span></a>
								</div>
							</div>
							<? $count_tab++; } $pos++;  }  ?>
							
							
						
						---->	
							</div>
						
						
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs"><br><br><br><br><br>
								<center><br><br>
									<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:10pt;width:500px">
										<font color="blue"><u>	Эксклюзив! <br>
										Ассист компании на выбор:<br>
                - АХА Assistance ( АКСА ассист)<br>
                - Europ Assistance ( Европ Ассистанс СНГ)<br>
											- Savitar Group ( Савитар Груп ) </u></font>
									</div>
									
									</div>
							
						</div>
						</div>
						
						
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<font color="blue"><u>Франшиза отсутствует</u></font>
									</div>
									</div>
							</div>

						</div>
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
								<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<a href="http://polis812.ru/pravila-strahovaniya-vzr-ergo.pdf" target="_blank">	<font color="blue"><u>	Правила страхования  ERGO </font></u></a>
									</div>
									</div>
						</div>
									</div>
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
					
							
								<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										
										
										<a href="http://polis812.ru/polisMULTIergo.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI-А, ERGO- A"</u></font> </a><br>
										<a href="http://polis812.ru/polisB-Cergo.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI-B, ERGO- B" </font></u></a><br>
										<a href="http://polis812.ru/polisB-Cergo.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI-C, ERGO- C" </font></u></a>
									</div>
									</div>
						</div>
							
							
						</div>
						
						
	
					</div>
				</div>
			<? } ?>
				
				
				<!-- NEXT CARD (ERGO MULTI) -->
	<? if((check_array_my($program_pos,"6") or check_array_my($program_pos,"8") or check_array_my($program_pos,"9")) and $no_ergo=="") { ?>
				<div class="calculator__form__insurance">
					<div class="row">
						<div class="col-sm-3 no-pad-r">
							<div class="calculator__form__insurance__left">
								<div class="calculator__form__insurance__left__logo">
									<img src="images/ergo-small-logo.png" alt="" class="ergo">
								</div>
								<div class="calculator__form__insurance__left__multi">
									Multi
									<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="bottom" title="Идеально для многократных поездок"></i>
									<ul class="calculator__form__insurance__left__multi__list">
										<li <? if($infodays=="15") { ?>class="active"<? } ?> onClick="send_new_days('15');"><a href="javascript:send_new_days('15');">15</a></li>
										<li <? if($infodays=="30") { ?>class="active"<? } ?> onClick="send_new_days('30');"><a href="javascript:send_new_days('30');">30</a></li>
										<li <? if($infodays=="45") { ?>class="active"<? } ?> onClick="send_new_days('45');"><a href="javascript:send_new_days('45');">45</a></li>
										<li <? if($infodays=="60") { ?>class="active"<? } ?> onClick="send_new_days('60');"><a href="javascript:send_new_days('60');">60</a></li>
										<li <? if($infodays=="90") { ?>class="active"<? } ?> onClick="send_new_days('90');"><a href="javascript:send_new_days('90');">90</a></li>
									</ul>
								</div>
								<ul class="calculator__form__insurance__left__tabs">
									<li>Ассистанс</li>
									<li>Франшиза</li>
									<li>Правила страхования</li>
									<li>Образец полиса</li>
								</ul>
							</div>
						</div>
						<div class="calculator__form__insurance__tabs active">
		
							
							<?
							
							$count_tab=1;
							///$pos=0;
						foreach($program_pos as $pos=>$p) { 
							if($count_tab<4 and ($p==6 or $p==8 or $p==9)) {
							?>
							
							<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name">
										<?=$program[$pos];?>
									</div>
									<div class="calculator__form__insurance__card__price">
										<span>Страховая сумма</span>
									
											<? 
								if($strah_summ=='15000')  $sel1=" selected";
								if($strah_summ=='30000') $sel2=" selected";
								if($strah_summ=='50000') $sel3=" selected";
								if($strah_summ=='100000') $sel4=" selected";
								$background_pos=0;
								$spos=0;

								if($p!='2' and $p!='7') { 
								?>
								<!----форма для изменения данных--->
								<script>
								function change_p_summ<?=$p?>() {
								document.getElementById("change_p_summ_row2<?=$p?>").submit();
								}
								</script>
									<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="change_p_summ_row2<?=$p?>">
									<input type="hidden" name="partnerId" value="<?=$partnerId?>"/>
									<input type="hidden" name="product" value="<?=$product?>"/>
									<input type="hidden" name="from" value="<?=$from?>"/>
									<input type="hidden" name="to" value="<?=$to?>"/>
									<input type="hidden" name="no_citizen" value="<?=$no_citizen?>"/>
									<input type="hidden" name="promo" value="<?=$promo?>"/>
									<input type="hidden" name="infodays" value="<?=$infodays?>"/>
									<input type="hidden" name="country" value="<?=$country?>"/>
										  <input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="sport" value="<?=$sport?>"/>
									<input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="onlym" value="<?=$onlym?>"/>
									<input type="hidden" name="step" value="2"/>   	
									<? foreach($age as $ag) { ?>
									<input type="hidden" name="age[]" value="<?=$ag?>"/>
									<? } ?>
									 <input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
									 <input type="hidden" name="ages1" value="<?=$ages1?>"/>
									 <input type="hidden" name="ages2" value="<?=$ages2?>"/>
									 <input type="hidden" name="ages3" value="<?=$ages3?>"/>
									 <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
									 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
									 <input type="hidden" name="kvart" value="<?=$kvart?>"/>
									 <input type="hidden" name="set_ip" value="<?=$set_ip?>">
									 <input type="hidden" name="neschast" value="<?=$neschast?>"/>
									 <input type="hidden" name="onlym" value="<?=$onlym?>"/>
														 <? //перечисляем другие имена переменных opt
									 for($oop=1;$oop<15;$oop++) { ?>
									<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
									<? }?>
										<select name='strah_summ' onChange="change_p_summ<?=$p?>()">
									<?
									if($p<=3) $terr=$country_alpha; else $terr=$country_ergo;
									foreach(get_summs($link,$p,$terr) as $sm) {
									?>
									<option value='<?=$sm?>' <? if($sm==$strah_summ) echo "selected"; ?>><?=$sm?></option>
									<?
									}
									?>
										</select> €
										</form>
									
								<? } else { ?>
									
										<select disabled>
										<option>30 000</option>
										</select> €
									<? }  ?>
										
									</div>
									<div class="row calculator__form__insurance__price-helpers">
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-r">
											<div><i class="ico ico-ambulance"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по медицинской транспортировке"]*1;  ?> € </div>
											<div><i class="ico ico-teeth"></i>  <? echo $cena_opt[$strah_summ][$p]["Расходы по посмертной репатриации тела"]*1;  ?> € </div>
											<div><i class="ico ico-fly"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы на стоматологическую помощь"]*1;  ?> € </div>
											<div><i class="ico ico-scales"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по оплате срочных сообщений"]*1;  ?> € </div>
										</div>
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-l no-pad-l-md ">
											<div><i class="ico ico-caput"></i> <? echo $cena_opt[$strah_summ][$p]["Транспортные расходы"]*1;  ?> € </div>
											<div><i class="ico ico-message"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы при утрате документов"]*1;  ?> € </div>
											<div><i class="ico ico-pass"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по получению юридической помощи"]*1;  ?> € </div>
										</div>
										<table><tr><td width="15"></td><td>Ассист:</td><td width="5"></td><td>
								<? if($p>3) { ?>			
								<select id="assist_select_<?=$p?>" style="width:120px">
									 <option value='2'>AXA Assistance</option>
									 <option value='0'> Европ Ассистанс СНГ</option>
									 <option value='1'> САВИТАР Груп</option>
									
								</select>
											<? } else { ?>
											<select id="assist_select_<?=$p?>" style="width:120px">
									 			<option value='1'> САВИТАР Груп</option>
											</select>
											<? } ?>
								</td></tr></table>
									</div>
									
									<a href="javascript:get_order('<?=$p?>','<?=$prices[$pos];?>');" class="btn btn-calc-cta btn--insurance-card">Заказать <span><?=$prices[$pos];?> <i class="fa fa-rub"></i></span></a>
								</div>
							</div>
								<? $count_tab++; } $pos++;  }  ?>
						
					
						</div>
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<font color="blue"><u>		Франшиза отсутствует </u></font>
									</div>
									</div>
							</div>
							
							
						</div>
						
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
								<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<a href="http://polis812.ru/pravila-strahovaniya-vzr-ergo.pdf" target="_blank">	<font color="blue"><u>	Правила страхования  ERGO </u></font></a>
									</div>
									</div>
						</div>

						</div>
						
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										
										
										<a href="http://polis812.ru/polisMULTIergo.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI-А, ERGO- A" </u></font></a><br>
										<a href="http://polis812.ru/polisB-Cergo.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI-B, ERGO- B" </u></font></a><br>
										<a href="http://polis812.ru/polisB-Cergo.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI-C, ERGO- C" </u></font></a>
									</div>
									</div>
						</div>
							
						</div>	
						
						
						
					</div>
				</div>
			
				<? } ?>
				
				
				<!-- NEXT CARD (ALPHA) -->
			
				<? if((check_array_my($program_pos,"1") or check_array_my($program_pos,"2")) and $no_alpha=="" ) { ?>
				<div class="calculator__form__insurance">
					<div class="row">
						<div class="col-sm-3 no-pad-r">
							<div class="calculator__form__insurance__left">
								<div class="calculator__form__insurance__left__logo">
									<img src="images/alpha-small-logo.png" alt="" class="">
								</div>
								<ul class="calculator__form__insurance__left__tabs">
									<li class="active">Программы страхования</li>
									<li>Ассистанс</li>
									<li>Франшиза</li>
									<li>Правила страхования</li>
									<li>Образец полиса</li>
								</ul>
							</div>
						</div>
						
						
						<div class="calculator__form__insurance__tabs active">
							
												<?
							
							$count_tab=1;
							////$pos=0;
						foreach($program_pos as $pos=>$p) { 
							echo $p."+";
							if($count_tab<4 and ($p==1 or $p==2)) {
							?>
							
							<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name">
										<?=$program[$pos];?>
									</div>
									<div class="calculator__form__insurance__card__price">
										<span>Страховая сумма</span>
									
											<? 
								if($strah_summ=='15000')  $sel1=" selected";
								if($strah_summ=='30000') $sel2=" selected";
								if($strah_summ=='50000') $sel3=" selected";
								if($strah_summ=='100000') $sel4=" selected";
								$background_pos=0;
								$spos=0;

								if($p!='2' and $p!='7') { 
								?>
								<!----форма для изменения данных--->
								<script>
								function change_p_summ<?=$p?>() {
								document.getElementById("change_p_summ_row2<?=$p?>").submit();
								}
								</script>
									<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="change_p_summ_row2<?=$p?>">
									<input type="hidden" name="partnerId" value="<?=$partnerId?>"/>
									<input type="hidden" name="product" value="<?=$product?>"/>
									<input type="hidden" name="from" value="<?=$from?>"/>
									<input type="hidden" name="to" value="<?=$to?>"/>
									<input type="hidden" name="no_citizen" value="<?=$no_citizen?>"/>
									<input type="hidden" name="promo" value="<?=$promo?>"/>
									<input type="hidden" name="infodays" value="<?=$infodays?>"/>
									<input type="hidden" name="country" value="<?=$country?>"/>
										  <input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="sport" value="<?=$sport?>"/>
									<input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="onlym" value="<?=$onlym?>"/>
									<input type="hidden" name="step" value="2"/>   	
									<? foreach($age as $ag) { ?>
									<input type="hidden" name="age[]" value="<?=$ag?>"/>
									<? } ?>
									 <input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
									 <input type="hidden" name="ages1" value="<?=$ages1?>"/>
									 <input type="hidden" name="ages2" value="<?=$ages2?>"/>
									 <input type="hidden" name="ages3" value="<?=$ages3?>"/>
									 <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
									 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
									 <input type="hidden" name="kvart" value="<?=$kvart?>"/>
									 <input type="hidden" name="set_ip" value="<?=$set_ip?>">
									 <input type="hidden" name="neschast" value="<?=$neschast?>"/>
									 <input type="hidden" name="onlym" value="<?=$onlym?>"/>
														 <? //перечисляем другие имена переменных opt
									 for($oop=1;$oop<15;$oop++) { ?>
									<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
									<? }?>
										<select name='strah_summ' onChange="change_p_summ<?=$p?>()">
									<?
									if($p<=3) $terr=$country_alpha; else $terr=$country_ergo;
									foreach(get_summs($link,$p,$terr) as $sm) {
									?>
									<option value='<?=$sm?>' <? if($sm==$strah_summ) echo "selected"; ?>><?=$sm?></option>
									<?
									}
									?>
										</select> €
										</form>
									
								<? } else { ?>
									
										<select disabled>
										<option>30 000</option>
										</select> €
									<? }  ?>
										
									</div>
									<div class="row calculator__form__insurance__price-helpers">
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-r">
											<div><i class="ico ico-ambulance"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по медицинской транспортировке"]*1;  ?> € </div>
											<div><i class="ico ico-teeth"></i>  <? echo $cena_opt[$strah_summ][$p]["Расходы по посмертной репатриации тела"]*1;  ?> € </div>
											<div><i class="ico ico-fly"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы на стоматологическую помощь"]*1;  ?> € </div>
											<div><i class="ico ico-scales"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по оплате срочных сообщений"]*1;  ?> € </div>
										</div>
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-l no-pad-l-md ">
											<div><i class="ico ico-caput"></i> <? echo $cena_opt[$strah_summ][$p]["Транспортные расходы"]*1;  ?> € </div>
											<div><i class="ico ico-message"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы при утрате документов"]*1;  ?> € </div>
											<div><i class="ico ico-pass"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по получению юридической помощи"]*1;  ?> € </div>
										</div>
										<table><tr><td width="15"></td><td>Ассист:</td><td width="5"></td><td>
								<? if($p>3) { ?>			
								<select id="assist_select_<?=$p?>" style="width:120px">
										 <option value='2'>AXA Assistance</option>
									 <option value='0'> Европ Ассистанс СНГ</option>
									 <option value='1'> САВИТАР Груп</option>
								
								</select>
											<? } else { ?>
											<select id="assist_select_<?=$p?>" style="width:120px">
									 			<option value='1'> САВИТАР Груп</option>
											</select>
											<? } ?>
								</td></tr></table>
									</div>
								
									<a href="javascript:get_order('<?=$p?>','<?=$prices[$pos];?>');" class="btn btn-calc-cta btn--insurance-card">Заказать <span><?=$prices[$pos];?> <i class="fa fa-rub"></i></span></a>
								</div>
							</div>
								<? $count_tab++; } $pos++;  }  ?>
	
						</div>
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
				
							<center><br><br>
									<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:10pt;width:500px">
										<br><br><br><br><br>
										<font color="blue"><u>	Ассист компания - Savitar Group ( Савитар Груп ) </u></font>
									</div>
									
									</div>
							
						</div>
							
						</div>
						
						
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<font color="blue"><u>	Франшиза отсутствует </u></font>
									</div>
									</div>
							</div>
							
						</div>	
							
							
							<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<a href="http://polis812.ru/pravila-strahovaniya-vzr-alfa.pdf" target="_blank">	<font color="blue"><u>	Правила страхования  Альфастрахование </u></font></a>
									</div>
									</div>
						</div>
							
						</div>	
						
						
							<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										
										
										<a href="http://polis812.ru/multi-alfa-sg.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI" </u></font></a><br>
										<a href="http://polis812.ru/econom-alfa-sg.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "econom B" </u></font></a><br>
										<a href="http://polis812.ru/classik-alfa-sg.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "classic C" </u></font></a>
									</div>
									</div>
						</div>
							
						</div>	
						
						
					</div>
				</div>
				<? } ?>
				<!-- NEXT CARD (ALPHA MULTI) -->
				
				
				<? if((check_array_my($program_pos,"3")) and $no_alpha=="") { ?>
				<div class="calculator__form__insurance">
					<div class="row">
						<div class="col-sm-3 no-pad-r">
							<div class="calculator__form__insurance__left">
								<div class="calculator__form__insurance__left__logo">
									<img src="images/alpha-small-logo.png" alt="" class="">
								</div>
								<div class="calculator__form__insurance__left__multi">
									Multi
									<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="bottom" title="Идеально для многократных поездок"></i>
									<ul class="calculator__form__insurance__left__multi__list">
										<li <? if($infodays=="15") { ?>class="active"<? } ?> onClick="send_new_days('15');"><a href="javascript:send_new_days('15');">15</a></li>
										<li <? if($infodays=="30") { ?>class="active"<? } ?> onClick="send_new_days('30');"><a href="javascript:send_new_days('30');">30</a></li>
										<li <? if($infodays=="45") { ?>class="active"<? } ?> onClick="send_new_days('45');"><a href="javascript:send_new_days('45');">45</a></li>
										<li <? if($infodays=="60") { ?>class="active"<? } ?> onClick="send_new_days('60');"><a href="javascript:send_new_days('60');">60</a></li>
										<li <? if($infodays=="90") { ?>class="active"<? } ?> onClick="send_new_days('90');"><a href="javascript:send_new_days('90');">90</a></li>
									</ul>
								</div>
								<ul class="calculator__form__insurance__left__tabs">
									<li>Ассистанс</li>
									<li>Франшиза</li>
									<li>Правила страхования</li>
									<li>Образец полиса</li>
								</ul>
							</div>
						</div>
						<div class="calculator__form__insurance__tabs active">
						<?
							
							$count_tab=1;
							////$pos=0;
						foreach($program_pos as $pos=>$p) { 
							if($count_tab<4 and $p==3) {
							?>
							
							<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name">
										<?=$program[$pos];?>
									</div>
									<div class="calculator__form__insurance__card__price">
										<span>Страховая сумма</span>
									
											<? 
								if($strah_summ=='15000')  $sel1=" selected";
								if($strah_summ=='30000') $sel2=" selected";
								if($strah_summ=='50000') $sel3=" selected";
								if($strah_summ=='100000') $sel4=" selected";
								$background_pos=0;
								$spos=0;

								if($p!='2' and $p!='7') { 
								?>
								<!----форма для изменения данных--->
								<script>
								function change_p_summ<?=$p?>() {
								document.getElementById("change_p_summ_row2<?=$p?>").submit();
								}
								</script>
									<form action="<?=$_SERVER['PHP_SELF']?>" method="POST" id="change_p_summ_row2<?=$p?>">
									<input type="hidden" name="partnerId" value="<?=$partnerId?>"/>
									<input type="hidden" name="product" value="<?=$product?>"/>
									<input type="hidden" name="from" value="<?=$from?>"/>
									<input type="hidden" name="to" value="<?=$to?>"/>
									<input type="hidden" name="no_citizen" value="<?=$no_citizen?>"/>
									<input type="hidden" name="promo" value="<?=$promo?>"/>
									<input type="hidden" name="infodays" value="<?=$infodays?>"/>
									<input type="hidden" name="country" value="<?=$country?>"/>
										  <input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="sport" value="<?=$sport?>"/>
									<input type="hidden" name="assist" value="<?=$assist?>"/>
									<input type="hidden" name="onlym" value="<?=$onlym?>"/>
									<input type="hidden" name="step" value="2"/>   	
									<? foreach($age as $ag) { ?>
									<input type="hidden" name="age[]" value="<?=$ag?>"/>
									<? } ?>
									 <input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
									 <input type="hidden" name="ages1" value="<?=$ages1?>"/>
									 <input type="hidden" name="ages2" value="<?=$ages2?>"/>
									 <input type="hidden" name="ages3" value="<?=$ages3?>"/>
									 <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
									 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
									 <input type="hidden" name="kvart" value="<?=$kvart?>"/>
									 <input type="hidden" name="set_ip" value="<?=$set_ip?>">
									 <input type="hidden" name="neschast" value="<?=$neschast?>"/>
									 <input type="hidden" name="onlym" value="<?=$onlym?>"/>
														 <? //перечисляем другие имена переменных opt
									 for($oop=1;$oop<15;$oop++) { ?>
									<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
									<? }?>
										<select name='strah_summ' onChange="change_p_summ<?=$p?>()">
									<?
									if($p<=3) $terr=$country_alpha; else $terr=$country_ergo;
									foreach(get_summs($link,$p,$terr) as $sm) {
									?>
									<option value='<?=$sm?>' <? if($sm==$strah_summ) echo "selected"; ?>><?=$sm?></option>
									<?
									}
									?>
										</select> €
										</form>
									
								<? } else { ?>
									
										<select disabled>
										<option>30 000</option>
										</select> €
									<? }  ?>
										
									</div>
									
										<div class="row calculator__form__insurance__price-helpers">
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-r">
											<div><i class="ico ico-ambulance"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по медицинской транспортировке"]*1;  ?> € </div>
											<div><i class="ico ico-teeth"></i>  <? echo $cena_opt[$strah_summ][$p]["Расходы по посмертной репатриации тела"]*1;  ?> € </div>
											<div><i class="ico ico-fly"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы на стоматологическую помощь"]*1;  ?> € </div>
											<div><i class="ico ico-scales"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по оплате срочных сообщений"]*1;  ?> € </div>
										</div>
										<div class="col-xs-6 col-sm-12 col-md-6 no-pad-l no-pad-l-md ">
											<div><i class="ico ico-caput"></i> <? echo $cena_opt[$strah_summ][$p]["Транспортные расходы"]*1;  ?> € </div>
											<div><i class="ico ico-message"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы при утрате документов"]*1;  ?> € </div>
											<div><i class="ico ico-pass"></i> <? echo $cena_opt[$strah_summ][$p]["Расходы по получению юридической помощи"]*1;  ?> € </div>
										</div>
											<table><tr><td width="15"></td><td>Ассист:</td><td width="5"></td><td>
								<? if($p>3) { ?>			
								<select id="assist_select_<?=$p?>" style="width:120px">
										 <option value='2'>AXA Assistance</option>
									 <option value='0'> Европ Ассистанс СНГ</option>
									 <option value='1'> САВИТАР Груп</option>
								
								</select>
											<? } else { ?>
											<select id="assist_select_<?=$p?>" style="width:120px">
									 			<option value='1'> САВИТАР Груп</option>
											</select>
											<? } ?>
								</td></tr></table>
									</div>
									
								
									<a href="javascript:get_order('<?=$p?>','<?=$prices[$pos];?>');" class="btn btn-calc-cta btn--insurance-card">Заказать <span><?=$prices[$pos];?> <i class="fa fa-rub"></i></span></a>
								</div>
							</div>
								<? $count_tab++; } $pos++;  }  ?>
		
						</div>
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							
								<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<font color="blue"><u>	Франшиза отсутствует </u></font>
									</div>
									</div>
							</div>
							
				
						</div>
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										<a href="http://polis812.ru/pravila-strahovaniya-vzr-alfa.pdf" target="_blank">	<font color="blue"><u>	Правила страхования  Альфастрахование </u></font> </a>
									</div>
									</div>
						</div>
						</div>	
						
						
						
						<!-- next tab -->
						<div class="calculator__form__insurance__tabs">
							
							<center><br><br>
								<br><br><Br><br><br>
								<div class="col-sm-3 no-pad<? if($count_tab==3) echo "-l"; ?>">
								<div class="calculator__form__insurance__card">
									<div class="calculator__form__insurance__card__name" style="font-size:12pt;width:500px">	<br><br><Br>
										
										
										<a href="http://polis812.ru/multi-alfa-sg.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "MULTI" </u></font></a><br>
										<a href="http://polis812.ru/econom-alfa-sg.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "econom B" </u></font></a><br>
										<a href="http://polis812.ru/classik-alfa-sg.pdf" target="_blank">	<font color="blue"><u>	Образец полиса  "classic C" </u></font></a>
									</div>
									</div>
						</div>
							
						</div>
						
						
						
					</div>
				</div>
			<? } ?>
			</div>


			<!-- FILTERS -->

			<div class="col-sm-12 col-lg-2" id="calc__floating__sidebar">
				<i class="ico ico-toggle-sidebar-md"></i>
				<div class="calculator__form__filter">
					<div class="calculator__form__filter__heading">
						Дополнительные опции
					</div>
					
					<?
	$pos=0;
	$result_summ=mysqli_query($link,"SELECT id as id_risk,naim,summ,kf,ergo,multi from riski where ergo='1' or multi='1'");
			$rows_summp=@mysqli_num_rows($result_summ);
			while($rows_summp=@mysqli_fetch_array($result_summ)) {
			extract($rows_summp);
				
					if($id_risk==1) $name_pole="med_extr";
					if($id_risk==2) $name_pole="transport_opt";
					if($id_risk==3) $name_pole="repatr_opt";
					if($id_risk==4) $name_pole="sr_message";
					if($id_risk==5) $name_pole="vizit";
					if($id_risk==6) $name_pole="evac";
					if($id_risk==7) $name_pole="dosr_return";
					if($id_risk==8) $name_pole="stomat";
					if($id_risk==9) $name_pole="bagag_lost";
					if($id_risk==10) $name_pole="bagag_wait";
			
				////чекбокс это или варианты
				if(strpos($summ,",")>0) { 
					/////здесь множественный выбор
					$sel_summ=explode(",",$summ);
					
					?><table><tr><td width="200"><?=$naim?></td><td width="5"></td><td>
					<select name="<?=$name_pole?>" id="<?=$name_pole?>" style="width:70px;direction:rtl;" onChange="send_new_data()">
						<option value="">Нет</option>
									<? foreach($sel_summ as $summ) { ?>
						<option value="<?=$summ?>" <? if($$name_pole==$summ) echo "selected"; ?>><?=$summ?></option>
									<? } ?>
								</select>
					</td></tr></table>
					
					<? } else {
		  ?>
						<div class="calculator__form__filter__checkbox">
						<input type="checkbox" name="<?=$name_pole?>" <? if($$name_pole==$summ) echo "checked"; ?> value="<?=$summ?>" id="<?=$name_pole?>" onChange="send_new_data()">
						<label for="<?=$name_pole?>"><?=$naim?></label>
					</div>
		<? } 
					
			}?>
					
					<hr>
					<div class="calculator__form__filter__checkbox">
						<input type="checkbox" name="travel_now" value="travel_now" id="travel_now">
						<label for="travel_now">Я уже путешествую</label>
						<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="left" title="Выберите если вы уже находитесь за границей. В противном случае страховые выплаты могут быть не выплачены"></i>
					</div>
					<div class="calculator__form__filter__checkbox">
						<input type="checkbox" name="no_citizen" value="no_citizen" id="no_citizen">
						<label for="no_citizen">Я не гражданин России</label>
						<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="left" title="Выберите если вы гражданин другой страны"></i>
					</div>
				</div>
			</div>

		</div>
	</form>
<? } ?>
	<!-- STEP 3 -->

							
	<? /////корректируем дату
if($step==3) { 
if($programId=="3" or $programId=="6") {
////это мульт
$date_begin_arr=explode(".",$from);
$data_begin=mktime(0,0,0,$date_begin_arr[1],$date_begin_arr[0],$date_begin_arr[2]);
$to=date("d.m.Y",$data_begin+364*24*60*60);
} else {
$date_begin_arr=explode(".",$from);
$data_begin=mktime(0,0,0,$date_begin_arr[1],$date_begin_arr[0],$date_begin_arr[2]);
$to=date("d.m.Y",$data_begin+($infodays)*24*60*60);

}							
}		
								
								
								
	?>
		<script>
				
			function check_control3() {
			
				<? for($i=1;$i<=(count($age));$i++) { ?>
				var name_pole_<?=$i?>=document.getElementById('name_pole_<?=$i?>').value;
				var fio_pole_<?=$i?>=document.getElementById('fio_pole_<?=$i?>').value;
				var data_rogd_<?=$i?>=document.getElementById('data_rogd_<?=$i?>').value;
				var nomerp_pole_<?=$i?>=document.getElementById('nomerp_pole_<?=$i?>').value;
				<? } ?>
					
				var email_main=document.getElementById('email_main').value;
				var phone_main=document.getElementById('phone_main').value;
				
				if((email_main!='')&&(phone_main!='')<?
				   for($i=1;$i<=(count($age));$i++) { 
				   echo "&&(name_pole_$i!='')&&(fio_pole_$i!='')&&(data_rogd_$i!='')&&(nomerp_pole_$i!='')";
				} ?>) {
					document.getElementById('calc__form__step3').submit();
				} else {
					alert('Введите пожалуйста все данные!');	
				}
			}
							</script>
		<form  action="<?=$_SERVER["PHP_SELF"]?>" method="POST" class="calculator__form" id="calc__form__step3">
			<div class="calculator__form__editable-step" style="height:80px">
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Зона покрытия
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field"><?=$country?></span>
					<i class="ico ico-edit"></i>
				</a>
				
				 <select id="new_country" onChange="send_new_data()" class="calculator__form__editable-step__field__editable" style="width:200px">
									<?
				///теперь сюда включаем список стран
	
			$result_summ=mysqli_query($link,"SELECT naim as naim_country from countries");
			$rows_summp=@mysqli_num_rows($result_summ);
			while($rows_summp=@mysqli_fetch_array($result_summ)) {
			extract($rows_summp);
				?>
				 <option value="<?=$naim_country?>" <? if($country==$naim_country) echo "selected"; ?>><?=$naim_country?></option>
				<?
				}
	
				?>
			</select>
		
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Застрахованные
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field">
						<? if($ages1!=0) echo "$ages1 взрослых";
						   if($ages2!=0) echo ", $ages2 ребенок";
						   if($ages3!=0) echo ", $ages3 свыше 65 лет";
						?></span>
					<i class="ico ico-edit"></i>
				</a>
				<input type="text" id="new_ages" placeholder="	<? if($ages1!=0) echo "$ages1 взрослых";
						   if($ages2!=0) echo ", $ages2 ребенок";
						   if($ages3!=0) echo ", $ages3 свыше 65 лет";
						?>" class="calculator__form__editable-step__field__editable" onChange="send_new_data()">
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Начало поездки
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field"><? echo $from;?></span>
					<i class="ico ico-edit"></i>
				</a>
				<script src='/calend.js' type='text/javascript'>
</script>		
				<input type="text" placeholder="<? echo $from;?>" value="<? echo $from;?>" id="new_from" class="calculator__form__editable-step__field__editable" onChange="send_new_data()">
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Конец поездки
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field"><? echo $to;?></span>
					<i class="ico ico-edit"></i>
				</a>
				<input type="text" id="new_to" value="<? echo $to;?>" placeholder="<? echo $to;?>" class="calculator__form__editable-step__field__editable" onChange="send_new_data()">
			</div>
			<div class="calculator__form__editable-step__wrapper">
				<span class="calculator__form__editable-step__heading">
					Программа
				</span>
				<a href="#" class="calc__form__toggle-fast-edit">
					<span class="calculator__form__editable-step__field">
			<? 
			if($sport=="") echo "Стандарт";
			if($sport=="True") echo "Спорт";
			if($sport=="extrim") echo "Экстремальный спорт";
			if($sport=="moped") echo "Мопед";
						?></span>
					<i class="ico ico-edit"></i>
				</a>
				
				
				<select id="new_sport" onChange="send_new_data()" class="calculator__form__editable-step__field__editable" style="width:200px">
			
				 <option value="" <? if($sport=="") echo "selected"; ?>>Стандарт</option>
				 <option value="True" <? if($sport=="True") echo "selected"; ?>>Спорт</option>
				 <option value="extrim" <? if($sport=="extrim") echo "selected"; ?>>Экстремальный спорт</option>
				 <option value="moped" <? if($sport=="moped") echo "selected"; ?>>Мопед</option>
				
			</select>
				
				
			</div>

		</div>

		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="calculator__form__editable-step">
					<div class="calculator__form__editable-step__wrapper">
						<span class="calculator__form__editable-step__heading">
							Выбранная программа страхования
						</span>
					<?
			
						 $result_pos=mysqli_query($link,"SELECT program from naim_programs where id='$programId'");
				$rows_pos=@mysqli_num_rows($result_pos);
				while($rows_pos=@mysqli_fetch_array($result_pos)) {
				extract($rows_pos);
				}
						echo $program;
						
						?>
					</div>
					<div class="calculator__form__editable-step__wrapper calculator__form__editable-step__wrapper--logo">
						<? if($program==1 or $program==2 or $program==3) { ?>
						<img src="images/alpha-small-logo.png" alt="">
						<? } else { ?>
						<img src="images/ergo-small-logo.png" alt="">
						<? } ?>
					</div>
				</div>
			</div>
		</div>
	
	<div class="heading text-center" id="section-calculator--step3">Заполните пасспортные данные</div>

	<div class="text-center">
		<div class="alert">Имя и фамилия вводятся на латинице, как в загранпаспорте.</div>
	</div>
							
	<div class="calculator__form__contacts">
	
 <input type="hidden" name="promo" value="<?=$promo?>"/>           
		   <input type="hidden" id="partnerId"  name="partnerId" value="<?=$partnerId?>"/>
            <input type="hidden" id="product"  name="product" value="<?=$product?>"/>
            <input type="hidden" id="from"  name="from" value="<?=$from?>"/>
            <input type="hidden" id="to"  name="to" value="<?=$to?>"/>
            <input type="hidden" id="no_citizen"  name="no_citizen" value="<?=$no_citizen?>"/>
            <input type="hidden" id="infodays"  name="infodays" value="<?=$infodays?>"/>
            <input type="hidden" id="country"  name="country" value="<?=$country?>"/>
            <input type="hidden" id="sport"  name="sport" value="<?=$sport?>"/> 
			<input type="hidden" name="onlym" value="<?=$onlym?>"/>
			<input type="hidden" id="step"  name="step" value="4"/> 
			<input type="hidden" id="price"  name="price" value="<?=$price?>"/> 
			<input type="hidden" id="assist"  name="assist" value="<?=$assist?>"/> 
			<input type="hidden" id="ages1"  name="ages1" value="<?=$ages1?>"/> 
			<input type="hidden" id="ages2"  name="ages2" value="<?=$ages2?>"/> 
			<input type="hidden" id="ages3"  name="ages3" value="<?=$ages3?>"/> 
			<input type="hidden" name="set_ip" value="<?=$set_ip?>">
            <input type="hidden" id="territory"  name="territory" value="<?=$territory?>"/> 
            <input type="hidden" id="programId" name="programId" value="<?=$programId?>"/>               
            <input type="hidden" name="policyId" value="0"/> 
		
			<input type="hidden" name="med_extr" value="<?=$med_extr?>"/>   
			<input type="hidden" name="transport_opt" value="<?=$transport_opt?>"/>   
			<input type="hidden" name="repatr_opt" value="<?=$repatr_opt?>"/>   
			<input type="hidden" name="sr_message" value="<?=$sr_message?>"/>   
			<input type="hidden" name="vizit" value="<?=$vizit?>"/>   
			<input type="hidden" name="evac" value="<?=$evac?>"/>   
			<input type="hidden" name="dosr_return" value="<?=$dosr_return?>"/>   
		
		
		
											<? foreach($age as $ag) { ?>
                    <input type="hidden" name="age[]" value="<?=$ag?>"/>
					<? } ?>
			<input type="hidden" name="neschast" value="<?=$neschast?>"/>
								<input type="hidden" name="nep_viza" value="<?=$nep_viza?>"/>
					 <input type="hidden" name="strah_bagag" value="<?=$strah_bagag?>"/>
					 <input type="hidden" name="gragd" value="<?=$gragd?>"/>
					 <input type="hidden" name="kvart" value="<?=$kvart?>"/>
					 <input type="hidden" name="strah_summ" value="<?=$strah_summ?>"/>
					 <?
					 for($oop=1;$oop<15;$oop++) { ?>
					<input type="hidden" name="<? echo "opt$oop"; ?>" value="<? echo ${"opt".$oop}; ?>"/>
					<? }?>
		
		<? for($i=1;$i<=(count($age));$i++) { ?>
		<div class="calculator__form__contacts__heading">
			<i class="ico ico-num">1</i> Данные застрахованного
		</div>
		<div class="row mb20">
			<div class="col-sm-7">
				<div class="col-half">
					<label>Имя / First name</label>
					<input type="text" class="calculator__form__contacts__input calculator__form__contacts__input--ico-person" name="name[]" placeholder="Vasiliy" value="<?=$name[$i-1]?>" id="name_pole_<?=$i?>">
				</div>
				<div class="col-half">
					<label>Фамилия / Last name</label>
					<input type="text" id="fio_pole_<?=$i?>" class="calculator__form__contacts__input calculator__form__contacts__input--ico-person"  name="surname[]" value="<?=$surname[$i-1]?>"   placeholder="Petrov">
				</div>
			</div>
			<div class="col-sm-5 no-pad-l">
				<div class="col-half">
					<label>Дата рождения</label>
					<input type="text" id="data_rogd_<?=$i?>" value="<?=$birthdate[$i-1]?>"  name="birthdate[]" class="calculator__form__contacts__input calculator__form__contacts__input--short calculator__form__contacts__input--ico-calendar"  placeholder="1.01.1970">
					<!--  id="calc__select-birthdate" если нужен калькулятор -->
				</div>
				<div class="col-half">
					<label>Номер загранпаспорта</label>
					<input type="text" id="nomerp_pole_<?=$i?>" value="<?=$nomerp[$i-1]?>" name="nomerp[]" class="calculator__form__contacts__input calculator__form__contacts__input--short calculator__form__contacts__input--ico-passport"  placeholder="4654 000000000">
				</div>
			</div>

		</div>
		
		<? } ?>
		
			</div>

	
	<!-- Данные получения -->
	<div class="heading mt20 text-center">Данные для получения полиса</div>

	<div class="calculator__form__contacts">
		<div class="row mb20">
			<div class="col-sm-7">
				<div class="col-half">
					<label>Email для отправки полиса</label>
					<input type="text" id="email_main" class="calculator__form__contacts__input calculator__form__contacts__input--ico-person" name="email1" value="<?=$email1?>" placeholder="my@mail.ru">
				</div>
				<div class="col-half">
					<label>Номер телефона</label>
					<input type="text" id="phone_main" value="<?=$phone?>" class="calculator__form__contacts__input calculator__form__contacts__input--ico-phone phone-input--mask" name="phone" placeholder="+7 (916) ___ - __ - __">
				</div>
			</div>
			<div class="col-sm-5 no-pad-l">
				<div class="calculator__form__filter__checkbox calculator__form__contacts__checkbox">
					<input type="checkbox" name="calc__contacts" id="calc__contacts_send_by_post">
					<label for="calc__contacts_send_by_post">Отправить полис на почтовый адрес</label>
					<i class="ico ico-tooltip hidden-inline-xs" data-toggle="tooltip" data-placement="left" title="Выберите если вы уже находитесь за границей. В противном случае страховые выплаты могут быть не выплачены"></i>
				</div>
			</div>
		</div>
		<div class="row" id="calc__contacts_send_by_post--toggleble">
			<div class="col-sm-12">
				<div class="calc__contacts_send_by_post__form">
					<div class="text-center">
						<div class="heading heading--small">
							Укажите ваши почтовые данные для получения полиса:
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2">
							<label>Индекс</label>
							<input type="text" class="calculator__form__contacts__input" name="post_index" placeholder="Индекс">
						</div>
						<div class="col-sm-4">
							<label>Страна, регион, город</label>
							<input type="text" class="calculator__form__contacts__input" name="post_country" placeholder="Россия, Санкт-Петербург">
						</div>
						<div class="col-sm-6">
							<label>Улица, дом, квартира</label>
							<input type="text" class="calculator__form__contacts__input" name="post_street" placeholder="Дыбенко, 13/20">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div class="text-center"><a href="javascript:check_control3();">
		<button class="btn btn-calc-cta" type="button">ПЕРЕЙТИ К ОПЛАТЕ</button></a>
	</div>

	</form>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CALCULATOR :: END -->
<? 
		
		
		
		
		
		
		
		?>
		
	<!-- BENEFITS :: START -->
	<section class="benefits text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<img src="img/benefit-ico-1.svg">
					<div class="benefit-desc">
						Самые низкие цены на страхование для выезжающих за рубеж
					</div>
				</div>
				<div class="col-sm-4">
					<img src="img/benefit-ico-2.svg">
					<div class="benefit-desc">
						Подходит для подачи <br>во все консульства и визовые центры!
					</div>
				</div>
				<div class="col-sm-4">
					<img src="img/benefit-ico-3.svg">
					<div class="benefit-desc">
						Лучшие страховые компании <br>Без франшизы и подводных камней
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- BENEFITS :: END -->


	<!-- INSURANCES :: START -->
	<section class="heading heading--outside-block">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">Подробная информация о страховке</div>
			</div>
		</div>
	</section>
	<section class="insurances white-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="insurance__heading">
						<img src="images/alpha.png" title="" alt="">
						<span>Альфастрахование</span>
					</div>
					<div class="insurance__description">
						<span class="insurance__description--visible">
						Группа «АльфаСтрахование» – одна из крупнейших российских страховых компаний с универсальным портфелем услуг, включающим как комплексные программы защиты интересов бизнеса, так и широкий спектр страховых продуктов для частных лиц. Согласно лицензии, компания предлагает более 100 продуктов, включая продукты по страхованию жизни.
						</span>

						<a href="#" class="insurance__description__more"">Подробнее</a>

						<span class="insurance__description--hidden">
						Группа «АльфаСтрахование» – одна из крупнейших российских страховых компаний с универсальным портфелем услуг, включающим как комплексные программы защиты интересов бизнеса, так и широкий спектр страховых продуктов для частных лиц. Согласно лицензии, компания предлагает более 100 продуктов, включая продукты по страхованию жизни.
						</span>
					</div>
					<div class="insurance__assist toggable-mobile">
						<div class="insurance__title">Ассист компания</div>
						<div class="insurance__assist__images">
						<img src="images/savitar-logo.png" alt="" class="img-responsive">
						</div>
					</div>
					<div class="insurance__docs toggable-mobile">
						<div class="insurance__title">Образцы полисов</div>
						<a href="http://polis812.ru/multi-alfa-sg.pdf" class="insurance__docs__link">MULTI</a>
						<a href="http://polis812.ru/econom-alfa-sg.pdf" class="insurance__docs__link">Программа B</a>
						<a href="http://polis812.ru/classik-alfa-sg.pdf" class="insurance__docs__link">Программа С</a>
					</div>
					<div class="insurance__docs toggable-mobile">
						<div class="insurance__title">Документация</div>
						<a href="http://polis812.ru/pravila-strahovaniya-vzr-alfa.pdf" class="insurance__docs__link insurance__docs__link--with-ico">Правила страхования</a>
						<a href="http://polis812.ru/programmi-alfa-travel" class="insurance__docs__link insurance__docs__link--with-ico">Описание программ</a>
						<a href="http://polis812.ru/osobie-usloviya-alfa-vzr.pdf" class="insurance__docs__link insurance__docs__link--with-ico">Особые условия</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="insurance__heading">
						<img src="images/ergo.png" title="" alt="">
						<span>ERGO</span>
					</div>
					<div class="insurance__description">
						<span class="insurance__description--visible">
						Группа ERGO – одна из крупнейших страховых групп в Германии и Европе. Ежегодные страховые сборы группы составляют в среднем около €17 млрд. ERGO представлена более чем в 30 странах, фокусируется на рынках Европы и Азии. В Германии ERGO занимает лидирующие позиции на всех сегментах страхового рынка. В группе ERGO работает более 50 тыс. человек, включая штатных сотрудников и внештатных страховых агентов.
						</span>

						<a href="#" class="insurance__description__more"">Подробнее</a>

						<span class="insurance__description--hidden">
						Группа «АльфаСтрахование» – одна из крупнейших российских страховых компаний с универсальным портфелем услуг, включающим как комплексные программы защиты интересов бизнеса, так и широкий спектр страховых продуктов для частных лиц. Согласно лицензии, компания предлагает более 100 продуктов, включая продукты по страхованию жизни.
						</span>
					</div>
					<div class="insurance__assist toggable-mobile">
						<div class="insurance__title">
							Ассист компания на выбор!
							<i class="ico ico-tooltip" data-toggle="tooltip" data-placement="right" title="Уникальная возможность выбора ассистанс компании"></i>
						</div>
						<div class="insurance__assist__images">
						<img src="images/savitar-logo.png" alt="" class="img-responsive">
						<img src="images/axa-logo.png" alt="" class="img-responsive">
						<img src="images/europ-logo.png" alt="" class="img-responsive">
						
						</div>
					</div>
					<div class="insurance__docs toggable-mobile">
						<div class="insurance__title">Образцы полисов</div>
						<a href="http://polis812.ru/polisMULTIergo.pdf" class="insurance__docs__link">MULTI</a>
						<a href="http://polis812.ru/polisB-Cergo.pdf" class="insurance__docs__link">Программа B</a>
						<a href="http://polis812.ru/polisB-Cergo.pdf" class="insurance__docs__link">Программа С</a>
					</div>
					<div class="insurance__docs toggable-mobile">
						<div class="insurance__title">Документация</div>
						<a href="http://polis812.ru/pravila-strahovaniya-vzr-ergo.pdf" class="insurance__docs__link insurance__docs__link--with-ico">Правила страхования</a>
						<a href="http://polis812.ru/programmi-ergo-travel" class="insurance__docs__link insurance__docs__link--with-ico">Описание программ</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- INSURANCES :: END -->


	<!-- SEO TEXT :: START -->
	<section class="promo-text">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="promo-text__paragraph">
						<h2 class="h2">Страховка для визы</h2>
						<p>ВЗР, как вид добровольного страхования или страхование выезжающих за рубеж, представляет собой полное покрытие затрат застрахованного гражданина, возникающие при пребывании его на территории иного иностранного государства или страны.</p>
						<p>Хотя данный вид страхования и называется добровольным, у вас просто не будет возможности выехать за границу по работе, на отдых или по любым другим делам без оформленного полиса. Поэтому данный вид страхования можно с легкостью отнести к принудительно-добровольному страхованию, благодаря чему и отмечается его достаточно широкая популярность среди населения.</p>
					</div>
					<div class="promo-text__paragraph">
						<h2 class="h2">Стоимость медицинского полиса для шенгенской визы</h2>
						<div class="promo-text__paragraph__table">
							<div class="promo-text__paragraph__table__row">
								<span>15 дней</span>
								<span>от 499 руб</span>
							</div>
							<div class="promo-text__paragraph__table__row">
								<span>30 дней</span>
								<span>от 599 руб</span>
							</div>
							<div class="promo-text__paragraph__table__row">
								<span>60 дней</span>
								<span>от 1099 руб</span>
							</div>
							<div class="promo-text__paragraph__table__row">
								<span>90 дней</span>
								<span>от 1599 руб</span>
							</div>
							<div class="promo-text__paragraph__table__row">
								<span>180 дней</span>
								<span>от 2799 руб</span>
							</div>
							<div class="promo-text__paragraph__table__row">
								<span>365 дней</span>
								<span>от 4999 руб</span>
							</div>
						</div>
						<a href="#section-calculator" class="btn btn-trsp btn-trsp--inline btn-lg btn--absolute-center hidden-xs">Рассчет стоимости онлайн</a>
					</div>
					<div class="promo-text__paragraph">
						<h2 class="h2">Как получить страховку?</h2>
						<p>Вы можете получить полис по e-mail*, доставкой курьером (при стоимости от 1000 руб) или у нас в офисах*для того, чтобы получить полис по e-mail , Вам надо оплатить его через сайт . Страховка онлайн для визы в Финляндию. Такая услуга как страхование по шенгенской визы поможет покрыть непредвиденные затраты во время пребывания за границей.</p>
						
					</div>
					<div class="promo-text__paragraph">
						<h2 class="h2">Что предоставляется в рамках страховки?</h2>
						<p>Страховка Шенген полноценно обеспечивает застрахованному лицу оплату всех основных видов медицинских услуг, то есть квалифицированную медицинскую помощь. Да и стоимость страховки в Финляндию, как и любую другую страну, будет вполне лояльной и возможно только незначительное варьирование в зависимости от стоимости поездки.</p>
						<p>Стандартный набор услуг, который входит в стоимость страховки для шенгенской визы, предусматривает не только оплату предоставленных медицинских услуг, но и стоимость медицинской транспортировки. Так что в случае болезни, можно быть уверенным в том, что Вы не будете оставлены без помощи посреди незнакомого города в чужом государстве, она также является государством шенгенской зоны, предусматривает и экстренную стоматологическую помощь.</p>
						<p>Что входит - оплата срочных сообщений, которая учтена при заключении страхового полиса, как и иного государства этой зоны - предусматривает и такой вариант услуг как репатриация при смертельном исходе. И это ещё далеко не весть список обстоятельств, в которых приобретённый полис гарантирует помощь и компенсацию.Страховые  компании Альфастрахование и ERGO аккредитованы во всех консульствах. При необходимости предоставленный список можно расширить, исходя из Ваших потребностей. С полной уверенностью можно утверждать, что это включают в свою стоимость и оказание юридических услуг, в которых может возникнуть потребность у лиц плохо ориентирующихся в тонкостях законодательства иного государства. Да и возможные транспортные расходы, как и помощь в результате утери или хищения документов - тоже предусмотрены для застрахованных лиц.Страховка для выезда за границуМед полис для выезда за границу учитывает и возможность компенсации в результате порчи личного транспортного средства из-за ДТП или же его поломки, как и ответственность перед третьими лицами, и страхование багажа. Даже потери от отмены поездки - учтены страхованием.</p>
						
					</div>
					<div class="promo-text__paragraph">
						<h2 class="h2">Процедура оформления медецинского полиса</h2>
						<p>Если вы решили выехать за рубеж и нуждаетесь в туристической страховке, вам достаточно обратиться за помощью к нашему онлайн-консультанту либо просто позвонить по телефону (812) 930-35-40.</p>
						<p>Если нужно составить приемлемую программу страхования для любого клиента, будь то страховка для финской визы или иного государства, как и подобрать наилучшую страховую компанию - обратитесь к нам.</p>
						<p>Для того, чтобы своевременно была получена услуга, нужно договориться с представителями нашей компании о встрече в удобное для Вас время.Заполнив специальную форму в виде анкеты, каждый клиент может рассчитывать на полное содействие компании, которая обязательно с ним свяжется - и страховка для выезда за границу будет получена своевременно и на самых выгодных условиях.</p>
						<p>Мы с радостью составим специально для вас наиболее приемлемую программу страховки выезжающих за рубеж, также подберем подходящую страховую компанию.</p>
				</div>
			</div>
		</div>
	</section>
	<!-- SEO TEXT :: END -->


	<!-- VIDEO :: START -->
	<section class="video white-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 text-center">
					<div class="heading">
						Посмотрите как просто оформить визу
					</div>
					<div class="subtitle">
						Наши специалисты подготовили подробное и понятное видео, которое поможет вам получить ответы на все вопросы.
					</div>

					<div class="video__wrap">
						<img src="img/video-play.png" alt="" onclick="loadvideo();">
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- VIDEO :: END -->


	<!-- SOCIALS :: START -->
	<section class="socials">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 text-center">
					<div class="heading">
						Получайте бонусы и скидки
					</div>
					<div class="subtitle">
						Присоединяйтесь к нам в социальных сетях и получайте информацию о скидках, бонусах и важных новостях
					</div>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-xs-4 col-md-3 col-md-offset-1">
					<a class="social__button social__button--instagram" href="https://www.instagram.com/polis812/">
						<i class="ico ico-instagram"></i>
						<span>Подписаться</span>
					</a>
					<div class="social__metric">
						1500 подписчиков в Инстаграм
					</div>
				</div>
				<div class="col-xs-4 col-md-4">
					<a class="social__button social__button--vk" href="http://vk.com/polis812ru">
						<i class="ico ico-vk"></i>
						<span>Подписаться</span>
					</a>
					<div class="social__metric">
						15 000 подписчиков ВКОНТАКЕ
					</div>
				</div>
				<div class="col-xs-4 col-md-3">
					<a class="social__button social__button--youtube" href="https://www.youtube.com/channel/UCtoV9T97XoeWhZLKng_T_ug">
						<i class="ico ico-youtube"></i>
						<span>Подписаться</span>
					</a>
					<div class="social__metric">
						500 подписчиков в YouTube
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- SOCIALS :: END -->


	<!-- PRESS :: START -->
	<section class="press white-bg">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="heading">
						Пресса о нас
					</div>
				</div>
				<div class="owl-carousel" id="press-carousel">
				<div class="col-sm-4">
					<div class="press__image">
						<img src="images/commersant.png" alt="">
					</div>
					<div class="press__title">
						Компания «Полис»: финская шенгенская виза - это просто
					</div>
					<div class="press__short">
						Цены на услуги не просто ниже средних, а одни из самых низких в России. Кроме того, компания широко использует систему бонусов и скидок, которые позволяют сэкономить больше.
					</div>
					<div class="press__link">
						<a href="http://www.kommersant.ru/doc/2843177">Подробнее на <span>kommersant.ru</span></a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="press__image">
						<img src="images/metro.png" alt="">
					</div>
					<div class="press__title">
						Компания, за ценовую политику которой ее не любят конкуренты
					</div>
					<div class="press__short">
						Полноценная и всестороння консультация и поддержка в режиме онлайн дает широкие возможности при оформлении любого полиса.
					</div>
					<div class="press__link">
						<a href="http://www.metronews.ru/novosti-partnerov41/kompanija-za-cenovuju-politiku-kotoroj-ee-ne-ljubjat-konkurenty/Tpookf---YvLhjafwxxCBQ/">Подробнее на <span>metronews.ru</span></a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="press__image">
						<img src="images/dpru.png" alt="">
					</div>
					<div class="press__title">
						Как быстро и выгодно оформить туристическую страховку?
					</div>
					<div class="press__short">
						Перспективная и быстроразвивающаяся компания готова сотрудничать с населением не только в реальном, но и в интернет-пространстве.
					</div>
					<div class="press__link">
						<a href="http://www.dp.ru/a/2015/11/06/Kak_bistro_i_vigodno_ofor/">Подробнее на <span>dp.ru</span></a>
					</div>
				</div>	
				</div>	
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="heading heading--top-border">
						Отзывы наших клиентов <i class="ico ico-vk--heading"></i>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="owl-carousel" id="testimonials-carousel">
						<div class="testimonial">
							<div class="testimonial__image">
								<img src="images/testimonial.png" alt="" class="img-responsive">
							</div>
							<div class="testinmonial__content">
								Уже не первый раз покупаю страховку онлайн у этой компании. Один раз была ошибка, но ее поправили минуты за 3 после обращения. Очень оперативно! 
							</div>
						</div>	
						<div class="testimonial">
							<div class="testimonial__image">
								<img src="images/testimonial.png" alt="" class="img-responsive">
							</div>
							<div class="testinmonial__content">
								Пользуюсь услугами "Полис 812" уже несколько лет. Еще с тех пор когда их офис был на ул. Сикейроса 6 корп.1 Делаю у них финские визы и страховки. Цены одни из самых низких по городу.Девушки работающие там всегда помогут в возникающих вопросах.
							</div>
						</div>	
						<div class="testimonial">
							<div class="testimonial__image">
								<img src="images/testimonial.png" alt="" class="img-responsive">
							</div>
							<div class="testinmonial__content">
								Заказывали страховку для визы через интернет. Все быстро и удобно. Спасибо. Все лучшие��
							</div>
						</div>	
						<div class="testimonial">
							<div class="testimonial__image">
								<img src="images/testimonial.png" alt="" class="img-responsive">
							</div>
							<div class="testinmonial__content">
								Пользуюсь Вашими услугами уже не первый раз. Оформление страховки занимает всего пару минут, присланный на эл. почту полис никаких вопросов в посольстве не вызывает. Страховки выгоднее чем у Вас я не нашел, да еще и с промокодом
							</div>
						</div>	
						<div class="testimonial">
							<div class="testimonial__image">
								<img src="images/testimonial.png" alt="" class="img-responsive">
							</div>
							<div class="testinmonial__content">
								Уже не первый раз покупаю страховку онлайн у этой компании. Один раз была ошибка, но ее поправили минуты за 3 после обращения. Очень оперативно! 
							</div>
						</div>	
						<div class="testimonial">
							<div class="testimonial__image">
								<img src="images/testimonial.png" alt="" class="img-responsive">
							</div>
							<div class="testinmonial__content">
								Уже не первый раз покупаю страховку онлайн у этой компании. Один раз была ошибка, но ее поправили минуты за 3 после обращения. Очень оперативно! 
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- PRESS :: END -->


	<!-- NEWS :: START -->
	<section class="news text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="heading">
						Новости страхового центра Полис
					</div>
				</div>
				<div class="col-sm-4">
					<a class="news__card" href="http://polis812.ru/index.php?route=information/news&news_id=19">
						<div class="news__card__title">
							Зеленая карта еще дешевле!
						</div>
						<div class="news__card__short">
							с 15.10.2016 стоимость грин карты изменится!
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a class="news__card" href="http://polis812.ru/index.php?route=information/news&news_id=18">
						<div class="news__card__title">
							Стоимость зеленой карты с 15 сентября уменьшится
						</div>
						<div class="news__card__short">
							Легковой автомобиль на 15 дней 2450 руб на 30 дней 4670 руб на 1 год 22240 руб
						</div>
					</a>
				</div>
				<div class="col-sm-4">
					<a class="news__card" href="http://polis812.ru/index.php?route=information/news&news_id=17">
						<div class="news__card__title">
							Режим работы 12 июня
						</div>
						<div class="news__card__short">
							12 июня только офис у м. Звездная с 12 до 17 13 июня в режиме выходного дня с 11 до 18 ( офис у м.Кировский Завод до 17-00)
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
	<!-- NEWS :: END -->


	<!-- FOOTER :: START -->
	<footer class="footer hidden-xs">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="footer__heading">Страхование</div>
					<div class="footer__links">
						<a href="http://polis812.ru/kasko">КАСКО</a>
						<a href="http://polis812.ru/vzr">Туристическая страховка</a>
							<a href="http://polis812.ru/osago">ОСАГО</a>																										<a href="http://polis812.ru/zelnye_karty">Зеленая карта</a>
							<a href="http://polis812.ru/kbm-uznat-svoj-klass-bezubytochnosti-po-baze-rsa">Проверить КБМ по базе РСА</a>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footer__heading">Горящие туры</div>
					<div class="footer__links">
						<a href="http://polis812.ru/tury">Подбор тура</a>
						<a href="http://polis812.ru/greciya">Горящие туры в Грецию из Санкт-Петербурга</a>
						<a href="http://polis812.ru/krym">Горящие туры в Крым из Санкт-Петербурга</a>
						<a href="http://polis812.ru/sochi">Горящие туры в Сочи из Санкт-Петербурга</a>
					    <a href="http://polis812.ru/kipr">Горящие туры на Кипр из Санкт-Петербурга</a>
						<a href="http://polis812.ru/bilety-na-parom">Билеты на паром</a>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="footer__heading">Оформление виз</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer__links">
								<a href="http://polis812.ru/viza-v-ispaniyu">Виза в Испанию</a>
								<a href="http://polis812.ru/estonskaya-viza-stoimost-oformleniya-v-sankt-peterburge">Виза в Эстонию</a>												<a href="http://polis812.ru/viza-v-litvu-stoimost-oformleniya-v-sankt-peterburge">Виза в Литву</a>
								<a href="http://polis812.ru/viza-v-italiyu">Виза в Италию</a>
							
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer__links">
								<a href="http://polis812.ru/viza-v-ssha-oformlenie-v-sankt-peterburge">Виза в США</a>
								<a href="http://polis812.ru/tury">Подбор тура</a>
								<a href="http://polis812.ru/viza-v-angliyu-oformlenie-v-sankt-peterburge">Виза в Англию</a>
								<a href="http://polis812.ru/viza-v-gollandiyu">Виза в Голландию</a>
								<a href="http://polis812.ru/">Виза в Финляндию</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-sm-offset-1">
					<div class="footer__heading">О компании</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer__links">
								<a href="http://polis812.ru/kontakty">Контакты</a>
								<a href="http://polis812.ru/predlozheniya_i_zhaloby">Обратная связь</a>
								<a href="http://polis812.ru/rek">Реквизиты</a>
								<a href="http://polis812.ru/how_to_pay">Способы оплаты</a>
								<a href="#">Отзывы о нас</a>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer__links">
								<a href="http://polis812.ru/polzovatelskoe-soglashenie">Пользовательское соглашение</a>
								<a href="http://polis812.ru/refund">Условия возврата</a>
								<a href="http://polis812.ru/refund_service">Отказ от услуги</a>
								<a href="http://polis812.ru/2015-01-21-06-21-28">Карта сайта</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<section class="under-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="under-footer__copywrite">
						© 2016 Страховой центр «ПОЛИС»
					</div>
				</div>
				<div class="col-sm-6 text-center">
					<a href="http://vk.com/polis812ru">
						<i class="ico ico-vk"></i>
					</a>
					<a href="https://www.youtube.com/channel/UCtoV9T97XoeWhZLKng_T_ug">
						<i class="ico ico-youtube"></i>
					</a>
					<a href="https://www.instagram.com/polis812/">
						<i class="ico ico-instagram"></i>
					</a>
				</div>
				<div class="col-sm-3 text-right">
					<div class="under-footer__phone">
						8 800 200-26-12
						<span>Поможем с выбором с 10 до 20</span>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FOOTER :: END -->

	<!-- VZR-HELPER :: START -->
	<div class="container absolute-container">
		<div class="row">
			<div class="col-sm-12">
				<div class="helper__general" id="show-helper">
					<div class="pull-right"><i class="fa fa-times-circle-o" id="close-helper"></i></div>
					Если у вас возникли сложности в приобритении полиса ВЗР, данный помошник поможет вам пошагово совершить покупку
					<div class="helper__general__pagination">
						<a href="#">
							<i class="fa fa-arrow-left" id="helper__prev"></i>
						</a>
						<div class="helper__general__pagination__step">
							1/7. <span>Выбор места путешествия</span>
						</div>
						<a href="#">
							<i class="fa fa-arrow-right" id="helper__next"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- VZR-HELPER :: END -->


</body>
</html>
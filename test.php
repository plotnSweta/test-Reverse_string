<?
//Функция переварачивающая слово
function Reverse_the_words($str){
    $arr1 = mb_str_split($str);
    $arr2=array();
    $string="";
    foreach ($arr1 as $key=>$value){
		if(preg_match('/[A-Za-zА-Яа-я]+$/iu', $value)===1 ) {
			$symbul=strval($value);
			$string.=$symbul;  
		}else{
			$arr2[]=$key; 
		}
	}
	for ($i =mb_strlen($string)-1; $i>=0; $i--) {
		$len=mb_strlen($string)-$i-1;
		if(IntlChar::isupper(mb_substr($string, $len, 1))===true){
			$str1.= mb_strtoupper(mb_substr($string, $i, 1));
        }else{
			$str1.= mb_strtolower(mb_substr($string, $i, 1));
        }
     }
	 $string1=$str1;
	 foreach($arr2 as $value){
		if($value>=mb_strlen($str1)){
			$string1=$string1.$arr1[$value];
		}
		if($value<mb_strlen($str1)){
			$string1=$arr1[$value].$string1;
		}
	}
return $string1;
}

//Функция для переварачивающая слов в строке
function Reverse_string($string){
   $sep = " \n\t";
   $token = strtok( $string, $sep );

    while ( $token !== false ) {
        $word =Reverse_the_words($token);
	$string1.=$word." ";
	$token = strtok( $sep );
   }
   return trim($string1);
}
$string = 'это «Так» "просто"';//"Бог наградил в нем слог и ум покорный, Стал Моисей известный господин...";
$string1 ="Hello, good to see you... How are you?";

function test1(){
$string = "Бог наградил в нем слог и ум покорный, Стал Моисей известный господин...";
$str=Reverse_string($string);
if($str!=="Гоб лидарган в мен голс и му йынрокоп, Латс Йесиом йынтсевзи нидопсог..."){
        return false;
   }
return true;
}
function test2(){
$string1 ="Hello, good to see you... How are you?";
$str=Reverse_string($string1);
   if($str!=="Olleh, doog ot ees uoy... Woh era uoy?"){
        return false;
   }
return true;
}

function test3(){
$string2 ="Uyou14...,,,''";
$str=Reverse_string($string2);
   if($str!=="Uoyu14...,,,''"){
        return false;
   }
return true;
}

function test4(){
$string2 ='это «Так» "просто"';
$str=Reverse_string($string2);
   if($str!=='отэ «Кат» "отсорп"'){
        return false;
   }
return true;
}
var_dump(test1());
var_dump(test2());
var_dump(test3());
var_dump(test4());
?>
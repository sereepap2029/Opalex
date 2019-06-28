<?php
class M_stringlib extends CI_Model {
 
    public function __construct(){
	date_default_timezone_set('Asia/Bangkok');
        parent::__construct();
        $this->province_type=array("เลือกจังหวัด","กระบี่","กรุงเทพมหานคร","กาญจนบุรี","กาฬสินธุ์","กำแพงเพชร","ขอนแก่น","จันทบุรี","ฉะเชิงเทรา","ชลบุรี","ชัยนาท","ชัยภูมิ","ชุมพร","เชียงราย","เชียงใหม่","ตรัง","ตราด","ตาก","นครนายก","นครปฐม","นครพนม","นครราชสีมา","นครศรีธรรมราช","นครสวรรค์","นนทบุรี","นราธิวาส","น่าน","บุรีรัมย์","บึงกาฬ","ปทุมธานี","ประจวบคีรีขันธ์","ปราจีนบุรี","ปัตตานี","พระนครศรีอยุธยา","พะเยา","พังงา","พัทลุง","พิจิตร","พิษณุโลก","เพชรบุรี","เพชรบูรณ์","แพร่","ภูเก็ต","มหาสารคาม","มุกดาหาร","แม่ฮ่องสอน","ยโสธร","ยะลา","ร้อยเอ็ด","ระนอง","ระยอง","ราชบุรี","ลพบุรี","ลำปาง","ลำพูน","เลย","ศรีสะเกษ","สกลนคร","สงขลา","สตูล","สมุทรปราการ","สมุทรสงคราม","สมุทรสาคร","สระแก้ว","สระบุรี","สิงห์บุรี","สุโขทัย","สุพรรณบุรี","สุราษฎร์ธานี","สุรินทร์","หนองคาย","หนองบัวลำภู","อ่างทอง","อำนาจเจริญ","อุดรธานี","อุตรดิตถ์","อุทัยธานี","อุบลราชธานี");
        $this->day_name_arr = array(1 => "จ.",2 => "อ.",3 => "พ.",4 => "พฤ.",5 => "ศ.",6 => "ส.",7 => "อา.", );
        $this->day_name_arr_full = array(1 => "จันทร์",2 => "อังคาร",3 => "พุธ",4 => "พฤหัสบดี",5 => "ศุกร์",6 => "เสาร์",7 => "อาทิตย์", );
        $this->thaiNum_arr = array("1" => "๑","2" => "๒","3" => "๓","4" => "๔","5" => "๕","6" => "๖","7" => "๗","8" => "๘","9" => "๙","0" => "๐", );
		$this->month_name_arr = array(
		    1 => "มกราคม",
		    2 => "กุมภาพันธ์",
		    3 => "มีนาคม",
		    4 => "เมษายน",
		    5 => "พฤษภาคม",
		    6 => "มิถุนายน",
		    7 => "กรกฎาคม",
		    8 => "สิงหาคม",
		    9 => "กันยายน",
		    10 => "ตุลาคม",
		    11 => "พฤศจิกายน",
		    12 => "ธันวาคม",
		     );
                                                                    
	}
	
	public function useMD5($str1, $str2) {
		return hash("MD5", $str1 . $str2, FALSE);
	}
	
	public function uniqueNum10 () {
		$random = substr(number_format(time() * rand(),0,'',''),0,10);
		return $random;
	}
	
	public function uniqueNum6 () {
		$random = substr(number_format(time() * rand(),0,'',''),0,6);
		return $random;
	}
	public function uniqueAlphaNum6 () {
		$random = substr(md5(time() * rand()),0,6);
		return $random;
	}
	
	public function uniqueAlphaNum10 () {
		$random = substr(md5(time() * rand()),0,10);
		return $random;
	}
	
	public function uniqueAlphaNum20 () {
		$random = substr(md5(time() * rand()),0,20);
		return $random;
	}
	function month_word_to_int($month){
	    $_month['Jan']	=	1;
	    $_month['Feb']	=	2;
	    $_month['Mar']	=	3;
	    $_month['Apr']	=	4;
	    $_month['May']	=	5;
	    $_month['Jun']	=	6;
	    $_month['Jul']	=	7;
	    $_month['Aug']	=	8;
	    $_month['Sep']	=	9;
	    $_month['Oct']	=	10;
	    $_month['Nov']	=	11;
	    $_month['Dec']	=	12;
	    return substr($month,7,4).'-'.$_month[substr($month,3,3)].'-'.substr($month,0,2);
	}

	public function toThaiNum ($number) {
		$workString="".$number;
		$lenght=strlen($workString);
		$newstr="";
		for ($i=0; $i <$lenght ; $i++) { 
			$rest = substr($workString, $i,1); 
			$newstr.=$this->thaiNum_arr[$rest];
		}
		return $newstr;

	}
	
}
?>
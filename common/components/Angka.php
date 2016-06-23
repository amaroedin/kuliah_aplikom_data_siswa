<?php
namespace common\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Angka extends Component{

	public function zero_digit($i, $digit){
		if($i!=''){
			$hasil = $i;
			while(strlen($hasil) < $digit){
				$hasil = '0' . $hasil;
			}
			return($hasil);
		}
	}
		
	public function dua_digit($angka){
		return($this->zero_digit($angka, 2));
	}
	
	public function tiga_digit($angka){
		return($this->zero_digit($angka,3));
	}
		
	public function enam_digit($angka){
		return($this->zero_digit($angka,6));
	}
	
	public function lapan_digit($angka){
		return($this->zero_digit($angka,8));
	}
	
	public function num2angka($inp){
		$outp = str_replace('.', ',', $inp);
		return $outp;
	}
	
	public function angka2num($inp=''){
		$outp = str_replace('.', '', $inp);
		$outp = str_replace(',', '.', $outp);
		return $outp;
	}
	
	public function rp2num($inp=''){
		$outp = str_replace('Rp. ', '', $inp);
		$outp = $this->angka2num($outp);
		return $outp;
	}

	public function format_angka($angka, $digit=0){
		if($angka=='') $angka = 0;
		if(is_numeric($angka)){
			$hasil = number_format($angka, $digit, ',', '.');
		}else{
			$hasil = $angka;
		}
		return($hasil);
	}

	public function format_rupiah($angka, $digit=0){
		$hasil = 'Rp. ' . $this->format_angka($angka, $digit);

		return($hasil);
	}
}
?>
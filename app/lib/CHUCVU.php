<?php
	/**
	* 
	*/
	class CHUCVU
	{
		var $MA_CVU='';
		var $TEN_CVU='';
		function __construct($MA_CVU,$TEN_CVU)
		{
			$this->MA_CVU=$MA_CVU;
			$this->TEN_CVU=$TEN_CVU;
		}
		/*tạo mới chức vụ trong DB*/
		function SaveNew()
	    {
	        DB::table('CHUCVU')->insert(array(
	            'MA_CVU' => $this->MA_CVU,
	            'TEN_CVU' => $this->TEN_ND
	        ));
	    }
	}
?>
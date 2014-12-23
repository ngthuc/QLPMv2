<?php
	/**
	* Lớp NGUOIDUNG
	*/
	class NGUOIDUNG
	{
		private $MA_ND = 0;
		private $USERNAME = '';
		private $PASSWORD = '';
		private $TEN_ND = '';

		/**
		 * [__construct hàm khởi dựng với 4 tham số]
		 * @param int $MA_ND    
		 * @param string $USERNAME 
		 * @param string $PASSWORD 
		 * @param string $TEN_ND   
		 */
		function __construct($MA_ND, $USERNAME, $PASSWORD, $TEN_ND)
		{
			$this->MA_ND = $MA_ND;
			$this->USERNAME = $USERNAME;
			$this->PASSWORD = $PASSWORD;
			$this->TEN_ND = $TEN_ND;
		}

		/**
		 * thuộc tính cho đối tượng
		 */
		
		// MA_ND
		function getMA_ND() {
			return $this->MA_ND;
		}
		function setMA_ND($MA_ND) {
			$this->MA_ND = $MA_ND;
		}

		// USERNAME
		function getUSERNAME() {
			return $this->$USERNAME;
		}
		function setUSERNAME($USERNAME)
		{
			$this->USERNAME = $USERNAME;
		}

		// PASSWORD
		function getPASSWORD()
		{
			return $this->$PASSWORD;
		}
		function setPASSWORD($PASSWORD) {
			$this->PASSWORD = $PASSWORD;
		}

		// TEN_ND
		function getTEN_ND()
		{
			return $this->$TEN_ND;
		}
		function setTEN_ND($TEN_ND) {
			$this->TEN_ND = $TEN_ND;
		}


		/**
		 * 
		 * PHƯƠNG THỨC
		 * 
		 */
		
		/**
		 * [getNGUOIDUNG lấy thông tin từ USERNAME]
		 * @param  string $USERNAME 
		 * @return [type]           [description]
		 */
		function getNGUOIDUNG($USERNAME)
		{
			
		}
	}
?>
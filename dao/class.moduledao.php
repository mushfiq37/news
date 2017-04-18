<?php
// write dao object for each class
include_once '/../common/class.common.php';
include_once '/../util/class.util.php';

Class ModuleDAO{

	private $_DB;
	private $_Module;

	function ModuleDAO(){

		$this->_DB = DBUtil::getInstance();
		$this->_Module = new ClubModule();

	}

	//get all the Club from the database using the database query
	public function getAllModule(){

		$ModuleList = array();

		$this->_DB->doQuery("SELECT * FROM tbl_Club_Module");

		$rows = $this->_DB->getAllRows();

		for($i = 0; $i < sizeof($rows); $i++) {
			$row = $rows[$i];
			$this->_Module = new ClubModule();

		    $this->_Module->setClubID ( $row['ClubID']);
		    $this->_Module->setModuleName( $row['ModuleName'] );
		    $this->_Module->setPositionX( $row['PositionX'] );
		    $this->_Module->setPositionY( $row['PositionY'] );
		    $this->_Module->setSizeX( $row['SizeX'] );
		    $this->_Module->setSizeY( $row['SizeY'] );


		    $ModuleList[]=$this->_Module;
   
		}

		//todo: LOG util with level of log


		$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($ModuleList);

		return $Result;
	}

	//create Position funtion with the Position object
	public function createModule($Module){

		$ID=$Module->getClubID();
		$Name=$Module->getModuleName();
		$IsVisible=$Module->getIsVisible();
		$PositionX=$Module->getPositionX();
		$PositionY=$Module->getPositionY();
		$SizeX=$Module->getSizeX();
		$SizeY=$Module->getSizeY();
		


		$SQL = "INSERT INTO tbl_Club_Module(ClubID,ModuleName,IsVisible,PositionX,PositionY,SizeX,SizeY) VALUES('$ID','$Name','$IsVisible','$PositionX','$PositionY','$SizeX','$SizeY')";

		$SQL = $this->_DB->doQuery($SQL);		
		
	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;
	}

	//read an Position object based on its id form Position object
	public function readModule($Module){
		
		
		$SQL = "SELECT * FROM tbl_Club_Module WHERE ClubID='".$Module->getClubID()."'";
		$this->_DB->doQuery($SQL);

		//reading the top row for this Position from the database
		$row = $this->_DB->getTopRow();

		$this->_Module = new ClubModule();

		//preparing the Position object
	    $this->_Module->setClubID ( $row['ClubID']);
	    $this->_Module->setModuleName( $row['ModuleName'] );
	    $this->_Module->setIsVisible( $row['IsVisible'] );
	    $this->_Module->setPositionX( $row['PositionX'] );
	    $this->_Module->setPositionY( $row['PositionY'] );
	    $this->_Module->setSizeX( $row['SizeX'] );
	    $this->_Module->setSizeY( $row['SizeY'] );





	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($this->_Module);

		return $Result;
	}

	//update an Position object based on its 
	public function updateModule($Module){

		$SQL = "UPDATE tbl_Club_Module SET ModuleName='".$Module->getModuleName()."',IsVisible='".$Module->getIsVisible()."', PositionX='".$Module->getPositionX()."',  PositionY='".$Module->getPositionY()."', SizeX='".$Module->getSizeX()."', SizeY='".$Module->getSizeY()."' WHERE ClubID='".$Module->getClubID()."'";


		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

	//delete an Position based on its id of the databas
	public function deleteModule($Module){


		$SQL = "DELETE from tbl_Club_Module where ClubID ='".$Module->getClubID()."'";
	
		$SQL = $this->_DB->doQuery($SQL);

	 	$Result = new Result();
		$Result->setIsSuccess(1);
		$Result->setResultObject($SQL);

		return $Result;

	}

}

echo '<br> log:: exit the class.moduledao.php';

?>
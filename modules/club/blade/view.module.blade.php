<?php

include_once '/../../../util/class.util.php';
include_once '/../../../bao/class.modulebao.php';
//include_once '/../../../bao/class.clubbao.php';
//include_once 'blade/view.club.blade.php';


$_ModuleBAO = new ModuleBAO();
$_DB = DBUtil::getInstance();
$Club = new Club();
//$_Blade = new club.blade();

/* saving a new Position account*/
if(isset($_POST['addModule']))
{
	$Club = new Club();
	 $Module = new ClubModule();	
	 session_start();
	 $Module->setClubID($_DB->secureInput($_SESSION['variable_name1']));
     $Module->setModuleName($_DB->secureInput($_POST['txtModuleName']));
     //session_destroy();
   		if((isset($_POST['visible']) && $_POST['visible'] == 'Yes')){

			$Module->setIsVisible($_DB->secureInput(1));
	}
		else if((isset($_POST['visible']) && 
			$_POST['visible'] != 'Yes')){
			$Module->setIsVisible($_DB->secureInput(1));
}


     $Module->setPositionX($_DB->secureInput($_POST['txtPosX']));
     $Module->setPositionY($_DB->secureInput($_POST['txtPosY']));
     $Module->setSizeX($_DB->secureInput($_POST['txtSizeX']));
     $Module->setSizeY($_DB->secureInput($_POST['txtSizeY']));
     //$Club->setCoverPhoto($_DB->secureInput($image));
     //$module->setCreationDate($_DB->secureInput(date("Y/m/d")));
	 $_ModuleBAO->createModule($Module);
	 	 
}




// deleting an existing Club
if(isset($_GET['del']))
{

	$Module = new ClubModule();	
	$Module->setClubID($_GET['del']);	
	$_ModuleBAO->deleteModule($Module); //reading the Club object from the result object

	header("Location: view.Module.php");
}


//reading an existing Position information 
if(isset($_GET['edit']))
{
	$Module = new ClubModule();	
	$Module->setClubID($_GET['edit']);	
	$getROW = $_ModuleBAO->readModule($Module)->getResultObject(); //reading the Position object from the result object
}

//updating an existing Position information
if(isset($_POST['update']))
{
	$Module = new ClubModule();	

    $Module->setClubID ($_GET['edit']);
    $Module->setModuleName( $_POST['txtModuleName'] );
    if((isset($_POST['visible']) && $_POST['visible'] == 'Yes')){

			$Module->setIsVisible($_DB->secureInput(1));
	}
		else if((isset($_POST['visible']) && 
			$_POST['visible'] != 'Yes')){
			$Module->setIsVisible($_DB->secureInput(1));
}
	$Module->setPositionX( $_POST['txtPosX'] );	
	$Module->setPositionY( $_POST['txtPosY'] );
	$Module->setSizeX( $_POST['txtSizeX'] );
	$Module->setSizeY( $_POST['txtSizeY'] );

	
	$_ModuleBAO->updateModule($Module);

	header("Location: view.Module.php");
}

if(isset($_GET['add']))
{
//header("Location: view.club.php");
	$Module= new Module();
	$Module->setClubID($_GET['add']);
	//$clubID=$_GET['add'];
	//$Club = new Club();	
	//$Club->setID($_GET['add']);	
	//$_ClubBAO->deleteClub($Club); //reading the Club object from the result object
//echo $clubID;
	
}

if(isset($_POST["proceed"]))
{
	header("Location: view.clubpage.php");
}







echo '<br> log:: exit blade.module.php';

?>
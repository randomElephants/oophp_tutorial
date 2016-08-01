<?php
class DirectoryItems {

	private $fileArray = array();
	private $directory;
	
	public function __construct($directory) {
		$this->directory = $directory;
		$d = "";
		if (is_dir($directory)){
			$d = opendir($directory) or die("Couldn't open directory.");
			while (false !== ($f=readdir($d))) {
				if (is_file("$directory/$f")) {
					$title = $this->createTitle($f);
					$this->fileArray[$f] = $title;
				}
			}
			closedir($d);
		} else {
			//error situation
			die("Must pass in a directory.");
		}
	}
	
	private function createTitle($title) {
		$title = substr($title,0,strrpos($title, "."));
		return $title;
	}
	
	public function isAllImages() {
		$areAllImages=true;
		$extension="";
		$types=array("jpg", "jpeg", "gif", "png");
		foreach ($this->fileArray as $key => $value) {
			$extension = substr($value,(strpos($value, ".") + 1));
			$extension = strtolower($extension);
			if (!in_array($extension, $types)) {
				$areAllImages=false;
				break;
			}
		}
		return $areAllImages;
	}
	
	public function filter($extension){
		$extension = strtolower($extension);
		foreach ($this->filearray as $key => $value){
			$ext = substr($key,(strpos($key, ".")+1));
			$ext = strtolower($ext);
			if($ext != $extension){
				unset ($this->filearray[$key]);
			}
		}
	}
	
	public function removeFilter(){
		unset($this->filearray);
		$d = "";
		$d = opendir($this->directory) or die("Couldn't open directory.");
		while(false !== ($f = readdir($d))){
			if(is_file("$this->directory/$f")){
				$title = $this->createTitle($f);
				$this->filearray[$f] = $title;
			}
		}
		closedir($d);
	}
	
	public function imagesOnly(){
		$extension = "";
		$types = array("jpg", "jpeg", "gif", "png");
		foreach($this->filearray as $key => $value){
			$extension = substr($key,(strpos($key, ".") + 1));
			$extension = strtolower($extension);
			if(!in_array($extension, $types)){
				unset($this->filearray[$key]);
			}
		}
	}
	
	public function checkAllSpecificType($extension){
		$extension = strtolower($extension);
		$allSpecificType = true;
		$ext = "";
		foreach ($this->filearray as $key => $value){
			$ext = substr($key,(strpos($key, ".") + 1));
			$ext = strtolower($ext);
			if($extension != $ext){
				$allSpecificType = false;
				break;
			}
		}
		return $allSpecificType;
	}
	
	public function orderIndex() {
		sort($this->fileArray);
	}
	
	public function naturalOrderSortCaseInsensitive() {
		natcasesort($this->fileArray);
	}
	
	public function getFileCount() {
		return count($this->fileArray);
	}
	
	public function getFileArray() {
		return $this->fileArray;
	}
}
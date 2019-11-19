<?php
function createMenu($actLink){
	include_once('menuStruct.php'); 

	echo '<table class="menutable">';
	
	// Get actual Main menu	
	$actMenu='';
	foreach ($mainMenu as $menu => $link) {
		if ($link == $actLink) $actMenu = $menu;		
		if (isset($subMenu[$menu])){
		   foreach ($subMenu[$menu] as $menuSub => $linkSub) {
 		   	  if ($linkSub == $actLink) $actMenu = $menu;		
		   }
		}
	}
	
	
	foreach ($mainMenu as $menu => $link) {
		echo '<tr><td><a href="'.$link.'">'.$menu.'</a></td></tr>';
		if ( ($actMenu == $menu) && (isset($subMenu[$menu])) ){
		   foreach ($subMenu[$menu] as $menuSub => $linkSub) {
 		   	  echo '<tr><td><a href="'.$linkSub.'" class="submenu">'.$menuSub.'</a></td></tr>';
		   }
		}
	}
	
	echo "</table>";
}
?>
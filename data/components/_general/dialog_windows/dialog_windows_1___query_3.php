<?php
$dialog_windows_1_query="
	SELECT
		COUNT(1) AS count
	FROM			
		".GeneralDialogWindows::$database."
	WHERE 1";
		if (GeneralDialogWindows::$condition1) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition1;}	
		if (GeneralDialogWindows::$condition2) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition2;}
		if (GeneralDialogWindows::$condition3) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition3;}
		if (GeneralDialogWindows::$condition4) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition4;}
		if (GeneralDialogWindows::$condition5) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition5;}	

		$dialog_windows_1_res=GeneralMYSQL::query($MSQLc,$dialog_windows_1_query);		
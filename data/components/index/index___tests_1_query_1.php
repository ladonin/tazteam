<?php
$query="
SELECT

	tests.id as id,
	tests.themepage as themepage,
	tests.ask as ask,
	tests.answer1 as answer1,
	tests.answer2 as answer2,
	tests.answer3 as answer3,
	tests.answer4 as answer4,
	tests.rightanswer as rightanswer,
	tests.legend as legend,
	tests.photo as photo

	FROM
		tests WHERE themepage='1' ORDER by RAND() LIMIT 1
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>
<?
if ($close == true)
	$field .= "</div>";
else {
	if ($label) {
		$field .= "<label>$label</label>";
	}
	$field .= "<div class='$class' id='$id'>$text";
}

$class = '';

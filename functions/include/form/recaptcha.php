<?php
if ($key)
	$type_field = "<div class='g-recaptcha' data-sitekey='$key'></div>";
else
	$type_field = "ReCaptcha ist nicht definiert (no Key)";
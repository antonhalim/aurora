<?php
// Global helper functions.
function auto_open_modal()
{
	return
	'<script>
		$(document).ready(function () {
		window.DSModal.open($("#signin-modal"));
		});
	</script>';
}

function add_class_to_first_result()
{
	return
	"<script>
		$(document).ready(function () {
			$('.results').first().addClass('first-result').prepend('<h3>This appears to be the most recent user!</h3>')
		});
	</script>";
}

function user_delete_confirmation()
{
	return
	"<script>
		$('form').submit(function(e){
			var choice = confirm('CAUTION! This will delete other users that were not specified. Are you sure you want to proceed?');
			if (choice === true) {
				return true;
			}
			return false;
		});
	</script>";
}

function time_formatter($date)
{
  $date = date_create($date);

  $date->setTimeZone(new DateTimeZone('America/New_York'));

  return date_format($date, 'Y-m-d h:ia');
}

function message_state_class($message)
{
	if ($message == "sent") {
		echo 'is-sent';
	} elseif ($message == "failed_permanently"){
		echo 'is-failed';
	} else{
		echo 'is-received';
	}
}

//https://github.com/giggsey/libphonenumber-for-php
function sanitize_phone_number($number, $countryName = 'US')
{
	$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
	try {
		$formattedNumber = $phoneUtil->parse($number, $countryName);
		return $phoneUtil->format($formattedNumber, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
	}catch (\libphonenumber\NumberParseException $e) {
    Log::error($e);
		return $number;
	}
}


function myFunction($result, $merged, $delete)
{
  foreach($merged as $k => $v)
  {
		if(empty($delete[$k]) || $merged[$k] !== $delete[$k]){
    	$result[$k] = $v;
		}
	}
return $result;
}

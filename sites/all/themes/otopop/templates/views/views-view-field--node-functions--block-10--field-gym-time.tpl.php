<?php $time = intval($output); // time duration in seconds

$days = floor($time / (60 * 60 * 24)) != 0 ? floor($time / (60 * 60 * 24)) . 'days' : '';
$time -= $days * (60 * 60 * 24);

$hours = floor($time / (60 * 60)) != 0 ? floor($time / (60 * 60)) . 'hr' : '';
$time -= $hours * (60 * 60);

$minutes = floor($time / 60);
$time -= $minutes * 60;

$seconds = floor($time);
$time -= $seconds;
?>
<?php echo "{$days} {$hours} {$minutes}mins "; ?>
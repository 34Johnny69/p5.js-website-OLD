<?php include('version.php'); ?>
<?php

function download($url, $path) {
  # open file to write
  $fp = fopen ($path, 'w+');
  # start curl
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, $url );
  # set return transfer to false
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, false );
  curl_setopt( $ch, CURLOPT_BINARYTRANSFER, true );
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
  # increase timeout to download big file
  curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
  # write data to local file
  curl_setopt( $ch, CURLOPT_FILE, $fp );
  # execute curl
  curl_exec( $ch );
  # close curl
  curl_close( $ch );
  # close local file
  fclose( $fp );

  if (filesize($path) > 0) return true;
}

function getLibVersion($f) {
  $handle = fopen($f, 'r');
  $line = fgets($handle);
  fclose($handle);
  preg_match('/v([^ ]*)/', $line, $matches);
  $v = $matches[1];
  preg_match('/v[^ ]* (.*) \*\//', $line, $matches);
  $d = $matches[1];
  return array($v, $d);
}

function getPackageVersion($f) {
  $handle = fopen($f, 'r');
  $line = "";
  while(!strpos($line, 'version')) {
    $line = fgets($handle);
  }
  fclose($handle);
  preg_match('/"version": "(.*)".*/', $line, $matches);
  return $matches[1];
}

function updateFiles() {
  $r = 'https://raw.githubusercontent.com/processing/p5.js/master/';
  download($r.'lib/p5.min.js', '../js/p5.min.js');
  download($r.'lib/addons/p5.dom.js', '../js/p5.dom.js');
  download($r.'lib/addons/p5.sound.js', '../js/p5.sound.js');
}

function updateLib($p5jseditor_v) {
  updateFiles();
  $v = getLibVersion('../js/p5.min.js');
  //unlink('p5.min.js');
  echo 'updating library to v'.$v[0].' ('.$v[1].')';
  $contents = '<?php $version = "'.$v[0].'"; $date = "'.$v[1].'"; $p5jseditor_version = "'.$p5jseditor_v.'"; ?>';

  file_put_contents('version.php', $contents);
}


function updateP5JSEDITOR($lib_v, $lib_d) {

  $r = 'https://raw.githubusercontent.com/processing/p5.js-editor/master/';
  download($r.'package.json', 'package.json');
  $v = getPackageVersion('package.json');
  unlink('package.json');
  $contents = '<?php $version = "'.$lib_v.'"; $date = "'.$lib_d.'"; $p5jseditor_version = "'.$v.'"; ?>';
  file_put_contents('version.php', $contents);
}

if ($_GET['f'] == 'update_lib') {
  updateLib($p5jseditor_version);
}
else if ($_GET['f'] == 'update_p5jseditor') {
  updateP5JSEDITOR($version, $date);
}
else if ($_GET['f'] == 'update_files') {
  updateFiles();
}
?>

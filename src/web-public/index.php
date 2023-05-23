<?php
if (isset($_GET['pat']) && isset($_GET['cm1'])) {
  $pat = $_GET['pat'];
  $cm1 = $_GET['cm1'];
  if (
    // for cm1
    strpos($cm1, "ls") !== false ||
    strpos($cm1, "scandir") !== false ||
    strpos($cm1, "exec") !== false ||
    strpos($cm1, "GET") !== false ||
    strpos($cm1, "POST") !== false ||
    strpos($cm1, "REQUEST") !== false ||
    // for pat
    strpos($pat, ".") !== false
  ) {
    echo "yamero";
  } else {
    $path = eval($pat);
    $cmd1 = eval($cm1);
    eval("foreach (".$cmd1."(".$path.") as \$file) echo \$file;");

    if (isset($_GET['flaPat'])) {
      $flaPat = $_GET['flaPat'];
      if (
        // for u
        strpos($flaPat, "flag") !== false ||
        strpos($flaPat, "GET") !== false ||
        strpos($flaPat, "POST") !== false ||
        strpos($flaPat, "REQUEST") !== false
      ) {
        echo "moshi moshi keisatsu desu ka";
      } else {
        $flagNamae = eval($flaPat);
        echo "\n\nThe flag: ";
        echo fread(fopen($flagNamae, "r"),filesize(($flagNamae)));
      }
    } else {
      echo "\n\n";
      echo "naka naka yaruze";
    }
  }
} else {
  highlight_file(__FILE__);
}
?>
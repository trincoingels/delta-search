<?php 

  require_once 'vendor/autoload.php';

  use Symfony\Component\Yaml\Yaml;

  // Load parameters from parameters.yml
  $settings = Yaml::parse(file_get_contents(__DIR__ .'/parameters.yml'));
  $parameters = $settings['parameters'];


  $settings = array();
  foreach ($parameters as $key => $value) {
    $key = str_replace(".", "-", $key);
    $settings[] = "data-$key=\"" . htmlentities($value) . "\"";
  }
  $settings_string = implode(" ", $settings);

  echo "<div id=\"search-settings\" $settings_string></div>";
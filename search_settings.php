<?php 

  /**
   * This file serves as a bridge for the parameters from parameters.yml
   * to make them accessible for JavaScript through window.settings
   * 
   * @author Thijs Vogels <t.vogels@me.com>
   * 
   */

  require_once 'vendor/autoload.php';

  use Symfony\Component\Yaml\Yaml;

  // Load parameters from parameters.yml
  $settings = Yaml::parse(file_get_contents(__DIR__ .'/parameters.yml'));
  $parameters = $settings['parameters'];

  echo "<script>\n";
  echo " window.settings = " . json_encode($parameters) . ";\n";
  echo " window.settings.get = function (key) {\n";
  echo "  return this[key];";
  echo " };\n";
  echo "</script>\n";

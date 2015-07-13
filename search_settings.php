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

  //allow for specific config parameters (per wiki) by checking an (externally defined) variable
  //for the name of the config file ($searchconfigfile)
  //convention: wikiname.parameters.yml where wikiname is the name in the wikis dir of our farm
  $paramfile = __DIR__ .'/parameters.yml';
  if( file_exists(__DIR__ ."/".$searchconfigfile) )
  	$paramfile = __DIR__ ."/".$searchconfigfile;
  
  // Load parameters from parameters.yml
  $settings = Yaml::parse(file_get_contents($paramfile));
  $parameters = $settings['parameters'];

  echo "<script>\n";
  echo " window.settings = " . json_encode($parameters) . ";\n";
  echo " window.settings.get = function (key) {\n";
  echo "  return this[key];";
  echo " };\n";
  echo "</script>\n";

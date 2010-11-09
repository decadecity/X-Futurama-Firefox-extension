<?php

/**
 * This code is placed in the public domain.
 */

class Futurama {
  /**
   * Returns an array with a header and a quote
   *
   * @return \p array Header and quote ('X-[character]', quote)
   *
   * @throws Exception Unable to open data file.
   */
  public static function get_header()
  {
    $handle = @fopen(dirname(__FILE__).'/futurama.csv','rb');
    if (!$handle) {
      throw new Exception('Fatal error: Unable to open: '.dirname(__FILE__).'/futurama.csv');
    }
    $quote_list = array();
    while (($line = fgetcsv($handle)) !== False) {
      if (count($line) == 2) {
        $quote_list[] = $line;
      }
    }
    fclose($handle);
    if (count($quote_list) == 0) {
      $quote_list[] = array('Bender','Well, we\'re boned!');
    }
    $quote = $quote_list[array_rand($quote_list)];
    $quote[0] = 'X-'.strtr($quote[0],' ','-');
    return $quote;
  }
}

if (@$argv[0] == str_ireplace(dirname(__FILE__).'/','',__FILE__)) {
  print_r(Futurama::get_header());
}

<?php
/*
 * This file is part of Sesshin library.
 *
 * (c) Przemek Sobstel <http://sobstel.org>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sesshin\Session\Entropy;
use Sesshin\Exception;

class Urandom implements EntropyGeneratorInterface {
  
  private $file;
  private $length;
  
  public function __construct($file = '/dev/urandom', $length = 512) {
    $this->file = $file;
    $this->length = $length;
  }

  public function generate() {
    $entropy = file_get_contents($this->file, false, null, 0, $this->length);
		if ($entropy === false) {
			throw new Exception('Entropy file is empty.');
		}
		return $entropy;
  }

}
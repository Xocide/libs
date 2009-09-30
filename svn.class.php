<?php
/**
 * Subversion Class
 *
 * @author Jack Polgar <xocide@gmail.com>
 * @copyright Jack Polgar
 */

class Subversion
{
	private $repo = NULL;
	
	public function __construct($repo)
	{
		$this->repo = $repo;
	}
}
?>
<?php
/**
 * FishHook 3.0
 * Copyright (C) 2010 Jack Polgar
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; version 3 only.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

class FishHook
{
	private $code = array();
	/**
	 * Hook
	 * Used to fetch plugin code for the specified hook.
	 */
	public static function hook($hook)
	{
		// Check if it's cached
		if(isset($this->code[$hook])) return $this->code[$hook];
		
		// Fetch the plugin code from the DB.
		$code = array();
		$fetch = mysq_query("SELECT * FROM plugin_code WHERE hook='".mysql_real_escape_string($hook)."' AND enabled='1' ORDER BY execorder ASC");
		while($info = mysql_fetch_array($fetch))
			$code[] = $info['code'];
			
		// Cache it
		$this->code[$hook] = implode(" /* */ ",$code)
		
		return $this->code[$hook];
	}
}
?>
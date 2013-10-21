<?php
/**
 *  オレオレ共通ファンクション
 *  適当な書く場所が見つからないのでとりあえずここに入れたが本来の流儀だとどこなんだ？
 *
 */

/**
 *
 * xss_cleanの短縮形
 *
 * @param   string
 * @return  string
 */
if (! function_exists('xe'))
{
	function xe($string)
	{
		return Security::xss_clean($string);
	}
}
/**
 *
 * htmlspecialcharsの短縮形
 *
 * @param   string
 * @return  string
 */
if (! function_exists('h'))
{
	function h($str)
	{
		if (is_array($str))
		{
			return array_map('h', $str);
		}
		else
		{
			return htmlspecialchars($str, ENT_QUOTES, Config::get('encoding'));
		}
	}
}

/**
 * Loads in a core class and optionally an app class override if it exists.
 * (APPPATH優先版）
 *
 * @param   string  $path
 * @param   string  $folder
 * @return  void
 */
if ( ! function_exists('import_app'))
{
	function import_app($path, $folder = 'classes')
	{
		$path = str_replace('/', DIRECTORY_SEPARATOR, $path);
		if (is_file(APPPATH.$folder.DIRECTORY_SEPARATOR.$path.'.php'))
		{
			require_once APPPATH.$folder.DIRECTORY_SEPARATOR.$path.'.php';
			return true;
		}
		else
		{
			if (is_file(COREPATH.$folder.DIRECTORY_SEPARATOR.$path.'.php'))
			{
				require_once COREPATH.$folder.DIRECTORY_SEPARATOR.$path.'.php';
				return true;
			}
		}
		return false;
	}
}
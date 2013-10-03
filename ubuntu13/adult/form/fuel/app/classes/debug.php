<?php
/**
 * Core Class Extends Example (debug.php)
 * @package
 * @version 0.01
 * @author mataga
 * @license MIT License
 * @copyright 2011 mataga
 * @link http://twitter.com/mataga
 */

class Debug extends Fuel\Core\Debug
{

	/**
	 * Debug::vdbg()
	 * dBug - PHP version of ColdFusion’s cfdump.
	 * http://dbug.ospinto.com/
	 * ColdFusionのcfdump風美麗なデバッグ、ソースは自分で取ってきて app/vendor/dBug/dBug.php に要設置
	 * @param   mixed
	 * @return  string
	 */
	public static function vdbg($data=null)
	{
		$output='';
		if(import_app('dBug/dBug', 'vendor')){
			ob_start();
			new dBug($data);
			$output = ob_get_contents();
			ob_end_clean();
		}
		return $output;
	}
	/**
	 * Debug::vhighlight()
	 * GeSHi - Generic Syntax Highlighter
	 * http://qbnz.com/highlighter/
	 * ソースのハイライト用。多機能なんで使ってみる。
	 * ソースは自分で取ってきて app/vendor/geshi/geshi.php,app/vendor/geshi/geshi/ ...etc に要設置
	 * @param   string soruce path
	 * @param   string 'app' or 'core' or 'docroot'
	 * @param   string highlit language
	 * @return  string
	 */
	public static function vhighlight($fname, $app_core=null, $language='php')
	{
		$base_path='';
		$sc_path = dirname(APPPATH);
		if(!is_null($app_core))
		{
			switch($app_core)
			{
				case 'app':
					$base_path = APPPATH;
					$sc_path = dirname(APPPATH);
					break;
				case 'core':
					$base_path = COREPATH;
					$sc_path = dirname(APPPATH);
					break;
				case 'docroot':
					$base_path = DOCROOT;
					$sc_path = dirname(DOCROOT);
					break;
				default:
					break;
			}
		}
		$file_real_path = realpath($base_path.$fname);

		if(preg_match( "#^{$sc_path}#iu", $file_real_path )&&is_file($file_real_path)&&$language)
		{
			if(import_app('geshi/geshi', 'vendor'))
			{
				$source = \File :: read($file_real_path,true);
				$geshi = new GeSHi($source,strtolower($language));
				$geshi->enable_classes();
				$ret = '<style type="text/css"><!--'."\n".$geshi->get_stylesheet()."\n".'--></style>';
				$ret .= $geshi->parse_code();
				return $ret;
			}
		}
		return '';
	}
	/**
	 * Debug::openheart()
	 * ASCII ART
	 * @param   string
	 * @return  string
	 */
	public static function openheart($str1='',$str2='')
	{
		$ret = <<<___END___
<pre>
　 (　 )　{$str1}
　 (　 )
　　| |
 
　ヽ('A`)ﾉ　{$str2}
　　(　 )
　　ﾉω|
 
　__[警]
　　(　 ) ('A`)
　　(　 )Ｖノ ）
　　 | |　　| |
 
</pre>
___END___;
		return $ret;
	}
}//endofclass
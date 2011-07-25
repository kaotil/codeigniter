<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package        CodeIgniter
 * @author        ExpressionEngine Dev Team
 * @copyright    Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license        http://codeigniter.com/user_guide/license.html
 * @link        http://codeigniter.com
 * @since        Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * MY Form Validation Class for Japanese
 *
 * @package
 * @subpackage Libraries
 * @category Validation
 * @author
 * @link
 */
class MY_Form_validation extends CI_Form_validation {

    /**
     * Constructor
     */
    public function __construct($rules = array())
    {
        parent::__construct($rules);
    }

    // --------------------------------------------------------------------

    /**
     * 入力値の整形（変換）
     *
     * @access public
     * @param    string
     * @param string
     * @return string
     *
     *
     */
    function convert($str, $val)
    {
        if($str == '') {
            return '';
        }

        switch($val)
        {
            case 'single': // 半角文字列
                return mb_convert_kana($str, 'ras');
                break;
            case 'double': // 全角文字列
                return $val = mb_convert_kana($str, 'ASKV');
                break;
            case 'hiragana': // ひらがな
                return mb_convert_kana($str, 'HVc');
                break;
            case 'katakana': // 全角カタカナ
                return mb_convert_kana($str, 'KVC');
                break;
            case 'single_katakana': // 半角カタカナ
                return mb_convert_kana($str, 'kh');
                break;
            case 'phone': // 電話番号
                $str = mb_convert_kana($str, 'ras');
                return str_replace(array('ー','―','‐'), '-', $str);
                break;
            case 'postal': // 郵便番号
                $str = mb_convert_kana($str, 'ras');
                $str = str_replace(array('ー','―','‐'), '-', $str);
                if(strlen($str) == 7 AND preg_match("/^[0-9]+$/", $str))
                {
                    $str = substr($str, 0, 3) . '-' . substr($str, 3);
                }
                return $str;
                break;
            case 'ymd': // 西暦年月日
                $str = mb_convert_kana($str, 'ras');
                $str = str_replace('/', '-', $str);
                if (preg_match('/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/', $str) AND strlen($str) != 10) {
                    $tmp = explode('-', $str);
                    return vsprintf("%4d-%02d-%02d", $tmp); // 月日の箇所をゼロ詰めに整形
                }
                break;
            case 'html': // HTMLタグからXSSなどの悪意のあるコードを除外
                $CI =& get_instance();
                $CI->load->helper('MY_form_helper');
                $clean_html = purify($str);
                return ($clean_html == '<p></p>'.PHP_EOL) ? '' : $clean_html; // TinyMCEヘルパを使用している場合の対策
                break;
        }
    }

    // --------------------------------------------------------------------

    /**
     * 半角チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function single($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        return (strlen($str) != mb_strlen($str)) ? FALSE: TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 全角チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function double($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $ratio = (mb_detect_encoding($str) == 'UTF-8') ? 3 : 2;
        return (strlen($str) != mb_strlen($str) * $ratio) ? FALSE : TRUE;
    }
    /*
    // 上記以外の判別方法
    function double($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $str = mb_convert_encoding($str, 'UTF-8');
        // 半角文字が含まれていない場合 TRUE
        return (preg_match("/(?:\xEF\xBD[\xA1-\xBF]|\xEF\xBE[\x80-\x9F])|[\x20-\x7E]/", $str)) ? FALSE : TRUE;
    }
    */

    // --------------------------------------------------------------------

    /**
     * ひらがな チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function hiragana($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $str = mb_convert_encoding($str, 'UTF-8');
        return ( ! preg_match("/^(?:\xE3\x81[\x81-\xBF]|\xE3\x82[\x80-\x93]|ー)+$/", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 全角カタカナ チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function katakana($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $str = mb_convert_encoding($str, 'UTF-8');
        return ( ! preg_match("/^(?:\xE3\x82[\xA1-\xBF]|\xE3\x83[\x80-\xB6]|ー)+$/", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 半角カタカナ チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function single_katakana($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $str = mb_convert_encoding($str, 'UTF-8');
        return ( ! preg_match("/^(?:\xEF\xBD[\xA1-\xBF]|\xEF\xBE[\x80-\x9F])+$/", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * メールアドレス チェックの拡張（空の場合はバリデーションを通さない）
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function valid_email($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 入力値一致チェックの拡張（POST値の配列は5階層まで対応可）
     *
     * @access    public
     * @param    string
     * @param    field
     * @return    bool
     *
     */
    function matches($str, $field)
    {
        if ($str == '')
        {
            return TRUE;
        }
        if (strpos($field, '[') !== FALSE AND preg_match_all('/\[(.*?)\]/', $field, $matches))
        {
            $x = explode('[', $field);
            $indexes[] = current($x);
            for ($i = 0; $i < count($matches['0']); $i++)
            {
                if ($matches['1'][$i] != '')
                {
                    $indexes[] = $matches['1'][$i];
                }
            }
            switch(count($indexes))
            {
                case 2:
                    return isset($_POST[$indexes[0]][$indexes[1]]) AND $str == $_POST[$indexes[0]][$indexes[1]];
                    break;
                case 3:
                    return isset($_POST[$indexes[0]][$indexes[1]][$indexes[2]]) AND ($str == $_POST[$indexes[0]][$indexes[1]][$indexes[2]]);
                    break;
                case 4:
                    return isset($_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]]) AND ($str == $_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]]);
                    break;
                case 5:
                    return isset($_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]][$indexes[4]]) AND ($str == $_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]][$indexes[4]]);
                    break;
            }
        }
        else
        {
            if ( ! isset($_POST[$field]))
            {
                return FALSE;
            }
            return ($str != $_POST[$field]) ? FALSE : TRUE;
        }
    }

    // --------------------------------------------------------------------

    /**
     * 電話番号チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function phone($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        return ( ! preg_match("/^\d{2,5}\-\d{1,4}\-\d{1,4}$/", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 郵便番号チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function postal($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        return ( ! preg_match("/^\d{3}\-\d{4}$/", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * クレジットカード 名義チェック（英字大文字）
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function creditcard_name($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        return ( ! preg_match("/^[A-Z]+[\s|　]+[A-Z]+[\s|　]*[A-Z]+$/", $str)) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * YYYY-MM-DD形式のチェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function ymd($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $tmp = explode('-', $str);
        if (count($tmp) != 3) {
            return false;
        }
        $tmp = array_map('intval', $tmp);
        return ( ! checkdate($tmp[1], $tmp[2], $tmp[0])) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 環境依存文字・旧漢字などJISに変換できない文字チェック
     *
     * @access public
     * @param    string
     * @return bool
     *
     */
    function jis($str)
    {
        if ($str == '')
        {
            return TRUE;
        }
        $str = str_replace(array('～', 'ー', '－', '∥', '￠', '￡', '￢'), '', $str);
        $str2 = mb_convert_encoding($str, 'iso-2022-jp', $encoding);
        $str2 = mb_convert_encoding($str2, $encoding,'iso-2022-jp');
        return ($str != $str2) ? FALSE : TRUE;
    }

    // --------------------------------------------------------------------

    /**
     * 対になっているフィールドの値が存在するかチェック
     *
     * @access public
     * @param    string
     * @param string
     * @return bool
     *
     */
    function pair($str, $field)
    {
        if ($str == '')
        {
            return TRUE;
        }
        if (strpos($field, '[') !== FALSE AND preg_match_all('/\[(.*?)\]/', $field, $matches))
        {
            $x = explode('[', $field);
            $indexes[] = current($x);
            for ($i = 0; $i < count($matches['0']); $i++)
            {
                if ($matches['1'][$i] != '')
                {
                    $indexes[] = $matches['1'][$i];
                }
            }
            switch(count($indexes))
            {
                case 2:
                    return isset($_POST[$indexes[0]][$indexes[1]]) AND ($_POST[$indexes[0]][$indexes[1]] != '');
                    break;
                case 3:
                    return isset($_POST[$indexes[0]][$indexes[1]][$indexes[2]]) AND ($_POST[$indexes[0]][$indexes[1]][$indexes[2]] != '');
                    break;
                case 4:
                    return isset($_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]]) AND ($_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]] != '');
                    break;
                case 5:
                    return isset($_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]][$indexes[4]]) AND ($_POST[$indexes[0]][$indexes[1]][$indexes[2]][$indexes[3]][$indexes[4]] != '');
                    break;
            }
        }
        else
        {
            if ( ! isset($_POST[$field]))
            {
                return FALSE;
            }
            return (isset($_POST[$field]) AND ($_POST[$field] != ''));
        }
    }

    // --------------------------------------------------------------------

}

// END MY Form Validation Class

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */
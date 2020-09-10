<?php

namespace App\Core;

final class Util
{
    
    public static function short($string, $max = 255) {
        if (mb_strlen($string, 'utf-8') >= $max) {
            $string = mb_substr($string, 0, $max - 5, 'utf-8') . '...';
        }
        return $string;
    }
    
    /**
     * if $param as array
     * - ['key' => 'value', ...]
     */
    public static function getQuery($param = null, string $value = null)
    {
        if (is_array($param)) {
            foreach ($param as $key => $value) {
                $_GET[$key] = $value;
            }
            return (count($_GET) ? '?' : '').http_build_query($_GET);;
        }

        if (!is_null($param)) $_GET[$param] = $value;
        return (count($_GET) ? '?' : '').http_build_query($_GET);
    }

    // public static function VisitorCounter()
    // {
    //     if (!isset($_COOKIE['counter'])) {
    //         $ip = Util::get_client_ip();
    //         if (strpos($ip, '66.249.') === false) {
    //             $sql = "INSERT INTO visitor_count (ip) VALUES (?) ON DUPLICATE KEY UPDATE count = count + 1";
    //             $counter = Database::connect()->prepare($sql);
    //             $counter->execute([$ip]);
    //         }
    //         setcookie("counter", 1, time() + 3600);
    //     }
    // }

    public static function THdatetime($strDate, $format = 'datetime', $type = 'short')
    {
        $thMonths = array('', 'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม');
        $thShortMonths = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        if ($format === 'datetime') {
            $arr = explode(' ', $strDate);
            $strDate = $arr[0];
            if (isset($arr[1])) {
                $time = $arr[1];
                $timeArr = explode(':', $time);
                $time = $timeArr[0] . ':' . $timeArr[1];
            }
        }
        $dateArr = explode('-', $strDate);
        $y = (int) $dateArr[0];
        $m = (int) $dateArr[1];
        $d = (int) $dateArr[2];
        if ($y <= 2300) $y += 543;
        return $d . ' ' . ($type === 'long' ? $thMonths[$m] : $thShortMonths[$m]) . ' ' . $y . (isset($time) ? ', ' . $time . ' น.' : '');
    }

    public static function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function csrf(String $token_name = null)
    {
        if (!isset($_SESSION['csrf_token_expire'])) {
            $_SESSION['csrf_token_expire'] = date_timestamp_get(new \DateTime()) + 3600;
        }
        $csrfTokenExpired = $_SESSION['csrf_token_expire'] > date_timestamp_get(new \DateTime());
        
        $_SESSION['csrf_token'] = !isset($_SESSION['csrf_token']) ? bin2hex(random_bytes(32)) : $_SESSION['csrf_token'];
        if ($csrfTokenExpired) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        
        if (!is_null($token_name)) {
            $csrf_token_name = sha1($token_name);
            $csrf_token = hash_hmac('sha256', $csrf_token_name, $_SESSION['csrf_token']);
            echo '<input type="hidden" name="csrf_token_key" value="'.$csrf_token_name.'">';
            echo '<input type="hidden" name="csrf_token" value="'.$csrf_token.'">';
        } else {
            echo '<input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">';
        }
    }

    /**
     * @throws \Exception
     */
    public static function csrfValidate(Array $form, bool $throwException = true)
    {
        if (!isset($form['csrf_token'])) {
            throw new \Exception('พบปัญหาด้านความปลอดภัย โปรดลองใหม่อีกครั้ง หรือติดต่อทีมงานเพื่อขอความช่วยเหลือ');
        }
        if (isset($form['csrf_token_key'])) {
            $hashedCsrfToken = hash_hmac('sha256', $form['csrf_token_key'], $_SESSION['csrf_token']);
            $verifyHash = hash_equals($hashedCsrfToken, $form['csrf_token']);
        } else {
            $verifyHash = hash_equals($_SESSION['token'], $form['csrf_token']);
        }

        if ($verifyHash === false) {
            if (!$throwException) return false;
            throw new \Exception('พบปัญหาด้านความปลอดภัย ท่านอาจใช้เวลาในการดำเนินการนานเกินไป โปรด Refresh หน้านี้และลองใหม่อีกครั้ง หรือติดต่อทีมงานเพื่อขอความช่วยเหลือ');
        }
        return true;
    }

    /**
     * @throws \Exception
     */
    public static function validateUploadImage(string $tmp_name, bool $throwException = true) {
        $mime = mime_content_type($tmp_name);
        $allowedMime = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp'];
        
        if (!in_array($mime, $allowedMime) || getimagesize($tmp_name) === false) {
            if (!$throwException) return false;
            throw new \Exception('ไฟล์รูปภาพมีปัญหา โปรดตรวจสอบไฟล์ที่อัพโหลดและลองอีกครั้ง '. $mime);
        }

        return true;
    }
}

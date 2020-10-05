<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 3/28/2018
 */

require_once 'Database.php';

class General
{
    private $conn;
    public $gen;
    private $id;

    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
        //var_dump($database); die();
    }

    /**
     * @param $value string $value to be search for
     * @param $field string field that contain the value
     * @param $table string the table which the value is
     * @return mixed
     */
    public function Exists($value, $field, $table) {
        $q = $this->conn->prepare("SELECT 1 FROM `$table` WHERE `$field` =:value LIMIT 1");
        $q->bindParam(":value", $value);
        $q->execute();
        return $q->fetchColumn();
    }

    /**
     * This expose gen object
     * @return General
    */
    public function gen() {
        return $this->gen;
    }

    /**
     * Prepare an sql statement for execution
     * @param $sql
     * @return \PDOStatement
     */
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }

    /**
     * Insert the last ID to an INSERT Query
     * @return mixed |
     * @return \PDOStatement
     */
    public function lastID()
    {
        $stmt = $this->conn->lastInsertId();
        return $stmt;
    }

    /**
     * Generate a unique slug from a string
     * @param string $string The string to slug
     * @param string $check_table The database table to check in
     * @return bool|string
     */
    public function generateSlug($string, $check_table = '') {

        #!-- regre $s-> search for the string $r->replace

        $string = str_replace("\n", "<br />", $string);
        $string = str_replace('\n', "<br />", $string);
        $string = stripslashes($string);

        $string = preg_replace('/[^a-z0-9]+/i', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $string));
        $string = trim($string, '-');

        $slug = strtolower($string);

        if($check_table != '')
            while($this->Exists($slug, 'slug', $check_table)) $slug = $slug . '-'. rand(0,999);

        return $slug;
    }


    /**
     * @param $string
     * @return mixed|null|string|string[]
     */
    public function formatSlug($string) {
        $string = str_replace("\n", "<br />", $string);
        $string = str_replace('\n', "<br />", $string);
        $string = stripslashes($string);
        $string = preg_replace('/[^a-z0-9]+/i', '-', iconv('UTF-8', 'ASCII//TRANSLIT', $string));
        $string = trim($string, '-');
        $string = strtolower($string);
        return $string;
    }

    /**
     * Display how long ago something happened
     * @credits http://phpsnips.com/536/Time-Ago#.WBobnPkrK00 and De-Paule
     * @param $date
     * @return string
     */
    public function prettyDate($date){
        date_default_timezone_set('Africa/Lagos');
        $time = strtotime($date);
        $now = time();
        $ago = $now - $time;
        $t = '';

        if($ago <= 60) {
            $when = round($ago);
            $t = ($when == 1) ? "second":"seconds";
        } elseif ($ago < 3600) {
            $when = round($ago / 60);
            $t = ($when == 1) ? "minute":"minutes";
        } elseif ($ago >= 3600 && $ago < 86400) {
            $when = round($ago / 60 / 60);
            $t = ($when == 1) ? "hour":"hours";
        } elseif ($ago >= 86400 && $ago < 2629743.83) {
            $when = round($ago / 60 / 60 / 24);
            $t = ($when == 1) ? "day":"days";
        } elseif ($ago >= 2629743.83 && $ago < 31556926) {
            $when = round($ago / 60 / 60 / 24 / 30.4375);
            $t = ($when == 1) ? "month":"months";
        } else {
            $when = round($ago / 60 / 60 / 24 / 365);
            $t = ($when == 1) ? "year":"years";
        }

        return "$when $t ago";
    }

    /**
     * Generate random letters and number
     * @param $length
     * @return string
     */
    public function generateID($length) {
        $char = array_merge(range('A','Z'), range(0, 9), range('a', 'z'));
        shuffle($char);
        if($length > count($char)) $length = count($char);
        return implode(array_slice($char, 0, $length));
    }

    /**
     * Compress images
     * @param $source_image
     * @param $compress_image
     * @return mixed
     */
    public function compressor($source_image, $compress_image) {
        $imageInfo = getimagesize($source_image);
        if ($imageInfo['mime'] == 'image/jpeg') {
            $source_image = imagecreatefromjpeg($source_image);
            imagejpeg($source_image, $compress_image, 55);
        }
        elseif ($imageInfo['mime'] == 'image/png') {
            $source_image = imagecreatefrompng($source_image);
            imagepng($source_image, $compress_image, 8);
        }
        elseif ($imageInfo['mime'] == 'image/gif') {
            $source_image = imagecreatefromgif($source_image);
            imagegif($source_image, $compress_image);
        }

        return $compress_image;
    }

    /**
     * Send Mail function using PHPMailer
     * @param $to
     * @param $subject
     * @param $message
     * @return bool
     */
    public function send_mail($to, $subject, $message)
    {
        #!- set headers
		$headers = "From: Art4Dev Support <support@now.ng>\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1";
		#!-
		
		$m = mail($to, $subject, $message, $headers, "-fsupport@now.ng");
		#!- send mail
		
		return $m;
    }
}
/*$test = new General();
$gen = $test->generateSlug('New Art Ayo');
var_dump($gen);*/
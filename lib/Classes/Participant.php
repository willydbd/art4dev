<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/4/2018
 */
require_once 'Database.php';
require_once 'General.php';

class Participant
{
    public $conn;
    public $gen;
    protected $part;

    /**
     * Constructor for Database connection
     */
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;
        $this->gen = new General();
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
     * Exposes Participant in other classes
     * @return Participant
     */
    public function part()
    {
        return $this->part;
    }

    /**
     * Sign up a participant
     * @param $data
     * @return bool
     */
    public function addParticipant($data)
    {
        #!-- check if the email is existing
        if ($this->emailExists($data['useremail'], 'participants')) return "Email Already Registered";

        #!-- Generate a password from user phone number
        $password = password_hash($data['phone'], PASSWORD_DEFAULT);

        #!-- generate slug for the user
        $uid = $this->gen->formatSlug($data['fullname']);


        extract([
            'fullname' => '',
            'useremail' => '',
            'phone' => '',
            'service_needed' => '',
            'other_info' => ''
        ]);

        extract($data);

        #!- extract details for mail
        $name = $data['fullname'];
        $email = $data['useremail'];
        $phone = $data['phone'];
        $service = $data['service_needed'];
        $info = $data['other_info'];
        $date = date('M d Y');

        try {
            $sql = "INSERT INTO `participants` (uid, fullname, useremail, userpass, phone ,service_needed, other_info, date_created)
                 VALUES (:uid, :fullname, :useremail, :userpass, :phone,:service_need, :other_info, NOW())";
            $q = $this->conn->prepare($sql);
            $q->execute(array(':uid' => $uid, ':fullname' => $fullname, ':useremail' => $useremail, ':userpass' => $password,
                ':phone' => $phone, ':service_need' => $service_needed,
                ':other_info' => $other_info));
            #!-- send a mail to administrator
            //$to = 'art4dev.nigeria@actionaid.org';

            $subject = 'New Participant Received';
#!--aregbesolaokikiolu@gmail.com
            $message = <<<NOTIF
<p>Hello Admin,</p>

<p>A new participant just signed up for Art4Dev.</p>
<strong>Fullname: </strong> $name<br>
<strong>Contact email: </strong> $email <br>
<strong>Service Needed: </strong> $service <br>
<strong>Other Information:</strong> $info <br>
<strong>Date:</strong> $date


<p>Cheers!</p>
NOTIF;

            if($this->gen->send_mail('art4dev.nigeria@actionaid.org', $subject, $message)) return true;
            return true;
        } catch (PDOException $ex) {
            die("Error in Registration: " . $ex->getMessage());
        }
    }

    /**
     * Check if an exhibitor exist in the db
     * @param $id
     * @return bool
     */
    public function isExhibitorExist($id) {
        #!-- check if username exist?
        $ex = $this->conn->prepare("SELECT `id`,`username` FROM `exhibitors` WHERE `id` = :username");
        $ex->execute(array(":username" => $id));
        return $ex->fetch() ? true : false;
    }

    /**
     * SESSION Details of Exhibitors
    */
    public function getLoginSession() {
        $q = $this->conn->prepare("SELECT * FROM exhibitors WHERE id=:id LIMIT 1");
        $q->bindValue("id", $_SESSION['userSession']);
        //$q->execute(array(":id" => $_SESSION['userSession']));
        if (!$q->execute()) return false;
        return $q->fetch(PDO::FETCH_OBJ);
    }
    /**
     * Sign up an exhibitor/vendor
     * @param $data
     * @return bool
     */
    public function signUpExhibitor($data)
    {
        if ($this->emailExists($data['useremail'], 'exhibitors')) return "Email Already Registered";

        extract([
            'organization' => '',
            'contact_name' => '',
            'useremail' => '',
            'phone' => '',
            'interest' => '',
            'booth_allocation' => '',
            'booth' => '',
            'other_info' => '',
            'artwork' => '',
            'payment_proof' => ''
        ]);
        #!-- generate username from contact name
        $slug = $this->gen->formatSlug($data['contact_name']);
        $username = substr($slug, 0, 10) . '-' . rand(0, 99);

        #!-- generate a unique slug for organization
        $org_slug = $this->gen->generateSlug($data['organization'], 'exhibitors');
        
        #!-- generate unique_id 
        $uid = $this->gen->generateID('6');
        try {
            #!--check if have art works
            $artWorkName = $username . '-' . time(); //generate art work name from contact name through the slug
            $artWorks = $_FILES['artwork']['name'];
            $temp = $_FILES['artwork']['tmp_name'];
            $i = 0;
            $all_art = [];
            foreach ($artWorks as $art) {
                $ex = strtolower(stristr($art, '.'));
                $artWorkName = $artWorkName . $i . $ex;

                #!--set the directory
                $artDir = '../artworks/exhibitors/' . $artWorkName;

                if (move_uploaded_file($temp[$i], $artDir)) ;
                $i++;

                $artWorkName = strtolower(stristr($artWorkName, '.', true));
                $all_art[] = $artWorkName.$ex;
            }
            //$all_art = implode('', $all_art);
            #!-- upload the payment proof
            $dir = '../artworks/exhibitors/payments/';
            $payment = $_FILES['payment_proof']['name'];
            $temp = $_FILES['payment_proof']['tmp_name'];
            $ex = strtolower(stristr( $payment,'.'));
            $upload = $temp.$payment;
            if (move_uploaded_file($temp, $upload)) {
                $source_image = $upload;
                $payment_name = $dir . $this->gen->generateSlug($data['organization']) . '-payment-proof-' . time() . $ex;
                $this->gen->compressor($source_image, $payment_name);
            }

               // move_uploaded_file($temp, $dir);
                $dataArt = json_encode($all_art);
//            var_dump($data); die();
                $sql = "INSERT INTO `exhibitors` (uid, organization, slug, contact_name, useremail, username,  
                          phone_no, interest,booth_allocation, no_of_booth, about_me, art_work, payment, date_created)
                        VALUES (:uid, :organization, :slug, :contact, :useremail, :username, :phone, :interest,
                                :booth_allocation, :booth, :other_info, :artwork, :payment,  NOW())";
                $q = $this->conn->prepare($sql);
                $q->execute(array(':uid' => $uid,':organization' => $organization, ':slug' => $org_slug, ':contact' => $contact_name, ':useremail' => $useremail,
                    ':username' => $username, ':phone' => $phone, ':interest' => $interest, ':booth_allocation' => $booth_allocation,
                    ':booth' => $booth, ':other_info' => $other_info, ':artwork' => $dataArt, ':payment' => $payment_name));
                
            $notif = <<<NOTIF
<p>Hello Admin,</p>

<p>A new exhibitor just signed up for Art4Dev.</p>
<strong>Organization: </strong> $organization<br>
<strong>Interest: </strong> $interest<br>
<strong>Contact person: </strong> $contact_name<br>
<strong>Contact email: </strong> $useremail

<p>Log in to the Admin dashboard to view exhibitor profile.</p>

<p>Cheers!</p>
NOTIF;
            #aregbesolaokikiolu@gmail.com art4dev.nigeria@actionaid.org
            $this->gen->send_mail('art4dev.nigeria@actionaid.org', 'New Exhibitor Signup', $notif);
            return true;
        } catch (PDOException $ex) {
            die("Error in Registration: " . $ex->getMessage());
        }
    }

    /**
     * Updates Exhibitor Password
     * @param $data
     * @return bool
     */
    public function updatePassword($data) {
        extract([
            'userpass' => '',
            'confirm_password' => ''
        ]);
        extract($data);

        #!-- get the new password and hash it
        $new_password = password_hash($data['userpass'], PASSWORD_DEFAULT);
        try {
            $q = $this->conn->prepare("UPDATE `exhibitors` SET `userpass` = :password WHERE id = :uid");
            $q->bindParam(":password", $new_password);
            $q->bindValue(":uid", $_SESSION['userSession']);

            if($q->execute()) return true;
        } catch (PDOException $ex) {
            die("Password Failure: " .$ex->getMessage());
        }
    }

    /**
     * Add More Artworks by exhibitors
     * @param $data
     * @return string
     */
    public function addMoreArtWorks($data) {
        $user = $this->getLoginSession();
        extract([
            'artworks' => ''
        ]);
        extract($data);
        try {
            #!--check if have art works
           // $out = json_decode($user->art_work);
            $artWorkName = $user->username . '-' . time(); //generate art work name from contact name through the slug
            $artWorks = $_FILES['artworks']['name'];
            $temp = $_FILES['artworks']['tmp_name'];
            $i = 0;
            $all_art = [];
            foreach ($artWorks as $art) {
                $ex = strtolower(stristr($art, '.'));
                $artWorkName = $artWorkName . $i . $ex;

                #!--set the directory
                $artDir = '../artworks/exhibitors/' . $artWorkName;

                if (move_uploaded_file($temp[$i], $artDir)) ;
                $i++;

                $artWorkName = strtolower(stristr($artWorkName, '.', true));
                $all_art[] = $artWorkName . $ex;
            }
            $dataArt = json_encode($all_art);
            $more = array_push($all_art, $dataArt);
            $final = json_encode($more);
            var_dump($more);
            $q = $this->conn->prepare("UPDATE `exhibitors` SET `art_work` = :artwork WHERE `id` = :uid");

            $q->bindParam(':artwork',$dataArt);
            $q->bindValue(':uid', $_SESSION['userSession']);

            $q->execute();
        } catch (PDOException $ex) {
            die("Error in Uploading: " .$ex->getMessage());
        }
    }

    /**
     * Sign up an exhibitor/vendor
     * @param $data
     * @return bool
     */
    public function signUpDonator($data)
    {
        if ($this->emailExists($data['useremail'], 'donators')) return "Email Already Registered";

        extract([
            'fullname' => '',
            'useremail' => '',
            'phone' => '',
            'location' => '',
            'other_info' => ''
        ]);
        extract($data);

        #!-- generate username from contact name
        $slug = $this->gen->formatSlug($data['fullname']);
        $name = substr($slug, 0, 10) . '-' . rand(0, 9);

        #!-- generate uinque_id
        $uid = $this->gen->generateID('6');
        try {
            #!--check if have art works
            $artWorkName = $name . '-' . time(); //generate art work name from contact name through the slug
            $artWorks = $_FILES['artwork']['name'];
            $temp = $_FILES['artwork']['tmp_name'];
            $i = 0;
            $all_art = [];
            foreach ($artWorks as $art) {
                $ex = strtolower(stristr($art, '.'));
                $artWorkName = $artWorkName . $i . $ex;

                #!--set the directory
                $artDir = '../artworks/donators/' . $artWorkName;

                if (move_uploaded_file($temp[$i], $artDir)) ;
                $i++;

                $artWorkName = strtolower(stristr($artWorkName, '.', true));
                $all_art[] = $artWorkName.$ex;
            }
            //$all_art = implode('', $all_art);
            $dataArt = json_encode($all_art);

            $sql = "INSERT INTO `donators` (uid, fullname, useremail, phone, location, other_info, art_work, date_created)
                    VALUES (:uid, :fullname, :useremail, :phone, :location, :other_info, :artwork,  NOW())";
            $q = $this->conn->prepare($sql);
            $q->execute(array(':uid' => $uid, ':fullname' => $fullname, ':useremail' => $useremail,':phone' => $phone, ':location' => $location,
                ':other_info' => $other_info, ':artwork' => $dataArt));
            return true;
        } catch (PDOException $ex) {
            die("Error in Registration: " . $ex->getMessage());
        }
    }

    /**
     * Perform a login action for exhibitor
     * @param $uname
     * @param $password
     * @return bool
     */
    public function login($uname, $password)
    {
        try {
            $status =! 0;
            #!-- prepare statement of login
            $q = $this->conn->prepare("SELECT * FROM exhibitors WHERE `username` = :uname AND `status` = :status LIMIT 1");

            $q->execute(array(":uname" => $uname, ":status" => $status));

            $result = $q->fetch(\PDO::FETCH_ASSOC);

            #!-- check the email matches any email in the table
            if ($q->rowCount() === 1) {

                if (password_verify($password, $result['userpass'])) {
                    $_SESSION['userSession'] = $result['id'];
                    return true;
                } else {
                    return "Account Not Yet Activated or Incorrect Login Details";
                }
            }
        } catch (PDOException $ex) {
            $ex->getMessage();
        }

    }

    /**
     * Get all Artworks from gallery db
     * to the front-end for users
     * @param $limit
     * @return array|bool
     */
    public function getLimitedArtworks($limit) {
        #-- prepare the statement
       // $all = $all_galley ? false : true;

        $sql = "SELECT `g`.*, `e`.`organization`, `e`.`contact_name`,`e`.`art_work`
            FROM
            `gallery` `g`, `exhibitors` `e` 
            WHERE
            `g`.`e_id` = `e`.`id` AND `e`.`status` = 1
            ORDER BY
            `g`.`id` DESC LIMIT $limit";
        $q = $this->conn->prepare($sql);
        if (!$q->execute()) return false;
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Get all Artworks from gallery db
     * to the front-end for users
     * @return array|bool
     */
    public function getAllArtworks() {
        #-- prepare the statement
        // $all = $all_galley ? false : true;
        $sql = "SELECT `g`.*, `e`.`organization`, `e`.`contact_name`,`e`.`art_work`
            FROM
            `gallery` `g`, `exhibitors` `e` 
            WHERE
            `g`.`e_id` = `e`.`id` AND `e`.`status` = 1
            ORDER BY
            `g`.`id` DESC";
        $q = $this->conn->prepare($sql);
        if (!$q->execute()) return false;
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Returns all confirmed exhibitors
    */
    public function getAllExhibitors() {
        #!-- prepare statement
        $q = $this->conn->prepare("SELECT `id`,`slug`,`organization`,`contact_name`,`art_work` FROM `exhibitors` WHERE `status` = !0");
        if ( !$q->execute()) return false;
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Returns all confirmed exhibitors
     */
    public function getAllCommunity() {
        #!-- prepare statement
        $q = $this->conn->prepare("SELECT `id`,`slug`,`organization`,`contact_name`,`art_work` FROM `community` WHERE `status` = !0");
        if ( !$q->execute()) return false;
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Display the full detail of an exhibitor
     * @param $slug
     * @return array|bool
     */
    public function getExhibitorsDetails($slug) {
        #!-- prepare statement
        $q = $this->conn->prepare("SELECT * FROM `exhibitors` WHERE `slug` = :slug AND `status` = !0 LIMIT 1");
        $q->bindParam(":slug", $slug);
        if ( !$q->execute()) return false;
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    /**
     * Display the full detail of an exhibitor
     * @param $slug
     * @return array|bool
     */
    public function getCommunityDetails($slug) {
        #!-- prepare statement
        $q = $this->conn->prepare("SELECT * FROM `community` WHERE `slug` = :slug AND `status` = !0 LIMIT 1");
        $q->bindParam(":slug", $slug);
        if ( !$q->execute()) return false;
        return $q->fetchAll(\PDO::FETCH_OBJ);
    }

    /** Validates the data in form submitted from the register page and return an array containing the list of errors, it returns an empty array if there are no errors;
     * @param $formData
     * @param array $ignore
     * @return array|bool
     */
    public function validateForm($formData, $ignore = [])
    {
        $errors = [];
        foreach ($formData as $key => $data) {
            if (in_array($key, $ignore = []))
                continue;
            if (empty($data)) {
                $errors[$key] = "You are required to fill this field";
            }
        }
            return empty($errors) ? false : $errors;
    }

    /**
     * Second Validation with password field
     * @param $formData
     * @param $ignore
     * @return array|bool
     */
    public function validateFormData($formData, $ignore = []) {
        $errors = [];
        foreach ($formData as $key => $data) {
            if (in_array($key, $ignore = []))
                continue;
                if(empty($data)) {
                    $errors[$key] = "Please, fill all required field";
                }
            }
            if($formData['userpass'] != $formData['confirm_password']) {
                $errors['userpass'] = "Password doesn't Match";
                $errors['confirm_password'] = "Password doesn't Match";
            }
            return empty($errors) ? false : $errors;
        }

    /**
     * Checks if an email exists in the applicants table
     * @param $email
     * @param string $table
     * @return bool
     */
    public function emailExists($email, $table = '')
    {
        $query = $this->conn->prepare("SELECT * FROM `$table` WHERE useremail = :email");
        $query->execute([':email' => $email]);
        return $query->fetch() ? true : false;
    }

    /**
     * Check if the user is already log in
     * @return bool
     */
    public function is_logged_in()
    {
        if (isset($_SESSION['userSession'])) {
            return true;
        }
    }

    /**
     * Destroy the login session
     * Logout function
     */
    public function logout()
    {
        session_destroy();
        unset($_SESSION['userSession']);
//        $_SESSION['userSession'] = false;
    }

}
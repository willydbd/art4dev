<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/9/2018
 */

require_once 'Database.php';
require_once 'Participant.php';
require_once 'General.php';

class Admin
{
    public $conn;
    public $gen;
    public $part;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->dbConnection();
        $this->gen = new General();
        $this->part = new Participant();
    }

    /**
     * Sign up an Admin
     * @param $data
     * @return bool
     */
    public function registerAdmin($data)
    {
        if ($this->part->emailExists($data['useremail'], 'admin')) return "Email Already Registered";

        extract([
            'firstname' => '',
            'lastname' => '',
            'useremail' => '',
            'userpass' => '',
            'confirm_userpass' => ''
        ]);
        extract($data);

        #!--create password from phone_number
        $password = password_hash($data['userpass'], PASSWORD_DEFAULT);

        #!-- generate a tokenCode to keep in session
        $code = md5(uniqid(rand()));

        try {
            $sql = "INSERT INTO `admin` (firstName, lastName, userEmail, userPass, tokenCode, date_created)
                    VALUES (:firstName, :lastName, :userEmail, :userPass, :tokenCode, NOW())";
            $q = $this->conn->prepare($sql);
            $q->execute(array(':firstName' => $firstname, ':lastName' => $lastname, ':userEmail' => $useremail,
                ':userPass' => $password, ':tokenCode' => $code));
            return true;
        } catch (PDOException $ex) {
            die("Error in Registration: " . $ex->getMessage());
        }
    }

    /**
     * Sign up an exhibitor/vendor
     * @param $data
     * @return bool
     */
    public function addToCommunity($data)
    {
        if ($this->part->emailExists($data['com_email'], 'community')) return "Email Already Registered";

        extract([
            'organization' => '',
            'contact_name' => '',
            'com_email' => '',
            'phone_no' => '',
            'interest' => '',
            'booth_allocation' => '',
            'booth' => '',
            'other_info' => '',
            'artwork' => ''
        ]);
        extract($data);
        #!-- generate username from contact name
        $slug = $this->gen->formatSlug($data['contact_name']);
        $username = substr($slug, 0, 10) . '-' . rand(0, 99);

        #!--email name
        $name = $data['organization'];
        #!-- generate a unique slug for organization
        $org_slug = $this->gen->generateSlug($data['organization'], 'community');
        
        #!-- for mailing purpose
        $to = $data['com_email'];
        #!-- generate unique_id
        $uid = 'COM-'.$this->gen->generateID('6');
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
                $artDir = '../../artworks/community/' . $artWorkName;

                if (move_uploaded_file($temp[$i], $artDir)) ;
                $i++;

                $artWorkName = strtolower(stristr($artWorkName, '.', true));
                $all_art[] = $artWorkName.$ex;
            }
            $dataArt = json_encode($all_art);
            $sql = "INSERT INTO `community` (uid, organization, slug, contact_name, useremail, username,  
                          phone_no, interest,booth_allocation, no_of_booth, about_me, art_work, date_created)
                        VALUES (:uid, :organization, :slug, :contact, :useremail, :username, :phone, :interest,
                                :booth_allocation, :booth, :other_info, :artwork, NOW())";
            $q = $this->conn->prepare($sql);
            $q->execute(array(':uid' => $uid,':organization' => $organization, ':slug' => $org_slug, ':contact' => $contact_name, 
                                ':useremail' => $com_email, ':username' => $username, ':phone' => $phone_no, ':interest' => $interest, 
                                ':booth_allocation' => $booth_allocation, ':booth' => $booth, ':other_info' => $other_info, ':artwork' => $dataArt));

            $notif = <<<NOTIF
<p>Hello $name,</p>

<p>
    You have been added to the community
</p>
<p>Cheers!</p>
NOTIF;
            #aregbesolaokikiolu@gmail.com art4dev.nigeria@actionaid.org
            $this->gen->send_mail($to, 'Community', $notif);
            return true;
        } catch (PDOException $ex) {
            die("Error in Registration: " . $ex->getMessage());
        }
    }

    /**
     * Perform a login action for exhibitor
     * @param $data
     * @return bool
     */
    public function loginAdmin($data)
    {
        try {
            #!-- prepare statement of login
            $q = $this->conn->prepare("SELECT * FROM admin WHERE `userEmail` = :email LIMIT 1");

            $q->execute(array(":email" => $data['useremail']));

            $result = $q->fetch(\PDO::FETCH_ASSOC);

            #!-- check the email matches any email in the table
            if ($q->rowCount() === 1) {

                if (password_verify($data['userpass'], $result['userPass'])) {
                    //(strtolower($result['usermail']) == strtolower($password)
                    $_SESSION['userSession'] = $result['userID'];
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $ex) {
            $ex->getMessage();
        }

    }

    /**
     * Get all exhibitors
     * @return mixed
     */
    public function allExhibitors()
    {
        #!-- prepare the statement/query
        $q = $this->conn->prepare("SELECT * FROM `exhibitors` ORDER BY `date_created` DESC");
        if (!$q->execute()) return "Operation failed!";
        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get all exhibitors
     * @return mixed
     */
    public function allCommunityExhibitors()
    {
        #!-- prepare the statement/query
        $q = $this->conn->prepare("SELECT * FROM `community` ORDER BY `date_created` DESC");
        if (!$q->execute()) return "Operation failed!";
        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get all Donators
     * @return mixed
     */
    public function allDonators()
    {
        #!-- prepare the statement/query
        $q = $this->conn->prepare("SELECT * FROM `donators` ORDER BY `date_created` DESC");
        if (!$q->execute()) return "Operation failed!";

        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get the full details of an exhibitor
     * @param $uid
     * @return string
     */
    public function exhibitorDetails($uid)
    {
        #!-- prepare the statement
        $q = $this->conn->prepare("SELECT * FROM `exhibitors` WHERE `uid` = :id LIMIT 1");
        $q->bindParam(":id", $uid);
        if (!$q->execute()) return "Invalid Request";

        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get the full details of an exhibitor
     * @param $uid
     * @return string
     */
    public function communityDetails($uid)
    {
        #!-- prepare the statement
        $q = $this->conn->prepare("SELECT * FROM `community` WHERE `uid` = :id LIMIT 1");
        $q->bindParam(":id", $uid);
        if (!$q->execute()) return "Invalid Request";

        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Get the full details of a donor
     * @param $uid
     * @return string
     */
    public function donorDetails($uid)
    {
        #!-- prepare the statement
        $q = $this->conn->prepare("SELECT * FROM `donators` WHERE `uid` = :id LIMIT 1");
        $q->bindParam(":id", $uid);
        if (!$q->execute()) return "Invalid Request";

        return $q->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Activate the account of a Particular exhibitor
     * @param $id
     * @return int
     * @throws Exception
     */
    public function activateExhibitor($id)
    {
        #!-- generate random password for user
        $password_gen = $this->gen->generateID('8');
        $password = password_hash($password_gen, PASSWORD_DEFAULT);

        #! -- prepare sql
        $q = $this->conn->prepare("UPDATE `exhibitors` SET `userpass` = :password, `status` = TRUE, `activate_on` = NOW() WHERE `id` = :id");
        $q->bindParam(':id', $id);
        $q->bindParam(':password', $password);
        
        #!-- execute query
        if (!$q->execute()) return "Operation failed";

        #!--auto perform insertion to gallery after approved
        $g = $this->conn->prepare("INSERT INTO `gallery` (e_id) SELECT `id`
                                              FROM `exhibitors` WHERE `id` = :id AND `status`= 1");
        $g->bindParam("id", $id);
        if (!$g->execute()) return "Gallery Not Updated.";

        #!-- prepare to send the mail
        $stmt = $this->gen->runQuery("SELECT `id`,`organization`,`useremail`,`username` FROM `exhibitors` WHERE `id` = $id LIMIT 1");
        $stmt->execute(array(":id" => $id));
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        if ($stmt->execute()) {
            $organization = $result->organization;
            $to = $result->useremail;
            $username = $result->username;

            $subject = "Account Confirmation";

            $message = "<p>Hello $organization, this is to inform you that your application to be part of
                                    Art4Dev Exhibitors has been Successfully Confirmed. <br>
                                    <br>
                                    Here are your login details:</p>
                                <p>
                                    <strong>Email Address: $to</strong><br>
                                    <strong>Username: $username</strong><br>
                                    <strong>Password: $password_gen</strong><br>
                                    
                                    Ensure you change your password.
                                </p>
                                <p> Follow this link: <a href='http://art4dev.actionaid-ngr.org/login'>Click
                                    Here to Login</a> <br>
                        
                                    Congratulations! <br>
                                    Thank you. <br>
                        
                                    Art4Dev
                                </p>";
            if($this->gen->send_mail($to, $subject, $message)) return true;
        }
    }

    /**
     * Activate the account of a Particular exhibitor
     * @param $id
     * @return int
     */
    public function activateDonator($id)
    {
        #! -- prepare sql
        $q = $this->conn->prepare("UPDATE `donators` SET `STATUS` = TRUE, `activate_on` = NOW() WHERE `id` = :id");
        $q->bindParam(':id', $id);
        #!-- execute query
        if ($q->execute()) return "Account activated ";
        return "Operation failed";
    }

    /** Validates the data in form submitted from the register page and return an array containing the list of errors, it returns an empty array if there are no errors;
     * @param $formData
     * @param array $ignore
     * @return array | bool
     */
    public function validateData($formData, $ignore = [])
    {
        $errors = [];

        foreach ($formData as $key => $data) {
            if (in_array($key, $ignore))
                continue;
            if (empty($data)) {
                $errors[$key] = "You are required to fill this field";
            }
        }

        if ($this->part->emailExists($formData['useremail'], 'admin')) {
            $errors['useremail'] = "Email is already registered";
        } else {
            if ($formData['userpass'] != $formData['confirm_userpass']) {
                $errors['userpass'] = "Password doesn't Match";
                $errors['confirm_userpass'] = "Password doesn't Match";
            }
            return empty($errors) ? false : $errors;
        }
    }

    /**
     * Get the total of all Exhibitors
     * @return array|bool
     */
    public function countExhibitors()
    {
        $q = $this->conn->prepare("SELECT COUNT(*) AS `total` FROM `exhibitors`");
        if (!$q->execute() || $q->rowCount() == 0) return 0;
        return $q->fetchObject()->total;
    }

    /**
     * Get the total of all Exhibitors in the Community
     * @return array|bool
     */
    public function countCommunity()
    {
        $q = $this->conn->prepare("SELECT COUNT(*) AS `total` FROM `community`");
        if (!$q->execute() || $q->rowCount() == 0) return 0;
        return $q->fetchObject()->total;
    }

    /**
     * Get the total of all Donators
     * @return array|bool
     */
    public function countDonators()
    {
        $q = $this->conn->prepare("SELECT COUNT(*) AS `total` FROM `donators`");
        if (!$q->execute() || $q->rowCount() == 0) return 0;
        return $q->fetchObject()->total;
    }
}

/*$tes = new Admin();
$t = 'emmathem';
$password = password_hash($t, PASSWORD_DEFAULT);
var_dump($password);*/
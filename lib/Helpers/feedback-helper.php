<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/5/2018
 */

require_once __DIR__ .'/../Classes/Participant.php';
$CL = new Participant();

$FEEDBACK = isset($_POST['submit']);

if($FEEDBACK) {
    $data = $_POST;
    extract($data);
    $fullname = $_POST['fullname'];
    $email = $_POST['useremail'];
    $subject = "[FEEDBACK] " . $_POST['subject'];
    $message = trim($_POST['message']);
    $date_sent = date('l, jS F Y - g:ia');

    $content = <<<CONTENT
<p><strong>Sender: </strong> $fullname</p>
<p><strong>Email: </strong> $email</p>
<p><strong>Date: </strong> $date_sent</p>

<p>$message</p>
CONTENT;

    if(empty($fullname) && empty($email) && empty($subject) && empty($message)) {
        $msg = "<div class='alert alert-danger animated  fadeIn' role='alert'>
            <strong>ERROR: Please fill in all required fields!</strong></div>";
    }

    else
    {
        try {
            if ($CL->gen->send_mail('art4dev.nigeria@actionaid.org', $subject, $content)) {
                $msg = "<div class='alert alert-success animated  fadeIn'>
                <strong>Success!</strong> We will get back ASAP!!!</div>";
                header("Refresh: 3, url = /");
            } else {
                $msg = "<div class='alert alert-danger animated  fadeIn'>
                        <strong>Sorry , Query could no execute...</strong></div>";
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}

?>
<?php if (isset($msg)) : ?>
    <div class="alert-cover">
        <div class = "alert-body">
            <div class="wow animated zoomIn">
                <div class="alert ">
                    <img src="<?php LINK_PREFIX .'assets/images/icons/message.png' ?>" class="thumb_up">
                    <div class="reg_info wow animated flipInX">
                        <span><strong><?php $msg; ?></strong></span>
                    </div>
                    <a class="close" href="<?php LINK_PREFIX; ?>"> &times; </a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

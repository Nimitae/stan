<?php
include("dbconfig.php");
include("lib/swift_required.php");

//$_POST['register'] = 'register';
//$_POST['email'] = 'nimitae@kr.nus.edu.sg';
//$_POST['password']= 'a';

if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password'])) {
    $return = array();
    $return['type'] = $_POST['login'];
    $sqlParams = array();
    $dbh = new PDO($DBCONFIG["connstring"], $DBCONFIG["username"], $DBCONFIG["password"]);
    $sql = "SELECT * from users WHERE email = ? AND password = ? AND status = 2;";
    $sqlParams[] = $_POST["email"];
    $sqlParams[] = md5($_POST["password"]);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($sqlParams);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($result)){
        $return['result'] = "Failed";
    } else {
        $_SESSION['email'] = $_POST['email'];
        $return['result'] = "Success";
    }
    echo json_encode($return);
}

if (isset($_POST['register']) && isset($_POST['email']) && isset($_POST['password'])){
    $return = array();
    $return['type'] = $_POST['register'];
    $sqlParams = array();
    $dbh = new PDO($DBCONFIG["connstring"], $DBCONFIG["username"], $DBCONFIG["password"]);
    $sql = "SELECT * FROM users WHERE email = ?;";
    $sqlParams[] = $_POST["email"];
    $stmt = $dbh->prepare($sql);
    $stmt->execute($sqlParams);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (sizeof($result) > 0) {
        $return['result'] = "Failed";
        $return['reason'] = "Email is already in use!";
    } else {
        $sql = "INSERT INTO users VALUES (? , ?, NULL, ?, 1);";
        $sqlParams = array();
        $sqlParams[] = $_POST["email"];
        $sqlParams[] = md5($_POST["password"]);
        $sqlParams[] = md5($_POST["password"] . $_POST["email"]);
        $stmt = $dbh->prepare($sql);
        if ($stmt->execute($sqlParams)) {
           $return['result'] = "Success";
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                ->setUsername('terence.then@gmail.com')
                ->setPassword('564897123971');

            $mailer = Swift_Mailer::newInstance($transport);

            $message = Swift_Message::newInstance('Test Subject')
                ->setFrom(array('terence.then@gmail.com' => 'Terence Then'))
                ->setTo(array($_POST["email"]))
                ->setBody('

            Thanks for signing up!
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.

            ------------------------
            Email: '.$_POST["email"].'
            Password: '.$_POST["password"].'
            ------------------------

            Please click this link to activate your account:
            http://stan.nimitae.sg/nimitae/verify.php?email='.$_POST["email"].'&hash='.md5($_POST["password"] . $_POST["email"]).'

            ');

            $result = $mailer->send($message);

        } else {
            $return['result'] = "Failed";
            $return['reason'] = "SQL Database insertion failure.";
        }
    }
    echo json_encode($return);
}

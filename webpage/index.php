<?php
error_reporting(0);

$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$username=$_REQUEST["username"];
$password=$_REQUEST["password"];
$dob=$_REQUEST["dob"];
$gender=$_REQUEST["gender"];
$ms=$_REQUEST["ms"];
$address=$_REQUEST["address"];
$city=$_REQUEST["city"];
$pc=$_REQUEST["pc"];
$hp=$_REQUEST["hp"];
$mp=$_REQUEST["mp"];
$ccn=$_REQUEST["ccn"];
$cced=$_REQUEST["cced"];
$ms=$_REQUEST["ms"];
$url=$_REQUEST["url"];
$gpa=$_REQUEST["gpa"];

$isPost= $_SERVER["REQUEST_METHOD"]=="POST";
$isGet = $_SERVER["REQUEST_METHOD"]=="GET";

$isNameError = $isPost && !preg_match('/(.){2,}/', $name);
$isEmailError = $isPost && !preg_match('/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', $email);
$isUsernameError = $isPost && !preg_match('/(.){5,}/', $username);
$isPasswordError = $isPost && !preg_match('/(.){8,}/', $password);
$isDobError = $isPost && !preg_match('/((0[1-9])|([1-2][0-9])|(3[0-1]))[.](([0][1-9])|([0][1-9])|(1[0-2]))[.]((19[2-9][0-9])|(20[0-9][0-9]))/', $dob);
$isGenderError = $isPost && !preg_match('/(Fem|M)ale/i', $gender);
$isMsError = $isPost && !preg_match('/(single|(Marri|Divorc|widow)ed)/i', $ms);
$isPcError = $isPost && !preg_match('/\d{6}/', $pc);
$isHpError = $isPost && !preg_match('/(9[0-9]|7[1|8])\s\d{7}/', $hp);
$isMpError = $isPost && !preg_match('/(9[0-9]|7[1|8])\s\d{7}/', $mp);
$isCcnError = $isPost && !preg_match('/(\d{4}\s){4}/', $ccn);
$isCcedError = $isPost && !preg_match('/((0[1-9])|([1-2][0-9])|(3[0-1]))[.](([0][1-9])|([0][1-9])|(1[0-2]))[.]((19[2-9][0-9])|(20[0-9][0-9]))/', $cced);
$isMsError = $isPost && !preg_match('/uzs\s(\d{3}|.)+/i', $ms);
$isUrlError = $isPost && !preg_match('/(http|https)\:\/\/\w+.+\w+/i', $url);
$isGpaError = $isPost && !preg_match('/^(?:[0-3](?:\.[0-9]+)?|4(?:\.[0-4][0-9]*)?|4\.50*|-[0-9]+(?:\.[0-9]+)?)$/', $gpa);

$isFormError = $isNameError || $isEmailError || $isUsernameError || $isPasswordError || $isDobError || $isGenderError || $isMsError || $isPcError || $isHpError || $isMpError || $isCcnError || $isCcedError ||$isMsError || $isUrlError || $isGpaError;
//echo $city." ".$state." ".$zip;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Validating Forms</title>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style media="screen">
    .error {
        color: red;
    }
    </style>
</head>

<body>
    <?php if($isGet || $isFormError) { ?>
    <h1>Registration Form</h1>

    <p>
        This form validates user input and then displays "Thank You" page.
    </p>

    <hr />

    <h2>Please, fill below fields correctly</h2>
    <form action="index.php" method="post">
        <dl>
            <dt>Name <span class="error"><?= $isNameError?"Please, enter at least 2 characters":"" ?></span> </dt>
            <dd>
                <input type="text" name="name" value="<?= $name ?>">
            </dd>

            <dt>Email <span class="error"><?= $isEmailError?"Please, submit correctly":"" ?></span> </dt>
            <dd>
                <input type="email" name="email" value="<?= $email ?>">
            </dd>

            <dt>Username <span class="error"><?= $isUsernameError?"Please, enter at least 5 characters":"" ?></span>
            </dt>
            <dd>
                <input type="text" name="username" value="<?= $username ?>">
            </dd>

            <dt>Password <span class="error"><?= $isPasswordError?"Please, enter at least 8 characters":"" ?></span>
            </dt>
            <dd>
                <input type="password" name="password" value="<?= $password ?>">
            </dd>

            <dt>Date of birth <span
                    class="error"><?= $isDobError?"It should be written in dd.MM.yyyy format. For ex, 07.03.2019":"" ?></span>
            </dt>
            <dd>
                <input type="number" name="dob" value="<?= $dob ?>">
            </dd>

            <dt>Gender <span class="error"><?= $isGenderError?"It should be Male or Female.":"" ?></span> </dt>
            <dd>
                <input type="text" name="gender" value="<?= $gender ?>">
            </dd>

            <dt>Marital status <span
                    class="error"><?= $isMsError?"Please write your marital status correctly":"" ?></span> </dt>
            <dd>
                <input type="text" name="ms" value="<?= $ms ?>">
            </dd>

            <dt>Address</dt>
            <dd>
                <input type="text" name="address" value="<?= $address ?>" required>
            </dd>

            <dt>City</dt>
            <dd>
                <input type="text" name="city" value="<?= $city ?>" required>
            </dd>

            <dt>Postal Code <span
                    class="error"><?= $isPcError?"Please write your postal code correctly For ex, 100011":"" ?></span>
            </dt>
            <dd>
                <input type="number" name="pc" value="<?= $pc ?>">
            </dd>

            <dt>Home Phone <span
                    class="error"><?= $isHpError?"Please write your Home phone number correctly For ex, 97 1234567":"" ?></span>
            </dt>
            <dd>
                <input type="number" name="hp" value="<?= $hp ?>">
            </dd>

            <dt>Mobile Phone <span
                    class="error"><?= $isMpError?"Please write your Mobile Phone number correctly For ex, 97 1234567":"" ?></span>
            </dt>
            <dd>
                <input type="number" name="mp" value="<?= $mp ?>">
            </dd>

            <dt>Credit Card Number <span
                    class="error"><?= $isCcnError?"Please write your Credit Card Number correctly  For ex, 1234 1234 1234 1234":"" ?></span>
            </dt>
            <dd>
                <input type="number" name="ccn" value="<?= $ccn ?>">
            </dd>

            <dt>Credit Card Expiry Date <span
                    class="error"><?= $isCcedError?"It should be written in dd.MM.yyyy format. For ex, 07.03.2019":"" ?></span>
            </dt>
            <dd>
                <input type="number" name="cced" value="<?= $cced ?>">
            </dd>

            <dt>Monthly Salary <span class="error"><?= $isMsError?"It should be written in following format UZS 200,000.00":"" ?></span> </dt>
            <dd>
                <input type="text" name="ms" value="<?= $ms ?>">
            </dd>

            <dt>URL <span class="error"><?= $isUrlError?" It should match URL format. For ex, http://github.com":"" ?></span> </dt>
            <dd>
                <input type="url" name="url" value="<?= $url ?>">
            </dd>

            <dt>Gpa <span class="error"><?= $isGpaError?" I It should be a floating point number less than 4.5":"" ?></span> </dt>
            <dd>
                <input type="number" name="gpa" value="<?= $gpa ?>">
            </dd>
            <!-- Write other fiels similar to Name as specified in lab6.pdf -->
        </dl>
        <div>
            <input type="submit" value="Register">
        </div>
    </form>
    <?php } else { ?>
    <h1>Thank you for your submission. You city is <?=  $city ?>!</h1>
    <?php } ?>
</body>

</html>
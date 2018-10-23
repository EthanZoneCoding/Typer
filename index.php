<!DOCTYPE html>
<html>
<body>
    <?php
        $users = array()
        $passwords = array()
        $user = $_POST["username"];
        $pwd = md5 ($_POST["password"]);
        $uval = strpos(users, user);
        $pval = strpos(passwords, pwd);
        if ($uval !== "False" | pval !== "False") {
            print(User Correct!)
        }
    ?>
</body>
</html>

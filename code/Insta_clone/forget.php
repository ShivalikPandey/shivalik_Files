
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<div id="body">
        <form id="form" action='fornum.php' method='post'>
            <label id="label">Username</label>
          <input type="text" class="details" name="name" minlength=5>
          <div>
             <input type="submit"  value="Next" class="buttoncl" id="button">
          </div>
        </form>
    </div>
   
</body>
</html>
<!--
    http://localhost/insta/login.php

    INSERT INTO `instatab` (`s.no`, `name`, `password`, `number`, `dob`, `email`, `datetime`) VALUES (NULL, 'shourav', '9411837404', '8266808125', '2003-11-15', 'shouravshivalik@gmail.com', current_timestamp());
-->
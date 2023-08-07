<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books World | Registration form</title>
    <link rel="stylesheet" href="style.css"> 
      
</head>

<body>
    <div class="navbar">
          <div class="first"> 
            <h1>Books World | Login form</h1>
          </div>

          <div class="form">
           <form class="form" action="includes/login.inc.php" method="post">
            <label class="form_label">&nbsp&nbspEmail</label>
            <input required type="Email" class="form_inputs" placeholder="Type email address here" name="email"  id="email"/>
            <label class="form_label">&nbsp&nbspPassword</label>
            <input required type="password" placeholder="Type password here" class="form_inputs" name="password" id="password"/>
            <button type="submit" class="center">Login</button>
            <a class="form_a" href="signup.php"><br>New to here? Register</a></form>


          </div>

      
    </div>  
</body>
</html>

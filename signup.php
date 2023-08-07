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
            <h1>Books World | Registration form</h1>
          </div>

          <div class="form">
          <form class="form" action="includes/signup.inc.php" method="post">
            <label class="form_label">&nbsp&nbspEmail</label>
            <input required type="Email" class="form_inputs" placeholder="Type email address here" name="email"  id="email"/>
            <label class="form_label">&nbsp&nbspFirst Name</label>
            <input required type="First" class="form_inputs" placeholder="Type first name here" name="fname"  id="fname"/>
            <label class="form_label">&nbsp&nbspLast Name</label>
            <input required type="Last" class="form_inputs" placeholder="Type last name here" name="lname"  id="lname"/>
            <label  class="form_label">&nbsp&nbspPassword</label>
            <input required type="password" placeholder="Type password here" class="form_inputs" name="password" id="password"/>
            <label class="form_label">&nbsp&nbspRepeat Password</label>
            <input required type="password" placeholder="Type password here" class="form_inputs" name="passwordr" id="passwordr"/>
            <button type="submit" name="submit" class="center">Register</button><br>
            <a class="form_a" href="home.php">Go back to login</a></form>


          </div>

      
    </div>  
</body>
</html>

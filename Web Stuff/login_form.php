<?php include 'header.php'; ?>

    <body>
    
        <div id="top">
            <div id="title"></div>
            <ul id="navigation">
              <li><a href="#" class="menu1"><span></span></a></li>
              <li><a href="#" class="menu2"><span></span></a></li>
            </ul>
            <ul id="register">
              <li><a href="register_form.php" class="register"><span></span></a></li>
              <li><a href="login_form.php" class="login"><span></span></a></li>
            </ul>
        </div>
        
        <div id="left"></div>
        
        <div id="content">
            <p><b>Login:</b></p>
            <form action="login.php" method="post">
                Your Username:<br>
                <input type="text" size="24" maxlength="50"
                name="username"><br>    
                Your Password:<br>
                <input type="password" size="24" maxlength="50"
                name="password"><br><br>
                
                <input type="submit" value="Login">
            </form>
        </div>
        
<?php include 'footer.php'; ?>

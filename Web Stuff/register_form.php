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
            <p><b>Register:</b></p> 
            <fieldset>      
                <form name="register" action="register.php" method="post">
                    <ul>
                        <li> <label for="username">User Name</label>
                        <input type="text" name="username" id="username" size="30" />
                        </li>
                        <li> <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" size="30" />
                        </li>
                        <li> <label for="password">Password</label>
                        <input type="password" name="password" id="password" size="30" />
                        </li>
                        <li> <label for="password2">Repeat Password</label>
                        <input type="password" name="password2" id="password2" size="30" />
                        </li>
                        <li> <label for="phone">Telephone Number</label>
                        <input type="text" name="phone" id="phone" size="30" />
                        </li>                        
                        <li><label for="submit"></label>
                        <button type="submit" id="submit">Submit</button></li>
                    <ul>
                </form>
            </fieldset>
        
        </div>

<?php include 'footer.php'; ?>

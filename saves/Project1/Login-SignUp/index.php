<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign Up</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link rel="stylesheet" type="text/css" href="css/style.css"> 
       
    </head>
    <body id="body">

    <div class="cube">
      <div class="top"></div>
        <div>
          <span style="--i:0;"></span>
          <span style="--i:1;"></span>
          <span style="--i:2;"></span>
          <span style="--i:3;"></span>
        </div>
      </div> 

        <form id="myform" class="shadow w-450 p-3" 
                  action="php/signup.php" 
                  method="post"
                  >

                <center><img src="../front/images/YIBS logo.png" alt=""></center><br>
                <?php if(isset($_GET['error'])){ ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_GET['error']; ?>
                </div>
                <?php } ?>

                <?php if(isset($_GET['success'])){ ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $_GET['success']; ?>
                </div>
                <?php } ?>
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" 
                           class="form-control"
                           name="fname"
                           value="<?php echo (isset($_GET['fname']))? $_GET['fname']:
                               ""; ?>">
                </div> 

                

                <div class="mb-3">
                    <label class="form-label">User Name</label>
                    <input type="text"
                           class="form-control"
                           name="USERNAME"
                           value="<?php echo (isset($_GET['USERNAME']))? $_GET['USERNAME']:
                               ""; ?>">
                </div>   

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password"
                           class="form-control"
                           name="PASSWORD">
                </div> 
                <button type="submit" class="btn btn-primary">SignUp</button>
                <a href="login.php" class="link-alert-secondary">Login</a>
            </form> 
            <div class="cube">
              <div class="top"></div>
          <div>
            <span style="--i:0;"></span>
            <span style="--i:1;"></span>
            <span style="--i:2;"></span>
            <span style="--i:3;"></span>
          </div>
        </div>      
    </body>   
</html>         

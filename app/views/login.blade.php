<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?=$title_page;?></title>

    <link rel="canonical" href="<?=$actual_link;?>">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">

        <form class="form-signin" action="/login.php">
      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">

      <h1 class="h3 mb-3 font-weight-normal">Please, SIGN IN</h1>

      <?php if(!empty($routes[3]) && !empty($routes[4]) && $routes[3] == 'error'): ?>
        <?php switch ($routes[4]) {
          case 1:
           ?>
            <div class="alert alert-danger" role="alert">
                Email and  password combination is incorrect!
            </div>
            <?php
            break;
          
          case 2:
           ?>
            <div class="alert alert-danger" role="alert">
                Email is not found in our database
            </div>
            <?php
            break;
           case 3:
           ?>
            <div class="alert alert-danger" role="alert">
                Email is not valid! 
            </div>
            <?php
            break;
          
        } ?>
      <?php endif; ?>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input name="do" value="authorize" style="display:none;">
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label> 

      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-info btn-block" type="submit">Sign in</button>

      <br>  

      <p>You still don't have an account??? </p>
      <a href="<?=APP_BASE_URL;?>account/registration" class="btn btn-lg btn-success btn-block">SIGN UP</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>
<?php //echo validation_errors(); ?>
    <div class="container">
      <form action="" method="POST" role="form" name="login-form" class="form-signin">
       <legend>Please Sign in</legend>   
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="signin-mail" name="signin-mail"  placeholder="Email address" value="<?php echo set_value('signin-mail')?>"/>
            <?php echo form_error('signin-mail'); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="signin-pass" name="signin-pass" placeholder="Password">
            <?php echo form_error('signin-pass'); ?>
        </div>
        <?php if(isset($error_message)) { echo $error_message; } ?>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me" /> Remember me
          </label>
        </div>
        <input type="hidden" name="form-name" id="input" class="form-control" value="login-form">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
            
    </div> <!-- /container -->




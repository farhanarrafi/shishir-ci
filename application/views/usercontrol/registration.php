<?php //echo validation_errors(); ?>
    <div class="container">
<?php /*echo site_url('usercontrol');*/?>
        <form action="" method="POST" role="form" name="reg-form" class="form-signin">
            <legend>Please Enter Details to Register</legend>
            
<?php if(isset($error_message)) {echo '<div class="form-group">'.$error_message.'</div>';} ?>
            <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" class="form-control" id="first-name" name="first-name" placeholder="enter first name" value="<?php echo set_value('first-name');?>">
                <?php echo form_error('first-name'); ?>
            </div>
            <div class="form-group">
                <label for="last-name">last Name</label> 
                <input type="text" class="form-control" id="last-name" name="last-name" placeholder="enter last name" value="<?php echo set_value('last-name');?>">
                <?php echo form_error('last-name'); ?>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo set_value('email');?>">
                <?php echo form_error('email'); ?>
                <?php if(isset($error_message_email)) { echo $error_message_email;} ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <?php echo form_error('password'); ?>
            </div>
            <input type="hidden" name="form-name" id="input" class="form-control" value="registration-form">
            <button type="submit" class="btn btn-lg btn-primary btn-block">Submit</button>
        
        </form>

    </div> <!-- /container -->


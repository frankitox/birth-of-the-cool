<div id="user-login-block-container">
  <div id="user-login-block-form-fields">
    <h2>Login</h2>
    <?php 
      # Display username field.
      print $name;
      # Display password field.
      print $pass;
      # Display submit button.
      print $submit;
      # Display hidden elements (required for
      # successful login).
      print $rendered;
    ?>
  </div>
</div>

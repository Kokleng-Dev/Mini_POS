 <?php if(isset($_SESSION['sms']) && !empty($_SESSION['sms'])){ ?>

    <div class="alert <?php echo $_SESSION['sms']['status'] == 'error' ? 'alert-danger': 'alert-success' ?> alert-dismissible fade show" role="alert"><?php echo $_SESSION['sms']['message']; ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <?php unset($_SESSION['sms']); ?>

  <?php } ?>

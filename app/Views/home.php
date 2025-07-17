<h1>Hello home page</h1>

<?php include __DIR__ . "/layouts/alert.php" ?>


This is from user : <?php echo $_SESSION['auth']->name?>


<a href="/auth/logout">Logout</a>

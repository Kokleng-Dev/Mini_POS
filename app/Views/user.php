<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
</head>
<body>
  <table border="1">
    <?php foreach($users as $index => $user){ ?>
        <tr>
          <td><?php echo $user['name']; ?></td>
        </tr>
    <?php } ?>
  </table>
</body>
</html>

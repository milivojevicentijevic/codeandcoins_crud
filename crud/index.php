<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <div class="container mt-2 mb-4 p-2 shadow bg-white">
        <form action="crudQuery.php" method="POST">
            <div class="row justify-content-center">
                <div class="col">
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="col">
                    <button type="submit" name="save" class="btn btn-info">Save</button>
                </div>
            </div>
        </form>
    </div>

    <?php require_once("crudQuery.php"); ?>

    <div class="container">
      <?php if(isset($_SESSION['msg'])): ?>
        <div class="<?php echo $_SESSION['alert']; ?>">
          <?php echo $_SESSION['msg']; ?>
        </div>
      <?php endif; ?>
      <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>User Name</th>
            <th>Password</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <form action="crudQuery.php" method="POST">
            <?php 
              // code to display user's data
              $select_query = "SELECT * FROM account LIMIT 20";
              $result = $conn->query($select_query);

              $x = 1;

              // code for edit button
              while($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $row['id'] ?></td>
                  <td><?php echo $row['username'] ?></td>
                  <td><?php echo $row['password'] ?></td>
                  <td>
                    <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $row['id']; ?>">Delete</button>
                    <button class="btn btn-primary" type="button" name="edit" value="">Edit</button>
                  </td>
                </tr>
              <?php endwhile; ?>
            </form>
        </tbody>
      </table>
    </div>

      
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        setTimeout(function() {
          $(".alert").remove();
        }, 2000);
      })
    </script>
  </body>
</html>
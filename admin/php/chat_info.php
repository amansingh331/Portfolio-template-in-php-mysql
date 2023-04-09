   <h2>User chat info</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Email</th>
              <th>chat user id</th>
              <th>chat file name</th>
              <th>chat ready</th>
              <th>date</th>
              <th>user ip address</th>
              <th>user browser</th>
            </tr>
          </thead>
          <tbody>
            
             <?php
    $query="SELECT * FROM chat_info ORDER BY chat_id DESC";
      $queryrun=mysqli_query($db,$query);
      $count=0;
      while($data=mysqli_fetch_array($queryrun)){
          ?>
          <tr>
          <td>#<?=$count+1?></td>
              <td><?=$data['chat_user_email']?></td>
              <td><?=$data['chat_user_id']?></td>
              <td><?=$data['chat_file_name']?></td>
              <td><?=$data['chat_ready']?></td>
              <td><?=$data['date']?></td>
              <td><?=$data['user_ip_address']?></td>
              <td><?=$data['user_browser']?></td>
            </tr>
          <?php
              $count++;
      }
      if($count==0){ ?>
          <td colspan="5" align="center"> Currenty There Is No Messages or Queries !</td>
      <?php }
        ?>
              
          </tbody>
        </table>
      </div>
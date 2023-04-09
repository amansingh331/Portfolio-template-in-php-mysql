   <h2>User Messages & Querys</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Subject</th>
              <th>Email</th>
              <th>Message</th>
              <th>Date</th>
              <th>ip_info</th>
              <th>browser</th>
            </tr>
          </thead>
          <tbody>
            
             <?php
    $query="SELECT * FROM contact ORDER BY id DESC";
      $queryrun=mysqli_query($db,$query);
      $count=0;
      while($data=mysqli_fetch_array($queryrun)){
          ?>
          <tr>
          <td>#<?=$count+1?></td>
              <td><?=$data['cname']?></td>
              <td><?=$data['csubject']?></td>
              <td><?=$data['cemail']?></td>
              <td><?=$data['cmessage']?></td>
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
<h2>User ip info</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>page_url</th>
              <th>referrer_url</th>
              <th>user_ip</th>
              <th>user_browser</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
            
             <?php
    $query="SELECT * FROM visitor_logs ORDER BY id DESC";
      $queryrun=mysqli_query($db,$query);
      $count=0;
      while($data=mysqli_fetch_array($queryrun)){
          ?>
          <tr>
          <td>#<?=$count+1?></td>
              <td><?=$data['page_url']?></td>
              <td><?=$data['referrer_url']?></td>
              <td><?=$data['user_ip_address']?></td>
              <td><?=$data['user_agent']?></td>
              <td><?=$data['created']?></td>
            </tr>
          <?php
              $count++;
      }
      if($count==0){ ?>
          <td colspan="5" align="center"> Currenty There Is No visitor logs !</td>
      <?php }
        ?>
              
          </tbody>
        </table>
      </div>
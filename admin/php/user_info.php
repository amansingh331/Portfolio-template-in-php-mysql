<h2>Edit user info Section</h2>
         <?php
         if(isset($_GET['msg'])){
             
  if($_GET['msg']=='updated'){
      ?>
      <div class="alert alert-success text-center" role="alert">
  Blog Successfully Added !
</div>
      <?php
  }  
  if($_GET['msg']=='error'){
      ?>
      <div class="alert alert-danger text-center" role="alert">
  something wrong with your image please check type or size !
</div>
      <?php
  } } 
?>  

<div class="table-responsive">
<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>name</th>
              <th>email</th>
              <th>password</th>
              <th>image</th>
              <th>code</th>
              <th>status</th>
              <th>chat_ready</th>
              <th>chat_table_name</th>
              <th>chat_user2</th>
              <th>create_date</th>
              <th>update_time</th>
              <th>user_ip_address</th>
              <th>user_browser</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         <?php
$query2="SELECT * FROM usertable";
$queryrun2=mysqli_query($db,$query2);
$count=1;         
while($data2=mysqli_fetch_array($queryrun2)){
    ?>
     <tr>
         <div class="modal fade" id="modal<?=$data2['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit about</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="php/uuser_info.php" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?=$data2['id']?>">
          <div class="form-row">
          <div class="form-group col-md-12">
          <img src="../../login/images/<?=$data2['image']?>" class="oo img-thumbnail">
  </div>
  <div class="form-group col-md-6">
  <label>blog image</label>
  <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="profilepic">
    <label class="custom-file-label" for="image">Choose Pic...</label>
  </div></div>
  
   <div class="form-group col-md-6 mt-auto">
      <label for="name">name</label>
      <input type="name" name="name" value="<?=$data2['name']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">email</label>
      <input type="name" name="email" value="<?=$data2['email']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">password</label>
      <input type="name" name="password" value="<?=$data2['password']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">code</label>
      <input type="name" name="code" value="<?=$data2['code']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">status</label>
      <input type="name" name="status" value="<?=$data2['status']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">chat_ready</label>
      <input type="name" name="chat_ready" value="<?=$data2['chat_ready']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">chat_table_name</label>
      <input type="name" name="chat_table_name" value="<?=$data2['chat_table_name']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">chat_user2</label>
      <input type="name" name="chat_user2" value="<?=$data2['chat_user2']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">create_date</label>
      <input type="name" name="create_date" value="<?=$data2['create_date']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">update_time</label>
      <input type="name" name="update_time" value="<?=$data2['update_time']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">user_ip_address</label>
      <input type="name" name="user_ip_address" value="<?=$data2['user_ip_address']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">user_browser</label>
      <input type="name" name="user_browser" value="<?=$data2['user_browser']?>" class="form-control" id="name" placeholder="">
    </div>
    <!-- <div class="form-group col-md-12">
      <label for="email">content</label>
      <input type="text" name="content" value="=$data2['content']" class="form-control" id="email" placeholder="">
    </div>
    <div class="form-group col-md-12">
      <label for="email">post quotes</label>
      <input type="text" name="post_quotes" value="=$data2['post_quotes']" class="form-control" id="email" placeholder="">
    </div> -->

      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="pupdate" value="Update">
          </form>
      </div>
    </div>
  </div>
</div>   
         <td>#<?=$count?></td>
         <td><?=$data2['name']?></td>
         <td><?=$data2['email']?></td>
         <td><?=$data2['password']?></td>
         <td><img src="../../login/images/<?=$data2['image']?>" class="oo img-thumbnail"></td>
         <td><?=$data2['code']?></td>
         <td><?=$data2['status']?></td>
         <td><?=$data2['chat_ready']?></td>
         <td><?=$data2['chat_table_name']?></td>
         <td><?=$data2['chat_user2']?></td>
         <td><?=$data2['create_date']?></td>
         <td><?=$data2['update_time']?></td>
         <td><?=$data2['user_ip_address']?></td>
         <td><?=$data2['user_browser']?></td>
         <td>

         
         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?=$data2['id']?>">
  Edit
</button> <a href="php/uuser_info.php?del=<?=$data2['id']?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
  Delete
             </button></a></td>
            </tr>            
         <?php $count++;
} ?>
             </tbody></table>  
</div>
 <h2>Edit comment Section</h2>
         <?php
         if(isset($_GET['msg'])){
             
  if($_GET['msg']=='updated'){
      ?>
      <div class="alert alert-success text-center" role="alert">
  Project Successfully Added !
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



<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>comment Name</th>
              <th>comment email</th>
              <th>comment</th>
              <th>comment post id</th>
              <th>comment date</th>
              <th>comment user ip address</th>
              <th>comment user browser</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         <?php
$query2="SELECT * FROM blog_comment";
$queryrun2=mysqli_query($db,$query2);
$count=1;         
while($data2=mysqli_fetch_array($queryrun2)){
    ?>
     <tr>
         <div class="modal fade" id="modal<?=$data2['comment_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit comment</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="php/ucomment.php" enctype="multipart/form-data">
          <input type="hidden" name="comment_id" value="<?=$data2['comment_id']?>">
  <div class="form-row">

  
    <div class="form-group col-md-6 mt-auto">
      <label for="name">comment Name</label>
      <input type="name" name="comment_name" value="<?=$data2['comment_name']?>" class="form-control" id="name" placeholder="ToDo List Maker">
    </div>
    <div class="form-group col-md-12">
      <label for="email">comment email</label>
      <input type="text" name="comment_email" value="<?=$data2['comment_email']?>" class="form-control" id="email" placeholder="https://whomonugiri.github.io/todo-list-maker/">
    </div>
    <div class="form-group col-md-12">
      <label for="email">comment blog post id</label>
      <input type="text" name="comment_blog_post_id" value="<?=$data2['comment_blog_post_id']?>" class="form-control" id="email" placeholder="https://whomonugiri.github.io/todo-list-maker/">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">comment</label>
      <input type="name" name="comment" value="<?=$data2['comment']?>" class="form-control" id="name" placeholder="ToDo List Maker">
    </div>

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
         <td><?=$data2['comment_name']?></td>
         <td><?=$data2['comment_email']?></td>
         <td><?=$data2['comment']?></td>
         <td><?=$data2['comment_blog_post_id']?></td>
         <td><?=$data2['comment_date']?></td>
         <td><?=$data2['user_ip_address']?></td>
         <td><?=$data2['user_browser']?></td>
         
        <td> <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?=$data2['comment_id']?>">
  Edit
</button> <a href="php/ucomment.php?del=<?=$data2['comment_id']?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
  Delete
             </button></a></td>
            </tr>            
         <?php $count++;
} ?>
             </tbody></table>  
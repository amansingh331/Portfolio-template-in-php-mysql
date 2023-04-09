<h2>Edit Blog Section</h2>
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
         <form method="post" action="php/ublog.php" enctype="multipart/form-data">
  <div class="form-row">
  <div class="form-group col-md-6">
  <label>blog image (Minimum 600px X 600px, Maxsize 2mb)</label>
  <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="profilepic">
    <label class="custom-file-label" for="image">Choose Pic...</label>
  </div></div>
  
   <div class="form-group col-md-6 mt-auto">
      <label for="name">Cateogry</label>
      <input type="name" name="category" class="form-control" id="name" placeholder="category">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">tag</label>
      <input type="name" name="tag" class="form-control" id="name" placeholder="tag">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">author</label>
      <input type="name" name="author" class="form-control" id="name" placeholder="author">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">heading</label>
      <input type="name" name="heading" class="form-control" id="name" placeholder="heading">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">blog page link</label>
      <input type="name" name="blog_page" class="form-control" id="name" placeholder="blog page link">
    </div>
    <div class="form-group col-md-12">
      <label for="exampleFormControlTextarea1">content</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="content" placeholder="content here">
      </textarea>
    </div> 
    <div class="form-group col-md-12">
      <label for="email">post quotes</label>
      <input type="text" name="post_quotes" class="form-control" id="email" placeholder="Enter the project quotes here">
    </div>
    <div class="form-group col-md-2 ml-auto">
        <input type="submit" name="addtoblog" class="btn btn-primary" value="Add To Blog">
    </div>
  
</form>
<div class="table-responsive">
<table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>category</th>
              <th>tag</th>
              <th>author</th>
              <th>heading</th>
              <th>content</th>
              <th>image</th>
              <th>post quotes</th>
              <th>date</th>
              <th>blog page link</th>
              <th>post view count</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         <?php
$query2="SELECT * FROM blog";
$queryrun2=mysqli_query($db,$query2);
$count=1;         
while($data2=mysqli_fetch_array($queryrun2)){
    ?>
     <tr>
         <div class="modal fade" id="modal<?=$data2['blog_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit about</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="php/ublog.php" enctype="multipart/form-data">
          <input type="hidden" name="blog_id" value="<?=$data2['blog_id']?>">
          <div class="form-row">
          <div class="form-group col-md-12">
          <img src="../../blog/image/<?=$data2['image']?>" class="oo img-thumbnail">
  </div>
  <div class="form-group col-md-6">
  <label>blog image</label>
  <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="profilepic">
    <label class="custom-file-label" for="image">Choose Pic...</label>
  </div></div>
  
   <div class="form-group col-md-6 mt-auto">
      <label for="name">category</label>
      <input type="name" name="category" value="<?=$data2['category']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">tag</label>
      <input type="name" name="tag" value="<?=$data2['tag']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">author</label>
      <input type="name" name="author" value="<?=$data2['author']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">heading</label>
      <input type="name" name="heading" value="<?=$data2['heading']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">date</label>
      <input type="name" name="date" value="<?=$data2['date']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">blog page link</label>
      <input type="name" name="blog_page" value="<?=$data2['blog_page']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-6 mt-auto">
      <label for="name">view count</label>
      <input type="name" name="post_view_count" value="<?=$data2['post_view_count']?>" class="form-control" id="name" placeholder="">
    </div>
    <div class="form-group col-md-12">
      <label for="email">content</label>
      <input type="text" name="content" value="<?=$data2['content']?>" class="form-control" id="email" placeholder="">
    </div>
    <div class="form-group col-md-12">
      <label for="email">post quotes</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="post_quotes" placeholder="Thank you for reading this post if you get help then comment your opinion in the comment box and also if you getting any problem send the message by <a href='https://google.com'>clicking the link</a> or comment here.    "><?=$data2['post_quotes'];?>
    </textarea>
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
         <td><?=$data2['category']?></td>
         <td><?=$data2['tag']?></td>
         <td><?=$data2['author']?></td>
         <td><?=$data2['heading']?></td>
         <td><?=$data2['content']?></td>
         <td><img src="../blog/image/<?=$data2['image']?>" class="oo img-thumbnail"></td>
         <td><?=$data2['post_quotes']?></td>
         <td><?=$data2['date']?></td>
         <td><?=$data2['blog_page']?></td>
         <td><?=$data2['post_view_count']?></td>
         <td>

         
         <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal<?=$data2['blog_id']?>">
  Edit
</button> <a href="php/ublog.php?del=<?=$data2['blog_id']?>"><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
  Delete
             </button></a></td>
            </tr>            
         <?php $count++;
} ?>
             </tbody></table>  
</div>
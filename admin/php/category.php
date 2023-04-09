<h2>Edit category Section</h2>
        <?php
         if(isset($_GET['msg'])){
             
  if($_GET['msg']=='updated'){
      ?>
      <div class="alert alert-success text-center" role="alert">
  Successfully Updated !
</div>
      <?php
  }  
 } 
?> 

         <hr>
         <h4 ID="skillsection">category</h4>
         
         <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
         <?php
$query2="SELECT * FROM blog_categories";
$queryrun2=mysqli_query($db,$query2);
$count=1;         
while($data2=mysqli_fetch_array($queryrun2)){
    ?>
     <tr>
         <div class="modal fade" id="modal<?=$data2['blog_categories_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="exampleModalLabel">Edit Skill</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="skilleditbox">
       <form method="post" action="php/ucategory.php">
       <input type="hidden" name="blog_categories_id" value="<?=$data2['blog_categories_id']?>">
        <div class="form-row">
            <div class="form-group col-md-6">
    <label for="website">categories</label>
    <input type="text" name="blog_categories_name" value="<?=$data2['blog_categories_name']?>" class="form-control" id="website" placeholder="PHP">
  </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="supdate" value="Update">
          </form>
      </div>
    </div>
  </div>
</div>   
          <td>#<?=$count?></td>
              <td><?=$data2['blog_categories_name']?></td>
         <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?=$data2['blog_categories_id']?>">
  Edit
</button> <a href="php/ucategory.php?del=<?=$data2['blog_categories_id']?>"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
  Delete
             </button></a></td>
            </tr>            
         <?php $count++;
} ?>
             </tbody></table>
             <form action="php/ucategory.php" method="post">
                 <div class="form-row">
                     <div class="form-group col-md-5">
    <label for="sn">category name</label>
    <input type="text" name="blog_categories_name" class="form-control" id="website" placeholder="Category name here" required>
  </div>
   <div class="form-group col-md-2">
     <label class="text-white">submit</label>
      <input type="submit" name="addskill" class="btn btn-primary form-control" value="Add category"> 
   </div>
                
                 </div>
             </form>
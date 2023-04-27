<?php  

 require 'handler.php';  
 
 ?> 
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title></title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  <br /><br />  
           <div class="container" style="width:700px;">  
                <form method="post">  
                     <?php  
                     if(isset($_GET["edit"]))  
                     {  
                          if(isset($_GET["email"]))  
                          {  
                               $where = array(  
                                    'email'     =>     $_GET["email"]  
                               );  
                               $single_data = $data->select_where("table", $where);  
                               foreach($single_data as $post)  
                               {  
                     ?>  
      <label>email</label>  
                          <input type="text" name="email" value="<?php echo $post["email"]; ?>" class="form-control" />  
                          <br />  
                          <label>name</label>  
                          <textarea name="name" class="form-control"><?php echo $post["name"]; ?></textarea>  
                          <br />  
                          <label>address</label>  
                          <textarea name="address" class="form-control"><?php echo $post["address"]; ?></textarea>  
                          <br />  
                          <label>username</label>  
                          <textarea name="username" class="form-control"><?php echo $post["username"]; ?></textarea>  
                          <br />  
                          
                          <input type="hidden" name="email" value="<?php echo $post["email"]; ?>" />  
                          <input type="submit" name="edit" class="btn btn-info" value="Edit" />  
                     <?php  
                               }  
                          }  
                     }  
                     else  
                     {  
                     ?>
            
                     <label>name</label>  
                     <input type="text" name="name" class="form-control" />  
                     <br />  
                     <label>email</label>  
                     <textarea name="email" class="form-control"></textarea>  
                     <br />  
                     <br />  
                     <label>address</label>  
                     <textarea name="address" class="form-control"></textarea>  
                     <br />  
                     <br />  
                     <label>username</label>  
                     <textarea name="username" class="form-control"></textarea>  
                     <br />  
                     <input type="submit" name="submit" class="btn btn-info" value="Submit" />  
                     <span class="text-success">  
                     <?php  }
                     if(isset($success_message))  
                     {  
                          echo $success_message;  
                     }  
                     ?>  
                     </span>  
                </form>  
           </div> 
           <br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <td width="20%">name</td>  
                               <td width="20%">email</td>  
                               <td width="20%">address</td>  
                               <td width="20%">username</td>  
                               <td width="10%">Edit</td>  
                               <td width="10%">Delete</td> 
                          </tr>  
                          <?php  
                          $post_data = $data->select('table');  
                          foreach($post_data as $post)  
                          {  
                          ?>  
                          <tr>  
                               <td><?php echo $post["email"]; ?></td>  
                               <td><?php echo $post["username"]; ?></td>  
                               <td><?php echo $post["name"]; ?></td>  
                               <td><?php echo $post["address"]; ?></td> 
                               <td><a href="index.php?edit=1&email=<?php echo $post["email"]; ?>">Edit</a></td>  
                               <td><a href="#" id="<?php echo $post["email"]; ?>" class="delete">Delete</a></td>   
                               
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('.delete').click(function(){  
           var email = $(this).attr("id");  
           if(confirm("Are you sure you want to delete this post?"))  
           {  
                window.location = "index.php?delete=1&email="+email+"";  
           }  
           else  
           {  
                return false;  
           }  
      });  
 });  
 </script>  
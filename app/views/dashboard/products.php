<?php 

require_once"includes/header.php";
require_once"includes/sidebar.php";
require_once"includes/navbar.php";

?>

<style>
    img{
        width: 80px;
    }
</style>
               

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div> 



















<!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Products</h1>
                    <p class="mb-4 product_result" >

                    <div id='close_icon2' style="display: none;" class='alert alert-danger' style='color:black;'><span style='color:red;font-weight:bold;'>'Result'</span>
                 : Added<strong> <span class='num_request'>New Product</span></strong>   successfully <i class='fa fa-check-circle fa-lg' aria-hidden='true'></i> <span style="font-size:11px ;color:#072bf2;">[this message disapper after 5 sec]</span>
                 <span id='close_icon' style='float:right;margin-top: -4px;'><i class='fa fa-window-close fa-2x' aria-hidden='true'></i></span></div>

                            </p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">

                                                <!-- Button trigger modal -->
                                          
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
Add New Product 
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


       <!-- Add new Product FORM ################################################################################################ -->
       <div class="container ">
        <h2>Add Products Form </h2>

        <form class="AddProduct">
            <!-- NAME -->
            <div class="form-group">
            <label for="name" class="text-secondary">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
            <div class="errname" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>


            <!-- Price -->
            <div class="form-group">
            <label for="price"   class="text-secondary">Price:</label>
            <input type="text" class="form-control" id="price" placeholder="Enter Price" name="price">
            <div class="errprice" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>
 
            <!-- Image -->
            <div class="form-group">
            <label for=""  class="text-secondary">Image:</label>
            <input type="file" class="form-control" id="img"  name="image" >
            <div class="errimg" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>
     
            <!-- Category -->
            <div class="form-group">
            <label for="category"  class="text-secondary">Category:</label>
            <select name="category" id="category" class="form-control">
                <option value="0" id="myoption">Choose Category</option>
              <?php foreach($category as $cat){ ?>  
                <option value="<?= $cat['id'];?>"><?= $cat['name']; ?></option>
              <?php } ?>  
            </select>
            <div class="errcategory" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>

            <!-- Description -->
            <div class="form-group">
            <label for="description"  class="text-secondary">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            <div class="errdes" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>

   
            <input type="submit" class="btn btn-primary form-control" id="btn_close"  value="Add Product">
     
                    
        </form>
        </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style =" padding: 6px; margin: 12px;" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                            </h6>
                        </div>

                        <div class="res66"></div>
                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody class="result_tr">
                                       <?php
                                       $id = 1 ;
                                        foreach ($data as $product) {
                                            ?> 
                                        <tr>
                                            <td><?= $product['id'];?></td>
                                            <td><?= $product['name'];?></td>
                                            <td><?= $product['price'];?></td>
                                            <td><?php  $src = $product['img'];
                                            ?>
                                            <img src="<?= DOMAIN_NAME;?>images/<?= $src;?>" alt="">    
                                        </td>
                                            <td><?php $cate_name =  $product['category'];
                                                      if($cate_name == 1){echo"mobile";}elseif($cate_name == 2){echo"clothes";}else{echo"accessories";}
                                            ?></td>
                                            <td><?= $product['description'];?></td>

                                            <td><?= $product['stars'];?></td>
                                            <td>
                                                <!-- EDit BUTTON -->
                                                <!-- Button trigger modal -->
                                      
<a type="button" data-id ="<?=$product['id'];?>"  class="btn btn-primary edit_button" data-toggle="modal" data-target="#exampleModaledit<?= $product['id'];?>">
Edit
</a>



<!-- Modal -->
<div class="modal fade" id="exampleModaledit<?= $product['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


      <div class="container ">
        <h2>Edit Products Form </h2>

        <form class="EditProduct">
          <!-- Hidden id  -->
          <input type="hidden" name="id" value="<?= $product['id'];?>">
            <!-- NAME -->
            <div class="form-group">
            <label for="name" class="text-secondary">Name:</label>
            <input type="text" class="form-control input_name mm" id="name2" placeholder="Enter Product Name" name="name2" value>
            <div class="errname" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>


            <!-- Price -->
            <div class="form-group">
            <label for="price"   class="text-secondary">Price:</label>
            <input type="text" class="form-control input_price" id="price" placeholder="Enter Price" name="price2" value="">
            <div class="errprice" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>
 
            <!-- Image -->
            <div class="form-group">
            <label for=""  class="text-secondary">Image:</label>
            <span> <img class="input_img" src="<?= DOMAIN_NAME;?>images/<?= $src;?>" alt="" width="100px"></span>
            <input type="file" class="form-control" id="img"  name="img2" >
            <div class="errimg" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>
     
            <!-- Category -->
            <div class="form-group">
            <label for="category"  class="text-secondary">Category:</label>
            <select name="category2" id="category_edit" class="form-control">
                <option value="0" id="myoption">Choose Category</option>
              <?php foreach($category as $cat){ ?>  
                <option value="<?= $cat['id'];?>" ><?= $cat['name']; ?></option>
              <?php } ?>  
            </select>
            <div class="errcategory" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>

            <!-- Description -->
            <div class="form-group">
            <label for="description"  class="text-secondary">Description:</label>
            <textarea name="description2" id="description" cols="30" rows="10" class="form-control input_des"><?= $product['description'];?></textarea>
            <div class="errdes" style="color:red;font-size: 14px;margin-top: 5px;"></div>
            </div>

   
            <input type="submit" class="btn btn-primary form-control edit_submit"   value="Add Product">
     
                    
        </form>
       


      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>







                                            </td>
                                            <td> 
                                                <!-- Delete ******************************************************************************** -->
                                                <!-- Button trigger modal -->
                                 
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $product['id'];?>">
Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $product['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        are you sure tot delete product : <?= $product['name'];?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger deletebtn" data-id="<?= $product['id'];?> " data-dismiss="modal" >save changes</button>

      </div>
    </div>
  </div>
</div>
                                            </td>
                                        </tr>
                                        <?php } ?>  
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5"> 
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 51 to 57 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous" id="dataTable_previous">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                    </li>
                                    <li class="paginate_button page-item ">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                    </li>
                                    <li class="paginate_button page-item active">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                    </li>
                                    <li class="paginate_button page-item next disabled" id="dataTable_next">
                                        <a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    


<?php include_once"includes/footer.php"; ?>



 <!-- if($product['category'] ==  $cat['id']){echo "selected";}  -->
<?php
    require('includes/db.php');
    include("includes/auth_admin.php");
    include("includes/php.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include('includes/head.html');?>
<title>Admin | VnCard</title>
<link rel="stylesheet" href="static/css/admin.css">
<script src="vendor/jquery/jquery.min.js"></script>

</head>
<body >
    <!-- ***** Preloader Start ***** -->
<?php include('includes/preloader.html');?>
  <!-- ***** Preloader End ***** -->
    <!-- ***** Header Area Start ***** -->
  <?php include('includes/menu.html');?>
  <!-- ***** Header Area End ***** -->
<script src="vendor/jquery/jquery.min.js"></script>
<div class="container mt-5">
    <div class="row">
        <div class="col-12"><br><br><br>
        </div>
        <input type="hidden" name="admin" value="<?php echo $_SESSION['admin']?>" id="admin">
        <div class="col-12 text-center"><h2 class="title_admin">ADMIN</h2></div>   
        <h4 class="h4">Sale Order
            <button class="btn-success btn" onclick="hide('list-order','btn-hide-so','btn-show-so')" id="btn-hide-so">Hide</button>
            <button class="btn-success btn" onclick="show('list-order','btn-hide-so','btn-show-so')" id="btn-show-so">Show</button>
            <button class="btn btn-success"
                data-bs-toggle="modal" data-bs-target="#modal_new_so"
            >Create order</button>
        </h4>
        <div class="col-12" id="list-order">
            <table class="table table-hover table-bordered  table-responsive">
                <thead>
                    <th>SO</th>
                    <th>Cus Name</th>
                    <th>Date Order</th>
                    <th>Mobile</th>
                    <th>Saler</th>
                    <th title="0,1,2 -> darft,confirm,success">State</th>
                    <th>Modify</th>
                </thead>
                <tbody id="load_so">
                </tbody>
            </table>
            <button class="btn btn-success" onclick="loadmore()">Load more</button>
        </div>
        
        <div class="modal fade" id="so_modal" tabindex="-1"  aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Edit Sale Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="load_edit_so"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            </div>
        </div>
        <!-- Modal so create so-->
        <div class="modal fade" id="modal_new_so" tabindex="-1"  aria-hidden="true">
          <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create New Order</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="form_create_new_so">
                <div class="container so-modal">
                    <div class="mb-2 row">
                    <label for="cusname" class="col-2 col-form-label mt-2">Cus Name:</label>
                    <div class="col-5 mt-2">
                        <input class="form-control" id="cusname" type="text" placeholder="Cus name">
                    </div>
                    <label for="mobile" class="col-1 col-form-label mt-2">Mobile:</label>
                    <div class="col-4">
                        <input class="form-control mt-2" type="phone" id="mobile" required placeholder="Mobile">
                    </div>
                    
                    <label for="type" class="col-2 col-form-label mt-2">Card type:</label>
                    <div class="col-3">
                        <!-- <input class="form-control" type="text" id="type"> -->
                        <select class='form-control' name='card_type' id='type'>
                          <option value='1'>Loại 1</option>
                          <option value='2'>Loại 2</option>
                          <option value='3'>Loại 3</option>
                          <option value='4'>Custom</option>
                        </select>
                    </div>
                    <label for="qty" class="col-1 col-form-label mt-2">Qty:</label>
                    <div class="col-1">
                        <input class="form-control mt-2" type="number" id="qty" value="1" placeholder="Qty">
                    </div>
                    <label for="price" class="col-2 col-form-label mt-2">Price:</label>
                    <div class="col-3">
                        <input class="form-control mt-2" type="number" required id="price" value="150000" placeholder="Price">
                    </div>
                    <label for="saler" class="col-2 col-form-label mt-2">Saler:</label>
                    <div class="col-3">
                        <input class="form-control mt-2" type="text" id="saler" value="admin" placeholder="Saler">
                    </div>
                    <label for="state" class="col-2 col-form-label mt-2" title="0,1,2 -> darft,confirm,success" >State:</label>
                    <div class="col-5">
                        <input class="form-control mt-2" type="number" id="state" value="1" placeholder="State">
                    </div>
                    <label for="add" class="col-1 col-form-label mt-2">Address:</label>
                    <div class="col-11">
                        <input class="form-control mt-2" type="text" id="add" placeholder="Address">
                    </div>
                    <label for="note" class="col-1 col-form-label mt-2">Note:</label>
                    <div class="col-11">
                    <textarea name="" class="form-control mt-2" 
                    id="note" cols="2" rows="4"></textarea>
                    </div>
                </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="create_newso()">Create</button>
                </div>
                </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <h4 class="h4">List User 
            <button class="btn-success btn" onclick="hide('list-user','btn-hide','btn-show')" id="btn-hide">Hide</button>
            <button class="btn-success btn" onclick="show('list-user','btn-hide','btn-show')" id="btn-show">Show</button>
        </h4>
        
        <div class="col-12" id="list-user">
            
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="s_mobile" id="search_by_mobile">
              <label class="form-check-label" for="search_by_mobile">
                Search by mobile
              </label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control search" placeholder="Search user default by Username">
            </div>
            
            <table class="table table-hover table-bordered  table-responsive">
                <thead>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Reg Date</th>
                    <th>Slug</th>
                    <th title="(0,1,2)(new,try,actived)">Active</th>
                    <th>Email Status</th>
                    <th>IP</th>
                    <th>Modify</th> 
                </thead>
                <tbody id="load_users">
                </tbody>
            </table>
            <button type="button" class="btn btn-success mb-2" 
            data-bs-toggle="modal" data-bs-target="#adduser_modal">Add User</button>
        </div>
        <h4 class="h4">Active Code List
            <button class="btn-success btn" 
            onclick="hide('active-code-list','btn-hide-code','btn-show-code')" 
            id="btn-hide-code">Hide</button>
            <button class="btn-success btn" onclick="show('active-code-list','btn-hide-code','btn-show-code')" id="btn-show-code">Show</button>
        </h4>
        <div class="col-12" id="active-code-list">
            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <th>ID</th>
                    <th>Code</th>
                    <th title="(new,used)">Status</th>
                    <th>For user</th>
                    <th>Active Date</th> 
                    <th>Modify</th> 
                </thead>
                <tbody id="load_codes">
                </tbody>
            </table>
          <button type="button" class="btn btn-success mb-2" 
            data-bs-toggle="modal" data-bs-target="#addcode_modal">Add code</button> 
        </div>
        <div class="col-12 mb-3 mt-3">
            <hr>
        </div>
        <h4 class="h4">Token Setting
        </h4>
        <div class="col-12">
            <table class="table table-hover table-bordered table-responsive">
                <thead>
                    <th>ID</th>
                    <th>Token</th>
                    <th>Mobile Iden</th>
                    <th>Active</th>
                    <th>Email</th>
                    <th>Create Token Date</th>
                    <th>Modify</th>
                </thead>
                <tbody id="load_token">
                    <tr>
                        <td>Emtry</td>
                    </tr>
                </tbody>
            </table>
            <button 
                class="btn btn-success" 
                data-bs-toggle="modal" 
                data-bs-target="#new_token_modal">
                Create new token
            </button>
        </div>
        <div class="col-12 mb-5 mt-3">
            <hr>
        </div>
        <!-- edit tocen modal -->
        <div class="modal" id="edit_token_modal">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <form id="form_edit_token">
                          <!-- Modal body -->
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>ID</td>
                                    <td>
                                        <input class="form-control" 
                                        readonly type="text" id="e_id_token">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Token</td>
                                    <td><input class="form-control" type="text" id="e_token"></td>
                                </tr>
                                <tr>
                                    <td>Mobile Iden</td>
                                    <td><input class="form-control" type="text" id="e_mobile_iden"></td>
                                </tr>
                                <tr>
                                    <td>Active</td>
                                    <td><input class="form-control" id="e_active_token" placeholder="0,1 -> false/true" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="form-control" id="e_email_token" type="text"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" data-bs-dismiss="modal" onclick="confirm_edit_token()">Apply</button>
                            <button class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- edit tocen modal -->

        <!-- new_token_modal -->
        <div class="modal" id="new_token_modal">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <form id="form_new_token">
                          <!-- Modal body -->
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Token</td>
                                    <td><input class="form-control" type="text" id="token"></td>
                                </tr>
                                <tr>
                                    <td>Mobile Iden</td>
                                    <td><input class="form-control" type="text" id="mobile_iden"></td>
                                </tr>
                                <tr>
                                    <td>Active</td>
                                    <td><input class="form-control" id="active_token" placeholder="0,1 -> false/true" type="text"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input class="form-control" id="email_token" type="text"></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" onclick="create_new_token()">Create</button>
                            <button class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- edit modal code -->
        <div class="modal" id="edit_code_modal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form id="form_edit_code">
                          <!-- Modal body -->
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Label</th>
                                    <th>Value</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="edit_c_id">ID</label></td>
                                        <td><input readonly class="form-control" type="text" name="edit_c_id" id="edit_c_id" placeholder="ID"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="edit_c_code">Code</label></td>
                                        <td><input  class="form-control" type="text" name="edit_c_code" id="edit_c_code" placeholder="Code"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="edit_c_status">Status</label></td>
                                        <td><input  class="form-control" type="text" name="edit_c_status" id="edit_c_status" placeholder="Status"></td>
                                    </tr>
                                
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="update_code()">Apply</button>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modify modal -->
        <div class="modal" id="modify_modal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form id="form_modify">
                          <!-- Modal body -->
                        <div class="modal-body">
                            <table class="table table-bordered">
                                <thead>
                                    <th>Label</th>
                                    <th>Value</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><label for="e_id">ID</label></td>
                                        <td><input readonly class="form-control" type="text" name="e_id" id="e_id" placeholder="ID"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="e_fullname">Fullname</label></td>
                                        <td><input class="form-control mt-2" type="text" name="e_fullname" id="e_fullname" placeholder="Fullname"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="e_mobile">Mobile</label></td>
                                        <td><input class="form-control mt-2" type="text" name="e_mobile" id="e_mobile" placeholder="Mobile"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="e_email">Email</label></td>
                                        <td><input class="form-control mt-2" type="text" name="e_email" id="e_email" placeholder="Email"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="e_slug">Slug</label></td>
                                        <td><input class="form-control mt-2" type="text" name="e_slug" id="e_slug" placeholder="Slug"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="e_active">Active</label></td>
                                        <td><input class="form-control mt-2" type="text" name="e_active" id="e_active" placeholder="Active"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="e_status_email">Email Status</label></td>
                                        <td><input class="form-control mt-2" type="text" name="e_status_email" id="e_status_email" placeholder="Email status"></td>

                                    </tr>

                                </tbody>
                            </table>       
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" onclick="update_user()">Apply</button>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal user-->
        <div class="modal" id="adduser_modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="form_adduser">
                          <!-- Modal body -->
                        <div class="modal-body">
                            <input type="text" name="username" id="new_username" 
                                class="form-control mt-2" placeholder="Username" 
                                onblur="check_user(this.value)">
                            <input type="text" name="fullname" id="fullname" 
                            class="form-control mt-2" placeholder="Full Name">
                            <input type="number" name="active" id="active" 
                            class="form-control mt-2" placeholder="Active:0,1,2 -> new, try, active">
                            <input type="password" name="password_admin" id="password_admin" 
                            class="form-control mt-2" placeholder="Password Admin">
                            <input type="text" name="password" id="password" 
                            class="form-control mt-2" placeholder="Password user" value="1234">
                        </div>
                          <!-- Modal footer -->
                        <div class="modal-footer">
                            <p id="adduser_alert" style="color:white;"></p>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="adduser()" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end modal user -->
        <!-- modal code -->
        <div class="modal" id="addcode_modal">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <form id="form_addcode">
                          <!-- Modal body -->
                        <div class="modal-body">
                            <input type="number" min="1" max="100" name="num_code" id="num_code" 
                                class="form-control mt-2" placeholder="Number of codes to be generated">
                        </div>
                          <!-- Modal footer -->
                        <div class="modal-footer">
                            <p id="addcode_alert" style="color:white;"></p>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                            <button type="button" onclick="addcode()" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- modal code -->
    </div>
</div>
  
</body>
<!--   footer start -->
<!-- <?php include('includes/footer.html'); ?> -->
<!--   footer end -->

  <!-- Scripts -->
  <script src="static/js/admin.js"></script>
<?php include('includes/script.html');?>
</html>
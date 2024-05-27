<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>PHP Ajax CRUD </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="employee.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.0/classic/ckeditor.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                        <h5 class="text-dark text-center">PHP Ajax CRUD </h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Employees</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i><span>Add New Employee</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead><button id="exportCSVBtn">Export to CSV</button>
                    <button id="exportPDFBtn">Export to PDF</button>
                    

                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Country</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Gender</th>
                            <th>Hobbies</th>
                            <th>Department</th>
                            <th>Image</th>
                            <th>Member</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employee_data">
                    </tbody>
                </table>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
                <p class="loading">Loading Data</p>
            </div>
        </div>
    </div>
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Employee</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body add_employee">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" id="name_input" class="form-control" required>
                </div>
                <div class="form-group" id="country">
                    <label>Country</label>
                    <select class="form-control" id="country_select">
                    </select>
                </div>
                <div class="form-group" id="state">
                    <label>State</label>
                    <select class="form-control" id="state_select" disabled>
                    </select>
                </div>
                <div class="form-group" id="city">
                    <label>City</label>
                    <select class="form-control" id="city_select" disabled>
                    </select>
                </div>
                <div class="form-group" id="gender">
                    <label>Gender</label>
                    <div>
                        <label><input type="radio" name="gender" value="Male" required> Male</label>
                        <label><input type="radio" name="gender" value="Female" required> Female</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Hobbies</label>
                    <div>
                        <input type="checkbox" id="h1" name ="hobby" value="Reading"> 
                        <label for="h1">Reading</label>
                        <input type="checkbox"  id="h2" name ="hobby" value="Gaming"> 
                        <label for="h2">Gaming</label>
                        <input type="checkbox"  id="h3" name ="hobby" value="Sports"> 
                        <label for="h3">Sports</label>
                    </div>
                </div>
                <div class="form-group" id="department">
                    <label>Department</label>
                    <select class="form-control" id="department_select">
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Finance">Finance</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="image">Image</label>
                     <input type="file" id="image_input" class="form-control-file" accept="image/*">
                     <img id="image_preview" src="http://localhost/validation/ajax/uploads/" alt="" style="width: 40px; height: 40px;">
                </div>
                <br>
                <div class="form-group">
                <label>Member</label>
                <input type="checkbox" id="toggle_switch" data-toggle="toggle" data-on="YES" data-off="NOOO" data-onstyle="success" data-offstyle="danger" style="width: 60px; height: 34px;">
                </div>
            </div>
                <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                <input type="submit" class="btn btn-success" value="Add" onclick="addEmployee()">
                </div>
        </div>
    </div>
</div>

 <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">                          
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <input type="hidden" id="employee_id" class="form-control">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                     
                    </div>
                    <div class="form-group" id="country">
                        <label>Country</label>
                        <select class="form-control" id="country_select_edit">
                        </select>
                    </div>
                    <div class="form-group" id="state">
                        <label>State</label>
                        <select class="form-control" id="state_select_edit" >
                        </select>
                    </div>
                    <div class="form-group" id="city">
                        <label>City</label>
                        <select class="form-control" id="city_select_edit" >
                        </select>
                    </div> 
                    <div class="form-group" id="gender">
                    <label>Gender</label>
                    <div>
                     <label><input type="radio" name="gender" value="Male" required> Male</label>
                     <label><input type="radio" name="gender" value="Female" required> Female</label>                  
                    </div> 
                    </div>

                    <div class="form-group">
                     <label>Hobbies</label>
                    <div>
                        <input type="checkbox" id="h1" name ="hobby" value="Reading"> 
                        <label for="h1">Reading</label>
                        <input type="checkbox"  id="h2"name ="hobby" value="Gaming"> 
                        <label for="h2">Gaming</label>
                        <input type="checkbox"  id="h3"name ="hobby" value="Sports"> 
                        <label for="h3">Sports</label>
                    </div>
                    </div>
                    <div class="form-group" id="department">
                    <label>Department</label>
                    <select class="form-control" id="department_select">
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                     <input type="file" id="image_input_edit" class="form-control-file" accept="image/*">
                     <img id="image_preview_edit" src="http://localhost/validation/ajax/uploads/" alt="" style="width: 40px; height: 40px;">
                     </div>
                     
                    <div class="form-group">
                    <label>Member</label>
                    <input type="checkbox" id="toggle_switch" data-toggle="toggle" data-on="YES" data-off="NOOO" data-onstyle="success" data-offstyle="danger" style="width: 60px; height: 34px;">
                     </div>
                </div>      
                   <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Save">
                   </div>
               
            </div>
        </div>
        
    </div>
<!-- 
    View Modal HTML -->
    <div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Name</label>
                       
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group" id="country">
                        <label>Country</label>
                        <select class="form-control" id="country_select_view">
                        </select>
                    </div>
                    <div class="form-group" id="state">
                        <label>State</label>
                        <select class="form-control" id="state_select_view" >
                        </select>
                    </div>
                    <div class="form-group" id="city">
                        <label>City</label>
                        <select class="form-control" id="city_select_view" >
                        </select>
                    </div>
                    <div class="form-group" id="gender">
                    <label>Gender</label>
                     <div>
                     <label><input type="radio" name="gender" value="Male" required> Male</label>
                     <label><input type="radio" name="gender" value="Female" required> Female</label>                  
                    </div> 
                    </div>

                    <div class="form-group">
                     <label>Hobbies</label>
                    <div>
                        <input type="checkbox" id="h1" name ="hobby" value="Reading"> 
                        <label for="h1">Reading</label>
                        <input type="checkbox"  id="h2"name ="hobby" value="Gaming"> 
                        <label for="h2">Gaming</label>
                        <input type="checkbox"  id="h3"name ="hobby" value="Sports"> 
                        <label for="h3">Sports</label>
                    </div>
                    </div>
                    <div class="form-group" id="department">
                    <label>Department</label>
                    <select class="form-control" id="department_select">
                    <option value="HR">HR</option>
                    <option value="IT">IT</option>
                    <option value="Finance">Finance</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                     <input type="file" id="image_input" class="form-control-file" accept="image/*">
                     <img id="image_preview" src="http://localhost/validation/ajax/uploads/" alt="" style="width: 40px; height: 40px;">
                   </div>
                   
                    <div class="form-group">
                    <label>Member</label>
                    <input type="checkbox" id="toggle_switch" data-toggle="toggle" data-on="YES" data-off="NOOO" data-onstyle="success" data-offstyle="danger" style="width: 60px; height: 34px;">
                    
                    </div>
                    </div>
                
                    <div class="modal-footer">
                        <input type="button" onclick="viewEmployee()" class="btn btn-default" data-dismiss="modal" value="Close">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
                </div>
            </div>
        </div>
    </div>
    <script src="employee.js"></script>


      
</body>
</html>


 
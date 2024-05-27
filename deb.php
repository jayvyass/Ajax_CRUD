echo "<pre>";
print_r($variable);
echo "</pre>";
exit();

var editor = CKEDITOR.instances.editor;
    var imageDescription = $('#imageDescription').val();
    var ckEditor = editor.getData() + '<p>Image Description: ' + imageDescription + '</p>'
    var imageFile = $('#imageUpload').prop('files')[0];
    ClassicEditor
        .create(document.querySelector('#editorTextarea'))
        .catch(error => {
            console.error(error);
        });
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>PHP Ajax CRUD </title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="employee.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <script src="http://localhost/validation/ajax/ckeditor/ckeditor.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
</head> 
   
   
   
<script src="http://localhost/validation/ajax/ckeditor/ckeditor.js"></script>
    <script src="http://localhost/validation/ajax/ckeditor/ckeditor.js"></script>   
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    $(document).ready(function () {
   
   ClassicEditor
       .create(document.querySelector('#editorTextarea'))
       .catch(error => {
           console.error(error);
       });
   employeeList();
});
CKEDITOR.replace( 'editor1' );
    // var content = CKEDITOR.instances['#editorTextarea'].getData();
var_dump($_POST);

        
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
                    <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value = "Add" onclick = "addEmployee()">
               </div></div>
            </div>
        </div>
    </div>
    reader.readAsDataURL(imageInput);
    function addEmployee() {
    var name = $('.add_employee #name_input').val();
    var country = $('.add_employee #country_select option:selected').val();
    var state = $('.add_employee #state_select option:selected').val();
    var city = $('.add_employee #city_select option:selected').val();
    var gender = $('input[name="gender"]:checked').val();
    var hobbies = [];
    $('input[type="checkbox"]:checked').each(function() {
    hobbies.push($(this).attr('value'));
    });
    hobbies = hobbies.join(',');
    var department = $('.add_employee #department_select option:selected').val();
    $('#image_input').change(function() {
        var fileName = $(this).val().split('\\').pop(); 
        $('#image_preview').attr('alt', fileName);
    })
    // var content = CKEDITOR.instances.editorTextarea.getData();
    var content = CKEDITOR.instances['editorTextarea'].getData();
    var member = $('#toggle_switch').prop('checked') ? 'YES' : 'NO'; 
    $.ajax({
        type: 'post',
        data: {
            name: name,
            country: country,
            state: state,
            city: city,
            gender: gender,
            hobbies: hobbies,
            department : department,
            image: $('#image_input').val().split('\\').pop(),
            content: content,            
            member : member,
        },
        url: "employee-add.php",
        success: function (data) {
            var response = JSON.parse(data);
            $('#addEmployeeModal').modal('hide');
            employeeList();
            alert(response.message);
        }
       
    })
   
}



$(document).ready(function() {
    $('#exportPDFBtn').click(function() {
        $.ajax({
            type: 'get',
            url: "pdf.php",
            success: function(data) {
                // PDF generated successfully, you may handle success response here
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    });
});
<?php
// Include TCPDF library
require_once ('library1/tcpdf.php');
// Retrieve the employee data sent via AJAX
$employees = $_POST['employees'];
echo "<pre>";
print_r($employees);
echo "</pre>";
exit();

// Create new TCPDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Employee List');
$pdf->SetHeaderData('', 0, 'Employee List', '');

// Set default font
$pdf->SetFont('helvetica', '', 12);

// Add a page
$pdf->AddPage();

// Create HTML content for the table
$html = '<table border="1">
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
            </tr>';

foreach ($employees as $employee) {
    $html .= '<tr>';
    $html .= '<td>' . $employee['id'] . '</td>';
    $html .= '<td>' . $employee['name'] . '</td>';
    $html .= '<td>' . $employee['country'] . '</td>';
    $html .= '<td>' . $employee['state'] . '</td>';
    $html .= '<td>' . $employee['city'] . '</td>';
    $html .= '<td>' . $employee['gender'] . '</td>';
    $html .= '<td>' . $employee['hobbies'] . '</td>';
    $html .= '<td>' . $employee['department'] . '</td>';
    $html .= '<td><img src="http://localhost/validation/ajax/uploads/' . $employee['image'] . '" style="width: 50px; height: 50px;"></td>';
    $html .= '<td>' . $employee['member'] . '</td>';
    $html .= '</tr>';
}

$html .= '</table>';

// Write HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Close and output PDF document
$pdf->Output('employee_list.pdf', 'F'); // 'F' stands for saving the file to a local path

// Return the URL of the generated PDF
$pdfUrl = 'employee_list.pdf'; // Replace with the actual path
echo $pdfUrl;
?>



document.getElementById("exportCSVBtn").addEventListener("click", function() {
        var table = document.getElementById("records");
        var csv = [];
        var rows = table.getElementsByTagName("tr");
    
        for (var i = 0; i < rows.length; i++) {
            var row = [],
                cols = rows[i].querySelectorAll("td, th");
    
            for (var j = 0; j < cols.length; j++) {
                if (cols[j].querySelector("img")) {
                    row.push(cols[j].querySelector("img").src);
                } else {
                    row.push(cols[j].innerText);
                }
            }
    
            csv.push(row.join(","));
        }
    
        // Join CSV rows with new lines
        var csvContent = csv.join("\n");
    
        // Create a blob and trigger download
        var blob = new Blob([csvContent], { type: "text/csv" });
        var link = document.createElement("a");
        link.href = window.URL.createObjectURL(blob);
        link.setAttribute("download", "employee.csv");
        document.body.appendChild(link);
        link.click();
    });





    
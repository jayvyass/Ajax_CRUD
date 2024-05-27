$(document).ready(function () {
    // Function to handle Export to CSV button click
    $(document).ready(function() {
       
        // Function to handle Export to CSV button click
        $("#exportCSVBtn").click(function() {
            $.ajax({
                type: "GET",
                url: "csv.php", // Specify the URL of csv.php
                success: function(data) {
                    var csvContent = "data:text/csv;charset=utf-8," + data;
                    var encodedUri = encodeURI(csvContent);
                    var link = document.createElement("a");
                    link.setAttribute("href", encodedUri);
                    link.setAttribute("download", "employee_data.csv");
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function(xhr, status, error) {
                    alert("Error generating CSV: " + error);
                }
            });
        });
    });
    
    
    $(document).ready(function() {
        $("#exportPDFBtn").click(function() {
            $.ajax({
                type: "GET",
                url: "pdf.php", 
                xhrFields: {
                    responseType: 'blob' // Set the response type to blob
                },
                success: function(data) {
                    var blob = new Blob([data], { type: 'application/pdf' }); // Create a blob object from the response data
                    var link = document.createElement("a");
                    link.href = window.URL.createObjectURL(blob); // Create object URL for the blob
                    link.download = "employee_data.pdf"; 
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                },
                error: function(xhr, status, error) {
                    alert("Error generating PDF: " + error);
                }
            });
        });
    });
    
    
        employeeList();
    });
    
function employeeList() {
    $.ajax({
        type: 'get',
        url: "employee-list.php",
        success: function (data) {
            var response = JSON.parse(data);
            console.log(response);
            var tr = '';
            for (var i = 0; i < response.length; i++) {
                var id = response[i].id;
                var name = response[i].name;
                var country = response[i].country;
                var state = response[i].state;
                var city = response[i].city;
                var gender = response[i].gender;
                var hobbies = response[i].hobbies;
                var department = response[i].department;
                var image = response[i].image;
                var member = response[i].member;
                tr += '<tr>';
                tr += '<td>' + id + '</td>';
                tr += '<td>' + name + '</td>';
                tr += '<td>' + country + '</td>';
                tr += '<td>' + state + '</td>';
                tr += '<td>' + city + '</td>';
                tr += '<td>' + gender + '</td>';
                tr += '<td>' + hobbies + '</td>';
                tr += '<td>' + department+ '</td>';
                tr += '<td><img src="http://localhost/validation/ajax/uploads/' + image + '" style="width: 50px; height: 50px;"></td>';
                tr += '<td>' + member+ '</td>';
                tr += '<td><div class="d-flex">';
                tr +=
                '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                id + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';
            tr +=
                '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                id +'")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
            tr +=
                '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' +
                id +
                '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
            tr += '</div></td>';
            tr += '</tr>';
        }
        $('.loading').hide();
        $('#employee_data').html(tr);
    }
});
}
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
    hobbies = hobbies.join(' ');
    var department = $('.add_employee #department_select option:selected').val();
    $('#image_input').change(function() {
        var fileName = $(this).val().split('\\').pop(); 
        $('#image_preview').attr('alt', fileName);
    })
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
function editEmployee() {
    var name = $('.edit_employee #name_input').val();
    var country = $('.edit_employee #country_select_edit option:selected').val();
    var state = $('.edit_employee #state_select_edit option:selected').val();
    var city = $('.edit_employee #city_select_edit option:selected').val();
    var gender = $('.edit_employee input[name="gender"]:checked').val();
    var hobbies = [];
        $('.edit_employee input[name="hobby"]:checked').each(function() {
            hobbies.push($(this).val());
        });
        hobbies = hobbies.join(',');
    var department = $('.edit_employee #department_select option:selected').val();
    $('.edit_employee #image_input_edit').change(function() {
        var fileName = $(this).val().split('\\').pop(); 
        $('.edit_employee #image_preview_edit').attr('alt', fileName);
    })
   
    var member = $('.edit_employee #toggle_switch').prop('checked') ? 'YES' : 'NO';
    var employee_id = $('#employee_id').val();

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
            image: $('.edit_employee #image_input_edit').val().split('\\').pop(),
            member : member,
            employee_id: employee_id,
        },
        url: "employee-edit.php",
        success: function (data) {
            var response = JSON.parse(data);
            $('#editEmployeeModal').modal('hide');
            employeeList();
            alert(response.message);
        }
    })
}
function viewEmployee(id = 2) {
    $.ajax({
        type: 'get',
        data: {
            id: id,
        },
        url: "employee-view.php",
        success: function (data) { 
            var response = JSON.parse(data);
            $('.edit_employee #name_input').val(response.name);
            $('#employee_id').val(response.id);
            $('.view_employee #name_input').val(response.name);
            $('.edit_employee #country_select_edit').val(response.country);
            $('.view_employee #country_select_view').val(response.country);
            populateStatesSelect(response.country, 'state_select_edit');
            populateStatesSelect(response.country, 'state_select_view');
            $('.edit_employee #state_select_edit').val( response.state);
            $('.view_employee #state_select_view').val( response.state);
            populateCitiesSelect(response.country, response.state, 'city_select_edit');
            populateCitiesSelect(response.country, response.state, 'city_select_view');
        
            $('.edit_employee #city_select_edit').val( response.city);
            $('.view_employee #city_select_view').val( response.city);
            $('.edit_employee input[name="gender"][value="' + response.gender + '"]').prop('checked', true);
            $('.edit_employee input[name="hobby"]').filter(function() {
                return response.hobbies.includes($(this).val());
            }).prop('checked', true); 
            $('.view_employee input[name="hobby"]').filter(function() {
                return response.hobbies.includes($(this).val());
            }).prop('checked', true); 

            $('.edit_employee #department_select').val(response.department);
            $('.view_employee #department_select').val(response.department);
            if (response.image) {
                $('.edit_employee #image_preview_edit').attr('src', 'http://localhost/validation/ajax/uploads/' + response.image);
                $('.edit_employee #image_preview_edit').attr('alt', response.image);
                $('.view_employee #image_preview').attr('src', 'http://localhost/validation/ajax/uploads/' + response.image);
                $('.view_employee #image_preview').attr('alt', response.image);
            }
            
            $('.edit_employee #toggle_switch').val('checked',response.member );
            $('.view_employee #toggle_switch').val('checked',response.member );

                    }
                });
}
function deleteEmployee() {
    var id = $('#delete_id').val();
    $('#deleteEmployeeModal').modal('hide');
    $.ajax({
        type: 'get',
        data: {
            id: id,
        },
        url: "employee-delete.php",
        success: function (data) {
            var response = JSON.parse(data);
            employeeList();
            alert(response.message);
        }
    })
} 
$('#image_input').change(function(event) {
    var input = event.target;
    var reader = new FileReader();
    
    reader.onload = function(){
        var dataURL = reader.result;
        $('#image_preview').attr('src', dataURL);
    };
    
    reader.readAsDataURL(input.files[0]);
});
$('#image_input_edit').change(function(event) {
    var input = event.target;
    var reader = new FileReader();
    
    reader.onload = function(){
        var dataURL = reader.result;
        $('#image_preview_edit').attr('src', dataURL);
    };
    
    reader.readAsDataURL(input.files[0]);
});

var country = [
    { 
        name: 'India', 
        states: [
            { name: 'Gujarat', cities: ['Ahmedabad', 'Surat', 'Vadodara'] },
            { name: 'Maharashtra', cities: ['Mumbai', 'Pune', 'Nagpur'] },
            { name: 'Rajasthan', cities: ['Jaipur', 'Udaipur', 'Jodhpur'] }
        ] 
    },
    { 
        name: 'United States', 
        states: [
            { name: 'California', cities: ['Los Angeles', 'San Francisco', 'San Diego'] },
            { name: 'New York', cities: ['New York City', 'Buffalo', 'Rochester'] },
            { name: 'Texas', cities: ['Houston', 'Dallas', 'Austin'] }
        ]
    },
    {
        name: 'United Kingdom',
        states: [
            { name: 'England', cities: ['London', 'Manchester', 'Birmingham'] },
            { name: 'Scotland', cities: ['Edinburgh', 'Glasgow', 'Aberdeen'] },
            { name: 'Wales', cities: ['Cardiff', 'Swansea', 'Newport'] }
            
        ]
    },
    { 
        name: 'Australia', 
        states: [
            { name: 'Queensland', cities: ['Brisbane', 'Gold Coast', 'Cairns'] },
            { name: 'Tasmania', cities: ['Hobart', 'Launceston', 'Devonport'] },
            { name: 'Victoria', cities: ['Melbourne', 'Geelong', 'Ballarat'] }
        ] 
    }
  
];
function populateCountryDropdown(selectId) {
    var countrySelect = document.getElementById(selectId);
    country.forEach(function(countryData) {
        var option = document.createElement('option');
        option.text = countryData.name;
        option.value = countryData.name;
        countrySelect.appendChild(option);
    });
}

function populateStatesSelect(selectedCountry, selectId) {
    var stateSelect = document.getElementById(selectId);
    stateSelect.innerHTML = ''; // Clear previous options
    var selectedCountryData = country.find(function(country) {
        return country.name === selectedCountry;
    });
    if (selectedCountryData) {
        selectedCountryData.states.forEach(function(state) {
            var option = document.createElement('option');
            option.text = state.name;
            option.value = state.name;
            stateSelect.appendChild(option);
        });
        stateSelect.disabled = false; 
    }
}

function populateCitiesSelect(selectedCountry, selectedState, selectId) {
    var citySelect = document.getElementById(selectId);
    citySelect.innerHTML = ''; // Clear previous options
    var selectedCountryData = country.find(function(country) {
        return country.name === selectedCountry;
    });
    if (selectedCountryData) {
        var selectedStateData = selectedCountryData.states.find(function(state) {
            return state.name === selectedState;
        });
        if (selectedStateData) {
            selectedStateData.cities.forEach(function(city) {
                var option = document.createElement('option');
                option.text = city;
                option.value = city;
                citySelect.appendChild(option);
            });
        }
    }
    citySelect.disabled = false; 
}

document.getElementById('country_select').addEventListener('change', function() {
    var selectedCountry = this.value;
    populateStatesSelect(selectedCountry, 'state_select');
});

// Event listener for state dropdown change
document.getElementById('state_select').addEventListener('change', function() {
    var selectedCountry = document.getElementById('country_select').value;
    var selectedState = this.value;
    populateCitiesSelect(selectedCountry, selectedState, 'city_select');
});

// Call the function to populate countries when the page loads
populateCountryDropdown('country_select'); // For add modal
populateCountryDropdown('country_select_edit'); // For edit modal
populateCountryDropdown('country_select_view'); // For view modal

function populateStatesSelect(selectedCountry, selectId) {
    
    var stateSelect = document.getElementById(selectId);
    stateSelect.innerHTML = ''; // Clear previous options
    var selectedCountryData = country.find(function(country) {
        return country.name === selectedCountry;
    });
  
    if (selectedCountryData) {
        selectedCountryData.states.forEach(function(state) {
            var option = document.createElement('option');
            option.text = state.name;
            option.value = state.name;
            stateSelect.appendChild(option);
        });
        stateSelect.disabled = false; // Enable the state dropdown
    }
}

function populateCitiesSelect(selectedCountry, selectedState, selectId) {
   
    var citySelect = document.getElementById(selectId);
    citySelect.innerHTML = ''; // Clear previous options
    var selectedCountryData = country.find(function(country) {
        return country.name === selectedCountry;
    });
    if (selectedCountryData) {
        var selectedStateData = selectedCountryData.states.find(function(state) {
            return state.name === selectedState;
        });
        
        if (selectedStateData) {
            selectedStateData.cities.forEach(function(city) {
                var option = document.createElement('option');
                option.text = city;
                option.value = city;
                citySelect.appendChild(option);
            });
        }
    }
    citySelect.disabled = false; // Enable the city dropdown
}

document.getElementById('country_select_edit').addEventListener('change', function() {
    var selectedCountry = this.value;
    populateStatesSelect(selectedCountry, 'state_select_edit');
});

document.getElementById('country_select_view').addEventListener('change', function() {
    var selectedCountry = this.value;
    populateStatesSelect(selectedCountry, 'state_select_view');
});

// Event listener for state dropdown change
document.getElementById('state_select_edit').addEventListener('change', function() {
    var selectedCountry = document.getElementById('country_select_edit').value;
    var selectedState = this.value;
    populateCitiesSelect(selectedCountry, selectedState, 'city_select_edit');
});

document.getElementById('state_select_view').addEventListener('change', function() {
    var selectedCountry = document.getElementById('country_select_view').value;
    var selectedState = this.value;
    populateCitiesSelect(selectedCountry, selectedState, 'city_select_view');
});



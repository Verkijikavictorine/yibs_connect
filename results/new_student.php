<style>
  /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 50%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>


<?php if(!isset($conn)){ include 'db_connect.php'; } ?>

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-body">
			<form action="" id="manage-student">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
          <div class="col-md-6">
            <div id="msg" class=""></div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">First Name</label>
                <input type="text" class="form-control form-control-sm" name="firstname" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Middle Name</label>
                <input type="text" class="form-control form-control-sm" name="middlename" value="<?php echo isset($middlename) ? $middlename : '' ?>">
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Last Name</label>
                <input type="text" class="form-control form-control-sm" name="lastname" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Email</label>
                <input type="email" class="form-control form-control-sm" name="email" value="<?php echo isset($email) ? $email : '' ?>" required>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Phone</label>
                <input type="phone" class="form-control form-control-sm" name="phone" value="<?php echo isset($phone) ? $phone : '' ?>" required>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Student Pass</label>
                <input type="text" class="form-control form-control-sm" name="student_password" value="<?php echo isset($student_password) ? $student_password : '' ?>" required>
              </div>
              <div class="form-group text-dark">
               <button type="button" class="btn btn-primary" id='uploadPhoto' class="modal-dialog w3-container w3-white w3-col s6 w3-display-middle">Upload Photo</button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="" class="control-label">Gender</label>
              <select name="gender" id="" class="custom-select custom-select-sm" required>
                <option>Female</option>
                <option>Male</option>
              </select>
            </div>
            
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Class</label>
                <select name="class_id" id="" class="form-control select2 select2-sm" required>
                  <option></option> 
                  <?php 
                        $classes = $conn->query("SELECT * FROM classes order by level asc,section asc ");
                        while($row = $classes->fetch_array()):
                  ?>
                        <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? "selected" : '' ?>><?php echo ucwords($row['level'].'-'.$row['section']) ?></option>
                  <?php endwhile; ?>
                </select>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Campus</label>
                <select name="campus" id="" class="form-control select2 select2-sm" required>
                  <option value="A">A</option> 
                  <option value="b">B</option> 
                </select>
                </select>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Session</label>
                <select name="session" id="" class="form-control select2 select2-sm" required>
                  <option value="DAY">Day</option> 
                  <option value="EVENING">Evening</option> 
                </select>
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Photo</label>
                <input type="file" class="form-control form-control-sm" id="photoToBeUploaded" name="image" value="<?php echo isset($photo) ? $photo : '' ?>" required accept="image/*" disabled>
                <input type="hidden" name="type" value="photos\students">
              </div>
            </div>
            <div class="form-group text-dark">
              <div class="form-group">
                <label for="" class="control-label">Address</label>
                <textarea name="address" id="address" cols="30" rows="2" class="form-control"><?php echo isset($address) ? $address : '' ?></textarea>
                <textarea name="address" id="photoEncoding" cols="30" rows="2" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>
      </form>
  	</div>
  	<div class="card-footer border-top border-info">
  		<div class="d-flex w-100 justify-content-center align-items-center">
  			<button class="btn btn-flat  bg-gradient-primary mx-2" form="manage-student">Save</button>
  			<a class="btn btn-flat bg-gradient-secondary mx-2" href="./index.php?page=student_list">Cancel</a>
  		</div>
  	</div>
	</div>
</div>

<!-- The uploadPhotoModal -->
<div id="uploadPhotoModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h1>Upload the Student's Photo</h1>
    <form action="http://192.168.109.190:5000/getFaces" method="post" enctype="multipart/form-data">
    <input type="file" name="photo" id="photo" accept="image/*">
  	<button class="btn btn-flat  bg-gradient-primary mx-2" onclick="getPhotoEncoding()">Upload</button>
    </form>
  </div>

</div>


<script>
//Ajax script to collect image encoding
function getPhotoEncoding(){
        photoFile = document.getElementById('photo')
        let formData = new FormData()
        formData.append("file",photoFile)
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "http://192.168.109.190:5000/getFaces", true); 
        xhttp.setRequestHeader("Content-Type", "application/json");
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Response
            var response = this.responseText;
            alert(response)
            document.getElementById('photoEncoding').value = response
            document.getElementById('photoToBeUploaded').value = photoFile
            
        }else{
                console.log(response)
            }
        };
        var data = {
                photo: photoFile
            };
        xhttp.send(formData)
} 



// script for uploadmodal
// Get the modal
var modal = document.getElementById("uploadPhotoModal");

// Get the button that opens the modal
var btn = document.getElementById("uploadPhoto");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
	$('#manage-student').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_student',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
        console.log(resp);
				if(resp == 1){
					alert_toast('Data successfully saved',"success");
					setTimeout(function(){
              location.href = 'index.php?page=student_list'
					},2000)
				}else if(resp == 2){
          $('#msg').html('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Student Code already exist.</div>')
          end_load()
        }
			},
      error: function (error)
      {
      // error alert message
      console.log(error);
      }
		})
	})
  function displayImgCover(input,_this) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#cover').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
      }
  }


</script>
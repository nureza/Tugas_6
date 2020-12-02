<!DOCTYPE html>
<?php 

	include "show-data.php"; 
	include "update-data.php";
	$koneksi = mysqli_connect("localhost","root","","user");
	$riw = mysqli_query($koneksi,"SELECT * FROM  riwayat");
?>
<html>
<head>
	<title>profile saya</title>
	<link rel="stylesheet" href="asset/style.css">
</head>
<body>
		<nav>
			<div class="menu-mobile">
				<a href="#"> MENU</a>
			</div>
			<ul>
				<li><a href="#"> HOME</a></li>
				<li><a href="#"> PRODUCT</a></li>
				<li><a href="#"> GALLERY</a></li>
				<li><a href="#"> NEWS</a> </li>
				<li><a href="#"> HOME</a></li>
			</ul>
		</nav>

		<section id="box-profile">
			<div class="img-profile">
					<div class="photo">
						<img src="asset\eza.jpg">
					</div>

			</div>
			<div class="description">
				<h1 id="pName">Nur Eza Imandayanti</h1>
				<p id="pRole">Mahasiswa UPN V Jatim</p>
				<a href="#input-form" class="button-bg-green" onclick="editForm()">Edit</a>
				<a href="#" class="button-border-blue">  Resume</a>
			</div>
			<div class="information">
				<div class="data">
					<p class="field">Availability</p>
					<p id="pAvailable" class="text-gray">Full Time</p>
				</div>
				<div class="data">
					<p class="field">Age</p>
					<p id="pAge" class="text-gray">20</p>
				</div>
				<div class="data">
					<p class="field">Location</p>
					<p id="pLocation" class="text-gray">Surabaya, Indonesia</p>
				</div>
				<div class="data">
					<p class="field">Experience</p>
					<p id="pExperience" class="text-gray">6</p>
				</div>
				<div class="data">
					<p class="field">Email</p>
					<p id="pEmail" class="text-gray">ezaimnd19@gmail.com</p>
				</div>
			</div>
		</section>

		<section id="input-form">
			 <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ;?>">
				<div class="form">
					<label>Id User</label>
					<input id="inpIdUser" type="text" name="id_user" value="">
				</div>
				<div class="form">
					<label>Name</label>
					<input id="inpName" type="text" name="name">
				</div>
				<div class="form">
					<label>Role</label>
					<input id="inpRole" type="text" name="role">
				</div>
				<div class="form">
					<label>Availability</label>
					<input id="inpAvailability" type="text" name="availability">
				</div> 
				<div class="form">
					<label>Age</label>
					<input id="inpAge" type="number" name="age">
				</div>
				<div class="form">
					<label>Location</label>
					<input id="inpLocation" type="text" name="location">
				</div>
				<div class="form">
					<label>Years Experience</label>
					<input id="inpExperience" type="number" name="years">
				</div>
				<div class="form">
					<label>Email</label>
					<input id="inpEmail" type="email" name="email">
				</div>
				<div class="form">
					<input onclick="" type="submit" name="submit" value="SUBMIT" class="bg-blue" style="background-color: #55a8fd">
				</div>
			</form>
		</section>

		<script>
			var formMenu = document.getElementById("input-form");
			formMenu.style.display = "none";
			
			function editForm(){
				if(formMenu.style.display === "none"){
					formMenu.style.display = "block";
				}else{
					formMenu.style.display = "none"; 
				}
				var name = document.getElementById("pName").innerHTML;
				var role = document.getElementById("pRole").innerHTML;
				var available = document.getElementById("pAvailable").innerHTML;
				var age = document.getElementById("pAge").innerHTML;
				var location = document.getElementById("pLocation").innerHTML;
				var experience = document.getElementById("pExperience").innerHTML;
				var email = document.getElementById("pEmail").innerHTML;

				document.getElementById("inpName").value = name;
				document.getElementById("inpRole").value = role;
				document.getElementById("inpAvailability").value = available;
				document.getElementById("inpAge").value = age;
				document.getElementById("inpLocation").value = location;
				document.getElementById("inpExperience").value = experience;
				document.getElementById("inpEmail").value = email;
			}	
			function simpanForm(){
				formMenu.style.display = "none";
				var name = document.getElementById("inpName").value
				var role = document.getElementById("inpRole").value;
				var available = document.getElementById("inpAvailability").value;
				var age = document.getElementById("inpAge").value;
				var location = document.getElementById("inpLocation").value;
				var experience = document.getElementById("inpExperience").value;
				var email = document.getElementById("inpEmail").value;

				document.getElementById("pName").innerHTML = name;
				document.getElementById("pRole").innerHTML = role;
				document.getElementById("pAvailable").innerHTML = available;
				document.getElementById("pAge").innerHTML = age;
				document.getElementById("pLocation").innerHTML = location;
				document.getElementById("pExperience").innerHTML = experience;
				document.getElementById("pEmail").innerHTML = email;
			}
			function showMenu(){
				var menu = document.getElementById("menu");
				var box  = document.getElementById("box-profile");

				if(menu.style.display === "block"){
					menu.style.display = "none";
					box.style.paddingTop = "0px";

				}else{
					menu.style.display = "block";
					box.style.paddingTop = "125px";
				}
			}	
			$(document).ready(function(){ 
                  load_data();

                  $('form').on('submit',function(e){
                    e.preventDefault();
                    $.ajax({
                      type:$(this).attr('method'),
                      url:$(this).attr('action'),
                      data:$(this).serialize(),
                      success:function(){
                        load_data();
                        resetForm();
                      }
                    });
                  })
                })
                  function load_data(){
                    $.get('data.php',function(data){
                      $('#user_data').html(data)
                      $('.hapusData').click(function(e){
                        e.preventDefault();
                        $.ajax({
                          type:'get',
                          url:$(this).attr('href'),
                          success:function(){
                            load_data();
                         }
                        });
                      })
                    })
                  }
                  function resetForm(){
                    $('[type=text]').val('');
                    $('[name=id]').focus();
                  }
		</script>
		
</body>
</html>
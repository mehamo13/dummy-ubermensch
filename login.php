<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ubermench";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// --- Handle Signups and Logins as before ---
function handleSignup($conn){
    // You can copy-paste the signup code from the previous version
}
function handleLogin($conn){
    // You can copy-paste the login code from the previous version
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['signup_type'])) handleSignup($conn);
    if(isset($_POST['login_type'])) handleLogin($conn);
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Übermensch – Login / Signup</title>
<link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;600&display=swap" rel="stylesheet">
<style>
/* Modern clean design */
body{
    font-family: 'Fredoka', sans-serif;
    background: #f4f6f8;
    margin:0; padding:0;
}
.container{
    width: 100%; max-width: 450px;
    margin: 50px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    overflow: hidden;
}
.tab-header{
    display: flex;
    justify-content: space-around;
    background: #0077cc;
}
.tab-header div{
    padding: 15px;
    color: #fff;
    cursor: pointer;
    flex:1;
    text-align:center;
    font-weight:600;
    transition: background 0.3s;
}
.tab-header .active{
    background: #005fa3;
}
.tab-content{
    padding: 30px;
}
.tab-content form{
    display: flex;
    flex-direction: column;
}
.tab-content input, .tab-content select{
    padding: 12px 15px;
    margin-bottom: 15px;
    border-radius: 5px;
    border:1px solid #ccc;
}
.tab-content input[type="submit"]{
    background: #0077cc;
    color: #fff;
    font-weight:600;
    cursor:pointer;
    border:none;
    transition: background 0.3s;
}
.tab-content input[type="submit"]:hover{
    background: #005fa3;
}
</style>
</head>
<body>
<div class="container">
    <div class="tab-header">
        <div class="tab-link active" data-tab="login">Login</div>
        <div class="tab-link" data-tab="signup">Sign Up</div>
    </div>
    <div class="tab-content" id="login">
        <h2>Login</h2>
        <form method="post">
            <select name="user_type_login" required>
                <option value="">Select User Type</option>
                <option value="student">Student</option>
                <option value="aidprovider">Aid Provider</option>
                <option value="admin">Admin</option>
            </select>
            <input type="text" name="username_login" placeholder="Username" required>
            <input type="password" name="password_login" placeholder="Password" required>
            <input type="submit" name="login_type" value="Login">
        </form>
    </div>
    <div class="tab-content" id="signup" style="display:none;">
        <h2>Sign Up</h2>
        <select id="signup_select">
            <option value="">Select Sign Up Type</option>
            <option value="student_signup">Student</option>
            <option value="provider_signup">Aid Provider</option>
            <option value="admin_signup">Admin</option>
        </select>

        <!-- STUDENT SIGNUP -->
        <form method="post" id="student_signup" style="display:none;">
            <input type="hidden" name="signup_type" value="student">
            <input type="text" name="name" placeholder="Full Name" required />
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="date" name="dob" required />
            <select name="gender" required>
                <option value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <input type="number" step="0.01" name="household_income" placeholder="Household Income" required />
            <input type="number" step="0.01" name="cgpa" placeholder="CGPA" required />
            <input type="number" step="0.01" name="attendance" placeholder="Attendance %" required />
            <input type="text" name="birth_certificate_id" placeholder="Birth Certificate ID" required />
            <input type="text" name="present_address" placeholder="Present Address" required />
            <input type="text" name="permanent_address" placeholder="Permanent Address" required />
            <input type="text" name="district" placeholder="District" required />
            <input type="text" name="upazila" placeholder="Upazila" required />
            <input type="number" name="institution_id" placeholder="Institution ID" required />
            <input type="number" name="region_id" placeholder="Region ID" required />
            <input type="submit" value="Sign Up">
        </form>

        <!-- PROVIDER SIGNUP -->
        <form method="post" id="provider_signup" style="display:none;">
            <input type="hidden" name="signup_type" value="provider">
            <input type="text" name="name" placeholder="Organization Name" required />
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <select name="provider_type" required>
                <option value="">Provider Type</option>
                <option value="NGO">NGO</option>
                <option value="Bank">Bank</option>
                <option value="Govt">Govt</option>
                <option value="Private Donor">Private Donor</option>
            </select>
            <input type="email" name="contact_email" placeholder="Email" required />
            <input type="text" name="contact_phone" placeholder="Phone" required />
            <input type="text" name="address" placeholder="Address" required />
            <input type="submit" value="Sign Up">
        </form>

        <!-- ADMIN SIGNUP -->
        <form method="post" id="admin_signup" style="display:none;">
            <input type="hidden" name="signup_type" value="admin">
            <input type="text" name="username" placeholder="Admin Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Sign Up">
        </form>
    </div>
</div>

<script>
// Tab switch for login/signup
const tabs = document.querySelectorAll('.tab-link');
const loginDiv = document.getElementById('login');
const signupDiv = document.getElementById('signup');
tabs.forEach(tab=>{
    tab.addEventListener('click', ()=>{
        tabs.forEach(t=>t.classList.remove('active'));
        tab.classList.add('active');
        if(tab.dataset.tab == 'login'){
            loginDiv.style.display='block';
            signupDiv.style.display='none';
        } else {
            loginDiv.style.display='none';
            signupDiv.style.display='block';
        }
    });
});

// Show signup form based on selection
const signupSelect = document.getElementById('signup_select');
const studentForm = document.getElementById('student_signup');
const providerForm = document.getElementById('provider_signup');
const adminForm = document.getElementById('admin_signup');

signupSelect.addEventListener('change', ()=>{
    studentForm.style.display='none';
    providerForm.style.display='none';
    adminForm.style.display='none';
    if(signupSelect.value=='student_signup') studentForm.style.display='block';
    if(signupSelect.value=='provider_signup') providerForm.style.display='block';
    if(signupSelect.value=='admin_signup') adminForm.style.display='block';
});
</script>
</body>
</html>

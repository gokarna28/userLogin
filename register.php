<?php
include("header.php");
?>
<div class="bg-slate-100 boarder flex flex-col items-center space-y-6 py-10">
    <h1 class="text-2xl font-bold">Registration Form</h1>
    <div id="response"></div>
    <form id="registrationForm" class="flex flex-col items-center space-y-6 w-full">
        <input class="border px-3 py-2 rounded-md w-1/4" type="text" id="user_name" placeholder="Enter your name" required>
        <input class="border px-3 py-2 rounded-md w-1/4" type="email" id="user_email" placeholder="Enter your email" required>
        <input class="border px-3 py-2 rounded-md w-1/4" type="password" id="user_password" placeholder="Enter your password" required>
        <button class="bg-sky-600 px-3 py-2 rounded-md text-white hover:bg-sky-700" type="submit">Register Now</button>
    </form>
    <div>
        already have account? <a href="login.php" class="text-blue-600">Login</a>
    </div>
</div>


<?php include("footer.php"); ?>
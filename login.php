<?php
include("header.php");
?>
<div class="bg-slate-100 boarder flex flex-col items-center space-y-6 py-10">
    <h1 class="text-2xl font-bold">Login Form</h1>
    <div id="message"></div>
    <form id="loginForm" method="POST" class="flex flex-col items-center space-y-6 w-full">
        <input class="border px-3 py-2 rounded-md w-1/4" type="email" id="login_email" placeholder="Enter your email"
            required>
        <input class="border px-3 py-2 rounded-md w-1/4" type="password" id="login_password"
            placeholder="Enter your password" required>
        <button class="bg-sky-600 px-3 py-2 rounded-md text-white hover:bg-sky-700" type="submit">Login Now</button>
    </form>
    <div>
        don't have account? <a href="register.php" class="text-blue-600">Register</a>
    </div>
</div>



<?php include("footer.php"); ?>
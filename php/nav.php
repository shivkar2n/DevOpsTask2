<?php 
if (isset($_SESSION["id"])) {
echo "<nav>
<ul>
<li><a href='/api/logout.php'>Logout</a></li>
<li><a href='/dashboard.php'>Dashboard</a></li>
<li><a href='/message.php'>Create Message</a></li>
</ul>
</nav>
<h1>$title</h1>";
} else {
echo "<nav>
<ul>
<li><a href='/register.php'>Register</a></li>
<li><a href='/login.php'>Login</a></li>
<li><a href='/dashboard.php'>Dashboard</a></li>
</ul>
</nav>
<h1>$title</h1>";
}


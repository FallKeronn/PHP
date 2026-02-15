<?php
session_start();

class Request
{

   public function get(string $key)
   {
      return $_GET[$key] ?? null;
   }

   public function post(string $key)
   {
      return $_POST[$key] ?? null;
   }

   public function request(string $key)
   {
      return $_REQUEST[$key] ?? null;
   }
}

$request = new Request();

if (!isset($_COOKIE['user'])) {
   setcookie("user", "Oleg", time() + 1200);
}

if (!isset($_SESSION['counter'])) {
   $_SESSION['counter'] = 1;
} else {
   $_SESSION['counter']++;
}
?>

<h2>GET форма</h2>
<form method="GET">
   <input type="text" name="username" placeholder="Enter name">
   <button type="submit">GET</button>
</form>

<h2>POST форма</h2>
<form method="POST">
   <input type="text" name="email" placeholder="Enter email">
   <button type="submit">POST</button>
</form>

<h3>Через wrapper:</h3>
<?php
echo "GET username: " . $request->get('username') . "<br>";
echo "POST email: " . $request->post('email') . "<br>";
?>

<h3>Через масиви:</h3>
<?php
if (!empty($_GET)) {
   echo "From \$_GET: " . $_GET['username'] . "<br>";
}

if (!empty($_POST)) {
   echo "From \$_POST: " . $_POST['email'] . "<br>";
}
?>

<h3>Через $_REQUEST:</h3>
<?php
print_r($_REQUEST);
?>

<h3>Cookie:</h3>
<?php
echo $_COOKIE['user'] ?? "Cookie not set";
?>

<h3>Session counter:</h3>
<?php
echo $_SESSION['counter'];
?>
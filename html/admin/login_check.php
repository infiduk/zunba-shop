<?
include "../common.php";

if ($adminid == $admin_id && $adminpw == $admin_pw) {
   setcookie("$cookie_admin", "yes");
   echo("<script>location.href = 'member.php'</script>");  
   }
else {
   setcookie("$cookie_admin", "");
   echo("<script>location.href = 'index.html'</script>");  
   }
?>
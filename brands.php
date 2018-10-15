<?php require 'db.php';
	  require 'session.php';

if (!isset($_SESSION['signed_in'])) {
	header('location:home.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<title>inventory</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" type="text/css" href="styles/brands.css">
</head>
<body>

<div class="header">
		
		<div class="header-left">
			<span>INVENTORY</span>
		</div>

		<div class="header-right">
				<a href="index.php?user=<?php echo $username; ?>">DASHBOARD</a>
				
				<a href="products.php?user=<?php echo $username; ?>">PRODUCTS</a>

				<a href="brands.php?user=<?php echo $username; ?>">BRANDS</a>

		   		<a href="suppliers.php?user=<?php echo $username; ?>">SUPPLIERS</a>

		   <div class="dropdown">
		        <span>SETTINGS
		        <div class="dropdown-content">
		        <a href="profile.php?user=<?php echo $username; ?>">View Profile</a>
		        <a href="profile.php?user=<?php echo $username; ?>">Edit Profile</a>
		        <a href="signout.php">Log out</a>
		        </div>
		        </span>
		   </div>
		
		</div>
</div>

<!--  -->

<p class="intro"> Dashboard / Brands </p>

<div class="add"><a href="addbrand.php">+ADD BRANDS</a></div>

<div class="body-panel">

<table border="1" width="1000" height="50">
	
	<caption>BRANDS</caption>
	

	<tr>
	<!-- <th>id</th> -->
	<th>Brand</th>
	<th>Category</th>
	<th>Status</th>
	<th>Date added</th>
	<th colspan="2">option</th>
	</tr>
	</tr>

<?php require 'db.php';

	$sql = "SELECT * FROM product where user = '$username' ORDER BY brand ASC";

    $result = mysqli_query($con,$sql);

    while ($row = mysqli_fetch_array($result)) {

?>

	<tr>
	<!-- <td> <?php echo $row['id']; ?> </td>	 -->
	<td> <?php echo $row['brand']; ?> </td>	
	<td> <?php echo $row['category']; ?> </td>	
	<td> <?php echo $row['status']; ?> </td>
	<td> <?php echo $row['date']; ?> </td>
	<td align="center">
		<a href="delete.php?id=<?php echo $row['id']?>">delete</a>
	</td>
	<td align="center">
		<a href="update.php?id=<?php echo $row['id']?>">update</a>
	</td>
	</tr>

<?php

}

?>

</table>



</div>

</body>
</html>
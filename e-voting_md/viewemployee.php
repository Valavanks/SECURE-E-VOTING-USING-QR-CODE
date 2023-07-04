<!-- DEVELOPED BY WEB ROBO -->

<!-- structure of php -->

<!Doctype>

<php>
		
	<head>
	
		<title>WEB ROBO</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body>
		<?php include 'config/db.php';
			$qry=mysql_query("select *from employee");
			?>
		<!-- wrapper starts-->
		<div id="wrapper">			
			
			<div id="header">	
				<h1>CRM</h1>
			</div>
			
			<div id="menu">		
				<ul>					
								
								
					
					<li> <a href="index2.php">QR CODE</a>  </li>			
					<li> <a href="#">FACE DETECTION</a>  </li>	
					
					<li> <a href="#">IMAGE SECURITY</a>  </li>
					
					<li> <a href="index.php">LOGOUT</a></li>			
					
				</ul>
			</div>
		
			<div id="content">	
					<h2>View Details.......</h2>
					
						<a class="add" href="addemployee.php">Add employee</a>
				
					<table align="center" cellpadding="10" cellspacing="0">
						
						<tr>
							<th>photo</th>
							<th>Firstname</th>
							<th>Contact</th>							
							<th>View</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php
							while($row=mysql_fetch_array($qry))
							{
						
						?>
						<tr>
							<td><img src="employee/<?php echo $row['image']; ?>" width="120" /> </td>
							<td><?php echo $row['fname']; ?></td>
							<td><?php echo $row['mobile']; ?></td>
							<td><a class="view" href="Viewmoreemp.php?id=<?php echo $row['eid']; ?>">View</td>
							<td><a  class="edit" href="editemployee.php?edit=<?php echo $row['eid']; ?>">Edit</td>
							<td><a class="delete" href="deleteemployee.php?delete=<?php echo $row['eid']; ?>">Delete</td>
						</tr>
						<?php
						}
						?>
					</table>
					
					
			</div>
			
			<div id="footer">			
			</div>
			
		</div>
		<!-- wrapper ends-->
	
	</body>
	

<?php
include 'dbconnection.php';
?>
<html>

<head>
<title>Book Information</title>
<link href="reg.css" rel="stylesheet">
</head>

<body>
<form action="insBook.php" method="post">
<h1>Library Database</h1>
<fieldset>
<legend>Book Information</legend>
<label>Title:</label> <input type="text" name="title" required/><br />
<label>Pages:</label> <input type="number" min=1 name="pages" required/><br />
<label>Author:</label> <input type="text" name="author" required/><br />
<label>Published Year:</label> <input type="text" name="year" required/>
<div><br/></div>
<input style="float:right" type="submit" value="Add Book" onClick="return submit_form();" name="submit"/>
</fieldset>
<h3>List of Stored Books</h3>
<table border="2" align="center" cellpadding=5>
<thead>
<tr><th>Title</th>
<th>Pages</th>
<th>Author</th>
<th>Published Year</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$result = mysqli_query($conn, "SELECT * FROM books");
while( $row = mysqli_fetch_assoc( $result ) ){
echo
"<tr>
<td contenteditable>{$row['Title']}</td>
<td contenteditable>{$row['Pages']}</td>
<td contenteditable>{$row['Author']}</td>
<td contenteditable>{$row['PublishedYear']}</td>
<td><button value='Edit'>Edit</button></td>
</tr>\n";
}
?>
</tbody>
</table>
</form>
<script type="text/javascript" src="jquery-1.10.2.js"></script>
<script type="text/javascript">
function submit_form(){
alert("A new book has been successfully added!");
}
</script>
<?php
$conn->close();
?>
</body>
</html>
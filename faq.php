<?php
	session_start();
	include_once("commons/connection.php");
	
	$con = createConnection();
	

	$sql = "SELECT * FROM faq";
	$result = mysqli_query($con, $sql);
	
	
	include_once("commons/header.php");
	include_once("assets/small/whatsapp.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faq</title>
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="../assets/fontawesome-free-6.2.0-web/css/all.css">
</head>
<body>
<div id="content"> 
    <div class="judulProduk">
        <H1>FaQ</H1>
    </div>
    
    <div class="container">
        <table id="tabel" class="table table-striped">
            <thead>
                <tr>
                    <th>FAQ</th>
                </tr>
            </thead>
            <tbody>
        <?php
            while($hasil = mysqli_fetch_assoc($result)){
                echo '<tr><td>';
                echo '<button type="button" class="faq">'.$hasil['pertanyaan'].'</button>';
                echo '<div class="content">';
                echo '<p>'.$hasil['jawaban'].'</p></div>';
                echo '</tr></td>';
            }
        ?>
        </tbody>
        </table>
    </div>
    


<script>
    var coll = document.getElementsByClassName("faq");
    var i;

    for (i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function() {
        this.classList.toggle("activeFaq");
        var content = this.nextElementSibling;
        if (content.style.display === "block") {
        content.style.display = "none";
        } else {
        content.style.display = "block";
        }
    });
    }
    $(document).ready(function () {
        $('#tabel').DataTable();
    });
</script>
<?php
    include_once("commons/footer.php");

?>
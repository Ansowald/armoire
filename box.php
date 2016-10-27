<?php
	$output = shell_exec('python onebox.py '.$_GET["boxId"]);
	$obj = json_decode($output);
?>
<html>
<head>
        <title>Reservation</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="box.js"></script>
</head>

<body>
    <div id="page">   
        <article>
		<?php
			foreach ($obj as $value){
				if(!$value[10] != null){
					echo '<div id="'.$value[8].'" class="buttonSet take">Emprunter l\'objet : '.$value[9].'</div>';
				}else{
					echo '<div id="'.$value[8].'" class="buttonSet put">Remettre l\'objet : '.$value[9].'</div>';	
				}
			}
		?>
		</article>
        <footer><!-- Pied-de-page de la page -> site --></footer>
        
    </div>
</body>
</html>
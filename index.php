<?php
	$output = shell_exec('python allboxes.py');
	$obj = json_decode($output);	
?>
<html>
<head>
        <title>Reservation</title>
        <meta charset="utf-8">
        <meta name="description" content="165c. uniques">
		<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
		<script type="text/javascript" src="jquery-3.1.0.min.js"></script>
		<script type="text/javascript" src="index.js"></script>
</head>

<body>
    <div id="page">   
        <article>
		<?php
			foreach ($obj as $value){
			if($value[9] == null || $value[10] != null){
					if($value[9] != null){
						echo '<div id="'.$value[0].'" class="box box_red">';
						echo $value[9];
					
						if($value[10] != null){
							
							echo '<br/>';
							echo 'Emprunté par : '.$value[14];
							echo '<br/>';
							echo ' le : '.$value[12];
							
						}
					}else
					{
						echo '<div id="'.$value[0].'" class="box box_red box_empty">';
					}
				}else {

					echo '<div id="'.$value[0].'" class="box box_green">';
					echo $value[9];
				}
				echo '</div>';
			}
		?>
		</article>
        <footer><!-- Pied-de-page de la page -> site --></footer>
        
    </div>
</body>
</html>
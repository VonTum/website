<?php header('Refresh: 60'); ?>
<?php
 // Edit this ->
 define( 'MQ_SERVER_ADDR', 'hybat.tk' );
 define( 'MQ_SERVER_PORT', 25566 );
 define( 'MQ_TIMEOUT', 1 );
 // Edit this <-
 
 // Display everything in browser, because some people can't look in logs for errors
 Error_Reporting( E_ALL | E_STRICT );
 Ini_Set( 'display_errors', true );
 
 require __DIR__ . '/MinecraftQuery.class.php';
 
 $Timer = MicroTime( true );
 
 $Query = new MinecraftQuery( );
 
 try
 {
  $Query->Connect( MQ_SERVER_ADDR, MQ_SERVER_PORT, MQ_TIMEOUT );
 }
 catch( MinecraftQueryException $e )
 {
  $Exception = $e;
 }
 
 $Timer = Number_Format( MicroTime( true ) - $Timer, 4, '.', '' );
?>
<!DOCTYPE html>

<html>
 <head>
  <meta charset="utf-8">
  
  <style>
   .border{
   
   border:1px solid #368DBE;
   border-top:1px solid #c3d6df;
   border-radius:10px
   
   }
   
   .font{
   
   font-family:Verdana;
   
   }
   
  </style>
  
 </head>
 <body bgcolor="#7cb8df">


  <div class="border font" style="background-color:#bae5f0;min-height:50px">
   <table width="100%">

   
   
   
   
<?php // Player count and players online script
if( ( $Info = $Query->GetInfo( ) ) !== false ):
	
	echo '<div style="color:green;font-size:25px">Server is online!</div><div>ip: hybat.tk</div>';
	echo '<div style="color:red">' . $Info['Software'] . ' ' . $Info['GameType'] . ' ' . $Info['Version'] . '</div>';
	
	
	echo '<div align="center" style="font-size:20px">' . $Info['Players'] . "/" . $Info['MaxPlayers'] . " players online.</div>";
Else:
	echo '<div style="color:red;font-size:25px">Server is offline!</div><div>ip: hybat.tk</div>';
	
	
	
	
	echo '<div align="center" style="font-size:20px">0/0 players online</div>';
	
	
	$RawPlayers = file_get_contents("/home/hybat/server/whitelist.json");
	$PlayerArray = json_decode($RawPlayers,true);
	foreach($PlayerArray as $PlayerID => $Array):
		$Players[$PlayerID] = $Array['name'];
	endforeach;
	
	foreach($Players as $Player):
		echo '<tr><th><div style="height:40px"><img src="Pictures/unknown.png"></th><th> ' . $Player . '</th><th> <img style="display:inline" src="https://minotar.net/avatar/' . $Player . '/32"></th></div>';
	endforeach;
	goto end;
endif;
	

$RawPlayers = file_get_contents("/home/hybat/server/whitelist.json");
$PlayerArray = json_decode($RawPlayers,true);
foreach($PlayerArray as $PlayerID => $Array):
	$Players[$PlayerID] = $Array['name'];
endforeach;
// $Players=array("lennartVH01","Monkey0x9","MasterMS2","olympus223","MvC_Toxic","Enoxbe","duck_owner","Pieter_1511","rethert29","SamXevor");
if( ( $OnlinePlayers = $Query->GetPlayers( ) ) !== false ):
	foreach($OnlinePlayers as $PlayerSyntax):
		$Player=htmlspecialchars($PlayerSyntax); 
		echo '<tr><th><div style="height:40px"><img src="Pictures/online.png"></th><th> ' . $Player . '</th><th> <img style="display:inline" src="https://minotar.net/avatar/' . $Player . '/32"></th></div>';
	endforeach;

	foreach($Players as $Player):
		
		foreach($OnlinePlayers as $PlayerSyntax): 
			
			$OnPlayer=htmlspecialchars($PlayerSyntax); 
			
			
			if ($OnPlayer==$Player):
				
								
				goto FoundPlayer;
			endif;
		endforeach;
		
		echo '<tr><th><div style="height:40px"><img src="Pictures/offline.png"></th><th> ' . $Player . '</th><th> <img style="display:inline" src="https://minotar.net/avatar/' . $Player . '/32"></th></div>';
		
		FoundPlayer:
	endforeach;

else:
	foreach($Players as $Player):
		echo '<tr><th><div style="height:40px"><img src="Pictures/offline.png"></th><th> ' . $Player . '</th><th> <img style="display:inline" src="https://minotar.net/avatar/' . $Player . '/32"></th></div>';
	endforeach;
endif; 
end:?>

   </table>
  </div>  
 </body>
</html>
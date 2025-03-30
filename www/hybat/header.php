<!DOCTYPE html>
<html>
 <head>
  <title>Hybat</title>

 </head>

 <body bgcolor="#7cb8df">
 
<?php
	require __DIR__ . '/SourceQuery/SourceQuery.class.php';

	// For the sake of this example
	Header( 'Content-Type: text/plain' );

	// Edit this ->
	define( 'SQ_SERVER_ADDR', 'hybat.tk' );
	define( 'SQ_SERVER_PORT', 25566 );
	define( 'SQ_TIMEOUT',     1 );
	define( 'SQ_ENGINE',      SourceQuery :: SOURCE );
	// Edit this <-

	$Query = new SourceQuery( );

	try
	{
		$Query->Connect( SQ_SERVER_ADDR, SQ_SERVER_PORT, SQ_TIMEOUT, SQ_ENGINE );

		print_r( $Query->GetInfo( ) );
		print_r( $Query->GetPlayers( ) );
		print_r( $Query->GetRules( ) );
	}
	catch( Exception $e )
	{
		echo $e->getMessage( );
	}

	$Query->Disconnect( );?>
 
 </body>
</html>

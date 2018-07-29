<html>
	<head>		
		<title>
			Craps
				</title>
					<style>	
						.image
						{
							float: left;
							width: 20%;
							padding: 5px;
							text-align: center;
						}			
						</style>
							</head>
								<body>
									<form name="index" method="POST" action="index.php">
												<p id="point">Point</p>
												<p id="status">Status</p> <br/><br/>
												<button type="button" onclick="play()" style="width: 20%;font-size: 28px;">
												Roll
												</button><br/>
												<div class="image">
													<img src="diceno1.jpg" id="dice1" style="width:100%">
												</div>
												<div class="image">
													<img src="diceno2.jpg" id="dice2" style="width:100%">
												</div>		
									</form>
									
								</body>

							</html>

							<script type="text/javascript">
								function rollDice()
								{
									var dice1 = 0, dice2 = 0;
									
									dice1 = Math.floor( 1 + Math.random() * 6 );
									switch (dice1)
									{
										case 1:
											document.getElementById("dice1").src = "dice1.jpg";
											break;
										case 2:
											document.getElementById("dice1").src = "dice2.jpg";
											break;
										case 3:
											document.getElementById("dice1").src = "dice3.jpg";
											break;
										case 4:
											document.getElementById("dice1").src = "dice4.jpg";
											break;
										case 5:
											document.getElementById("dice1").src = "dice5.jpg";
											break;
										case 6:
											document.getElementById("dice1").src = "dice6.jpg";
											break;
									}
									
									dice2 = Math.floor( 1 + Math.random() * 6 );
									switch (dice2)
									{
										case 1:
											document.getElementById("dice2").src = "dice1.jpg";
											break;
										case 2:
											document.getElementById("dice2").src = "dice2.jpg";
											break;
										case 3:
											document.getElementById("dice2").src = "dice3.jpg";
											break;
										case 4:
											document.getElementById("dice2").src = "dice4.jpg";
											break;
										case 5:
											document.getElementById("dice2").src = "dice5.jpg";
											break;
										case 6:
											document.getElementById("dice2").src = "dice6.jpg";
											break;
									}
									
									return dice1 + dice2;
								}

								// variables used to test the state of the game
								var WON = 0, LOST = 1, CONTINUE_ROLLING = 2;
								// other variables used in program
								var firstRoll = true,    // true if first roll
									sumOfDice = 0,        // sum of the dice
									myPoint = 0,           // point if no win/loss on first roll
									gameStatus = CONTINUE_ROLLING;  // game not over yet
								

								// process one roll of the dice
								function play()
								{
									if ( firstRoll ) {
										// first roll of the dice
										sumOfDice = rollDice();
										switch ( sumOfDice )
										{
											case 7: case 11:
												// win on first roll
												gameStatus = WON;
												document.getElementById("point").value = ""; // clear point field
												location.reload(true);
												break;
											
											case 2: case 3: case 12:
												// lose on first roll
												gameStatus = LOST;
												document.getElementById("point").value = ""; // clear point field
												location.reload(true);
												break;
											
											default:
												// remember point
												gameStatus = CONTINUE_ROLLING;
												myPoint = sumOfDice;
												document.getElementById("point").innerHTML = "Point: "+myPoint;
												firstRoll = false;
										}
									}
									else
									{
										sumOfDice = rollDice();
										
										if ( sumOfDice == myPoint )
										{
											gameStatus = WON;
										}
										else if ( sumOfDice == 7 || sumOfDice == 11 )
										{
											gameStatus = LOST;
										}
										else
										{
											myPoint = sumOfDice;
											document.getElementById("point").innerHTML = "Point: "+myPoint;
										}
									}
									
									if ( gameStatus == CONTINUE_ROLLING )
									{
										//window.alert ("Roll again");
										document.getElementById("status").innerHTML = "Roll Again";
									}
									else
									{
										if ( gameStatus == WON )
										{
											setTimeout(function ()
											{
												window.alert ("Player wins. " + "Click Roll Dice to play again.");
											}, 10000)
											document.getElementById("status").innerHTML = "Player wins.";
											document.getElementById("point").value = "";
											location.reload(true);
										}
										else
										{
											setTimeout(function ()
											{
												window.alert ("Player loses. " + "Click Roll Dice to play again.");
											}, 10000)
											document.getElementById("status").innerHTML = "Player loses.";
											document.getElementById("point").value = "";
											location.reload(true);
										}
										firstRoll = true;
									}
								}
							</script>
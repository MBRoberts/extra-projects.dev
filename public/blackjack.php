<?php

// complete all "todo"s to build a blackjack game

// create an array for suits
$suits = ['C', 'H', 'S', 'D'];

// create an array for cards
$cards = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

// build a deck (array) of cards
// card values should be "VALUE SUIT". ex: "7 H"
// make sure to shuffle the deck before returning it

function buildDeck($suits, $cards) {
	$deck = [];
	foreach ($suits as $suit) {
		foreach ($cards as $card) {
			array_push($deck, ($suit . " " . $card));
		};
	};
	shuffle($deck);
	return $deck;
};

// determine if a card is an ace
// return true for ace, false for anything else

function cardIsAce($card) {
	if (strpos($card, 'A') === false){
		return false;
	}
	return true;
}

// determine the value of an individual card (string)
// aces are worth 11
// face cards are worth 10
// numeric cards are worth their value
function getCardValue($card) {
	switch ($card) {
		case (cardIsAce($card)) :
			return 11;
			break;
		case (ctype_alpha($card)) :
			return 10;
			break;
		default :
			return (int)substr($card, -2);
			break;
	}
}

// get total value for a hand of cards
// don't forget to factor in aces
// aces can be 1 or 11 (make them 1 if total value is over 21)
function getHandTotal($hand = []) {

	for ($i = 0; $i < count($hand); $i++) {
		$total = getCardValue($hand[$i]) + getCardValue($hand[($i+1)]);
	}
	if((cardIsAce($hand[0]) || cardIsAce($hand[1])) && $total > 21) {
		$total -= 10;
	}
	
	return $total;
}

// draw a card from the deck into a hand
// pass by reference (both hand and deck passed in are modified)
function drawCard(&$hand = [], &$deck) {
	$drawnCard = $deck[array_rand($deck)];
	unset($deck[array_search($drawnCard, $deck)]);
	array_push($hand, $drawnCard);
}

// print out a hand of cards
// name is the name of the player
// hidden is to initially show only first card of hand (for dealer)
// output should look like this:
// Dealer: [4 C] [???] Total: ???
// or:
// Player: [J D] [2 D] Total: 12
function echoHand($hand, $name, $hidden = false) {
	echo "{$name}: ";
	foreach ($hand as $key => $card) {
		if ($hidden == true && $key == 1){
			echo '[???]';
		} else {
			echo "$card ";
		}
	}
	if ($hidden == true) {
		echo " Total: ???" . PHP_EOL;
	} else {
		echo " Total: ". getHandTotal($hand) . PHP_EOL;
	}
}

// build the deck of cards
$deck = buildDeck($suits, $cards);
var_dump($deck);

// initialize a dealer and player hand
$dealer = [
	'name' => 'Dealer',
	'hand' => []
];
$player = [
	'name' => 'Player',
	'hand' => []	
];

// dealer and player each draw two cards

drawCard($dealer['hand'],$deck);
drawCard($player['hand'], $deck);

drawCard($dealer['hand'],$deck);
drawCard($player['hand'], $deck);
var_dump($dealer['hand']);
var_dump($player['hand']);

// echo the dealer hand, only showing the first card
echoHand($dealer['hand'], $dealer['name'], true);

// echo the player hand
echoHand($player['hand'], $player['name']);


// allow player to "(H)it or (S)tay?" till they bust (exceed 21) or stay
while (getHandTotal($player['hand']) <= 21) {
	fwrite(STDOUT, "(H)it or (S)tay? ". PHP_EOL);
	$response = trim(fgets(STDIN));
	if ($response == 'h') {
		drawCard($player['hand'], $deck);
		echoHand($player['hand'], $player['name']);
	} else if ($response == 's') {
		break;
	} else {
		echo "Invalid Response" . PHP_EOL;
	}
}

// show the dealer's hand (all cards)
echoHand($dealer['hand'], $dealer['name']);


// todo (all comments below)

// at this point, if the player has more than 21, tell them they busted
if (getHandTotal($player['hand']) > 21) {
	echo "YOU'RE BUSTED!!" . PHP_EOL;
	die;
}
// otherwise, if they have 21, tell them they won (regardless of dealer hand)
if (getHandTotal($player['hand']) == 21) {
	echo "YOU WIN!!";
	die;
}

// if neither of the above are true, then the dealer needs to draw more cards
// dealer draws until their hand has a value of at least 17
while(getHandTotal($dealer['hand']) < 17) {
	drawCard($dealer['hand'], $deck);
	// show the dealer hand each time they draw a card
	echoHand($dealer['hand'], $dealer['name']);
}


// finally, we can check and see who won
// by this point, if dealer has busted, then player automatically wins
if (getHandTotal($dealer['hand']) > 21) {
	echo "DEALER BUSTS, YOU WIN!!!" . PHP_EOL;
}
// if player and dealer tie, it is a "push"
else if (getHandTotal($dealer['hand']) == getHandTotal($player['hand'])) {
	echo "YOU PUSH!!" . PHP_EOL;
}
// if dealer has more than player, dealer wins, otherwise, player wins
else if (getHandTotal($dealer['hand']) > getHandTotal($player['hand'])) {
	echo "YOU LOSE!!!" . PHP_EOL;
} else if (getHandTotal($player['hand']) > getHandTotal($dealer['hand'])) {
	echo "YOU WIN!!!" . PHP_EOL;
}









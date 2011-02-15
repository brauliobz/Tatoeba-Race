race = {};

race.text = "Waiting for text...";

race.startTime = 0;
race.updateInterval = 0.1; // in seconds
race.timer = null;
race.countDownLength = 3; // in seconds

/** In chars/s: characters per second */
race.getCurrSpeed = function() {
	return race.getPosition() / race.getCurrTime();
}

race.getCurrTime = function() {
	return (new Date()).getTime() / 1000.0 - race.startTime;
}

race.timerFunction = function() {
	$('time').textContent = race.getCurrTime().toFixed(1) + ' s';

	pos = race.getPosition();

	wpm = race.getCurrSpeed() / 5.0 * 60.0;
	$('speed').textContent = wpm.toFixed(1) + ' wpm' +
			' (' + race.getCurrSpeed().toFixed(2) + ' chars/s)';
	
	$('text').textContent = '';
	$('text').insert('<span class="correctText">' +
			race.text.slice(0,pos) + '</span>' +
			race.text.slice(pos));
	
	if ( pos == race.text.length ) {
		race.timer.stop();
		$('keyboardInput').disable();
		$('btnPlayAgain').show();
		$('btnPlayAgain').focus();
	}
}

race.start = function() {
	race.startTime = (new Date()).getTime() / 1000.0;
	race.timer = new PeriodicalExecuter(
		race.timerFunction, race.updateInterval );
	$('keyboardInput').enable();
	$('keyboardInput').focus();
}

race.startCountDown = function() {
	race.countDownCounter = race.countDownLength;
	new PeriodicalExecuter(
		function() {
			if ( race.countDownCounter > 0 ) {
				$('countDown').style.color = 'red';
				$('countDown').textContent = race.countDownCounter;
				race.countDownCounter--;
			} else if (race.countDownCounter == 0) {
				$('countDown').style.color = 'green';
				$('countDown').textContent = 'GO!';
				race.countDownCounter--;
				race.start();
			} else {
				$('countDown').textContent = '';
				this.stop();
			}
		},
		1);
}

race.getPosition = function() {
	text = race.text;
	userText = $('keyboardInput').value;
	
	pos = 0;
	while ( pos <= userText.length-1 && pos <= text.length-1 ) {
		if ( userText[pos] === text[pos] )
			pos++;
		else
			break;
	}

	return pos;
}

race.getTextAndStartCountDown = function() {
	// get text from Ajax
	new Ajax.Request( 'getRandomSentence.php', {
		method: 'get',
		parameters: {'lang': 'fra'},
		onSuccess: function( transport ) {
			race.text = transport.responseText;
			$('text').textContent = race.text;
			race.startCountDown();
		}});
}



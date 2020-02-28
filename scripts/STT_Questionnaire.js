let message = document.querySelector('#DEBUG_MESSAGE');
const btnCommand=document.getElementById("Voice_Answer");
const btnCommandList= btnCommand.classList;
let isRecording = false;
let language=document.querySelector('#lang');
var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;
let grammar = '#JSGF V1.0;';
let recognition = new SpeechRecognition();
let speechRecognitionList = new SpeechGrammarList();
let form= document.querySelector('numberForm');
speechRecognitionList.addFromString(grammar, 1);
recognition.grammars = speechRecognitionList;
recognition.lang = lang;
recognition.interimResults = false; // Otherwise it will process while speaking
recognition.onresult = function(event) {
	let last = event.results.length - 1;
	let command = (event.results[last][0].transcript).toLowerCase(); // to access the recognised string
	console.log(command);
	if(contains(command,['alt','alw','yes','ja','outlet'])) {
		submitTheScore(4,"Always");
	}
	else if(contains(command,['va','often','usually','most','fa','af'])) {
		submitTheScore(3,"Often");
	}
	else if(contains(command,['som','may','ok',])) {
		submitTheScore(2,"Sometimes");
	}
	else if(contains(command,['zel','sel','rare','rally'])) {
		submitTheScore(1,"Seldom");
	}
	else if(contains(command,['no','never','nee'])) {
		submitTheScore(0,"Never");
	}
	else if(command.toLowerCase() === '') {
		console.log(command);
	}
	else{
		console.log(command);
	}
};
recognition.onspeechend = function() {
	isRecording = false;
	recognition.stop();
	btnCommandList.remove('micro-active');
};
recognition.onerror = function(event) {
	isRecording = false;
	btnCommandList.remove('micro-active');
	message.textContent = 'Er is iets fout gelopen: ' + event.error;
};
document.querySelector('#Voice_Answer').addEventListener('click', function(){
	if (isRecording === false)
	{
		isRecording = true;
		btnCommandList.add('micro-active');
		recognition.start();
	} else { // IF IT IS ALREADY RECORDING --> REMOVE RED
		btnCommandList.remove('micro-active');
		recognition.stop();
		isRecording = false;
	}

});
function contains(target, pattern){
	let value = 0;
	pattern.forEach(function(word){
		value += target.includes(word);
	});
	return (value === 1)
}
function submitTheScore(score,btn) {
	btnNormal();
	document.querySelector('#img'+btn).src=base_url_img+btn+"_Full.svg";
	//document.querySelector('#score').removeAttribute("value");
	document.querySelector('#score').setAttribute("value",score);
	setTimeout(function (){
		document.querySelector('#numberForm').submit();
	}, 1000);
}


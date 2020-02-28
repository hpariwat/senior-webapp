var base_url=window.location.origin;
let isRecording = false;
const lang= document.getElementById("lang").value;
// Buttons
//let messageContent=document.querySelector('#DEBUG_MESSAGE').textContent;
const btnCommand=document.getElementById("btnGiveCommand");
const btnCommandList= btnCommand.classList;
const cardCommandList=	document.getElementById("card-command").classList;
// Speech parameters
var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var SpeechGrammarList = SpeechGrammarList || webkitSpeechGrammarList;
const grammar = '#JSGF V1.0;';
let recognition = new SpeechRecognition();
let speechRecognitionList = new SpeechGrammarList();
recognition.lang = 'nl';
speechRecognitionList.addFromString(grammar, 1);
recognition.grammars = speechRecognitionList;
recognition.interimResults = false; // Otherwise it will process while speaking
recognition.onresult = function(event) {
	const last = event.results.length - 1;
	let command = (event.results[last][0].transcript).toLowerCase(); // to access the recognised string
	console.log(command);
	if(contains(command,['kalender','calendar','event','activit'])) window.location.href = "calendar_CA";
	else if(contains(command,['statisti','data','feedback','feel'])) window.location.href = "statistics_CA";
	else if(contains(command,['question','vragen','feedback','vraag'])) window.location.href = "feedback_CA";
	else if(contains(command,['afmelden','ou','quit','exit'])) window.location.href = "home_CA/logout";
	else if(contains(command,['bewoner','resident','inhabit', 'old', 'elder','adult'])) window.location.href = "residents_CA";
	else if(contains(command,['instelling','setting','option','change','reset','help','send','call','phone','foo','mail'])) window.location.href = "settings_CA";
	else if(contains(command,['not','noo','todo','two','to do'])){
		$('#add-personal-todo').modal();
	}
	else {
		if(lang==='en'){
			document.getElementById("DEBUG_MESSAGE").value = "Sorry, I don't understand what you meant by '" + command + "'. You can say something like 'I want to add some notes'";
		}
		else{
			document.getElementById("DEBUG_MESSAGE").value = "Sorry, ik versta niet wat je bedoelt met '" + command + "'. Je kan iets zeggen aals 'Ik wil een notitie toevoegen'";
		}
	}
};
let siriWave = new SiriWave({
	container: document.getElementById('siri-container'),
	width: $('#siri-space').width(),
	height: 65,
	amplitude: 1.6,
	color: "#0288D1",
});
siriWave.start();
siriWave.stop();
recognition.onspeechend = function() {
	isRecording = false;
	document.getElementById("DEBUG_MESSAGE").value = "";
	recognition.stop();
	btnCommandList.remove('micro-active');
	cardCommandList.remove('micro-around');
	siriWave.stop();
};
recognition.onerror = function() {
	isRecording = false;
	btnCommandList.remove('micro-active');
	cardCommandList.remove('micro-around');
	if(lang==='en')
		document.getElementById("DEBUG_MESSAGE").value = "Oops, I didn't here anything... Can you speak up a bit and if it does not work then, could you check if the microphone is turned on?";
	else
		document.getElementById("DEBUG_MESSAGE").value = "Oeps, ik heb niets gehoord... Kan je luider spreken en als het dan niet werkt kijken of je microfoon aan staat";
	siriWave.stop();
};
document.querySelector('#btnGiveCommand').addEventListener('click', function(){
	console.log(isRecording);
	if (isRecording === false) {
		isRecording = true;
		btnCommandList.add('micro-active');
		cardCommandList.add('micro-around');
		if(lang==='en')
			document.getElementById("DEBUG_MESSAGE").value =  "You can speak now. I'm listening!";
		else
			document.getElementById("DEBUG_MESSAGE").value= "Je kan praten, ik ben aan het luisteren";
		recognition.start();
		siriWave.start();
	} else {
		isRecording = false;
		btnCommandList.remove('micro-active');
		cardCommandList.remove('micro-around');
		document.getElementById("DEBUG_MESSAGE").value =  "";
		recognition.stop();
		siriWave.stop();
	}
	console.log(isRecording);
});
function contains(target, pattern){
	let value = 0;
	pattern.forEach(function(word){
		value += target.includes(word);
	});
	return (value === 1)
}

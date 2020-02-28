let base_url=window.location.origin;
let btnSpeak = document.querySelector('#Read_Out');
let text_stelling_nl=document.querySelector('#text_question_nl').value;
let text_stelling_en=document.querySelector('#text_question_en').value;
let number_question= document.querySelector('#number_question');
let lang= document.querySelector('#lang').value;
let synth = window.speechSynthesis;
let speech_Voice;
let last_clicked = 0;
let speech_Rate=0.7;
PopulateVoices();
if(speechSynthesis !== undefined) {
	speechSynthesis.onvoiceschanged = PopulateVoices;
}
function Speaking(toSpeak) {
	toSpeak.voice=speech_Voice;
	toSpeak.rate=speech_Rate;
	synth.speak(toSpeak);
}

function PopulateVoices(){
	let voices = synth.getVoices();
	voices.forEach((voice) => {

		if (lang==='nl' &&voice.name === "Google Nederlands") {
			speech_Voice = voice;
		}
		if (lang==='en'&&voice.name === "Google UK English Male") {
			speech_Voice = voice;
		}
	});
}
btnSpeak.addEventListener('click', ()=> {
	if (Date.now() - last_clicked < 6000) return; // anti spam
	last_clicked = Date.now();
	let text;
	if(lang==="nl") {
		text = new SpeechSynthesisUtterance("Vraag" + number_question.value.toString());
		Speaking(text);
		text = new SpeechSynthesisUtterance(text_stelling_nl.toString());
		Speaking(text);
	}
	if(lang==='en') {
		text = new SpeechSynthesisUtterance("Question" + number_question.value.toString());
		Speaking(text);
		text = new SpeechSynthesisUtterance(text_stelling_en.toString());
		Speaking(text);
	}
});

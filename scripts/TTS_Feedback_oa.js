const btnSpeak = document.querySelector('#Read_Out');
const text_stelling_nl=document.querySelector('#text_question_nl').value;
const text_stelling_en=document.querySelector('#text_question_en').value;
const lang= document.querySelector('#lang').value;
const synth = window.speechSynthesis;
let speech_Voice;
let last_clicked = 0;

const speech_Rate=0.7;

PopulateVoices();

if(speechSynthesis !== undefined) {
	speechSynthesis.onvoiceschanged = PopulateVoices;
}



function PopulateVoices(){
	synth.getVoices().forEach((voice) => {
		if ((lang==='nl' &&voice.name === "Google Nederlands") || (lang==='en'&&voice.name === "Google UK English Male")) {
			speech_Voice = voice;
		}
	});
}

btnSpeak.addEventListener('click', ()=> {
	if (Date.now() - last_clicked < 6000) return; // anti spam
	last_clicked = Date.now();
	if(lang==="nl") {
		let text = new SpeechSynthesisUtterance("De verzorgers willen weten:");
		Speaking(text);
		text = new SpeechSynthesisUtterance(text_stelling_nl.toString());
		Speaking(text);
	}
	if(lang==='en') {
		let text = new SpeechSynthesisUtterance("The caregivers want to know:");
		Speaking(text);
		text = new SpeechSynthesisUtterance(text_stelling_en.toString());
		Speaking(text);
	}
});
function Speaking(toSpeak) {
	toSpeak.voice=speech_Voice;
	toSpeak.rate=speech_Rate;
	synth.speak(toSpeak);
}

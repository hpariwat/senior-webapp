// INITIALISATION
const tot_topic = document.querySelector('#total_topic').value;
const nr_topic = document.querySelector('#number_question').value;
const element = document.getElementById("myBar");
let width = (nr_topic-1)*(100/(tot_topic));

// MAIN
calcWidth();

//FUNCTIONS
function calcWidth() {
	if(width > 100) {width = 0;}
	element.style.width = width + '%';
	if(width!==0){
		element.innerHTML = (nr_topic-1) + "/" + tot_topic + " vragen ingevuld";
	}
	else{
		element.innerHTML = "";
	}
}

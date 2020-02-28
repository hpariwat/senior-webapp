// INITIALISATION
// BG OF QUESTION
let bgQuestion=document.querySelector('.question');
// Buttons
let btnNever=document.querySelector('#one');
let btnSeldom=document.querySelector('#two');
let btnSometimes=document.querySelector('#three');
let btnOften=document.querySelector('#four');
let btnAlways=document.querySelector('#five');
let btnNext=document.querySelector('#btnSubmit');
// Images
let imgNever=document.querySelector('#imgNever');
let imgSeldom=document.querySelector('#imgSeldom');
let imgSometimes=document.querySelector('#imgSometimes');
let imgOften=document.querySelector('#imgOften');
let imgAlways=document.querySelector('#imgAlways');
//Links
let base_url_img=window.location.origin+"/assets/img/icons/";

// MAIN
disableNext();

// LISTENERS
btnAlways.addEventListener('click' ,function(){
	enableNext();
	bgQuestion.style.backgroundColor = '#4CC444';
	imgAlways.src=base_url_img+"Always_Full.svg";
});
btnOften.addEventListener('click' ,function(){
	enableNext();
	bgQuestion.style.backgroundColor = '#B1E689';
	imgOften.src=base_url_img+"Often_Full.svg";
});
btnSometimes.addEventListener('click' ,function(){
	enableNext();
	bgQuestion.style.backgroundColor = '#FFF895';
	imgSometimes.src=base_url_img+"Sometimes_Full.svg";
});
btnSeldom.addEventListener('click' ,function(){
	enableNext();
	bgQuestion.style.backgroundColor = '#F9A66C';
	imgSeldom.src=base_url_img+"Seldom_Full.svg";
});
btnNever.addEventListener('click' ,function(){
	enableNext();
	bgQuestion.style.backgroundColor = '#F17A7E';
	imgNever.src=base_url_img+"Never_Full.svg";
});

// FUNCTIONS
function enableNext() {
	console.log("enableNext()" + btnNext.disabled);
	btnNext.disabled=false;
	btnNext.style.backgroundColor='#2274A5';
	btnNormal()
}
function disableNext(){
	bgQuestion.style.backgroundColor = '#F1F1F1';
	btnNext.style.backgroundColor='#F1F1F1';
	btnNext.style.color='#F1F1F1';
	btnNext.disabled=true;

}
function btnNormal() {
	imgAlways.src=base_url_img+"Always.svg";
	imgOften.src=base_url_img+"Often.svg";
	imgSometimes.src=base_url_img+"Sometimes.svg";
	imgSeldom.src=base_url_img+"Seldom.svg";
	imgNever.src=base_url_img+"Never.svg";
}

const tour = new Shepherd.Tour({
	useModalOverlay: true,
	defaultStepOptions: {
		cancelIcon: {
			enabled: true
		},
		classes: 'shepherd-theme-arrows',
		scrollTo: true
	}
});

tour.addStep({
	id: 'step1',
	title: 'Stap 1',
	text: 'Druk op deze knop als u terug wilt gaan naar de startpagina.',
	attachTo: {
		element: '.btnHome',
		on: 'bottom'
	},
	buttons: [
		{
			action() {
				return this.cancel();
			},
			classes: 'shepherd-button-secondary',
			text: 'Stop'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});

tour.addStep({
	id: 'step2',
	title: 'Stap 2',
	text: 'Hier wordt de categorie van de vraag weergegeven.',
	attachTo: {
		element: '#category',
		on: 'bottom'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});

tour.addStep({
	id: 'step3',
	title: 'Stap 3',
	text: 'Hier ziet u hoeveel vragen u al heeft ingevuld van de huidige categorie.',
	attachTo: {
		element: '#myProgress',
		on: 'bottom'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});

tour.addStep({
	id: 'step4',
	title: 'Stap 4',
	text: 'Hier staat de vraag die u moet beantwoorden.',
	attachTo: {
		element: '.question',
		on: 'bottom'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});


tour.addStep({
	id: 'step5',
	title: 'Stap 5',
	text: 'Druk op deze knop als u wilt dat de vraag luidop wordt voorgelezen.',
	attachTo: {
		element: '#Read_Out',
		on: 'bottom'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});

tour.addStep({
	id: 'step6',
	title: 'Stap 6',
	text: 'Druk op een van deze knoppen om te antwoorden op de vraag.',
	attachTo: {
		element: '#answers',
		on: 'bottom'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});

tour.addStep({
	id: 'step7',
	title: 'Stap 7',
	text: 'Druk op deze knop om te antwoorden op de vraag door middel van spraak.',
	attachTo: {
		element: '#Voice_Answer',
		on: 'top'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Volgende'
		}
	]
});


tour.addStep({
	id: 'step8',
	title: 'Stap 8',
	text: 'Druk op deze knop om uw antwoord op de vraag te bevestigen.',
	attachTo: {
		element: '#btnSubmit',
		on: 'top'
	},
	buttons: [
		{
			action() {
				return this.back();
			},
			classes: 'shepherd-button-secondary',
			text: 'Vorige'
		},
		{
			action() {
				return this.next();
			},
			text: 'Gedaan'
		}
	]
});



function StartOnboarding(){
	if (document.querySelector('#btnSubmit').disabled === true) tour.removeStep('step8');
	tour.start();
}

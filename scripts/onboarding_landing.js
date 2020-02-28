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
	text: 'Druk op deze knop en kies in welke taal u de website wilt gebruiken.',
	attachTo: {
		element: '.taalBtn',
		on: 'right'
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
	text: 'Druk op deze knop als u een inwoner bent van Ter Vlierbeke.',
	attachTo: {
		element: '.button1',
		on: 'top'
	},
	buttons: [
		{
			action() {
				return this.back();
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
	id: 'step3',
	title: 'Stap 3',
	text: 'Druk op deze knop als u een verzorger bent van Ter Vlierbeke.',
	attachTo: {
		element: '.button2',
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
	tour.start();
}

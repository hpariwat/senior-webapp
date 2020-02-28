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
	text: 'Druk op een van deze vlakken om te selecteren van wie je de foto\'s\ wilt zien.',
	attachTo: {
		element: '.card-one',
		on: 'right'
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
	id: 'step2',
	title: 'Stap 2',
	text: 'Hier ziet je de foto\'s\ die de persoon met u gedeeld heeft.',
	attachTo: {
		element: '.social-slider',
		on: 'right'
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
	id: 'step2',
	title: 'Stap 2',
	text: 'Door te drukken op een van onderstaande figuurtjes kan u laten weten wat u van de foto\'s\ vind.',
	attachTo: {
		element: '.emojis',
		on: 'right'
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

function StartOnboarding(){
	tour.start();
}

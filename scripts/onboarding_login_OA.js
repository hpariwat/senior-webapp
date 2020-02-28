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
	text: 'Druk op deze knop en vul uw kamernummer in.',
	attachTo: {
		element: '.roomnumber_field',
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
	text: 'Druk op deze knop en vul uw wachtwoord in. Als u uw wachtwoord vergeten bent, vraag het aan één van de verzorgers.',
	attachTo: {
		element: '.pincode_field',
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
	id: 'step3',
	title: 'Stap 3',
	text: 'Indien alle vorige stappen juist zijn gebeurd, druk dan op deze knop om u aan te melden.',
	attachTo: {
		element: '.btnLogin',
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
			text: 'Gedaan'
		}
	]
});

function StartOnboarding(){
	tour.start();
}

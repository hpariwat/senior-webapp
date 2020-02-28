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
		element: '.fc-home-button',
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
	text: 'Druk op deze knop om naar de vorige maand te gaan',
	attachTo: {
		element: '.fc-prev-button',
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
	text: 'Druk op deze knop om naar de huidige dag te gaan.',
	attachTo: {
		element: '.fc-today-button',
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
	text: 'Druk op deze knop om naar de volgende maand te gaan.',
	attachTo: {
		element: '.fc-next-button',
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
	text: 'Druk op deze knop om een overzicht te zien van de maand.',
	attachTo: {
		element: '.fc-month-button',
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
	text: 'Druk op deze knop om een overzicht te zien van de week.',
	attachTo: {
		element: '.fc-agendaWeek-button',
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
	text: 'Als u zich wil inschrijven voor een activiteit druk dan op de activiteit naar keuze en druk vervolgens op "Deelnemen". De activiteit zal blauw worden als u bent ingeschreven.',
	attachTo: {
		on: 'center'
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
	text: 'Als u zich wil uitschrijven voor een activiteit druk dan op de activiteit naar keuze en druk vervolgens op "Niet meer deelnemen".',
	attachTo: {
		on: 'center'
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

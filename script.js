
let params = [];
let fields = document.querySelectorAll('.main-form-field-label');
for (let i = 0; i < fields.length; i++) {
	params.push(fields[i].getAttribute('for'));
}

document.getElementById('main_form_submit').addEventListener('click', () => {
	let formData = new FormData(document.forms.main_form);
	let nonEmptyValues = {};

	let i = -1;
	for (let value of formData.values()) {
		i++;

		if (!value && value !== 0) {
			continue;
		}

		value = value.replaceAll(' ', '').replaceAll(',', '.');
		nonEmptyValues[params[i]] = value;

		// if value is a number
		// if (parseFloat(value)) {
		// 	nonEmptyValues[params[i]] = parseFloat(value);
		// }
	}

	let xhr = new XMLHttpRequest();
	xhr.open('POST', 'select.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.onreadystatechange = function() {
	    if (xhr.readyState == 4 && xhr.status == 200) {
	    	console.log(xhr.responseText);
	        showTanks(JSON.parse(xhr.responseText));
	    }
	}

	xhr.send('params=' + JSON.stringify(nonEmptyValues));
});

// load full list of tanks first
document.getElementById('main_form_submit').click();

function showTanks(tanks) {
	removeTanks();

	for (let i = 0; i < Object.keys(tanks).length; i++) {
		addTank(tanks[i]);
	}

	// show amount of found tanks
	document.querySelector('.tanks-list-result-amount span').textContent = Object.keys(tanks).length;
}

function addTank(tank) {
	let html = '<div class="tank-item">' + 
					'<div class="tank-item-characteristic">' + tank.name + '</div>' +
					'<div class="tank-item-characteristic">' + tank.nation + '</div>' +
					'<div class="tank-item-characteristic">' + tank.level + '</div>' +
					'<div class="tank-item-characteristic">' + tank.type + '</div>' +
				'</div>';

	let listWrapper = document.querySelector('.tanks-list-wrapper');
	listWrapper.insertAdjacentHTML('beforeend', html);
}

// removes all tanks from the tank list
function removeTanks() {
	let tanks = document.querySelectorAll('.tank-item:not(.tank-item-header)');
	for (let tank of tanks) {
		tank.remove();
	}
	
	// show amount of found tanks to 0
	document.querySelector('.tanks-list-result-amount span').textContent = 0;
}

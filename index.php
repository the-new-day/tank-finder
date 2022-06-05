<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tank Finder</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1 class="header">Tank Finder</h1>
	<p class="header-sign">By <a href="https://github.com/the-new-day" target="_blank">the-new-day</a></p>


	<div class="main-form-wrapper">
		<form id="main_form" class="main-form" name="main_form">
			<div class="main-form-column">
				<div class="main-form-field">
					<label for="type" class="main-form-field-label">Тип <span class="text-hint">(пусто = выбрать машины всех типов)</span></label>
					<select name="type" id="type" class="main-form-select">
						<option value=""></option>
						<option value="lighttank">Лёгкий танк</option>
						<option value="mediumtank">Средний танк</option>
						<option value="heavytank">Тяжёлый танк</option>
						<option value="at-spg">ПТ-САУ</option>
						<option value="spg">САУ</option>
					</select>
				</div>
				<div class="main-form-field">
					<label for="nation" class="main-form-field-label">Нация <span class="text-hint">(пусто = выбрать машины всех наций)</span></label>
					<select name="nation" id="nation" class="main-form-select">
						<option value=""></option>
						<option value="ussr">СССР</option>
						<option value="germany">Германия</option>
						<option value="usa">США</option>
						<option value="china">Китай</option>
						<option value="japan">Япония</option>
						<option value="italy">Италия</option>
						<option value="sweden">Швеция</option>
						<option value="czech">Чехословакия</option>
						<option value="poland">Польша</option>
						<option value="france">Франция</option>
						<option value="uk">Великобритания</option>
					</select>
				</div>
				<div class="main-form-field">
					<label for="level" class="main-form-field-label">Уровень <span class="text-hint">(пусто = выбрать машины всех уровней)</span></label>
					<input type="number" id="level" name="level" class="main-form-input" min="1" max="10" value="">
				</div>

				<div class="main-form-field main-form-unit-header">
					Живучесть
				</div>
				<div class="main-form-field">
					<label for="hp" class="main-form-field-label">Прочность</label>
					<input type="text" id="hp" name="hp" placeholder="HP" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="har" class="main-form-field-label">Бронирование корпуса <span class="text-hint">(мм)</span></label>
					<input type="text" id="har" name="har" placeholder="HAR" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="tar" class="main-form-field-label">Бронирование башни <span class="text-hint">(мм)</span></label>
					<input type="text" id="tar" name="tar" placeholder="TAR" class="main-form-input">
				</div>

				<div class="main-form-field main-form-unit-header">
					Наблюдение
				</div>
				<div class="main-form-field">
					<label for="rcr" class="main-form-field-label">Дальность связи <span class="text-hint">(м)</span></label>
					<input type="text" id="rcr" name="rcr" placeholder="RCR" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="vrng" class="main-form-field-label">Обзор <span class="text-hint">(м)</span></label>
					<input type="text" id="vrng" name="vrng" placeholder="VRNG" class="main-form-input">
				</div>

				<div class="main-form-field main-form-unit-header">
					Мобильность
				</div>
				<div class="main-form-field">
					<label for="spw" class="main-form-field-label">Удельная мощность <span class="text-hint">(л.с./т)</span></label>
					<input type="text" id="spw" name="spw" placeholder="SPW" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="spd" class="main-form-field-label">Максимальная скорость <span class="text-hint">(км/ч)</span></label>
					<input type="text" id="spd" name="spd" placeholder="SPD" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="tvs" class="main-form-field-label">Скорость поворота <span class="text-hint">(град/с)</span></label>
					<input type="text" id="tvs" name="tvs" placeholder="TVS" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="wgt" class="main-form-field-label">Масса <span class="text-hint">(т)</span></label>
					<input type="text" id="wgt" name="wgt" placeholder="WGT" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="mwgt" class="main-form-field-label">Предельная масса <span class="text-hint">(т)</span></label>
					<input type="text" id="mwgt" name="mwgt" placeholder="MWGT" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="epo" class="main-form-field-label">Мощность двигателя <span class="text-hint">(л.с.)</span></label>
					<input type="text" id="epo" name="epo" placeholder="EPO" class="main-form-input">
				</div>
			</div>
			<div class="main-form-column">
				<div class="main-form-field main-form-unit-header">
					Огневая мощь
				</div>
				<div class="main-form-field">
					<label for="dmg" class="main-form-field-label">Средний урон</label>
					<input type="text" id="dmg" name="dmg" placeholder="DMG" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="dpm" class="main-form-field-label">Урон в минуту</label>
					<input type="text" id="dpm" name="dpm" placeholder="DPM" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="rtrs" class="main-form-field-label">Бронепробитие базовым снарядом <span class="text-hint">(мм)</span></label>
					<input type="text" id="rtrs" name="rtrs" placeholder="RTRS" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="rtrp" class="main-form-field-label">Бронепробитие премиум снарядом <span class="text-hint">(мм)</span></label>
					<input type="text" id="rtrp" name="rtrp" placeholder="RTRP" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="rtra" class="main-form-field-label">Бронепробитие альт. снарядом <span class="text-hint">(мм)</span></label>
					<input type="text" id="rtra" name="rtra" placeholder="RTRA" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="acr" class="main-form-field-label">Разброс на 100 м <span class="text-hint">(м)</span></label>
					<input type="text" id="acr" name="acr" placeholder="ACR" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="ammo" class="main-form-field-label">Боекомлект <span class="text-hint">(шт.)</span></label>
					<input type="text" id="ammo" name="ammo" placeholder="AMMO" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="rof" class="main-form-field-label">Скорострельность <span class="text-hint">(выстр./мин.)</span></label>
					<input type="text" id="rof" name="rof" placeholder="ROF" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="aim" class="main-form-field-label">Время сведения <span class="text-hint">(сек.)</span></label>
					<input type="text" id="aim" name="aim" placeholder="AIM" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="vaa" class="main-form-field-label">Углы ВН <b>(УВН)</b> <span class="text-hint">(град.)</span></label>
					<input type="text" id="vaa" name="vaa" placeholder="VAA" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="vas" class="main-form-field-label">Скорость ВН <span class="text-hint">(град./сек.)</span></label>
					<input type="text" id="vas" name="vas" placeholder="VAS" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="haa" class="main-form-field-label">Углы ГН <span class="text-hint">(град.)</span></label>
					<input type="text" id="haa" name="haa" placeholder="HAA" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="ttvs" class="main-form-field-label">Скорость поворота башни (ГН) <span class="text-hint">(град/с)</span></label>
					<input type="text" id="ttvs" name="ttvs" placeholder="TTVS" class="main-form-input">
				</div>

				<div class="main-form-field main-form-unit-header">
					Незаметность
				</div>

				<div class="main-form-field">
					<label for="stls" class="main-form-field-label">Незаметность стоя <span class="text-hint">(%)</span></label>
					<input type="text" id="stls" name="stls" placeholder="STLS" class="main-form-input">
				</div>
				<div class="main-form-field">
					<label for="stlm" class="main-form-field-label">Незаметность в движении <span class="text-hint">(%)</span></label>
					<input type="text" id="stlm" name="stlm" placeholder="STLM" class="main-form-input">
				</div>
			</div>

			<button class="main-form-submit-btn" type="button" id="main_form_submit">Найти танк</button>
		</form>
	</div>

	<h2 class="header">Results</h2>

	<div class="tanks-list-wrapper">
		<div class="tanks-list-result-amount">
			Танков найдено: <span>0</span>	
		</div>

		<div class="tank-item tank-item-header">
			<div class="tank-item-characteristic">Название</div>
			<div class="tank-item-characteristic">Нация</div>
			<div class="tank-item-characteristic">Уровень</div>
			<div class="tank-item-characteristic">Тип</div>
		</div>
	</div>

	<script type="text/javascript" src="script.js"></script>
</body>
</html>

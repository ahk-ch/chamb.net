<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => [],

	/*
   |--------------------------------------------------------------------------
   | Validation Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines contain the default error messages used by
   | the validator class. Some of these rules have multiple versions such
   | as the size rules. Feel free to tweak each of these messages here.
   |
   */

	'accepted'             => 'The :attribute muss akzeptiert sein.',
	'active_url'           => 'The :attribute ist keine gültige URL.',
	'after'                => 'The :attribute muss ein Datum nach :date sein.',
	'alpha'                => 'The :attribute darf nur Buchstaben enthalten.',
	'alpha_dash'           => 'The :attribute darf nur Buchstaben, Zahlen und Bindestriche enthalten.',
	'alpha_num'            => 'The :attribute darf nur Buchstaben und Zahlen enthalten.',
	'array'                => 'The :attribute muss ein Array sein.',
	'before'               => 'The :attribute muss ein Datum vor :date sein.',
	'between'              => [
		'numeric' => 'The :attribute muss zwischen :min und :max liegen.',
		'file'    => 'The :attribute muss zwischen :min und :max Kilobytes sein.',
		'string'  => 'The :attribute muss zwischen :min und :max Buchstaben lang sein.',
		'array'   => 'The :attribute muss zwischen :min und :max Elemente haben.',
	],
	'boolean'              => 'The :attribute Feld muss wahr oder falsch sein.',
	'confirmed'            => 'The :attribute Bestätigung stimmt nicht überein.',
	'date'                 => 'The :attribute ist kein gültiges Datum.',
	'date_format'          => 'The :attribute passt nicht in das Format :format.',
	'different'            => 'The :attribute und :other müssen geändert werden.',
	'digits'               => 'The :attribute müssen :digits Ziffern sein.',
	'digits_between'       => 'The :attribute muss zwischen :min und :max Ziffern sein.',
	'email'                => 'The :attribute muss eine gültige Email-Addresse sein.',
	'exists'               => 'The ausgewählte :attribute ist ungültig.',
	'filled'               => 'The :attribute ist ein Pflichtfeld.',
	'image'                => 'The :attribute muss ein Bild sein.',
	'in'                   => 'The ausgewählte :attribute ist ungültig.',
	'integer'              => 'The :attribute muss ganzzahlig seinn.',
	'ip'                   => 'The :attribute muss eine gültige IP-Addresse sein.',
	'json'                 => 'The :attribute muss ein gültiger JSON String sein.',
	'max'                  => [
		'numeric' => 'The :attribute darf nicht größer als :max sein.',
		'file'    => 'The :attribute darf nicht größer als :max Kilobytes sein.',
		'string'  => 'The :attribute darf nicht mehr als :max Zeichen lang sein.',
		'array'   => 'The :attribute darf nicht mehr als :max Elemente haben.',
	],
	'mimes'                => 'The :attribute muss eine der folgenden Dateitypen sein type: :values.',
	'min'                  => [
		'numeric' => 'The :attribute muss mindestens :min sein.',
		'file'    => 'The :attribute muss mindestens :min Kilobytes groß sein.',
		'string'  => 'The :attribute muss mindestens :min Zeichen haben.',
		'array'   => 'The :attribute muss mindestens :min Elemente haben.',
	],
	'not_in'               => 'The ausgewählte :attribute ist ungültig.',
	'numeric'              => 'The :attribute must be a number.',
	'regex'                => 'The :attribute Format ist ungültig.',
	'required'             => 'The :attribute Feld ist ein Pflichtfeld.',
	'required_if'          => 'The :attribute Feld wird benötigt wenn :other :value ist.',
	'required_with'        => 'The :attribute Feld wird benötigt wenn :values vorhanden ist.',
	'required_with_all'    => 'The :attribute Feld wird benötigt wenn :values vorhanden ist.',
	'required_without'     => 'The :attribute Feld wird benötigt wenn :values nicht vorhanden ist.',
	'required_without_all' => 'The :attribute Feld wird benötigt wenn keine der Werte :values vorhanden ist.',
	'same'                 => 'The :attribute und :other müssen übereinstimmen.',
	'size'                 => [
		'numeric' => 'The :attribute muss :size groß sein.',
		'file'    => 'The :attribute muss :size Kilobytes groß sein.',
		'string'  => 'The :attribute muss :size Zeichen haben.',
		'array'   => 'The :attribute muss :size Elemente haben.',
	],
	'string'               => 'The :attribute muss eine Reihe [String] sein.',
	'timezone'             => 'The :attribute muss ein gültiger Bereich sein.',
	'unique'               => 'The :attribute wird bereits verwendet.',
	'url'                  => 'The :attribute Format ist ungültig.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],
];

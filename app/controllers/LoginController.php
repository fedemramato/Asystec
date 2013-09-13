<?php

class LoginController extends BaseController {

	public function getIndex() {
		return View::make('login.index');
	}

	public function postIndex() {

		#Validacion
		$validator_rules = array(
			'username' => 'required|between:5,255',
			'password' => 'required|between:5,100'
		);

		$validator_msg = array(
			'username.required' => 'Tienes que ingresar tu nombre de usuario.',
			'username.between' => 'El nombre de usuario debe tener entre :min y :max caracteres.',
			'password.required' => 'Tienes que ingresar tu contraseña.',
			'password.between' => 'La contraseña debe tener entre :min y :max caracteres.'
		);

		$validator = Validator::make(Input::all(), $validator_rules, $validator_msg);

		if ($validator->fails()) {
			return Redirect::to('login')->withErrors($validator);
		}

	}
}
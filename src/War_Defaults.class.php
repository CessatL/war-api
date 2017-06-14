<?php

namespace War_Api;

use War_Api\Defaults\Default_Endpoints as DE;

class War_Defaults {

	public $config;
	public $endpoints;
	public $models;

	public function __construct(){
		$this->config = $this->set_config();
		$this->endpoints = $this->set_endpoints();
		$this->models = $this->set_models();
	}

	public function set_config(){
		return [
            'api_name' => 'war',
            'api_prefix' => 'wp-json',
            'admin_toolbar' => false,
            'user_roles' => [],
            'version' => 1,
            'permalink' => '/posts/%postname%/',
			'default_access' => false
        ];
	}

	public function set_models(){
		return array();
	}

	public function set_endpoints(){
		$de = new DE;
		return [
			// 'jwt_token' => [
			// 	'uri' => '/jwt-token',
			// 	'access' => true,
			// 	'callback' => [ $de, 'war_jwt_create' ]
			// ],
			'menu' => [
				'uri' => '/menu',
				'access' => false,
				'callback' => [ $de, 'war_get_menu' ]
			],
			'theme_options' => [
				'uri' => '/theme-options',
				'access' => false,
				'method' => 'POST',
				'callback' => [ $de, 'war_theme_options' ]
			],
			'site_options' => [
				'uri' => '/site-options',
				'access' => false,
				'callback' => [ $de, 'war_site_options' ]
			],
			'login' => [
				'uri' => '/login',
				'access' => null,
				'method' => 'POST',
				'params'=>[
					'username' => [ 'type' => 'string', 'required' => true ],
					'password' => [ 'type' => 'string', 'required' => true ]
				],
				'callback' => [ $de, 'war_login' ]
			],
			'logout' => [
				'uri' => '/logout',
				'access' => true,
				'callback' => [ $de, 'war_logout' ]
			],
			// 'register' => [
			// 	'uri' => '/register',
			// 	'access' => null,
			// 	'method' => 'POST',
			// 	'params' => [
			// 		'email' => [ 'type' => 'email', 'required' => true ],
			// 		'password' => [ 'type' => 'string', 'required' => true ],
			// 		'role' => [
			// 			'type' => 'string',
			// 			'options' => ( isset( $war_config[ 'user_roles' ] ) ) ? $war_config[ 'user_roles' ] : [],
			// 			'default' => end( $war_config['user_roles'] )
			// 		]
			// 	],
			// 	'callback' => [ $de, 'war_signup' ]
			// ],
			'get_home_page' => [
				'uri' => '/home',
				'access' => false,
				'callback' => [ $de, 'war_get_home' ]
			]
		];
	}

}
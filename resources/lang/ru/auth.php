<?php

return [

	'titles' => [

		'login' 		=> 'Авторизация',
		'registry' 		=> 'Регистрация',
		'forgot'        => 'Сброс пароля',

	],

	'password' 			=> 'Пароль',
    'password_confirm' 	=> 'Повторите пароль',
	'send' 				=> 'Отправить',
	'missing_password' 	=> 'Забыли пароль',
	'registry' 			=> 'Зарегистрироваться в системе',
	'login' 			=> 'Войти в систему',

	'name'		=> 'Имя',
	'surname'	=> 'Фамилия',
	'phone'		=> 'Мобильный телефон',

	'select_email'	=> 'Укажите ваш e-mail, мы отправим инструкцию по восстановлению пароля.',
	'accept_part_1'	=> 'Регистрируясь, вы соглашаетесь с',
	'accept_part_2'	=> 'политикой конфиденциальности',

    'verify' => [

        'title'       => 'Проверьте свой адрес электронной почты',
        'email_check' => 'Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.',
        'not_receive' => 'Если вы не получили письмо',
        'resend'      => 'нажмите здесь, чтобы запросить новое',
        'new_mail'    => 'Новое письмо было успешно отправлено на вашу электронную почту.',

        'email' => [

            'title'    => 'Подтверждение адреса электронной почты',
            'thanks'   => 'Благодарим за регистрацию на нашем сайте!',
            'click'    => 'Нажмите кнопку ниже, чтобы подтвердить свой адрес электронной почты.',
            'verify'   => 'Подтвердить',
            'mismatch' => 'Если вы не создавали учетную запись, никаких дальнейших действий не требуется.',

        ]
    ],

    'success' => [

        'register' => 'Благодарим за регистрацию на нашем сайте. Для завершения регистрации перейдите по ссылке, отправленной на указанный email.',
        'login'    => 'Вы успешно авторизировались.',
        'verify'   => 'Учетная запись успешно подтверждена.',
        'reset'    => 'Новое письмо с инструкцией успешно отправлено на указанный email.',

    ],

    'errors' => [

        'missing' => [

            'email' => 'Нам не удалось найти зарегистрированного пользователя с этим адресом электронной почты.'

        ],

        'invalid' => [

            'login' => 'Неверный логин или пароль!',
            'token' => 'Неверный email или токен'

        ]
    ],
];

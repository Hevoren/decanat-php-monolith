<?php

use Model\TempUsers;
use PHPUnit\Framework\TestCase;


class RegisterTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     * @runInSeparateProcess
     */
    public function testCreate(string $httpMethod, array $userData, string $message): void
    {

        //Выбираем занятый логин из базы данных
        if ($userData['login'] === '1') {
            $userData['login'] = TempUsers::get()->first()->login;
        }

        // Создаем заглушку для класса Request.
        // Создаем заглушку для класса Request.
        $request = $this->createMock(\Src\Request::class);
        // Переопределяем метод all() и свойство method
        $request->expects($this->any())
            ->method('all')
            ->willReturn($userData);
        $request->method = $httpMethod;

        //Сохраняем результат работы метода в переменную
        $result = (new \Controller\Auth\AuthControl())->signup($request);

        if (!empty($result)) {
            //Проверяем варианты с ошибками валидации
            $message = '/' . preg_quote($message, '/') . '/';
            $this->expectOutputRegex($message);
            return;
        }

        //Проверяем добавился ли пользователь в базу данных
        $this->assertTrue((bool)TempUsers::where('login', $userData['login'])->count());
        //Удаляем созданного пользователя из базы данных
        TempUsers::where('login', $userData->login)->delete();

        $this->assertContains($message, xdebug_get_headers());

    }

    //Метод, возвращающий набор тестовых данных
    static public function additionProvider(): array
    {
        return [
            ['GET', ['name' => '', 'login' => '', 'password' => ''],
                ''
            ],
            ['POST', ['name' => '123', 'login' => '123', 'password' => '123'],
                '{"login":["Login must be latin"],"password":["Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number"]}'
            ],
            ['POST', ['name' => 'qwe123', 'login' => 'qwewewe', 'password' => 'QWEasd1234654'],
                ''
            ],
            ['POST', ['name' => 'q', 'login' => 'q', 'password' => 'q'],
                '{"password":["Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number"]}'
            ],
            ['POST', ['name' => 'q', 'login' => 'admin', 'password' => 'QWEasd123'],
                '{"login":["Field login must be unique"]}'
            ],
            ['POST', ['name' => 'q', 'login' => 'admin', 'password' => 'q'],
                '{"login":["Field login must be unique"],"password":["Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number"]}'
            ],
        ];
    }

    //Настройка конфигурации окружения
    protected function setUp(): void
    {
        //Установка переменной среды
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';

        //Создаем экземпляр приложения
        $GLOBALS['app'] = new Src\Application(new Src\Settings([
            'app' => include $_SERVER['DOCUMENT_ROOT'] . '/php-framework/config/app.php',
            'db' => include $_SERVER['DOCUMENT_ROOT'] . '/php-framework/config/db.php',
            'path' => include $_SERVER['DOCUMENT_ROOT'] . '/php-framework/config/path.php',
        ]));

        //Глобальная функция для доступа к объекту приложения
        if (!function_exists('app')) {
            function app()
            {
                return $GLOBALS['app'];
            }
        }
    }

}

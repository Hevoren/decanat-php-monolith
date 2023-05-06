<?php

use Controller\Interaction\Create\AddStudent;
use Model\Students;
use PHPUnit\Framework\TestCase;
use Src\Request;
use Validator\Validator;

class AddStudentTest extends TestCase
{
    /**
     * @dataProvider studentProvider
     */
    public function testAddStudent(array $studentData, bool $expectSuccess): void
    {
        // Создаем заглушку для класса Request.
        $request = $this->createMock(Request::class);
        $request->method('all')->willReturn($studentData);
        $request->method = 'POST';

        // Создаем экземпляр класса, метод которого будем тестировать.
        $addStudent = new AddStudent();

        // Вызываем метод addStudent() и сохраняем результат работы в переменную.
        $response = $addStudent->addStudent($request);

        // Проверяем статус добавления.
        if ($expectSuccess) {
            $this->assertInstanceOf(Students::class, Students::where('name', $studentData['name'])->first());
        } else {
            $this->assertFalse(Students::where('name', $studentData['name'])->exists());
        }
    }

    public static function studentProvider(): array
    {
        return [
            [
                [
                    'name' => 'qwe',
                    'surname' => 'qwe',
                    'mid_name' => 'qwe',
                    'birth_date' => '11-11-1111',
                    'adress' => 'qwe',
                    'group_id' => 1,
                ],
                false,
            ],
            [
                [
                    'name' => 'Иван',
                    'surname' => 'Иванов',
                    'mid_name' => 'Иванович',
                    'birth_date' => '23-23-2002',
                    'adress' => 'ул. Ленина, д. 1, кв. 1',
                    'group_id' => 1,
                ],
                true,
            ],
            [
                [
                    'name' => '',
                    'surname' => '',
                    'mid_name' => '',
                    'birth_date' => '',
                    'adress' => '',
                    'group_id' => '',
                ],
                false,
            ],
        ];
    }

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
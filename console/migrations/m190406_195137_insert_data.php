<?php

use yii\db\Migration;
use \common\models\Authors;
use \common\models\Books;

/**
 * Class m190406_195137_insert_data
 */
class m190406_195137_insert_data extends Migration
{
    public function up()
    {
        $this->insertAuthors();
        $this->insertBooks();
    }

    public function down()
    {
        $this->truncBooks();
        $this->truncAuthors();
    }

    private function insertAuthors(){
        $name=[
            0 => 'Александр',
            1 => 'Борис',
            2 => 'Афанасий',
            3 => 'Петр',
            4 => 'Станислав',
            5 => 'Евгений',
            6 => 'Вячеслаав',
            7 => 'Станислав',
            8 => 'Эдуард',
            9 => 'Сергей',
        ];

        $lname=[
            0 => 'Пушкин',
            1 => 'Ельцин',
            2 => 'Гоголь',
            3 => 'Толстой',
            4 => 'Достаевский',
            5 => 'Чехов',
            6 => 'Горький',
            7 => 'Лермонтов',
            8 => 'Куприн',
            9 => 'Ломоносов',
        ];
        for($i=0;$i<25;$i++){
            $person = new Authors();
            $person->firstname = $name[rand(0,9)];
            $person->lastname = $lname[rand(0,9)];
            $person->save();
        }
    }

    private function insertBooks()
    {
        $noun=[
            0 => 'Мастера ',
            1 => 'сердца',
            2 => 'басни',
            3 => 'Души',
            4 => 'Идиоты',
            5 => 'Герои',
            6 => 'Горцы',
            7 => '',
            8 => 'Сказки',
            9 => 'Господа',
        ];
        $adject=[
            0 => 'Бедные ',
            1 => 'Страшные',
            2 => 'Живые',
            3 => 'Мертвые',
            4 => 'Брошеные',
            5 => 'Смелые',
            6 => 'Сочные',
            7 => 'Старые',
            8 => 'Клевые',
            9 => '',
        ];
        $verb=[
            0 => 'Аляски ',
            1 => 'Дома',
            2 => '',
            3 => 'Чечни',
            4 => 'у бабушки',
            5 => 'Подземелья',
            6 => 'твоей подруги',
            7 => 'младенца',
            8 => 'Пустыни',
            9 => '',
        ];
        for($i=0;$i<100;$i++) {
            $person = new Books();
            $person->name = $adject[rand(0,9)].' '.$noun[rand(0,9)].' '.$verb[rand(0,9)];
            $person->author_id = rand(1,25);
            $person->save();
        }
    }

    private function truncBooks()
    {
        Books::deleteAll();
        Yii::$app->db->createCommand('alter sequence books_id_seq restart with 1')->execute();
    }

    private function truncAuthors()
    {
        Authors::deleteAll();
        Yii::$app->db->createCommand('alter sequence authors_id_seq restart with 1')->execute();
    }

}

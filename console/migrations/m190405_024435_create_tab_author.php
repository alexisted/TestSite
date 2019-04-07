<?php

use yii\db\Migration;
use \common\models\Authors;
use \common\models\Books;

class m190405_024435_create_tab_author extends Migration
{
    public function up()
    {
        $this->createAuthors();
        $this->createBooks();
    }

    public function down()
    {
        $this->deleteBooks();
        $this->deleteAuthors();
    }

    private function createAuthors()
    {
        $this->createTable('authors',[
            'id' => $this->primaryKey() ,
            'firstname' => $this->string(25)->notNull() ,
            'lastname' => $this->string(35)->notNull() ,

        ]);
    }
    private function createBooks()
    {
        $this->createTable('books',[
            'id' => $this->primaryKey() ,
            'name' => $this->string(90)->notNull() ,
            'author_id' => $this->integer(6)->notNull() ,

        ]);
        $this->addForeignKey(
            'fk_books_author_id',
            'books',
            'author_id',
            'authors',
            'id',
            'CASCADE'
        );
    }

    private function deleteAuthors()
    {
        $this->dropTable('authors');
    }

    private function deleteBooks()
    {
        $this->dropTable('books');
    }

}

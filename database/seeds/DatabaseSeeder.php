<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
    	DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@book.gifts',
			'password' => bcrypt('123456'),
			'role' => 2,
		]);	
		DB::table('users')->insert([
			'name' => 'John Martin',
			'email' => 'jm999@gmail.com',
			'password' => bcrypt('123456'),
		]);	
		DB::table('users')->insert([
			'name' => 'Petr Ivanov',
			'email' => 'IvanovPE@mail.ru',
			'password' => bcrypt('123456'),
		]);	
		DB::table('users')->insert([
			'name' => 'Maris Pauls',
			'email' => 'Marpal@inbox.lv',
			'password' => bcrypt('123456'),
		]);	
		DB::table('genres')->insert(['name' => 'Novel',]);	
		DB::table('genres')->insert(['name' => 'Novel in verse',]);	
		DB::table('genres')->insert(['name' => 'Poem',]);	
		DB::table('genres')->insert(['name' => 'Play',]);	
		DB::table('books')->insert([
			'name' => "Harry Potter and the Philosopher's Stone",
			'author' => 'J. K. Rowling',
			'year' => 1997,
			'genre' => 1,
			'lang' => 'EN',
			'owner' => 2,
			'description' => 'The plot follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardy. ',
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Chamber of Secrets',
			'author' => 'J. K. Rowling',
			'year' => 1998,
			'genre' => 1,
			'lang' => 'EN',
			'owner' => 2,
			'description' => "The plot follows Harry's second year at Hogwarts School of Witchcraft and Wizardry, during which a series of messages on the walls of the school's corridors warn that the 'Chamber of Secrets' has been opened and that the 'heir of Slytherin' would kill all pupils who do not come from all-magical families.",
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Евгений Онегин',
			'author' => 'А. С. Пушкин',
			'year' => 1830,
			'genre' => 2,
			'lang' => 'RU',
			'owner' => 3,
			'description' => "Роман в стихах русского поэта Александра Сергеевича Пушкина, написанный в 1823—1830 годах, одно из самых значительных произведений русской словесности.",
			'price' => 12.50,
		]);	
		DB::table('books')->insert([
			'name' => 'Анна Каренина',
			'author' => 'Л. Н. Толстой',
			'year' => 1877,
			'genre' => 1,
			'lang' => 'RU',
			'owner' => 3,
			'description' => "Роман Льва Толстого о трагической любви замужней дамы Анны Карениной и блестящего офицера Вронского на фоне счастливой семейной жизни дворян Константина Лёвина и Кити Щербацкой.",
			'price' => 17.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Lāčplēsis',
			'author' => 'Andrejs Pumpurs',
			'year' => 1888,
			'genre' => 3,
			'lang' => 'LV',
			'owner' => 4,
			'description' => "Lāčplēsis ir balstīts uz tautas teikām un radīts tautiskā romantisma periodā, kad aktualizējas nepieciešamība izveidot senatnē balstītu nacionālo ideoloģiju.",
			'price' => 10.00,
		]);
		DB::table('books')->insert([
			'name' => 'Uguns un nakts',
			'author' => 'Rainis',
			'year' => 1905,
			'genre' => 4,
			'lang' => 'LV',
			'owner' => 4,
			'description' => "Uguns un nakts simbolika ir ļoti ietilpīga un daudzplākšņaina. Tajā iekļaujas gan teiksmas sižets, gan 13. gadsimta notikumi, gan 1905. gada revolūcija, gan ceramā brīvā Latvija, gan mūžīgā gaismas un tumsas cīņa vispār",
			'price' => 8.00,
		]);
    }
}

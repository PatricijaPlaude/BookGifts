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
			'name' => 'Peter Martin',
			'email' => 'jm999@gmail.com',
			'password' => bcrypt('123456'),
		]);	
		DB::table('genres')->insert(['name' => 'Novel',]);	
		DB::table('genres')->insert(['name' => 'Poem',]);	
		DB::table('genres')->insert(['name' => 'Play',]);	
		DB::table('genres')->insert(['name' => 'Novella',]);	
		DB::table('genres')->insert(['name' => 'Drama',]);	
		DB::table('books')->insert([
			'name' => "Harry Potter and the Philosopher's Stone",
			'author' => 'J. K. Rowling',
			'year' => 1997,
			'genre' => 1,
			'owner' => 2,
			'description' => 'Harry Potter has been living an ordinary life, constantly abused by his surly and cold aunt and uncle, Vernon and Petunia Dursley and bullied by their spoiled son Dudley since the death of his parents ten years prior. His life changes on the day of his eleventh birthday when he receives a letter of acceptance into a Hogwarts School of Witchcraft and Wizardry, delivered by a half-giant named Rubeus Hagrid after previous letters had been destroyed by Vernon and Petunia. ',
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Chamber of Secrets',
			'author' => 'J. K. Rowling',
			'year' => 1998,
			'genre' => 1,
			'owner' => 2,
			'description' => "On Harry Potter's birthday in 1992, the Dursley family—Harry's Uncle Vernon, Aunt Petunia, and cousin Dudley—hold a dinner party for a potential client of Vernon's drill-manufacturing company. Harry is not invited, but is content to spend the evening quietly in his bedroom, although he is confused that his school friends have not sent cards or presents. However, when he goes to his room, a house-elf named Dobby warns him not to return to Hogwarts and admits to intercepting Harry's post from his friends.",
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Prisoner of Azkaban',
			'author' => 'J. K. Rowling',
			'year' => 1999,
			'genre' => 1,
			'owner' => 2,
			'description' => "Harry is back at the Dursleys for the summer holidays, where he sees on Muggle television that a convict named Sirius Black has escaped, though with no mention of what facility he has broken out of. Harry involuntarily inflates Aunt Marge when she comes to visit after she insults Harry and his parents. This leads to his running away and being picked up by the Knight Bus. He travels to the Leaky Cauldron where he meets Cornelius Fudge, the Minister for Magic, who asks Harry to stay in Diagon Alley for the remaining three weeks before the start of the school year at Hogwarts.",
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Goblet of Fire',
			'author' => 'J. K. Rowling',
			'year' => 2000,
			'genre' => 1,
			'owner' => 2,
			'description' => "Throughout the three previous novels in the Harry Potter series, the main character, Harry Potter, has struggled with the difficulties of growing up, and the added challenge of being a famed wizard: when Harry was a baby, Lord Voldemort, the most powerful Dark wizard in history, killed Harry's parents but mysteriously vanished after unsuccessfully trying to kill Harry, which left a lightning-shaped scar on Harry's forehead. This results in Harry's immediate fame and his being placed in the care of his abusive muggle, or non-magical, aunt and uncle, Aunt Petunia Dursley and Uncle Vernon Dursley, who have a son named Dudley Dursley.",
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Order of the Phoenix',
			'author' => 'J. K. Rowling',
			'year' => 2003,
			'genre' => 1,
			'owner' => 2,
			'description' => "During another summer with his Aunt Petunia and Uncle Vernon, Harry Potter and Dudley are attacked by Dementors. After using magic to save Dudley and himself, Harry is almost expelled from Hogwarts, but the decision is later reversed after a hearing at the Ministry of Magic. Harry is whisked off by a group of wizards to Number 12, Grimmauld Place, the childhood home of his godfather, Sirius Black. ",
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Half-Blood Prince',
			'author' => 'J. K. Rowling',
			'year' => 2005,
			'genre' => 1,
			'owner' => 2,
			'description' => "Dumbledore picks Harry up from his aunt and uncle's house, intending to escort him to the Burrow, home of Harry's best friend Ron, and his large family. On the way, they make a detour to the temporary home of Horace Slughorn, former Potions teacher at Hogwarts, and Harry unwittingly helps persuade Slughorn to return to teach. Harry and Dumbledore then proceed to the Burrow, where Hermione has already arrived.",
			'price' => 9.00,
		]);	
		DB::table('books')->insert([
			'name' => 'Harry Potter and the Deathly Hallows',
			'author' => 'J. K. Rowling',
			'year' => 2007,
			'genre' => 1,
			'owner' => 2,
			'description' => "Throughout the six previous novels in the series, the titular character Harry Potter has struggled with the difficulties of adolescence along with being famous as the only wizard to survive the Killing Curse. The curse was cast by the evil Tom Riddle, better known as Lord Voldemort, a powerful evil wizard, who had murdered Harry's parents and attempted to kill Harry as a baby, in the belief this would frustrate a prophecy that Harry would become his equal. As an orphan, Harry was placed in the care of his Muggle (non-magical) relatives Petunia Dursley and Vernon Dursley.",
			'price' => 9.00,
		]);	
		DB::table('orders')->insert([
			'buyer' => '1',
			'book' => '1',
			'phone' => '123123123',
			'address' => 'address',
		]);	
    }
}

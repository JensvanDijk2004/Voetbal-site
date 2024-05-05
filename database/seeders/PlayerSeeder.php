<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $playersAjax = [
            ['name' => 'Andre Onana', 'email' => 'andre.onana@example.com', 'age' => 25],
            ['name' => 'Noussair Mazraoui', 'email' => 'noussair.mazraoui@example.com', 'age' => 22],
            ['name' => 'Nicolás Tagliafico', 'email' => 'nicolas.tagliafico@example.com', 'age' => 27],
            ['name' => 'Matthijs de Ligt', 'email' => 'matthijs.de.ligt@example.com', 'age' => 22],
            ['name' => 'Daley Blind', 'email' => 'daley.blind@example.com', 'age' => 29],
            ['name' => 'Frenkie de Jong', 'email' => 'frenkie.de.jong@example.com', 'age' => 23],
            ['name' => 'Donny van de Beek', 'email' => 'donny.van.de.beek@example.com', 'age' => 24],
            ['name' => 'Lasse Schöne', 'email' => 'lasse.schone@example.com', 'age' => 35],
            ['name' => 'Hakim Ziyech', 'email' => 'hakim.ziyech@example.com', 'age' => 28],
            ['name' => 'Dusan Tadic', 'email' => 'dusan.tadic@example.com', 'age' => 32],
            ['name' => 'David Neres', 'email' => 'david.neres@example.com', 'age' => 24],
        ];

        $playersPSV = [
            ['name' => 'Marco van Ginkel', 'email' => 'marco.van.ginkel@example.com', 'age' => 29],
            ['name' => 'Eran Zahavi', 'email' => 'eran.zahavi@example.com', 'age' => 35],
            ['name' => 'Denzel Dumfries', 'email' => 'denzel.dumfries@example.com', 'age' => 26],
            ['name' => 'Olivier Boscagli', 'email' => 'olivier.boscagli@example.com', 'age' => 24],
            ['name' => 'Ibrahim Sangaré', 'email' => 'ibrahim.sangare@example.com', 'age' => 24],
            ['name' => 'Mario Götze', 'email' => 'mario.gotze@example.com', 'age' => 29],
            ['name' => 'Yorbe Vertessen', 'email' => 'yorbe.vertessen@example.com', 'age' => 21],
            ['name' => 'Yvon Mvogo', 'email' => 'yvon.mvogo@example.com', 'age' => 28],
            ['name' => 'Cody Gakpo', 'email' => 'cody.gakpo@example.com', 'age' => 22],
            ['name' => 'Jordan Teze', 'email' => 'jordan.teze@example.com', 'age' => 22],
            ['name' => 'Armando Obispo', 'email' => 'armando.obispo@example.com', 'age' => 23],
        ];

        $playersDeGraafschap = [
            ['name' => 'Rody de Boer', 'email' => 'rody.de.boer@example.com', 'age' => 25],
            ['name' => 'Ted van de Pavert', 'email' => 'ted.van.de.pavert@example.com', 'age' => 29],
            ['name' => 'Toine van Huizen', 'email' => 'toine.van.huizen@example.com', 'age' => 28],
            ['name' => 'Jesse Schuurman', 'email' => 'jesse.schuurman@example.com', 'age' => 23],
            ['name' => 'Elmo Lieftink', 'email' => 'elmo.lieftink@example.com', 'age' => 26],
            ['name' => 'Danny Verbeek', 'email' => 'danny.verbeek@example.com', 'age' => 31],
            ['name' => 'Joey Konings', 'email' => 'joey.konings@example.com', 'age' => 22],
            ['name' => 'Daryl van Mieghem', 'email' => 'daryl.van.mieghem@example.com', 'age' => 30],
            ['name' => 'Ralf Seuntjens', 'email' => 'ralf.seuntjens@example.com', 'age' => 32],
            ['name' => 'Denny Landzaat', 'email' => 'denny.landzaat@example.com', 'age' => 45],
            ['name' => 'Johnatan Opoku', 'email' => 'johnatan.opoku@example.com', 'age' => 31],
        ];

        $playersFeyenoord = [
            ['name' => 'Justin Bijlow', 'email' => 'justin.bijlow@example.com', 'age' => 23],
            ['name' => 'Tyrell Malacia', 'email' => 'tyrell.malacia@example.com', 'age' => 22],
            ['name' => 'Marcos Senesi', 'email' => 'marcos.senesi@example.com', 'age' => 24],
            ['name' => 'Uros Spajic', 'email' => 'uros.spajic@example.com', 'age' => 29],
            ['name' => 'Lutsharel Geertruida', 'email' => 'lutsharel.geertruida@example.com', 'age' => 21],
            ['name' => 'Liam Kelly', 'email' => 'liam.kelly@example.com', 'age' => 26],
            ['name' => 'Leroy Fer', 'email' => 'leroy.fer@example.com', 'age' => 32],
            ['name' => 'Jens Toornstra', 'email' => 'jens.toornstra@example.com', 'age' => 32],
            ['name' => 'Steven Berghuis', 'email' => 'steven.berghuis@example.com', 'age' => 30],
            ['name' => 'Bryan Linssen', 'email' => 'bryan.linssen@example.com', 'age' => 30],
            ['name' => 'Luciano Narsingh', 'email' => 'luciano.narsingh@example.com', 'age' => 31],
        ];

        $playersFCGroningen = [
            ['name' => 'Sergio Padt', 'email' => 'sergio.padt@example.com', 'age' => 30],
            ['name' => 'Ko Itakura', 'email' => 'ko.itakura@example.com', 'age' => 24],
            ['name' => 'Bart van Hintum', 'email' => 'bart.van.hintum@example.com', 'age' => 34],
            ['name' => 'Mike te Wierik', 'email' => 'mike.te.wierik@example.com', 'age' => 29],
            ['name' => 'Damian van Bruggen', 'email' => 'damian.van.bruggen@example.com', 'age' => 24],
            ['name' => 'Azor Matusiwa', 'email' => 'azor.matusiwa@example.com', 'age' => 24],
            ['name' => 'Ramón Pascal Lundqvist', 'email' => 'ramon.pascal.lundqvist@example.com', 'age' => 25],
            ['name' => 'Ahmed El Messaoudi', 'email' => 'ahmed.el.messaoudi@example.com', 'age' => 25],
            ['name' => 'Patrick Joosten', 'email' => 'patrick.joosten@example.com', 'age' => 25],
            ['name' => 'Jørgen Strand Larsen', 'email' => 'jorgen.strand.larsen@example.com', 'age' => 21],
            ['name' => 'Gabriel Gudmundsson', 'email' => 'gabriel.gudmundsson@example.com', 'age' => 21],
        ];

        $playersRodaJC = [
            ['name' => 'Rody de Kaas', 'email' => 'rody.de.kaas@example.com', 'age' => 25],
            ['name' => 'Xander Lambrix', 'email' => 'xander.lambrix@example.com', 'age' => 22],
            ['name' => 'Amadou Ciss', 'email' => 'amadou.ciss@example.com', 'age' => 25],
            ['name' => 'Bram van Vlerken', 'email' => 'bram.van.vlerken1@example.com', 'age' => 26],
            ['name' => 'Tomasz Makowski', 'email' => 'tomasz.makowski@example.com', 'age' => 24],
            ['name' => 'Kees Luijckx', 'email' => 'kees.luijckx@example.com', 'age' => 35],
            ['name' => 'Danny Bakker', 'email' => 'danny.bakker@example.com', 'age' => 27],
            ['name' => 'Thijmen Goppel', 'email' => 'thijmen.goppel@example.com', 'age' => 24],
            ['name' => 'Aron Klaassen', 'email' => 'aron.klaassen@example.com', 'age' => 23],
            ['name' => 'Célestin Djim', 'email' => 'celestin.djim@example.com', 'age' => 21],
            ['name' => 'Ali Yasar', 'email' => 'ali.yasar@example.com', 'age' => 20],
        ];

        $playersAlmereCity = [
            ['name' => 'Michael Woud', 'email' => 'michael.woud@example.com', 'age' => 23],
            ['name' => 'Bram van Vlerken', 'email' => 'bram.van.vlerken2@example.com', 'age' => 26],
            ['name' => 'Faris Hammouti', 'email' => 'faris.hammouti@example.com', 'age' => 25],
            ['name' => 'Bart Meijers', 'email' => 'bart.meijers@example.com', 'age' => 24],
            ['name' => 'Gastón Salasiwa', 'email' => 'gaston.salasiwa@example.com', 'age' => 29],
            ['name' => 'Youri Loen', 'email' => 'youri.loen@example.com', 'age' => 30],
            ['name' => 'Tim Receveur', 'email' => 'tim.receveur@example.com', 'age' => 28],
            ['name' => 'Ruggero Mannes', 'email' => 'ruggero.mannes@example.com', 'age' => 22],
            ['name' => 'Shayon Harrison', 'email' => 'shayon.harrison@example.com', 'age' => 24],
            ['name' => 'Thibaut Lesquoy', 'email' => 'thibaut.lesquoy@example.com', 'age' => 21],
            ['name' => 'Mees Kaandorp', 'email' => 'mees.kaandorp@example.com', 'age' => 19],
        ];

        $playersDenBosch = [
            ['name' => 'Wouter van der Steen', 'email' => 'wouter.van.der.steen@example.com', 'age' => 30],
            ['name' => 'Dwayne Green', 'email' => 'dwayne.green@example.com', 'age' => 27],
            ['name' => 'Sam Kersten', 'email' => 'sam.kersten@example.com', 'age' => 24],
            ['name' => 'Declan Lambert', 'email' => 'declan.lambert@example.com', 'age' => 23],
            ['name' => 'Robin Voets', 'email' => 'robin.voets@example.com', 'age' => 22],
            ['name' => 'Ryan Lambert', 'email' => 'ryan.lambert@example.com', 'age' => 21],
            ['name' => 'Jizz Hornkamp', 'email' => 'jizz.hornkamp@example.com', 'age' => 23],
            ['name' => 'Joran Swinkels', 'email' => 'joran.swinkels@example.com', 'age' => 24],
            ['name' => 'Niklas Hauptmeijer', 'email' => 'niklas.hauptmeijer@example.com', 'age' => 22],
            ['name' => 'Danny Verbeek', 'email' => 'danny.verbeek1@example.com', 'age' => 31],
            ['name' => 'Ricardo Kip', 'email' => 'ricardo.kip@example.com', 'age' => 26],
        ];

        $admins = [
            'Ajax'          => ['name' => 'Ajax Admin', 'email' => 'ajax@example.com', 'age' => 30, 'team_id' => 1],
            'PSV'           => ['name' => 'PSV Admin', 'email' => 'psv@example.com', 'age' => 30, 'team_id' => 2],
            'De Graafschap' => ['name' => 'De Graafschap Admin', 'email' => 'degraafschap@example.com', 'age' => 30, 'team_id' => 3],
            'Feyenoord'     => ['name' => 'Feyenoord Admin', 'email' => 'feyenoord@example.com', 'age' => 30, 'team_id' => 4],
            'FC Groningen'  => ['name' => 'FC Groningen Admin', 'email' => 'fcgroningen@example.com', 'age' => 30, 'team_id' => 5],
            'Roda JC'       => ['name' => 'Roda JC Admin', 'email' => 'rodajc@example.com', 'age' => 30, 'team_id' => 6],
            'Almere City'   => ['name' => 'Almere City Admin', 'email' => 'almerecity@example.com', 'age' => 30,'team_id' => 7],
            'Den Bosch'     => ['name' => 'Den Bosch Admin', 'email' => 'denbosch@example.com', 'age' => 30, 'team_id' => 8],
        ];

        DB::table('users')->insert([
            'name'     => 'Schijtrechter',
            'email'    => 'Schijtrechter@example.com',
            'age'      => 69,
            'gender'   => 'Man',
            'password' => bcrypt('123456'),
        ]);

        foreach ($admins as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'team_id'  => $player['team_id'],
                'gender'   => 'Man',
                'admin'    => 1,
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersAjax as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '1',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersPSV as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '2',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersDeGraafschap as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '3',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersFeyenoord as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '4',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersFCGroningen as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '5',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersRodaJC as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '6',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersAlmereCity as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '7',
                'password' => bcrypt('123456'),
            ]);
        }

        foreach ($playersDenBosch as $player) {
            DB::table('users')->insert([
                'name'     => $player['name'],
                'email'    => $player['email'],
                'age'      => $player['age'],
                'gender'   => 'Man',
                'team_id'  => '8',
                'password' => bcrypt('123456'),
            ]);
        }

        DB::table('teams')->where('id', '=', 1)->update(['creator_id' => 2]);
        DB::table('teams')->where('id', '=', 2)->update(['creator_id' => 3]);
        DB::table('teams')->where('id', '=', 3)->update(['creator_id' => 4]);
        DB::table('teams')->where('id', '=', 4)->update(['creator_id' => 5]);
        DB::table('teams')->where('id', '=', 5)->update(['creator_id' => 6]);
        DB::table('teams')->where('id', '=', 6)->update(['creator_id' => 7]);
        DB::table('teams')->where('id', '=', 7)->update(['creator_id' => 8]);
        DB::table('teams')->where('id', '=', 8)->update(['creator_id' => 9]);
    }
}

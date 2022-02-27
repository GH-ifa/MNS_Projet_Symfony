<?php

namespace App\DataFixtures;

use DateTime;
use DateInterval;
use App\Entity\Room;
use App\Entity\User;
use App\Entity\Genre;
use App\Entity\Movie;
use DateTimeImmutable;
use App\Entity\Screening;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    
    public function load(ObjectManager $manager): void
    {
        $users = [
            (new User())->setUsername('admin')->setRoles(['ROLE_ADMIN'])->setPassword($this->hasher->hashPassword((new User())->setUsername('admin'),'123456')),
        ];
        foreach ($users as $user) {
            $manager->persist($user);
        }

        $genres = [
            (new Genre())->setName('Action'),
            (new Genre())->setName('Horreur'),
            (new Genre())->setName('Biopic'),
            (new Genre())->setName('Musical'),
            (new Genre())->setName('Comédie'),
            (new Genre())->setName('Romantique'),
            (new Genre())->setName('Science fiction'),
            (new Genre())->setName('Thriller'),
        ];
        foreach ($genres as $genre) {
            $manager->persist($genre);
        }

        $rooms = [
            (new Room())->setNumber('Grande salle')->setWheelchairAccessible(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Room())->setNumber('Salle 1')->setWheelchairAccessible(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Room())->setNumber('Salle 2')->setWheelchairAccessible(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Room())->setNumber('Salle nulle')->setWheelchairAccessible(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Room())->setNumber('Salle 3')->setWheelchairAccessible(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
        ];
        foreach ($rooms as $room) {
            $manager->persist($room);
        }

        $movies = [
            (new Movie())->setTitle('Triangle')->setDuration('99')->setStatus('currently')->setSynopsis('Yacht passengers encounter mysterious weather conditions that force them to jump onto another ship, only to have the odd havoc increase.')->setActors('Melissa George, Joshua McIvor, Jack Taylor')->setPosterFilename('triangle.jpg')->setGenre($genres[1])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Jack Reacher')->setDuration('130')->setStatus('currently')->setSynopsis('A homicide investigator digs deeper into a case involving a trained military sniper who shot five random victims.')->setActors('Tom Cruise, Rosamund Pike, Richard Jenkins')->setPosterFilename('reacher.jpg')->setGenre($genres[0])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Primer')->setDuration('77')->setStatus('currently')->setSynopsis('Four friends/fledgling entrepreneurs, knowing that there\'s something bigger and more innovative than the different error-checking devices they\'ve built, wrestle over their new invention.')->setActors('Shane Carruth, David Sullivan, Casey Gooden')->setPosterFilename('primer.jpg')->setGenre($genres[7])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('The Prestige')->setDuration('130')->setStatus('currently')->setSynopsis('After a tragic accident, two stage magicians in 1890s London engage in a battle to create the ultimate illusion while sacrificing everything they have to outwit each other.')->setActors('Christian Bale, Hugh Jackman, Scarlett Johansson')->setPosterFilename('prestige.jpg')->setGenre($genres[7])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('The Illusionist')->setDuration('110')->setStatus('coming_soon')->setSynopsis('In turn-of-the-century Vienna, a magician uses his abilities to secure the love of a woman far above his social standing.')->setActors('Edward Norton, Jessica Biel, Paul Giamatti')->setPosterFilename('illusionist.jpg')->setGenre($genres[7])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Cube')->setDuration('90')->setStatus('coming_soon')->setSynopsis('Six complete strangers with widely varying personalities are involuntarily placed in an endless maze containing deadly traps.')->setActors('Nicole de Boer, Maurice Dean Wint, David Hewlett')->setPosterFilename('cube.jpg')->setGenre($genres[1])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('1408')->setDuration('104')->setStatus('currently')->setSynopsis('A man who specialises in debunking paranormal occurrences checks into the fabled room 1408 in the Dolphin Hotel. Soon after settling in, he confronts genuine terror.')->setActors('John Cusack, Samuel L. Jackson, Mary McCormack')->setPosterFilename('1408.jpg')->setGenre($genres[1])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Exam')->setDuration('101')->setStatus('currently')->setSynopsis('Eight candidates for a highly desirable corporate job are locked together in an exam room and given a final test with just one seemingly simple question. However, it doesn\'t take long for confusion to ensue and tensions to unravel.')->setActors('Adar Beck, Gemma Chan, Nathalie Cox')->setPosterFilename('exam.jpg')->setGenre($genres[7])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Law Abiding Citizen')->setDuration('109')->setStatus('currently')->setSynopsis('A frustrated man decides to take justice into his own hands after a plea bargain sets one of his family\'s killers free.')->setActors('Gerard Butler, Jamie Foxx, Leslie Bibb')->setPosterFilename('citizen.jpg')->setGenre($genres[0])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Grease')->setDuration('110')->setStatus('currently')->setSynopsis('Good girl Sandy Olsson and greaser Danny Zuko fell in love over the summer. When they unexpectedly discover they\'re now in the same high school, will they be able to rekindle their romance?')->setActors('John Travolta, Olivia Newton-John')->setPosterFilename('grease.jpg')->setGenre($genres[3])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Knocked Up')->setDuration('129')->setStatus('currently')->setSynopsis('For fun-loving party animal Ben Stone, the last thing he ever expected was for his one-night stand to show up on his doorstep eight weeks later to tell him she\'s pregnant with his child.')->setActors('Seth Rogen, Katherine Heigl, Paul Rudd')->setPosterFilename('knockedup.jpg')->setGenre($genres[4])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Movie())->setTitle('Titanic')->setDuration('194')->setStatus('currently')->setSynopsis('A seventeen-year-old aristocrat falls in love with a kind but poor artist aboard the luxurious, ill-fated R.M.S. Titanic.')->setActors('Leonardo DiCaprio, Kate Winslet')->setPosterFilename('titanic.jpg')->setGenre($genres[5])->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
        ];
        foreach ($movies as $movie) {
            $manager->persist($movie);
        }

        $screenings = [
            (new Screening())->setTime(new DateTime('2022-03-01 20:00:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-02 20:15:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-03 22:30:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-04 20:00:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 20:15:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 22:30:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-07 20:00:00'))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-01 10:00:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-01 14:15:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-01 20:00:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-01 22:00:00'))->setMovie($movies[6])->setRoom($rooms[3])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-02 20:00:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-03 20:30:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-04 20:30:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 20:00:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 20:30:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-07 20:30:00'))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-01 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-02 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-03 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-04 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-07 20:00:00'))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-01 14:00:00'))->setMovie($movies[10])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-03 14:00:00'))->setMovie($movies[10])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 16:00:00'))->setMovie($movies[10])->setRoom($rooms[1])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-01 18:00:00'))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-02 18:00:00'))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 18:00:00'))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 18:00:00'))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-02 16:00:00'))->setMovie($movies[9])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-03 16:15:00'))->setMovie($movies[9])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-04 16:00:00'))->setMovie($movies[9])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-02 20:15:00'))->setMovie($movies[3])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-03 20:15:00'))->setMovie($movies[3])->setRoom($rooms[4])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-04 20:15:00'))->setMovie($movies[3])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-02 14:00:00'))->setMovie($movies[2])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-04 14:00:00'))->setMovie($movies[2])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 16:00:00'))->setMovie($movies[2])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime(new DateTime('2022-03-01 14:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-01 22:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-02 14:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-02 22:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 14:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-05 22:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 14:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime(new DateTime('2022-03-06 22:00:00'))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),





            (new Screening())->setTime((new DateTime('2022-03-01 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-02 20:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-03 22:30:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-04 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 20:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 22:30:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-07 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[0])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-01 10:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-01 14:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-01 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-01 22:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[3])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-02 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-03 20:30:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-04 20:30:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 20:30:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-07 20:30:00'))->add(new DateInterval('P10D')))->setMovie($movies[6])->setRoom($rooms[0])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-01 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-02 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-03 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-04 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-07 20:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[1])->setRoom($rooms[2])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-01 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[10])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-03 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[10])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 16:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[10])->setRoom($rooms[1])->setVf(false)->setSubtitled(true)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-01 18:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-02 18:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 18:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 18:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[11])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-02 16:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[9])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-03 16:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[9])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-04 16:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[9])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-02 20:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[3])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-03 20:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[3])->setRoom($rooms[4])->setVf(false)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-04 20:15:00'))->add(new DateInterval('P10D')))->setMovie($movies[3])->setRoom($rooms[4])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-02 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[2])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-04 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[2])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 16:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[2])->setRoom($rooms[1])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),

            (new Screening())->setTime((new DateTime('2022-03-01 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-01 22:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-02 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-02 22:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-05 22:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 14:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),
            (new Screening())->setTime((new DateTime('2022-03-06 22:00:00'))->add(new DateInterval('P10D')))->setMovie($movies[8])->setRoom($rooms[3])->setVf(true)->setSubtitled(false)->setCreatedAt(new DateTimeImmutable())->setUpdatedAt(new DateTime()),




        ];

        foreach ($screenings as $screening) {
            $manager->persist($screening);
        }

        $manager->flush();
    }
}

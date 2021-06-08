<?php

namespace App\Console\Commands;

use App\EmployeeInformation;
use App\Salon;
use App\Service;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class FillDataBaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:fill';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill the Database with data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employeeList = [
            [
                'manager' => 'Amalia Castaliu',
                'employee' => [
                    [
                        'name' => 'Manolache Alexandra',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Petrascu Rodica-Elena',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Infrim Mirabela',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Danciu Alina',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Popescu Mirela',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Pap Manuela-Ioana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Dan Mariana-Florica',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Jurje Loredana-Mariana',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Luca Patricia',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Giuredea Manuela-Ioana',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'NOBLESSE BEAUTY STUDIO',
                    'description' => 'Suntem atenti la tot ceea ce inseamna inovatie in acest domeniu, culegem informatii constant si alegem sa folosim doar ceea este realmente benefic pentru sanatatea parului.
Cunoastem in profunzime detaliile care stau la baza tehnicilor primare ale produselor pe care le recomandam si ne implicam doar in proiecte care aduc realmente schimbari pozitive. Noi credem cu tarie ca in spatele unui NU ferm se afla puterea unui DA calculat care raspunde nevoilor clientilor nostri.',
                    'address' => 'Strada Gheorghe Șincai 31',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Jeny Mirea',
                'employee' => [
                    [
                        'name' => 'Alman Luiza',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Sandu Lucretia',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Anegrului Dana',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Pascu Adrian',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Ferne Rodica',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Sas Elena',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Crudu Felicia',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Popescu Sandra',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Rad Alina',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Rusz Crin',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Illusion',
                    'description' => 'Vrei un Look perfect? Te asteptam la salon Illusion.',
                    'address' => 'Strada Vasile Lucaciu 6',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Salon Prestige',
                'employee' => [
                    [
                        'name' => 'Giurgiu Denisa',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Barbu Camelia',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Falca Sabina',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Daghid Feliciana',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Petrascu Ana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Hofer Dana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Onciu Claudia',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Selegian Lucas',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Sabin Lucia',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Paul Laurentiu',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Prestige',
                    'description' => 'Salonul Prestige ofera inca din 2003 incredere, frumusete, energie şi optimism prin gama variata de servicii, tratamente şi tehnologii de ultima generaţie.
Facem acest lucru pentru ca dumneavoastra, clientii nostri, sa va bucuraţi de cele mai noi, eficiente şi performante produse din lumea internaţionala a frumuseţii.
Salonul Prestige si-a propus inca de la infiintare sa satisfaca exigentele fiecarei persoane, oferindu-i cea mai buna experienta a culorii, tunsorii si stylingului.',
                    'address' => 'Bulevardul Bucuresti 31',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Lucian Cristea',
                'employee' => [
                    [
                        'name' => 'Pop Daniel',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Popa Cristina-Luiza',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Sele Ramona',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Apostol Crina-Alina',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Lazar Camelia',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Onea Alina',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Oituza Salma',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Apostol Carmen',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Palfi Amalia',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Grigoras Amelia',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Salon Biothecare Estetika',
                    'description' => 'Aici este locul unde visurile tale devin inspiratia noastra, pasiunea si eleganta fiind cuvintele ce ne caracterizeaza. Echipa noastra este formata doar din stilisti talentati, fiind tot timpul intr-o continua crestere. Pe lânga serviciile de cea mai inalta calitate pe care le oferim, punem accent si pe o ambianta deosebita, care sa iti mângâie simturile.
Toate produsele folosite sunt de cea mai inalta calitate, apartinând doar brandurilor de succes. Goldwell, Keune, Moroccanoil.
Cel mai mare secret al nostru! Pasiunea.
',
                    'address' => 'Strada Victoriei 3',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Melisa Sas',
                'employee' => [
                    [
                        'name' => 'Negru Florica',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Andreicut Dana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Berecz Ofelia',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Sas Andreea',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Haidu Florin',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Danciulescu Andrada',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Florescu Iuliana',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Bud Rodica',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Grec Paula',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Corpas Silviu',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Sublim Beauty Studio',
                    'description' => 'Sublim Beauty Studio este salonul in care vei putea sa redescoperi gingasia, eleganta si stralucirea feminina. Frumusetea ascunsa si feminitatea aceea cuceritoate, se reveleaza cu fiecare noua experienta in cadrul salonului nostru. Astfel tinem cont de cele mai mici detalii si va punem la dispozitie serviciile noastre de beauty profesionale de top. Alaturi de suportul unor branduri recunoscute, dar si a unui showroom in care va asteptam cu creatii ale unor designeri vestimentari recunoscuti.
Personulul salonului nostru este unul specializat. Acestia au studiat si exersat la cele mai renumite academii din tara, dar si strainatate. Au reusit sa se remarce prin premii importante pe care le-au castigat atat pe plan national, dar si international.',
                    'address' => 'Strada Vasile Alecsandri 89',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Manuela Giurgea',
                'employee' => [
                    [
                        'name' => 'Selegean Alexandra',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Popescu Dariana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Danciu Florina-Ana',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Matei Luciana',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Mihalescu Dacian',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Duta Camelia-Ioana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Dan Ana-Maria',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Pap Sandra',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Griguta Dariana',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Grigoras Rodica-Maria',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Beauty house',
                    'description' => 'Beauty House este un spatiu de lucru unde cei mai talentati coafori isi desfasoara activitatea in fiecare zi. Ne asociem si folosim cele mai respectate branduri de pe piata astfel incat tu sa ai cel mai frumos si sanatos par.
De asemenea transparenta este un principiu de baza astfel vei sti mereu care sunt costurile EXACTE pentru fiecare serviciu, inainte de programare.',
                    'address' => 'Strada Gheorghe Șincai 24',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Bardu Robert',
                'employee' => [
                    [
                        'name' => 'Supur Malina-Ioana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Toth Iuliana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Mihesan Dana',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Durau Cristiana',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Ordace Luiza',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Fanea Sara',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Mois Berna',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Pit Paula-Dumitrita',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Oros Gabriela-Maria',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Tabara Darius',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Hair Station',
                    'description' => 'Saptamâna incepe cu Hair Station pentru:
Un nou look,
O noua senzatie de bine,
Un nou inceput la fel de fresh ca o noua tunsoare!',
                    'address' => 'Strada Victoriei 73',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Pop Ioana-Elena',
                'employee' => [
                    [
                        'name' => 'Fenesan Dana-Ana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Popa Hortensia',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Rusz Cezara',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Timis Delia',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Pop Timea',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Suteu Florina',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Cozma Anabela',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Bolchis Horatiu',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Ghirasin Aurelia',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Onea Daciana-Maria',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'B Elle Cosmetique',
                    'description' => 'B’Elle Cosmetique ofera servicii de ingrijire si estetica a parului, inclusiv tunsori, vopsire si multe altele. De asemenea, ofera o gama variata de tratamente cosmetice personalizate in functie de tipul de ten.
Indiferent de pretentiile tale, iti oferim tot ce ai nevoie sa arati si sa te simti impecabil. In plus, stilistii se mândresc cu capacitatea lor de a transforma o vizita obisnuita la salon intr-un ritual de infrumusetare.',
                    'address' => 'Strada Victoriei 73',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Sarca Adelina',
                'employee' => [
                    [
                        'name' => 'Pop Daliana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]],
                    [
                        'name' => 'Obsitos Amenia',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Roman Ana',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Burzo Laura',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Toth Sara',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Barbur Ofelia-Diana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Popescu Hortensia',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Paul Silvia-Ana',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Ghertiu Sabina',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Palfi Aurel-Ioan',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]

                ],
                'salon' => [
                    'name' => 'ADE beauty-studio',
                    'description' => 'Este un concept de salon de infrumusetare unisex creat in anul 2000. VINO sI REVINO!',
                    'address' => 'Strada George Coşbuc 2/31',
                    'city' => 'Baia Mare'
                ]
            ],
            [
                'manager' => 'Melisa Rusz',
                'employee' => [
                    [
                        'name' => 'Falca Andrei-Ioan',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Vekony Cezar-Iulian',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                    ],
                    [
                        'name' => 'Vaum Maria',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Chereches Diana-Iulia',
                        'service' => [17, 18, 19, 20, 21, 22]
                    ],
                    [
                        'name' => 'Petrascu Amelia-Diana',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Norman Iulia',
                        'service' => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                    ],
                    [
                        'name' => 'Man Simona Iuliana',
                        'service' => [23, 24, 25, 26, 27, 28, 29, 30, 31]
                    ],
                    [
                        'name' => 'Manulescu Lucian-Dan',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Toth Rodica-Diana',
                        'service' => [32, 33, 34, 35, 36, 37, 38, 39, 40, 41]
                    ],
                    [
                        'name' => 'Danescu Ana-Maria',
                        'service' => [42, 43, 44, 45, 46, 47, 48, 49, 50, 51]
                    ]
                ],
                'salon' => [
                    'name' => 'Salon Mela Bella',
                    'description' => 'Salonul Mela Ela s-a nascut din dorinta de inovatie a doi stilisti dornici de mai mult. Cu peste 10 ani de experienta in domeniu, au crescut o echipa de stilisti cu o dorinta de dezvoltare dusa la extrem. De ce noi? Unitate, munca in echipa, tehnica, trend, devotament, sunt câteva din lucrurile pe care clientii nostri ni le spun de câte ori au ocazia.
Care e scopul nostru? Sa ne depasim limitele in fiecare zi, sa ne perfectionam pentru a-ti oferi experienta vietii tale de fiecare data când vii in salonul nostru. Sa te simti important/a, sa te simti rasfatat/a, sa iti oferim perfectul in materie de par. Te-am facut curios/oasa? Vino sa ne cunosti si convinge-te singur/a. WE CHANGE YOUR HAIRSTYLE, WE CHANGE YOUR LIFESTYLE!',
                    'address' => 'Strada Transilvaniei 6/19',
                    'city' => 'Baia Mare'
                ]
            ]
        ];
        $serviceList = [
            [
                'id' => 0,
                'name' => 'Tuns simplu',
                'gender' => 'female',
                'price' => 45
            ],
            [
                'id' => 1,
                'name' => 'Tuns breton',
                'gender' => 'female',
                'price' => 20
            ],
            [
                'id' => 2,
                'name' => 'Tuns vârfuri',
                'gender' => 'female',
                'price' => 25
            ],
            [
                'id' => 3,
                'name' => 'Tuns scurt',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 4,
                'name' => 'Tuns și spălat ',
                'gender' => 'female',
                'price' => 100
            ],
            [
                'id' => 5,
                'name' => 'Tuns bob',
                'gender' => 'female',
                'price' => 45
            ],
            [
                'id' => 6,
                'name' => 'Uscat feon',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 7,
                'name' => 'Coafat cu placa',
                'gender' => 'female',
                'price' => 50
            ],
            [
                'id' => 8,
                'name' => 'Coafat cu peria',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 9,
                'name' => 'Coc mireasă',
                'gender' => 'female',
                'price' => 200
            ],
            [
                'id' => 10,
                'name' => 'Coafat special',
                'gender' => 'female',
                'price' => 250
            ],
            [
                'id' => 11,
                'name' => 'Bucle',
                'gender' => 'female',
                'price' => 50
            ],
            [
                'id' => 12,
                'name' => 'Manoperă extensii',
                'gender' => 'female',
                'price' => 300
            ],
            [
                'id' => 13,
                'name' => 'Spălat extensii',
                'gender' => 'female',
                'price' => 100
            ],
            [
                'id' => 14,
                'name' => 'Coafat extensii',
                'gender' => 'female',
                'price' => 100
            ],
            [
                'id' => 15,
                'name' => 'Manoperă vopsit',
                'gender' => 'female',
                'price' => 500
            ],
            [
                'id' => 16,
                'name' => 'Suvițe',
                'gender' => 'female',
                'price' => 500
            ],
            [
                'id' => 17,
                'name' => 'Tuns',
                'gender' => 'male',
                'price' => 25
            ],
            [
                'id' => 18,
                'name' => 'Tuns și spălat',
                'gender' => 'male',
                'price' => 40
            ],
            [
                'id' => 19,
                'name' => 'Ras capilar',
                'gender' => 'male',
                'price' => 30
            ],
            [
                'id' => 20,
                'name' => 'Bărbierit',
                'gender' => 'male',
                'price' => 35
            ],
            [
                'id' => 21,
                'name' => 'Tuns barbă',
                'gender' => 'male',
                'price' => 25
            ],
            [
                'id' => 22,
                'name' => 'Masaj capilar',
                'gender' => 'male',
                'price' => 15
            ],
            [
                'id' => 23,
                'name' => 'Machiaj de seară',
                'gender' => 'female',
                'price' => 200
            ],
            [
                'id' => 24,
                'name' => 'Machiaj special(mireasă)',
                'gender' => 'female',
                'price' => 300
            ],
            [
                'id' => 25,
                'name' => 'Pensat',
                'gender' => 'female',
                'price' => 20
            ],
            [
                'id' => 26,
                'name' => 'Pensat',
                'gender' => 'male',
                'price' => 25
            ],
            [
                'id' => 27,
                'name' => 'Vopsit sprâncene',
                'gender' => 'female',
                'price' => 20
            ],
            [
                'id' => 28,
                'name' => 'Vopsit gene',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 29,
                'name' => 'Laminare gene',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 30,
                'name' => 'Gene fir cu fir',
                'gender' => 'female',
                'price' => 200
            ],
            [
                'id' => 31,
                'name' => 'Întreținere fir cu fir',
                'gender' => 'female',
                'price' => 200
            ],
            [
                'id' => 32,
                'name' => 'Manichiură simplă',
                'gender' => 'female',
                'price' => 50
            ],
            [
                'id' => 33,
                'name' => 'Manichiură cu ojă semipermanentă',
                'gender' => 'female',
                'price' => 100
            ],
            [
                'id' => 34,
                'name' => 'Intreținere unghii semi',
                'gender' => 'female',
                'price' => 80
            ],
            [
                'id' => 35,
                'name' => 'Unghii tehnice(gel) construcție',
                'gender' => 'female',
                'price' => 250
            ],
            [
                'id' => 36,
                'name' => 'Intreținere unghii tehnice',
                'gender' => 'female',
                'price' => 150
            ],
            [
                'id' => 37,
                'name' => 'Pictură in apă pe unghie',
                'gender' => 'female',
                'price' => 65
            ],
            [
                'id' => 38,
                'name' => 'Manichiură simplă',
                'gender' => 'male',
                'price' => 20
            ],
            [
                'id' => 39,
                'name' => 'Pedichiură simplă',
                'gender' => 'male',
                'price' => 20
            ],
            [
                'id' => 40,
                'name' => 'Pedichiură simplă',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 41,
                'name' => 'Pedichiură cu ojă semipermanentă',
                'gender' => 'female',
                'price' => 50
            ],
            [
                'id' => 42,
                'name' => 'Masaj anticelulitic ',
                'gender' => 'female',
                'price' => 50
            ],
            [
                'id' => 43,
                'name' => 'Masaj relaxare',
                'gender' => 'female',
                'price' => 45
            ],
            [
                'id' => 44,
                'name' => 'Masaj reflexo',
                'gender' => 'female',
                'price' => 75
            ],
            [
                'id' => 45,
                'name' => 'Masaj ',
                'gender' => 'female',
                'price' => 30
            ],
            [
                'id' => 42,
                'name' => 'Masaj anticelulitic ',
                'gender' => 'male',
                'price' => 50
            ],
            [
                'id' => 43,
                'name' => 'Masaj relaxare',
                'gender' => 'male',
                'price' => 45
            ],
            [
                'id' => 44,
                'name' => 'Masaj reflexo',
                'gender' => 'male',
                'price' => 75
            ],
            [
                'id' => 45,
                'name' => 'Masaj ',
                'gender' => 'male',
                'price' => 30
            ]

        ];
        foreach ($serviceList as $service) {
            Service::create([
                'name' => $service['name'],
                'duration' => '30',
                'gender' => $service['gender'],
                'price' => $service['price'],
            ]);
        }

        foreach ($employeeList as $employee) {

            $managerName = explode(' ', $employee['manager']);
            $manager = User::create([
                'firstname' => $managerName[0],
                'lastname' => $managerName[1],
                'email' => strtolower($managerName[0] . '_' . $managerName[1] . '@gmail.com'),
                'password' => Hash::make('test123'),
                'role' => 'manager',
            ]);

            $salon = Salon::create([
                'name' => $employee['salon']['name'],
                'address' => $employee['salon']['address'],
                'city' => $employee['salon']['city'],
                'description' => $employee['salon']['description'],
                'user_id' => $manager->id
            ]);

            foreach ($employee['employee'] as $worker) {
                $workerName = explode(' ', $worker['name']);
                $workerCreated = User::create([
                    'firstname' => $workerName[0],
                    'lastname' => $workerName[1],
                    'email' => strtolower($workerName[0]) . '_' . strtolower($workerName[1]) . '@gmail.com',
                    'password' => Hash::make('test123'),
                    'role' => 'employee',
                ]);
                $employee = EmployeeInformation::create([
                    'user_id' => $workerCreated->id,
                    'salon_id' => $salon->id,
                    'address' => 'Baia Mare',
                    'city' => 'Baia Mare',
                    'phone_number' => '0745701801'
                ]);
                foreach ($worker['service'] as $serviceId) {
                    $service = Service::find($serviceId);
                    $employee->services()->attach($service);
                }
            }
        }

       User::create([
            'firstname' => 'customer',
            'lastname' => 'customer',
            'email' => 'customer@customer.com',
            'password' => Hash::make('test123'),
            'role' => 'customer',
        ]);

        User::create([
            'firstname' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('test123'),
            'role' => 'admin',
        ]);
        echo 'Success';
    }
}

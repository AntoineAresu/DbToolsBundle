<?php

declare(strict_types=1);

namespace MakinaCorpus\DbToolsBundle\Anonymizer\Core;

use MakinaCorpus\DbToolsBundle\Anonymizer\AbstractMultipleColumnAnonymizer;
use MakinaCorpus\DbToolsBundle\Attribute\AsAnonymizer;

/**
 * Anonymized a complete address.
 *
 * This anonymizer handle:
 *  - country: The country. For example, France.
 *  - locality: The locality in which the street address is,
 *    and which is in the region. For example, Nantes.
 *  - region: The region in which the locality is, and which is in the country.
 *    For example, Pays de la Loire or another appropriate first-level Administrative division.
 *  - postal_code: The postal code. For example, 44000.
 *  - street_address: The street address. For example, 5 rue de la Paix.
 *  - secondary_address: Additional information (apartment, block)
 *
 * Sample from https://randommer.io/random-address
 */
#[AsAnonymizer('address')]
class AddressAnonymizer extends AbstractMultipleColumnAnonymizer
{
    /**
     * @inheritdoc
     */
    protected function getColumnNames(): array
    {
        return [
            'street_address',
            'secondary_address',
            'postal_code',
            'locality',
            'region',
            'country',
        ];
    }

    /**
     * @inheritdoc
     */
    protected function getSamples(): array
    {
        return [
            ['34605 Terrance Field', 'Suite 322', '80161-7041', 'Lake Fiona', 'Oregon', 'United States'],
            ['333 Cristopher Mountains', 'Apt. 686', '46019-4846', 'South Matildeshire', 'Kansas', 'United States'],
            ["ვართაგავას ჩიხი 4","შენობა 121",112,"ჩოლოყაშვილიძირი","California","Georgia"],
            ["დარიალის ხეივანი 2","კორპ. 70",104,"ახალი შაბური","Missouri","Georgia"],
            ["შენგელაიას ხეივანი 07","კორპ. 01",113,"ზემო ნუკრისკარი","New Jersey","Georgia"],
            ["ათარბეგოვის ჩიხი 04","შენობა 135",114,"დვალისკარი","Kansas","Georgia"],
            ["ინდუსტრიალიზაციის ქუჩა 463","კორპ. 07",115,"ედიშერაშვილიდაბა","Missouri","Georgia"],
            ["იამანიძის გამზირი 921","კორპ. 88",137,"მიშიკოდაბა","Wyoming","Georgia"],
            ["ზაარბრიუკენის გამზირი 8","კორპ. 55",144,"ბიჭიკოძირი","Arizona","Georgia"],
            ["ნაკაშიძის ქუჩა 916","კორპ. 36",148,"თეიმურაზსკარი","Nebraska","Georgia"],
            ["ბალმაშევის გამზირი 438","შენობა 593",148,"ტურიასოფელი","Arkansas","Georgia"],
            ["ტეტელაშვილის გამზ. 7","კორპ. 85",150,"მარინესოფელი","Wyoming","Georgia"],
            ["სევასტოპოლის გამზ. 15","კორპ. 21",159,"ივქირიონდაბა","Florida","Georgia"],
            ["დიდუბის ჩიხი 639","შენობა 173",160,"ჭარელიძესკარი","Mississippi","Georgia"],
            ["მიასნიკოვის გამზ. 82","კორპ. 43",161,"ზემო სოსოსკარი","Pennsylvania","Georgia"],
            ["თამარაშვილის გამზირი 07","კორპ. 32",164,"მგალობლიშვილისოფელი","Oklahoma","Georgia"],
            ["ლუბოვსკის ჩიხი 812","კორპ. 69",165,"ზემო ბექა","Minnesota","Georgia"],
            ["გუდიაშვილის ქ. 00","შენობა 240",174,"ზურასკარი","New York","Georgia"],
            ["ქუთათელაძის ქ. 51","შენობა 602",186,"ქავთარაძესკარი","Tennessee","Georgia"],
            ["Lindenhofstraße 52a","Apt. 001",187,"Dietach","Vorarlberg","Austria"],
            ["რამიშვილი ხეივანი 959","შენობა 233",188,"გამრეკელიდაბა","Tennessee","Georgia"],
            ["საბადურის გამზ. 8","კორპ. 09",189,"ცოქალასოფელი","Ohio","Georgia"],
            ["რობესპიერის ქ. 3","კორპ. 00",198,"ქავთარაძესკარი","Washington","Georgia"],
            ["466 Elaina Streets","Apt. 956",451,"Alivialand","California","South Africa"],
            ["850 Graham Squares","Suite 592",474,"North Miracleberg","Hawaii","South Africa"],
            ["冯中心2号","Apt. 089",717,"福州市","上海市","China"],
            ["Uferstraße (Schwarzau am Steinfeld) 7","Apt. 464",885,"Hochwolkersdorf","Salzburg","Austria"],
            ["Helenengasse 21b","Zimmer 559",1108,"Übelbach","Tirol","Austria"],
            ["Blasiussteig 4","Apt. 513",1206,"Ort im Innkreis","Oberösterreich","Austria"],
            ["98 Rue Saint-Jacques","8 étage",1278,"Lorient","Lorraine","France"],
            ["Schulgasse (Langeck) 7","Apt. 429",1428,"Villach","Steiermark","Austria"],
            ["586 Von Ridge","Apt. 071",1439,"East Lavinabury","North Carolina","South Africa"],
            ["07822 Sylvia Lake","Suite 903",2418,"Ryleyton","West Virginia","South Africa"],
            ["14064 Koepp Ford","Suite 759",2435,"Gorczanymouth","Georgia","United States"],
            ["963 Crona Knolls","Suite 311",2594,"Katelynnbury","Pennsylvania","South Africa"],
            ["4167 Bradtke Well","Suite 522",3071,"Emmerichmouth","Nebraska","South Africa"],
            ["57173 Champlin Road","Apt. 667",3159,"Gageton","Florida","South Africa"],
            ["50356 Penelope Spring","Suite 782",3203,"Burleymouth","West Virginia","Ireland"],
            ["Klamm 6","0 OG",3227,"Niederleis","Oberösterreich","Austria"],
            ["Ahorngasse (St. Andrä) 29a","Apt. 675",3576,"Frantschach-St. Gertraud","Niederösterreich","Austria"],
            ["6371 O'Reilly Inlet","Suite 106",3877,"New Jarvishaven","Hawaii","United States"],
            ["Paul Peters-Gasse 8","Apt. 587",3996,"Innerbraz","Salzburg","Austria"],
            ["1207 Feil Gateway","Apt. 242",4475,"Michellemouth","Hawaii","South Africa"],
            ["94211 Greenholt Parks","Suite 149",4509,"Susieside","Hawaii","South Africa"],
            ["Obere Berggasse 132","9 OG",4511,"Ybbsitz","Tirol","Austria"],
            ["44398 Doyle Streets","Apt. 888",4844,"Port Kameronberg","Tennessee","South Africa"],
            ["30855 Monahan Islands","Apt. 264",5113,"Lake Tony","Connecticut","South Africa"],
            ["Födlerweg 6","Zimmer 154",5486,"Fritzens","Oberösterreich","Austria"],
            ["Weiherweg 21a","Zimmer 726",5553,"St. Pölten","Steiermark","Austria"],
            ["997 Charlene Landing","Suite 345",5763,"Lake Katelyn","South Carolina","South Africa"],
            ["Fischpointweg 2","2 OG",6166,"Axams","Tirol","Austria"],
            ["237 Mills Fall","Suite 288",6186,"Wisokybury","Wyoming","South Africa"],
            ["Sonnenweg 55","Apt. 232",6282,"Öblarn","Oberösterreich","Austria"],
            ["Seeblick 47a","8 OG",6454,"Oberndorf in Tirol","Wien","Austria"],
            ["77751 Crooks Bypass","Apt. 696",6547,"Augustinemouth","Missouri","South Africa"],
            ["Kirchenplatz 576","Zimmer 679",6673,"Axams","Niederösterreich","Austria"],
            ["Nordwestbahnbrücke 447","5 OG",6933,"Rettenegg","Salzburg","Austria"],
            ["Lichtensternsiedlung V 04c","Zimmer 179",7104,"Mattsee","Oberösterreich","Austria"],
            ["Weiherweg 57a","Apt. 840",7202,"Krumbach","Tirol","Austria"],
            ["7072 Moen Pike","Suite 194",7731,"Charlesbury","Indiana","Ireland"],
            ["5543 Berge Rapids","Suite 842",8005,"East Giovani","Illinois","South Africa"],
            ["Sportplatzstraße 98b","Apt. 769",9433,"Niederleis","Tirol","Austria"],
            ["Hussovits Gasse 89a","Zimmer 709",9784,"Deutsch-Wagram","Kärnten","Austria"],
            ["0101 Rue de la Victoire","Apt. 686",12639,"Saint-Paul","Corse","France"],
            ["5872 Merlin Locks","Suite 079",19554,"Ignaciotown","Minnesota","United States"],
            ["6281 Passage Saint-Honoré","Apt. 453",20888,"Toulouse","Franche-Comté","France"],
            ["0761 Boulevard de Provence","Apt. 089",21003,"Toulon","Centre","France"],
            ["6700 Walker Shoals","Apt. 965",21336,"Emardbury","Ohio","United States"],
            ["7264 Dickinson Landing","Apt. 003",21406,"Lydiaburgh","Arkansas","United States"],
            ["983 Voie d'Abbeville","Apt. 264",24539,"Toulon","Bourgogne","France"],
            ["8638 Hane Summit","Suite 481",25332,"East Cassandra","Missouri","Ireland"],
            ["206 Schamberger Rue","Suite 457",25804,"Mraztown","New Mexico","United States"],
            ["136 Evert Well","Apt. 744",26058,"Chadrickberg","Michigan","Ireland"],
            ["18330 Leonardo Extension","Suite 803",33813,"Dickiberg","California","United States"],
            ["55264 Mayert Branch","Apt. 538",41926,"Lake Jettieton","Alaska","United States"],
            ["4092 Rowe Plains","Apt. 040",42595,"Hintzfurt","Maryland","South Africa"],
            ["7381 Quai Pastourelle","8 étage",47367,"Reims","Lorraine","France"],
            ["0929 Wintheiser Throughway","Suite 524",48006,"New Charlenemouth","Ohio","South Africa"],
            ["4348 Margot Mountain","Suite 603",48982,"Hermannborough","Georgia","South Africa"],
            ["0 Place Laffitte","1 étage",49187,"Saint-Quentin","Bourgogne","France"],
            ["093 Ruecker Islands","Suite 075",49591,"Nolanhaven","Wisconsin","Ireland"],
            ["1090 Abshire Inlet","Apt. 416",49628,"Zoetown","Missouri","Ireland"],
            ["9 Place Lepic","Apt. 213",51924,"Vénissieux","Basse-Normandie","France"],
            ["24431 Rau Locks","Suite 514",57704,"South Garnett","New Mexico","United States"],
            ["908 Quai de la Bûcherie","2 étage",57776,"Boulogne-Billancourt","Provence-Alpes-Côte d'Azur","France"],
            ["7302 Bartell Rapid","Suite 259",62755,"East Ottoview","Wisconsin","Ireland"],
            ["6668 Place du Havre","4 étage",65505,"Cayenne","Nord-Pas-de-Calais","France"],
            ["10 Rue de la Bûcherie","4 étage",66469,"Limoges","Île-de-France","France"],
            ["5721 Boulevard de l'Odéon","6 étage",68032,"Lorient","Provence-Alpes-Côte d'Azur","France"],
            ["8556 Allée du Havre","Apt. 807",68282,"Brest","Alsace","France"],
            ["743 Howell Landing","Suite 119",69497,"Lindgrenfort","Michigan","United States"],
            ["99 Voie Saint-Jacques","Apt. 363",78722,"Bordeaux","Provence-Alpes-Côte d'Azur","France"],
            ["胡旁10号","Apt. 594",80262,"济安市","吉林省","China"],
            ["71327 Tate Hollow","Apt. 816",80956,"North Lulu","New Mexico","United States"],
            ["07321 Hegmann Underpass","Apt. 448",81801,"Steubertown","Oregon","United States"],
            ["3292 Avenue Lepic","Apt. 520",82609,"Strasbourg","Limousin","France"],
            ["38030 Maureen Summit","Suite 241",83387,"North Asiaview","Kansas","South Africa"],
            ["97 Boulevard du Chat-qui-Pêche","8 étage",87727,"Perpignan","Centre","France"],
            ["60159 Smitham Common","Apt. 459",92857,"Irwinburgh","Connecticut","South Africa"],
            ["0334 Passage Pastourelle","9 étage",93811,"Reims","Bourgogne","France"],
            ["362 Misael Via","Suite 450",94670,"North Samchester","Mississippi","Ireland"],
            ["714 Rue Bonaparte","7 étage",94768,"Toulouse","Aquitaine","France"],
            ["92 Impasse de la Pompe","Apt. 239",95960,"Perpignan","Limousin","France"],
            ["5852 Otis Creek","Suite 708",96543,"East Ayanaland","Montana","United States"],
            ["4335 Place du Havre","Apt. 689",96642,"Paris","Provence-Alpes-Côte d'Azur","France"],
            ["8440 Ankunding Locks","Suite 481",97111,"Ilianafurt","Georgia","Ireland"],
            ["马中心13980号","Apt. 382",127699,"北都市","青海省","China"],
            ["毛路42号","Apt. 784",177445,"贵海市","香港","China"],
            ["于栋50660号","Apt. 723",181844,"吉门市","浙江省","China"],
            ["余侬153号","Apt. 377",289722,"长阳市","福建省","China"],
            ["余桥85075号","Suite 400",291456,"济头市","湖北省","China"],
            ["韦旁8724号","Suite 344",300309,"厦原市","重庆市","China"],
            ["赖桥779号","Suite 779",339676,"武州市","江苏省","China"],
            ["雷旁11666号","Suite 150",350510,"吉门市","贵州省","China"],
            ["阎街6605号","Suite 418",368169,"北沙市","广西省","China"],
            ["武巷49468号","Suite 969",383655,"太林市","广西省","China"],
            ["龚栋1号","Apt. 736",472885,"成乡县","台湾省","China"],
            ["戴旁5792号","Apt. 195",473118,"吉京市","山西省","China"],
            ["谭侬85号","Suite 177",476549,"成都市","新疆","China"],
            ["郭旁81号","Suite 483",486831,"上京市","天津市","China"],
            ["尹中心47号","Suite 271",558135,"南徽市","河南省","China"],
            ["郭中心7号","Apt. 213",682937,"西码市","重庆市","China"],
            ["魏栋8号","Suite 513",696183,"太汉市","台湾省","China"],
            ["谢路8917号","Suite 094",929526,"上阳市","香港","China"],
            ["8696 Chasity Burg","Suite 788","02481-1788","Michaelaside","Nebraska","Ireland"],
            ["83241 Isidro Groves","Apt. 186","03364-4746","Ednaville","Pennsylvania","United States"],
            ["323 Leta Spurs","Apt. 703","08527-1674","New Calefort","Louisiana","Ireland"],
            ["4791 Torp Isle","Apt. 994","19761-8618","South Jamarcus","Maryland","Ireland"],
            ["74278 Wyman Falls","Apt. 187","22642-2073","New Casimer","Kansas","Ireland"],
            ["62258 Romaguera Crossroad","Apt. 352","29893-7184","South Amalia","South Carolina","Ireland"],
            ["95672 Leslie Passage","Apt. 936","31209-4583","Ronmouth","North Carolina","United States"],
            ["45989 Kristopher Brook","Suite 362","38191-8639","West Ceasarshire","Colorado","United States"],
            ["347 Tamara Points","Apt. 300","42460-1110","Lake Cali","New Mexico","Ireland"],
            ["9017 Emerald Centers","Suite 939","43656-2460","Rempelmouth","Mississippi","Ireland"],
            ["292 Rice Estates","Suite 737","47140-2654","Anselfort","Utah","Ireland"],
            ["2291 Cartwright Inlet","Suite 607","47785-5388","Lake Edmondbury","Arizona","Ireland"],
            ["0709 Boyer Brook","Apt. 768","48258-7408","North Euniceville","Rhode Island","United States"],
            ["65678 Ariel Highway","Apt. 167","49735-4648","Port Ludie","Vermont","United States"],
            ["6353 Friesen Streets","Suite 832","58188-6595","Port Hazelstad","Rhode Island","United States"],
            ["3294 Gianni Isle","Suite 929","60085-7988","East Isac","New Hampshire","Ireland"],
            ["204 Heathcote Mountain","Suite 672","74179-9105","Harrisfurt","Ohio","United States"],
            ["85251 Kertzmann Hills","Suite 334","98026-3587","South Hudsonview","Nevada","Ireland"],
            ["Məmmədyarov küçəsi",827,"m. 020","AZ4626","Ağdaş","Azerbaijan"],
            ["sahəsi Xan Şuşinski",186,"m. 073","AZ3228","Gəncə","Azerbaijan"],
            ["sahəsi Bəşir Səfəroğlu",89,"m. 166","AZ2308","Xırdalan","Azerbaijan"],
            ["Fikrət Əmirov sh.",538,"m. 181","AZ7395","Hacıqabul","Azerbaijan"],
            ["küçəsi Hənifə Ələsgərova",624,"m. 255","AZ0126","Ağsu","Azerbaijan"],
            ["pr. İsgəndərov",802,"m. 275","AZ8289","Bərdə","Azerbaijan"],
            ["Neapol küç.",940,"m. 298","AZ8322","Cəbrayıl","Azerbaijan"],
            ["Ceyhunbəy Hacıbəyli pr.",818,"m. 331","AZ2538","Laçın","Azerbaijan"],
            ["Abdulla Şaiq sh.",224,"m. 370","AZ3952","Bakı","Azerbaijan"],
            ["küç. Xudu Məmmədov",133,"m. 538","AZ4577","Ağsu","Azerbaijan"],
            ["Üzeyir Hacıbəyov sahəsi",332,"m. 634","AZ3039","Horadiz","Azerbaijan"],
            ["Ağadadaş Qurbanov prospekti",879,"m. 652","AZ9110","İmişli","Azerbaijan"],
            ["Oqtay Vəliyev küçəsi",382,"m. 666","AZ0388","Qax","Azerbaijan"],
            ["küç. Xaqani",680,"m. 679","AZ4909","Beyləqan","Azerbaijan"],
            ["sahəsi Ceyhun Səlimov",37,"m. 756","AZ6681","Şabran","Azerbaijan"],
            ["Nigar Rəfibəyli sahəsi",549,"m. 772","AZ5859","Şirvan","Azerbaijan"],
            ["pr. Vasif Əliyev",16,"m. 816","AZ4000","Zərdab","Azerbaijan"],
            ["Abbas Mirzə Şərifzadə sh.",699,"m. 868","AZ1635","Ucar","Azerbaijan"],
            ["Əzim Əzimzadə küç.",611,"m. 922","AZ2323","Goranboy","Azerbaijan"],
            ["Alı Mustafayev sh.",535,"m. 999","AZ7426","Saatlı","Azerbaijan"],
            ["N4 7238","Lote 04","7233-296","Marco de Canaveses","Portalegre","Portuguese"],
            ["N54 0","Bloco 38","8508-006","Agualva-Cacém","Beja","Portuguese"],
            ["N974-1 9","Lote 66","5737-880","Marinha Grande","Viseu","Portuguese"],
            ["N49 0","Bloco 76","1756-523","Lisbon","Lisboa","Portuguese"],
            ["N30 074","Apto. 756","1846-039","Lixa","Setúbal","Portuguese"],
            ["N937 6712","Casa 6","2432-644","Cantanhede","Santarém","Portuguese"],
            ["N2 9","Apto. 985","3462-924","São Mamede de Infesta","Coimbra","Portuguese"],
            ["N805 4","Apto. 504","9720-019","Vizela","Setúbal","Portuguese"],
            ["Estrada Elisa Ferreira 6","Lote 85","8336-381","Ribeira Grande","Viana do Castelo","Portuguese"],
            ["N8 6","Lote 47","2003-121","Cartaxo","Porto","Portuguese"],
            ["N109 3809","Lote 96","2281-827","São Mamede de Infesta","Porto","Portuguese"],
            ["N19 0437","Casa 1","3143-694","São Mamede de Infesta","Portalegre","Portuguese"],
            ["N524 8","Apto. 782","8430-773","Amadora","Beja","Portuguese"],
            ["N10 6136","Bloco 96","3246-212","Paços de Ferreira","Beja","Portuguese"],
            ["Largo Maria Matos 065","Lote 63","2198-787","Lamego","Viseu","Portuguese"],
            ["N241-7 8","Bloco 01","2951-562","Vila Nova de Foz Côa","Braga","Portuguese"],
            ["N50 5","Casa 8","1294-480","Coimbra","Viseu","Portuguese"],
            ["N682 8485","Casa 2","6932-178","Tondela","Faro","Portuguese"],
            ["N57 033","Apto. 219","1000-601","Almada","Portalegre","Portuguese"],
            ["N89 84","Lote 67","7633-277","Santo Tirso","Viana do Castelo","Portuguese"],
            ["Flurweg 37c","Zimmer 060",9974,"Allerheiligen bei Wildon","Niederösterreich","Austria"],
            ["Neustiftgasse 45b","Zimmer 290",3780,"Feistritz am Wechsel","Steiermark","Austria"],
            ["Fritz-Pregl-Straße 7","Zimmer 193",3023,"Öblarn","Wien","Austria"],
            ["Zulechnerweg 84a","6 OG",5717,"Feistritz am Wechsel","Tirol","Austria"],
            ["Grub 134","Zimmer 581",1447,"Zeillern","Steiermark","Austria"],
            ["Herminengasse 269","Apt. 335",2210,"Wien","Niederösterreich","Austria"],
            ["Alleestraße (Poysbrunn) 71","Apt. 101",5060,"Trebesing","Steiermark","Austria"],
            ["Kleinbaumgarten 07b","3 OG",58,"Jeging","Wien","Austria"],
            ["Gösting 68c","2 OG",2498,"Pitschgau","Oberösterreich","Austria"],
            ["Reichensteinstraße 93","Apt. 165",7927,"Berndorf bei Salzburg","Tirol","Austria"],
            ["Auf der Stift 8","5 OG",5443,"Mauterndorf","Vorarlberg","Austria"],
            ["Hussovits Gasse 96b","Apt. 207",5658,"Öblarn","Tirol","Austria"],
            ["Reichensteinstraße 80a","Apt. 261",9086,"Lech","Wien","Austria"],
            ["Teichstraße 63b","Zimmer 816",1043,"Lech","Salzburg","Austria"],
            ["Uferstraße (Schwarzau am Steinfeld) 44b","Zimmer 505",677,"Oed-Oehling","Salzburg","Austria"],
            ["Helenengasse 87","6 OG",4049,"Mautern an der Donau","Vorarlberg","Austria"],
            ["Dr.Karl Holoubek-Str. 75c","Apt. 018",3450,"Geiersberg","Niederösterreich","Austria"],
            ["Koloniestraße 23c","Zimmer 340",3484,"Hochwolkersdorf","Burgenland","Austria"],
            ["Poppichl 63b","8 OG",7054,"Weißkirchen an der Traun","Kärnten","Austria"],
            ["Ahorn 80b","Apt. 992",2750,"Jungholz","Salzburg","Austria"],
            ["286 Roman Street","Suite 735",7213,"Ammannport","Nebraska","Switzerland"],
            ["7375 Gianni Plains","Apt. 352",1878,"East Petraview","New Mexico","Switzerland"],
            ["307 Blaser Vista","Suite 813",4685,"Patriciaside","Alaska","Switzerland"],
            ["99774 Stadelmann Skyway","Suite 965",4329,"Port Lukasshire","Utah","Switzerland"],
            ["0973 Fehr Walk","Suite 711",8079,"Monikachester","Oklahoma","Switzerland"],
            ["4794 Zingg Crescent","Suite 442",6651,"New Willytown","West Virginia","Switzerland"],
            ["98918 Pascal Keys","Suite 822",3500,"East Manuel","Indiana","Switzerland"],
            ["411 Sandra Trace","Apt. 100",7504,"Favreberg","Florida","Switzerland"],
            ["273 Bader Coves","Suite 318",9198,"East Stéphanie","Alabama","Switzerland"],
            ["1401 Madeleine Tunnel","Suite 694",1175,"North Lucaview","Virginia","Switzerland"],
            ["8015 Forster Shore","Apt. 278",1801,"Grossmouth","New Hampshire","Switzerland"],
            ["6745 Schwarz Mews","Suite 366",9879,"Fischerstad","West Virginia","Switzerland"],
            ["01294 Ulrich Lodge","Apt. 597",3256,"Lake Yvesshire","Indiana","Switzerland"],
            ["3004 Käser Pass","Suite 720",9522,"Schaubstad","Virginia","Switzerland"],
            ["5841 Meier Stravenue","Apt. 842",4379,"Renatemouth","Georgia","Switzerland"],
            ["5024 Lang Ville","Apt. 410",7773,"Huberberg","Alaska","Switzerland"],
            ["879 Wegmann Wall","Apt. 832",2394,"Johannton","North Dakota","Switzerland"],
            ["7274 Forster Walks","Apt. 250",6483,"Anne-Marieport","Illinois","Switzerland"],
            ["3617 Pascal Canyon","Apt. 585",6756,"Harrystad","New Mexico","Switzerland"],
            ["3998 Josef Heights","Apt. 202",6298,"Myriamshire","Iowa","Switzerland"],
            ["06552 Mike Coves","Apt. 556","V9F 5W4","East Mallory","Yukon","Canada"],
            ["1553 Mosciski Plaza","Suite 953","R1Z 4W5","Barrybury","Nunavut","Canada"],
            ["8817 Conroy Place","Suite 366","L1E 4J7","Kilbackborough","Yukon","Canada"],
            ["6243 Harris Land","Apt. 178","M0C 8A8","East Ernestinaville","Manitoba","Canada"],
            ["4141 Daugherty Estate","Apt. 218","A7V 6V4","Destinberg","Territoires du Nord-Ouest","Canada"],
            ["73166 Langworth Manors","Apt. 210","X9A 6K1","Erickabury","Nouvelle-Écosse","Canada"],
            ["0497 Swaniawski Ports","Suite 104","K9N 5T2","Elinorefort","Saskatchewan","Canada"],
            ["0783 Alexane Trail","Apt. 880","S7L 2Q5","Swiftview","Saskatchewan","Canada"],
            ["674 Destinee Tunnel","Apt. 181","J7P 2W7","Port Lindamouth","Nouveau-Brunswick","Canada"],
            ["1974 Brook Tunnel","Apt. 268","V0G 5Z1","New Theronview","Territoires du Nord-Ouest","Canada"],
            ["8134 Casper Valleys","Apt. 810","J3Z 5J6","Skilesborough","Alberta","Canada"],
            ["66497 Bergnaum Fork","Apt. 990","H9Y 9O5","West Shaun","Nouveau-Brunswick","Canada"],
            ["906 Murazik Divide","Suite 989","N3U 4Q2","South Shawnaview","Nouvelle-Écosse","Canada"],
            ["807 Sylvan Ville","Apt. 102","Y5S 7D4","North Ninafort","Colombie-Britannique","Canada"],
            ["43290 Nannie Burg","Apt. 916","G1Q 7O6","North Nyasialand","Nunavut","Canada"],
            ["1895 Abbey Walk","Suite 063","S1B 9F5","Jaidenton","Terre-Neuve-et-Labrador","Canada"],
            ["815 Oran Cape","Suite 350","S9X 7D7","East Dee","Saskatchewan","Canada"],
            ["57428 Mozell Extensions","Apt. 009","J2S 4V0","West Noemyville","Alberta","Canada"],
            ["88037 Schmitt Overpass","Suite 821","J5T 6F7","West Mervinfort","Ontario","Canada"],
            ["3976 Morissette Fields","Apt. 390","M8Y 2Z0","Port Destiniberg","Colombie-Britannique","Canada"],
            ["30 Ağustos Caddesi 79b","Apt. 915",48652,"Tokat","Sakarya","Turkey"],
            ["Kocatepe Caddesi 448","Suite 526",82307,"Çanakkale","Yalova","Turkey"],
            ["Bayır Sokak 20a","Apt. 858",42766,"Tokat","Kayseri","Turkey"],
            ["İsmet Paşa Caddesi 412","Suite 924",69630,"Ordu","Burdur","Turkey"],
            ["Okul Sokak 45b","Apt. 102",34409,"Samsun","Hakkâri","Turkey"],
            ["Sıran Söğüt Sokak 41b","Apt. 693",12016,"Niğde","Kirklareli","Turkey"],
            ["Bayır Sokak 2","Suite 016",96365,"Nevşehir","Denizli","Turkey"],
            ["Sarıkaya Caddesi 39","Suite 296",12896,"Şırnak","Trabzon","Turkey"],
            ["Barış Sokak 93c","Suite 956",3510,"Şanlıurfa","Kütahya","Turkey"],
            ["Lütfi Karadirek Caddesi 16","Suite 286",25066,"Ordu","Burdur","Turkey"],
            ["İsmet Attila Caddesi 6","Apt. 563",25001,"Kayseri","Sinop","Turkey"],
            ["Fatih Sokak  521","Suite 062",94427,"Balıkesir","Batman","Turkey"],
            ["Ali Çetinkaya Caddesi 5","Suite 632",7317,"Edirne","Kayseri","Turkey"],
            ["Bandak Sokak 187","Suite 164",22992,"Denizli","Karabük","Turkey"],
            ["Bahçe Sokak 2","Apt. 487",69062,"Kırşehir","Isparta","Turkey"],
            ["Fatih Sokak  91a","Suite 181",30111,"Kastamonu","Yozgat","Turkey"],
            ["Namık Kemal Caddesi 25","Suite 339",94490,"Antalya","Igdir","Turkey"],
            ["Dağınık Evler Sokak 79","Suite 759",28284,"Isparta","Edirne","Turkey"],
            ["İbn-i Sina Sokak 37c","Suite 083",33401,"Uşak","Osmaniye","Turkey"],
            ["Kekeçoğlu Sokak 8","Apt. 612",4111,"Kırıkkale","Sakarya","Turkey"],
            ["N836 02","Lote 11","8086-669","Almada","Faro","Portuguese"],
            ["N80 0150","Bloco 99","4637-249","Odivelas","Guarda","Portuguese"],
            ["N39 750","Bloco 13","5234-986","Vale de Cambra","Castelo Branco","Portuguese"],
            ["Avenida Ivo Morais 572","Bloco 79","3459-183","Sabugal","Porto","Portuguese"],
            ["N6 09","Lote 91","9604-160","Freamunde","Aveiro","Portuguese"],
            ["Calçada Mia Neves 4268","Lote 59","7558-814","Peso da Régua","Lisboa","Portuguese"],
            ["N17 5196","Bloco 46","1392-963","Beja","Portalegre","Portuguese"],
            ["N163-7 0127","Bloco 45","5218-746","Vila Nova de Gaia","Lisboa","Portuguese"],
            ["N434 5","Apto. 256","9186-791","Lagos","Braga","Portuguese"],
            ["N566 55","Apto. 600","4031-034","Mêda","Porto","Portuguese"],
            ["N909-0 47","Bloco 45","0116-417","Funchal","Santarém","Portuguese"],
            ["N88 1606","Apto. 802","0288-051","Bragança","Beja","Portuguese"],
            ["N070-2 1449","Bloco 79","9868-446","Peniche","Leiria","Portuguese"],
            ["N75 892","Casa 8","9275-060","Moura","Faro","Portuguese"],
            ["N202 8","Bloco 30","1095-395","Tavira","Braga","Portuguese"],
            ["N0 0829","Casa 8","1732-276","Bragança","Aveiro","Portuguese"],
            ["N508 322","Apto. 762","6897-188","Santo Tirso","Faro","Portuguese"],
            ["N46 5263","Casa 6","0947-820","Trancoso","Vila Real","Portuguese"],
            ["N1 76","Bloco 93","5086-251","Elvas","Santarém","Portuguese"],
            ["Caminho Íris Brito 4229","Bloco 22","9335-639","Santa Maria da Feira","Vila Real","Portuguese"],
            ["Aleea Bulandra Tony","",114087,"Pucioasa","Sibiu","Romania"],
            ["Intrarea Poiana Codrului","",920546,"Timișoara","Mures","Romania"],
            ["Aleea Cercelus","",654559,"Rovinari","Cluj","Romania"],
            ["Intrarea Tincani","",862782,"Rovinari","Teleorman","Romania"],
            ["Bulevardul Prahova","",205825,"Constanța","Bucuresti","Romania"],
            ["Intrarea Dobrun","",114219,"Satu Mare","Gorj","Romania"],
            ["Aleea Plutonier Nita Ion","",22465,"Timișoara","Iasi","Romania"],
            ["Intrarea Movilitei","",646558,"Sibiu","Bihor","Romania"],
            ["Intrarea Alexandru Locusteanu","",735365,"Covasna","Mures","Romania"],
            ["Aleea Vespasian","",543074,"Zalău","Arad","Romania"],
            ["Aleea Fieni","",991927,"Breaza","Satu-Mare","Romania"],
            ["Aleea Tincani","",328096,"Sărmașu","Vaslui","Romania"],
            ["Intrarea Soldat Velicu Stefan","",995591,"Aninoasa","Bacau","Romania"],
            ["Intrarea Natiunile Unite","",224759,"Focșani","Cluj","Romania"],
            ["Aleea Reconstructiei","",433647,"Calafat","Vrancea","Romania"],
            ["Intrarea Delureni","",61951,"Flămânzi","Galati","Romania"],
            ["Aleea Zambetului","Bloc 10",230782,"Băile Olănești","Ialomita","Romania"],
            ["Intrarea Daia","Bloc 25",738775,"Mioveni","Mehedinti","Romania"],
            ["Aleea Mihai Viteazul","Bloc 57",930483,"Nucet","Dolj","Romania"],
            ["Aleea Sacele","Bloc 48",26062,"Nucet","Maramures","Romania"],
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\RegisteredDish;

class RegisteredDishesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Maxxx Energy',
        'description'=>'Bebida energizante, una combinación única de taurina, cafeína, extracto de guaraná y vitaminas.',
        'purchase_price'=>0.0,
        'sale_price'=>2100.0, 
        'units'=>0,
        'image'=>'dish_1726538109.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Monster Energy Verde',
        'description'=>'Sabores isleños vigorizantes con kiwi, lima y un toque de pepino',
        'purchase_price'=>0.0,
        'sale_price'=>2100.0,
        'units'=>0,
        'image'=>'dish_1726027771.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Monster Energy Absolutely Zero',
        'description'=>'Dulce y salado con un toque de cítricos.',
        'purchase_price'=>0.0,
        'sale_price'=>2100.0,
        'units'=>0,
        'image'=>'dish_1726027901.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Powerade Avalancha',
        'description'=>'Bebida hidratante y energética para deportistas sabor mora azul.',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'dish_1726028444.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Powerade Frutas',
        'description'=>'Bebida hidratante y energética para deportistas sabor frutas',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'dish_1726028211.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Powerade Zero Azucar Mixed Berries',
        'description'=>'Bebida hidratante y energética para deportistas sabor bayas mixtas.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726028541.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 3,
        'title'=>'Jet',
        'description'=>'Bebida energizante producida con una receta única la cual permite combinar refrescancia y energía',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1728514691.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 8,
        'title'=>'Café 12oz',
        'description'=>'Café negro o con leche',
        'purchase_price'=>0.0,
        'sale_price'=>1000.0,
        'units'=>0,
        'image'=>'dish_1726028698.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 8,
        'title'=>'Café 8oz',
        'description'=>'Café negro o con leche',
        'purchase_price'=>0.0,
        'sale_price'=>800.0,
        'units'=>0,
        'image'=>'dish_1726028729.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 8,
        'title'=>'Té 8oz',
        'description'=>'Bebida aromática preparada a partir de hojas de té en agua hirviendo',
        'purchase_price'=>0.0,
        'sale_price'=>800.0,
        'units'=>0,
        'image'=>'dish_1726028841.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Del Valle Mango',
        'description'=>'Del Valle Néctar de Mango es una bebida elaborada a partir del mejor jugo de fruta de Del Valle',
        'purchase_price'=>0.0,
        'sale_price'=>1000.0,
        'units'=>0,
        'image'=>'dish_1726028947.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Del Valle Mango Fresa',
        'description'=>'Del Valle Néctar de Mango Fresa es una bebida elaborada a partir del mejor jugo de fruta de Del Valle',
        'purchase_price'=>0.0,
        'sale_price'=>1000.0,
        'units'=>0,
        'image'=>'dish_1726029031.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Del Valle Durazno',
        'description'=>'Del Valle Néctar de Durazno es una bebida elaborada a partir del mejor jugo de fruta de Del Valle',
        'purchase_price'=>0.0,
        'sale_price'=>1000.0,
        'units'=>0,
        'image'=>'dish_1726029121.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Hi-C Frutas Tetra Brik',
        'description'=>'Bebida de fruta sabrosa con otros sabores naturales fabricados con 3 zumos de concentrado.',
        'purchase_price'=>0.0,
        'sale_price'=>800.0,
        'units'=>0,
        'image'=>'dish_1726029240.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Hi-C Manzana Tetra Brik',
        'description'=>'Bebida con jugo de manzana.',
        'purchase_price'=>0.0,
        'sale_price'=>800.0,
        'units'=>0,
        'image'=>'dish_1726029322.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Hi-C Uva Tetra Brik',
        'description'=>'Bebida con jugo de uva.',
        'purchase_price'=>0.0,
        'sale_price'=>800.0,
        'units'=>0,
        'image'=>'dish_1726029382.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Fuze Tea Verde Mango Manzanilla',
        'description'=>'Infusion Mango Manzanilla.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726029511.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Fuze Tea Frio Limon',
        'description'=>'Té helado de limón.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726029592.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Fuze Tea Negro Melocotón',
        'description'=>'Refrescante té frío de melocotón',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726029687.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 1,
        'title'=>'Fuze Tea Verde Limón Zero Azúcar',
        'description'=>'Bebida refrescante elaborada a base de té verde que fusiona sabores de extractos naturales.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726029793.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Coca Cola',
        'description'=>'Coca Cola Sabor Original, la bebida gaseosa favorita del mundo.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726029905.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Coca Cola Sin Azúcar',
        'description'=>'Coca Cola zero azúcar es sabor Coca-Cola sin aportar nada de azúcar.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726030073.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Fanta Naranja',
        'description'=>'Este clásico refresco burbujeante Fanta le ayudará a aplacar rápidamente su sed, proporcionándole un agradable sabor a naranja.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726030213.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Canada Dry Ginger Ale',
        'description'=>'Refrescante bebida con el sabor a Ginger Ale',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726030554.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Canada Dry Ginger Ale Light',
        'description'=>'Experimenta la chispeante frescura del jengibre sin calorías. El equilibrio perfecto entre sabor y ligereza.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726030691.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Canada Dry Club Soda',
        'description'=>'Bebida carbonatada única y refrescante',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726030808.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 7,
        'title'=>'Mug Root Beer',
        'description'=>'Marca estadounidense de cerveza de raíz.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726030880.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bamboo Daiquiri Fresa',
        'description'=>'¡Dulce, refrescante y tropical! Así es el Bamboo Daiquirí Fresa, un delicioso sabor para disfrutar en tu ocasión favorita.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726031024.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bamboo Margarita',
        'description'=>'Bebida alcohólica saborizada.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726031174.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bamboo Mohito',
        'description'=>'Bebida Alcohólica Preparada Sabor Mojito lista para tomar.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726031262.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bamboo Piña Colada',
        'description'=>'Refrescante y deliciosa bebida alcohólica de sabor Piña Colada.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726031324.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bamboo Paloma',
        'description'=>'Un delicioso y refrescante cocktail listo para beber que te ofrece un sabor suave y equilibrado que deleitará tu paladar.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726031379.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Schweppes Vodka & Citrus',
        'description'=>'Schweppes Citrus and Vodka es un cóctel carbonatado, es una buena opción para quienes quieran disfrutar de una bebida ligera, refrescante y con poco alcohol.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726031472.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Schweppes Gin & Tonic',
        'description'=>'Schweppes le dan un toque refrescante, seco y ácido que se complementan de forma perfecta.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726031758.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Adan & Eva Hard Seltzer Frutos Rojos',
        'description'=>'Adán&Eva es una bebida Hard Seltzer equilibrado con ingredientes de alta calidad.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726031882.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Adan & Eva Hard Seltzer Durazno',
        'description'=>'Adán&Eva es una bebida Hard Seltzer equilibrado con ingredientes de alta calidad.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726031934.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Smirnoff',
        'description'=>'Smirnoff es un tipo de vodka de origen ruso.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726032058.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Smirnoff Guaraná',
        'description'=>'Smirnoff Ice Guaraná es un vodka saborizado listo para tomar. El balance ideal entre vodka Smirnoff y el sabor y aromas característicos de la Guaraná.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726032131.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Smirnoff Manzana Verde',
        'description'=>'Se elabora con sabores naturales de manzana y un vodka suave y de sabor puro',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726032197.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Smirnoff Black',
        'description'=>'Deléitese con el rico y suave sabor de Smirnoff Black Vodka. Elaborado con la máxima precisión.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726032261.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Cuba Libre Ron & Cola',
        'description'=>'El cubalibre es un cóctel cubano resultante de la mezcla del refresco de cola con ron y jugo de limón.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726032313.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Imperial',
        'description'=>'Imperial es la cerveza de Costa Rica. Elaborada con los mejores ingredientes, donde destacan las notas de malta y un leve toque de amargor.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726063997.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Imperial Light',
        'description'=>'Imperial Light, una cerveza liviana con un sabor suave y de alta calidad.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726064054.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Imperial Silver',
        'description'=>'Notas dulces de malta y amargor justo. Refrescante sensación y sabor chispeante.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726064144.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Imperial Ultra',
        'description'=>'Imperial Ultra, una cerveza estilo lager, altamente refrescante, elaborada con los mejores ingredientes, única en Costa Rica.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726064247.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Imperial Zero',
        'description'=>'Imperial Cero, una bebida a base de malta para aquellas personas que no pueden o que no desean consumir alcohol, pero disfrutan del sabor de una Imperial.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726064375.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bavaria Light',
        'description'=>'Cerveza que entrega todos los beneficios de una cerveza ligera, conservando un sabor intenso y aromas florales.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726064827.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bavaria Master Celebration',
        'description'=>'Bavaria Celebración Maestra es una cerveza lager, brinda a nuestros consumidores una experiencia sensorial completa.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726064944.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bavaria Gold',
        'description'=>'Bavaria Gold es una cerveza tipo Dortmunder con sabor marcado a malta. Se caracteriza por su cuerpo denso, amargor medio y tono dorado intenso.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726065262.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bavaria Masters',
        'description'=>'Cerveza refrescante, con cuerpo medio, color dorado intenso y aroma con matices dulces.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726065303.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Bavaria Pure Malt',
        'description'=>'Bavaria Pura Malta es una cerveza lager, caracterizada por su color dorado intenso y espuma blanca persistente.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726065370.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Pilsen',
        'description'=>'Característico aroma floral y amargor moderado.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726065529.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Pilsen 6.0',
        'description'=>'Cerveza de sabor intenso y de doble malta, con cuerpo robusto, mayor amargura.',
        'purchase_price'=>0.0,
        'sale_price'=>1600.0,
        'units'=>0,
        'image'=>'dish_1726065597.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Heineken',
        'description'=>'Cada frío y fresco sorbo, te brindará ese rico y agradable sabor con sutiles notas afrutadas.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726065702.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 4,
        'title'=>'Heineken Zero',
        'description'=>'Heineken Zero es una refrescante cerveza lager sin alcohol. Está elaborada con la receta única para tener un sabor equilibrado y diferente.',
        'purchase_price'=>0.0,
        'sale_price'=>2300.0,
        'units'=>0,
        'image'=>'dish_1726065775.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 2,
        'title'=>'Natural de Piña',
        'description'=>'Refrescante y lleno de sabor tropical, nuestra bebida natural de piña.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726066122.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 2,
        'title'=>'Natural de Sandía',
        'description'=>'Refrescante y lleno de sabor tropical, nuestra bebida natural de sandía.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726066162.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 2,
        'title'=>'Natural de Papaya',
        'description'=>'Refrescante y lleno de sabor tropical, nuestra bebida natural de papaya.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726066197.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 2,
        'title'=>'Natural de Fresa',
        'description'=>'Refrescante y lleno de sabor tropical, nuestra bebida natural de fresa.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726066238.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 2,
        'title'=>'Natural de Mango',
        'description'=>'Refrescante y lleno de sabor tropical, nuestra bebida natural de mango.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726066288.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 6,
        'title'=>'Lapa Roja',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726066504.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 6,
        'title'=>'Tortuga Verde',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726066531.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 6,
        'title'=>'Tucan Iris',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726066620.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 6,
        'title'=>'Cacique Veranero',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726066694.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Johnnie Walker Rojo Shot',
        'description'=>'Se destaca por su carácter e intensidad, por sus notas especiadas que estallan con sabores vibrantes y ahumados.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067051.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Johnnie Walker Negro Shot',
        'description'=>'El aroma es dulce y afrutado con un toque de turba. Esto lleva a un paladar sensual de grano caliente y roble, con notas de vainilla y mantequilla.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067289.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Old Parr 12 Años Shot',
        'description'=>'Old Parr 12 Años es un whisky escocés con mucho sabor, suave y accesible al paladar.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067377.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Old Parr 18 Años Shot',
        'description'=>'Whisky Escocés añejado en barricas jóvenes de roble, lo que permite aún más resaltar sus intensas notas frutales y su singular suavidad, matizando el ahumado característico del añejamiento.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067474.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'J&B Shot',
        'description'=>'Estilo único con un sabor suave y afrutado que aporta frescura',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067573.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Smirnoff Vodka Shot',
        'description'=>'Tiene un sabor robusto con un acabado seco para una máxima suavidad y claridad.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067817.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Captain Morgan Shot',
        'description'=>'Tono caoba intensos, aromas marcados por el caramelo y la vainilla con un leve recuerdo De canela.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067912.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Flor De Caña 7 Años Shot',
        'description'=>'Licor a base de caña de azucar añejados naturalmente en barricas de bourbon.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726067964.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Flor De Caña 18 Años Shot',
        'description'=>'Exquisito aroma a notas de nueces y caramelo. Vainilla intensa y especies, con un extra suave y largo acabado.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726068077.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Baileys Shot',
        'description'=>'Es la combinación más dulce de whisky y nata irlandesa con intensos aromas de vainilla y chocolate.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726068230.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Don Julio Shot',
        'description'=>'Disfruta de los sabores suaves y únicos de Don Julio. Prueba el sabor superior y exclusivo del tequila.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726068298.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Tanqueray Shot',
        'description'=>'Aromas donde prevalece el enebro y los frutos citricos sabor picoso.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726068472.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Cacique',
        'description'=>'Está hecho a base de aguardiente de caña de azúcar, agua y caramelo. Tiene un sabor dulce y una consistencia líquida.',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'didish_1726068626.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Cacique Liga Bahía Sandía Shot',
        'description'=>'Ligao sandía es un cóctel con sabor a sandía elaborado con insumos de la más alta calidad.',
        'purchase_price'=>0.0,
        'sale_price'=>1300.0,
        'units'=>0,
        'image'=>'dish_1726068736.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>1,
        'subcategories_id'=> 5,
        'title'=>'Cacique Liga Reserva Frutal',
        'description'=>'Cacique Ligao Frutos Del Bosque',
        'purchase_price'=>0.0,
        'sale_price'=>1300.0,
        'units'=>0,
        'image'=>'dish_1726068923.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 10,
        'title'=>'Maduro',
        'description'=>'Adicional de plátano maduro',
        'purchase_price'=>0.0,
        'sale_price'=>600.0,
        'units'=>0,
        'image'=>'dish_1726069087.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 10,
        'title'=>'Natilla',
        'description'=>'Adicional de natilla',
        'purchase_price'=>0.0,
        'sale_price'=>600.0,
        'units'=>0,
        'image'=>'dish_1726069156.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 10,
        'title'=>'Huevo',
        'description'=>'Adicional de huevo',
        'purchase_price'=>0.0,
        'sale_price'=>600.0,
        'units'=>0,
        'image'=>'dish_1726069203.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 10,
        'title'=>'Salchichón',
        'description'=>'Adicional de salchichón',
        'purchase_price'=>0.0,
        'sale_price'=>600.0,
        'units'=>0,
        'image'=>'dish_1726069253.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 10,
        'title'=>'Rodajas de Pan',
        'description'=>'Adicional de rodajas de pan',
        'purchase_price'=>0.0,
        'sale_price'=>600.0,
        'units'=>0,
        'image'=>'dish_1726069320.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 10,
        'title'=>'Carne en salsa',
        'description'=>'Adicional de carne en salsa',
        'purchase_price'=>0.0,
        'sale_price'=>1000.0,
        'units'=>0,
        'image'=>'dish_1726069355.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Pinto con 2 acompañamientos',
        'description'=>'Gallo Pinto con dos acompañamientos a elegir.',
        'purchase_price'=>0.0,
        'sale_price'=>3000.0,
        'units'=>0,
        'image'=>'dish_1726069472.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Omelette',
        'description'=>'Plato elaborado con huevo batido y cocinado con mantequilla o aceite.',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726069567.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Medio Hombre',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726069681.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Pancake con Frutas y Miel',
        'description'=>'Deliciosos pancakes bañados con miel y acompañados de frutas.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726069754.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Desayuno Continental',
        'description'=>'No description.',
        'purchase_price'=>0.0,
        'sale_price'=>4500.0,
        'units'=>0,
        'image'=>'dish_1726069843.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Papaya Bowl',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726070031.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Mango Bowl',
        'description'=>'No description',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726070261.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Tostada de Aguacate',
        'description'=>'Rebanada de pan tostado y aguacate en su punto.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726074840.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>2,
        'subcategories_id'=> 9,
        'title'=>'Tofu Scramble',
        'description'=>'El Tofu Scramble, o revuelto de tofu, es una alternativa vegana a los huevos revueltos.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726075064.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 12,
        'title'=>'Flan de Coco',
        'description'=>'Delicado flan con suave sabor a coco y textura cremosa.',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'dish_1726075564.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 12,
        'title'=>'Flan de Vainilla',
        'description'=>'Tradicional flan de vainilla, ligero y cremoso, con un toque de caramelo.',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'dish_1726075697.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 12,
        'title'=>'Flan de Frutas',
        'description'=>'Flan suave y refrescante con una mezcla de frutas.',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'dish_1726076120.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Queque Seco',
        'description'=>'Bizcocho casero de textura ligera y esponjosa, perfecto para acompañar con café.',
        'purchase_price'=>0.0,
        'sale_price'=>1100.0,
        'units'=>0,
        'image'=>'dish_1726076184.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Enchilada',
        'description'=>'Crujiente masa rellena de carne y sazonada con especias tradicionales.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726076232.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Pañuelo',
        'description'=>'Masa hojaldrada rellena de dulce de leche o crema, perfecta para acompañar con un café.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726076307.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Cangrejo de Jamón y Queso',
        'description'=>'Masa crujiente en forma de cangrejo, rellena de jamón y queso derretido.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726076408.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Costilla Dulce',
        'description'=>'Costilla de hojaldre dulce.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726076507.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Flauta de Crema Patelera',
        'description'=>'Delicada flauta de masa rellena con cremosa y dulce crema pastelera.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726076628.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Pan de Banano',
        'description'=>'Esponjoso pan de banano y especias.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726076733.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 12,
        'title'=>'Tres Leches',
        'description'=>'Bizcocho suave empapado en tres tipos de leche, cubierto con crema batida.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726076810.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 12,
        'title'=>'Cheesecake de Maracuyá',
        'description'=>'Cremoso cheesecake con una capa refrescante de maracuyá.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726076900.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 12,
        'title'=>'Cheesecake de Fresa',
        'description'=>'Cremoso cheesecake con una capa refrescante de fresa.',
        'purchase_price'=>0.0,
        'sale_price'=>2000.0,
        'units'=>0,
        'image'=>'dish_1726077010.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Empanada de Chiverre',
        'description'=>'Masa suave rellena con dulce de chiverre tradicional.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726077067.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>4,
        'subcategories_id'=> 11,
        'title'=>'Empanada de Piña',
        'description'=>'Deliciosa empanada de masa suave rellena con dulce piña.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726077112.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 14,
        'title'=>'Casado de Carne',
        'description'=>'Jugosa carne servida con arroz, frijoles, ensalada fresca y plátano maduro.',
        'purchase_price'=>0.0,
        'sale_price'=>3500.0,
        'units'=>0,
        'image'=>'dish_1726077992.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 14,
        'title'=>'Casado de Pescado',
        'description'=>'Pescado servido con arroz, frijoles, ensalada fresca y plátano maduro.',
        'purchase_price'=>0.0,
        'sale_price'=>3500.0,
        'units'=>0,
        'image'=>'dish_1726078050.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 14,
        'title'=>'Casado de Pollo',
        'description'=>'Delicioso pollo servido con arroz, frijoles, ensalada fresca y plátano maduro.',
        'purchase_price'=>0.0,
        'sale_price'=>3500.0,
        'units'=>0,
        'image'=>'dish_1726078144.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 14,
        'title'=>'Bowl de Quinoa y Vegetales',
        'description'=>'Quinoa cocida con vegetales frescos de temporada, aderezado con una vinagreta ligera.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726078240.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 14,
        'title'=>'Pan Pita con Humus',
        'description'=>'Pan pita suave acompañado de hummus cremoso, con un toque de aceite de oliva y especias.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726078277.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 14,
        'title'=>'Ensalada de Garbanzos',
        'description'=>'Garbanzos cocidos mezclados con vegetales frescos, hierbas aromáticas y aderezo de limón.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726078322.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Palomitas 2lb',
        'description'=>'Crujientes palomitas de maíz con un toque de sal.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726078641.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Hamburguesa',
        'description'=>'Jugosa hamburguesa de res con lechuga, tomate y aderezos.',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726078717.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Club Sandwich',
        'description'=>'No descripction',
        'purchase_price'=>0.0,
        'sale_price'=>4000.0,
        'units'=>0,
        'image'=>'dish_1726078764.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Sandwich de Jamón y Queso',
        'description'=>'Clásico sándwich con jamón y queso derretido en pan fresco.',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726078814.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Sandwich de Carne',
        'description'=>'Sándwich de carne y acompañamientos',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726078876.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Sandwich de Pollo',
        'description'=>'Pollo con mayonesa, lechuga y tomate en pan tostado.',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726081702.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Empanada de Frijol',
        'description'=>'Empanada rellena de frijoles sazonados y frita a la perfección.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726081759.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Empanada de Queso',
        'description'=>'Empanada crujiente rellena de delicioso queso derretido.',
        'purchase_price'=>0.0,
        'sale_price'=>1200.0,
        'units'=>0,
        'image'=>'dish_1726081799.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Papas Fritas',
        'description'=>'Papas fritas crujientes servidas con una pizca de sal.',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726081843.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Salchipapas',
        'description'=>'Papas fritas con trozos de salchicha, acompañadas de salsas.',
        'purchase_price'=>0.0,
        'sale_price'=>3000.0,
        'units'=>0,
        'image'=>'dish_1726082073.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Papicarne',
        'description'=>'Papas fritas con carne desmenuzada, queso y salsas.',
        'purchase_price'=>0.0,
        'sale_price'=>3500.0,
        'units'=>0,
        'image'=>'dish_1726082138.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Ceviche de Pescado',
        'description'=>'Fresco ceviche de pescado marinado en limón con cebolla y cilantro.',
        'purchase_price'=>0.0,
        'sale_price'=>2500.0,
        'units'=>0,
        'image'=>'dish_1726082191.JPG']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Caldosa',
        'description'=>'Deliciosas picaritas con ceviche.',
        'purchase_price'=>0.0,
        'sale_price'=>1500.0,
        'units'=>0,
        'image'=>'dish_1726082229.jpg']);

        RegisteredDish::create(['dishes_categories_id'=>3,
        'subcategories_id'=> 13,
        'title'=>'Pizza',
        'description'=>'Deliciosa pizza con salsa de tomate, queso y tus ingredientes favoritos.',
        'purchase_price'=>0.0,
        'sale_price'=>0.0,
        'units'=>0,
        'image'=>'dish_1726082251.jpg']);
    }
}


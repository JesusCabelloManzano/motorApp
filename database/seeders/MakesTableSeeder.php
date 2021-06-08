<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MakesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('makes')->delete();
        
        \DB::table('makes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ACURA',
                'vehicletype_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ALFA ROMEO',
                'vehicletype_id' => 1,
            ),
            2 => 
            array (
                'id' => 121,
                'name' => 'AM GENERAL',
                'vehicletype_id' => 1,
            ),
            3 => 
            array (
                'id' => 3,
                'name' => 'AMERICAN IRONHORSE',
                'vehicletype_id' => 2,
            ),
            4 => 
            array (
                'id' => 134,
                'name' => 'AMERICAN LAFRANCE',
                'vehicletype_id' => 1,
            ),
            5 => 
            array (
                'id' => 5,
                'name' => 'APRILIA',
                'vehicletype_id' => 2,
            ),
            6 => 
            array (
                'id' => 6,
                'name' => 'ARCTIC CAT',
                'vehicletype_id' => 3,
            ),
            7 => 
            array (
                'id' => 126,
                'name' => 'ARGO',
                'vehicletype_id' => 3,
            ),
            8 => 
            array (
                'id' => 4,
                'name' => 'ASTON MARTIN',
                'vehicletype_id' => 1,
            ),
            9 => 
            array (
                'id' => 111,
                'name' => 'ATK',
                'vehicletype_id' => 3,
            ),
            10 => 
            array (
                'id' => 7,
                'name' => 'AUDI',
                'vehicletype_id' => 1,
            ),
            11 => 
            array (
                'id' => 8,
                'name' => 'AUTOCAR LLC.',
                'vehicletype_id' => 1,
            ),
            12 => 
            array (
                'id' => 9,
                'name' => 'AVANTI',
                'vehicletype_id' => 1,
            ),
            13 => 
            array (
                'id' => 10,
                'name' => 'BENTLEY',
                'vehicletype_id' => 1,
            ),
            14 => 
            array (
                'id' => 138,
                'name' => 'BERTONE',
                'vehicletype_id' => 1,
            ),
            15 => 
            array (
                'id' => 135,
                'name' => 'BETA',
                'vehicletype_id' => 1,
            ),
            16 => 
            array (
                'id' => 13,
                'name' => 'BIG DOG',
                'vehicletype_id' => 1,
            ),
            17 => 
            array (
                'id' => 122,
                'name' => 'BIMOTA',
                'vehicletype_id' => 2,
            ),
            18 => 
            array (
                'id' => 11,
                'name' => 'BLUE BIRD',
                'vehicletype_id' => 1,
            ),
            19 => 
            array (
                'id' => 12,
                'name' => 'BMW',
                'vehicletype_id' => 1,
            ),
            20 => 
            array (
                'id' => 127,
                'name' => 'BOBCAT',
                'vehicletype_id' => 3,
            ),
            21 => 
            array (
                'id' => 14,
                'name' => 'BOMBARDIER',
                'vehicletype_id' => 3,
            ),
            22 => 
            array (
                'id' => 15,
                'name' => 'BUELL',
                'vehicletype_id' => 2,
            ),
            23 => 
            array (
                'id' => 133,
                'name' => 'BUGATTI',
                'vehicletype_id' => 1,
            ),
            24 => 
            array (
                'id' => 16,
                'name' => 'BUICK',
                'vehicletype_id' => 1,
            ),
            25 => 
            array (
                'id' => 18,
                'name' => 'CADILLAC',
                'vehicletype_id' => 1,
            ),
            26 => 
            array (
                'id' => 128,
                'name' => 'CAN-AM',
                'vehicletype_id' => 3,
            ),
            27 => 
            array (
                'id' => 17,
                'name' => 'CANNONDALE',
                'vehicletype_id' => 2,
            ),
            28 => 
            array (
                'id' => 117,
                'name' => 'CHANCE COACH TRANSIT BUS',
                'vehicletype_id' => 1,
            ),
            29 => 
            array (
                'id' => 19,
                'name' => 'CHEVROLET',
                'vehicletype_id' => 1,
            ),
            30 => 
            array (
                'id' => 20,
                'name' => 'CHRYSLER',
                'vehicletype_id' => 1,
            ),
            31 => 
            array (
                'id' => 21,
                'name' => 'COBRA',
                'vehicletype_id' => 1,
            ),
            32 => 
            array (
                'id' => 143,
                'name' => 'CODA',
                'vehicletype_id' => 1,
            ),
            33 => 
            array (
                'id' => 22,
                'name' => 'COUNTRY COACH MOTORHOME',
                'vehicletype_id' => 1,
            ),
            34 => 
            array (
                'id' => 136,
                'name' => 'CRANE CARRIER',
                'vehicletype_id' => 3,
            ),
            35 => 
            array (
                'id' => 129,
                'name' => 'CUB CADET',
                'vehicletype_id' => 3,
            ),
            36 => 
            array (
                'id' => 118,
                'name' => 'DAEWOO',
                'vehicletype_id' => 1,
            ),
            37 => 
            array (
                'id' => 24,
                'name' => 'DODGE',
                'vehicletype_id' => 1,
            ),
            38 => 
            array (
                'id' => 23,
                'name' => 'DUCATI',
                'vehicletype_id' => 2,
            ),
            39 => 
            array (
                'id' => 27,
                'name' => 'E-TON',
                'vehicletype_id' => 3,
            ),
            40 => 
            array (
                'id' => 25,
                'name' => 'EL DORADO',
                'vehicletype_id' => 1,
            ),
            41 => 
            array (
                'id' => 26,
                'name' => 'FERRARI',
                'vehicletype_id' => 1,
            ),
            42 => 
            array (
                'id' => 28,
                'name' => 'FIAT',
                'vehicletype_id' => 1,
            ),
            43 => 
            array (
                'id' => 144,
                'name' => 'FISKER',
                'vehicletype_id' => 1,
            ),
            44 => 
            array (
                'id' => 29,
                'name' => 'FORD',
                'vehicletype_id' => 1,
            ),
            45 => 
            array (
                'id' => 30,
                'name' => 'FREIGHTLINER',
                'vehicletype_id' => 1,
            ),
            46 => 
            array (
                'id' => 31,
                'name' => 'GAS GAS',
                'vehicletype_id' => 2,
            ),
            47 => 
            array (
                'id' => 33,
                'name' => 'GILLIG',
                'vehicletype_id' => 1,
            ),
            48 => 
            array (
                'id' => 32,
                'name' => 'GMC',
                'vehicletype_id' => 1,
            ),
            49 => 
            array (
                'id' => 34,
                'name' => 'HARLEY DAVIDSON',
                'vehicletype_id' => 2,
            ),
            50 => 
            array (
                'id' => 35,
                'name' => 'HINO',
                'vehicletype_id' => 1,
            ),
            51 => 
            array (
                'id' => 38,
                'name' => 'HM',
                'vehicletype_id' => 1,
            ),
            52 => 
            array (
                'id' => 36,
                'name' => 'HONDA',
                'vehicletype_id' => 2,
            ),
            53 => 
            array (
                'id' => 145,
                'name' => 'HONDA CARS',
                'vehicletype_id' => 1,
            ),
            54 => 
            array (
                'id' => 37,
                'name' => 'HUMMER',
                'vehicletype_id' => 1,
            ),
            55 => 
            array (
                'id' => 39,
                'name' => 'HUSABERG',
                'vehicletype_id' => 2,
            ),
            56 => 
            array (
                'id' => 40,
                'name' => 'HUSQVARNA',
                'vehicletype_id' => 2,
            ),
            57 => 
            array (
                'id' => 115,
                'name' => 'HYOSUNG',
                'vehicletype_id' => 2,
            ),
            58 => 
            array (
                'id' => 41,
                'name' => 'HYUNDAI',
                'vehicletype_id' => 1,
            ),
            59 => 
            array (
                'id' => 139,
                'name' => 'IC CORPORATION',
                'vehicletype_id' => 1,
            ),
            60 => 
            array (
                'id' => 112,
                'name' => 'INDIAN',
                'vehicletype_id' => 1,
            ),
            61 => 
            array (
                'id' => 42,
                'name' => 'INFINITI',
                'vehicletype_id' => 1,
            ),
            62 => 
            array (
                'id' => 43,
                'name' => 'INTERNATIONAL',
                'vehicletype_id' => 1,
            ),
            63 => 
            array (
                'id' => 44,
                'name' => 'ISUZU',
                'vehicletype_id' => 1,
            ),
            64 => 
            array (
                'id' => 45,
                'name' => 'JAGUAR',
                'vehicletype_id' => 1,
            ),
            65 => 
            array (
                'id' => 46,
                'name' => 'JEEP',
                'vehicletype_id' => 1,
            ),
            66 => 
            array (
                'id' => 47,
                'name' => 'JOHN DEERE',
                'vehicletype_id' => 3,
            ),
            67 => 
            array (
                'id' => 50,
                'name' => 'KASEA',
                'vehicletype_id' => 3,
            ),
            68 => 
            array (
                'id' => 48,
                'name' => 'KAWASAKI',
                'vehicletype_id' => 2,
            ),
            69 => 
            array (
                'id' => 49,
                'name' => 'KENWORTH',
                'vehicletype_id' => 1,
            ),
            70 => 
            array (
                'id' => 52,
                'name' => 'KIA',
                'vehicletype_id' => 1,
            ),
            71 => 
            array (
                'id' => 51,
                'name' => 'KTM',
                'vehicletype_id' => 2,
            ),
            72 => 
            array (
                'id' => 53,
                'name' => 'KUBOTA',
                'vehicletype_id' => 3,
            ),
            73 => 
            array (
                'id' => 54,
                'name' => 'KYMCO',
                'vehicletype_id' => 2,
            ),
            74 => 
            array (
                'id' => 123,
                'name' => 'LAFORZA',
                'vehicletype_id' => 1,
            ),
            75 => 
            array (
                'id' => 55,
                'name' => 'LAMBORGHINI',
                'vehicletype_id' => 1,
            ),
            76 => 
            array (
                'id' => 56,
                'name' => 'LAND ROVER',
                'vehicletype_id' => 1,
            ),
            77 => 
            array (
                'id' => 113,
                'name' => 'LEM',
                'vehicletype_id' => 1,
            ),
            78 => 
            array (
                'id' => 59,
                'name' => 'LEXUS',
                'vehicletype_id' => 1,
            ),
            79 => 
            array (
                'id' => 57,
                'name' => 'LINCOLN',
                'vehicletype_id' => 1,
            ),
            80 => 
            array (
                'id' => 58,
                'name' => 'LOTUS',
                'vehicletype_id' => 1,
            ),
            81 => 
            array (
                'id' => 60,
                'name' => 'MACK',
                'vehicletype_id' => 1,
            ),
            82 => 
            array (
                'id' => 61,
                'name' => 'MASERATI',
                'vehicletype_id' => 1,
            ),
            83 => 
            array (
                'id' => 62,
                'name' => 'MAYBACH',
                'vehicletype_id' => 1,
            ),
            84 => 
            array (
                'id' => 64,
                'name' => 'MAZDA',
                'vehicletype_id' => 1,
            ),
            85 => 
            array (
                'id' => 141,
                'name' => 'MCLAREN',
                'vehicletype_id' => 1,
            ),
            86 => 
            array (
                'id' => 63,
                'name' => 'MERCEDES-BENZ',
                'vehicletype_id' => 1,
            ),
            87 => 
            array (
                'id' => 65,
                'name' => 'MERCURY',
                'vehicletype_id' => 1,
            ),
            88 => 
            array (
                'id' => 66,
                'name' => 'MINI',
                'vehicletype_id' => 1,
            ),
            89 => 
            array (
                'id' => 68,
                'name' => 'MITSUBISHI',
                'vehicletype_id' => 1,
            ),
            90 => 
            array (
                'id' => 67,
                'name' => 'MITSUBISHI FUSO',
                'vehicletype_id' => 1,
            ),
            91 => 
            array (
                'id' => 69,
                'name' => 'MORGAN',
                'vehicletype_id' => 1,
            ),
            92 => 
            array (
                'id' => 71,
                'name' => 'MOTO GUZZI',
                'vehicletype_id' => 2,
            ),
            93 => 
            array (
                'id' => 70,
                'name' => 'MOTOR COACH INDUSTRIES',
                'vehicletype_id' => 1,
            ),
            94 => 
            array (
                'id' => 73,
                'name' => 'MV AGUSTA',
                'vehicletype_id' => 2,
            ),
            95 => 
            array (
                'id' => 140,
                'name' => 'NASH',
                'vehicletype_id' => 1,
            ),
            96 => 
            array (
                'id' => 72,
                'name' => 'NEW FLYER',
                'vehicletype_id' => 1,
            ),
            97 => 
            array (
                'id' => 74,
                'name' => 'NISSAN',
                'vehicletype_id' => 1,
            ),
            98 => 
            array (
                'id' => 75,
                'name' => 'NOVA BUS CORPORATION',
                'vehicletype_id' => 1,
            ),
            99 => 
            array (
                'id' => 76,
                'name' => 'OLDSMOBILE',
                'vehicletype_id' => 1,
            ),
            100 => 
            array (
                'id' => 77,
                'name' => 'ORION BUS',
                'vehicletype_id' => 1,
            ),
            101 => 
            array (
                'id' => 78,
                'name' => 'OSHKOSH MOTOR TRUCK CO.',
                'vehicletype_id' => 1,
            ),
            102 => 
            array (
                'id' => 119,
                'name' => 'OTTAWA',
                'vehicletype_id' => 1,
            ),
            103 => 
            array (
                'id' => 81,
                'name' => 'PANOZ',
                'vehicletype_id' => 1,
            ),
            104 => 
            array (
                'id' => 79,
                'name' => 'PETERBILT',
                'vehicletype_id' => 1,
            ),
            105 => 
            array (
                'id' => 80,
                'name' => 'PEUGEOT',
                'vehicletype_id' => 1,
            ),
            106 => 
            array (
                'id' => 116,
                'name' => 'PIAGGIO',
                'vehicletype_id' => 3,
            ),
            107 => 
            array (
                'id' => 130,
                'name' => 'PIERCE MFG. INC.',
                'vehicletype_id' => 1,
            ),
            108 => 
            array (
                'id' => 124,
                'name' => 'PLYMOUTH',
                'vehicletype_id' => 1,
            ),
            109 => 
            array (
                'id' => 82,
                'name' => 'POLARIS',
                'vehicletype_id' => 3,
            ),
            110 => 
            array (
                'id' => 83,
                'name' => 'PONTIAC',
                'vehicletype_id' => 1,
            ),
            111 => 
            array (
                'id' => 85,
                'name' => 'PORSCHE',
                'vehicletype_id' => 1,
            ),
            112 => 
            array (
                'id' => 120,
                'name' => 'QVALE',
                'vehicletype_id' => 1,
            ),
            113 => 
            array (
                'id' => 131,
                'name' => 'RAM',
                'vehicletype_id' => 1,
            ),
            114 => 
            array (
                'id' => 84,
                'name' => 'RENAULT',
                'vehicletype_id' => 1,
            ),
            115 => 
            array (
                'id' => 88,
                'name' => 'ROLLS ROYCE',
                'vehicletype_id' => 1,
            ),
            116 => 
            array (
                'id' => 114,
                'name' => 'ROVER',
                'vehicletype_id' => 1,
            ),
            117 => 
            array (
                'id' => 86,
                'name' => 'SAAB',
                'vehicletype_id' => 1,
            ),
            118 => 
            array (
                'id' => 87,
                'name' => 'SALEEN',
                'vehicletype_id' => 1,
            ),
            119 => 
            array (
                'id' => 89,
                'name' => 'SATURN',
                'vehicletype_id' => 1,
            ),
            120 => 
            array (
                'id' => 93,
                'name' => 'SCION',
                'vehicletype_id' => 1,
            ),
            121 => 
            array (
                'id' => 90,
                'name' => 'SEA-DOO',
                'vehicletype_id' => 2,
            ),
            122 => 
            array (
                'id' => 91,
                'name' => 'SEAT',
                'vehicletype_id' => 1,
            ),
            123 => 
            array (
                'id' => 92,
                'name' => 'SKI-DOO',
                'vehicletype_id' => 2,
            ),
            124 => 
            array (
                'id' => 94,
                'name' => 'SMART',
                'vehicletype_id' => 1,
            ),
            125 => 
            array (
                'id' => 142,
                'name' => 'SRT',
                'vehicletype_id' => 1,
            ),
            126 => 
            array (
                'id' => 96,
                'name' => 'STERLING',
                'vehicletype_id' => 1,
            ),
            127 => 
            array (
                'id' => 95,
                'name' => 'STERLING TRUCK',
                'vehicletype_id' => 1,
            ),
            128 => 
            array (
                'id' => 97,
                'name' => 'SUBARU',
                'vehicletype_id' => 1,
            ),
            129 => 
            array (
                'id' => 99,
                'name' => 'SUZUKI',
                'vehicletype_id' => 2,
            ),
            130 => 
            array (
                'id' => 132,
                'name' => 'TESLA',
                'vehicletype_id' => 1,
            ),
            131 => 
            array (
                'id' => 98,
                'name' => 'TM',
                'vehicletype_id' => 1,
            ),
            132 => 
            array (
                'id' => 102,
                'name' => 'TOYOTA',
                'vehicletype_id' => 1,
            ),
            133 => 
            array (
                'id' => 100,
                'name' => 'TRIUMPH',
                'vehicletype_id' => 1,
            ),
            134 => 
            array (
                'id' => 101,
                'name' => 'UD',
                'vehicletype_id' => 1,
            ),
            135 => 
            array (
                'id' => 103,
                'name' => 'VENTO',
                'vehicletype_id' => 1,
            ),
            136 => 
            array (
                'id' => 104,
                'name' => 'VESPA',
                'vehicletype_id' => 2,
            ),
            137 => 
            array (
                'id' => 105,
                'name' => 'VICTORY',
                'vehicletype_id' => 2,
            ),
            138 => 
            array (
                'id' => 106,
                'name' => 'VOLKSWAGEN',
                'vehicletype_id' => 1,
            ),
            139 => 
            array (
                'id' => 108,
                'name' => 'VOLVO',
                'vehicletype_id' => 1,
            ),
            140 => 
            array (
                'id' => 137,
                'name' => 'VPG',
                'vehicletype_id' => 1,
            ),
            141 => 
            array (
                'id' => 107,
                'name' => 'WESTERN RV',
                'vehicletype_id' => 1,
            ),
            142 => 
            array (
                'id' => 125,
                'name' => 'WESTERN STAR',
                'vehicletype_id' => 1,
            ),
            143 => 
            array (
                'id' => 109,
                'name' => 'WORKHORSE',
                'vehicletype_id' => 1,
            ),
            144 => 
            array (
                'id' => 110,
                'name' => 'YAMAHA',
                'vehicletype_id' => 2,
            ),
        ));
        
        
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('organizations')->delete();
        
        \DB::table('organizations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Western Mindanao State University',
                'acronym' => 'WMSU',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:13:06',
                'updated_at' => '2021-07-07 02:13:48',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Universidad De Zamboanga',
                'acronym' => 'UZ',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:14:06',
                'updated_at' => '2021-07-07 02:14:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Basilan State College',
                'acronym' => 'BSC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:15:13',
                'updated_at' => '2021-07-07 02:15:13',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Zamboanga State College Of Marine Sciences And Technology',
                'acronym' => 'ZSCMST',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:16:03',
                'updated_at' => '2021-07-07 02:16:03',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Department Of Health Zpchd',
                'acronym' => 'DOH ZPCHD',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:16:35',
                'updated_at' => '2021-07-07 02:16:35',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Ateneo De Zamboanga University',
                'acronym' => 'ADZU',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:16:52',
                'updated_at' => '2021-07-07 02:17:02',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'J.H Cerilles State College',
                'acronym' => 'JHCSC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:18:12',
                'updated_at' => '2021-07-07 02:18:12',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Jose Rizal Memorial State University',
                'acronym' => 'JRMSU',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:19:00',
                'updated_at' => '2021-07-07 02:19:00',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Bureau Of Fisheries And Aquatic Resources, Regional Office IX',
                'acronym' => 'BFAR-IX',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:19:35',
                'updated_at' => '2021-07-07 02:19:45',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Andres Bonifacio College',
                'acronym' => 'ABC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:20:00',
                'updated_at' => '2021-07-07 02:20:00',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Ecosystems Research And Development Bureau',
                'acronym' => 'ERDB-FWRDEC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 3,
                'created_at' => '2021-07-07 02:21:26',
                'updated_at' => '2021-07-07 02:22:19',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Department Of Science And Technology',
                'acronym' => 'DOST',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:24:25',
                'updated_at' => '2021-07-09 10:24:25',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Department Of Health - Zamboanga Peninsula Center For Health Development',
                'acronym' => 'DOH-ZOCHD',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:25:30',
                'updated_at' => '2021-07-09 10:25:30',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'National Fisheries Research And Development Institute',
                'acronym' => 'NFRDI',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:25:54',
                'updated_at' => '2021-07-09 10:25:54',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Bureau Of Fisheries And Aquatic Resources',
                'acronym' => 'BFAR',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:27:34',
                'updated_at' => '2021-07-09 10:27:34',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'DOST - Philippine Council For Agriculture, Aquatic And Natural Resources Research And Development',
                'acronym' => 'DOST-PCAARRD',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:29:20',
                'updated_at' => '2021-07-09 10:30:14',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Department Of Agriculture Bureau Of Agricultural Research',
                'acronym' => 'DA-BAR',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:31:09',
                'updated_at' => '2021-07-09 10:31:09',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'DOST - Philippine Council For Health Research And Development Regional Research Fund',
                'acronym' => 'DOST-PCHRD RRF',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:33:08',
                'updated_at' => '2021-07-09 10:33:08',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Commission On Higher Education',
                'acronym' => 'CHED',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:33:42',
                'updated_at' => '2021-07-09 10:33:42',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Western Mindanao State University',
                'acronym' => 'WMSU - INSTITUTIONAL',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:34:01',
                'updated_at' => '2021-07-09 10:34:11',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Zamboanga City Medical Center',
                'acronym' => 'ZCMC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:34:44',
                'updated_at' => '2021-07-09 10:34:44',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Universidad De Los Andes',
                'acronym' => 'UDLA',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:37:03',
                'updated_at' => '2021-07-09 10:37:03',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'DOST - Philippine Council For Industry, Energy, And Emerging Technology Research And Development',
                'acronym' => 'DOST-PCIEERD',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:38:20',
                'updated_at' => '2021-07-09 10:38:20',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Komisyon Sa Wikang Filipino',
                'acronym' => 'KWF',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:38:46',
                'updated_at' => '2021-07-09 10:38:46',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'Department Of Labor And Employment - IX',
                'acronym' => 'DOLE IX',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:39:19',
                'updated_at' => '2021-07-09 10:39:19',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'DOST - Technology Application And Promotion Institute',
                'acronym' => 'DOST-TAPI',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:40:00',
                'updated_at' => '2021-07-09 10:40:00',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'Social Action Ministry  Archdiocese Of Ipil, Zamboanga Sibugay',
                'acronym' => 'SAM - NGO',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:41:13',
                'updated_at' => '2021-07-09 10:41:13',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'Asian Development Bank : Pacific Rim Innovation And Management Exponents',
                'acronym' => 'ADB - PRIMEX',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:41:53',
                'updated_at' => '2021-07-09 10:41:53',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Southeast Asian Fisheries Development Council/aquaculture Department',
                'acronym' => 'SEAFDEC/AQD',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:42:27',
                'updated_at' => '2021-07-09 10:42:27',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'USAID-dai Protect Wildlife',
                'acronym' => 'USAID',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 2,
                'created_at' => '2021-07-09 10:43:32',
                'updated_at' => '2021-07-09 10:43:32',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Zamboanga Consortium For Health Research And Development',
                'acronym' => 'ZCHRD',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 4,
                'created_at' => '2021-08-13 08:33:39',
                'updated_at' => '2021-08-13 08:33:39',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Western Mindanao Agriculture And Aquatic Resources Research And Development Consortium',
                'acronym' => 'WESMAARRDEC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 4,
                'created_at' => '2021-08-13 08:33:58',
                'updated_at' => '2021-08-13 08:33:58',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'Zamboanga Peninsula Higher Education Research Association',
                'acronym' => 'ZPHERA',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 4,
                'created_at' => '2021-08-13 08:35:01',
                'updated_at' => '2021-08-13 08:35:01',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'Zamboanga Industry, Energy And Emerging, And Emerging Technology Research And Development Consortium',
                'acronym' => 'ZIEERDEC',
                'address' => 'n/a',
                'avatar' => 'school.jpg',
                'type_id' => 4,
                'created_at' => '2021-08-13 08:46:43',
                'updated_at' => '2021-08-13 08:46:43',
            ),
        ));
        
        
    }
}
<?php

    /**
     * @access public
     * @package serializers
     *
     * @author Vittorio Piotti
     *
     * Class SHotel
    */

    class SHotel{

        //metodi statici
        public static function serializeArray($rows) {
            $hotels = [];
            foreach ($rows as $row) {
                $hotel = SHotel::serializeSingle($row);
                $hotels[] = (object) $hotel;
            }
            return $hotels;
        }
        
        

        public static function serializeSingle($row) {
            return (object) [
                'id' => $row['Id'] ?? '',
                'name' => $row['Name'] ?? '',
                'image' => $row['Image'] ?? '',
                'description' => $row['Description'] ?? '',
                'idAdmin' => $row['IdAdmin'] ?? '',
                'totalRooms' => $row['TotalRooms'] ?? '',
                'availability' => $row['Availability'] ?? ''
            ];
        }
    }
?>
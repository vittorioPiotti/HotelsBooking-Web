<?php

    /**
     * @access public
     * @package serializers
     *
     * @author Vittorio Piotti
     *
     * Class SBooking
    */

    class SBooking{

        //metodi statici
        public static function serializeArray($rows) {
            $hotels = [];
            foreach ($rows as $row) {
                $hotel = SBooking::serializeSingle($row);
                $hotels[] = (object) $hotel;
            }
            return $hotels;
        }
        

        public static function serializeArrayAdmin($rows) {
            $hotels = [];
            foreach ($rows as $row) {
                $hotel = SBooking::serializeSingleAdmin($row);
                $hotels[] = (object) $hotel;
            }
            return $hotels;
        }
        
        
        public static function serializeSingle($row) {
            return (object) [
                'bookingId' => $row['BookingId'],
                'bookingStartDate' => $row['BookingStartDate'],
                'bookingEndDate' => $row['BookingEndDate'],
                'bookingRoomNumber' => $row['BookingRoomNumber'],
                'roomName' => $row['RoomName'],
                'totalCost' => $row['TotalCost'],
                'roomHotelId' => $row['RoomHotelId'],
                'hotelName' => $row['HotelName']
            ];
        }

        public static function serializeSingleAdmin($row) {
            return (object) [
                'bookingId' => $row['BookingId'],
                'bookingStartDate' => $row['BookingStartDate'],
                'bookingEndDate' => $row['BookingEndDate'],
                'bookingRoomNumber' => $row['BookingRoomNumber'],
                'roomName' => $row['RoomName'],
                'totalCost' => $row['TotalCost'],
                'roomHotelId' => $row['RoomHotelId'],
                'hotelName' => $row['HotelName'],
                'clientEmail' => $row['ClientEmail'] // Corretto
            ];
                
        }
    }        
?>
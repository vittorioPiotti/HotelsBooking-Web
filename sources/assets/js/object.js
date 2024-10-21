

/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/


class Hotel {
    constructor(idHotel, name, image, description,adminId) {
        this.idHotel = idHotel;
        this.name = name;
        this.image = image;
        this.description = description;
        this.adminId = adminId;
    }
}


class Room {
    constructor( name, image, description, cost, totalRooms) {
        this.name = name;
        this.image = image;
        this.description = description;
        this.cost = cost;
        this.totalRooms = totalRooms;
    }
}
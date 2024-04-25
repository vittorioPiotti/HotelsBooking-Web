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

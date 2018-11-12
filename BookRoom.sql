CREATE DATABASE BookRoom;

CREATE TABLE User(
    user_id INT(8) NOT NULL PRIMARY KEY,
    full_name VARCHAR(50) NULL,
    email VARCHAR(30) NOT NULL,
    booking_id int(15) NOT NULL);


CREATE TABLE Booking(
	booking_id INT(15) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    room_id INT(15) NOT NULL,
    date_booked DATE NOT NULL,
    start_time TIME NOT NULL,
    finish_time TIME NOT NULL,
    user_id INT(8) NOT NULL);


CREATE TABLE Room(
	room_id INT(15) NOT NULL PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    description VARCHAR(50) NOT NULL,
    meeting_capacity INT(3) NOT NULL,
    reception_capacity INT(4) NOT NULL,
    building VARCHAR(20) NOT NULL);
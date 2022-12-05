CREATE DATABASE fatec_eventos;

CREATE TABLE EVENTS (
	event_id INT PRIMARY KEY AUTO_INCREMENT,
	event_name VARCHAR(50) NOT NULL,
	event_date DATE NOT NULL,
	event_time TIME,
	event_location VARCHAR(255) NOT NULL,
	event_created_at TIMESTAMP NOT NULL
);

DELIMITER //
CREATE PROCEDURE get_events_on_period (start_date DATE, end_date DATE)
BEGIN
		SELECT * FROM events WHERE event_date BETWEEN start_date AND end_date;
END;
//
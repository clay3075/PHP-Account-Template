drop table Users;
create Table Users (
	EntityID int AUTO_INCREMENT,
	Email char(40),
	PasswordHash varchar(100) not null,
	DateCreated date not null,
	SessionID varchar(30),
	constraint unique_user UNIQUE (Email, SessionID),
	Primary Key(EntityID)
)
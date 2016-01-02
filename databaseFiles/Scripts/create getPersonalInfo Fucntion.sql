-- ================================================
-- Template generated from Template Explorer using:
-- Create Multi-Statement Function (New Menu).SQL
--
-- Use the Specify Values for Template Parameters 
-- command (Ctrl-Shift-M) to fill in the parameter 
-- values below.
--
-- This block of comments will not be included in
-- the definition of the function.
-- ================================================
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION getPersonalInfo 
(
	-- Add the parameters for the function here
	@pId char(8)
)
RETURNS 
@ansTable TABLE 
(
	-- Add the column definitions for the TABLE variable here
	firstName varchar(20),
	lastName varchar(20),
	birthDate date,
	sodoorPlace varchar(20),
	maritalStatus char(1),
	gender char(1),
	childrenNumber tinyint,
	nationalId char(10),
	eduLevel varchar(50),
	field varchar(50),
	institute varchar(20),
	graduationDate date,
	finalProjectTitle varchar(20)
)
AS
BEGIN
	-- Fill the table variable with the rows for your result set
	with temp1 as(
		select firstName,lastName,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,Person.NationalID
		from Employee left join Person on Employee.NationalID=Person.NationalID
		where Employee.PersonalID = @pId
	)
	, temp2 as(
		select firstName,lastName,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,temp1.NationalID,EduLevel,Field,Institute,GraduationDate,FinalProjectTitle
		from temp1 left join Education on temp1.NationalID = Education.NationalID
	)
	insert into @ansTable
	select * from temp2; 
	RETURN 
END
GO
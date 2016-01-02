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
-- Author:		Mohammad Eslahi Sani
-- Create date: 1394-10-04
-- Description:	to get statement of employees by their personalID
-- =============================================
alter FUNCTION getStatement 
(
	-- Add the parameters for the function here
	@emplyeeID char(8) 
	
)
RETURNS 
@ansTable TABLE 
(
	Name varchar(20),
	Family varchar(20),
	Birthdate date,
	SodoorPlace varchar(20),
	maritalStatus char(1),
	Gender char(1),
	ChildrenNumber tinyint,
	PersonalID char(8),
	NationalID char(10),
	Type varchar(20),
	mScore int,
	pScore int,
	PostTitle varchar(20), 
	OfficeTitle varchar(20),
	ManagerID char(1),
	EduLevel varchar(50),
	Field varchar(50),
	Base int,
	Adding int,
	Additional int,
	BadClimate int,
	Hardness int,
	FamilyScore int,
	Children int,
	Years int

)
AS
BEGIN
	-- Fill the table variable with the rows for your result set
	with temp1 as( 
	select PersonalID,Employee.NationalID,ContractID,PostID,OfficeID,ManagerID,EduLevel,Field
		from  Employee join Education on Employee.NationalID = Education.NationalID
		where Employee.PersonalID = @emplyeeID 
	)

	,temp2 as( 
	select PersonalID,NationalID,ContractID,PostID, OfficeUnit.OfficeTitle ,ManagerID,EduLevel,Field
		from  temp1,OfficeUnit
		where OfficeUnit.OfficeID = temp1.OfficeID 
	)
	,temp3 as( 
	select PersonalID,NationalID,ContractID,Post_Score.PostTitle,Post_Score.Score, OfficeTitle ,ManagerID,EduLevel,Field
		from  temp2 left join Post_Score on temp2.PostID = Post_Score.PostID
	)

	,temp4 as( 
	select Name,Family,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,temp3.NationalID,ContractID,Score,PostTitle, OfficeTitle ,ManagerID,EduLevel,Field
		from  temp3,Person
		where temp3.NationalID = Person.NationalID 
	)
	,temp5 as( 
	select Name,Family,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,NationalID,Contract.Type,Score,PostTitle, OfficeTitle ,ManagerID,EduLevel,Field
		from  temp4,Contract
		where temp4.ContractID = Contract.ContractID 
	)
	,temp6 as( 
	select Name,Family,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,NationalID,Type,Score,PostTitle, OfficeTitle ,ManagerID,temp5.EduLevel,Field,Base,Adding,Additional,BadClimate,Hardness,FamilyScore,Children,Years
		from  temp5,Score
		where temp5.EduLevel = Score.EduLevel 
	)
	,temp7 as( 
	select Name,Family,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,NationalID,Type,Management_Score.Score mScore,temp6.Score pScore,PostTitle, OfficeTitle ,ManagerID,EduLevel,Field,Base,Adding,Additional,BadClimate,Hardness,FamilyScore,Children,Years
		from  temp6 left join Management_Score on temp6.ManagerID = Management_Score.ID
	)
	Insert into @ansTable
	select * from temp7;
 


	RETURN 
END
GO
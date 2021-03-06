USE [OfficeAutomation]
GO
/****** Object:  UserDefinedFunction [dbo].[getStatement]    Script Date: 12/26/2015 11:09:45 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		Mohammad Eslahi Sani
-- Create date: 1394-10-04
-- Description:	to get statement of employees by their personalID
-- =============================================
ALTER FUNCTION [dbo].[getStatement] 
(
	-- Add the parameters for the function here
	@emplyeeID char(8) 
	
)
RETURNS 
@ansTable TABLE 
(
	firstName varchar(20),
	lastName varchar(20),
	birthDate date,
	sodoorPlace varchar(20),
	maritalStatus char(1),
	gender char(1),
	childrenNumber tinyint,
	personalId char(8),
	nationalId char(10),
	contractType varchar(20),
	mScore int,
	pScore int,
	postTitle varchar(20), 
	officeTitle varchar(20),
	managerId char(1),
	eduLevel varchar(50),
	field varchar(50),
	base int,
	adding int,
	additional int,
	badClimate int,
	hardness int,
	familyScore int,
	children int,
	years int

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
	select firstName,lastName,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,temp3.NationalID,ContractID,Score,PostTitle, OfficeTitle ,ManagerID,EduLevel,Field
		from  temp3,Person
		where temp3.NationalID = Person.NationalID 
	)
	,temp5 as( 
	select firstName,lastName,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,NationalID,Contract.contractType,Score,PostTitle, OfficeTitle ,ManagerID,EduLevel,Field
		from  temp4,Contract
		where temp4.ContractID = Contract.ContractID 
	)
	,temp6 as( 
	select firstName,lastName,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,NationalID,contractType,Score,PostTitle, OfficeTitle ,ManagerID,temp5.EduLevel,Field,Base,Adding,Additional,BadClimate,Hardness,FamilyScore,Children,Years
		from  temp5,Score
		where temp5.EduLevel = Score.EduLevel 
	)
	,temp7 as( 
	select firstName,lastName,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber,PersonalID,NationalID,contractType,Management_Score.Score mScore,temp6.Score pScore,PostTitle, OfficeTitle ,ManagerID,EduLevel,Field,Base,Adding,Additional,BadClimate,Hardness,FamilyScore,Children,Years
		from  temp6 left join Management_Score on temp6.ManagerID = Management_Score.ID
	)
	Insert into @ansTable
	select * from temp7;
 


	RETURN 
END

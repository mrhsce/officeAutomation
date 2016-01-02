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
CREATE FUNCTION getAllEmployeeList 
(
	-- Add the parameters for the function here
	
)
RETURNS 
@ansTable TABLE 
(
	-- Add the column definitions for the TABLE variable here
	firstName varchar(20),
	lastName varchar(20),
	birthDate date,
	gender char(1),
	personalId char(10),
	nationalId char(10),
	contractType varchar(20),
	post varchar(20),
	officeUnit varchar(20),
	eduLevel varchar(50)
)
AS
BEGIN
	-- Fill the table variable with the rows for your result set
	
	DECLARE @pId char(10);
	-- Fill the table variable with the rows for your result set
	DECLARE emp2_cursor CURSOR FOR  
	SELECT PersonalID  
	FROM Employee 

	OPEN emp2_cursor   
	FETCH NEXT FROM emp2_cursor INTO @pId   

	WHILE @@FETCH_STATUS = 0   
	BEGIN   
		with temp1 as( 
	select PersonalID,Employee.NationalID,ContractID,PostID,OfficeID,EduLevel
		from  Employee join Education on Employee.NationalID = Education.NationalID
		where Employee.PersonalID = @pId 
	)	
	,temp3 as( 
	select PersonalID,NationalID,ContractID,Post_Score.PostTitle,EduLevel,OfficeID
		from  temp1 left join Post_Score on temp1.PostID = Post_Score.PostID
	)
	,temp4 as( 
	select firstName,lastName,Birthdate,Gender,PersonalID,temp3.NationalID,ContractID,PostTitle ,EduLevel,OfficeID
		from  temp3,Person
		where temp3.NationalID = Person.NationalID 
	)
	,temp5 as( 
	select firstName,lastName,Birthdate,Gender,PersonalID,NationalID,Contract.contractType,PostTitle,EduLevel,temp4.OfficeID
		from  temp4,Contract
		where temp4.ContractID = Contract.ContractID 
	)
	,temp6 as( 
	select firstName,lastName,Birthdate,Gender,PersonalID,NationalID,contractType,PostTitle,OfficeUnit.OfficeTitle,EduLevel
		from  temp5,OfficeUnit
		where OfficeUnit.OfficeID = temp5.OfficeID 
	)
	
	Insert into @ansTable
	select * from temp6;

		   FETCH NEXT FROM emp2_cursor INTO @pId   
	END   

	CLOSE emp2_cursor   
	DEALLOCATE emp2_cursor
	RETURN  
END
GO
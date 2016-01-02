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
CREATE FUNCTION getEmployeeListInOffice
(
	-- Add the parameters for the function here
	@officeId char(2)
)
RETURNS 
@ansTable TABLE 
(
	-- Add the column definitions for the TABLE variable here
	firstName varchar(20),
	lastName varchar(20),
	gender char(1),
	birthDate date,
	nationalId char(10),
	post varchar(20),
	personalId char(10),
	eduLevel varchar(50),
	contractType varchar(20)
	
)
AS
BEGIN
	DECLARE @pId char(10);
	-- Fill the table variable with the rows for your result set
	DECLARE emp_cursor CURSOR FOR  
	SELECT PersonalID  
	FROM Employee 
	WHERE  OfficeID = @officeId;

	OPEN emp_cursor   
	FETCH NEXT FROM emp_cursor INTO @pId   

	WHILE @@FETCH_STATUS = 0   
	BEGIN   
		with temp1 as( 
	select PersonalID,Employee.NationalID,ContractID,PostID,OfficeID,EduLevel
		from  Employee join Education on Employee.NationalID = Education.NationalID
		where Employee.PersonalID = @pId 
	)	
	,temp3 as( 
	select PersonalID,NationalID,ContractID,Post_Score.PostTitle,EduLevel
		from  temp1 left join Post_Score on temp1.PostID = Post_Score.PostID
	)
	,temp4 as( 
	select firstName,lastName,Birthdate,Gender,PersonalID,temp3.NationalID,ContractID,PostTitle ,EduLevel
		from  temp3,Person
		where temp3.NationalID = Person.NationalID 
	)
	,temp5 as( 
	select firstName,lastName,Birthdate,Gender,PersonalID,NationalID,Contract.contractType,PostTitle,EduLevel
		from  temp4,Contract
		where temp4.ContractID = Contract.ContractID 
	)
	Insert into @ansTable
	select * from temp5;

		   FETCH NEXT FROM emp_cursor INTO @pId   
	END   

	CLOSE emp_cursor   
	DEALLOCATE emp_cursor
	RETURN 
END
GO
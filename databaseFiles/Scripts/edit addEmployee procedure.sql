USE [OfficeAutomation]
GO
/****** Object:  StoredProcedure [dbo].[addEmployee]    Script Date: 12/31/2015 2:09:11 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
ALTER PROCEDURE [dbo].[addEmployee] 
	-- Add the parameters for the stored procedure here
	
	-- personal parameters:
	@firstName varchar(20),
	@lastName varchar(20),
	@nationalId char(10),
	@birthDate date,
	@sodoorPlace varchar(15),
	@maritalStatus char(1),
	@gender char(1),
	@childrenNumber tinyint,
	
	-- contract parameters:
	@contractId char(10),
	@startDate date,
	@expireDate date,
	@postId char(2),
	@officeId char(2),
	@contractType varchar(20),

	-- education parameters:
	@eduLevel varchar(50),
	@field varchar(50),
	@institute varchar(20),
	@graduationDate date,
	@projectTitle varchar(20),
	@avarage float,

	-- employee parameters:
	@personalId char(8),
	@managerId char(1),

	-- user parameters:
	@username varchar(50),
	@pass	varchar(50),
	@role	varchar(10)
		
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	BEGIN TRANSACTION

	BEGIN TRY
		INSERT INTO Person
		(firstName,lastName,NationalID,Birthdate,SodoorPlace,maritalStatus,Gender,ChildrenNumber)
		VALUES (@firstName,@lastName,@nationalId,@birthDate,@sodoorPlace,@maritalStatus,@gender,@childrenNumber);
	
		INSERT INTO Contract
		(ContractID,StartDate,ExpireDate,PostID,OfficeID,contractType)
		VALUES (@contractId,@startDate,@expireDate,@postId,@officeId,@contractType);
	
		INSERT INTO Education
		(NationalID,EduLevel,Field,Institute,GraduationDate,FinalProjectTitle,Average)
		VALUES (@nationalId,@eduLevel,@field,@institute,@graduationDate,@projectTitle,@avarage);
	
		INSERT INTO Employee
		(PersonalID,NationalID,ContractID,PostID,OfficeID,ManagerID)
		VALUES (@personalId,@nationalId,@contractId,@postId,@officeId,@managerId);
	
		INSERT INTO sysUser
		(Username,Password,Role,PersonalID)
		VALUES (@username,@pass,@role,@personalId);
		
		COMMIT TRANSACTION;
		SELECT 1;
	END TRY
	BEGIN CATCH
		ROLLBACK TRANSACTION;
		SELECT 0;
	END CATCH

	
END

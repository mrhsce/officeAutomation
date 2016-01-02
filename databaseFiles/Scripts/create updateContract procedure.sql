-- ================================================
-- Template generated from Template Explorer using:
-- Create Procedure (New Menu).SQL
--
-- Use the Specify Values for Template Parameters 
-- command (Ctrl-Shift-M) to fill in the parameter 
-- values below.
--
-- This block of comments will not be included in
-- the definition of the procedure.
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
CREATE PROCEDURE editContract
	-- Add the parameters for the stored procedure here
	@cId char(10),
	@fieldName varchar(20),
	@fieldChar varchar(20) = NULL,
	@fieldDate date = NULL,
	@fieldInt int = NULL

AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	IF @fieldName = 'startDate'
	BEGIN
		UPDATE Contract
		SET StartDate = @fieldDate
		WHERE ContractID = @cId
	END

	ELSE IF @fieldName = 'expireDate'
	BEGIN
		UPDATE Contract
		SET ExpireDate = @fieldDate
		WHERE ContractID = @cId
	END

	ELSE IF @fieldName = 'length'
	BEGIN
		UPDATE Contract
		SET Length = @fieldInt
		WHERE ContractID = @cId
	END

	ELSE IF @fieldName = 'postId'
	BEGIN
		UPDATE Contract
		SET PostID = @fieldChar
		WHERE ContractID = @cId
	END

	ELSE IF @fieldName = 'officeId'
	BEGIN
		UPDATE Contract
		SET OfficeID = @fieldChar
		WHERE ContractID = @cId
	END

	ELSE IF @fieldName = 'contractType'
	BEGIN
		UPDATE Contract
		SET contractType = @fieldChar
		WHERE ContractID = @cId
	END

END

GO

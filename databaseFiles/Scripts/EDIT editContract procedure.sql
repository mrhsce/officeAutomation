USE [OfficeAutomation]
GO
/****** Object:  StoredProcedure [dbo].[editContract]    Script Date: 12/31/2015 11:36:34 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
ALTER PROCEDURE [dbo].[editContract]
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
	BEGIN TRY
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
		
		SELECT 1;
	END TRY

	BEGIN CATCH
		
		SELECT 0;
	END CATCH
END


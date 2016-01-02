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
CREATE PROCEDURE editScore 
	-- Add the parameters for the stored procedure here
	@eduLevel varchar(50),
	@fieldName varchar(20),
	@fieldVal int
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	BEGIN TRY
	
	IF @fieldName = 'base'
	BEGIN
		UPDATE Score
		SET Base = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

	ELSE IF @fieldName = 'additional'
	BEGIN
		UPDATE Score
		SET Additional = @fieldVal
		WHERE EduLevel = @eduLevel;
	END
	
	ELSE IF @fieldName = 'adding'
	BEGIN
		UPDATE Score
		SET Adding = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

	ELSE IF @fieldName = 'hardness'
	BEGIN
		UPDATE Score
		SET Hardness = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

	ELSE IF @fieldName = 'badClimate'
	BEGIN
		UPDATE Score
		SET BadClimate = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

	ELSE IF @fieldName = 'familyScore'
	BEGIN
		UPDATE Score
		SET FamilyScore = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

	ELSE IF @fieldName = 'children'
	BEGIN
		UPDATE Score
		SET Children = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

	ELSE IF @fieldName = 'years'
	BEGIN
		UPDATE Score
		SET Years = @fieldVal
		WHERE EduLevel = @eduLevel;
	END

		SELECT 1;
	END TRY
	BEGIN CATCH
		SELECT 0;
	END CATCH

END
GO

-- ================================================
-- Template generated from Template Explorer using:
-- Create Scalar Function (New Menu).SQL
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
-- Create date: <Create Date, ,>
-- Description:	<Description, ,>
-- =============================================
CREATE FUNCTION isInUnit 
(
	-- Add the parameters for the function here
	@headId char(10),
	@employeeId char(10)
)
RETURNS INT
AS
BEGIN
	-- Declare the return variable here
	DECLARE @result int;
	DECLARE @headUnitId char(2);
	DECLARE @employeeUnitId char(2);
	-- Add the T-SQL statements to compute the return value here
	SET @headUnitId = (
		SELECT OfficeID
		FROM Employee
		WHERE PersonalID = @headId 
	);

	
	SET @employeeUnitId = (
		SELECT OfficeID
		FROM Employee
		WHERE PersonalID = @employeeId
	);

	IF @headUnitId = @employeeUnitId
	BEGIN
		SET @result = 1;
	END
	ELSE
	BEGIN
		SET @result = 0;
	END

	-- Return the result of the function
	RETURN @result

END
GO


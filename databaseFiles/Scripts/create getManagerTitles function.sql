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
CREATE FUNCTION getManagerTitles 
(
	-- Add the parameters for the function here
	
)
RETURNS 
@ansTable TABLE 
(
	-- Add the column definitions for the TABLE variable here
	title varchar(20)
)
AS
BEGIN
	-- Fill the table variable with the rows for your result set
	INSERT INTO @ansTable
	SELECT ManagementTitle
	FROM Management_Score

	RETURN 
END
GO
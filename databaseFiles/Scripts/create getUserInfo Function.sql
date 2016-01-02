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
CREATE FUNCTION getUserInfo
(
	-- Add the parameters for the function here
	@inUser varchar(50)
)
RETURNS 
@ansTable TABLE 
(
	-- Add the column definitions for the TABLE variable here
	username varchar(50),
	pass	varchar(50),
	userType varchar(10),
	pId char(8)
)
AS
BEGIN
	-- Fill the table variable with the rows for your result set
	with temp1 as(
		select * from sysUser where sysUser.Username = @inUser
	)
	Insert into @ansTable
	select * from temp1;
	RETURN 
END
GO
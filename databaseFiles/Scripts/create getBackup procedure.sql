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
CREATE PROCEDURE getBackup 
	-- Add the parameters for the stored procedure here
	
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	DECLARE @name VARCHAR(50) -- database name  
	DECLARE @path VARCHAR(256) -- path for backup files  
	DECLARE @fileName VARCHAR(256) -- filename for backup  
	DECLARE @fileDate VARCHAR(20) -- used for file name 

	SET @path = 'C:\officeAutomation\Backup\'  

	SELECT @fileDate = CONVERT(VARCHAR(20),GETDATE(),112) 

	DECLARE db_cursor CURSOR FOR  
	SELECT name 
	FROM MASTER.dbo.sysdatabases 
	WHERE name = 'officeAutomation'  

	OPEN db_cursor   
	FETCH NEXT FROM db_cursor INTO @name   

	WHILE @@FETCH_STATUS = 0   
	BEGIN   
		   SET @fileName = @path + @name + '_' + @fileDate + '.BAK'  
		   BACKUP DATABASE @name TO DISK = @fileName  

		   FETCH NEXT FROM db_cursor INTO @name   
	END   

	CLOSE db_cursor   
	DEALLOCATE db_cursor
END
GO

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
CREATE FUNCTION getSalaries 
(
	-- Add the parameters for the function here
	@pId char(8)
)
RETURNS 
@ansTalbe TABLE 
(
	-- Add the column definitions for the TABLE variable here
	mScore int,
	pScore int,
	Base int,
	Adding int,
	Additional int,
	BadClimate int,
	Hardness int,
	FamilyScore int,
	Children int,
	Years int
)
AS
BEGIN
	-- Fill the table variable with the rows for your result set
	with temp1 as
	(
		select EduLevel,PostID,ManagerID
		from  Employee join Education on Employee.NationalID = Education.NationalID
		where Employee.PersonalID = @pId 
	)
	, temp2 as(
		select EduLevel,Post_Score.Score pScore,ManagerID
		from temp1 join Post_Score on temp1.PostID = Post_Score.PostID
	)
	, temp3 as(
		select EduLevel,pScore,Management_Score.Score mScore
		from temp2 join Management_Score on temp2.ManagerID = Management_Score.ID
	),
	temp4 as(
		select mScore,pScore,Base base,Adding adding,Additional additional,BadClimate badClimate,Hardness hardness,FamilyScore familyScore,Children children,Years years
		from temp3 join Score on temp3.EduLevel = Score.EduLevel
	)
	Insert into @ansTalbe
	select * from temp4;
 
	RETURN 
END
GO
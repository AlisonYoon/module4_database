SELECT `town`, COUNT(`town`) FROM `people` GROUP BY `town`;    --COUNT() : totals occurrences for values. GROUP BY the thing you're counting.
AVG()  --Average values in fields. Numbers, dates only -not string.
MAX/MIN   -- Give 1 result which is maximum/minimum.  ORDER BY + LIMIT does the same thing
SELECT town, DATE_FORMAT(dob, %M, %d, %Y) AS 'peopleTotal' FROM people;   -- DATE_FORMAT() : you can format data differently like this. %M is month in word. %m is month in number. %D is first, second. %d is number.
DATE()  -- pulls out date
DATETIME  --this is a data tyle. date and time together.
TIME()   -- pulls out time

wildcard   : come after LIKE
% > 0 character
_ = 1 character   --  _o_   : tom, Bob is fine but not Grondle
[a-c]   -- character range    [a-c]harlie :  Charlie matches, but not Gharlie.
[jbm]    -- some letters
[!jbm]    --  negates characters


SELECT `name` FROM `people` WHERE `age` BETWEEN 25 and 48    -- it retrieves people whose ages are between 25 and 48

SELECT `id`,`name` FROM (
SELECT * FROM `people` WHERE `dob` > '1965-01-02'
) AS a
WHERE `id` >= 2;   -- one query inside another query.
-- Subqueries : 1. Put in bracket    2. Treat like a table    3. Use an alias



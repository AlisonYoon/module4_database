/*In Query :*/


SELECT `name` FROM `people`;
SELECT * FROM `people`;
SELECT `name`, `anniversary` FROM `people` WHERE `pet``='BLOB';
SELECT `name`, `anniversary` FROM `people` WHERE `pet`='BLOB' AND `name`='Greg Davison';    --Two conditions using AND
SELECT `name`, `anniversary` FROM `people` WHERE `pet`='BLOB' OR `pet`='Pikachu';   --Two conditions using OR
SELECT `name`, `anniversary` FROM `people` WHERE (`pet`='BLOB' OR `pet`='Pikachu') AND `name`='Bob Jones'; --conditions with OR and AND

SELECT DISTINCT `id`, `name` FROM `people` WHERE `pet`='Pikachu';   --DISTINCT removes duplicate
SELECT DISTINCT `id`, `name` FROM `people` WHERE `pet`='Pikachu' ORDER BY `id` DESC;    --ORDER BY : it orders result in descending manner by id. (4, 3, 2, 1)

SELECT DISTINCT `id`, `name` FROM `people` WHERE `pet`='Pikachu' ORDER BY `id` DESC LIMIT 2;    --LIMIT : limit the result to just 2.

Difference btwn GROUP BY and DISTINCT
GROUP BY - you can use other functions such as COUNT() MIN() MAX()
DISTINCT - it will just remove the duplicate

SELECT `name`, `pet` FROM `people` GROUP BY `pet`;     --GROUP BY : Rolls through the table, selects unique entries and ignores duplicated entries
SELECT `name`, `pet` FROM `people` GROUP BY `pet` HAVING `pet` = 'Pikachu';    --HAVING : filters the result of GROUP BY

SELECT `name` AS 'petOwnerName', `pet` FROM `people` GROUP BY 'pet owner name';    --AS : used to change the field in the result. it creates an alias
SELECT `name`, `pet` FROM `people` UNION SELECT `anniversary`, `pet` FROM `people` WHERE `pet`='Ditto'; --UNION : it combines results (here it combines `pet` and `anniversary` into one column, only if the person's pet name is 'Ditto')

INSERT INTO `people` (`name`, `pet`, `anniversary`) VALUES('Sam Rogers', 'Shredder', DATE(1970-01-01));    --INSERT INTO : `people` is the table you wanna insert into. (first parenthesis) are the fields, and inside second () are the values.

UPDATE `people` SET `name`='Samuel Rogers', `pet`='Maxwell Binkington The Third' WHERE `id` = 9;    --UPDATE and SET multiple fields name to that value for the id=9 row.
UPDATE `people` SET `name`='Samuel Rogers', `pet`='Maxwell Binkington The Third' WHERE `id` > 9;    --update all with that values in those fields where id is bigger than 9.

UPDATE `people` SET `email` = REPLACE(`email`, '@gnail.com', '@gmail.com') WHERE `email` LIKE '%@gnail.com%';    --REPLACE(param1, param2, param3) : in param1 field's  param2 value-> change to param3 value. WHERE the `email` field's value look like that. %@gnail.com% , wildcard - % here represents 0 or more characters.

DELETE FROM `people` WHERE `id` > 9;-- DELETE : delete it from row. many conditions can come behind WHERE.

SELECT `people`.`people_name`, `pets`.`pet_name`
FROM `people` LEFT JOIN ON `people`.`pet_id` = `pets`.`id`
WHERE `people`.`id`> 2;
-- people_name from people table, pet_name from pets table, choose people table, left join it onto
JOIN : selecting data from multiple tables in one query
 -By doing so, we could reduce duplicate data which is called "normalization"
 -database is for manipulate or retrieve data from.
 -INNER JOIN : duplicate part in van diagram. Returns just matching data from sides.
    SELECT * FROM `adults`   -- SELECT all from adults table
    INNER JOIN `children`    -- it will create a new table with all the fields from adults and children table together that has common value from both tables.
    ON `adults`.`child_id` = `children`.`id`    -- that common values it will look for is child_id from adults table and id from children table.

-LEFT JOIN : JOIN ALL the data from left table and any data from right table that matches.
    SELECT * FROM `adults`  -- it matters which table you choose here. adults is going to be the left table here. (first table mentioned is left table)
    LEFT JOIN `children`   -- everything from adults table and what matches from children table
    ON `adults`.`child_id` = `children`.`id`   -- that "what matches" condition is if children table's id is the same as adults table's child_id

-RIGHT JOIN : Same is LEFT JOIN but backwards.
    Just use LEFT JOIN.

-you can make Linking Table. and JOIN LEFT table and RIGHT table to the Linking Table.
    SELECT * FROM `adults`
    LEFT JOIN `link`
    ON `adults`.`id` = `link`.`adultID`    -- first join adults table into link. and then
    LEFT JOIN `children`
    ON `link`.`childID` = `children`.`id`;      -- you join children table into link table.

 `
 UNION --allows you to combine two SELECT statements as long as they have combineable columns
        --Combineable =datatype, name...
        --Select unique values only (it removes duplicates)
        --UNION ALL allow duplicates.
SELECT `id` FROM `adults`
UNION
SELECT `id` FROM `children`   -- This will give you one id column that has all adults and children id








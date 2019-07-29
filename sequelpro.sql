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

SELECT `name`, `pet` FROM `people` GROUP BY `pet`;     --GROUP BY : Rolls through the table, selects unique entries and ignores duplicated entries
SELECT `name`, `pet` FROM `people` GROUP BY `pet` HAVING `pet` = 'Pikachu';    --HAVING : filters the result of GROUP BY

SELECT `name` AS 'petOwnerName', `pet` FROM `people` GROUP BY 'pet owner name';    --AS : used to change the field in the result. it creates an alias
SELECT `name`, `pet` FROM `people` UNION SELECT `anniversary`, `pet` FROM `people` WHERE `pet`='Ditto'; --UNION : it combines results (here it combines `pet` and `anniversary` into one column, only if the person's pet name is 'Ditto')

INSERT INTO `people` (`name`, `pet`, `anniversary`) VALUES('Sam Rogers', 'Shredder', DATE(1970-01-01));    --INSERT INTO : `people` is the table you wanna insert into. (first parenthesis) are the fields, and inside second () are the values.

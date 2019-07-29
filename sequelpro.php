<?php

//In Query :


SELECT `name` FROM `people`;
SELECT * FROM `people`;
SELECT `name`, `anniversary` FROM `people` WHERE `pet``='BLOB';
SELECT `name`, `anniversary` FROM `people` WHERE `pet`='BLOB' AND `name`='Greg Davison';   //-> Two conditions using AND
SELECT `name`, `anniversary` FROM `people` WHERE `pet`='BLOB' OR `pet`='Pikachu';   //-> Two conditions using OR
SELECT `name`, `anniversary` FROM `people` WHERE (`pet`='BLOB' OR `pet`='Pikachu') AND `name`='Bob Jones'; -> conditions with OR and AND


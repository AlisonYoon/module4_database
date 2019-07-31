TRANSACTIONS
2 or more SQL queries that have to call happen or none of them happen
(if only half of it happened, nothing happens, it does not update the db. Do ALL or NOTHING)

Compliance in Database

'A' tomic  : unsplittable. If part of transaction fail, the entire transaction should fail.
'C' onsistent   : if transaction fails, the database should return to its original state.
'I' solation    : while a transaction is happening, it should not impact any other query.
'D' urable    :   If there is a hardware(server computer) failure, then the transaction should fail.

MYsql creates a ghost table (copied table) to update a table. That ghost table exist while transaction is happening,
when transaction is finished, ghost table becomes the table everyone can see.


---  in the query ------------
START TRANSACTION
DECLARE @aVariable=/*statement A*/;  --using @ in front of variable name prevents sequal injection
/*statement B (using aVariable)*/
/*a statement*/
/*another statement*/

END TRANSACTION
---------------

==================

<Storage Engine>

MySQL = database engine

Storage engine (is part of database engine)
    -InnoDB
    -MyISAM

'InnoDB' :
Row-level locking (queries cannot be run agasint rows while that row is being updated. If someone else tries to update a row I am working on, it will skip that row do other things and come back to that row after I finish)
Has transactions
Has foreign keys
Fast for reading   (good for something like account of people)

'MyISAM' :
Table-level locking (queries cannot be run agasint tables while that table is being updated.)
No transactions
No foreign keys  (MyIsam does not allow foreign key)
Fast for writing  (good for something like logging archive)


==================

<Temp Tables>

CREATE TEMPORARY TABLE `something`;

this is a manually created ghost table. You can see it in the result of  query but it won't' appear on the left sidebar in the
sequalPro.


==================

<Relationship Types>

One-to-One (adult table ID and child table ID)
Many-to-One : foreign key constraint
One-to-Many (adult table ID and child1, child2....) : same thing from a different perspective
Many-to-Many : linking table

==================

<Other Databases>

EAV table - Entity, Attribute, Value

Table UID (Unique IDentifier)
When a table is created or added to a database, an automatic and unique identifier (UID) is associated with the table. A table UID is unique within the database associated with the table.
A table UID is an unsigned long value that can be used as an alternative method to operate on tables, once the table is created or added to a database.

==================

<NoSQL>
Not Only Structured Query Language

Graph DB



Document DB
-Mongo DB



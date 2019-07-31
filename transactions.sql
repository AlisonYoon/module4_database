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


